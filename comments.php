<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
}

$discussion = twentynineteen_get_discussion_data();
?>

<div id="comments" class="<?php echo comments_open() ? 'comments-area' : 'comments-area comments-closed'; ?>">
	<div class="<?php echo $discussion->responses > 0 ? 'comments-title-wrap' : 'comments-title-wrap no-responses'; ?>">
		<div class="comments-topbar">
			<div class="comentar">
				<a href="#respond">
				<img src="<?php bloginfo('url') ?>/wp-content/uploads/2019/07/chat-blanco.svg" alt="">
				comentar
				</a>
			</div>
			<div class="compartir">
				<span class="text">Compartir:</span>
				<i class="fab fa-twitter"  data-text="<?php the_title(); ?>" data-link="<?php the_permalink() ?>"></i>
				<i class="fab fa-facebook-f" data-title="<?php the_title(); ?>" data-img="" data-text="<?php echo get_the_excerpt(); ?>" data-link="<?php the_permalink() ?>"></i>
			</div>
			<div class="nota-like">
				<span class="text">¿Te gusto esta nota?</span>
				<i class="fas fa-heart like" data-id="<?php echo get_the_ID(); ?>" data-count="<?php the_field('likes') ?>" data-type="<?php echo get_post_type( get_the_ID() ); ?>"></i>
			</div>
		</div><!-- comments-topbar -->
	</div><!-- .comments-title-flex -->
	<?php
	if ( have_comments() ) :

		// Show comment form at top if showing newest comments at the top.
		if ( comments_open() ) {
			twentynineteen_comment_form( 'desc' );
		}

		?>
		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'walker'      => new Canciller_Walker_Comment(),
					'avatar_size' => twentynineteen_get_avatar_size(),
					'short_ping'  => true,
					'style'       => 'ol',
				)
			);
			?>
		</ol><!-- .comment-list -->
		<?php

		// Show comment navigation
		if ( have_comments() ) :
			$prev_icon     = twentynineteen_get_icon_svg( 'chevron_left', 22 );
			$next_icon     = twentynineteen_get_icon_svg( 'chevron_right', 22 );
			$comments_text = __( 'Comments', 'twentynineteen' );
			the_comments_navigation(
				array(
					'prev_text' => sprintf( '%s <span class="nav-prev-text"><span class="primary-text">%s</span> <span class="secondary-text">%s</span></span>', $prev_icon, __( 'Previous', 'twentynineteen' ), __( 'Comments', 'twentynineteen' ) ),
					'next_text' => sprintf( '<span class="nav-next-text"><span class="primary-text">%s</span> <span class="secondary-text">%s</span></span> %s', __( 'Next', 'twentynineteen' ), __( 'Comments', 'twentynineteen' ), $next_icon ),
				)
			);
		endif;

		// Show comment form at bottom if showing newest comments at the bottom.
		if ( comments_open() && 'asc' === strtolower( get_option( 'comment_order', 'asc' ) ) ) :
			?>
			<div class="comment-form-flex">
				<span class="screen-reader-text"><?php _e( 'Leave a comment', 'twentynineteen' ); ?></span>
				<?php twentynineteen_comment_form( 'asc' ); ?>
				<h2 class="comments-title" aria-hidden="true"><?php _e( 'Leave a comment', 'twentynineteen' ); ?></h2>
			</div>
			<?php
		endif;

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments">
				<?php _e( 'Comments are closed.', 'twentynineteen' ); ?>
			</p>
			<?php
		endif;

	else :

		// Show comment form.
		twentynineteen_comment_form( true );

	endif; // if have_comments();
	?>
</div><!-- #comments -->
