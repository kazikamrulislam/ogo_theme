<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'ogo-size1';

$ogo_has_entry_meta  = ( OgoTheme::$options['blog_date'] || OgoTheme::$options['blog_author_name'] || OgoTheme::$options['blog_comment_num'] || OgoTheme::$options['blog_length'] && function_exists( 'ogo_reading_time' ) || OgoTheme::$options['blog_view'] && function_exists( 'ogo_views' ) ) ? true : false;

$ogo_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$ogo_time_html       = apply_filters( 'ogo_single_time', $ogo_time_html );

$ogo_comments_number = number_format_i18n( get_comments_number() );
$ogo_comments_html = $ogo_comments_number == 1 ? esc_html__( 'Comment' , 'ogo' ) : esc_html__( 'Comments' , 'ogo' );
$ogo_comments_html = '<span class="comment-number">'. $ogo_comments_number .'</span> ' . $ogo_comments_html;

$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), OgoTheme::$options['post_content_limit'], '.' );

$wow = OgoTheme::$options['blog_animation'];
$effect = OgoTheme::$options['blog_animation_effect'];

$youtube_link = get_post_meta( get_the_ID(), 'ogo_youtube_link', true );

if ( empty(has_post_thumbnail() ) ) {
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

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-5 ' . $wow . ' ' . $effect ); ?> data-wow-duration="1.5s">
	<div class="blog-box <?php echo esc_attr($img_class); ?> <?php echo esc_attr($preview); ?>">
		<div class="entry-content">
			<?php if ( OgoTheme::$options['blog_cats'] ) { ?>
				<span class="entry-categories style-1"><?php echo ogo_category_prepare(); ?></span>
			<?php } ?>
			<?php if ( $ogo_has_entry_meta ) { ?>
			<ul class="entry-meta">
				<?php if ( OgoTheme::$options['blog_date'] ) { ?>	
				<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>
				<?php } if ( OgoTheme::$options['blog_author_name'] ) { ?>
				<li class="post-author"><i class="far fa-user"></i><?php esc_html_e( 'by ', 'ogo' );?><?php the_author_posts_link(); ?></li>
				<?php } if ( OgoTheme::$options['blog_comment_num'] ) { ?>
				<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $ogo_comments_html , 'alltext_allow' );?></a></li>
				<?php } if ( OgoTheme::$options['blog_length'] && function_exists( 'ogo_reading_time' ) ) { ?>
				<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo ogo_reading_time(); ?></li>
				<?php } if ( OgoTheme::$options['blog_view'] && function_exists( 'ogo_views' ) ) { ?>
				<li><span class="post-views meta-item "><i class="fas fa-signal"></i><?php echo ogo_views(); ?></span></li>
				<?php } ?>
			</ul>
			<?php } ?>
			<h3 class="entry-title title-size-xl title-dark-color"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			<?php if ( OgoTheme::$options['blog_content'] ) { ?>
			<div class="entry-text"><p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p></div>
			<?php } ?>	
			<div class="post-read-more"><a class="button-style-1" href="<?php the_permalink();?>"><?php echo esc_html( OgoTheme::$options['button_text'] );?><i class="fas fa-arrow-right"></i></a>
	        </div>	
		</div>
	</div>
</div>