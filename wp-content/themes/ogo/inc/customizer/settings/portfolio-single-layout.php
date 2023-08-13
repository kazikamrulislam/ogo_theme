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
use addonmonster\ogo\Customizer\Controls\Customizer_Separator_Control;
use addonmonster\ogo\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class OgoTheme_Portfolio_Single_Layout_Settings extends OgoTheme_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Register Page Controls
        add_action( 'customize_register', array( $this, 'register_portfolio_single_layout_controls' ) );
	}

    public function register_portfolio_single_layout_controls( $wp_customize ) {

        $wp_customize->add_setting( 'portfolio_layout',
            array(
                'default' => $this->defaults['portfolio_layout'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'portfolio_layout',
            array(
                'label' => __( 'Layout', 'ogo' ),
                'description' => esc_html__( 'Select the default template layout for Pages', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'choices' => array(
                    'left-sidebar' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-left.png',
                        'name' => __( 'Left Sidebar', 'ogo' )
                    ),
                    'full-width' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-full.png',
                        'name' => __( 'Full Width', 'ogo' )
                    ),
                    'right-sidebar' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-right.png',
                        'name' => __( 'Right Sidebar', 'ogo' )
                    )
                )
            )
        ) );

        /**
         * Separator
         */
        $wp_customize->add_setting('separator_page', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_page', array(
            'settings' => 'separator_page',
            'section' => 'portfolio_single_layout_section',
        )));
		
		// Content padding top
        $wp_customize->add_setting( 'portfolio_padding_top',
            array(
                'default' => $this->defaults['portfolio_padding_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'portfolio_padding_top',
            array(
                'label' => __( 'Content Padding Top', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'number',
            )
        );
        // Content padding bottom
        $wp_customize->add_setting( 'portfolio_padding_bottom',
            array(
                'default' => $this->defaults['portfolio_padding_bottom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'portfolio_padding_bottom',
            array(
                'label' => __( 'Content Padding Bottom', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'number',
            )
        );
		
		$wp_customize->add_setting( 'portfolio_banner',
            array(
                'default' => $this->defaults['portfolio_banner'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'portfolio_banner',
            array(
                'label' => __( 'Banner', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
            )
        ) );
		
		$wp_customize->add_setting( 'portfolio_breadcrumb',
            array(
                'default' => $this->defaults['portfolio_breadcrumb'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'portfolio_breadcrumb',
            array(
                'label' => __( 'Breadcrumb', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
            )
        ) );
		
        // Banner BG Type 
        $wp_customize->add_setting( 'portfolio_banner_bgtype',
            array(
                'default' => $this->defaults['portfolio_banner_bgtype'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'portfolio_banner_bgtype',
            array(
                'label' => __( 'Banner Background Type', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'description' => esc_html__( 'This is banner background type.', 'ogo' ),
                'type' => 'select',
                'choices' => array(
                    'bgimg' => esc_html__( 'BG Image', 'ogo' ),
                    'bgcolor' => esc_html__( 'BG Color', 'ogo' ),
                ),
            )
        );

        $wp_customize->add_setting( 'portfolio_banner_bgimg',
            array(
                'default' => $this->defaults['portfolio_banner_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'portfolio_banner_bgimg',
            array(
                'label' => __( 'Banner Background Image', 'ogo' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'ogo' ),
                    'change' => __( 'Change File', 'ogo' ),
                    'default' => __( 'Default', 'ogo' ),
                    'remove' => __( 'Remove', 'ogo' ),
                    'placeholder' => __( 'No file selected', 'ogo' ),
                    'frame_title' => __( 'Select File', 'ogo' ),
                    'frame_button' => __( 'Choose File', 'ogo' ),
                ),
            )
        ) );

        // Banner background color
        $wp_customize->add_setting('portfolio_banner_bgcolor', 
            array(
                'default' => $this->defaults['portfolio_banner_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_banner_bgcolor',
            array(
                'label' => esc_html__('Banner Background Color', 'ogo'),
                'settings' => 'single_post_bgcolor', 
                'priority' => 10, 
                'section' => 'portfolio_single_layout_section', 
            )
        ));
		
		// Page background image
		$wp_customize->add_setting( 'portfolio_page_bgimg',
            array(
                'default' => $this->defaults['portfolio_page_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'portfolio_page_bgimg',
            array(
                'label' => __( 'Page / Post Background Image', 'ogo' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'ogo' ),
                    'change' => __( 'Change File', 'ogo' ),
                    'default' => __( 'Default', 'ogo' ),
                    'remove' => __( 'Remove', 'ogo' ),
                    'placeholder' => __( 'No file selected', 'ogo' ),
                    'frame_title' => __( 'Select File', 'ogo' ),
                    'frame_button' => __( 'Choose File', 'ogo' ),
                ),
            )
        ) );
		
		$wp_customize->add_setting('portfolio_page_bgcolor', 
            array(
                'default' => $this->defaults['portfolio_page_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_page_bgcolor',
            array(
                'label' => esc_html__('Page / Post Background Color', 'ogo'),
                'settings' => 'single_post_page_bgcolor', 
                'section' => 'portfolio_single_layout_section', 
            )
        ));

        // Related Post
		$wp_customize->add_setting('portfolio_related', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'portfolio_related', array(
            'label' => esc_html__( 'Related Portfolio Settings', 'ogo' ),
            'section' => 'portfolio_single_layout_section',
        )));
		
		$wp_customize->add_setting( 'show_related_portfolio',
            array(
                'default' => $this->defaults['show_related_portfolio'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_related_portfolio',
            array(
                'label' => esc_html__( 'Show Related Portfolio', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
            )
        ));

		$wp_customize->add_setting( 'portfolio_related_title',
            array(
                'default' => $this->defaults['portfolio_related_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'portfolio_related_title',
            array(
                'label' => esc_html__( 'Related Title', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'textarea',
                'active_callback'   => 'rttheme_is_related_portfolio_enabled',
            )
        );
        $wp_customize->add_setting( 'portfolio_related_title_font',
            array(
                'default' => $this->defaults['portfolio_related_title_font'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'portfolio_related_title_font',
            array(
                'label' => __( 'Title Font', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_related_portfolio_enabled',
            )
        );
        $wp_customize->add_setting('portfolio_related_title_color', 
            array(
                'default' => $this->defaults['portfolio_related_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_related_title_color',
            array(
                'label' => esc_html__('Title Color', 'ogo'),
                'settings' => 'portfolio_related_title_color', 
                'priority' => 10, 
                'section' => 'portfolio_single_layout_section', 
                'active_callback'   => 'rttheme_is_related_portfolio_enabled',
            )
        ));
        // Related Sub Title
        $wp_customize->add_setting( 'portfolio_related_sub_title',
            array(
                'default' => $this->defaults['portfolio_related_sub_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'portfolio_related_sub_title',
            array(
                'label' => esc_html__( 'Related Sub Title', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'textarea',
                'active_callback'   => 'rttheme_is_related_portfolio_enabled',
            )
        );
        $wp_customize->add_setting( 'portfolio_related_sub_font',
            array(
                'default' => $this->defaults['portfolio_related_sub_font'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'portfolio_related_sub_font',
            array(
                'label' => __( ' Sub Title Font', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_related_portfolio_enabled',
            )
        );
        $wp_customize->add_setting('portfolio_related_sub_color', 
            array(
                'default' => $this->defaults['portfolio_related_sub_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_related_sub_color',
            array(
                'label' => esc_html__('Sub Title Color', 'ogo'),
                'settings' => 'portfolio_related_sub_color', 
                'priority' => 10, 
                'section' => 'portfolio_single_layout_section', 
                'active_callback'   => 'rttheme_is_related_portfolio_enabled',
            )
        ));
    // Related Content
        $wp_customize->add_setting( 'portfolio_related_content',
            array(
                'default' => $this->defaults['portfolio_related_content'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'portfolio_related_content',
            array(
                'label' => esc_html__( 'Related Content', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'textarea',
                'active_callback'   => 'rttheme_is_related_portfolio_enabled',
            )
        );
        $wp_customize->add_setting( 'portfolio_related_content_font',
            array(
                'default' => $this->defaults['portfolio_related_content_font'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'portfolio_related_content_font',
            array(
                'label' => __( ' Content Font', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_related_portfolio_enabled',
            )
        );
        $wp_customize->add_setting('portfolio_related_content_color', 
            array(
                'default' => $this->defaults['portfolio_related_content_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_related_content_color',
            array(
                'label' => esc_html__('Content Color', 'ogo'),
                'settings' => 'portfolio_related_content_color', 
                'priority' => 10, 
                'section' => 'portfolio_single_layout_section', 
                'active_callback'   => 'rttheme_is_related_portfolio_enabled',
            )
        ));
        $wp_customize->add_setting( 'portfolio_related_title_padding_bottom',
            array(
                'default' => $this->defaults['portfolio_related_title_padding_bottom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'portfolio_related_title_padding_bottom',
            array(
                'label' => __( 'Content Padding Bottom', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_related_portfolio_enabled',
            )
        );

		$wp_customize->add_setting( 'show_related_portfolio_number',
            array(
                'default' => $this->defaults['show_related_portfolio_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'show_related_portfolio_number',
            array(
                'label' => __( 'Show Related Portfolio Number', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_related_portfolio_enabled',
            )
        );
        $wp_customize->add_setting( 'related_portfolio_auto_play',
            array(
                'default' => $this->defaults['related_portfolio_auto_play'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'related_portfolio_auto_play',
            array(
                'label' => __( 'Auto Play On/Off', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'active_callback'   => 'rttheme_is_related_portfolio_enabled',
            )
        ) );
        $wp_customize->add_setting( 'related_portfolio_auto_play_delay',
            array(
                'default' => $this->defaults['related_portfolio_auto_play_delay'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_portfolio_auto_play_delay',
            array(
                'label' => __( 'Auto Play Delay', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_related_portfolio_enabled',
            )
        ); 
        $wp_customize->add_setting( 'related_portfolio_auto_play_speed',
            array(
                'default' => $this->defaults['related_portfolio_auto_play_speed'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_portfolio_auto_play_speed',
            array(
                'label' => __( 'Sliding Speed', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_related_portfolio_enabled',
            )
        ); 
		// Post Query 
        $wp_customize->add_setting( 'related_portfolio_query',
            array(
                'default' => $this->defaults['related_portfolio_query'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'related_portfolio_query',
            array(
                'label' => __( 'Query Type', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'description' => esc_html__( 'Portfolio Query', 'ogo' ),
                'type' => 'select',
                'choices' => array(
                    'cat' => esc_html__( 'Portfolios in the same Categories', 'ogo' ),
                    'tag' => esc_html__( 'Portfolios in the same Tags', 'ogo' ),
                    'author' => esc_html__( 'Portfolios by the same Author', 'ogo' ),
                ),
                'active_callback'   => 'rttheme_is_related_portfolio_enabled',
            )
        );
		
		// Display post Order
        $wp_customize->add_setting( 'related_portfolio_sort',
            array(
                'default' => $this->defaults['related_portfolio_sort'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'related_portfolio_sort',
            array(
                'label' => __( 'Sort Order', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'description' => esc_html__( 'Display portfolios Order', 'ogo' ),
                'type' => 'select',
                'choices' => array(
                    'recent' => esc_html__( 'Recent Portfolios', 'ogo' ),
                    'rand' => esc_html__( 'Random Portfolios', 'ogo' ),
                    'modified' => esc_html__( 'Last Modified Portfolios', 'ogo' ),
                    'popular' => esc_html__( 'Most Commented Portfolios', 'ogo' ),
                    'views' => esc_html__( 'Most Viewed Portfolios', 'ogo' ),
                ),
                'active_callback'   => 'rttheme_is_related_portfolio_enabled',
            )
        );

    // Portfolio single cta
        $wp_customize->add_setting('portfolio_cta', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'portfolio_cta', array(
            'label' => esc_html__( ' CTA Settings', 'ogo' ),
            'section' => 'portfolio_single_layout_section',
        )));

		$wp_customize->add_setting( 'show_cta_portfolio',
            array(
                'default' => $this->defaults['show_cta_portfolio'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_cta_portfolio',
            array(
                'label' => esc_html__( 'Show CTA', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
            )
        ));
            // Content padding top
        $wp_customize->add_setting( 'cta_padding_top',
            array(
                'default' => $this->defaults['cta_padding_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'cta_padding_top',
            array(
                'label' => __( 'Padding Top', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_cta_portfolio_enabled',
            )
        );
        // Content padding bottom
        $wp_customize->add_setting( 'cta_padding_bottom',
            array(
                'default' => $this->defaults['cta_padding_bottom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'cta_padding_bottom',
            array(
                'label' => __( 'Padding Bottom', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_cta_portfolio_enabled',
            )
        );
        
        //  BG Type 
        // $wp_customize->add_setting( 'cta_bgtype',
        //     array(
        //         'default' => $this->defaults['cta_bgtype'],
        //         'transport' => 'refresh',
        //         'sanitize_callback' => 'rttheme_radio_sanitization',
        //     )
        // );
        // $wp_customize->add_control( 'cta_bgtype',
        //     array(
        //         'label' => __( 'Background Type', 'ogo' ),
        //         'section' => 'portfolio_single_layout_section',
        //         'description' => esc_html__( 'This is background type.', 'ogo' ),
        //         'type' => 'select',
        //         'choices' => array(
        //             'bgimg' => esc_html__( 'BG Image', 'ogo' ),
        //             'bgcolor' => esc_html__( 'BG Color', 'ogo' ),
        //         ),
        //         'active_callback'   => 'rttheme_is_cta_portfolio_enabled',
        //     )
        // );

        $wp_customize->add_setting( 'cta_bgimg',
            array(
                'default' => $this->defaults['cta_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'cta_bgimg',
            array(
                'label' => __( 'Background Image', 'ogo' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'ogo' ),
                    'change' => __( 'Change File', 'ogo' ),
                    'default' => __( 'Default', 'ogo' ),
                    'remove' => __( 'Remove', 'ogo' ),
                    'placeholder' => __( 'No file selected', 'ogo' ),
                    'frame_title' => __( 'Select File', 'ogo' ),
                    'frame_button' => __( 'Choose File', 'ogo' ),
                ),
                'active_callback'   => 'rttheme_is_cta_portfolio_enabled',
            )
        ) );
        // CTA Background Overlay
        $wp_customize->add_setting( 'show_cta_bg_overlay',
            array(
                'default' => $this->defaults['show_cta_bg_overlay'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_cta_bg_overlay',
            array(
                'label' => esc_html__( 'Show Background Overlay', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'active_callback'   => 'rttheme_is_cta_portfolio_enabled',
            )
        ));
        $wp_customize->add_setting('cta_bg_overlay_color', 
            array(
                'default' => $this->defaults['cta_bg_overlay_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_bg_overlay_color',
            array(
                'label' => esc_html__('Background Overlay', 'ogo'),
                'settings' => 'cta_bg_overlay_color', 
                'priority' => 10, 
                'section' => 'portfolio_single_layout_section', 
                'active_callback'   => 'rttheme_is_cta_bg_overlay_enabled',
            )
        ));
        $wp_customize->add_setting( 'cta_bg_overlay_opacity',
            array(
                'default' => $this->defaults['cta_bg_overlay_opacity'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'cta_bg_overlay_opacity',
            array(
                'label' => __( 'Opacity', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_cta_bg_overlay_enabled',
            )
        );

        // background color
        $wp_customize->add_setting('cta_bgcolor', 
            array(
                'default' => $this->defaults['cta_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_bgcolor',
            array(
                'label' => esc_html__('Background Color', 'ogo'),
                'settings' => 'cta_bgcolor', 
                'priority' => 10, 
                'section' => 'portfolio_single_layout_section', 
                'active_callback'   => 'rttheme_is_cta_portfolio_enabled',
            )
        ));

        // cta Title

        $wp_customize->add_setting( 'portfolio_cta_title',
            array(
                'default' => $this->defaults['portfolio_cta_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'portfolio_cta_title',
            array(
                'label' => esc_html__( 'Title', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'textarea',
                'active_callback'   => 'rttheme_is_cta_portfolio_enabled',
            )
        );
        $wp_customize->add_setting( 'cta_title_font',
            array(
                'default' => $this->defaults['cta_title_font'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'cta_title_font',
            array(
                'label' => __( 'Title Font', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_cta_portfolio_enabled',
            )
        );
        $wp_customize->add_setting('cta_title_color', 
            array(
                'default' => $this->defaults['cta_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_title_color',
            array(
                'label' => esc_html__('Title Color', 'ogo'),
                'settings' => 'cta_title_color', 
                'priority' => 10, 
                'section' => 'portfolio_single_layout_section', 
                'active_callback'   => 'rttheme_is_cta_portfolio_enabled',
            )
        ));
        $wp_customize->add_setting( 'portfolio_cta_btn_text',
            array(
                'default' => $this->defaults['portfolio_cta_btn_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'portfolio_cta_btn_text',
            array(
                'label' => esc_html__( 'Button Text', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'textarea',
                'active_callback'   => 'rttheme_is_cta_portfolio_enabled',
            )
        );
        $wp_customize->add_setting( 'portfolio_cta_btn_link',
            array(
                'default' => $this->defaults['portfolio_cta_btn_link'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'portfolio_cta_btn_link',
            array(
                'label' => esc_html__( 'Button link', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'link',
                'active_callback'   => 'rttheme_is_cta_portfolio_enabled',
            )
        );
        $wp_customize->add_setting( 'cta_btn_font',
            array(
                'default' => $this->defaults['cta_btn_font'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'cta_btn_font',
            array(
                'label' => __( 'Button Text Font', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_cta_portfolio_enabled',
            )
        );
        $wp_customize->add_setting('cta_btn_color', 
            array(
                'default' => $this->defaults['cta_btn_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_btn_color',
            array(
                'label' => esc_html__('Button Color', 'ogo'),
                'settings' => 'cta_btn_color', 
                'priority' => 10, 
                'section' => 'portfolio_single_layout_section', 
                'active_callback'   => 'rttheme_is_cta_portfolio_enabled',
            )
        ));
        $wp_customize->add_setting('cta_btn_bgcolor', 
            array(
                'default' => $this->defaults['cta_btn_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_btn_bgcolor',
            array(
                'label' => esc_html__('Button Background Color', 'ogo'),
                'settings' => 'cta_btn_bgcolor', 
                'priority' => 10, 
                'section' => 'portfolio_single_layout_section', 
                'active_callback'   => 'rttheme_is_cta_portfolio_enabled',
            )
        ));
        $wp_customize->add_setting('cta_btn_hover_bgcolor', 
            array(
                'default' => $this->defaults['cta_btn_hover_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_btn_hover_bgcolor',
            array(
                'label' => esc_html__('Background Hover Color', 'ogo'),
                'settings' => 'cta_btn_hover_bgcolor', 
                'priority' => 10, 
                'section' => 'portfolio_single_layout_section', 
                'active_callback'   => 'rttheme_is_cta_portfolio_enabled',
            )
        ));
        $wp_customize->add_setting( 'cta_btn_borderradius',
            array(
                'default' => $this->defaults['cta_btn_borderradius'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'cta_btn_borderradius',
            array(
                'label' => __( 'Border Radius', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_cta_portfolio_enabled',
            )
        );
        $wp_customize->add_setting( 'cta_btn_padding_top_bottom',
            array(
                'default' => $this->defaults['cta_btn_padding_top_bottom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'cta_btn_padding_top_bottom',
            array(
                'label' => __( 'Padding Top & Bottom', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_cta_portfolio_enabled',
            )
        );
        $wp_customize->add_setting( 'cta_btn_padding_left_right',
            array(
                'default' => $this->defaults['cta_btn_padding_left_right'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'cta_btn_padding_left_right',
            array(
                'label' => __( 'Padding Left & Right', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_cta_portfolio_enabled',
            )
        );
        $wp_customize->add_setting( 'cta_btn_margin_top',
            array(
                'default' => $this->defaults['cta_btn_margin_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'cta_btn_margin_top',
            array(
                'label' => __( 'Margin Top', 'ogo' ),
                'section' => 'portfolio_single_layout_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_cta_portfolio_enabled',
            )
        );
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new OgoTheme_Portfolio_Single_Layout_Settings();
}
