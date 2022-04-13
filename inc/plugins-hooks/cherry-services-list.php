<?php
/**
 * Cherry-services-list hooks.
 *
 * @package bikes2ride
 */

// Customization cherry-services-list plugin.
add_filter( 'cherry_services_list_meta_options_args', 'bikes2ride_change_services_list_icon_pack' );
add_filter( 'cherry_services_default_icon_format', 'bikes2ride_cherry_services_default_icon_format' );
add_filter( 'cherry_services_features_title_format', 'bikes2ride_cherry_services_features_title_format' );

add_filter( 'cherry_services_list_meta_options_args', 'bikes2ride_cherry_services_list_meta_options_args' );
add_filter( 'cherry_services_data_callbacks', 'bikes2ride_cherry_services_data_callbacks', 10, 2 );

// Add new services list template
add_filter( 'cherry_services_listing_templates_list', 'bikes2ride_cherry_services_listing_templates_list' );



/*
 *
 * Add new services list template
 *
 * */
function bikes2ride_cherry_services_listing_templates_list( $tmpl ) {

	$tmpl['media-thumb'] = 'media-thumb.tmpl';

	return $tmpl;
}

/**
 * Change cherry-services-list icon pack.
 */
function bikes2ride_change_services_list_icon_pack( $fields ) {

	$fields['fields']['cherry-services-icon']['icon_data'] = array(
		'icon_set'    => 'bikes2rideLinearIcons',
		'icon_css'    => BIKES2RIDE_THEME_URI . '/assets/css/linearicons.css',
		'icon_base'   => 'linearicon',
		'icon_prefix' => 'linearicon-',
		'icons'       => bikes2ride_get_linear_icons_set(),
	);

	return $fields;
}


/**
 * Change cherry-services-list icon format
 *
 * @return string
 */
function bikes2ride_cherry_services_default_icon_format( $icon_format ) {
	return '<i class="linearicon %s"></i>';
}

/**
 * Change cherry-services features title format.
 */
function bikes2ride_cherry_services_features_title_format( $title_format ) {
	return '<h5 class="service-features_title">%s</h5>';
}


/**
 * Add new post-meta field to cherry services.
 *
 */
function bikes2ride_cherry_services_list_meta_options_args( $args ) {

	$args['fields']['cherry-services-thumb'] = array(
			'type'               => 'media',
			'element'            => 'control',
			'parent'             => 'general',
			'multi_upload'       => false,
			'library_type'       => 'image',
			'upload_button_text' => esc_html__( 'Add thumbnails', 'bikes2ride' ),
			'label'              => esc_html__( 'Service thumbnails', 'bikes2ride' ),
			'sanitize_callback'  => 'esc_attr',
	);

	return $args;
}

/**
 * Add new macros %%THUMB%% to cherry services.
 */
function bikes2ride_cherry_services_data_callbacks( $data, $atts ) {

	$data['thumb'] = 'bikes2ride_get_service_thumb';

	return $data;
}

/**
 * Callback function to macros %%THUMB%%.
 */
function bikes2ride_get_service_thumb ( $args = array() ) {

	$callbacks = cherry_services_templater()->callbacks;
	$atts      = $callbacks->atts;

	if ( ! isset( $atts['show_media'] ) ) {
		return;
	}

	$atts['show_media'] = filter_var( $atts['show_media'], FILTER_VALIDATE_BOOLEAN );

	if ( true !== $atts['show_media'] ) {
		return;
	}

	global $post;
	$thumb = get_post_meta( $post->ID, 'cherry-services-thumb', true );

	if ( ! $thumb ) {
		return;
	}

	$format = apply_filters( 'bikes2ride_cherry_services_default_thumb_format', '<div class="service-thumb"><img src="%1$s" alt="%2$s" ></div>' );

	$args = wp_parse_args( $args, array(
			'wrap'   => 'div',
			'class'  => '',
			'base'   => 'thumb_wrap',
			'size'   => 'full',
			'format' => $format,
	) );

	$result = sprintf( $args['format'], wp_get_attachment_image_url( esc_attr( $thumb ), $args['size'] ), $callbacks->post_title() );

	return $callbacks->macros_wrap( $args, $result );
}

