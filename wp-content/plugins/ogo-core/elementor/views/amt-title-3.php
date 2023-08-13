<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

?>
<div class="amt-sec-title <?php echo esc_attr( $data['style'] ); ?>">
	<div class="sec-title-holder">
	<<?php echo esc_attr( $data['select_title_tag'] ); ?> class="amtin-title"><?php echo wp_kses_post( $data['title'] ); ?></<?php echo esc_attr( $data['select_title_tag'] ); ?>>
	</div>
</div>
