<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

use OgoTheme;
use OgoTheme_Helper;
use \AMT_Postmeta;

if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'AMT_Postmeta' ) ) {
	return;
}

$Postmeta = AMT_Postmeta::getInstance();

$prefix = OGO_CORE_CPT_PREFIX;

/*-------------------------------------
#. Layout Settings
---------------------------------------*/
$nav_menus = wp_get_nav_menus( array( 'fields' => 'id=>name' ) );
$nav_menus = array( 'default' => __( 'Default', 'ogo-core' ) ) + $nav_menus;
$sidebars  = array( 'default' => __( 'Default', 'ogo-core' ) ) + OgoTheme_Helper::custom_sidebar_fields();

$Postmeta->add_meta_box( "{$prefix}_page_settings", __( 'Layout Settings', 'ogo-core' ), array( 'page', 'post', 'ogo_team', 'ogo_service', 'ogo_case', 'ogo_testim' ,  'ogo_portfolio'), '', '', 'high', array(
	'fields' => array(
	
		"{$prefix}_layout_settings" => array(
			'label'   => __( 'Layouts', 'ogo-core' ),
			'type'    => 'group',
			'value'  => array(	
			
				"{$prefix}_layout" => array(
					'label'   => __( 'Layout', 'ogo-core' ),
					'type'    => 'select',
					'options' => array(
						'default'       => __( 'Default', 'ogo-core' ),
						'full-width'    => __( 'Full Width', 'ogo-core' ),
						'left-sidebar'  => __( 'Left Sidebar', 'ogo-core' ),
						'right-sidebar' => __( 'Right Sidebar', 'ogo-core' ),
					),
					'default'  => 'default',
				),		
				'ogo_sidebar' => array(
					'label'    => __( 'Custom Sidebar', 'ogo-core' ),
					'type'     => 'select',
					'options'  => $sidebars,
					'default'  => 'default',
				),
				"{$prefix}_page_menu" => array(
					'label'    => __( 'Main Menu', 'ogo-core' ),
					'type'     => 'select',
					'options'  => $nav_menus,
					'default'  => 'default',
				),
				"{$prefix}_top_bar" => array(
					'label' 	  => __( 'Top Bar', 'ogo-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'ogo-core' ),
						'on'      => __( 'Enabled', 'ogo-core' ),
						'off'     => __( 'Disabled', 'ogo-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_bar_style" => array(
					'label' 	=> __( 'Top Bar Layout', 'ogo-core' ),
					'type'  	=> 'select',
					'options'	=> array(
						'default' => __( 'Default', 'ogo-core' ),
						'1'       => __( 'Layout 1', 'ogo-core' ),
						'2'       => __( 'Layout 2', 'ogo-core' ),
						'3'       => __( 'Layout 3', 'ogo-core' ),
						'4'       => __( 'Layout 4', 'ogo-core' ),
					),
					'default'   => 'default',
				),
				"{$prefix}_header_opt" => array(
					'label' 	  => __( 'Header On/Off', 'ogo-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'ogo-core' ),
						'on'      => __( 'Enabled', 'ogo-core' ),
						'off'     => __( 'Disabled', 'ogo-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_header" => array(
					'label'   => __( 'Header Layout', 'ogo-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'ogo-core' ),
						'1'       => __( 'Layout 1', 'ogo-core' ),
						'2'       => __( 'Layout 2', 'ogo-core' ),
						'3'       => __( 'Layout 3', 'ogo-core' ),
						'4'       => __( 'Layout 4', 'ogo-core' ),
						'5'       => __( 'Layout 5', 'ogo-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer" => array(
					'label'   => __( 'Footer Layout', 'ogo-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'ogo-core' ),
						'1'       => __( 'Layout 1', 'ogo-core' ),
						'2'       => __( 'Layout 2', 'ogo-core' ),
						'3'       => __( 'Layout 3', 'ogo-core' ),
						'4'       => __( 'Layout 4', 'ogo-core' ),
						'5'       => __( 'Layout 5', 'ogo-core' ),
						'6'       => __( 'Layout 6', 'ogo-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer_area" => array(
					'label' 	  => __( 'Footer Area', 'ogo-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'ogo-core' ),
						'on'      => __( 'Enabled', 'ogo-core' ),
						'off'     => __( 'Disabled', 'ogo-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_copyright_area" => array(
					'label' 	  => __( 'Copyright Area', 'ogo-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'ogo-core' ),
						'on'      => __( 'Enabled', 'ogo-core' ),
						'off'     => __( 'Disabled', 'ogo-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_padding" => array(
					'label'   => __( 'Content Padding Top', 'ogo-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'ogo-core' ),
						'0px'     => __( '0px', 'ogo-core' ),
						'10px'    => __( '10px', 'ogo-core' ),
						'20px'    => __( '20px', 'ogo-core' ),
						'30px'    => __( '30px', 'ogo-core' ),
						'40px'    => __( '40px', 'ogo-core' ),
						'50px'    => __( '50px', 'ogo-core' ),
						'60px'    => __( '60px', 'ogo-core' ),
						'70px'    => __( '70px', 'ogo-core' ),
						'80px'    => __( '80px', 'ogo-core' ),
						'90px'    => __( '90px', 'ogo-core' ),
						'100px'   => __( '100px', 'ogo-core' ),
						'110px'   => __( '110px', 'ogo-core' ),
						'120px'   => __( '120px', 'ogo-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_bottom_padding" => array(
					'label'   => __( 'Content Padding Bottom', 'ogo-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'ogo-core' ),
						'0px'     => __( '0px', 'ogo-core' ),
						'10px'    => __( '10px', 'ogo-core' ),
						'20px'    => __( '20px', 'ogo-core' ),
						'30px'    => __( '30px', 'ogo-core' ),
						'40px'    => __( '40px', 'ogo-core' ),
						'50px'    => __( '50px', 'ogo-core' ),
						'60px'    => __( '60px', 'ogo-core' ),
						'70px'    => __( '70px', 'ogo-core' ),
						'80px'    => __( '80px', 'ogo-core' ),
						'90px'    => __( '90px', 'ogo-core' ),
						'100px'   => __( '100px', 'ogo-core' ),
						'110px'   => __( '110px', 'ogo-core' ),
						'120px'   => __( '120px', 'ogo-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner" => array(
					'label'   => __( 'Banner', 'ogo-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'ogo-core' ),
						'on'	  => __( 'Enable', 'ogo-core' ),
						'off'	  => __( 'Disable', 'ogo-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_breadcrumb" => array(
					'label'   => __( 'Breadcrumb', 'ogo-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'ogo-core' ),
						'on'      => __( 'Enable', 'ogo-core' ),
						'off'	  => __( 'Disable', 'ogo-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner_type" => array(
					'label'   => __( 'Banner Background Type', 'ogo-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'ogo-core' ),
						'bgimg'   => __( 'Background Image', 'ogo-core' ),
						'bgcolor' => __( 'Background Color', 'ogo-core' ),
					),
					'default' => 'default',
				),
				"{$prefix}_banner_bgimg" => array(
					'label' => __( 'Banner Background Image', 'ogo-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'ogo-core' ),
				),
				"{$prefix}_banner_bgcolor" => array(
					'label' => __( 'Banner Background Color', 'ogo-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'ogo-core' ),
				),		
				"{$prefix}_page_bgimg" => array(
					'label' => __( 'Page/Post Background Image', 'ogo-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'ogo-core' ),
				),
				"{$prefix}_page_bgcolor" => array(
					'label' => __( 'Page/Post Background Color', 'ogo-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'ogo-core' ),
				),
			)
		)
	),
) );

/*-------------------------------------
#. Single Post Gallery
---------------------------------------*/

$Postmeta->add_meta_box( 'ogo_post_info', __( 'Post Info', 'ogo-core' ), array( 'post' ), '', '', 'high', array(
	'fields' => array(	
		"ogo_post_layout" => array(
			'label'   => __( 'Post Template', 'ogo-core' ),
			'type'    => 'select',
			'options' => array(
				'default'  => __( 'Default', 'ogo-core' ),
				'post-detail-style1'  => __( 'Layout 1', 'ogo-core' ),
				'post-detail-style2'  => __( 'Layout 2', 'ogo-core' ),
				'post-detail-style3'  => __( 'Layout 3', 'ogo-core' ),
			),
			'default'  => 'default',
		),
		"ogo_youtube_link" => array(
			'label'   => __( 'Youtube Link', 'ogo-core' ),
			'type'    => 'text',
			'default'  => '',
			'desc'  => __( 'Only work for the video post format', 'ogo-core' ),
		),	
	),
) );

/*-------------------------------------
#. Team
---------------------------------------*/
$Postmeta->add_meta_box( 'ogo_team_settings', __( 'Team Member Settings', 'ogo-core' ), array( 'ogo_team' ), '', '', 'high', array(
	'fields' => array(
		'ogo_team_experience' => array(
			'label' => __( 'Experience', 'ogo-core' ),
			'type'  => 'text',
		),
		'ogo_team_position' => array(
			'label' => __( 'Position', 'ogo-core' ),
			'type'  => 'text',
		),
		'ogo_team_website' => array(
			'label' => __( 'Website', 'ogo-core' ),
			'type'  => 'text',
		),
		'ogo_team_email' => array(
			'label' => __( 'Email', 'ogo-core' ),
			'type'  => 'text',
		),
		'ogo_team_phone' => array(
			'label' => __( 'Phone', 'ogo-core' ),
			'type'  => 'text',
		),
		'ogo_team_address' => array(
			'label' => __( 'Address', 'ogo-core' ),
			'type'  => 'text',
		),
		'ogo_team_socials_header' => array(
			'label' => __( 'Socials', 'ogo-core' ),
			'type'  => 'header',
			'desc'  => __( 'Enter your social links here', 'ogo-core' ),
		),
		'ogo_team_socials' => array(
			'type'  => 'group',
			'value'  => OgoTheme_Helper::team_socials()
		),
	)
) );

$Postmeta->add_meta_box( 'ogo_team_skills', __( 'Team Member Skills', 'ogo-core' ), array( 'ogo_team' ), '', '', 'high', array(
	'fields' => array(
		'ogo_team_skill' => array(
			'type'  => 'repeater',
			'button' => __( 'Add New Skill', 'ogo-core' ),
			'value'  => array(
				'skill_name' => array(
					'label' => __( 'Skill Name', 'ogo-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. Marketing', 'ogo-core' ),
				),
				'skill_value' => array(
					'label' => __( 'Skill Percentage (%)', 'ogo-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. 75', 'ogo-core' ),
				),
				'skill_color' => array(
					'label' => __( 'Skill Color', 'ogo-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, primary color will be used', 'ogo-core' ),
				),
			)
		),
	)
) );
$Postmeta->add_meta_box( 'ogo_team_member_bio', __( 'Team Member BIO', 'ogo-core' ), array( 'ogo_team' ), '', '', 'high', array(
	'fields' => array(
		'ogo_team_member_bio' => array(
			'label' => __( 'Team Member Bio', 'ogo-core' ),
			'type'  => 'text',
			'desc'  => __( 'Input Your Bio', 'ogo-core' ),
		),
	)
) );
// $Postmeta->add_meta_box( 'ogo_team_member_experience', __( 'Team Member Experience', 'ogo-core' ), array( 'ogo_team' ), '', '', 'high', array(
// 	'fields' => array(
// 		'ogo_team_member_experience' => array(
// 			'label' => __( 'Team Member Experience', 'ogo-core' ),
// 			'type'  => 'text',
// 			'desc'  => __( '10 Years', 'ogo-core' ),
// 		),
// 	)
// ) );
$Postmeta->add_meta_box( 'ogo_team_member_awards', __( 'Team Member Awards', 'ogo-core' ), array( 'ogo_team' ), '', '', 'high', array(
	'fields' => array(
		'ogo_team_member_award' => array(
			'type'  => 'repeater',
			'button' => __( 'Add New Skill', 'ogo-core' ),
			'value'  => array(
				'award_name' => array(
					'label' => __( 'Award Name', 'ogo-core' ),
					'type'  => 'text',
					'desc'  => __( 'Employee of the year', 'ogo-core' ),
				),
				'award_date' => array(
					'label' => __( 'Award Date', 'ogo-core' ),
					'type'  => 'date_picker',
					'desc'  => __( 'Dec 20, 2022', 'ogo-core' ),
				),
			)
		),
	)
) );
$Postmeta->add_meta_box( 'ogo_team_contact', __( 'Team Member Contact', 'ogo-core' ), array( 'ogo_team' ), '', '', 'high', array(
	'fields' => array(
		'ogo_team_contact_form' => array(
			'label' => __( 'Contct Shortcode', 'ogo-core' ),
			'type'  => 'text',
		),
	)
) );
/*-------------------------------------
# Testimonial
---------------------------------------*/
// $Postmeta->add_meta_box( 'ogo_testimonial_designation', __( 'Testimonial Author Designation', 'ogo-core' ), array( 'ogo_testimonial' ), '', '', 'high', array(
// 	'fields' => array(
// 		'ogo_testimonial_designation' => array(
// 			'label' => __( 'Designation', 'ogo-core' ),
// 			'type'  => 'text',
// 			'desc'  => __( 'Product Designer', 'ogo-core' ),
// 		),
// 	)
// ) );
$Postmeta->add_meta_box( 'ogo_testimonial_author', __( 'Testimonial Author', 'ogo-core' ), array( 'ogo_testimonial' ), '', '', 'high', array(
	'fields' => array(
		'ogo_testimonial_rating' => array(
			'label' => __( 'rating', 'ogo-core' ),
			'type'  => 'number',
			'desc'  => __( 'Give a Float Rating Between 0-5.', 'ogo-core' ),
		),
		// 'ogo_testimonial_author_avatar' => array(
		// 	'label' => __( 'Upload Author Image', 'ogo-core' ),
		// 	'type'  => 'image',
		// 	'url' => true,
		// 	'desc'  => __( 'image', 'ogo-core' ),
		// ),
		'ogo_testimonial_author_name' => array(
			'label' => __( 'Author Name', 'ogo-core' ),
			'type'  => 'text',
			'desc'  => __( 'kazi kamrul islam', 'ogo-core' ),
		),
		'ogo_testimonial_author_designation' => array(
			'label' => __( 'Author designation', 'ogo-core' ),
			'type'  => 'text',
			'desc'  => __( 'Product Designer', 'ogo-core' ),
		),
	)
) );
// $Postmeta->add_meta_box( 'ogo_testimonial_rating', __( 'Project you work for', 'ogo-core' ), array( 'ogo_portfolio' ), '', '', 'high', array(
// 	'fields' => array(
// 		'ogo_testimonioal_rating' => array(
// 			'label' => __( 'Rating', 'ogo-core' ),
// 			'type'  => 'text',
// 		),
// 	)
// ) );
/*-------------------------------------
#. Portfolio
---------------------------------------*/
$Postmeta->add_meta_box( 'ogo_portfolio_settings', __( 'Project you work for', 'ogo-core' ), array( 'ogo_portfolio' ), '', '', 'high', array(
	'fields' => array(
		'ogo_portfolio_client' => array(
			'label' => __( 'Client Name', 'ogo-core' ),
			'type'  => 'text',
		),
		'ogo_portfolio_services' => array(
			'label' => __( 'Services', 'ogo-core' ),
			'type'  => 'text',
		),
	)
) );


// /*-------------------------------------
// #. Portfolio
// ---------------------------------------*/
// $Postmeta->add_meta_box( 'ogo_portfolio_settings', __( 'Single Portfolio Settings', 'ogo-core' ), array( 'ogo_portfolio' ), '', '', 'high', array(
// 	'fields' => array(
// 		'ogo_portfolio_client' => array(
// 			'label' => __( 'Client Name', 'ogo-core' ),
// 			'type'  => 'text',
// 		),
// 		'ogo_portfolio_services' => array(
// 			'label' => __( 'Services', 'ogo-core' ),
// 			'type'  => 'text',
// 		),
// 	)
// ) );