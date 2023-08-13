<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Ogo_Core;
use OgoTheme_Helper;
use Elementor\Group_Control_Image_Size;

// image
$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'video_image' );
$element = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'shape_image' );
?>
<div class="amt-video-layout motion-effects">
	<div class="amt-video">
		<div class="amt-img">
		<?php echo wp_kses_post($getimg);?>
		</div>
		<div class="amt-icon">
			<a class="amt-play amt-video-popup" href="<?php echo esc_url( $data['videourl']['url'] );?>"><i class="fas fa-play"></i></a>
		</div>
	</div>
	<div class="element motion-effects1"><?php echo wp_kses_post($element);?></div>
</div>