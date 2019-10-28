<?php
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
$thumbnail_id = get_post_thumbnail_id($post->ID);
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
$categories = get_the_category($post->ID);
$cat_link = get_term_link($categories[0]->term_id );
?>

<div class="titular">
    <div class="category">
        <a href="<?php echo $cat_link; ?>"><h3 class="category-name"><?php echo $categories[0]->name ?></h3></a>
        <span><img src="<?php bloginfo('url') ?>/wp-content/uploads/2019/07/fire-marron.svg" alt="El Canciller - Noticia destacada"></span>
    </div><!-- category -->
    <div class="titulo">
        <?php if(get_the_author_meta('ID') != 81 && get_field('show_author') == 'si'){ ?>
        <div class="post-author" >
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )) ?>">
            <span>Por: <?php echo get_the_author(); ?></span>
            </a>
        </div><!-- post-author -->
        <?php } ?>
        <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
    </div><!-- titulo -->
</div><!-- titular -->


<div class="entry">
<div class="entry-img">
    <div class="user-actions">
        <button class="shuffle">
            <i aria-hidden="true" class="fa fa-random" style="color: #b29f93;"></i>
        </button>
    </div>
    <a href="<?php the_permalink(); ?>"><img src="<?php echo $featured_img_url ?>" alt="<?php echo $alt ?>"></a>
</div>
<?php get_template_part('template-parts/comments/comments', 'sharer') ?>
</div>