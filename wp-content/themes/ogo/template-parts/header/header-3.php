<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = OgoTheme_Helper::nav_menu_args();

// Logo

if (!empty(OgoTheme::$options['logo'])) {
	$logo_dark = wp_get_attachment_image(OgoTheme::$options['logo'], 'full');
	$ogo_dark_logo = $logo_dark;
} else {
	$ogo_dark_logo = get_bloginfo('name');
}

if (!empty(OgoTheme::$options['logo_light'])) {
	$logo_lights = wp_get_attachment_image(OgoTheme::$options['logo_light'], 'full');
	$ogo_light_logo = $logo_lights;
} else {
	$ogo_light_logo = get_bloginfo('name');
}

?>
<div id="sticky-placeholder"></div>
<div class="header-menu header-style-3" id="header-menu">
	<div class="container">
		<!-- <div class="amt-nav-up">
			<div class="amt-nav-buttons">
				<div class="nav-contact-col">
					<div class="nav-contact">
						<div class="contact-name">Phone:</div>
						<div class="amt-footer-pnone">
							<div class="cell-1"><a href="tel:<?php //echo OgoTheme::$options['navigation3_phone1']; ?>"><?php //echo OgoTheme::$options['navigation3_phone1']; ?></a></div>
							<div class="cell-2"><a href="tel:<?php //echo OgoTheme::$options['navigation3_phone2']; ?>"><?php //echo OgoTheme::$options['navigation3_phone2']; ?></a></div>
						</div>
					</div>
					<div class="nav-contact">
						<div class="contact-name">Email:</div>
						<div class="amt-footer-mail">
							<div class="contact-mail-1"><a href="mailto:<?php //echo OgoTheme::$options['navigation3_email_1']; ?>"><?php //echo OgoTheme::$options['navigation3_email_1']; ?></a></div>
							<div class="contact-mail-2"><a href="mailto:<?php //echo OgoTheme::$options['navigation3_email_2']; ?>"><?php //echo OgoTheme::$options['navigation3_email_2']; ?></a></div>
						</div>
					</div>
				</div>
				<div class="amt-social-col">
					<a href="#"><i class="fab fa-facebook"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-linkedin"></i></a>
					<a href="#"><i class="fab fa-youtube"></i></a>
					<?php
					if (OgoTheme::$options['footer_copyright_item_type'] == 'navigation3_social_icon') {
						if (!empty(OgoTheme::$options['navigation3_social_icon'])) {
							echo wp_get_attachment_image(OgoTheme::$options['navigation3_social_icon'], 'full');
						}
					}
					?>

				</div>
			</div>
		</div> -->
		<div class="menu-full-wrap">
			<div class="site-branding">
				<a class="dark-logo" href="<?php echo esc_url(home_url('/')); ?>"><?php echo wp_kses($ogo_dark_logo, 'allow_link'); ?></a>
				<a class="light-logo" href="<?php echo esc_url(home_url('/')); ?>"><?php echo wp_kses($ogo_light_logo, 'allow_link'); ?></a>
				<div class="menu-wrap">
					<div id="site-navigation" class="main-navigation">
						<?php if (has_nav_menu('primary')) {
							wp_nav_menu($nav_menu_args);
						} else {
							if (is_user_logged_in()) {
								echo '<ul id="menu" class="nav fallbackcd-menu-item"><li><a class="fallbackcd" href="' . esc_url(admin_url('nav-menus.php')) . '">' . esc_html__('Add a menu', 'ogo') . '</a></li></ul>';
							}
						} ?>
					</div>
				</div>
			</div>
			<?php if (OgoTheme::$options['cart_icon'] || OgoTheme::$options['search_icon'] || OgoTheme::$options['vertical_menu_icon']) { ?>
				<div class="header-icon-area">
					<?php if (OgoTheme::$options['cart_icon']) { ?>
						<?php get_template_part('template-parts/header/icon', 'cart'); ?>
					<?php }
					if (OgoTheme::$options['search_icon']) { ?>
						<?php get_template_part('template-parts/header/icon', 'search'); ?>
					<?php }
					if (OgoTheme::$options['vertical_menu_icon']) { ?>
						<?php get_template_part('template-parts/header/icon', 'menu'); ?>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<div class="container">
	<?php if (OgoTheme::$options['head_ad_option']) { ?>
		<div class="header-after-ad">
			<?php if (OgoTheme::$options['ad_type'] == 'adimage') { ?>
				<?php if (OgoTheme::$options['ad_img_link']) {
					$target = OgoTheme::$options['ad_img_target'] ? 'target="_blank"' : '';
					echo '<a ' . $target . '  href="' . esc_url(OgoTheme::$options['ad_img_link']) . '">' . wp_get_attachment_image(OgoTheme::$options['adimage'], 'full') . '</a>';
				} else {
					echo wp_get_attachment_image(OgoTheme::$options['adimage'], 'full');
				} ?>
			<?php } else {
				echo OgoTheme::$options['adcustom'];
			} ?>
		</div>
	<?php } ?>
</div>