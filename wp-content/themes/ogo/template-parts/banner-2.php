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
<div class="entry-banner banner-style-2">
	<div class="container">
		<div class="entry-banner-content">
			<?php if ( OgoTheme::$has_breadcrumb == 1 ) { ?>
				<?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
			<?php } ?>
			<div class="banner-title">
				<h1 class="entry-title"><?php echo wp_kses( $ogo_title, 'alltext_allow' );?></h1>
			</div>
		</div>
	</div>
</div>