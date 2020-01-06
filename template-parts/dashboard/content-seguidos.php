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
$followed_cats = get_user_meta( $user->ID, 'followed_cats', true );
$followed_authors = get_user_meta( $user->ID, 'followed_authors', true );
?>
<div class="content__container"> 
  <div class="listItems">
    <?php if(!$followed_cats && !$followed_authors){ ?>

      <div class="listItems__header -left">
        <h3>Actualmente no estas siguiendo ninguna categoría o autor.</h3>
        <p>Para comenzar a seguir una categoría o autor, busca el que más te guste y selecciona "Seguir".</p>
      </div><!-- listItems__header -->
      <div class="listItems__hiddenTopics">
      
    <?php }else{ ?>
    <?php if($followed_cats){ ?>
    <div class="listItems__header -left">
      <h3>Categorías que sigues</h3>
      <p>Aquí se muestran las categorias que estas siguiendo.</p>
    </div><!-- listItems__header -->
    <div class="listItems__hiddenTopics">

      <?php


      foreach($followed_cats as $cat_id){

        $category = get_category( $cat_id );
        ?>
        

          <div class="hiddenTopic">

            <h3><a href="<?php echo get_term_link( $category ); ?>"><?php echo $category->name ?></a></h3>

            <button class="btn -accent -isFollowed unfollow" data-id="<?php echo $category->term_id ?>" data-type="category">Dejar de seguir</button>

          </div><!-- hiddenTopic -->
      <?php }
      
      ?>
    </div><!-- listItems__hiddenTopics -->
    <?php }else{ ?>
    <div class="listItems__header -left">
      <h3>Actualmente no sigues ninguna categoría</h3>
      <p>Para comenzar a seguir una categoría, busca la que más te guste y selecciona "Seguir".</p>
    </div><!-- listItems__header -->
    <?php } ?>
  </div><!-- listItems -->

  <div class="listItems -marginTop">
    <?php if($followed_authors){ ?>
    <div class="listItems__header -left">
      <h3>Autores que sigues</h3>
      <p>Aquí se muestran los autores que estas siguiendo.</p>
    </div>
    <div class="listItems__hiddenTopics">

      <?php

       foreach($followed_authors as $author_id){

        $author = get_userdata( $author_id );?>

          <div class="hiddenTopic">

            <h3><a href="<?php echo get_author_posts_url($author_id); ?>"><?php echo $author->display_name ?></a></h3>

            <button class="btn -accent -isFollowed unfollow" data-id="<?php echo $author->ID ?>" data-type="author">Dejar de seguir</button>

          </div><!-- hiddenTopic -->
      <?php }
      
      ?>
    </div><!-- listItems__hiddenTopics -->
    <?php }else{ ?>
    <div class="listItems__header -left">
      <h3>Actualmente no sigues ninguna autor</h3>
      <p>Para comenzar a seguir un autor, busca el que más te guste y selecciona "Seguir".</p>
    </div><!-- listItems__header -->
    <?php } ?>
    <?php } ?>
  </div><!-- listItems -->
</div><!-- content__container -->
