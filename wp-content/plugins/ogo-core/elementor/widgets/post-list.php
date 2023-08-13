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
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) exit;

class Post_List extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Post List', 'ogo-core' );
		$this->amt_base = 'amt-post-list';
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
					'style1' => esc_html__( 'List Layout 1', 'ogo-core' ),
					'style2' => esc_html__( 'List Layout 2', 'ogo-core' ),
					'style3' => esc_html__( 'List Layout 3', 'ogo-core' ),
					'style4' => esc_html__( 'List Layout 4', 'ogo-core' ),
					'style5' => esc_html__( 'List Layout 5', 'ogo-core' ),
					'style6' => esc_html__( 'List Layout 6', 'ogo-core' ),
					'style7' => esc_html__( 'List Layout 7', 'ogo-core' ),
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
				'condition'   => array( 'style' => array( 'style5' ) ),
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
				'id'      => 'list_border',
				'label'   => esc_html__( 'Border', 'ogo-core' ),
				'options' => array(
					'default' 		=> esc_html__( 'Border On', 'ogo-core' ),
					'border-none' 			=> esc_html__( 'Border Off', 'ogo-core' ),
				),
				'default' => 'default',
				'condition'   => array( 'style' => array( 'style5', 'style6' ) ),
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
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'item_margin',
				'label'   => esc_html__( 'Item Margin', 'ogo-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-list-default .amt-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),			
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'item_padding',
				'label'   => esc_html__( 'Item Padding', 'ogo-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-list-default .amt-item' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				),
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
				'default' => 15,
				'description' => esc_html__( 'Maximum number of small title', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style2', 'style4', 'style5', 'style7' ) ),
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__( 'Content Display', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'yes',
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4', 'style5', 'style7' ) ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__( 'Word count', 'ogo-core' ),
				'default' => 20,
				'description' => esc_html__( 'Maximum number of words', 'ogo-core' ),
				'condition'   => array( 'content_display' => array( 'yes' ), 'style' => array( 'style1', 'style2', 'style4', 'style5', 'style7' ) ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'imagespace',
				'label'   => esc_html__( 'Image Spacing', 'ogo-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-list-style1 .amt-item .amt-image' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .amt-post-list-style3 .amt-item .amt-image' => 'margin-right: {{SIZE}}{{UNIT}};',
				),
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
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
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style5', 'style7' ) ),
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_read',
				'label'       => esc_html__( 'Show Read More', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'yes',
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4', 'style5', 'style7' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'read_more_text',
				'label'   => esc_html__( 'Button Text', 'ogo-core' ),
				'default' => esc_html__( 'Read More', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4', 'style5', 'style7' ),  'post_read' => array( 'yes' ) ),
			),
			array(
				'mode' => 'tab_end',
			),
			// Tab For multi view.
			array(
				'mode'  => 'tab_start',
				'id'    => 'rt_tab_multi_post',
				'label' => esc_html__( 'Multi Post', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style2', 'style4', 'style5', 'style7' ) ),
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
				'condition'   => array( 'style' => array( 'style4', 'style5', 'style7' ) ),
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'border_on_off',
				'label'   => esc_html__( 'Border', 'ogo-core' ),
				'options' => array(
					'amt-border-bottom'      => esc_html__( 'On', 'ogo-core' ),
					'amt-border-none'        => esc_html__( 'Off', 'ogo-core' ),
				),
				'default' => 'amt-border-bottom',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'border_color',
				'label'   => esc_html__( 'Border Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-list-style2 .amt-item.multi-post-item' => 'border-color: {{VALUE}}',
				),
				'condition'   => array( 'border_on_off' => array( 'amt-border-bottom' ) ),
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode' => 'tabs_end',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'loadmore_display',
				'label'       => esc_html__( 'Load More Display', 'ogo-core' ),
				'label_on'    => esc_html__( 'Show', 'ogo-core' ),
				'label_off'   => esc_html__( 'Hide', 'ogo-core' ),
				'default'     => 'no',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'button_text',
				'label'   => esc_html__( 'Load More Text', 'ogo-core' ),
				'default' => 'Load More',
				'condition' => array( 'loadmore_display' => array( 'yes' ), 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Group_Control_Css_Filter::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'Image Blend', 'ogo-core' ),
				'name' => 'blend', 
				'selector' => '{{WRAPPER}} img',
				'condition'   => array( 'style' => array( 'style1','style2','style3','style4','style5', 'style7' ) ),	
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'border_radius',
	            'label'   => __( 'Radius', 'ogo-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-list-default .amt-item .amt-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	                '{{WRAPPER}} .amt-post-list-style3 .amt-item .amt-image a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	            'separator' => 'before',
	            'condition'   => array( 'style' => array( 'style1','style2','style3','style4','style5', 'style7' ) ),
	        ),
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'content_spacing',
	            'label'   => __( 'Content Spacing', 'ogo-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-list-style5 .amt-item .entry-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	            'condition'   => array( 'style' => array( 'style5' ) ),
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
				'selector' => '{{WRAPPER}} .amt-post-list-default .amt-item.single-post-item .entry-title',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_small_typo',
				'label'   => esc_html__( 'Title Small Style', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-post-list-default .amt-item.multi-post-item .entry-title',
				'condition'   => array( 'style' => array( 'style2', 'style3', 'style4', 'style5', 'style7' ) ),
			),
			array(
				'type'    => Group_Control_Background::get_type(),
				'mode'    => 'group',
				'types'   => array( 'classic', 'gradient' ),
				'name'    => 'title_color',
				'label'   => esc_html__( 'Title Color', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-post-list-default .amt-item:not(.multi-post-item) .entry-title a',
			),
			array(
				'type'    => Group_Control_Background::get_type(),
				'mode'    => 'group',
				'types'   => array( 'classic', 'gradient' ),
				'name'    => 'small_title_color',
				'label'   => esc_html__( 'Small Title Color', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-post-list-default .amt-item.multi-post-item .entry-title a',
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_margin',
	            'label'   => __( 'Margin', 'ogo-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-list-default .amt-item .entry-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
				'selector' => '{{WRAPPER}} .amt-post-list-default ul.entry-meta li',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_color',
				'label'   => esc_html__( 'Meta Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-list-default ul.entry-meta li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-post-list-default ul.entry-meta li a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_color',
				'label'   => esc_html__( 'Category Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-list-default .amt-item .entry-categories a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-post-list-default .amt-item .entry-categories a .category-style' => 'color: {{VALUE}}',
				),
			),		
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_author_color',
				'label'   => esc_html__( 'Meta Author Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-list-default .amt-item .post-author a' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style4' ) ),
			),	
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_icon_color',
				'label'   => esc_html__( 'Meta Icon Color', 'ogo-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-list-default ul.entry-meta li i' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'meta_margin',
	            'label'   => __( 'Margin', 'ogo-core' ),
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-list-default ul.entry-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
	            'condition'   => array( 'style' => array( 'style1','style2','style3','style4','style5', 'style7' ) ),
	        ),
	        array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'image_size',
				'label'   => esc_html__( 'Image Size', 'ogo-core' ),
				'options' => array(
					'size_one' 		=> esc_html__( 'Size 1', 'ogo-core' ),
					'size_two' 		=> esc_html__( 'Size 2', 'ogo-core' ),
				),
				'default' => 'size_one',
				'condition'   => array( 'style' => array( 'style5' ) ),
			),
	        array(
	            'type'    => Controls_Manager::SLIDER,
	            'mode'          => 'responsive',
	            'id'      => 'image_box_width',
	            'label'   => __( 'Box Width', 'ogo-core' ),
	            'size_units' => [ 'px', '%', 'em' ],
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
	                '{{WRAPPER}} .amt-post-list-default .amt-item .amt-image' => 'max-width: {{SIZE}}{{UNIT}} !important;',
	            ),
	            'separator' => 'before',
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
					'{{WRAPPER}} .amt-post-list-default .amt-item .amt-image img' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .amt-post-list-default .amt-item .amt-image img' => 'height: {{SIZE}}{{UNIT}};',
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

		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		
		switch ( $data['style'] ) {		
			case 'style7':
			$template = 'post-list-7';
			break;	
			case 'style6':
			$template = 'post-list-6';
			break;		
			case 'style5':
			$template = 'post-list-5';
			break;
			case 'style4':
			$template = 'post-list-4';
			break;
			case 'style3':
			$template = 'post-list-3';
			break;
			case 'style2':
			$template = 'post-list-2';
			break;
			default:
			$template = 'post-list-1';
			break;
		}
		
		return $this->amt_template( $template, $data );
	}
}