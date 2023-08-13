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

<div class="amt-single-price-item amt-single-price-item-3">
    <div class="amt-single-price-item-title">
        <div class="amt-single-price-title"><h3><?php echo wp_kses_post( $data['title'] );?></h3></div>
        <div class="amt-single-price">
            <span class="amt-single-price-currency"><?php echo ('custom'!== $data['price_symbol']) ? wp_kses_post( $data['price_symbol'] ) : wp_kses_post( $data['price_symbol_custom'] ); ?></span>
            <span class="amt-single-price-integer"><?php echo wp_kses_post( $data['price'] );?></span>
            <div class="amt-price-period-style">
                <span class="amt-single-price-period"><?php echo wp_kses_post( $data['price_period'] );?></span>
            </div>
        </div>
    </div>
    <div class="amt-pricing-list">
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
    <div class="amt-single-price-btn">
    <a href="<?php echo wp_kses_post( $data['one_buttonurl']['url'] );?>"><?php echo wp_kses_post( $data['button_one'] );?></a>
    </div>
</div>
