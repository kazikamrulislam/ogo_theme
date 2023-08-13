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
<div class="header-menu" id="header-middlebar">
	<div class="container">
		<div class="menu-full-wrap">
			<!-- <?php if (OgoTheme::$options['vertical_menu_icon']) { ?>
			<div class="menu-user">
				<?php if (OgoTheme::$options['vertical_menu_icon']) { ?>
					<?php get_template_part('template-parts/header/icon', 'offcanvas'); ?>
				<?php } ?>
			</div>
			<?php } ?> -->
			<div class="logo-menu-wrap">
				<div class="site-branding">
					<a class="dark-logo" href="<?php echo esc_url(home_url('/')); ?>"><?php echo wp_kses($ogo_dark_logo, 'allow_link'); ?></a>
					<a class="light-logo" href="<?php echo esc_url(home_url('/')); ?>"><?php echo wp_kses($ogo_light_logo, 'allow_link'); ?></a>
				</div>
			</div>
			<div class="menu-wrap-1">
				<div id="site-navigation" class="main-navigation">
					<?php wp_nav_menu($nav_menu_args); ?>
				</div>
			</div>
			<!-- <?php if (OgoTheme::$options['cart_icon'] || OgoTheme::$options['search_icon']) { ?>
			<div class="header-icon-area">
				<?php if (OgoTheme::$options['search_icon']) { ?>
				<div class="header-search-six">
					<form role="search" method="get" action="<?php echo esc_url(home_url('/'))  ?>" class="search-form">
						<input required="" type="text" id="search-form-5f51fb188e3b0" class="search-field" placeholder="<?php esc_attr_e('Search …', 'ogo'); ?>" value="" name="s">
						<button class="search-button" type="submit">
							<i class="fa fa-search" aria-hidden="true"></i>
						</button>
					</form>
				</div>	
				<?php } ?>	
				<?php if (OgoTheme::$options['cart_icon']) { ?>
					<?php get_template_part('template-parts/header/icon', 'cart'); ?>
				<?php } ?>
			</div>
			<?php } ?> -->
		</div>
	</div>
</div>
<div class="header-menu" id="header-menu">
	<div class="container">
		<div class="menu-full-wrap">
			<div class="menu-wrap-2" id="header-menu">
				<div id="site-navigation" class="main-navigation">
					<?php wp_nav_menu($nav_menu_args); ?>
				</div>
			</div>
			<?php if (OgoTheme::$options['cart_icon'] || OgoTheme::$options['search_icon'] || OgoTheme::$options['vertical_menu_icon']) { ?>
				<div class="header-icon-area">
					<?php if (OgoTheme::$options['search_icon']) { ?>
						<?php get_template_part('template-parts/header/icon', 'search'); ?>
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