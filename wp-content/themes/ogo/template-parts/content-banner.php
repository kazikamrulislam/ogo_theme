<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

if ( is_404() ) {
	$ogo_title = "Error Page";
}
elseif ( is_search() ) {
	$ogo_title = esc_html__( 'Search Results for : ', 'ogo' ) . get_search_query();
}
elseif ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$ogo_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$ogo_title = apply_filters( 'theme_blog_title', esc_html__( 'All Posts', 'ogo' ) );
	}
}
elseif ( is_archive() ) {
	$ogo_title = get_the_archive_title();
} elseif (is_single()) {
	$ogo_title  = get_the_title();

} else {
	$ogo_title = get_the_title();	                   
}

?>

<?php if ( OgoTheme::$has_banner == 1 || OgoTheme::$has_banner == 'on' ) { ?>

	<?php if ( !is_single() ) { 

switch (OgoTheme::$options['banner_style']){
	case '5':
		get_template_part( 'template-parts/banner', '5' );
	break;
	case '4':
		get_template_part( 'template-parts/banner', '4' );
	break;
	case '3':
		get_template_part( 'template-parts/banner', '3' );
	break;
	case '2':
		get_template_part( 'template-parts/banner', '2' );
	break;
	default:
		get_template_part( 'template-parts/banner', '1' );
	break;		
}
?>
<?php } ?>
<?php } ?>