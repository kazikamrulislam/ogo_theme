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
use Elementor\Utils;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Css_Filter;

if ( ! defined( 'ABSPATH' ) ) exit;

class Amt_Button extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Button', 'ogo-core' );
		$this->amt_base = 'amt-button';
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
				'type'    => Controls_Manager::SELECT,
				'id'      => 'style',
				'label'   => esc_html__( 'Button Style', 'ogo-core' ),
				'options' => array(
					'style1' => esc_html__( 'amt-button Style 1' , 'ogo-core' ),
					'style2' => esc_html__( 'amt-button Style 2' , 'ogo-core' ),
					'style3' => esc_html__( 'amt-button Style 3' , 'ogo-core' ),
					'style4' => esc_html__( 'amt-button Style 4' , 'ogo-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'        => Controls_Manager::TEXT,
				'id'          => 'common-btn-1',
				'label'       => esc_html__( 'Button Text', 'ogo-core' ),
				'default' 	  => esc_html__( 'Click Now', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style1','style3','style4') ),
			),
			array(
				'type'        => Controls_Manager::URL,
				'id'          => 'common-btn-1-url',
				'label'       => esc_html__( 'Button URL', 'ogo-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'style' => array( 'style1','style3','style4') ),

			),
			array(
				'type'        => Controls_Manager::ICONS,
				'id'          => 'icon',
				'label'       => esc_html__( 'Button Icon', 'ogo-core' ),
				'default' => [
                    'value' => 'fa fa-play',
                    'library' => 'fa-solid',
                ],
				'condition'   => array( 'style' => array( 'style2') ),
				
			),
			array(
				'type'        => Controls_Manager::URL,
				'id'          => 'icon-url',
				'label'       => esc_html__( 'Button URL', 'ogo-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'style' => array( 'style2') ),
			),

            array(
				'type'    => Controls_Manager::CHOOSE,
				'id'      => 'align_items',
				'label'   => esc_html__( 'Align Items', 'ogo-core' ),
				'options' => [
					'flex-start' => [
						'amt-button' => esc_html__( 'Left', 'ogo-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'amt-button' => esc_html__( 'Center', 'ogo-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'amt-button' => esc_html__( 'Right', 'ogo-core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
                'selectors' => [
					'{{WRAPPER}} .amt-button' => 'justify-content: {{VALUE}};',
				],
				'default' => 'center',
			),
			array(
				'mode' => 'section_end',
			),
			// Style
			array(
				'mode'    => 'section_start',
				'id'      => 'btn_style',
				'label'   => esc_html__( 'Button Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
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
						'mode'    => 'group',
						'type'    => Group_Control_Typography::get_type(),
						'name'    => 'button-text-size',
						'label'   => esc_html__( 'Text', 'ogo-core' ),
						'selector' => '{{WRAPPER}} .amt-button a',
						'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'text_color',
						'label'   => esc_html__( 'Text Color', 'ogo-core' ),
						'selectors' =>[
							'{{WRAPPER}} .amt-button-1 a'  => 'color: {{VALUE}};',
		
						],
						'default' => '#fff',
						'condition'   => array( 'style' => array( 'style1') ),
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => '3rd-text_color',
						'label'   => esc_html__( 'Text Color', 'ogo-core' ),
						'selectors' =>[
							'{{WRAPPER}} .amt-button-3 a'  => 'color: {{VALUE}};',
		
						],
						'default' => '#53AFEE',
						'condition'   => array( 'style' => array('style3') ),
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => '4th-text_color',
						'label'   => esc_html__( 'Text Color', 'ogo-core' ),
						'selectors' =>[
							'{{WRAPPER}} .amt-button-4 a'  => 'color: {{VALUE}};',
		
						],
						'default' => '#fff',
						'condition'   => array( 'style' => array('style4') ),
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'btn_bg_color',
						'label'   => esc_html__( 'Background Color', 'ogo-core' ),
						'default' => '#53AFEE',
						'selectors' => [
							'{{WRAPPER}} .amt-button-1 a' => 'background-color: {{VALUE}};',
						],
						'condition'   => array( 'style' => array('style1') ),
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => '3rd-btn_bg_color',
						'label'   => esc_html__( 'Background Color', 'ogo-core' ),
						'default' => '#fff',
						'selectors' => [
							'{{WRAPPER}} .amt-button-3 a' => 'background-color: {{VALUE}};',
						],
						'condition'   => array( 'style' => array('style3') ),
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => '4th-btn_bg_color',
						'label'   => esc_html__( 'Background Color', 'ogo-core' ),
						'default' => '#1F0D3C',
						'selectors' => [
							'{{WRAPPER}} .amt-button-4 a' => 'background-color: {{VALUE}};',
						],
						'condition'   => array( 'style' => array('style4') ),
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
							'{{WRAPPER}} .amt-button a' => 'border-style: {{VALUE}};',
						],
						'default' => 'none',
						'condition'   => array( 'style' => array('style1', 'style4') ),
					),
					array(
						'type' => Controls_Manager::SELECT,
						'id'      => '3rd-btn_border_style',
						'label' => esc_html__( 'Border Type', 'ogo-core' ),
						'options' => [
							'solid'  => esc_html__( 'Solid', 'ogo-core' ),
							'dashed' => esc_html__( 'Dashed', 'ogo-core' ),
							'dotted' => esc_html__( 'Dotted', 'ogo-core' ),
							'double' => esc_html__( 'Double', 'ogo-core' ),
							'none' => esc_html__( 'None', 'ogo-core' ),
						],
						'selectors' => [
							'{{WRAPPER}} .amt-button-3 a' => 'border-style: {{VALUE}};',
						],
						'default' => 'solid',
						'condition'   => array( 'style' => array('style3') ),
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'btn_border_color',
						'label'   => esc_html__( 'Border Color', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-button a' => 'border-color: {{VALUE}};',
						],
					),
					array(
						'type' => Controls_Manager::DIMENSIONS,
						'id'      => 'btn_border_radius',
						'label' => esc_html__( 'Border Radius', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-button a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						
					),
					array(
						'type' => Controls_Manager::DIMENSIONS,
						'id'      => 'btn_padding',
						'label' => esc_html__( 'Padding', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					),
					array (
						'mode'    => 'group',
						'type'    => Group_Control_Box_Shadow::get_type(),
						'name'    => 'box_shadow',
						'label'   => esc_html__( 'Box Shadow', 'ogo-core' ),
						'selector' => '{{WRAPPER}} .amt-button a ',
					),
					array(
						'mode' => 'tab_end',
					),
					array(
						'mode'    => 'tab_start',
						'id'      => 'tab_start_icon_hover',
						'label'   => esc_html__( 'Hover', 'ogo-core' ),
					),           
					array (
						'mode'    => 'group',
						'type'    => Group_Control_Typography::get_type(),
						'name'    => 'button-hover-text-size',
						'label'   => esc_html__( 'Text', 'ogo-core' ),
						'selector' => '{{WRAPPER}} .amt-button a:hover',
						'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'text-hover_color',
						'label'   => esc_html__( 'Text Color', 'ogo-core' ),
						'selectors' =>[
							'{{WRAPPER}} .amt-button-1 a:hover'  => 'color: {{VALUE}};',
		
						],
						'default' => '#fff',
						'condition'   => array( 'style' => array( 'style1') ),
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => '3rd-text-hover_color',
						'label'   => esc_html__( 'Text Color', 'ogo-core' ),
						'selectors' =>[
							'{{WRAPPER}} .amt-button-3 a:hover'  => 'color: {{VALUE}};',
		
						],
						'default' => '#1F0D3C',
						'condition'   => array( 'style' => array( 'style3') ),
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => '4th-text-hover_color',
						'label'   => esc_html__( 'Text Color', 'ogo-core' ),
						'selectors' =>[
							'{{WRAPPER}} .amt-button-4 a:hover'  => 'color: {{VALUE}};',
		
						],
						'default' => '#fff',
						'condition'   => array( 'style' => array( 'style3') ),
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'btn_bg_hover-color',
						'label'   => esc_html__( 'Background Color', 'ogo-core' ),
						'default' => '#1F0D3C',
						'selectors' => [
							'{{WRAPPER}} .amt-button-1 a:hover' => 'background-color: {{VALUE}};',
						],
						'condition'   => array( 'style' => array('style1') ),
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => '3rd-btn_bg_hover-color',
						'label'   => esc_html__( 'Background Color', 'ogo-core' ),
						'default' => '#fff',
						'selectors' => [
							'{{WRAPPER}} .amt-button-3 a:hover' => 'background-color: {{VALUE}};',
						],
						'condition'   => array( 'style' => array('style3') ),
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => '4th-btn_bg_hover-color',
						'label'   => esc_html__( 'Background Color', 'ogo-core' ),
						'default' => '#53AFEE',
						'selectors' => [
							'{{WRAPPER}} .amt-button-4 a:hover' => 'background-color: {{VALUE}};',
						],
						'condition'   => array( 'style' => array('style4') ),
					),
					array(
						'type' => Controls_Manager::SELECT,
						'id'      => 'btn_border-hover_style',
						'label' => esc_html__( 'Border Type', 'ogo-core' ),
						'options' => [
							'solid'  => esc_html__( 'Solid', 'ogo-core' ),
							'dashed' => esc_html__( 'Dashed', 'ogo-core' ),
							'dotted' => esc_html__( 'Dotted', 'ogo-core' ),
							'double' => esc_html__( 'Double', 'ogo-core' ),
							'none' => esc_html__( 'None', 'ogo-core' ),
						],
						'selectors' => [
							'{{WRAPPER}} .amt-button-1 a:hover' => 'border-style: {{VALUE}};',
						],
						'default' => 'none',
						'condition'   => array( 'style' => array('style1','style4') ),
					),
					array(
						'type' => Controls_Manager::SELECT,
						'id'      => '3rd-btn_border_style_hover',
						'label' => esc_html__( 'Border Type', 'ogo-core' ),
						'options' => [
							'solid'  => esc_html__( 'Solid', 'ogo-core' ),
							'dashed' => esc_html__( 'Dashed', 'ogo-core' ),
							'dotted' => esc_html__( 'Dotted', 'ogo-core' ),
							'double' => esc_html__( 'Double', 'ogo-core' ),
							'none' => esc_html__( 'None', 'ogo-core' ),
						],
						'selectors' => [
							'{{WRAPPER}} .amt-button-3 a:hover' => 'border-style: {{VALUE}};',
						],
						'default' => 'solid',
						'condition'   => array( 'style' => array('style3') ),
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'btn_border_color_hover',
						'label'   => esc_html__( 'Border Color', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-button a:hover' => 'border-color: {{VALUE}};',
						],
					),
					array(
						'type' => Controls_Manager::DIMENSIONS,
						'id'      => 'btn_hover-border_radius',
						'label' => esc_html__( 'Border Radius', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-button a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],						
					),
					array(
						'type' => Controls_Manager::DIMENSIONS,
						'id'      => 'btn_hover-padding',
						'label' => esc_html__( 'Padding', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-button a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					),
					array (
						'mode'    => 'group',
						'type'    => Group_Control_Box_Shadow::get_type(),
						'name'    => 'hover-box_shadow',
						'label'   => esc_html__( 'Box Shadow', 'ogo-core' ),
						'selector' => '{{WRAPPER}} .amt-button a:hover',
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
	            'id'      => 'sec_animation_style',
	            'label'   => esc_html__( 'Animation', 'ogo-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			
			array(
				'mode'    => 'tabs_start',
				'id'      => 'animation_start_icon',
			),
				array(
					'mode'    => 'tab_start',
					'id'      => 'animation_start_icon_normal',
					'label'   => esc_html__( 'Normal', 'ogo-core' ),
				),

				array(
					'type'    => Controls_Manager::SELECT,
					'id'      => 'animation',
					'label'   => esc_html__( 'Animation', 'ogo-core' ),
					'options' => array(
						'wow'        => esc_html__( 'On', 'ogo-core' ),
						'hide'        => esc_html__( 'Off', 'ogo-core' ),
					),
					'default' => 'wow',
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
					'type'    => Controls_Manager::TEXT,
					'id'      => 'animation_delay',
					'label'   => esc_html__( 'Delay', 'ogo-core' ),
					'default' => '0.5',
					'condition'   => array( 'animation' => array( 'wow' ) ),
				),
				array(
					'type'    => Controls_Manager::TEXT,
					'id'      => 'ani_duration',
					'label'   => esc_html__( 'Animation Duration', 'ogo-core' ),
					'default' => '1',
					'condition'   => array( 'animation' => array( 'wow' ) ),
				),
				array(
					'type'    => Group_Control_Css_Filter::get_type(),
					'mode'    => 'group',				
					'label'   => esc_html__( 'Text Blend', 'ogo-core' ),
					'name' => 'blend', 
					'selector' => '{{WRAPPER}} .amt-button a',		
				),
				array(
					'mode' => 'tab_end',
				),
				array(
					'mode'    => 'tab_start',
					'id'      => 'animation_start_icon_hover',
					'label'   => esc_html__( 'Hover', 'ogo-core' ),
				),
				array(
					'type'    => Group_Control_Css_Filter::get_type(),
					'mode'    => 'group',				
					'label'   => esc_html__( 'Text Blend', 'ogo-core' ),
					'name' => 'blend_hover', 
					'selector' => '{{WRAPPER}} .amt-button a:hover',		
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
				'id'      => 'icon_style',
				'label'   => esc_html__( 'Icon Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style2') ),
			),	
			array (
                'id'      => 'icon-size',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__( 'Icon Size', 'ogo-core' ),
                'size_units' => array('px','%'),
				'selectors' => [
                    '{{WRAPPER}} .amt-button-2 i' => 'font-size: {{SIZE}}{{UNIT}};',
                    
                ],
			), 
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-button-2 i' => 'color: {{VALUE}};',
                    
                ],
				'default' => '#fff',
			),	
			array(
				'mode'    => 'tabs_start',
				'id'      => 'tabs_start_play_icon',
			),
				array(
					'mode'    => 'tab_start',
					'id'      => 'tab_start_icon-normal',
					'label'   => esc_html__( 'Normal', 'ogo-core' ),
				),	
					array (
						'type'    => Controls_Manager::SLIDER,
						'id'      => 'icon-space',
						'label'   => esc_html__( 'Icon Spacing', 'ogo-core' ),
						'size_units' => array('px','%'),
						'selectors' => [
							'{{WRAPPER}} .amt-button-2' => 'margin: {{SIZE}}{{UNIT}};',
							
						],
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => '2nd_icon_bg_color',
						'label'   => esc_html__( 'Icon Background Color', 'ogo-core' ),
						'default' => '#53AFEE',
						'condition'   => array( 'style' => array( 'style2') ),
						'selectors' => [
							'{{WRAPPER}} .amt-button-2 i' => 'background-color: {{VALUE}};',
						],
					),
					array(
						'type' => Controls_Manager::DIMENSIONS,
						'id'      => 'icon_border_radius',
						'label' => esc_html__( 'Border Radius', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-button-2 i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						
					),
					array(
						'type'    => Controls_Manager::DIMENSIONS,
						'id'      => 'icon_padding',
						'label'   => esc_html__( 'Icon Padding', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-button-2 i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							
						],
					),
					array (
						'mode'    => 'group',
						'type'    => Group_Control_Box_Shadow::get_type(),
						'name'    => 'icon-box_shadow',
						'label'   => esc_html__( 'Box Shadow', 'ogo-core' ),
						'selector' => '{{WRAPPER}} .amt-button-2 i',
					),					
					array(
						'mode' => 'tab_end',
					),
				array(
					'mode'    => 'tab_start',
					'id'      => 'tab_start_icon',
					'label'   => esc_html__( 'Hover', 'ogo-core' ),
				),	
				array (
					'id'      => 'icon-size-hover',
					'type'    => Controls_Manager::SLIDER,
					'label'   => esc_html__( 'Icon Size', 'ogo-core' ),
					'size_units' => array('px','%'),
					'selectors' => [
						'{{WRAPPER}} .amt-button-2 i:hover' => 'font-size: {{SIZE}}{{UNIT}};',
						
					],
					'condition'   => array( 'style' => array( 'style2') ),
				), 
				array(
					'type'    => Controls_Manager::COLOR,
					'id'      => 'icon_color-hover',
					'label'   => esc_html__( 'Icon Color', 'ogo-core' ),
					'selectors' => [
						'{{WRAPPER}} .amt-button-2 i:hover' => 'color: {{VALUE}};',
						
					],
					'default' => '#fff',
					'condition'   => array( 'style' => array( 'style2') ),
				),	
					array (
						'type'    => Controls_Manager::SLIDER,
						'id'      => 'icon-space_hover',
						'label'   => esc_html__( 'Icon Spacing', 'ogo-core' ),
						'size_units' => array('px','%'),
						'selectors' => [
							'{{WRAPPER}} .amt-button-2:hover' => 'margin-top: {{SIZE}}{{UNIT}};',
							
						],
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => '2nd_icon_bg_color_hover',
						'label'   => esc_html__( 'Icon Background Color', 'ogo-core' ),
						'default' => '#1F0D3C',
						'condition'   => array( 'style' => array( 'style2') ),
						'selectors' => [
							'{{WRAPPER}} .amt-button-2 i:hover' => 'background-color: {{VALUE}};',
						],
					),
					array(
						'type' => Controls_Manager::DIMENSIONS,
						'id'      => 'icon_border_radius_hover',
						'label' => esc_html__( 'Border Radius', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-button-2 i:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						
					),
					array(
						'type'    => Controls_Manager::DIMENSIONS,
						'id'      => 'icon_padding_hover',
						'label'   => esc_html__( 'Icon Padding', 'ogo-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-button-2 i:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							
						],
					),
					array (
						'mode'    => 'group',
						'type'    => Group_Control_Box_Shadow::get_type(),
						'name'    => 'icon-box_shadow_hover',
						'label'   => esc_html__( 'Box Shadow', 'ogo-core' ),
						'selector' => '{{WRAPPER}} .amt-button-2 i:hover',
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
			$template = 'amt-button-2';
			break;
			case 'style3':
			$template = 'amt-button-3';
			break;
			case 'style4':
			$template = 'amt-button-4';
			break;
			default:
			$template = 'amt-button-1';
			break;
		}

	return $this->amt_template( $template, $data );
	}
}