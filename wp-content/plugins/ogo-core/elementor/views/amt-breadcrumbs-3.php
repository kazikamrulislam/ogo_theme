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

<div class="amt-about-us-section-3 amt-about-<?php echo esc_attr( $data['style'] );?>">
    <div class="amt-about-shap-3">
        <?php if ($data['display-logo']  == 'yes') { ?>
            <div class="right-down-image">
                <?php if (!empty($data['logo-image']['id'])) {
                    Group_Control_Image_Size::print_attachment_image_html($data, 'logo-image');
                } else {
                    echo  '<svg width="335" height="334" viewBox="0 0 335 334" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M167.14 166.997C167.14 211.287 149.53 253.763 118.185 285.081C86.8406 316.399 44.328 333.993 -0.000289917 333.993C-0.000289917 289.703 17.609 247.227 48.9538 215.909C80.2987 184.591 122.811 166.997 167.14 166.997Z" fill="#676E89"/>
                    <path d="M334.22 0C334.22 44.2903 316.61 86.7665 285.266 118.084C253.921 149.402 211.408 166.997 167.08 166.997C167.08 122.706 184.689 80.2301 216.034 48.9122C247.379 17.5943 289.891 0 334.22 0Z" fill="#53AFEE"/>
                    <path d="M-0.000289917 0C44.328 0 86.8406 17.5943 118.185 48.9122C149.53 80.2301 167.14 122.706 167.14 166.997C122.813 166.991 80.3034 149.395 48.9597 118.079C17.616 86.7618 0.0050354 44.2886 -0.000289917 0Z" fill="#1F0D3C"/>
                    </svg>
                    ';
                }
                ?>
            </div>
        <?php } ?>
    </div>
    <div class="amt-about-us-row">
        <div class="col amt-about-us">
            <div class="amt-about-us-title">
            <h2><?php echo wp_kses_post( $data['about-title'] );?></h2>
            <p> <?php echo wp_kses_post( $data['about-content'] );?></p>
            </div>
        </div>
    </div>
</div>
