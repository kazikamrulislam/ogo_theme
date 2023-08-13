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
<div>
    <div class="row amt-contact-1 align-items-center">
        <div class="col-8 small-dev-width">
            <div class="amt-choose-service">
                <span>Choose service</span>
            </div>
            <div class="amt-tab-holder">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php
                    $tab_id = 1;
                    foreach ($data['form_items'] as $item) {
                        if ($tab_id == 1){ ?>
                            <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="items_<?php echo $tab_id; ?>" data-bs-toggle="tab"
                                    data-bs-target="#item_<?php echo $tab_id; ?>" type="button" role="tab" aria-controls="item_<?php echo $tab_id; ?>"
                                    aria-selected="true">
                                <?php echo wp_kses_post($item['form_cat']); ?>
                            </button>
                            </li>
                        <?php
                        }else{ ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="items_<?php echo $tab_id; ?>" data-bs-toggle="tab"
                                        data-bs-target="#item_<?php echo $tab_id; ?>" type="button" role="tab" aria-controls="item_<?php echo $tab_id; ?>"
                                        aria-selected="false">
                                    <?php echo wp_kses_post($item['form_cat']); ?>
                                </button>
                            </li>
                            <?php
                        }
                        $tab_id++;
                    }
                    ?>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <?php
                    $tab_id = 1;
                    foreach ($data['form_items'] as $item) {
                        if ($tab_id == 1) {?>
                            <div class="tab-pane fade show active" id="item_<?php echo $tab_id; ?>" role="tabpanel"
                                 aria-labelledby="items_<?php echo $tab_id; ?>">
                                <?php echo wp_kses_post($item['form_id']); ?>
                            </div>
                         <?php
                        } else { ?>
                            <div class="tab-pane fade" id="item_<?php echo $tab_id; ?>" role="tabpanel" aria-labelledby="items_<?php echo $tab_id; ?>">
                                <?php echo wp_kses_post($item['form_id']); ?>
                            </div>
                        <?php
                        }
                        $tab_id++;
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-4 small-dev-width">
            <div class="amt-level-up-holder">
                <div class="level-up-title">
                    <h3><?php echo wp_kses_post( $data['level-up-title'] );?></h3>
                    <!-- <h3>Level up your brand</h3> -->
                </div>
                <div class="level-up-sub">
                    <p> <?php echo wp_kses_post( $data['level-up-desc'] );?></p>
                
                </div>
                <div class="level-up-links">
                    <i class="<?php echo esc_attr($data['map-icon']['value']); ?>" aria-hidden="true"></i>
                    <?php if (!empty($data['address'])) { ?>
                        <a href="<?php echo wp_kses_post($data['address-url']['url']); ?>"><?php echo wp_kses_post($data['address']); ?></a>
                    <?php } ?>
                </div>
                <div class="level-up-links">
                    <i class="<?php echo esc_attr($data['phone-icon']['value']); ?>" aria-hidden="true"></i>
                    <div class="amt-phone-no">

                        <?php if (!empty($data['phone-1'])) { ?>
                            <a href="callto:<?php echo wp_kses_post( $data['phone-1'] );?>"><?php echo wp_kses_post( $data['phone-1'] );?></a>
                        <?php } ?>
                        <?php if (!empty($data['phone-2'])) { ?>
                            <a href="callto:<?php echo wp_kses_post( $data['phone-2'] );?>"><?php echo wp_kses_post( $data['phone-2'] );?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="level-up-links">
                    <i class="<?php echo esc_attr($data['message-icon']['value']); ?>" aria-hidden="true"></i>
                    <div class="amt-emails">
                        <?php if (!empty($data['mail-1'])) { ?>
                            <a href="mailto:<?php echo wp_kses_post( $data['mail-1'] );?>"><?php echo wp_kses_post( $data['mail-1'] );?></a>
                        <?php } ?>
                        <?php if (!empty($data['mail-2'])) { ?>
                            <a href="mailto:<?php echo wp_kses_post( $data['mail-2'] );?>"><?php echo wp_kses_post( $data['mail-2'] );?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="amt-contact-btn-2">
                    <a href="<?php echo wp_kses_post( $data['level-up-url']['url'] );?>"><?php echo wp_kses_post( $data['level-up-btn'] );?></a>
                </div>
            </div>
        </div>
    </div>

</div>



