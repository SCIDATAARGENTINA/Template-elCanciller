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

<div class="sidebar__content">
    <div class="profile">
        <img src="<?php echo get_avatar_url( $user->ID ) ?>" alt="<?php echo $user->name?>">
        <div class="profile__user">
            <div class="profile__name">
                <p><?php echo $user->display_name?></p>
            </div>
            <div class="profile__actions">

            </div>
        </div>
    </div>
    <div class="sidebar__links">
        <nav>
            <ul>
                <li><a href="<?php bloginfo('url') ?>/dashboard/ver-mas-tarde">Ver más tarde</a></li>
                <li><a href="<?php bloginfo('url') ?>/dashboard/seguidos">Seguidos</a></li>
                <li><a href="<?php bloginfo('url') ?>/dashboard/favoritos">Favoritos</a></li>
                <li><a href="<?php bloginfo('url') ?>/dashboard/temas-ocultos">Temas Ocultos</a></li>
                <li><a class="-accent" href="#">Cerrar sesión</a></li>
            </ul>
        </nav>
    </div>
</div>
