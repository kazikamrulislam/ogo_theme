<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

?>
</div><!--#content-->

<!-- progress-wrap -->
<?php if ( OgoTheme::$options['back_to_top'] ) { ?>
<div class="scroll-wrap">
  <svg
	class="scroll-circle svg-content"
	width="100%"
	height="100%"
	viewBox="-1 -1 102 102"
  >
	<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
  </svg>
</div>
<?php } ?>

<footer>
	<div id="footer-<?php echo esc_attr( OgoTheme::$footer_style ); ?>" class="footer-area">
		<?php
			get_template_part( 'template-parts/footer/footer', OgoTheme::$footer_style );
		?>
	</div>
</footer>

<?php if ( ( OgoTheme::$options['scroll_indicator_enable'] == '1' ) && ( OgoTheme::$options['scroll_indicator_position'] == 'below' ) ){ ?>
<div class="ogo-progress-container bottom">
	<div class="ogo-progress-bar" id="ogoBar"></div>
</div>
<?php } ?>


</div>
<?php wp_footer();?>
</body>
</html>