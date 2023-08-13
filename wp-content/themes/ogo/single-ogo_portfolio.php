<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
// Layout class
if ( OgoTheme::$layout == 'full-width' ) {
	$ogo_layout_class = 'col-md-12 col-sm-12 col-12';
}
else{
	$ogo_layout_class = OgoTheme_Helper::has_active_widget();
}

?>
<?php get_header(); ?>
<div id="primary" class="content-area porfolio-single-page">
	<div class="container">
		<div class="row">
			<?php if ( OgoTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
				<div class="<?php echo esc_attr( $ogo_layout_class );?>">
					<main id="main" class="site-main">
						<?php							
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-single', 'portfolio' );
							endwhile;						
						?>
					</main>
				</div>
			<?php if ( OgoTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
		</div>
	</div>

	<?php if(OgoTheme::$options['show_cta_portfolio'] == '1'){ ?>

		<div class="portfolio-cta">
			<div class="container">
				<div class="row">
					<div class="<?php echo esc_attr( $ogo_layout_class );?>">
						<div class="cta-content">
							<div class="cta-title"><h3><?php echo wp_kses( OgoTheme::$options['portfolio_cta_title'] , 'alltext_allow' ); ?></h3></div>
							<div class="cta-button">
								<a href="<?php echo esc_url( OgoTheme::$options['portfolio_cta_btn_link'] )?>"><?php echo wp_kses( OgoTheme::$options['portfolio_cta_btn_text'] , 'alltext_allow' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php } ?>

	<?php if( OgoTheme::$options['show_related_portfolio'] == '1') { ?>
		<div class="portfolio-recent-post">
			<div class="container">
				<div class="row">
					<?php ogo_related_portfolio(); ?>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<?php get_footer(); ?>