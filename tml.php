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

		<?php 
		$action = theme_my_login()->get_action();
		?>

			<div class="theme-my-login container">
				<h1><?php echo $action ?></h1>
				<?php echo do_shortcode('[theme-my-login]'); ?>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
