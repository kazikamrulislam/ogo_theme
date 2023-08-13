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

$ogo_has_entry_meta  = ( $data['post_author'] == 'yes' || $data['post_category'] == 'yes' || $data['post_date'] == 'yes' || $data['post_comment'] == 'yes' || $data['post_length'] == 'yes' && function_exists( 'ogo_reading_time' ) || $data['post_view'] == 'yes' && function_exists( 'ogo_views' ) ) ? true : false;

$thumb_size = 'blog-thumb-size1';

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

$col_class = "col-xl-{$data['col_xl']} col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-{$data['col']}";

?>
<div class="amt-post-grid-default amt-post-grid-<?php echo esc_attr( $data['style'] );?>">
	<div class="blog-loadmore-style2">
		<div class="row  <?php echo esc_attr( $data['item_gutter'] );?>">
		<?php $i = $data['delay']; $j = $data['duration']; 
			if ( $query->have_posts() ) :?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php

				$content = OgoTheme_Helper::get_current_post_content();
				$content = wp_trim_words( get_the_excerpt(), $data['count'], '.' );
				$content = "<p>$content</p>";
				$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
				
				$ogo_comments_number = number_format_i18n( get_comments_number() );
				$ogo_comments_html = $ogo_comments_number > 1  ? esc_html__( 'Comments' , 'ogo-core' ) : esc_html__( 'Comment' , 'ogo-core' );
				$ogo_comments_html = '<span class="comment-number">'. $ogo_comments_number . '</span> ' . $ogo_comments_html;
			
				$ogo_time_html = sprintf( '<span><span>%s </span>%s %s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );

				$id = get_the_ID();
				$youtube_link = get_post_meta( get_the_ID(), 'ogo_youtube_link', true );

				?>
				<div class="amt-grid-item <?php echo esc_attr( $col_class );?>">
					<div class="amt-item <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
						<div class="amt-image">
							<?php if ( ( $data['post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
								<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn <?php echo esc_attr( $data['play_button_size'] );?> amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
							<?php } ?>
							<a href="<?php the_permalink(); ?>">
								<?php
									if ( has_post_thumbnail() ){
										the_post_thumbnail( $thumb_size );
									} else {
										echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_asset_file( 'element/noimage_540X400.jpg' ) . '" alt="'.get_the_title().'">';
									}
								?>
							</a>				
						</div>
						<div class="entry-content">	
							<?php if ( $ogo_has_entry_meta ) { ?>
							<ul class="entry-meta">
								<?php if ( $data['post_date'] == 'yes' ) { ?>	
								<li class="post-date"><?php echo get_the_date(); ?></li>
								<?php } if ( $data['post_author'] == 'yes' ) { ?>
								<li class="post-author"><?php esc_html_e( 'by ', 'ogo' );?><?php the_author_posts_link(); ?></li>
								<?php } if ( $data['post_comment'] == 'yes' ) { ?>
								<li class="post-comment"><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $ogo_comments_html , 'alltext_allow' );?></a></li>
								<?php } if ( ( $data['post_length'] == 'yes' ) && function_exists( 'ogo_reading_time' ) ) { ?>
								<li class="post-reading-time meta-item"><?php echo ogo_reading_time(); ?></li>
								<?php } if ( ( $data['post_view'] == 'yes' ) && function_exists( 'ogo_views' ) ) { ?>
								<li><span class="post-views meta-item"><?php echo ogo_views(); ?></span></li>
								<?php } if ( $data['post_category'] == 'yes' ) { ?>			
								<li class="post_cats"><?php echo the_category( '  ' );?></li>
								<?php } ?>
							</ul>
							<?php } ?>					
							<h3 class="entry-title title-size-lg title-dark-color"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>
							<?php if ( $data['content_display'] == 'yes' ) { ?>
								<div class="post_excerpt"><?php echo wp_kses_post( $content );?></div>
							<?php } ?>						
						</div>
					</div>
				</div>
			<?php $i = $i + 0.2; $j = $j + 0.1; endwhile;?>
		</div>
		<?php endif;?>
	</div>
	<div class="text-center blog-loadmore">
		<?php 
		$args['posts_not_in'] = $data['posts_not_in'];
		$args['itemlimit'] = $data['itemlimit']['size'];
		$args['post_ordering'] = $data['post_ordering'];
		$args['post_orderby'] = $data['post_orderby'];
		$args['post_category'] = $data['post_category'];
		$args['catid'] = $data['catid'];
		$args['postid'] = $data['postid'];
		$args['query_type'] = $data['query_type'];
		$args['number_of_post_offset'] = $data['number_of_post_offset'];
		$args['post_author'] = $data['post_author'];
		$args['post_date'] = $data['post_date'];
		$args['post_comment'] = $data['post_comment'];
		$args['post_length'] = $data['post_length'];
		$args['post_view'] = $data['post_view'];
		$args['post_category'] = $data['post_category'];
		$args['title_count'] = $data['title_count'];
		$args['count'] = $data['count'];
		$args['post_read'] = $data['post_read'];
		$args['content_display'] = $data['content_display'];
		$args['animation'] = $data['animation'];
		$args['animation_effect'] = $data['animation_effect'];
		$args['delay'] = $data['delay'];
		$args['duration'] = $data['duration'];
		$args['post_video'] = $data['post_video'];
		$args['read_more_text'] = $data['read_more_text'];

		$encoded_data = wp_json_encode( $args ); ?>
		<?php if ( $data['loadmore_display'] == 'yes' ) { ?>
	      	<a href="#" id="blog_loadMore_style2" class="loadMore" data-loadmore='<?php echo esc_attr( $encoded_data ) ;?>'><?php echo wp_kses_post( $data['button_text'] ); ?></a>
	      <?php } ?>
    </div>
	<?php OgoTheme_Helper::wp_reset_temp_query( $temp );?>
</div>