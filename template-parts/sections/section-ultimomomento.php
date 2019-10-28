<?php
/**
 * Template part for displaying CANCILLER SECCION VIDEOS
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
$thumbnail_id = get_post_thumbnail_id($post->ID);
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
?>

<div class="ultimomomento-section container" style="margin-bottom: 0px !important;">
<?php // Setup arguments.
    $args = array(
      'post_type' => 'ultimomomento',
      'posts_per_page' => 1,
  );
  
  $ultimomomentosection_query = new WP_Query( $args ); 

  if($ultimomomentosection_query->have_posts()){
    while($ultimomomentosection_query->have_posts()){
      $ultimomomentosection_query->the_post();

       if(get_field('habilitado') != 'no'){ ?>
        <!-- <div class="titular" style="background-color:#000;text-align:center;">
            <h2 style="color:#fff;margin-top: 0%;padding: 2% 0% 2% 0%;"></h2>
         </div>-->

         <div class="trending-post">
          <div class="titular" style="padding: 5px;">
              <a href='"<?php the_field('url_embebido') ?>"' style="text-align: center;clear: both;"><h2 style="font-size:1em;"><?php the_field('texto_embebido') ?></h2></a>
          </div>
        </div>

        <?php }

    }
  }
?>
</div><!-- end opinion-section container -->