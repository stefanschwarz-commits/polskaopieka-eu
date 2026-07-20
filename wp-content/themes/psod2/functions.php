<?php
/**
 * PSOD 2026 — functions and definitions
 *
 * Nowy motyw strony polskaopieka.eu (redesign). Etap: szkielet + strona główna
 * (treść na razie statyczna, docelowo edytowalna przez pola ACF).
 *
 * @package PSOD2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Brak bezpośredniego dostępu.
}

if ( ! defined( 'PSOD2_VERSION' ) ) {
	define( 'PSOD2_VERSION', '0.1.0' );
}

/**
 * Podstawowa konfiguracja motywu.
 */
function psod2_setup() {
	load_theme_textdomain( 'psod2', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support( 'responsive-embeds' );

	register_nav_menus(
		array(
			'primary' => __( 'Menu główne', 'psod2' ),
			'footer'  => __( 'Menu w stopce', 'psod2' ),
		)
	);
}
add_action( 'after_setup_theme', 'psod2_setup' );

/**
 * Wczytanie stylów i skryptów.
 *
 * Fonty: Fraunces (serif) + Poppins (sans) z Google Fonts — zgodnie z projektem.
 * TODO (RODO/wydajność): rozważyć self-hosting fontów zamiast Google Fonts.
 */
function psod2_assets() {
	// Google Fonts.
	wp_enqueue_style(
		'psod2-fonts',
		'https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;0,9..144,500;1,9..144,300;1,9..144,400&family=Poppins:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	// Główny arkusz stylów motywu (zawiera tokeny + cały layout).
	// Wersjonowanie po dacie modyfikacji pliku (nie stałej), zeby cache
	// przegladarki/serwera samo sie uniewazialo przy kazdej zmianie CSS/JS
	// w trakcie prac nad motywem - bez recznego podbijania numerku.
	wp_enqueue_style(
		'psod2-style',
		get_stylesheet_uri(),
		array( 'psod2-fonts' ),
		file_exists( get_stylesheet_directory() . '/style.css' ) ? filemtime( get_stylesheet_directory() . '/style.css' ) : PSOD2_VERSION
	);

	// Silnik i18n (PL/DE/EN) — wczytywany przed psod.js, który z niego korzysta
	// (tłumaczenie treści budowanych w JS: Filary, Prawda czy mit?).
	$psod2_i18n_path = get_template_directory() . '/js/i18n.js';
	wp_enqueue_script(
		'psod2-i18n',
		get_template_directory_uri() . '/js/i18n.js',
		array(),
		file_exists( $psod2_i18n_path ) ? filemtime( $psod2_i18n_path ) : PSOD2_VERSION,
		true
	);

	// Interakcje (suwak demograficzny, zakładki filarów, gra „mity”, FAQ, menu, i18n DOM).
	$psod2_js_path = get_template_directory() . '/js/psod.js';
	wp_enqueue_script(
		'psod2-script',
		get_template_directory_uri() . '/js/psod.js',
		array( 'psod2-i18n' ),
		file_exists( $psod2_js_path ) ? filemtime( $psod2_js_path ) : PSOD2_VERSION,
		true
	);

	// Ścieżka bazowa do assetów dla JS (ikony filarów ładowane dynamicznie).
	wp_add_inline_script(
		'psod2-script',
		'var PSOD_ASSETS=' . wp_json_encode( get_template_directory_uri() . '/assets' ) . ';',
		'before'
	);

	// Centrum wiedzy — spory, samodzielny skrypt (fetch + render 47 pytań),
	// wczytywany tylko na tej jednej podstronie, nie globalnie.
	if ( is_page_template( 'page-centrum-wiedzy.php' ) ) {
		$psod2_kb_path = get_template_directory() . '/js/centrum-wiedzy.js';
		wp_enqueue_script(
			'psod2-centrum-wiedzy',
			get_template_directory_uri() . '/js/centrum-wiedzy.js',
			array( 'psod2-i18n' ),
			file_exists( $psod2_kb_path ) ? filemtime( $psod2_kb_path ) : PSOD2_VERSION,
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'psod2_assets' );

/**
 * Rejestracja custom post type „Aktualności" (klucz: aktualnosci).
 *
 * Odwzorowuje CPT z produkcji polskaopieka.eu: URL-e /aktualnosci/{slug}/,
 * archiwum pod /aktualnosci/. Dzięki temu redaktor zarządza wpisami w wp-adminie
 * (menu „Aktualności"), a motyw renderuje je przez archive-aktualnosci.php
 * (lista) i single-aktualnosci.php (pojedynczy wpis).
 *
 * UWAGA: po zmianie rejestracji CPT trzeba raz przeładować reguły przepisań
 * (flush_rewrite_rules) — robione jednorazowo skryptem wdrożeniowym, nie na init.
 */
function psod2_register_aktualnosci() {
	$labels = array(
		'name'               => __( 'Aktualności', 'psod2' ),
		'singular_name'      => __( 'Aktualność', 'psod2' ),
		'menu_name'          => __( 'Aktualności', 'psod2' ),
		'add_new'            => __( 'Dodaj nową', 'psod2' ),
		'add_new_item'       => __( 'Dodaj nową aktualność', 'psod2' ),
		'edit_item'          => __( 'Edytuj aktualność', 'psod2' ),
		'new_item'           => __( 'Nowa aktualność', 'psod2' ),
		'view_item'          => __( 'Zobacz aktualność', 'psod2' ),
		'search_items'       => __( 'Szukaj aktualności', 'psod2' ),
		'not_found'          => __( 'Nie znaleziono aktualności', 'psod2' ),
		'all_items'          => __( 'Wszystkie aktualności', 'psod2' ),
	);

	register_post_type(
		'aktualnosci',
		array(
			'labels'       => $labels,
			'public'       => true,
			'has_archive'  => true,
			'menu_icon'    => 'dashicons-megaphone',
			'menu_position' => 5,
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
			'rewrite'      => array(
				'slug'       => 'aktualnosci',
				'with_front' => false,
			),
			'show_in_rest' => true,
		)
	);
}
add_action( 'init', 'psod2_register_aktualnosci' );

/**
 * Data po polsku w dopełniaczu, np. „16 lipca 2026".
 *
 * WordPress get_the_date('j F Y') przy polskiej lokalizacji potrafi zwrócić
 * mianownik („16 lipiec"); tu wymuszamy dopełniacz zgodny z projektem makiet.
 *
 * @param int|WP_Post|null $post ID lub obiekt wpisu (domyślnie bieżący).
 * @return string
 */
function psod2_polish_date( $post = null ) {
	$ts = get_post_time( 'U', false, $post );
	if ( ! $ts ) {
		return '';
	}
	$months = array(
		1 => 'stycznia', 2 => 'lutego', 3 => 'marca', 4 => 'kwietnia',
		5 => 'maja', 6 => 'czerwca', 7 => 'lipca', 8 => 'sierpnia',
		9 => 'września', 10 => 'października', 11 => 'listopada', 12 => 'grudnia',
	);
	$d = (int) wp_date( 'j', $ts );
	$m = (int) wp_date( 'n', $ts );
	$y = wp_date( 'Y', $ts );
	return $d . ' ' . $months[ $m ] . ' ' . $y;
}

/**
 * Preconnect do Google Fonts (drobna optymalizacja ładowania fontów).
 */
function psod2_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array( 'href' => 'https://fonts.googleapis.com' );
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'psod2_resource_hints', 10, 2 );
