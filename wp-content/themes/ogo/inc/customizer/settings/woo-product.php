<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
namespace addonmonster\ogo\Customizer\Settings;

use addonmonster\ogo\Customizer\OgoTheme_Customizer;
use addonmonster\ogo\Customizer\Controls\Customizer_Switch_Control;
use addonmonster\ogo\Customizer\Controls\Customizer_Image_Radio_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class OgoTheme_Woo_Product_Settings extends OgoTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_woo_product_controls' ) );
	}

    public function register_woo_product_controls( $wp_customize ) {
		
        // Social
        $wp_customize->add_setting( 'wc_product_social_icon',
            array(
                'default' => $this->defaults['wc_product_social_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_product_social_icon',
            array(
                'label' => __( 'Social', 'ogo' ),
                'section' => 'product_layout_section',
            )
        ) );

        // Meta
        $wp_customize->add_setting( 'wc_product_meta',
            array(
                'default' => $this->defaults['wc_product_meta'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_product_meta',
            array(
                'label' => __( 'Meta', 'ogo' ),
                'section' => 'product_layout_section',
            )
        ) );

		// Wishlist
        $wp_customize->add_setting( 'wc_product_wishlist_icon',
            array(
                'default' => $this->defaults['wc_product_wishlist_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_product_wishlist_icon',
            array(
                'label' => __( 'Wishlist', 'ogo' ),
                'section' => 'product_layout_section',
            )
        ) );
		
        // Compare
        $wp_customize->add_setting( 'wc_product_compare_icon',
            array(
                'default' => $this->defaults['wc_product_compare_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_product_compare_icon',
            array(
                'label' => __( 'Compare', 'ogo' ),
                'section' => 'product_layout_section',
            )
        ) );

        /*Related product*/
        $wp_customize->add_setting( 'related_woo_product',
            array(
                'default' => $this->defaults['related_woo_product'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'related_woo_product',
            array(
                'label' => __( 'Related Product', 'ogo' ),
                'section' => 'product_layout_section',
            )
        ));

        $wp_customize->add_setting( 'related_product_title',
            array(
                'default' => $this->defaults['related_product_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_product_title',
            array(
                'label' => __( 'Related Product Title', 'ogo' ),
                'section' => 'product_layout_section',
                'type' => 'text',
                'active_callback'   => 'rttheme_is_related_woo_enabled',
            )
        );
        $wp_customize->add_setting( 'related_shop_auto_play',
            array(
                'default' => $this->defaults['related_shop_auto_play'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'related_shop_auto_play',
            array(
                'label' => __( 'Auto Play On/Off', 'ogo' ),
                'section' => 'product_layout_section',
                'active_callback'   => 'rttheme_is_related_woo_enabled',
            )
        ) );
        $wp_customize->add_setting( 'related_shop_auto_play_delay',
            array(
                'default' => $this->defaults['related_shop_auto_play_delay'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_shop_auto_play_delay',
            array(
                'label' => __( 'Auto Play Delay', 'ogo' ),
                'section' => 'product_layout_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_related_shop_delay_enabled',
            )
        ); 
        $wp_customize->add_setting( 'related_shop_auto_play_speed',
            array(
                'default' => $this->defaults['related_shop_auto_play_speed'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_shop_auto_play_speed',
            array(
                'label' => __( 'Sliding Speed', 'ogo' ),
                'section' => 'product_layout_section',
                'type' => 'number',
                'active_callback'   => 'rttheme_is_related_woo_enabled',
            )
        ); 

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new OgoTheme_Woo_Product_Settings();
}
