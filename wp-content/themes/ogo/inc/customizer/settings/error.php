<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
namespace addonmonster\ogo\Customizer\Settings;

use addonmonster\ogo\Customizer\OgoTheme_Customizer;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class OgoTheme_Error_Settings extends OgoTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_error_controls' ) );
	}

    public function register_error_controls( $wp_customize ) {
		// Error image
        $wp_customize->add_setting( 'error_image',
            array(
                'default' => $this->defaults['error_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'error_image',
            array(
                'label' => __( 'Error Image', 'ogo' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'ogo' ),
                'section' => 'error_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'ogo' ),
                    'change' => __( 'Change File', 'ogo' ),
                    'default' => __( 'Default', 'ogo' ),
                    'remove' => __( 'Remove', 'ogo' ),
                    'placeholder' => __( 'No file selected', 'ogo' ),
                    'frame_title' => __( 'Select File', 'ogo' ),
                    'frame_button' => __( 'Choose File', 'ogo' ),
                )
            )
        ) );
		
        // Error Text
        $wp_customize->add_setting( 'error_text1',
            array(
                'default' => $this->defaults['error_text1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'error_text1',
            array(
                'label' => __( 'Error Heading', 'ogo' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
        $wp_customize->add_setting( 'error_text2',
            array(
                'default' => $this->defaults['error_text2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field'
            )
        );
        $wp_customize->add_control( 'error_text2',
            array(
                'label' => __( 'Error Text', 'ogo' ),
                'section' => 'error_section',
                'type' => 'textarea',
            )
        );
        // Button Text
        $wp_customize->add_setting( 'error_buttontext',
            array(
                'default' => $this->defaults['error_buttontext'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'error_buttontext',
            array(
                'label' => __( 'Button Text', 'ogo' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting('error_text1_color', 
            array(
                'default' => $this->defaults['error_text1_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_text1_color',
            array(
                'label' => esc_html__('Error Heading Color', 'ogo'),
                'section' => 'error_section', 
            )
        ));
		
		$wp_customize->add_setting('error_text2_color', 
            array(
                'default' => $this->defaults['error_text2_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_text2_color',
            array(
                'label' => esc_html__('Error Text Color', 'ogo'),
                'section' => 'error_section', 
            )
        ));

        /*Animation*/
        $wp_customize->add_setting( 'error_animation',
            array(
                'default' => $this->defaults['error_animation'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'error_animation',
            array(
                'label' => __( 'Animation On/Off', 'ogo' ),
                'section' => 'error_section',
                'type' => 'select',
                'choices' => array(
                    'wow' => esc_html__( 'Animation On', 'ogo' ),
                    'hide' => esc_html__( 'Animation Off', 'ogo' ),
                ),
            )
        );

        $wp_customize->add_setting( 'error_animation_effect',
            array(
                'default' => $this->defaults['error_animation_effect'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'error_animation_effect',
            array(
                'label' => __( 'Entrance Animation', 'ogo' ),
                'section' => 'error_section',
                'type' => 'select',
                'choices' => array(
                    'none' => esc_html__( 'none', 'ogo' ),
                    'bounce' => esc_html__( 'bounce', 'ogo' ),
                    'flash' => esc_html__( 'flash', 'ogo' ),
                    'pulse' => esc_html__( 'pulse', 'ogo' ),
                    'rubberBand' => esc_html__( 'rubberBand', 'ogo' ),
                    'shakeX' => esc_html__( 'shakeX', 'ogo' ),
                    'shakeY' => esc_html__( 'shakeY', 'ogo' ),
                    'headShake' => esc_html__( 'headShake', 'ogo' ),
                    'swing' => esc_html__( 'swing', 'ogo' ),
                    'fadeIn' => esc_html__( 'fadeIn', 'ogo' ),
                    'fadeInDown' => esc_html__( 'fadeInDown', 'ogo' ),
                    'fadeInLeft' => esc_html__( 'fadeInLeft', 'ogo' ),
                    'fadeInRight' => esc_html__( 'fadeInRight', 'ogo' ),
                    'fadeInUp' => esc_html__( 'fadeInUp', 'ogo' ),
                    'bounceIn' => esc_html__( 'bounceIn', 'ogo' ),
                    'bounceInDown' => esc_html__( 'bounceInDown', 'ogo' ),
                    'bounceInLeft' => esc_html__( 'bounceInLeft', 'ogo' ),
                    'bounceInRight' => esc_html__( 'bounceInRight', 'ogo' ),
                    'bounceInUp' => esc_html__( 'bounceInUp', 'ogo' ),
                    'slideInDown' => esc_html__( 'slideInDown', 'ogo' ),
                    'slideInLeft' => esc_html__( 'slideInLeft', 'ogo' ),
                    'slideInRight' => esc_html__( 'slideInRight', 'ogo' ),
                    'slideInUp' => esc_html__( 'slideInUp', 'ogo' ),
                ),
            )
        );
		
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new OgoTheme_Error_Settings();
}
