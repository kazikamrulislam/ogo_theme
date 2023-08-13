<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;
use Elementor\Utils;
extract($data);

$attr = '';
if ( !empty( $data['url']['url'] ) ) {
	$attr  = 'href="' . $data['url']['url'] . '"';
	$attr .= !empty( $data['url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['url']['nofollow'] ) ? ' rel="nofollow"' : '';
}

?>
<div class="amt-section-title <?php echo esc_attr( $data['style'] ); ?>">
	<?php if( !empty ( $data['title'] ) ) { ?>
	<h2 class="entry-title <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="1.2s" data-wow-duration="1s"><?php echo wp_kses_post( $data['title'] ); ?>
	</h2>
	<?php } ?>
	<?php if ( $data['button_display'] == 'yes' ) { ?>
		<a class="section-link-url" href="<?php echo esc_url( $data['link_url']['url'] );?>"><span class="section-link-text"><?php echo wp_kses_post( $data['link_text'] ); ?></span><i class="fas fa-chevron-right"></i></a>
	<?php } ?>
</div>
