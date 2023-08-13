<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
namespace addonmonster\Ogo_Core;

use OgoTheme;
use OgoTheme_Helper;
use \WP_Query;  

/**
 * 
 */
class AjaxTab {
	
	function __construct()
	{
		/*ogo single scroll post*/
		add_action( 'wp_ajax_ogo_single_scroll_post', [$this, 'ogo_single_scroll_post'] ); 
		add_action( 'wp_ajax_nopriv_ogo_single_scroll_post', [$this, 'ogo_single_scroll_post'] );
	}

	/*ogo single scroll post*/
	function ogo_single_scroll_post() {
		$current_post = isset( $_POST['current_post'] ) ? absint( $_POST['current_post'] ) : 1;
		$cat_ids = isset( $_POST['cat_ids'] ) ? explode( ',', $_POST['cat_ids'] ) : [];

		ob_start(); 

		$args = [
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => 1, 
			'category__in' => $cat_ids, 
			'offset' => $current_post, 
			'ignore_sticky_posts' => 1,
		];

		$query = new WP_Query( $args );
		$temp = OgoTheme_Helper::wp_set_temp_query( $query );

		global $withcomments; 
		$withcomments = true; 
		$nextUrl = null; 
		while ( $query->have_posts() ) {
			$query->the_post();	
			$nextUrl= get_the_permalink();
			get_template_part( 'template-parts/content-single', get_post_format() );
		}
		OgoTheme_Helper::wp_reset_temp_query( $temp );
		$nextContent = ob_get_clean(); 
		wp_send_json_success( [
			'nextUrl' => $nextUrl,
			'nextContent'=> $nextContent
		] );
	}
}

new AjaxTab();