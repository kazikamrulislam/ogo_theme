<?php
$f1_wc1 = OgoTheme::$options['f1_wc1'];
$f1_wc2 = OgoTheme::$options['f1_wc2'];
$f1_wc3 = OgoTheme::$options['f1_wc3'];
$f1_wc4 = OgoTheme::$options['f1_wc4'];

$ogo_socials = OgoTheme_Helper::socials();

if( !empty( OgoTheme::$options['footer1_bg_img'] ) ) {
	$f1_bg = wp_get_attachment_image_src( OgoTheme::$options['footer1_bg_img'], 'full', true );
	$footer1_bg_img = $f1_bg[0];
}else {
	$footer1_bg_img = OGO_IMG_URL . 'footer_bg.jpg';
}

if ( OgoTheme::$options['footer1_bg_type'] == 'footer1_bg_color' ) {
	if (!empty ( OgoTheme::$options['footer1_bg_color'] )) {
		$ogo_bg = 'background:' . OgoTheme::$options['footer1_bg_color'];
	} else {
		$ogo_bg = '';
	}
} else {
	$ogo_bg = 'background:' . 'url(' . $footer1_bg_img . ') no-repeat center bottom / cover';
}
$bgc = '';
if ( OgoTheme::$options['footer1_bg_type'] == 'footer1_bg_img' ) {
	$bgc = 'footer-bg-opacity footer-1';
}

?>

<div class="footer-top-area <?php echo esc_attr( $bgc ); ?>" style="<?php echo esc_html( $ogo_bg ); ?>">
	<?php if ( is_active_sidebar( 'footer-style-1-1' ) && OgoTheme::$footer_area == 1 ) { ?>
	<div class="footer-content-area">
		<div class="container">			
        <div class="row">
				<?php if ( is_active_sidebar( 'footer-style-1-1' ) ) { ?>
				<div class="col-lg-<?php echo esc_attr( $f1_wc1 ); ?>">
					<?php dynamic_sidebar( 'footer-style-1-1' ); ?>
				</div>
				<?php } if ( is_active_sidebar( 'footer-style-1-2' ) ) { ?>
				<div class="col-lg-<?php echo esc_attr( $f1_wc2 ); ?>">
					<?php dynamic_sidebar( 'footer-style-1-2' ); ?>
				</div>
				<?php } if ( is_active_sidebar( 'footer-style-1-3' ) ) { ?>
				<div class="col-lg-<?php echo esc_attr( $f1_wc3 ); ?>">
					<?php dynamic_sidebar( 'footer-style-1-3' ); ?>
				</div>
				<?php } if ( is_active_sidebar( 'footer-style-1-4' ) ) { ?>
				<div class="col-lg-<?php echo esc_attr( $f1_wc4 ); ?>">
					<?php dynamic_sidebar( 'footer-style-1-4' ); ?>
				</div>
				<?php } ?>			
			</div>		
		</div>
	</div>
	<?php } ?>
	<?php if ( OgoTheme::$copyright_area == 1 ) { ?>
	<div class="footer-copyright-area">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="copyright"><?php echo wp_kses( OgoTheme::$options['copyright_text'] , 'allow_link' );?></div>
				</div>
				<div class="col">
					<div class="footer-copyright-img">
                    <?php
                        if( OgoTheme::$options['footer_copyright_item_type'] == 'footer_copyright_item_img' ){
                            if( !empty( OgoTheme::$options['footer_copyright_item_img'] ) ) {
                            echo wp_get_attachment_image( OgoTheme::$options['footer_copyright_item_img'], 'full' );

                         }
                        }
                        else{
                            if (!empty ( OgoTheme::$options['footer_copyright_item_text'] )) { ?>
                                <p><?php echo wp_kses( OgoTheme::$options['footer_copyright_item_text'] , 'allow_link' );?></p>
                        <?php 
                            }
                        } ?>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>

