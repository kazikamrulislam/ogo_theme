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

?>
<div class="amt-news-letter-quote amt-news-letter-quote-2">
    <div class="amt-news-quote-2-bg1">
        <svg xmlns="http://www.w3.org/2000/svg" width="148" height="149" fill="none" viewBox="0 0 148 149">
            <path fill="#676E89" d="M0 0h148v149a147.156 147.156 0 0 1-56.641-11.342 147.939 147.939 0 0 1-48.017-32.3 149.053 149.053 0 0 1-32.081-48.34A149.84 149.84 0 0 1 0 0Z"/>
            <path fill="#FBFDFF" d="M148 0v72A71.999 71.999 0 0 1 76 0h72Z"/>
        </svg>
    </div>
    <div class="amt-news-quote-2-bg2">
        <svg xmlns="http://www.w3.org/2000/svg" width="148" height="148" fill="none" viewBox="0 0 148 148">
            <path fill="#53AFEE" d="M148 148A148.002 148.002 0 0 0 0 0v148h148Z"/>
        </svg>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="newsleter-text">
                    <h2 class="newsletter-title"><?php echo wp_kses_post( $data['title'] );?></h2>
                </div>
                <div class="newsletter-btn">
                        <?php echo $btn ;?>
                </div>
            </div>
        </div>
    </div>
</div>