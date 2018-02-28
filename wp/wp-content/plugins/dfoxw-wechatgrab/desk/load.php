<?php
    global $dfoxw_data,$dfoxw_default;
    if(wp_cache_get('dfoxw_data') === false){
        $dfoxw_data = $dfoxw_default;
        foreach ($dfoxw_data as $key => $value) {
            if(get_option($key)){
                $dfoxw_data[$key] = get_option($key);
            } 
        }
        wp_cache_set('dfoxw_data',$dfoxw_data);
    }else{
        $dfoxw_data = wp_cache_get('dfoxw_data');
    }

    // 公共函数
    require_once('public.func.php');
?>
<?php
    // add_action( 'wp_head','dfoxw_add_resetwechat',99,1);
add_action( 'wp_enqueue_scripts', 'dfoxw_add_resetwechat' );
    // $_USERAGENT ='Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.30 Safari/537.36';
    // $_COOKIE    ='qqmusic_uin=12345678; qqmusic_key=12345678; qqmusic_fromtag=12; ts_last=y.qq.com/portal/player.html;';
    // $_REFERER   ='http://y.qq.com/portal/player.html';
    function dfoxw_add_resetwechat($content){
        $url = DFOXW_PLUGIN_URL.'/desk/';
        // 注册ResteWechat
        wp_enqueue_style('dfoxw_wechatgrab_css',$url.'resource/dfoxw.min.css');
        wp_enqueue_script('dfoxw_wechatgrab_js',$url.'resource/dfoxw.min.js',array('jquery-core'));
        wp_localize_script('dfoxw_wechatgrab_js', 'dfoxw_local', array(
            'ajax_url' => admin_url('admin-ajax.php', (is_ssl() ? 'https' : 'http'))
        ));
        return $content;
    }

    function dfoxwClearContenetP() {
        global $post;
        if (get_post_meta($post->ID,'_dfoxw_type')){
            remove_filter('the_content', 'wpautop'); 
        }
    }
    add_action ('loop_start', 'dfoxwClearContenetP');
?>