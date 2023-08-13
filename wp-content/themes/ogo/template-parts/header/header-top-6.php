<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$ogo_socials = OgoTheme_Helper::socials();
$topbar_menu = OgoTheme::$options['topbar_menu'];
$nav_topmenu_args = array( 'menu' => $topbar_menu, 'container' => 'nav', 'depth' => 1 );

?>

<div id="tophead" class="header-top-bar top_bar_5 d-flex align-items-center">
	<div class="container">
		<div class="top-bar-wrap">
				
			<div class="tophead-left ">
				<div class="amt-contact">
					<?php if ( OgoTheme::$options['top_contact_btn_item']) { ?>
					<a href="#" class="amt-nav-contact">
						<?php if ( OgoTheme::$options['contact_btn_item'] ) { ?>
							<?php get_template_part( 'template-parts/header/icon', 'offcanvas2' );?>
								<div href="#"><?php echo OgoTheme::$options['nav_button_text']; ?></div>
						<?php } ?>
					</a>
					<?php } ?>
					<?php if ( OgoTheme::$options['social_show'] ) { ?>	
						<div class="nav-social-contact">
							<div class="amt-social-col">
								<?php foreach ( $ogo_socials as $ogo_social ): ?>
									<li><a target="_blank" href="<?php echo esc_url( $ogo_social['url'] );?>"><i class="fab <?php echo esc_attr( $ogo_social['icon'] );?>"></i></a></li>
								<?php endforeach; ?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<?php if ( OgoTheme::$options['top_search_icon']) { ?>	
			<div class="tophead-right">
				<?php if ( OgoTheme::$options['search_icon']) { ?>
					<?php if ( OgoTheme::$options['search_icon'] ) { ?>
						<?php get_template_part( 'template-parts/header/icon', 'search' );?>
							<!-- <div class="amt-nav-searchbar">
								<input type="text" placeholder="Search....">
								<i class="fa fa-search"></i>
							</div> -->
						<?php } ?>
				<?php } ?>
			</div>
			<?php } ?>
			
		</div>
		<div class="amt-nav-up"></div>
	</div>
</div>