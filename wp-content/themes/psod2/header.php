<?php
/**
 * Nagłówek motywu — otwarcie dokumentu + sticky header z logo i przełącznikiem języka.
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
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" aria-label="<?php esc_attr_e( 'Polskie Stowarzyszenie Opieki Domowej — strona główna', 'psod2' ); ?>">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/logo-psod.svg' ); ?>" alt="<?php esc_attr_e( 'Polskie Stowarzyszenie Opieki Domowej', 'psod2' ); ?>">
		</a>
		<div class="header-right">
			<?php
			// TODO: podpiąć pod TranslatePress (PL/DE/EN). Na razie statyczny wskaźnik.
			?>
			<span class="lang"><b>PL</b> | DE | EN</span>
			<button class="burger" id="menuToggle" aria-label="<?php esc_attr_e( 'Menu', 'psod2' ); ?>" aria-controls="mainNav" aria-expanded="false">
				<i></i><i></i><i></i>
			</button>
		</div>
	</div>
</header>

<!-- ======================= MENU GŁÓWNE (pełnoekranowa nakładka) ======================= -->
<nav class="mainnav" id="mainNav" aria-hidden="true" aria-label="<?php esc_attr_e( 'Menu główne', 'psod2' ); ?>">
	<div class="mainnav__inner">
		<ul class="mainnav__list">
			<li><a href="#wyzwania">Wyzwania cywilizacyjne</a></li>
			<li><a href="#priorytety">Nasze priorytety</a></li>
			<li><a href="#dzialalnosc">Nasza działalność</a></li>
			<li><a href="#apel">Apel do rządu</a></li>
			<li><a href="#publikacje">Publikacje</a></li>
			<li><a href="#">Szkolenia</a></li>
			<li><a href="#qa">Q&amp;A</a></li>
			<li><a href="#aktualnosci">Aktualności</a></li>
		</ul>
	</div>
</nav>
