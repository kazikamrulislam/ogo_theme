<?php
/*
Plugin Name: Ogo Core
Plugin URI: https://www.addonmonster.com
Description: Ogo Core Plugin for Ogo Theme
Version: 1.5
Author: AddonMonster
Author URI: https://www.addonmonster.com
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'OGO_CORE' ) ) {
	define( 'OGO_CORE',                   ( WP_DEBUG ) ? time() : '1.0' );
	define( 'OGO_CORE_THEME_PREFIX',      'ogo' );
	define( 'OGO_CORE_THEME_PREFIX_VAR',  'ogo' );
	define( 'OGO_CORE_CPT_PREFIX',        'ogo' );
	define( 'OGO_CORE_BASE_DIR',      plugin_dir_path( __FILE__ ) );

}

class Ogo_Core {

	public $plugin  = 'ogo-core';
	public $action  = 'ogo_theme_init';

	public function __construct() {
		$prefix = OGO_CORE_THEME_PREFIX_VAR;

		add_action( 'plugins_loaded', array( $this, 'demo_importer' ), 15 );
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ), 16 );
		add_action( 'after_setup_theme', array( $this, 'post_meta' ), 15 );
		add_action( 'after_setup_theme', array( $this, 'elementor_widgets' ) );
		add_action( $this->action,       array( $this, 'after_theme_loaded' ) );
		add_shortcode('ogo-post-single-gallery', array( $this, 'ogo_post_single_gallery' ) );
		add_shortcode('ogo-single-event-info', array( $this, 'ogo_single_event_info' ) );

		add_action( 'init', array( $this, 'rewrite_flush_check' ) );
		add_action( 'plugins_loaded',       array( $this, 'php_version_check' ));
		add_action( 'wp_head', array( $this, 'insert_fb_in_head' ), 5 );

		require_once 'module/amt-post-share.php';
		require_once 'module/amt-post-views.php';
		require_once 'module/amt-post-length.php';

		// Widgets
		require_once 'widget/footer-about-widget.php';
		require_once 'widget/about-widget.php';
		require_once 'widget/address-widget.php';
		require_once 'widget/footer-address-widget.php';
		require_once 'widget/social-widget.php';
		require_once 'widget/amt-post-box.php';
		require_once 'widget/amt-post-tab.php';
		require_once 'widget/amt-feature-post.php';
		require_once 'widget/search-widget.php';
		require_once 'widget/amt-category.php';

		require_once 'widget/widget-settings.php';
		require_once 'lib/optimization/__init__.php';
	}

	/**
	 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
	*/
	public function php_version_check(){

		if ( version_compare(phpversion(), '7.2', '<') ){
			add_action( 'admin_notices', [ $this, 'php_version_message' ] );
		}

		if ( version_compare(phpversion(), '7.2', '>') ){
			require_once OGO_CORE_BASE_DIR . 'lib/optimization/__init__.php';
		}
		
	}

	public function php_version_message(){

		$class = 'notice notice-warning settings-error';
		/* translators: %s: html tags */
		$message = sprintf( __( 'The %1$sOgo Optimization%2$s requires %1$sphp 7.2+%2$s. Please consider updating php version and know more about it <a href="https://wordpress.org/about/requirements/" target="_blank">here</a>.', 'ogo-core' ), '<strong>', '</strong>' );
		printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), wp_kses_post( $message ));

	}

	public function demo_importer() {
		require_once 'demo-importer.php';
	}
	public function load_textdomain() {
		load_plugin_textdomain( $this->plugin , false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
	public function post_meta(){
		if ( !did_action( $this->action ) || ! defined( 'AMT_FRAMEWORK_VERSION' ) ) {
			return;
		}
		require_once 'post-meta.php';
		require_once 'post-types.php';
	}
	public function elementor_widgets(){
		if ( did_action( $this->action ) && did_action( 'elementor/loaded' ) ) {

			require_once 'elementor/init.php';
		}
	}
	public function after_theme_loaded() {
		require_once OGO_CORE_BASE_DIR . 'lib/wp-svg/init.php'; // SVG support
		require_once 'widget/sidebar-generator.php'; // sidebar widget generator
	}

	public function get_base_url(){

		$file = dirname( dirname(__FILE__) );

		// Get correct URL and path to wp-content
		$content_url = untrailingslashit( dirname( dirname( get_stylesheet_directory_uri() ) ) );
		$content_dir = untrailingslashit( WP_CONTENT_DIR );

		// Fix path on Windows
		$file = wp_normalize_path( $file );
		$content_dir = wp_normalize_path( $content_dir );

		$url = str_replace( $content_dir, $content_url, $file );

		return $url;

	}

	public function rewrite_flush_check() {
		$prefix = OGO_CORE_THEME_PREFIX_VAR;
		if ( get_option( "{$prefix}_rewrite_flash" ) == true ) {
			flush_rewrite_rules();
			update_option( "{$prefix}_rewrite_flash", false );
		}
	}

	/*Post Single Shortcode*/
	public function ogo_post_single_gallery() {
		ob_start();
		$ogo_post_gallerys_raw = get_post_meta( get_the_ID(), 'ogo_post_gallery', true );
		$ogo_post_gallerys = explode( "," , $ogo_post_gallerys_raw );
			if ( !empty( $ogo_post_gallerys ) ) { ?>
			<div class="amt-swiper-slider single-post-slider">
				<div class="amt-swiper-container" data-autoplay="false" data-autoplay-timeout="true" data-slides-per-view="1" data-centered-slides="true" data-space-between="30" data-r-x-small="1" data-r-small="1" data-r-medium="1" data-r-large="1" data-r-x-large="1">
					<div class="swiper-wrapper">
					<?php foreach( $ogo_post_gallerys as $ogo_post_gallery ) { ?>
					<div class="swiper-slide">
						<?php echo wp_get_attachment_image( $ogo_post_gallery, 'ogo-size2', "", array( "class" => "img-responsive" ) );
						?>
					</div>
					<?php } ?>
					</div>
					<div class="swiper-button">
						<div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
						<div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
					</div>
				</div>
			</div>
		<?php }
		return ob_get_clean();
	}

	public function insert_fb_in_head() {
	    global $post;
        echo '<meta property="og:site_name" content="'.get_bloginfo( 'name' ).'"/>';
	    if ( !is_singular()) //if it is not a post or a page
	        return;

        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
	    if(has_post_thumbnail( $post->ID )) { 
	        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
	        echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	    }
	}
}

new Ogo_Core;

/*Category Image*/
if (!class_exists('RT_TAX_META')) {

    class RT_TAX_META
    {
        public function __construct() {
        }

        /*
         * Initialize the class and start calling our hooks and filters
         * @since 1.0.0
        */
        public function init() {
            add_action('ogo_faq_category_add_form_fields', array($this, 'add_category_image'), 10, 2);
            add_action('created_ogo_faq_category', array($this, 'save_category_image'), 10, 2);
            add_action('ogo_faq_category_edit_form_fields', array($this, 'update_category_image'), 10, 2);
            add_action('edited_ogo_faq_category', array($this, 'updated_category_image'), 10, 2);
            add_action('admin_enqueue_scripts', array($this, 'load_media'));
            add_action('admin_footer', array($this, 'add_script'));
        }

        public function load_media() {
            wp_enqueue_media();
        }

        /*
         * Add a form field in the new category page
         * @since 1.0.0
        */
        public function add_category_image($taxonomy) { ?>
            <div class="form-field term-group">
                <label for="category-image-id"><?php esc_html_e('Image', 'ogo-core'); ?></label>
                <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
                <div id="category-image-wrapper"></div>
                <p>
                    <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button"
                           name="ct_tax_media_button" value="<?php esc_html_e('Add Image', 'ogo-core'); ?>"/>
                    <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove"
                           name="ct_tax_media_remove" value="<?php esc_html_e('Remove Image', 'ogo-core'); ?>"/>
                </p>
            </div>
            <?php
        }

        /*
        * Save the form field
        */
        public function save_category_image($term_id, $tt_id) {
            if (isset($_POST['category-image-id']) && '' !== $_POST['category-image-id']) {
                $image = $_POST['category-image-id'];
                add_term_meta($term_id, 'category-image-id', $image, true);
            }
        }

        /*
        * Edit the form field
        */
        public function update_category_image($term, $taxonomy) { ?>
            <tr class="form-field term-group-wrap">
                <th scope="row">
                    <label for="category-image-id"><?php esc_html_e('Image', 'ogo-core'); ?></label>
                </th>
                <td>
                    <?php $image_id = get_term_meta($term->term_id, 'category-image-id', true); ?>
                    <input type="hidden" id="category-image-id" name="category-image-id"
                           value="<?php echo $image_id; ?>">
                    <div id="category-image-wrapper">
                        <?php if ($image_id) {
                            echo wp_get_attachment_image($image_id, 'thumbnail');
                        } ?>
                    </div>
                    <p>
                        <input type="button" class="button button-secondary ct_tax_media_button"
                               id="ct_tax_media_button" name="ct_tax_media_button"
                               value="<?php esc_html_e('Add Image', 'ogo-core'); ?>"/>
                        <input type="button" class="button button-secondary ct_tax_media_remove"
                               id="ct_tax_media_remove" name="ct_tax_media_remove"
                               value="<?php esc_html_e('Remove Image', 'ogo-core'); ?>"/>
                    </p>
                </td>
            </tr>
            <?php
        }

        /*
        * Update the form field value
        */
        public function updated_category_image($term_id, $tt_id) {
            if (isset($_POST['category-image-id']) && '' !== $_POST['category-image-id']) {
                $image = $_POST['category-image-id'];
                update_term_meta($term_id, 'category-image-id', $image);
            } else {
                update_term_meta($term_id, 'category-image-id', '');
            }
        }

        /*
         * Add script
         * @since 1.0.0
         */
        public function add_script() { ?>
            <script>
                jQuery(document).ready(function ($) {
                    function ct_media_upload(button_class) {
                        var _custom_media = true,
                            _orig_send_attachment = wp.media.editor.send.attachment;
                        $('body').on('click', button_class, function (e) {
                            var button_id = '#' + $(this).attr('id');
                            var send_attachment_bkp = wp.media.editor.send.attachment;
                            var button = $(button_id);
                            _custom_media = true;
                            wp.media.editor.send.attachment = function (props, attachment) {
                                if (_custom_media) {
                                    $('#category-image-id').val(attachment.id);
                                    $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
                                    $('#category-image-wrapper .custom_media_image').attr('src', attachment.url).css('display', 'block');
                                } else {
                                    return _orig_send_attachment.apply(button_id, [props, attachment]);
                                }
                            }
                            wp.media.editor.open(button);
                            return false;
                        });
                    }

                    ct_media_upload('.ct_tax_media_button.button');
                    $('body').on('click', '.ct_tax_media_remove', function () {
                        $('#category-image-id').val('');
                        $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
                    });
                    $(document).ajaxComplete(function (event, xhr, settings) {
                        var queryStringArr = settings.data.split('&');
                        if ($.inArray('action=add-tag', queryStringArr) !== -1) {
                            var xml = xhr.responseXML;
                            $response = $(xml).find('term_id').text();
                            if ($response != "") {
                                // Clear the thumb image
                                $('#category-image-wrapper').html('');
                            }
                        }
                    });

                });
            </script>
        <?php }

    }

    $RT_TAX_META = new RT_TAX_META();
    $RT_TAX_META->init();

}