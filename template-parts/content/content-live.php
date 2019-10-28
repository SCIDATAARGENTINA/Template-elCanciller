<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
$thumbnail_id = get_post_thumbnail_id($post->ID);
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
?>

<?php if(get_field('habilitado') != 'no'){ ?>
<article id="live-<?php the_ID(); ?>">
<p><?php the_field('codigo_embebido'); ?> </p>
</article><!-- #post-${ID} -->
<?php } ?>