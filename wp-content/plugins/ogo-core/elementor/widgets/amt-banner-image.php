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
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
use OgoTheme;
use OgoTheme_Helper;

if (!defined('ABSPATH')) exit;

class Amt_Banner_Image extends Custom_Widget_Base
{

	public function __construct($data = [], $args = null)
	{
		$this->amt_name = esc_html__('AMT Banner Image', 'ogo-core');
		$this->amt_base = 'amt-banner-image';
		parent::__construct($data, $args);
	}

	public function amt_fields()
	{
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__('General', 'ogo-core'),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'bg-shape',
				'label'       => esc_html__('Background Shape', 'ogo-core'),
				'label_on'    => esc_html__('On', 'ogo-core'),
				'label_off'   => esc_html__('Off', 'ogo-core'),
				'default'     => 'yes',
				'description' => esc_html__('Show or Hide Image. Default: on', 'ogo-core'),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'prize-icon-display',
				'label'       => esc_html__('Award Icon Display', 'ogo-core'),
				'label_on'    => esc_html__('On', 'ogo-core'),
				'label_off'   => esc_html__('Off', 'ogo-core'),
				'default'     => 'yes',
				'description' => esc_html__('Show or Hide Image. Default: on', 'ogo-core'),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image',
				'label' => esc_html__('Choose Banner Image', 'ogo-core'),
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
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'box_shadow',
				'label'   => esc_html__('Box Shadow', 'ogo-core'),
				'selector' => '{{WRAPPER}} .relative-banner-img img',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title',
				'label'   => esc_html__('Title', 'ogo-core'),
				'default' => '30',
			),
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'sub-title',
				'label'   => esc_html__('Content', 'ogo-core'),
				'default' => 'Award Winning',
			),
			array(
                'mode' => 'section_end',
            ),
			array(
				'mode'    => 'section_start',
				'id'      => 'small-images',
				'label'   => esc_html__('Small Images', 'ogo-core'),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image1',
				'label' => esc_html__('Image1', 'ogo-core'),
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image2',
				'label' => esc_html__('Image2', 'ogo-core'),
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image3',
				'label' => esc_html__('Image3', 'ogo-core'),
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title2',
				'label'   => esc_html__('Number', 'ogo-core'),
				'default' => '12',
			),
			array(
                'mode' => 'section_end',
            ),

			// Style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__('Style', 'ogo-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'banner_title_style',
				'label' => esc_html__( 'Title', 'ogo-core' ),
				'separator' => 'before',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__( 'Typo', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .banner-img-holder .awards-meta h2',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
                'default' => 30,
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' =>[ 
                    '{{WRAPPER}} .banner-img-holder .awards-meta h2' => 'color: {{VALUE}};',
                ],
				'default' => '#1F0D3C',
			),
			array(
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'sub_title_padding',
				'label' => esc_html__( 'Spacing', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .banner-img-holder .awards-meta h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'banner_content_style',
				'label' => esc_html__( 'Content', 'ogo-core' ),
				'separator' => 'before',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Typo', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .banner-img-holder .awards-meta p',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
                'default' => 30,
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Color', 'ogo-core' ),
                'selectors' =>[ 
                    '{{WRAPPER}} .banner-img-holder .awards-meta p' => 'color: {{VALUE}};',
                ],
				'default' => '#1F0D3C',
			),
			array(
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'content_padding',
				'label' => esc_html__( 'Spacing', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .banner-img-holder .awards-meta p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        $template = 'amt-banner-image';
		return $this->amt_template( $template, $data );
	}
}
