<?php
/**
 * Template part for opinion content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>
<?php 
$categories = get_the_terms( $post->ID , array( 'category' ));
$author_link = get_author_posts_url( get_the_author_meta('ID') );
$author_id = get_the_author_meta('ID');
$thumbnail_id = get_field('imagen_portada','user_'.$author_id);
$featured_img = wp_get_attachment_image_src($thumbnail_id, 'large');
$featured_img_url = $featured_img[0];
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

?>

<div id="opinion-<?php echo $post->ID ?>" class="opinion">
    <div class="opinion-container">
        <div class="imagen" style="background-image: url('<?php echo $featured_img_url ?>');">
            <div class="hovered">
                <div class="action-links">
                    <i class="fab fa-twitter" data-text="<?php the_title(); ?>" data-link="<?php the_permalink(); ?>"></i>
                    <i class="fab fa-facebook-f" data-title="<?php the_title() ?>" data-img="<?php echo $featured_img_url ?>" data-text="<?php the_excerpt() ?>" data-link="<?php the_permalink() ?>"></i>
                    <a href="<?php the_permalink(); ?>"><i class="fas fa-sign-out-alt"></i></a>
                    <i class="fas fa-heart like" data-id="<?php the_ID(); ?>" data-count="<?php the_field('likes') ?>" data-type="<?php echo get_post_type( $post->ID ); ?>"></i>
                </div><!-- action-links -->
            </div><!-- hovered -->
        </div>
        <div class="autor">
            <a href="<?php echo $author_link ?>">
            <p><?php the_author(); ?></p>
            </a>
        </div>
        <div class="titulo">
            <?php if ( is_user_logged_in() ){ ?>
            <div class="user-actions">
                <span class="hide-category" data-category="<?php echo $categories[0]->term_id ?>" ><i class="fas fa-eye-slash"></i></span>
            </div>
            <?php } ?>
            <a href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
            </a>
        </div>
    </div>
    <?php get_template_part('template-parts/comments/comments', 'nosharer') ?>
</div><!-- end opinion -->