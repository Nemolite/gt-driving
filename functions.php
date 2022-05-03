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

/**
 * Блог
 */

add_action('init', 'gt_blog');
function gt_blog(){
	$labels = array(
		'name'               => 'Блог', 
		'singular_name'      => 'Зпись в блог', 
		'add_new'            => 'Добавить запись',
		'add_new_item'       => 'Добавить запись в блог',
		'edit_item'          => 'Редактировать запись в блоге',
		'new_item'           => 'Новая запись в блог',
		'view_item'          => 'Посмотреть запись блога',
		'search_items'       => 'Найти запись блога',
		'not_found'          => 'Записи блога не найдено',
		'not_found_in_trash' => 'В корзине записи блога не найдено',
		'parent_item_colon'  => '',
		'menu_name'          => 'Блог'
	  );
	 
	  $args = array(
		'labels' => $labels,
		'public' => true, // 
		'show_ui' => true, 
		'has_archive' => true, 
		'menu_icon' => 'dashicons-media-document', 
		'menu_position' => 7, 
		'supports' => array( 'title', 'editor', 'thumbnail')
	);	
	register_post_type('gt_blog', $args  );
}

/**
 * Подключение option-tree
 */

require 'option-tree/ot-loader.php';
require 'gt-inc/option_tree/meta-boxes.php';
require 'gt-inc/option_tree/theme-options.php';

/**
 * Удаление значка распродажа в карточке товара
 */
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10, 3 );

/**
 * Helper
 */
function show($d){
	echo "<pre>";
	print_r($d);
	echo "</pre>";
}

/**
 * Добработка , добавление полного описания товара в табы
 */
add_filter( 'woocommerce_product_tabs', 'gt_remove_product_tabs', 98 );
function gt_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] );   
    return $tabs;
}
 
add_filter( 'woocommerce_product_tabs', 'gt_custom_description_tab', 98 );
function gt_custom_description_tab( $tabs ) {
    $tabs['description']['callback'] = 'gt_custom_description_tab_content';    
    return $tabs;
}
 
function gt_custom_description_tab_content() {
    global $product; 
    echo '<div class="description">';
    the_content();
    echo '</div>';
 
   
}

/**
 * Скрываем артикул товара в карточке
 */

function gt_remove_product_page_skus( $enabled ) {
    if ( ! is_admin() && is_product() ) {
        return false;
    }
 
    return $enabled;
}
add_filter( 'wc_product_sku_enabled', 'gt_remove_product_page_skus' );

/**
 * Отзывы
 */
add_action('init', 'gt_otziv_admin');
function gt_otziv_admin(){
	$labels = array(
		'name'               => 'Отзывы', 
		'singular_name'      => 'Зпись в отзыв', 
		'add_new'            => 'Добавить отзыв',
		'add_new_item'       => 'Добавить запись в отзыв (в заголовок вписать ФИО)',
		'edit_item'          => 'Редактировать запись в отзыве',
		'new_item'           => 'Новая запись в отзыв',
		'view_item'          => 'Посмотреть запись отзыва',
		'search_items'       => 'Найти запись отзыва',
		'not_found'          => 'Записи отзыва не найдено',
		'not_found_in_trash' => 'В корзине записи отзыва не найдено',
		'parent_item_colon'  => '',
		'menu_name'          => 'Отзывы'
	  );
	 
	  $args = array(
		'labels' => $labels,
		'public' => true, // 
		'show_ui' => true, 
		'has_archive' => true, 
		'menu_icon' => 'dashicons-media-text', 
		'menu_position' => 8, 
		'supports' => array( 'title', 'editor')
	);	
	register_post_type('gt_otziv', $args  );
}

/**
 * Правка меню
 */

function gt_main_menu() {

	wp_nav_menu( array(
		'menu'              => '', // ID, имя или ярлык меню
		'menu_class'        => 'menu', // класс элемента <ul>
		'menu_id'           => '', // id элемента <ul>
		'container'         => 'nav', // тег контейнера или false, если контейнер не нужен
		'container_class'   => 'main-navigation', // класс контейнера
		'container_id'      => 'site-navigation', // id контейнера
		'fallback_cb'       => 'wp_page_menu', // колбэк функция, если меню не существует
		'before'            => '', // текст (или HTML) перед <a
		'after'             => '', // текст после </a>
		'link_before'       => '', // текст перед текстом ссылки
		'link_after'        => '', // текст после текста ссылки
		'echo'              => true, // вывести или вернуть
		'depth'             => 0, // количество уровней вложенности
		'walker'            => '', // объект Walker
		'theme_location'    => '', // область меню
		'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'item_spacing'      => 'preserve',
	) );
}

/**
 * Исправление вывода категории
 */

function gt_content_wrap_class( $classes = array() ) {
	$classes[] = 'site-content_wrap';
	
	
	if ( function_exists( 'tm_pb_is_pagebuilder_used' ) ) {
		if ( ! tm_pb_is_pagebuilder_used( get_the_ID() ) || is_search() ) {
			$classes[] = 'container';
		}
	} else {
		// ID - номера страниц
		if (is_page(array(29,26,92,99,95,101,103,97 ))||is_product()) {
			$classes[] = 'container';
		} else {
			$classes[] = '';
		}
		
	}

	$classes = apply_filters( 'bikes2ride_content_wrap_classes', $classes );

	echo 'class="' . join( ' ', $classes ) . '"';
}