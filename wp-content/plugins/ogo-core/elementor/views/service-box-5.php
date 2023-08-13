<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

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

<div class="amt-service-box amt-service5-box amtservice-<?php echo esc_attr( $data['style'] );?> <?php echo esc_attr( $data['align_items'] ); ?>">
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
