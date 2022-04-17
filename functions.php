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

	wp_enqueue_style( 'latofonyts', get_stylesheet_directory_uri() . '/fonts/lato/lato.css' );
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

/**
 * Соцсети в топ меню
 */

function gt_contact_block( $target = 'header' ) {
	$contact_block_visibility = get_theme_mod( $target . '_contact_block_visibility', bikes2ride_theme()->customizer->get_default( $target . '_contact_block_visibility' ) );

	if ( !$contact_block_visibility ) {
		return;
	}

	$contact_item_count = apply_filters( 'bikes2ride_contact_item_count', array(
		'header' => 3,
		'footer' => 3,
	) );

	$contact_info = array();

	for ( $i = 1; $i <= $contact_item_count[ $target ]; $i++ ) {
		$icon = get_theme_mod( $target . '_contact_icon_' . $i, bikes2ride_theme()->customizer->get_default( $target . '_contact_icon_' . $i ) );
		$label = get_theme_mod( $target . '_contact_label_' . $i, bikes2ride_theme()->customizer->get_default( $target . '_contact_label_' . $i ) );
		$value = get_theme_mod( $target . '_contact_text_' . $i, bikes2ride_theme()->customizer->get_default( $target . '_contact_text_' . $i ) );
		if ( !$icon && !$value && !$label ) {
			continue;
		}
		$contact_info [ 'item_' . $i ] = array(
			'icon'  => $icon,
			'label' => $label,
			'value' => $value,
		);
	}

	if ( !$contact_info ) {
		return;
	}

	$icon_format = apply_filters( 'bikes2ride_contact_block_icon_format', '<i class="contact-block__icon linearicon %1$s"></i>' );

	$html = '<div class="contact-block contact-block--' . $target . '"><div class="contact-block__inner">';

	foreach ( $contact_info as $key => $value ) {
		$icon = ($value['icon']) ? sprintf( $icon_format, $value['icon'] ) : '';
		$label = ($value['label']) ? sprintf( '<span class="contact-block__label">%1$s</span>', wp_unslash( $value['label'] ) ) : '';
		$text = ($value['value']) ? sprintf( '<span class="contact-block__text">%1$s</span>', wp_kses( wp_unslash( $value['value'] ), wp_kses_allowed_html( 'post' ) ) ) : '';
		$item_mod_class = ($value['icon']) ? 'contact-block__item--icon' : '';

		$html .= sprintf( '<div class="contact-block__item %1$s">%2$s<div class="contact-block__value-wrap">%3$s%4$s</div></div>', $item_mod_class, $icon, $label, $text );
	}

	$html .= '</div></div>';

	echo $html;
}