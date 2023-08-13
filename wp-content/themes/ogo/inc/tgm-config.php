<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

add_action( 'tgmpa_register', 'ogo_register_required_plugins' );
function ogo_register_required_plugins() {
	$plugins = array(
		// Bundled
		array(
			'name'         => 'Ogo Core',
			'slug'         => 'ogo-core',
			'source'       => 'ogo-core.zip',
			'required'     =>  true,
			'external_url' => 'http://addonmonster.com',
			'version'      => '1.5'
		),
		array(
			'name'         => 'AMT Framework',
			'slug'         => 'amt-framework',
			'source'       => 'amt-framework.zip',
			'required'     =>  true,
			'external_url' => 'http://addonmonster.com',
			'version'      => '2.4'
		),
		array(
			'name'         => 'AMT Demo Importer',
			'slug'         => 'amt-demo-importer',
			'source'       => 'amt-demo-importer.zip',
			'required'     =>  true,
			'external_url' => 'http://addonmonster.com',
			'version'      => '4.3'
		),
		// Repository
		array(
			'name'     => 'Breadcrumb NavXT',
			'slug'     => 'breadcrumb-navxt',
			'required' => true,
		),
		array(
			'name'     => 'Elementor Page Builder',
			'slug'     => 'elementor',
			'required' => true,
		),
		array(
			'name'     => 'WP Fluent Forms',
			'slug'     => 'fluentform',
			'required' => false,
		),
		array(
			'name'     => 'AccessPress Social Counter',
			'slug'     => 'accesspress-social-counter',
			'required' => false,
		),
		array(
			'name'     => 'WooCommerce',
			'slug'     => 'woocommerce',
			'required' => false,
		),
		array(
			'name'     => 'YITH WooCommerce Quick View',
			'slug'     => 'yith-woocommerce-quick-view',
			'required' => false,
		),
		array(
            'name'     => esc_attr__('YITH WooCommerce Wishlist', 'ogo'),
            'slug'     => 'yith-woocommerce-wishlist',
            'required' => false,
        ),
		array(
            'name'     => esc_attr__('YITH WooCommerce Compare', 'ogo'),
            'slug'     => 'yith-woocommerce-compare',
            'required' => false,
        ),
	);

	$config = array(
		'id'           => 'ogo',                 	// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => OGO_PLUGINS_DIR,       	// Default absolute path to bundled plugins.
		'menu'         => 'ogo-install-plugins', 	// Menu slug.
		'has_notices'  => true,                    		// Show admin notices or not.
		'dismissable'  => true,                    		// If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   		// Automatically activate plugins after installation or not.
		'message'      => '',                      		// Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}