<?php

if ( class_exists( 'WP_Customize_Control' ) ) {
    
    /* Related Post*/
    if (!function_exists('rttheme_is_related_post_enabled')) {
        function rttheme_is_related_post_enabled()
        {
            $show_related_post = get_theme_mod('show_related_post');
            if (empty($show_related_post)) {
                return false;
            }
            return true;
        }
    }

    /* Related Post Delay*/
    if (!function_exists('rttheme_is_related_blog_delay_enabled')) {
        function rttheme_is_related_blog_delay_enabled()
        {
            $show_related_post = get_theme_mod('show_related_post');
            $show_related_auto_play_delay = get_theme_mod('related_blog_auto_play');
            if ( ( $show_related_post == 1 && $show_related_auto_play_delay == 1 ) ) {
                return true;
            }
            return false;
        }
    }   

    /* Check is Enabled Preloader */
    if (!function_exists('rttheme_is_preloader_enabled')) {
        function rttheme_is_preloader_enabled()
        {
            $preloader = get_theme_mod('preloader');
            if (empty($preloader)) {
                return false;
            }
            return true;
        }
    }

    /* Topbar check is enabled */
    if (!function_exists('rttheme_is_topbar_enabled')) {
        function rttheme_is_topbar_enabled()
        {
            $top_bar = get_theme_mod('top_bar');
            if (empty($top_bar)) {
                return false;
            }
            return true;
        }
    }

    /* Topbar Phone is enabled */
    if ( ! function_exists( 'rttheme_is_topbar_phone_enabled' ) ) {
        function rttheme_is_topbar_phone_enabled() {
            $top_bar = get_theme_mod('top_bar');
            $top_bar_style = get_theme_mod( 'top_bar_style' );
            if ( ( $top_bar_style == 1 || $top_bar_style == 2 || $top_bar_style == 3 ) && $top_bar == true ) {
                return true;
            }
            return false;
        }
    }

    /* Topbar Menu is enabled */
    if ( ! function_exists( 'rttheme_is_topbar_menu_enabled' ) ) {
        function rttheme_is_topbar_menu_enabled() {
            $top_bar = get_theme_mod('top_bar');
            $top_bar_style = get_theme_mod( 'top_bar_style' );
            if ( ( $top_bar_style == 1 || $top_bar_style == 2 ) && $top_bar == true ) {
                return true;
            }
            return false;
        }
    }

    /* Topbar Menu Field is enabled */
    if ( ! function_exists( 'rttheme_is_topbar_menu_field_enabled' ) ) {
        function rttheme_is_topbar_menu_field_enabled() {
            $top_bar = get_theme_mod('top_bar');
            $menu_show = get_theme_mod('menu_show');
            $top_bar_style = get_theme_mod( 'top_bar_style' );
            if ( ( $top_bar_style == 1 || $top_bar_style == 2 ) && $top_bar == true && $menu_show == true ) {
                return true;
            }
            return false;
        }
    }

    /* Header Short Menu is enabled */
    if ( ! function_exists( 'rttheme_is_header_short_menu_enabled' ) ) {
        function rttheme_is_header_short_menu_enabled() {
            $header_style = get_theme_mod('header_style');
            if ( ( $header_style == 7 ) ) {
                return true;
            }
            return false;
        }
    }

    /* Show or hide Menu Button Control */
    if ( ! function_exists( 'show_button_control' ) ) {
        function show_button_control() {
            $header_style = get_theme_mod('header_style');
            if ( ( $header_style == 1 ) || ( $header_style == 2 ) || ( $header_style == 4 ) ) {
                return true;
            }
            return false;
        }
    }

    /* Header Short Menu Field is enabled */
    if ( ! function_exists( 'rttheme_is_header_short_menu_field_enabled' ) ) {
        function rttheme_is_header_short_menu_field_enabled() {
            $header_style = get_theme_mod('header_style');
            $menu_show2 = get_theme_mod('menu_show2');
            if ( ( $header_style == 7 ) && $menu_show2 == true ) {
                return true;
            }
            return false;
        }
    }

    /* Topbar Social is enabled */
    if ( ! function_exists( 'rttheme_is_topbar_social_enabled' ) ) {
        function rttheme_is_topbar_social_enabled() {
            $top_bar = get_theme_mod('top_bar');
            $top_bar_style = get_theme_mod( 'top_bar_style' );
            if ( ( $top_bar_style == 1 || $top_bar_style == 2 || $top_bar_style == 3 || $top_bar_style == 4 ) && $top_bar == true ) {
                return true;
            }
            return false;
        }
    }

    /* Topbar 3 check is enabled */
    if ( ! function_exists( 'rttheme_is_topbar3_enabled' ) ) {
        function rttheme_is_topbar3_enabled() {
            $top_bar = get_theme_mod('top_bar');
            $top_bar_style = get_theme_mod( 'top_bar_style' );
            if ( $top_bar_style == 3 && $top_bar == true ) {
                return true;
            }
            return false;
        }
    }

    /* Ofcanvas */
    if ( ! function_exists( 'rttheme_offcanvas1_bgcolor_type_condition' ) ) {
        function rttheme_offcanvas1_bgcolor_type_condition() {
            $BgType = get_theme_mod('offcanvas_bgtype');
            if ( $BgType === 'offcanvas_color' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'rttheme_offcanvas1_bgimg_type_condition' ) ) {
        function rttheme_offcanvas1_bgimg_type_condition() {
            $BgType = get_theme_mod('offcanvas_bgtype');
            if ( $BgType === 'offcanvas_img' ) {
                return true;
            }
            return false;
        }
    }
      /* Show Banner Content */
      if ( ! function_exists( 'show_banner_content' ) ) {
        function show_banner_content() {
            $banner_style = get_theme_mod('banner_style');
            if ( ( $banner_style == 3 ) ) {
                return true;
            }
            return false;
        }
    }

        /* Show Banner Image 1 */
        if ( ! function_exists( 'show_banner1_img' ) ) {
        function show_banner1_img() {
            $banner_style = get_theme_mod('banner_style');
            if ( ( $banner_style == 1 ) ) {
                return true;
            }
            return false;
        }
    }

        /* Show Banner Image 2 */
        if ( ! function_exists( 'show_banner2_img' ) ) {
        function show_banner2_img() {
            $banner_style = get_theme_mod('banner_style');
            if ( ( $banner_style == 2 ) ) {
                return true;
            }
            return false;
        }
    }
        /* Show Banner Image 3 */
        if ( ! function_exists( 'show_banner3_img' ) ) {
            function show_banner3_img() {
                $banner_style = get_theme_mod('banner_style');
                if ( ( $banner_style == 3 ) ) {
                    return true;
                }
                return false;
            }
        }
        /* Show Banner Image 4 */
        if ( ! function_exists( 'show_banner4_img' ) ) {
            function show_banner4_img() {
                $banner_style = get_theme_mod('banner_style');
                if ( ( $banner_style == 4 ) ) {
                    return true;
                }
                return false;
            }
        }
        /* Show Banner Image 5 */
        if ( ! function_exists( 'show_banner5_img' ) ) {
            function show_banner5_img() {
                $banner_style = get_theme_mod('banner_style');
                if ( ( $banner_style == 5 ) ) {
                    return true;
                }
                return false;
            }
        }


    /* = Single Page Layout
    ==========================================================*/
    /*Single Scroll Post check is enabled option*/
    if ( ! function_exists( 'rttheme_is_single_scroll_post_enabled' ) ) {
        function rttheme_is_single_scroll_post_enabled() {
            $scroll_post_enable = get_theme_mod( 'scroll_post_enable', '1' );
            if ( $scroll_post_enable == '1' ) {
                return true;
            }
            return false;
        }
    }  

    /* Page layout banner option */
    if (!function_exists('rttheme_is_page_banner_enabled')) {
        function rttheme_is_page_banner_enabled()
        {
            $show_banner_style = get_theme_mod('page_banner_style');
            if (empty($show_banner_style )) {
                return false;
            }
            return true;
        }
    }
    /* Portfolio cta option */
    if (!function_exists('rttheme_is_cta_portfolio_enabled')) {
        function rttheme_is_cta_portfolio_enabled()
        {
            $show_cta_portfolio = get_theme_mod('show_cta_portfolio');
            if (empty($show_cta_portfolio)) {
                return false;
            }
            return true;
        }
    }
    /* Portfolio cta option */
    if (!function_exists('rttheme_is_cta_bg_overlay_enabled')) {
        function rttheme_is_cta_bg_overlay_enabled()
        {
            $show_cta_bg_overlay = get_theme_mod('show_cta_bg_overlay');
            if (empty($show_cta_bg_overlay)) {
                return false;
            }
            return true;
        }
    }
    /* Portfolio related option */
    if (!function_exists('rttheme_is_related_portfolio_enabled')) {
        function rttheme_is_related_portfolio_enabled()
        {
            $show_related_portfolio = get_theme_mod('show_related_portfolio');
            if (empty($show_related_portfolio)) {
                return false;
            }
            return true;
        }
    }

    /* Portfolio Related Post Delay*/
    if (!function_exists('rttheme_is_related_portfolio_delay_enabled')) {
        function rttheme_is_related_portfolio_delay_enabled()
        {
            $show_related_portfolio = get_theme_mod('show_related_portfolio');
            $show_related_auto_play_delay = get_theme_mod('related_portfolio_auto_play');
            if ( ( $show_related_portfolio == 1 && $show_related_auto_play_delay == 1 ) ) {
                return true;
            }
            return false;
        }
    } 
    
    /* Team related option */
    if (!function_exists('rttheme_is_related_team_enabled')) {
        function rttheme_is_related_team_enabled()
        {
            $show_related_team = get_theme_mod('show_related_team');
            if (empty($show_related_team)) {
                return false;
            }
            return true;
        }
    }

    /* Team Related Post Delay*/
    if (!function_exists('rttheme_is_related_team_delay_enabled')) {
        function rttheme_is_related_team_delay_enabled()
        {
            $show_related_post = get_theme_mod('show_related_team');
            $show_related_auto_play_delay = get_theme_mod('related_team_auto_play');
            if ( ( $show_related_post == 1 && $show_related_auto_play_delay == 1 ) ) {
                return true;
            }
            return false;
        }
    } 
    /* ad option before header */
    if ( ! function_exists( 'rttheme_head_before_ad_type_image_condition' ) ) {
        function rttheme_head_before_ad_type_image_condition() {
            $BgType = get_theme_mod('before_ad_type');
            $before_head_ad_option = get_theme_mod('before_head_ad_option');
            if ( $BgType === 'before_adimage' && $before_head_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    if ( ! function_exists( 'rttheme_head_before_ad_type_custom_condition' ) ) {
        function rttheme_head_before_ad_type_custom_condition() {
            $BgType = get_theme_mod('before_ad_type');
            $before_head_ad_option = get_theme_mod('before_head_ad_option');
            if ( $BgType === 'before_adcustom' && $before_head_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }


    // ad option after header
    if ( ! function_exists( 'rttheme_head_ad_type_image_condition' ) ) {
        function rttheme_head_ad_type_image_condition() {
            $BgType = get_theme_mod('ad_type');
            $head_ad_option = get_theme_mod('head_ad_option');
            if ( $BgType === 'adimage' && $head_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    if ( ! function_exists( 'rttheme_head_ad_type_custom_condition' ) ) {
        function rttheme_head_ad_type_custom_condition() {
            $BgType = get_theme_mod('ad_type');
            $head_ad_option = get_theme_mod('head_ad_option');
            if ( $BgType === 'adcustom' && $head_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    // ad option content before header
    if ( ! function_exists( 'rttheme_cbefore_ad_type_image_condition' ) ) {
        function rttheme_cbefore_ad_type_image_condition() {
            $BgType = get_theme_mod('ad_before_post_type');
            $before_post_ad_option = get_theme_mod('before_post_ad_option');
            if ( $BgType === 'post_before_adimage' && $before_post_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    if ( ! function_exists( 'rttheme_cbefore_ad_type_custom_condition' ) ) {
        function rttheme_cbefore_ad_type_custom_condition() {
            $BgType = get_theme_mod('ad_before_post_type');
            $before_post_ad_option = get_theme_mod('before_post_ad_option');
            if ( $BgType === 'post_before_adcustom' && $before_post_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    // ad option content after header
    if ( ! function_exists( 'rttheme_cafter_ad_type_image_condition' ) ) {
        function rttheme_cafter_ad_type_image_condition() {
            $BgType = get_theme_mod('ad_after_post_type');
            $after_post_ad_option = get_theme_mod('after_post_ad_option');
            if ( $BgType === 'post_after_adimage' && $after_post_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    if ( ! function_exists( 'rttheme_cafter_ad_type_custom_condition' ) ) {
        function rttheme_cafter_ad_type_custom_condition() {
            $BgType = get_theme_mod('ad_after_post_type');
            $after_post_ad_option = get_theme_mod('after_post_ad_option');
            if ( $BgType === 'post_after_adcustom' && $after_post_ad_option == 1 ) {
                return true;
            }
            return false;
        }
    }

    /* Woo related option */
    if (!function_exists('rttheme_is_related_woo_enabled')) {
        function rttheme_is_related_woo_enabled()
        {
            $related_woo_product = get_theme_mod('related_woo_product');
            if (empty($related_woo_product)) {
                return false;
            }
            return true;
        }
    }

    /* Woo Related Post Delay*/
    if (!function_exists('rttheme_is_related_shop_delay_enabled')) {
        function rttheme_is_related_shop_delay_enabled()
        {
            $show_related_post = get_theme_mod('related_woo_product');
            $show_related_auto_play_delay = get_theme_mod('related_shop_auto_play');
            if ( ( $show_related_post == 1 && $show_related_auto_play_delay == 1 ) ) {
                return true;
            }
            return false;
        }
    }


    /* Footer All Copyright is Enabled */
    if ( ! function_exists( 'rttheme_is_footer_copyright_enabled' ) ) {
        function rttheme_is_footer_copyright_enabled() {
            $copyright_area = get_theme_mod('copyright_area');
            if ( $copyright_area == true ) {
                return true;
            }
            return false;
        }
    }

    /*Copyright Image or text */
    
    if ( ! function_exists( 'rttheme_footer_copyright_item_text_type_condition' ) ) {
        function rttheme_footer_copyright_item_text_type_condition() {
            $BgType = get_theme_mod('footer_copyright_item_type');
            if ( $BgType === 'footer_copyright_item_text' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'rttheme_footer_copyright_item_img_type_condition' ) ) {
        function rttheme_footer_copyright_item_img_type_condition() {
            $BgType = get_theme_mod('footer_copyright_item_type');
            if ( $BgType === 'footer_copyright_item_img' ) {
                return true;
            }
            return false;
        }
    }


    /*Footer 1 check is enabled option*/
    if ( ! function_exists( 'rttheme_is_footer_enabled' ) ) {
        function rttheme_is_footer_enabled() {
            $footer_style = get_theme_mod( 'footer_style' );
            if ( $footer_style == 1 || $footer_style == 2 || $footer_style == 3 || $footer_style == 4 || $footer_style == 5 || $footer_style == 6 ) {
                return true;
            }
            return false;
        }
    }

    if ( ! function_exists( 'rttheme_footer1_bgcolor_type_condition' ) ) {
        function rttheme_footer1_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer1_bg_type');
            if ( $BgType === 'footer1_bg_color' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'rttheme_footer1_bgimg_type_condition' ) ) {
        function rttheme_footer1_bgimg_type_condition() {
            $BgType = get_theme_mod('footer1_bg_type');
            if ( $BgType === 'footer1_bg_img' ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 2 check is enabled option*/
    if ( ! function_exists( 'rttheme_footer2_bgcolor_type_condition' ) ) {
        function rttheme_footer2_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer2_bg_type');
            if ( $BgType === 'footer2_bg_color' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'rttheme_footer2_bgimg_type_condition' ) ) {
        function rttheme_footer2_bgimg_type_condition() {
            $BgType = get_theme_mod('footer2_bg_type');
            if ( $BgType === 'footer2_bg_img' ) {
                return true;
            }
            return false;
        }
    }

  /*Footer 3 check is enabled option*/
    if ( ! function_exists( 'rttheme_footer3_bgcolor_type_condition' ) ) {
        function rttheme_footer3_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer3_bg_type');
            if ( $BgType === 'footer3_bg_color' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'rttheme_footer3_bgimg_type_condition' ) ) {
        function rttheme_footer3_bgimg_type_condition() {
            $BgType = get_theme_mod('footer3_bg_type');
            if ( $BgType === 'footer3_bg_img' ) {
                return true;
            }
            return false;
        }
    }
  /*Footer 4 check is enabled option*/
    if ( ! function_exists( 'rttheme_footer4_bgcolor_type_condition' ) ) {
        function rttheme_footer4_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer4_bg_type');
            if ( $BgType === 'footer4_bg_color' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'rttheme_footer4_bgimg_type_condition' ) ) {
        function rttheme_footer4_bgimg_type_condition() {
            $BgType = get_theme_mod('footer4_bg_type');
            if ( $BgType === 'footer4_bg_img' ) {
                return true;
            }
            return false;
        }
    }

  /*Footer 5 check is enabled option*/
    if ( ! function_exists( 'rttheme_footer5_bgcolor_type_condition' ) ) {
        function rttheme_footer5_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer5_bg_type');
            if ( $BgType === 'footer5_bg_color' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'rttheme_footer5_bgimg_type_condition' ) ) {
        function rttheme_footer5_bgimg_type_condition() {
            $BgType = get_theme_mod('footer5_bg_type');
            if ( $BgType === 'footer5_bg_img' ) {
                return true;
            }
            return false;
        }
    }

  /*Footer 6 check is enabled option*/
    if ( ! function_exists( 'rttheme_footer6_bgcolor_type_condition' ) ) {
        function rttheme_footer6_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer6_bg_type');
            if ( $BgType === 'footer6_bg_color' ) {
                return true;
            }
            return false;
        }
    }
     if ( ! function_exists( 'rttheme_footer6_bgimg_type_condition' ) ) {
        function rttheme_footer6_bgimg_type_condition() {
            $BgType = get_theme_mod('footer6_bg_type');
            if ( $BgType === 'footer6_bg_img' ) {
                return true;
            }
            return false;
        }
    }


    /**
     * URL sanitization
     *
     * @param  string   Input to be sanitized (either a string containing a single url or multiple, separated by commas)
     * @return string   Sanitized input
     */
    if ( ! function_exists( 'rttheme_url_sanitization' ) ) {
        function rttheme_url_sanitization( $input ) {
            if ( strpos( $input, ',' ) !== false) {
                $input = explode( ',', $input );
            }
            if ( is_array( $input ) ) {
                foreach ($input as $key => $value) {
                    $input[$key] = esc_url_raw( $value );
                }
                $input = implode( ',', $input );
            }
            else {
                $input = esc_url_raw( $input );
            }
            return $input;
        }
    }

    /**
     * Switch sanitization
     *
     * @param  string       Switch value
     * @return integer  Sanitized value
     */

    if ( ! function_exists( 'rttheme_switch_sanitization' ) ) {
        function rttheme_switch_sanitization( $input ) {
            if ( true === $input ) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    /**
     * Radio Button and Select sanitization
     *
     * @param  string       Radio Button value
     * @return integer  Sanitized value
     */
    if ( ! function_exists( 'rttheme_radio_sanitization' ) ) {
        function rttheme_radio_sanitization( $input, $setting ) {
            //get the list of possible radio box or select options
         $choices = $setting->manager->get_control( $setting->id )->choices;

            if ( array_key_exists( $input, $choices ) ) {
                return $input;
            } else {
                return $setting->default;
            }
        }
    }

    /**
     * Integer sanitization
     *
     * @param  string       Input value to check
     * @return integer  Returned integer value
     */

    if ( ! function_exists( 'rttheme_sanitize_integer' ) ) {
        function rttheme_sanitize_integer( $input ) {
            return (int) $input;
        }
    }

    /**
     * Text sanitization
     *
     * @param  string   Input to be sanitized (either a string containing a single string or multiple, separated by commas)
     * @return string   Sanitized input
     */
    if ( ! function_exists( 'rttheme_text_sanitization' ) ) {
        function rttheme_text_sanitization( $input ) {
            if ( strpos( $input, ',' ) !== false) {
                $input = explode( ',', $input );
            }
            if( is_array( $input ) ) {
                foreach ( $input as $key => $value ) {
                    $input[$key] = sanitize_text_field( $value );
                }
                $input = implode( ',', $input );
            }
            else {
                $input = sanitize_text_field( $input );
            }
            return $input;
        }
    }

    if ( ! function_exists( 'rttheme_textarea_sanitization' ) ) {
        function rttheme_textarea_sanitization( $input ) {
            return $input;
        }
    }

    /**
     * Google Font sanitization
     *
     * @param  string   JSON string to be sanitized
     * @return string   Sanitized input
     */

    if ( ! function_exists( 'rttheme_google_font_sanitization' ) ) {
        function rttheme_google_font_sanitization( $input ) {
            $val =  json_decode( $input, true );
            if( is_array( $val ) ) {
                foreach ( $val as $key => $value ) {
                    $val[$key] = sanitize_text_field( $value );
                }
                $input = json_encode( $val );
            }
            else {
                $input = json_encode( sanitize_text_field( $val ) );
            }
            return $input;
        }
    }

    /**
     * Array sanitization
     *
     * @param  array    Input to be sanitized
     * @return array    Sanitized input
     */
    if ( ! function_exists( 'rttheme_array_sanitization' ) ) {
        function rttheme_array_sanitization( $input ) {
            if( is_array( $input ) ) {
                foreach ( $input as $key => $value ) {
                    $input[$key] = sanitize_text_field( $value );
                }
            }
            else {
                $input = '';
            }
            return $input;
        }
    }

    /**
     * Alpha Color (Hex & RGBa) sanitization
     *
     * @param  string   Input to be sanitized
     * @return string   Sanitized input
     */
    if ( ! function_exists( 'rttheme_hex_rgba_sanitization' ) ) {
        function rttheme_hex_rgba_sanitization( $input, $setting ) {
            if ( empty( $input ) || is_array( $input ) ) {
                return $setting->default;
            }

            if ( false === strpos( $input, 'rgba' ) ) {
                // If string doesn't start with 'rgba' then santize as hex color
                $input = sanitize_hex_color( $input );
            } else {
                // Sanitize as RGBa color
                $input = str_replace( ' ', '', $input );
                sscanf( $input, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
                $input = 'rgba(' . rttheme_in_range( $red, 0, 255 ) . ',' . rttheme_in_range( $green, 0, 255 ) . ',' . rttheme_in_range( $blue, 0, 255 ) . ',' . rttheme_in_range( $alpha, 0, 1 ) . ')';
            }
            return $input;
        }
    }

    /**
     * Only allow values between a certain minimum & maxmium range
     *
     * @param  number   Input to be sanitized
     * @return number   Sanitized input
     */
    if ( ! function_exists( 'rttheme_in_range' ) ) {
        function rttheme_in_range( $input, $min, $max ){
            if ( $input < $min ) {
                $input = $min;
            }
            if ( $input > $max ) {
                $input = $max;
            }
            return $input;
        }
    }

    /**
     * Date Time sanitization
     *
     * @param  string   Date/Time string to be sanitized
     * @return string   Sanitized input
     */

    if ( ! function_exists( 'rttheme_date_time_sanitization' ) ) {
        function rttheme_date_time_sanitization( $input, $setting ) {
            $datetimeformat = 'Y-m-d';
            if ( $setting->manager->get_control( $setting->id )->include_time ) {
                $datetimeformat = 'Y-m-d H:i:s';
            }
            $date = DateTime::createFromFormat( $datetimeformat, $input );
            if ( $date === false ) {
                $date = DateTime::createFromFormat( $datetimeformat, $setting->default );
            }
            return $date->format( $datetimeformat );
        }
    }

    /**
     * Slider sanitization
     *
     * @param  string   Slider value to be sanitized
     * @return string   Sanitized input
     */
    if ( ! function_exists( 'rttheme_range_sanitization' ) ) {
        function rttheme_range_sanitization( $input, $setting ) {
            $attrs = $setting->manager->get_control( $setting->id )->input_attrs;

            $min = ( isset( $attrs['min'] ) ? $attrs['min'] : $input );
            $max = ( isset( $attrs['max'] ) ? $attrs['max'] : $input );
            $step = ( isset( $attrs['step'] ) ? $attrs['step'] : 1 );

            $number = floor( $input / $attrs['step'] ) * $attrs['step'];

            return rttheme_in_range( $number, $min, $max );
        }
    }

}
