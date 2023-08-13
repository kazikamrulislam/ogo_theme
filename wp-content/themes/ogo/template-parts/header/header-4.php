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
<div class="header-menu header-style-4" id="header-menu">
	<div class="container">
		<div class="amt-nav-up">
			<div class="amt-nav-buttons">
				<div class="amt-contact">
					<?php if (OgoTheme::$options['contact_btn_item']) { ?>
						<a href="#" class="amt-nav-contact">
							<?php if (OgoTheme::$options['contact_btn_item']) { ?>
								<?php get_template_part('template-parts/header/icon', 'offcanvas2'); ?>
								<div href="#"><?php echo OgoTheme::$options['nav_button_text']; ?></div>
							<?php } ?>
						</a>
					<?php } ?>
					<div class="nav-social-contact">
						<a href="#"><i class="fab fa-facebook"></i></a>
						<a href="#"><i class="fab fa-twitter"></i></a>
						<a href="#"><i class="fab fa-linkedin"></i></a>
						<a href="#"><i class="fab fa-youtube"></i></a>
					</div>
				</div>
				<?php if (OgoTheme::$options['search_icon']) { ?>
					<?php if (OgoTheme::$options['search_icon']) { ?>
						<?php get_template_part('template-parts/header/icon', 'search'); ?>
						<!-- <div class="amt-nav-searchbar">
								<input type="text" placeholder="Search....">
								<i class="fa fa-search"></i>
							</div> -->
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="menu-full-wrap">
			<div class="logo-menu-wrap">
				<div class="site-branding">
					<a class="dark-logo" href="<?php echo esc_url(home_url('/')); ?>"><?php echo wp_kses($ogo_dark_logo, 'allow_link'); ?></a>
					<a class="light-logo" href="<?php echo esc_url(home_url('/')); ?>"><?php echo wp_kses($ogo_light_logo, 'allow_link'); ?></a>
				</div>
			</div>
			<div class="menu-wrap">
				<div id="site-navigation" class="main-navigation">
					<?php wp_nav_menu($nav_menu_args); ?>
				</div>
			</div>
			<?php if (OgoTheme::$options['cart_icon'] || OgoTheme::$options['search_icon'] || OgoTheme::$options['vertical_menu_icon'] || OgoTheme::$options['contact_btn_item']) { ?>
				<div class="header-icon-area">
					<?php if (OgoTheme::$options['cart_icon']) { ?>
						<?php get_template_part('template-parts/header/icon', 'cart'); ?>
					<?php }
					if (OgoTheme::$options['vertical_menu_icon']) { ?>
						<?php get_template_part('template-parts/header/icon', 'offcanvas'); ?>
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