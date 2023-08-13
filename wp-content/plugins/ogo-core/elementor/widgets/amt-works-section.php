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

class Amt_Works_Section extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Works Section', 'ogo-core' );
		$this->amt_base = 'amt-works-section';
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
                'type'    => Controls_Manager::MEDIA,
                'id'      => 'image',
                'label' => esc_html__( 'Choose Image', 'ogo-core' ),
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ),
            array(
                'mode' => 'group',
                'type'    => Group_Control_Image_Size::get_type(),
                'name'      => 'image',
                'default' => 'large',
                'separator' => 'none',
            ),
            array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'ogo-core' ),
				'default' => 'Online media management',
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'name',
				'label'   => esc_html__( 'Name', 'ogo-core' ),
				'default' => esc_html__('William L. Kuyken', 'ogo-core' ),
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
				'mode'    => 'responsive',
				'type'    => Controls_Manager::CHOOSE,
				'id'      => 'title_align',
				'label'   => esc_html__( 'Align Items', 'ogo-core' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'ogo-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ogo-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ogo-core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
                'selectors' => [
					'{{WRAPPER}} .amt-works-section .amtworks-media .works-content' => 'text-align: {{VALUE}};',
				],
				'default' => 'left',
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'content_padding',
				'label' => esc_html__( 'Padding', 'ogo-core' ),
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .amt-works-section .amtworks-media .works-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bg_color',
				'label'   => esc_html__( 'Background Color', 'ogo-core' ),
                'selectors' =>[
                    '{{WRAPPER}} .amt-works-section .amtworks-media .works-content '  => 'background-color: {{VALUE}};',

                ],
				'default' => '#1F0D3C',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bg_hover_color',
				'label'   => esc_html__( 'Background Hover Color', 'ogo-core' ),
                'selectors' =>[
                    '{{WRAPPER}} .amt-works-section:hover .amtworks-media .works-content '  => 'background-color: {{VALUE}};',

                ],
				'default' => '#53AFEE',
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'title_style',
				'label' => esc_html__( 'Title', 'ogo-core' ),
				'separator' => 'before',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Typography', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-works-section .amtworks-media .works-content .works-title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' =>[
                    '{{WRAPPER}} .amt-works-section .amtworks-media .works-content .works-title '  => 'color: {{VALUE}};',

                ],
				'default' => '#fff',
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'content_style',
				'label' => esc_html__( 'Content', 'ogo-core' ),
				'separator' => 'before',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Typography', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-works-section .amtworks-media .works-content .works-title-name',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
				'selectors' =>[
                    '{{WRAPPER}} .amt-works-section .amtworks-media .works-content .works-title-name '  => 'color: {{VALUE}};',

                ],
				'default' => '#fff',
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$this->amt_template( 'works-section-1', $data );
	}
}