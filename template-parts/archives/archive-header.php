<?php
/**
 * Template part for displaying trending post in archive page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
$term = get_queried_object();
$args = array(
      'post_type' => array('post', 'opinion'),
      'posts_per_page' => 1,
      'orderby' => 'date',
      'order' => 'DESC',
      'tax_query' => array(
        array(
            'taxonomy' => $term->taxonomy,
            'field'    => 'term_id',
            'terms'    => $term->term_id,
            ),
        ),
      'meta_query' => array(
         array(
            'key' => 'trending',
            'value' => 'si',
            'compare' => '='
         )
      )
   );
$count_query = new WP_Query($args);
$count = $count_query->found_posts;
if ($count <= 0){
   $args = array(
      'post_type' => array('post', 'opinion'),
      'posts_per_page' => 1,
      'orderby' => 'date',
      'order' => 'DESC',
      'tax_query' => array(
        array(
            'taxonomy' => $term->taxonomy,
            'field'    => 'term_id',
            'terms'    => $term->term_id,
            ),
        )
   );

}
?>
   <?php
   
   $cat_color = get_field('color', $term->taxonomy . '_' . $term->term_id);
   if($cat_color == ''){
      $cat_color = '#e7d117';
   }
   $trending_post = new WP_Query($args);
   ?>

   <?php if ($trending_post->have_posts()) : ?>

      <?php while ($trending_post->have_posts()) : $trending_post->the_post() ?>

         <?php
         $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
         $thumbnail_id = get_post_thumbnail_id($post->ID);
         $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
         $categories = get_the_category($post->ID);
         $cat_link = get_term_link($categories[0]->term_id );
         ?>

         <header class="archive-header">
            <div class="archive-title" style="background: <?php echo $cat_color ?>">
               <div class="category">            
                  <h1><?php echo $term->name ?></h1>
                  <div class="follow-container">
                     <?php if( is_user_logged_in() && is_category() ){ ?>
                        <?php if( checkIfFollowed('category', $categories[0]->term_id)){  // Si es true es que sigue la categoria?>
                           <button data-type="category" data-id="<?php echo $categories[0]->term_id ?>" class="btn follow -isFollowed">Dejar de seguir</button>
                        <?php }else{ //Si es false no sigue la categoria?>
                           <button data-type="category" data-id="<?php echo $categories[0]->term_id ?>" class="btn follow">Seguir</button>
                        <?php } ?>
                     <?php } ?> 
                  </div>
               </div>
               <div class="title">
                  <img src="<?php bloginfo('url') ?>/wp-content/uploads/2019/07/fire-blanco.svg" alt="">
                  <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
               </div>
            </div>
            <div class="archive-image">
               <a href="<?php the_permalink(); ?>"><img class="destacada-img" src="<?php echo $featured_img_url ?>" alt="<?php echo $alt ?>"></a>
               <?php get_template_part('template-parts/comments/comments', 'sharer') ?>
            </div>
         </header>
         
      <?php endwhile ?>

   <?php else : ?>

      <header class="archive-header no-trending">
            <div class="archive-title" style="background: <?php echo $cat_color ?>">
               <div class="category">            
                  <h1><?php echo $term->name ?></h1>
               </div>
         </header>

   <?php endif; ?>
