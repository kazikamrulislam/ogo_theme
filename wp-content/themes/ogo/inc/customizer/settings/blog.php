<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
namespace addonmonster\ogo\Customizer\Settings;

use addonmonster\ogo\Customizer\OgoTheme_Customizer;
use addonmonster\ogo\Customizer\Controls\Customizer_Switch_Control;
use addonmonster\ogo\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class OgoTheme_Blog_Post_Settings extends OgoTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_blog_post_controls' ) );
	}

    /**
     * Blog Post Controls
     */
    public function register_blog_post_controls( $wp_customize ) {

        // Blog Post Style
        $wp_customize->add_setting( 'blog_style',
            array(
                'default' => $this->defaults['blog_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'blog_style',
            array(
                'label' => __( 'Blog/Archive Layout', 'ogo' ),
                'description' => esc_html__( 'Blog Post layout variation you can selecr and use.', 'ogo' ),
                'section' => 'blog_post_settings_section',
                'choices' => array(
                    'style1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 1', 'ogo' )
                    ),
                    'style2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 2', 'ogo' )
                    ),
                    'style3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 3', 'ogo' )
                    ),
                    'style4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 4', 'ogo' )
                    ),
                    'style5' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog3.png',
                        'name' => __( 'Layout 5', 'ogo' )
                    ),
                )
            )
        ) );
        /*Loadmore*/
        $wp_customize->add_setting( 'blog_loadmore',
            array(
                'default' => $this->defaults['blog_loadmore'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'blog_loadmore',
            array(
                'label' => __( 'Blog Pagination', 'ogo' ),
                'section' => 'blog_post_settings_section',
                'type' => 'select',
                'choices' => array(
                    'pagination' => esc_html__( 'Pagination', 'ogo' ),
                    'loadmore' => esc_html__( 'Load More', 'ogo' ),
                ),
            )
        );
        $wp_customize->add_setting( 'load_more_limit',
            array(
                'default' => $this->defaults['load_more_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'load_more_limit',
            array(
                'label' => __( 'Load More Limit', 'ogo' ),
                'section' => 'blog_post_settings_section',
                'type' => 'number',
            )
        );	
		$wp_customize->add_setting( 'post_content_limit',
            array(
                'default' => $this->defaults['post_content_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'post_content_limit',
            array(
                'label' => __( 'Blog Content Limit', 'ogo' ),
                'section' => 'blog_post_settings_section',
                'type' => 'text',
            )
        );		
		$wp_customize->add_setting( 'blog_content',
            array(
                'default' => $this->defaults['blog_content'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_content',
            array(
                'label' => __( 'Show Content', 'ogo' ),
                'section' => 'blog_post_settings_section',
                'active_callback' => function(){
                    return ('style2' == get_theme_mod('blog_style'));
                }
            )
        ) );		
		$wp_customize->add_setting( 'blog_date',
            array(
                'default' => $this->defaults['blog_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_date',
            array(
                'label' => __( 'Show Date', 'ogo' ),
                'section' => 'blog_post_settings_section',
                'active_callback' => function(){
                    return ('style2' == get_theme_mod('blog_style')) || ('style3' == get_theme_mod('blog_style')) ;
                }
            )
        ) );
		
		$wp_customize->add_setting( 'blog_author_name',
            array(
                'default' => $this->defaults['blog_author_name'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_author_name',
            array(
                'label' => __( 'Show Author', 'ogo' ),
                'section' => 'blog_post_settings_section',
                'active_callback' => function(){
                    return ('style2' == get_theme_mod('blog_style')) || ('style3' == get_theme_mod('blog_style')) ;
                }
            )
        ) );		
		$wp_customize->add_setting( 'blog_comment_num',
            array(
                'default' => $this->defaults['blog_comment_num'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_comment_num',
            array(
                'label' => __( 'Show Comment', 'ogo' ),
                'section' => 'blog_post_settings_section',
                'active_callback' => function(){
                    return ('style2' == get_theme_mod('blog_style')) || ('style3' == get_theme_mod('blog_style')) ;
                }
            )
        ) );		
		$wp_customize->add_setting( 'blog_cats',
            array(
                'default' => $this->defaults['blog_cats'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_cats',
            array(
                'label' => __( 'Show Category', 'ogo' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		if(class_exists('Ogo_Core')){
            $wp_customize->add_setting( 'blog_view',
            array(
                'default' => $this->defaults['blog_view'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
            );
            $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_view',
                array(
                    'label' => __( 'Show Views', 'ogo' ),
                    'section' => 'blog_post_settings_section',
                    'active_callback' => function(){
                        return ('style2' == get_theme_mod('blog_style')) || ('style3' == get_theme_mod('blog_style')) ;
                    }
                )
            ) );
            $wp_customize->add_setting( 'blog_length',
            array(
                'default' => $this->defaults['blog_length'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
            );
            $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_length',
                array(
                    'label' => __( 'Show Reading Length', 'ogo' ),
                    'section' => 'blog_post_settings_section',
                )
            ) );
        }
		
        $wp_customize->add_setting( 'button_text',
            array(
                'default' => $this->defaults['button_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'button_text',
            array(
                'label' => __( 'View Details Button Text', 'ogo' ),
                'section' => 'blog_post_settings_section',
                'type' => 'text',
                'active_callback' => function(){
                    return ('style4' == get_theme_mod('blog_style')) || ('style5' == get_theme_mod('blog_style')) ;
                }
            )
        );

        // $wp_customize->add_setting( 'blog_post_sort',
        //     array(
        //         'default' => $this->defaults['blog_post_sort'],
        //         'transport' => 'refresh',
        //         'sanitize_callback' => 'rttheme_radio_sanitization',
        //     )
        // );
        // $wp_customize->add_control( 'blog_post_sort',
        //     array(
        //         'label' => __( 'Post Sort', 'ogo' ),
        //         'section' => 'blog_post_settings_section',
        //         'description' => esc_html__( 'Display post Order', 'ogo' ),
        //         'type' => 'select',
        //         'choices' => array(
        //             'recent' => esc_html__( 'Recent Posts', 'ogo' ),
        //             'title' => esc_html__( 'Random Posts', 'ogo' ),
        //             'modified' => esc_html__( 'Last Modified Posts', 'ogo' ),
        //             'popular' => esc_html__( 'Most Commented posts', 'ogo' ),
        //             'views' => esc_html__( 'Most Viewed posts', 'ogo' ),
        //         )
        //     )
        // );

        /*Author bg image*/
        $wp_customize->add_setting('author_bg_image',
            array(
              'default'           => $this->defaults['author_bg_image'],
              'transport'         => 'refresh',
              'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'author_bg_image',
            array(
                'label'         => esc_html__('Author Top Background', 'ogo'),
                'description'   => esc_html__('This is the description for the Media Control', 'ogo'),
                'section'       => 'blog_post_settings_section',
                'mime_type'     => 'image',
                'button_labels' => array(
                    'select'       => esc_html__('Select File', 'ogo'),
                    'change'       => esc_html__('Change File', 'ogo'),
                    'default'      => esc_html__('Default', 'ogo'),
                    'remove'       => esc_html__('Remove', 'ogo'),
                    'placeholder'  => esc_html__('No file selected', 'ogo'),
                    'frame_title'  => esc_html__('Select File', 'ogo'),
                    'frame_button' => esc_html__('Choose File', 'ogo'),
                ),
                'active_callback' => function(){
                    return ('style2' == get_theme_mod('blog_style')) || ('style3' == get_theme_mod('blog_style')) ;
                }
            )
        ));

        /*Animation*/
        $wp_customize->add_setting( 'blog_animation',
            array(
                'default' => $this->defaults['blog_animation'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'blog_animation',
            array(
                'label' => __( 'Animation On/Off', 'ogo' ),
                'section' => 'blog_post_settings_section',
                'type' => 'select',
                'choices' => array(
                    'wow' => esc_html__( 'Animation On', 'ogo' ),
                    'hide' => esc_html__( 'Animation Off', 'ogo' ),
                ),
            )
        );

        $wp_customize->add_setting( 'blog_animation_effect',
            array(
                'default' => $this->defaults['blog_animation_effect'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'blog_animation_effect',
            array(
                'label' => __( 'Entrance Animation', 'ogo' ),
                'section' => 'blog_post_settings_section',
                'type' => 'select',
                'choices' => array(
                    'none' => esc_html__( 'none', 'ogo' ),
                    'bounce' => esc_html__( 'bounce', 'ogo' ),
                    'flash' => esc_html__( 'flash', 'ogo' ),
                    'pulse' => esc_html__( 'pulse', 'ogo' ),
                    'rubberBand' => esc_html__( 'rubberBand', 'ogo' ),
                    'shakeX' => esc_html__( 'shakeX', 'ogo' ),
                    'shakeY' => esc_html__( 'shakeY', 'ogo' ),
                    'headShake' => esc_html__( 'headShake', 'ogo' ),
                    'swing' => esc_html__( 'swing', 'ogo' ),
                    'fadeIn' => esc_html__( 'fadeIn', 'ogo' ),
                    'fadeInDown' => esc_html__( 'fadeInDown', 'ogo' ),
                    'fadeInLeft' => esc_html__( 'fadeInLeft', 'ogo' ),
                    'fadeInRight' => esc_html__( 'fadeInRight', 'ogo' ),
                    'fadeInUp' => esc_html__( 'fadeInUp', 'ogo' ),
                    'bounceIn' => esc_html__( 'bounceIn', 'ogo' ),
                    'bounceInDown' => esc_html__( 'bounceInDown', 'ogo' ),
                    'bounceInLeft' => esc_html__( 'bounceInLeft', 'ogo' ),
                    'bounceInRight' => esc_html__( 'bounceInRight', 'ogo' ),
                    'bounceInUp' => esc_html__( 'bounceInUp', 'ogo' ),
                    'slideInDown' => esc_html__( 'slideInDown', 'ogo' ),
                    'slideInLeft' => esc_html__( 'slideInLeft', 'ogo' ),
                    'slideInRight' => esc_html__( 'slideInRight', 'ogo' ),
                    'slideInUp' => esc_html__( 'slideInUp', 'ogo' ),
                ),
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new OgoTheme_Blog_Post_Settings();
}
