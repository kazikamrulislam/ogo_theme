<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

class OgoTheme_Footer_Address_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
            'ogo_footer_address', // Base ID
            esc_html__( 'Ogo : Footer Address (for footer)', 'ogo-core' ), // Name
            array( 'description' => esc_html__( 'Footer Address Widget', 'ogo-core' ) ) // Args
            );
	}

	public function widget( $args, $instance ){
        static $first_dropdown = true;
		echo wp_kses_post( $args['before_widget'] );
		if ( !empty( $instance['title'] ) ) {
			$html = apply_filters( 'widget_title', $instance['title'] );
			echo $html = $args['before_title'] . $html .$args['after_title'];
		}
		else {
			$html = '';
		}

        $select_style = ( !empty( $instance['select_style'] ) ) ? $instance['select_style'] : 'box-style-1';

		?>

		<?php if ( $select_style == 'box-style-1' ) { ?>
            <div class="corporate-address1">
            <?php
            if( !empty( $instance['phone'] ) ){
				?><div class="corporate1-phone"><div class="address-title"><?php esc_html_e( 'Phone' , 'ogo-core' ) ?></div> <a href="tel:<?php echo esc_attr( $instance['phone'] ); ?>"><?php echo esc_html( $instance['phone'] ); ?></a></div><?php
			}	
            if( !empty( $instance['email'] ) ){
				?><div class="corporate1-email"><div class="address-title"><?php esc_html_e( 'Email' , 'ogo-core' ) ?></div> <a href="mailto:<?php echo esc_attr( $instance['email'] ); ?>"><?php echo esc_html( $instance['email'] ); ?></a></div><?php
			} 
       	    if( !empty( $instance['address'] ) ){
                ?><div class="corporate1-address"><div class="address-title"><?php esc_html_e( 'Address' , 'ogo-core' ) ?></div> <p><?php echo esc_html( $instance['address'] ); ?></p></div><?php
            }		         
			?>

            </div>
            <ul class="corporate-address">
		
		</ul>
		<?php } else if ( $select_style == 'box-style-2' ) { ?>
            <ul class="corporate-address2">
			<?php	
       	    if( !empty( $instance['address'] ) ){
                ?><li><span class="address2-icon"><i class="fa fa-map" aria-hidden="true"></i></span><?php echo esc_html( $instance['address'] ); ?></li><?php
            }		 
			if( !empty( $instance['phone'] ) ){
				?><li><span class="address2-icon"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="tel:<?php echo esc_attr( $instance['phone'] ); ?>"><?php echo esc_html( $instance['phone'] ); ?></a></li><?php
			}   
			if( !empty( $instance['email'] ) ){
				?><li><span class="address2-icon"><i class="fa fa-envelope" aria-hidden="true"></i></span> <a href="mailto:<?php echo esc_attr( $instance['email'] ); ?>"><?php echo esc_html( $instance['email'] ); ?></a></li><?php
			}      
			?>
		</ul>
		<?php } else if ( $select_style == 'box-style-3' ) { ?>
            <ul class="corporate-address">
			<?php	
       	    if( !empty( $instance['address'] ) ){
                ?><li><div><?php esc_html_e( 'Address' , 'ogo-core' ) ?></div> <p><?php echo esc_html( $instance['address'] ); ?></p> </li><?php
            }		 
			if( !empty( $instance['phone'] ) ){
				?><li><div><?php esc_html_e( 'Phone' , 'ogo-core' ) ?></div> <a href="tel:<?php echo esc_attr( $instance['phone'] ); ?>"><?php echo esc_html( $instance['phone'] ); ?></a></li><?php
			}   
			if( !empty( $instance['email'] ) ){
				?><li><div><?php esc_html_e( 'Email' , 'ogo-core' ) ?></div> <a href="mailto:<?php echo esc_attr( $instance['email'] ); ?>"><?php echo esc_html( $instance['email'] ); ?></a></li><?php
			}      
			?>
		</ul>
		<?php } ?>

		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$instance              = array();
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['select_style'] = isset( $new_instance['select_style'] ) ? $new_instance['select_style'] : 'box-style-1';
		$instance['address']   = ( ! empty( $new_instance['address'] ) ) ? sanitize_text_field( $new_instance['address'] ) : '';
		$instance['phone']     = ( ! empty( $new_instance['phone'] ) ) ? sanitize_text_field( $new_instance['phone'] ) : '';
		$instance['email']     = ( ! empty( $new_instance['email'] ) ) ? sanitize_email( $new_instance['email'] ) : '';

		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'   		=> esc_html__( 'Corporate Office' , 'ogo-core' ),
			'address'		=> '',
			'phone'   		=> '',
			'email'   		=> '',
			);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'select_style'     => array(
				'label' => esc_html__( 'Select Style', 'ogo-core' ),
				'type'  => 'select',
				'options' => array(
					'box-style-1' => esc_html__( 'Style 1', 'ogo-core' ),
					'box-style-2' => esc_html__( 'Style 2', 'ogo-core' ),
                    'box-style-3' => esc_html__( 'Style 3', 'ogo-core' ),
				),
				'default' => 'box-style-1',
			), 
			'title'     => array(
				'label' => esc_html__( 'Title', 'ogo-core' ),
				'type'  => 'text',
			),
			'address'   => array(
				'label' => esc_html__( 'Address', 'ogo-core' ),
				'type'  => 'text',
			),      
			'phone'     => array(
				'label' => esc_html__( 'Phone Number', 'ogo-core' ),
				'type'  => 'text',
			),      
			'email'     => array(
				'label' => esc_html__( 'Email', 'ogo-core' ),
				'type'  => 'text',
			),
		);

		AMT_Widget_Fields::display( $fields, $instance, $this );
	}
}