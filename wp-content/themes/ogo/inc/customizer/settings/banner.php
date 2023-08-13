<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
namespace addonmonster\ogo\Customizer\Settings;

use addonmonster\ogo\Customizer\OgoTheme_Customizer;
use addonmonster\ogo\Customizer\Controls\Customizer_Separator_Control;
use addonmonster\ogo\Customizer\Controls\Customizer_Switch_Control;
use addonmonster\ogo\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class OgoTheme_Banner_Settings extends OgoTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_banner_controls' ) );
	}

    public function register_banner_controls( $wp_customize ) {

        // Banner Style

        $wp_customize->add_setting( 'banner_style',
            array(
                'default' => $this->defaults['banner_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'banner_style',
            array(
                'label' => __( 'Banner Layout', 'ogo' ),
                'section' => 'banner_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/banner-1.png',
                        'name' => __( 'Layout 1', 'ogo' )
                    ),                  
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/banner-2.png',
                        'name' => __( 'Layout 2', 'ogo' )
                    ),
                    '3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/banner-3.png',
                        'name' => __( 'Layout 3', 'ogo' )
                    ),
                    '4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/banner-4.png',
                        'name' => __( 'Layout 4', 'ogo' )
                    ),
                    '5' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/banner-5.png',
                        'name' => __( 'Layout 5', 'ogo' )
                    ),
                )
            )
        ) );

        // $wp_customize->add_setting( 'banner_breadcrumb',
        //     array(
        //         'default' => $this->defaults['banner_breadcrumb'],
        //         'transport' => 'refresh',
        //         'sanitize_callback' => 'rttheme_switch_sanitization',
        //     )
        // );
        // $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'banner_breadcrumb',
        //     array(
        //         'label' => __( 'Breadcrumb', 'ogo' ),
        //         'section' => 'banner_section',
        //     )
        // ) );
		// Banner Color	
		$wp_customize->add_setting('breadcrumb_link_color', 
            array(
                'default' => $this->defaults['breadcrumb_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumb_link_color',
            array(
                'label' => esc_html__('Breadcrumb Link Color', 'ogo'),
                'section' => 'banner_section', 
                // 'active_callback'   => 'rttheme_is_banner_breadcrumb_enabled',
            )
        ));
		
		$wp_customize->add_setting('breadcrumb_link_hover_color', 
            array(
                'default' => $this->defaults['breadcrumb_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumb_link_hover_color',
            array(
                'label' => esc_html__('Breadcrumb Link Hover Color', 'ogo'),
                'section' => 'banner_section', 
                // 'active_callback'   => 'rttheme_is_banner_breadcrumb_enabled',
            )
        ));
		
		$wp_customize->add_setting('breadcrumb_active_color', 
            array(
                'default' => $this->defaults['breadcrumb_active_color'],
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumb_active_color',
            array(
                'label' => esc_html__('Active Breadcrumb Color', 'ogo'),
                'section' => 'banner_section', 
                // 'active_callback'   => 'rttheme_is_banner_breadcrumb_enabled',
            )
        ));
		
		$wp_customize->add_setting('breadcrumb_seperator_color', 
            array(
                'default' => $this->defaults['breadcrumb_seperator_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumb_seperator_color',
            array(
                'label' => esc_html__('Breadcrumb Seperator Color', 'ogo'),
                'section' => 'banner_section', 
                // 'active_callback'   => 'rttheme_is_banner_breadcrumb_enabled',
            )
        ));		
		
		$wp_customize->add_setting( 'banner_bg_color',
            array(
                'default' => $this->defaults['banner_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'banner_bg_color',
            array(
                'label' => __( 'Banner Background Color', 'ogo' ),
                'section' => 'banner_section',
            )
        ));

        // Banner 1 Image

        $wp_customize->add_setting( 'banner1_bgimg',
            array(
                'default' => $this->defaults['banner1_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'banner1_bgimg',
            array(
                'label' => __( 'Banner Image', 'ogo' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'ogo' ),
                'section' => 'banner_section',
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
                'active_callback'   => 'show_banner1_img',
            )
        ) );

        // Banner 2 Image
        $wp_customize->add_setting( 'banner2_bgimg',
            array(
                'default' => $this->defaults['banner2_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'banner2_bgimg',
            array(
                'label' => __( 'Banner Image', 'ogo' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'ogo' ),
                'section' => 'banner_section',
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
                'active_callback'   => 'show_banner2_img',
            )
        ) );

        // Banner 3 Image
        $wp_customize->add_setting( 'banner3_bgimg',
            array(
                'default' => $this->defaults['banner3_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'banner3_bgimg',
            array(
                'label' => __( 'Banner Image', 'ogo' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'ogo' ),
                'section' => 'banner_section',
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
                'active_callback'   => 'show_banner3_img',
            )
        ) );

        // Banner 4 Image
        $wp_customize->add_setting( 'banner4_bgimg',
            array(
                'default' => $this->defaults['banner4_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'banner4_bgimg',
            array(
                'label' => __( 'Banner Image', 'ogo' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'ogo' ),
                'section' => 'banner_section',
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
                'active_callback'   => 'show_banner4_img',
            )
        ) );

        // Banner 5 Image
        $wp_customize->add_setting( 'banner5_bgimg',
            array(
                'default' => $this->defaults['banner5_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'banner5_bgimg',
            array(
                'label' => __( 'Banner Image', 'ogo' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'ogo' ),
                'section' => 'banner_section',
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
                'active_callback'   => 'show_banner5_img',
            )
        ) );

        $wp_customize->add_setting( 'banner_content',
            array(
                'default' => $this->defaults['banner_content'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'banner_content',
            array(
                'label' => esc_html__( ' Content', 'ogo' ),
                'section' => 'banner_section',
                'type' => 'textarea',
                'active_callback'   => 'show_banner_content',
            )
        );

		// Banner padding top
        $wp_customize->add_setting( 'banner_top_padding',
            array(
                'default' => $this->defaults['banner_top_padding'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'banner_top_padding',
            array(
                'label' => __( 'Banner Padding Top', 'ogo' ),
                'section' => 'banner_section',
                'type' => 'number',
            )
        );
        // Banner padding bottom
        $wp_customize->add_setting( 'banner_bottom_padding',
            array(
                'default' => $this->defaults['banner_bottom_padding'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'banner_bottom_padding',
            array(
                'label' => __( 'Banner Padding Top', 'ogo' ),
                'section' => 'banner_section',
                'type' => 'number',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new OgoTheme_Banner_Settings();
}
