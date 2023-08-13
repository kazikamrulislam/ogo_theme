<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

global $product;
$product_id  = $product->get_id();

?>
<div class="amt-product-block amt-product-block-1">
	<div class="amt-thumb-wrapper">
		<div class="amt-thumb">
			<?php woocommerce_template_loop_product_thumbnail(); ?>
		</div>
		<?php //woocommerce_show_product_loop_sale_flash();?>
		<div class="amt-buttons-area">
			<div class="btn-icons">					
				<div class="inline-item">
					<?php if ( OgoTheme::$options['wc_shop_wishlist_icon'] ) WC_Functions::print_add_to_wishlist_icon(); ?>
				</div>						
				<div class="inline-item">
					<?php if ( OgoTheme::$options['wc_shop_quickview_icon'] ) WC_Functions::print_quickview_icon(); ?>
				</div>
				<div class="inline-item">
					<?php if ( OgoTheme::$options['wc_shop_compare_icon'] ) WC_Functions::print_compare_icon(); ?>
				</div>
			</div>
		</div>
		<div class="amt-btn-cart">
			<?php if ( OgoTheme::$options['wc_shop_cart_icon'] ) WC_Functions::print_add_to_cart_icon( $product_id, true, true ); ?>
		</div>					
	</div>
	<div class="price-title-box">
		<div class="amt-title-area">
			<h3 class="amt-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
		</div>
		<?php if ( OgoTheme::$options['wc_shop_rating'] == 1 ) { ?>
		<div class="rating-custom">
			<?php //wc_get_template( 'rating.php' ); ?>
			<?php woocommerce_template_single_rating(); ?>
		</div>
		<?php } ?>
		<div class="amt-price-area">
			<?php if ( $price_html = $product->get_price_html() ) : ?>
				<div class="amt-price"><?php echo wp_kses_post( $price_html ); ?></div>
			<?php endif; ?>
		</div>
	</div>
</div>