<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

use FluentForm\App\Services\FormBuilder\Components\Name;
use OgoTheme;
use OgoTheme_Helper;
use \WP_Query;
use Elementor\Group_Control_Image_Size;

// $prefix      = OGO_CORE_THEME_PREFIX;
$thumb_size  = 'ogo-size6';

// // if ( get_query_var('paged') ) {
// // 	$paged = get_query_var('paged');
// // }
// // else if ( get_query_var('page') ) {
// // 	$paged = get_query_var('page');
// // }
// // else {
// // 	$paged = 1;
// // }



if ( !empty( $data['cat'] ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'ogo_testimonial_category',
			'field' => 'term_id',
			'terms' => $data['cat'],
		)
	);
}

switch ( $data['orderby'] ) {
	case 'title':
	case 'menu_order':
	$args['order'] = 'ASC';
	break;
}

// $query = new WP_Query( $args );
// $temp = OgoTheme_Helper::wp_set_temp_query( $query );

// $col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
?>
<style>
    .swiper.ogoswiper2{
    width: 100%;
    height: 100%;
    padding: 30px 0;
    }
    .swiper-wrapper{
        align-items: center;
    }
    .swiper-slide {
      text-align: left !important;
      font-size: 18px;
      background: #fff;
      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
    .swiper-slide img {
    display: block;
    /* width: 100%;
    height: 100%; */
    object-fit: contain;
    }

    <?php if ($data['smooth_sliding']=='yes') {
      echo ".swiper-android .swiper-slide, .swiper-wrapper {
          transition-timing-function: linear;
    }";
    }?>
    /* .swiper-android .swiper-slide, .swiper-wrapper {
    transition-timing-function: linear;
    } */
    .swiper-button-next, .swiper-button-prev{
      background-image: <?php ?>;
    }
    .testi_btn_next{
      z-index: 1000;
    }
    .testi_btn_prev{
      z-index: 1000;
    }
</style>

<div class="swiper ogoswiper2">
        <div class=" swiper-wrapper">
            <?php
                $args = array(
                    'post_type'      => 'ogo_testimonial',
                    // 'posts_per_page' => 10,
                );
                $loop = new WP_Query($args);
                while ( $loop->have_posts() ) {
                    $loop->the_post();
                    global $post;
                    $ogo_testimonial_designation 	        = get_post_meta( $post->ID, 'ogo_testimonial_designation', true );
                  $ogo_testimonial_author_avatar 	        = get_post_meta( $post->ID, 'ogo_testimonial_author_avatar', true );
                    $ogo_testimonial_author_name 	        = get_post_meta( $post->ID, 'ogo_testimonial_author_name', true );
                    $ogo_testimonial_author_designation 	= get_post_meta( $post->ID, 'ogo_testimonial_author_designation', true );
                    $ogo_testimonial_rating 	            = get_post_meta( $post->ID, 'ogo_testimonial_rating', true );
            ?>
            <div class="swiper-slide <?php //echo esc_attr( $col_class );?>">
                <div class="testimonial-item-2">
                    <div class="testimonial-content-wrap">
                        <div class="testimonial-content">					
                            <h3 class="testimonial-title"><a href="<?php //the_permalink();?>"><?php //the_title();?></a></h3>
                            <div class="amt_testimonial_content">
                                <?php 
                                    the_content();
                                    ?>
                            </div>
                            <div class="author_detail">
                                <div class="author_thumb">
                                    <div class="testimonial-thums">
                                        <a href="<?php the_permalink();?>">
                                            <?php
                                            if ( has_post_thumbnail() ){
                                                the_post_thumbnail( $thumb_size );
                                            } else {
                                                echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_asset_file( 'element/noimage_560X680.jpg' ) . '" alt="'.get_the_title().'">';
                                            }
                                            ?>
                                        </a>
                                    </div>
                                    <?php if ( $ogo_testimonial_author_avatar ) { ?>
                                        <div class="author_image"><?php //echo esc_html($ogo_testimonial_author_avatar);?></div>
                                    <?php } ?>
                                </div>
                                <div class="author_meta">
                                    <!-- <div class="ratting">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div> -->
                                    <div class="star-ratings">
                                      <div class="fill-ratings" style="width: <?php echo (($ogo_testimonial_rating)*20)?>%;">
                                            <span>★★★★★</span>
                                        </div>
                                        <div class="empty-ratings">
                                            <span>★★★★★</span>
                                        </div>
                                    </div>
                                    <div class="author_name">
                                        <?php 
                                            if ( $ogo_testimonial_author_name ) { 
                                                echo esc_html($ogo_testimonial_author_name);
                                            } 
                                        ?>
                                    </div>
                                    <?php if ( $ogo_testimonial_author_designation ) { ?>
                                        <div class="author_designation"><?php echo esc_html($ogo_testimonial_author_designation);?></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
                wp_reset_query();
            ?>
        </div>
      <?php
      $show_dots = ( in_array( $data['navigation'], [ 'dots', 'both' ] ) );
      $show_arrows = ( in_array( $data['navigation'], [ 'arrows', 'both' ] ) );
      ?>
      <?php if ( $show_arrows ) : ?>
        <!-- <div class="swiper-button-next testi_btn_next"></div>
        <div class="swiper-button-prev testi_btn_prev"></div> -->
      <?php endif; ?>
      
      <?php if ( $show_dots ) : ?>
        <div class="swiper-pagination testi_pagination"></div>
      <?php endif; ?>  
</div>



<?php 
$scripts = '
<script>
    jQuery( document ).ready(function() {
          var ogoswiper2 = new Swiper(".ogoswiper2", {';
$scripts .= 'slidesPerView: '.$data['slide_perview2'].',
            spaceBetween: '.$data['space_between']['size'].',
            slidesPerGroup: '.$data['slide_per_group'].',
            speed: '.$data['autoplay_speed'].',';
            
if ($data['autoplay']=="yes") {
  $scripts .= 'autoplay: {delay:3000},';
}elseif ($data['smooth_sliding']=='yes') {
  $scripts .= 'autoplay: {delay:1},';
}
if ($data['loop']=="yes") {
  $scripts .= 'loop: true,';
}
$scripts .= '            
            pagination: {
              el: ".swiper-pagination",
              clickable: true,
            },
            // navigation: {
            //   nextEl: ".swiper-button-next",
            //   prevEl: ".swiper-button-prev",
            // },
            breakpoints: {
              320: {
                slidesPerView: '.$data['slide_perview2_mobile'].',
                spaceBetween: '.$data['space_between_mobile']['size'].',
              },
              768: {
                slidesPerView: '.$data['slide_perview2_tablet'].',
                spaceBetween: '.$data['space_between_tablet']['size'].',
              },
              1024: {
                slidesPerView: '.$data['slide_perview2'].',
                spaceBetween: '.$data['space_between']['size'].',
              },
            },
          });
    });
</script>';

echo $scripts;

?>