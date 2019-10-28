<?php
/**
 * Template part for displaying CANCILLER SECCION VIDEOS
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<div class="opinion-section container">
    <div class="opinion-banner">
        <img src="<?php bloginfo('url') ?>/wp-content/uploads/2019/07/opinion-banner-1.png" alt="Sección opinion - El Canciller revista online">
        <a href="<?php bloginfo('url') ?>/opinion">Todas las opiniones</a>
    </div><!-- opinion-banner -->

    <div class="opiniones">
        <?php $args = array(
                        'posts_per_page' => 2,
                        'post_type' => 'opinion'
                    );
                    $query = new WP_Query( $args );
                    while( $query->have_posts() ) {
                        $query->the_post(); 
                        
                        get_template_part('template-parts/content/content', 'opinion');
                    }
                    // Restore original Post Data
                    wp_reset_postdata(); ?> 
    </div><!-- end opiniones -->
    
</div><!-- end opinion-section container -->