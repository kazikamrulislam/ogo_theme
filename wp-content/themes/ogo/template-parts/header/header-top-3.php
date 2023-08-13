<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$ogo_socials = OgoTheme_Helper::socials();

?>

<div id="tophead" class="header-top-bar d-flex align-items-center">
	<div class="container">
		<div class="top-bar-wrap">
			<?php if (!empty(OgoTheme::$options['phone_show'] || OgoTheme::$options['email_show'] || OgoTheme::$options['address_show'])) { ?>
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
					<?php if ((OgoTheme::$options['email_show'] == 1) && !empty(OgoTheme::$options['email'])) { ?>
						<div class="tophead-item header-link-item">
							<div class="header-icon-box"><i class="fas fa-envelope"></i></div><a href="mailto:<?php echo esc_attr(OgoTheme::$options['email']); ?>"><?php echo esc_html(OgoTheme::$options['email']); ?></a>
						</div>
					<?php } ?>
					<?php if (OgoTheme::$options['address_show']) { ?>
						<div class="tophead-item">
							<div class="header-icon-box"><i class="fas fa-map-marker-alt"></i></div>
							<div class="header-plain-text"><?php echo wp_kses(OgoTheme::$options['address'], 'alltext_allow'); ?>
							</div>
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