<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$ogo_has_entry_meta  = ( OgoTheme::$options['post_date'] || OgoTheme::$options['post_author_name'] || OgoTheme::$options['post_comment_num'] || ( OgoTheme::$options['post_length'] && function_exists( 'ogo_reading_time' ) ) || OgoTheme::$options['post_published'] && function_exists( 'ogo_get_time' ) || ( OgoTheme::$options['post_view'] && function_exists( 'ogo_views' ) ) ) ? true : false;

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

?>
<div id="post-<?php the_ID(); ?>" <?php post_class($post_layout_ops); ?>>
	<div class="main-wrap">
		<?php if ( ( function_exists( 'get_post_format' ) && 'video' == get_post_format( $id ) && !empty( $youtube_link ) )  ) {		
			preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_link, $match);
			$youtube_id = $match[1];
		} ?>
		
		<?php if ( OgoTheme::$options['post_featured_image'] == true ) { ?>
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="entry-thumbnail-area">
					<?php the_post_thumbnail( 'ogo-size1' , ['class' => 'img-responsive'] ); ?>
					<?php if ( OgoTheme::$options['post_cats'] ) { ?>
					<span class="entry-categories style-1 position-absolute">
						<?php echo ogo_single_category_prepare(); ?>
					</span>
				<?php } ?>
				</div>
			<?php } elseif ( OgoTheme::$options['display_no_preview_image'] == '1' ) {
				$thumbnail = '<img class="wp-post-image" src="'.OGO_ELEMENT_URL.'noimage_1096X600.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
			} ?>			
		<?php } ?>
		<div class="entry-header">				
			<?php if ( OgoTheme::$options['post_date'] ) { ?>	
			<ul class="entry-meta mb-1">				
				<li><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>	
			</ul>
			<?php } ?>
			<h1 class="entry-title title-size-lg title-dark-color"><?php the_title();?></h1>
			<div class="d-flex align-items-center justify-content-between flex-wrap">
				<?php if ( $ogo_has_entry_meta ) { ?>
				<ul class="entry-meta mb-3 me-4">				
					<?php if ( OgoTheme::$options['post_author_name'] ) { ?>
					<li class="post-author"><i class="far fa-user"></i><?php esc_html_e( 'by ', 'ogo' );?><?php the_author_posts_link(); ?>
					</li>
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
				<?php if ( ( OgoTheme::$options['post_share'] ) && ( function_exists( 'ogo_post_share' ) ) ) { ?>
					<div class="post-share d-flex mb-3"><span class="me-3 mt-1"><?php esc_html_e( 'Share:', 'ogo' );?></span><?php ogo_post_share(); ?></div>
				<?php } ?>
			</div>
		</div>

		<div class="entry-content"><?php the_content();?>
			<?php wp_link_pages( array(
				'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'ogo' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) ); ?>
		</div>

		<?php if ( !empty($youtube_id) ) { ?>
			<?php if ( ( function_exists( 'get_post_format' ) && 'video' == get_post_format( $id ) )  ) { ?>
				<div class="entry-content entry-thumbnail-area embed-responsive-16by9">
					<div class="embed-responsive">
						<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo esc_attr( $youtube_id ); ?>" allowfullscreen></iframe>
					</div>
				</div>
			<?php } ?>
		<?php } ?>	
		<?php if ( OgoTheme::$options['post_tags'] && has_tag() ) { ?>
			<div class="entry-meta-tags"><?php echo get_the_term_list( $post->ID, 'post_tag', '' ); ?></div>	
		<?php } ?>	
		<!-- author bio -->
		<?php if ( OgoTheme::$options['post_author_bio'] == '1' ) { ?>
			<?php if ( !empty ( $ogo_author_bio ) ) { ?>
			<div class="media about-author">
				<div class="<?php if ( is_rtl() ) { ?>pull-right<?php } else { ?>pull-left<?php } ?>">
					<?php echo get_avatar( $author, 150 ); ?>
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
</div>