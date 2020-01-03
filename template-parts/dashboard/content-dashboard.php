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
  <div class="listItems">
    <div class="listItems__header">
      <h3>Las últimas notas que te gustaron</h3>
    </div>
    <div class="listItems__posts">

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

      <?php

      $followed_cats = get_user_meta( $user->ID, 'followed_cats', true );

      foreach($followed_cats as $cat){
        $term = get_term( $cat );
        $cat_color = get_field('color', $term->taxonomy . '_' . $term->term_id);
        if($cat_color == ''){
            $cat_color = '#e7d117';
        }
      ?>
      

    <div class="listItems">
      <div class="listItems__header" style="background-color: <?php echo $cat_color ?>;">
        <h3><?php echo $term->name; ?></h3>
      </div>
    <div class="listItems__posts">

      <?php

        $args = array(
        'category__in' => $cat,
        'posts_per_page' => 3
      );

      $followed_cats_loop = new WP_Query($args);
      if( $followed_cats_loop->have_posts() ):
          while( $followed_cats_loop->have_posts() ): $followed_cats_loop->the_post();
            get_template_part('template-parts/content/content');
          endwhile;
      endif;
      wp_reset_postdata();
      ?>

      </div>
        </div> 

      <?php
      }
      
      ?> 
</div>
