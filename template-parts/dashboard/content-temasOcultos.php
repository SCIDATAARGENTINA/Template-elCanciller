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
      <h3>Temas Ocultos</h3>
      <p>Los temas que decidiste ocultar se muestran acá, si querés que se vuelvan a mostrar, selecciona "Dejar de ocultar"</p>
    </div>
    <div class="listItems__hiddenTopics">
      <div class="hiddenTopics">


      <?php

      $hidden_cats = get_user_meta( $user->ID, 'hidden_cats', true );

      print_r($hidden_cats);

      foreach($hidden_cats as $cat_id){

        $category = get_category( $cat_id );?>

          <div class="hiddenTopic">

            <h3><?php echo $category->name ?></h3>

            <button class="btn unhide-category" data-categoryid="<?php echo $category->term_id ?>" data-categoryname="<?php echo $category->name ?>">Dejar de ocultar</button>

          </div><!-- hiddenTopic -->
      <?php }
      
      ?>
      </div><!-- hiddenTopics -->

    </div><!-- listItems__hiddenTopics -->
  </div><!-- listItems -->
</div><!-- content__container -->
