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

      $hidden_cats = get_user_meta( $user->ID, 'hidden_cats', true );

      print_r($hidden_cats);
      
      ?>

    </div>
  </div>
</div><!-- content__container -->
