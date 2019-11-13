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
<div class="content__container"> Dashboard Content </div>
