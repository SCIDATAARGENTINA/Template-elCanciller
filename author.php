<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<div class="front-page-content inner container">
			<div class="sidebar">
				<?php get_template_part('template-parts/sidebar/sidebar', 'seccion') ?>
			</div><!-- sidebar -->
			<div class="content <?php echo $term->slug ?>">
			
				<?php get_template_part('template-parts/author/author', 'header') ?>

			<div class="seccion-posts col-3">
			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content/content' );

				// End the loop.
			endwhile;

			// Previous/next page navigation.
			//twentynineteen_the_posts_navigation();

			// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
		</div>
		<?php 

				global $wp_query; // you can remove this line if everything works for you
 
				// don't display the button if there are not enough posts
				if (  $wp_query->max_num_pages > 1 ){
					echo '<div class="loadmore"><img src="' . site_url() . '/wp-content/uploads/2019/08/loadmore-plus.svg"></div>';
				}
		
		?>
		</div><!-- content -->
		
	</div><!-- inner content -->

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
