<?php
/**
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

$ogo_is_post_archive = is_home() || ( is_archive() && get_post_type() == 'post' ) ? true : false;

if ( is_post_type_archive( "ogo_team" ) || is_tax( "ogo_team_category" ) ) {
		get_template_part( 'template-parts/archive', 'team' );
	return;
}

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr( $ogo_layout_class );?>">
				<main id="main" class="site-main">
					<div class="amt-sidebar-space">
					<?php
					if ( have_posts() ) { ?>
						<?php
						if ( $ogo_is_post_archive && OgoTheme::$options['blog_style'] == 'style1' ) {
							echo '<div class="row g-4 loadmore-items">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $ogo_is_post_archive && OgoTheme::$options['blog_style'] == 'style2' ) {
							echo '<div class="row g-4 loadmore-items">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-2', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $ogo_is_post_archive && OgoTheme::$options['blog_style'] == 'style3' ) {
							echo '<div class="loadmore-items">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-3', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $ogo_is_post_archive && OgoTheme::$options['blog_style'] == 'style4' ) {
							echo '<div class="loadmore-items">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-4', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $ogo_is_post_archive && OgoTheme::$options['blog_style'] == 'style5' ) {
							echo '<div class=" row g-4 loadmore-items">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-5', get_post_format() );
							endwhile;
							echo '</div>';
						} else {
							echo '<div class="row g-4 loadmore-items">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
							echo '</div>';
						}

						?>

						<?php if( OgoTheme::$options['blog_loadmore'] == 'loadmore' && OgoTheme::$options['blog_style'] == 'style1' ) { ?>
							<div class="text-center blog-loadmore">
						      	<a href="#" id="loadMore1" class="loadMore"><?php esc_html_e( 'Load More', 'ogo' ) ?></a>
						    </div> 
						<?php } elseif( OgoTheme::$options['blog_loadmore'] == 'loadmore' && OgoTheme::$options['blog_style'] == 'style2' ) { ?>
							<div class="text-center blog-loadmore">
						      	<a href="#" id="loadMore2" class="loadMore"><?php esc_html_e( 'Load More', 'ogo' ) ?></a>
						    </div> 
						<?php } elseif( OgoTheme::$options['blog_loadmore'] == 'loadmore' && OgoTheme::$options['blog_style'] == 'style3' ) { ?>
							<div class="text-center blog-loadmore">
						      	<a href="#" id="loadMore3" class="loadMore"><?php esc_html_e( 'Load More', 'ogo' ) ?></a>
						    </div> 
						<?php } elseif( OgoTheme::$options['blog_loadmore'] == 'loadmore' && OgoTheme::$options['blog_style'] == 'style4' ) { ?>
							<div class="text-center blog-loadmore">
						      	<a href="#" id="loadMore4" class="loadMore"><?php esc_html_e( 'Load More', 'ogo' ) ?></a>
						    </div> 
						<?php } elseif( OgoTheme::$options['blog_loadmore'] == 'loadmore' && OgoTheme::$options['blog_style'] == 'style5' ) { ?>
							<div class="text-center blog-loadmore">
						      	<a href="#" id="loadMore5" class="loadMore"><?php esc_html_e( 'Load More', 'ogo' ) ?></a>
						    </div> 
						<?php } else { ?>
							<?php OgoTheme_Helper::pagination(); ?>
						<?php } ?> 

					<?php } else {?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php } ?>
					</div>					
				</main>
			</div>
			<?php
			if( OgoTheme::$layout == 'right-sidebar' ){
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>