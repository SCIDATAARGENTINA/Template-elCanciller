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
$author = get_queried_object();
$author_id = $author->ID;
$thumbnail_id = get_field('imagen_portada','user_'.$author_id);
$featured_img = wp_get_attachment_image_src($thumbnail_id, 'full');
$featured_img_url = $featured_img[0];
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
?>

   <header class="author-header">
      <div class="author-name">
         <h1>
            Por: <?php echo get_the_author_meta( 'display_name', $author_id ) ?>
         </h1>
      </div>
      <img src="<?php echo $featured_img_url ?>" alt="<?php echo $alt?>">
   </header>
         
