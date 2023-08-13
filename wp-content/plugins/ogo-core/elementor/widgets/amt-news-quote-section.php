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

if ( ! defined( 'ABSPATH' ) ) exit;

class Amt_News_Quote_Section extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT CTA Section', 'ogo-core' );
		$this->amt_base = 'amt-news-quote-section';
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Section Style', 'ogo-core' ),
				'options' => array(
					'style1' => esc_html__( 'News and Quote Section Style 1' , 'ogo-core' ),
					'style2' => esc_html__( 'News and Quote Section Style 2', 'ogo-core' ),
				),
				'default' => 'style1',
			),
            array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'ogo-core' ),
				'default' => 'Take you online marketing to the next level, today.',
			),
			array(
				'type'        => Controls_Manager::TEXT,
				'id'          => 'button_one',
				'label'       => esc_html__( 'Button Text', 'ogo-core' ),
				'default' 	  => esc_html__('Contact Now', 'ogo-core' ),
			),
			array(
				'type'        => Controls_Manager::URL,
				'id'          => 'one_buttonurl',
				'label'       => esc_html__( 'Button URL', 'ogo-core' ),
				'placeholder' => 'https://your-link.com',
			),
			array(
				'mode' => 'section_end',
			),
			// Style

			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sec_bg_color',
				'label'   => esc_html__( 'Background Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-news-letter-quote' => 'background-color: {{VALUE}};',
                ],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'img1_bg_color',
				'label'   => esc_html__( 'Background Image Color Right', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-news-quote-2-bg1 svg path:nth-child(odd)' => 'fill: {{VALUE}};',
                ],
				'condition'   => array( 'style' => array('style2' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'img2_bg_color',
				'label'   => esc_html__( 'Background Image Color Left', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-news-quote-2-bg2 svg path' => 'fill: {{VALUE}};',
                ],
				'condition'   => array( 'style' => array('style2' ) ),
			),
            array(
				'mode' => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'section_border_radius',
				'label' => esc_html__( 'Border Radius', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-news-letter-quote-1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
                'condition'   => array( 'style' => array('style1' ) ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-news-letter-quote .newsleter-text .newsletter-title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
                'default' => 36,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'ogo-core' ),
                'selectors' =>[
                    '{{WRAPPER}} .amt-works-section .rtworks-media .works-content .works-title '  => 'color: {{VALUE}};',

                ],
			),
            array(
				'mode' => 'section_end',
			),
            
			array(
				'mode'    => 'section_start',
				'id'      => 'btn_style',
				'label'   => esc_html__( 'Button Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'tabs_start_btn',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_btn_normal',
				'label'   => esc_html__( 'Normal', 'ogo-core' ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button-text-size',
				'label'   => esc_html__( 'Text', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-news-letter-quote .newsletter-btn a',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'text_color',
				'label'   => esc_html__( 'Text Color', 'ogo-core' ),
                'selectors' =>[
                    '{{WRAPPER}} .amt-news-letter-quote .newsletter-btn a'  => 'color: {{VALUE}};',

                ],
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_bg_color',
				'label'   => esc_html__( 'Button Background Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-news-letter-quote .newsletter-btn a' => 'background-color: {{VALUE}};',
                ],
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
					'{{WRAPPER}} .amt-news-letter-quote .newsletter-btn a' => 'border-style: {{VALUE}};',
				],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_color',
				'label'   => esc_html__( 'Border Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-news-letter-quote .newsletter-btn a' => 'border-color: {{VALUE}};',
                ],
			),
			array(
				'mode' => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'btn_border_width',
				'label' => esc_html__( 'Border width', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-news-letter-quote .newsletter-btn a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
            array(
				'mode' => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'btn_border_radius',
				'label' => esc_html__( 'Border Radius', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-news-letter-quote .newsletter-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
            array(
				'mode' => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'btn_padding',
				'label' => esc_html__( 'Padding', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-news-letter-quote .newsletter-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
            array(
				'mode' => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'btn_margin',
				'label' => esc_html__( 'Margin', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-news-letter-quote .newsletter-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_btn_hover',
				'label'   => esc_html__( 'Hover', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'text_color_hover',
				'label'   => esc_html__( 'Text Color', 'ogo-core' ),
                'selectors' =>[
                    '{{WRAPPER}} .amt-news-letter-quote .newsletter-btn:hover a'  => 'color: {{VALUE}};',
                ],
				'default' => '#fff',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_hover_color',
				'label'   => esc_html__( 'Border Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-news-letter-quote .newsletter-btn:hover a' => 'border-color: {{VALUE}};',
                ],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_hover_bg_color',
				'label'   => esc_html__( 'Background Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-news-letter-quote .newsletter-btn:hover a' => 'background-color: {{VALUE}};',
                ],
				'default' => '#1F0D3Cb3',
				'condition' => [ 'style' => 'style1'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_hover_bg_color2',
				'label'   => esc_html__( 'Background Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-news-letter-quote .newsletter-btn:hover a' => 'background-color: {{VALUE}};',
                ],
				'default' => '#53AFEE',
				'condition' => [ 'style' => 'style2'],
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
			$template = 'news-quote-section-2';
			break;
			default:
			$template = 'news-quote-section-1';
			break;
		}
	
		return $this->amt_template( $template, $data );
	}
}