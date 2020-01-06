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
$watch_later = get_user_meta( $user->ID, 'watch_later', true );

?>
<div class="content__container"> 
  <div class="listItems">
    <?php if($watch_later){ ?>
    <div class="listItems__header -left">
      <h3>Ver más tarde</h3>
      <p>Todos las notas que guardaste para ver más tarde se muestran acá.</p>
    </div>
    <div class="listItems__hiddenTopics">

      <?php


        $args = array(
          'post_type' => array('post', 'opinion'),
          'post__in' => $watch_later,
          'posts_per_page' => -1
        );

        $watch_later_loop = new WP_Query($args);
        if( $watch_later_loop->have_posts() ):
            while( $watch_later_loop->have_posts() ): $watch_later_loop->the_post();
              get_template_part('template-parts/content/content');
            endwhile;
        endif;
        wp_reset_postdata();
      ?>

      

      
    </div><!-- listItems__hiddenTopics -->
  <?php }else{ ?>

    <div class="listItems__header -left">
      <h3>Ver más tarde</h3>
      <p>No agregaste ninguna nota para ver más tarde, para agregar una, selecciona el simbolo "+" en la nota que quieras guardar.</p>
    </div>

  <?php } ?>
  </div><!-- listItems -->
</div><!-- content__container -->
