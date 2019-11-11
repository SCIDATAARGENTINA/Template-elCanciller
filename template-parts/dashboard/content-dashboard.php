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

    // Check if user has favoritos
    if(get_user_meta($user->ID, 'favoritos')){
      //Update favoritos con el nuevo fav
      $favoritos = get_user_meta($user->ID, 'favoritos');
      array_push($favoritos, '90240');
      update_user_meta($user->ID, 'favoritos', $favoritos);
    }else{
      // Crea el campo para el usuario en caso de no existir
      $favoritos = [];
      array_push($favoritos, '90240');
      add_user_meta($user->ID, 'favoritos', $favoritos);
    }
    echo $user->ID;
    print_r(get_user_meta($user->ID, 'favoritos'));
 ?>
</pre>
<p> Dashboard Content </p>
