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

class Amt_Works_Title_Section extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Works Title Section', 'ogo-core' );
		$this->amt_base = 'amt-works-title-section';
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
					'style1' => esc_html__( 'Works Title Style 1' , 'ogo-core' ),
					'style2' => esc_html__( 'Works Title Style 2', 'ogo-core' ),
                    'style3' => esc_html__( 'Works Title Style 3' , 'ogo-core' ),
				),
				'default' => 'style1',
			),
            array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'ogo-core' ),
				'default' => 'Project we have completed earlier ',
			),
            array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'sub-title',
				'label'   => esc_html__( 'Sub Title', 'ogo-core' ),
				'default' => 'Process',
			),
            array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'ogo-core' ),
				'default' => 'Businesss generally promote their brand, products and services by identifying audiencey.',
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
                'condition'   => array( 'style' => array( 'style2' ) ),
            ),
            array(
                'mode' => 'group',
                'type'    => Group_Control_Image_Size::get_type(),
                'name'      => 'image',
                'default' => 'large',
                'separator' => 'none',
                'condition'   => array( 'style' => array( 'style2' ) ),
            ),
            array(
				'type'    => Controls_Manager::CHOOSE,
				'id'      => 'align_items',
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
					'{{WRAPPER}} .works-title-section-image ' => 'text-align: {{VALUE}};',
				],
                'condition'   => array( 'style' => array('style2' ) ),
				'default' => 'center',
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
					'{{WRAPPER}} .works-title-section ' => 'text-align: {{VALUE}};',
				],
                'condition'   => array( 'style' => array('style3' ) ),
				'default' => 'center',
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_item',
				'label'   => esc_html__( 'Project List', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'project_sec_title',
				'label' => esc_html__( 'Project', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'project_number',
				'label'   => esc_html__( 'Number', 'ogo-core' ),
				'default' => '120+',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'project_title',
				'label'   => esc_html__( 'Title', 'ogo-core' ),
				'default' => 'Completed Works',
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'hours_sec_title',
				'label' => esc_html__( 'Hours', 'ogo-core' ),
				'separator' => 'before',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'hours_number',
				'label'   => esc_html__( 'Number', 'ogo-core' ),
				'default' => '1,100+',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'hours_title',
				'label'   => esc_html__( 'Title', 'ogo-core' ),
				'default' => 'Working Hours',
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'customer_sec_title',
				'label' => esc_html__( 'Customer', 'ogo-core' ),
				'separator' => 'before',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'customer_number',
				'label'   => esc_html__( 'Number', 'ogo-core' ),
				'default' => '115+',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'customer_title',
				'label'   => esc_html__( 'Title', 'ogo-core' ),
				'default' => 'Happy Customers',
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
				'type' => Controls_Manager::HEADING,
				'id'      => 'sub_title_style',
				'label' => esc_html__( 'Sub Title', 'ogo-core' ),
				'separator' => 'before',
			),
            array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__( 'Typography', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .works-title-section .works-title-section-subtitle h4',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' =>[ 
                    '{{WRAPPER}} .works-title-section .works-title-section-subtitle h4'  => 'color: {{VALUE}};',
                ],
				'default' => '#53AFEE',
			),
            array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Content Style', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .works-title-section .works-title-section-content p',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
                'condition'   => array( 'style' => array( 'style2','style3' ) ),
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .works-title-section .works-title-section-content p' => 'color: {{VALUE}};',
                ],
                'condition'   => array( 'style' => array( 'style2','style3' ) ),
				'default' => '#676E89',

			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'divider_style',
				'label' => esc_html__( 'Divider', 'ogo-core' ),
				'separator' => 'before',
			),
			array(
				'mode'    => 'responsive',
                'type' => Controls_Manager::SLIDER,
                'id'      => 'divider_width',
				'label' => esc_html__( 'Height', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .works-title-section-subtitle h4' => 'border-width: 0 0 {{SIZE}}{{UNIT}} 0;',
				],
			),
			array(
                'type' => Controls_Manager::COLOR,
                'id'      => 'divider_color',
				'label' => esc_html__( 'Color', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .works-title-section-subtitle h4' => 'border-color: {{VALUE}};',
				],
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
				'selector' => '{{WRAPPER}} .works-title-section .works-title-section-title h2',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' =>[
                    '{{WRAPPER}} .works-title-section .works-title-section-title h2'  => 'color: {{VALUE}};',

                ],
				'default' => '#1F0D3C',
			),

            array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'project_list_style',
				'label'   => esc_html__( 'Project Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'project_style',
				'label' => esc_html__( 'Project', 'ogo-core' ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'project_num_typo',
				'label'   => esc_html__( 'Number', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .works-title-section .project-number',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'project_num_color',
				'label'   => esc_html__( 'Number Color', 'ogo-core' ),
                'selectors' =>[
                    '{{WRAPPER}} .works-title-section .project-number'  => 'color: {{VALUE}};',

                ],
				'default' => '#1F0D3C',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'project_title_typo',
				'label'   => esc_html__( 'Title', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .works-title-section .project-title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'project_title_color',
				'label'   => esc_html__( 'Title Color', 'ogo-core' ),
                'selectors' =>[
                    '{{WRAPPER}} .works-title-section .project-title'  => 'color: {{VALUE}};',

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

		switch ( $data['style'] ) {
            case 'style3':
            $template = 'works-title-section-3';
            break;
			case 'style2':
			$template = 'works-title-section-2';
			break;
			default:
			$template = 'works-title-section-1';
			break;
		}
	
		return $this->amt_template( $template, $data );
	}
}