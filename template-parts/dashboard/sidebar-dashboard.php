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

<div class="sidebarContent">
    <div class="sidebar__avatar">
        <img src="<?php get_avatar_url( $user->ID ) ?>" alt="<?php echo $user->name?>">
    </div>
</div>
