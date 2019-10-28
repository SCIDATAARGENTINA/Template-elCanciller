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

<div class="encuesta-section container">

    <div class="encuestas">
        <?php $args = array(
                        'posts_per_page' => 1,
                        'post_type' => 'encuesta',
                        'p' => get_field('encuesta_grande', '33064')
                    );
                    $query = new WP_Query( $args );
                    while( $query->have_posts() ) {
                        $query->the_post(); 

                        get_template_part('template-parts/content/content', 'encuesta');
                    }
                    // Restore original Post Data
                    wp_reset_postdata(); ?>
    </div><!-- end encuestas -->
    
</div><!-- end encuesta-section container -->