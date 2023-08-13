<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
namespace addonmonster\ogo\Customizer\Settings;

use addonmonster\ogo\Customizer\OgoTheme_Customizer;
use addonmonster\ogo\Customizer\Controls\Customizer_Switch_Control;
use addonmonster\ogo\Customizer\Controls\Customizer_Separator_Control;
use addonmonster\ogo\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class OgoTheme_Blog_Single_Layout_Settings extends OgoTheme_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Register Page Controls
        add_action( 'customize_register', array( $this, 'register_blog_single_layout_controls' ) );
	}

    public function register_blog_single_layout_controls( $wp_customize ) {

        $wp_customize->add_setting( 'single_post_layout',
            array(
                'default' => $this->defaults['single_post_layout'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'single_post_layout',
            array(
                'label' => __( 'Layout', 'ogo' ),
                'description' => esc_html__( 'Select the default template layout for Pages', 'ogo' ),
                'section' => 'post_single_layout_section',
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
            'section' => 'post_single_layout_section',
        )));
		
		// Content padding top
        $wp_customize->add_setting( 'single_post_padding_top',
            array(
                'default' => $this->defaults['single_post_padding_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'single_post_padding_top',
            array(
                'label' => __( 'Content Padding Top', 'ogo' ),
                'section' => 'post_single_layout_section',
                'type' => 'number',
            )
        );
        // Content padding bottom
        $wp_customize->add_setting( 'single_post_padding_bottom',
            array(
                'default' => $this->defaults['single_post_padding_bottom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'single_post_padding_bottom',
            array(
                'label' => __( 'Content Padding Bottom', 'ogo' ),
                'section' => 'post_single_layout_section',
                'type' => 'number',
            )
        );
		
		$wp_customize->add_setting( 'single_post_banner',
            array(
                'default' => $this->defaults['single_post_banner'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'single_post_banner',
            array(
                'label' => __( 'Banner', 'ogo' ),
                'section' => 'post_single_layout_section',
            )
        ) );
		
		$wp_customize->add_setting( 'single_post_breadcrumb',
            array(
                'default' => $this->defaults['single_post_breadcrumb'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'single_post_breadcrumb',
            array(
                'label' => __( 'Breadcrumb', 'ogo' ),
                'section' => 'post_single_layout_section',
            )
        ) );
		
        // Banner BG Type 
        $wp_customize->add_setting( 'single_post_bgtype',
            array(
                'default' => $this->defaults['single_post_bgtype'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'single_post_bgtype',
            array(
                'label' => __( 'Banner Background Type', 'ogo' ),
                'section' => 'post_single_layout_section',
                'description' => esc_html__( 'This is banner background type.', 'ogo' ),
                'type' => 'select',
                'choices' => array(
                    'bgimg' => esc_html__( 'BG Image', 'ogo' ),
                    'bgcolor' => esc_html__( 'BG Color', 'ogo' ),
                ),
            )
        );

        $wp_customize->add_setting( 'single_post_bgimg',
            array(
                'default' => $this->defaults['single_post_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'single_post_bgimg',
            array(
                'label' => __( 'Banner Background Image', 'ogo' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'ogo' ),
                'section' => 'post_single_layout_section',
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
        $wp_customize->add_setting('single_post_bgcolor', 
            array(
                'default' => $this->defaults['single_post_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_post_bgcolor',
            array(
                'label' => esc_html__('Banner Background Color', 'ogo'),
                'settings' => 'single_post_bgcolor', 
                'priority' => 10, 
                'section' => 'post_single_layout_section', 
            )
        ));
		
		// Page background image
		$wp_customize->add_setting( 'single_post_page_bgimg',
            array(
                'default' => $this->defaults['single_post_page_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'single_post_page_bgimg',
            array(
                'label' => __( 'Page / Post Background Image', 'ogo' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'ogo' ),
                'section' => 'post_single_layout_section',
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
		
		$wp_customize->add_setting('single_post_page_bgcolor', 
            array(
                'default' => $this->defaults['single_post_page_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_post_page_bgcolor',
            array(
                'label' => esc_html__('Page / Post Background Color', 'ogo'),
                'settings' => 'single_post_page_bgcolor', 
                'section' => 'post_single_layout_section', 
            )
        ));
        

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new OgoTheme_Blog_Single_Layout_Settings();
}
