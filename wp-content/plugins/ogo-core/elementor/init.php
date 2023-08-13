<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;
use Elementor\Plugin;
use OgoTheme_Helper;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Custom_Widget_Init {

	public function __construct() {
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'init' ) );
		add_action( 'elementor/elements/categories_registered', array( $this, 'widget_categoty' ) );
		add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'editor_style' ) );
		
		/*ajax actions*/
		add_filter( 'elementor/icons_manager/additional_tabs',  [$this, 'additional_tabs'], 10, 1 );
		add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'after_enqueue_styles_elementor_editor' ), 10, 1 );

		/*Elementor image scroll parallex*/
		add_action( 'elementor/element/section/section_background/before_section_end', array($this,'add_elementor_section_background_controls') );
		add_action( 'elementor/frontend/section/before_render', array($this,'render_elementor_section_parallax_background') );
	}
	
	public function after_enqueue_styles_elementor_editor()	{
		wp_enqueue_style( 'flaticon', \OgoTheme_Helper::get_font_css( 'flaticon' ) );
	}


	public function editor_style() {
		$img = plugins_url( 'icon.png', __FILE__ );
		wp_add_inline_style( 'elementor-editor', '.elementor-element .icon .rttheme-el-custom{content: url( '.$img.');width: 28px;}' );
		wp_add_inline_style( 'elementor-editor', '.select2-container--default .select2-selection--single {min-width: 126px !important; min-height: 30px !important;}' );
	}

	public function init() {
		require_once __DIR__ . '/base.php';
		
		// Widgets -- filename=>classname /@dev
		$widgets1 = array(
            'about-image-text'      	=> 'About_Image_Text',
            'amt-service-box'       	=> 'Amt_Service_Box',
			'amt-service-slider'       	=> 'Amt_Service_Slider',
            'amt-works-section'       	=> 'Amt_Works_Section',
            'amt-works-title-section' 	=> 'Amt_Works_Title_Section',
            'amt-news-quote-section'  	=> 'Amt_News_Quote_Section',
            'amt-features-section'    	=> 'Amt_Features_Section',
            'amt-single-team'       	=> 'Amt_Single_Team',
            'amt-fun-fact'       		=> 'Amt_Fun_Fact',
            'amt-section-title'         => 'Amt_Section_Title',
            'amt-button'           		=> 'Amt_Button',
            'amt-partners'          	=> 'Amt_Partners',
            'amt-feedback-section'  	=> 'Amt_Feedback_Section',
            'amt-process' 				=> 'Amt_Process',
			'amt-faq-section'   	  	=> 'Amt_Faq_Section',
			'amt-breadcrumbs'			=> 'Amt_Breadcrumbs',
			'amt-contact-section'		=> 'Amt_Contact_Section',
			'amt-pricing-section'		=> 'Amt_Pricing_Section',
			'post-grid'					=> 'Post_Grid',
			'post-list'					=> 'Post_List',
			'amt-team'					=> 'AMT_Team',
			'amt-testimonial'			=> 'AMT_Testimonial',
			'amt-portfolio'				=> 'AMT_Portfolio',
			'amt-portfolio-slider'				=> 'AMT_Portfolio_Slider',
			'amt-banner-image'				=> 'Amt_Banner_Image',
		);
		

		$widgets = array_merge( $widgets1 );
		
		foreach ( $widgets as $widget => $class ) {
			$template_name = "/elementor-custom/widgets/{$widget}.php";
			if ( file_exists( STYLESHEETPATH . $template_name ) ) {
				$file = STYLESHEETPATH . $template_name;
			}
			elseif ( file_exists( TEMPLATEPATH . $template_name ) ) {
				$file = TEMPLATEPATH . $template_name;
			}
			else {
				$file = __DIR__ . '/widgets/' . $widget. '.php';
			}

			require_once $file;
			
			$classname = __NAMESPACE__ . '\\' . $class;
			Plugin::instance()->widgets_manager->register_widget_type( new $classname );
		}
	}

	public function widget_categoty( $class ) {
		$id         = OGO_CORE_THEME_PREFIX . '-widgets'; // Category /@dev
		$properties = array(
			'title' => __( 'AddonMonster Elements', 'ogo-core' ),
		);

		Plugin::$instance->elements_manager->add_category( $id, $properties );
	}
	
	public function custom_icon_for_elementor( $controls_registry )
	{
		// Get existing icons
		$icons = $controls_registry->get_control( 'icon' )->get_settings( 'options' );
		// Append new icons		
		$flaticons = OgoTheme_Helper::get_flaticon_icons();
		// Then we set a new list of icons as the options of the icon control
		$new_icons = array_merge($flaticons, $icons);
		$controls_registry->get_control( 'icon' )->set_settings( 'options', $new_icons );
	}

	public function additional_tabs($tabs)
      {
        $json_url = OgoTheme_Helper::get_asset_file('json/flaticon.json');

        $flaticon = [
          'name'          => 'flaticon',
          'label'         => esc_html__( 'Ogo Icon', 'ogo-core' ),
          'url'           => false,
          'enqueue'       => false,
          'prefix'        => '',
          'displayPrefix' => '',
          'labelIcon'     => 'fab fa-font-awesome-alt',
          'ver'           => '1.0.0',
          'fetchJson'     => $json_url,
        ];
        array_push( $tabs, $flaticon);

        return $tabs;
      }

  function add_elementor_section_background_controls( \Elementor\Element_Section $section ) {

		$section->add_control(
			'amt_section_parallax',
			[
				'label' => __( 'Parallax', 'ogo-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_off' => __( 'Off', 'ogo-core' ),
				'label_on' => __( 'On', 'ogo-core' ),
				'default' => 'no',
				'prefix_class' => 'amt-parallax-bg-',
			]
		);

		$section->add_control(
			'amt_parallax_speed',
			[
				'label' => __( 'Speed', 'ogo-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0.1,
				'max' => 5,
				'step' => 0.1,
				'default' => 0.5,
				'condition' => [
					'amt_section_parallax' => 'yes'
				]
			]
		);

		$section->add_control(
			'amt_parallax_transition',
			[
				'label' => __( 'Parallax Transition off?', 'ogo-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_off' => __( 'on', 'ogo-core' ),
				'label_on' => __( 'Off', 'ogo-core' ),
				'default' => 'off',
				'return_value' => 'off',
				'prefix_class' => 'amt-parallax-transition-',
				'condition' => [
					'amt_section_parallax' => 'yes'
				]
			]
		);

	}

	// Render section background parallax
	function render_elementor_section_parallax_background( \Elementor\Element_Base $element ) {

		if('section' === $element->get_name()){
			if ( 'yes' === $element->get_settings_for_display( 'amt_section_parallax' ) ) {
				$amt_background = $element->get_settings_for_display( 'background_image' );
				if( ! isset($amt_background ) ) {
					return;
				}
				$amt_background_URL = $amt_background['url'];
				$data_speed = $element->get_settings_for_display( 'amt_parallax_speed' );

				$element->add_render_attribute( '_wrapper', [
					'data-speed' => $data_speed,
					'data-bg-image' => $amt_background_URL,
				] ) ;
			}
		}
	}

}

new Custom_Widget_Init();