<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;

if ( empty( $data['select_title_tag'] ) ) {
	$data['select_title_tag'] = 'h2';
}
?>

<div class="amt-sec-title <?php echo esc_attr( $data['style'] ); ?> <?php //echo esc_attr( $data['title_align'] ); ?> <?php echo esc_attr( $data['test-align'] ); ?> ">
	<div class="sec-title-holder">
		<<?php echo esc_attr( $data['select_title_tag'] ); ?> class="amtin-title"><?php echo wp_kses_post( $data['title'] ); ?></<?php echo esc_attr( $data['select_title_tag'] ); ?>>
		<div class="sub-title-area">
			<?php if( !empty ( $data['description'] ) ) { ?>
				<p class="amt-desc"><?php echo wp_kses_post( $data['description'] ); ?></p>
			<?php } ?>
		</div>
	</div>
</div>