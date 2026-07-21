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
 * URL do kotwicy sekcji strony głównej (Wyzwania, Priorytety, Działalność, Apel,
 * Publikacje, Q&A) — używane w menu głównym i stopce, widocznych na KAŻDEJ
 * podstronie. Na stronie głównej: czysta kotwica „#id" (płynny scroll obsługuje
 * psod.js, sekcja 0b). Na pozostałych podstronach: „/#id" — bo tych sekcji tam
 * nie ma (są tylko na home), więc trzeba najpierw wrócić na stronę główną.
 *
 * @param string $id ID sekcji (bez „#").
 * @return string
 */
function psod2_anchor_url( $id ) {
	return is_front_page() ? '#' . $id : home_url( '/#' . $id );
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
 * Fonty: Fraunces (serif) + Poppins (sans) — self-hostowane (@font-face, SIL OFL),
 * bez Google Fonts (RODO/prywatność + wydajność). Pliki woff2 w assets/fonts/.
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
	if ( is_page( 'centrum-wiedzy' ) ) {
		$psod2_kb_path = get_template_directory() . '/js/centrum-wiedzy.js';
		wp_enqueue_script(
			'psod2-centrum-wiedzy',
			get_template_directory_uri() . '/js/centrum-wiedzy.js',
			array( 'psod2-i18n' ),
			file_exists( $psod2_kb_path ) ? filemtime( $psod2_kb_path ) : PSOD2_VERSION,
			true
		);
	}

	// Kontakt — walidacja + wysyłka formularza przez admin-ajax.php, tylko na
	// tej podstronie. Nonce chroni akcję psod2_kontakt_send (patrz niżej).
	if ( is_page( 'kontakt' ) ) {
		$psod2_kontakt_path = get_template_directory() . '/js/kontakt.js';
		wp_enqueue_script(
			'psod2-kontakt',
			get_template_directory_uri() . '/js/kontakt.js',
			array(),
			file_exists( $psod2_kontakt_path ) ? filemtime( $psod2_kontakt_path ) : PSOD2_VERSION,
			true
		);
		wp_localize_script(
			'psod2-kontakt',
			'PSOD_KONTAKT',
			array(
				'ajaxUrl' => admin_url( 'admin-ajax.php' ),
				'nonce'   => wp_create_nonce( 'psod2_kontakt_nonce' ),
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'psod2_assets' );

/**
 * Obsługa formularza kontaktowego (/kontakt/) — wysyła e-mail przez wp_mail().
 *
 * Natywna implementacja bez wtyczek (na stagingu nie ma Contact Form 7 ani
 * żadnej wtyczki SMTP). Bezpieczeństwo: nonce, honeypot (pole „website" —
 * bot wypełni, człowiek nie widzi go i nie wypełnia), pełna walidacja PO
 * STRONIE SERWERA (JS w kontakt.js to tylko UX, nigdy źródło prawdy),
 * sanitizacja wszystkich pól przed użyciem w treści/nagłówkach maila.
 *
 * Komunikaty błędów muszą być identyczne z prototypem design_handoff_kontakt
 * (README „Interactions & Behavior").
 */
function psod2_kontakt_send() {
	check_ajax_referer( 'psod2_kontakt_nonce', 'nonce' );

	// Honeypot: bot wypełnia niewidoczne pole — udajemy sukces, nic nie wysyłamy.
	if ( ! empty( $_POST['website'] ) ) {
		wp_send_json_success();
	}

	// Anty-spam: maks. 5 zgłoszeń z jednego IP na godzinę (transient jako licznik).
	$ip       = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
	$rl_key   = 'psod2_kontakt_rl_' . md5( $ip );
	$rl_hits  = (int) get_transient( $rl_key );
	if ( $rl_hits >= 5 ) {
		wp_send_json_error( array( 'message' => __( 'Zbyt wiele wiadomości z tego urządzenia. Spróbuj ponownie za godzinę lub napisz bezpośrednio na kontakt@polskaopieka.eu.', 'psod2' ) ) );
	}

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
	$consent = ! empty( $_POST['consent'] ) && '1' === $_POST['consent'];

	if ( '' === $name || '' === $email || '' === $message ) {
		wp_send_json_error( array( 'message' => __( 'Uzupełnij imię, adres e-mail i treść wiadomości.', 'psod2' ) ) );
	}
	if ( ! $consent ) {
		wp_send_json_error( array( 'message' => __( 'Zaznacz zgodę na przetwarzanie danych osobowych.', 'psod2' ) ) );
	}
	if ( ! is_email( $email ) ) {
		wp_send_json_error( array( 'message' => __( 'Podaj prawidłowy adres e-mail.', 'psod2' ) ) );
	}

	$to      = 'kontakt@polskaopieka.eu';
	$subject = 'Nowa wiadomość ze strony — formularz kontaktowy';
	$body    = "Imię i nazwisko: {$name}\n"
		. "E-mail: {$email}\n"
		. 'Telefon: ' . ( '' !== $phone ? $phone : '—' ) . "\n\n"
		. "Treść wiadomości:\n{$message}\n";
	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		// From na domenie strony (SPF/DKIM), odpowiedź trafia do nadawcy przez Reply-To.
		'From: Polskie Stowarzyszenie Opieki Domowej <kontakt@polskaopieka.eu>',
		'Reply-To: ' . $name . ' <' . $email . '>',
	);

	// Zlicz zaakceptowane zgłoszenie do limitu anty-spam (okno godzinne).
	set_transient( $rl_key, $rl_hits + 1, HOUR_IN_SECONDS );

	$sent = wp_mail( $to, $subject, $body, $headers );

	if ( ! $sent ) {
		wp_send_json_error( array( 'message' => __( 'Nie udało się wysłać wiadomości. Spróbuj ponownie później.', 'psod2' ) ) );
	}

	wp_send_json_success();
}
add_action( 'wp_ajax_psod2_kontakt_send', 'psod2_kontakt_send' );
add_action( 'wp_ajax_nopriv_psod2_kontakt_send', 'psod2_kontakt_send' );

/**
 * Szablon „Pismo A4" (page-stanowisko.php) to samodzielny dokument — wyłączamy
 * główny arkusz stylów i skrypty motywu, żeby nie kolidowały z layoutem A4.
 * Fonty (Poppins) zostają.
 */
function psod2_stanowisko_assets() {
	if ( is_page( 'stanowisko' ) ) {
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
 * Rejestracja custom post type „Q&A" (klucz: faq) — pytania i odpowiedzi.
 *
 * Pytanie = tytuł wpisu, odpowiedź = treść (edytor). Bez ACF — sam wbudowany
 * mechanizm WordPressa. Redaktor zarządza w wp-adminie (menu „Q&A"), kolejność
 * ustawia polem „Kolejność" (page-attributes → menu_order). Sekcja Q&A na
 * stronie głównej renderuje te wpisy (front-page.php). CPT nie ma własnego URL
 * (public=false) — to treść strony głównej, nie osobna podstrona.
 */
function psod2_register_faq() {
	register_post_type(
		'faq',
		array(
			'labels'        => array(
				'name'          => __( 'Q&A (Pytania)', 'psod2' ),
				'singular_name' => __( 'Pytanie', 'psod2' ),
				'menu_name'     => __( 'Q&A', 'psod2' ),
				'add_new'       => __( 'Dodaj pytanie', 'psod2' ),
				'add_new_item'  => __( 'Dodaj nowe pytanie', 'psod2' ),
				'edit_item'     => __( 'Edytuj pytanie', 'psod2' ),
				'new_item'      => __( 'Nowe pytanie', 'psod2' ),
				'search_items'  => __( 'Szukaj pytań', 'psod2' ),
				'not_found'     => __( 'Nie znaleziono pytań', 'psod2' ),
				'all_items'     => __( 'Wszystkie pytania', 'psod2' ),
			),
			'public'        => false,
			'show_ui'       => true,
			'show_in_menu'  => true,
			'show_in_rest'  => true,
			'menu_icon'     => 'dashicons-editor-help',
			'menu_position' => 6,
			'supports'      => array( 'title', 'editor', 'page-attributes' ),
			'has_archive'   => false,
			'rewrite'       => false,
		)
	);
}
add_action( 'init', 'psod2_register_faq' );

/**
 * CPT „Mity" (klucz: mit) — gra „Prawda czy mit?". Twierdzenie = tytuł,
 * treść „faktu" = edytor. Dane trafiają do JS (psod.js) — patrz
 * psod2_frontpage_data(). Kolejność: page-attributes (menu_order).
 */
function psod2_register_mit() {
	register_post_type(
		'mit',
		array(
			'labels'        => array(
				'name'          => __( 'Mity', 'psod2' ),
				'singular_name' => __( 'Mit', 'psod2' ),
				'menu_name'     => __( 'Mity', 'psod2' ),
				'add_new'       => __( 'Dodaj mit', 'psod2' ),
				'add_new_item'  => __( 'Dodaj nowy mit', 'psod2' ),
				'edit_item'     => __( 'Edytuj mit', 'psod2' ),
				'all_items'     => __( 'Wszystkie mity', 'psod2' ),
			),
			'public'        => false,
			'show_ui'       => true,
			'show_in_rest'  => true,
			'menu_icon'     => 'dashicons-lightbulb',
			'menu_position' => 7,
			'supports'      => array( 'title', 'editor', 'page-attributes' ),
			'has_archive'   => false,
			'rewrite'       => false,
		)
	);
}
add_action( 'init', 'psod2_register_mit' );

/**
 * CPT „Filary" (klucz: filar) — filary opieki domowej. Nazwa = tytuł;
 * ikona, wprowadzenie i lista punktów w meta boxie „Filar". Dane trafiają do
 * JS (psod.js) — patrz psod2_frontpage_data(). Kolejność: menu_order.
 */
function psod2_register_filar() {
	register_post_type(
		'filar',
		array(
			'labels'        => array(
				'name'          => __( 'Filary', 'psod2' ),
				'singular_name' => __( 'Filar', 'psod2' ),
				'menu_name'     => __( 'Filary', 'psod2' ),
				'add_new'       => __( 'Dodaj filar', 'psod2' ),
				'add_new_item'  => __( 'Dodaj nowy filar', 'psod2' ),
				'edit_item'     => __( 'Edytuj filar', 'psod2' ),
				'all_items'     => __( 'Wszystkie filary', 'psod2' ),
			),
			'public'        => false,
			'show_ui'       => true,
			'menu_icon'     => 'dashicons-screenoptions',
			'menu_position' => 8,
			'supports'      => array( 'title', 'page-attributes' ),
			'has_archive'   => false,
			'rewrite'       => false,
		)
	);
}
add_action( 'init', 'psod2_register_filar' );

/** Lista dostępnych ikon filarów (plik w assets/). */
function psod2_filar_icons() {
	return array(
		'filar-wybor.svg'          => 'Wybór',
		'filar-bezpieczenstwo.svg' => 'Bezpieczeństwo',
		'filar-szacunek.svg'       => 'Szacunek',
		'filar-ciaglosc.svg'       => 'Ciągłość',
		'filar-indywidualne.svg'   => 'Indywidualne podejście',
	);
}

/** Meta box filaru: ikona (select), wprowadzenie (textarea), punkty (textarea, 1/linia). */
function psod2_filar_metabox() {
	add_meta_box( 'psod2_filar', __( 'Filar — treść', 'psod2' ), 'psod2_filar_metabox_cb', 'filar', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'psod2_filar_metabox' );

function psod2_filar_metabox_cb( $post ) {
	wp_nonce_field( 'psod2_filar_save', 'psod2_filar_nonce' );
	$icon    = get_post_meta( $post->ID, '_psod_filar_icon', true );
	$intro   = get_post_meta( $post->ID, '_psod_filar_intro', true );
	$bullets = get_post_meta( $post->ID, '_psod_filar_bullets', true );
	echo '<p><label><strong>' . esc_html__( 'Ikona', 'psod2' ) . '</strong><br><select name="psod2_filar_icon" style="min-width:280px">';
	foreach ( psod2_filar_icons() as $file => $label ) {
		echo '<option value="' . esc_attr( $file ) . '" ' . selected( $icon, $file, false ) . '>' . esc_html( $label ) . ' (' . esc_html( $file ) . ')</option>';
	}
	echo '</select></label></p>';
	echo '<p><label><strong>' . esc_html__( 'Wprowadzenie', 'psod2' ) . '</strong><br><textarea name="psod2_filar_intro" rows="3" style="width:100%">' . esc_textarea( $intro ) . '</textarea></label></p>';
	echo '<p><label><strong>' . esc_html__( 'Punkty', 'psod2' ) . '</strong> <span class="description">' . esc_html__( '(jeden punkt na linię)', 'psod2' ) . '</span><br><textarea name="psod2_filar_bullets" rows="8" style="width:100%">' . esc_textarea( $bullets ) . '</textarea></label></p>';
}

function psod2_filar_save( $post_id ) {
	if ( ! isset( $_POST['psod2_filar_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['psod2_filar_nonce'] ) ), 'psod2_filar_save' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	$icons = psod2_filar_icons();
	if ( isset( $_POST['psod2_filar_icon'] ) && isset( $icons[ $_POST['psod2_filar_icon'] ] ) ) {
		update_post_meta( $post_id, '_psod_filar_icon', sanitize_text_field( wp_unslash( $_POST['psod2_filar_icon'] ) ) );
	}
	if ( isset( $_POST['psod2_filar_intro'] ) ) {
		update_post_meta( $post_id, '_psod_filar_intro', sanitize_textarea_field( wp_unslash( $_POST['psod2_filar_intro'] ) ) );
	}
	if ( isset( $_POST['psod2_filar_bullets'] ) ) {
		update_post_meta( $post_id, '_psod_filar_bullets', sanitize_textarea_field( wp_unslash( $_POST['psod2_filar_bullets'] ) ) );
	}
}
add_action( 'save_post_filar', 'psod2_filar_save' );

/**
 * CPT „Priorytety" (klucz: priorytet). Tytuł = nazwa priorytetu, treść = opis,
 * zdjęcie wyróżniające = kadr, meta link = adres artykułu „Czytaj więcej".
 * Używany na stronie głównej (kafle) i podstronie /nasze-priorytety/.
 * Kolejność: menu_order.
 */
function psod2_register_priorytet() {
	register_post_type(
		'priorytet',
		array(
			'labels'        => array(
				'name'          => __( 'Priorytety', 'psod2' ),
				'singular_name' => __( 'Priorytet', 'psod2' ),
				'menu_name'     => __( 'Priorytety', 'psod2' ),
				'add_new'       => __( 'Dodaj priorytet', 'psod2' ),
				'add_new_item'  => __( 'Dodaj nowy priorytet', 'psod2' ),
				'edit_item'     => __( 'Edytuj priorytet', 'psod2' ),
				'all_items'     => __( 'Wszystkie priorytety', 'psod2' ),
			),
			'public'        => false,
			'show_ui'       => true,
			'show_in_rest'  => true,
			'menu_icon'     => 'dashicons-flag',
			'menu_position' => 9,
			'supports'      => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'has_archive'   => false,
			'rewrite'       => false,
		)
	);
}
add_action( 'init', 'psod2_register_priorytet' );

/** Meta box priorytetu: link „Czytaj więcej". */
function psod2_priorytet_metabox() {
	add_meta_box( 'psod2_priorytet', __( 'Link „Czytaj więcej"', 'psod2' ), 'psod2_priorytet_metabox_cb', 'priorytet', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'psod2_priorytet_metabox' );

function psod2_priorytet_metabox_cb( $post ) {
	wp_nonce_field( 'psod2_priorytet_save', 'psod2_priorytet_nonce' );
	$link = get_post_meta( $post->ID, '_psod_prio_link', true );
	echo '<p><label>' . esc_html__( 'Adres artykułu (URL):', 'psod2' ) . '<br><input type="text" name="psod2_prio_link" value="' . esc_attr( $link ) . '" style="width:100%" placeholder="/artykuly/…/"></label></p>';
	echo '<p class="description">' . esc_html__( 'Dokąd prowadzi „Czytaj więcej" na podstronie Nasze priorytety.', 'psod2' ) . '</p>';
}

function psod2_priorytet_save( $post_id ) {
	if ( ! isset( $_POST['psod2_priorytet_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['psod2_priorytet_nonce'] ) ), 'psod2_priorytet_save' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	if ( isset( $_POST['psod2_prio_link'] ) ) {
		update_post_meta( $post_id, '_psod_prio_link', esc_url_raw( wp_unslash( $_POST['psod2_prio_link'] ) ) );
	}
}
add_action( 'save_post_priorytet', 'psod2_priorytet_save' );

/** Priorytety (CPT) w kolejności menu_order — wspólne dla strony głównej i /nasze-priorytety/. */
function psod2_get_priorytety() {
	return get_posts(
		array(
			'post_type'   => 'priorytet',
			'post_status' => 'publish',
			'numberposts' => -1,
			'orderby'     => 'menu_order',
			'order'       => 'ASC',
		)
	);
}

/**
 * Dane sekcji strony głównej budowanych w JS (Mity, Filary) → globalne zmienne
 * JS (odczyt w psod.js). Tylko na stronie głównej (te sekcje są tylko tam).
 */
function psod2_frontpage_data() {
	if ( ! is_front_page() ) {
		return;
	}
	$mity = array();
	$mq = new WP_Query( array( 'post_type' => 'mit', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC', 'no_found_rows' => true ) );
	foreach ( $mq->posts as $p ) {
		// Pomijamy mity z placeholderem faktu (np. Agencje Pracy Tymczasowej —
		// oryginał nie zawiera treści). Nie pokazujemy notatki roboczej publicznie;
		// po uzupełnieniu w wp-adminie mit sam wróci do gry.
		if ( false !== strpos( $p->post_content, '[Do uzupełnienia' ) ) {
			continue;
		}
		$mity[] = array(
			't' => get_the_title( $p ),
			'f' => trim( apply_filters( 'the_content', $p->post_content ) ),
		);
	}
	$filary = array();
	$fq = new WP_Query( array( 'post_type' => 'filar', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC', 'no_found_rows' => true ) );
	foreach ( $fq->posts as $p ) {
		$icon    = get_post_meta( $p->ID, '_psod_filar_icon', true );
		$bullets = array_values( array_filter( array_map( 'trim', explode( "\n", (string) get_post_meta( $p->ID, '_psod_filar_bullets', true ) ) ) ) );
		$filary[] = array(
			'key'     => $p->post_name, // slug — klucz i18n (filary.<slug>.*), patrz js/i18n.js.
			'name'    => get_the_title( $p ),
			'icon'    => $icon ? get_template_directory_uri() . '/assets/' . $icon : '',
			'intro'   => (string) get_post_meta( $p->ID, '_psod_filar_intro', true ),
			'bullets' => $bullets,
		);
	}
	wp_reset_postdata();
	wp_add_inline_script(
		'psod2-script',
		'window.PSOD_MITY=' . wp_json_encode( $mity ) . ';window.PSOD_FILARY=' . wp_json_encode( $filary ) . ';',
		'before'
	);
}
add_action( 'wp_enqueue_scripts', 'psod2_frontpage_data', 20 );

/** Czy CPT ma już jakiekolwiek wpisy (dowolny status poza koszem/auto-draft)? */
function psod2_cpt_has_posts( $type ) {
	$ids = get_posts(
		array(
			'post_type'      => $type,
			'post_status'    => 'any',
			'posts_per_page' => 1,
			'fields'         => 'ids',
			'no_found_rows'  => true,
		)
	);
	return ! empty( $ids );
}

/**
 * Jednorazowy seed treści CPT „filar" i „mit" — odtwarza wartości, które wcześniej
 * były zaszyte w js/psod.js (treść 1:1 z oryginału PSOD). Dzięki temu po ręcznym
 * wdrożeniu motywu (SFTP — brak zdarzenia aktywacji) sekcje „Filary" i „Prawda czy
 * mit?" na stronie głównej nie są puste, zanim redaktor cokolwiek doda.
 *
 * Idempotentny: flaga w opcji `psod2_seeded_filar_mit` gwarantuje jednorazowe
 * uruchomienie; dodatkowo seeduje dany CPT tylko gdy jest pusty — nie duplikuje ani
 * nie nadpisuje wpisów utworzonych ręcznie. Slug filaru ustawiany na stałe (wybor,
 * bezpieczenstwo…), aby klucze i18n (filary.<slug>.*) były zgodne z js/i18n.js.
 * Mit #2 celowo zawiera placeholder faktu (oryginał nie zawiera treści).
 */
function psod2_seed_filar_mit() {
	if ( get_option( 'psod2_seeded_filar_mit' ) ) {
		return;
	}

	$filary = array(
		array(
			'slug'    => 'wybor',
			'name'    => 'Wybór',
			'icon'    => 'filar-wybor.svg',
			'intro'   => 'Oznacza zapewnienie podopiecznym prawa do dokonania wyboru sposobu, w jaki żyją i otrzymują opiekę. W szczególności:',
			'bullets' => array(
				'wspieranie podopiecznych w zarządzaniu własnym zdrowiem i samopoczuciem,',
				'zapewnienie podopiecznym i ich opiekunom wiedzy o prawie do uczestniczenia w opiece i dokonywania wyborów w tym zakresie,',
				'zaangażowanie do podejmowania decyzji dotyczących opieki oraz możliwości wyboru i kontroli nad usługami, z których korzystają,',
				'zlecanie usług, które zapewniają podopiecznym informacje i wsparcie w celu określenia i osiągnięcia wyników, które są dla nich ważne,',
				'uwzględnienie świadomych preferencji podopiecznych',
			),
		),
		array(
			'slug'    => 'bezpieczenstwo',
			'name'    => 'Bezpieczeństwo',
			'icon'    => 'filar-bezpieczenstwo.svg',
			'intro'   => 'Opieka domowa musi być realizowane w sposób bezpieczny, obejmujący m.in.:',
			'bullets' => array(
				'ocenę ryzyka poszczególnych czynności opiekuńczych dla zdrowia i bezpieczeństwa podopiecznego oraz podejmowanie wszelkich możliwych działań w celu zmniejszenia takiego ryzyka,',
				'zapewnienie personelu opiekuńczego o odpowiednich kwalifikacjach, kompetencjach i doświadczeniu zapewniających bezpieczeństwo opieki,',
				'zapewnienie bezpieczeństwa i zgodności z przeznaczeniem pomieszczeń i sprzętu używanego do opieki',
				'zaspokojenie potrzeb podopiecznego w obszarze żywieniowym, nawodnienia i właściwe zarządzanie lekami,',
				'ocena ryzyka, zapobiegania, wykrywania i kontroli nad rozprzestrzenianiem się zakażeń,',
				'w przypadku, gdy odpowiedzialność za opiekę domową jest dzielona, zapewnienie współpracy na każdym etapie planowania i realizacji opieki.',
			),
		),
		array(
			'slug'    => 'szacunek',
			'name'    => 'Szacunek',
			'icon'    => 'filar-szacunek.svg',
			'intro'   => 'Zarówno osoby korzystające z usług opieki, jak i opiekunowie muszą być chronieni przed nadużyciami i traktowani z godnością oraz szacunkiem. Usługi opieki domowej nie mogą być świadczone w sposób, który:',
			'bullets' => array(
				'dopuszcza dyskryminację, jest lekceważący lub poniżający,',
				'obejmuje działania ograniczające autonomię i niezależność podopiecznych, które nie są niezbędne lub są nieproporcjonalną reakcją w stosunku do ryzyka powstania szkody dla podopiecznego, personelu lub innych osób',
				'nie respektuje osobistej przestrzeni podopiecznego i opiekuna oraz prywatności i poufności dotyczącej osobistych informacji,',
				'ograniczaja wolność w celu uzyskania opieki lub leczenia – opieka i leczenie muszą być zapewnione za zgodą podopiecznych lub ich prawnych opiekunów.',
			),
		),
		array(
			'slug'    => 'ciaglosc',
			'name'    => 'Ciągłość',
			'icon'    => 'filar-ciaglosc.svg',
			'intro'   => 'Opieka domowa wymaga:',
			'bullets' => array(
				'zapewnienia podopiecznym prawa do zachowania ciągłości opieki, tj. nieprzerwanego świadczenia bez narażania ich na ryzyko przerwy w dostępie do opieki,',
				'zachowania dokładnej, pełnej i aktualnej informacji (poprzez odpowiednią dokumentację) dotyczącej każdego podopiecznego oraz decyzji podjętych w odniesieniu do zapewnionej opieki,',
				'zapewnienia możliwości spersonalizowanego długotrwałego planowania opieki',
			),
		),
		array(
			'slug'    => 'indywidualne',
			'name'    => 'Indywidualne podejście',
			'icon'    => 'filar-indywidualne.svg',
			'intro'   => 'Opieka domowa wymaga zatrudnienia odpowiedniej liczby wykwalifikowanego i otwartego na potrzeby podopiecznych personelu, w celu:',
			'bullets' => array(
				'zapewnienia zakresu opieki dostosowanego do potrzeb i preferencji podopiecznych,',
				'możliwości skupienia się na tym, co jest ważne dla podopiecznych w kontekście jakości ich życia, a nie tylko liście schorzeń lub objawów, które należy leczyć,',
				'dbania o transparentność w relacjach oraz zakresie leczenia i świadczonej opieki,',
				'zapewnienia skuteczności w rejestrowaniu, reagowaniu i rozwiązywaniu problemów zgłaszanych przez pacjentów, ich rodziny i personel.',
			),
		),
	);

	if ( ! psod2_cpt_has_posts( 'filar' ) ) {
		$order = 1;
		foreach ( $filary as $f ) {
			$fid = wp_insert_post(
				array(
					'post_type'   => 'filar',
					'post_status' => 'publish',
					'post_title'  => $f['name'],
					'post_name'   => $f['slug'],
					'menu_order'  => $order,
				),
				true
			);
			if ( ! is_wp_error( $fid ) && $fid ) {
				update_post_meta( $fid, '_psod_filar_icon', $f['icon'] );
				update_post_meta( $fid, '_psod_filar_intro', $f['intro'] );
				update_post_meta( $fid, '_psod_filar_bullets', implode( "\n", $f['bullets'] ) );
			}
			$order++;
		}
	}

	$mity = array(
		array(
			'title'   => 'Opiekunowie domowi pracują 24h na dobę',
			'content' => 'Faktem jest, że opiekunowie domowi mają zapewnione zakwaterowanie w domu podopiecznego, więc w zasadzie przebywają w miejscu pracy 24h na dobę. Nie jest jednak prawdą, że przez cały ten czas wykonują pracę. Profesjonalna firma opiekuńcza powinna ustalić z opiekunem zakres czynności i obowiązków, który obejmuje wyłącznie czynności, których bezpośrednim beneficjentem jest osoba podopieczna. Zlecenia nie mogą zakładać pomocy choremu „non stop”.',
		),
		array(
			'title'   => 'Usługi opieki domowej świadczą Agencje Pracy Tymczasowej',
			'content' => '<em>[Do uzupełnienia — oryginalna strona nie zawiera tekstu faktu dla tego mitu. Treść do dostarczenia przez PSOD.]</em>',
		),
		array(
			'title'   => 'Opiekunowie domowi nie muszą mieć kompetencji',
			'content' => 'Takie stwierdzenie jest krzywdzące dla opiekunów i może być niebezpieczne dla podopiecznych. Nie każdy może zostać opiekunem domowym — profesjonalne firmy zwracają uwagę na szereg cech, kompetencji i predyspozycji. Kluczowe są umiejętności praktyczne obejmujące codzienną opiekę i pielęgnację, wiedza o procesie starzenia i demencji, a także empatia, cierpliwość, komunikatywność i szacunek do drugiego człowieka.',
		),
		array(
			'title'   => 'Opieka nad osobą starszą to dobre zajęcie tylko dla kobiet 50+',
			'content' => 'Prawdą jest, że wśród opiekunów zdecydowaną większość stanowią kobiety, często w grupie wiekowej 50+. Jednak wśród opiekunów coraz więcej jest mężczyzn (ok. 10%) i osób młodych, które przyciąga misyjność tego zawodu. Biorąc pod uwagę tempo starzenia się społeczeństwa, opiekuna osoby starszej można nazwać zawodem przyszłości.',
		),
	);

	if ( ! psod2_cpt_has_posts( 'mit' ) ) {
		$order = 1;
		foreach ( $mity as $m ) {
			wp_insert_post(
				array(
					'post_type'    => 'mit',
					'post_status'  => 'publish',
					'post_title'   => $m['title'],
					'post_content' => $m['content'],
					'menu_order'   => $order,
				),
				true
			);
			$order++;
		}
	}

	update_option( 'psod2_seeded_filar_mit', 1 );
}
add_action( 'init', 'psod2_seed_filar_mit', 20 );

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
 * Kontekst SEO — jedno źródło dla meta description, Open Graph i Twitter Card.
 *
 * Na stagingu nie ma wtyczki SEO (Yoast/RankMath). Cała funkcja wyłącza się, jeśli
 * kiedyś pojawi się Yoast (guard `WPSEO_VERSION`), żeby nie dublować znaczników.
 * Zwraca: title, description, url, type (website|article), image (URL lub '').
 */
function psod2_seo_context() {
	$site_name = get_bloginfo( 'name' );
	$default   = __( 'Polskie Stowarzyszenie Opieki Domowej reprezentuje sektor opieki domowej w Polsce — wspieramy seniorów i osoby zależne oraz działamy na rzecz godnej, profesjonalnej opieki w domu.', 'psod2' );
	$ctx = array(
		'title'       => $site_name,
		'description' => $default,
		'url'         => home_url( '/' ),
		'type'        => 'website',
		'image'       => get_template_directory_uri() . '/assets/logo-psod-lockup.jpg',
	);

	if ( is_front_page() ) {
		return $ctx;
	}

	if ( is_singular( 'aktualnosci' ) ) {
		$id                = get_queried_object_id();
		$ctx['title']      = get_the_title( $id ) . ' — ' . $site_name;
		$ctx['description'] = has_excerpt( $id )
			? get_the_excerpt( $id )
			: wp_trim_words( wp_strip_all_tags( get_post_field( 'post_content', $id ) ), 40 );
		$ctx['url']  = get_permalink( $id );
		$ctx['type'] = 'article';
		if ( has_post_thumbnail( $id ) ) {
			$ctx['image'] = get_the_post_thumbnail_url( $id, 'large' );
		}
	} elseif ( is_page() ) {
		$id           = get_queried_object_id();
		$ctx['title'] = get_the_title( $id ) . ' — ' . $site_name;
		$content      = get_post_field( 'post_content', $id );
		if ( '' !== trim( wp_strip_all_tags( $content ) ) ) {
			$ctx['description'] = wp_trim_words( wp_strip_all_tags( $content ), 40 );
		}
		$ctx['url'] = get_permalink( $id );
	} elseif ( is_post_type_archive( 'aktualnosci' ) ) {
		$ctx['title'] = __( 'Aktualności', 'psod2' ) . ' — ' . $site_name;
		$ctx['url']   = get_post_type_archive_link( 'aktualnosci' );
	}

	return $ctx;
}

/**
 * Meta description + canonical + Open Graph + Twitter Card w <head>.
 */
function psod2_head_meta() {
	if ( defined( 'WPSEO_VERSION' ) ) {
		return;
	}
	$c = psod2_seo_context();

	printf( '<meta name="description" content="%s">' . "\n", esc_attr( $c['description'] ) );
	printf( '<link rel="canonical" href="%s">' . "\n", esc_url( $c['url'] ) );

	printf( '<meta property="og:type" content="%s">' . "\n", esc_attr( $c['type'] ) );
	printf( '<meta property="og:title" content="%s">' . "\n", esc_attr( $c['title'] ) );
	printf( '<meta property="og:description" content="%s">' . "\n", esc_attr( $c['description'] ) );
	printf( '<meta property="og:url" content="%s">' . "\n", esc_url( $c['url'] ) );
	printf( '<meta property="og:site_name" content="%s">' . "\n", esc_attr( get_bloginfo( 'name' ) ) );
	printf( '<meta property="og:locale" content="pl_PL">' . "\n" );

	if ( '' !== $c['image'] ) {
		printf( '<meta property="og:image" content="%s">' . "\n", esc_url( $c['image'] ) );
		printf( '<meta name="twitter:card" content="summary_large_image">' . "\n" );
		printf( '<meta name="twitter:image" content="%s">' . "\n", esc_url( $c['image'] ) );
	} else {
		printf( '<meta name="twitter:card" content="summary">' . "\n" );
	}
	printf( '<meta name="twitter:title" content="%s">' . "\n", esc_attr( $c['title'] ) );
	printf( '<meta name="twitter:description" content="%s">' . "\n", esc_attr( $c['description'] ) );
}
add_action( 'wp_head', 'psod2_head_meta', 5 );

/**
 * Dane strukturalne JSON-LD (schema.org): Organization zawsze, Article na pojedynczej
 * aktualności, FAQPage na stronie głównej (sekcja Q&A z CPT „faq"). Wyłącza się przy Yoast.
 */
function psod2_jsonld() {
	if ( defined( 'WPSEO_VERSION' ) ) {
		return;
	}
	$blocks = array();

	$blocks[] = array(
		'@context'      => 'https://schema.org',
		'@type'         => 'Organization',
		'name'          => 'Polskie Stowarzyszenie Opieki Domowej',
		'alternateName' => 'PSOD',
		'url'           => home_url( '/' ),
		'logo'          => get_template_directory_uri() . '/assets/logo-psod-lockup.jpg',
		'email'         => 'kontakt@polskaopieka.eu',
		'address'       => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => 'Nowy Świat 54/56',
			'postalCode'      => '00-363',
			'addressLocality' => 'Warszawa',
			'addressCountry'  => 'PL',
		),
		'sameAs'        => array( 'https://www.linkedin.com/company/polskie-stowarzyszenie-opieki-domowej/' ),
	);

	if ( is_singular( 'aktualnosci' ) ) {
		$id      = get_queried_object_id();
		$article = array(
			'@context'      => 'https://schema.org',
			'@type'         => 'Article',
			'headline'      => wp_strip_all_tags( get_the_title( $id ) ),
			'datePublished' => get_post_time( 'c', true, $id ),
			'dateModified'  => get_post_modified_time( 'c', true, $id ),
			'url'           => get_permalink( $id ),
			'publisher'     => array(
				'@type' => 'Organization',
				'name'  => 'Polskie Stowarzyszenie Opieki Domowej',
			),
		);
		if ( has_post_thumbnail( $id ) ) {
			$article['image'] = get_the_post_thumbnail_url( $id, 'large' );
		}
		$blocks[] = $article;
	}

	if ( is_front_page() ) {
		$fq    = new WP_Query(
			array(
				'post_type'      => 'faq',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
				'no_found_rows'  => true,
			)
		);
		$items = array();
		foreach ( $fq->posts as $p ) {
			$answer = trim( wp_strip_all_tags( $p->post_content ) );
			if ( '' === $answer ) {
				continue;
			}
			$items[] = array(
				'@type'          => 'Question',
				'name'           => wp_strip_all_tags( $p->post_title ),
				'acceptedAnswer' => array(
					'@type' => 'Answer',
					'text'  => $answer,
				),
			);
		}
		wp_reset_postdata();
		if ( ! empty( $items ) ) {
			$blocks[] = array(
				'@context'   => 'https://schema.org',
				'@type'      => 'FAQPage',
				'mainEntity' => $items,
			);
		}
	}

	foreach ( $blocks as $b ) {
		echo '<script type="application/ld+json">'
			. wp_json_encode( $b, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )
			. '</script>' . "\n";
	}
}
add_action( 'wp_head', 'psod2_jsonld', 6 );

// (Preconnect do Google Fonts usunięty — fonty są self-hostowane, patrz
// psod2_assets() + assets/fonts/. Zero połączeń do domen Google = zgodność RODO.)
