<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
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

<div id="comments" class="mt-20">

	<div class="w-full mb-20">
		<?php
		$args = array(
			'fields' => array(
				'author' => '',
				'email' => '',
				'url' => '',
			),
			'must_log_in' => '<p class="text-gray-700">Only registered members may comment. <a href="#">Log In</a></p>',
			'logged_in_as' => '',
			'label_submit' => __( 'Contribute', 'textdomain' ),
			'class_submit' => 'bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 mt-3 rounded transition duration-300 cursor-pointer',
			'title_reply' => '',
			'title_reply_to' => 'Replying to %s',
			'title_reply_before' => '<h3 id="reply-title" class="mb-2 text-gray-600 text-md">',
			'cancel_reply_before' => '<span class="ml-4 text-blue-500 text-sm">',
			'cancel_reply_after' => '</span>',
			'comment_notes_after' => '<p class="text-gray-500 text-xs">Allowed markdown: # Large Heading, ## Medium Heading, ### Small Heading, - List item, [title](https://www.example.com), ![alt text](image.jpg)</p>',
			'comment_field' => '<label class="block text-gray-700 font-medium mb-3" for="comment">Contribute to this idea.</label><textarea class="appearance-none block w-full bg-gray-100 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none h-field-collapsed focus:h-field-expanded transition-height duration-300" id="comment" name="comment" placeholder="This is a great idea!"></textarea>',
		);
		comment_form( $args );
		?>
	</div>

	<?php
	if ( have_comments() ) :
		?>
		<p class="text-gray-600 text-lg mb-6">
			<?php
			$marz_comment_count = get_comments_number();
			if ( '1' === $marz_comment_count ) {
				echo esc_html__( 'One comment.', 'marzeotti-base' );
			} else {
				echo esc_html( $marz_comment_count . ' comments.' );
			}
			?>
		</p>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'walker' => new Marz_Walker_Comment(),
					'style' => 'ol',
					'max_depth' => 10,
					'type' => 'comment',
					'per_page' => 10,
					'reverse_top_level' => true,
					'avatar_size' => 0,
				)
			);
			?>
		</ol>

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="text-gray-600 text-lg mb-3"><?php esc_html_e( 'Comments are closed.', 'marzeotti-base' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
	?>

</div><!-- #comments -->
