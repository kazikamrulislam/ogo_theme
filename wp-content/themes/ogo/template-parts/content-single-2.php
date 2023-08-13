<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0 
 */

$ogo_has_entry_meta  = ( OgoTheme::$options['post_date'] || OgoTheme::$options['post_author_name'] || OgoTheme::$options['post_comment_num'] || ( OgoTheme::$options['post_length'] && function_exists( 'ogo_reading_time' ) ) || ( OgoTheme::$options['post_view'] && function_exists( 'ogo_views' ) ) ) ? true : false;

$ogo_comments_number = number_format_i18n( get_comments_number() );
$ogo_comments_html = $ogo_comments_number == 1 ? esc_html__( 'Comment' , 'ogo' ) : esc_html__( 'Comments' , 'ogo' );
$ogo_comments_html = '<span class="comment-number">'. $ogo_comments_number .'</span> '. $ogo_comments_html;
$ogo_author_bio = get_the_author_meta( 'description' );

$ogo_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$ogo_time_html       = apply_filters( 'ogo_single_time', $ogo_time_html );

$author = $post->post_author;

$news_author_fb = get_user_meta( $author, 'ogo_facebook', true );
$news_author_tw = get_user_meta( $author, 'ogo_twitter', true );
$news_author_ld = get_user_meta( $author, 'ogo_linkedin', true );
$news_author_pr = get_user_meta( $author, 'ogo_pinterest', true );
$ogo_author_designation = get_user_meta( $author, 'ogo_author_designation', true );

$post_layout_ops = get_post_meta( get_the_ID() ,'ogo_post_layout', true );
$youtube_link = get_post_meta( get_the_ID(), 'ogo_youtube_link', true );

?>
<div id="post-<?php the_ID(); ?>" <?php post_class($post_layout_ops); ?>>
	<div class="entry-content amt-single-content"><?php the_content();?>
		<?php wp_link_pages( array(
			'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'ogo' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) ); ?>
	</div>
	<?php if ( ( OgoTheme::$options['post_tags'] && has_tag() ) || ( OgoTheme::$options['post_share']  && ( function_exists( 'ogo_post_share' ) ) ) ) { ?>
	<div class="entry-footer">
		<div class="entry-footer-meta">
			<?php if ( OgoTheme::$options['post_tags'] && has_tag() ) { ?>
			<div class="entry-meta-tags">
				<h4 class="meta-title"><?php esc_html_e( 'Tags:', 'ogo' );?></h4><?php echo get_the_term_list( $post->ID, 'post_tag', '' ); ?>
			</div>	
			<?php } if ( ( OgoTheme::$options['post_share'] ) && ( function_exists( 'ogo_post_share' ) ) ) { ?>
			<div class="post-share"><h4 class="meta-title"><?php esc_html_e( 'Share This Post:', 'ogo' );?></h4><?php ogo_post_share(); ?></div>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
	<!-- author bio -->
	<?php if ( OgoTheme::$options['post_author_bio'] == '1' ) { ?>
		<?php if ( !empty ( $ogo_author_bio ) ) { ?>
		<div class="media about-author">
			<div class="<?php if ( is_rtl() ) { ?>pull-right<?php } else { ?>pull-left<?php } ?>">
				<?php echo get_avatar( $author, 105 ); ?>
			</div>
			<div class="media-body">
				<div class="about-author-info">
					<h3 class="author-title"><?php the_author_posts_link();?></h3>
					<div class="author-designation"><?php if ( !empty ( $ogo_author_designation ) ) {	echo esc_html( $ogo_author_designation ); } else {	$user_info = get_userdata( $author ); echo esc_html ( implode( ', ', $user_info->roles ) );	} ?></div>
				</div>
				<?php if ( $ogo_author_bio ) { ?>
				<div class="author-bio"><?php echo esc_html( $ogo_author_bio );?></div>
				<?php } ?>
				<ul class="author-box-social">
					<?php if ( ! empty( $news_author_fb ) ){ ?><li><a href="<?php echo esc_attr( $news_author_fb ); ?>"><i class="fab fa-facebook-f"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_tw ) ){ ?><li><a href="<?php echo esc_attr( $news_author_tw ); ?>"><i class="fab fa-twitter"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_ld ) ){ ?><li><a href="<?php echo esc_attr( $news_author_ld ); ?>"><i class="fab fa-linkedin-in"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_pr ) ){ ?><li><a href="<?php echo esc_attr( $news_author_pr ); ?>"><i class="fab fa-pinterest"></i></a></li><?php } ?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
	<?php } ?>
	<!-- next/prev post -->
	<?php if ( OgoTheme::$options['post_links'] ) { ogo_post_links_next_prev(); } ?>
	
	<?php
	if ( comments_open() || get_comments_number() ){
		comments_template();
	}
	?>	
	<?php if( OgoTheme::$options['show_related_post'] == '1' && is_single() && !empty ( ogo_related_post() ) ) { ?>
		<div class="related-post">
			<?php ogo_related_post(); ?>
		</div>
	<?php } ?>

	<?php if ( OgoTheme::$options['after_post_ad_option'] ) { ?>
	<div class="content-bottom-ad">
		<div class="content-bottom-item">
			<?php if ( OgoTheme::$options['ad_after_post_type'] == 'post_after_adimage' ) { ?>
			<?php if (OgoTheme::$options['post_after_ad_img_link']){
				$target = OgoTheme::$options['post_after_ad_img_target']? 'target="_blank"':'';
				echo '<a '.$target.'  href="'.esc_url( OgoTheme::$options['post_after_ad_img_link'] ).'">'.wp_get_attachment_image( OgoTheme::$options['post_after_adimage'], 'full' ).'</a>';

			} else {
				echo wp_get_attachment_image( OgoTheme::$options['post_after_adimage'], 'full' );
			}?>	

			<?php } else {
				echo OgoTheme::$options['post_after_adcustom'];
			} ?>		
		</div>
	</div>
	<?php } ?>		
</div>