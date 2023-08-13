<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'ogo-size6';
$id = get_the_ID();

$position   	= get_post_meta( $id, 'ogo_team_position', true );
$socials       	= get_post_meta( $id, 'ogo_team_socials', true );
$social_fields 	= OgoTheme_Helper::team_socials();

$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), OgoTheme::$options['team_arexcerpt_limit'], '' );

?>
<article id="post-<?php the_ID(); ?>">
	<div class="team-item">
		<div class="team-content-wrap">		
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
				<div class="mask-wrap">
					<div class="team-content">
						<div class="top-content">
							<h3 class="team-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
							<?php if ( OgoTheme::$options['team_ar_position'] ) { ?>
							<div class="team-designation"><?php echo esc_html( $position );?></div>
							<?php } ?>
							<?php if ( OgoTheme::$options['team_ar_excerpt'] ) { ?>
							<p class="team-text"><?php echo wp_kses( $content , 'alltext_allow' ); ?></p>
							<?php } ?>
						</div>
						<?php if ( OgoTheme::$options['team_ar_social'] ) { ?>
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
	</div>
</article>