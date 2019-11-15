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

?>
<div class="content__container"> 
  <div class="favorited">
    <div class="favorited__header">
      <h3>Las últimas notas que te gustaron</h3>
    </div>
    <div class="favorited__posts">

      <?php 

      $favorited_posts = get_user_meta( $user->ID, 'favoritos' );
      print_r($favorited_posts);

      $args = array(
        'post_type' => array('post', 'opinion'),
        //'post__in' => $favorited_posts[0],
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

    </div>
  </div>
  <div class="followed">
    <div class="followed__header">
      <h3>Tus seguidos</h3>
    </div>
    <div class="followed__posts">

      <?php 

      $args = array(
        'post__in' => $followed_posts,
        'posts_per_page' => 3
      );

      $favorites_loop = new WP_Query($args);
      if( $favorites_loop->have_posts() ):
          while( $favorites_loop->have_posts() ): $favorites_loop->the_post();
            the_title();
          endwhile;
      endif;
      wp_reset_postdata();
      
      ?>

    </div>
  </div>  
</div>
