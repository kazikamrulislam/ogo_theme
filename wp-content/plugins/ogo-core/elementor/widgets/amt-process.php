<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Base;
use Elementor\Core\Schemes\Typography as Scheme_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class Amt_process extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Process', 'ogo-core' );
		$this->amt_base = 'amt-process';
		parent::__construct( $data, $args );
	}

	public function amt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Process Style', 'ogo-core' ),
				'options' => array(
					'style1' => esc_html__( 'Process Style 1', 'ogo-core' ),
					'style2' => esc_html__( 'Process Style 2', 'ogo-core' ),
				),
				'default' => 'style1',
			),
			array(
				// 'mode'    => 'responsive',
				'type'    => Controls_Manager::TEXT,
				'id'      => 'process_subtitle',
				'label'   => esc_html__( 'Process Sub Title', 'ogo-core' ),
				'default' => esc_html__('Process'),
			),
			array(
				// 'mode'    => 'responsive',
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'process_title',
				'label'   => esc_html__( 'Title', 'ogo-core' ),
				'default' => esc_html__('The process we can bring success'),
			),
			array(
				// 'mode'    => 'responsive',
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'process_content',
				'label'   => esc_html__( 'Process Content', 'ogo-core' ),
				'default' => esc_html__('Businesss generally promote their brand, products and services by identifying audiencey.', 'ogo-core' ),
			),
			array(
				'label' => esc_html__( 'Button Controll', 'ogo-core' ),
				'id'	=> 'process_btn_controll',
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'options' => [
					'yes' => esc_html__( 'Yes', 'ogo-core' ),
					'no' => esc_html__( 'No', 'ogo-core' ),
				],
				'frontend_available' => true,
			),
			array(
				// 'mode'    => 'responsive',
				'type'        => Controls_Manager::TEXT,
				'id'          => 'process_button',
				'label'       => esc_html__( 'Process Button Text', 'ogo-core' ),
				'default' 	  => esc_html__('Get Started', 'ogo-core' ),
				'condition' => [
					'process_btn_controll' => 'yes',
				],
			),
			array(
				'type'        => Controls_Manager::URL,
				'id'          => 'process_button_url',
				'label'       => esc_html__( 'Process Button URL', 'ogo-core' ),
				'placeholder' => 'https://your-link.com',
				'condition' => [
					'process_btn_controll' => 'yes',
				],
			),
			array(
				'mode' => 'section_end',
			),
			// Process box 
			array(
				'mode'    => 'section_start',
				'id'      => 'process_box',
				'label'   => esc_html__( 'Process Box', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'process_icon1',
				'label'   => esc_html__( 'Icon-1', 'ogo-core' ),
				'default' => [
                    'value' => 'fa fa-university',
                    'library' => 'fa-solid',
                ],
			),
			array(
				// 'mode'    => 'responsive',
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'process_box_title1',
				'label'   => esc_html__( 'Title 1', 'ogo-core' ),
				'default' => esc_html__('Book appoinment'),
			),
			array(
				// 'mode'    => 'responsive',
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'process_box_content1',
				'label'   => esc_html__( 'Content-1', 'ogo-core' ),
				'default' => esc_html__('Sharing Marketing Agency Website Landing Page UI Design. This design is suitable for marketing agency'),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'process_icon2',
				'label'   => esc_html__( 'Icon-2', 'ogo-core' ),
				'default' => [
                    'value' => 'fa fa-university',
                    'library' => 'fa-solid',
                ],
			),
			array(
				// 'mode'    => 'responsive',
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'process_box_title2',
				'label'   => esc_html__( 'Title 2', 'ogo-core' ),
				'default' => esc_html__('Choose package'),
			),
			array(
				// 'mode'    => 'responsive',
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'process_box_content2',
				'label'   => esc_html__( 'Content-2', 'ogo-core' ),
				'default' => esc_html__('Sharing Marketing Agency Website Landing Page UI Design. This design is suitable for marketing agency'),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'process_icon3',
				'label'   => esc_html__( 'Icon-3', 'ogo-core' ),
				'default' => [
                    'value' => 'fa fa-university',
                    'library' => 'fa-solid',
                ],
			),
			array(
				// 'mode'    => 'responsive',
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'process_box_title3',
				'label'   => esc_html__( 'Title 3', 'ogo-core' ),
				'default' => esc_html__('Arrange program'),
			),
			array(
				// 'mode'    => 'responsive',
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'process_box_content3',
				'label'   => esc_html__( 'Content-3', 'ogo-core' ),
				'default' => esc_html__('Sharing Marketing Agency Website Landing Page UI Design. This design is suitable for marketing agency'),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'process_icon4',
				'label'   => esc_html__( 'Icon-4', 'ogo-core' ),
				'default' => [
                    'value' => 'fa fa-university',
                    'library' => 'fa-solid',
                ],
			),
			array(
				// 'mode'    => 'responsive',
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'process_box_title4',
				'label'   => esc_html__( 'Title 4', 'ogo-core' ),
				'default' => esc_html__('Grow together'),
			),
			array(
				// 'mode'    => 'responsive',
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'process_box_content4',
				'label'   => esc_html__( 'Content-4', 'ogo-core' ),
				'default' => esc_html__('Sharing Marketing Agency Website Landing Page UI Design. This design is suitable for marketing agency'),
			),
			array(
				'mode' => 'section_end',
			),
			// Style
			array(
				'tab'     => Controls_Manager::TAB_STYLE,
				'mode'    => 'section_start',
				'id'      => 'process_style',
				'label'   => esc_html__( 'Process Style', 'ogo-core' ),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'process_sub_title',
				'label'   => esc_html__( 'Sub-Title :', 'ogo-core' ),
				'separator' => 'after',
			),
			array (
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'process_sub_title_typo',
				'label'   => esc_html__( 'Font', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt_process .process_subtitle h4',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'process_subtitle_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt_process .process_subtitle h4' => 'color: {{VALUE}};',
				],
				'default' => '#53AFEE',
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::SLIDER,
				'id'      => 'divider_width',
				'label' => esc_html__('Height', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt_process .process_subtitle h4' => 'border-width: 0 0 {{SIZE}}{{UNIT}} 0;',
				],
			),
			array(
				'type' => Controls_Manager::COLOR,
				'id'      => 'divider_color',
				'label' => esc_html__('Color', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt_process .process_subtitle h4' => 'border-color: {{VALUE}};',
				],
			),






			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'process_title_style',
				'label'   => esc_html__( 'Title :', 'ogo-core' ),
				'separator' => 'before',
			),
			array (
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'process_title_typo',
				'label'   => esc_html__( 'Font', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt_process .process_title h3',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'process_title_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt_process .process_title h3' => 'color: {{VALUE}};',
				],
				'default' => '#1F0D3C',
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'process_content_style',
				'label'   => esc_html__( 'Content :', 'ogo-core' ),
				'separator' => 'before',
			),
			array (
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'process_content_typo',
				'label'   => esc_html__( 'Font', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt_process .process_content p',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'process_content_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt_process .process_content p' => 'color: {{VALUE}};',
                ],
				'default' => '#676E89',
			),
			array(
				'mode' => 'section_end',
			),


			// Button Styles Start




			array(
				'tab'     => Controls_Manager::TAB_STYLE,
				'mode'    => 'section_start',
				'id'      => 'button_style_tab',
				'label'   => esc_html__( 'Button Style', 'ogo-core' ),
				'condition' => [
					'process_btn_controll' => 'yes',
				],
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'tabs_start_icon',
				
			),
				array(
					'mode'    => 'tab_start',
					'id'      => 'process_btn_normal_style',
					'label'   => esc_html__( 'Normal', 'ogo-core' ),
				),
					array (
						'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
						'mode'    => 'group',
						'type'    => Group_Control_Typography::get_type(),
						'name'    => 'process_btn_typo',
						'label'   => esc_html__( 'Content Style', 'ogo-core' ),
						'selector' => '{{WRAPPER}} .amt_process_section_1 .process_btn a',
					),
					array(
						'mode'    => 'responsive',
						'type' => Controls_Manager::DIMENSIONS,
						'id'      => 'process_btn_padding',
						'label' => esc_html__( 'Padding', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt_process_section_1 .process_btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'process_btn_color',
						'label'   => esc_html__( 'Background Color', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt_process_section_1 .process_btn a' => 'background: {{VALUE}};',
						],
						'default' => '#1F0D3C',
					),
				array(
					'mode' => 'tab_end',
				),
				array(
					'mode'    => 'tab_start',
					'id'      => 'process_btn_hover_style',
					'label'   => esc_html__( 'Hover', 'ogo-core' ),
				),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'content_hover_color',
						'label'   => esc_html__( 'Content Color', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt_process_section_1 .process_btn a:hover' => 'color: {{VALUE}};',
						],
						'default' => '#FFFFFF'
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'process_btn__hovercolor',
						'label'   => esc_html__( 'Background Color', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt_process_section_1 .process_btn a:hover' => 'background: {{VALUE}};',
						],
						'default' => '#53AFEE'
					),
				array(
					'mode' => 'tab_end',
				),
			
			array(
				'mode' => 'tabs_end',
			),
			// Button Styles end
			array(
				'mode' => 'section_end',
			),





			// Process Box Style
			array(
				'tab'     => Controls_Manager::TAB_STYLE,
				'mode'    => 'section_start',
				'id'      => 'process_box_style',
				'label'   => esc_html__( 'Process Box Style', 'ogo-core' ),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'process_box_title',
				'label'   => esc_html__( 'Title :', 'ogo-core' ),
				'separator' => 'before',
			),
			array (
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'process_box_title_typo',
				'label'   => esc_html__( 'Title', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .process_box .process_box_title h4',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'process_box_title_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .process_box .process_box_title h4' => 'color: {{VALUE}};',
				],
				'default' => '#1F0D3C',
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'process_box_content',
				'label'   => esc_html__( 'Content :', 'ogo-core' ),
				'separator' => 'before',
			),
			array (
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'process_box_sub_title',
				'label'   => esc_html__( 'font', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .process_box .process_box_content p',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'process_box_sub_title',
				'label'   => esc_html__( 'color', 'ogo-core' ),
			    'selectors' => [
			        '{{WRAPPER}} .process_box .process_box_content p' => 'color: {{VALUE}};',
			    ],
				'default' => '#1F0D3C',
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'process_box_icon',
				'label'   => esc_html__( 'Icon :', 'ogo-core' ),
				'separator' => 'before',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'process_box_icon_color',
				'label'   => esc_html__( 'color', 'ogo-core' ),
			    'selectors' => [
			        '{{WRAPPER}} .process-media-icon i' => 'color: {{VALUE}};',
			    ],
				'default' => '#53AFEE',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'process_box_icon_bg',
				'label'   => esc_html__( 'Background color', 'ogo-core' ),
			    'selectors' => [
			        '{{WRAPPER}} .process-media-icon i' => 'background: {{VALUE}};',
			    ],
				'default' => '#FFF',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'process_box_icon_bg_shadow',
				'label'   => esc_html__( 'Icon Shadow', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .process_box .process-media-icon i',
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'process_box_border',
				'label'   => esc_html__( 'Border Bottom :', 'ogo-core' ),
				'separator' => 'before',
				'condition'   => array( 'style' => array( 'style1') ),
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'tabs_start_border',
				
			),
				array(
					'mode'    => 'tab_start',
					'id'      => 'border_bottom_normal',
					'label'   => esc_html__( 'Normal', 'ogo-core' ),
				),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'process_border_bottom_color',
						'label'   => esc_html__( 'color', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt_process_section_1 .process_box_1, {{WRAPPER}} .amt_process_section_1 .process_box_2, {{WRAPPER}} .amt_process_section_1 .process_box_3, {{WRAPPER}} .amt_process_section_1 .process_box_4' => 'border-color: {{VALUE}};',
						],
						'default' => 'transparent',
					),
					array(
						'mode'    => 'responsive',
						'type' => Controls_Manager::SLIDER,
						'label' => esc_html__( 'Bodder Width', 'ogo-core' ),
						'id' => 'box_border_normal',
						'range' => [
							'px' => [
								'max' => 10,
							],
						],
						'default' => [
							'size' => 2,
						],
						'selectors' => [
							'{{WRAPPER}} .amt_process_section_1 .process_box_1, {{WRAPPER}} .amt_process_section_1 .process_box_2, {{WRAPPER}} .amt_process_section_1 .process_box_3, {{WRAPPER}} .amt_process_section_1 .process_box_4' =>  'border-bottom-width: {{SIZE}}{{UNIT}};',
						],
					),
					
				array(
					'mode' => 'tab_end',
				),
				array(
					'mode'    => 'tab_start',
					'id'      => 'process_border_bottom_hover',
					'label'   => esc_html__( 'Hover', 'ogo-core' ),
				),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'process_border_color_hover',
						'label'   => esc_html__( 'color', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt_process_section_1 .process_box_1:hover, {{WRAPPER}} .amt_process_section_1 .process_box_2:hover, {{WRAPPER}} .amt_process_section_1 .process_box_3:hover, {{WRAPPER}} .amt_process_section_1 .process_box_4:hover' => 'border-color: {{VALUE}};',
						],
						'default' => '#53AFEE',
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
			case 'style2':
			$template = 'amt-process-2';
			break;
			default:
			$template = 'amt-process-1';
			break;
		}
	
		return $this->amt_template( $template, $data );
	}
}