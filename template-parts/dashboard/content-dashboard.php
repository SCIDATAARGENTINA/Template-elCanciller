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
<pre>

<?php  

    echo $user->ID;
    print_r(get_user_meta($user->ID, 'favoritos', true));

 ?>
</pre>
<div class="content__container"> 
  <div class="favorited">
    <div class="favorited__header">
      <h3>Favoritos</h3>
    </div>
    <div class="favorited__posts">

      <?php 
        $args = array(
          'post__in' => get_user_meta($user->ID, 'favoritos', true);
        );

        $fav_query = new WP_Query( $args );

        if($fav_query->have_posts()){

          while($fav_query->have_post()){
            $fav_query->the_post();

            the_title();

          }
        }
      
      ?>
    </div>
  </div>  
</div>
