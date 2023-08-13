<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

global $post;

$ogo_team_experience 		= get_post_meta( $post->ID, 'ogo_team_experience', true );
$ogo_team_position 		= get_post_meta( $post->ID, 'ogo_team_position', true );
$ogo_team_website       = get_post_meta( $post->ID, 'ogo_team_website', true );
$ogo_team_email    		= get_post_meta( $post->ID, 'ogo_team_email', true );
$ogo_team_phone    		= get_post_meta( $post->ID, 'ogo_team_phone', true );
$ogo_team_address    	= get_post_meta( $post->ID, 'ogo_team_address', true );
$ogo_team_skill       	= get_post_meta( $post->ID, 'ogo_team_skill', true );
$ogo_team_counter      	= get_post_meta( $post->ID, 'ogo_team_count', true );
$socials        		= get_post_meta( $post->ID, 'ogo_team_socials', true );
$socials        		= array_filter( $socials );
$socials_fields 		= OgoTheme_Helper::team_socials();
$ogo_team_contact_form 	= get_post_meta( $post->ID, 'ogo_team_contact_form', true );
$ogo_team_member_bio	= get_post_meta($post->ID, 'ogo_team_member_bio', true);
$ogo_team_member_experince	= get_post_meta($post->ID, 'ogo_team_member_experience', true);
$ogo_team_member_award	= get_post_meta($post->ID, 'ogo_team_member_award', true);

$thumb_size = 'ogo-size6';
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'team-single' ); ?>>
		<div class="row team-single-content">
			<div class="col-lg-6 col-md-6 col-12 team-right">
				<div class="team-thumb">
					<?php
						if ( has_post_thumbnail() ){
							the_post_thumbnail( $thumb_size );
						} else {
							echo '<img class="wp-post-image" src="' . OgoTheme_Helper::get_asset_file( 'element/noimage_560X680.jpg' ) . '" alt="'.get_the_title().'">';
						}
					?>	
				</div>
			</div>			
			<div class="col-lg-6 col-md-6 col-12 team-content-left">
				<div class="team-content">
					<div class="team-heading">
						<h2 class="entry-title"><?php the_title(); ?></h2>
						<?php if ( $ogo_team_position ) { ?>
							<span class="designation"><?php echo esc_html( $ogo_team_position );?></span>
						<?php } ?>
					</div>
					<?php if ( $ogo_team_member_bio ) { ?>
						<p class="ogo_team_member_bio"><?php echo esc_html( $ogo_team_member_bio );?></p>
					<?php } ?>
				</div>
				<!-- Team info -->
				<?php if ( OgoTheme::$options['team_info'] ) { ?>
				<?php if ( !empty( $ogo_team_experience ) ||  !empty( $ogo_team_website ) ||  !empty( $ogo_team_phone ) || !empty( $ogo_team_email ) || !empty( $ogo_team_address )) { ?>
				<div class="team-info">
					<!-- <h4><?php //esc_html_e( 'Info', 'ogo' );?></h4> -->
					<ul>
						<?php if ( !empty( $ogo_team_experience ) ) { ?>
							<li><span class="team-label"><?php esc_html_e( 'Experience', 'ogo' );?> : </span><?php echo esc_html( $ogo_team_experience );?></li>
						<?php } if ( !empty( $ogo_team_website ) ) { ?>
							<li><span class="team-label"><?php esc_html_e( 'Website', 'ogo' );?> : </span><?php echo esc_html( $ogo_team_website );?></li>
						<?php } if ( !empty( $ogo_team_phone ) ) { ?>
							<li><span class="team-label"><?php esc_html_e( 'Phone', 'ogo' );?> : </span><a href="tel:<?php echo esc_html( $ogo_team_phone );?>"><?php echo esc_html( $ogo_team_phone );?></a></li>
						<?php } if ( !empty( $ogo_team_email ) ) { ?>
							<li><span class="team-label"><?php esc_html_e( 'Email', 'ogo' );?> : </span><a href="mailto:<?php echo esc_html( $ogo_team_email );?>"><?php echo esc_html( $ogo_team_email );?></a></li>
						<?php //} if ( !empty( $ogo_team_address ) ) { ?>
							<!-- <li><span class="team-label"><?php //esc_html_e( 'Address', 'ogo' );?> : </span><?php //echo esc_html( $ogo_team_address );?></li> -->
						<?php } ?>
					</ul>
				</div>
				<?php } } ?>
				<?php if ( !empty( $socials ) ) { ?>
					<div class="team_social">
						<span class="team-social-label"><?php esc_html_e( 'Social', 'ogo' );?> : </span>
						<ul class="team-social-items">
							<?php foreach ( $socials as $key => $value ): ?>
								<li><a target="_blank" href="<?php echo esc_url( $value ); ?>"><i class="fab <?php echo esc_attr($socials_fields[$key]['icon'] );?>"></i></a></li>
							<?php endforeach; ?>
						</ul>
					</div>						
				<?php } ?>
			</div>

			<div class="col-lg-12 col-md-12 col-12 team_member_description">
				<?php the_content(); ?>
			</div>

			<div class="col-lg-6 col-md-6 col-12">
				<!-- Team Skills -->
				<?php if ( OgoTheme::$options['team_skill'] ) { ?>
					<?php if ( !empty( $ogo_team_skill ) ) { ?>
					<div class="amt-skill-wrap">
						<div class="amt-skills">
							<h4><?php esc_html_e( 'Professional Skills', 'ogo' );?></h4>
							<?php foreach ( $ogo_team_skill as $skill ): ?>
								<?php
								if ( empty( $skill['skill_name'] ) || empty( $skill['skill_value'] ) ) {
									continue;
								}
								$skill_value = (int) $skill['skill_value'];
								$skill_style = "width:{$skill_value}%;";

								if ( !empty( $skill['skill_color'] ) ) {
									$skill_style .= "background-color:{$skill['skill_color']};";
								}
								?>
								<div class="amt-skill-each">
									<div class="amt-name"><?php echo esc_html( $skill['skill_name'] );?></div>
									<div class="progress">
										<div class="progress-bar progress-bar-striped wow slideInLeft" data-wow-delay="0s" data-wow-duration="3s" data-progress="<?php echo esc_attr( $skill_value );?>%" style="<?php echo esc_attr( $skill_style );?> animation-name: slideInLeft;"> <span><?php echo esc_html( $skill_value );?>%</span></div>
									</div>								
								</div>
							<?php endforeach;?> 
						</div>
					</div>
					<?php } ?>
				<?php } ?>
			</div>
			<div class="col-lg-6 col-md-6 col-12">
				<?php if ( !empty( $ogo_team_member_award ) ) { ?>
					<h4><?php esc_html_e( 'Recent Awards', 'ogo' );?></h4>
					
					<ul class="team-member-award">
						<?php foreach ( $ogo_team_member_award as $index => $value ): ?>
							<li>
								<div class="award">
									<span class="award_name"><?php echo esc_attr( $value['award_name']);?></span> <br>
									<span class="award_date"><?php echo esc_attr( $value['award_date']);?></span>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>						
				<?php } ?>
			</div>
		</div>
</div>