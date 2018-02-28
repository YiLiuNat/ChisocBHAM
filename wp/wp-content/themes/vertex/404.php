<?php
get_header();
?>
<div class="content">
	<div class="container">
		<div class="post_content">
			<article class="post_content">
				<h1><?php echo __( 'Page not Found', 'vertex' ); ?></h1>
				<h2><?php echo __( 'This is somewhat embarrassing, isn\'t it?', 'vertex' ); ?></h2>
				<p><?php echo __( 'It looks like nothing was found at this location. Maybe try a search', 'vertex' ); ?></p>
				<?php get_search_form(); ?>
			</article>
			<div class="clear"></div>
		</div>
	</div>
	</div>
<?php
get_footer();
?>