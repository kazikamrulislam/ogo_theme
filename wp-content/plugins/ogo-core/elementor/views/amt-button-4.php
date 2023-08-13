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

$btn_key = 'btn_link';
$this->add_link_attributes($btn_key, $data['common-btn-1-url']);
?>

<div class="amt-button amt-button-4 amtbutton-<?php echo esc_attr( $data['style'] );?> <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
	<a <?php $this->print_render_attribute_string($btn_key);?>><?php echo $data['common-btn-1']; ?></a>
</div>