<?php
/*
Plugin Name:	DFOXW WechatGrab
Plugin URI:		https://nnnn.blog/dfoxw-wechatgrab.html
Description:	WordPress 微信采集助手
Version:		1.1.6
Author:			@快叫我韩大人
Author URI:  	https://nnnn.blog/
License:     	GPL2
License URI: 	https://www.gnu.org/licenses/gpl-2.0.html
DFOXWP Version:	1.0

DFOXW WechatGrab is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
DFOXW WechatGrab is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with DFOXW WechatGrab. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

define('DFOXW_PLUGIN_URL', plugins_url('', __FILE__));
define('DFOXW_PLUGIN_DIR', plugin_dir_path(__FILE__));

function dfoxwCheckPHPVer(){
	if(version_compare(PHP_VERSION, '5.3.0') < 0){
		add_settings_error(
	        '插件激活失败',
	        esc_attr('settings_updated'),
	        '插件激活失败,您的 PHP 版本('.PHP_VERSION.')过低,需在 PHP 5.3.0 以上版本方可运行!'
    	);
    	settings_errors();
		exit;
	}
}
register_activation_hook( __FILE__,'dfoxwCheckPHPVer');

spl_autoload_register(function($className){
	$classArr = preg_split("/(?=[A-Z])/", $className);
	$className = '';
	for ($i=1; $i < count($classArr); $i++) {
		$className .= $i == 1 ? strtolower($classArr[$i]) : '.'.strtolower($classArr[$i]);
	}
	$path = DFOXW_PLUGIN_DIR.'class/'.$className . '.class.php';
	if(file_exists($path)){
		include_once $path;
		return true;
	}
	return false;
});
/*
	核心
 */
global $dfoxw_default;
$dfoxw_default = array(
	'dfoxw_save_image' 	=> 'save',
	'dfoxw_save_cover' 	=> 'cover',
	'dfoxw_save_video'	=> 'auto',
	'dfoxw_save_comment' => 'open',
	'dfoxw_save_author' 	=> 'current',
	'dfoxw_save_authorid'=> '',
	'dfoxw_save_poststatus'	=> 'publish',
	'dfoxw_save_style'	=> 'reset',
	'dfoxw_save_category'=> array(),
	'dfoxw_save_meta_author' => 'dfoxw_author',
	'dfoxw_save_meta_desc' 	=> 'dfoxw_desc',
	'dfoxw_save_meta_views'	=> 'dfoxw_views',
	'dfoxw_save_meta_likes'	=> 'dfoxw_likes',
	'dfoxw_save_meta_sourceurl'	=> 'dfoxw_sourceurl',
	'dfoxw_save_grabdate'	=> 'manual'
);
// 加载Desk
if(!is_admin()){
	require_once(DFOXW_PLUGIN_DIR.'desk/load.php');
}else{
	require_once(DFOXW_PLUGIN_DIR.'admin/load.php');
}
// ADMIN
require_once('dfox_wp/load.php');
add_filter('dfox_wp_setting_add_page','dfoxw_add_settingpage',10,1);
function dfoxw_add_settingpage($pageArr){
	$pageArr[] = array(
		'page_title'		=> 'DFOXW 微信采集助手',
		'menu_title'		=> '微信采集助手',
		'menu_slug'			=> 'wechatgrab',
		'child_slug'		=> array(
			'grab'	=> array(
				'function'		=>	'dfoxw_grab_page',
				'menu_title' 	=>	'采集队列',
				'init'			=>  DFOXW_PLUGIN_DIR.'admin/page.init.php',
				'page'			=>  DFOXW_PLUGIN_DIR.'admin/page.grab.php'
			),
			// 'official-accounts'	=> array(
			// 	'function'		=>	'dfoxw_official_accounts_page',
			// 	'menu_title' 	=>	'公众号',
			// 	'init'			=>  DFOXW_PLUGIN_DIR.'admin/page.init.php',
			// 	'page'			=>  DFOXW_PLUGIN_DIR.'admin/page.official-accounts.php'
			// ),
			'single'	=> array(
				'function'		=>	'dfoxw_single_page',
				'menu_title' 	=>	'文章',
				'init'			=>  DFOXW_PLUGIN_DIR.'admin/page.init.php',
				'page'			=>  DFOXW_PLUGIN_DIR.'admin/page.single.php'
			)
		)
	);
	return $pageArr;
}
?>