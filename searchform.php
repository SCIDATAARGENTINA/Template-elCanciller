<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="search-input">
		<span class="screen-reader-text"><?php echo _x( 'Buscar en El Canciller...', 'label', 'elcanciller' ); ?></span>
	</label>
	<input type="search" id="search-input" class="search-field" placeholder="Buscar en El Canciller..." value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"></button>
</form>