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
use Elementor\Group_Control_Box_Shadow;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class Amt_Portfolio_Slider extends Custom_Widget_Base {
    public function __construct($data = [], $args = null)
    {
        $this->amt_name = esc_html__('AMT Portfolio Slider', 'ogo-core');
        $this->amt_base = 'amt-portfolio-slider';
        $this->amt_translate = array(
            'cols'  => array(
                '12' => esc_html__('1 Col', 'ogo-core'),
                '6'  => esc_html__('2 Col', 'ogo-core'),
                '4'  => esc_html__('3 Col', 'ogo-core'),
                '3'  => esc_html__('4 Col', 'ogo-core'),
                '2'  => esc_html__('6 Col', 'ogo-core'),
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
                'mode'    => 'section_start',
                'id'      => 'sec_general',
                'label'   => esc_html__('General', 'ogo-core'),
            ),
            array(
                'type'    => Controls_Manager::SELECT,
                'id'      => 'orderby',
                'label'   => esc_html__('Order By', 'ogo-core'),
                'options' => array(
                    'date'        => esc_html__('Date (Recents comes first)', 'ogo-core'),
                    'title'       => esc_html__('Title', 'ogo-core'),
                    'menu_order'  => esc_html__('Custom Order (Available via Order field inside Page Attributes box)', 'ogo-core'),
                ),
                'default' => 'date',
            ),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__( 'Client Name', 'ogo-core' ),
				'label_on'    => esc_html__( 'On', 'ogo-core' ),
				'label_off'   => esc_html__( 'Off', 'ogo-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Content. Default: off', 'ogo-core' ),
                'condition'   => array( 'portfolio_content_display' => 'yes' ),
			),
            			
            array(
				'label' => esc_html__( 'Navigation', 'ogo-core' ),
				'id'	=> 'portfolio-navigation',
				'type' => Controls_Manager::SELECT,
				'default' => 'portfolio_both',
				'options' => [
					'portfolio_both' => esc_html__( 'Arrows and Dots', 'ogo-core' ),
					'portfolio_arrows' => esc_html__( 'Arrows', 'ogo-core' ),
					'portfolio_dots' => esc_html__( 'Dots', 'ogo-core' ),
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
					'3' => esc_html__( '3', 'ogo-core' ),
					'4' => esc_html__( '4', 'ogo-core' ),
					'5' => esc_html__( '5', 'ogo-core' ),
				],
				'frontend_available' => true,
				'default' => '2',
				'tablet_default' => '2',
				'mobile_default' => '1',
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
			),
            array(
                'mode' => 'section_end',
            ),
            
            //style from here
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_style',
                'label'   => esc_html__('Style', 'ogo-core'),
                'tab'     => Controls_Manager::TAB_STYLE,
            ),
            array(
                'mode'    => 'responsive',
                'type'    => Controls_Manager::CHOOSE,
                'id'      => 'title_align',
                'label'   => esc_html__('Align Items', 'ogo-core'),
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
                    '{{WRAPPER}} .portfolio-single-content' => 'text-align: {{VALUE}};',
                ],
                'default' => 'left',
            ),
            array(
                'mode'    => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'content_padding',
                'label' => esc_html__('Padding', 'ogo-core'),
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-single-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'bg_color',
                'label'   => esc_html__('Background Color', 'ogo-core'),
                'selectors' => [
                    '{{WRAPPER}} .portfolio-single-content'  => 'background-color: {{VALUE}};',

                ],
                'default' => '#53AFEE',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'bg_hover_color',
                'label'   => esc_html__('Background Hover Color', 'ogo-core'),
                'selectors' => [
                    '{{WRAPPER}} .portfolio-single-content:hover'  => 'background-color: {{VALUE}};',

                ],
                'default' => '#1F0D3C',
            ),
            array(
                'type' => Controls_Manager::HEADING,
                'id'      => 'title_style',
                'label' => esc_html__('Title', 'ogo-core'),
                'separator' => 'before',
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'name'    => 'title_typo',
                'label'   => esc_html__('Typography', 'ogo-core'),
                'selector' => '{{WRAPPER}} .portfolio-title a',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_color',
                'label'   => esc_html__('Color', 'ogo-core'),
                'selectors' => [
                    '{{WRAPPER}} .portfolio-title a'  => 'color: {{VALUE}};',

                ],
                'default' => '#fff',
            ),
            array(
                'type' => Controls_Manager::HEADING,
                'id'      => 'content_style',
                'label' => esc_html__('Content', 'ogo-core'),
                'separator' => 'before',
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'name'    => 'content_typo',
                'label'   => esc_html__('Typography', 'ogo-core'),
                'selector' => '{{WRAPPER}} .portfolio-client p',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'content_color',
                'label'   => esc_html__('Color', 'ogo-core'),
                'selectors' => [
                    '{{WRAPPER}} .portfolio-client p'  => 'color: {{VALUE}};',

                ],
                'default' => '#fff',
            ),
            array(
                'type' => Controls_Manager::HEADING,
                'id'      => 'swiper_style',
                'label' => esc_html__('Swiper Icons', 'ogo-core'),
                'separator' => 'before',
            ),

            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'arrow_background_color',
				'label'   => esc_html__( 'Arrow Color', 'ogo-core' ),
				'default' => '#53AFEE',
                'selectors'=>[
                    '{{WRAPPER}} .swiper-button-next.partner_btn_next, .partner_btn_next:after, .swiper-button-prev.partner_btn_prev, .partner_btn_prev:after' => 'color: {{VALUE}};',
                ],
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'dots_background_color',
				'label'   => esc_html__( 'Dots Color', 'ogo-core' ),
				'default' => '#53AFEE',
                'selectors'=>[
                    '{{WRAPPER}} .swiper-pagination-bullet' => 'background-color: {{VALUE}};',
                ],
			),
            array(
                'mode' => 'section_end',
            ),

        );
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

        $template = 'amt-portfolio-slider';
		return $this->amt_template( $template, $data );
	}
}