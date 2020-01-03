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
      <h3>Seguidos</h3>
      <p>Aquí se muestran las categorias y autores que estas siguiendo.</p>
    </div>
    <div class="listItems__hiddenTopics">

      <?php

      $followed_cats = get_user_meta( $user->ID, 'followed_cats', true );
      print_r($followed_cats) 
      foreach($followed_cats as $cat_id){

        $category = get_category( $cat_id );?>

          <div class="hiddenTopic">

            <h3><?php echo $category->name ?></h3>

            <button class="btn -accent unfollow-category" data-categoryid="<?php echo $category->term_id ?>" data-categoryname="<?php echo $category->name ?>">Dejar de ocultar</button>

          </div><!-- hiddenTopic -->
      <?php }

        $followed_authors = get_user_meta( $user->ID, 'followed_authors', true );
        print_r($followed_authors) 


       foreach($followed_authors as $author_id){

        $author = get_userdata( $author_id );?>

          <div class="hiddenTopic">

            <h3><?php echo $category->name ?></h3>

            <button class="btn -accent unfollow-author" data-categoryid="<?php echo $category->term_id ?>" data-categoryname="<?php echo $category->name ?>">Dejar de seguir</button>

          </div><!-- hiddenTopic -->
      <?php }
      
      ?>
    </div><!-- listItems__hiddenTopics -->
  </div><!-- listItems -->
</div><!-- content__container -->
