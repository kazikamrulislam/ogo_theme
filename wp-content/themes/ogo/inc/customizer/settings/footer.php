<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
namespace addonmonster\ogo\Customizer\Settings;

use addonmonster\ogo\Customizer\OgoTheme_Customizer;
use addonmonster\ogo\Customizer\Controls\Customizer_Switch_Control;
use addonmonster\ogo\Customizer\Controls\Customizer_Footer_Control;
use addonmonster\ogo\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class OgoTheme_Footer_Settings extends OgoTheme_Customizer {

    public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_footer_controls' ) );
    }

    public function register_footer_controls( $wp_customize ) {

        // Footer One Widget        
        $wp_customize->add_setting( 'f1_widget_area',
            array(
                'default' => $this->defaults['f1_widget_area'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f1_widget_area',
            array(
                'label' => __( 'Select Total Widget Area', 'ogo' ),
                'section' => 'footer_layout_1',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                ),
            )
        );
        $wp_customize->add_setting( 'f1_wc1',
            array(
                'default' => $this->defaults['f1_wc1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f1_wc1',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_1',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f1_wc2',
            array(
                'default' => $this->defaults['f1_wc2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f1_wc2',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_1',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f1_wc3',
            array(
                'default' => $this->defaults['f1_wc3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f1_wc3',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_1',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f1_wc4',
            array(
                'default' => $this->defaults['f1_wc4'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f1_wc4',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_1',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );

        // Footer Two Widget        
        $wp_customize->add_setting( 'f2_widget_area',
            array(
                'default' => $this->defaults['f2_widget_area'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f2_widget_area',
            array(
                'label' => __( 'Select Total Widget Area', 'ogo' ),
                'section' => 'footer_layout_2',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                ),
            )
        );
        $wp_customize->add_setting( 'f2_wc1',
            array(
                'default' => $this->defaults['f2_wc1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f2_wc1',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_2',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f2_wc2',
            array(
                'default' => $this->defaults['f2_wc2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f2_wc2',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_2',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f2_wc3',
            array(
                'default' => $this->defaults['f2_wc3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f2_wc3',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_2',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f2_wc4',
            array(
                'default' => $this->defaults['f2_wc4'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f2_wc4',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_2',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );

        // Footer Three Widget        
        $wp_customize->add_setting( 'f3_widget_area',
            array(
                'default' => $this->defaults['f3_widget_area'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f3_widget_area',
            array(
                'label' => __( 'Select Total Widget Area', 'ogo' ),
                'section' => 'footer_layout_3',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                ),
            )
        );
        $wp_customize->add_setting( 'f3_wc1',
            array(
                'default' => $this->defaults['f3_wc1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f3_wc1',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_3',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f3_wc2',
            array(
                'default' => $this->defaults['f3_wc2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f3_wc2',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_3',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f3_wc3',
            array(
                'default' => $this->defaults['f3_wc3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f3_wc3',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_3',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f3_wc4',
            array(
                'default' => $this->defaults['f3_wc4'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f3_wc4',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_3',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );

                // Footer Four Widget        
        $wp_customize->add_setting( 'f4_widget_area',
            array(
                'default' => $this->defaults['f4_widget_area'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f4_widget_area',
            array(
                'label' => __( 'Select Total Widget Area', 'ogo' ),
                'section' => 'footer_layout_4',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                ),
            )
        );
        $wp_customize->add_setting( 'f4_wc1',
            array(
                'default' => $this->defaults['f4_wc1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f4_wc1',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_4',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f4_wc2',
            array(
                'default' => $this->defaults['f4_wc2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f4_wc2',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_4',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f4_wc3',
            array(
                'default' => $this->defaults['f4_wc3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f4_wc3',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_4',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f4_wc4',
            array(
                'default' => $this->defaults['f4_wc4'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f4_wc4',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_4',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );

            // Footer Five Widget        
            $wp_customize->add_setting( 'f5_widget_area',
            array(
                'default' => $this->defaults['f5_widget_area'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f5_widget_area',
            array(
                'label' => __( 'Select Total Widget Area', 'ogo' ),
                'section' => 'footer_layout_5',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                ),
            )
        );
        $wp_customize->add_setting( 'f5_wc1',
            array(
                'default' => $this->defaults['f5_wc1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f5_wc1',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_5',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f5_wc2',
            array(
                'default' => $this->defaults['f5_wc2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f5_wc2',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_5',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f5_wc3',
            array(
                'default' => $this->defaults['f5_wc3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f5_wc3',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_5',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f5_wc4',
            array(
                'default' => $this->defaults['f5_wc4'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f5_wc4',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
                'section' => 'footer_layout_5',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'ogo' ),
                    '2' => esc_html__( '2', 'ogo' ),
                    '3' => esc_html__( '3', 'ogo' ),
                    '4' => esc_html__( '4', 'ogo' ),
                    '5' => esc_html__( '5', 'ogo' ),
                    '6' => esc_html__( '6', 'ogo' ),
                    '7' => esc_html__( '7', 'ogo' ),
                    '8' => esc_html__( '8', 'ogo' ),
                    '9' => esc_html__( '9', 'ogo' ),
                    '10' => esc_html__( '10', 'ogo' ),
                    '11' => esc_html__( '11', 'ogo' ),
                    '12' => esc_html__( '12', 'ogo' ),
                ),
                'description' => 'Total Columns 12',
            )
        );

        // Footer Six Widget        
        $wp_customize->add_setting( 'f6_widget_area',
        array(
            'default' => $this->defaults['f6_widget_area'],
            'transport' => 'refresh',
            'sanitize_callback' => 'rttheme_radio_sanitization',
        )
    );
    $wp_customize->add_control( 'f6_widget_area',
        array(
            'label' => __( 'Select Total Widget Area', 'ogo' ),
            'section' => 'footer_layout_6',
            'type' => 'select',
            'choices' => array(
                '1' => esc_html__( '1', 'ogo' ),
                '2' => esc_html__( '2', 'ogo' ),
                '3' => esc_html__( '3', 'ogo' ),
                '4' => esc_html__( '4', 'ogo' ),
            ),
        )
    );
    $wp_customize->add_setting( 'f6_wc1',
        array(
            'default' => $this->defaults['f6_wc1'],
            'transport' => 'refresh',
            'sanitize_callback' => 'rttheme_radio_sanitization',
        )
    );
    $wp_customize->add_control( 'f6_wc1',
        array(
            'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
            'section' => 'footer_layout_6',
            'type' => 'select',
            'choices' => array(
                '1' => esc_html__( '1', 'ogo' ),
                '2' => esc_html__( '2', 'ogo' ),
                '3' => esc_html__( '3', 'ogo' ),
                '4' => esc_html__( '4', 'ogo' ),
                '5' => esc_html__( '5', 'ogo' ),
                '6' => esc_html__( '6', 'ogo' ),
                '7' => esc_html__( '7', 'ogo' ),
                '8' => esc_html__( '8', 'ogo' ),
                '9' => esc_html__( '9', 'ogo' ),
                '10' => esc_html__( '10', 'ogo' ),
                '11' => esc_html__( '11', 'ogo' ),
                '12' => esc_html__( '12', 'ogo' ),
            ),
            'description' => 'Total Columns 12',
        )
    );
    $wp_customize->add_setting( 'f6_wc2',
        array(
            'default' => $this->defaults['f6_wc2'],
            'transport' => 'refresh',
            'sanitize_callback' => 'rttheme_radio_sanitization',
        )
    );
    $wp_customize->add_control( 'f6_wc2',
        array(
            'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
            'section' => 'footer_layout_6',
            'type' => 'select',
            'choices' => array(
                '1' => esc_html__( '1', 'ogo' ),
                '2' => esc_html__( '2', 'ogo' ),
                '3' => esc_html__( '3', 'ogo' ),
                '4' => esc_html__( '4', 'ogo' ),
                '5' => esc_html__( '5', 'ogo' ),
                '6' => esc_html__( '6', 'ogo' ),
                '7' => esc_html__( '7', 'ogo' ),
                '8' => esc_html__( '8', 'ogo' ),
                '9' => esc_html__( '9', 'ogo' ),
                '10' => esc_html__( '10', 'ogo' ),
                '11' => esc_html__( '11', 'ogo' ),
                '12' => esc_html__( '12', 'ogo' ),
            ),
            'description' => 'Total Columns 12',
        )
    );
    $wp_customize->add_setting( 'f6_wc3',
        array(
            'default' => $this->defaults['f6_wc3'],
            'transport' => 'refresh',
            'sanitize_callback' => 'rttheme_radio_sanitization',
        )
    );
    $wp_customize->add_control( 'f6_wc3',
        array(
            'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
            'section' => 'footer_layout_6',
            'type' => 'select',
            'choices' => array(
                '1' => esc_html__( '1', 'ogo' ),
                '2' => esc_html__( '2', 'ogo' ),
                '3' => esc_html__( '3', 'ogo' ),
                '4' => esc_html__( '4', 'ogo' ),
                '5' => esc_html__( '5', 'ogo' ),
                '6' => esc_html__( '6', 'ogo' ),
                '7' => esc_html__( '7', 'ogo' ),
                '8' => esc_html__( '8', 'ogo' ),
                '9' => esc_html__( '9', 'ogo' ),
                '10' => esc_html__( '10', 'ogo' ),
                '11' => esc_html__( '11', 'ogo' ),
                '12' => esc_html__( '12', 'ogo' ),
            ),
            'description' => 'Total Columns 12',
        )
    );
    $wp_customize->add_setting( 'f6_wc4',
        array(
            'default' => $this->defaults['f6_wc4'],
            'transport' => 'refresh',
            'sanitize_callback' => 'rttheme_radio_sanitization',
        )
    );
    $wp_customize->add_control( 'f6_wc4',
        array(
            'label' => __( 'Widget Width( Bootstrap Grid )', 'ogo' ),
            'section' => 'footer_layout_6',
            'type' => 'select',
            'choices' => array(
                '1' => esc_html__( '1', 'ogo' ),
                '2' => esc_html__( '2', 'ogo' ),
                '3' => esc_html__( '3', 'ogo' ),
                '4' => esc_html__( '4', 'ogo' ),
                '5' => esc_html__( '5', 'ogo' ),
                '6' => esc_html__( '6', 'ogo' ),
                '7' => esc_html__( '7', 'ogo' ),
                '8' => esc_html__( '8', 'ogo' ),
                '9' => esc_html__( '9', 'ogo' ),
                '10' => esc_html__( '10', 'ogo' ),
                '11' => esc_html__( '11', 'ogo' ),
                '12' => esc_html__( '12', 'ogo' ),
            ),
            'description' => 'Total Columns 12',
        )
    );


        /*** Footer All ***/ 

        // Footer Style
        $wp_customize->add_setting( 'footer_style',
            array(
                'default' => $this->defaults['footer_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'footer_style',
            array(
                'label' => __( 'Select Footer Default Layout', 'ogo' ),
                'description' => esc_html__( 'You can set default footer form here.', 'ogo' ),
                'section' => 'footer_layout_all',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-1.jpg',
                        'name' => __( 'Layout 1', 'ogo' )
                    ),                  
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-2.jpg',
                        'name' => __( 'Layout 2', 'ogo' )
                    ),
                    '3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-3.jpg',
                        'name' => __( 'Layout 3', 'ogo' )
                    ),
                    '4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-4.jpg',
                        'name' => __( 'Layout 4', 'ogo' )
                    ),
                    '5' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-5.jpg',
                        'name' => __( 'Layout 5', 'ogo' )
                    ),
                    '6' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-6.jpg',
                        'name' => __( 'Layout 6', 'ogo' )
                    ),
                )
            )
        ) );

        // Copyright On/Off
        $wp_customize->add_setting( 'copyright_area',
            array(
                'default' => $this->defaults['copyright_area'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'copyright_area',
            array(
                'label' => esc_html__( 'Footer Copyright', 'ogo' ),
                'section' => 'footer_layout_all',
            )
        ) );

        // Copyright Text
        $wp_customize->add_setting( 'copyright_text',
            array(
                'default' => $this->defaults['copyright_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'copyright_text',
            array(
                'label' => esc_html__( 'Copyright Text', 'ogo' ),
                'section' => 'footer_layout_all',
                'type' => 'textarea',
                'active_callback' => 'rttheme_is_footer_copyright_enabled',
            )
        );

        // Copyright Image
        $wp_customize->add_setting( 'footer_copyright_item_type',
            array(
                'default' => $this->defaults['footer_copyright_item_type'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_copyright_item_type',
            array(
                'label' => __( 'Copyright Image', 'ogo' ),
                'section' => 'footer_layout_all',
                'type' => 'select',
                'choices' => array(
                    'footer_copyright_item_img' => esc_html__( 'Image', 'ogo' ),
                    'footer_copyright_item_text' => esc_html__( 'Text', 'ogo' ),
                ),
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        );

        // Copyright Image/Text
        $wp_customize->add_setting('footer_copyright_item_text', 
            array(
                'default' => $this->defaults['footer_copyright_item_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_copyright_item_text',
            array(
                'label' => esc_html__( 'Copyright Text', 'ogo' ),
                'section' => 'footer_layout_all',
                'type' => 'textarea',
                'active_callback' => 'rttheme_footer_copyright_item_text_type_condition',
            )
        );

        // Copyright Image
        $wp_customize->add_setting( 'footer_copyright_item_img',
            array(
                'default' => $this->defaults['footer_copyright_item_img'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer_copyright_item_img',
            array(
                'label' => __( 'Copyright Image', 'ogo' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'ogo' ),
                'section' => 'footer_layout_all',
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
                'active_callback' => 'rttheme_footer_copyright_item_img_type_condition',
            )
        ) );  



        // Copyright Background Color
        $wp_customize->add_setting('copyright_bg_color', 
            array(
                'default' => $this->defaults['copyright_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_bg_color',
            array(
                'label' => esc_html__('Copyright Background Color', 'ogo'),
                'section' => 'footer_layout_all', 
                'active_callback' => 'rttheme_is_footer_copyright_enabled',
            )
        ));

        // Copyright Text Color
        $wp_customize->add_setting('copyright_text_color', 
            array(
                'default' => $this->defaults['copyright_text_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_text_color',
            array(
                'label' => esc_html__('Copyright Text Color', 'ogo'),
                'section' => 'footer_layout_all', 
                'active_callback' => 'rttheme_is_footer_copyright_enabled',
            )
        ));

        // Copyright Link Color
        $wp_customize->add_setting('copyright_link_color', 
            array(
                'default' => $this->defaults['copyright_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_link_color',
            array(
                'label' => esc_html__('Copyright Link Color', 'ogo'),
                'section' => 'footer_layout_all', 
                'active_callback' => 'rttheme_is_footer_copyright_enabled',
            )
        )); 

        // Copyright Link Hover Color
        $wp_customize->add_setting('copyright_link_hover_color', 
            array(
                'default' => $this->defaults['copyright_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_link_hover_color',
            array(
                'label' => esc_html__('Copyright Link Hover Color', 'ogo'),
                'section' => 'footer_layout_all', 
                'active_callback' => 'rttheme_is_footer_copyright_enabled',
            )
        )); 
        
        /*** Footer One ***/

        // Footer One Title Color 
        $wp_customize->add_setting('footer1_title_color', 
            array(
                'default' => $this->defaults['footer1_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer1_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'ogo'),
                'section' => 'footer_layout_1', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        ));  

        // Footer One Title Shape Color 
        $wp_customize->add_setting('footer1_title_shape_color', 
            array(
                'default' => $this->defaults['footer1_title_shape_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer1_title_shape_color',
            array(
                'label' => esc_html__('Footer Title Shape Color', 'ogo'),
                'section' => 'footer_layout_1', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // Footer One Text Color  
        $wp_customize->add_setting('footer1_text_color', 
            array(
                'default' => $this->defaults['footer1_text_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer1_text_color',
            array(
                'label' => esc_html__('Footer Text Color', 'ogo'),
                'section' => 'footer_layout_1', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // Footer One Link Color        
        $wp_customize->add_setting('footer1_link_color', 
            array(
                'default' => $this->defaults['footer1_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer1_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'ogo'),
                'section' => 'footer_layout_1', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        ));  

        // Footer One Link Hover Color       
        $wp_customize->add_setting('footer1_link_hover_color', 
            array(
                'default' => $this->defaults['footer1_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer1_link_hover_color',
            array(
                'label' => esc_html__('Footer Link Hover Color', 'ogo'),
                'section' => 'footer_layout_1', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // Footer One Link Hover Background Color       
        $wp_customize->add_setting('footer1_link_hover_bg_color', 
            array(
                'default' => $this->defaults['footer1_link_hover_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer1_link_hover_bg_color',
            array(
                'label' => esc_html__('Footer Link Hover Background Color', 'ogo'),
                'section' => 'footer_layout_1', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // Footer One Background Type
        $wp_customize->add_setting( 'footer1_bg_type',
            array(
                'default' => $this->defaults['footer1_bg_type'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer1_bg_type',
            array(
                'label' => __( 'Background Type', 'ogo' ),
                'section' => 'footer_layout_1',
                'description' => esc_html__( 'This is banner background type.', 'ogo' ),
                'type' => 'select',
                'choices' => array(
                    'footer1_bg_color' => esc_html__( 'BG Color', 'ogo' ),
                    'footer1_bg_img' => esc_html__( 'BG Image', 'ogo' ),
                ),
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        );

        // Footer One Background Color
        $wp_customize->add_setting('footer1_bg_color', 
            array(
                'default' => $this->defaults['footer1_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer1_bg_color',
            array(
                'label' => esc_html__('Background Color', 'ogo'),
                'settings' => 'footer1_bg_color', 
                'section' => 'footer_layout_1', 
                'active_callback' => 'rttheme_footer1_bgcolor_type_condition',
            )
        ));

        // Footer One Background Image
        $wp_customize->add_setting( 'footer1_bg_img',
            array(
                'default' => $this->defaults['footer1_bg_img'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer1_bg_img',
            array(
                'label' => __( 'Background Image', 'ogo' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'ogo' ),
                'section' => 'footer_layout_1',
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
                'active_callback' => 'rttheme_footer1_bgimg_type_condition',
            )
        ) );  
        $wp_customize->add_setting( 'footer1_overlay_opacity',
            array(
                'default' => $this->defaults['footer1_overlay_opacity'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'footer1_overlay_opacity',
            array(
                'label' => __( 'Overlay Opacity', 'ogo' ),
                'section' => 'footer_layout_1',
                'description' => esc_html__( 'Default Overlay Opacity 0 ( Input Opacity 0 to 1 Example: 0.75 )', 'ogo' ),
                'type' => 'number',
                'active_callback' => 'rttheme_footer1_bgimg_type_condition',
            )
        );

        /*** Footer Two ***/

        // Footer Two Title Color 
        $wp_customize->add_setting('footer2_title_color', 
            array(
                'default' => $this->defaults['footer2_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer2_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'ogo'),
                'section' => 'footer_layout_2', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // Footer Two Title Shape Color 
        $wp_customize->add_setting('footer2_title_shape_color', 
            array(
                'default' => $this->defaults['footer2_title_shape_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer2_title_shape_color',
            array(
                'label' => esc_html__('Footer Title Shape Color', 'ogo'),
                'section' => 'footer_layout_2', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        ));  

        // Footer Two Text Color  
        $wp_customize->add_setting('footer2_text_color', 
            array(
                'default' => $this->defaults['footer2_text_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer2_text_color',
            array(
                'label' => esc_html__('Footer Text Color', 'ogo'),
                'section' => 'footer_layout_2', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // Footer Two Link Color        
        $wp_customize->add_setting('footer2_link_color', 
            array(
                'default' => $this->defaults['footer2_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer2_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'ogo'),
                'section' => 'footer_layout_2', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        ));  

        // Footer Two Link Hover Color       
        $wp_customize->add_setting('footer2_link_hover_color', 
            array(
                'default' => $this->defaults['footer2_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer2_link_hover_color',
            array(
                'label' => esc_html__('Footer Link Hover Color', 'ogo'),
                'section' => 'footer_layout_2', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 
        // Footer One Link Hover Background Color       
        $wp_customize->add_setting('footer2_link_hover_bg_color', 
            array(
                'default' => $this->defaults['footer2_link_hover_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer2_link_hover_bg_color',
            array(
                'label' => esc_html__('Footer Link Hover Background Color', 'ogo'),
                'section' => 'footer_layout_2', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // Footer Two Background Type
        $wp_customize->add_setting( 'footer2_bg_type',
            array(
                'default' => $this->defaults['footer2_bg_type'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer2_bg_type',
            array(
                'label' => __( 'Background Type', 'ogo' ),
                'section' => 'footer_layout_2',
                'description' => esc_html__( 'This is banner background type.', 'ogo' ),
                'type' => 'select',
                'choices' => array(
                    'footer2_bg_color' => esc_html__( 'BG Color', 'ogo' ),
                    'footer2_bg_img' => esc_html__( 'BG Image', 'ogo' ),
                ),
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        );

        // Footer Two Background Color
        $wp_customize->add_setting('footer2_bg_color', 
            array(
                'default' => $this->defaults['footer2_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer2_bg_color',
            array(
                'label' => esc_html__('Background Color', 'ogo'),
                'settings' => 'footer2_bg_color', 
                'section' => 'footer_layout_2', 
                'active_callback' => 'rttheme_footer2_bgcolor_type_condition',
            )
        ));

        // Footer Two Background Image
        $wp_customize->add_setting( 'footer2_bg_img',
            array(
                'default' => $this->defaults['footer2_bg_img'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer2_bg_img',
            array(
                'label' => __( 'Background Image', 'ogo' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'ogo' ),
                'section' => 'footer_layout_2',
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
                'active_callback' => 'rttheme_footer2_bgimg_type_condition',
            )
        ) ); 
        $wp_customize->add_setting( 'footer2_overlay_opacity',
            array(
                'default' => $this->defaults['footer2_overlay_opacity'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'footer2_overlay_opacity',
            array(
                'label' => __( 'Overlay Opacity', 'ogo' ),
                'section' => 'footer_layout_2',
                'description' => esc_html__( 'Default Overlay Opacity 0 ( Input Opacity 0 to 1 Example: 0.75 )', 'ogo' ),
                'type' => 'number',
                'active_callback' => 'rttheme_footer2_bgimg_type_condition',
            )
        ); 

        /*** Footer Three ***/

        // Footer Three Title Color 
        $wp_customize->add_setting('footer3_title_color', 
            array(
                'default' => $this->defaults['footer3_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer3_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'ogo'),
                'section' => 'footer_layout_3', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        ));  

        // Footer Three Title Shape Color 
        $wp_customize->add_setting('footer3_title_shape_color', 
            array(
                'default' => $this->defaults['footer3_title_shape_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer3_title_shape_color',
            array(
                'label' => esc_html__('Footer Title Shape Color', 'ogo'),
                'section' => 'footer_layout_3', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // Footer Three Text Color  
        $wp_customize->add_setting('footer3_text_color', 
            array(
                'default' => $this->defaults['footer3_text_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer3_text_color',
            array(
                'label' => esc_html__('Footer Text Color', 'ogo'),
                'section' => 'footer_layout_3', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // Footer Three Link Color        
        $wp_customize->add_setting('footer3_link_color', 
            array(
                'default' => $this->defaults['footer3_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer3_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'ogo'),
                'section' => 'footer_layout_3', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        ));  

        // Footer Three Link Hover Color       
        $wp_customize->add_setting('footer3_link_hover_color', 
            array(
                'default' => $this->defaults['footer3_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer3_link_hover_color',
            array(
                'label' => esc_html__('Footer Link Hover Color', 'ogo'),
                'section' => 'footer_layout_3', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // Footer Three Link Hover Background Color       
        $wp_customize->add_setting('footer3_link_hover_bg_color', 
            array(
                'default' => $this->defaults['footer3_link_hover_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer3_link_hover_bg_color',
            array(
                'label' => esc_html__('Footer Link Hover Background Color', 'ogo'),
                'section' => 'footer_layout_3', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // Footer Three Background Type
        $wp_customize->add_setting( 'footer3_bg_type',
            array(
                'default' => $this->defaults['footer3_bg_type'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer3_bg_type',
            array(
                'label' => __( 'Background Type', 'ogo' ),
                'section' => 'footer_layout_3',
                'description' => esc_html__( 'This is banner background type.', 'ogo' ),
                'type' => 'select',
                'choices' => array(
                    'footer3_bg_color' => esc_html__( 'BG Color', 'ogo' ),
                    'footer3_bg_img' => esc_html__( 'BG Image', 'ogo' ),
                ),
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        );         

        // Footer Three Background Color
        $wp_customize->add_setting('footer3_bg_color', 
            array(
                'default' => $this->defaults['footer3_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer3_bg_color',
            array(
                'label' => esc_html__('Background Color', 'ogo'),
                'settings' => 'footer3_bg_color', 
                'section' => 'footer_layout_3', 
                'active_callback' => 'rttheme_footer3_bgcolor_type_condition',
            )
        ));

        // Footer Three Background Image
        $wp_customize->add_setting( 'footer3_bg_img',
            array(
                'default' => $this->defaults['footer3_bg_img'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer3_bg_img',
            array(
                'label' => __( 'Background Image', 'ogo' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'ogo' ),
                'section' => 'footer_layout_3',
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
                'active_callback' => 'rttheme_footer3_bgimg_type_condition',
            )
        ) ); 
        $wp_customize->add_setting( 'footer3_overlay_opacity',
            array(
                'default' => $this->defaults['footer3_overlay_opacity'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'footer3_overlay_opacity',
            array(
                'label' => __( 'Overlay Opacity', 'ogo' ),
                'section' => 'footer_layout_3',
                'description' => esc_html__( 'Default Overlay Opacity 0 ( Input Opacity 0 to 1 Example: 0.1 )', 'ogo' ),
                'type' => 'number',
                'active_callback' => 'rttheme_footer3_bgimg_type_condition',
            )
        ); 

        // // /*** Footer Four ***/

        // // Footer Four Title Color 
        $wp_customize->add_setting('footer4_title_color', 
            array(
                'default' => $this->defaults['footer4_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer4_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'ogo'),
                'section' => 'footer_layout_4', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        ));  

        // // Footer Four Title Shape Color 
        $wp_customize->add_setting('footer4_title_shape_color', 
            array(
                'default' => $this->defaults['footer4_title_shape_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer4_title_shape_color',
            array(
                'label' => esc_html__('Footer Title Shape Color', 'ogo'),
                'section' => 'footer_layout_4', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // // Footer Four Text Color  
        $wp_customize->add_setting('footer4_text_color', 
            array(
                'default' => $this->defaults['footer4_text_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer4_text_color',
            array(
                'label' => esc_html__('Footer Text Color', 'ogo'),
                'section' => 'footer_layout_4', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // // Footer Four Link Color        
        $wp_customize->add_setting('footer4_link_color', 
            array(
                'default' => $this->defaults['footer4_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer4_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'ogo'),
                'section' => 'footer_layout_4', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        ));  

        // // Footer Four Link Hover Color       
        $wp_customize->add_setting('footer4_link_hover_color', 
            array(
                'default' => $this->defaults['footer4_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer4_link_hover_color',
            array(
                'label' => esc_html__('Footer Link Hover Color', 'ogo'),
                'section' => 'footer_layout_4', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // // Footer Four Link Hover Background Color       
        $wp_customize->add_setting('footer4_link_hover_bg_color', 
            array(
                'default' => $this->defaults['footer4_link_hover_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer4_link_hover_bg_color',
            array(
                'label' => esc_html__('Footer Link Hover Background Color', 'ogo'),
                'section' => 'footer_layout_4', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // // Footer Four Background Type
        $wp_customize->add_setting( 'footer4_bg_type',
            array(
                'default' => $this->defaults['footer4_bg_type'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer4_bg_type',
            array(
                'label' => __( 'Background Type', 'ogo' ),
                'section' => 'footer_layout_4',
                'description' => esc_html__( 'This is banner background type.', 'ogo' ),
                'type' => 'select',
                'choices' => array(
                    'footer4_bg_color' => esc_html__( 'BG Color', 'ogo' ),
                    'footer4_bg_img' => esc_html__( 'BG Image', 'ogo' ),
                ),
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        );

        // // Footer Four Background Color
        $wp_customize->add_setting('footer4_bg_color',
            array(
                'default' => $this->defaults['footer4_bg_color'],
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer4_bg_color',
            array(
                'label' => esc_html__('Background Color', 'ogo'),
                'settings' => 'footer4_bg_color',
                'section' => 'footer_layout_4',
                'active_callback' => 'rttheme_footer4_bgcolor_type_condition'
            )
        ));

         // Footer Four Background Image
         $wp_customize->add_setting( 'footer4_bg_img',
             array(
                 'default' => $this->defaults['footer4_bg_img'],
                 'transport' => 'refresh',
                 'sanitize_callback' => 'absint',
             )
         );
         $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer4_bg_img',
             array(
                 'label' => __( 'Background Image', 'ogo' ),
                 'description' => esc_html__( 'This is the description for the Media Control', 'ogo' ),
                 'section' => 'footer_layout_4',
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
                 'active_callback' => 'rttheme_footer4_bgimg_type_condition',
             )
         ) );
         $wp_customize->add_setting( 'footer4_overlay_opacity',
             array(
                 'default' => $this->defaults['footer4_overlay_opacity'],
                 'transport' => 'refresh',
                 'sanitize_callback' => 'rttheme_text_sanitization',
             )
         );
         $wp_customize->add_control( 'footer4_overlay_opacity',
             array(
                 'label' => __( 'Overlay Opacity', 'ogo' ),
                 'section' => 'footer_layout_4',
                 'description' => esc_html__( 'Default Overlay Opacity 0 ( Input Opacity 0 to 1 Example: 0.1 )', 'ogo' ),
                 'type' => 'number',
                 'active_callback' => 'rttheme_footer4_bgimg_type_condition',
             )
         );

        // Footer Four Background Image
        $wp_customize->add_setting( 'footer4_bg_img',
            array(
                'default' => $this->defaults['footer4_bg_img'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer4_bg_img',
            array(
                'label' => __( 'Background Image', 'ogo' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'ogo' ),
                'section' => 'footer_layout_4',
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
                'active_callback' => 'rttheme_footer4_bgimg_type_condition',
            )
        ) ); 
        $wp_customize->add_setting( 'footer4_overlay_opacity',
            array(
                'default' => $this->defaults['footer4_overlay_opacity'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'footer4_overlay_opacity',
            array(
                'label' => __( 'Overlay Opacity', 'ogo' ),
                'section' => 'footer_layout_4',
                'description' => esc_html__( 'Default Overlay Opacity 0 ( Input Opacity 0 to 1 Example: 0.1 )', 'ogo' ),
                'type' => 'number',
                'active_callback' => 'rttheme_footer4_bgimg_type_condition',
            )
        ); 

            /*** Footer fIVE ***/

        // Footer fIVE Title Color 
        $wp_customize->add_setting('footer5_title_color', 
            array(
                'default' => $this->defaults['footer5_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer5_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'ogo'),
                'section' => 'footer_layout_5', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        ));  

        // Footer fIVE Title Shape Color 
        $wp_customize->add_setting('footer5_title_shape_color', 
            array(
                'default' => $this->defaults['footer5_title_shape_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer5_title_shape_color',
            array(
                'label' => esc_html__('Footer Title Shape Color', 'ogo'),
                'section' => 'footer_layout_5', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // Footer five Text Color  
        $wp_customize->add_setting('footer5_text_color', 
            array(
                'default' => $this->defaults['footer5_text_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer5_text_color',
            array(
                'label' => esc_html__('Footer Text Color', 'ogo'),
                'section' => 'footer_layout_5', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // Footer Five Link Color        
        $wp_customize->add_setting('footer5_link_color', 
            array(
                'default' => $this->defaults['footer5_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer5_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'ogo'),
                'section' => 'footer_layout_5', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        ));  

        // Footer Five Link Hover Color       
        $wp_customize->add_setting('footer5_link_hover_color', 
            array(
                'default' => $this->defaults['footer5_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer5_link_hover_color',
            array(
                'label' => esc_html__('Footer Link Hover Color', 'ogo'),
                'section' => 'footer_layout_5', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // Footer Five Link Hover Background Color       
        $wp_customize->add_setting('footer5_link_hover_bg_color', 
            array(
                'default' => $this->defaults['footer5_link_hover_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer5_link_hover_bg_color',
            array(
                'label' => esc_html__('Footer Link Hover Background Color', 'ogo'),
                'section' => 'footer_layout_5', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // Footer Five Background Type
        $wp_customize->add_setting( 'footer5_bg_type',
            array(
                'default' => $this->defaults['footer5_bg_type'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer5_bg_type',
            array(
                'label' => __( 'Background Type', 'ogo' ),
                'section' => 'footer_layout_5',
                'description' => esc_html__( 'This is banner background type.', 'ogo' ),
                'type' => 'select',
                'choices' => array(
                    'footer5_bg_color' => esc_html__( 'BG Color', 'ogo' ),
                    'footer5_bg_img' => esc_html__( 'BG Image', 'ogo' ),
                ),
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        );

        // Footer Five Background Color
        $wp_customize->add_setting('footer5_bg_color', 
            array(
                'default' => $this->defaults['footer5_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer5_bg_color',
            array(
                'label' => esc_html__('Background Color', 'ogo'),
                'settings' => 'footer5_bg_color', 
                'section' => 'footer_layout_5', 
                'active_callback' => 'rttheme_footer5_bgcolor_type_condition',
            )
        ));

        // Footer Five Background Image
        $wp_customize->add_setting( 'footer5_bg_img',
            array(
                'default' => $this->defaults['footer5_bg_img'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer5_bg_img',
            array(
                'label' => __( 'Background Image', 'ogo' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'ogo' ),
                'section' => 'footer_layout_5',
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
                'active_callback' => 'rttheme_footer5_bgimg_type_condition',
            )
        ) );  
        $wp_customize->add_setting( 'footer5_overlay_opacity',
            array(
                'default' => $this->defaults['footer5_overlay_opacity'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'footer5_overlay_opacity',
            array(
                'label' => __( 'Overlay Opacity', 'ogo' ),
                'section' => 'footer_layout_5',
                'description' => esc_html__( 'Default Overlay Opacity 0 ( Input Opacity 0 to 1 Example: 0.75 )', 'ogo' ),
                'type' => 'number',
                'active_callback' => 'rttheme_footer5_bgimg_type_condition',
            )
        );

            /*** Footer Six ***/

        // Footer Six Title Color 
        $wp_customize->add_setting('footer6_title_color', 
            array(
                'default' => $this->defaults['footer6_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer6_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'ogo'),
                'section' => 'footer_layout_6', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        ));  

        // Footer Six Title Shape Color 
        $wp_customize->add_setting('footer6_title_shape_color', 
            array(
                'default' => $this->defaults['footer6_title_shape_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer6_title_shape_color',
            array(
                'label' => esc_html__('Footer Title Shape Color', 'ogo'),
                'section' => 'footer_layout_6', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // Footer Six Text Color  
        $wp_customize->add_setting('footer6_text_color', 
            array(
                'default' => $this->defaults['footer6_text_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer6_text_color',
            array(
                'label' => esc_html__('Footer Text Color', 'ogo'),
                'section' => 'footer_layout_6', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // Footer Six Link Color        
        $wp_customize->add_setting('footer6_link_color', 
            array(
                'default' => $this->defaults['footer6_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer6_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'ogo'),
                'section' => 'footer_layout_6', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        ));  

        // Footer Six Link Hover Color       
        $wp_customize->add_setting('footer6_link_hover_color', 
            array(
                'default' => $this->defaults['footer6_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer6_link_hover_color',
            array(
                'label' => esc_html__('Footer Link Hover Color', 'ogo'),
                'section' => 'footer_layout_6', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // Footer Six Link Hover Background Color       
        $wp_customize->add_setting('footer6_link_hover_bg_color', 
            array(
                'default' => $this->defaults['footer6_link_hover_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer6_link_hover_bg_color',
            array(
                'label' => esc_html__('Footer Link Hover Background Color', 'ogo'),
                'section' => 'footer_layout_6', 
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        )); 

        // Footer Six Background Type
        $wp_customize->add_setting( 'footer6_bg_type',
            array(
                'default' => $this->defaults['footer6_bg_type'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer6_bg_type',
            array(
                'label' => __( 'Background Type', 'ogo' ),
                'section' => 'footer_layout_6',
                'description' => esc_html__( 'This is banner background type.', 'ogo' ),
                'type' => 'select',
                'choices' => array(
                    'footer5_bg_color' => esc_html__( 'BG Color', 'ogo' ),
                    'footer5_bg_img' => esc_html__( 'BG Image', 'ogo' ),
                ),
                'active_callback' => 'rttheme_is_footer_enabled',
            )
        );

        // Footer Six Background Color
        $wp_customize->add_setting('footer6_bg_color', 
            array(
                'default' => $this->defaults['footer6_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer6_bg_color',
            array(
                'label' => esc_html__('Background Color', 'ogo'),
                'settings' => 'footer6_bg_color', 
                'section' => 'footer_layout_6', 
                'active_callback' => 'rttheme_footer6_bgcolor_type_condition',
            )
        ));

        // Footer Six Background Image
        $wp_customize->add_setting( 'footer6_bg_img',
            array(
                'default' => $this->defaults['footer6_bg_img'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer6_bg_img',
            array(
                'label' => __( 'Background Image', 'ogo' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'ogo' ),
                'section' => 'footer_layout_6',
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
                'active_callback' => 'rttheme_footer6_bgimg_type_condition',
            )
        ) );  
        $wp_customize->add_setting( 'footer6_overlay_opacity',
            array(
                'default' => $this->defaults['footer6_overlay_opacity'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'footer6_overlay_opacity',
            array(
                'label' => __( 'Overlay Opacity', 'ogo' ),
                'section' => 'footer_layout_6',
                'description' => esc_html__( 'Default Overlay Opacity 0 ( Input Opacity 0 to 1 Example: 0.75 )', 'ogo' ),
                'type' => 'number',
                'active_callback' => 'rttheme_footer6_bgimg_type_condition',
            )
        );

    }
}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
    new OgoTheme_Footer_Settings();
}
