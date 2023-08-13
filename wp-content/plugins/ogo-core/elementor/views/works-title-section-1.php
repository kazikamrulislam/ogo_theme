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
<div class="works-title-section works-title-section-style-1">
    <div class="row align-items-end">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="works-title-section-subtitle">
                <h4><?php echo wp_kses_post( $data['sub-title'] );?></h4>
            </div>
            <div class="works-title-section-title">
                <h2><?php echo wp_kses_post( $data['title'] );?></h2>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="amt-work-counter">
                <div class="total-project">
                    <div class="project-number number-style"><?php echo wp_kses_post( $data['project_number'] );?></div>
                    <div class="project-title title-style"><?php echo wp_kses_post( $data['project_title'] );?></div>
                </div>
                <div class="total-hours">
                    <div class="project-number number-style"><?php echo wp_kses_post( $data['hours_number'] );?></div>
                    <div class="project-title title-style"><?php echo wp_kses_post( $data['hours_title'] );?></div>
                </div>
                <div class="total-customers">
                    <div class="project-number number-style"><?php echo wp_kses_post( $data['customer_number'] );?></div>
                    <div class="project-title title-style"><?php echo wp_kses_post( $data['customer_title'] );?></div>
                </div>
            </div>
        </div>
    </div>
</div>