<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="front-page-content inner container">
			<div class="sidebar">
				<?php get_template_part( 'template-parts/sidebar/sidebar', 'front' ); ?>
			</div><!-- sidebar -->
			<div class="content">

			<header class="page-header">
				<h1 class="page-title">
					Resultados de...
				</h1>
				<div class="page-description"><?php echo get_search_query(); ?></div>
			</header><!-- .page-header -->

			<?php if ( have_posts() ) { ?>
			<div class="search-posts">
			<?php
			// Start the Loop.
			while ( have_posts() ) {
				the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content/content', 'search' );

			// End the loop.
			}
			?>
			</div><!-- search-posts -->
			<?php
				// don't display the button if there are not enough posts
				if (  $wp_query->max_num_pages > 1 ){
					echo '<div class="loadmore"><img src="' . site_url() . '/wp-content/uploads/2019/08/loadmore-plus.svg"></div>';
				}
		

				// If no content, include the "No posts found" template.
			}
			else {
				get_template_part( 'template-parts/content/content', 'none' );
			}
			
			?>

			</div><!-- content -->

		</div><!-- inner container -->
		<div class="outer-container">
			<div class="related-posts">
				<div class="grey-band"></div>
				<div class="related-title">
					<img src="<?php bloginfo('url') ?>/wp-content/uploads/2019/07/fire-marron-blanco.svg" alt="">
					<h3>Lo que no te podés perder</h3>
				</div><!-- related-title -->
				<div class="loader">Cargando...</div>
				<div class="render-posts col-3" data-quantity="9">
				</div>
			</div>
		</div><!-- outer-container -->

		
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
