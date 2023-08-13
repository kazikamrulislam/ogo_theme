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

<div class="amt-service-box amt-service7-box amtservice-<?php echo esc_attr( $data['style'] );?>">
    <div class="amtservice-media-img">
        <?php if ( !empty( $data['image']['id'] ) ) {
                Group_Control_Image_Size::print_attachment_image_html( $data );
            } else {
                echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_img( 'service-6.png' ) . '" alt="'.get_the_title().'">';
            } ?>
        </div>
    <div class="amt-catagory-button amt-service-box-content">
         <a class="amt-service-title" href="#"><?php echo wp_kses_post( $data['title'] );?></a>
    </div>    
</div>