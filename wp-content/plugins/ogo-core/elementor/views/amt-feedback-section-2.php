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
<div class="amt-feedback-section amt-feedback-component-2">
    <div class="amt-single-feedback-item">
        <div class="feedback-desc">
            <p> <?php echo wp_kses_post($data['content']); ?></p>
        </div>
        <div class="feedback-rating">
            <div class="top-quote">
                <i class="<?php echo esc_attr($data['abs-icon2']['value']); ?>" aria-hidden="true"></i>
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
            <div class="rating-abs-img">
                <?php if ($data['image_display_1']  == 'yes') { ?>
                    <div class="rating-abs-img">
                        <?php if (!empty($data['logo-image']['id'])) {
                            Group_Control_Image_Size::print_attachment_image_html($data, 'logo-image');
                        } else {
                            echo  '<svg xmlns="http://www.w3.org/2000/svg" width="53" height="105" fill="none" viewBox="0 0 53 105">
                                <path fill="#676E89" d="M0 105a53.394 53.394 0 0 0 20.28-3.989 53.011 53.011 0 0 0 17.195-11.379 52.472 52.472 0 0 0 11.49-17.035A52.092 52.092 0 0 0 53 52.5c-14.05 0-27.525 5.531-37.46 15.376C5.602 77.722.02 91.076.02 105H0Z"/>
                                <path fill="#53AFEE" d="M53 52.5a52.09 52.09 0 0 0-4.033-20.092 52.47 52.47 0 0 0-11.485-17.033 53.01 53.01 0 0 0-17.188-11.38A53.39 53.39 0 0 0 .019 0c0 6.895 1.37 13.722 4.033 20.092a52.471 52.471 0 0 0 11.485 17.033 53.009 53.009 0 0 0 17.189 11.38A53.39 53.39 0 0 0 53 52.5Z"/>
                            </svg>';
                        }
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>