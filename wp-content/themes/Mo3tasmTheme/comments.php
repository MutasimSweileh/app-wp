<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
  <div class="article__addComment primaryContent">
  <h4><i class="flaticon-speech-bubble"></i>اضف رد جديد</h4>
		<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<p class="sh-comments-disabled"><?php esc_html_e( 'Comments are closed.', 'Mo3tasmTheme' ); ?></p>
		<?php endif; ?>

        <?php comment_form(array(
			'label_submit' => esc_html__( 'Send a comment', 'Mo3tasmTheme' ),
			'comment_notes_after' => '',
			'comment_notes_before' => '',
			'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' =>'<div class="input-group">
                    <input type="text" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" required  class="form-control" placeholder="' . esc_html__( 'Name ', 'Mo3tasmTheme' ) . '*">
                  </div>'
					,

				'email' =>'<div class="input-group">
                    <input type="email" class="form-control" id="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" required placeholder="' . esc_html__( 'Email ', 'Mo3tasmTheme' ) . '*">
                  </div>'
					,

				'url' =>'<div class="input-group">
                    <input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" class="form-control" placeholder="' . esc_html__( 'Website ', 'Mo3tasmTheme' ) . '">
                  </div>'

				)
			),
			'comment_field' => ' <div class="input-group">
                    <textarea id="comment" name="comment" rows="8" cols="40" class="form-control" placeholder="' . esc_html__( 'Your comment ', 'Mo3tasmTheme' ) . '*" required></textarea>
                  </div>',
			'submit_field' => '<div class="sh-comments-required-notice">' . esc_html__( 'Required fields are marked', 'Ma3tasmTheme' ) . ' <span>*</span></div><p class="form-submit">%1$s %2$s</p>',
		));
        ?>


              </div>
<div class="article__comments primaryContent">
<?php if ( have_comments() ) : ?>

                <h4><?php printf( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'Mo3tasmTheme' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></h4>

 <ol class="commentlist">
			<?php

			function gillion_light_comment($comment, $args, $depth) {
				$GLOBALS['comment'] = $comment;
				extract($args, EXTR_SKIP);

				if ( 'div' == $args['style'] ) {
					$tag = 'div';
					$add_below = 'comment';
				} else {
					$tag = 'li';
					$add_below = 'div-comment';
				}
			?>
				<<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?>>
				<h6 class="sh-comment-position" id="comment-<?php comment_ID() ?>"></h6>
				<div id="div-comment-<?php comment_ID() ?>" class="article__comments--comment" >

                    <div class="article__comments--info">
                        <div class="comment-thumb">  <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>  </div>
                          <?php printf( '<h4 class="sh-comment-author">%s</h4>', get_comment_author_link() ); ?>
                          <time><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
									<?php
										echo human_time_diff( strtotime( $comment->comment_date_gmt ), current_time('timestamp') ) . ' '.esc_html__( 'ago', 'Mo3tasmTheme' );
									?>
								</a></time>
                    </div>


						<?php if ( $comment->comment_approved == '0' ) : ?>
							<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'Mo3tasmTheme' ); ?></p>
						<?php endif; ?>

						<p class="sh-comment-content">
							<?php comment_text(); ?>
						</p>

						<div class="reply post-meta">

         					<i class="icon icon-action-redo sh-reply-link"></i>
							<span class="sh-reply-edit  button fr">
								<?php edit_comment_link( esc_html__( 'Edit', 'Mo3tasmTheme' ), '  ', '' ); ?>
							</span>

							<?php if( comments_open() ) : ?>
								<i class="icon icon-note sh-reply-link sh-comment-date-reply"></i>
								<span class="sh-reply-link-button button fr">
									<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
								</span>
							<?php endif; ?>
						</div>




				</div>

			<?php }
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 70,
					'max_depth' => '5',
					'callback' => 'gillion_light_comment',

				) );
			?>


     </ol>
     </div>
