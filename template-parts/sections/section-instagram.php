<?php
/**
 * Template part for displaying CANCILLER AM SECCION INSTAGRAM
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<div class="instagram-section container">
    <div class="profile-data">
        <div class="instagram-profile">
            <div class="instagram-pic">
                <a href="https://www.instagram.com/elcancillerlive/"><img src="<?php bloginfo('url') ?>/wp-content/uploads/2019/06/cancillerlivelogo2.svg" alt="El Canciller Live"></a>
            </div><!-- end profile pic -->
            <div class="instagram-data">
                <h4><a href="https://www.instagram.com/elcancillerlive/">@elcancillerlive</a></h4>
                <hr>
                <p>El Canciller Live</p>
                <span><i class="far fa-envelope"></i>ms@elcanciller.com</span>
            </div><!-- end data -->
        </div><!-- end instagram profile -->
        <div class="instagram-logo">
            <a href="https://www.instagram.com/elcancillerlive/"><img src="<?php bloginfo('url') ?>/wp-content/uploads/2019/07/instagram-section-logo.png " alt="Instagram - El Canciller Live"></a>
        </div><!-- end logo -->
    </div><!-- end profile data -->
    <div class="feed"><?php echo do_shortcode('[instagram-feed]'); ?></div>
</div><!-- end instagram widget container -->