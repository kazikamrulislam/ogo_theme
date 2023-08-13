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

<div class="amt-single-price-item amt-single-price-item-2">
    <?php if ( $data['Image_display_2']  == 'yes' ) { ?>
        <div class="amt-single-price-item-img-2">
            <?php if ( !empty( $data['image_2']['id'] ) ) {
                    Group_Control_Image_Size::print_attachment_image_html( $data,'image_2' );
                }
                else {
                    echo  '<svg xmlns="http://www.w3.org/2000/svg" width="53" height="105" fill="none" viewBox="0 0 53 105">
                                <path fill="#676E89" d="M0 105a53.394 53.394 0 0 0 20.28-3.989 53.011 53.011 0 0 0 17.195-11.379 52.472 52.472 0 0 0 11.49-17.035A52.092 52.092 0 0 0 53 52.5c-14.05 0-27.525 5.531-37.46 15.376C5.602 77.722.02 91.076.02 105H0Z"/>
                                <path fill="#53AFEE" d="M53 52.5a52.09 52.09 0 0 0-4.033-20.092 52.47 52.47 0 0 0-11.485-17.033 53.01 53.01 0 0 0-17.188-11.38A53.39 53.39 0 0 0 .019 0c0 6.895 1.37 13.722 4.033 20.092a52.471 52.471 0 0 0 11.485 17.033 53.009 53.009 0 0 0 17.189 11.38A53.39 53.39 0 0 0 53 52.5Z"/>
                            </svg>';
             }
            ?>
        </div>
	<?php } ?>
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
                        <span <?php $this->print_render_attribute_string( $repeater_setting_key ); ?>><?php $this->print_unescaped_setting( 'text', 'icon_list', $index ); ?></span>
                    </li>
                <?php
            endforeach;
            ?>
        </ul>
    </div>
    <div class="amt-single-price-btn amt-single-price-btn-2">
        <a href="<?php echo wp_kses_post( $data['one_buttonurl']['url'] );?>"><?php echo wp_kses_post( $data['button_one'] );?></a>
    </div>
</div>

