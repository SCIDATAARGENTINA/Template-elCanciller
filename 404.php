<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
	<style>
		#masthead{display:none !important;}
	</style>
	<script>window.location.replace("http://elcanciller.com");</script>
	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="error-404 not-found" style="width:100%;">
				<img class="error-image" src="http://142.93.24.13/wp-content/uploads/2019/09/error-404.png">
				<!-- <header class="page-header">
					<h1 class="page-title"><?php //_e( 'Oops! That page can&rsquo;t be found.', 'twentynineteen' ); ?></h1>
				</header>-->

				<!-- <div class="page-content">
					<p>--><?php //_e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentynineteen' ); ?></p>
					<?php //get_search_form(); ?>
				<!--</div>-->
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
