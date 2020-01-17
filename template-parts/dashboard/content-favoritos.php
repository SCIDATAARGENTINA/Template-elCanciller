<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

$user = wp_get_current_user();
$favorited_posts = get_user_meta( $user->ID, 'favoritos', true );

?>
<div class="content__container"> 
  <div class="listItems">
    <?php if($favorited_posts){ ?>
    <div class="listItems__header -left">
      <h3>Favoritos</h3>
      <p>Las notas que más te gustaron.</p>
    </div>
    <div class="listItems__posts">

      <?php


      $args = array(
        'post_type' => array('post', 'opinion'),
        'post__in' => $favorited_posts,
        'posts_per_page' => 3
      );

      $favorites_loop = new WP_Query($args);
      if( $favorites_loop->have_posts() ):
          while( $favorites_loop->have_posts() ): $favorites_loop->the_post();
            get_template_part('template-parts/content/content');
          endwhile;
      endif;
      wp_reset_postdata();
      
      ?>

      

      
    </div><!-- listItems__hiddenTopics -->
  <?php }else{ ?>

    <div class="listItems__header -left">
      <h3>Favoritos</h3>
      <p>¿Todavía no le diste like a nuestras notas? Elegí la que más te guste y presiona el corazón para verla listada aquí.</p>
    </div>

  <?php } ?>
  </div><!-- listItems -->
</div><!-- content__container -->
