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
			<div class="tophead-left">
				<?php if ( ( OgoTheme::$options['phone_show'] == 1 ) && !empty( OgoTheme::$options['phone'] ) && !empty( OgoTheme::$options['phone2'] ) ) { ?>
					<div class="nav-contact">
						<div class="contact-name">Phone:</div>
						<div class="amt-footer-pnone">
							<div class="cell-1"><a href="tel:<?php echo OgoTheme::$options['phone']; ?>"><?php echo OgoTheme::$options['phone']; ?></a></div>
							<div class="cell-2"><a href="tel:<?php echo OgoTheme::$options['phone2']; ?>"><?php echo OgoTheme::$options['phone2']; ?></a></div>
						</div>
					</div>
					<?php } ?>
					<?php if ( ( OgoTheme::$options['email_show'] == 1 ) && !empty( OgoTheme::$options['email'] ) && !empty( OgoTheme::$options['email2'] ) ) { ?>
					<div class="nav-contact">
						<div class="contact-name">Email:</div>
						<div class="amt-footer-mail">
							<div class="contact-mail-1"><a href="mailto:<?php echo OgoTheme::$options['email']; ?>"><?php echo OgoTheme::$options['email']; ?></a></div>
							<div class="contact-mail-2"><a href="mailto:<?php echo OgoTheme::$options['email2']; ?>"><?php echo OgoTheme::$options['email2']; ?></a></div>
						</div>
					</div>
				<?php } ?>
				<?php if ( (OgoTheme::$options['menu_show'] == 1 ) && !empty( OgoTheme::$options['topbar_menu'] ) ) { ?>
				<div class="tophead-item header-link-item"><div class="header-icon-box"><i class="far fa-user"></i></div><?php wp_nav_menu( $nav_topmenu_args );?></div>
				<?php } ?>
			</div>
			<?php if ( OgoTheme::$options['social_show'] ) { ?>	
			<div class="tophead-right">
				<!-- <div class="tophead-item header-link-item">									
					<ul class="tophead-social">
						<?php foreach ( $ogo_socials as $ogo_social ): ?>
						<li><a target="_blank" href="<?php echo esc_url( $ogo_social['url'] );?>"><i class="fab <?php echo esc_attr( $ogo_social['icon'] );?>"></i></a></li>
						<?php endforeach; ?>
					</ul>					
				</div> -->
				<div class="amt-social-col">
					<?php foreach ( $ogo_socials as $ogo_social ): ?>
						<li><a target="_blank" href="<?php echo esc_url( $ogo_social['url'] );?>"><i class="fab <?php echo esc_attr( $ogo_social['icon'] );?>"></i></a></li>
					<?php endforeach; ?>
					<!-- <a href="<?php echo esc_url( $ogo_social['url'] );?>"><i class="fab <?php echo esc_attr( $ogo_social['icon'] );?>"></i></a>
					<a href="<?php echo esc_url( $ogo_social['url'] );?>"><i class="fab <?php echo esc_attr( $ogo_social['icon'] );?>"></i></a>
					<a href="<?php echo esc_url( $ogo_social['url'] );?>"><i class="fab <?php echo esc_attr( $ogo_social['icon'] );?>"></i></a>
					<a href="<?php echo esc_url( $ogo_social['url'] );?>"><i class="fab <?php echo esc_attr( $ogo_social['icon'] );?>"></i></a> -->
					<?php
                        if( OgoTheme::$options['footer_copyright_item_type'] == 'navigation3_social_icon' ){
                            if( !empty( OgoTheme::$options['navigation3_social_icon'] ) ) {
                            echo wp_get_attachment_image( OgoTheme::$options['navigation3_social_icon'], 'full' );

                         }
                        }
						?>
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="amt-nav-up"></div>
	</div>
	
</div>