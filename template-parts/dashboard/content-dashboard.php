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
      <h3>Favoritos</h3>
    </div>
    <div class="favorited__posts">

    <pre>
      <?php  
          $favorited_posts = get_user_meta($user->ID, 'favoritos', true);
          //echo $user->ID;
          print_r($favorited_posts);
      ?>
    </pre>

    <?php 

    $args = array(
      'post__in' => $favorited_posts
    );

      $my_secondary_loop = new WP_Query($args);
      if( $my_secondary_loop->have_posts() ):
          while( $my_secondary_loop->have_posts() ): $my_secondary_loop->the_post();
            //The secondary loop
          endwhile;
      endif;
      wp_reset_postdata();
    
    ?>

    </div>
  </div>  
</div>
