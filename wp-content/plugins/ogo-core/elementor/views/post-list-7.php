<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

use OgoTheme;
use OgoTheme_Helper;
use \WP_Query;

$ogo_has_entry_meta1  = ( $data['post_author'] == 'yes' || $data['post_date'] == 'yes' || $data['post_comment'] == 'yes' || $data['post_length'] == 'yes' && function_exists( 'ogo_reading_time' ) || $data['post_view'] == 'yes' && function_exists( 'ogo_views' ) ) ? true : false;

$ogo_has_entry_meta2  = ( $data['small_post_author'] == 'yes' || $data['small_post_date'] == 'yes' || $data['small_post_comment'] == 'yes' || $data['small_post_length'] == 'yes' && function_exists( 'ogo_reading_time' ) || $data['small_post_view'] == 'yes' && function_exists( 'ogo_views' ) ) ? true : false;

$thumb_size1 = 'ogo-size2';
$thumb_size2 = 'ogo-size3';

$p_ids = array();
foreach ( $data['posts_not_in'] as $p_idsn ) {
	$p_ids[] = $p_idsn['post_not_in'];
}
$args = array(
	'posts_per_page' 	=> $data['itemlimit']['size'],
	'order' 			=> $data['post_ordering'],
	'orderby' 			=> $data['post_orderby'],
	'offset' 	 	 	=> $data['number_of_post_offset'],
	'post__not_in'   	=> $p_ids,
	'post_type'			=> 'post',
	'post_status'		=> 'publish'
);

if(!empty($data['catid'])){
	if( $data['query_type'] == 'category'){
	    $args['tax_query'] = [
	        [
	            'taxonomy' => 'category',
	            'field' => 'term_id',
	            'terms' => $data['catid'],                    
	        ],
	    ];

	}
}
if(!empty($data['postid'])){
	if( $data['query_type'] == 'posts'){
	    $args['post__in'] = $data['postid'];
	}
}

$query = new WP_Query( $args );
$temp = OgoTheme_Helper::wp_set_temp_query( $query );

?>
<div class="amt-post-list-default amt-post-list-<?php echo esc_attr( $data['style'] );?>">
	<?php $count = 1; $i = $data['delay']; $j = $data['duration']; 
		if ( $query->have_posts() ) :?>
		<?php while ( $query->have_posts() ) : $query->the_post();?>
			<?php

			$content = OgoTheme_Helper::get_current_post_content();
			$content = wp_trim_words( get_the_excerpt(), $data['count'], '.' );
			$content = "<p>$content</p>";
			$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
			$small_title = wp_trim_words( get_the_title(), $data['small_title_count'], '' );
			
			$ogo_comments_number = number_format_i18n( get_comments_number() );
			$ogo_comments_html = $ogo_comments_number == 1 ? esc_html__( 'Comment' , 'ogo-core' ) : esc_html__( 'Comments' , 'ogo-core' );
			$ogo_comments_html = '<span class="comment-number">'. $ogo_comments_number . '</span> ' . $ogo_comments_html;
		
			$ogo_time_html = sprintf( '<span><span>%s </span>%s %s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );

			$id = get_the_ID();
			$youtube_link = get_post_meta( get_the_ID(), 'ogo_youtube_link', true );

			?>

			<?php if ( $count == 1 ) { ?>
				<div class="<?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
					<div class="amt-item single-post-item">
						<div class="amt-image">
							<?php if ( ( $data['post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
								<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn size-md amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
							<?php } ?>
							<a href="<?php the_permalink(); ?>">
								<?php
									if ( has_post_thumbnail() ){
										the_post_thumbnail( $thumb_size1 );
									} else {
										echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_asset_file( 'element/noimage_1020X600.jpg' ) . '" alt="'.get_the_title().'">';
									}
								?>
							</a>
							<?php if ( $data['post_category'] == 'yes' ) { ?>
								<?php if ( $data['cat_layout'] == 'cat_layout1' ) { ?>
								<span class="entry-categories style-1 position-absolute"><?php echo ogo_category_prepare(); ?></span>
								<?php } elseif ( $data['cat_layout'] == 'cat_layout2' ) { ?>
								<span class="entry-categories style-2 meta-light-color position-absolute"><?php echo the_category( ', ' );?></span>
								<?php } ?>
							<?php } ?>						
						</div>
						<div class="entry-content">							
							<?php if ( $data['post_date'] == 'yes' ) { ?>	
							<ul class="entry-meta">
								<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>				
							</ul>
							<?php } ?>
							<h3 class="entry-title title-size-lg title-dark-color"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>
							<?php if ( $data['content_display'] == 'yes' ) { ?>
								<div class="post_excerpt"><?php echo wp_kses_post( $content );?></div>
							<?php } ?>
							<?php if ( $ogo_has_entry_meta1 ) { ?>
							<ul class="entry-meta mb-0">
								<?php if ( $data['post_author'] == 'yes' ) { ?>
								<li class="post-author"><i class="far fa-user"></i><?php esc_html_e( 'by ', 'ogo' );?><?php the_author_posts_link(); ?></li>
								<?php } if ( $data['post_comment'] == 'yes' ) { ?>
								<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $ogo_comments_html , 'alltext_allow' );?></a></li>
								<?php } if ( ( $data['post_length'] == 'yes' ) && function_exists( 'ogo_reading_time' ) ) { ?>
								<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo ogo_reading_time(); ?></li>
								<?php } if ( ( $data['post_view'] == 'yes' ) && function_exists( 'ogo_views' ) ) { ?>
								<li><span class="post-views meta-item"><i class="fas fa-signal"></i><?php echo ogo_views(); ?></span></li>
								<?php } ?>
							</ul>
							<?php } ?>
							<?php if ( $data['post_read'] == 'yes' ) { ?>
							<div class="post-read-more"><a class="button-style-1" href="<?php the_permalink();?>"><?php echo wp_kses_post( $data['read_more_text'] ); ?><i class="fas fa-arrow-right"></i></a>
					        </div>
					    	<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>

			<?php if ( $count > 1 ) { ?>
				<div class="<?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
						<div class="amt-item multi-post-item">
							<div class="amt-image mb-0">
								<?php if ( ( $data['small_post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
									<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn size-md amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
								<?php } ?>
								<a href="<?php the_permalink(); ?>">
									<?php
										if ( has_post_thumbnail() ){
											the_post_thumbnail( $thumb_size2 );
										} else {
											echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_asset_file( 'element/noimage_540X400.jpg' ) . '" alt="'.get_the_title().'">';
										}
									?>
								</a>
								<?php if ( $data['small_post_category'] == 'yes' ) { ?>
									<?php if ( $data['cat_layout'] == 'cat_layout1' ) { ?>
									<span class="entry-categories style-1 small-view position-absolute"><?php echo ogo_category_prepare(); ?></span>
									<?php } elseif ( $data['cat_layout'] == 'cat_layout2' ) { ?>
									<span class="entry-categories style-2 small-view meta-light-color position-absolute"><?php echo the_category( ', ' );?></span>
									<?php } ?>
								<?php } ?>					
							</div>				
							<div class="entry-content">		
								<?php if ( $ogo_has_entry_meta2 ) { ?>
								<ul class="entry-meta mb-1">
									<?php if ( $data['small_post_date'] == 'yes' ) { ?>	
									<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>
									<?php } if ( $data['small_post_author'] == 'yes' ) { ?>
									<li class="post-author"><i class="far fa-user"></i><?php esc_html_e( 'by ', 'ogo' );?><?php the_author_posts_link(); ?></li>
									<?php } if ( $data['small_post_comment'] == 'yes' ) { ?>
									<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $ogo_comments_html , 'alltext_allow' );?></a></li>
									<?php } if ( ( $data['small_post_length'] == 'yes' ) && function_exists( 'ogo_reading_time' ) ) { ?>
									<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo ogo_reading_time(); ?></li>
									<?php } if ( ( $data['small_post_view'] == 'yes' ) && function_exists( 'ogo_views' ) ) { ?>
									<li><span class="post-views meta-item"><i class="fas fa-signal"></i><?php echo ogo_views(); ?></span></li>
									<?php } ?>
								</ul>
								<?php } ?>	
								<h3 class="entry-title title-size-sm title-dark-color mb-0"><a href="<?php the_permalink();?>"><?php echo esc_html( $small_title );?></a></h3>								
							</div>
						</div>
					</div>
				<?php } ?>
		<?php $count++; $i = $i + 0.2; $j = $j + 0.1; endwhile;?>
	<?php endif;?>
	<?php OgoTheme_Helper::wp_reset_temp_query( $temp );?>
</div>