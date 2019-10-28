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


$thumbnail_id = get_post_thumbnail_id($post->ID);
$featured_img = wp_get_attachment_image_src( $thumbnail_id, 'card-nota' );
$featured_img_url = $featured_img[0];
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
$post_id = $post->ID; // this is for any other custom taxonomy
$taxonomy = 'category'; // this is for default wordpress taxonomy
$terms = wp_get_post_terms( $post_id, $taxonomy );
$term = $terms[0];
$cat_color = get_field('color', $term->taxonomy . '_' . $term->term_id);
$show_author = '';
if(get_field('show_author') == 'si'){
	$show_author = 'show-author';
}

echo '<style>' . '.post-rendered.' . $term->slug . '::before{ background-color:' . $cat_color . ';}' .'</style>';

?>

<article id="post-<?php the_ID(); ?>" class="post-rendered <?php echo $term->slug ?> <?php echo $show_author ?>">
	<div class="rendered-img" style="background-image: url('<?php echo $featured_img_url ?>')">
		<div class="hovered">
			<div class="actions-container">
				<div class="action-links">
					<i class="fab fa-twitter" data-text="<?php the_title(); ?>" data-link="<?php the_permalink(); ?>"></i>
					<i class="fab fa-facebook-f" data-title="<?php the_title(); ?>" data-img="<?php echo $featured_img_url ?>" data-text="<?php echo get_the_excerpt(); ?>" data-link="<?php the_permalink(); ?>"></i>
					<a href="<?php the_permalink(); ?>"><i class="fas fa-sign-out-alt"></i></a>
					<i class="fas fa-heart like" data-id="<?php the_ID() ?>" data-count="<?php echo get_field('likes') ?>"></i>
				</div><!-- action-links -->
				<div class="slider-container">
					<div id="slider-<?php the_ID(); ?>" class="slider"></div>
				</div>
			</div><!-- actions-container -->
			<div class="post-data">
				<div class="post-title">
					<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
					<span class="time-ago"><?php echo time_ago() ?></span>
				</div>
			</div><!-- post-data -->
			<div class="post-category">
				<a href="<?php echo get_term_link($term); ?>"><h4><?php echo $term->name ?></h4></a>
			</div>
		</div><!-- hovered -->
		<div class="render-author" style="background-color: <?php echo $cat_color ?>">
			<span>Por: <?php echo get_the_author_meta( 'display_name' ) ?></span>
		</div><!-- render author -->
	</div><!-- rendered-img -->
	<?php get_template_part('template-parts/comments/comments', 'nosharer') ?>
</article><!-- #post-${ID} -->

