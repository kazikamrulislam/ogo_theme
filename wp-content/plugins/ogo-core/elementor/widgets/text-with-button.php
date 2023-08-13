<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit;

class Text_With_Button extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Title Text With Button', 'ogo-core' );
		$this->amt_base = 'amt-text-with-button';
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
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Alignment', 'ogo-core' ),
				'options' => array(
					'left' => array(
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					),
					'right' => array(
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					),
					'justify' => array(
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					),
				),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'sub_title',
				'label'   => esc_html__( 'Sub Title', 'ogo-core' ),
				'default' => esc_html__('ABOUT US', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'ogo-core' ),
				'default' => esc_html__( 'Welcome To Ogo', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'sub_content',
				'label'   => esc_html__( 'Sub Content', 'ogo-core' ),
				'default' => esc_html__('When an unknown printer took a galley of type and scrambled it to make a type survived not only five centuries.', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'ogo-core' ),
				'default' => esc_html__('Lorem Ipsum has been the industrys standard dummy text ever since printer took a galley. Rimply dummy text of the printing and typesetting industry', 'ogo-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'button_display',
				'label'       => esc_html__( 'Button Display', 'ogo-core' ),
				'label_on'    => esc_html__( 'On', 'ogo-core' ),
				'label_off'   => esc_html__( 'Off', 'ogo-core' ),
				'default'     => false,
				'description' => esc_html__( 'Show or Hide Content. Default: off', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'ogo-core' ),
				'default' => esc_html__( 'Read More', 'ogo-core' ),
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'buttonurl',
				'label'   => esc_html__( 'Button URL', 'ogo-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
			
			array(
				'mode' => 'section_end',
			),
			// Title style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_title_style',
				'label'   => esc_html__( 'Title Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-title-text-button .entry-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-title-text-button .entry-title' => 'color: {{VALUE}}',
				),
			),	
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'title_margin',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Title Space', 'ogo-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .amt-title-text-button .entry-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),	
			array(
				'mode' => 'section_end',
			),
			// Sub Title style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_sub_title',
				'label'   => esc_html__( 'Sub Title Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__( 'Sub Title Typo', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-title-text-button .entry-subtitle',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__( 'Sub Title Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-title-text-button .entry-subtitle' => 'color: {{VALUE}}',
				),
			),	
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'sub_title_margin',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Sub Title Space', 'ogo-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .amt-title-text-button .entry-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'section_end',
			),
			// Content style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_content_style',
				'label'   => esc_html__( 'Content style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Content Typo', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-title-text-button .entry-content p',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-title-text-button .entry-content p' => 'color: {{VALUE}}',
				),
			),		
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'content_margin',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Content Space', 'ogo-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .amt-title-text-button .entry-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'section_end',
			),
			// Sub Content style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_sub_content_style',
				'label'   => esc_html__( 'Sub Content style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_content_typo',
				'label'   => esc_html__( 'Sub Content Typo', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-title-text-button .entry-sub-content p',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_content_color',
				'label'   => esc_html__( 'Sub Content Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-title-text-button .entry-sub-content p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-title-text-button ul li' => 'color: {{VALUE}}',
				),
			),		
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'sub_content_margin',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Content Space', 'ogo-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .amt-title-text-button .entry-sub-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'section_end',
			),
			// Button style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_button_style',
				'label'   => esc_html__( 'Button Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button_typo',
				'label'   => esc_html__( 'Button Typo', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-title-text-button .btn-common',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bag_color',
				'label'   => esc_html__( 'Button Background Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-title-text-button .button-style-2' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bag_hover_color',
				'label'   => esc_html__( 'Button Background Hover Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-title-text-button .button-style-2:hover' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text2_color',
				'label'   => esc_html__( 'Button Text Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-title-text-button .button-style-2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-title-text-button .button-style-2 path.amt-button-cap' => 'stroke: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text2_hover_color',
				'label'   => esc_html__( 'Button Text Hover Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-title-text-button .button-style-2:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-title-text-button .button-style-2:hover path.amt-button-cap' => 'stroke: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_margin',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Margin', 'ogo-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .amt-title-text-button .button-style-2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_padding',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Padding', 'ogo-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .amt-title-text-button .button-style-2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),		
			array(
				'mode' => 'section_end',
			),
			// Animation style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_animation_style',
	            'label'   => esc_html__( 'Animation', 'ogo-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation',
				'label'   => esc_html__( 'Animation', 'ogo-core' ),
				'options' => array(
					'wow'        => esc_html__( 'On', 'ogo-core' ),
					'hide'        => esc_html__( 'Off', 'ogo-core' ),
				),
				'default' => 'hide',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation_effect',
				'label'   => esc_html__( 'Entrance Animation', 'ogo-core' ),
				'options' => array(
                    'none' => esc_html__( 'none', 'ogo-core' ),
					'bounce' => esc_html__( 'bounce', 'ogo-core' ),
					'flash' => esc_html__( 'flash', 'ogo-core' ),
					'pulse' => esc_html__( 'pulse', 'ogo-core' ),
					'rubberBand' => esc_html__( 'rubberBand', 'ogo-core' ),
					'shakeX' => esc_html__( 'shakeX', 'ogo-core' ),
					'shakeY' => esc_html__( 'shakeY', 'ogo-core' ),
					'headShake' => esc_html__( 'headShake', 'ogo-core' ),
					'swing' => esc_html__( 'swing', 'ogo-core' ),
					'fadeIn' => esc_html__( 'fadeIn', 'ogo-core' ),
					'fadeInDown' => esc_html__( 'fadeInDown', 'ogo-core' ),
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'ogo-core' ),
					'fadeInRight' => esc_html__( 'fadeInRight', 'ogo-core' ),
					'fadeInUp' => esc_html__( 'fadeInUp', 'ogo-core' ),
					'bounceIn' => esc_html__( 'bounceIn', 'ogo-core' ),
					'bounceInDown' => esc_html__( 'bounceInDown', 'ogo-core' ),
					'bounceInLeft' => esc_html__( 'bounceInLeft', 'ogo-core' ),
					'bounceInRight' => esc_html__( 'bounceInRight', 'ogo-core' ),
					'bounceInUp' => esc_html__( 'bounceInUp', 'ogo-core' ),
					'slideInDown' => esc_html__( 'slideInDown', 'ogo-core' ),
					'slideInLeft' => esc_html__( 'slideInLeft', 'ogo-core' ),
					'slideInRight' => esc_html__( 'slideInRight', 'ogo-core' ),
					'slideInUp' => esc_html__( 'slideInUp', 'ogo-core' ),
                ),
				'default' => 'fadeInUp',
				'condition'   => array('animation' => array( 'wow' ) ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();		

		$template = 'text-with-button';
	
		return $this->amt_template( $template, $data );
	}
}