<?php
/**
 * Template part for displaying comments with share links
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>
<div class="comentarios-sharer">
   <?php
   $comments = get_comments(
      array(
         'post_id' => $post->ID,
         'number' => 5,
      )
   );
   ?>
   <div class="comment-icon">
      <img src="<?php bloginfo('url') ?>/wp-content/uploads/2019/07/comment-bubble.svg" alt="El Canciller - Comentarios">
   </div>
   <div class="comment-container">
      <div class="comentarios">

         <?php foreach ($comments as $comment) : ?>

            <div class="comentario">
               <span class="comment-author">
                  <?php echo '@' . $comment->comment_author ?>
               </span>
               <span class="comment-text">
                  <?php echo substrwords($comment->comment_content , 30); ?>
               </span>
            </div>

         <?php endforeach; ?>
      </div><!-- comentarios -->
   </div><!-- comment-container -->
   <div class="share-container">
      <i class="fab fa-twitter" data-text="<?php the_title(); ?>" data-link="<?php the_permalink(); ?>"></i>
      <i class="fab fa-facebook-f" data-title="<?php the_title() ?>" data-img="<?php echo $featured_img_url ?>" data-text="<?php the_excerpt() ?>" data-link="<?php the_permalink() ?>"></i>
      <a href="<?php the_permalink(); ?>"><i class="fas fa-sign-in-alt"></i></a>
      <?php if ( is_user_logged_in() ){ ?>
         <i class="fas fa-heart like <?php echo checkIfLiked(get_the_ID()) ? 'liked' : '' ?>" data-id="<?php the_ID() ?>"></i>
         <?php }else{ ?>
         <i class="fas fa-heart like" data-id="<?php the_ID() ?>" ></i>
      <?php } ?>
   </div>

</div><!-- comentarios-sharer -->