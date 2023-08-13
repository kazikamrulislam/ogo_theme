<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

if( ! function_exists( 'ogo_related_portfolio' )){
	
	function ogo_related_portfolio(){
		$thumb_size = 'ogo-size4';
		$post_id = get_the_id();	
		$number_of_avail_post = '';
		$current_post = array( $post_id );	
		// $title_length = OgoTheme::$options['show_related_post_title_limit'] ? OgoTheme::$options['show_related_post_title_limit'] : '';
		$related_portfolio_number = OgoTheme::$options['show_related_portfolio_number'];

		# Making ready to the Query ...
		$query_type = OgoTheme::$options['related_post_query'];

		$args = array(
			// 'post_type'				 => 'ogo_portfolio',
			'post__not_in'           => $current_post,
			'posts_per_page'         => $related_portfolio_number,
			'no_found_rows'          => true,
			'post_status'            => 'publish',
			'ignore_sticky_posts'    => true,
			'update_post_term_cache' => false,
		);

		# Checking Related Posts Order ----------
		if( OgoTheme::$options['related_post_sort'] ){

			$post_order = OgoTheme::$options['related_post_sort'];

			if( $post_order == 'rand' ){

				$args['orderby'] = 'rand';
			}
			elseif( $post_order == 'views' ){

				$args['orderby']  = 'meta_value_num';
				$args['meta_key'] = 'ogo_views';
			}
			elseif( $post_order == 'popular' ){

				$args['orderby'] = 'comment_count';
			}
			elseif( $post_order == 'modified' ){

				$args['orderby'] = 'modified';
				$args['order']   = 'ASC';
			}
			elseif( $post_order == 'recent' ){

				$args['orderby'] = '';
				$args['order']   = '';
			}
		}


		# Get related posts by author ----------
		if( $query_type == 'author' ){
			$args['author'] = get_the_author_meta( 'ID' );
		}

		# Get related posts by tags ----------
		elseif( $query_type == 'tag' ){
			$tags_ids  = array();
			$post_tags = get_the_terms( $post_id, 'post_tag' );

			if( ! empty( $post_tags ) ){
				foreach( $post_tags as $individual_tag ){
					$tags_ids[] = $individual_tag->term_id;
				}

				$args['tag__in'] = $tags_ids;
			}
		}

		# Get related posts by categories ----------
		else{
			$terms = get_the_terms( $post_id, 'ogo_portfolio_category' );
			if ( $terms && ! is_wp_error( $terms ) ) {
			 
				$port_cat_links = array();
			 
				foreach ( $terms as $term ) {
					$port_cat_links[] = $term->term_id;
				}
			}
			
			$args['tax_query'] = array (
				array (
					'taxonomy' => 'ogo_portfolio_category',
					'field'    => 'ID',
					'terms'    => $port_cat_links,
				)
			);
		}

		# Get the posts ----------
		$related_query = new wp_query( $args );
		
		$count_post = $related_query->post_count;
		if ( $count_post < 4 ) {
			$number_of_avail_post = false;
		} else {
			$number_of_avail_post = true;
		}

		if ( OgoTheme::$options['related_portfolio_auto_play'] == 1 ) {
			$auto_play = true;
		} else {
			$auto_play = false;
		}

		$speed = intval(OgoTheme::$options['related_portfolio_auto_play_speed']);
		$delay = intval(OgoTheme::$options['related_portfolio_auto_play_delay']);
		
		$swiper_data = array(
			'slidesPerView' 	=> 2,
			// 'pagination'		=>true,
			'centeredSlides'	=>false,
			'loop'				=>true,
			'spaceBetween'		=>24,
			'slidesPerGroup'	=> 1,
			'slideToClickedSlide' =>true,
			'autoplay'          => $auto_play,
			'pauseOnMouseEnter' => true,
			'autoplaydelay'     => $delay,
			'speed'             => $speed,
			'breakpoints' =>array(
				'0'    =>array('slidesPerView' =>1),
				'576'    =>array('slidesPerView' =>1),
				'768'    =>array('slidesPerView' =>2),
				'992'    =>array('slidesPerView' =>2),
				'1200'    =>array('slidesPerView' =>2),				
				'1600'    =>array('slidesPerView' =>3)
			),
		);

		$swiper_data = json_encode( $swiper_data );

		?>
		
		<div class="amt-related-portfolio">
		<div class="portfolio-section-title">
                    <h5 class="related-port-subtitle"><?php echo wp_kses( OgoTheme::$options['portfolio_related_sub_title'] , 'alltext_allow' ); ?></h5>
					<h3 class="related-portfolio-title"><?php echo wp_kses( OgoTheme::$options['portfolio_related_title'] , 'alltext_allow' ); ?>
						<span class="titledot"></span>
						<span class="titleline"></span>
					</h3>
                    <p class="related-port-content"><?php echo wp_kses( OgoTheme::$options['portfolio_related_content'] , 'alltext_allow' ); ?></p>				
	            </div>			
				<div class="swiper amt-swiper-slider-portfolio" data-xld='<?php echo esc_attr( $swiper_data ); ?>'>
					<div class="swiper-wrapper">
						<?php
							while ( $related_query->have_posts() ) {
							$related_query->the_post();
							$id                = get_the_id();
							$portfolio_client  = get_post_meta( $id, 'ogo_portfolio_client', true );
						?>
						<div class="portfolio-item swiper-slide">
							<div class="porfolio-thums">
								<a href="<?php the_permalink(); ?>">
									<?php
									if (has_post_thumbnail()) {
										the_post_thumbnail($thumb_size);
									} else {
										echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_asset_file('element/noimage_560X680.jpg') . '" alt="' . get_the_title() . '">';
									}
									?>
								</a>
								<div class="portfolio-content">
									<div class="portfolio-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
									<div class="portfolio-client"><p>For - <?php echo wp_kses_post( $portfolio_client );?></p></div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
					<div class="swiper-pagination"></div>
				</div>
		</div>
		<?php
		wp_reset_postdata();
	}
}
?>