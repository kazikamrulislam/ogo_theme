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
	$btn = '<a class="service-btn" ' . $attr . '>' . $data['button_one'] .'</a>';
}

$bg_image = OgoTheme_Helper::get_img('news-bg.png');
?>
<style>
    .amt-news-letter-quote-1:before {
        background-image: url("<?php echo $bg_image; ?>");
            }
</style>

<div class="amt-news-letter-quote amt-news-letter-quote-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="newsleter-text">
                    <h2 class="newsletter-title"><?php echo wp_kses_post( $data['title'] );?></h2>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12">
                <div class="newsletter-btn">
                    <?php echo $btn ;?>
                </div>
            </div>
        </div>
    </div>
</div>