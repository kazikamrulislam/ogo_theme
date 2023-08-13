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
use OgoTheme;
use OgoTheme_Helper;

if ( ! defined( 'ABSPATH' ) ) exit;

class Amt_Breadcrumbs extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Breadcrumbs', 'ogo-core' );
		$this->amt_base = 'amt-breadcrumbs';
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
					'style1' => esc_html__( 'amt-breadcrumbs Style 1' , 'ogo-core' ),
					'style2' => esc_html__( 'amt-breadcrumbs Style 2' , 'ogo-core' ),
					'style3' => esc_html__( 'amt-breadcrumbs Style 3' , 'ogo-core' ),
					'style4' => esc_html__( 'amt-breadcrumbs Style 4' , 'ogo-core' ),
					'style5' => esc_html__( 'amt-breadcrumbs Style 5' , 'ogo-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'display-logo',
				'label'       => esc_html__( 'Background Image Display', 'ogo-core' ),
				'label_on'    => esc_html__( 'On', 'ogo-core' ),
				'label_off'   => esc_html__( 'Off', 'ogo-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Image. Default: on', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style5' ) ),
			),
			array(
                'type'    => Controls_Manager::MEDIA,
                'id'      => 'logo-image',
                'label' => esc_html__( 'Choose Background Image', 'ogo-core' ),
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
				'condition'   => array(
					'style' => array( 'style1', 'style2', 'style3', 'style5' ),
					'display-logo' => 'yes',
				 ),
            ),
            array(
                'mode' => 'group',
                'type'    => Group_Control_Image_Size::get_type(),
                'name'      => 'logo-image',
                'default' => 'large',
                'separator' => 'none',
				'condition'   => [
					'style' => array( 'style1', 'style2', 'style3', 'style5' ), 
					'display-logo' => 'yes',
				] ,
            ),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'display-logo-2',
				'label'       => esc_html__( 'Background Image 2 Display', 'ogo-core' ),
				'label_on'    => esc_html__( 'On', 'ogo-core' ),
				'label_off'   => esc_html__( 'Off', 'ogo-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Image. Default: on', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style5' ) ),
			),
			array(
                'type'    => Controls_Manager::MEDIA,
                'id'      => 'logo-image-2',
                'label' => esc_html__( 'Choose 2nd Background', 'ogo-core' ),
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
				'condition'   => array(
					'style' => array('style5' ), 
					'display-logo-2' => 'yes',
				 ),
            ),
            array(
                'mode' => 'group',
                'type'    => Group_Control_Image_Size::get_type(),
                'name'      => 'logo-image-2',
                'default' => 'large',
                'separator' => 'none',
				'condition'   => [
					'style' => array('style5' ), 
					'display-logo-2' => 'yes',
				] ,
            ),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon',
				'label'   => esc_html__( 'Icon', 'ogo-core' ),
				'default' => [
                    'value' => 'fa fa-play',
                    'library' => 'fa-solid',
                ],
				'condition'   => array( 'style' => array( 'style2', 'style4') ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'about-title',
				'label'   => esc_html__( 'Title', 'ogo-core' ),
				'default' => 'About Us',
				'condition'   => array( 'style' => array( 'style1', 'style3', 'style4', 'style5' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'blog-title',
				'label'   => esc_html__( 'Title', 'ogo-core' ),
				'default' => 'Blog',
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'about-content',
				'label'   => esc_html__( 'Content', 'ogo-core' ),
				'default' => 'The trend’s heavy use of soft shadow makes for design that is both futuristic and realistic, and it’s bringing a new feel to familiar interfaces.',
				'condition'   => array( 'style' => array( 'style3') ),
			),
			array(
                'type'    => Controls_Manager::MEDIA,
                'id'      => 'image-left',
                'label' => esc_html__( 'Choose Left Image', 'ogo-core' ),
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
				'condition'   => array( 'style' => array( 'style1', 'style5' ) ),
            ),
			array(
                'type'    => Controls_Manager::MEDIA,
                'id'      => 'image-mid-top',
                'label' => esc_html__( 'Choose Mid-Top Image', 'ogo-core' ),
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
				'condition'   => array( 'style' => array( 'style1' ) ),

            ),
			array(
                'type'    => Controls_Manager::MEDIA,
                'id'      => 'image-mid-down',
                'label' => esc_html__( 'Choose Mid-Down Image', 'ogo-core' ),
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
				'condition'   => array( 'style' => array( 'style1' ) ),

            ),
			array(
                'type'    => Controls_Manager::MEDIA,
                'id'      => 'image-right',
                'label' => esc_html__( 'Choose Right Image', 'ogo-core' ),
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
				'condition'   => array( 'style' => array( 'style1', 'style5' ) ),
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
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'about_title_typo',
				'label'   => esc_html__( 'About Title Style', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-about-us-title h2',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
                'default' => 20,
				'condition'   => array( 'style' => array('style1', 'style2', 'style3', 'style4', 'style5') ),
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'about_title_color',
				'label'   => esc_html__( 'About Title Color', 'ogo-core' ),
                'selectors' =>[ 
                    '{{WRAPPER}} .amt-about-us-title h2' => 'color: {{VALUE}};',
                ],
				'default' => '#1F0D3C;',
				'condition'   => array( 'style' => array('style1', 'style2', 'style3', 'style4', 'style5') ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'About Us Description', 'ogo-core' ),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .amt-about-us-title p',
                'default' => 20,
				'condition'   => array( 'style' => array( 'style3') ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'About Us Description Color', 'ogo-core' ),
				'selectors' =>[ 
                    '{{WRAPPER}} .amt-about-us-title p' => 'color: {{VALUE}};',
                ],
				'default' => '#676E89',
				'condition'   => array( 'style' => array( 'style3') ),
			),
            array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'icon_style',
				'label'   => esc_html__( 'Icon Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style2', 'style4') ),
			),			
			array (
				'type'    => Controls_Manager::SLIDER,
                'id'      => 'icon-space',
				'label'   => esc_html__( 'Icon Spacing', 'ogo-core' ),
                'size_units' => array('px','%'),
				'selectors' => [
                    '{{WRAPPER}} .about-play-btn' => 'margin-top: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .amt-about-us-section-2 .amt-about-us-menu li a i' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
			),
            array (
                'id'      => 'icon-size',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__( 'Icon Size', 'ogo-core' ),
                'size_units' => array('px','%'),
				'selectors' => [
                    '{{WRAPPER}} .about-play-btn i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .amt-about-us-section-1 .amt-about-us-menu li a i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
			), 
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .about-play-btn i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .amt-about-us-section-1 .amt-about-us-menu li a i' => 'color: {{VALUE}};',
                ],
				'default' => '#53AFEE',
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'icon_padding',
				'label'   => esc_html__( 'Icon Padding', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .about-play-btn i' => 'padding: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .amt-about-us-section-1 .amt-about-us-menu li a i' => 'padding: {{SIZE}}{{UNIT}};',
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
			case 'style2':
			$template = 'amt-breadcrumbs-2';
			break;
			case 'style3':
			$template = 'amt-breadcrumbs-3';
			break;
			case 'style4':
			$template = 'amt-breadcrumbs-4';
			break;
			case 'style5':
			$template = 'amt-breadcrumbs-5';
			break;
			default:
			$template = 'amt-breadcrumbs-1';
			break;
		}
	
		return $this->amt_template( $template, $data );
	}
}