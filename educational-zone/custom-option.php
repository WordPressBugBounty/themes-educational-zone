<?php

    $educational_zone_theme_css= "";

    /*--------------------------- Scroll To Top Positions -------------------*/

    $educational_zone_scroll_position = get_theme_mod( 'educational_zone_scroll_top_position','Right');
    if($educational_zone_scroll_position == 'Right'){
        $educational_zone_theme_css .='#button{';
            $educational_zone_theme_css .='right: 20px;';
        $educational_zone_theme_css .='}';
    }else if($educational_zone_scroll_position == 'Left'){
        $educational_zone_theme_css .='#button{';
            $educational_zone_theme_css .='left: 20px;right: auto;';
        $educational_zone_theme_css .='}';
    }else if($educational_zone_scroll_position == 'Center'){
        $educational_zone_theme_css .='#button{';
            $educational_zone_theme_css .='right: auto;left: 50%; transform:translateX(-50%);';
        $educational_zone_theme_css .='}';
    }

    /*--------------------------- Scroll To Top Border Radius -------------------*/

    $educational_zone_scroll_to_top_border_radius = get_theme_mod('educational_zone_scroll_to_top_border_radius');
    $educational_zone_scroll_bg_color = get_theme_mod('educational_zone_scroll_bg_color');
    $educational_zone_scroll_color = get_theme_mod('educational_zone_scroll_color');
    $educational_zone_scroll_font_size = get_theme_mod('educational_zone_scroll_font_size');
    if($educational_zone_scroll_to_top_border_radius != false || $educational_zone_scroll_bg_color != false || $educational_zone_scroll_color != false || $educational_zone_scroll_font_size != false){
        $educational_zone_theme_css .='#colophon a#button{';
            $educational_zone_theme_css .='border-radius: '.esc_attr($educational_zone_scroll_to_top_border_radius).'px; background-color: '.esc_attr($educational_zone_scroll_bg_color).'; color: '.esc_attr($educational_zone_scroll_color).' !important; font-size: '.esc_attr($educational_zone_scroll_font_size).'px;';
        $educational_zone_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Positions -------------------*/

    $educational_zone_product_sale = get_theme_mod( 'educational_zone_woocommerce_product_sale','Right');
    if($educational_zone_product_sale == 'Right'){
        $educational_zone_theme_css .='.woocommerce ul.products li.product .onsale{';
            $educational_zone_theme_css .='left: auto; right: 15px;';
        $educational_zone_theme_css .='}';
    }else if($educational_zone_product_sale == 'Left'){
        $educational_zone_theme_css .='.woocommerce ul.products li.product .onsale{';
            $educational_zone_theme_css .='left: 15px; right: auto;';
        $educational_zone_theme_css .='}';
    }else if($educational_zone_product_sale == 'Center'){
        $educational_zone_theme_css .='.woocommerce ul.products li.product .onsale{';
            $educational_zone_theme_css .='right: 50%; left: 50%; letter-spacing: 0px; padding: 0px 0px; font-size: 12px;';
        $educational_zone_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Border Radius -------------------*/

    $educational_zone_woo_product_border_radius = get_theme_mod('educational_zone_woo_product_border_radius', 0);
    if($educational_zone_woo_product_border_radius != false){
        $educational_zone_theme_css .='.woocommerce ul.products li.product a img{';
            $educational_zone_theme_css .='border-radius: '.esc_attr($educational_zone_woo_product_border_radius).'px;';
        $educational_zone_theme_css .='}';
    }

    /*---------------- Single post Settings ------------------*/

    $educational_zone_single_post_navigation_show_hide = get_theme_mod('educational_zone_single_post_navigation_show_hide',true);
    if($educational_zone_single_post_navigation_show_hide != true){
        $educational_zone_theme_css .='.nav-links{';
            $educational_zone_theme_css .='display: none;';
        $educational_zone_theme_css .='}';
    }

    /*--------------------------- Footer Background Image Position -------------------*/

    $educational_zone_footer_bg_image_position = get_theme_mod( 'educational_zone_footer_bg_image_position','scroll');
    if($educational_zone_footer_bg_image_position == 'fixed'){
        $educational_zone_theme_css .='#colophon{';
            $educational_zone_theme_css .='background-attachment: fixed !important; background-position: center !important;';
        $educational_zone_theme_css .='}';
    }elseif ($educational_zone_footer_bg_image_position == 'scroll'){
        $educational_zone_theme_css .='#colophon{';
            $educational_zone_theme_css .='background-attachment: scroll !important; background-position: center !important;';
        $educational_zone_theme_css .='}';
    }

    /*--------------------------- Footer Widget Heading Alignment -------------------*/

    $educational_zone_footer_widget_heading_alignment = get_theme_mod( 'educational_zone_footer_widget_heading_alignment','Left');
    if($educational_zone_footer_widget_heading_alignment == 'Left'){
        $educational_zone_theme_css .='#colophon h5, h5.footer-column-widget-title{';
        $educational_zone_theme_css .='text-align: left;';
        $educational_zone_theme_css .='}';
    }else if($educational_zone_footer_widget_heading_alignment == 'Center'){
        $educational_zone_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $educational_zone_theme_css .='text-align: center;';
        $educational_zone_theme_css .='}';
    }else if($educational_zone_footer_widget_heading_alignment == 'Right'){
        $educational_zone_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $educational_zone_theme_css .='text-align: right;';
        $educational_zone_theme_css .='}';
    }

    /*--------------------------- Footer background image -------------------*/

    $educational_zone_footer_bg_image = get_theme_mod('educational_zone_footer_bg_image');
    if($educational_zone_footer_bg_image != false){
        $educational_zone_theme_css .='#colophon{';
            $educational_zone_theme_css .='background: url('.esc_attr($educational_zone_footer_bg_image).');';
        $educational_zone_theme_css .='}';
    }

    /*--------------------------- Copyright Background Color -------------------*/

    $educational_zone_copyright_background_color = get_theme_mod('educational_zone_copyright_background_color');
    if($educational_zone_copyright_background_color != false){
        $educational_zone_theme_css .='.footer_info{';
            $educational_zone_theme_css .='background-color: '.esc_attr($educational_zone_copyright_background_color).' !important;';
        $educational_zone_theme_css .='}';
    } 

    /*--------------------------- Site Title And Tagline Color -------------------*/

    $educational_zone_logo_title_color = get_theme_mod('educational_zone_logo_title_color');
    if($educational_zone_logo_title_color != false){
        $educational_zone_theme_css .='p.site-title a, .navbar-brand a{';
            $educational_zone_theme_css .='color: '.esc_attr($educational_zone_logo_title_color).' !important;';
        $educational_zone_theme_css .='}';
    }

    $educational_zone_logo_tagline_color = get_theme_mod('educational_zone_logo_tagline_color');
    if($educational_zone_logo_tagline_color != false){
        $educational_zone_theme_css .='.logo p.site-description, .navbar-brand p{';
            $educational_zone_theme_css .='color: '.esc_attr($educational_zone_logo_tagline_color).'  !important;';
        $educational_zone_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $educational_zone_footer_widget_content_alignment = get_theme_mod( 'educational_zone_footer_widget_content_alignment','Left');
    if($educational_zone_footer_widget_content_alignment == 'Left'){
        $educational_zone_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $educational_zone_theme_css .='text-align: left;';
        $educational_zone_theme_css .='}';
    }else if($educational_zone_footer_widget_content_alignment == 'Center'){
        $educational_zone_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $educational_zone_theme_css .='text-align: center;';
        $educational_zone_theme_css .='}';
    }else if($educational_zone_footer_widget_content_alignment == 'Right'){
        $educational_zone_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $educational_zone_theme_css .='text-align: right;';
        $educational_zone_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $educational_zone_copyright_content_alignment = get_theme_mod( 'educational_zone_copyright_content_alignment','Right');
    if($educational_zone_copyright_content_alignment == 'Left'){
        $educational_zone_theme_css .='.footer-menu-left{';
        $educational_zone_theme_css .='text-align: left;';
        $educational_zone_theme_css .='}';
    }else if($educational_zone_copyright_content_alignment == 'Center'){
        $educational_zone_theme_css .='.footer-menu-left{';
            $educational_zone_theme_css .='text-align: center;';
        $educational_zone_theme_css .='}';
    }else if($educational_zone_copyright_content_alignment == 'Right'){
        $educational_zone_theme_css .='.footer-menu-left{';
            $educational_zone_theme_css .='text-align: right;';
        $educational_zone_theme_css .='}';
    }

    /*---------------- Logo CSS ----------------------*/
    $educational_zone_logo_title_font_size = get_theme_mod( 'educational_zone_logo_title_font_size');
    $educational_zone_logo_tagline_font_size = get_theme_mod( 'educational_zone_logo_tagline_font_size');
    if( $educational_zone_logo_title_font_size != '') {
        $educational_zone_theme_css .='.navbar-brand a{';
            $educational_zone_theme_css .='font-size: '. $educational_zone_logo_title_font_size. 'px;';
        $educational_zone_theme_css .='}';
    }
    if( $educational_zone_logo_tagline_font_size != '') {
        $educational_zone_theme_css .='.navbar-brand p{';
            $educational_zone_theme_css .='font-size: '. $educational_zone_logo_tagline_font_size. 'px;';
        $educational_zone_theme_css .='}';
    }