<div class="wpms_source wpms_source_<?php echo $post_type ?>" style="display: none">
    <div class="div_sitemap_check_all">
        <input type="checkbox" class="sitemap_check_all" data-type="<?php echo $post_type ?>"><?php _e('Check all posts', 'wp-meta-seo'); ?>
    </div>

    <div class="div_sitemap_check_all">
        <input type="checkbox" class="sitemap_check_all_posts_in_page" data-type="<?php echo $post_type ?>"><?php _e('Check all posts in current page', 'wp-meta-seo'); ?>
    </div>

    <div class="div_sitemap_check_all" style="font-weight: bold;">
        <?php _e('Public name' , 'wp-meta-seo'); ?>
        <input type="text" class="public_name_<?php echo $post_type ?>" value="<?php echo $metaseo_sitemap->settings_sitemap['wpms_public_name_'.$post_type] ?>">
    </div>

    <div class="div_sitemap_check_all" style="font-weight: bold;">
        <?php _e('Display in column' , 'wp-meta-seo'); ?>
        <select class="wpms_display_column wpms_display_column_<?php echo $post_type ?>">
            <?php
            for($i = 1 ; $i <= $metaseo_sitemap->settings_sitemap['wpms_html_sitemap_column'] ; $i++){
                echo '<option '.(selected($metaseo_sitemap->settings_sitemap['wpms_display_column_'.$post_type], $i)).' value="'.$i.'">'.$metaseo_sitemap->columns[$i].'</option>';
            }
            ?>
        </select>
    </div>
    <div id="wrap_sitemap_option_<?php echo $post_type ?>" class="wrap_sitemap_option">
        <?php
        $posts = $metaseo_sitemap->wpms_get_posts_custom($post_type);
        foreach ($posts as $post) {
            if(!in_array($post->taxo, $check)){
                $check[] = $post->taxo;
                if($post->taxo == 'product_type'){
                    echo '<div class="wpms_row"><h1>'.__('Product Type','wp-meta-seo').'</h1></div>';
                }elseif($post->taxo == 'product_cat'){
                    echo '<div class="wpms_row"><h1>'.__('Products categories','wp-meta-seo').'</h1></div>';
                }else{
                    echo '<div class="wpms_row"><h1>' . $post->taxo . '</h1></div>';
                }
            }

            if(in_array($post->cat_ID, $metaseo_sitemap->settings_sitemap['wpms_category_link'])){
                echo '<div class="wpms_row"><h3><input for="'.$desclink_category_remove.'" type="checkbox" checked class="sitemap_addlink_categories" value="'.$post->cat_ID.'">' . $post->cat_name . '</h3></div>';
            }else{
                echo '<div class="wpms_row"><h3><input for="'.$desclink_category_add.'" type="checkbox" class="sitemap_addlink_categories" value="'.$post->cat_ID.'">' . $post->cat_name . '</h3></div>';
            }

            echo '<div class="wpms_row wpms_row_check_all_posts"><input type="checkbox" class="sitemap_check_all_posts_categories" data-category="'.$post->taxo.$post->slug.'">'.__('Select all' , 'wp-meta-seo').'</div>';
            foreach ($post->results as $p) {
                $category = get_the_terms($p, $post->taxo);
                if($category[0]->term_id == $post->cat_ID){
                    if(empty($metaseo_sitemap->settings_sitemap['wpms_sitemap_'.$post_type][$post->cat_ID.'-'.$p->ID]['frequency'])){
                        $postfrequency = 'monthly';
                    }else{
                        $postfrequency = $metaseo_sitemap->settings_sitemap['wpms_sitemap_'.$post_type][$post->cat_ID.'-'.$p->ID]['frequency'];
                    }
                    if(empty($metaseo_sitemap->settings_sitemap['wpms_sitemap_'.$post_type][$post->cat_ID.'-'.$p->ID]['priority'])){
                        $postpriority = '1.0';
                    }else{
                        $postpriority = $metaseo_sitemap->settings_sitemap['wpms_sitemap_'.$post_type][$post->cat_ID.'-'.$p->ID]['priority'];
                    }
                    $select_priority = $metaseo_sitemap->wpms_view_select_priority('priority_'.$post_type.'_'.$p->ID,'_metaseo_settings_sitemap[wpms_sitemap_'.$post_type.'][' . $post->cat_ID . '-' . $p->ID . '][priority]', $postpriority);
                    $select_frequency = $metaseo_sitemap->wpms_view_select_frequency('frequency_'.$post_type.'_'.$p->ID,'_metaseo_settings_sitemap[wpms_sitemap_'.$post_type.'][' . $post->cat_ID . '-' .$p->ID . '][frequency]', $postfrequency);
                    echo '<div class="wpms_row">';
                    echo '<div style="float:left;line-height:30px">';
                    if (isset($metaseo_sitemap->settings_sitemap['wpms_sitemap_'.$post_type][$post->cat_ID . '-' . $p->ID]['post_id']) && $metaseo_sitemap->settings_sitemap['wpms_sitemap_'.$post_type][$post->cat_ID . '-' .$p->ID]['post_id'] == $p->ID) {
                        echo '<input class="cb_sitemaps_'.$post_type.' wpms_xmap_'.$post_type.' '.$post->taxo.$post->slug.'" name="_metaseo_settings_sitemap[wpms_sitemap_'.$post_type.'][' . $post->cat_ID . '-' .$p->ID . '][post_id]" checked type="checkbox" value="' . $p->ID . '" data-category="'.$post->cat_ID.'">';
                    } else {
                        echo '<input class="cb_sitemaps_'.$post_type.' wpms_xmap_'.$post_type.' '.$post->taxo.$post->slug.'" name="_metaseo_settings_sitemap[wpms_sitemap_'.$post_type.'][' . $post->cat_ID . '-' .$p->ID . '][post_id]" type="checkbox" value="' . $p->ID . '" data-category="'.$post->cat_ID.'">';
                    }

                    echo $p->post_title;
                    echo '</div>';
                    echo '<div style="margin-left:200px">' . $select_priority . $select_frequency . '</div>';
                    echo '</div>';
                }
            }
        }




        ?>
    </div>
    <div class="holder holder_<?php echo $post_type ?>"></div>
</div>