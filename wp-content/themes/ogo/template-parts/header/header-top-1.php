<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$ogo_socials = OgoTheme_Helper::socials();
$topbar_menu = OgoTheme::$options['topbar_menu'];
$nav_topmenu_args = array('menu' => $topbar_menu, 'container' => 'nav', 'depth' => 1);

?>

<div id="tophead" class="header-top-bar d-flex align-items-center">
	<div class="container">
		<div class="top-bar-wrap">
			<?php if (!empty(OgoTheme::$options['phone_show'] || OgoTheme::$options['menu_show'])) { ?>
				<div class="tophead-left">
					<?php if ((OgoTheme::$options['phone_show'] == 1) && !empty(OgoTheme::$options['phone'])) { ?>
						<div class="tophead-item header-link-item">
							<div class="header-icon-box"><i class="fas fa-phone-alt"></i></div>
							<div class="phone-label header-plain-text">
								<?php if (!empty(OgoTheme::$options['phone_label'])) { ?>
									<?php echo wp_kses(OgoTheme::$options['phone_label'], 'alltext_allow'); ?> :
								<?php } ?>
							</div>
							<a href="tel:<?php echo esc_attr(OgoTheme::$options['phone']); ?>"><?php echo esc_html(OgoTheme::$options['phone']); ?></a>
						</div>
					<?php } ?>
					<?php if ((OgoTheme::$options['menu_show'] == 1) && !empty(OgoTheme::$options['topbar_menu'])) { ?>
						<div class="tophead-item header-link-item">
							<div class="header-icon-box"><i class="far fa-user"></i></div><?php wp_nav_menu($nav_topmenu_args); ?>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
			<?php if (OgoTheme::$options['social_show']) { ?>
				<div class="tophead-right">
					<div class="tophead-item header-link-item">
						<ul class="tophead-social">
							<?php foreach ($ogo_socials as $ogo_social) : ?>
								<li><a target="_blank" href="<?php echo esc_url($ogo_social['url']); ?>"><i class="fab <?php echo esc_attr($ogo_social['icon']); ?>"></i></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>