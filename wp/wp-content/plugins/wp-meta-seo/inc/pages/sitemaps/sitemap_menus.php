<h1><?php _e('Sitemap','wp-meta-seo') ?></h1>
<h2 class="nav-tab-wrapper">
    <div class="nav-tab nav-tab-active" data-tab="sitemaps"><?php _e('Sitemaps','wp-meta-seo') ?></div>
    <div class="nav-tab" data-tab="menu"><?php _e('Source: menu','wp-meta-seo') ?></div>
    <div class="nav-tab" data-tab="posts"><?php _e('Source: posts','wp-meta-seo') ?></div>
    <div class="nav-tab" data-tab="pages"><?php _e('Source: pages','wp-meta-seo') ?></div>
    <?php
    if(is_plugin_active(WPMSEO_ADDON_FILENAME)) {
        if (!empty($custom_post_types)) {
            foreach ($custom_post_types as $post_type => $label) {
                echo '<div class="nav-tab" data-tab="' . $post_type . '">' . ucfirst($label) . '</div>';
            }
        }
    }
    ?>
</h2>