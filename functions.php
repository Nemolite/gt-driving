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
 * Подключение скриптов
 */
add_action( 'wp_enqueue_scripts', 'true_include_myscript', 25 );
 
function true_include_myscript() {
	wp_enqueue_script( 'myscript', get_stylesheet_directory_uri() . '/scripts/script.js', array(), '1.0.0',true );
}


/**
 * Подключение блоков
 */
include 'gt-inc/program_study.php';
include 'gt-inc/our_auto.php';
include 'gt-inc/sertificat.php';