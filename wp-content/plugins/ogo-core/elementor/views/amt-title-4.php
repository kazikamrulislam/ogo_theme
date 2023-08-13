<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

?>
<div class="amt-sec-title <?php echo esc_attr( $data['style'] ); ?> <?php echo esc_attr( $data['title_align'] ); ?>">
	<div class="sec-title-holder">
		<?php if( !empty ( $data['description'] ) ) { ?>
		<p class="amt-desc"><?php echo wp_kses_post( $data['description'] ); ?></p>
		<?php } ?>
		<<?php echo esc_attr( $data['select_title_tag'] ); ?> class="amtin-title"><?php echo wp_kses_post( $data['title'] ); ?></<?php echo esc_attr( $data['select_title_tag'] ); ?>>
	</div>
</div>
