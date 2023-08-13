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

class Amt_Service_Box extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Service Box', 'ogo-core' );
		$this->amt_base = 'amt-service-box';
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
				'label'   => esc_html__( 'Service Style', 'ogo-core' ),
				'options' => array(
					'style1' => esc_html__( 'Service Style 1', 'ogo-core' ),
					'style2' => esc_html__( 'Service Style 2', 'ogo-core' ),
                    'style3' => esc_html__( 'Service Style 3', 'ogo-core' ),
                    'style4' => esc_html__( 'Service Style 4', 'ogo-core' ),
                    'style5' => esc_html__( 'Service Style 5', 'ogo-core' ),
                    'style6' => esc_html__( 'Service Style 6', 'ogo-core' ),
                    'style7' => esc_html__( 'Service Style 7', 'ogo-core' ),
				),
				'default' => 'style1',
			),
            array(
				'type'    => Controls_Manager::CHOOSE,
				'id'      => 'align_items',
				'label'   => esc_html__( 'Align Items', 'ogo-core' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'ogo-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ogo-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ogo-core' ),
						'icon' => 'eicon-text-align-right',
					],
                    'justify' => [
						'title' => esc_html__( 'Justify', 'ogo-core' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
                'selectors' => [
					'{{WRAPPER}} .amt-service1-box, {{WRAPPER}} .amt-service2-box, {{WRAPPER}} .amt-service3-box, {{WRAPPER}} .amt-service5-box ' => 'text-align: {{VALUE}};',
				],
                'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style2', 'style5' ) ),
				'default' => 'left',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'bg_image_display',
				'label'       => esc_html__( 'Background Image Display', 'ogo-core' ),
				'label_on'    => esc_html__( 'On', 'ogo-core' ),
				'label_off'   => esc_html__( 'Off', 'ogo-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Image. Default: on', 'ogo-core' ),
                'condition'   => array( 'style' => array( 'style1') ),
			),
			array(
				'mode' => 'section_end',
			),
			//Icon
			array(
				'mode'    => 'section_start',
				'id'      => 'icon_style',
				'label'   => esc_html__( 'Icon', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4', 'style6' ) ),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon',
				'label'   => esc_html__( 'Icon', 'ogo-core' ),
				'default' => [
                    'value' => 'fa fa-university',
                    'library' => 'fa-solid',
                ],
			),
			array(
				'mode' => 'section_end',
			),
			//Image
			array(
				'mode'    => 'section_start',
				'id'      => 'image_style',
				'label'   => esc_html__( 'Image', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style3', 'style6', 'style7' ) ),
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
				'mode' => 'section_end',
			),
			//content
			array(
				'mode'    => 'section_start',
				'id'      => 'content_style',
				'label'   => esc_html__( 'Content', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'ogo-core' ),
				'default' => 'UX Strategy',
			),
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'ogo-core' ),
                'condition'   => array( 'style' => array( 'style1','style2','style3','style4','style5', 'style6' ) ),
				'default' => esc_html__('Sharing Marketing Agency Website Landing Page UI Design. This design is suitable for marketing agency', 'ogo-core' ),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'button_style',
				'label'   => esc_html__( 'Button', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style4', 'style5', 'style6' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'button_display',
				'label'       => esc_html__( 'Button Display', 'ogo-core' ),
				'label_on'    => esc_html__( 'On', 'ogo-core' ),
				'label_off'   => esc_html__( 'Off', 'ogo-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Content. Default: on', 'ogo-core' ),
                'condition'   => array( 'style' => array( 'style4', 'style5', 'style6' ) ),
			),
			array(
				'type'        => Controls_Manager::TEXT,
				'id'          => 'button_one',
				'label'       => esc_html__( 'Button Text', 'ogo-core' ),
				'default' 	  => esc_html__('More Details', 'ogo-core' ),
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
			array(
				'type'        => Controls_Manager::URL,
				'id'          => 'one_buttonurl',
				'label'       => esc_html__( 'Button URL', 'ogo-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
            array(
                'type'    => Controls_Manager::CHOOSE,
                'id'      => 'btn_align',
                'label'   => esc_html__( 'Button Align', 'ogo-core' ),
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'ogo-core' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'ogo-core' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'ogo-core' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .amt-service5-box .amt-service-btn' => 'text-align: {{VALUE}};',
                ],
                'condition'   => array( 'style' => 'style5' ),
                'default' => 'right',
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
                'type' => Controls_Manager::SLIDER,
                'id'      => 'box_border5',
				'label' => esc_html__( 'Border', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-service5-box' => 'border-width: {{SIZE}}{{UNIT}} 0;',
				],
				'condition'   => array( 'style' => array( 'style5' ) ),
			),
			array(
                'type' => Controls_Manager::SLIDER,
                'id'      => 'box_border4',
				'label' => esc_html__( 'Hover Border', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-service4-box:hover ' => 'border-width: 0 0 {{SIZE}}{{UNIT}} 0 ;',
				],
				'condition'   => array( 'style' => array( 'style4' ) ),
			),
			array(
                'type' => Controls_Manager::COLOR,
                'id'      => 'border_color4',
				'label' => esc_html__( 'Hover Border Color', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-service4-box:hover ' => 'border-color: {{VALUE}};',
				],
				'condition'   => array( 'style' => array( 'style4') ),
			),
			array(
                'type' => Controls_Manager::SLIDER,
                'id'      => 'box_border7',
				'label' => esc_html__( 'Border', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-catagory-button' => 'border-width: 0 0 {{SIZE}}{{UNIT}} 0 ;',
				],
				'condition'   => array( 'style' => array( 'style7' ) ),
			),
			array(
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'box_border',
				'label' => esc_html__( 'Border', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-service2-box-border' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
            array(
                'type' => Controls_Manager::COLOR,
                'id'      => 'border_color',
				'label' => esc_html__( 'Border Color', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-service-box, {{WRAPPER}} .amt-service2-box-border, {{WRAPPER}} .amt-service5-box, {{WRAPPER}} .amt-catagory-button ' => 'border-color: {{VALUE}};',
				],
				'condition'   => array( 'style' => array( 'style2','style5', 'style7' ) ),
			),




			array(
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'border_radius',
				'label' => esc_html__( 'Border Radius', 'ogo-core' ),
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .amt-service-box, .amt-catagory-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style5', 'style7' ) ),
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'box_padding',
				'label' => esc_html__( 'Padding', 'ogo-core' ),
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .amt-service-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style5' ) ),
			),




			array (
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'box_shadow',
				'label'   => esc_html__( 'Hover Box Shadow', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-service-box-shadow:hover ',
				'condition'   => array( 'style' => array( 'style1', 'style2' ) ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'box_shadow4',
				'label'   => esc_html__( ' Box Shadow', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-service-box-shadow ',
				'condition'   => array( 'style' => array( 'style4' ) ),
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bg_color',
				'label'   => esc_html__( 'Background Color', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style5', 'style7' ) ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service5-box, .amt-catagory-button' => 'background-color: {{VALUE}};',
                ],
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bg_hover_color',
				'label'   => esc_html__( 'Background Hover Color', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style5', 'style7' ) ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service5-box:hover, .amt-catagory-button:hover' => 'background-color: {{VALUE}};',
                ],
			),
			array(
				'mode'    => 'responsive',
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'image_space',
				'label'   => esc_html__( 'Spacing', 'ogo-core' ),
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .amt-service6-box .amtservice-media-img' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
				'condition'   => array( 'style' => array( 'style6' ) ),
			),
			array(
				'mode'    => 'responsive',
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'image_width',
				'label'   => esc_html__( 'Width(%)', 'ogo-core' ),
				'default' => [
					'size' => 100,
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 5,
						'max' => 100,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .amt-service6-box .amtservice-media-img' => 'width: {{SIZE}}{{UNIT}};',
                ],
				'condition'   => array( 'style' => array( 'style6' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'style_icon',
				'label'   => esc_html__( 'Icon', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4', 'style6' ) ),
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'tabs_start_icon',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_icon_normal',
				'label'   => esc_html__( 'Normal', 'ogo-core' ),
			),
			array (
				'mode'    => 'responsive',
				'type'    => Controls_Manager::SLIDER,
                'id'      => 'icon_space',
				'label'   => esc_html__( 'Spacing', 'ogo-core' ),
                'size_units' => array('px','%'),
				'selectors' => [
                    '{{WRAPPER}} .amt-service-box .amtservice-media-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
			),
            array (
				'mode'    => 'responsive',
                'id'      => 'icon_size',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__( 'Size', 'ogo-core' ),
                'size_units' => array('px','%'),
				'selectors' => [
                    '{{WRAPPER}} .amt-service-box .amtservice-media-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service-box .amtservice-media-icon i' => 'color: {{VALUE}};',
                ],
				'default' => '#fff',
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_bg_color',
				'label'   => esc_html__( 'Background Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amtservice-media-icon i' => 'background-color: {{VALUE}};',
                ],
			),
            array(
				'mode'    => 'responsive',
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'icon_padding',
				'label'   => esc_html__( 'Padding', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amtservice-media-icon i' => 'padding: {{SIZE}}{{UNIT}};',
                ],
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_icon_hover',
				'label'   => esc_html__( 'Hover', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_hover_color',
				'label'   => esc_html__( ' Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amtservice-media-icon i:hover' => 'color: {{VALUE}};',
                ],
				'default' => '#fff',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_hover_bg_color',
				'label'   => esc_html__( 'Background Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amtservice-media-icon i:hover' => 'background-color: {{VALUE}};',
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
				'id'      => 'style_content',
				'label'   => esc_html__( 'Content', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style1','style2','style3','style4','style5', 'style6' ) ),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'servicebox_title_1',
				'label' => esc_html__( 'Title', 'ogo-core' ),
				'separator' => 'before',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Typography', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-service-box .amt-service-box-content .amt-service-title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service-box .amt-service-box-content .amt-service-title ' => 'color: {{VALUE}};',
                ],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_hover_color',
				'label'   => esc_html__( 'Title Hover Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service4-box:hover .amt-service-box-content .amt-service-title, {{WRAPPER}} .amt-service3-box:hover .amt-service-box-content .amt-service-title, {{WRAPPER}} .amt-service5-box:hover .amt-service-box-content .amt-service-title, {{WRAPPER}} .amt-catagory-button:hover .amt-service-title' => 'color: {{VALUE}};',
                ],
				'condition'   => array( 'style' => array( 'style3', 'style4', 'style5', 'style7' ) ),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'servicebox_content_1',
				'label' => esc_html__( 'Description', 'ogo-core' ),
				'separator' => 'before',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Typography', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-service-box .amt-service-box-content .amt-service-content',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service-box .amt-service-box-content .amt-service-content' => 'color: {{VALUE}};',
                ],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_hover_color',
				'label'   => esc_html__( 'Content Hover Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service5-box:hover .amt-service-box-content p' => 'color: {{VALUE}};',
                ],
				'condition'   => array( 'style' => 'style5' ),
			),
			array (
				'mode'    => 'responsive',
				'type'    => Controls_Manager::DIMENSIONS,
                'id'      => 'content_space',
				'label'   => esc_html__( 'Spacing', 'ogo-core' ),
                'size_units' => array('px','%'),
				'selectors' => [
                    '{{WRAPPER}} .amt-service-content' => 'margin: {{TOP}}{{UNIT}} auto {{BOTTOM}}{{UNIT}} auto ;',
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
				'id'      => 'servicebox_divider_1',
				'label' => esc_html__( 'Divider', 'ogo-core' ),
				'separator' => 'before',
				'condition'   => array( 'style' => array( 'style1','style2','style3', 'style6' ) ),
			),
            array(
                'type' => Controls_Manager::SLIDER,
                'id'      => 'box_divider',
				'label' => esc_html__( 'Height', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-service-box-border, .amt-catagory-button' => 'border-width: 0 0 {{SIZE}}{{UNIT}} 0;',
				],
				'condition'   => array( 'style' => array( 'style1','style2','style3', 'style6' ) ),
			),
			array(
                'type' => Controls_Manager::COLOR,
                'id'      => 'divider_color',
				'label' => esc_html__( 'Color', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-service-box-border' => 'border-color: {{VALUE}};',
				],
				'condition'   => array( 'style' => array( 'style1','style2','style3', 'style6' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'style_button',
				'label'   => esc_html__( 'Button', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style4','style5', 'style6' ) ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'name'    => 'button_typo',
				'label'   => esc_html__( 'Typography', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-service-box  .amt-service-btn a',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text_color',
				'label'   => esc_html__( 'Text Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service-box  .amt-service-btn a ' => 'color: {{VALUE}};',
                ],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text_hover_color',
				'label'   => esc_html__( 'Text Hover Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service-box:hover  .amt-service-btn a ' => 'color: {{VALUE}};',
                ],
			),
			array (
				'mode'    => 'responsive',
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_space',
				'label'   => esc_html__( 'Button Spacing', 'ogo-core' ),
				'size_units' => array('px','%'),
				'allowed_dimensions' => 'vertical',
				'placeholder' => [
							'top' => '',
							'left' => 'auto',
							'bottom' => '',
							'right' => 'auto',
				],
				'selectors' => [
					'{{WRAPPER}} .amt-service-btn' => 'margin: {{TOP}}{{UNIT}} auto {{BOTTOM}}{{UNIT}} auto ;',
				],
				'condition'   => array( 'style' => array( 'style5', 'style6' ) ),
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
            case 'style7':
            $template = 'service-box-7';
            break;
            case 'style6':
            $template = 'service-box-6';
            break;
            case 'style5':
            $template = 'service-box-5';
            break;
            case 'style4':
            $template = 'service-box-4';
            break;
            case 'style3':
            $template = 'service-box-3';
            break;
			case 'style2':
			$template = 'service-box-2';
			break;
			default:
			$template = 'service-box-1';
			break;
		}
	
		return $this->amt_template( $template, $data );
	}
}