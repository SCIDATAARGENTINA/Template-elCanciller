<?php
/**
 * Template Name: Theme My Login
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

			<div class="theme-my-login container">
				<h1><?php tml_get_action(); ?></h1>
				<?php theme_my_login(); ?>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
