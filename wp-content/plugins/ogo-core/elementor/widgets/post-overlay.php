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

class Post_Overlay extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Post Overlay', 'ogo-core' );
		$this->amt_base = 'amt-post-overlay';
		$this->amt_translate = array(
			'cols'  => array(
				'12' => esc_html__( '1 Col', 'ogo-core' ),
				'6'  => esc_html__( '2 Col', 'ogo-core' ),
				'4'  => esc_html__( '3 Col', 'ogo-core' ),
				'3'  => esc_html__( '4 Col', 'ogo-core' ),
				'2'  => esc_html__( '6 Col', 'ogo-core' ),
			),
		);
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
					'style1' => esc_html__( 'Overlay Layout 1', 'ogo-core' ),
					'style2' => esc_html__( 'Overlay Layout 2', 'ogo-core' ),
					'style3' => esc_html__( 'Overlay Layout 3', 'ogo-core' ),
					'style4' => esc_html__( 'Overlay Layout 4', 'ogo-core' ),
					'style5' => esc_html__( 'Overlay Layout 5', 'ogo-core' ),
					'style6' => esc_html__( 'Overlay Layout 6', 'ogo-core' ),
					'style7' => esc_html__( 'Overlay Layout 7', 'ogo-core' ),
					'style8' => esc_html__( 'Overlay Layout 8', 'ogo-core' ),
					'style9' => esc_html__( 'Overlay Layout 9', 'ogo-core' ),
					'style10' => esc_html__( 'Overlay Layout 10', 'ogo-core' ),
					'style11' => esc_html__( 'Overlay Layout 11', 'ogo-core' ),
					'style12' => esc_html__( 'Overlay Layout 12', 'ogo-core' ),
					'style13' => esc_html__( 'Overlay Layout 13', 'ogo-core' ),
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'play_button_size',
				'label'   => esc_html__( 'Play Button Size', 'ogo-core' ),
				'options' => array(
					'size-lg' 		=> esc_html__( 'Button Size Big', 'ogo-core' ),
					'size-md' 		=> esc_html__( 'Button Size Medium', 'ogo-core' ),
					'size-sm' 	    => esc_html__( 'Button Size Small', 'ogo-core' ),
				),
				'default' => 'size-md',
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'itemlimit',
				'label'   => esc_html__( 'Item Limit', 'ogo-core' ),
				'range' => array(
	                'px' => array(
	                    'min' => 1,
	                    'max' => 12,
	               	),
		       	),
	            'default' => array(
	                'size' => 3,
	            ),
				'description' => esc_html__( 'Maximum number of Item', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_count',
				'label'   => esc_html__( 'Title count', 'ogo-core' ),
				'default' => 15,
				'description' => esc_html__( 'Maximum number of title', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'small_title_count',
				'label'   => esc_html__( 'Small Title count', 'ogo-core' ),
				'default' => 10,
				'description' => esc_html__( 'Maximum number of title', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style5', 'style6', 'style7', 'style8', 'style9', 'style10', 'style12', 'style13' ) ),
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
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'left_right_order',
				'label'   => esc_html__( 'Left right order', 'ogo-core' ),
				'options' => array(
					'flex-row-normal' => esc_html__( 'Left Order', 'ogo-core' ),
					'flex-row-reverse' => esc_html__( 'Right Order', 'ogo-core' ),
				),
				'default' => 'flex-row-normal',
				'condition'   => array( 'style' => array( 'style12' ) ),
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
				'label'   => esc_html__( 'Meta Option', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			// Tab For Normal view.
			array(
				'mode' => 'tabs_start',
				'id'   => 'meta_tabs_start',
			),			
			array(
				'mode'  => 'tab_start',
				'id'    => 'rt_tab_single_post',
				'label' => esc_html__( 'Single Post', 'ogo-core' ),
			),			
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_author',
				'label'       => esc_html__( 'Show Author', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_date',
				'label'       => esc_html__( 'Show Date', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_category',
				'label'       => esc_html__( 'Show Categories', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_comment',
				'label'       => esc_html__( 'Show Comment', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'no',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_length',
				'label'       => esc_html__( 'Show Lenght', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'no',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_view',
				'label'       => esc_html__( 'Show View', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'no',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_video',
				'label'       => esc_html__( 'Show Video', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'no',
			),
			array(
				'mode' => 'tab_end',
			),
			// Tab For Hover view.
			array(
				'mode'  => 'tab_start',
				'id'    => 'rt_tab_multi_post',
				'label' => esc_html__( 'Multi Post', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style3', 'style5', 'style6', 'style7', 'style8', 'style9', 'style10', 'style12', 'style13' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_author',
				'label'       => esc_html__( 'Show Author', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_date',
				'label'       => esc_html__( 'Show Date', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_category',
				'label'       => esc_html__( 'Show Categories', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_comment',
				'label'       => esc_html__( 'Show Comment', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'no',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_length',
				'label'       => esc_html__( 'Show Lenght', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'no',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_view',
				'label'       => esc_html__( 'Show View', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'no',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_video',
				'label'       => esc_html__( 'Show Video', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'no',
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode' => 'tabs_end',
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
	                '{{WRAPPER}} .amt-post-overlay-default .amt-item .amt-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
				'selector' => '{{WRAPPER}} .amt-post-overlay-default .amt-item:not(.amt-item-list) .entry-title',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_small_typo',
				'label'   => esc_html__( 'Title Small Style', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-post-overlay-default .amt-item.amt-item-list .entry-title',
				'condition'   => array( 'style' => array( 'style5', 'style6', 'style7', 'style8', 'style9', 'style10', 'style12', 'style13' ) ),
			),
			array(
				'type'    => Group_Control_Background::get_type(),
				'mode'    => 'group',
				'types'   => array( 'classic', 'gradient' ),
				'name'    => 'title_color',
				'label'   => esc_html__( 'Title Color', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-post-overlay-default .amt-item:not(.amt-item-list) .entry-title a',
			),
			array(
				'type'    => Group_Control_Background::get_type(),
				'mode'    => 'group',
				'types'   => array( 'classic', 'gradient' ),
				'name'    => 'small_title_color',
				'label'   => esc_html__( 'Small Title Color', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-post-overlay-default .amt-item.amt-item-list .entry-title a',
				'condition'   => array( 'style' => array( 'style5', 'style6', 'style7', 'style8', 'style9', 'style10', 'style12', 'style13' ) ),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_margin',
	            'label'   => __( 'Margin', 'ogo-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-overlay-default .amt-item .entry-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
				'selector' => '{{WRAPPER}} .amt-post-overlay-default ul.entry-meta li',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_color',
				'label'   => esc_html__( 'Meta Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-overlay-default ul.entry-meta li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-post-overlay-default ul.entry-meta li a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_author_color',
				'label'   => esc_html__( 'Meta Author Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-overlay-default .amt-item-single ul.entry-meta .post-author a' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style3', 'style5', 'style6', 'style7', 'style8', 'style9', 'style10', 'style11', 'style12', 'style13' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_color',
				'label'   => esc_html__( 'Category Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-overlay-default .amt-item .entry-categories a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-post-overlay-default .amt-item .entry-categories a .category-style' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-post-overlay-default.amt-post-overlay-style8 .amt-item .entry-categories a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_icon_color',
				'label'   => esc_html__( 'Meta Icon Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-overlay-default ul.entry-meta li i' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'small_meta_color',
				'label'   => esc_html__( 'Small Meta Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-overlay-default .amt-item-list ul.entry-meta li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-post-overlay-default .amt-item-list ul.entry-meta li a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-post-overlay-default .amt-item-list .entry-categories.style-2 a' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style3', 'style5', 'style6', 'style7', 'style8', 'style9', 'style10', 'style12', 'style13' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'small_meta_icon_color',
				'label'   => esc_html__( 'Small Meta Icon Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-overlay-default .amt-item-list ul.entry-meta li i' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style3', 'style5', 'style6', 'style7', 'style8', 'style9', 'style10', 'style12', 'style13' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'small_meta_author_color',
				'label'   => esc_html__( 'Small Meta Author Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-overlay-default .amt-item-list ul.entry-meta .post-author a' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style3', 'style5', 'style6', 'style7', 'style8', 'style9', 'style10', 'style12', 'style13' ) ),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'meta_margin',
	            'label'   => __( 'Margin', 'ogo-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-overlay-default ul.entry-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
					'{{WRAPPER}} .amt-post-overlay-default .amt-item .amt-image img' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .amt-post-overlay-default .amt-item .amt-image img' => 'min-height: {{SIZE}}{{UNIT}};',
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
				'label'   => esc_html__( 'Delay', 'digeco-core' ),
				'default' => '0.5',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'duration',
				'label'   => esc_html__( 'Duration', 'digeco-core' ),
				'default' => '1',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			// Responsive Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__( 'Number of Responsive Columns', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style11') ),
			),			
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xl',
				'label'   => esc_html__( 'Desktops: > 1199px', 'ogo-core' ),
				'options' => $this->amt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_lg',
				'label'   => esc_html__( 'Desktops: > 991px', 'ogo-core' ),
				'options' => $this->amt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_md',
				'label'   => esc_html__( 'Tablets: > 767px', 'ogo-core' ),
				'options' => $this->amt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__( 'Phones: > 576px', 'ogo-core' ),
				'options' => $this->amt_translate['cols'],
				'default' => '12',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col',
				'label'   => esc_html__( 'Phones: < 576px', 'ogo-core' ),
				'options' => $this->amt_translate['cols'],
				'default' => '12',
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
			case 'style13':
			$template = 'post-overlay-13';
			break;	
			case 'style12':
			$template = 'post-overlay-12';
			break;
			case 'style11':
			$template = 'post-overlay-11';
			break;			
			case 'style10':
			$template = 'post-overlay-10';
			break;				
			case 'style9':
			$template = 'post-overlay-9';
			break;				
			case 'style8':
			$template = 'post-overlay-8';
			break;				
			case 'style7':
			$template = 'post-overlay-7';
			break;				
			case 'style6':
			$template = 'post-overlay-6';
			break;
			case 'style5':
			$template = 'post-overlay-5';
			break;
			case 'style4':
			$template = 'post-overlay-4';
			break;
			case 'style3':
			$template = 'post-overlay-3';
			break;
			case 'style2':
			$template = 'post-overlay-2';
			break;
			default:
			$template = 'post-overlay-1';
			break;
		}
		
		return $this->amt_template( $template, $data );
	}
}