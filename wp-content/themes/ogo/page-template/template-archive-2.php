<?php
/**
 * Template Name: Archive style 2
 * 
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( OgoTheme::$layout == 'full-width' ) {
	$ogo_layout_class = 'col-12';
}
else{
	$ogo_layout_class = OgoTheme_Helper::has_active_widget();
}

$args = array(
	'post_type' => "post",
);

if ( get_query_var('paged') ) {
	$args['paged'] = get_query_var('paged');
}
elseif ( get_query_var('page') ) {
	$args['paged'] = get_query_var('page');
}
else {
	$args['paged'] = 1;
}

$query = new WP_Query( $args );

global $wp_query;
$wp_query = NULL;
$wp_query = $query;
 
get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php if ( OgoTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
			<div class="<?php echo esc_attr( $ogo_layout_class );?>">
				<main id="main" class="site-main">
					<div class="amt-sidebar-space">
					<?php if ( have_posts() ) :?>
						<?php
							echo '<div class="row g-4 loadmore-items">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-2', get_post_format() );
							endwhile;
							echo '</div>';
						?>
						<?php if( OgoTheme::$options['blog_loadmore'] == 'loadmore' ) { ?>
							<div class="text-center blog-loadmore">
						      	<a href="#" id="loadMore2" class="loadMore"><?php esc_html_e( 'Load More', 'ogo' ) ?><i class="fas fa-redo-alt"></i></a>
						    </div> 
						<?php } else { ?>
							<?php OgoTheme_Helper::pagination(); ?>
						<?php } ?>
					<?php else:?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php endif;?>
					</div>
				</main>
			</div>
			<?php if ( OgoTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
