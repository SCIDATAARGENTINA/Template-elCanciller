<?php
/**
 * Template part for displaying CANCILLER AM Widget
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<div class="cancilleram container">
    <div class="carr-nav"></div>
    <div class="carrousel">
     <?php
   $args = array(
      'post_type' => 'cancilleram',
      'posts_per_page' => 10,
      'orderby' => 'date',
      'order' => 'ASC',
   );

   $trending_post = new WP_Query($args);
   ?>

   <?php if ($trending_post->have_posts()) : ?>

      <?php while ($trending_post->have_posts()) : $trending_post->the_post() ?>

        <?php
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
        $get_author_id = get_the_author_meta('ID');
        $get_author_name = get_the_author_meta('display_name');
        $get_author_avatar = get_avatar_url($get_author_id, array('size' => 75));
        ?>
        <div class="slick-item">
            <div class="data-container">
                <img src="<?php echo $featured_img_url ?> " alt="<?php echo $alt ?>">
                <h3><span><?php the_title(); ?>.</span> <?php echo get_the_content(); ?></h3>
            </div>
            <div class="author-container">
                <img src="<?php echo $get_author_avatar ?>" alt="<?php echo $get_author_name ?>">
                <span><?php echo $get_author_name ?></span>
            </div>
        </div><!-- slick-item -->

        <?php

        ?>
         
      <?php endwhile ?>

   <?php endif ?>
   </div>
   <hr class="yellow-hr">
   <!-- Begin Mailchimp Signup Form -->
    <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        #mc_embed_signup{background:transparent; clear:left; font:14px Helvetica,Arial,sans-serif; width:100%;}
        #mc_embed_signup input.email {
                font-family: "Bree Serif";
                font-size: 13px;
                border: 0px;
                border-radius: 0px;
                color: #111;
                background-color: #fff;
                box-sizing: border-box;
                height: 32px;
                padding: 0px 0.4em;
                display: inline-block;
                margin: 0;
                width: 100%;
                vertical-align: top;
                text-align: left;
            }
            #mc_embed_signup input[type="submit"]{
                background: #e7d117 !important;
                border-radius: 0px;
                color: #111;
                font-size: 13px;
                width: 100%;
                padding: 0 8px;
                font-family: "Bree Serif";
            }
            #mc_embed_signup .clear{
                display: block;
            }
            #mc_embed_signup_scroll{
                display: flex;
            }
    </style>
    <div id="mc_embed_signup">
    <form action="https://elcanciller.us15.list-manage.com/subscribe/post?u=5b406821a12a44b764db5c9db&amp;id=58158a7c5f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">
        
        <input type="email" value="Ingresa tu mail" name="EMAIL" class="email" id="mce-EMAIL" placeholder="" required>
        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_5b406821a12a44b764db5c9db_58158a7c5f" tabindex="-1" value="Texto"></div>
        <div class="clear"><input type="submit" value="Suscribirme" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
        </div>
    </form>
    </div>

    <!--End mc_embed_signup-->

</div>