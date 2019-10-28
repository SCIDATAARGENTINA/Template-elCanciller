<?php
/**
 * Template part for displaying tagsrelated WIDGET
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
global $wp_query;
$postID = $wp_query->post->ID;

$categories = get_the_category($postID);
$cat_principal = $categories[0];

$related_tags = get_tags_in_use($cat_principal->term_id, 'id');

?>
<div class="tagsrelated-widget container">
    <div class="tags-icon">
        <i class="fas fa-hashtag"></i>
    </div><!-- tags-icon -->
    <ul class="tag-list">
        <?php 
            $args = array(
                'taxonomy'               => 'post_tag',
                'orderby'                => 'count',
                'order'                  => 'DESC',
                'hide_empty'             => true,
                'post__in' => $related_tags
            );
            $i = 0;
            $the_query = new WP_Term_Query($args);
            foreach($the_query->get_terms() as $term){ 
                if($i <= 15){
            ?>
            
                <li><a href="<?php echo get_term_link( $term ) ?>">#<?php echo $term->name; ?></a></li>

            <?php
                }
            $i++;
            }
            ?>
    </ul><!-- tag-list -->
</div><!-- end tagsrelated widget container -->