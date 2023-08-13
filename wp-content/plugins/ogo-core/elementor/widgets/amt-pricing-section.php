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
use Elementor\Group_Control_Box_Shadow;
use Elementor\Utils;
use OgoTheme;
use OgoTheme_Helper;

if (!defined('ABSPATH')) exit;

class Amt_Pricing_Section extends Custom_Widget_Base
{

	public function __construct($data = [], $args = null)
	{
		$this->amt_name = esc_html__('AMT Pricing Section', 'ogo-core');
		$this->amt_base = 'amt-pricing-section';
		parent::__construct($data, $args);
	}

	public function amt_fields()
	{
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'selected_icon',
			[
				'label' => esc_html__('Icon', 'ogo-core'),
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
				'label' => esc_html__('Text', 'ogo-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__('List Item', 'ogo-core'),
				'default' => esc_html__('List Item', 'ogo-core'),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__('General', 'ogo-core'),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__('Section Style', 'ogo-core'),
				'options' => array(
					'style1' => esc_html__('Pricing Style 1', 'ogo-core'),
					'style2' => esc_html__('Pricing Style 2', 'ogo-core'),
					'style3' => esc_html__('Pricing Style 3', 'ogo-core'),
					'style4' => esc_html__('Pricing Style 4', 'ogo-core'),
					'style5' => esc_html__('Pricing Style 5', 'ogo-core'),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__('Title', 'ogo-core'),
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__('Personal', 'ogo-core'),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'description',
				'label'   => esc_html__('Description', 'ogo-core'),
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__('Sharing Marketing Agency Website Landing Page UI Design.', 'ogo-core'),
				'condition' => ['style' => 'style5'],
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'sub-title',
				'label'   => esc_html__('Sub Title', 'ogo-core'),
				'default' => esc_html__('Perfect to get started', 'ogo-core'),
				'condition'   => array('style' => array('style1')),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_pricing',
				'label'   => esc_html__('Price', 'ogo-core'),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'price',
				'dynamic' => [
					'active' => true,
				],
				'label'   => esc_html__('Price', 'ogo-core'),
				'default' => esc_html__('999.99', 'ogo-core'),
				'condition'   => array('style' => array('style1', 'style2', 'style3')),
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'price_symbol',
				'dynamic' => [
					'active' => true,
				],
				'label'   => esc_html__('Currency Symbol', 'ogo-core'),
				'options' => array(
					'' => esc_html__('None', 'ogo-core'),
					'$' => esc_html__('$Dollar', 'ogo-core'),
					'£' => esc_html__('£Pound', 'ogo-core'),
					'€' => esc_html__('€Euro', 'ogo-core'),
					'custom' => esc_html__('Custom', 'ogo-core'),
				),
				'default' => '$',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'price_symbol_custom',
				'label'   => esc_html__('Custom Symbol', 'ogo-core'),
				'condition'   => array('price_symbol' => array('custom')),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'price_period',
				'dynamic' => [
					'active' => true,
				],
				'label'   => esc_html__('Period', 'ogo-core'),
				'default' => esc_html__('/month', 'ogo-core'),
				'condition'   => array('style' => array('style1', 'style2', 'style3')),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'service-name-1',
				'dynamic' => [
					'active' => true,
				],
				'label'   => esc_html__('Service 1', 'ogo-core'),
				'default' => esc_html__('Logo design', 'ogo-core'),
				'condition' => ['style' => 'style5'],
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'price1',
				'dynamic' => [
					'active' => true,
				],
				'label'   => esc_html__('Price', 'ogo-core'),
				'default' => esc_html__('10', 'ogo-core'),
				'condition' => ['style' => 'style5'],
			),

			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'service-name-2',
				'dynamic' => [
					'active' => true,
				],
				'label'   => esc_html__('Service 2', 'ogo-core'),
				'default' => esc_html__('Branding design', 'ogo-core'),
				'condition' => ['style' => 'style5'],
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'price2',
				'dynamic' => [
					'active' => true,
				],
				'label'   => esc_html__('Price', 'ogo-core'),
				'default' => esc_html__('10', 'ogo-core'),
				'condition' => ['style' => 'style5'],
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'service-name-3',
				'dynamic' => [
					'active' => true,
				],
				'label'   => esc_html__('Service 3', 'ogo-core'),
				'default' => esc_html__('Case study', 'ogo-core'),
				'condition' => ['style' => 'style5'],
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'price3',
				'dynamic' => [
					'active' => true,
				],
				'label'   => esc_html__('Price', 'ogo-core'),
				'default' => esc_html__('10', 'ogo-core'),
				'condition' => ['style' => 'style5'],
			),

			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'service-name-4',
				'dynamic' => [
					'active' => true,
				],
				'label'   => esc_html__('Service 4', 'ogo-core'),
				'default' => esc_html__('Revisions', 'ogo-core'),
				'condition' => ['style' => 'style5'],
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'price4',
				'dynamic' => [
					'active' => true,
				],
				'label'   => esc_html__('Price', 'ogo-core'),
				'default' => esc_html__('10', 'ogo-core'),
				'condition' => ['style' => 'style5'],
			),

			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'service-name-5',
				'dynamic' => [
					'active' => true,
				],
				'label'   => esc_html__('Service 5', 'ogo-core'),
				'default' => esc_html__('Unlimited revisions', 'ogo-core'),
				'condition' => ['style' => 'style5'],
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'price5',
				'dynamic' => [
					'active' => true,
				],
				'label'   => esc_html__('Price', 'ogo-core'),
				'default' => esc_html__('10', 'ogo-core'),
				'condition' => ['style' => 'style5'],
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_button',
				'label'   => esc_html__('Button', 'ogo-core'),
			),
			array(
				'type'        => Controls_Manager::TEXT,
				'id'          => 'button_one',
				'label'       => esc_html__('Button Text', 'ogo-core'),
				'default' 	  => esc_html__('Get-Started', 'ogo-core'),
			),
			array(
				'type'        => Controls_Manager::URL,
				'id'          => 'one_buttonurl',
				'label'       => esc_html__('Button URL', 'ogo-core'),
				'placeholder' => 'https://your-link.com',

			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_features',
				'label'   => esc_html__('List Iteams', 'ogo-core'),
				'condition'   => array('style' => array('style1', 'style2', 'style3')),
			),
			array(
				'label' => esc_html__('Items', 'ogo-core'),
				'id'    => 'icon_list',
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'text' => esc_html__('Free consulting', 'ogo-core'),
						'selected_icon' => [
							'value' => 'fas fa-check-circle',
							'library' => 'fa-solid',
						],
					],
					[
						'text' => esc_html__('Up to 1,000 contacts', 'ogo-core'),
						'selected_icon' => [
							'value' => 'fas fa-check-circle',
							'library' => 'fa-solid',
						],
					],
					[
						'text' => esc_html__('24/7 Customer support', 'ogo-core'),
						'selected_icon' => [
							'value' => 'fas fa-check-circle',
							'library' => 'fa-solid',
						],
					],
					[
						'text' => esc_html__('Free App', 'ogo-core'),
						'selected_icon' => [
							'value' => 'fas fa-check-circle',
							'library' => 'fa-solid',
						],
					],
					[
						'text' => esc_html__('Site optimization', 'ogo-core'),
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
			array(
				'mode'    => 'section_start',
				'id'      => 'bg_img_style',
				'label'   => esc_html__('Image', 'ogo-core'),
				'condition' => ['style' => 'style1', 'style2', 'style3']
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'Image_display_1',
				'label'       => esc_html__('Background Image Display', 'ogo-core'),
				'label_on'    => esc_html__('On', 'ogo-core'),
				'label_off'   => esc_html__('Off', 'ogo-core'),
				'default'     => 'yes',
				'description' => esc_html__('Show or Hide Image. Default: on', 'ogo-core'),
				'condition'   => array('style' => array('style1')),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image',
				'label' => esc_html__('Choose Image', 'ogo-core'),
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'   => array('Image_display_1' => array('yes')),
			),
			array(
				'mode' => 'group',
				'type'    => Group_Control_Image_Size::get_type(),
				'name'      => 'image',
				'default' => 'large',
				'separator' => 'none',
				'condition'   => array('Image_display_1' => array('yes')),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'Image_display_2',
				'label'       => esc_html__('Image Display', 'ogo-core'),
				'label_on'    => esc_html__('On', 'ogo-core'),
				'label_off'   => esc_html__('Off', 'ogo-core'),
				'default'     => 'yes',
				'description' => esc_html__('Show or Hide Image. Default: off', 'ogo-core'),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image_2',
				'label' => esc_html__('Choose Image', 'ogo-core'),
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'   => array('Image_display_2' => array('yes')),
			),
			array(
				'mode' => 'group',
				'type'    => Group_Control_Image_Size::get_type(),
				'name'      => 'image_2',
				'default' => 'large',
				'separator' => 'none',
				'condition'   => array('Image_display_2' => array('yes')),
			),
			array(
				'mode' => 'section_end',
			),
			// Style

			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__('Style', 'ogo-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'heading_title',
				'label' => esc_html__('Title', 'ogo-core'),

			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'name'    => 'title_typo',
				'label'   => esc_html__('Title Typography', 'ogo-core'),
				'selector' => '{{WRAPPER}} .amt-single-price-item h3',
				'condition' => ['style' => 'style1', 'style2', 'style3'],
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'name'    => 'title_five_typo',
				'label'   => esc_html__('Title Typography', 'ogo-core'),
				'selector' => '{{WRAPPER}} .top-title h3',
				'condition' => ['style' => 'style5'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__('Color', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-single-price-item h3'  => 'color: {{VALUE}};',
					'{{WRAPPER}} .top-title h3'  => 'color: {{VALUE}};',

				],
				'default' => '#53AFEE',
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'heading_desc',
				'label' => esc_html__(' Description', 'ogo-core'),
				'separator' => 'before',
				'condition' => ['style' => 'style5'],
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'name'    => 'desc_title_typo',
				'label'   => esc_html__('Typography', 'ogo-core'),
				'selector' => '{{WRAPPER}} .top-desc p',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'desc_color',
				'label'   => esc_html__('Color', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .top-desc p'  => 'color: {{VALUE}};',
				],
				'default' => '#D9DAE1',
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'sub_heading_title',
				'label' => esc_html__('Sub Title', 'ogo-core'),
				'separator' => 'before',
				'condition'   => array('style' => array('style1')),

			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'name'    => 'sub_title_typo',
				'label'   => esc_html__('Typography', 'ogo-core'),
				'selector' => '{{WRAPPER}} .amt-single-price-item h4',
				'condition'   => array('style' => array('style1')),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__('Color', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-single-price-item h4'  => 'color: {{VALUE}};',
				],
				'default' => '#D9DAE1',
				'condition'   => array('style' => array('style1')),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'box_shadow',
				'label'   => esc_html__('Hover Box Shadow', 'ogo-core'),
				'selector' => '{{WRAPPER}} .amt-single-price-item:hover ',
				'condition'   => array('style' => array('style1')),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'price_style',
				'label'   => esc_html__('Price Style', 'ogo-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'name'    => 'pricing_typo',
				'label'   => esc_html__('Typography', 'ogo-core'),
				'selector' => '{{WRAPPER}} .amt-single-price-item .amt-single-price-integer',
				'condition' => [
					'style' => 'style1', 'style2', 'style3',
				],
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'name'    => 'pricing_typo5',
				'label'   => esc_html__('Typography', 'ogo-core'),
				'selector' => '{{WRAPPER}} .single-service-price label',
				'condition' => [
					'style' => 'style5',
				],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'price_color',
				'label'   => esc_html__('Color', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-single-price-item .amt-single-price-integer'  => 'color: {{VALUE}};',
					'{{WRAPPER}} .single-service-price label'  => 'color: {{VALUE}};',
				],
				'default' => '#1F0D3C',
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'price_symbol_heading',
				'label' => esc_html__('Symbol', 'ogo-core'),
				'separator' => 'before',
			),
			array(
				'id'      => 'price_symbol_size',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__('Size', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-single-price-item .amt-single-price-currency' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .single-service-price span' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'price_symbol_color',
				'label'   => esc_html__('Color', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-single-price-item .amt-single-price-currency'  => 'color: {{VALUE}};',
					'{{WRAPPER}} .single-service-price span'  => 'color: {{VALUE}};',
				],
				'default' => '#1F0D3C',
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'price_period_heading',
				'label' => esc_html__('Period', 'ogo-core'),
				'separator' => 'before',
				'condition' => ['style' => 'style1', 'style2', 'style3'],
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'name'    => 'price_period_typo',
				'label'   => esc_html__('Typography', 'ogo-core'),
				'selector' => '{{WRAPPER}} .amt-single-price-item .amt-single-price-period',
				'condition' => ['style' => 'style1', 'style2', 'style3'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'price_period_color',
				'label'   => esc_html__('Color', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-single-price-item .amt-single-price-period'  => 'color: {{VALUE}};',
				],
				'default' => '#676E89',
				'condition' => ['style' => 'style1', 'style2', 'style3'],
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'btn_style',
				'label'   => esc_html__('Button Style', 'ogo-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'tabs_start_icon',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_btn_normal',
				'label'   => esc_html__('Normal', 'ogo-core'),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button-text-size',
				'label'   => esc_html__('Text', 'ogo-core'),
				'selector' => '{{WRAPPER}} .amt-single-pricing-btn a',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'text_color',
				'label'   => esc_html__('Text Color', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-single-price-btn a'  => 'color: {{VALUE}};',

				],
				'default' => '#fff',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_bg_color',
				'label'   => esc_html__('Button Background Color', 'ogo-core'),
				'default' => '#53AFEE',
				'selectors' => [
					'{{WRAPPER}} .amt-single-price-btn a' => 'background-color: {{VALUE}};',
				],
			),
			array(
				'type' => Controls_Manager::SELECT,
				'id'      => 'btn_border_style',
				'label' => esc_html__('Border Type', 'ogo-core'),
				'options' => [
					'solid'  => esc_html__('Solid', 'ogo-core'),
					'dashed' => esc_html__('Dashed', 'ogo-core'),
					'dotted' => esc_html__('Dotted', 'ogo-core'),
					'double' => esc_html__('Double', 'ogo-core'),
					'none' => esc_html__('None', 'ogo-core'),
				],
				'selectors' => [
					'{{WRAPPER}} .amt-single-price-btn a' => 'border-style: {{VALUE}};',
				],
				'default' => 'none',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_color',
				'label'   => esc_html__('Border Color', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-single-price-btn a' => 'border-color: {{VALUE}};',
				],
			),
			array(
				'mode' => 'tab_end',

			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_btn_hover',
				'label'   => esc_html__('Hover', 'ogo-core'),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'text_hover_color',
				'label'   => esc_html__('Text Hover Color', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-single-price-btn a:hover'  => 'color: {{VALUE}};',

				],
				'default' => '#fff',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_hover_color',
				'label'   => esc_html__('Button Hover Color', 'ogo-core'),
				'default' => '#1F0D3C',
				'selectors' => [
					'{{WRAPPER}} .amt-single-price-btn a:hover' => 'background-color: {{VALUE}};',
				],
			),
			array(
				'type' => Controls_Manager::SELECT,
				'id'      => 'btn_hover_border_style',
				'label' => esc_html__('Border Type', 'ogo-core'),
				'options' => [
					'solid'  => esc_html__('Solid', 'ogo-core'),
					'dashed' => esc_html__('Dashed', 'ogo-core'),
					'dotted' => esc_html__('Dotted', 'ogo-core'),
					'double' => esc_html__('Double', 'ogo-core'),
					'none' => esc_html__('None', 'ogo-core'),
				],
				'selectors' => [
					'{{WRAPPER}} .amt-single-price-btn a:hover' => 'border-style: {{VALUE}};',
				],
				'default' => 'none',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_hover_color',
				'label'   => esc_html__('Border Color', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-single-price-btn a:hover' => 'border-color: {{VALUE}};',
				],
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode' => 'tabs_end',
			),
			array(
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'btn_border_radius',
				'label' => esc_html__('Border Radius', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-single-price-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'btn_padding',
				'label' => esc_html__('Padding', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-single-price-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'btn_margin',
				'label' => esc_html__('Margin', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-single-price-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),

			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'item_style',
				'label'   => esc_html__('Item Style', 'ogo-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition' => ['style' => 'style1', 'style2', 'style3']
			),
			array(
				'type' => Controls_Manager::SLIDER,
				'id' => 'space_between',
				'label' => esc_html__('Space Between', 'ogo-core'),
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'default' => [
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .amt-pricing-list ul li' => 'padding-bottom: calc({{SIZE}}{{UNIT}}/2)',
				],
			),
			array(
				'type' => Controls_Manager::COLOR,
				'id' => 'icon-color',
				'label' => esc_html__('Icon Color', 'ogo-core'),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .amt-pricing-list i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .amt-pricing-list svg' => 'fill: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
			),
			array(
				'type' => Controls_Manager::COLOR,
				'id' => 'icon-color-hover',
				'label' => esc_html__('Icon Hover Color', 'ogo-core'),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .amt-pricing-list i:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .amt-pricing-list svg:hover' => 'fill: {{VALUE}};',
				],
			),
			array(
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__('Icon Size', 'ogo-core'),
				'id' => 'icon-size',
				'default' => [
					'size' => 20,
				],
				'range' => [
					'px' => [
						'min' => 6,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .amt-pricing-list i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'text_typo',
				'label'   => esc_html__('Typography', 'ogo-core'),
				'selector' => '{{WRAPPER}} .amt-pricing-list ul li',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'default' => 20,
			),
			array(
				'type' => Controls_Manager::COLOR,
				'id' => 'text-color',
				'label' => esc_html__('Text Color', 'ogo-core'),
				'default' => '#676E89',
				'selectors' => [
					'{{WRAPPER}} .amt-pricing-list ul li' => 'color: {{VALUE}};',
				],
			),
			array(
				'type' => Controls_Manager::COLOR,
				'id' => 'text-color-hover',
				'label' => esc_html__('Text Hover Color', 'ogo-core'),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .amt-pricing-list ul li:hover' => 'color: {{VALUE}};',
				],
			),
			array(
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__('Text Indent', 'ogo-core'),
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
					'{{WRAPPER}} .amt-pricing-list ul li i' =>  'padding-right: {{SIZE}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render()
	{
		$data = $this->get_settings();

		switch ($data['style']) {
			case 'style5':
				$template = 'amt-pricing-section-5';
				break;
			case 'style4':
				$template = 'amt-pricing-section-4';
				break;
			case 'style3':
				$template = 'amt-pricing-section-3';
				break;
			case 'style2':
				$template = 'amt-pricing-section-2';
				break;
			default:
				$template = 'amt-pricing-section-1';
				break;
		}

		return $this->amt_template($template, $data);
	}
}
