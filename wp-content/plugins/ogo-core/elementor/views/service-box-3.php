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


?>

<div class="amt-service-box amt-service3-box  amtservice-<?php echo esc_attr($data['style']); ?> <?php echo esc_attr($data['align_items']); ?>">
    <div class="amt-service-box-border">
        <div class="amtservice-media-icon">
            <?php if (!empty($data['image']['id'])) {
                Group_Control_Image_Size::print_attachment_image_html($data);
            } else {
                echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_img('service3-img.png') . '" alt="' . get_the_title() . '">';
            } ?>
        </div>
        <div class="amt-service-box-content">
            <?php if (!empty($data['title'])) { ?>
                <h3 class="amt-service-title"><?php echo wp_kses_post($data['title']); ?></h3>
            <?php } ?>
            <div class="amt-service-content"><?php echo wp_kses_post($data['content']); ?></div>
        </div>

    </div>
</div>