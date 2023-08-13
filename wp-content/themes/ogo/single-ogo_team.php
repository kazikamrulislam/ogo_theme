<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
// Layout class
if ( OgoTheme::$layout == 'full-width' ) {
	$ogo_layout_class = 'col-sm-12 col-12';
}
else{
	$ogo_layout_class = OgoTheme_Helper::has_active_widget();
}

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php if ( OgoTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
				<div class="<?php echo esc_attr( $ogo_layout_class );?>">
					<main id="main" class="site-main">
						<?php							
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-single', 'team' );
							endwhile;						
						?>
					</main>
				</div>
			<?php if ( OgoTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
		</div>
	</div>


    <section class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="call-to-action-wrapper">
                        <h4>Lorem ipsum dolor sit amet, consectetur.</h4>
                        <a href="#" class="btn cta-btn">Clieck now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<?php get_footer(); ?>