<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

add_action( 'template_redirect', 'ogo_template_vars' );
if( !function_exists( 'ogo_template_vars' ) ) {
    function ogo_template_vars() {
        // Single Pages
        if( is_single() || is_page() ) {
            $post_type = get_post_type();
            $post_id   = get_the_id();
            switch( $post_type ) {
                case 'page':
                $prefix = 'page';
                break;
                case 'product':
                $prefix = 'product';
                break;
                default:
                $prefix = 'single_post';
                break;
                case 'ogo_team':
                $prefix = 'team';
                break;  
                case 'ogo_portfolio':
                $prefix = 'portfolio';
                break;  
            }
			
			$layout_settings    = get_post_meta( $post_id, 'ogo_layout_settings', true );
            
            OgoTheme::$layout = ( empty( $layout_settings['ogo_layout'] ) || $layout_settings['ogo_layout']  == 'default' ) ? OgoTheme::$options[$prefix . '_layout'] : $layout_settings['ogo_layout'];
			
            OgoTheme::$top_bar = ( empty( $layout_settings['ogo_top_bar'] ) || $layout_settings['ogo_top_bar'] == 'default' ) ? OgoTheme::$options['top_bar'] : $layout_settings['ogo_top_bar'];
            
            OgoTheme::$top_bar_style = ( empty( $layout_settings['ogo_top_bar_style'] ) || $layout_settings['ogo_top_bar_style'] == 'default' ) ? OgoTheme::$options['top_bar_style'] : $layout_settings['ogo_top_bar_style'];
			
			OgoTheme::$header_opt = ( empty( $layout_settings['ogo_header_opt'] ) || $layout_settings['ogo_header_opt'] == 'default' ) ? OgoTheme::$options['header_opt'] : $layout_settings['ogo_header_opt'];
            
            OgoTheme::$header_style = ( empty( $layout_settings['ogo_header'] ) || $layout_settings['ogo_header'] == 'default' ) ? OgoTheme::$options['header_style'] : $layout_settings['ogo_header'];
			
            OgoTheme::$footer_style = ( empty( $layout_settings['ogo_footer'] ) || $layout_settings['ogo_footer'] == 'default' ) ? OgoTheme::$options['footer_style'] : $layout_settings['ogo_footer'];
			
			OgoTheme::$footer_area = ( empty( $layout_settings['ogo_footer_area'] ) || $layout_settings['ogo_footer_area'] == 'default' ) ? OgoTheme::$options['footer_area'] : $layout_settings['ogo_footer_area'];

            OgoTheme::$copyright_area = ( empty( $layout_settings['ogo_copyright_area'] ) || $layout_settings['ogo_copyright_area'] == 'default' ) ? OgoTheme::$options['copyright_area'] : $layout_settings['ogo_copyright_area'];
			
            $padding_top = ( empty( $layout_settings['ogo_top_padding'] ) || $layout_settings['ogo_top_padding'] == 'default' ) ? OgoTheme::$options[$prefix . '_padding_top'] : $layout_settings['ogo_top_padding'];
			
            OgoTheme::$padding_top = (int) $padding_top;
            
            $padding_bottom = ( empty( $layout_settings['ogo_bottom_padding'] ) || $layout_settings['ogo_bottom_padding'] == 'default' ) ? OgoTheme::$options[$prefix . '_padding_bottom'] : $layout_settings['ogo_bottom_padding'];
			
            OgoTheme::$padding_bottom = (int) $padding_bottom;
			
            OgoTheme::$has_banner = ( empty( $layout_settings['ogo_banner'] ) || $layout_settings['ogo_banner'] == 'default' ) ? OgoTheme::$options[$prefix . '_banner'] : $layout_settings['ogo_banner'];
            
            OgoTheme::$has_breadcrumb = ( empty( $layout_settings['ogo_breadcrumb'] ) || $layout_settings['ogo_breadcrumb'] == 'default' ) ? OgoTheme::$options[ $prefix . '_breadcrumb'] : $layout_settings['ogo_breadcrumb'];
            
            OgoTheme::$bgtype = ( empty( $layout_settings['ogo_banner_type'] ) || $layout_settings['ogo_banner_type'] == 'default' ) ? OgoTheme::$options[$prefix . '_bgtype'] : $layout_settings['ogo_banner_type'];
            
            OgoTheme::$bgcolor = empty( $layout_settings['ogo_banner_bgcolor'] ) ? OgoTheme::$options[$prefix . '_bgcolor'] : $layout_settings['ogo_banner_bgcolor'];
			
			if( !empty( $layout_settings['ogo_banner_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['ogo_banner_bgimg'], 'full', true );
                OgoTheme::$bgimg = $attch_url[0];
            } elseif( !empty( OgoTheme::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( OgoTheme::$options[$prefix . '_bgimg'], 'full', true );
                OgoTheme::$bgimg = $attch_url[0];
            } else {
                OgoTheme::$bgimg = OGO_IMG_URL . 'banner.jpg';
            }
			
            OgoTheme::$pagebgcolor = empty( $layout_settings['ogo_page_bgcolor'] ) ? OgoTheme::$options[$prefix . '_page_bgcolor'] : $layout_settings['ogo_page_bgcolor'];
            
            if( !empty( $layout_settings['ogo_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['ogo_page_bgimg'], 'full', true );
                OgoTheme::$pagebgimg = $attch_url[0];
            } elseif( !empty( OgoTheme::$options[$prefix . '_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( OgoTheme::$options[$prefix . '_page_bgimg'], 'full', true );
                OgoTheme::$pagebgimg = $attch_url[0];
            }
        }
        
        // Blog and Archive
        elseif( is_home() || is_archive() || is_search() || is_404() ) {
            if( is_search() ) {
                $prefix = 'search';
            } else if( is_404() ) {
                $prefix                                = 'error';
                OgoTheme::$options[$prefix . '_layout'] = 'full-width';
            } 
            // elseif( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
            //     $prefix = 'shop';
            // } 
            elseif( is_post_type_archive( "ogo_team" ) || is_tax( "ogo_team_category" ) ) {
                $prefix = 'team_archive'; 
            }else {
                $prefix = 'blog';
            }
            
            OgoTheme::$layout         		= OgoTheme::$options[$prefix . '_layout'];
            OgoTheme::$top_bar        		= OgoTheme::$options['top_bar'];
            OgoTheme::$header_opt      		= OgoTheme::$options['header_opt'];
            OgoTheme::$footer_area     		= OgoTheme::$options['footer_area'];
            OgoTheme::$copyright_area         = OgoTheme::$options['copyright_area'];
            OgoTheme::$top_bar_style  		= OgoTheme::$options['top_bar_style'];
            OgoTheme::$header_style   		= OgoTheme::$options['header_style'];
            OgoTheme::$footer_style   		= OgoTheme::$options['footer_style'];
            OgoTheme::$padding_top    		= OgoTheme::$options[$prefix . '_padding_top'];
            OgoTheme::$padding_bottom 		= OgoTheme::$options[$prefix . '_padding_bottom'];
            OgoTheme::$has_banner     		= OgoTheme::$options[$prefix . '_banner'];
            
            OgoTheme::$has_breadcrumb 		= OgoTheme::$options[$prefix . '_breadcrumb'];
            OgoTheme::$bgtype         		= OgoTheme::$options[$prefix . '_bgtype'];
            OgoTheme::$bgcolor        		= OgoTheme::$options[$prefix . '_bgcolor'];
			
            if( !empty( OgoTheme::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( OgoTheme::$options[$prefix . '_bgimg'], 'full', true );
                OgoTheme::$bgimg = $attch_url[0];
            } else {
                OgoTheme::$bgimg = OGO_IMG_URL . 'banner.jpg';
            }
			
            OgoTheme::$pagebgcolor = OgoTheme::$options[$prefix . '_page_bgcolor'];
            if( !empty( OgoTheme::$options[$prefix . '_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( OgoTheme::$options[$prefix . '_page_bgimg'], 'full', true );
                OgoTheme::$pagebgimg = $attch_url[0];
            }
			
			
        }
    }
}

// Add body class
add_filter( 'body_class', 'ogo_body_classes' );
if( !function_exists( 'ogo_body_classes' ) ) {
    function ogo_body_classes( $classes ) {
		
		// Header
    	if ( OgoTheme::$options['sticky_menu'] == 1 ) {
			$classes[] = 'sticky-header';
		}
		
        $classes[] = 'header-style-'. OgoTheme::$header_style;
        $classes[] = 'footer-style-'. OgoTheme::$footer_style;

        if ( OgoTheme::$top_bar == 1 || OgoTheme::$top_bar == 'on' ){
            $classes[] = 'has-topbar topbar-style-'. OgoTheme::$top_bar_style;
        }
        
        $classes[] = ( OgoTheme::$layout == 'full-width' ) ? 'no-sidebar' : 'has-sidebar';
		
		$classes[] = ( OgoTheme::$layout == 'left-sidebar' ) ? 'left-sidebar' : 'right-sidebar';
        
        if(class_exists('Woocommerce')){
            $classes[] = 'amt-woocommerce';
        }
        if( isset( $_COOKIE["shopview"] ) && $_COOKIE["shopview"] == 'list' ) {
            $classes[] = 'product-list-view';
        } else {
            $classes[] = 'product-grid-view';
        }
		if ( is_singular('post') ) {
			$classes[] =  ' post-detail-' . OgoTheme::$options['post_style'];
        }
        return $classes;
    }
}