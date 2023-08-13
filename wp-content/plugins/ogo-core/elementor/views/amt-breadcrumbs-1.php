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

<div class="amt-about-us-section amt-about-us-section-1 amt-about-<?php echo esc_attr($data['style']); ?>">
    <div class="amt-about-us-row">
        <div class="col-md-5 amt-about-us">
            <div class="amt-about-us-menu">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>-</li>
                    <li><a href="#"><?php echo wp_kses_post($data['about-title']); ?></a></li>
                </ul>
                <div class="amt-about-us-title">
                    <h2><?php echo wp_kses_post($data['about-title']); ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-7 amt-about-us">
            <div class="amt-about-us-image">
                <div class="amt-about-col amt-about-us-img-l">
                    <?php if (!empty($data['image-left']['id'])) {
                        Group_Control_Image_Size::print_attachment_image_html($data, 'image-left');
                    } else {
                        echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_element_img('about-img-l.png') . '" alt="' . get_the_title() . '">';
                    } ?>
                </div>
                <div class="amt-about-col amt-about-us-image-m">
                    <div class="amt-about-img-m-t">
                        <?php if (!empty($data['image-mid-top']['id'])) {
                            Group_Control_Image_Size::print_attachment_image_html($data, 'image-mid-top');
                        } else {
                            echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_element_img('about-img-t.png') . '" alt="' . get_the_title() . '">';
                        } ?> </div>
                    <div class="amt-about-img-m-d">
                        <?php if (!empty($data['image-mid-down']['id'])) {
                            Group_Control_Image_Size::print_attachment_image_html($data, 'image-mid-down');
                        } else {
                            echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_element_img('about-img-d.png') . '" alt="' . get_the_title() . '">';
                        } ?>
                    </div>
                    <div class="amt-about-shap">
                        <?php if ($data['display-logo']  == 'yes') { ?>
                            <div class="right-down-image">
                                <?php if (!empty($data['logo-image']['id'])) {
                                    Group_Control_Image_Size::print_attachment_image_html($data, 'logo-image');
                                } else {
                                    echo  '<svg width="91" height="92" viewBox="0 0 91 92" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M91 92H0V0C11.951 0 23.7896 2.38617 34.804 7.007C45.8559 11.6278 55.8588 18.4076 64.3256 26.9296C72.7925 35.4516 79.4611 45.6023 84.0317 56.7756C88.6398 67.949 91 79.9177 91 92Z" fill="#53AFEE"/>
                                    </svg>';
                                }
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="amt-about-col amt-about-us-image-r">
                    <?php if (!empty($data['image-right']['id'])) {
                        Group_Control_Image_Size::print_attachment_image_html($data, 'image-right');
                    } else {
                        echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_element_img('about-img-r.png') . '" alt="' . get_the_title() . '">';
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>