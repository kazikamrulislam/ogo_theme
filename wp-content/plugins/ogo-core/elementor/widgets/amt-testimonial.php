<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

use Elementor\Conditions;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography as Scheme_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class AMT_Testimonial extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Testimonials', 'ogo-core' );
		$this->amt_base = 'amt-testimonial';
		parent::__construct( $data, $args );
	}

	public function amt_fields(){
		$terms = get_terms( array( 'taxonomy' => 'ogo_testimonial_category', 'fields' => 'id=>name' ) );
		$category_dropdown = array( '0' => esc_html__( 'All Categories', 'ogo-core' ) );

		foreach ( $terms as $id => $name ) {
			$category_dropdown[$id] = $name;
		}

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'ogo-core' ),
			),
				array(
					'type'    => Controls_Manager::MEDIA,
					'id'      => 'testimonial_statick_iamge',
					'label'   => esc_html__( 'Item Image', 'ogo-core' ),
					'dynamic' => [
						'active' => true,
					],
					'default' => array(
						'url' => Utils::get_placeholder_image_src(),
					),
					'description' => esc_html__( 'Recommended full image', 'ogo-core' ),
					'condition'   => array( 'style' => array('style1') ),
				),
				array(
					'type'    => Controls_Manager::SELECT2,
					'id'      => 'style',
					'label'   => esc_html__( 'Style', 'ogo-core' ),
					'options' => array(
						'style1' => esc_html__( 'testimonial Style 1', 'ogo-core' ),
						'style2' => esc_html__( 'testimonial Style 2', 'ogo-core' ),
					),
					'default' => 'style1',
				),
				array(
					'type'    => Controls_Manager::SELECT2,
					'id'      => 'item_space',
					'label'   => esc_html__( 'Item Space', 'ogo-core' ),
					'options' => array(
						'g-0' => esc_html__( 'Gutters 0', 'ogo-core' ),
						'g-1' => esc_html__( 'Gutters 1', 'ogo-core' ),
						'g-2' => esc_html__( 'Gutters 2', 'ogo-core' ),
						'g-3' => esc_html__( 'Gutters 3', 'ogo-core' ),
						'g-4' => esc_html__( 'Gutters 4', 'ogo-core' ),
						'g-5' => esc_html__( 'Gutters 5', 'ogo-core' ),
					),
					'default' => 'g-4',
					'condition'   => array( 'style' => array('style2') ),
				),			
				array(
					'type'    => Controls_Manager::SELECT2,
					'id'      => 'cat',
					'label'   => esc_html__( 'Categories', 'ogo-core' ),
					'options' => $category_dropdown,
					'default' => '0',
				),
				array(
					'type'    => Controls_Manager::SELECT2,
					'id'      => 'orderby',
					'label'   => esc_html__( 'Order By', 'ogo-core' ),
					'options' => array(
						'date'        => esc_html__( 'Date (Recents comes first)', 'ogo-core' ),
						'title'       => esc_html__( 'Title', 'ogo-core' ),
						'menu_order'  => esc_html__( 'Custom Order (Available via Order field inside Page Attributes box)', 'ogo-core' ),
					),
					'default' => 'date',
				),
				// array(
				// 	'type'    => Controls_Manager::NUMBER,
				// 	'id'      => 'ratting',
				// 	'label'   => esc_html__( 'Item Space', 'ogo-core' ),
				// 	// 'options' => array(
				// 	// 	'0%' => esc_html__( '0-Star', 'ogo-core' ),
				// 	// 	'20%' => esc_html__( '1-Star', 'ogo-core' ),
				// 	// 	'40%' => esc_html__( '2-Star', 'ogo-core' ),
				// 	// 	'60%' => esc_html__( '3-Star', 'ogo-core' ),
				// 	// 	'80%' => esc_html__( '4-Star', 'ogo-core' ),
				// 	// 	'100%' => esc_html__( '5-Star', 'ogo-core' ),
				// 	// ),
				// 	'default' => '2',
				// ),		
				// array(
				// 	'type'        => Controls_Manager::SWITCHER,
				// 	'id'          => 'designation_display',
				// 	'label'       => esc_html__( 'Designation Display', 'ogo-core' ),
				// 	'label_on'    => esc_html__( 'On', 'ogo-core' ),
				// 	'label_off'   => esc_html__( 'Off', 'ogo-core' ),
				// 	'default'     => 'yes',
				// 	'description' => esc_html__( 'Show or Hide Designation. Default: On', 'ogo-core' ),
				// ),
			array(
				'mode' => 'section_end',
			),
			// SLIDER oPTIONS 
			array(
				'mode'    => 'section_start',
				'id'      => 'slide_options',
				'label'   => esc_html__( 'Slide Option', 'ogo-core' ),
			),
				array(
					'label' => esc_html__( 'Navigation', 'ogo-core' ),
					'id'	=> 'navigation',
					'type' => Controls_Manager::SELECT,
					'default' => 'dots',
					'options' => [
						// 'both' => esc_html__( 'Arrows and Dots', 'ogo-core' ),
						// 'arrows' => esc_html__( 'Arrows', 'ogo-core' ),
						'dots' => esc_html__( 'Dots', 'ogo-core' ),
						'none' => esc_html__( 'None', 'ogo-core' ),
					],
					'frontend_available' => true,
				),
				array(
					'label' => esc_html__( 'Smooth Sliding', 'ogo-core' ),
					'id'	=> 'smooth_sliding',
					'type' => Controls_Manager::SWITCHER,
					'default' => 'no',
					'options' => [
						'yes' => esc_html__( 'Yes', 'ogo-core' ),
						'no' => esc_html__( 'No', 'ogo-core' ),
					],
					'frontend_available' => true,
				),
				array(
					'label' => esc_html__( 'Autoplay', 'ogo-core' ),
					'id'	=> 'autoplay',
					'type' => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'ogo-core' ),
						'no' => esc_html__( 'No', 'ogo-core' ),
					],
					'condition' => [
						'smooth_sliding!' => 'yes',
					],
					'frontend_available' => true,
				),
				array(
					'label' => esc_html__( 'Autoplay Speed', 'ogo-core' ),
					'id'	=> 'autoplay_speed',
					'type' => Controls_Manager::NUMBER,
					'default' => 300,
					'frontend_available' => true,
				),
				array(
					'mode'    => 'responsive',
					'label' => esc_html__( 'Slide PerView', 'ogo-core' ),
					'id'	=> 'slide_perview',
					'type' => Controls_Manager::SELECT,
					'devices' => ['desktop','tablet','mobile'],
					'options' => [
						'1' => esc_html__( "1", 'ogo-core' ),
						'2' => esc_html__( '2', 'ogo-core' ),
						// '3' => esc_html__( '3', 'ogo-core' ),
						// '4' => esc_html__( '4', 'ogo-core' ),
						// '5' => esc_html__( '5', 'ogo-core' ),
					],
					// 'condition' => [
					// 	'autoplay' => 'no',
					// ],
					'frontend_available' => true,
					'default' => '1',
					'tablet_default' => '1',
					'mobile_default' => '1',
					'condition' => array('style' => array('style1')),
				),
				array(
					'mode'    => 'responsive',
					'label' => esc_html__( 'Slide PerView', 'ogo-core' ),
					'id'	=> 'slide_perview2',
					'type' => Controls_Manager::SELECT,
					'devices' => ['desktop','tablet','mobile'],
					'options' => [
						'1' => esc_html__( "1", 'ogo-core' ),
						'2' => esc_html__( '2', 'ogo-core' ),
						// '3' => esc_html__( '3', 'ogo-core' ),
						// '4' => esc_html__( '4', 'ogo-core' ),
						// '5' => esc_html__( '5', 'ogo-core' ),
					],
					// 'condition' => [
					// 	'autoplay' => 'no',
					// ],
					'frontend_available' => true,
					'default' => '2',
					'tablet_default' => '2',
					'mobile_default' => '1',
					'condition' => array('style' => array('style2')),
				),
				array(
					'label' => esc_html__( 'Infinite Loop', 'ogo-core' ),
					'id'	=> 'loop',
					'type' => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'ogo-core' ),
						'no' => esc_html__( 'No', 'ogo-core' ),
					],
					// 'condition' => [
					// 	'autoplay' => 'no',
					// ],
					'frontend_available' => true,
				),
				array(
					'label' => esc_html__( 'Slide per Group', 'ogo-core' ),
					'id'	=> 'slide_per_group',
					'type' => Controls_Manager::SELECT,
					'default' => '1',
					'options' => [
						'1' => esc_html__( '1', 'ogo-core' ),
						'2' => esc_html__( '2', 'ogo-core' ),
						'3' => esc_html__( '3', 'ogo-core' ),
						'4' => esc_html__( '4', 'ogo-core' ),
						'5' => esc_html__( '5', 'ogo-core' ),
					],
					// 'condition' => [
					// 	'loop' => 'no',
					// ],
					// 'frontend_available' => true,
				),
				array(
					'mode'    => 'responsive',
					'label' => esc_html__( 'Space Between', 'ogo-core' ),
					'id'	=> 'space_between',
					'type' => Controls_Manager::SLIDER,
					'devices' => ['desktop','tablet','mobile'],				
					'desktop_default' => [
						'size' => 30,
					],
					'tablet_default' => [
						'size' => 20,
					],
					'mobile_default' => [
						'size' => 10,
					],
					'frontend_available' => true,
					'condition'   => array( 'style' => array('style2') ),
				),
				// array(
				// 	'type'    => Controls_Manager::COLOR,
				// 	'id'      => 'img_background_color',
				// 	'label'   => esc_html__( 'Nsavigation Color', 'ogo-core' ),
				// 	'default' => '#1F0D3C',
				// 	// 'selectors'=>[
				// 	// 	'{{WRAPPER}} .swiper-button-next.partner_btn_next, .partner_btn_next:after, .swiper-button-prev.partner_btn_prev, .partner_btn_prev:after' => 'color: {{VALUE}};',
				// 	// ],
				// ),
				array(
					'type'    => Controls_Manager::COLOR,
					'id'      => 'navigation_bullet_color',
					'label'   => esc_html__( 'Navivarion Bullet Color', 'ogo-core' ),
					'default' => '#1F0D3C',
					'selectors'=>[
						'{{WRAPPER}} .swiper-pagination-bullet-active' => 'background: {{VALUE}};',
					],
				),
			array(
				'mode' => 'section_end'
			),
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_animation_style',
	            'label'   => esc_html__( 'Animation', 'ogo-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
				array(
					'type' => Controls_Manager::HEADING,
					'id'      => 'testimonial_border_style',
					'label'   => esc_html__( 'Border', 'ogo-core' ),
					'separator' => 'after',
					'condition'   => array( 'style' => array('style2') ),
				),
				array(
					'mode'    => 'responsive',
					'type' => Controls_Manager::SLIDER,
					'label' => esc_html__( 'Border Top', 'ogo-core' ),
					'id' => 'testimonial_border_top',
					'range' => [
						'px' => [
							'max' => 15,
						],
					],
					'default' => [
						'size' => 7,
					],
					'selectors' => [
						'{{WRAPPER}} .ogoswiper2 .testimonial-item-2' =>  'border-top: {{SIZE}}{{UNIT}};',
					],
					'condition'   => array( 'style' => array('style2') ),
				),
				array(
					'mode'    => 'responsive',
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
						'{{WRAPPER}} .ogoswiper2 .testimonial-item-2' => 'border-top-style: {{VALUE}};',
					],
					'default' => 'solid',
					'condition'   => array( 'style' => array('style2') ),
				),
				array(
					'id'      => 'testimunial_2_border_top_color',
					'label'   => esc_html__( 'Color', 'ogo-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ogoswiper2 .testimonial-item-2' => 'border-color: {{VALUE}};',
					],
					'default' => '#1F0D3C',
					'condition'   => array( 'style' => array('style2') ),
				),
				array(
					'type' => Controls_Manager::HEADING,
					'id'      => 'testimonial_title_style',
					'label'   => esc_html__( 'Title', 'ogo-core' ),
					'separator' => 'before',
				),
				array(
					'id'      => 'testimonial_title_color',
					'label'   => esc_html__( 'Color', 'ogo-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .testimonial-item-1 .testimonial-content .testimonial-title a' => 'color: {{VALUE}};',
					],
					'default' => '#1F0D3C',
					'condition'   => array( 'style' => array('style1') ),
				),
				array (
					'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
					'mode'    => 'group',
					'type'    => Group_Control_Typography::get_type(),
					'name'    => 'testimonial_title_typo',
					'label'   => esc_html__( 'Typo', 'ogo-core' ),
					'selector' => '{{WRAPPER}} .testimonial-item-1 .testimonial-content .testimonial-title a',
				),
				array(
					'type' => Controls_Manager::HEADING,
					'id'      => 'testimonial_content_style',
					'label'   => esc_html__( 'Content', 'ogo-core' ),
					'separator' => 'before',
				),
				array(
					'id'      => 'testimonial_content_color',
					'label'   => esc_html__( 'Color', 'ogo-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .testimonial-item-1 .testimonial-content .amt_testimonial_content p' => 'color: {{VALUE}};',
					],
					'default' => '#676E89',
					'condition'   => array( 'style' => array('style1') ),
				),
				array(
					'id'      => 'testimonial_content_color2',
					'label'   => esc_html__( 'Color', 'ogo-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .testimonial-item-2 .testimonial-content .amt_testimonial_content p' => 'color: {{VALUE}};',
					],
					'default' => '#676E89',
					'condition'   => array( 'style' => array('style2') ),
				),
				array (
					'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
					'mode'    => 'group',
					'type'    => Group_Control_Typography::get_type(),
					'name'    => 'testimonial_content_typo',
					'label'   => esc_html__( 'Typo', 'ogo-core' ),
					'selector' => '{{WRAPPER}} .testimonial-item-1 .testimonial-content .amt_testimonial_content p',
				),
				array(
					'mode'    => 'responsive',
					'type' => Controls_Manager::DIMENSIONS,
					'id'      => 'component_padding',
					'label' => esc_html__( 'Padding', 'ogo-core' ),
					'selectors' => [
						'{{WRAPPER}} .testimonial-item-1 .testimonial-content, .testimonial-item-2 .testimonial-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				),
				array(
					'type' => Controls_Manager::HEADING,
					'id'      => 'testimonial_rating',
					'label'   => esc_html__( 'Rating', 'ogo-core' ),
					'separator' => 'before',
				),
				array (
					'id'      => 'rating_style',
					'type'    => Controls_Manager::SLIDER,
					'label'   => esc_html__( 'Size', 'ogo-core' ),
					'size_units' => array('px','%'),
					'selectors' => [
						'{{WRAPPER}} .author_detail .author_meta .star-ratings' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				),
				array(
					'id'      => 'testimonial_rating_color',
					'label'   => esc_html__( 'Color', 'ogo-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .author_detail .author_meta .fill-ratings' => 'color: {{VALUE}};',
					],
					'default' => '#1F0D3C',
				),
				array(
					'type' => Controls_Manager::HEADING,
					'id'      => 'testimonial_author_name_style',
					'label'   => esc_html__( 'Author Name', 'ogo-core' ),
					'separator' => 'before',
				),
				array(
					'id'      => 'testimonial_author_name',
					'label'   => esc_html__( 'Color', 'ogo-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .testimonial-item-1 .testimonial-content .author_name' => 'color: {{VALUE}};',
					],
					'default' => '#1F0D3C',
					'condition'   => array( 'style' => array('style1') ),
				),
				array (
					'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
					'mode'    => 'group',
					'type'    => Group_Control_Typography::get_type(),
					'name'    => 'testimonial_author_name_typo',
					'label'   => esc_html__( 'Typo', 'ogo-core' ),
					'selector' => '{{WRAPPER}} .testimonial-item-1 .testimonial-content .author_name',
					'condition'   => array( 'style' => array('style1') ),
				),
				array(
					'id'      => 'testimonial_author_name2',
					'label'   => esc_html__( 'Color', 'ogo-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .testimonial-item-2 .testimonial-content .author_name' => 'color: {{VALUE}};',
					],
					'default' => '#1F0D3C',
					'condition'   => array( 'style' => array('style2') ),
				),
				array (
					'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
					'mode'    => 'group',
					'type'    => Group_Control_Typography::get_type(),
					'name'    => 'testimonial_author_name_typo2',
					'label'   => esc_html__( 'Typo', 'ogo-core' ),
					'selector' => '{{WRAPPER}} .testimonial-item-2 .testimonial-content .author_name',
					'condition'   => array( 'style' => array('style2') ),
				),
				array(
					'type' => Controls_Manager::HEADING,
					'id'      => 'testimonial_designation_style',
					'label'   => esc_html__( 'Designation', 'ogo-core' ),
					'separator' => 'before',
				),
				array(
					'id'      => 'testimonial_author_designation',
					'label'   => esc_html__( 'Color', 'ogo-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .testimonial-item-1 .testimonial-content .author_designation' => 'color: {{VALUE}};',
					],
					'default' => '#676E89',
					'condition'   => array( 'style' => array('style1') ),
				),
				array (
					'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
					'mode'    => 'group',
					'type'    => Group_Control_Typography::get_type(),
					'name'    => 'testimonial_author_designation_typo',
					'label'   => esc_html__( 'Typo', 'ogo-core' ),
					'selector' => '{{WRAPPER}} .testimonial-item-1 .testimonial-content .author_designation',
					'condition'   => array( 'style' => array('style1') ),
				),
				array(
					'id'      => 'testimonial_author_designation2',
					'label'   => esc_html__( 'Color', 'ogo-core' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .testimonial-item-2 .testimonial-content .author_designation' => 'color: {{VALUE}};',
					],
					'default' => '#676E89',
					'condition'   => array( 'style' => array('style2') ),
				),
				array (
					'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
					'mode'    => 'group',
					'type'    => Group_Control_Typography::get_type(),
					'name'    => 'testimonial_author_designation_typo2',
					'label'   => esc_html__( 'Typo', 'ogo-core' ),
					'selector' => '{{WRAPPER}} .testimonial-item-2 .testimonial-content .author_designation',
					'condition'   => array( 'style' => array('style2') ),
				),
			array(
				'mode' => 'section_end'
			),

		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		switch ( $data['style'] ) {
			case 'style2':
			$template = 'amt-testimonial-2';
			break;
			default:
			$template = 'amt-testimonial';
			break;
		}

		// $template = 'amt-testimonial';

		return $this->amt_template( $template, $data );
	}
}