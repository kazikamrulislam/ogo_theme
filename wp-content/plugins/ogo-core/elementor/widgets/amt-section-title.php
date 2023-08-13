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

if (!defined('ABSPATH')) exit;

class Amt_Section_Title extends Custom_Widget_Base
{

	public function __construct($data = [], $args = null)
	{
		$this->amt_name = esc_html__('AMT Section Title', 'ogo-core');
		$this->amt_base = 'amt-section-title';
		parent::__construct($data, $args);
	}

	public function amt_fields()
	{
		$fields = array(

			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__('AMT Title', 'ogo-core'),
			),

			/*box title*/
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'style',
				'label'   => esc_html__('AMT Title Style', 'ogo-core'),
				'options' => array(
					'style1' => esc_html__('Title Style 1', 'ogo-core'),
					'style2' => esc_html__('Title Style 2', 'ogo-core'),
					'style3' => esc_html__('Title Style 3', 'ogo-core'),
					'style4' => esc_html__('Title Style 4', 'ogo-core'),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'select_title_tag',
				'label'   => esc_html__('Title Tag', 'ogo-core'),
				'options' => array(
					'h1'        => esc_html__('H1', 'ogo-core'),
					'h2'        => esc_html__('H2', 'ogo-core'),
					'h3'        => esc_html__('H3', 'ogo-core'),
					'h4'        => esc_html__('H4', 'ogo-core'),
					'h5'        => esc_html__('H5', 'ogo-core'),
					'h6'        => esc_html__('H6', 'ogo-core'),
				),
				'default' => 'h2',
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'sub_title',
				'label'   => esc_html__('Sub Title', 'ogo-core'),
				'default' => 'Ogo',
				'condition'   => array('style' => array('style1')),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__('Title', 'ogo-core'),
				'default' => 'Valuable feedback from our clients',
			),
			array(
				'type'    => Controls_Manager::CHOOSE,
				'id'      => 'title_align',
				'label'   => esc_html__('Title Align', 'ogo-core'),
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'plugin-name'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'plugin-name'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'plugin-name'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => array(
					'{{WRAPPER}} .sec-title-holder' => 'text-align: {{VALUE}};',
				),
			),

			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'description',
				'label'   => esc_html__('Sub Title', 'ogo-core'),
				'default' => 'Businesss generally promote their brand, products and services by identifying audience.',
				'condition'   => array('style' => array('style1', 'style2', 'style4')),
			),

			array(
				'mode' => 'section_end',
			),

			// Style


			array(
				'mode'    => 'section_start',
				'id'      => 'sub_title_style',
				'label'   => esc_html__('Sub-Title Style', 'ogo-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array('style' => array('style1')),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__('Typography', 'ogo-core'),
				'selector' => '{{WRAPPER}} .amt-subtitle h5',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__('Color', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-subtitle h5'  => 'color: {{VALUE}};',

				],
				'default' => ' #53AFEE',
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'divider_style',
				'label' => esc_html__('Divider', 'ogo-core'),
				'separator' => 'before',
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::SLIDER,
				'id'      => 'divider_width',
				'label' => esc_html__('Height', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-sec-title .amt-subtitle h5' => 'border-width: 0 0 {{SIZE}}{{UNIT}} 0;',
				],
			),
			array(
				'type' => Controls_Manager::COLOR,
				'id'      => 'divider_color',
				'label' => esc_html__('Color', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-sec-title .amt-subtitle h5' => 'border-color: {{VALUE}};',
				],
			),

			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'title_style',
				'label'   => esc_html__('Title Style', 'ogo-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__('Title Style', 'ogo-core'),
				'selector' => '{{WRAPPER}} .amt-sec-title .amtin-title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__('Title Color', 'ogo-core'),
				'default' => ' #1F0D3C',
				'selectors' => array(
					'{{WRAPPER}} .amt-sec-title .amtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'title-padding',
				'label' => esc_html__('Padding', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-sec-title .amtin-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'description_style',
				'label'   => esc_html__('Description Style', 'ogo-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array('style' => array('style1', 'style2', 'style4')),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'description_typo',
				'label'   => esc_html__('Description', 'ogo-core'),
				'selector' => '{{WRAPPER}} .amt-sec-title .amt-desc',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'description_color',
				'label'   => esc_html__('Description Color', 'ogo-core'),
				'default' => '#676E89',
				'selectors' => array(
					'{{WRAPPER}} .amt-desc' => 'color: {{VALUE}}',
				),
			),
			array(
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'description-padding',
				'label' => esc_html__('Padding', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-sec-title .amt-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			case 'style1':
				$template = 'amt-title-1';
				break;
			case 'style2':
				$template = 'amt-title-2';
				break;
			case 'style3':
				$template = 'amt-title-3';
				break;
			default:
				$template = 'amt-title-4';
				break;
		}

		return $this->amt_template($template, $data);
	}
}
