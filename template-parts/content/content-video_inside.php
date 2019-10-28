<?php
/**
 * Template part for video content inside popup
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<?php 
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
$thumbnail_id = get_post_thumbnail_id($post->ID);
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
$categories = get_the_terms( $post->ID , array( 'categoria_videos') );
$term_link = get_term_link( $categories[0], array( 'categoria_videos') );
?>

<div id="video-popup-<?php echo $post->ID ?>" class="player-content">
    <div class="popup-content">
        <div class="videos-title">
            <div class="videos-pic">
                <a href="#"><img src="<?php bloginfo('url') ?>/wp-content/uploads/2019/07/videos-logo.svg" alt="El Canciller - Videos"></a>
            </div><!-- end videos-pic -->
            <div class="videos-data">
                <h4><a href="<?php echo $term_link ?>"><?php echo $categories[0]->name ?></a></h4>
                <h3><?php the_title(); ?></h3>
            </div><!-- end videos-data -->
        </div><!-- end videos-title -->
        <?php echo get_the_content(); ?>
    </div>
</div>