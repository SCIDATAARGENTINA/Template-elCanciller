<?php
/**
 * Template part for displaying trending post in front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>
<div id="resultados"></div>
<script>
var d = new Date();
var dia = d.getDate();
if (dia > '26'){
   jQuery('#resultados').append('<div class=\"ad-long\"><div id=\"resultado\" style=\"width: 100% !important;\"><a href=\"\"><img src=\"http://drive.google.com/uc?export=view&id=1x22iuanDrkjQ9dy39e3q7CTYPlJ6mBS5" class=\"onlydesktop\" style=\"\"><img src=\"http://drive.google.com/uc?export=view&id=1iz5t3ipmjBm4q3JDbsSbzKdv24BJZFvm" class=\"onlymobile\" style=\"width: 300px;\"></a></div></div>');
   console.log(dia);
}
</script>
<div class="trending-post">
   <?php
   $args = array(
      'post_type' => array('post', 'opinion'),
      'posts_per_page' => 1,
      'orderby' => 'date',
      'order' => 'DESC',
      'meta_query' => array(
         array(
            'key' => 'trending',
            'value' => 'si',
            'compare' => '='
         )
      )
   );
   $trending_post = new WP_Query($args);
   ?>

   <?php if ($trending_post->have_posts()) : ?>

      <?php while ($trending_post->have_posts()) : $trending_post->the_post() ?>

      <?php get_template_part('template-parts/home/trending-front', 'content') ?>

      <?php endwhile ?>

   <?php endif ?>
</div>
<div class="ad-long">
 
   <div id="publicidadCABANota" style="width: 100% !important;">
       <a href="https://www.buenosaires.gob.ar/salud">
         <img src="http://elcanciller.com/wp-content/uploads/2019/10/CABAdesktop1.jpeg" class="onlydesktop" style="width: 728px;">
         <img src="http://elcanciller.com/wp-content/uploads/2019/10/CABAmobile1.jpeg" class="onlymobile" style="width: 300px;">
      </a>
   </div>

</div>
<!-- <div class="ad-long"><div id="dondeVoto" style="width: 100% !important;"><a href="https://elcanciller.com/donde-voto-padron-para-las-elecciones-nacionales-del-27-de-octubre/"><img src="https://elcanciller.com/wp-content/uploads/2019/10/donde-voto.jpeg" class="onlydesktop" style="width: 728px;"><img src="https://elcanciller.com/wp-content/uploads/2019/10/donde-voto-mobile.jpeg" class="onlymobile" style="width: 300px;"></a></div></div>-->