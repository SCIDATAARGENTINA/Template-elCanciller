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
				<h1>¿Olvido su contraseña?</h1>
				<p>Le enviaremos una clave de recuperación a su correo electrónico</p>
				<?php echo do_shortcode('[theme-my-login]'); ?>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
