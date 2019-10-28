<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link href="https://fonts.googleapis.com/css?family=Bree+Serif|Playfair+Display:400,400i,700,700i|Lato:300,400,400i,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<?php wp_head(); ?>

	<script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
	<meta name="keywords" content="noticias, información, periodismo, prensa, actualidad" >
	<meta name="description" content="Plataforma digital local enfocada al género periodístico de mayor impacto: la conversación. Servicios e información sobre la política, los negocios y el fútbol en tiempo real.">

	<script>
	/* ADMANAGER */

	var googletag = googletag || {};
  	googletag.cmd = googletag.cmd || [];
	googletag.cmd.push(function() {
		googletag.defineSlot('/21749555895/Home-Lateral-SeccionPostCreditos-250x250', [[250, 208], [200, 200], [250, 250], [330, 350]], 'div-gpt-ad-1543340613980-0').addService(googletag.pubads());
	googletag.pubads().enableSingleRequest();
	googletag.pubads().collapseEmptyDivs();
		googletag.enableServices();
	});
	</script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-78046796-17"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-78046796-17');
	</script>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="top-bar">
		<div class="container">
			<div class="mobile-logo">
				<div class="stories">
					<div class="stories-border"></div>
					<div class="stories-logo">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/icons/c-stories.svg" alt="El Canciller - Plataforma digital de actualidad y noticias.">
					</div>
				</div>
			</div>
			<div class="logo">
				<a href="<?php echo bloginfo('url') ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/brand-logo-w.svg" height="15" alt="El Canciller"></a>
			</div><!-- end logo -->
			<div class="user-bar">
				<div class="trending-bar">
					<a href="#"><i class="fas fa-bomb"></i></a>
					<a href="#"><i class="fas fa-star"></i></a>
				</div><!-- trending-bar -->
				<div class="current-user-avatar">
					<?php

					if ( is_user_logged_in() ) {
						$current_user = wp_get_current_user();
						if ( ($current_user instanceof WP_User) ) {
								echo get_avatar( $current_user->ID, 26 );
						}
					}

					 ?>
				</div><!-- avatar -->
				<div class="mobile-menu-toggle">
					<button class="hamburger hamburger--slider" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>
			</div><!-- user-bar -->
		</div><!-- container -->

		<div class="mobile-menu">
			<div class="mobile-menu-header">
				<div class="menu-logo">
					<a href="<?php echo bloginfo('url') ?>"><img src="<?php bloginfo('url') ?>/wp-content/uploads/2019/09/brand-logo-y.svg" height="15" alt="El Canciller"></a>
				</div><!-- end logo -->
				<div class="social-links">
					<a href="https://www.facebook.com/elcancillercom/" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-square"></i></a>
					<a href="https://twitter.com/elcancillercom" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter-square"></i></a>
					<a href="https://www.instagram.com/elcancillerlive/" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
					<a href="https://www.youtube.com/channel/UCd9aVDXf_SH8-TNHRWj0J0g" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube"></i></a>
				</div><!-- social-links -->
				<div class="tiempo">
					<div class="canva-tiempo">
						<canvas id="icon2" width="60" height="60"></canvas>
					</div><!-- canvia-tiempo -->
					<div class="info-tiempo">
						<span class="fech"><?php echo date_i18n('D j M Y'); ?></span>
					</div><!-- info-tiempo -->
				</div><!-- tiempo -->
			</div>
			<nav class="mobile-navigation" aria-label="<?php esc_attr_e( 'Primary', 'twentynineteen' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_class'     => 'mobile-header-menu',
						'depth'          => 1,
					)
				);
				?>
			</nav><!-- .mobile-navigation-->
		</div><!-- end menu-bar -->

	</div><!-- end top-bar -->

	<?php get_template_part('template-parts/header/search', 'bar') ?>

		<header id="masthead" >

			<div class="menu-bar container">
				<nav class="header-navigation" aria-label="<?php esc_attr_e( 'Primary', 'twentynineteen' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_class'     => 'header-menu',
							'depth'          => 1,
						)
					);
					?>
				</nav><!-- .header-navigation -->
				<div class="search">
					<?php get_search_form(); ?>
				</div>
			</div><!-- end menu-bar -->

		</header><!-- #masthead -->

	<div id="content" class="site-content">
