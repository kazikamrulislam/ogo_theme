<?php
/**
 * Template Name: Post Layout 1
 * Template Post Type: post
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

if( OgoTheme::$options['image_blend'] == 'normal' ) {
	$blend = 'normal';
}else {
	$blend = 'blend';
}

if ( OgoTheme::$layout == 'left-sidebar' ) {
	$sidebar_order = 'order-lg-2 order-md-1 order-1';
} else {
	$sidebar_order = 'no-order';
}

?>
<?php get_header(); ?>

<div id="primary" class="content-area <?php echo esc_attr($blend); ?>">
	<div id="contentHolder">
	<?php if ( OgoTheme::$options['before_post_ad_option'] ) { ?>
		<div class="content-top-ad">
			<div class="container">
				<div class="content-top-ad-item">
					<?php if ( OgoTheme::$options['ad_before_post_type'] == 'post_before_adimage' ) { ?>
					<?php if (OgoTheme::$options['post_before_ad_img_link']){
						$target = OgoTheme::$options['post_before_ad_img_target']? 'target="_blank"':'';
						echo '<a '.$target.'  href="'.esc_url( OgoTheme::$options['post_before_ad_img_link'] ).'">'.wp_get_attachment_image( OgoTheme::$options['post_before_adimage'], 'full' ).'</a>';

					} else {
						echo wp_get_attachment_image( OgoTheme::$options['post_before_adimage'], 'full' );
					}?>	

					<?php } else {
						echo OgoTheme::$options['post_before_adcustom'];
					} ?>		
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="post-detail-style2">
			<div class="container">
				<h1 class="entry-title title-size-lg title-dark-color"><?php the_title();?></h1>
				<div class="entry-thumbnail-area <?php echo esc_attr($img_class); ?>">
					<?php if ( OgoTheme::$options['post_featured_image'] == true ) {
						if ( has_post_thumbnail() ) {
							the_post_thumbnail( 'ogo-size1' );
						} 
					 } ?>
					<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
						<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn size-md amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
					<?php } ?>
				</div>	
			</div>	
		</div>
		<div class="container">
			<div class="row">
				<?php if ( OgoTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
					<div class="<?php echo esc_attr( $ogo_layout_class );?> <?php echo esc_attr( $sidebar_order ) ?>">
						<main id="main" class="site-main">
							<div class="amt-sidebar-space <?php echo ( OgoTheme::$options['scroll_post_enable'] == 1 ) ? esc_attr( 'ajax-scroll-post' ) : ''; ?>">
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'template-parts/content-single', get_post_format() );?>						
							<?php endwhile; ?>
							</div>
						</main>
					</div>
				<?php if ( OgoTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>