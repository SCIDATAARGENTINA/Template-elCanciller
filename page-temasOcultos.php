<?php
/**
 * Template Name: Dashboard - Temas ocultos
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
        <div class="dashboard">
            <div class="dashboard__sidebar">

                <?php get_template_part( 'template-parts/dashboard/sidebar', 'dashboard' ); ?>
                
            </div>
            <div class="dashboard__content">
                <?php

                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();

                        get_template_part( 'template-parts/dashboard/content', 'temasOcultos' );

                    endwhile; // End of the loop.

                ?>
            </div><!-- End dashboard-content -->
        </div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
