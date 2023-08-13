<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

use Elementor\Group_Control_Image_Size;
use Elementor\Icons_Manager;
use OgoTheme;
use OgoTheme_Helper;

?>

<div class="row amt_single_team_section">
    <div class="col-lg-6 col-md-12 col-sm-12 amt-single-pro-image">
        <div class="amt-single-img">
            <?php
            if ( !empty( $data['image']['url'] ) ) {
                Group_Control_Image_Size::print_attachment_image_html( $data,'image' );
            } ?>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 amt-single-pro-details">
        <h2 class="amt_team_member_name"><?php echo wp_kses_post($data['name']); ?></h2>
        <h4 class="amt_team_member_designation"><?php echo wp_kses_post($data['designation']); ?></h4>
        <p class="amt_team_member_description"><?php echo wp_kses_post($data['content']); ?></p>
        <div class="amt-member-contact">
            <div class="experience">
                <p class="amt_team_member_experience"><span class="experience_title"><?php esc_html_e( 'Experience: ', 'ogo-core' ); ?></span ><?php echo wp_kses_post($data['experience']); ?></p>
                <p class="amt_team_member_email"><span><?php esc_html_e( 'Email: ', 'ogo-core' ); ?></span><a href="mailto:<?php echo wp_kses_post($data['email']); ?>"><?php echo wp_kses_post($data['email']); ?></a></p>
                <p class="amt_team_member_social"><span><?php esc_html_e( 'Follow: ', 'ogo-core' ); ?></span>
                    <span class="amt-single-social">
                        <?php

                        foreach ( $data['socials'] as $index => $item ) :
                            //$repeater_setting_key = $this->get_repeater_setting_key( 'text', 'socials', $index );
                            // if ( ! empty( $item['link']['url'] ) ) {
                            $link_key = 'link_' . $index;

                            $this->add_link_attributes( $link_key, $item['link'] );
                        // }
                        ?>
						<a <?php $this->print_render_attribute_string( $link_key ); ?>>
                            <?php $this->print_unescaped_setting( 'text', 'socials', $index ); ?>
                        </a>
						<?php
                        endforeach;
                        ?>
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>