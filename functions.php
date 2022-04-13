<?php
function gt_bikes2ride_header_class( $classes = array() ) {
	$classes[] = 'site-header';	
	$classes[] = get_theme_mod( 'header_layout_type' );

	if ( get_theme_mod( 'header_transparent_layout' ) ) {
		$classes[] = 'transparent';
	}

	echo bikes2ride_get_container_classes( $classes, 'header' );
}

function gt_bikes2ride_content_class( $classes = array() ) {
	$classes[] = 'site-content';	
	echo bikes2ride_get_container_classes( $classes, 'content' );
}

/**
 * Подключение блоков
 */
include 'gt-inc/program_study.php';
include 'gt-inc/our_auto.php';