<?php
/**
 * Template part for stories
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
$thumbnail_id = get_field('imagen');
$featured_img = wp_get_attachment_image_src( $thumbnail_id, 'historia' );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
?>

<article id="historia-<?php the_ID(); ?>" class="historia">

    <h3><?php the_title(); ?></h3>
    <img src="<?php echo $featured_img[0] ?>" alt="<?php echo $alt ?>">

    <?php if(get_field('link')){ ?>
        <a class="historia-link" href="<?php echo get_field('link') ?>">Ver más</a>
    <?php } ?>

</article><!-- #historia-<?php the_ID(); ?> -->
