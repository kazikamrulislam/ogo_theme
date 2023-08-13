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

    
<div class="amt-contact-section-2 amtcontact-<?php echo esc_attr( $data['style'] );?> <?php echo esc_attr( $data['align_items'] ); ?>">
    <div class="row">
        <div class="col-12"> 
            <div class="amt-contact-items">
                <div class="row">
                    <div class="col-md-4">
                        <div class="amt-single-contact-item">
                            <i class="<?php echo esc_attr( $data['map-icon']['value'] );?>" aria-hidden="true"></i>
                            <?php if ( !empty( $data['address'] ) ) { ?>
                                <a href="#"><?php echo wp_kses_post( $data['address'] );?></a>
                            <?php } ?>
                            <!-- <a href="#"></a> -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="amt-single-contact-item">
                            <i class="<?php echo esc_attr( $data['phone-icon']['value'] );?>" aria-hidden="true"></i> 
                            <?php if ( !empty( $data['phone-1'] ) ) { ?>
                                <a href="callto:<?php echo wp_kses_post( $data['phone-1'] );?>"><?php echo wp_kses_post( $data['phone-1'] );?></a>
                            <?php } ?>
                            <?php if ( !empty( $data['phone-2'] ) ) { ?>
                                <a href="callto:<?php echo wp_kses_post( $data['phone-2'] );?>"><?php echo wp_kses_post( $data['phone-2'] );?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="amt-single-contact-item">
                            <i class="<?php echo esc_attr( $data['message-icon']['value'] );?>" aria-hidden="true"></i>
                            <?php if ( !empty( $data['mail-1'] ) ) { ?>
                                <a href="mailto:<?php echo wp_kses_post( $data['mail-1'] );?>"><?php echo wp_kses_post( $data['mail-1'] );?></a>
                            <?php } ?>
                            <?php if ( !empty( $data['mail-2'] ) ) { ?>
                                <a href="mailto:<?php echo wp_kses_post( $data['mail-2'] );?>"><?php echo wp_kses_post( $data['mail-2'] );?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
             <?php echo wp_kses_post($data['form_items_2']); ?>
        </div>
    </div>
</div>