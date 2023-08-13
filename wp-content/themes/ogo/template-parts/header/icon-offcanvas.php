<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
 
 $ogo_socials = OgoTheme_Helper::socials();
// Logo

if( !empty( OgoTheme::$options['logo'] ) ) {
	$logo_dark = wp_get_attachment_image( OgoTheme::$options['logo'], 'full' );
	$ogo_dark_logo = $logo_dark;
}else {
	$ogo_dark_logo = get_bloginfo( 'name' ); 
}

if( !empty( OgoTheme::$options['logo_light'] ) ) {
	$logo_lights = wp_get_attachment_image( OgoTheme::$options['logo_light'], 'full' );
	$ogo_light_logo = $logo_lights;
}else {
	$ogo_light_logo = get_bloginfo( 'name' );
}

if( !empty( OgoTheme::$options['offcanvas_img'] ) ) {
	$offcanvas1_bg = wp_get_attachment_image_src( OgoTheme::$options['offcanvas_img'], 'full', true );
	$offcanvas_bg_img = $offcanvas1_bg[0];
}else {
	$offcanvas_bg_img = OGO_IMG_URL . 'side-menu.jpg';
}

if ( OgoTheme::$options['offcanvas_bgtype'] == 'offcanvas_color' ) {
	$offcanvas_bg = OgoTheme::$options['offcanvas_color'];
} else {
	$offcanvas_bg = 'url(' . $offcanvas_bg_img. ') no-repeat center bottom / cover';
}
$bgc = '';
if ( OgoTheme::$options['offcanvas_bgtype'] == 'offcanvas_img' ) {
	$bgc = 'offcanvas-bg-opacity';
}

?>

<div class="additional-menu-area header-offcanvus">
	<div class="sidenav sidemenu <?php echo esc_attr( $bgc ); ?>" style="background:<?php echo esc_html( $offcanvas_bg ); ?>">
		<div class="canvas-content">
			<a href="#" class="closebtn"><i class="fas fa-times"></i></a>
			<div class="additional-logo">
				<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $ogo_dark_logo, 'allow_link' ); ?></a>
				<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $ogo_light_logo, 'allow_link' ); ?></a>
			</div>			
			<div class="sidenav-address">
				<div class="mt-5">
					<?php if ( !empty ( OgoTheme::$options['sidetext_label'] ) ) { ?>
					<h4><?php echo wp_kses( OgoTheme::$options['sidetext_label'] , 'alltext_allow' );?></h4>
					<?php } ?>
					<p class="offcanvas-about-text"><?php echo wp_kses( OgoTheme::$options['sidetext'] , 'alltext_allow' );?></p>
				</div>
				<div class="mt-5">
					<?php if( is_active_sidebar('offcanvas') ) { dynamic_sidebar('offcanvas'); } ?>
				</div>
				<div class="mt-5">
					<?php if ( !empty ( OgoTheme::$options['address_label'] ) ) { ?>
					<h4><?php echo wp_kses( OgoTheme::$options['address_label'] , 'alltext_allow' );?></h4>
					<?php } ?>
					<?php if ( OgoTheme::$options['address'] ) { ?>
					<span><i class="fas fa-map-marker-alt list-icon"></i><?php echo wp_kses( OgoTheme::$options['address'] , 'alltext_allow' );?></span>
					<?php } ?>
					<?php if ( OgoTheme::$options['email'] ) { ?>
					<span><i class="fas fa-envelope list-icon"></i><a href="mailto:<?php echo esc_attr( OgoTheme::$options['email'] );?>"><?php echo esc_html( OgoTheme::$options['email'] );?></a></span>
					<?php } ?>			
					<?php if ( OgoTheme::$options['phone'] ) { ?>
					<span><i class="fas fa-phone-alt list-icon"></i><a href="tel:<?php echo esc_attr( OgoTheme::$options['phone'] );?>"><?php echo esc_html( OgoTheme::$options['phone'] );?></a></span>
					<?php } ?>
				</div>
				<div class="mt-5">
					<?php if ( !empty ( $ogo_socials ) ) { ?>
						<?php if ( !empty ( OgoTheme::$options['social_label'] ) ) { ?>
						<h4 class="social-title"><?php echo wp_kses( OgoTheme::$options['social_label'] , 'alltext_allow' );?></h4>
					<?php } } ?>
					<?php if ( $ogo_socials ) { ?>
						<div class="sidenav-social">
							<?php foreach ( $ogo_socials as $ogo_social ): ?>
								<span><a target="_blank" href="<?php echo esc_url( $ogo_social['url'] );?>"><i class="fab <?php echo esc_attr( $ogo_social['icon'] );?>"></i></a></span>
							<?php endforeach; ?>					
						</div>						
					<?php } ?>
				</div>		
			</div>		
		</div>
	</div>
    <button type="button" class="side-menu-open side-menu-trigger">
        <span class="menu-btn-icon">
          <span class="line line1"></span>
          <span class="line line2"></span>
          <span class="line line3"></span>
        </span>
    </button>
</div>