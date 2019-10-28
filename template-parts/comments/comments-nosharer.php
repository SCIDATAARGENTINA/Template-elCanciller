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
<div class="comentarios-noshare">
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
    <?php if($comments){  ?>

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
         <?php  } else{  ?>
        <div class="comentarios sin-comentarios">
            <div class="comentario">
                <span class="comment-text">
                  No hay comentarios
               </span>
            </div>
         <?php } ?>

         
      </div><!-- comentarios -->
   </div><!-- comment-container -->
</div><!-- comentarios-nosharer -->