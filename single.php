<?php
/**
 * The template for displaying all single posts
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

		<div class="front-page-content inner container">
			<div class="sidebar">
				<?php get_template_part('template-parts/sidebar/sidebar', 'single') ?>
			</div><!-- sidebar -->
			<div class="content">

			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				if (is_single()) {
					$post_id = get_the_ID();
				}

				get_template_part( 'template-parts/content/content', 'single' );

			endwhile; // End of the loop.
			?>
			
			</div><!-- content -->

		</div><!-- inner container -->
		<div class="outer-container">
			<div id="publicidadBcoProvinciaNotaMobile" class="onlymobile" style="margin: 0 auto; margin-bottom: 40px;">
			</div>

			<script>

				if(jQuery(window).width() <= 991){
					
					setTimeout(function(){ decidePublicidadMobile() }, 3000);

					function decidePublicidadMobile() {
					var categoriaPosteo = jQuery('.post-imagen > .post-category > a > h4').text();
					var texto = "";
					if (categoriaPosteo == 'Está pasando')
					{
						texto = texto + '<a href=\"https://www.bancoprovincia.com.ar/web\"><img src=\"http://elcanciller.com/wp-content/uploads/2019/10/PBAtasafija1.gif\"></a>';  
					}
					if (categoriaPosteo == 'Deportes')
					{
						texto = texto + '<a href=\"https://www.bancoprovincia.com.ar/web\"><img src=\"https://elcanciller.com/wp-content/uploads/2019/11/300x600.gif\"></a>';
					}
					jQuery("#publicidadBcoProvinciaNotaMobile").append(texto);
					}
				}

			</script> 
			<div class="related-posts">
				<div class="grey-band"></div>
				<div class="related-title">
					<img src="<?php bloginfo('url') ?>/wp-content/uploads/2019/07/fire-marron-blanco.svg" alt="">
					<h3>Lo que no te podés perder</h3>
				</div><!-- related-title -->
				<div class="col-3">
					<?php echo do_shortcode('[posts cantidad="3" offset="0"]') ?>
				</div>
				<div class="col-1-2">
					<div class="advertical">
						<?php echo get_field('grilla_nota_1', 'option'); ?>
					</div>
					<div class="col-2-2">
						<div class="ad-grilla">
							<?php echo get_field('grilla_nota_2', 'option'); ?>
						</div>
						<?php echo do_shortcode('[posts cantidad="3" offset="3"]') ?>
					</div>
				</div>
			</div>
		</div><!-- outer-container -->

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
