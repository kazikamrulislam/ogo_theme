<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

use Elementor\Group_Control_Image_Size;
use OgoTheme;
use OgoTheme_Helper;
use \WP_Query;


?>
<div class="amt-feedback-section amt-feedback-component-1">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="amt-feedback-left">
                <div class="left-img">
                    <?php if (!empty($data['image']['id'])) {
                        Group_Control_Image_Size::print_attachment_image_html($data, 'image');
                    } else {
                        echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_element_img('amt-feedback-1-main.png') . '" alt="' . get_the_title() . '">';
                    } ?>
                </div>
                <?php if ($data['abs_icon_display']  == 'yes') { ?>
                    <div class="left-absolute-icon">
                        <i class="<?php echo esc_attr($data['abs-icon']['value']); ?>" aria-hidden="true"></i>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="amt-feedback-right">
                <div class="feedback-meta">
                    <div class="top-quote">
                        <i class="<?php echo esc_attr($data['icon']['value']); ?>" aria-hidden="true"></i>
                    </div>
                    <div class="feedback-subtitle">
                        <h4><?php echo wp_kses_post($data['sub-title']); ?></h4>
                    </div>
                    <div class="feedback-desc">
                        <p> <?php echo wp_kses_post($data['content']); ?></p>
                    </div>
                    <div class="feedback-rating">
                        <div class="rating-img">
                            <?php if (!empty($data['author-image']['id'])) {
                                Group_Control_Image_Size::print_attachment_image_html($data, 'author-image');
                            } else {
                                echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_element_img('feedback-author.png') . '" alt="' . get_the_title() . '">';
                            } ?>
                        </div>
                        <div class="rating-info">
                            <div class="star-ratings">
                                <div class="fill-ratings">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="empty-ratings">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                            <div class="author_name">
                                <h4><?php echo wp_kses_post($data['author-name']); ?></h4>
                            </div>
                            <div class="author-designation">
                                <p> <?php echo wp_kses_post($data['author-designation']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>