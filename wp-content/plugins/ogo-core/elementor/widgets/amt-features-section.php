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

class Amt_Features_Section extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Features Section', 'ogo-core' );
		$this->amt_base = 'amt-features-section';
		parent::__construct( $data, $args );
	}

    public function amt_fields(){
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'selected_icon',
			[
				'label' => esc_html__( 'Icon', 'ogo-core' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check-circle',
					'library' => 'fa-solid',
				],
				'fa4compatibility' => 'icon',
			]
		);
        $repeater->add_control(
            'text',
			[
				'label' => esc_html__( 'Text', 'ogo-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'List Item', 'ogo-core' ),
				'default' => esc_html__( 'List Item', 'ogo-core' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Section Style', 'ogo-core' ),
				'options' => array(
					'style1' => esc_html__( 'Features Style 1' , 'ogo-core' ),
					'style2' => esc_html__( 'Features Style 2', 'ogo-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'sub_title',
				'label'   => esc_html__( 'Sub Title', 'ogo-core' ),
				'default' => 'Ogo',
			),
            array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'ogo-core' ),
				'default' => 'We help to create UX Strategies',
			),
            array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'sub_desc',
				'label'   => esc_html__( 'Sub Content', 'ogo-core' ),
				'default' => 'Professional Design Agency to provide solutions',
                'condition'   => array( 'style' => array('style1' ) ),
			),
            array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'ogo-core' ),
				'default' => 'We create digital ideas that are bigger, bolder, braver and better. We believe in good ideas flexibility and precission We’re world’s Our Special Team best consulting & finance solution provider.',
			),
            array(
				'type'        => Controls_Manager::TEXT,
				'id'          => 'button_one',
				'label'       => esc_html__( 'Button Text', 'ogo-core' ),
				'default' 	  => esc_html__('Get-Started', 'ogo-core' ),
			),
			array(
				'type'        => Controls_Manager::URL,
				'id'          => 'one_buttonurl',
				'label'       => esc_html__( 'Button URL', 'ogo-core' ),
				'placeholder' => 'https://your-link.com',

			),
            array(
                'type'    => Controls_Manager::MEDIA,
                'id'      => 'image',
                'label' => esc_html__( 'Choose Image', 'ogo-core' ),
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ),
            array(
                'mode' => 'group',
                'type'    => Group_Control_Image_Size::get_type(),
                'name'      => 'image',
                'default' => 'large',
                'separator' => 'none',
            ),
            array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'project-num',
				'label'   => esc_html__( 'Total Project', 'ogo-core' ),
				'default' => '30',
			),
            array (
                'label' => esc_html__( 'Items', 'ogo-core' ),
                'id'    =>'icon_list',
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'text' => esc_html__( 'List Item 1', 'ogo-core' ),
						'selected_icon' => [
							'value' => 'fas fa-check-circle',
							'library' => 'fa-solid',
						],
					],
					[
						'text' => esc_html__( 'List Item 2', 'ogo-core' ),
						'selected_icon' => [
							'value' => 'fas fa-check-circle',
							'library' => 'fa-solid',
						],
					],
					[
						'text' => esc_html__( 'List Item 3', 'ogo-core' ),
						'selected_icon' => [
							'value' => 'fas fa-check-circle',
							'library' => 'fa-solid',
						],
					],
					[
						'text' => esc_html__( 'List Item 4', 'ogo-core' ),
						'selected_icon' => [
							'value' => 'fas fa-check-circle',
							'library' => 'fa-solid',
						],
					],
					[
						'text' => esc_html__( 'List Item 5', 'ogo-core' ),
						'selected_icon' => [
							'value' => 'fas fa-check-circle',
							'library' => 'fa-solid',
						],
					],
					[
						'text' => esc_html__( 'List Item 6', 'ogo-core' ),
						'selected_icon' => [
							'value' => 'fas fa-check-circle',
							'library' => 'fa-solid',
						],
					],
				],
				'title_field' => '{{{ text }}}',
            ),
			
			array(
				'mode' => 'section_end',
			),
			// Style

			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'sub_title_style',
				'label' => esc_html__( 'Sub Title', 'ogo-core' ),
				'separator' => 'before',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__( 'Typography', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-features-section .amt-features-subtitle h5',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' =>[
                    '{{WRAPPER}} .amt-features-section .amt-features-subtitle h5'  => 'color: {{VALUE}};',

                ],
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'divider_style',
				'label' => esc_html__( 'Divider', 'ogo-core' ),
				'separator' => 'before',
			),
			array(
				'mode'    => 'responsive',
                'type' => Controls_Manager::SLIDER,
                'id'      => 'divider_width',
				'label' => esc_html__( 'Height', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-features-section .amt-features-subtitle h5' => 'border-width: 0 0 {{SIZE}}{{UNIT}} 0;',
				],
			),
			array(
                'type' => Controls_Manager::COLOR,
                'id'      => 'divider_color',
				'label' => esc_html__( 'Color', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-features-section .amt-features-subtitle h5' => 'border-color: {{VALUE}};',
				],
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'title_style',
				'label' => esc_html__( 'Title', 'ogo-core' ),
				'separator' => 'before',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Typography', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-features-section .amt-features-title h2',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' =>[
                    '{{WRAPPER}} .amt-features-section .amt-features-title h2'  => 'color: {{VALUE}};',

                ],
				'default' => '#1F0D3C',
			),
			array (
				'mode'    => 'responsive',
				'type'    => Controls_Manager::DIMENSIONS,
                'id'      => 'title_space',
				'label'   => esc_html__( 'Title Spacing', 'ogo-core' ),
                'size_units' => array('px','%'),
				'selectors' => [
                    '{{WRAPPER}} .amt-features-section .amt-features-title' => 'margin: {{TOP}}{{UNIT}} auto {{BOTTOM}}{{UNIT}} auto ;',
                ],
				'allowed_dimensions' => 'vertical',
				'placeholder' => [
					'top' => '',
					'left' => 'auto',
					'bottom' => '',
					'right' => 'auto',
				],
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'content_style',
				'label' => esc_html__( 'Content', 'ogo-core' ),
				'separator' => 'before',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Typography', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-features-section .amt-features-desc p',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-features-section .amt-features-desc p' => 'color: {{VALUE}};',
                ],
				'default' => '#676E89',

			),
			array (
				'mode'    => 'responsive',
				'type'    => Controls_Manager::DIMENSIONS,
                'id'      => 'content_space',
				'label'   => esc_html__( 'Content Spacing', 'ogo-core' ),
                'size_units' => array('px','%'),
				'selectors' => [
                    '{{WRAPPER}} .amt-features-section .amt-features-desc' => 'margin: {{TOP}}{{UNIT}} auto {{BOTTOM}}{{UNIT}} auto ;',
                ],
				'allowed_dimensions' => 'vertical',
				'placeholder' => [
					'top' => '',
					'left' => 'auto',
					'bottom' => '',
					'right' => 'auto',
				],
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'sub_des_style',
				'label' => esc_html__( 'Sub Content', 'ogo-core' ),
				'separator' => 'before',
			),
            array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_desc_typo',
				'label'   => esc_html__( 'Typography', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-features-section .amt-features-sub-desc h4',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
                'condition'   => array( 'style' => array('style1' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_desc_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' =>[ 
                    '{{WRAPPER}} .amt-features-section .amt-features-sub-desc h4'  => 'color: {{VALUE}};',
                ],
				'default' => '#53AFEE',
                'condition'   => array( 'style' => array('style1' ) ),
			),
			array (
				'mode'    => 'responsive',
				'type'    => Controls_Manager::DIMENSIONS,
                'id'      => 'sub_des_space',
				'label'   => esc_html__( 'Sub Content Spacing', 'ogo-core' ),
                'size_units' => array('px','%'),
				'selectors' => [
                    '{{WRAPPER}} .amt-features-section .amt-features-sub-desc' => 'margin: {{TOP}}{{UNIT}} auto {{BOTTOM}}{{UNIT}} auto ;',
                ],
				'allowed_dimensions' => 'vertical',
				'placeholder' => [
					'top' => '',
					'left' => 'auto',
					'bottom' => '',
					'right' => 'auto',
				],
				'condition'   => array( 'style' => array('style1' ) ),
			),
            array(
				'mode' => 'section_end',
			),
            array(
				'mode'    => 'section_start',
				'id'      => 'btn_style',
				'label'   => esc_html__( 'Button Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'tabs_start_btn',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_btn_normal',
				'label'   => esc_html__( 'Normal', 'ogo-core' ),
			),
            array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button-text-size',
				'label'   => esc_html__( 'Text', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-features-section .amt-features-btn a',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'text_color',
				'label'   => esc_html__( 'Text Color', 'ogo-core' ),
                'selectors' =>[
                    '{{WRAPPER}} .amt-features-section .amt-features-btn a'  => 'color: {{VALUE}};',

                ],
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_bg_color',
				'label'   => esc_html__( 'Button Background Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-features-section .amt-features-btn a' => 'background-color: {{VALUE}};',
                ],
			),
            array(
                'type' => Controls_Manager::SELECT,
                'id'      => 'btn_border_style',
				'label' => esc_html__( 'Border Type', 'ogo-core' ),
				'options' => [
					'solid'  => esc_html__( 'Solid', 'ogo-core' ),
					'dashed' => esc_html__( 'Dashed', 'ogo-core' ),
					'dotted' => esc_html__( 'Dotted', 'ogo-core' ),
					'double' => esc_html__( 'Double', 'ogo-core' ),
					'none' => esc_html__( 'None', 'ogo-core' ),
				],
                'selectors' => [
					'{{WRAPPER}} .amt-features-section .amt-features-btn a' => 'border-style: {{VALUE}};',
				],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_color',
				'label'   => esc_html__( 'Border Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-features-section .amt-features-btn a' => 'border-color: {{VALUE}};',
                ],
			),
			array(
				'mode' => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'btn_border_width',
				'label' => esc_html__( 'Border width', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-features-section .amt-features-btn a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),

            array(
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'btn_border_radius',
				'label' => esc_html__( 'Border Radius', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-features-section .amt-features-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
            array(
				'mode'    => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'btn_padding',
				'label' => esc_html__( 'Padding', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-features-section .amt-features-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
            array(
				'mode'    => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'btn_margin',
				'label' => esc_html__( 'Margin', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-features-section .amt-features-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_btn_hover',
				'label'   => esc_html__( 'Hover', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'text_hover_color',
				'label'   => esc_html__( 'Text Color', 'ogo-core' ),
                'selectors' =>[
                    '{{WRAPPER}} .amt-features-section .amt-features-btn a:hover'  => 'color: {{VALUE}};',

                ],
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_bg_hover_color',
				'label'   => esc_html__( ' Background Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-features-section .amt-features-btn a:hover' => 'background-color: {{VALUE}};',
                ],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_hover_color',
				'label'   => esc_html__( 'Border Hover Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-features-section .amt-features-btn a:hover' => 'border-color: {{VALUE}};',
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
            array(
				'mode'    => 'section_start',
				'id'      => 'item_style',
				'label'   => esc_html__( 'Item Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
				array(
					'mode'    => 'tabs_start',
					'id'      => 'tabs_start_item',
				),
					array(
						'mode'    => 'tab_start',
						'id'      => 'tab_start_item_normal',
						'label'   => esc_html__( 'Normal', 'ogo-core' ),
					),
					array(
						'mode'    => 'responsive',
						'type' => Controls_Manager::SLIDER,
						'id' => 'space_between',
						'label' => esc_html__( 'Space Between', 'ogo-core' ),
						'range' => [
							'px' => [
								'max' => 50,
							],
						],
						'default' => [
							'size' => 20,
						],
						'selectors' => [
							'{{WRAPPER}} .amt-features-section .amt-features-list ul li' => 'padding-bottom: calc({{SIZE}}{{UNIT}})',
						],
					),
					array(
						'type' => Controls_Manager::COLOR,
						'id' => 'icon-color',
						'label' => esc_html__( 'Icon Color', 'ogo-core' ),
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .amt-features-section .amt-features-list i' => 'color: {{VALUE}};',
							'{{WRAPPER}} .amt-features-section .amt-features-list svg' => 'fill: {{VALUE}};',
						],
						'global' => [
							'default' => Global_Colors::COLOR_PRIMARY,
						],
					),
					array(
						'mode'    => 'responsive',
						'type' => Controls_Manager::SLIDER,
						'label' => esc_html__( 'Icon Size', 'ogo-core' ),
						'id' => 'icon-size',
						'default' => [
							'size' => 24,
						],
						'range' => [
							'px' => [
								'min' => 6,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .amt-features-section .amt-features-list i' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					),
					array (
						'mode'    => 'group',
						'type'    => Group_Control_Typography::get_type(),
						'name'    => 'text_typo',
						'label'   => esc_html__( 'Typography', 'ogo-core' ),
						'selector' => '{{WRAPPER}} .amt-features-section .amt-features-list ul li',
						'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
						'default' => 20,
					),
					array(
						'type' => Controls_Manager::COLOR,
						'id' => 'text-color',
						'label' => esc_html__( 'Text Color', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-features-section .amt-features-list ul li' => 'color: {{VALUE}};',
						],
					),
					array(
						'mode'    => 'responsive',
						'type' => Controls_Manager::SLIDER,
						'label' => esc_html__( 'Text Indent', 'ogo-core' ),
						'id' => 'text-indent',
						'range' => [
							'px' => [
								'max' => 50,
							],
						],
						'default' => [
							'size' => 20,
						],
						'selectors' => [
							'{{WRAPPER}} .amt-features-section .amt-features-list ul li i' =>  'padding-right: {{SIZE}}{{UNIT}};',
						],
					),
					array(
						'mode' => 'tab_end',
					),
					array(
						'mode'    => 'tab_start',
						'id'      => 'tab_start_item_hover',
						'label'   => esc_html__( 'Hover', 'ogo-core' ),
					),
					array(
						'type' => Controls_Manager::COLOR,
						'id' => 'text-color-hover',
						'label' => esc_html__( 'Text Hover Color', 'ogo-core' ),
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .amt-features-section .amt-features-list ul li:hover' => 'color: {{VALUE}};',
						],
					),
					array(
						'type' => Controls_Manager::COLOR,
						'id' => 'icon-color-hover',
						'label' => esc_html__( 'Icon Hover Color', 'ogo-core' ),
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .amt-features-section .amt-features-list i:hover' => 'color: {{VALUE}};',
							'{{WRAPPER}} .amt-features-section .amt-features-list svg:hover' => 'fill: {{VALUE}};',
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
			case 'style2':
			$template = 'features-section-2';
			break;
			default:
			$template = 'features-section-1';
			break;
		}
	
		return $this->amt_template( $template, $data );
	}
}