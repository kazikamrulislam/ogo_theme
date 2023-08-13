<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

use Elementor\Plugin; 


function ogo_get_maybe_rtl( $filename ){
	$file = get_template_directory_uri() . '/assets/';
	if ( is_rtl() ) {
		return $file . 'rtl-css/' . $filename;
	}
	else {
		return $file . 'css/' . $filename;
	}
}
add_action( 'wp_enqueue_scripts','ogo_enqueue_high_priority_scripts', 1500 );
function ogo_enqueue_high_priority_scripts() {
	if ( is_rtl() ) {
		wp_enqueue_style( 'rtlcss', OGO_CSS_URL . 'rtl.css', array(), OGO_VERSION );
	}
}
//elementor animation dequeue
add_action('elementor/frontend/after_enqueue_scripts', function(){
    wp_deregister_style( 'e-animations' );
    wp_dequeue_style( 'e-animations' );
});

add_action( 'wp_enqueue_scripts', 'ogo_register_scripts', 12 );
if ( !function_exists( 'ogo_register_scripts' ) ) {
	function ogo_register_scripts(){
		wp_deregister_style( 'font-awesome' );
        wp_deregister_style( 'layerslider-font-awesome' );
        wp_deregister_style( 'yith-wcwl-font-awesome' );

		/*CSS*/
		// animate CSS	
		wp_register_style( 'magnific-popup',     ogo_get_maybe_rtl('magnific-popup.css'), array(), OGO_VERSION );		
		wp_register_style( 'animate',        	 ogo_get_maybe_rtl('animate.min.css'), array(), OGO_VERSION );

		/*JS*/
		// magnific popup
		wp_register_script( 'magnific-popup',    OGO_JS_URL . 'jquery.magnific-popup.min.js', array( 'jquery' ), OGO_VERSION, false );

		// theia sticky
		wp_register_script( 'theia-sticky',    	 OGO_JS_URL . 'theia-sticky-sidebar.min.js', array( 'jquery' ), OGO_VERSION, true );
		
		// tween max
		wp_register_script( 'tween-max',         OGO_JS_URL . 'tween-max.js', array( 'jquery' ), OGO_VERSION, true );
		
		// parallax scroll js
		wp_register_script( 'parallax',   	 OGO_JS_URL . 'parallax.js', array( 'jquery' ), OGO_VERSION, true );
		
		// wow js
		wp_register_script( 'wow',   		 OGO_JS_URL . 'wow.min.js', array( 'jquery' ), OGO_VERSION, true );

		// isotope js
		wp_register_script( 'isotope-pkgd',      OGO_JS_URL . 'isotope.pkgd.min.js', array( 'jquery' ), OGO_VERSION, true );		
		wp_register_script( 'swiper',        OGO_JS_URL . 'swiper.min.js', array( 'jquery' ), OGO_VERSION, true );

		// color mode js
		wp_register_script( 'color-mode',        OGO_JS_URL . 'color-mode.js', array( 'jquery' ), OGO_VERSION, true );
		
		// counterup js
		wp_register_script( 'waypoints',        OGO_JS_URL . 'waypoints.min.js', array( 'jquery' ), OGO_VERSION, true );
		wp_register_script( 'counterup',        OGO_JS_URL . 'jquery.counterup.min.js', array( 'jquery' ), OGO_VERSION, true );
		
	}
}

add_action( 'wp_enqueue_scripts', 'ogo_enqueue_scripts', 15 );
if ( !function_exists( 'ogo_enqueue_scripts' ) ) {
	function ogo_enqueue_scripts() {
		$dep = array( 'jquery' );
		/*CSS*/
		// Google fonts
		wp_enqueue_style( 'ogo-gfonts', 	OgoTheme_Helper::fonts_url(), array(), OGO_VERSION );
		// Bootstrap CSS  //@rtl
		wp_enqueue_style( 'bootstrap', 			ogo_get_maybe_rtl('bootstrap.min.css'), array(), OGO_VERSION );
		//
		wp_enqueue_style( 'swiper', 			ogo_get_maybe_rtl('swiper-bundle.min.css'), array(), OGO_VERSION );
		
		// Flaticon CSS
		wp_enqueue_style( 'flaticon-ogo',    OGO_ASSETS_URL . 'fonts/flaticon-ogo/flaticon.css', array(), OGO_VERSION );
		
		elementor_scripts();
		//Video popup
		wp_enqueue_style( 'magnific-popup' );
		// font-awesome CSS
		wp_enqueue_style( 'font-awesome',       OGO_CSS_URL . 'font-awesome.min.css', array(), OGO_VERSION );
		// animate CSS
		wp_enqueue_style( 'animate',            ogo_get_maybe_rtl('animate.min.css'), array(), OGO_VERSION );
		// main CSS // @rtl
		wp_enqueue_style( 'ogo-default',    	ogo_get_maybe_rtl('default.css'), array(), OGO_VERSION );
		// vc modules css
		wp_enqueue_style( 'ogo-elementor',   ogo_get_maybe_rtl('elementor.css'), array(), OGO_VERSION );
			
		// Style CSS
		wp_enqueue_style( 'ogo-style',     	ogo_get_maybe_rtl('style.css'), array(), OGO_VERSION );
		
		// Template Style
		wp_add_inline_style( 'ogo-style',   	ogo_template_style() );

		/*JS*/
		// bootstrap js
		wp_enqueue_script( 'bootstrap',         OGO_JS_URL . 'bootstrap.min.js', array( 'jquery' ), OGO_VERSION, true );

		//swiper JS
		wp_enqueue_script( 'swiper',         OGO_JS_URL . 'swiper-bundle.min.js', array( 'jquery' ), OGO_VERSION, true );
		
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// color mode
		if ( OgoTheme::$options['color_mode'] ) {
            wp_enqueue_script('color-mode');
        }

		// isotope js
		wp_enqueue_script( 'news-ticker',       OGO_JS_URL . 'jquery.ticker.js', array( 'jquery' ), OGO_VERSION, true );
		
		wp_enqueue_script( 'theia-sticky' );
		wp_enqueue_script( 'wow' );
		wp_enqueue_script( 'parallax' );
		wp_enqueue_script( 'isotope-pkgd' );
		wp_enqueue_script( 'swiper' );
		wp_enqueue_script( 'magnific-popup' );
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'ogo-main',    	OGO_JS_URL . 'main.js', $dep , OGO_VERSION, true );
		
		// localize script
		$ogo_localize_data = array(
			'stickyMenu' 	=> OgoTheme::$options['sticky_menu'],
			'siteLogo'   	=> '<a href="' . esc_url( home_url( '/' ) ) . '" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '">' . '</a>',
			'extraOffset' => OgoTheme::$options['sticky_menu'] ? 70 : 0,
			'extraOffsetMobile' => OgoTheme::$options['sticky_menu'] ? 52 : 0,

			//ticker control
			'tickerTitleText' => OgoTheme::$options['ticker_title_text'] ? OgoTheme::$options['ticker_title_text'] : 'TRENDING',
			'tickerDelay' => OgoTheme::$options['ticker_delay'] ? OgoTheme::$options['ticker_delay'] : 2000,
			'tickerSpeed' => OgoTheme::$options['ticker_speed'] ? OgoTheme::$options['ticker_speed'] : 0.10,
			'tickerStyle' => OgoTheme::$options['ticker_style'] ? OgoTheme::$options['ticker_style'] : 'reveal',
			'rtl' => is_rtl()?'rtl':'ltr',
			'loadmoretxt' => __('No More Blog Post', 'ogo'),
			'loadmoretxtportfolio' => __('No More Portfolio', 'ogo'),
			// Ajax
			'ajaxURL' => admin_url('admin-ajax.php'),
			'post_scroll_limit' => OgoTheme::$options['post_scroll_limit'],
			'nonce' => wp_create_nonce( 'ogo-nonce' )
		);
		wp_localize_script( 'ogo-main', 'ogoObj', $ogo_localize_data );
	}	
}

function elementor_scripts() {
	
	if ( !did_action( 'elementor/loaded' ) ) {
		return;
	}
	
	if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		// do stuff for preview		
		wp_enqueue_script( 'wow' );
		wp_enqueue_script( 'tween-max' );
		wp_enqueue_script( 'counterup' );
		wp_enqueue_script( 'waypoints' );
	} 
}

add_action( 'wp_enqueue_scripts', 'ogo_high_priority_scripts', 1500 );
if ( !function_exists( 'ogo_high_priority_scripts' ) ) {
	function ogo_high_priority_scripts() {
		// Dynamic style
		OgoTheme_Helper::dynamic_internal_style();
	}
}


function ogo_template_style(){
	ob_start();
	?>

	.content-area {
		padding-top: <?php echo esc_html( OgoTheme::$padding_top );?>px; 
		padding-bottom: <?php echo esc_html( OgoTheme::$padding_bottom );?>px;
	}

	<?php if( isset( OgoTheme::$pagebgcolor ) || isset( OgoTheme::$pagebgimg ) ) { ?>
	#page .content-area {
		background-image: url( <?php echo OgoTheme::$pagebgimg; ?> );
		background-color: <?php echo OgoTheme::$pagebgcolor; ?>;
	}
	<?php } ?>

	.error-page-area {		 
		background-color: <?php echo esc_html( OgoTheme::$options['error_bodybg_color'] );?>;
	}
	
	<?php
	return ob_get_clean();
}

function load_custom_wp_admin_script_gutenberg() {
	wp_enqueue_style( 'ogo-gfonts', OgoTheme_Helper::fonts_url(), array(), OGO_VERSION );
	// font-awesome CSS
	wp_enqueue_style( 'font-awesome',       OGO_CSS_URL . 'font-awesome.min.css', array(), OGO_VERSION );
	// Flaticon CSS
	wp_enqueue_style( 'flaticon-ogo',    OGO_ASSETS_URL . 'fonts/flaticon-ogo/flaticon.css', array(), OGO_VERSION );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script_gutenberg', 1 );

function load_custom_wp_admin_script() {
	wp_enqueue_style( 'ogo-admin-style',  OGO_CSS_URL . 'admin-style.css', false, OGO_VERSION );
	wp_enqueue_script( 'ogo-admin-main',  OGO_JS_URL . 'admin.main.js', false, OGO_VERSION, true );
	
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script' );

/*Topbar menu function*/
if ( !function_exists( 'ogo_top_menu' ) ) {
	function ogo_top_menu() {
	    $menus = wp_get_nav_menus();
	    if(!empty($menus)){
	      	$menu_links = array();
	      	foreach ($menus as $key => $value) {
	        	$menu_links[$value->slug] = $value->name;  
	      	}
	      	return $menu_links;
	    }
	}
}
