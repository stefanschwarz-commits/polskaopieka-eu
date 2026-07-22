<?php
/**
 * Szablon 404 — nie znaleziono strony.
 *
 * Dedykowany, on-brand ekran błędu (wcześniej WP używał fallbacku index.php).
 * Ten sam header/stopka co reszta motywu, tokeny psod2.
 *
 * @package PSOD2
 */

get_header();
?>

<section class="err404">
	<div class="wrap">
		<div class="err404__code" aria-hidden="true">404</div>
		<h1><?php esc_html_e( 'Nie znaleziono strony', 'psod2' ); ?></h1>
		<p><?php esc_html_e( 'Strona, której szukasz, nie istnieje lub została przeniesiona. Sprawdź adres albo skorzystaj z linków poniżej.', 'psod2' ); ?></p>
		<div class="err404__cta">
			<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Wróć na stronę główną', 'psod2' ); ?></a>
		</div>
		<nav class="err404__links" aria-label="<?php esc_attr_e( 'Przydatne strony', 'psod2' ); ?>">
			<a href="<?php echo esc_url( home_url( '/aktualnosci/' ) ); ?>"><?php esc_html_e( 'Aktualności', 'psod2' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/nasze-priorytety/' ) ); ?>"><?php esc_html_e( 'Nasze priorytety', 'psod2' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/centrum-wiedzy/' ) ); ?>"><?php esc_html_e( 'Centrum wiedzy', 'psod2' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/kontakt/' ) ); ?>"><?php esc_html_e( 'Kontakt', 'psod2' ); ?></a>
		</nav>
	</div>
</section>

<?php
get_footer();
