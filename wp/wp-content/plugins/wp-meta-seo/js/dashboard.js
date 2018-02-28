jQuery(document).ready(function ($) {
    'use strict';
    var wpms_dash = 0;
    // Knob
    $.ajax({
        url: ajaxurl,
        method: 'POST',
        dataType: 'json',
        data: {
            action: 'wpms_dash_permalink',
        },
        success: function (res) {
            $('.wpms_dash_permalink').html(null);
            $('.wpms_dash_permalink').html(res);
            $('.dial-success').knob({
                readOnly: true,
                width: '70px',
                bgColor: '#E7E9EE',
                fgColor: '#259CAB',
                inputColor: '#262B36'
            });
            wpms_dash++;
            if(wpms_dash == 1){
                wpms_dash_newcontent();
            }
        }
    });

    function wpms_dash_newcontent(){
        $.ajax({
            url: ajaxurl,
            method: 'POST',
            dataType: 'json',
            data: {
                action: 'wpms_dash_newcontent',
            },
            success: function (res) {
                $('.wpms_dash_newcontent').html(null);
                $('.wpms_dash_newcontent').html(res);
                $('.dial-warning').knob({
                    readOnly: true,
                    width: '70px',
                    bgColor: '#259CAB',
                    fgColor: '#fff',
                    inputColor: '#fff'
                });
                wpms_dash++;
                if(wpms_dash == 2){
                    wpms_dash_linkmeta();
                }
            }
        });
    }

    function wpms_dash_linkmeta(){
        $.ajax({
            url: ajaxurl,
            method: 'POST',
            dataType: 'json',
            data: {
                action: 'wpms_dash_linkmeta',
            },
            success: function (res) {
                $('.wpms_dash_linkmeta').html(null);
                $('.wpms_dash_linkmeta').html(res);
                wpms_knob();
                wpms_dash++;
                if(wpms_dash == 3){
                    wpms_dash_metatitle();
                }
            }
        });
    }

    function wpms_dash_metatitle(){
        $.ajax({
            url: ajaxurl,
            method: 'POST',
            dataType: 'json',
            data: {
                action: 'wpms_dash_metatitle',
            },
            success: function (res) {
                $('.wpms_dash_metatitle').html(null);
                $('.wpms_dash_metatitle').html(res);
                wpms_knob();
                wpms_dash++;
                if(wpms_dash == 4){
                    wpms_dash_imagemeta(1,0,0,0);
                }
            }
        });
    }

    function wpms_dash_imagemeta(page,imgs_statis,imgs_meta,imgs_count){
        $.ajax({
            url: ajaxurl,
            method: 'POST',
            dataType: 'json',
            data: {
                action: 'wpms_dash_imgsmeta',
                page : page,
                imgs_statis : imgs_statis,
                imgs_metas_statis : imgs_meta,
                imgs_count : imgs_count
            },
            success: function (res) {
                if(typeof res.status == "undefined"){
                    wpms_dash_imagemeta(page+1 , res.imgs_statis[0] , res.imgs_metas_statis[0] , res.imgs_count);
                }else{
                    $('.wpms_dash_imgsresize').html(null);
                    $('.wpms_dash_imgsresize').html(res.html_imgresize);

                    $('.wpms_dash_imgsmeta').html(null);
                    $('.wpms_dash_imgsmeta').html(res.html_imgsmeta);
                    wpms_knob();

                    wpms_dash++;
                    if(wpms_dash == 5){
                        wpms_dash_metadesc();
                    }
                }
            }
        });
    }

    function wpms_dash_metadesc(){
        $.ajax({
            url: ajaxurl,
            method: 'POST',
            dataType: 'json',
            data: {
                action: 'wpms_dash_metadesc',
            },
            success: function (res) {
                $('.wpms_dash_metadesc').html(null);
                $('.wpms_dash_metadesc').html(res);
                wpms_knob();
            }
        });
    }


    function wpms_knob(){
        $('.dial-success').knob({
            readOnly: true,
            width: '70px',
            bgColor: '#E7E9EE',
            fgColor: '#259CAB',
            inputColor: '#262B36'
        });

        $('.dial-danger').knob({
            readOnly: true,
            width: '70px',
            bgColor: '#E7E9EE',
            fgColor: '#259CAB',
            inputColor: '#262B36'
        });

        $('.dial-info').knob({
            readOnly: true,
            width: '70px',
            bgColor: '#259CAB',
            fgColor: '#fff',
            inputColor: '#fff'
        });

        $('.dial-warning').knob({
            readOnly: true,
            width: '70px',
            bgColor: '#259CAB',
            fgColor: '#fff',
            inputColor: '#fff'
        });
    }
    wpms_knob();
    jQuery('.metaseo_tool').qtip({
        content: {
            attr: 'alt'
        },
        position: {
            my: 'bottom left',
            at: 'bottom left'
        },
        style: {
            tip: {
                corner: true,
            },
            classes: 'metaseo-qtip qtip-rounded metaseo-qtip-dashboard'
        },
        show: 'hover',
        hide: {
            fixed: true,
            delay: 10
        }

    });

    jQuery('.metaseo_tool-000').qtip({
        content: {
            attr: 'alt'
        },
        position: {
            my: 'bottom left',
            at: 'bottom left'
        },
        style: {
            tip: {
                corner: true,
            },
            classes: 'metaseo-qtip metaseo-qtip-000 qtip-rounded metaseo-qtip-dashboard'
        },
        show: 'hover',
        hide: {
            fixed: true,
            delay: 10
        }

    });

});