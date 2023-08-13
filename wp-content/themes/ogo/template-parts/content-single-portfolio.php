<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
global $post;


$categories 					= get_the_terms($post->ID, 'ogo_portfolio_category');
$ogo_portfolio_client       	= get_post_meta($post->ID, 'ogo_portfolio_client', true);
$ogo_portfolio_date       		= get_post_meta($post->ID, 'ogo_portfolio_date', true);
$ogo_portfolio_services       	= get_post_meta($post->ID, 'ogo_portfolio_services', true);

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('amt-portfolio-single'); ?>>
	<div class="amt-single-portfolio-content">
		<div class="row">
			<div class="col-md-12">
				<div class="portfolio-top-title">
					<h2 class="entry-title"><?php the_title();?></h2>
				</div>
				<div class="single-portfolio-thumb">
					<?php if ( OgoTheme::$options['post_featured_image'] == true ) { ?>
                        <?php if ( has_post_thumbnail() ) { ?>
                            <?php the_post_thumbnail( 'full' ); ?><?php }
							else { 
								echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_asset_file('element/noimage_560X680.jpg') . '" alt="' . get_the_title() . '">';
							} ?>
						<?php }
					?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="single-portfolio-meta-field">
					<div class="portfolio_info">
						<ul>
							<?php if (!empty($categories)) { ?>
								<li><span class="portfolio-label"><?php esc_html_e('Category', 'ogo'); ?> : </span><?php foreach($categories as $cat) echo $cat->name.' ';?> </li>
							<?php }
							if (!empty($ogo_portfolio_client)) { ?>
								<li><span class="portfolio-label"><?php esc_html_e('Client', 'ogo'); ?> : </span><?php echo esc_html($ogo_portfolio_client); ?></li>
							<?php }
							if (empty($ogo_portfolio_date)) { ?>
								<li><span class="portfolio-label"><?php esc_html_e('Date', 'ogo'); ?> : </span><?php echo get_the_date('F j, Y '); ?></li>
							<?php }
							if (!empty($ogo_portfolio_services)) { ?>
								<li><span class="portfolio-label"><?php esc_html_e('Services', 'ogo'); ?> : </span><?php echo esc_html($ogo_portfolio_services); ?></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
