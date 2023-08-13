<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = OgoTheme_Helper::nav_menu_args();
$ogo_socials = OgoTheme_Helper::socials();

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
<div class="header-menu header-style-1" id="header-menu">
	<div class="container">
		<div class="menu-full-wrap">
			<div class="site-branding">
				<a class="dark-logo" href="<?php echo esc_url(home_url('/')); ?>"><?php echo wp_kses($ogo_dark_logo, 'allow_link'); ?></a>
				<a class="light-logo" href="<?php echo esc_url(home_url('/')); ?>"><?php echo wp_kses($ogo_light_logo, 'allow_link'); ?></a>
			</div>
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

			<?php if (OgoTheme::$options['user_btn_item']) { ?>
				<div class="header-icon-area">
					<?php if (OgoTheme::$options['user_btn_item']) { ?>
						<?php get_template_part('template-parts/header/icon', 'offcanvas2'); ?>
						<div class="amt-nav-buttons">
							<a href="#" class="amt-btn-sign-in">Sign in</a>
							<a href="#" class="amt-btn-sign-up">Sign Up</a>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>