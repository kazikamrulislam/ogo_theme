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

<div class="amt-about-us-section amt-about-us-section-4 amt-about-<?php echo esc_attr( $data['style'] );?>">
    <div class="amt-about-us">
        <div class="amt-about-us-title">
            <div class="about-play-btn">
                <i class="<?php echo esc_attr( $data['icon']['value'] );?>" aria-hidden="true"></i>
            </div>
            <h2><?php echo wp_kses_post( $data['about-title'] );?></h2>
        </div>
    </div>
</div>
