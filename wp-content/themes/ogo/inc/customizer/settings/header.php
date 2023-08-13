<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
namespace addonmonster\ogo\Customizer\Settings;

use addonmonster\ogo\Customizer\OgoTheme_Customizer;
use addonmonster\ogo\Customizer\Controls\Customizer_Switch_Control;
use addonmonster\ogo\Customizer\Controls\Customizer_Heading_Control;
use addonmonster\ogo\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;
use WPStaging\Vendor\GuzzleHttp\Psr7\Header;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class OgoTheme_Header_Settings extends OgoTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_header_controls' ) );
	}

    public function register_header_controls( $wp_customize ) {
		
		
        // Top Bar Style
		$wp_customize->add_setting( 'top_bar',
            array(
                'default' => $this->defaults['top_bar'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'top_bar',
            array(
                'label' => __( 'Top Bar On/Off', 'ogo' ),
                'section' => 'header_top_section',
            )
        ) );
		
        $wp_customize->add_setting( 'top_bar_style',
            array(
                'default' => $this->defaults['top_bar_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',

            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'top_bar_style',
            array(
                'label' => __( 'Top Bar Layout', 'ogo' ),
                'description' => esc_html__( 'You can override this settings only Mobile', 'ogo' ),
                'section' => 'header_top_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-1.jpg',
                        'name' => __( 'Layout 1', 'ogo' )
                    ),                  
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-2.jpg',
                        'name' => __( 'Layout 2', 'ogo' )
                    ),
                    '3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-3.jpg',
                        'name' => __( 'Layout 3', 'ogo' )
                    ),                    
                    '4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-4.jpg',
                        'name' => __( 'Layout 4', 'ogo' )
                    ), 
                    '5' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-5.png',
                        'name' => __( 'Layout 5', 'ogo' )
                    ), 
                    '6' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-6.png',
                        'name' => __( 'Layout 6', 'ogo' )
                    ), 
                ),
                'active_callback'   => 'rttheme_is_topbar_enabled',
            )
        ) );        

        // Topbar One Style   
        $wp_customize->add_setting( 'phone_show',
            array(
                'default' => $this->defaults['phone_show'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'phone_show',
            array(
                'label' => __( 'Topbar Phone', 'ogo' ),
                'section' => 'header_top_section',
                // 'active_callback'   => 'rttheme_is_topbar_phone_enabled',
                'active_callback' => function(){
                    // return get_theme_mod('header_style') == '3' or '4';
                    if (1 == get_theme_mod('top_bar_style')) {
                        return true;
                    }elseif(2 == get_theme_mod('top_bar_style')){
                        return true;
                    }elseif(3 == get_theme_mod('top_bar_style')){
                        return true;
                    }elseif(5 == get_theme_mod('top_bar_style')){
                        return true;
                    }else return false;
                }
            )
        ) ); 

        $wp_customize->add_setting( 'email_show',
            array(
                'default' => $this->defaults['email_show'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'email_show',
            array(
                'label' => __( 'Topbar Email', 'ogo' ),
                'section' => 'header_top_section',
                'active_callback' => function(){
                    // return get_theme_mod('header_style') == '3' or '4';
                    if (1 == get_theme_mod('top_bar_style')) {
                        return true;
                    }elseif(3 == get_theme_mod('top_bar_style')){
                        return true;
                    }elseif(5 == get_theme_mod('top_bar_style')){
                        return true;
                    }else return false;
                }
            )
        ) );

        $wp_customize->add_setting( 'address_show',
            array(
                'default' => $this->defaults['address_show'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'address_show',
            array(
                'label' => __( 'Topbar Address', 'ogo' ),
                'section' => 'header_top_section',
                'active_callback'   => 'rttheme_is_topbar3_enabled',
            )
        ) );

        $wp_customize->add_setting( 'menu_show',
            array(
                'default' => $this->defaults['menu_show'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'menu_show',
            array(
                'label' => __( 'Topbar Menu', 'ogo' ),
                'section' => 'header_top_section',
                'active_callback'   => 'rttheme_is_topbar_menu_enabled',
            )
        ) ); 


        $wp_customize->add_setting( 'topbar_menu',
            array(
                'default' => $this->defaults['topbar_menu'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );        
        $wp_customize->add_control( 'topbar_menu',
            array(
                'label' => __( 'Select Topbar Menu', 'ogo' ),
                'section' => 'header_top_section',
                'type' => 'select',
                'choices' => ogo_top_menu(),
                'active_callback'   => 'rttheme_is_topbar_menu_field_enabled',
            )
        ); 

        $wp_customize->add_setting( 'top_contact_btn_item',
            array(
                'default' => $this->defaults['top_contact_btn_item'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'top_contact_btn_item',
            array(
                'label' => __( 'Topbar Contact Button', 'ogo' ),
                'section' => 'header_top_section',
                'active_callback' => function(){
                    // return get_theme_mod('header_style') == '3' or '4';
                    if (6 == get_theme_mod('top_bar_style')) {
                        return true;
                    }else return false;
                },
            )
        ) );  

        $wp_customize->add_setting( 'social_show',
            array(
                'default' => $this->defaults['social_show'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'social_show',
            array(
                'label' => __( 'Topbar Social', 'ogo' ),
                'section' => 'header_top_section',
                'active_callback' => function(){
                    // return get_theme_mod('header_style') == '3' or '4';
                    if (1 == get_theme_mod('top_bar_style')) {
                        return true;
                    }elseif(2 == get_theme_mod('top_bar_style')){
                        return true;
                    }elseif(3 == get_theme_mod('top_bar_style')){
                        return true;
                    }elseif(4 == get_theme_mod('top_bar_style')){
                        return true;
                    }elseif(5 == get_theme_mod('top_bar_style')){
                        return true;
                    }elseif(6 == get_theme_mod('top_bar_style')){
                        return true;
                    }else return false;
                },
            )
        ) );   
           
        $wp_customize->add_setting( 'top_search_icon',
            array(
                'default' => $this->defaults['top_search_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'top_search_icon',
            array(
                'label' => __( 'Topbar search', 'ogo' ),
                'section' => 'header_top_section',
                'active_callback' => function(){
                    // return get_theme_mod('header_style') == '6'; 
                    if (6 == get_theme_mod('top_bar_style')) {
                        return true;
                    }else return false;
                },
            )
        ) );      

        // Color
        $wp_customize->add_setting('topbar_bg_color', 
            array(
                'default' => $this->defaults['topbar_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',   
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topbar_bg_color',
            array(
                'label' => esc_html__('Topbar Background Color', 'ogo'),
                'section' => 'header_top_section',    
            )
        ));        
        $wp_customize->add_setting('topbar_link_color', 
            array(
                'default' => $this->defaults['topbar_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',   
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topbar_link_color',
            array(
                'label' => esc_html__('Topbar Link Color', 'ogo'),
                'section' => 'header_top_section',    
            )
        ));
        $wp_customize->add_setting('topbar_link_hover_color', 
            array(
                'default' => $this->defaults['topbar_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',   
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topbar_link_hover_color',
            array(
                'label' => esc_html__('Topbar Link Hover Color', 'ogo'),
                'section' => 'header_top_section',    
            )
        ));        
        $wp_customize->add_setting('topbar_text_color', 
            array(
                'default' => $this->defaults['topbar_text_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',   
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topbar_text_color',
            array(
                'label' => esc_html__('Topbar Text Color', 'ogo'),
                'section' => 'header_top_section',    
            )
        ));
        $wp_customize->add_setting('topbar_icon_color', 
            array(
                'default' => $this->defaults['topbar_icon_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',   
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topbar_icon_color',
            array(
                'label' => esc_html__('Topbar Icon Color', 'ogo'),
                'section' => 'header_top_section',    
            )
        ));    

        /**
         * Heading for Header Variation
         */
        $wp_customize->add_setting('header_variation_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'header_variation_heading', array(
            'label' => __( 'Header Variation', 'ogo' ),
            'section' => 'header_section',
        )));
		// Sticky Menu Controll 
		$wp_customize->add_setting( 'sticky_menu',
            array(
                'default' => $this->defaults['sticky_menu'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'sticky_menu',
            array(
                'label' => __( 'Sticky Header', 'ogo' ),
                'section' => 'header_section',
            )
        ) );
		// Header controll On off Switch 
		$wp_customize->add_setting( 'header_opt',
            array(
                'default' => $this->defaults['header_opt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'header_opt',
            array(
                'label' => __( 'Header On/Off', 'ogo' ),
                'section' => 'header_section',
            )
        ) );
        // Header BackGround Color 
        $wp_customize->add_setting('header_bg_color', 
            array(
                'default' => $this->defaults['header_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_color',
            array(
                'label' => esc_html__('Header Background Color', 'ogo'),
                'section' => 'header_section', 
            )
        ));

        // Header Style
        $wp_customize->add_setting( 'header_style',
            array(
                'default' => $this->defaults['header_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'header_style',
            array(
                'label' => __( 'Header Layout', 'ogo' ),
                'description' => esc_html__( 'You can override this settings only Mobile', 'ogo' ),
                'section' => 'header_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-1.png',
                        'name' => __( 'Layout 1', 'ogo' )
                    ),                  
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-2.png',
                        'name' => __( 'Layout 2', 'ogo' )
                    ),
                    '3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-3.png',
                        'name' => __( 'Layout 3', 'ogo' )
                    ),
                    '4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-4.png',
                        'name' => __( 'Layout 4', 'ogo' )
                    ),
                    '5' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-5.png',
                        'name' => __( 'Layout 5', 'ogo' )
                    ),
                )
            )
        ) );

        //Header Action
		$wp_customize->add_setting( 'search_icon',
            array(
                'default' => $this->defaults['search_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'search_icon',
            array(
                'label' => __( 'Search Icon', 'ogo' ),
                'section' => 'header_section',
                'active_callback' => function(){
                    return get_theme_mod('header_style') !== '1' ;
                    // if (1 == get_theme_mod('header_style')) {
                    //     return false;
                    // }else return true;
                }
            )
        ) );
        $wp_customize->add_setting( 'cart_icon',
            array(
                'default' => $this->defaults['cart_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'cart_icon',
            array(
                'label' => __( 'Cart Icon', 'ogo' ),
                'section' => 'header_section',
                'active_callback' => function(){
                    return get_theme_mod('header_style') == '3';
                    // if (2 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        ) );
		
		$wp_customize->add_setting( 'vertical_menu_icon',
            array(
                'default' => $this->defaults['vertical_menu_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'vertical_menu_icon',
            array(
                'label' => __( 'Vertical Menu Icon', 'ogo' ),
                'section' => 'header_section',
                'active_callback' => function(){
                    // return get_theme_mod('header_style') == '3' or '4';
                    if (3 == get_theme_mod('header_style')) {
                        return true;
                    }elseif(4 == get_theme_mod('header_style')){
                        return true;
                    }else return false;
                }
            )
        ) );
        

        $wp_customize->add_setting( 'user_btn_item',
            array(
                'default' => $this->defaults['user_btn_item'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'user_btn_item',
            array(
                'label' => __( 'User Button', 'ogo' ),
                'section' => 'header_section',
                // 'active_callback' => function(){
                //     if(get_theme_mod('header_style') == 1) return true;
                //     else false;
                // }
                'active_callback' => function(){
                    return 1 == get_theme_mod('header_style');
                    // if (2 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        ) );

        $wp_customize->add_setting( 'contact_btn_item',
            array(
                'default' => $this->defaults['contact_btn_item'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'contact_btn_item',
            array(
                'label' => __( 'Contact Button', 'ogo' ),
                'section' => 'header_section',
                'active_callback' => function(){
                    return get_theme_mod('header_style') == '6';
                    // if (2 == get_theme_mod('header_style')) {
                    //     return true;
                    // }elseif(4 == get_theme_mod('header_style')){
                    //     return true;
                    // }else return false;
                }
            )
        ) );


        $wp_customize->add_setting( 'menu_show2',
            array(
                'default' => $this->defaults['menu_show2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'menu_show2',
            array(
                'label' => __( 'Topbar Menu', 'ogo' ),
                'section' => 'header_section',
                'active_callback'   => 'rttheme_is_header_short_menu_enabled',
            )
        ) ); 

        $wp_customize->add_setting( 'topbar_menu2',
            array(
                'default' => $this->defaults['topbar_menu2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );        
        $wp_customize->add_control( 'topbar_menu2',
            array(
                'label' => __( 'Select Topbar Menu', 'ogo' ),
                'section' => 'header_section',
                'type' => 'select',
                'choices' => ogo_top_menu(),
                'active_callback'   => 'rttheme_is_header_short_menu_field_enabled',
            )
        );
        
        // $wp_customize->add_setting( 'header_button_text',
        //     array(
        //         'default' => $this->defaults['header_button_text'],
        //         'transport' => 'refresh',
        //         'sanitize_callback' => 'rttheme_text_sanitization',
        //     )
        // );
        // $wp_customize->add_control( 'header_button_text',
        //     array(
        //         'label' => __( 'Header Button Text', 'ogo' ),
        //         'section' => 'header_section',
        //         'type' => 'text',
        //         'active_callback'   => 'show_button_control',
        //         // 'active_callback' => function(){
        //         //     return '2' == get_theme_mod('header_style');
        //         //     // if (2 == get_theme_mod('header_style')) {
        //         //     //     return true;
        //         //     // }
        //         // }
        //     )
        // );
        // var_dump(get_theme_mod('header_style'));
        // $wp_customize->add_setting( 'header_button_url',
        //     array(
        //         'default' => $this->defaults['header_button_url'],
        //         'transport' => 'refresh',
        //         'sanitize_callback' => 'rttheme_text_sanitization',
        //     )
        // );
        // $wp_customize->add_control( 'header_button_url',
        //     array(
        //         'label' => __( 'Header Button Text', 'ogo' ),
        //         'section' => 'header_section',
        //         'type' => 'text',
        //         'active_callback'   => 'show_button_control',
        //     )
        // );

        $wp_customize->add_setting('topbar_link_color',
            array(
                'default' => $this->defaults['topbar_link_color'],
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topbar_link_color',
            array(
                'label' => esc_html__('Topbar Link Color', 'ogo'),
                'section' => 'header_top_section',
            )
        ));


        $wp_customize->add_setting('topbar_link_color',
            array(
                'default' => $this->defaults['topbar_link_color'],
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topbar_link_color',
            array(
                'label' => esc_html__('Topbar Link Color', 'ogo'),
                'section' => 'header_top_section',
            )
        ));


        /**
         * Heading for Header Variation
         */
        $wp_customize->add_setting('header_mobile_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'header_mobile_heading', array(
            'label' => __( 'Mobile Header Option', 'ogo' ),
            'section' => 'header_mobile_section',
        )));

        $wp_customize->add_setting( 'mobile_topbar',
            array(
                'default' => $this->defaults['mobile_topbar'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_topbar',
            array(
                'label' => __( 'Mobile Topbar', 'ogo' ),
                'section' => 'header_mobile_section',
            )
        ) );

        $wp_customize->add_setting( 'mobile_date',
            array(
                'default' => $this->defaults['mobile_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_date',
            array(
                'label' => __( 'Mobile Date', 'ogo' ),
                'section' => 'header_mobile_section',
            )
        ) );

        $wp_customize->add_setting( 'mobile_phone',
            array(
                'default' => $this->defaults['mobile_phone'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_phone',
            array(
                'label' => __( 'Mobile Phone No', 'ogo' ),
                'section' => 'header_mobile_section',
            )
        ) );

        $wp_customize->add_setting( 'mobile_email',
            array(
                'default' => $this->defaults['mobile_email'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_email',
            array(
                'label' => __( 'Mobile Email', 'ogo' ),
                'section' => 'header_mobile_section',
            )
        ) );

        $wp_customize->add_setting( 'mobile_address',
            array(
                'default' => $this->defaults['mobile_address'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_address',
            array(
                'label' => __( 'Mobile Address', 'ogo' ),
                'section' => 'header_mobile_section',
            )
        ) );

        $wp_customize->add_setting( 'mobile_social',
            array(
                'default' => $this->defaults['mobile_social'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_social',
            array(
                'label' => __( 'Mobile Social', 'ogo' ),
                'section' => 'header_mobile_section',
            )
        ) );

        $wp_customize->add_setting( 'mobile_search',
            array(
                'default' => $this->defaults['mobile_search'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_search',
            array(
                'label' => __( 'Mobile Search', 'ogo' ),
                'section' => 'header_mobile_section',
            )
        ) );

        $wp_customize->add_setting( 'nav_button_text',
            array(
                'default' => $this->defaults['nav_button_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'nav_button_text',
            array(
                'label' => __( 'Button Text', 'ogo' ),
                'section' => 'header_section',
                'type' => 'text',
                'active_callback' => function(){
                    // return get_theme_mod('header_style') == '3' or '4';
                    if (2 == get_theme_mod('header_style')) {
                        return true;
                    }elseif(4 == get_theme_mod('header_style')){
                        return true;
                    }else return false;
                }
            )
        );

        $wp_customize->add_setting( 'navigation3_phone1',
            array(
                'default' => $this->defaults['navigation3_phone1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'navigation3_phone1',
            array(
                'label' => __( 'Phone 1', 'ogo' ),
                'section' => 'header_section',
                'type' => 'text',
                'active_callback' => function(){
                    return 3 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        );
        
        $wp_customize->add_setting( 'navigation3_phone2',
            array(
                'default' => $this->defaults['navigation3_phone2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'navigation3_phone2',
            array(
                'label' => __( 'Phone 2', 'ogo' ),
                'section' => 'header_section',
                'type' => 'text',
                'active_callback' => function(){
                    return 3 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        );
        $wp_customize->add_setting( 'navigation3_email_1',
            array(
                'default' => $this->defaults['navigation3_email_1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'navigation3_email_1',
            array(
                'label' => __( 'Email 1', 'ogo' ),
                'section' => 'header_section',
                'type' => 'text',
                'active_callback' => function(){
                    return 3 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        );
        $wp_customize->add_setting( 'navigation3_email_2',
            array(
                'default' => $this->defaults['navigation3_email_2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'navigation3_email_2',
            array(
                'label' => __( 'Email 2', 'ogo' ),
                'section' => 'header_section',
                'type' => 'text',
                'active_callback' => function(){
                    return 3 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        );
        $wp_customize->add_setting( 'navigation3_social_icon',
            array(
                'default' => $this->defaults['navigation3_social_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( 'navigation3_social_icon',
            array(
                'label' => __( 'Select Social Icon', 'ogo' ),
                'section' => 'header_section',
                'type' => 'media',
                'media_types' => ['image'],
                'button_labels' => array(
                    'select' => __( 'Select File', 'ogo' ),
                    'change' => __( 'Change File', 'ogo' ),
                    'default' => __( 'Default', 'ogo' ),
                    'remove' => __( 'Remove', 'ogo' ),
                    'placeholder' => __( 'No file selected', 'ogo' ),
                    'frame_title' => __( 'Select File', 'ogo' ),
                    'frame_button' => __( 'Choose File', 'ogo' ),
                ),
                'active_callback' => function(){
                    return 3 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        );

        // -----------------------
        // Header Style start here
        // ----------------------- 

        // Header 1 
        $wp_customize->add_setting('header1_menu_link_color', 
            array(
                'default' => $this->defaults['header1_menu_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header1_menu_link_color',
            array(
                'label' => esc_html__('Header Menu Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 1 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        )); 
        $wp_customize->add_setting('header1_menu_link_hover_color', 
            array(
                'default' => $this->defaults['header1_menu_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header1_menu_link_hover_color',
            array(
                'label' => esc_html__('Header Menu Hover Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 1 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        )); 
        $wp_customize->add_setting('header1_menu_underline_color', 
            array(
                'default' => $this->defaults['header1_menu_underline_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header1_menu_underline_color',
            array(
                'label' => esc_html__('Header Menu Underline Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 1 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        )); 
        $wp_customize->add_setting('header1_button_bg_color', 
            array(
                'default' => $this->defaults['header1_button_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header1_button_bg_color',
            array(
                'label' => esc_html__('Header button Background Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 1 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        ));
        $wp_customize->add_setting('header1_button_hover_bg_color', 
            array(
                'default' => $this->defaults['header1_button_hover_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header1_button_hover_bg_color',
            array(
                'label' => esc_html__('Header button Hover Background Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 1 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        ));
        $wp_customize->add_setting('header1_button_text_color', 
            array(
                'default' => $this->defaults['header1_button_text_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header1_button_text_color',
            array(
                'label' => esc_html__('Header Button Text Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 1 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        ));
        $wp_customize->add_setting('header1_button_text_hover_color', 
            array(
                'default' => $this->defaults['header1_button_text_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header1_button_text_hover_color',
            array(
                'label' => esc_html__('Header Button Text Hover Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 1 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        ));
        // Header 1 End 

        // Header 2 Start
        $wp_customize->add_setting('header2_menu_link_color', 
            array(
                'default' => $this->defaults['header2_menu_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header2_menu_link_color',
            array(
                'label' => esc_html__('Header Menu Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 2 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        )); 
        $wp_customize->add_setting('header2_menu_link_hover_color', 
            array(
                'default' => $this->defaults['header2_menu_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header2_menu_link_hover_color',
            array(
                'label' => esc_html__('Header Menu Hover Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 2 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        )); 
        $wp_customize->add_setting('header2_menu_underline_color', 
            array(
                'default' => $this->defaults['header2_menu_underline_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header2_menu_underline_color',
            array(
                'label' => esc_html__('Header Menu Underline Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 2 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        )); 
        $wp_customize->add_setting('header2_button_bg_color', 
            array(
                'default' => $this->defaults['header2_button_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header2_button_bg_color',
            array(
                'label' => esc_html__('Header button Background Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 2 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        ));
        $wp_customize->add_setting('header2_button_hover_bg_color', 
            array(
                'default' => $this->defaults['header2_button_hover_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header2_button_hover_bg_color',
            array(
                'label' => esc_html__('Header button Hover Background Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 2 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        ));
        $wp_customize->add_setting('header2_button_text_color', 
            array(
                'default' => $this->defaults['header2_button_text_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header2_button_text_color',
            array(
                'label' => esc_html__('Header Button Text Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 2 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        ));
        $wp_customize->add_setting('header2_button_text_hover_color', 
            array(
                'default' => $this->defaults['header2_button_text_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header2_button_text_hover_color',
            array(
                'label' => esc_html__('Header Button Text Hover Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 2 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        ));
        $wp_customize->add_setting('header2_search_icon_color', 
            array(
                'default' => $this->defaults['header2_search_icon_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header2_search_icon_color',
            array(
                'label' => esc_html__('Header Search Icom Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 2 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        ));
        $wp_customize->add_setting('header2_search_icon_hover_color', 
            array(
                'default' => $this->defaults['header2_search_icon_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header2_search_icon_hover_color',
            array(
                'label' => esc_html__('Header Search Icom Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 2 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        ));
        // Header 2 End

        // Header 3 Start
        $wp_customize->add_setting('header2_menu_link_color', 
            array(
                'default' => $this->defaults['header2_menu_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header2_menu_link_color',
            array(
                'label' => esc_html__('Header Menu Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 2 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        )); 
        $wp_customize->add_setting('header2_menu_link_hover_color', 
            array(
                'default' => $this->defaults['header2_menu_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header2_menu_link_hover_color',
            array(
                'label' => esc_html__('Header Menu Hover Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 2 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        )); 
        $wp_customize->add_setting('header2_menu_underline_color', 
            array(
                'default' => $this->defaults['header2_menu_underline_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header2_menu_underline_color',
            array(
                'label' => esc_html__('Header Menu Underline Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 2 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        )); 
        $wp_customize->add_setting('header2_button_bg_color', 
            array(
                'default' => $this->defaults['header2_button_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header2_button_bg_color',
            array(
                'label' => esc_html__('Header button Background Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 2 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        ));
        $wp_customize->add_setting('header2_button_hover_bg_color', 
            array(
                'default' => $this->defaults['header2_button_hover_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header2_button_hover_bg_color',
            array(
                'label' => esc_html__('Header button Hover Background Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 2 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        ));
        $wp_customize->add_setting('header2_button_text_color', 
            array(
                'default' => $this->defaults['header2_button_text_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header2_button_text_color',
            array(
                'label' => esc_html__('Header Button Text Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 2 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        ));
        $wp_customize->add_setting('header2_button_text_hover_color', 
            array(
                'default' => $this->defaults['header2_button_text_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header2_button_text_hover_color',
            array(
                'label' => esc_html__('Header Button Text Hover Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 2 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        ));
        $wp_customize->add_setting('header2_search_icon_color', 
            array(
                'default' => $this->defaults['header2_search_icon_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header2_search_icon_color',
            array(
                'label' => esc_html__('Header Search Icom Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 2 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        ));
        $wp_customize->add_setting('header2_search_icon_hover_color', 
            array(
                'default' => $this->defaults['header2_search_icon_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header2_search_icon_hover_color',
            array(
                'label' => esc_html__('Header Search Icom Color:', 'ogo'),
                'section' => 'header_section', 
                'active_callback' => function(){
                    return 2 == get_theme_mod('header_style');
                    // if (3 == get_theme_mod('header_style')) {
                    //     return true;
                    // }
                }
            )
        ));
        // Header 3 End
       
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new OgoTheme_Header_Settings();
}
