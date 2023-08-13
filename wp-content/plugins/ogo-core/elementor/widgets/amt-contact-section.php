<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Base;
use Elementor\Core\Schemes\Typography as Scheme_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
use OgoTheme;
use OgoTheme_Helper;

if ( ! defined( 'ABSPATH' ) ) exit;

class Amt_Contact_Section extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Contact Section', 'ogo-core' );
		$this->amt_base = 'amt-contact-section';
		parent::__construct( $data, $args );
	}

    public function amt_fields(){
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'form_cat',
            array(
                'type'    => Controls_Manager::TEXT,
                'label'   => __( 'Contact Category', 'ogo-core' ),
                'default' => 'Web Design',
            )
        );
        $repeater->add_control(
            'form_id',
            array(
                'label' => esc_html__( 'Form Shortcode', 'ogo-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
            )
        );
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'style',
				'label'   => esc_html__( 'Section Style', 'ogo-core' ),
				'options' => array(
					'style1' => esc_html__( 'amt-Contact Style 1' , 'ogo-core' ),
					'style2' => esc_html__( 'amt-Contact Style 2', 'ogo-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'form_items',
				'label'   => esc_html__( 'Form Items', 'ogo-core' ),
				'fields' => $repeater->get_controls(),
				'condition'   => array( 'style' => array( 'style1' ) ),
				'default' => [
					[
						'form_cat' => 'Web Designer',
						'form_id' => '[fluentform id="1"]',
						
					]
				],
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'form_items_2',
				'label'   => esc_html__( 'Form Items', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style2' ) ),
				'default' => '[fluentform id="1"]',
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'contact_sidebar',
				'label'   => esc_html__( 'Contact Sidebar', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'level-up-title',
				'label'   => esc_html__( 'Sidebar Title', 'ogo-core' ),
				'default' => 'Level up your brand',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'level-up-desc',
				'label'   => esc_html__( 'Sidebar Description', 'ogo-core' ),
				'default' => 'Businesss generally promote their brand, products and services by identifying audience.',
				'condition'   => array( 'style' => array( 'style1') ),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'map-icon',
				'label'   => esc_html__( 'Address Icon', 'ogo-core' ),
				'default' => [
                    'value' => 'fa fa-map',
                    'library' => 'fa-solid',
                ],
				'condition'   => array( 'style' => array( 'style1', 'style2') ),
			),
			array(
				'type'        => Controls_Manager::TEXTAREA,
				'id'          => 'address',
				'label'       => esc_html__( 'Address', 'ogo-core' ),
				'placeholder' 	  => esc_html__( 'The Skywalk, offers 360-degree views of the city', 'ogo-core' ),
				'default'     => 'The Skywalk, offers 360-degree views of the city',
				
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'phone-icon',
				'label'   => esc_html__( 'Phone Icon', 'ogo-core' ),
				'default' => [
                    'value' => 'fas fa-phone',
                    'library' => 'fa-solid',
                ],
				'condition'   => array( 'style' => array( 'style1', 'style2') ),
			),
			array(
				'type'        => Controls_Manager::TEXTAREA,
				'id'          => 'phone-1',
				'label'       => esc_html__( 'Phone Number 1', 'ogo-core' ),
				'placeholder' 	  => esc_html__( '+ 805 920 71 33', 'ogo-core' ),
				'default'     => '+ 805 920 71 33',
			),
			array(
				'type'        => Controls_Manager::TEXTAREA,
				'id'          => 'phone-2',
				'label'       => esc_html__( 'Phone Number 2', 'ogo-core' ),
				'placeholder' 	  => esc_html__( '+ 805 920 71 33', 'ogo-core' ),
				'default'     => '+ 805 920 71 33',
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'message-icon',
				'label'   => esc_html__( 'Email Icon', 'ogo-core' ),
				'default' => [
                    'value' => 'fas fa-envelope',
                    'library' => 'fa-solid',
                ],
				'condition'   => array( 'style' => array( 'style1', 'style2') ),
			),
			array(
				'type'        => Controls_Manager::TEXTAREA,
				'id'          => 'mail-1',
				'label'       => esc_html__( 'Email 1', 'ogo-core' ),
				'placeholder' 	  => esc_html__( 'www.business@sydny.com', 'ogo-core' ),
				'default'     => 'business@sydny.com',
			),
			array(
				'type'        => Controls_Manager::TEXTAREA,
				'id'          => 'mail-2',
				'label'       => esc_html__( 'Email 2', 'ogo-core' ),
				'placeholder' 	  => esc_html__( 'www.business@sydny.com', 'ogo-core' ),
				'default'     => 'business@sydny.com',
			),
			array(
				'type'        => Controls_Manager::TEXT,
				'id'          => 'level-up-btn',
				'label'       => esc_html__( 'Button Text', 'ogo-core' ),
				'default' 	  => esc_html__( 'Get Started', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'        => Controls_Manager::URL,
				'id'          => 'level-up-url',
				'label'       => esc_html__( 'Button URL', 'ogo-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			// Style	
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Sidebar Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style1') ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'level_bg_color',
				'label'   => esc_html__( 'Background Color', 'ogo-core' ),
				'default' => '#53AFEE',
                'selectors' => [
                    '{{WRAPPER}} .amt-contact-1 .amt-level-up-holder' => 'background-color: {{VALUE}};',
                ],
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'sidebar_title_style',
				'label' => esc_html__( 'Title', 'ogo-core' ),
				'separator' => 'before',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'level-up_title_typo',
				'label'   => esc_html__( 'Typography', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-level-up-holder .level-up-title h3',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
                'default' => 20,
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'level-up_title_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' =>[ 
                    '{{WRAPPER}} .amt-level-up-holder .level-up-title h3' => 'color: {{VALUE}};',
                ],
				'default' => '#fff',
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'sidebar_description_style',
				'label' => esc_html__( 'Description', 'ogo-core' ),
				'separator' => 'before',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Typography', 'ogo-core' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .level-up-sub p',
                'default' => 20,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
				'selectors' =>[ 
                    '{{WRAPPER}} .level-up-sub p' => 'color: {{VALUE}};',
                ],
				'default' => '#fff',
			),

			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'sidebar_description_divider',
				'label' => esc_html__( 'Divider', 'ogo-core' ),
				'separator' => 'before',
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'content_border_width',
				'label'   => esc_html__( 'height', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-contact-1 .amt-level-up-holder .level-up-sub' => 'border-width: 0 0 {{SIZE}}{{UNIT}} 0;',
				],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_border_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-contact-1 .amt-level-up-holder .level-up-sub' => 'border-color: {{VALUE}};',
				],
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'sidebar_info_style',
				'label' => esc_html__( 'Information', 'ogo-core' ),
				'separator' => 'before',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'level-up-links-text-size',
				'label'   => esc_html__( 'Style', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .level-up-links a',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'condition'   => array( 'style' => array('style1') ),
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'level-up-links-text-color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' =>[
                    '{{WRAPPER}} .level-up-links a'  => 'color: {{VALUE}};',

                ],
				'default' => '#fff',
				'condition'   => array( 'style' => array('style1') ),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'icon_style',
				'label'   => esc_html__( 'Icon Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color1',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .level-up-links i' => 'color: {{VALUE}};',
                ],
				'default' => ' #fff',
				'condition'   => array( 'style' => array('style1') ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color2',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-single-contact-item i' => 'color: {{VALUE}};',
                ],
				'default' => ' #53AFEE',
				'condition'   => array( 'style' => array('style2') ),
			),
			array (
                'id'      => 'icon-size',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__( 'Size', 'ogo-core' ),
                'size_units' => array('px','%'),
				'selectors' => [
					'{{WRAPPER}} .level-up-links i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .amt-single-contact-item i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
			), 
			array (
				'type'    => Controls_Manager::SLIDER,
                'id'      => 'icon-space',
				'label'   => esc_html__( 'Spacing', 'ogo-core' ),
                'size_units' => array('px','%'),
				'selectors' => [
                    '{{WRAPPER}} .level-up-links i' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .amt-single-contact-item i' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
			),
            array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'icon_padding',
				'label'   => esc_html__( 'Padding', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2') ),
                'selectors' => [
					'{{WRAPPER}} .level-up-links i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .amt-single-contact-item i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			),



			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'sidebar_info_style_2',
				'label' => esc_html__( 'Information', 'ogo-core' ),
				'separator' => 'before',
				'condition' => [
					'style' => 'style2',
				],
			),


			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'single-links-text-size',
				'label'   => esc_html__( 'Style', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-single-contact-item a',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'condition' => [
					'style' => 'style2',
				],
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'single-links-text-color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' =>[
                    '{{WRAPPER}} .amt-single-contact-item a'  => 'color: {{VALUE}};',
                ],
				'default' => '#222D43',
				'condition' => [
					'style' => 'style2',
				],
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'level_btn_style',
				'label'   => esc_html__( 'Sidebar Button', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style1') ),
			),
				array(
					'mode'    => 'tabs_start',
					'id'      => 'tabs_start_play_icon',
				),
					array(
						'mode'    => 'tab_start',
						'id'      => 'tab_start_icon',
						'label'   => esc_html__( 'Normal', 'ogo-core' ),
					),	
					array (
						'mode'    => 'group',
						'type'    => Group_Control_Typography::get_type(),
						'name'    => 'button-2-text',
						'label'   => esc_html__( ' Text', 'ogo-core' ),
						'selector' => '{{WRAPPER}} .amt-contact-btn-2 a',
						'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'button-2-text_color',
						'label'   => esc_html__( 'Text Color', 'ogo-core' ),
						'selectors' =>[
							'{{WRAPPER}} .amt-contact-btn-2 a'  => 'color: {{VALUE}};',
		
						],
						'default' => '#fff',
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'button-2-btn_bg_color',
						'label'   => esc_html__( 'Background Color', 'ogo-core' ),
						'default' => '#1F0D3C',
						'selectors' => [
							'{{WRAPPER}} .amt-contact-btn-2 a' => 'background-color: {{VALUE}};',
						],
					),
					array(
						'type' => Controls_Manager::SELECT,
						'id'      => 'button-2-btn_border_style',
						'label' => esc_html__( 'Border Type', 'ogo-core' ),
						'options' => [
							'solid'  => esc_html__( 'Solid', 'ogo-core' ),
							'dashed' => esc_html__( 'Dashed', 'ogo-core' ),
							'dotted' => esc_html__( 'Dotted', 'ogo-core' ),
							'double' => esc_html__( 'Double', 'ogo-core' ),
							'none' => esc_html__( 'None', 'ogo-core' ),
						],
						'selectors' => [
							'{{WRAPPER}} .amt-contact-btn-2 a' => 'border-style: {{VALUE}};',
						],
						'default' => 'none',
					),
					array(
						'type' => Controls_Manager::DIMENSIONS,
						'id'      => 'button-2-btn_border_radius',
						'label' => esc_html__( 'Border Radius', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-contact-btn-2 a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						
					),
					array(
						'type' => Controls_Manager::DIMENSIONS,
						'id'      => 'button-2-btn_padding',
						'label' => esc_html__( 'Padding', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-contact-btn-2 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					),
					array(
						'mode' => 'tab_end',
					),
					array(
						'mode'    => 'tab_start',
						'id'      => 'tab_start_hover_icon',
						'label'   => esc_html__( 'Hover', 'ogo-core' ),
					),	
					array (
						'mode'    => 'group',
						'type'    => Group_Control_Typography::get_type(),
						'name'    => 'button-2-text_hover',
						'label'   => esc_html__( ' Text', 'ogo-core' ),
						'selector' => '{{WRAPPER}} .amt-contact-btn-2 a:hover',
						'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'button-2-text_color_hover',
						'label'   => esc_html__( 'Text Color', 'ogo-core' ),
						'selectors' =>[
							'{{WRAPPER}} .amt-contact-btn-2 a:hover'  => 'color: {{VALUE}};',
		
						],
						'default' => '#fff',
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'button-2-btn_bg_color_hover',
						'label'   => esc_html__( 'Background Color', 'ogo-core' ),
						'default' => '#1F0D3C',
						'selectors' => [
							'{{WRAPPER}} .amt-contact-btn-2 a:hover' => 'background-color: {{VALUE}};',
						],
					),
					array(
						'type' => Controls_Manager::SELECT,
						'id'      => 'button-2-btn_border_style_hover',
						'label' => esc_html__( 'Border Type', 'ogo-core' ),
						'options' => [
							'solid'  => esc_html__( 'Solid', 'ogo-core' ),
							'dashed' => esc_html__( 'Dashed', 'ogo-core' ),
							'dotted' => esc_html__( 'Dotted', 'ogo-core' ),
							'double' => esc_html__( 'Double', 'ogo-core' ),
							'none' => esc_html__( 'None', 'ogo-core' ),
						],
						'selectors' => [
							'{{WRAPPER}} .amt-contact-btn-2 a:hover' => 'border-style: {{VALUE}};',
						],
						'default' => 'none',
					),
					array(
						'type' => Controls_Manager::DIMENSIONS,
						'id'      => 'button-2-btn_border_radius_hover',
						'label' => esc_html__( 'Border Radius', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-contact-btn-2 a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						
					),
					array(
						'type' => Controls_Manager::DIMENSIONS,
						'id'      => 'button-2-btn_padding_hover',
						'label' => esc_html__( 'Padding', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-contact-btn-2 a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					),
					array(
						'mode' => 'tab_end',
					),
				array(
					'mode' => 'tabs_end',
				),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		switch ( $data['style'] ) {
			case 'style1':
			$template = 'amt-contact-section-1';
			break;
			default:
			$template = 'amt-contact-section-2';
			break;
		}
	
		return $this->amt_template( $template, $data );
	}
}