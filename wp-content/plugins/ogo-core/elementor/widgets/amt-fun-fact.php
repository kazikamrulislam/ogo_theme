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
use Elementor\Utils;

if (!defined('ABSPATH')) exit;

class Amt_Fun_Fact extends Custom_Widget_Base
{

	public function __construct($data = [], $args = null)
	{
		$this->amt_name = esc_html__('AMT Fun Fact', 'ogo-core');
		$this->amt_base = 'amt-fun-fact';
		parent::__construct($data, $args);
	}

	public function amt_fields()
	{

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'title',
			array(
				'type'    => Controls_Manager::TEXT,
				'label'   => __('Title', 'ogo-core'),
				'default' => 'Title',
			),
		);
		$repeater->add_control(
			'sub_title',
			array(
				'type'    => Controls_Manager::TEXT,
				'label'   => __('Sub Title', 'ogo-core'),
				'default' => 'Sub Title',
			)
		);
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__('General', 'ogo-core'),
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'list_items',
				'label'   => esc_html__('Items', 'ogo-core'),
				'fields'  => $repeater->get_controls(),
				'default' => [ 
					[ 
						'title' => '120+', 
						'sub_title' => 'Completed Works' 
					], 
					[ 
						'title' => '1,100+', 
						'sub_title' => 'Working Hours' 
					],
					[ 
						'title' => '115+', 
						'sub_title' => 'Happy Customers' 
					],
					[ 
						'title' => '30+', 
						'sub_title' => 'Award Winning' 
					],
				]
			),
			array(
				'mode' => 'section_end',
			),

			// Style Start Here
			array(
				'mode'    => 'section_start',
				'id'      => 'style',
				'label'   => esc_html__('Text Style', 'ogo-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'btn_padding',
				'label' => esc_html__( 'Padding', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-fun-fact ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode'		=> 'responsive',
				'type' 		 => Controls_Manager::CHOOSE,
				'id'      	 => 'view',
				'label'		 => esc_html__('Layout', 'ogo-core'),
				'options' 	 => [
					'column' 	=> [
						'title' => esc_html__('List', 'ogo-core'),
						'icon'  => 'eicon-editor-list-ul',
					],
					'row' 		=> [
						'title' => esc_html__('Inline', 'ogo-core'),
						'icon'  => 'eicon-ellipsis-h',
					],
				],
				'render_type' => 'template',
				'classes' => 'elementor-control-start-end',
				'style_transfer' => true,
				'prefix_class' => 'elementor-icon-list--layout-',
				'selectors' => [
					'{{WRAPPER}} .amt-fun-fact ul' => 'display: flex; flex-direction: {{VALUE}};',
				],
				'default' 	 => 'row',
			),
			array(
				'mode'		=> 'responsive',
				'type'    => Controls_Manager::CHOOSE,
				'id'      => 'align_items',
				'label'   => esc_html__('Align Items', 'ogo-core'),
				'options' => [
					'flex-start' => [
						'title' => esc_html__('Left', 'ogo-core'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'ogo-core'),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => esc_html__('Right', 'ogo-core'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .amt-fun-fact ul' => 'align-items: {{VALUE}};',
				],
				'default' => 'center',
				'condition'   => array( 'view' => array('column' ) ),
			),
			array(
				'mode'		=> 'responsive',
				'type'    => Controls_Manager::CHOOSE,
				'id'      => 'justify_items',
				'label'   => esc_html__('Align Contents', 'ogo-core'),
				'options' => [
					'flex-start' => [
						'title' => esc_html__('Left', 'ogo-core'),
						'icon' => 'eicon-justify-start-h',
					],
					'center' => [
						'title' => esc_html__('Center', 'ogo-core'),
						'icon' => 'eicon-justify-center-h',
					],
					'flex-end' => [
						'title' => esc_html__('Right', 'ogo-core'),
						'icon' => 'eicon-justify-end-h',
					],
					'space-between' => [
						'title' => esc_html__('Space Between', 'ogo-core'),
						'icon' => 'eicon-justify-space-between-h',
					],
					'space-around' => [
						'title' => esc_html__('Space Around', 'ogo-core'),
						'icon' => 'eicon-justify-space-around-h',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .amt-fun-fact ul' => 'justify-content: {{VALUE}};',
				],
				'default' => 'center',
                'condition'   => array( 'view' => array('row' ) ),
			),
			array(
				'mode'		=> 'responsive',
				'type'    => Controls_Manager::CHOOSE,
				'id'      => 'align_text',
				'label'   => esc_html__('Align text', 'ogo-core'),
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'ogo-core'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'ogo-core'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'ogo-core'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .amt-fun-fact ul li' => 'text-align: {{VALUE}};',
				],
				'default' => 'center',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'fun_fact_bg_color',
				'label'   => esc_html__('Background Color', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-fun-fact' => 'background-color: {{VALUE}};',
				],
				// 'default' => '#F7F8FC',
			),
			array(
				'separator' => 'before',
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__('Title Color', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-fun-fact ul li h3' => 'color: {{VALUE}};',
				],
				'default' => '#1F0D3C',
			),
			array (
				'mode'		=> 'responsive',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-fun-fact .title h3',
			),
			array(
				'separator' => 'before',
				'type'    => Controls_Manager::COLOR,
				'id'      => 'text_color',
				'label'   => esc_html__('Content Color', 'ogo-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-fun-fact ul li p' => 'color: {{VALUE}};',
				],
				'default' => '#676E89',
			),
			array (
				'mode'		=> 'responsive',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Content Style', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-fun-fact .sub_title p',
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

		$template = 'amt-fun-fact';

		return $this->amt_template($template, $data);
	}
}
