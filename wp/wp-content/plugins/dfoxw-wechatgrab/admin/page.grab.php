<?php
	if (!defined('ABSPATH')) exit;
	function dfoxw_grab_page(){
		$dfoxwgrab = new DfoxwGrab();
?>
<div class="dfox-wp-highlight-box dfox-wp-fullpage">
	<div class="dfox-wp-highleft">
		<h4>插件声明</h4>
		<p><code>手动采集时,请不要关闭页面!</code>该插件抓取的任何内容,都属于插件使用者个人行为,造成的任何问题与插件作者无关</p>
	</div>
</div>
<?php $dfoxwgrab->getGrabListsHtml(); ?>
<?php }