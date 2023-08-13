<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

add_action( 'widgets_init', 'ogo_widgets_init' );
function ogo_widgets_init() {
	// Register Custom Widgets
	register_widget( 'OgoTheme_About_Widget' );
	register_widget( 'OgoTheme_Footer_About_Widget' );
	register_widget( 'OgoTheme_Address_Widget' );
	register_widget( 'OgoTheme_Social_Widget' );
	register_widget( 'OgoTheme_Post_Box' );
	register_widget( 'OgoTheme_Post_Tab' );
	register_widget( 'OgoTheme_Feature_Post' );
	register_widget( 'OgoTheme_Category_Widget' );
	register_widget( 'OgoTheme_Footer_Address_Widget' );
}