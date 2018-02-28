jQuery(document).ready(function() {
	jQuery('#dfoxw_resetwechar').find('.video_iframe').each(function(index, el) {
		jQuery(this).wrap('<div class="dfoxw_auto_video"></div>');
		var video = jQuery(this).parents('.dfoxw_auto_video');
		if(jQuery(this).data('ratio') != undefined || jQuery(this).data('ratio') != ''){
			var w = jQuery(this).outerWidth();
			var h = w * jQuery(this).data('ratio');
			jQuery(video).css('height',h);
		}
	});
});