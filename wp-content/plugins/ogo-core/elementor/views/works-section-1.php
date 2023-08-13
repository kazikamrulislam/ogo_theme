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

<div class="amt-works-section amt-works-section-1">
    <div class="amtworks-media">
        <?php if ( !empty( $data['image']['id'] ) ) {
                Group_Control_Image_Size::print_attachment_image_html( $data );
            } else {
                echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_img( 'works-section.png' ) . '" alt="'.get_the_title().'">';
            } ?>  
            <div class="works-content">
				<?php if ( !empty( $data['title'] ) ) { ?>
				<h2 class="works-title"><?php echo wp_kses_post( $data['title'] );?></h2>
				<?php } ?>
                <?php if ( !empty( $data['name'] ) ) { ?>
				<h4 class="works-title-name"> For - <?php echo wp_kses_post( $data['name'] );?></h4>
				<?php } ?>
			</div>   
        </div> 
</div>