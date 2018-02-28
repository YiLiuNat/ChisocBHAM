<?php
if (!defined('ABSPATH')) exit;
wp_enqueue_script('dfoxw_wechatgrab_js',DFOXW_PLUGIN_URL.'/admin/resource/dfoxw.admin.min.js',array('jquery-core'));
if(isset($_POST['dfox_wp_save_field']) && wp_verify_nonce($_POST['dfox_wp_save_field'],'dfox_wp_save')){
	global $dfoxw_default;
	if($_POST['submit'] == 'reset'){
		foreach ($_POST as $key => $value) {
			if(strstr($key,'dfoxw_')){
				update_option($key,$dfoxw_default[$key]);
			}
		}
		add_settings_error(
	        '初始化成功',
	        esc_attr('settings_updated'),
	        '已成功初始化当前页面的设置',
	        'updated'
    	);
		goto end;
	}elseif($_POST['submit'] == 'save'){
		foreach ($_POST as $key => $value) {
			if(strstr($key,'dfoxw_')){
				update_option($key,$value);
			}
		}
		add_settings_error(
	        '保存成功',
	        esc_attr('settings_updated'),
	        '已成功保存当前页面的设置',
	        'updated'
    	);
		goto end;
	}
	end:
	wp_cache_delete('dfoxw_data');
}
?>