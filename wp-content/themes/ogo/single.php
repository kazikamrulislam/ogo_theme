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
$ogo_has_entry_meta  = ( OgoTheme::$options['post_date'] || OgoTheme::$options['post_author_name'] || OgoTheme::$options['post_comment_num'] || ( OgoTheme::$options['post_length'] && function_exists( 'ogo_reading_time' ) ) || OgoTheme::$options['post_published'] && function_exists( 'ogo_get_time' ) || ( OgoTheme::$options['post_view'] && function_exists( 'ogo_views' ) ) || OgoTheme::$options['blog_cats'] ) ? true : false;

$ogo_comments_number = number_format_i18n( get_comments_number() );
$ogo_comments_html = $ogo_comments_number == 1 ? esc_html__( 'Comment' , 'ogo' ) : esc_html__( 'Comments' , 'ogo' );
$ogo_comments_html = '<span class="comment-number">'. $ogo_comments_number .'</span> '. $ogo_comments_html;
$ogo_author_bio = get_the_author_meta( 'description' );

$ogo_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$ogo_time_html       = apply_filters( 'ogo_single_time', $ogo_time_html );
$youtube_link = get_post_meta( get_the_ID(), 'ogo_youtube_link', true );

if ( empty(has_post_thumbnail() ) ) {
	$img_class ='no-image';
}else {
	$img_class ='show-image';
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

	<input type="hidden" id="ogo-cat-ids" value="<?php echo implode(',', wp_get_post_categories( get_the_ID(), array( 'fields' => 'ids' ) ) ); ?>">

	<?php if ( OgoTheme::$options['post_style'] == 'style1' ) { ?>
		<div id="contentHolder">
            <div class="post-detail-style1">
                <div class="container">
                    <h1 class="entry-title title-size-lg title-dark-color"><?php the_title();?></h1>
                    <div class="entry-thumbnail-area <?php echo esc_attr($img_class); ?>">
                        <?php if ( OgoTheme::$options['post_featured_image'] == true ) { ?>
                        <?php if ( has_post_thumbnail() ) { ?>
                            <?php the_post_thumbnail( 'full' ); ?><?php } ?><?php } ?>
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
								<div class="entry-content"><?php the_content();?>
									<?php wp_link_pages( array(
										'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'ogo' ),
										'after'       => '</div>',
										'link_before' => '<span class="page-number">',
										'link_after'  => '</span>',
									) ); ?>
								</div>					
								<?php endwhile; ?> 
								</div> 
							</main>
						</div>
					<?php if ( OgoTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="amt-sidebar-space <?php echo ( OgoTheme::$options['scroll_post_enable'] == 1 ) ? esc_attr( 'ajax-scroll-post' ) : ''; ?>">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'template-parts/content-single', get_post_format() );?>						
						<?php endwhile; ?> 
					</div> 
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<?php get_footer(); ?>