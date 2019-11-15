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

      $favorited_posts = get_user_meta( $user->ID, 'favoritos', true );

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

    </div>
  </div>
  <div class="followedCategories">
    <div class="followedCategories__header">
      <h3>Lo último de tus categorias preferidas</h3>
    </div>
    <div class="followedCategories__posts">

      <?php

      $followed_cats = get_user_meta( $user->ID, 'followed_cats', true );

      $args = array(
        'category__in' => $followed_cats,
        'posts_per_page' => 3
      );

      $followed_cats_loop = new WP_Query($args);
      if( $followed_cats_loop->have_posts() ):
          while( $followed_cats_loop->have_posts() ): $followed_cats_loop->the_post();
            the_title();
            the_category();
          endwhile;
      endif;
      wp_reset_postdata();
      
      ?>

    </div>
  </div>  
</div>
