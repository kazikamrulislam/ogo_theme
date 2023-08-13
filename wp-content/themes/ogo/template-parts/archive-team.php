<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( OgoTheme::$layout == 'full-width' ) {
	$ogo_layout_class = 'col-12';
}
else{
	$ogo_layout_class = OgoTheme_Helper::has_active_widget();
}

$iso						= 'g-4 no-equal-gallery';

if ( OgoTheme::$options['team_archive_style'] == 'style1' ){
	$team_archive_layout 		= "team-default team-multi-layout-1 team-grid-style1";
	$template 				 	= 'team-1';
}elseif( OgoTheme::$options['team_archive_style'] == 'style2' ){
	$team_archive_layout 		= "team-default team-multi-layout-2 team-grid-style2";
	$template 				 	= 'team-2';
}elseif( OgoTheme::$options['team_archive_style'] == 'style3' ){
	$team_archive_layout 		= "team-default team-multi-layout-3 team-grid-style3";
	$template 				 	= 'team-3';
}else{
	$team_archive_layout 		= "team-default team-multi-layout-1 team-grid-style1";
	$template 				 	= 'team-1';
}

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">	
		<div class="row">
			<?php
				if ( OgoTheme::$layout == 'left-sidebar' ) {
					get_sidebar();
				}
			?>
			<div class="<?php echo esc_attr( $team_archive_layout );?> <?php echo esc_attr( $ogo_layout_class );?>">
				<main id="main" class="site-main">	
					<?php if ( have_posts() ) :?>
						<div class="row <?php echo esc_attr( $iso );?>">
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="col-xl-3 col-lg-4 col-sm-6 col-12">
									<?php get_template_part( 'template-parts/content', $template ); ?>
								</div>
							<?php endwhile; ?>
						</div>
					<?php OgoTheme_Helper::pagination(); ?>	
					<?php else:?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php endif;?>
				</main>
			</div>
			<?php
				if( OgoTheme::$layout == 'right-sidebar' ){				
					get_sidebar();
				}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
