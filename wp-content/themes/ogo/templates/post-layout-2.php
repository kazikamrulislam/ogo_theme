<?php
/**
 * Template Name: Post Layout 2
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
$ogo_has_entry_meta  = ( OgoTheme::$options['post_date'] || OgoTheme::$options['post_author_name'] || OgoTheme::$options['post_comment_num'] || ( OgoTheme::$options['post_length'] && function_exists( 'ogo_reading_time' ) ) || OgoTheme::$options['post_published'] && function_exists( 'ogo_get_time' ) || ( OgoTheme::$options['post_view'] && function_exists( 'ogo_views' ) ) ) ? true : false;

$ogo_comments_number = number_format_i18n( get_comments_number() );
$ogo_comments_html = $ogo_comments_number == 1 ? esc_html__( 'Comment' , 'ogo' ) : esc_html__( 'Comments' , 'ogo' );
$ogo_comments_html = '<span class="comment-number">'. $ogo_comments_number .'</span> '. $ogo_comments_html;
$ogo_author_bio = get_the_author_meta( 'description' );

$ogo_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$ogo_time_html       = apply_filters( 'ogo_single_time', $ogo_time_html );
$youtube_link = get_post_meta( get_the_ID(), 'ogo_youtube_link', true );

if( OgoTheme::$options['display_no_preview_image'] == '1' ) {
	$preview = 'show-preview';
}else {
	$preview = 'no-preview';
}
if ( empty( has_post_thumbnail() ) ) {
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
					<div class="entry-header">						
						
						<?php if ( $ogo_has_entry_meta ) { ?>
						<ul class="entry-meta meta-light-color">				
							<?php if ( OgoTheme::$options['post_date'] ) { ?>
							<li><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>
							<?php } if ( OgoTheme::$options['post_author_name'] ) { ?>	
							<li class="post-author"><i class="far fa-user"></i><?php esc_html_e( 'by ', 'ogo' );?><?php the_author_posts_link(); ?></li>
							<?php } if ( OgoTheme::$options['post_comment_num'] ) { ?>
							<li><i class="far fa-comments"></i><?php echo wp_kses( $ogo_comments_html , 'alltext_allow' ); ?></li>
							<?php } if ( OgoTheme::$options['post_length'] && function_exists( 'ogo_reading_time' ) ) { ?>
							<li class="meta-reading-time meta-item"><i class="far fa-clock"></i><?php echo ogo_reading_time(); ?></li>
							<?php } if ( OgoTheme::$options['post_view'] && function_exists( 'ogo_views' ) ) { ?>
							<li><i class="fas fa-signal"></i><span class="meta-views meta-item "><?php echo ogo_views(); ?></span></li>
							<?php } if ( OgoTheme::$options['post_published'] && function_exists( 'ogo_get_time' ) ) { ?>	
							<li><i class="fas fa-clock"></i><?php echo ogo_get_time(); ?></li>
							<?php } ?>
						</ul>
						<?php } ?>
					</div>
				</div>	
			</div>	
		</div>
		<div class="container">
			<div class="row">
				<?php if ( OgoTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
					<div class="<?php echo esc_attr( $ogo_layout_class );?> <?php echo esc_attr( $sidebar_order ) ?>">
						<main id="main" class="site-main">
							<div class="amt-sidebar-space post-detail-style3 <?php echo ( OgoTheme::$options['scroll_post_enable'] == 1 ) ? esc_attr( 'ajax-scroll-post' ) : ''; ?>">
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'template-parts/content-single-2', get_post_format() );?>						
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