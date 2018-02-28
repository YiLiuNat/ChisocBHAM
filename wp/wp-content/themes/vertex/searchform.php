<form role="search" method="get" class="search-form" action="<?php echo esc_attr(home_url( '/' )); ?>">
	<label>
		<span class="screen-reader-text"><?php echo __('Search for','vertex'); ?>:</span>
		<input type="text" class="search-field" placeholder="<?php echo __('Search','vertex'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" />
		<input type="submit" class="search-form-submit" value="<?php echo __('SEARCH','vertex'); ?>">
	</label>
	</form>