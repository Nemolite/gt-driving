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
 * Подключение скриптов и стилей
 */
add_action( 'wp_enqueue_scripts', 'gt_include_scripts_and_style', 25 );
 
function gt_include_scripts_and_style() {
	wp_enqueue_script( 'myjquery', get_stylesheet_directory_uri() . '/scripts/jquery360.js', array(), '3.6.0',true );
	wp_enqueue_script( 'slickjs', get_stylesheet_directory_uri() . '/slick/slick.min.js', array(), '1.18.1',true );
	wp_enqueue_script( 'myscript', get_stylesheet_directory_uri() . '/scripts/script.js', array('myjquery'), '1.0.0',true );

	wp_enqueue_style( 'slickcss', get_stylesheet_directory_uri() . '/slick/slick.css' );
}

/**
 * Подключение блоков
 */
include 'gt-inc/program_study.php';
include 'gt-inc/our_auto.php';
include 'gt-inc/sertificat.php';
include 'gt-inc/bor.php';
include 'gt-inc/otziv.php';
include 'gt-inc/youtuber.php';
include 'gt-inc/proba.php';
include 'gt-inc/autos.php';

// Убираем распродажу товаров
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10, 3 );
// Убрать сортировку товаров
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );