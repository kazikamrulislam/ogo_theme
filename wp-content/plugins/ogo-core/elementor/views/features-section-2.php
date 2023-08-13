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
use Elementor\Icons_Manager;


?>
 <div class="amt-features-section amt-features-component-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
            <div class="amt-features-subtitle">
                    <h5><?php echo wp_kses_post( $data['sub_title'] );?></h5>
                 </div>
                <div class="amt-features-title">
                    <h2><?php echo wp_kses_post( $data['title'] );?></h2>
                </div>
                <div class="amt-features-desc">
                    <p> <?php echo wp_kses_post( $data['content'] );?></p>
                </div>
                <div class="amt-features-list">
                    <ul <?php $this->print_render_attribute_string( 'icon_list' ); ?>>
                        <?php
                        foreach ( $data['icon_list'] as $index => $item ) :
                            $repeater_setting_key = $this->get_repeater_setting_key( 'text', 'icon_list', $index );

                            $this->add_render_attribute( $repeater_setting_key, 'class', 'icon-list-text' );

                            $migration_allowed = Icons_Manager::is_migration_allowed();
                            ?>
                            <li <?php $this->print_render_attribute_string( 'list_item' ); ?>>
                            <?php
                                if ( ! isset( $item['icon'] ) && ! $migration_allowed ) {
                                    $item['icon'] = isset( $fallback_defaults[ $index ] ) ? $fallback_defaults[ $index ] : 'fa fa-check';
                                }

                                 $migrated = isset( $item['__fa4_migrated']['selected_icon'] );
                                $is_new = ! isset( $item['icon'] ) && $migration_allowed;
                                if ( ! empty( $item['icon'] ) || ( ! empty( $item['selected_icon']['value'] ) && $is_new ) ) :
                                ?>
                                    <span class="icon-list-icon">
                                    <?php
                                        if ( $is_new || $migrated ) {
                                            Icons_Manager::render_icon( $item['selected_icon'], [ 'aria-hidden' => 'true' ] );
                                        } else { ?>
                                            <i class="<?php echo esc_attr( $item['icon'] ); ?>" aria-hidden="true"></i>
                                        <?php } ?>
                                    </span>
                                    <?php endif; ?>
                                    <span <?php $this->print_render_attribute_string( $repeater_setting_key ); ?>><?php $this->print_unescaped_setting( 'text', 'icon_list', $index ); ?></span>
                                </li>
                            <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
                <div class="amt-features-btn">
                    <a href="<?php echo wp_kses_post( $data['one_buttonurl']['url'] );?>"><?php echo wp_kses_post( $data['button_one'] );?></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="amt-features-right-content">
                    <div class="amt-features-img amt-features2-img">
                        <?php if ( !empty( $data['image']['id'] ) ) {
                            Group_Control_Image_Size::print_attachment_image_html( $data );
                            } else {
                            echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_img( 'feature-2.png' ) . '" alt="'.get_the_title().'">';
                        } ?>
                    </div>
                    <div class="amt-features2-project-img">
                    <?php
                        echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_img( 'features-img-2.png' ) . '" alt="'.get_the_title().'">';
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>