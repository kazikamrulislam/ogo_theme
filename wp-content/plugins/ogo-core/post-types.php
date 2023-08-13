<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;
use \AMT_Posts;
use OgoTheme;


if ( !class_exists( 'AMT_Posts' ) ) {
	return;
}

$post_types = array(
	'ogo_team'       => array(
		'title'           => esc_html__( 'Team Member', 'ogo-core' ),
		'plural_title'    => esc_html__( 'Team', 'ogo-core' ),
		'menu_icon'       => 'dashicons-businessman',
		'labels_override' => array(
			'menu_name'   => esc_html__( 'Team', 'ogo-core' ),
		),
		'rewrite'         => OgoTheme::$options['team_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' )
	),
	'ogo_faq'       => array(
		'title'           => esc_html__( 'FAQs', 'ogo-core' ),
		'plural_title'    => esc_html__( 'FAQs', 'ogo-core' ),
		'menu_icon'       => 'dashicons-businessman',
		'labels_override' => array(
			'menu_name'   => esc_html__( 'FAQs', 'ogo-core' ),
		),
		'rewrite'         => OgoTheme::$options['faq_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor' )
	),
	'ogo_portfolio'       => array(
		'title'           => esc_html__( 'Portfolios', 'ogo-core' ),
		'plural_title'    => esc_html__( 'Portfolios', 'ogo-core' ),
		'menu_icon'       => 'dashicons-businessman',
		'labels_override' => array(
			'menu_name'   => esc_html__( 'Portfolios', 'ogo-core' ),
		),
		'show_in_rest' => true,
		'rewrite'         => OgoTheme::$options['portfolio_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor','custom-fields' )
	),
	'ogo_testimonial'       => array(
		'title'           => esc_html__( 'Testimonials', 'ogo-core' ),
		'plural_title'    => esc_html__( 'Testimonials', 'ogo-core' ),
		'menu_icon'       => 'dashicons-businessman',
		'labels_override' => array(
			'menu_name'   => esc_html__( 'Testimonials', 'ogo-core' ),
		),
		'rewrite'         => OgoTheme::$options['testimonial_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor','custom-fields' )
	),
);

$taxonomies = array(
	'ogo_team_category' => array(
		'title'        => esc_html__( 'Team Category', 'ogo-core' ),
		'plural_title' => esc_html__( 'Team Categories', 'ogo-core' ),
		'post_types'   => 'ogo_team',
		'rewrite'      => array( 'slug' => OgoTheme::$options['team_cat_slug'] ),
	),
	'ogo_faq_category' => array(
		'title'        => esc_html__( 'FAQs Category', 'ogo-core' ),
		'plural_title' => esc_html__( 'FAQs Categories', 'ogo-core' ),
		'post_types'   => 'ogo_faq',
		'rewrite'      => array( 'slug' => OgoTheme::$options['faq_cat_slug'] ),
	),
	'ogo_testimonial_category' => array(
		'title'        => esc_html__( 'Testimonials Category', 'ogo-core' ),
		'plural_title' => esc_html__( 'Testimonials Categories', 'ogo-core' ),
		'post_types'   => 'ogo_testimonial',
		'rewrite'      => array( 'slug' => OgoTheme::$options['testimonial_cat_slug'] ),

	),
	'ogo_portfolio_category' => array(
		'title'        => esc_html__( 'Portfolio Category', 'ogo-core' ),
		'plural_title' => esc_html__( 'Portfolio Categories', 'ogo-core' ),
		'post_types'   => 'ogo_portfolio',
		'show_in_rest' => true,
		'rewrite'      => array( 'slug' => OgoTheme::$options['portfolio_cat_slug'] ),
	)
);

$Posts = AMT_Posts::getInstance();
$Posts->add_post_types( $post_types );
$Posts->add_taxonomies( $taxonomies );