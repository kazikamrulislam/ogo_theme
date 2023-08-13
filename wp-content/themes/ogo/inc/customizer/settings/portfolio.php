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
class OgoTheme_Portfolio_Post_Settings extends OgoTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_portfolio_post_controls' ) );
	}

    /**
     * Gallery Post Controls
     */
    public function register_portfolio_post_controls( $wp_customize ) {
		
        $wp_customize->add_setting( 'portfolio_slug',
            array(
                'default' => $this->defaults['portfolio_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'portfolio_slug',
            array(
                'label' => __( 'Portfolios Slug', 'ogo' ),
                'section' => 'rttheme_portfolio_settings',
                'type' => 'text',
            )
        );
        $wp_customize->add_setting( 'portfolio_cat_slug',
            array(
                'default' => $this->defaults['portfolio_cat_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'portfolio_cat_slug',
            array(
                'label' => __( 'Portfolios Category Slug', 'ogo' ),
                'section' => 'rttheme_portfolio_settings',
                'type' => 'text',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new OgoTheme_Portfolio_Post_Settings();
}
