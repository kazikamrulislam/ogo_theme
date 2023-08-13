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

$btn = $attr = '';

if ( !empty( $data['one_buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['one_buttonurl']['url'] . '"';
	$attr .= !empty( $data['one_buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['one_buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
	
}
if ( !empty( $data['button_one'] ) ) {
	$btn = '<a class="service-btn" ' . $attr . '>' . $data['button_one'] . '<i class="fa fa-arrow-right" aria-hidden="true"></i>'. '</a>';
}

?>


<div class="amt-service-box amt-service6-box amtservice-<?php echo esc_attr( $data['style'] );?>">
    <div class="amtservice-media-img">
        <?php if ( !empty( $data['image']['id'] ) ) {
                Group_Control_Image_Size::print_attachment_image_html( $data, 'image' );
            } else {
                echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_img( 'service-6.png' ) . '" alt="'.get_the_title().'">';
            } ?>
    </div>
    <div class=" amt-sevice6-right-content amt-service-box-border">
        <div class="amtservice-media-icon">
			<i class="<?php echo esc_attr( $data['icon']['value'] );?>" aria-hidden="true"></i>
        </div>
        <div class="amt-service-box-content">
            <?php if ( !empty( $data['title'] ) ) { ?>
                <h3 class="amt-service-title"><?php echo wp_kses_post( $data['title'] );?></h3>
                <?php } ?>
                <div class="amt-service-content"><?php echo wp_kses_post( $data['content'] );?></div>
                <?php if ( $data['button_display']  == 'yes' ) { ?>
                <?php if ( $btn ) { ?>
                <div class="amt-service-btn"><?php echo wp_kses_post( $btn );?></div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>