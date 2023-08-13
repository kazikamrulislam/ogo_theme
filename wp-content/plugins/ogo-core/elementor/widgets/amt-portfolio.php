<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Base;
use Elementor\Core\Schemes\Typography as Scheme_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if (!defined('ABSPATH')) exit;

class AMT_Portfolio extends Custom_Widget_Base
{

    public function __construct($data = [], $args = null)
    {
        $this->amt_name = esc_html__('AMT Portfolio', 'ogo-core');
        $this->amt_base = 'amt-portfolio';
        $this->amt_translate = array(
            'cols' => array(
                '12' => esc_html__('1 Col', 'ogo-core'),
                '6' => esc_html__('2 Col', 'ogo-core'),
                '4' => esc_html__('3 Col', 'ogo-core'),
                '3' => esc_html__('4 Col', 'ogo-core'),
                '2' => esc_html__('6 Col', 'ogo-core'),
            ),
        );
        parent::__construct($data, $args);
    }

    public function amt_fields()
    {
        $terms = get_terms(array('taxonomy' => 'ogo_portfolio_category', 'fields' => 'id=>name'));
        $category_dropdown = array('0' => esc_html__('All Categories', 'ogo-core'));

        foreach ($terms as $id => $name) {
            $category_dropdown[$id] = $name;
        }

        $fields = array(
            array(
                'mode' => 'section_start',
                'id' => 'sec_general',
                'label' => esc_html__('General', 'ogo-core'),
            ),
            array(
                'type' => Controls_Manager::NUMBER,
                'id' => 'number',
                'label' => esc_html__('Total number of items', 'ogo-core'),
                'default' => 2,
                'description' => esc_html__('Maximum number of Item', 'ogo-core'),
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
					'{{WRAPPER}} .porfolio-thums' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
            array(
                'type' => Controls_Manager::SELECT,
                'id' => 'item_space',
                'label' => esc_html__('Item Space', 'ogo-core'),
                'options' => array(
                    'g-0' => esc_html__('Gutters 0', 'ogo-core'),
                    'g-1' => esc_html__('Gutters 1', 'ogo-core'),
                    'g-2' => esc_html__('Gutters 2', 'ogo-core'),
                    'g-3' => esc_html__('Gutters 3', 'ogo-core'),
                    'g-4' => esc_html__('Gutters 4', 'ogo-core'),
                    'g-5' => esc_html__('Gutters 5', 'ogo-core'),
                ),
                'default' => 'g-4',
            ),
            array(
                'type' => Controls_Manager::SELECT,
                'id' => 'cat',
                'label' => esc_html__('Categories', 'ogo-core'),
                'options' => $category_dropdown,
                'default' => '0',
            ),
            array(
                'type' => Controls_Manager::SELECT,
                'id' => 'orderby',
                'label' => esc_html__('Order By', 'ogo-core'),
                'options' => array(
                    'date' => esc_html__('Date (Recents comes first)', 'ogo-core'),
                    'title' => esc_html__('Title', 'ogo-core'),
                    'menu_order' => esc_html__('Custom Order (Available via Order field inside Page Attributes box)', 'ogo-core'),
                ),
                'default' => 'date',
            ),
            array(
                'type' => Controls_Manager::SWITCHER,
                'id' => 'content_display',
                'label' => esc_html__('Client Name', 'ogo-core'),
                'label_on' => esc_html__('On', 'ogo-core'),
                'label_off' => esc_html__('Off', 'ogo-core'),
                'default' => 'yes',
                'description' => esc_html__('Show or Hide Content. Default: off', 'ogo-core'),
            ),
            array(
                'type' => Controls_Manager::SWITCHER,
                'id' => 'more_items_display',
                'label' => esc_html__('Show More Items', 'ogo-core'),
                'label_on' => esc_html__('On', 'ogo-core'),
                'label_off' => esc_html__('Off', 'ogo-core'),
                'default' => 'yes',
                'description' => esc_html__('Show or Hide More Items. Default: On', 'ogo-core'),
            ),
            array(
                'type' => Controls_Manager::SELECT2,
                'id' => 'more_button',
                'label' => esc_html__('More Button', 'ogo-core'),
                'options' => array(
                    'show' => esc_html__('Show Read More', 'ogo-core'),
                    'hide' => esc_html__('Show Pagination', 'ogo-core'),
                ),
                'default' => 'show',
                'condition' => array('more_items_display' => array('yes')),
            ),
            array(
                'type' => Controls_Manager::TEXT,
                'id' => 'see_button_text',
                'label' => esc_html__('Button Text', 'ogo-core'),
                'default' => esc_html__('More items', 'ogo-core'),
                'condition' => array('more_items_display' => array('yes')),
            ),
            array(
                'mode' => 'section_end',
            ),

            //style from here
            array(
                'mode' => 'section_start',
                'id' => 'sec_style',
                'label' => esc_html__('Style', 'ogo-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ),
            array(
                'mode' => 'responsive',
                'type' => Controls_Manager::CHOOSE,
                'id' => 'title_align',
                'label' => esc_html__('Align Items', 'ogo-core'),
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
                    '{{WRAPPER}} .portfolio-content' => 'text-align: {{VALUE}};',
                ],
                'default' => 'left',
            ),
            array(
                'mode' => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id' => 'content_padding',
                'label' => esc_html__('Padding', 'ogo-core'),
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ),
            array(
                'type' => Controls_Manager::COLOR,
                'id' => 'bg_color',
                'label' => esc_html__('Background Color', 'ogo-core'),
                'selectors' => [
                    '{{WRAPPER}} .portfolio-content' => 'background-color: {{VALUE}};',

                ],
                'default' => '#53AFEE',
            ),
            array(
                'type' => Controls_Manager::COLOR,
                'id' => 'bg_hover_color',
                'label' => esc_html__('Background Hover Color', 'ogo-core'),
                'selectors' => [
                    '{{WRAPPER}} .portfolio-content:hover' => 'background-color: {{VALUE}};',

                ],
                'default' => '#1F0D3C',
            ),
            array(
                'type' => Controls_Manager::HEADING,
                'id' => 'title_style',
                'label' => esc_html__('Title', 'ogo-core'),
                'separator' => 'before',
            ),
            array(
                'mode' => 'group',
                'type' => Group_Control_Typography::get_type(),
                'name' => 'title_typo',
                'label' => esc_html__('Typography', 'ogo-core'),
                'selector' => '{{WRAPPER}} .portfolio-title a',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ),
            array(
                'type' => Controls_Manager::COLOR,
                'id' => 'title_color',
                'label' => esc_html__('Color', 'ogo-core'),
                'selectors' => [
                    '{{WRAPPER}} .portfolio-title a ' => 'color: {{VALUE}};',

                ],
                'default' => '#fff',
            ),
            array(
                'type' => Controls_Manager::HEADING,
                'id' => 'content_style',
                'label' => esc_html__('Client', 'ogo-core'),
                'separator' => 'before',
            ),
            array(
                'mode' => 'group',
                'type' => Group_Control_Typography::get_type(),
                'name' => 'content_typo',
                'label' => esc_html__('Typography', 'ogo-core'),
                'selector' => '{{WRAPPER}} .portfolio-client p',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ),
            array(
                'type' => Controls_Manager::COLOR,
                'id' => 'content_color',
                'label' => esc_html__('Color', 'ogo-core'),
                'selectors' => [
                    '{{WRAPPER}} .portfolio-client p' => 'color: {{VALUE}};',

                ],
                'default' => '#fff',
            ),
            array(
                'mode' => 'section_end',
            ),


            array(
                'mode' => 'section_start',
                'id' => 'sec_loadmore_style',
                'label' => esc_html__('Load More Button', 'ogo-core'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => array('more_items_display' => array('yes')),
            ),
            array(
                'mode' => 'tabs_start',
                'id' => 'tabs_start_loadmore',
            ),
            array(
                'mode' => 'tab_start',
                'id' => 'tab_start_load_btn_normal',
                'label' => esc_html__('Normal', 'ogo-core'),
            ),
            array(
                'mode' => 'group',
                'type' => Group_Control_Typography::get_type(),
                'name' => 'loadmore_btn_typo',
                'label' => esc_html__('Typography', 'ogo-core'),
                'selector' => '{{WRAPPER}} .button-style-1',
            ),
            array(
                'type' => Controls_Manager::COLOR,
                'id' => 'loadmore_text_color',
                'label' => esc_html__('Color', 'ogo-core'),
                'selectors' => array(
                    '{{WRAPPER}} .button-style-1' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type' => Controls_Manager::COLOR,
                'id' => 'loadmore_bg_color',
                'label' => esc_html__('Background Color', 'ogo-core'),
                'selectors' => array(
                    '{{WRAPPER}} .button-style-1' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'mode' => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id' => 'loadmore_border_radius',
                'label' => esc_html__('Border Radius', 'ogo-core'),
                'selectors' => array(
                    '{{WRAPPER}} .button-style-1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            ),
            array(
                'mode' => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id' => 'loadmore_padding',
                'label' => esc_html__('Padding', 'ogo-core'),
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .button-style-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ),
            array(
                'type' => Controls_Manager::DIMENSIONS,
                'mode' => 'responsive',
                'size_units' => ['px', '%', 'em'],
                'id' => 'loadmore_margin',
                'label' => __('Margin', 'ogo-core'),
                'selectors' => array(
                    '{{WRAPPER}} .button-style-1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            ),
            array(
                'mode' => 'tab_end',
            ),
            array(
                'mode' => 'tab_start',
                'id' => 'tab_start_load_btn_hover',
                'label' => esc_html__('Hover', 'ogo-core'),
            ),
            array(
                'type' => Controls_Manager::COLOR,
                'id' => 'loadmore_text_hover_color',
                'label' => esc_html__('Color', 'ogo-core'),
                'selectors' => array(
                    '{{WRAPPER}} .button-style-1:hover' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type' => Controls_Manager::COLOR,
                'id' => 'loadmore_bg_hover_color',
                'label' => esc_html__('Background Color', 'ogo-core'),
                'selectors' => array(
                    '{{WRAPPER}} .button-style-1:hover' => 'background-color: {{VALUE}}',
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
                'mode' => 'section_start',
                'id' => 'sec_animation_style',
                'label' => esc_html__('Animation', 'ogo-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ),
            array(
                'type' => Controls_Manager::SELECT2,
                'id' => 'animation',
                'label' => esc_html__('Animation', 'ogo-core'),
                'options' => array(
                    'wow' => esc_html__('On', 'ogo-core'),
                    'hide' => esc_html__('Off', 'ogo-core'),
                ),
                'default' => 'wow',
            ),
            array(
                'type' => Controls_Manager::SELECT2,
                'id' => 'animation_effect',
                'label' => esc_html__('Entrance Animation', 'ogo-core'),
                'options' => array(
                    'none' => esc_html__('none', 'ogo-core'),
                    'bounce' => esc_html__('bounce', 'ogo-core'),
                    'flash' => esc_html__('flash', 'ogo-core'),
                    'pulse' => esc_html__('pulse', 'ogo-core'),
                    'rubberBand' => esc_html__('rubberBand', 'ogo-core'),
                    'shakeX' => esc_html__('shakeX', 'ogo-core'),
                    'shakeY' => esc_html__('shakeY', 'ogo-core'),
                    'headShake' => esc_html__('headShake', 'ogo-core'),
                    'swing' => esc_html__('swing', 'ogo-core'),
                    'fadeIn' => esc_html__('fadeIn', 'ogo-core'),
                    'fadeInDown' => esc_html__('fadeInDown', 'ogo-core'),
                    'fadeInLeft' => esc_html__('fadeInLeft', 'ogo-core'),
                    'fadeInRight' => esc_html__('fadeInRight', 'ogo-core'),
                    'fadeInUp' => esc_html__('fadeInUp', 'ogo-core'),
                    'bounceIn' => esc_html__('bounceIn', 'ogo-core'),
                    'bounceInDown' => esc_html__('bounceInDown', 'ogo-core'),
                    'bounceInLeft' => esc_html__('bounceInLeft', 'ogo-core'),
                    'bounceInRight' => esc_html__('bounceInRight', 'ogo-core'),
                    'bounceInUp' => esc_html__('bounceInUp', 'ogo-core'),
                    'slideInDown' => esc_html__('slideInDown', 'ogo-core'),
                    'slideInLeft' => esc_html__('slideInLeft', 'ogo-core'),
                    'slideInRight' => esc_html__('slideInRight', 'ogo-core'),
                    'slideInUp' => esc_html__('slideInUp', 'ogo-core'),
                ),
                'default' => 'fadeInUp',
                'condition' => array('animation' => array('wow')),
            ),
            array(
                'type' => Controls_Manager::TEXT,
                'id' => 'delay',
                'label' => esc_html__('Delay', 'ogo-core'),
                'default' => '0.5',
                'condition' => array('animation' => array('wow')),
            ),
            array(
                'type' => Controls_Manager::TEXT,
                'id' => 'duration',
                'label' => esc_html__('Duration', 'ogo-core'),
                'default' => '1',
                'condition' => array('animation' => array('wow')),
            ),
            array(
                'type' => Group_Control_Css_Filter::get_type(),
                'mode' => 'group',
                'label' => esc_html__('Image Blend', 'ogo-core'),
                'name' => 'blend',
                'selector' => '{{WRAPPER}} .porfolio-thums img',
            ),
            array(
                'mode' => 'section_end',
            ),

            // Responsive Grid Columns
            array(
                'mode' => 'section_start',
                'id' => 'sec_responsive',
                'label' => esc_html__('Number of Responsive Columns', 'ogo-core'),

            ),
            array(
                'type' => Controls_Manager::SELECT2,
                'id' => 'col_lg',
                'label' => esc_html__('Desktops: > 1199px', 'ogo-core'),
                'options' => $this->amt_translate['cols'],
                'default' => '6',
            ),
            array(
                'type' => Controls_Manager::SELECT2,
                'id' => 'col_md',
                'label' => esc_html__('Desktops: > 991px', 'ogo-core'),
                'options' => $this->amt_translate['cols'],
                'default' => '6',
            ),
            array(
                'type' => Controls_Manager::SELECT2,
                'id' => 'col_sm',
                'label' => esc_html__('Tablets: > 767px', 'ogo-core'),
                'options' => $this->amt_translate['cols'],
                'default' => '6',
            ),
            array(
                'type' => Controls_Manager::SELECT2,
                'id' => 'col_xs',
                'label' => esc_html__('Phones: < 768px', 'ogo-core'),
                'options' => $this->amt_translate['cols'],
                'default' => '12',
            ),
            array(
                'type' => Controls_Manager::SELECT2,
                'id' => 'col_mobile',
                'label' => esc_html__('Small Phones: < 480px', 'ogo-core'),
                'options' => $this->amt_translate['cols'],
                'default' => '12',
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
        $template = 'amt-portfolio';
        return $this->amt_template($template, $data);
    }
}
