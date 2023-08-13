<?php
if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-area single-blog-bottom">
    <?php
	$ogo_comments_text = '';
		if ( have_comments() ):
		$ogo_comment_count = get_comments_number();
		if ( $ogo_comment_count > 1 && $ogo_comment_count != 0 ) {
			$ogo_comments_text .= esc_html__( 'Comments:', 'ogo' );
		} else if ( $ogo_comment_count == 0 ) {
			$ogo_comments_text .= esc_html__( 'Comment:', 'ogo' );
		} else {
			$ogo_comments_text .= esc_html__( 'Comment', 'ogo' );
		}
		$ogo_comments_text .= ( ' ' .'('. $ogo_comment_count . ')' );
	?>
		<h4><?php echo esc_html( $ogo_comments_text );?></h4>
	<?php
		$ogo_avatar = get_option( 'show_avatars' );
	?>
		<ul class="comment-list<?php echo empty( $ogo_avatar ) ? ' avatar-disabled' : '';?>">
		<?php
			wp_list_comments(
				array(
					'style'             => 'ul',
					'callback'          => 'OgoTheme_Helper::comments_callback',
					'reply_text'        => esc_html__( 'Reply', 'ogo' ),
					'avatar_size'       => 105,
					'format'            => 'html5',
					)
				);
		?>
		</ul>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav class="pagination-area comment-navigation">
				<ul>
					<li><?php previous_comments_link( esc_html__( 'Older Comments', 'ogo' ) ); ?></li>
					<li><?php next_comments_link( esc_html__( 'Newer Comments', 'ogo' ) ); ?></li>
				</ul>
			</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation.?>

	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'ogo' ); ?></p>
	<?php endif;?>
	<div>
	<?php
		$ogo_commenter = wp_get_current_commenter();
		$ogo_req = get_option( 'require_name_email' );
		$ogo_aria_req = ( $ogo_req ? " required" : '' );

		$ogo_fields =  array(
			'author' =>
			'<div class="row">
				<div class="col-sm-6">
					<div class="form-group comment-form-author">
						<label for="name">Your Name</label>
						<input type="text" id="author" name="author" value="' . esc_attr( $ogo_commenter['comment_author'] ) . '" placeholder="'. esc_attr__( 'Name', 'ogo' ).( $ogo_req ? ' *' : '' ).'" class="form-control"' . $ogo_aria_req . '>
					</div>',

					'email' =>	
						'<div class="form-group comment-form-email">
							<label for="email">Email</label>
							<input id="email" name="email" type="email" value="' . esc_attr(  $ogo_commenter['comment_author_email'] ) . '" class="form-control" placeholder="'. esc_attr__( 'Email', 'ogo' ).( $ogo_req ? ' *' : '' ).'"' . $ogo_aria_req . '>
						</div>',

					'phone' =>
						'<div class="form-group comment-form-author">
							<label for="phone">Phone</label>
							<input type="text" id="phone" name="phone" value=" " placeholder="'. esc_attr__( 'Phone', 'ogo' ).( $ogo_req ? ' *' : '' ).'" class="form-control"' . $ogo_aria_req . '>
						</div>
				</div>
			</div>'
			);

		$ogo_args = array(
			'class_submit'      => 'submit btn-send ghost-on-hover-btn',
			'submit_field'      => '<div class="form-group form-submit">%1$s %2$s</div>',
			'comment_field' =>  '<div class="form-group comment-form-comment"><textarea id="comment" name="comment" required placeholder="'.esc_attr__( 'Comment *', 'ogo' ).'" class="textarea form-control" rows="10" cols="40"></textarea></div>',
			'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
			'title_reply_after' => '</h4>',
			'fields' => apply_filters( 'comment_form_default_fields', $ogo_fields ),
			);

	?>


	<?php comment_form( $ogo_args );?>
	</div>
</div>