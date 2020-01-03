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
    <div class="listItems__header -left">
      <h3>Categorías que sigues</h3>
      <p>Aquí se muestran las categorias que estas siguiendo.</p>
    </div>
    <div class="listItems__hiddenTopics">

      <?php

      $followed_cats = get_user_meta( $user->ID, 'followed_cats', true );
      foreach($followed_cats as $cat_id){

        $category = get_category( $cat_id );
        print_r($category);
        ?>
        

          <div class="hiddenTopic">

            <h3><?php echo $category->name ?></h3>

            <button class="btn -accent -isFollowed unfollow" data-id="<?php echo $category->term_id ?>" data-type="category">Dejar de seguir</button>

          </div><!-- hiddenTopic -->
      <?php }
      
      ?>
    </div><!-- listItems__hiddenTopics -->
  </div><!-- listItems -->

  <div class="listItems">
    <div class="listItems__header -left">
      <h3>Autores que sigues</h3>
      <p>Aquí se muestran los autores que estas siguiendo.</p>
    </div>
    <div class="listItems__hiddenTopics">

      <?php

        $followed_authors = get_user_meta( $user->ID, 'followed_authors', true );

       foreach($followed_authors as $author_id){

        $author = get_userdata( $author_id );?>

          <div class="hiddenTopic">

            <h3><?php echo $author->display_name ?></h3>

            <button class="btn -accent -isFollowed unfollow" data-id="<?php echo $author->ID ?>" data-type="author">Dejar de seguir</button>

          </div><!-- hiddenTopic -->
      <?php }
      
      ?>
    </div><!-- listItems__hiddenTopics -->
  </div><!-- listItems -->
</div><!-- content__container -->
