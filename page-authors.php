<?php
/**
 *
 * Template Name: Blanco-con-sidebar
 * 
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
$page_id  = get_queried_object_id();
?>

<section id="primary" class="content-area">
	<main id="main" class="site-main">

		<div class="front-page-content inner container">
			<div class="sidebar">
				<?php get_template_part('template-parts/sidebar/sidebar', 'front') ?>
			</div><!-- sidebar -->
			<div class="content">
				

			</div><!-- content -->

		</div><!-- inner container -->
		<div class="outer-container">
			
		</div><!-- outer-container -->

	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
