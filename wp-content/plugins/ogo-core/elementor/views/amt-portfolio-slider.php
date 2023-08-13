<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

use Elementor\Group_Control_Image_Size;
use Elementor\Icons_Manager;
use OgoTheme;
use OgoTheme_Helper;
use \WP_Query;


$prefix      = OGO_CORE_THEME_PREFIX;
$thumb_size  = 'ogo-size6';

if (get_query_var('paged')) {
  $paged = get_query_var('paged');
} else if (get_query_var('page')) {
  $paged = get_query_var('page');
} else {
  $paged = 1;
}

$args = array(
  'post_type'      => 'ogo_portfolio',
  'orderby'        => $data['orderby'],
  'paged' => $paged
);

if (!empty($data['cat'])) {
  $args['tax_query'] = array(
    array(
      'taxonomy' => 'ogo_portfolio_category',
      'field' => 'term_id',
      'terms' => $data['cat'],
    )
  );
}

switch ($data['orderby']) {
  case 'title':
  case 'menu_order':
    $args['order'] = 'ASC';
    break;
}

$query = new WP_Query($args);
$temp = OgoTheme_Helper::wp_set_temp_query($query);

?>

<style>
  .amt-portfolio-holder {
    position: relative;
  }

  .portfolio_pagination.swiper-pagination-bullets {
    left: 50%;
    transform: translate(-50%, 0);
    bottom: -10px;
  }

  .portfolio_pagination span.swiper-pagination-bullet {
    margin: 0 10px 0 10px;
    height: 15px;
    width: 15px
  }

  .swiper.ogo-portfolio-slider {
    width: 100%;
    height: 100%;
    padding: 30px 0;
  }

  .swiper-wrapper {
    align-items: center;
  }

  .swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
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
    object-fit: contain;
  }

  <?php if ($data['smooth_sliding'] == 'yes') {
    echo ".swiper-android .swiper-slide, .swiper-wrapper {
          transition-timing-function: linear;
        }";
  } ?>.swiper-button-next,
  .swiper-button-prev {
    background-image: <?php ?>;
  }

  .portfolio_btn_next {
    z-index: 1000;
  }

  .portfolio_btn_prev {
    z-index: 1000;
  }
</style>

<div class="amt-portfolio-holder">
  <div class="swiper ogo-portfolio-slider">
    <div class="swiper-wrapper">
      <?php
      if ($query->have_posts()) :
        while ($query->have_posts()) :
          $query->the_post();
          $id                = get_the_id();
          $portfolio_client  = get_post_meta($id, 'ogo_portfolio_client', true);
      ?>
          <div class="swiper-slide">
            <div class="amt-portfolio-slider">
              <div class="row amt-portfolio-slider <?php echo esc_attr($data['item_space']); ?>">
                <div class="porfolio-thums <?php echo esc_attr($col_class); ?>">
                  <a href="<?php the_permalink(); ?>">
                    <?php
                    if (has_post_thumbnail()) {
                      the_post_thumbnail($thumb_size);
                    } else {
                      echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_asset_file('element/noimage_560X680.jpg') . '" alt="' . get_the_title() . '">';
                    }
                    ?>
                  </a>
                  <div class="portfolio-single-content">
                    <div class="portfolio-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                    <?php if ($data['content_display'] == 'yes') { ?>
                      <div class="portfolio-client">
                        <p>For - <?php echo wp_kses_post($portfolio_client); ?></p>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php
      endif;
         OgoTheme_Helper::wp_reset_temp_query($temp);
      ?>

    </div>
  </div>
  <?php
  $show_portfolio_dots = (in_array($data['portfolio-navigation'], ['portfolio_dots', 'portfolio_both']));
  $show_portfolio_arrows = (in_array($data['portfolio-navigation'], ['portfolio_arrows', 'portfolio_both']));
  ?>
  <?php if ($show_portfolio_arrows) : ?>
    <div class="swiper-button-next portfolio_btn_next"></div>
    <div class="swiper-button-prev portfolio_btn_prev"></div>
  <?php endif; ?>

  <?php if ($show_portfolio_dots) : ?>
    <div class="swiper-pagination portfolio_pagination"></div>
  <?php endif; ?>
</div>

<?php
$scripts = '
<script>
    jQuery( document ).ready(function() {
          var ogoPortfolioSlider = new Swiper(".ogo-portfolio-slider", {';
$scripts .= 'slidesPerView: ' . $data['slide_perview'] . ',
            spaceBetween: ' . $data['space_between']['size'] . ',
            slidesPerGroup: ' . $data['slide_per_group'] . ',
            speed: ' . $data['autoplay_speed'] . ',';

if ($data['autoplay'] == "yes") {
  $scripts .= 'autoplay: {delay:3000},';
} elseif ($data['smooth_sliding'] == 'yes') {
  $scripts .= 'autoplay: {delay:1},';
}
if ($data['loop'] == "yes") {
  $scripts .= 'loop: true,';
}
$scripts .= '            
            pagination: {
              el: ".portfolio_pagination",
              clickable: true,
            },
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
            breakpoints: {
              320: {
                slidesPerView: ' . $data['slide_perview_mobile'] . ',
                spaceBetween: ' . $data['space_between_mobile']['size'] . ',
              },
              768: {
                slidesPerView: ' . $data['slide_perview_tablet'] . ',
                spaceBetween: ' . $data['space_between_tablet']['size'] . ',
              },
              1024: {
                slidesPerView: ' . $data['slide_perview'] . ',
                spaceBetween: ' . $data['space_between']['size'] . ',
              },
            },
          });
    });
</script>';

echo $scripts;

?>