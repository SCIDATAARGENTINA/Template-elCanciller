<?php
/**
 * Template part for displaying INSTAGRAM FEED WIDGET
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<div class="instagram-widget container">
    <div class="instagram-profile">
        <div class="instagram-pic">
            <a href="https://www.instagram.com/elcancillerlive/"><img src="<?php bloginfo('url') ?>/wp-content/uploads/2019/06/cancillerlivelogo2.svg" alt="El Canciller Live"></a>
        </div>
        <div class="instagram-data">
            <h4><a href="https://www.instagram.com/elcancillerlive/">@elcancillerlive</a></h4>
            <hr>
            <p>El Canciller Live</p>
            <span><i class="far fa-envelope"></i>ms@elcanciller.com</span>
        </div>
    </div><!-- end instagram profile -->
    <div class="feed"><?php echo do_shortcode('[instagram-feed]'); ?></div>
</div><!-- end instagram widget container -->
<hr class="yellow-hr">