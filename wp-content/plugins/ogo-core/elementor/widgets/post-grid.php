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

class Post_Grid extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Post Grid', 'ogo-core' );
		$this->amt_base = 'amt-post-grid';
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
				'type'    => Controls_Manager::SELECT,
				'id'      => 'style',
				'label'   => esc_html__( 'Style', 'ogo-core' ),
				'options' => array(
					'style1' => esc_html__( 'Grid Layout 1', 'ogo-core' ),
					'style2' => esc_html__( 'Grid Layout 2', 'ogo-core' ),
					'style3' => esc_html__( 'Grid Layout 3', 'ogo-core' ),
					'style4' => esc_html__( 'Grid Layout 4', 'ogo-core' ),
					'style5' => esc_html__( 'Grid Layout 5', 'ogo-core' ),
				),
				'default' => 'style1',
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
				),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				),
				'condition'   => array( 'style' => array( 'style1','style2','style3' ) ),
			),
			// array(
			// 	'type'    => Controls_Manager::SELECT,
			// 	'id'      => 'cat_layout',
			// 	'label'   => esc_html__( 'Category Layout', 'ogo-core' ),
			// 	'options' => array(
			// 		'cat_layout1' 		=> esc_html__( 'Cat Layout 1', 'ogo-core' ),
			// 		'cat_layout2' 		=> esc_html__( 'Cat Layout 2', 'ogo-core' ),
			// 	),
			// 	'default' => 'cat_layout1',
			// ),
			/*end category*/
			// array(
			// 	'type'    => Controls_Manager::SELECT,
			// 	'id'      => 'play_button_size',
			// 	'label'   => esc_html__( 'Play Button Size', 'ogo-core' ),
			// 	'options' => array(
			// 		'size-lg' 		=> esc_html__( 'Button Size Big', 'ogo-core' ),
			// 		'size-md' 		=> esc_html__( 'Button Size Medium', 'ogo-core' ),
			// 		'size-sm' 	    => esc_html__( 'Button Size Small', 'ogo-core' ),
			// 	),
			// 	'default' => 'size-md',
			// ),
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
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'itemspace',
				'label'   => esc_html__( 'Item Spacing', 'ogo-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-default .amt-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'item_gutter',
				'label'   => esc_html__( 'Item Gutter', 'ogo-core' ),
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
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_count',
				'label'   => esc_html__( 'Title count', 'ogo-core' ),
				'default' => 15,
				'description' => esc_html__( 'Maximum number of title', 'ogo-core' ),
				'separator' => 'before',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__( 'Content Display', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__( 'Word count', 'ogo-core' ),
				'default' => 20,
				'condition' => array( 'content_display' => array( 'yes' ), 'style' => array( 'style1', 'style2', 'style3', ) ),
				'description' => esc_html__( 'Maximum number of words', 'ogo-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'loadmore_display',
				'label'       => esc_html__( 'Load More Display', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'no',
				'separator' => 'before',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'button_text',
				'label'   => esc_html__( 'Load More Text', 'ogo-core' ),
				'default' => 'Load More',
				'condition'   => array('loadmore_display' => array('yes')),
			),
			array(
				'type'    => Group_Control_Css_Filter::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'Image Blend', 'ogo-core' ),
				'name' => 'blend', 
				'selector' => '{{WRAPPER}} img',		
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
				'type'    => Controls_Manager::SELECT,
				'id'      => 'post_ordering',
				'label'   => esc_html__( 'Post Ordering', 'ogo-core' ),
				'options' => array(
					'DESC'	=> esc_html__( 'Desecending', 'ogo-core' ),
					'ASC'	=> esc_html__( 'Ascending', 'ogo-core' ),
				),
				'default' => 'DESC',
			),
			array(
				'type'    => Controls_Manager::SELECT,
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
            	'type' => Controls_Manager::SELECT2,
            	'default' => 'posts',
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
				'condition'   => array( 'style' => array('style2','style3' ) ),
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
				'label'       => esc_html__( 'Show Length', 'ogo-core' ),
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
			array(
				'type'        => Controls_Manager::TEXT,
				'id'          => 'separator_between',
				'label'       => esc_html__( 'Separator Between', 'ogo-core' ),
				'dynamic' => [
					'active' => true,
				],
				'selectors' => array(
	                '{{WRAPPER}} .entry-content ul.entry-meta li:after ' => 'content: "{{VALUE}}" ;',
					'{{WRAPPER}} .entry-content ul.entry-meta li:last-child::after ' => 'content: " " ;',
	            ),
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
				'label'       => esc_html__( 'Show Button', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'yes',
				'condition'   => array( 'style' => array('style4','style5' ) ),
				'separator' => 'before',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'read_more_text',
				'label'   => esc_html__( 'Button Text', 'ogo-core' ),
				'default' => esc_html__( 'View Details', 'ogo-core' ),
				'condition' => array( 'post_read' => array( 'yes' ) ),
				'condition'   => array( 'style' => array('style4','style5' ) ),
			),        
			array(
				'mode' => 'section_end',
			),
			// Title style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_title_style',
	            'label'   => esc_html__( 'Content Style', 'ogo-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-post-grid-default .amt-item .entry-title',
			),
			array(
				'type' => Controls_Manager::COLOR,
				'id'    => 'title_color',
				'label'   => esc_html__( 'Title Color', 'ogo-core' ),
				'selectors' => array(
                    '{{WRAPPER}} .amt-post-grid-default .amt-item .entry-title a '  => 'color: {{VALUE}};',
				),
			),
			array(
	            'type'    => Controls_Manager::SLIDER,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_margin',
	            'label'   => __( 'Title Spacing', 'ogo-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-grid-default .amt-item .entry-title' => 'margin-bottom: {{SIZE}}{{UNIT}} ;',
	            ),
	        ),
	        array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Content Style', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-post-grid-default .amt-item .post_excerpt p',
				'separator' => 'before',
			),
			array(
				'type' => Controls_Manager::COLOR,
				'id'    => 'content_color',
				'label'   => esc_html__( 'Content Color', 'ogo-core' ),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-default .amt-item .post_excerpt p' => 'color:{{VALUE}};',
				),
			),
			array(
	            'type'    => Controls_Manager::SLIDER,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'content_margin',
	            'label'   => __( 'Content Spacing', 'ogo-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-grid-default .amt-item .post_excerpt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
	            ),
	        ),
			array(
				'mode' => 'section_end',
			),
			//Image style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_image_style',
	            'label'   => esc_html__( 'Image', 'ogo-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),

			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'image_border_radius',
	            'label'   => __( 'Border Radius', 'ogo-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-grid-default .amt-item .amt-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	            ),
	        ),
			array(
	            'type'    => Controls_Manager::SLIDER,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'image_spacing_1',
	            'label'   => __( 'Spacing', 'ogo-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-grid-default .amt-item .amt-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
	            ),
				'condition'   => array( 'style' => array('style1','style2','style3' ) ),
	        ),
			array(
	            'type'    => Controls_Manager::SLIDER,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'image_spacing_2',
	            'label'   => __( 'Spacing', 'ogo-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-grid-default .amt-item .amt-image' => 'margin-right: {{SIZE}}{{UNIT}};',
	            ),
				'condition'   => array( 'style' => array('style4','style5' ) ),
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
				'condition'   => array( 'style' => array('style2','style3' ) ),
	        ),
	        array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'meta_typo',
				'label'   => esc_html__( 'Meta Typo', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-post-grid-default ul.entry-meta li',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_color',
				'label'   => esc_html__( 'Meta Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-default ul.entry-meta li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-post-grid-default ul.entry-meta li a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_author_color',
				'label'   => esc_html__( 'Meta Author Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-default .amt-item .post-author a' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::SLIDER,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'meta_margin',
	            'label'   => __( 'Spacing', 'ogo-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-grid-default ul.entry-meta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
	            ),
	        ),
	        array(
				'mode' => 'section_end',
			),
			// Category style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_category_style',
	            'label'   => esc_html__( 'Category Style', 'ogo-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array('style2','style3' ) ),
	        ),
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'cat_typo',
				'label'   => esc_html__( 'Category Typo', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-post-grid-style2 ul.entry-meta li.post_cats a',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_color',
				'label'   => esc_html__( 'Category Color', 'ogo-core' ),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-style2 ul.entry-meta li.post_cats a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_bg_color',
				'label'   => esc_html__( 'Background Color', 'ogo-core' ),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-style2 ul.entry-meta li.post_cats a' => 'background-color: {{VALUE}}',
				),
			),
	        array(
				'mode' => 'section_end',
			),
			// ReadMore Button

			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_viewdetails_style',
	            'label'   => esc_html__( 'View Details Button', 'ogo-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array('style4','style5' ) ),
	        ),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'tabs_start_viewdetails',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_view_btn_normal',
				'label'   => esc_html__( 'Normal', 'ogo-core' ),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'viewdetails_btn_typo',
				'label'   => esc_html__( 'Typography', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-post-grid-default .post-read-more a',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'viewdetails_text_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-default .post-read-more a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'viewdetails_bg_color',
				'label'   => esc_html__( 'Background Color', 'ogo-core' ),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-default .post-read-more a' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'mode'    => 'responsive',
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'viewdetails_border_radius',
				'label'   => esc_html__( 'Border Radius', 'ogo-core' ),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-default .post-read-more a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'viewdetails_padding',
				'label' => esc_html__( 'Padding', 'ogo-core' ),
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .amt-post-grid-default .post-read-more a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
	            'type'    => Controls_Manager::SLIDER,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'viewdetails_margin',
	            'label'   => __( 'Margin', 'ogo-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-grid-default .post-read-more ' => 'margin-bottom: {{SIZE}}{{UNIT}};',
	            ),
	        ),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_view_btn_hover',
				'label'   => esc_html__( 'Hover', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'viewdetails_text_hover_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-default .post-read-more a:hover' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'viewdetails_bg_hover_color',
				'label'   => esc_html__( 'Background Color', 'ogo-core' ),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-default .post-read-more a:hover' => 'background-color: {{VALUE}}',
				),
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
			// loadMore Button

			array(
				'mode'    => 'section_start',
				'id'      => 'sec_loadmore_style',
				'label'   => esc_html__( 'Load More Button', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'tabs_start_loadmore',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_load_btn_normal',
				'label'   => esc_html__( 'Normal', 'ogo-core' ),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'loadmore_btn_typo',
				'label'   => esc_html__( 'Typography', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-post-grid-default .blog-loadmore a.loadMore',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'loadmore_text_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-default .blog-loadmore a.loadMore' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'loadmore_bg_color',
				'label'   => esc_html__( 'Background Color', 'ogo-core' ),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-default .blog-loadmore a.loadMore' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'mode'    => 'responsive',
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'loadmore_border_radius',
				'label'   => esc_html__( 'Border Radius', 'ogo-core' ),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-default .blog-loadmore a.loadMore' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'loadmore_padding',
				'label' => esc_html__( 'Padding', 'ogo-core' ),
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .amt-post-grid-default .blog-loadmore a.loadMore' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'mode'          => 'responsive',
				'size_units' => [ 'px', '%', 'em' ],
				'id'      => 'loadmore_margin',
				'label'   => __( 'Margin', 'ogo-core' ),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-default .blog-loadmore ' => 'margin:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_load_btn_hover',
				'label'   => esc_html__( 'Hover', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'loadmore_text_hover_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-default .blog-loadmore a.loadMore:hover' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'loadmore_bg_hover_color',
				'label'   => esc_html__( 'Background Color', 'ogo-core' ),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-default .blog-loadmore a.loadMore:hover' => 'background-color: {{VALUE}}',
				),
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
			// Animation style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_animation_style',
	            'label'   => esc_html__( 'Animation', 'ogo-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
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
				'type'    => Controls_Manager::SELECT,
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

			// Responsive Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__( 'Number of Responsive Columns', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'col_xl',
				'label'   => esc_html__( 'Desktops: > 1199px', 'ogo-core' ),
				'options' => $this->amt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'col_lg',
				'label'   => esc_html__( 'Desktops: > 991px', 'ogo-core' ),
				'options' => $this->amt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'col_md',
				'label'   => esc_html__( 'Tablets: > 767px', 'ogo-core' ),
				'options' => $this->amt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'col_sm',
				'label'   => esc_html__( 'Phones: > 576px', 'ogo-core' ),
				'options' => $this->amt_translate['cols'],
				'default' => '12',
			),
			array(
				'type'    => Controls_Manager::SELECT,
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
			case 'style5':
			$template = 'post-grid-5';
			break;
			case 'style4':
			$template = 'post-grid-4';
			break;
			case 'style3':
			$template = 'post-grid-3';
			break;
			case 'style2':
			$template = 'post-grid-2';
			break;
			default:
			$template = 'post-grid-1';
			break;
		}
		
		return $this->amt_template( $template, $data );
	}
}