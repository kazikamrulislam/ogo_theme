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
use Elementor\Group_Control_Box_Shadow;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class Amt_Service_Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Service Slider Box', 'ogo-core' );
		$this->amt_base = 'amt-service-slider';
		parent::__construct( $data, $args );
	}

	public function amt_fields(){
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'selected_icon_1',
			[
				'label' => esc_html__( 'Icon', 'ogo-core' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fa fa-university',
                    'library' => 'fa-solid',
				],
				'fa4compatibility' => 'icon',
			]
		);
        $repeater->add_control(
            'text_1',
			[
				'label' => esc_html__( 'Text', 'ogo-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'UX Strategy', 'ogo-core' ),
				'default' => esc_html__( 'UX Strategy', 'ogo-core' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $repeater->add_control(
            'content_1',
			[
				'label' => esc_html__( 'Content', 'ogo-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__( 'Sharing Marketing Agency Website Landing Page UI Design. This design is suitable for marketing agency', 'ogo-core' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $repeater->add_control(
            'bg_image_display',
			[
				'type' => Controls_Manager::SWITCHER,
				'label'       => esc_html__( 'Background Image Display', 'ogo-core' ),
				'label_on'    => esc_html__( 'On', 'ogo-core' ),
				'label_off'   => esc_html__( 'Off', 'ogo-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Image. Default: on', 'ogo-core' ),
			]
		);
        $repeater2 = new \Elementor\Repeater();
        $repeater2->add_control(
			'selected_icon_2',
			[
				'label' => esc_html__( 'Icon', 'ogo-core' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fa fa-university',
                    'library' => 'fa-solid',
				],
				'fa4compatibility' => 'icon',
			]
		);
        $repeater2->add_control(
            'text_2',
			[
				'label' => esc_html__( 'Text', 'ogo-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'UX Strategy', 'ogo-core' ),
				'default' => esc_html__( 'UX Strategy', 'ogo-core' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $repeater2->add_control(
            'content_2',
			[
				'label' => esc_html__( 'Content', 'ogo-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__( 'Sharing Marketing Agency Website Landing Page UI Design. This design is suitable for marketing agency', 'ogo-core' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $repeater3 = new \Elementor\Repeater();
        $repeater3->add_control(
			'selected_image_3',
			[
				'label' => esc_html__( 'Image', 'ogo-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
                ),
			]
		);
        $repeater3->add_control(
            'text_3',
			[
				'label' => esc_html__( 'Text', 'ogo-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'UX Strategy', 'ogo-core' ),
				'default' => esc_html__( 'UX Strategy', 'ogo-core' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $repeater3->add_control(
            'content_3',
			[
				'label' => esc_html__( 'Content', 'ogo-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__( 'Sharing Marketing Agency Website Landing Page UI Design. This design is suitable for marketing agency', 'ogo-core' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $repeater4 = new \Elementor\Repeater();
        $repeater4->add_control(
            'selected_icon_4',
			[
				'label' => esc_html__( 'Icon', 'ogo-core' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fa fa-university',
                    'library' => 'fa-solid',
				],
				'fa4compatibility' => 'icon',
			]
		);
        $repeater4->add_control(
            'button_display',
            array(
                'type'    => Controls_Manager::SWITCHER,
                'label'       => esc_html__( 'Button Display', 'ogo-core' ),
                'label_on'    => esc_html__( 'On', 'ogo-core' ),
                'label_off'   => esc_html__( 'Off', 'ogo-core' ),
                'default'     => 'yes',
                'description' => esc_html__( 'Show or Hide Content. Default: on', 'ogo-core' ),
            )
        );
        $repeater4->add_control(
            'btn_text',
            array(
                'type'    => Controls_Manager::TEXT,
                'label'   => __( 'Button', 'ogo-core' ),
                'default' => 'More Details',
            )
        );
        $repeater4->add_control(
            'btn_link',
            array(
                'label' => esc_html__( 'Link', 'ogo-core' ),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'https://your-link.com', 'ogo-core' ),
            )
        );
        $repeater4->add_control(
            'text_4',
			[
				'label' => esc_html__( 'Text', 'ogo-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'UX Strategy', 'ogo-core' ),
				'default' => esc_html__( 'UX Strategy', 'ogo-core' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $repeater4->add_control(
            'content_4',
			[
				'label' => esc_html__( 'Content', 'ogo-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__( 'Sharing Marketing Agency Website Landing Page UI Design. This design is suitable for marketing agency', 'ogo-core' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $repeater5 = new \Elementor\Repeater();
        $repeater5->add_control(
            'text_5',
			[
				'label' => esc_html__( 'Text', 'ogo-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'UX Strategy', 'ogo-core' ),
				'default' => esc_html__( 'UX Strategy', 'ogo-core' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $repeater5->add_control(
            'content_5',
			[
				'label' => esc_html__( 'Content', 'ogo-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__( 'Sharing Marketing Agency Website Landing Page UI Design. This design is suitable for marketing agency', 'ogo-core' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $repeater5->add_control(
            'button_display_5',
            array(
                'type'    => Controls_Manager::SWITCHER,
                'label'       => esc_html__( 'Button Display', 'ogo-core' ),
                'label_on'    => esc_html__( 'On', 'ogo-core' ),
                'label_off'   => esc_html__( 'Off', 'ogo-core' ),
                'default'     => 'yes',
                'description' => esc_html__( 'Show or Hide Content. Default: on', 'ogo-core' ),
            )
        );
        $repeater5->add_control(
            'btn_text_5',
            array(
                'type'    => Controls_Manager::TEXT,
                'label'   => __( 'Button', 'ogo-core' ),
                'default' => 'More Details',
            )
        );
        $repeater5->add_control(
            'btn_link_5',
            array(
                'label' => esc_html__( 'Link', 'ogo-core' ),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'https://your-link.com', 'ogo-core' ),
            )
        );
        $repeater6 = new \Elementor\Repeater();
        $repeater6->add_control(
            'selected_image_6',
            [
                'label' => esc_html__( 'Image', 'ogo-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
            ]
        );
        $repeater6->add_control(
            'selected_icon_6',
			[
				'label' => esc_html__( 'Icon', 'ogo-core' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fa fa-university',
                    'library' => 'fa-solid',
				],
				'fa4compatibility' => 'icon',
			]
		);
        $repeater6->add_control(
            'button_display_6',
            array(
                'type'    => Controls_Manager::SWITCHER,
                'label'       => esc_html__( 'Button Display', 'ogo-core' ),
                'label_on'    => esc_html__( 'On', 'ogo-core' ),
                'label_off'   => esc_html__( 'Off', 'ogo-core' ),
                'default'     => 'yes',
                'description' => esc_html__( 'Show or Hide Content. Default: on', 'ogo-core' ),
            )
        );
        $repeater6->add_control(
            'btn_text_6',
            array(
                'type'    => Controls_Manager::TEXT,
                'label'   => __( 'Button', 'ogo-core' ),
                'default' => 'More Details',
            )
        );
        $repeater6->add_control(
            'btn_link_6',
            array(
                'label' => esc_html__( 'Link', 'ogo-core' ),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'https://your-link.com', 'ogo-core' ),
            )
        );
        $repeater6->add_control(
            'text_6',
			[
				'label' => esc_html__( 'Text', 'ogo-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'UX Strategy', 'ogo-core' ),
				'default' => esc_html__( 'UX Strategy', 'ogo-core' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $repeater6->add_control(
            'content_6',
			[
				'label' => esc_html__( 'Content', 'ogo-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__( 'Sharing Marketing Agency Website Landing Page UI Design. This design is suitable for marketing agency', 'ogo-core' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $repeater7 = new \Elementor\Repeater();
        $repeater7->add_control(
			'selected_image_7',
			[
				'label' => esc_html__( 'Image', 'ogo-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
                ),
			]
		);
        $repeater7->add_control(
            'text_7',
			[
				'label' => esc_html__( 'Text', 'ogo-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'UX Strategy', 'ogo-core' ),
				'default' => esc_html__( 'UX Strategy', 'ogo-core' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $repeater7->add_control(
            'title_link_7',
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Service Style', 'ogo-core' ),
				'options' => array(
					'style1' => esc_html__( 'Service Style 1', 'ogo-core' ),
					'style2' => esc_html__( 'Service Style 2', 'ogo-core' ),
                    'style3' => esc_html__( 'Service Style 3', 'ogo-core' ),
                    'style4' => esc_html__( 'Service Style 4', 'ogo-core' ),
                    'style5' => esc_html__( 'Service Style 5', 'ogo-core' ),
                    'style6' => esc_html__( 'Service Style 6', 'ogo-core' ),
                    'style7' => esc_html__( 'Service Style 7', 'ogo-core' ),
				),
				'default' => 'style1',
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
                    'justify' => [
						'title' => esc_html__( 'Justify', 'ogo-core' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
                'selectors' => [
					'{{WRAPPER}} .amt-service1-box, {{WRAPPER}} .amt-service2-box, {{WRAPPER}} .amt-service3-box, {{WRAPPER}} .amt-service4-box .amt-service-box-content,   {{WRAPPER}} .amt-service5-box ' => 'text-align: {{VALUE}};',
				],
                'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style5' ) ),
				'default' => 'left',
			),
            array (
                'label' => esc_html__( 'Service Item', 'ogo-core' ),
                'id'    =>'service_list',
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'text' => esc_html__( 'UX Strategy', 'ogo-core' ),
                        'content' => esc_html__( 'Sharing Marketing Agency Website Landing Page UI Design. This design is suitable for marketing agency', 'ogo-core' ),
						'selected_icon' => [
							'value' => 'fa fa-university',
                            'library' => 'fa-solid',
						],
					],
				],
				'title_field' => '{{{ text_1 }}}',
                'condition'   => array( 'style' => array( 'style1') ),

            ),
            array (
                'label' => esc_html__( 'Service Item', 'ogo-core' ),
                'id'    =>'service_list_2',
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
				'default' => [
					[
						'text_2' => esc_html__( 'UX Strategy', 'ogo-core' ),
                        'content_2' => esc_html__( 'Sharing Marketing Agency Website Landing Page UI Design. This design is suitable for marketing agency', 'ogo-core' ),
						'selected_icon_2' => [
							'value' => 'fa fa-university',
                            'library' => 'fa-solid',
						],
					],
				],
				'title_field' => '{{{ text_2 }}}',
                'condition'   => array( 'style' => array( 'style2') ),
            ),
            array (
                'label' => esc_html__( 'Service Item', 'ogo-core' ),
                'id'    =>'service_list_3',
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater3->get_controls(),
				'default' => [
					[
						'text_3' => esc_html__( 'UX Strategy', 'ogo-core' ),
                        'content_3' => esc_html__( 'Sharing Marketing Agency Website Landing Page UI Design. This design is suitable for marketing agency', 'ogo-core' ),
						'selected_image_3' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					],
				],
				'title_field' => '{{{ text_3 }}}',
                'condition'   => array( 'style' => array( 'style3') ),
            ),
            array (
                'label' => esc_html__( 'Service Item', 'ogo-core' ),
                'id'    =>'service_list_4',
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater4->get_controls(),
				'default' => [
					[
						'text_4' => esc_html__( 'UX Strategy', 'ogo-core' ),
                        'content_4' => esc_html__( 'Sharing Marketing Agency Website Landing Page UI Design. This design is suitable for marketing agency', 'ogo-core' ),
						'selected_icon_4' => [
							'value' => 'fa fa-university',
                            'library' => 'fa-solid',
						],
					],
				],
				'title_field' => '{{{ text_4 }}}',
                'condition'   => array( 'style' => array( 'style4') ),
            ),
            array (
                'label' => esc_html__( 'Service Item', 'ogo-core' ),
                'id'    =>'service_list_5',
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater5->get_controls(),
				'default' => [
					[
						'text_5' => esc_html__( 'UX Strategy', 'ogo-core' ),
                        'content_5' => esc_html__( 'Sharing Marketing Agency Website Landing Page UI Design. This design is suitable for marketing agency', 'ogo-core' ),
						'default' => [
							[ 
                                'btn_text' => 'More Details', 
                                'btn_link' => '' 
                            ], 
						],
					],
				],
				'title_field' => '{{{ text_5 }}}',
                'condition'   => array( 'style' => array( 'style5') ),
            ),
            array (
                'label' => esc_html__( 'Service Item', 'ogo-core' ),
                'id'    =>'service_list_6',
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater6->get_controls(),
				'default' => [
					[
						'text_6' => esc_html__( 'UX Strategy', 'ogo-core' ),
                        'content_6' => esc_html__( 'Sharing Marketing Agency Website Landing Page UI Design. This design is suitable for marketing agency', 'ogo-core' ),
						'default' => [
							[ 
                                'btn_text' => 'More Details', 
                                'btn_link' => '' 
                            ], 
						],
					],
				],
				'title_field' => '{{{ text_6 }}}',
                'condition'   => array( 'style' => array( 'style6') ),
            ),
            array (
                'label' => esc_html__( 'Service Item', 'ogo-core' ),
                'id'    =>'service_list_7',
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater7->get_controls(),
				'default' => [
					[
						'text_7' => esc_html__( 'UX Strategy', 'ogo-core' ),

					],
				],
				'title_field' => '{{{ text_7}}}',
                'condition'   => array( 'style' => array( 'style7') ),
            ),
            array(
				'label' => esc_html__( 'Navigation', 'ogo-core' ),
				'id'	=> 'service-navigation',
				'type' => Controls_Manager::SELECT,
				'default' => 'services_both',
				'options' => [
					'services_both' => esc_html__( 'Arrows and Dots', 'ogo-core' ),
					'services_arrows' => esc_html__( 'Arrows', 'ogo-core' ),
					'services_dots' => esc_html__( 'Dots', 'ogo-core' ),
					'none' => esc_html__( 'None', 'ogo-core' ),
				],
				'frontend_available' => true,
			),
            array(
                'type'    => Controls_Manager::CHOOSE,
                'id'      => 'btn_align',
                'label'   => esc_html__( 'Button Align', 'ogo-core' ),
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
                    '{{WRAPPER}} .amt-service5-box .amt-service-btn' => 'text-align: {{VALUE}};',
                ],
                'condition'   => array( 'style' => 'style5' ),
                'default' => 'right',
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
				'default' => '3',
				'tablet_default' => '2',
				'mobile_default' => '1',
                'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style5', 'style7' ) ),
			),
            array(
				'mode'    => 'responsive',
				'label' => esc_html__( 'Slide PerView', 'ogo-core' ),
				'id'	=> 'slide_perview_6',
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
                'condition'   => array( 'style' => array( 'style6' ) ),
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
			// Style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Style', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				
			),
			array(
                'type' => Controls_Manager::SLIDER,
                'id'      => 'box_border5',
				'label' => esc_html__( 'Border', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-service5-box' => 'border-width: {{SIZE}}{{UNIT}} 0;',
				],
				'condition'   => array( 'style' => array( 'style5' ) ),
			),
			array(
                'type' => Controls_Manager::SLIDER,
                'id'      => 'box_border4',
				'label' => esc_html__( 'Hover Border', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-service4-box:hover ' => 'border-width: 0 0 {{SIZE}}{{UNIT}} 0 ;',
				],
				'condition'   => array( 'style' => array( 'style4' ) ),
			),
			array(
                'type' => Controls_Manager::COLOR,
                'id'      => 'border_color4',
				'label' => esc_html__( 'Hover Border Color', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-service4-box:hover ' => 'border-color: {{VALUE}};',
				],
				'condition'   => array( 'style' => array( 'style4') ),
			),
			array(
                'type' => Controls_Manager::SLIDER,
                'id'      => 'box_border7',
				'label' => esc_html__( 'Border', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-catagory-button' => 'border-width: 0 0 {{SIZE}}{{UNIT}} 0 ;',
				],
				'condition'   => array( 'style' => array( 'style7' ) ),
			),
			array(
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'box_border',
				'label' => esc_html__( 'Border', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-service2-box-border' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
            array(
                'type' => Controls_Manager::COLOR,
                'id'      => 'border_color',
				'label' => esc_html__( 'Border Color', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-service-box, .amt-service2-box-border, .amt-service5-box, .amt-catagory-button ' => 'border-color: {{VALUE}};',
				],
				'condition'   => array( 'style' => array( 'style2','style5', 'style7' ) ),
			),
			array(
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'border_radius',
				'label' => esc_html__( 'Border Radius', 'ogo-core' ),
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .amt-service-box, .amt-catagory-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style5', 'style7' ) ),
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'box_padding',
				'label' => esc_html__( 'Padding', 'ogo-core' ),
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .amt-service-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style5' ) ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'box_shadow',
				'label'   => esc_html__( 'Hover Box Shadow', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-service-box-shadow:hover ',
				'condition'   => array( 'style' => array( 'style1', 'style2' ) ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'box_shadow4',
				'label'   => esc_html__( ' Box Shadow', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-service-box-shadow ',
				'condition'   => array( 'style' => array( 'style4' ) ),
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bg_color',
				'label'   => esc_html__( 'Background Color', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style5', 'style7' ) ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service5-box, .amt-catagory-button' => 'background-color: {{VALUE}};',
                ],
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bg_hover_color',
				'label'   => esc_html__( 'Background Hover Color', 'ogo-core' ),
				'condition'   => array( 'style' => array( 'style5', 'style7' ) ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service5-box:hover, .amt-catagory-button:hover' => 'background-color: {{VALUE}};',
                ],
			),
			array(
				'mode'    => 'responsive',
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'image_space',
				'label'   => esc_html__( 'Spacing', 'ogo-core' ),
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .amt-service6-box .amtservice-media-img' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
				'condition'   => array( 'style' => array( 'style6' ) ),
			),
			array(
				'mode'    => 'responsive',
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'image_width',
				'label'   => esc_html__( 'Width(%)', 'ogo-core' ),
				'default' => [
					'size' => 100,
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 5,
						'max' => 100,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .amt-service6-box .amtservice-media-img' => 'width: {{SIZE}}{{UNIT}};',
                ],
				'condition'   => array( 'style' => array( 'style6' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'style_icon',
				'label'   => esc_html__( 'Icon', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4', 'style6' ) ),
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'tabs_start_icon',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_icon_normal',
				'label'   => esc_html__( 'Normal', 'ogo-core' ),
			),
			array (
				'mode'    => 'responsive',
				'type'    => Controls_Manager::SLIDER,
                'id'      => 'icon_space',
				'label'   => esc_html__( 'Icon Spacing', 'ogo-core' ),
                'size_units' => array('px','%'),
				'selectors' => [
                    '{{WRAPPER}} .amt-service-box .amtservice-media-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
			),
            array (
				'mode'    => 'responsive',
                'id'      => 'icon_size',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__( 'Icon Size', 'ogo-core' ),
                'size_units' => array('px','%'),
				'selectors' => [
                    '{{WRAPPER}} .amt-service-box .amtservice-media-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service-box .amtservice-media-icon i' => 'color: {{VALUE}};',
                ],
				'default' => '#fff',
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_bg_color',
				'label'   => esc_html__( 'Icon Background Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amtservice-media-icon i' => 'background-color: {{VALUE}};',
                ],
			),
            array(
				'mode'    => 'responsive',
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'icon_padding',
				'label'   => esc_html__( 'Icon Padding', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amtservice-media-icon i' => 'padding: {{SIZE}}{{UNIT}};',
                ],
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_icon_hover',
				'label'   => esc_html__( 'Hover', 'ogo-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_hover_color',
				'label'   => esc_html__( 'Icon Hover Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service4-box:hover .amt-service-icon-btn .amtservice-media-icon i' => 'color: {{VALUE}};',
                ],
				'default' => '#fff',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_hover_bg_color',
				'label'   => esc_html__( 'Background Hover Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service4-box:hover .amt-service-icon-btn .amtservice-media-icon i' => 'background-color: {{VALUE}};',
                ],
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
			array(
				'mode'    => 'section_start',
				'id'      => 'title_style',
				'label'   => esc_html__( 'Title', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Typography', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-service-box .amt-service-box-content .amt-service-title',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service-box .amt-service-box-content .amt-service-title ' => 'color: {{VALUE}};',
                ],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_hover_color',
				'label'   => esc_html__( 'Title Hover Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service4-box:hover .amt-service-box-content .amt-service-title, {{WRAPPER}} .amt-service3-box:hover .amt-service-box-content .amt-service-title, {{WRAPPER}} .amt-service5-box:hover .amt-service-box-content .amt-service-title, {{WRAPPER}} .amt-catagory-button:hover .amt-service-title' => 'color: {{VALUE}};',
                ],
				'condition'   => array( 'style' => array( 'style3', 'style4', 'style5', 'style7' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'style_content',
				'label'   => esc_html__( 'Content', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style1','style2','style3','style4','style5', 'style6' ) ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Typography', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-service-box .amt-service-box-content .amt-service-content',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service-box .amt-service-box-content .amt-service-content' => 'color: {{VALUE}};',
                ],
                'condition'   => array( 'style' => array( 'style1','style2','style3','style4','style5', 'style6' ) ),

			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_hover_color',
				'label'   => esc_html__( 'Content Hover Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service5-box:hover .amt-service-box-content .amt-service-content ' => 'color: {{VALUE}};',
                ],
				'condition'   => array( 'style' => 'style5' ),
			),
			array (
				'mode'    => 'responsive',
				'type'    => Controls_Manager::DIMENSIONS,
                'id'      => 'content_space',
				'label'   => esc_html__( 'Content Spacing', 'ogo-core' ),
                'size_units' => array('px','%'),
				'selectors' => [
                    '{{WRAPPER}} .amt-service-content' => 'margin: {{TOP}}{{UNIT}} auto {{BOTTOM}}{{UNIT}} auto ;',
                ],
				'allowed_dimensions' => 'vertical',
				'placeholder' => [
					'top' => '',
					'left' => 'auto',
					'bottom' => '',
					'right' => 'auto',
				],
				'condition'   => array( 'style' => array( 'style1','style2','style3','style4','style5', 'style6' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'style_button',
				'label'   => esc_html__( 'Button', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style4','style5', 'style6' ) ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'name'    => 'button_typo',
				'label'   => esc_html__( 'Typography', 'ogo-core' ),
				'selector' => '{{WRAPPER}} .amt-service-box  .amt-service-btn a',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text_color',
				'label'   => esc_html__( 'Text Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service-box  .amt-service-btn a ' => 'color: {{VALUE}};',
                ],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text_hover_color',
				'label'   => esc_html__( 'Text Hover Color', 'ogo-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-service-box:hover  .amt-service-btn a ' => 'color: {{VALUE}};',
                ],
			),
			array (
				'mode'    => 'responsive',
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_space',
				'label'   => esc_html__( 'Button Spacing', 'ogo-core' ),
				'size_units' => array('px','%'),
				'allowed_dimensions' => 'vertical',
				'placeholder' => [
							'top' => '',
							'left' => 'auto',
							'bottom' => '',
							'right' => 'auto',
				],
				'selectors' => [
					'{{WRAPPER}} .amt-service-btn' => 'margin: {{TOP}}{{UNIT}} auto {{BOTTOM}}{{UNIT}} auto ;',
				],
				'condition'   => array( 'style' => array( 'style5', 'style6' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'divider_style',
				'label'   => esc_html__( 'Divider & Slider Icons', 'ogo-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style1','style2','style3', 'style6' ) ),
			),
			array(
                'type' => Controls_Manager::HEADING,
                'id'      => 'divider_style-heading',
                'label' => esc_html__('Divider', 'ogo-core'),
                'separator' => 'before',
            ),
            array(
                'type' => Controls_Manager::SLIDER,
                'id'      => 'box_divider',
				'label' => esc_html__( 'Height', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-service-box-border, .amt-catagory-button' => 'border-width: 0 0 {{SIZE}}{{UNIT}} 0;',
				],
				'condition'   => array( 'style' => array( 'style1','style2','style3', 'style6' ) ),
			),
			array(
                'type' => Controls_Manager::COLOR,
                'id'      => 'divider_color',
				'label' => esc_html__( 'Color', 'ogo-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-service-box-border' => 'border-color: {{VALUE}};',
				],
				'condition'   => array( 'style' => array( 'style1','style2','style3', 'style6' ) ),
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
                    '{{WRAPPER}} .swiper-button-next.service_btn_next, .service_btn_next:after, .swiper-button-prev.service_btn_prev, .service_btn_prev:after' => 'color: {{VALUE}};',
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

        $template = 'service-box-slider';
		return $this->amt_template( $template, $data );
	}
}