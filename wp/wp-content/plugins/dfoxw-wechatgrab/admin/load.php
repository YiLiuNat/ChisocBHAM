<?php
	// if (!defined('ABSPATH')) exit;
	add_action('wp_ajax_dfoxw_ajax_grabform','dfoxw_ajax_grabform');
	function dfoxw_ajax_grabform(){
		if(!isset($_POST['data']) || !isset($_POST['event'])){
			echo json_encode(array('errors' => array('参数错误,请刷新后再试')));
			goto end;
		}
		$data = $_POST['data'];
		$event = $_POST['event'];
		$postArr = array();
		foreach ($data as $post_data) {
			$postArr[$post_data['name']] = $post_data['value'];
		}
		$grabID = (int)$postArr['dfoxw_grabid'];
		if(wp_verify_nonce($postArr['dfoxw_grab_field'],'dfoxw_grab')){
			$dfoxwgrab = new DfoxwGrab();
			$grab = $dfoxwgrab->getGrab($grabID);
			if($event == 'delete' && $grab->status != 0){
				$dfoxwgrab->delGrab($grabID);
		    	echo json_encode(array('refresh'));
			}elseif($grab->status == 3){
				if($grab->type == 2){
					$event = maybe_unserialize($grab->event);
					foreach ($event['posturls'] as $url) {
						if($url['status'] == 0){
							$post = $dfoxwgrab->getPostElement($url['url']);
							if(is_wp_error($post)){
								$errors[] = $post->get_error_message();
								break;
							}

							$request = $dfoxwgrab->createPost($event,$post);
							if(!$request){
								$errors[] = $request;
							}else{
								$dfoxwgrab->updateEventUrlStatus($grabID,$url['url'],1);
							}
						}
					}
					if(count($errors) > 0){
						echo json_encode(array('errors' => $errors));
						goto end;
					}
					// 重新加载
					$grab = $dfoxwgrab->getGrab($grabID);
					$event = maybe_unserialize($grab->event);
					$status = false;
					foreach ($event['posturls'] as $url) {
						if($url['status'] == 0){
							$status = true;
							break;
						}
					}
					if(!$status){
						$dfoxwgrab->updateGrabStatus($grabID,1);
					}
					echo json_encode(array('refresh'));
					goto end;
				}
			}
		}
		end:;
		wp_die();
	}
?>