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
$page_id  = get_queried_object_id();
$encuesta_pequena = get_field('encuesta_pequena');
$encuesta_grande = get_field('encuesta_grande');
?>
<script>
	jQuery( document ).ready(function() {
	setTimeout(function() {
		location.reload();
	}, 300000);
});
</script>

<section id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="front-page-content inner container">
			<div class="sidebar">
				<?php get_template_part('template-parts/sidebar/sidebar', 'front') ?>
			</div><!-- sidebar -->
			<div class="content">
				<?php get_template_part('template-parts/sections/section', 'live') ?>
				<?php get_template_part('template-parts/sections/section', 'ultimomomento') ?>
				<?php get_template_part('template-parts/home/trending', 'front') ?>
				<div class="col-3" data-quantity="3" data-offset="0">
				
				<?php // Cambia el Layout si no hay encuesta pequeña
				if ($encuesta_pequena){
					echo do_shortcode('[posts cantidad="2" offset="0" encuesta_id="'.$encuesta_pequena.'" encuesta_pos="3"]');
				}else{
					echo do_shortcode('[posts cantidad="3" offset="0"]');
				}
				?>
				</div>
				<div class="col-3 order-2">
					<div class="ad-grilla">
						<?php echo get_field('grilla_home_1', 'option') ?>
					</div>
					<?php 
					if ($encuesta_pequena){
						echo do_shortcode('[posts cantidad="2" offset="2"]'); // Con encuesta pequeña offset: 2 total: 4
					}else { 
						echo do_shortcode('[posts cantidad="2" offset="3"]'); // Sin encuesta pequeña - offset 3 total: 5 
					}
					?>
				</div>

				<?php 
				if($encuesta_grande){
					include( locate_template( 'template-parts/sections/section-encuesta.php', false, false ) ); 
				}else if($encuesta_pequena){
					?><div class="col-3"> <?php
					echo do_shortcode('[posts cantidad="3" offset="4"]'); // Con encuesta pequeña sin encuesta grande - offset 4 total: 7
					?></div> <?php 
				}else{
					?><div class="col-3"> <?php
					echo do_shortcode('[posts cantidad="3" offset="5"]'); // Sin encuestas offset 5 total: 8
					?></div> <?php 
				}
				?>
				
				<?php get_template_part('template-parts/sections/section', 'opinion') ?>
			</div><!-- content -->

		</div><!-- inner container -->
		<div class="outer-container">
			<?php echo get_field('grilla_home_4', 'option') ?>
			<?php get_template_part('template-parts/sections/section', 'placas') ?>
			<div class="col-3 order-2">
				<div class="ad-grilla">
					<?php echo get_field('grilla_home_2', 'option') ?>
				</div>
				<?php
				if ($encuesta_pequena && $encuesta_grande){
					echo do_shortcode('[posts cantidad="2" offset="4"]'); // Con encuesta grande y pequeña offset: 4 total: 6
				}else if($encuesta_pequena && !$encuesta_grande){ 
					echo do_shortcode('[posts cantidad="2" offset="7"]'); // Con encuesta pequeña sin encuesta grande - offset 7 total: 9
				}else if(!$encuesta_pequena && $encuesta_grande){
					echo do_shortcode('[posts cantidad="2" offset="5"]'); // Sin encuesta pequeña con encuesta grande - offset 5 total: 7
				}else {
					echo do_shortcode('[posts cantidad="2" offset="8"]'); // Sin encuestas - offset 8 total: 10
				}
				?>
			</div>
			<div class="col-3">
				<?php
				if ($encuesta_pequena && $encuesta_grande){
					echo do_shortcode('[posts cantidad="3" offset="6"]'); // Con encuesta grande y pequeña offset: 6 total: 9
				}else if($encuesta_pequena && !$encuesta_grande){ 
					echo do_shortcode('[posts cantidad="3" offset="9"]'); // Con encuesta pequeña sin encuesta grande - offset 9 total: 12 
				}else if(!$encuesta_pequena && $encuesta_grande){
					echo do_shortcode('[posts cantidad="3" offset="7"]'); // Sin encuesta pequeña con encuesta grande - offset 7 total: 10
				}else {
					echo do_shortcode('[posts cantidad="3" offset="10"]'); // Sin encuestas - offset 10 total: 13
				}
				?>
			</div>
			<div class="col-3 order-1">
				<div class="ad-grilla">
					<?php echo get_field('grilla_home_3', 'option') ?>
				</div>
				<?php
				if ($encuesta_pequena && $encuesta_grande){
					echo do_shortcode('[posts cantidad="2" offset="9"]'); // Con encuesta grande y pequeña offset: 9 total: 11
				}else if($encuesta_pequena && !$encuesta_grande){ 
					echo do_shortcode('[posts cantidad="2" offset="12"]'); // Con encuesta pequeña sin encuesta grande - offset 12 total: 14 
				}else if(!$encuesta_pequena && $encuesta_grande){
					echo do_shortcode('[posts cantidad="2" offset="10"]'); // Sin encuesta pequeña con encuesta grande - offset 10 total: 12
				}else {
					echo do_shortcode('[posts cantidad="2" offset="13"]'); // Sin encuestas - offset 13 total: 15
				}
				?>
			</div>
			<?php get_template_part('template-parts/sections/section', 'instagram') ?>
			<?php get_template_part('template-parts/sections/section', 'videos') ?>
		</div><!-- outer-container -->

	</main><!-- #main -->
</section><!-- #primary -->


<?php
get_footer();
