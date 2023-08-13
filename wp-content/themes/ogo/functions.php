<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$ogo_theme_data = wp_get_theme();
	$action  = 'ogo_theme_init';
	do_action( $action );

	define( 'OGO_VERSION', ( WP_DEBUG ) ? time() : $ogo_theme_data->get( 'Version' ) );
	define( 'OGO_AUTHOR_URI', $ogo_theme_data->get( 'AuthorURI' ) );
	define( 'OGO_NAME', 'ogo' );

	// DIR
	define( 'OGO_BASE_DIR',    get_template_directory(). '/' );
	define( 'OGO_INC_DIR',     OGO_BASE_DIR . 'inc/' );
	define( 'OGO_VIEW_DIR',    OGO_INC_DIR . 'views/' );
	define( 'OGO_LIB_DIR',     OGO_BASE_DIR . 'lib/' );
	define( 'OGO_WID_DIR',     OGO_INC_DIR . 'widgets/' );
	define( 'OGO_PLUGINS_DIR', OGO_INC_DIR . 'plugins/' );
	define( 'OGO_MODULES_DIR', OGO_INC_DIR . 'modules/' );
	define( 'OGO_ASSETS_DIR',  OGO_BASE_DIR . 'assets/' );
	define( 'OGO_CSS_DIR',     OGO_ASSETS_DIR . 'css/' );
	define( 'OGO_JS_DIR',      OGO_ASSETS_DIR . 'js/' );
	define( 'OGO_WOO_DIR',   OGO_BASE_DIR . 'woocommerce/' );

	// URL
	define( 'OGO_BASE_URL',    get_template_directory_uri(). '/' );
	define( 'OGO_ASSETS_URL',  OGO_BASE_URL . 'assets/' );
	define( 'OGO_CSS_URL',     OGO_ASSETS_URL . 'css/' );
	define( 'OGO_JS_URL',      OGO_ASSETS_URL . 'js/' );
	define( 'OGO_IMG_URL',     OGO_ASSETS_URL . 'img/' );
	define( 'OGO_ELEMENT_URL', OGO_ASSETS_URL . 'element/' );
	define( 'OGO_LIB_URL',     OGO_BASE_URL . 'lib/' );


	// icon trait Plugin Activation
	require_once OGO_INC_DIR . 'icon-trait.php';
	// Includes
	require_once OGO_INC_DIR . 'helper-functions.php';
	require_once OGO_INC_DIR . 'ogo.php';
	require_once OGO_INC_DIR . 'general.php';
	require_once OGO_INC_DIR . 'ajax-tab.php'; 
	require_once OGO_INC_DIR . 'ajax-loadmore.php'; 
	require_once OGO_INC_DIR . 'scripts.php';
	require_once OGO_INC_DIR . 'template-vars.php';
	require_once OGO_INC_DIR . 'includes.php';

	// Includes Modules
	require_once OGO_MODULES_DIR . 'amt-post-related.php';
	require_once OGO_MODULES_DIR . 'amt-team-related.php';
	require_once OGO_MODULES_DIR . 'amt-news-ticker.php';
	require_once OGO_MODULES_DIR . 'amt-breadcrumbs.php';
	require_once OGO_MODULES_DIR . 'amt-portfolio-related.php';

	// TGM Plugin Activation
	require_once OGO_LIB_DIR . 'class-tgm-plugin-activation.php';
	require_once OGO_INC_DIR . 'tgm-config.php';

	add_editor_style( 'style-editor.css' );

	// Update Breadcrumb Separator
	add_action('bcn_after_fill', 'ogo_hseparator_breadcrumb_trail', 1);
	function ogo_hseparator_breadcrumb_trail($object){
		$object->opt['hseparator'] = '<span class="dvdr"> <i class="fas fa-angle-right"></i> </span>';
		return $object;
	}