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

?>

<style>
    .swiper.ogo-service-swiper {
        width: 100%;
        height: 100%;
        padding: 30px 0;
    }
    .swiper-wrapper {
        align-items: center;
    }
    .services_pagination.swiper-pagination-bullets {
        left: 50%;
        transform:translate(-50%, 0);
        bottom: -10px;
    }
    .services_pagination span.swiper-pagination-bullet {
        margin: 0 10px 0 10px;
        height: 15px;
        width: 15px
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
    } ?>
    .swiper-button-next,
    .swiper-button-prev {
        background-image: <?php ?>;
    }
    .service_btn_next {
        z-index: 1000;
    }
    .service_btn_prev {
        z-index: 1000;
    }
    .amt-service-bg-img:before {
        background-image: url("<?php echo OgoTheme_Helper::get_img('service1-bg-img.svg'); ?>");
    }
    .amt-service-bg-img.hide-bg:before {
        background-image: none;
    }
</style>

<div class="swiper ogo-service-swiper">
    <div class="swiper-wrapper">

        <?php if ($data['style'] == 'style1') { ?>
            <?php
            foreach ($data['service_list'] as $index => $item) :
            ?>
                <div class="swiper-slide">
                    <div class="amt-service-box amt-service-bg-img amt-service-box-shadow <?php echo $item['bg_image_display'] == 'yes' ? '' : 'hide-bg'; ?>">
                        <div class="amt-service1-box amt-service-box-border">
                            <div class="amtservice-media-icon">
                                <i class="<?php echo esc_attr($item['selected_icon_1']['value']); ?>" aria-hidden="true"></i>
                            </div>
                            <div class="amt-service-box-content">
                                <h3 class="amt-service-title"><?php $this->print_unescaped_setting('text_1', 'service_list', $index); ?></h3>
                                <div class="amt-service-content">
                                    <?php $this->print_unescaped_setting('content_1', 'service_list', $index); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        <?php } elseif ($data['style'] == 'style2') { ?>
            <?php
            foreach ($data['service_list_2'] as $index => $item) :
            ?>
                <div class="swiper-slide">
                    <div class="amt-service-box amt-service2-box-border amt-service-box-shadow ">
                        <div class="amt-service2-box amt-service-box-border">
                            <div class="amtservice-media-icon">
                                <i class="<?php echo esc_attr($item['selected_icon_2']['value']); ?>" aria-hidden="true"></i>
                            </div>
                            <div class="amt-service-box-content">
                                <h3 class="amt-service-title"><?php $this->print_unescaped_setting('text_2', 'service_list_2', $index); ?></h3>
                                <div class="amt-service-content">
                                    <?php $this->print_unescaped_setting('content_2', 'service_list_2', $index); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>

        <?php } elseif ($data['style'] == 'style3') { ?>
            <?php
            foreach ($data['service_list_3'] as $index => $item) :
            ?>
                <div class="swiper-slide">
                    <div class="amt-service-box amt-service3-box">
                        <div class="amt-service-box-border">
                            <div class="amtservice-media-icon">
                                <?php if (!empty($item['selected_image_3']['id'])) {
                                    echo wp_get_attachment_image($item['selected_image_3']['id'], 'full');
                                } else {
                                    echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_img('service3-img.png') . '" alt="' . get_the_title() . '">';
                                } ?>
                            </div>
                            <div class="amt-service-box-content">
                                <h3 class="amt-service-title"><?php $this->print_unescaped_setting('text_3', 'service_list_3', $index); ?></h3>
                                <div class="amt-service-content">
                                    <?php $this->print_unescaped_setting('content_3', 'service_list_3', $index); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>

        <?php } elseif ($data['style'] == 'style4') { ?>
            <?php
            foreach ($data['service_list_4'] as $index => $item) :
                $link_key = 'link_' . $index;
                $this->add_link_attributes( $link_key, $item['btn_link'] );
            ?>
                <div class="swiper-slide">
                    <div class="amt-service-box amt-service4-box amt-service-box-shadow <?php echo esc_attr($data['align_items']); ?>">
                        <div class="amt-service-icon-btn">
                            <div class="amtservice-media-icon">
                                <i class="<?php echo esc_attr($item['selected_icon_4']['value']); ?>" aria-hidden="true"></i>
                            </div>
                            <?php if ($item['button_display']  == 'yes') { ?>
                                <div class="amt-service-btn">
                                    <a <?php $this->print_render_attribute_string($link_key); ?>>
                                    <?php $this->print_unescaped_setting('btn_text', 'service_list_4', $index); ?>
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="amt-service-box-content">
                            <h3 class="amt-service-title"><?php $this->print_unescaped_setting('text_4', 'service_list_4', $index); ?></h3>
                            <div class="amt-service-content"><?php $this->print_unescaped_setting('content_4', 'service_list_4', $index); ?></div>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>

        <?php } elseif ($data['style'] == 'style5') { ?>
            <?php
            foreach ($data['service_list_5'] as $index => $item) :
                $link_key = 'link_' . $index;
                $this->add_link_attributes( $link_key, $item['btn_link_5'] );
            ?>
                <div class="swiper-slide">
                    <div class="amt-service-box amt-service5-box">
                        <div class="amt-service-box-content">
                            <h3 class="amt-service-title"><?php $this->print_unescaped_setting('text_5', 'service_list_5', $index); ?></h3>
                            <div class="amt-service-content"><?php $this->print_unescaped_setting('content_5', 'service_list_5', $index); ?></div>
                            <?php if ($item['button_display_5']  == 'yes') { ?>
                                <div class="amt-service-btn">
                                    <a <?php $this->print_render_attribute_string($link_key); ?>>
                                    <?php $this->print_unescaped_setting('btn_text_5', 'service_list_5', $index); ?>
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>

        <?php } elseif ($data['style'] == 'style6') { ?>
            <?php
            foreach ($data['service_list_6'] as $index => $item) :
                $link_key = 'link_' . $index;
                $this->add_link_attributes( $link_key, $item['btn_link_6'] );
            ?>
                <div class="swiper-slide">
                    <div class="amt-service-box amt-service6-box ">
                        <div class="amtservice-media-img">
                            <?php if (!empty($item['selected_image_6']['id'])) {
                                 echo wp_get_attachment_image($item['selected_image_6']['id'], 'full');
                            } else {
                                echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_img('service-6.png') . '" alt="' . get_the_title() . '">';
                            } ?>
                        </div>
                        <div class=" amt-sevice6-right-content amt-service-box-border">
                            <div class="amtservice-media-icon">
                                <i class="<?php echo esc_attr($item['selected_icon_6']['value']); ?>" aria-hidden="true"></i>
                            </div>
                            <div class="amt-service-box-content">
                                <h3 class="amt-service-title"><?php $this->print_unescaped_setting('text_6', 'service_list_6', $index); ?></h3>
                                <div class="amt-service-content"><?php $this->print_unescaped_setting('content_6', 'service_list_6', $index); ?></div>
                                <?php if ($item['button_display_6']  == 'yes') { ?>
                                <div class="amt-service-btn">
                                    <a <?php $this->print_render_attribute_string($link_key); ?>>
                                    <?php $this->print_unescaped_setting('btn_text_6', 'service_list_6', $index); ?>
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>

        <?php } elseif ($data['style'] == 'style7') { ?>
            <?php
            foreach ($data['service_list_7'] as $index => $item) :
                $link_key = 'link_' . $index;
                $this->add_link_attributes( $link_key, $item['title_link_7'] );
            ?>
            <div class="swiper-slide">
                <div class="amt-service-box amt-service7-box">
                    <div class="amtservice-media-img">
                        <?php if (!empty($item['selected_image_7']['id'])) {
                                echo wp_get_attachment_image($item['selected_image_7']['id'], 'full');
                        } else {
                            echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_img('service-6.png') . '" alt="' . get_the_title() . '">';
                        } ?>
                    </div>
                    <div class="amt-catagory-button amt-service-box-content">
                        <a class="amt-service-title" <?php $this->print_render_attribute_string($link_key); ?>>
                            <?php $this->print_unescaped_setting('text_7', 'service_list_7', $index); ?>
                        </a>
                    </div>
                </div>
            </div>
            <?php
            endforeach;
            ?>
        <?php } ?>

    </div>
</div>
<?php
$show_services_dots = (in_array($data['service-navigation'], ['services_dots', 'services_both']));
$show_services_arrows = (in_array($data['service-navigation'], ['services_arrows', 'services_both']));
?>
<?php if ($show_services_arrows) : ?>
    <div class="swiper-button-next service_btn_next"></div>
    <div class="swiper-button-prev service_btn_prev"></div>
<?php endif; ?>

<?php if ($show_services_dots) : ?>
    <div class="swiper-pagination services_pagination"></div>
<?php endif; ?>

</div>
<?php 
$scripts = '
<script>
    jQuery( document ).ready(function() {
          var ogoServiceSwiper = new Swiper(".ogo-service-swiper", {';

if ($data['style'] == 'style6') {
    $data['slide_perview'] = $data['slide_perview_6'];
}

$scripts .= 'slidesPerView: '.$data['slide_perview'].',';
$scripts .= 'spaceBetween: '.$data['space_between']['size'].',
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
              el: ".services_pagination",
              clickable: true,
            },
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
            breakpoints: {
              320: {
                slidesPerView: '.$data['slide_perview_mobile'].',
                spaceBetween: '.$data['space_between_mobile']['size'].',
              },
              768: {
                slidesPerView: '.$data['slide_perview_tablet'].',
                spaceBetween: '.$data['space_between_tablet']['size'].',
              },
              1024: {
                slidesPerView: '.$data['slide_perview'].',
                spaceBetween: '.$data['space_between']['size'].',
              },
            },
          });
    });
</script>';

echo $scripts;

?>

