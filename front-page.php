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
				<script>
jQuery( document ).ready(function() {
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
h = n.getHours();
minuto = n.getMinutes();
segundo = n.getSeconds();

fechaactual = Date.parse(y + "-" + m + "-" + d + " " + h + ":" + minuto + ":" + segundo);
fechainicio = Date.parse('2020-02-27 00:00:00');
fechafin = Date.parse('2020-02-28 00:00:00');
if (fechaactual > fechainicio && fechafin > fechaactual)
{
jQuery('#new').append('<img class=\"onlydesktop\" style=\"margin: 0 auto;padding-top: 2%;\" src=\"http://142.93.24.13/wp-content/uploads/2020/02/apertura-desktop.jpg\"><img class=\"onlymobile\" src=\"http://142.93.24.13/wp-content/uploads/2020/02/apertura-mobile.jpg\" class=\"onlymobile\" style=\"margin: 0 auto;padding-top: 2%;\">');
}
});
				</script>
				<div id="new"></div>
				<?php echo get_field('vertical_home_1', 'option') ?>
				<?php get_template_part('template-parts/home/trending', 'front') ?>
				<?php echo get_field('vertical_home_2', 'option') ?>
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
				<div class="cancilleram mobile container onlymobile">
				<!--<img class="am-logo" src="https://elcanciller.com/wp-content/uploads/2019/06/cancilleramlogo.svg">-->
					<div class="carr-nav mobile" ></div>
					<div class="carrousel" >
					<?php
				$args = array(
					'post_type' => 'cancilleram',
					'posts_per_page' => 10,
					'orderby' => 'date',
					'order' => 'ASC',
				);

				$trending_post = new WP_Query($args);
				?>

				<?php if ($trending_post->have_posts()) : ?>

					<?php while ($trending_post->have_posts()) : $trending_post->the_post() ?>

						<?php
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
						$thumbnail_id = get_post_thumbnail_id($post->ID);
						$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
						$get_author_id = get_the_author_meta('ID');
						$get_author_name = get_the_author_meta('display_name');
						$get_author_avatar = get_avatar_url($get_author_id, array('size' => 75));
						?>
						<div class="slick-item">
							<div class="data-container">
								<img src="<?php echo $featured_img_url ?> " alt="<?php echo $alt ?>">
								<h3><span><?php the_title(); ?>.</span> <?php echo get_the_content(); ?></h3>
							</div>
							<div class="author-container">
								<img src="<?php echo $get_author_avatar ?>" alt="<?php echo $get_author_name ?>">
								<span><?php echo $get_author_name ?></span>
							</div>
						</div><!-- slick-item -->

						<?php

						?>
						
					<?php endwhile ?>

				<?php endif ?>
				</div>
				<hr class="yellow-hr">
				<!-- Begin Mailchimp Signup Form -->
					<link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
					<style type="text/css">
						#mc_embed_signup{background:transparent; clear:left; font:14px Helvetica,Arial,sans-serif; width:100%;}
						#mc_embed_signup input.email {
								font-family: "Bree Serif";
								font-size: 13px;
								border: 0px;
								border-radius: 0px;
								color: #111;
								background-color: #fff;
								box-sizing: border-box;
								height: 32px;
								padding: 0px 0.4em;
								display: inline-block;
								margin: 0;
								width: 100%;
								vertical-align: top;
								text-align: left;
							}
							#mc_embed_signup input[type="submit"]{
								background: #e7d117 !important;
								border-radius: 0px;
								color: #111;
								font-size: 13px;
								width: 100%;
								padding: 0 8px;
								font-family: "Bree Serif";
							}
							#mc_embed_signup .clear{
								display: block;
							}
							#mc_embed_signup_scroll{
								display: flex;
							}
					</style>
					<div id="mc_embed_signup">
					<form action="https://elcanciller.us15.list-manage.com/subscribe/post?u=5b406821a12a44b764db5c9db&amp;id=58158a7c5f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
						<div id="mc_embed_signup_scroll">
						
						<input type="email" value="Ingresa tu mail" name="EMAIL" class="email" id="mce-EMAIL" placeholder="" required>
						<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_5b406821a12a44b764db5c9db_58158a7c5f" tabindex="-1" value="Texto"></div>
						<div class="clear"><input type="submit" value="Suscribirme" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
						</div>
					</form>
					</div>

					<!--End mc_embed_signup-->

				</div><!-- cancilleram mobile -->
				<?php get_template_part('template-parts/sections/section', 'opinion') ?>
			</div><!-- content -->

		</div><!-- inner container -->
		<div class="outer-container">
			<?php echo get_field('vertical_home_3', 'option') ?>
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
			<?php echo get_field('vertical_home_4', 'option') ?>

			<div class="widget ads onlymobile">
				<div class="ads__container">
					<?php echo get_field('sidebar_home_1', 'option'); ?>
				</div>
				<div class="ads__container">
					<?php echo get_field('sidebar_home_2', 'option'); ?>
				</div>
				<div class="ads__container">
					<?php echo get_field('sidebar_home_3', 'option'); ?>
				</div>
			</div><!-- end widget ads -->
			<?php //get_template_part('template-parts/sections/section', 'videos') ?>
		</div><!-- outer-container -->

	</main><!-- #main -->
</section><!-- #primary -->


<?php
get_footer();
