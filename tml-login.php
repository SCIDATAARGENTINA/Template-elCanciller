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
				<div class="form-side">
					<h1>Ingresar</h1>
					<?php echo do_shortcode('[theme-my-login]'); ?>
				</div>
				<div class="action-side">
					<h2>Accede a elCanciller para aprovechar todas las funcionalidades de nuestra web.</h2>
					<p>Playlists de noticias</p>
					<p>Favoritos</p>
					<p>Resultados personalizados</p>
				</div>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
