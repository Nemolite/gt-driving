<?php
/**
 * Cherry-testi hooks.
 *
 * @package bikes2ride
 */

// Customization cherry-testimonials pagination args.
add_filter( 'tm_testimonials_pagination_args', 'bikes2ride_tm_testimonials_pagination_args', 10, 2 );

// Add template to bikes2ridetestimonials templates list.
add_filter( 'tm_testimonials_templates_list', 'bikes2ride_add_template_to_tm_testimonials_templates_list' );

/**
 * Customization cherry-testimonials pagination args.
 *
 * @return array
 */
function bikes2ride_tm_testimonials_pagination_args( $pagination_args, $args ) {

	$pagination_args = array(
		'prev_text' => '<i class="linearicon linearicon-arrow-left"></i>',
		'next_text' => '<i class="linearicon linearicon-arrow-right"></i>',
	);

	return $pagination_args;
}

/**
 * Add template to bikes2ridetestimonials templates list.
 *
 * @param array $tmpl_list Templates list.
 *
 * @return array
 */
function bikes2ride_add_template_to_tm_testimonials_templates_list( $tmpl_list ) {
	$tmpl_list['default-without-icon.tmpl'] = 'default-without-icon.tmpl';

	return $tmpl_list;
}
