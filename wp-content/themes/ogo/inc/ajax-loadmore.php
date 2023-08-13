<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
namespace addonmonster\Ogo_Core;

use OgoTheme;
use OgoTheme_Helper;
use \WP_Query;  

/**
 * 
 */
class AjaxLoadMore {
	
	function __construct() {
		add_action( 'wp_ajax_load_more_blog1', array(&$this, 'ogo_load_more_func_blog1' ));
    	add_action( 'wp_ajax_nopriv_load_more_blog1', array(&$this, 'ogo_load_more_func_blog1' ));

    	add_action( 'wp_ajax_load_more_blog2', array(&$this, 'ogo_load_more_func_blog2' ));
    	add_action( 'wp_ajax_nopriv_load_more_blog2', array(&$this, 'ogo_load_more_func_blog2' ));

    	add_action( 'wp_ajax_load_more_blog3', array(&$this, 'ogo_load_more_func_blog3' ));
    	add_action( 'wp_ajax_nopriv_load_more_blog3', array(&$this, 'ogo_load_more_func_blog3' ));

    	add_action( 'wp_ajax_load_more_blog4', array(&$this, 'ogo_load_more_func_blog4' ));
    	add_action( 'wp_ajax_nopriv_load_more_blog4', array(&$this, 'ogo_load_more_func_blog4' ));

    	add_action( 'wp_ajax_load_more_blog5', array(&$this, 'ogo_load_more_func_blog5' ));
    	add_action( 'wp_ajax_nopriv_load_more_blog5', array(&$this, 'ogo_load_more_func_blog5' ));

    	add_action( 'wp_ajax_load_more_blog6', array(&$this, 'ogo_load_more_func_blog6' ));
    	add_action( 'wp_ajax_nopriv_load_more_blog6', array(&$this, 'ogo_load_more_func_blog6' ));

		add_action( 'wp_ajax_load_more_blog_one', array(&$this, 'ogo_blog_one_load_more_func' ));
    	add_action( 'wp_ajax_nopriv_load_more_blog_one', array(&$this, 'ogo_blog_one_load_more_func' ));

		add_action( 'wp_ajax_load_more_blog_two', array(&$this, 'ogo_blog_two_load_more_func' ));
    	add_action( 'wp_ajax_nopriv_load_more_blog_two', array(&$this, 'ogo_blog_two_load_more_func' ));

		add_action( 'wp_ajax_load_more_blog_three', array(&$this, 'ogo_blog_three_load_more_func' ));
    	add_action( 'wp_ajax_nopriv_load_more_blog_three', array(&$this, 'ogo_blog_three_load_more_func' ));

		add_action( 'wp_ajax_load_more_blog_four', array(&$this, 'ogo_blog_four_load_more_func' ));
    	add_action( 'wp_ajax_nopriv_load_more_blog_four', array(&$this, 'ogo_blog_four_load_more_func' ));

		add_action( 'wp_ajax_load_more_blog_five', array(&$this, 'ogo_blog_five_load_more_func' ));
    	add_action( 'wp_ajax_nopriv_load_more_blog_five', array(&$this, 'ogo_blog_five_load_more_func' ));

		add_action( 'wp_ajax_load_more_portfolio', array(&$this, 'ogo_portfolio_load_more_func' ));
    	add_action( 'wp_ajax_nopriv_load_more_portfolio', array(&$this, 'ogo_portfolio_load_more_func' ));

		add_action( 'wp_ajax_load_more_team1', array(&$this, 'ogo_team1_load_more_func1' ));
    	add_action( 'wp_ajax_nopriv_load_more_team1', array(&$this, 'ogo_team1_load_more_func' ));

		add_action( 'wp_ajax_load_more_team2', array(&$this, 'ogo_team2_load_more_func2' ));
    	add_action( 'wp_ajax_nopriv_load_more_team2', array(&$this, 'ogo_team2_load_more_func' ));

		

	}

	/* - Ajax Loadmore Function for Bolg Layout 1
	--------------------------------------------------------*/
	public function ogo_load_more_func_blog1() {

	    $page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;
	    $load_more_limit =  OgoTheme::$options['load_more_limit'];

		query_posts(array(
			'post_type' => 'post',
			'posts_per_page' => $load_more_limit,
			'post_status'   => 'publish',
			'paged'          => $page,
			'post__not_in' => get_option( 'sticky_posts')
		)); 

		$ul_class = $post_classes = '';

		$thumb_size = 'ogo-size3';

		$thumbnail = false;
		$wow = OgoTheme::$options['blog_animation'];
		$effect = OgoTheme::$options['blog_animation_effect'];

		if (  OgoTheme::$layout == 'right-sidebar' || OgoTheme::$layout == 'left-sidebar' ){
			$post_classes = array( 'col-md-4 col-12 amt-grid-item blog-layout-1 ' . $wow . ' ' . $effect );
			$ul_class = 'side_bar';
		} else {
			$post_classes = array( 'col-md-4 col-12 amt-grid-item blog-layout-1 ' . $wow . ' ' . $effect );
			$ul_class = '';
		}

		if ( empty(has_post_thumbnail() ) ) {
			$img_class ='no-image';
		}else {
			$img_class ='show-image';
		}

		if( OgoTheme::$options['display_no_preview_image'] == '1' ) {
			$preview = 'show-preview';
		}else {
			$preview = 'no-preview';
		}

		if( OgoTheme::$options['image_blend'] == 'normal' ) {
			$blend = 'normal';
		}else {
			$blend = 'blend';
		}			

	    if( have_posts() ) : while( have_posts() ) : the_post();
	    	$id = get_the_ID();
			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = wp_trim_words( get_the_excerpt(), OgoTheme::$options['post_content_limit'], '' );
			$youtube_link = get_post_meta( get_the_ID(), 'ogo_youtube_link', true );			
	    ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?> data-wow-duration="1.5s">
			<div class="blog-box <?php echo esc_attr($img_class); ?> <?php echo esc_attr($preview); ?>">
				<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) || ( !empty( has_post_thumbnail() ) || OgoTheme::$options['display_no_preview_image'] == '1') ) { ?>
					<div class="blog-img-holder <?php echo esc_attr($blend); ?>">
						<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
							<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn size-md amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
						<?php } ?>
						<?php if ( has_post_thumbnail() || OgoTheme::$options['display_no_preview_image'] == '1') { ?>
							<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) { 
								the_post_thumbnail( $thumb_size, ['class' => ''] ); 
								} elseif ( OgoTheme::$options['display_no_preview_image'] == '1' ) {						
									echo '<img class="wp-post-image" src="'.OGO_ASSETS_URL.'element/noimage_540X400.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';						
								} ?>
							</a>
						<?php } ?>
					</div>
				<?php } ?>
				<div class="entry-content">
					<h3 class="entry-title title-size-lg title-dark-color"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>	
					<div class="post_excerpt"><?php echo wp_kses_post( $content );?></div>		
				</div>
			</div>
		</div>

		<?php endwhile; endif;
		wp_reset_query();
		die();
	}

	/* - Ajax Loadmore Function for Bolg Layout 2
	--------------------------------------------------------*/
	public function ogo_load_more_func_blog2() {

	    $page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;
	    $load_more_limit =  OgoTheme::$options['load_more_limit'];

		query_posts(array(
			'post_type' => 'post',
			'posts_per_page' => $load_more_limit,
			'post_status'   => 'publish',
			'paged'          => $page,
			'post__not_in' => get_option( 'sticky_posts')
		)); 

		$ul_class = $post_classes = '';

		$thumb_size = 'ogo-size3';

		$ogo_has_entry_meta  = ( OgoTheme::$options['blog_date'] || OgoTheme::$options['blog_author_name'] || OgoTheme::$options['blog_comment_num'] || OgoTheme::$options['blog_length'] && function_exists( 'ogo_reading_time' ) || OgoTheme::$options['blog_view'] && function_exists( 'ogo_views' ) ) ? true : false;

		$ogo_time_html = sprintf( '<span>%s</span> <span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );

		$ogo_comments_number = number_format_i18n( get_comments_number() );
		$ogo_comments_html = $ogo_comments_number > 1 ? esc_html__( 'Comments' , 'ogo' ) : esc_html__( 'Comment' , 'ogo' );
		$ogo_comments_html = '<span class="comment-number">'. $ogo_comments_number .'</span> ' . $ogo_comments_html;

		$thumbnail = false;

		$wow = OgoTheme::$options['blog_animation'];
		$effect = OgoTheme::$options['blog_animation_effect'];

		if (  OgoTheme::$layout == 'right-sidebar' || OgoTheme::$layout == 'left-sidebar' ){
			$post_classes = array( 'col-xl-4 col-lg-4 col-md-4 col-12 blog-layout-2 ' . $wow . ' ' . $effect );
			$ul_class = 'side_bar';
		} else {
			$post_classes = array( 'col-xl-4 col-lg-4 col-md-4 col-12 blog-layout-2 ' . $wow . ' ' . $effect );
			$ul_class = '';
		}

		if ( empty( has_post_thumbnail() ) ) {
			$img_class ='no-image';
		}else {
			$img_class ='show-image';
		}

		if( OgoTheme::$options['display_no_preview_image'] == '1' ) {
			$preview = 'show-preview';
		}else {
			$preview = 'no-preview';
		}

		if( OgoTheme::$options['image_blend'] == 'normal' ) {
			$blend = 'normal';
		}else {
			$blend = 'blend';
		}		

	    if(have_posts()) : while(have_posts()) : the_post();
	    	$id = get_the_ID();
			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = wp_trim_words( get_the_excerpt(), OgoTheme::$options['post_content_limit'], '.' );
			$youtube_link = get_post_meta( get_the_ID(), 'ogo_youtube_link', true );
	    ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?> data-wow-duration="1.5s">
			<div class="blog-box <?php echo esc_attr($img_class); ?> <?php echo esc_attr($preview); ?>">
				<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) || ( !empty( has_post_thumbnail() ) || OgoTheme::$options['display_no_preview_image'] == '1') ) { ?>
				<div class="blog-img-holder <?php echo esc_attr($blend); ?>">
					<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
						<div class="amt-video video-btn-wrap position-top-left">
							<a class="amt-play play-btn size-md amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a>
						</div>
					<?php } ?>
					<?php if ( !empty ( has_post_thumbnail() ) || OgoTheme::$options['display_no_preview_image'] == '1') { ?>
					<a class="figure-overlay" href="<?php the_permalink(); ?>">
					<?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail( $thumb_size, ['class' => ''] ); ?>
						<?php } elseif ( OgoTheme::$options['display_no_preview_image'] == '1' ) {
							echo '<img class="wp-post-image" src="'.OGO_ASSETS_URL.'element/noimage_540X400.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
						} ?>
					</a>
					<?php } ?>
				</div>
				<?php } ?>
				<div class="entry-content loadmore-post">	
					<?php if ( $ogo_has_entry_meta ) { ?>			
					<ul class="entry-meta">
						<?php if ( OgoTheme::$options['blog_date'] ) { ?>	
						<li class="post-date"><?php echo get_the_date(); ?></li>
						<?php } if ( OgoTheme::$options['blog_author_name'] ) { ?>
						<li class="post-author"><?php esc_html_e( 'by ', 'ogo' );?><?php the_author_posts_link(); ?></li>
						<?php } if ( OgoTheme::$options['blog_comment_num'] ) { ?>
						<li class="post-comment"><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $ogo_comments_html , 'alltext_allow' );?></a></li>
						<?php } if ( OgoTheme::$options['blog_length'] && function_exists( 'ogo_reading_time' ) ) { ?>
						<li class="post-reading-time meta-item"><?php echo ogo_reading_time(); ?></li>
						<?php } if ( OgoTheme::$options['blog_view'] && function_exists( 'ogo_views' ) ) { ?>
						<li><span class="post-views meta-item "><?php echo ogo_views(); ?></span></li>
						<?php } if ( OgoTheme::$options['blog_cats'] ) { ?>			
							<li class="blog-cats"><?php echo the_category( '  ' );?></li>
						<?php } ?>
					</ul>
					<?php } ?>
					<h3 class="entry-title title-size-lg title-dark-color"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php if ( OgoTheme::$options['blog_content'] ) { ?>
					<div class="entry-text"><p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p></div>
					<?php } ?>		
				</div>
			</div>
		</div> 

		<?php endwhile; endif;
		wp_reset_query();
		die();
	}

	/* - Ajax Loadmore Function for Bolg Layout 3
	--------------------------------------------------------*/
	public function ogo_load_more_func_blog3() {

	    $page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;
	    $load_more_limit =  OgoTheme::$options['load_more_limit'];

		query_posts(array(
			'post_type' => 'post',
			'posts_per_page' => $load_more_limit,
			'post_status'   => 'publish',
			'paged'          => $page,
			'post__not_in' => get_option( 'sticky_posts')
		)); 

		$ul_class = $post_classes = '';

		$thumb_size = 'ogo-size6';

		$ogo_has_entry_meta  = ( OgoTheme::$options['blog_date'] || OgoTheme::$options['blog_author_name'] || OgoTheme::$options['blog_comment_num'] || OgoTheme::$options['blog_length'] && function_exists( 'ogo_reading_time' ) || OgoTheme::$options['blog_view'] && function_exists( 'ogo_views' ) ) ? true : false;

		$ogo_time_html = sprintf( '<span>%s</span> <span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );

		$ogo_comments_number = number_format_i18n( get_comments_number() );
		$ogo_comments_html = $ogo_comments_number > 1 ? esc_html__( 'Comments' , 'ogo' ) : esc_html__( 'Comment' , 'ogo' );
		$ogo_comments_html = '<span class="comment-number">'. $ogo_comments_number .'</span> ' . $ogo_comments_html;

		$thumbnail = false;

		$wow = OgoTheme::$options['blog_animation'];
		$effect = OgoTheme::$options['blog_animation_effect'];

		if (  OgoTheme::$layout == 'right-sidebar' || OgoTheme::$layout == 'left-sidebar' ){
			$post_classes = array( 'col-xl-12 col-lg-12 col-md-12 col-12 blog-layout-3 ' . $wow . ' ' . $effect );
			$ul_class = 'side_bar';
		} else {
			$post_classes = array( 'col-xl-12 col-lg-12 col-md-12 col-12 blog-layout-3 ' . $wow . ' ' . $effect );
			$ul_class = '';
		}

		if ( empty( has_post_thumbnail() ) ) {
			$img_class ='no-image';
		}else {
			$img_class ='show-image';
		}

		if( OgoTheme::$options['display_no_preview_image'] == '1' ) {
			$preview = 'show-preview';
		}else {
			$preview = 'no-preview';
		}

		if( OgoTheme::$options['image_blend'] == 'normal' ) {
			$blend = 'normal';
		}else {
			$blend = 'blend';
		}
		

	    if(have_posts()) : while(have_posts()) : the_post();
	    	$id = get_the_ID();
			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = wp_trim_words( get_the_excerpt(), OgoTheme::$options['post_content_limit'], '.' );
			$youtube_link = get_post_meta( get_the_ID(), 'ogo_youtube_link', true );
	    ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?> data-wow-duration="1.5s">
			<div class="blog-box <?php echo esc_attr($img_class); ?> <?php echo esc_attr($preview); ?>">
			<div class="entry-content">
				<h3 class="entry-title title-size-lg title-dark-color"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			</div>
				<div class="blog-img-holder <?php echo esc_attr($blend); ?>">
					<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
						<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn size-md amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
					<?php } ?>
					<a href="<?php the_permalink(); ?>" class="figure-overlay"><?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail( $thumb_size, ['class' => ''] ); ?>
							<?php } elseif ( OgoTheme::$options['display_no_preview_image'] == '1' ) {
								echo '<img class="wp-post-image" src="'.OGO_ASSETS_URL.'element/noimage_560X680.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
							}
						?>
					</a>
				</div>
				<div class="entry-content loadmore-post">	
					<?php if ( $ogo_has_entry_meta ) { ?>			
					<ul class="entry-meta">
						<?php if ( OgoTheme::$options['blog_date'] ) { ?>	
						<li class="post-date"><?php echo get_the_date(); ?></li>
						<?php } if ( OgoTheme::$options['blog_author_name'] ) { ?>
						<li class="post-author"><?php esc_html_e( 'by ', 'ogo' );?><?php the_author_posts_link(); ?></li>
						<?php } if ( OgoTheme::$options['blog_comment_num'] ) { ?>
						<li class="post-comment"><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $ogo_comments_html , 'alltext_allow' );?></a></li>
						<?php } if ( OgoTheme::$options['blog_length'] && function_exists( 'ogo_reading_time' ) ) { ?>
						<li class="post-reading-time meta-item"><?php echo ogo_reading_time(); ?></li>
						<?php } if ( OgoTheme::$options['blog_view'] && function_exists( 'ogo_views' ) ) { ?>
						<li><span class="post-views meta-item "><?php echo ogo_views(); ?></span></li>
						<?php } if ( OgoTheme::$options['blog_cats'] ) { ?>			
							<li class="blog-cats"><?php echo the_category( '  ' );?></li>
						<?php } ?>
					</ul>
					<?php } ?>
					<?php if ( OgoTheme::$options['blog_content'] ) { ?>
					<div class="entry-text"><p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p></div>
					<?php } ?>		
				</div>
			</div>
		</div> 

		<?php endwhile; endif;
		wp_reset_query();
		die();
	}

	/* - Ajax Loadmore Function for Bolg Layout 4
	--------------------------------------------------------*/
	public function ogo_load_more_func_blog4() {

	    $page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;
	    $load_more_limit =  OgoTheme::$options['load_more_limit'];

		query_posts(array(
			'post_type' => 'post',
			'posts_per_page' => $load_more_limit,
			'post_status'   => 'publish',
			'paged'          => $page,
			'post__not_in' => get_option( 'sticky_posts')
		)); 

		$thumb_size = 'ogo-size4';

		$wow = OgoTheme::$options['blog_animation'];
		$effect = OgoTheme::$options['blog_animation_effect'];		

		if ( empty(has_post_thumbnail() ) ) {
			$img_class ='no-image';
		}else {
			$img_class ='show-image';
		}

		if( OgoTheme::$options['display_no_preview_image'] == '1' ) {
			$preview = 'show-preview';
		}else {
			$preview = 'no-preview';
		}

		if( OgoTheme::$options['image_blend'] == 'normal' ) {
			$blend = 'normal';
		}else {
			$blend = 'blend';
		}

	    if(have_posts()) : while(have_posts()) : the_post();
	    	$id = get_the_ID();
			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = wp_trim_words( get_the_excerpt(), OgoTheme::$options['post_content_limit'], '.' );
			$youtube_link = get_post_meta( get_the_ID(), 'ogo_youtube_link', true );
	    ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-4 ' . $wow . ' ' . $effect ); ?> data-wow-duration="1.5s">
			<div class="blog-box <?php echo esc_attr($img_class); ?> <?php echo esc_attr($preview); ?>">
				<?php if ( ( !empty( has_post_thumbnail() ) || OgoTheme::$options['display_no_preview_image'] == '1') ) { ?>
				<div class="blog-img-holder <?php echo esc_attr($blend); ?>">
					<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
						<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn size-md amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
					<?php } ?>
					<a href="<?php the_permalink(); ?>">
					<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail( $thumb_size, ['class' => ''] ); ?>
						<?php } elseif ( OgoTheme::$options['display_no_preview_image'] == '1' ) {
								echo '<img class="wp-post-image" src="'.OGO_ASSETS_URL.'element/noimage_700X600.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
							}
						?>
					</a>				
				</div>
				<?php } ?>
				<div class="entry-content">	
					<h3 class="entry-title title-size-lg title-dark-color"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php if ( OgoTheme::$options['blog_content'] ) { ?>
					<div class="entry-text"><p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p></div>
					<?php } ?>
					<div class="post-read-more"><a class="button-style-1" href="<?php the_permalink();?>"><?php echo esc_html( OgoTheme::$options['button_text'] );?></a>
			        </div>		
				</div>
			</div>
		</div>

		<?php endwhile; endif;
		wp_reset_query();
		die();
	}

	/* - Ajax Loadmore Function for Bolg Layout 5
	--------------------------------------------------------*/
	public function ogo_load_more_func_blog5() {

	    $page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;
	    $load_more_limit =  OgoTheme::$options['load_more_limit'];

		query_posts(array(
			'post_type' => 'post',
			'posts_per_page' => $load_more_limit,
			'post_status'   => 'publish',
			'paged'          => $page,
			'post__not_in' => get_option( 'sticky_posts')
		)); 

		$thumb_size = 'ogo-size1';

		$wow = OgoTheme::$options['blog_animation'];
		$effect = OgoTheme::$options['blog_animation_effect'];

		if (  OgoTheme::$layout == 'right-sidebar' || OgoTheme::$layout == 'left-sidebar' ){
			$post_classes = array( 'col-xl-6 col-lg-6 col-md-6 col-12 blog-layout-5 ' . $wow . ' ' . $effect );
			$ul_class = 'side_bar';
		} else {
			$post_classes = array( 'col-xl-6 col-lg-6 col-md-6 col-12 blog-layout-5 ' . $wow . ' ' . $effect );
			$ul_class = '';
		}

		if ( empty(has_post_thumbnail() ) ) {
			$img_class ='no-image';
		}else {
			$img_class ='show-image';
		}

		if( OgoTheme::$options['display_no_preview_image'] == '1' ) {
			$preview = 'show-preview';
		}else {
			$preview = 'no-preview';
		}

		if( OgoTheme::$options['image_blend'] == 'normal' ) {
			$blend = 'normal';
		}else {
			$blend = 'blend';
		}

	    if(have_posts()) : while(have_posts()) : the_post();
	    	$id = get_the_ID();
			$content = get_the_content();
			$content = apply_filters( 'the_content', $content );
			$content = wp_trim_words( get_the_excerpt(), OgoTheme::$options['post_content_limit'], '.' );
			$youtube_link = get_post_meta( get_the_ID(), 'ogo_youtube_link', true );
	    ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?> data-wow-duration="1.5s">
			<div class="blog-box <?php echo esc_attr($img_class); ?> <?php echo esc_attr($preview); ?>">
				<?php if ( ( !empty( has_post_thumbnail() ) || OgoTheme::$options['display_no_preview_image'] == '1') ) { ?>
					<div class="blog-img-holder <?php echo esc_attr($blend); ?>">
						<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
							<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn size-md amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
						<?php } ?>
						<a href="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) { ?>
							<?php the_post_thumbnail( $thumb_size, ['class' => ''] ); ?>
							<?php } elseif ( OgoTheme::$options['display_no_preview_image'] == '1' ) {
									echo '<img class="wp-post-image" src="'.OGO_ASSETS_URL.'element/noimage_700X600.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
								}
							?>
						</a>				
					</div>
					<?php } ?>
				<div class="entry-content">
					<h3 class="entry-title title-size-xl title-dark-color"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php if ( OgoTheme::$options['blog_content'] ) { ?>
					<div class="entry-text"><p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p></div>
					<?php } ?>	
					<div class="post-read-more"><a class="button-style-1" href="<?php the_permalink();?>"><?php echo esc_html( OgoTheme::$options['button_text'] );?></a>
			        </div>	
				</div>
			</div>
		</div>

		<?php endwhile; endif;
		wp_reset_query();
		die();
	}

/* - Ajax Loadmore Function for addon blog layout 01
	--------------------------------------------------------*/
	
	public function ogo_blog_one_load_more_func() {
		$data = $_POST['query_data'] ;
		$page_number = isset( $_POST['pageNumber'] ) ? $_POST['pageNumber'] : 0 ;
		$thumb_size = 'ogo-size3';
		$post_classes = '';
		$p_ids = array();
		if(!empty($data['posts_not_in'])){
			foreach ( $data['posts_not_in'] as $p_idsn ) {
				$p_ids[] = $p_idsn['post_not_in'];
			}
		}
		$args = array(
			'posts_per_page' 	=> $data['itemlimit'],
			'order' 			=> $data['post_ordering'],
			'orderby' 			=> $data['post_orderby'],
			'post__not_in'   	=> $p_ids,
			'post_type'			=> 'post',
			'post_status'		=> 'publish',
			'paged'				=> $page_number,
		);
		if(!empty($data['number_of_post_offset']) && $offset = absint($data['number_of_post_offset'])){
			$args['offset'] = $offset;
		}

		if (  OgoTheme::$layout == 'right-sidebar' || OgoTheme::$layout == 'left-sidebar' ){
			$post_classes = array( 'col-xl-4 col-md-4 col-sm-12 col-12 ' );
		} else {
			$post_classes = array( 'col-xl-4 col-md-4 col-sm-12 col-12 ' );
		}

		if(!empty($data['catid'])){
			if( $data['query_type'] == 'category'){
				$args['tax_query'] = [
					[
						'taxonomy' => 'category',
						'field' => 'term_id',
						'terms' => $data['catid'],                    
					],
				];
			}
		}
		if(!empty($data['postid'])){
			if( $data['query_type'] == 'posts'){
				$args['post__in'] = $data['postid'];
			}
		}

		$query = new WP_Query( $args );
		$i = $data['delay']; $j = $data['duration']; 
		if ( $query->have_posts() ) :
			
		while ( $query->have_posts() ) : $query->the_post();				

			$content = OgoTheme_Helper::get_current_post_content();
			$content = wp_trim_words( get_the_excerpt(), $data['count'], '.' );
			$content = "<p>$content</p>";
			$title = wp_trim_words( get_the_title(), $data['title_count'], '' );

			$id = get_the_ID();
			$youtube_link = get_post_meta( get_the_ID(), 'ogo_youtube_link', true );

			?>
				<div class="<?php echo $post_classes[0]; ?> <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
					<div class="amt-item">
						<div class="amt-image">
							<?php if ( ( $data['post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
								<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn <?php echo esc_attr( $data['play_button_size'] );?> amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
							<?php } ?>					
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ){
										the_post_thumbnail( $thumb_size );
									} elseif ( OgoTheme::$options['display_no_preview_image'] == '1' )  {
										echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_asset_file( 'element/noimage_540X400.jpg' ) . '" alt="'.get_the_title().'">';
									}
								?>
							</a>						
						</div>
						<div class="entry-content">						
							<h3 class="entry-title title-size-lg title-dark-color"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>
							<?php if ( $data['content_display'] == 'yes' ) { ?>
								<div class="post_excerpt"><?php echo wp_kses_post( $content );?></div>
							<?php } ?>						
						</div>
					</div>
				</div>
		<?php $i = $i + 0.2; $j = $j + 0.1; endwhile;?>
		<?php endif; ?>
		<?php 
		wp_reset_postdata(); 
		wp_die();
	}	

	
/* - Ajax Loadmore Function for addon blog layout 02
	--------------------------------------------------------*/
	public function ogo_blog_two_load_more_func() {
		$data = $_POST['query_data'] ;
		$page_number = isset( $_POST['pageNumber'] ) ? $_POST['pageNumber'] : 0 ;

		$ogo_has_entry_meta  = ( $data['post_author'] == 'yes' || $data['post_date'] == 'yes' || $data['post_comment'] == 'yes' || $data['post_length'] == 'yes' && function_exists( 'ogo_reading_time' ) || $data['post_view'] == 'yes' && function_exists( 'ogo_views' ) ) ? true : false;

		$thumb_size = 'ogo-size3';
		$post_classes = '';
		$p_ids = array();
		if(!empty($data['posts_not_in'])){
			foreach ( $data['posts_not_in'] as $p_idsn ) {
				$p_ids[] = $p_idsn['post_not_in'];
			}
		}
		$args = array(
			'posts_per_page' 	=> $data['itemlimit'],
			'order' 			=> $data['post_ordering'],
			'orderby' 			=> $data['post_orderby'],
			'post__not_in'   	=> $p_ids,
			'post_type'			=> 'post',
			'post_status'		=> 'publish',
			'paged'				=> $page_number,
		);
		if(!empty($data['number_of_post_offset']) && $offset = absint($data['number_of_post_offset'])){
			$args['offset'] = $offset;
		}

		if (  OgoTheme::$layout == 'right-sidebar' || OgoTheme::$layout == 'left-sidebar' ){
			$post_classes = array( 'col-xl-4 col-md-4 col-sm-12 col-12 amt-grid-item blog-layout-1 ' );
		} else {
			$post_classes = array( 'col-xl-4 col-md-4 col-sm-12 col-12 amt-grid-item blog-layout-1 ' );
		}

		if(!empty($data['catid'])){
			if( $data['query_type'] == 'category'){
				$args['tax_query'] = [
					[
						'taxonomy' => 'category',
						'field' => 'term_id',
						'terms' => $data['catid'],                    
					],
				];
			}
		}
		if(!empty($data['postid'])){
			if( $data['query_type'] == 'posts'){
				$args['post__in'] = $data['postid'];
			}
		}

		$query = new WP_Query( $args );
		$i = $data['delay']; $j = $data['duration']; 
		if ( $query->have_posts() ) :
			
		while ( $query->have_posts() ) : $query->the_post();				

			$content = OgoTheme_Helper::get_current_post_content();
			$content = wp_trim_words( get_the_excerpt(), $data['count'], '.' );
			$content = "<p>$content</p>";
			$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
			
			$ogo_comments_number = number_format_i18n( get_comments_number() );
			$ogo_comments_html = $ogo_comments_number > 1 ? esc_html__( 'Comments' , 'ogo' ) : esc_html__( 'Comment' , 'ogo' );
			$ogo_comments_html = '<span class="comment-number">'. $ogo_comments_number . '</span> ' . $ogo_comments_html;			
			$ogo_time_html = sprintf( '<span><span>%s </span>%s %s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );

			$id = get_the_ID();
			$youtube_link = get_post_meta( get_the_ID(), 'ogo_youtube_link', true );

			?>
				<div class="<?php echo $post_classes[0]; ?> <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
					<div class="amt-item">
						<div class="amt-image">
							<?php if ( ( $data['post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
								<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn <?php echo esc_attr( $data['play_button_size'] );?> amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
							<?php } ?>					
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ){
										the_post_thumbnail( $thumb_size );
									} else {
										echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_asset_file( 'element/noimage_540X400.jpg' ) . '" alt="'.get_the_title().'">';
									}
								?>
							</a>						
						</div>
						<div class="entry-content">	
							<?php if ( $ogo_has_entry_meta ) { ?>
							<ul class="entry-meta">
								<?php if ( $data['post_date'] == 'yes' ) { ?>	
								<li class="post-date"><?php echo get_the_date(); ?></li>
								<?php } if ( $data['post_author'] == 'yes' ) { ?>
								<li class="post-author"><?php esc_html_e( 'by ', 'ogo' );?><?php the_author_posts_link(); ?></li>
								<?php } if ( $data['post_comment'] == 'yes' ) { ?>
								<li class="post-comment"><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $ogo_comments_html , 'alltext_allow' );?></a></li>
								<?php } if ( ( $data['post_length'] == 'yes' ) && function_exists( 'ogo_reading_time' ) ) { ?>
								<li class="post-reading-time meta-item"><?php echo ogo_reading_time(); ?></li>
								<?php } if ( ( $data['post_view'] == 'yes' ) && function_exists( 'ogo_views' ) ) { ?>
								<li><span class="post-views meta-item"><?php echo ogo_views(); ?></span></li>
								<?php } if ( OgoTheme::$options['post_cats'] ) { ?>			
								<li class="post_cats"><?php echo the_category( '  ' );?></li>
								<?php } ?>
							</ul>
							<?php } ?>					
							<h3 class="entry-title title-size-lg title-dark-color"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>
							<?php if ( $data['content_display'] == 'yes' ) { ?>
								<div class="post_excerpt"><?php echo wp_kses_post( $content );?></div>
							<?php } ?>						
						</div>
					</div>
				</div>
		<?php $i = $i + 0.2; $j = $j + 0.1; endwhile;?>
		<?php endif; ?>
		<?php 
		wp_reset_postdata(); 
		wp_die();
	}	


	/* - Ajax Loadmore Function for addon blog layout 03
	--------------------------------------------------------*/
	public function ogo_blog_three_load_more_func() {
		$data = $_POST['query_data'] ;
		$page_number = isset( $_POST['pageNumber'] ) ? $_POST['pageNumber'] : 0 ;

		$ogo_has_entry_meta  = ( $data['post_author'] == 'yes' || $data['post_date'] == 'yes' || $data['post_comment'] == 'yes' || $data['post_length'] == 'yes' && function_exists( 'ogo_reading_time' ) || $data['post_view'] == 'yes' && function_exists( 'ogo_views' ) ) ? true : false;

		$thumb_size = 'ogo-size3';
		$post_classes = '';
		$p_ids = array();
		if(!empty($data['posts_not_in'])){
			foreach ( $data['posts_not_in'] as $p_idsn ) {
				$p_ids[] = $p_idsn['post_not_in'];
			}
		}
		$args = array(
			'posts_per_page' 	=> $data['itemlimit'],
			'order' 			=> $data['post_ordering'],
			'orderby' 			=> $data['post_orderby'],
			'post__not_in'   	=> $p_ids,
			'post_type'			=> 'post',
			'post_status'		=> 'publish',
			'paged'				=> $page_number,
		);
		if(!empty($data['number_of_post_offset']) && $offset = absint($data['number_of_post_offset'])){
			$args['offset'] = $offset;
		}

		if(!empty($data['catid'])){
			if( $data['query_type'] == 'category'){
				$args['tax_query'] = [
					[
						'taxonomy' => 'category',
						'field' => 'term_id',
						'terms' => $data['catid'],                    
					],
				];
			}
		}
		if(!empty($data['postid'])){
			if( $data['query_type'] == 'posts'){
				$args['post__in'] = $data['postid'];
			}
		}

		$query = new WP_Query( $args );
		$i = $data['delay']; $j = $data['duration']; 
		if ( $query->have_posts() ) :
			
		while ( $query->have_posts() ) : $query->the_post();				

			$content = OgoTheme_Helper::get_current_post_content();
			$content = wp_trim_words( get_the_excerpt(), $data['count'], '.' );
			$content = "<p>$content</p>";
			$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
			
			$ogo_comments_number = number_format_i18n( get_comments_number() );
			$ogo_comments_html = $ogo_comments_number > 1 ? esc_html__( 'Comments' , 'ogo' ) : esc_html__( 'Comment' , 'ogo' );
			$ogo_comments_html = '<span class="comment-number">'. $ogo_comments_number . '</span> ' . $ogo_comments_html;			
			$ogo_time_html = sprintf( '<span><span>%s </span>%s %s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );

			$id = get_the_ID();
			$youtube_link = get_post_meta( get_the_ID(), 'ogo_youtube_link', true );

			?>
				<div class="<?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
					<div class="amt-item">
						<h3 class="entry-title title-size-lg title-dark-color"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>
						<div class="amt-image">
							<?php if ( ( $data['post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
								<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn <?php echo esc_attr( $data['play_button_size'] );?> amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
							<?php } ?>
							<a href="<?php the_permalink(); ?>">
								<?php
									if ( has_post_thumbnail() ){
										the_post_thumbnail( $thumb_size );
									} else {
										echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_asset_file( 'element/noimage_1020X600.jpg' ) . '" alt="'.get_the_title().'">';
									}
								?>
							</a>				
						</div>
						<div class="entry-content">	
						<?php if ( $ogo_has_entry_meta ) { ?>
						<ul class="entry-meta">
							<?php if ( $data['post_date'] == 'yes' ) { ?>	
							<li class="post-date"><?php echo get_the_date(); ?></li>
							<?php } if ( $data['post_author'] == 'yes' ) { ?>
							<li class="post-author"><?php esc_html_e( 'by ', 'ogo' );?><?php the_author_posts_link(); ?></li>
							<?php } if ( $data['post_comment'] == 'yes' ) { ?>
							<li class="post-comment"><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $ogo_comments_html , 'alltext_allow' );?></a></li>
							<?php } if ( ( $data['post_length'] == 'yes' ) && function_exists( 'ogo_reading_time' ) ) { ?>
							<li class="post-reading-time meta-item"><?php echo ogo_reading_time(); ?></li>
							<?php } if ( ( $data['post_view'] == 'yes' ) && function_exists( 'ogo_views' ) ) { ?>
							<li><span class="post-views meta-item"><?php echo ogo_views(); ?></span></li>
							<?php } if ( OgoTheme::$options['post_cats'] ) { ?>			
							<li class="post_cats"><?php echo the_category( '  ' );?></li>
							<?php } ?>
						</ul>
						<?php } ?>					
						<?php if ( $data['content_display'] == 'yes' ) { ?>
							<div class="post_excerpt"><?php echo wp_kses_post( $content );?></div>
						<?php } ?>						
					</div>
					</div>
				</div>
		<?php $i = $i + 0.2; $j = $j + 0.1; endwhile;?>
		<?php endif; ?>
		<?php 
		wp_reset_postdata(); 
		wp_die();
	}

	
	/* - Ajax Loadmore Function for addon blog layout 04
	--------------------------------------------------------*/
	public function ogo_blog_four_load_more_func() {
		$data = $_POST['query_data'] ;
		$page_number = isset( $_POST['pageNumber'] ) ? $_POST['pageNumber'] : 0 ;

		$thumb_size = 'ogo-size3';
		$post_classes = '';
		$p_ids = array();
		if(!empty($data['posts_not_in'])){
			foreach ( $data['posts_not_in'] as $p_idsn ) {
				$p_ids[] = $p_idsn['post_not_in'];
			}
		}
		$args = array(
			'posts_per_page' 	=> $data['itemlimit'],
			'order' 			=> $data['post_ordering'],
			'orderby' 			=> $data['post_orderby'],
			'post__not_in'   	=> $p_ids,
			'post_type'			=> 'post',
			'post_status'		=> 'publish',
			'paged'				=> $page_number,
		);
		if(!empty($data['number_of_post_offset']) && $offset = absint($data['number_of_post_offset'])){
			$args['offset'] = $offset;
		}

		if(!empty($data['catid'])){
			if( $data['query_type'] == 'category'){
				$args['tax_query'] = [
					[
						'taxonomy' => 'category',
						'field' => 'term_id',
						'terms' => $data['catid'],                    
					],
				];
			}
		}
		if(!empty($data['postid'])){
			if( $data['query_type'] == 'posts'){
				$args['post__in'] = $data['postid'];
			}
		}

		$query = new WP_Query( $args );
		$i = $data['delay']; $j = $data['duration']; 
		if ( $query->have_posts() ) :
			
		while ( $query->have_posts() ) : $query->the_post();				

			$content = OgoTheme_Helper::get_current_post_content();
			$content = wp_trim_words( get_the_excerpt(), $data['count'], '.' );
			$content = "<p>$content</p>";
			$title = wp_trim_words( get_the_title(), $data['title_count'], '' );

			$id = get_the_ID();
			$youtube_link = get_post_meta( get_the_ID(), 'ogo_youtube_link', true );

			?>
				<div class="<?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
				<div class="amt-item amt-item-style-4">
					<div class="amt-image amt-image-style-4">
						<?php if ( ( $data['post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
							<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn <?php echo esc_attr( $data['play_button_size'] );?> amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
						<?php } ?>					
						<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ){
									the_post_thumbnail( $thumb_size );
								} else {
									echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_asset_file( 'element/noimage_540X400.jpg' ) . '" alt="'.get_the_title().'">';
								}
							?>
						</a>						
					</div>
					<div class="entry-content">						
						<h3 class="entry-title title-size-lg title-dark-color"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>
						<?php if ( $data['content_display'] == 'yes' ) { ?>
							<div class="post_excerpt"><?php echo wp_kses_post( $content );?></div>
						<?php } ?>		
                        <?php if ( $data['post_read'] == 'yes' ) { ?>
						<div class="post-read-more"><a class="button-style-1" href="<?php the_permalink();?>"><?php echo wp_kses_post( $data['read_more_text'] ); ?><i class="fas fa-arrow-right"></i></a>
				        </div>
				    	<?php } ?>					
					</div>
				</div>
				</div>
		<?php $i = $i + 0.2; $j = $j + 0.1; endwhile;?>
		<?php endif; ?>
		<?php 
		wp_reset_postdata(); 
		wp_die();
	}

	
	/* - Ajax Loadmore Function for addon blog layout 05
	--------------------------------------------------------*/
	public function ogo_blog_five_load_more_func() {
		$data = $_POST['query_data'] ;
		$page_number = isset( $_POST['pageNumber'] ) ? $_POST['pageNumber'] : 0 ;
		$thumb_size = 'ogo-size4';
		$post_classes = '';
		$p_ids = array();
		if(!empty($data['posts_not_in'])){
			foreach ( $data['posts_not_in'] as $p_idsn ) {
				$p_ids[] = $p_idsn['post_not_in'];
			}
		}
		$args = array(
			'posts_per_page' 	=> $data['itemlimit'],
			'order' 			=> $data['post_ordering'],
			'orderby' 			=> $data['post_orderby'],
			'post__not_in'   	=> $p_ids,
			'post_type'			=> 'post',
			'post_status'		=> 'publish',
			'paged'				=> $page_number,
		);
		if(!empty($data['number_of_post_offset']) && $offset = absint($data['number_of_post_offset'])){
			$args['offset'] = $offset;
		}

		if(!empty($data['catid'])){
			if( $data['query_type'] == 'category'){
				$args['tax_query'] = [
					[
						'taxonomy' => 'category',
						'field' => 'term_id',
						'terms' => $data['catid'],                    
					],
				];
			}
		}
		if(!empty($data['postid'])){
			if( $data['query_type'] == 'posts'){
				$args['post__in'] = $data['postid'];
			}
		}
		
		if (  OgoTheme::$layout == 'right-sidebar' || OgoTheme::$layout == 'left-sidebar' ){
			$post_classes = array( 'col-xl-6 col-md-6 col-sm-12 col-12 ' );
		} else {
			$post_classes = array( 'col-xl-6 col-md-6 col-sm-12 col-12 ' );
		}

		$query = new WP_Query( $args );
		$i = $data['delay']; $j = $data['duration']; 
		if ( $query->have_posts() ) :
			
		while ( $query->have_posts() ) : $query->the_post();				

			$content = OgoTheme_Helper::get_current_post_content();
			$content = wp_trim_words( get_the_excerpt(), $data['count'], '.' );
			$content = "<p>$content</p>";
			$title = wp_trim_words( get_the_title(), $data['title_count'], '' );

			$id = get_the_ID();
			$youtube_link = get_post_meta( get_the_ID(), 'ogo_youtube_link', true );

			?>
				<div class="<?php echo $post_classes[0]; ?><?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
					<div class="amt-item amt-item-style-5">
						<div class="amt-image amt-image-style-5">
							<?php if ( ( $data['post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
								<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn <?php echo esc_attr( $data['play_button_size'] );?> amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
							<?php } ?>					
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ){
										the_post_thumbnail( $thumb_size );
									} else {
										echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_asset_file( 'element/noimage_540X400.jpg' ) . '" alt="'.get_the_title().'">';
									}
								?>
							</a>						
						</div>
						<div class="entry-content">						
							<h3 class="entry-title title-size-sm title-dark-color"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>
							<?php if ( $data['content_display'] == 'yes' ) { ?>
								<div class="post_excerpt"><?php echo wp_kses_post( $content );?></div>
							<?php } ?>		
							<?php if ( $data['post_read'] == 'yes' ) { ?>
							<div class="post-read-more"><a class="button-style-1" href="<?php the_permalink();?>"><?php echo wp_kses_post( $data['read_more_text'] ); ?><i class="fas fa-arrow-right"></i></a>
							</div>
							<?php } ?>					
						</div>
					</div>
				</div>
		<?php $i = $i + 0.2; $j = $j + 0.1; endwhile;?>
		<?php endif; ?>
		<?php 
		wp_reset_postdata(); 
		wp_die();
	}


		/* - Ajax Loadmore Function for addon portfolio
	--------------------------------------------------------*/
		public function ogo_portfolio_load_more_func() {
			$data = $_POST['query_data'] ;
			$thumb_size  = 'ogo-size4';
			$page_number = isset( $_POST['pageNumber'] ) ? $_POST['pageNumber'] : 0 ;

			$args = array(
				'post_type'      => 'ogo_portfolio',
				'posts_per_page' => $data['number'],
				'orderby'        => $data['orderby'],
				'post_status'		=> 'publish',
				'paged'				=> $page_number,
			);

			if (!empty($data['cat'])) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'ogo_portfolio_category',
						'field' => 'term_id',
						'terms' => $data['cat'],
					)
				);
			}

			switch ($data['orderby']) {
				case 'title':
				case 'menu_order':
					$args['order'] = 'ASC';
					break;
			}

			$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
			$query = new WP_Query($args);
			$i = $data['delay'];
            $j = $data['duration'];
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $id                = get_the_id();
                    $portfolio_client  = get_post_meta( $id, 'ogo_portfolio_client', true );
            ?>
			<div class="<?php echo esc_attr( $col_class );?>" >
				<div class="porfolio-thums">
					<a href="<?php the_permalink(); ?>">
						<?php
						if (has_post_thumbnail()) {
							the_post_thumbnail($thumb_size);
						} else {
							echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_asset_file('element/noimage_560X680.jpg') . '" alt="' . get_the_title() . '">';
						}
						?>
					</a>
					<div class="portfolio-content">
						<div class="portfolio-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
						<?php if ( $data['content_display'] == 'yes' ) { ?>
							<div class="portfolio-client"><p>For - <?php echo wp_kses_post( $portfolio_client );?></p></div>
						<?php } ?>
					</div>
				</div>
			</div>
                    
                <?php $i = $i + 0.2;
                    $j = $j + 0.1;
                } ?>
            <?php } ?>
		<?php 
		wp_reset_postdata(); 
		wp_die();
	}

	/* - Ajax Loadmore Function for Team Layout 1
	--------------------------------------------------------*/
	public function ogo_team1_load_more_func1() {
		$data = $_POST['query_data'] ;
		$thumb_size  = 'ogo-size6';
	    $load_more_limit =  OgoTheme::$options['load_more_limit'];

		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		}
		else if ( get_query_var('page') ) {
			$paged = get_query_var('page');
		}
		else {
			$paged = 1;
		}

		$args = array(
			'post_type' => 'ogo_team',
			'posts_per_page' => $load_more_limit,
			'post_status'   => 'publish',
			'paged'          => $paged,
			'post__not_in' => get_option( 'sticky_posts')
		); 

		if ( !empty( $data['cat'] ) ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'ogo_team_category',
					'field' => 'term_id',
					'terms' => $data['cat'],
				)
			);
		}

		switch ( $data['orderby'] ) {
			case 'title':
			case 'menu_order':
			$args['order'] = 'ASC';
			break;
		}

		$query = new WP_Query( $args );

		$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
		?>
		<div class="team-default team-multi-layout-1 team-grid-<?php echo esc_attr( $data['style'] );?>">
			<div class="team-loadmore-style1">
				<div class="row <?php echo esc_attr( $data['item_space'] );?>">
					<?php $i = $data['delay']; $j = $data['duration']; 
						if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
						$query->the_post();
						$id            	= get_the_id();
						$position   	= get_post_meta( $id, 'ogo_team_position', true );
						$socials       	= get_post_meta( $id, 'ogo_team_socials', true );
						$social_fields 	= OgoTheme_Helper::team_socials();
						if ( $data['contype'] == 'content' ) {
							$content = apply_filters( 'the_content', get_the_content() );
						}
						else {
							$content = apply_filters( 'the_excerpt', get_the_excerpt() );;
						}
						$content = wp_trim_words( $content, $data['count'], '' );
						$content = "$content";
					?>
						<div class="team-item <?php echo esc_attr( $col_class );?>">
							<div class="team-content-wrap <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
								<div class="team-thums">
									<a href="<?php the_permalink();?>">
										<?php
										if ( has_post_thumbnail() ){
											the_post_thumbnail( $thumb_size );
										} else {
											echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_asset_file( 'element/noimage_560X680.jpg' ) . '" alt="'.get_the_title().'">';
										}
										?>
									</a>
								</div>
								<div class="mask-wrap">
									<div class="team-content">					
										<h3 class="team-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
										<?php if ( $data['designation_display']  == 'yes' ) { ?>
										<div class="team-designation"><?php echo esc_html( $position );?></div>
										<?php } ?>
										<?php if ( $data['content_display']  == 'yes' ) { ?>
										<p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p>
										<?php } ?>
										<?php if ( !empty( $socials ) && $data['social_display']  == 'yes' ) { ?>
										<ul class="team-social">
											<?php foreach ( $socials as $key => $social ): ?>
												<?php if ( !empty( $social ) ): ?>
													<li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fab <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
												<?php endif; ?>
											<?php endforeach; ?>
										</ul>
									<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<?php $i = $i + 0.2; $j = $j + 0.1; } ?>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php
		wp_reset_query();
		die();
	}


/* - Ajax Loadmore Function for Team Layout 2
	--------------------------------------------------------*/
	public function ogo_team2_load_more_func2() {
		$data = $_POST['query_data'] ;
		$thumb_size  = 'ogo-size6';
	    $load_more_limit =  OgoTheme::$options['load_more_limit'];

		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		}
		else if ( get_query_var('page') ) {
			$paged = get_query_var('page');
		}
		else {
			$paged = 1;
		}

		$args = array(
			'post_type' => 'ogo_team',
			'posts_per_page' => $load_more_limit,
			'post_status'   => 'publish',
			'paged'          => $paged,
			'post__not_in' => get_option( 'sticky_posts')
		); 

		if ( !empty( $data['cat'] ) ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'ogo_team_category',
					'field' => 'term_id',
					'terms' => $data['cat'],
				)
			);
		}

		switch ( $data['orderby'] ) {
			case 'title':
			case 'menu_order':
			$args['order'] = 'ASC';
			break;
		}

		$query = new WP_Query( $args );

		$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
		?>
		<div class="team-default team-multi-layout-1 team-grid-<?php echo esc_attr( $data['style'] );?>">
			<div class="team-loadmore-style1">
				<div class="row <?php echo esc_attr( $data['item_space'] );?>">
					<?php $i = $data['delay']; $j = $data['duration']; 
						if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
						$query->the_post();
						$id            	= get_the_id();
						$position   	= get_post_meta( $id, 'ogo_team_position', true );
						$socials       	= get_post_meta( $id, 'ogo_team_socials', true );
						$social_fields 	= OgoTheme_Helper::team_socials();
						if ( $data['contype'] == 'content' ) {
							$content = apply_filters( 'the_content', get_the_content() );
						}
						else {
							$content = apply_filters( 'the_excerpt', get_the_excerpt() );;
						}
						$content = wp_trim_words( $content, $data['count'], '' );
						$content = "$content";
					?>
						<div class="team-item <?php echo esc_attr( $col_class );?>">
							<div class="team-content-wrap <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
								<div class="team-thums">
									<a href="<?php the_permalink();?>">
										<?php
										if ( has_post_thumbnail() ){
											the_post_thumbnail( $thumb_size );
										} else {
											echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_asset_file( 'element/noimage_560X680.jpg' ) . '" alt="'.get_the_title().'">';
										}
										?>
									</a>
								</div>
								<div class="mask-wrap">
									<div class="team-content">					
										<h3 class="team-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
										<?php if ( $data['designation_display']  == 'yes' ) { ?>
										<div class="team-designation"><?php echo esc_html( $position );?></div>
										<?php } ?>
										<?php if ( $data['content_display']  == 'yes' ) { ?>
										<p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p>
										<?php } ?>
										<?php if ( !empty( $socials ) && $data['social_display']  == 'yes' ) { ?>
										<ul class="team-social">
											<?php foreach ( $socials as $key => $social ): ?>
												<?php if ( !empty( $social ) ): ?>
													<li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fab <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
												<?php endif; ?>
											<?php endforeach; ?>
										</ul>
									<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<?php $i = $i + 0.2; $j = $j + 0.1; } ?>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php
		wp_reset_query();
		die();
	}
}

new AjaxLoadMore();