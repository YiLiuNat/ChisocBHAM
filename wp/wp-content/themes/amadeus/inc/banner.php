<?php
/**
 * Banner
 *
 * @package Amadeus
 */

/**
 * Function that shows the banner.
 */
function amadeus_banner() {

	if ( get_theme_mod( 'hide_banner' ) && ! is_front_page() ) {
		return;
	}

	if ( (get_theme_mod( 'banner_type', 'image' ) == 'image') && get_header_image() ) {
		echo '<div class="header-image">';
		echo '<p>&nbsp;</p>';//Center

		echo '<div style="margin-left:0px;margin-right:0px;margin-bottom:0px;margin-top:-20px;height:100px;align-items:center;display: flex;justify-content: center; position:absolute; top:40%;   width:100%;">';//large div things that dele: -webkit-transform: translate(-50%, -50%); -moz-transform: translate(-50%, -50%); -ms-transform: translate(-50%, -50%);  -o-transform: translate(-50%, -50%);transform: translate(-50%, -50%);

		//small left div
		include('leftdiv.html');
		include('rightdiv.html');



		//echo '<div style="margin-left:2%;margin-right:4%;height:100px;align-items:center;display: flex;flex-wrap: wrap;justify-content: center;"><a href="http://www.uobchinese.co.uk/about-%E5%85%B3%E4%BA%8E%E6%88%91%E4%BB%AC/"><img src="http://www.uobchinese.co.uk/wp/wp-content/themes/amadeus/inc/board_join.png" alt="Like our Pages" width=240></a></div> '; //small div in the right
		echo '</div>';//large div close

		if ( ! get_theme_mod( 'hide_scroll' ) ) {
			echo '<div class="header-scroll" style="height:0px; margin-top:7%; position:absolute; z-index:0;">';
				echo '<a href="#primary" class="scroll-icon"><i class="fa fa-angle-down"></i></a>';

			echo '</div>';
		}
		

		echo '</div>';

	} elseif ( get_theme_mod( 'banner_type', 'image' ) == 'slider' ) {
		$shortcode = get_theme_mod( 'metaslider_shortcode' );
		echo '<div class="header-slider">';
	    	echo do_shortcode( $shortcode );
	    echo '</div>';
	}
}
