<?php
/**
 * Template part for single post navigation.
 *
 * @package bikes2ride
 */

if ( ! get_theme_mod( 'single_post_navigation', bikes2ride_theme()->customizer->get_default( 'single_post_navigation' ) ) ) {
	return;
}

the_post_navigation();
