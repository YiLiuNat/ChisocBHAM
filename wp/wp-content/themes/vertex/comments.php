<?php

if ( post_password_required() ) {
	return;
}

?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
	<h2 class="comments-title">
			<?php
				printf( _n( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'vertex' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'vertex' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'vertex' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'vertex' ) ); ?></div>
			</nav><!-- #comment-nav-above -->
			<?php endif; ?>

		<ol class="commentlist">
				<?php
					wp_list_comments( array(
						'style'      => 'ol',
						'short_ping' => true,
						'avatar_size'=> 34,
					) );
				?>
			</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'vertex' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'vertex' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'vertex' ) ); ?></div>
			</nav><!-- #comment-nav-below -->
			<?php endif; ?>
		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'vertex' ); ?></p>
			<?php endif; ?>
		<?php endif; ?>
		<?php comment_form(); ?>
	</div><!-- #comments -->