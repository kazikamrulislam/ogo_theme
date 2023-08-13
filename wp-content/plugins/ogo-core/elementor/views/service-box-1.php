<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

use OgoTheme;
use OgoTheme_Helper;
use \WP_Query;

if ($data['bg_image_display']  !== 'yes') {
        $bg_class = 'hide-bg';
}
?>

<style>
        .amt-service-bg-img:before {
                background-image: url("<?php echo OgoTheme_Helper::get_img('service1-bg-img.svg'); ?>");
        }
        .amt-service-bg-img.hide-bg:before {
                background-image: none;
        }
</style>

<div class="amt-service-box amt-service-bg-img amt-service-box-shadow amtservice-<?php echo esc_attr($data['style']); ?> <?php echo esc_attr($data['align_items']); ?> <?php echo $bg_class; ?>">
        <div class="amt-service1-box amt-service-box-border">
                <div class="amtservice-media-icon">
                        <i class="<?php echo esc_attr($data['icon']['value']); ?>" aria-hidden="true"></i>
                </div>
                <div class="amt-service-box-content">
                        <?php if (!empty($data['title'])) { ?>
                                <h3 class="amt-service-title"><?php echo wp_kses_post($data['title']); ?></h3>
                        <?php } ?>
                        <div class="amt-service-content"><?php echo wp_kses_post($data['content']); ?></div>
                </div>
        </div>
</div>