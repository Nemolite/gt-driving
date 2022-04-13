<?php
/**
 * Tm-mega-menu hooks.
 *
 * @package bikes2ride
 */

// Mega menu mobile data.
add_filter( 'tm_mega_menu_mobile_button', '__return_true' );

// Disable mega menu plugin when style-3 or style-7 header layout.
add_filter( 'wp_nav_menu_args', 'bikes2ride_disable_mega_menu', 1000 );

// Add animation option to bikes2ridemega-menu.
add_filter( 'tm_mega_menu_options', 'bikes2ride_add_animation_mega_menu_option' );

/**
 * Disable mega menu plugin when style-3 or style-7 header layout
 *
 * @param $args
 *
 * @return mixed
 */

function bikes2ride_disable_mega_menu( $args ) {
	$header_layout_type = get_theme_mod( 'header_layout_type', bikes2ride_theme()->customizer->get_default( 'header_layout_type' ) );

	if ( has_nav_menu( 'main' ) && ( 'style-3' === $header_layout_type || 'style-7' === $header_layout_type ) ) {
		$args['walker'] = '';
	}

	return $args;
}

/**
 * Add animation option to bikes2ridemega-menu.
 *
 * @param array $menu_options Mega menu options.
 *
 * @return array
 */
function bikes2ride_add_animation_mega_menu_option( $menu_options ) {

	$menu_options['bikes2ridemega-menu-effect']['callback_args']['options']['slide-bottom'] = esc_html__( 'Slide from bottom', 'bikes2ride' );

	return $menu_options;
}
