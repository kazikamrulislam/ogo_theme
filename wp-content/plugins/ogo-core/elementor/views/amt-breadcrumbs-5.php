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
<div class="amt-about-us-section amt-about-us-section-5 amt-about-<?php echo esc_attr( $data['style'] );?>">
    <div class="amt-about-shape-ltop-5">
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
    <div class="amt-about-us-row">
        <div class="amt-about-us">
            <div class="amt-about-us-image">
                <div class="amt-about-col amt-about-us-img-l">
                <?php if ( !empty( $data['image-left']['id'] ) ) {
                    Group_Control_Image_Size::print_attachment_image_html( $data,'image-left' );
                    } else {
                    echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_element_img( 'about-img-d.png' ) . '" alt="'.get_the_title().'">';
                } ?>
                </div>
                <div class="amt-about-col amt-about-us-image-r">
                <?php if ( !empty( $data['image-right']['id'] ) ) {
                    Group_Control_Image_Size::print_attachment_image_html( $data,'image-right' );
                    } else {
                    echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_element_img( 'about-img-r.png' ) . '" alt="'.get_the_title().'">';
                } ?>
                </div>
            </div>
        </div>
        <div class="amt-about-us">
            <div class="amt-about-us-menu">
                <ul>
                    <li><a href="#">Home</a></li>
                </ul>
                <div class="amt-about-us-title">
                    <h2><?php echo wp_kses_post( $data['about-title'] );?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="amt-about-shape-rdown-5">
        <?php if ($data['display-logo-2']  == 'yes') { ?>
            <div class="right-down-image">
                <?php if (!empty($data['logo-image-2']['id'])) {
                    Group_Control_Image_Size::print_attachment_image_html($data, 'logo-image-2');
                } else {
                    echo  '<svg width="168" height="168" viewBox="0 0 168 168" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M167.14 0C122.811 0 80.2987 17.5942 48.9538 48.9122C17.609 80.2301 -0.000366211 122.706 -0.000366211 166.997H167.14V0Z" fill="#1F0D3C"/>
                    <path d="M167.14 84.3203C145.188 84.3203 124.136 93.033 108.614 108.542C93.0922 124.05 84.372 145.084 84.372 167.017H167.14V84.3203Z" fill="white"/>
                    </svg>';
                }
                ?>
            </div>
        <?php } ?>
    </div>
</div>
