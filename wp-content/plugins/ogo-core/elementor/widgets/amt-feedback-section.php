<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Base;
use Elementor\Core\Schemes\Typography as Scheme_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
use Elementor\Group_Control_Box_Shadow;
use OgoTheme;
use OgoTheme_Helper;

if ( ! defined( 'ABSPATH' ) ) exit;

class Amt_Feedback_Section extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Feedback Section', 'ogo-core' );
		$this->amt_base = 'amt-feedback-section';
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
				'label'   => esc_html__( 'Section Style', 'ogo-core' ),
				'options' => array(
					'style1' => esc_html__( 'amt-Feedback Style 1' , 'ogo-core' ),
					'style2' => esc_html__( 'amt-Feedback Style 2', 'ogo-core' ),
				),
				'default' => 'style1',
			),
			array (
                'id'      => 'rating-icons-test',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__( 'Rating', 'ogo-core' ),
                'size_units' => ['%'],
				'range' => [
					'%' => [
						'min'=> 0,
						'max' => 5,
						'step' => 0.1,
					]
				],
				'default' => [
					'unit' => '%',
					'size' => '4.5',
				],
 				'selectors' => [
                    '{{WRAPPER}} .rating-info .fill-ratings' => 'width: calc(20*{{SIZE}}{{UNIT}});',
                ],
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
				'condition'   => array( 'style' => array( 'style1' ) ),
            ),
			array(
                'mode' => 'group',
                'type'    => Group_Control_Image_Size::get_type(),
                'name'      => 'image',
                'default' => 'large',
                'separator' => 'none',
				'condition'   => array( 'style' => array( 'style1' ) ),
            ),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'box_shadow',
				'label'   => esc_html__( 'Box Shadow', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-feedback-component-1 .amt-feedback-left .left-img',
				'condition'   => array( 'style' => array( 'style1') ),

			),

			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'abs_icon_display',
				'label'       => esc_html__( 'Absolute Icon', 'ogo-core' ),
				'label_on'    => esc_html__( 'On', 'ogo-core' ),
				'label_off'   => esc_html__( 'Off', 'ogo-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Image. Default: on', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style1') ),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'abs-icon',
				'label'   => esc_html__( 'Absolute Icon', 'ogo-core' ),
				'default' => [
                    'value' => 'fa fa-quote-left',
                    'library' => 'fa-solid',
                ],
				'condition'   => array( 
					'style' => 'style1',
					'abs_icon_display' => 'yes'
				 ),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'abs-icon2',
				'label'   => esc_html__( 'Absolute Icon', 'ogo-core' ),
				'default' => [
                    'value' => 'fa fa-quote-left',
                    'library' => 'fa-solid',
                ],
				'condition'   => array( 'style' => array('style2') ),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general_2',
				'label'   => esc_html__( 'Feedback Content', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon',
				'label'   => esc_html__( 'Top Icon', 'ogo-core' ),
				'default' => [
                    'value' => 'fa fa-quote-left',
                    'library' => 'fa-solid',
                ],
				'condition'   => array( 'style' => array( 'style1') ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'sub-title',
				'label'   => esc_html__( 'Title', 'ogo-core' ),
				'default' => 'Excellent team and would absolutely work with them again.',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'ogo-core' ),
				'default' => 'Working with Orbita, has helped us deliver creatively on multiple projects through the years. Their work has always been fantastic and we hope to work with them in the future. Words which don’t look even slightly blievable if you are going to use.',
				'condition'   => array( 'style' => array( 'style1', 'style2' ) ),
			),
			array(
				'mode' => 'section_end',
			),

			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general_3',
				'label'   => esc_html__( 'Feedback Author', 'ogo-core' ),
			),
			array(
                'type'    => Controls_Manager::MEDIA,
                'id'      => 'author-image',
                'label' => esc_html__( 'Choose Image', 'ogo-core' ),
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
				'condition'   => array( 'style' => array( 'style1' ) ),

            ),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'author-name',
				'label'   => esc_html__( 'Author Name', 'ogo-core' ),
				'default' => 'Jeff R. Boucheyr',
				'condition'   => array( 'style' => array( 'style1', 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'author-designation',
				'label'   => esc_html__( 'Author Designation', 'ogo-core' ),
				'default' => 'Product Designer',
				'condition'   => array( 'style' => array( 'style1', 'style2' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general_4',
				'label'   => esc_html__( 'Background Shape', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'image_display_1',
				'label'       => esc_html__( 'Background Image Display', 'ogo-core' ),
				'label_on'    => esc_html__( 'On', 'ogo-core' ),
				'label_off'   => esc_html__( 'Off', 'ogo-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Image. Default: on', 'ogo-core' ),
			),
			array(
                'type'    => Controls_Manager::MEDIA,
                'id'      => 'logo-image',
                'label' => esc_html__( 'Choose Background Shape', 'ogo-core' ),
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
				'condition'   => array( 
					'image_display_1' => 'yes'
				 ),
            ),
            array(
                'mode' => 'group',
                'type'    => Group_Control_Image_Size::get_type(),
                'name'      => 'logo-image',
                'default' => 'large',
                'separator' => 'none',
				'condition'   => array( 
					'image_display_1' => 'yes'
				 ),
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
				'mode'   => 'responsive',
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'border_width',
				'label'   => esc_html__( 'Border width', 'ogo-core' ),
                'selectors' =>[ 
                    '{{WRAPPER}} .amt-feedback-component-2 .amt-single-feedback-item' => 'border-width: {{SIZE}}{{UNIT}} 0 0 0;',
                ],
				'condition'   => array( 'style' => array( 'style2') ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'border_color',
				'label'   => esc_html__( 'Border Color', 'ogo-core' ),
                'selectors' =>[ 
                    '{{WRAPPER}} .amt-feedback-component-2 .amt-single-feedback-item' => 'border-color: {{VALUE}};',
                ],
				'default' => '#53AFEE',
				'condition'   => array( 'style' => array( 'style2') ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__( 'Title', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-feedback-section .amt-feedback-right .feedback-meta .feedback-subtitle h4',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
                'default' => 30,
				'condition'   => array( 'style' => array( 'style1') ),
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__( 'Title Color', 'ogo-core' ),
                'selectors' =>[ 
                    '{{WRAPPER}} .amt-feedback-section .amt-feedback-right .feedback-meta .feedback-subtitle h4' => 'color: {{VALUE}};',
                ],
				'default' => '#1F0D3C',
				'condition'   => array( 'style' => array( 'style1') ),
			),
			array(
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'sub_title_padding',
				'label' => esc_html__( 'Title Spacing', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-feedback-section .amt-feedback-right .feedback-meta .feedback-subtitle h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'   => array( 'style' => array( 'style1') ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Description', 'ogo-core' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .feedback-desc p',
                'default' => 20,
				'condition'   => array( 'style' => array( 'style1', 'style2') ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Description Color', 'ogo-core' ),
				'selectors' =>[ 
                    '{{WRAPPER}} .feedback-desc p' => 'color: {{VALUE}};',
                ],
				'default' => '#676E89',
				'condition'   => array( 'style' => array( 'style1', 'style2') ),
			),
			array(
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'Content_padding',
				'label' => esc_html__( 'Description Spacing', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .feedback-desc p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'abs_icon_style',
				'label'   => esc_html__( 'Absolute Icon Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 
					'abs_icon_display' => 'yes',
					'style' => 'style1',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'abs_icon_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .left-absolute-icon i' => 'color: {{VALUE}};',
                ],
				'default' => '#fff',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'abs_icon_bg_color',
				'label'   => esc_html__( 'Background Color', 'ogo-core' ),
				'default' => '#53AFEE',
                'selectors' => [
                    '{{WRAPPER}} .left-absolute-icon i' => 'background-color: {{VALUE}};',
                ],
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'icon_padding',
				'label'   => esc_html__( 'Padding', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .left-absolute-icon i' => 'padding: {{SIZE}}{{UNIT}};',
                ],
			),
			array (
                'id'      => 'abs-icon-size',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__( 'Size', 'ogo-core' ),
                'size_units' => array('px','%'),
				'selectors' => [
                    '{{WRAPPER}} .left-absolute-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
			),
			array(
				'mode' => 'section_end',
			),
			
			array(
				'mode'    => 'section_start',
				'id'      => 'abs_icon_style2',
				'label'   => esc_html__( 'Absolute Icon Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style2') ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'abs_icon_color2',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .top-quote i' => 'color: {{VALUE}};',
                ],
				'default' => '#fff',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => '2nd_icon_bg_color',
				'label'   => esc_html__( 'Background Color', 'ogo-core' ),
				'default' => '#53AFEE',
                'selectors' => [
                    '{{WRAPPER}} .top-quote i' => 'background-color: {{VALUE}};',
                ],
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'icon_padding2',
				'label'   => esc_html__( 'Padding', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-feedback-component-2 .top-quote i' => 'padding: {{SIZE}}{{UNIT}};',
                ],
			),
			array (
                'id'      => 'abs-icon-size2',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__( 'Size', 'ogo-core' ),
                'size_units' => array('px','%'),
				'selectors' => [
                    '{{WRAPPER}} .amt-feedback-component-2 .top-quote i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'icon_style',
				'label'   => esc_html__( 'Top Icon Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style1') ),
			),
			   
			array (
				'type'    => Controls_Manager::SLIDER,
                'id'      => 'icon-space',
				'label'   => esc_html__( 'Icon Spacing', 'ogo-core' ),
                'size_units' => array('px','%'),
				'selectors' => [
                    '{{WRAPPER}} .top-quote' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition'   => array( 'style' => array( 'style1') ),
			),
            array (
                'id'      => 'icon-size',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__( 'Icon Size', 'ogo-core' ),
                'size_units' => array('px','%'),
				'selectors' => [
                    '{{WRAPPER}} .top-quote i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition'   => array( 'style' => array( 'style1') ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .top-quote i' => 'color: {{VALUE}};',
                ],
				'default' => '#53AFEE',
				'condition'   => array( 'style' => array( 'style1') ),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'rating_icon_style',
				'label'   => esc_html__( 'Rating Icon Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
            array (
                'id'      => 'rating-icon-size',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__( 'Icon Size', 'ogo-core' ),
                'size_units' => array('px'),
				'range' => [
					'px' => [
						'min'=> 0,
						'max' => 40,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => '19',
				],
				'selectors' => [
                    '{{WRAPPER}} .star-ratings' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'rating-icon_color',
				'label'   => esc_html__( 'Icon Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .rating-info .fill-ratings' => 'color: {{VALUE}};',
                ],
				'default' => '#53AFEE',
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'author_style',
				'label'   => esc_html__( 'Author Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'author_img_spacing',
				'label'   => esc_html__( 'Space Between', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-feedback-component-1 .rating-info' => 'padding-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .amt-feedback-component-2 .rating-info' => 'padding-left: {{SIZE}}{{UNIT}};',
                ],
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'author-name',
				'label'   => esc_html__( 'Name', 'ogo-core' ),
				'selector'=> '{{WRAPPER}} .author_name h4',
				'scheme'  => Scheme_Typography::TYPOGRAPHY_3,
                'default' => 24,
				'condition'   => array( 'style' => array( 'style1', 'style2') ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'author-name_color',
				'label'   => esc_html__( 'Name Color', 'ogo-core' ),
				'selectors' =>[ 
                    '{{WRAPPER}} .author_name h4' => 'color: {{VALUE}};',
                ],
				'default' => '#1F0D3C',
				'condition'   => array( 'style' => array( 'style1', 'style2') ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'author-designation',
				'label'   => esc_html__( 'Designation', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .author-designation p',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
                'default' => 16,
				'condition'   => array( 'style' => array( 'style1', 'style2') ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'author_designation_color',
				'label'   => esc_html__( 'Designation Color', 'ogo-core' ),
				'selectors' =>[ 
                    '{{WRAPPER}} .author-designation p'  => 'color: {{VALUE}};',
                ],
				'default' => '#676E89',
				'condition'   => array( 'style' => array( 'style1', 'style2') ),

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
			$template = 'amt-feedback-section-2';
			break;
			default:
			$template = 'amt-feedback-section-1';
			break;
		}
	
		return $this->amt_template( $template, $data );
	}
}