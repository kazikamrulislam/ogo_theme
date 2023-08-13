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
use Elementor\Group_Control_Box_Shadow;
use Elementor\Utils;
use OgoTheme;
use OgoTheme_Helper;

if ( ! defined( 'ABSPATH' ) ) exit;

class Amt_Single_Team extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Single Team', 'ogo-core' );
		$this->amt_base = 'amt-single-team';
		
		parent::__construct( $data, $args );
	}
	
	public function amt_fields(){
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'text',
            array(
                'type'    => Controls_Manager::TEXT,
                'label'   => __( 'Social Platform', 'ogo-core' ),
                'default' => 'Facebook',
            )
        );
        $repeater->add_control(
            'link',
            array(
                'label' => esc_html__( 'Link', 'ogo-core' ),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'https://your-link.com', 'ogo-core' ),
            )
        );

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'name',
				'label'   => esc_html__( 'Employee Name', 'ogo-core' ),
                'default' 	  => esc_html__('Leslie T. Romero', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'designation',
				'label'   => esc_html__( 'Employee Designation', 'ogo-core' ),
                'default' 	  => esc_html__('Chif of Design Officer', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Employee Bio', 'ogo-core' ),
                'default' 	  => esc_html__('As a CDO Romero expert in UI UX design. who thinks about things in a tactile way to develop solutions that are good for people. She makes things easy for people to use.', 'ogo-core' ),
			),
            array(
                'type'    => Controls_Manager::MEDIA,
                'id'      => 'image',
                'label' => esc_html__( 'Choose Image', 'elementor' ),
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => OgoTheme_Helper::get_img( 'singl_port_image.png' ),
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
                'type'    => Controls_Manager::TEXT,
                'id'      => 'experience',
                'label'   => esc_html__( 'Experience', 'ogo-core' ),
                'default' 	  => esc_html__('10 Years', 'ogo-core' ),
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'email',
                'label'   => esc_html__( 'Email', 'ogo-core' ),
                'default' 	  => esc_html__('info@addonmonster.com', 'ogo-core' ),
            ),
            array (
                'type'    => Controls_Manager::REPEATER,
                'id'      => 'socials',
                'label'   => esc_html__( 'Add Socials Items', 'ogo-core' ),
                'fields'  => $repeater->get_controls(),
                'default' => [ 
					[ 
						'text' => 'Facebook', 
						'link' => '' 
					], 
					[ 
						'text' => 'Twitter', 
						'link' => '' 
					],
					[ 
						'text' => 'Instagram', 
						'link' => ''
					],
				]
            ),
            
			array(
				'mode' => 'section_end',
			),
            // Style Start
			array(
				'tab'     => Controls_Manager::TAB_STYLE,
				'mode'    => 'section_start',
				'id'      => 'single_team_style',
				'label'   => esc_html__( 'Amt Single Team Style', 'ogo-core' ),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'amt_team_member_thumbnail',
				'label'   => esc_html__( 'Thumbnail', 'ogo-core' ),
				'separator' => 'before',
			),
            array (
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'image_box_shadow',
				'label'   => esc_html__( 'Box Shadow', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-single-img img',
			),
            // array(
            //     'mode'    => 'responsive',
            //     'type' => Controls_Manager::DIMENSIONS,
            //     'id'      => 'component_padding',
            //     'label' => esc_html__( 'Component padding', 'ogo-core' ),
            //     'selectors' => [
            //         '{{WRAPPER}} .amt_single_team_section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            //     ],
            // ),
            array(
                'mode'    => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'image_margin',
				'label' => esc_html__( 'Margin', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-single-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
            array(
                'mode'    => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'image_border',
				'label' => esc_html__( 'Border Radius', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-single-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
            array(
                'mode'    => 'responsive',
                'type' => Controls_Manager::SLIDER,
                'label' => esc_html__( 'Space Between', 'ogo-core' ),
                'id' => 'image-spacing',
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'default' => [
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .amt-single-img' =>  'padding-right: {{SIZE}}{{UNIT}};',
				],
            ),
            array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'amt_team_member_title',
				'label'   => esc_html__( 'Title', 'ogo-core' ),
				'separator' => 'before',
			),
            array(
                'id'      => 'amt_team_member_name',
                'label'   => esc_html__( 'Color:', 'ogo-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .amt-single-pro-details .amt_team_member_name' => 'color: {{VALUE}};',
                ],
                'default' => '#1F0D3C',
            ),
            array (
				'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'amt_team_member_name_typo',
				'label'   => esc_html__( 'Style', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-single-pro-details .amt_team_member_name',
			),
            array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'amt_team_member_desig',
				'label'   => esc_html__( 'Designation', 'ogo-core' ),
				'separator' => 'before',
			),
            array(
                'id'      => 'amt_team_member_designation',
                'label'   => esc_html__( 'color', 'ogo-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .amt_team_member_designation' => 'color: {{VALUE}};',
                ],
                'default' => '#53AFEE',
            ),
            array (
				'scheme'   => Scheme_Typography::TYPOGRAPHY_4,
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'amt_team_member_designation_typo',
				'label'   => esc_html__( 'Style', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt_team_member_designation',
			),
            array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'amt_team_member_description',
				'label'   => esc_html__( 'Description', 'ogo-core' ),
				'separator' => 'before',
			),
            array(
                'id'      => 'team_member_description',
                'label'   => esc_html__( 'color', 'ogo-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .amt_team_member_description' => 'color: {{VALUE}};',
                ],
                'default' => '#676E89',
            ),
            array (
				'scheme'   => Scheme_Typography::TYPOGRAPHY_2,
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'team_member_description_typo',
				'label'   => esc_html__( 'Style', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt_team_member_description',
			),
            array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'amt_team_member_experience',
				'label'   => esc_html__( 'experience ', 'ogo-core' ),
				'separator' => 'before',
			),
            array(
                'id'      => 'experience_content_color',
                'label'   => esc_html__( 'Color', 'ogo-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .amt_team_member_experience' => 'color: {{VALUE}};',
                ],
                'default' => '#676E89',
            ),
            array (
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'experience_content_typo',
				'label'   => esc_html__( 'Style', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt_team_member_experience',
			),
            array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'amt_team_member_mail',
				'label'   => esc_html__( 'Email ', 'ogo-core' ),
				'separator' => 'before',
			),
            array(
                'id'      => 'email_content_color',
                'label'   => esc_html__( 'Color', 'ogo-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .experience .amt_team_member_email > a' => 'color: {{VALUE}};',
                ],
                'default' => '#676E89',
            ),
            array (
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'email_content_typo',
				'label'   => esc_html__( 'Style', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .experience .amt_team_member_email > a',
			),
            array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'amt_team_member_social',
				'label'   => esc_html__( 'Team Social ', 'ogo-core' ),
				'separator' => 'before',
			),
            array(
                'id'      => 'social_content_color',
                'label'   => esc_html__( 'Color', 'ogo-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .experience .amt_team_member_social >.amt-single-social > a' => 'color: {{VALUE}};',
                ],
                'default' => '#676E89',
            ),
            array (
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'social_content_typo',
				'label'   => esc_html__( 'Style', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .experience .amt_team_member_social >.amt-single-social',
			),
            array(
				'mode' => 'section_end',
			),
			
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$template = 'amt-team-single';

		return $this->amt_template( $template, $data );
	}
}