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
<div class="works-title-section works-title-section-style-2">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="works-title-section-subtitle">
                <h4><?php echo wp_kses_post( $data['sub-title'] );?></h4>
            </div>
            <div class="works-title-section-title">
                <h2><?php echo wp_kses_post( $data['title'] );?></h2>
            </div>
            <div class="works-title-section-content">
                <p><?php echo wp_kses_post( $data['content'] );?></p>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="works-title-section-image">

            <?php if ( !empty( $data['image']['id'] ) ) {
                Group_Control_Image_Size::print_attachment_image_html( $data );
            } else {
                echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_img( 'works-title-img.png' ) . '" alt="'.get_the_title().'">';
            } ?>

            </div>
        </div>
    </div>
</div>