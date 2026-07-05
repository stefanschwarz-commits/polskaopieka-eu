<?php
/**
 * PSOD functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PSOD
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function psod_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on PSOD, use a find and replace
		* to change 'psod' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'psod', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'psod' ),
			'menu-2' => esc_html__( 'Footer', 'psod' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'psod_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'psod_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function psod_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'psod_content_width', 640 );
}
add_action( 'after_setup_theme', 'psod_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function psod_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'psod' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'psod' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'psod_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function psod_scripts() {
	wp_style_add_data( 'psod-style', 'rtl', 'replace' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

// psod styles and scripts
	wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js', null, null, null);
	wp_enqueue_style( 'psod-style', get_template_directory_uri() . '/scss/custom.css', array(), _S_VERSION);
	wp_enqueue_script( 'psod-script', get_template_directory_uri() . '/js/psod-script.js', array(), _S_VERSION, true );
	wp_enqueue_script('bootstrap-js','https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js');
	wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@8.4.7/swiper-bundle.min.css' );
	wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8.4.7/swiper-bundle.min.js');

}
add_action( 'wp_enqueue_scripts', 'psod_scripts' );

// SRI (Subresource Integrity) dla skryptow/stylow ladowanych z publicznych CDN.
// Hashe sha384 policzone recznie z aktualnie wgranych plikow (nie z metadanych CDN).
// Uwaga: jesli w przyszlosci zmieni sie wersja biblioteki w URL powyzej, trzeba przeliczyc
// hash ponownie, inaczej przegladarka odrzuci zasob (integrity mismatch) i strona przestanie
// dzialac - dlatego wersje w URL-ach sa przypiete na sztywno (np. swiper@8.4.7, nie @8).
function psod_cdn_sri_hashes() {
	return array(
		'jquery'       => 'sha384-Ft/vb48LwsAEtgltj7o+6vtS2esTU9PCpDqcXs4OCVQFZu5BqprHtUCZ4kjK+bpE',
		'bootstrap-js' => 'sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe',
		'swiper-css'   => 'sha384-OVtDJ2WfU22geHR8xWErSSHJMaH21QOP9w33a+A2MzyE4uxDS2/5rhIw9YZkWv5R',
		'swiper-js'    => 'sha384-kLg4yw7ysk2F34aYhHIrdq/AXIkHzZ808L3af45jUqWQoMPN8VnJneCjOR8+THSG',
		'bootstrap'    => 'sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65',
	);
}

add_filter( 'script_loader_tag', function( $tag, $handle ) {
	$hashes = psod_cdn_sri_hashes();
	if ( isset( $hashes[ $handle ] ) && strpos( $tag, 'integrity=' ) === false ) {
		$tag = str_replace( ' src=', ' integrity="' . esc_attr( $hashes[ $handle ] ) . '" crossorigin="anonymous" src=', $tag );
	}
	return $tag;
}, 10, 2 );

add_filter( 'style_loader_tag', function( $tag, $handle ) {
	$hashes = psod_cdn_sri_hashes();
	if ( isset( $hashes[ $handle ] ) && strpos( $tag, 'integrity=' ) === false ) {
		$tag = str_replace( ' href=', ' integrity="' . esc_attr( $hashes[ $handle ] ) . '" crossorigin="anonymous" href=', $tag );
	}
	return $tag;
}, 10, 2 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');


function deregister_styles() {
    wp_dequeue_style('classic-theme-styles');
	wp_dequeue_style('global-styles-inline-css');
	wp_deregister_style('global-styles-inline-css');
	wp_dequeue_style('global-styles');
}

add_action( 'wp_enqueue_scripts', 'deregister_styles', 100000 );


function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

remove_filter( 'the_excerpt', 'wpautop' );

// Method 1: Filter.
// Klucz Google Maps NIE jest wpisany na sztywno w kodzie - patrz wp-config.php
// (define('PSOD_GOOGLE_MAPS_API_KEY', '...')) na serwerze produkcyjnym.
function my_acf_google_map_api( $api ){
    if ( defined( 'PSOD_GOOGLE_MAPS_API_KEY' ) ) {
        $api['key'] = PSOD_GOOGLE_MAPS_API_KEY;
    }
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


function my_acf_init() {
    if ( defined( 'PSOD_GOOGLE_MAPS_API_KEY' ) ) {
        acf_update_setting('google_api_key', PSOD_GOOGLE_MAPS_API_KEY);
    }
}
add_action('acf/init', 'my_acf_init');

// testimonial block

add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
    register_block_type( __DIR__ . '/blocks/cytat' );
}

function enqueue_gutenberg_assets() {
    // Dodaj style Bootstrapa
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' );
    
}
add_action( 'enqueue_block_editor_assets', 'enqueue_gutenberg_assets' );

function remove_comment_menu_item() {
	remove_menu_page('edit-comments.php');
	remove_menu_page('edit.php');
  }
  add_action('admin_menu', 'remove_comment_menu_item');

  function redirect_to_homepage() {
    if(is_404()) {
        wp_redirect(home_url('/'));
        exit;
    }
}
add_action('template_redirect', 'redirect_to_homepage');

function remove_xmlns_from_svg( $tag ) {
    return str_replace( 'xmlns="http://www.w3.org/2000/svg"', '', $tag );
}
add_filter( 'style_loader_tag', 'remove_xmlns_from_svg' );


if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Motyw PSOD',
        'menu_title'    => 'Motyw PSOD',
        'menu_slug'     => 'motyw-psod',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    
}

/// sekcja cta

function get_the_cta() {
    ob_start();
    get_template_part( 'cta' );
    $cta = ob_get_contents();
    ob_end_clean();
    return $cta;
}


function url_to_title( $url ) {
    $slug = end( explode( '/', rtrim( $url, '/' ) ) ); 
    $title = str_replace( '-', ' ', $slug ); 
    $title = ucwords( $title ); 
    return $title;
}


add_filter( 'wpcf7_form_elements', function($form) {
	$val = esc_attr( url_to_title( wp_unslash( $_SERVER['REQUEST_URI'] ?? '' ) ) );
	$form = str_replace( 'pageurl', $val, $form );
	return $form;
	} );



	function custom_excerpt_length($length) {
		return 13; // Change this number to the desired length of your excerpt
	}
	add_filter('excerpt_length', 'custom_excerpt_length');



	function custom_excerpt_more($more) {
		return '...'; // Zmienia zakończenie excerpt na "..."
	}
	add_filter('excerpt_more', 'custom_excerpt_more');


// === PSOD-SECURITY-HARDENING: blokada enumeracji loginow uzytkownikow ===

// Ukryj endpoint REST /wp/v2/users (i /wp/v2/users/<id>) przed niezalogowanymi.
add_filter( 'rest_endpoints', function( $endpoints ) {
	if ( ! is_user_logged_in() ) {
		unset( $endpoints['/wp/v2/users'] );
		unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
	}
	return $endpoints;
} );

// Zablokuj enumeracje autorow przez ?author=N (przekieruj na strone glowna).
// Priorytet 0: musi wykonac sie PRZED wp core redirect_canonical() (priorytet 10),
// ktore inaczej samo przekierowuje ?author=1 na /author/<login>/ i ujawnia login.
add_action( 'template_redirect', function () {
	if ( isset( $_GET['author'] ) ) {
		wp_safe_redirect( home_url( '/' ), 301 );
		exit;
	}
}, 0 );