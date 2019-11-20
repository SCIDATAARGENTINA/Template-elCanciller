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
$term = get_queried_object();
$cat_color = get_field('color', $term->taxonomy . '_' . $term->term_id);
echo '<style> .' . $term->slug . ':before'. '{ background: ' . $cat_color . '; } .' . $term->slug . '{ border-color: ' . $cat_color . ' !important;} </style>';
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<div class="front-page-content inner container">
				<div class="sidebar">
					<?php get_template_part('template-parts/sidebar/sidebar', 'seccion') ?>
				</div><!-- sidebar -->
				<div class="content <?php echo $term->slug ?>">
				
					<?php get_template_part('template-parts/archives/archive', 'header') ?>
				
				</div><!-- content -->
		
			</div><!-- inner container -->

			<div class="outer-container">			
				<div class="seccion-posts col-3">
				<?php
				// $i valida el momento del loop para insertar un anuncio
				$i = 0;
				while ( have_posts() ) :
					the_post();
					
					$i++;

					if($i == 1){ // inserta un anuncio en la posición 1 ?>

						<div class="ad-grilla">
							<?php echo get_field('grilla_seccion_1', 'option') ?>
						</div>

					<?php }else if($i == 8){// inserta un anuncio en la posición 8 ?>

						<div class="ad-grilla">
							<?php echo get_field('grilla_seccion_2', 'option') ?>
						</div>

					<?php }

					get_template_part( 'template-parts/content/content' );




				endwhile;

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
			</div> <!-- outer-container -->
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
