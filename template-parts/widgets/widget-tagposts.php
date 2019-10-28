<?php
/**
 * Template part for displaying tagposts WIDGET
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
global $wp_query;
$postID = $wp_query->post->ID;

$tags = get_the_tags($postID);
$tag_principal = $tags[0];
if($tag_principal){
?>
<div class="tagposts-widget container">
    <div class="current-tag">
        <img src="<?php bloginfo('url') ?>/wp-content/uploads/2019/07/fire-amarillo.svg" alt="">
        <a href="<?php echo get_term_link( $tag_principal , 'post_tag' ) ?>">#<?php echo $tag_principal->name ?></a>
    </div><!-- tags-icon -->
    <ul class="tagposts-list">
       <?php $args = array(
                        'posts_per_page' => 3,
                        'tag_id' => $tag_principal->term_id
                    );
                    $query = new WP_Query( $args );
                    while( $query->have_posts() ) {
                        $query->the_post(); ?>

                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        
                    <?php }
                    // Restore original Post Data
                    wp_reset_postdata(); ?>
    </ul><!-- tag-list -->
</div><!-- end tagsrelated widget container -->
<?php } ?>