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

if ( 'inline' === $data['view'] ) {
    $this->add_render_attribute( 'icon_list', 'class', 'inline-items' );
    $this->add_render_attribute( 'list_item', 'class', 'inline-item' );
}
?>

<div class="amt-fun-fact">
    <ul <?php $this->print_render_attribute_string( 'icon_list' ); ?>>
        <?php
            foreach ( $data['list_items'] as $index => $item ) :
            ?>
            <li <?php $this->print_render_attribute_string( 'list_item' ); ?>> 
                <div class="title">
                    <h3><?php echo wp_kses_post($item['title']); ?></h3>
                </div>
                <div class="sub_title">
                    <p><?php echo wp_kses_post($item['sub_title']); ?></p>
                </div>
            </li>
            <?php
            endforeach;
        ?>
    </ul>
</div>