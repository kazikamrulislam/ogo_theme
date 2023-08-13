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
class OgoTheme_Faq_Post_Settings extends OgoTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_faq_post_controls' ) );
	}

    /**
     * Gallery Post Controls
     */
    public function register_faq_post_controls( $wp_customize ) {
		
        $wp_customize->add_setting( 'faq_slug',
            array(
                'default' => $this->defaults['faq_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'faq_slug',
            array(
                'label' => __( 'FAQs Slug', 'ogo' ),
                'section' => 'rttheme_faq_settings',
                'type' => 'text',
            )
        );
        $wp_customize->add_setting( 'faq_cat_slug',
            array(
                'default' => $this->defaults['faq_cat_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'faq_cat_slug',
            array(
                'label' => __( 'FAQs Category Slug', 'ogo' ),
                'section' => 'rttheme_faq_settings',
                'type' => 'text',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new OgoTheme_Faq_Post_Settings();
}
