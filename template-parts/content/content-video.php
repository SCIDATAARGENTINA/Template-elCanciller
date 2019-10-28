<?php
/**
 * Template part for video content
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

<div id="video-<?php echo $post->ID ?>" data-id="<?php echo $post->ID ?>" class="video popup-video" style="background-image: url('<?php echo $featured_img_url ?>');">
    <div class="player-icon">
        <img src="<?php bloginfo('url') ?>/wp-content/uploads/2019/07/videos-icon.svg" alt="El Canciller - Videos">
    </div><!-- player icon -->
</div><!-- video -->

<?php //get_template_part('template-parts/content/content', 'video_inside'); ?>