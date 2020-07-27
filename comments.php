<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RobynVeitch
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

<div id="comments" class="comments-area">
	<div data-oddert='comments.php'></div>

			
	<?php
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$robynVeitch_comment_count = get_comments_number();
			if ( '1' === $robynVeitch_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One response to %1$s', 'RobynVeitch' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s responses to %2$s', '%1$s responses to %2$s', $robynVeitch_comment_count, 'comments title', 'RobynVeitch' ) ),
					number_format_i18n( $robynVeitch_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 100,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		if ( ! comments_open() ) :
			?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'RobynVeitch' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->
