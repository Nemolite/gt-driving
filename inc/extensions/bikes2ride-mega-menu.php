<?php
/**
 * Extends basic functionality for better TM Mega Menu compatibility
 *
 * @package bikes2ride
 */

/**
 * Check if Mega Menu plugin is activated.
 *
 * @return bool
 */
function bikes2ride_is_mega_menu_active() {
	return class_exists( 'tm_mega_menu' );
}

add_filter( 'bikes2ride_theme_script_variables', 'bikes2ride_pass_mega_menu_vars' );

/**
 * Pass Mega Menu variables.
 *
 * @param  array  $vars Variables array.
 * @return array
 */
function bikes2ride_pass_mega_menu_vars( $vars = array() ) {

	if ( ! bikes2ride_is_mega_menu_active() ) {
		return $vars;
	}

	$vars['megaMenu'] = array(
		'isActive' => true,
		'location' => get_option( 'bikes2ridemega-menu-location' ),
	);

	return $vars;
}
