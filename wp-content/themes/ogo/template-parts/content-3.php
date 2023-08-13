<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
$ul_class = $post_classes = '';

$thumb_size = 'full';

$ogo_has_entry_meta  = ( OgoTheme::$options['blog_date'] || OgoTheme::$options['blog_author_name'] || OgoTheme::$options['blog_comment_num'] || OgoTheme::$options['blog_length'] && function_exists( 'ogo_reading_time' ) || OgoTheme::$options['blog_view'] && function_exists( 'ogo_views' ) || OgoTheme::$options['blog_cats'] ) ? true : false;

$ogo_time_html = sprintf( '<span>%s</span> <span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );

$ogo_comments_number = number_format_i18n( get_comments_number() );
$ogo_comments_html = $ogo_comments_number == 1 ? esc_html__( 'Comment' , 'ogo' ) : esc_html__( 'Comments' , 'ogo' );
$ogo_comments_html = '<span class="comment-number">'. $ogo_comments_number .'</span> ' . $ogo_comments_html;

$thumbnail = false;

$wow = OgoTheme::$options['blog_animation'];
$effect = OgoTheme::$options['blog_animation_effect'];

if (  OgoTheme::$layout == 'right-sidebar' || OgoTheme::$layout == 'left-sidebar' ){
	$post_classes = array( 'col-xl-12 col-lg-12 col-md-12 col-12 blog-layout-3 ' . $wow . ' ' . $effect );
	$ul_class = 'side_bar';
} else {
	$post_classes = array( 'col-12 blog-layout-3 ' . $wow . ' ' . $effect );
	$ul_class = '';
}

if ( empty( has_post_thumbnail() ) ) {
	$img_class ='no-image';
}else {
	$img_class ='show-image';
}

if( OgoTheme::$options['display_no_preview_image'] == '1' ) {
	$preview = 'show-preview';
}else {
	$preview = 'no-preview';
}

if( OgoTheme::$options['image_blend'] == 'normal' ) {
	$blend = 'normal';
}else {
	$blend = 'blend';
}

$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), OgoTheme::$options['post_content_limit'], '.' );
$youtube_link = get_post_meta( get_the_ID(), 'ogo_youtube_link', true );

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?> data-wow-duration="1.5s">
	<div class="blog-box <?php echo esc_attr($img_class); ?> <?php echo esc_attr($preview); ?>">
		<div class="entry-content">
			<h3 class="entry-title title-size-lg title-dark-color"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>	
		</div>
		<div class="blog-img-holder <?php echo esc_attr($blend); ?>">
			<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
				<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn size-md amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
			<?php } ?>
			<a href="<?php the_permalink(); ?>" class="figure-overlay"><?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail( $thumb_size, ['class' => ''] ); ?>
					<?php } elseif ( OgoTheme::$options['display_no_preview_image'] == '1' ) {
						echo '<img class="wp-post-image" src="'.OGO_ASSETS_URL.'element/noimage_560X680.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
					}
				?>
			</a>
		</div>
		<div class="entry-content">
			<?php if ( $ogo_has_entry_meta ) { ?>			
			<ul class="entry-meta meta-dark-color">
			<?php if ( OgoTheme::$options['blog_date'] ) { ?>	
				<li class="post-date"><?php echo get_the_date(); ?></li>
				<?php } if ( OgoTheme::$options['blog_length'] && function_exists( 'ogo_reading_time' ) ) { ?>
				<li class="post-reading-time meta-item"><?php echo ogo_reading_time(); ?></li>
				<?php } if ( OgoTheme::$options['blog_author_name'] ) { ?>
				<li class="post-author"><?php esc_html_e( 'by ', 'ogo' );?><?php the_author_posts_link(); ?></li>
				<?php } if ( OgoTheme::$options['blog_cats'] ) { ?>			
				<li class="blog-cat"><?php echo the_category( '  ' );?></li>
				<?php } ?>
			</ul>
			<?php } ?>
			<?php if ( OgoTheme::$options['blog_content'] ) { ?>
			<div class="entry-text amt-content-style"><p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p></div>
			<?php } ?>	
		</div>
	</div>
</div> 
