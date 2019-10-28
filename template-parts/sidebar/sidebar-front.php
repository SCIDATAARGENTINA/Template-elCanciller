<?php
/**
 * Template part for displaying sidebar front
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<div class="stories">
  <div class="stories-border"></div>
  <div class="stories-logo">
    <img src="<?php echo get_stylesheet_directory_uri() ?>/icons/c-stories.svg" alt="El Canciller - Plataforma digital de actualidad y noticias.">
  </div>
</div><!-- stories -->
<div class="social-links">
  <a href="https://www.facebook.com/elcancillercom/" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-square"></i></a>
  <a href="https://twitter.com/elcancillercom" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter-square"></i></a>
  <a href="https://www.instagram.com/elcancillerlive/" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
  <a href="https://www.youtube.com/channel/UCd9aVDXf_SH8-TNHRWj0J0g" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube"></i></a>
</div><!-- social-links -->
<div class="tiempo">
  <div class="canva-tiempo">
    <canvas id="icon1" width="60" height="60"></canvas>
  </div><!-- canvia-tiempo -->
  <div class="info-tiempo">
    <span class="fech"><?php echo date_i18n('D j M Y'); ?></span>
  </div><!-- info-tiempo -->
</div><!-- tiempo -->
<div class="widget">
  <?php get_template_part('template-parts/widgets/widget', 'cancilleram') ?>
</div>
<div class="widget chico">
<?php get_template_part('template-parts/widgets/widget', 'autores') ?>
</div>
<div class="widget">
  <?php get_template_part('template-parts/widgets/widget', 'instagram') ?>
</div>
<div class="widget ad-lateral-sidebar">

  <!-- /21749555895/Home-Lateral-Politica-234x60 (VACIA) -->
  <div id='div-gpt-ad-1557312301298-0'>
  
    <script>googletag.cmd.push(function() { googletag.display('div-gpt-ad-1557312301298-0'); });</script>
  
  </div>
</div>
<div class="widget">
  <?php get_template_part('template-parts/widgets/widget', 'twitter') ?>
</div>
<div class="widget widget-contador">
  <?php echo do_shortcode('[contador postid=48914]') ?> 
</div>