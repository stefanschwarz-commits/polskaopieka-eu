<?php
/**
 * page-centrum-wiedzy.php — indeks Centrum wiedzy (slug: centrum-wiedzy).
 *
 * Pełne SSR: wszystkie karty odpowiedzi obecne w HTML (dostępne bez JS), pogrupowane
 * w kategorie. Wyszukiwarka i filtr kategorii (js/centrum-wiedzy.js) tylko filtrują
 * widoczne karty — progressive enhancement. Jedno źródło danych: psod2_kb_articles().
 * Liczniki generowane z danych (psod2_kb_articles_by_category). SEO/JSON-LD w functions.php.
 *
 * @package PSOD2
 */

get_header();

$psod2_grouped = psod2_kb_articles_by_category();
$psod2_cats    = psod2_kb_categories();
$psod2_total   = count( psod2_kb_articles() );

/** Buduje ciąg do wyszukiwania z pól odpowiedzi (tytuł, skrót, opis, słowa, kategoria). */
function psod2_kb_card_haystack( $a ) {
	return mb_strtolower(
		trim( preg_replace( '/\s+/', ' ', preg_replace( '/\{S\d+\}/', '', $a['title'] . ' ' . $a['shortAnswer'] . ' ' . $a['excerpt'] . ' ' . implode( ' ', $a['keywords'] ) . ' ' . $a['category'] ) ) )
	);
}
?>

<!-- ======================= NAGŁÓWEK ======================= -->
<div class="prio-head prio-head--center">
	<div class="wrap">
		<div class="prio-eyebrow"><span class="prio-badge">Centrum wiedzy</span></div>
		<h1>Centrum wiedzy o opiece domowej</h1>
		<p class="filary-lead">Znajdź rzetelne odpowiedzi na najważniejsze pytania dotyczące opieki długoterminowej, organizacji opieki domowej, bezpieczeństwa, praw, finansowania i personelu opiekuńczego.</p>
	</div>
</div>

<div class="filary-wrap kb-index">

	<!-- Wyróżniona informacja -->
	<div class="filary-note" role="note">
		<p>Oddzielamy neutralne informacje eksperckie od stanowisk i postulatów PSOD. Przy każdej odpowiedzi wskazujemy źródła oraz datę ostatniej aktualizacji.</p>
	</div>

	<!-- ======================= WYSZUKIWARKA ======================= -->
	<div class="kb-search" role="search">
		<label class="kb-search__label" for="kbSearchInput">Szukaj w Centrum wiedzy</label>
		<div class="kb-search__field">
			<span class="kb-search__icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"><circle cx="11" cy="11" r="7"></circle><path d="M21 21l-4.3-4.3"></path></svg></span>
			<input type="search" id="kbSearchInput" class="kb-search__input" placeholder="Np. opieka długoterminowa, opieka z zamieszkaniem, pielęgniarka" autocomplete="off">
			<button type="button" id="kbSearchClear" class="kb-search__clear" hidden>Wyczyść wyszukiwanie</button>
		</div>
		<p id="kbCount" class="kb-search__count" aria-live="polite"></p>
	</div>

	<!-- Popularne pytania (prawdziwe linki — działają bez JS) -->
	<div class="kb-popular">
		<span class="kb-popular__label">Popularne pytania:</span>
		<a class="kb-chip" href="<?php echo esc_url( psod2_kb_article_url( 'jak-wybrac-bezpiecznego-uslugodawce' ) ); ?>">Jak wybrać bezpiecznego usługodawcę?</a>
		<a class="kb-chip" href="<?php echo esc_url( psod2_kb_article_url( 'prawa-osoby-korzystajacej-z-opieki' ) ); ?>">Jakie prawa ma osoba korzystająca z opieki domowej?</a>
		<a class="kb-chip" href="<?php echo esc_url( psod2_kb_article_url( 'czym-jest-opieka-domowa-z-zamieszkaniem' ) ); ?>">Czym jest opieka domowa z zamieszkaniem?</a>
		<a class="kb-chip" href="<?php echo esc_url( psod2_kb_article_url( 'ciaglosc-opieki-i-zastepstwo' ) ); ?>">Jak zapewnić ciągłość opieki i zastępstwo?</a>
	</div>

	<!-- ======================= FILTR KATEGORII ======================= -->
	<div class="kb-filters" role="group" aria-label="Filtruj odpowiedzi według kategorii">
		<button type="button" class="kb-filter is-active" data-cat="all" aria-pressed="true">Wszystkie</button>
		<?php foreach ( $psod2_grouped as $psod2_cslug => $psod2_group ) : ?>
			<button type="button" class="kb-filter" data-cat="<?php echo esc_attr( $psod2_cslug ); ?>" aria-pressed="false"><?php echo esc_html( $psod2_cats[ $psod2_cslug ]['name'] ); ?></button>
		<?php endforeach; ?>
	</div>

	<!-- ======================= KATEGORIE + KARTY ======================= -->
	<?php foreach ( $psod2_grouped as $psod2_cslug => $psod2_group ) : ?>
		<section class="kb-category" data-cat="<?php echo esc_attr( $psod2_cslug ); ?>" aria-labelledby="kb-cat-<?php echo esc_attr( $psod2_cslug ); ?>">
			<div class="kb-category__head">
				<h2 id="kb-cat-<?php echo esc_attr( $psod2_cslug ); ?>"><?php echo esc_html( $psod2_cats[ $psod2_cslug ]['name'] ); ?></h2>
				<p class="kb-category__desc"><?php echo esc_html( $psod2_cats[ $psod2_cslug ]['desc'] ); ?></p>
				<p class="kb-category__count"><?php echo (int) count( $psod2_group ); ?>&nbsp;<?php echo esc_html( 1 === count( $psod2_group ) ? 'odpowiedź' : 'odpowiedzi' ); ?></p>
			</div>
			<ul class="kb-cards" role="list">
				<?php foreach ( $psod2_group as $psod2_s => $a ) : ?>
					<li class="kb-card" data-cat="<?php echo esc_attr( $psod2_cslug ); ?>" data-kb-search="<?php echo esc_attr( psod2_kb_card_haystack( $a ) ); ?>">
						<span class="kb-card__cat"><?php echo esc_html( $a['category'] ); ?></span>
						<h3 class="kb-card__title"><a class="kb-card__link" href="<?php echo esc_url( psod2_kb_article_url( $psod2_s ) ); ?>"><?php echo esc_html( $a['title'] ); ?></a></h3>
						<p class="kb-card__desc"><?php echo esc_html( $a['excerpt'] ); ?></p>
						<span class="kb-card__more" aria-hidden="true">Czytaj odpowiedź →</span>
					</li>
				<?php endforeach; ?>
			</ul>
		</section>
	<?php endforeach; ?>

	<p class="kb-noresults" id="kbNoResults" hidden>Nie znaleźliśmy odpowiedzi pasującej do tego wyszukiwania. Spróbuj użyć krótszego hasła lub zaproponuj nowe pytanie.</p>

	<!-- ======================= ŹRÓDŁA + KONTAKT ======================= -->
	<div class="kb-bottom__grid">
		<section class="kb-bottom__card" aria-labelledby="kb-sources-card-h">
			<h2 id="kb-sources-card-h">Raporty, dane i źródła</h2>
			<p>Sprawdź dokumenty i oficjalne materiały, na których opieramy odpowiedzi publikowane w Centrum wiedzy.</p>
			<a class="btn btn--secondary" href="<?php echo esc_url( home_url( '/centrum-wiedzy/zrodla/' ) ); ?>">Zobacz źródła i metodologię</a>
		</section>
		<section class="kb-bottom__card kb-bottom__card--care" aria-labelledby="kb-contact-card-h">
			<h2 id="kb-contact-card-h">Nie znalazłeś odpowiedzi?</h2>
			<p>Napisz do nas lub zaproponuj pytanie, które powinno znaleźć się w Centrum wiedzy.</p>
			<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/kontakt/' ) ); ?>">Zaproponuj pytanie</a>
		</section>
	</div>

</div>

<?php
get_footer();
