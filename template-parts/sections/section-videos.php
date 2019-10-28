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

<div class="videos-section container">

    <div class="videos-title-list">
        <div class="profile-data">
            <div class="videos-title">
                <div class="videos-pic">
                    <a href="#"><img src="<?php bloginfo('url') ?>/wp-content/uploads/2019/07/videos-logo.svg" alt="El CancillerVideos"></a>
                </div><!-- end videos-pic -->
                <div class="videos-data">
                    <h4><a href="#">Streaming</a></h4>
                    <a href="#"><p>elcancillercom/videos/</p></a>
                </div><!-- end videos-data -->
            </div><!-- end videos-title -->
            <div class="videos-list">
                 <?php $args = array(
                        'posts_per_page' => 3,
                        'post_type' => 'video'
                    );
                    query_posts($args);
                    while( have_posts() ) {
                        the_post();
                        ?>
                        
                        <div id="video-<?php echo $post->ID ?>" data-id="<?php echo $post->ID ?>" class="video-item popup-video">
                            <h3><?php the_title(); ?></h3>
                        </div>
                        
                    <?php }
                    // Restore original Post Data
                    wp_reset_postdata(); ?> 
            </div><!-- end videos-list -->
        </div><!-- end profile data -->
    </div><!-- videos-title-list -->

    <div class="videos-feed">
        <?php $args = array(
                        'posts_per_page' => 2,
                        'post_type' => 'video'
                    );
                    query_posts($args);
                    while( have_posts() ) {
                        the_post(); 
                        
                        get_template_part('template-parts/content/content', 'video');
                    }
                    // Restore original Post Data
                    wp_reset_postdata(); ?> 
    </div><!-- end videos-feed -->
    
</div><!-- end videos widget container -->