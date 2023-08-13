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

class Amt_Faq_Section extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ){
        $this->amt_name = esc_html__( 'AMT FAQ ', 'ogo-core' );
        $this->amt_base = 'amt-faq-section';
        parent::__construct( $data, $args );
    }

    public function amt_fields(){

        /*For recipe category*/
        $faq_categories = get_terms( 'ogo_faq_category', 'orderby=count&hide_empty=0' );
        $faq_category_dropdown = array( '0' => esc_html__( 'All FAQ Categories', 'ogo-core' ) );

        foreach ( $faq_categories as $faq_category ) {
            $faq_category_dropdown[$faq_category->term_id] = $faq_category->name;
        }


        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'faq-category',
            [
                'type'    => Controls_Manager::SELECT2,
                'label'   => esc_html__( 'FAQ Category', 'ranna-core' ),
                'options' => $faq_category_dropdown,
                'multiple'=> false,
                'default' => '1',
                //'condition'   => array('cat_type' => array( 'recipe_ingredeint' ) ),
            ]
        );
        $repeater->add_control(
            'faq-post-order',
            [
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'post_ordering',
                'label'   => esc_html__( 'FAQ Ordering', 'gamxo-core' ),
                'options' => array(
                    'DESC'	=> esc_html__( 'Desecending', 'gamxo-core' ),
                    'ASC'	=> esc_html__( 'Ascending', 'gamxo-core' ),
                ),
                'default' => 'DESC',
            ]
        );
        $repeater->add_control(
            'faq-post-sorting',
            [
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'post_sorting',
                'label'   => esc_html__( 'FAQ Sorting', 'gamxo-core' ),
                'options' => array(
                    'recent' 		=> esc_html__( 'Recent Post', 'gamxo-core' ),
                    'rand' 			=> esc_html__( 'Random Post', 'gamxo-core' ),
                    'menu_order' 	=> esc_html__( 'Custom Order', 'gamxo-core' ),
                    'title' 		=> esc_html__( 'By Name', 'gamxo-core' ),
                ),
                'default' => 'recent',
            ]
        );
        $repeater->add_control(
            'faq-post-not-in',
            [
                'id'      => 'post_not_in',
                'label'   => esc_html__( 'Exclude FAQ', 'gamxo-core' ),
                'type'    => Controls_Manager::TEXT,
            ]
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
                'label'   => esc_html__( 'Style', 'ogo-core' ),
                'options' => array(
                    'style1' => esc_html__( 'FAQ Layout 1', 'ogo-core' ),
                    // 'style2' => esc_html__( 'FAQ Layout 2', 'ogo-core' ),
                ),
                'default' => 'style1',
            ),
            array (
                'label' => esc_html__( 'Select FAQ Category', 'ogo-core' ),
                'id'    =>'faq-category-selected',
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'faq_email',
                'label'   => esc_html__( 'Email', 'ogo-core' ),
                'default' => 'business@ogo.com',
            ),

            array(
                'mode' => 'section_end',
            ),

            // Style Tab
            array(
                'mode'    => 'section_start',
                'tab'     => Controls_Manager::TAB_STYLE,
                'id'      => 'sec_style',
                'label'   => esc_html__( 'FAQ Style', 'ogo-core' ),
            ),
                array(
                    'type' => Controls_Manager::HEADING,
                    'id'      => 'navigation',
                    'label'   => esc_html__( 'Navigation:', 'ogo-core' ),
                    'separator' => 'after',
                ),
                array (
                    'mode'    => 'group',
                    'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
                    'type'    => Group_Control_Typography::get_type(),
                    'name'    => 'navigation_typo',
                    'label'   => esc_html__( 'Typo', 'ogo-core' ),
                    'selector' => '{{WRAPPER}} .faq_style_1 .amt_faq_nav .nav-link, {{WRAPPER}} .faq_style_1 .amt_faq_nav .nav-link.active ',
                ),
                array(
                    'type'    => Controls_Manager::COLOR,
                    'id'      => 'accordian_nav_text_active',
                    'label'   => esc_html__('Text Active', 'ogo-core'),
                    'selectors' => [
                        '{{WRAPPER}} .faq_style_1 .amt_faq_nav .nav-link.active' => 'color: {{VALUE}};',
                    ],
                    'default' => '#FFFFFF',
                ),
                array(
                    'type'    => Controls_Manager::COLOR,
                    'id'      => 'accordian_nav_bg_active',
                    'label'   => esc_html__('Background Active', 'ogo-core'),
                    'selectors' => [
                        '{{WRAPPER}} .faq_style_1 .amt_faq_nav .nav-link.active' => 'background-color: {{VALUE}};',
                    ],
                    'default' => '#53AFEE',
                ),
                array(
                    'type'    => Controls_Manager::COLOR,
                    'id'      => 'accordian_nav_text__active',
                    'label'   => esc_html__('Text Active Hover', 'ogo-core'),
                    'selectors' => [
                        '{{WRAPPER}} .faq_style_1 .amt_faq_nav .nav-link.active:hover' => 'color: {{VALUE}};',
                    ],
                    'default' => '#FFFFFF',
                ),
                array(
                    'type'    => Controls_Manager::COLOR,
                    'id'      => 'accordian_nav_text_hover',
                    'label'   => esc_html__('Text Hover', 'ogo-core'),
                    'selectors' => [
                        '{{WRAPPER}} .faq_style_1 .amt_faq_nav .nav-link:hover' => 'color: {{VALUE}};',
                    ],
                    'default' => '#000',
                ),
                array(
                    'type'    => Controls_Manager::COLOR,
                    'id'      => 'accordian_nav_bg_hover',
                    'label'   => esc_html__('Background Hover', 'ogo-core'),
                    'selectors' => [
                        '{{WRAPPER}} .faq_style_1 .amt_faq_nav .nav-link:hover' => 'background: {{VALUE}};',
                    ],
                    'default' => '#676E89',
                ),
                array(
                    'type' => Controls_Manager::HEADING,
                    'id'      => 'tab_title',
                    'label'   => esc_html__(' Accordion Title Style:', 'ogo-core' ),
                    'separator' => 'after',
                ),
                array (
                    'mode'    => 'group',
                    'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
                    'type'    => Group_Control_Typography::get_type(),
                    'name'    => 'title_typo',
                    'label'   => esc_html__( 'Typography', 'ogo-core' ),
                    'selector' => '{{WRAPPER}} .faq_style_1 button.accordion-button.collapsed, {{WRAPPER}} .faq_style_1 button.accordion-button ',
                ),
                array(
                    'type'    => Controls_Manager::COLOR,
                    'id'      => 'accordian_title_color',
                    'label'   => esc_html__('Color', 'ogo-core'),
                    'selectors' => [
                        '{{WRAPPER}} .faq_style_1 button.accordion-button.collapsed' => 'color: {{VALUE}};',
                    ],
                    'default' => '#fff',
                ),
                array(
                    'type'    => Controls_Manager::COLOR,
                    'id'      => 'accordian_title_background_color',
                    'label'   => esc_html__('Background Color', 'ogo-core'),
                    'selectors' => [
                        '{{WRAPPER}} .faq_style_1 button.accordion-button.collapsed' => 'background-color: {{VALUE}};',
                    ],
                    'default' => '#676E89',
                ),
                array(
                    'type'    => Controls_Manager::COLOR,
                    'id'      => 'accordian_title_background_hover_color',
                    'label'   => esc_html__('Hover Background Color', 'ogo-core'),
                    'selectors' => [
                        '{{WRAPPER}} .faq_style_1 button.accordion-button.collapsed:hover' => 'background-color: {{VALUE}};',
                    ],
                    'default' => '#53AFEE',
                ),
                array(
                    'type'    => Controls_Manager::COLOR,
                    'id'      => 'accordian_notcollaps_title_background_hover_color',
                    'label'   => esc_html__('Hover Background Color', 'ogo-core'),
                    'selectors' => [
                        '{{WRAPPER}} .faq_style_1 .accordion-item .accordion-button:not(.collapsed):hover' => 'background-color: {{VALUE}};',
                    ],
                    'default' => '#676E89',
                ),
                array(
                    'type' => Controls_Manager::HEADING,
                    'id'      => 'faq_content',
                    'label'   => esc_html__( 'Accordion Content:', 'ogo-core' ),
                    'separator' => 'after',
                ),
                array (
                    'mode'    => 'group',
                    'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
                    'type'    => Group_Control_Typography::get_type(),
                    'name'    => 'content_typo',
                    'label'   => esc_html__( 'Typography', 'ogo-core' ),
                    'selector' => '{{WRAPPER}} .accordion-body p ',
                ),
                array(
                    'type'    => Controls_Manager::COLOR,
                    'id'      => 'accordian_content_color',
                    'label'   => esc_html__('Color', 'ogo-core'),
                    'selectors' => [
                        '{{WRAPPER}} .accordion-body p ' => 'color: {{VALUE}};',
                    ],
                    'default' => '#676E89',
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
                $template = 'faq-style-2';
                break;
            default:
                $template = 'faq-style-1';
                break;
        }

        return $this->amt_template( $template, $data );
    }

}