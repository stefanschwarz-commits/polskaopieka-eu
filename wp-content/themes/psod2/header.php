<?php
/**
 * Nagłówek motywu — otwarcie dokumentu + sticky header z logo, przełącznikiem
 * języka (PL/DE/EN, i18n) i menu (wysuwany panel z prawej).
 *
 * @package PSOD2
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ======================= HEADER (sticky) ======================= -->
<header class="site-header">
	<div class="wrap">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand" aria-label="<?php esc_attr_e( 'Polskie Stowarzyszenie Opieki Domowej — strona główna', 'psod2' ); ?>">
			<img class="brand__mark" src="<?php echo esc_url( get_template_directory_uri() . '/assets/psod-mark.jpg' ); ?>" alt="" width="48" height="48">
			<span class="brand__name" data-i18n-html="brand.name"><?php echo esc_html__( 'Polskie', 'psod2' ) . '<br>' . esc_html__( 'Stowarzyszenie', 'psod2' ) . '<br>' . esc_html__( 'Opieki Domowej', 'psod2' ); ?></span>
		</a>
		<div class="header-right">
			<?php
			// Funkcjonalny przełącznik i18n (js/i18n.js) — nie TranslatePress (patrz spec 2026-07).
			?>
			<div class="lang-switch" role="group" aria-label="<?php esc_attr_e( 'Wybór języka', 'psod2' ); ?>">
				<button type="button" class="lang-switch__btn" data-lang="pl" aria-current="true">PL</button>
				<button type="button" class="lang-switch__btn" data-lang="de" aria-current="false">DE</button>
				<button type="button" class="lang-switch__btn" data-lang="en" aria-current="false">EN</button>
			</div>
			<button class="burger" id="menuToggle" aria-label="<?php esc_attr_e( 'Menu', 'psod2' ); ?>" aria-controls="mainNav" aria-expanded="false">
				<i></i><i></i><i></i>
			</button>
		</div>
	</div>
</header>

<div class="i18n-banner" id="i18nBanner" role="status" hidden>
	<?php esc_html_e( 'Ta wersja językowa jest w przygotowaniu — na razie wyświetlamy treść po polsku.', 'psod2' ); ?>
</div>

<!-- ======================= MENU GŁÓWNE (wysuwany panel z prawej + scrim) ======================= -->
<div class="scrim" id="navScrim" hidden></div>
<nav class="mainnav" id="mainNav" aria-hidden="true" aria-label="<?php esc_attr_e( 'Menu główne', 'psod2' ); ?>">
	<button class="mainnav__close" id="menuClose" aria-label="<?php esc_attr_e( 'Zamknij menu', 'psod2' ); ?>">&times;</button>
	<div class="mainnav__inner">
		<ul class="mainnav__list">
			<li><a href="#wyzwania" data-i18n="nav.wyzwania"><?php esc_html_e( 'Wyzwania cywilizacyjne', 'psod2' ); ?></a></li>
			<li><a href="#priorytety" data-i18n="nav.priorytety"><?php esc_html_e( 'Nasze priorytety', 'psod2' ); ?></a></li>
			<li><a href="#dzialalnosc" data-i18n="nav.dzialalnosc"><?php esc_html_e( 'Nasza działalność', 'psod2' ); ?></a></li>
			<li><a href="#apel" data-i18n="nav.apel"><?php esc_html_e( 'Apel do rządu', 'psod2' ); ?></a></li>
			<li><a href="#publikacje" data-i18n="nav.publikacje"><?php esc_html_e( 'Publikacje', 'psod2' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/centrum-wiedzy/' ) ); ?>" data-i18n="nav.centrum"><?php esc_html_e( 'Centrum wiedzy', 'psod2' ); ?></a></li>
			<li><a href="#" data-i18n="nav.szkolenia"><?php esc_html_e( 'Szkolenia', 'psod2' ); ?></a></li>
			<li><a href="#qa" data-i18n="nav.qa"><?php esc_html_e( 'Q&A', 'psod2' ); ?></a></li>
			<li><a href="#aktualnosci" data-i18n="nav.aktualnosci"><?php esc_html_e( 'Aktualności', 'psod2' ); ?></a></li>
		</ul>
	</div>
</nav>
