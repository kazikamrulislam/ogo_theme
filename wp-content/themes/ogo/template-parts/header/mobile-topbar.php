<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$ogo_socials = OgoTheme_Helper::socials();

$ogo_mobile_meta  = ( OgoTheme::$options['mobile_date'] || OgoTheme::$options['mobile_phone'] || OgoTheme::$options['mobile_email'] || OgoTheme::$options['mobile_address'] || OgoTheme::$options['mobile_social'] && $ogo_socials ) ? true : false;

?>
<?php if ( $ogo_mobile_meta ) { ?>
<div class="mobile-top-bar" id="mobile-top-fix">
	<div class="header-top">
		<?php if ( OgoTheme::$options['mobile_date'] ) { ?>
		<div>
			<div class="icon-left">
			<i class="far fa-calendar-alt"></i>
			</div>
			<div class="info"><span class="info-text"><?php echo date_i18n( get_option('date_format') ); ?></span></div>
		</div>
		<?php } ?>

		<?php if ( OgoTheme::$options['mobile_phone'] ) { ?>
		<div>
			<div class="icon-left">
			<i class="fas fa-phone-alt"></i>
			</div>
			<div class="info"><span class="info-text"><a href="tel:<?php echo esc_attr( OgoTheme::$options['phone'] );?>"><?php echo wp_kses( OgoTheme::$options['phone'] , 'alltext_allow' );?></a></span></div>
		</div>
		<?php } ?>			
		<?php if ( OgoTheme::$options['mobile_email'] ) { ?>
		<div>
			<div class="icon-left">
			<i class="far fa-envelope"></i>
			</div>
			<div class="info"><span class="info-text"><a href="mailto:<?php echo esc_attr( OgoTheme::$options['email'] );?>"><?php echo wp_kses( OgoTheme::$options['email'] , 'alltext_allow' );?></a></span></div>
		</div>
		<?php } ?>
		<?php if ( OgoTheme::$options['mobile_address'] ) { ?>
		<div>
			<div class="icon-left">
			<i class="fas fa-map-marker-alt"></i>
			</div>
			<div class="info"><span class="info-text"><?php echo wp_kses( OgoTheme::$options['address'] , 'alltext_allow' );?></span></div>
		</div>
		<?php } ?>
	</div>
	<?php if ( OgoTheme::$options['mobile_social'] && $ogo_socials ) { ?>
		<ul class="header-social">
			<?php foreach ( $ogo_socials as $ogo_social ): ?>
				<li><a target="_blank" href="<?php echo esc_url( $ogo_social['url'] );?>"><i class="fab <?php echo esc_attr( $ogo_social['icon'] );?>"></i></a></li>
			<?php endforeach; ?>
		</ul>
	<?php } ?>
</div>
<?php } ?>