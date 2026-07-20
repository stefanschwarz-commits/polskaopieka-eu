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
	// Fonty self-hostowane (Fraunces + Poppins, SIL OFL 1.1) — bez Google Fonts.
	// Powód: RODO/prywatność (Google Fonts na żywo wysyła IP odwiedzającego do
	// Google) + wydajność. Pliki woff2 + @font-face w assets/fonts/.
	$psod2_fonts_css = get_template_directory() . '/assets/fonts/fonts.css';
	wp_enqueue_style(
		'psod2-fonts',
		get_template_directory_uri() . '/assets/fonts/fonts.css',
		array(),
		file_exists( $psod2_fonts_css ) ? filemtime( $psod2_fonts_css ) : PSOD2_VERSION
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
 * Szablon „Pismo A4" (page-stanowisko.php) to samodzielny dokument — wyłączamy
 * główny arkusz stylów i skrypty motywu, żeby nie kolidowały z layoutem A4.
 * Fonty (Poppins) zostają.
 */
function psod2_stanowisko_assets() {
	if ( is_page_template( 'page-stanowisko.php' ) ) {
		wp_dequeue_style( 'psod2-style' );
		wp_dequeue_script( 'psod2-script' );
		wp_dequeue_script( 'psod2-i18n' );
	}
}
add_action( 'wp_enqueue_scripts', 'psod2_stanowisko_assets', 100 );

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
 * Wyróżnienie wpisu aktualności — pole (checkbox) w edytorze.
 *
 * Wyróżnione wpisy (meta _psod_wyrozniony=1) pojawiają się na górze listy
 * /aktualnosci/ jako duże bloki (do 2). Redaktor zarządza tym w wp-adminie.
 */
function psod2_wyrozniony_metabox() {
	add_meta_box( 'psod2_wyrozniony', __( 'Wyróżnienie', 'psod2' ), 'psod2_wyrozniony_metabox_cb', 'aktualnosci', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'psod2_wyrozniony_metabox' );

function psod2_wyrozniony_metabox_cb( $post ) {
	wp_nonce_field( 'psod2_wyrozniony_save', 'psod2_wyrozniony_nonce' );
	$val = get_post_meta( $post->ID, '_psod_wyrozniony', true );
	echo '<label><input type="checkbox" name="psod2_wyrozniony" value="1" ' . checked( $val, '1', false ) . '> '
		. esc_html__( 'Pokaż jako wyróżniony na liście aktualności', 'psod2' ) . '</label>';
	echo '<p class="description">' . esc_html__( 'Wyróżnione wpisy pojawiają się na górze /aktualnosci/ (do 2 naraz).', 'psod2' ) . '</p>';
}

function psod2_wyrozniony_save( $post_id ) {
	if ( ! isset( $_POST['psod2_wyrozniony_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['psod2_wyrozniony_nonce'] ) ), 'psod2_wyrozniony_save' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	if ( isset( $_POST['psod2_wyrozniony'] ) ) {
		update_post_meta( $post_id, '_psod_wyrozniony', '1' );
	} else {
		delete_post_meta( $post_id, '_psod_wyrozniony' );
	}
}
add_action( 'save_post_aktualnosci', 'psod2_wyrozniony_save' );

/**
 * ID wyróżnionych wpisów aktualności (meta), najnowsze pierwsze.
 * Gdy żaden nie jest oznaczony — fallback: najnowszy wpis (jak dotychczas).
 *
 * @param int $limit maksymalna liczba wyróżnionych.
 * @return int[] lista ID.
 */
function psod2_featured_ids( $limit = 2 ) {
	$q = new WP_Query(
		array(
			'post_type'      => 'aktualnosci',
			'post_status'    => 'publish',
			'posts_per_page' => $limit,
			'meta_key'       => '_psod_wyrozniony',
			'meta_value'     => '1',
			'orderby'        => 'date',
			'order'          => 'DESC',
			'fields'         => 'ids',
			'no_found_rows'  => true,
		)
	);
	$ids = $q->posts;
	if ( empty( $ids ) ) {
		$q2 = new WP_Query(
			array(
				'post_type'      => 'aktualnosci',
				'post_status'    => 'publish',
				'posts_per_page' => 1,
				'orderby'        => 'date',
				'order'          => 'DESC',
				'fields'         => 'ids',
				'no_found_rows'  => true,
			)
		);
		$ids = $q2->posts;
	}
	return $ids;
}

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
 * Znaczniki Open Graph / Twitter Card dla pojedynczych wpisów aktualności.
 *
 * Na stagingu nie ma wtyczki SEO (Yoast/RankMath), a wariant 1B ma przyciski
 * udostępniania (LinkedIn/Facebook) — bez og:image podglądy byłyby puste.
 * Jeśli w przyszłości pojawi się Yoast, ta funkcja się wyłącza (guard poniżej),
 * żeby nie dublować znaczników.
 */
function psod2_og_tags() {
	if ( defined( 'WPSEO_VERSION' ) || ! is_singular( 'aktualnosci' ) ) {
		return;
	}
	$post_id = get_queried_object_id();
	$title   = get_the_title( $post_id );
	$excerpt = has_excerpt( $post_id )
		? get_the_excerpt( $post_id )
		: wp_trim_words( wp_strip_all_tags( get_post_field( 'post_content', $post_id ) ), 40 );
	$url = get_permalink( $post_id );

	printf( '<meta property="og:type" content="article">' . "\n" );
	printf( '<meta property="og:title" content="%s">' . "\n", esc_attr( $title ) );
	printf( '<meta property="og:description" content="%s">' . "\n", esc_attr( $excerpt ) );
	printf( '<meta property="og:url" content="%s">' . "\n", esc_url( $url ) );
	printf( '<meta property="og:site_name" content="%s">' . "\n", esc_attr( get_bloginfo( 'name' ) ) );

	if ( has_post_thumbnail( $post_id ) ) {
		$img = get_the_post_thumbnail_url( $post_id, 'large' );
		printf( '<meta property="og:image" content="%s">' . "\n", esc_url( $img ) );
		printf( '<meta name="twitter:card" content="summary_large_image">' . "\n" );
		printf( '<meta name="twitter:image" content="%s">' . "\n", esc_url( $img ) );
	} else {
		printf( '<meta name="twitter:card" content="summary">' . "\n" );
	}
	printf( '<meta name="twitter:title" content="%s">' . "\n", esc_attr( $title ) );
	printf( '<meta name="twitter:description" content="%s">' . "\n", esc_attr( $excerpt ) );
}
add_action( 'wp_head', 'psod2_og_tags', 5 );

// (Preconnect do Google Fonts usunięty — fonty są self-hostowane, patrz
// psod2_assets() + assets/fonts/. Zero połączeń do domen Google = zgodność RODO.)
