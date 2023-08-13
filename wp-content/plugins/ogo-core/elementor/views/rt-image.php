<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;
use OgoTheme_Helper;

$ogo_socials = OgoTheme_Helper::socials();

use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
extract($data);

$attr = '';
if ( !empty( $data['url']['url'] ) ) {
	$attr  = 'href="' . $data['url']['url'] . '"';
	$attr .= !empty( $data['url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['url']['nofollow'] ) ? ' rel="nofollow"' : '';
	
}
if ( $attr ) {
  $amt_logo = '<a ' . $attr . '>' .Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size' , 'rt_logo' ) . '</a>';
}
else {
	$amt_logo = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'rt_logo' );
}

?>

<div class="amt-image-default amt-image-style1">
	<div class="amt-image">
		<?php echo wp_kses_post($amt_logo);?>
	</div>
	<div class="entry-content">
		<h3 class="entry-title title-size-xl"><?php echo esc_html( $data['rt_title'] );?></h3>
		<p class="entry-text"><?php echo esc_html( $data['rt_text'] );?></p>
		<?php if ( $data['social_display'] == 'yes' ) { ?>
			<ul class="author-social">
				<?php foreach ( $ogo_socials as $ogo_social ): ?>
					<li><a target="_blank" href="<?php echo esc_url( $ogo_social['url'] );?>"><i class="fab <?php echo esc_attr( $ogo_social['icon'] );?>"></i></a></li>
				<?php endforeach; ?>
			</ul>
		<?php } ?>
	</div>
</div>		
