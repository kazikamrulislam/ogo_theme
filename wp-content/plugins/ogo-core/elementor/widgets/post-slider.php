<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) exit;

class Post_Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Post Slider', 'ogo-core' );
		$this->amt_base = 'amt-post-slider';
		parent::__construct( $data, $args );
	}

	public function amt_fields(){
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'post_not_in', array(
				'type'    => Controls_Manager::NUMBER,
				'label'   => __( 'Post ID', 'ogo-core' ),
				'default' => '0',
			)
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
				'label'   => esc_html__( 'Style', 'ogo-core' ),
				'options' => array(
					'style1' => esc_html__( 'Post Slider 01', 'ogo-core' ),
					'style2' => esc_html__( 'Post Slider 02', 'ogo-core' ),
					'style3' => esc_html__( 'Post Slider 03', 'ogo-core' ),
					'style4' => esc_html__( 'Post Slider 04', 'ogo-core' ),
				),
				'default' => 'style1',
			),			
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'cat_layout',
				'label'   => esc_html__( 'Category Layout', 'ogo-core' ),
				'options' => array(
					'cat_layout1' 		=> esc_html__( 'Cat Layout 1', 'ogo-core' ),
					'cat_layout2' 		=> esc_html__( 'Cat Layout 2', 'ogo-core' ),
				),
				'default' => 'cat_layout1',
			),
			/*end category*/
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'itemlimit',
				'label'   => esc_html__( 'Item Limit', 'ogo-core' ),
				'range' => array(
	                'px' => array(
	                    'min' => 1,
	                    'max' => 27,
	               	),
		       	),
	            'default' => array(
	                'size' => 3,
	            ),
				'description' => esc_html__( 'Maximum number of Item 27', 'ogo-core' ),
			),			
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_count',
				'label'   => esc_html__( 'Title count', 'ogo-core' ),
				'default' => 15,
				'description' => esc_html__( 'Maximum number of title', 'ogo-core' ),
			),
			array(
				'mode' => 'section_end',
			),
			/*query option*/
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_query',
				'label'   => esc_html__( 'Query Settings', 'ogo-core' ),
			),
			/*Post Order*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'post_ordering',
				'label'   => esc_html__( 'Post Ordering', 'ogo-core' ),
				'options' => array(
					'DESC'	=> esc_html__( 'Desecending', 'ogo-core' ),
					'ASC'	=> esc_html__( 'Ascending', 'ogo-core' ),
				),
				'default' => 'DESC',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'post_orderby',
				'label'   => esc_html__( 'Post Sorting', 'ogo-core' ),
				'options' => array(
					'recent' 		=> esc_html__( 'Recent Post', 'ogo-core' ),
					'rand' 			=> esc_html__( 'Random Post', 'ogo-core' ),
					'menu_order' 	=> esc_html__( 'Custom Order', 'ogo-core' ),
					'title' 		=> esc_html__( 'By Name', 'ogo-core' ),
				),
				'default' => 'recent',
			),
			/*Start category*/
			array(
				'id'      => 'query_type',
				'label' => esc_html__( 'Query type', 'ogo-core' ),
            	'type' => Controls_Manager::SELECT,
            	'default' => 'category',
            	'options' => array(
					'category'  => esc_html__( 'Category', 'ogo-core' ),
                	'posts' => esc_html__( 'Posts', 'ogo-core' ),
				),
			),
			array(
				'id'      => 'postid',
				'label' => esc_html__( 'Selects posts', 'ogo-core' ),
	            'type' => Controls_Manager::SELECT2,
	            'options' => $this->get_all_posts('post'),
	            'label_block' => true,
	            'multiple' => true,
            	'condition' => array(
					'query_type' => 'posts',
				),
			),
			array(
				'id'      => 'catid',
				'label' => esc_html__( 'Categories', 'ogo-core' ),
	            'type' => Controls_Manager::SELECT2,
	            'options' => $this->get_taxonomy_drops('category'),
	            'label_block' => true,
	            'multiple' => true,
            	'condition' => array(
					'query_type' => 'category',
				),
			),
			/*post offset*/
	        array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number_of_post_offset',
				'label'   => __( 'Offset ( No of Posts )', 'ogo-core' ),
				'default' => '0',
				'separator' => 'before',
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'posts_not_in',
				'label'   => __( 'Exclude Post by ID', 'ogo-core' ),
				'fields' => $repeater->get_controls(),
			),
			array(
				'mode' => 'section_end',
			),
			// Option
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Option', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_author',
				'label'       => esc_html__( 'Show Author', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_date',
				'label'       => esc_html__( 'Show Date', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_category',
				'label'       => esc_html__( 'Show Categories', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_comment',
				'label'       => esc_html__( 'Show Comment', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'no',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_length',
				'label'       => esc_html__( 'Show Lenght', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'no',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_view',
				'label'       => esc_html__( 'Show View', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'no',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_video',
				'label'       => esc_html__( 'Show Video', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'no',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_read',
				'label'       => esc_html__( 'Show Read More', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'no',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'read_more_text',
				'label'   => esc_html__( 'Button Text', 'ogo-core' ),
				'default' => esc_html__( 'Read More', 'ogo-core' ),
				'condition' => array( 'post_read' => array( 'yes' ) ),
			),
			array(
				'type'    => Group_Control_Css_Filter::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'Image Blend', 'ogo-core' ),
				'name' => 'blend', 
				'selector' => '{{WRAPPER}} img',		
			),			
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'border_radius',
	            'label'   => __( 'Radius', 'ogo-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-slider-default .amt-item .amt-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	            'separator' => 'before',
	        ),
			array(
				'mode' => 'section_end',
			),
			// Title style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_title_style',
	            'label'   => esc_html__( 'Title Typo', 'ogo-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-post-slider-default .amt-item .entry-title',
			),
			array(
				'type'    => Group_Control_Background::get_type(),
				'mode'    => 'group',
				'types'   => array( 'classic', 'gradient' ),
				'name'    => 'title_color',
				'label'   => esc_html__( 'Title Color', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-post-slider-default .amt-item .entry-title a',
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_margin',
	            'label'   => __( 'Margin', 'ogo-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-slider-default .amt-item .entry-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	            'separator' => 'before',
	        ),
			array(
				'mode' => 'section_end',
			),
			// Content style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_content_style',
	            'label'   => esc_html__( 'Content Style', 'ogo-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__( 'Content Display', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'no',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__( 'Word count', 'ogo-core' ),
				'default' => 20,
				'condition' => array( 'content_display' => array( 'yes' ) ),
				'description' => esc_html__( 'Maximum number of words', 'ogo-core' ),
			),
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Content_typo', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-post-slider-default .amt-item .post_excerpt p',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-slider-default .amt-item .post_excerpt p' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'content_margin',
	            'label'   => __( 'Margin', 'ogo-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-slider-default .amt-item .post_excerpt p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	            'separator' => 'before',
	        ),
			array(
				'mode' => 'section_end',
			),			
			// Meta style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_meta_style',
	            'label'   => esc_html__( 'Meta Style', 'ogo-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'meta_typo',
				'label'   => esc_html__( 'Meta Typo', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-post-slider-default ul.entry-meta li',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_color',
				'label'   => esc_html__( 'Meta Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-slider-default ul.entry-meta li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-post-slider-default ul.entry-meta li a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-post-slider-default .amt-item .amt-cat a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_author_color',
				'label'   => esc_html__( 'Meta Author Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-slider-default .amt-item .post-author a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_icon_color',
				'label'   => esc_html__( 'Meta Icon Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-slider-default ul.entry-meta li i' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'meta_margin',
	            'label'   => __( 'Margin', 'ogo-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-slider-default ul.entry-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	            'separator' => 'before',
	        ),
	        array(
				'mode' => 'section_end',
			),
			// Image style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_image_style',
	            'label'   => esc_html__( 'Image', 'ogo-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	            'condition'   => array( 'style' => array( 'style2' ) ),
	        ),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'image_width',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Width', 'ogo-core' ),
				'size_units' => array( '%', 'px', 'vw' ),
				'range' => array(
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 1000,
					),
					'vw' => array(
						'min' => 1,
						'max' => 100,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-slider-default .amt-item .amt-image img' => 'width: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'image_height',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Height', 'ogo-core' ),
				'size_units' => array( '%', 'px', 'vw' ),
				'range' => array(
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 1000,
					),
					'vw' => array(
						'min' => 1,
						'max' => 100,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-slider-default .amt-item .amt-image img' => 'height: {{SIZE}}{{UNIT}};',
				),
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
				'id'      => 'delay',
				'label'   => esc_html__( 'Delay', 'ogo-core' ),
				'default' => '0.5',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'duration',
				'label'   => esc_html__( 'Duration', 'ogo-core' ),
				'default' => '1',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),
			array(
				'mode' => 'section_end',
			),

			// Responsive Slider Columns
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider_pervice',
				'label'       => esc_html__( 'PerView Options', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'desktop',
				'label'   => esc_html__( 'Desktops: > 1600px', 'ogo-core' ),
				'default' => '4',
				'options' => array(
					'1' => esc_html__( '1', 'ogo-core' ),
					'2' => esc_html__( '2', 'ogo-core' ),
					'3' => esc_html__( '3',  'ogo-core' ),
					'4' => esc_html__( '4',  'ogo-core' ),
					'5' => esc_html__( '5',  'ogo-core' ),
					'6' => esc_html__( '6',  'ogo-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'md_desktop',
				'label'   => esc_html__( 'Desktops: > 1200px', 'ogo-core' ),
				'default' => '3',
				'options' => array(
					'1' => esc_html__( '1', 'ogo-core' ),
					'2' => esc_html__( '2', 'ogo-core' ),
					'3' => esc_html__( '3',  'ogo-core' ),
					'4' => esc_html__( '4',  'ogo-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'sm_desktop',
				'label'   => esc_html__( 'Desktops: > 992px', 'ogo-core' ),
				'default' => '2',
				'options' => array(
					'1' => esc_html__( '1', 'ogo-core' ),
					'2' => esc_html__( '2', 'ogo-core' ),
					'3' => esc_html__( '3',  'ogo-core' ),
					'4' => esc_html__( '4',  'ogo-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'tablet',
				'label'   => esc_html__( 'Tablets: > 768px', 'ogo-core' ),
				'default' => '2',
				'options' => array(
					'1' => esc_html__( '1', 'ogo-core' ),
					'2' => esc_html__( '2', 'ogo-core' ),
					'3' => esc_html__( '3',  'ogo-core' ),
					'4' => esc_html__( '4',  'ogo-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'mobile',
				'label'   => esc_html__( 'Phones: > 576px', 'ogo-core' ),
				'default' => '1',
				'options' => array(
					'1' => esc_html__( '1', 'ogo-core' ),
					'2' => esc_html__( '2', 'ogo-core' ),
					'3' => esc_html__( '3',  'ogo-core' ),
					'4' => esc_html__( '4',  'ogo-core' ),
				),
			),
			array(
				'mode' => 'section_end',
			),

			// Slider options
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider',
				'label'       => esc_html__( 'Slider Options', 'ogo-core' ),
			),			
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_autoplay',
				'label'       => esc_html__( 'Autoplay', 'ogo-core' ),
				'label_on'    => esc_html__( 'On', 'ogo-core' ),
				'label_off'   => esc_html__( 'Off', 'ogo-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable autoplay. Default: On', 'ogo-core' ),
			),			
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'display_arrow',
				'label'       => esc_html__( 'Navigation Arrow', 'ogo-core' ),
				'label_on'    => esc_html__( 'On', 'ogo-core' ),
				'label_off'   => esc_html__( 'Off', 'ogo-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Navigation Arrow. Default: On', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'nav_style',
				'label'   => esc_html__( 'Nav Style', 'ogo-core' ),
				'options' => array(
					'amt-swiper-nav-1' 		=> esc_html__( 'Nav Style 1', 'ogo-core' ),
					'amt-swiper-nav-2' 		=> esc_html__( 'Nav Style 2', 'ogo-core' ),
					'amt-swiper-nav-3' 		=> esc_html__( 'Nav Style 3', 'ogo-core' ),
					'amt-swiper-nav-4' 		=> esc_html__( 'Nav Style 4', 'ogo-core' ),
					'amt-swiper-nav-5' 		=> esc_html__( 'Nav Style 5', 'ogo-core' ),
				),
				'default' => 'amt-swiper-nav-1',
				'condition'   => array( 'display_arrow' => 'yes' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'display_buttet',
				'label'       => esc_html__( 'Pagination', 'ogo-core' ),
				'label_on'    => esc_html__( 'On', 'ogo-core' ),
				'label_off'   => esc_html__( 'Off', 'ogo-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Navigation Arrow. Default: Off', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'slides_per_group',
				'label'   => esc_html__( 'slides Per Group', 'ogo-core' ),
				'default' => array(
					'size' => 1,
				),
				'description' => esc_html__( 'slides Per Group. Default: 1', 'ogo-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'centered_slides',
				'label'       => esc_html__( 'Centered Slides', 'ogo-core' ),
				'label_on'    => esc_html__( 'On', 'ogo-core' ),
				'label_off'   => esc_html__( 'Off', 'ogo-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Centered Slides. Default: Off', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'slides_space',
				'label'   => esc_html__( 'Slides Space', 'ogo-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => 24,
				),
				'description' => esc_html__( 'Slides Space. Default: 24', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_delay',
				'label'   => esc_html__( 'Autoplay Slide Delay', 'ogo-core' ),
				'default' => 5000,
				'description' => esc_html__( 'Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds', 'ogo-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_speed',
				'label'   => esc_html__( 'Autoplay Slide Speed', 'ogo-core' ),
				'default' => 1000,
				'description' => esc_html__( 'Set any value for example .8 seconds to play it in every 2 seconds. Default: .8 Seconds', 'ogo-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_loop',
				'label'       => esc_html__( 'Loop', 'ogo-core' ),
				'label_on'    => esc_html__( 'On', 'ogo-core' ),
				'label_off'   => esc_html__( 'Off', 'ogo-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Loop to first item. Default: On', 'ogo-core' ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$swiper_data = array(
			'slidesPerView' 	=>2,
			'loop'				=>$data['slider_loop']=='yes' ? true:false,
			'spaceBetween'		=>$data['slides_space']['size'],
			'slidesPerGroup'	=>$data['slides_per_group']['size'],
			'centeredSlides'	=>$data['centered_slides']=='yes' ? true:false ,
			'slideToClickedSlide' =>true,
			'autoplay'          => $data['slider_autoplay'] == 'yes' ? true : false,
			'autoplaydelay'     => $data['slider_autoplay_delay'],
			'speed'      =>$data['slider_autoplay_speed'],
			'breakpoints' =>array(
				'0'    =>array('slidesPerView' =>1),
				'576'    =>array('slidesPerView' =>$data['mobile']),
				'768'    =>array('slidesPerView' =>$data['tablet']),
				'992'    =>array('slidesPerView' =>$data['sm_desktop']),
				'1200'    =>array('slidesPerView' =>$data['md_desktop']),				
				'1600'    =>array('slidesPerView' =>$data['desktop'])
			),
		);
		
		switch ( $data['style'] ) {
			case 'style4':
			$template = 'post-slider-4';
			break;
			case 'style3':
			$template = 'post-slider-3';
			break;
			case 'style2':
			$template = 'post-slider-2';
			break;
			default:
			$template = 'post-slider-1';
			break;
		}

		$data['swiper_data'] = json_encode( $swiper_data );   
		
		return $this->amt_template( $template, $data );
	}
}