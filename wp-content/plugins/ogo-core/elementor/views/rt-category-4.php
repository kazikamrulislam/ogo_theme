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

$args = array (
    'taxonomy' => 'category',  
    'hide_empty' => true,  
    'include' => 'all',  
    'fields' => 'all', 
);

if ( $data['catid'] ) {
	$args['include'] = $data['catid'];
}

$terms = get_terms($args );
$col_class = "col-xl-{$data['col_xl']} col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-{$data['col']}";

?>
<div class="amt-category amt-category-<?php echo esc_attr( $data['style'] );?>">
	<div class="row <?php echo esc_attr( $data['item_space'] );?>">
	<?php foreach( $terms as $term ) { ?>
		<div class="<?php echo esc_attr( $col_class );?>">
			<div class="amt-item">
				<div class="amt-image">
					<?php 
					$get_image  = get_term_meta( $term->term_id , 'rt_category_image', 'true' );
					if ( $get_image ) {	
						echo wp_get_attachment_image( $get_image, 'full' );
					}else {
						echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_asset_file( 'element/noimage.jpg' ) . '" alt="'.get_the_title().'">';
					}
					?>					
				</div>
				<div class="amt-content">
		            <h4 class="amt-cat-name">
		                <a href="<?php echo esc_url( get_category_link( $term->term_id ) ); ?>"><?php echo esc_html( $term->name ); ?></a> 
		            </h4>	
		            <?php if( $data['cat_count'] == 'yes' ) { ?>
		            <p class="amt-cat-count">
		                <span class="anim-overflow">(<?php echo esc_html( $term->count ); ?>)</span>
		            </p>
		        	<?php } ?>	            
		        </div>
		    </div>
		</div>
	<?php } ?>
	</div>
</div>