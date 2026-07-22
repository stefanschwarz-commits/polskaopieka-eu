<?php
/**
 * page-centrum-wiedzy.php — indeks Centrum wiedzy (slug: centrum-wiedzy).
 *
 * Pełne SSR: wszystkie karty odpowiedzi obecne w HTML (dostępne bez JS). Wyszukiwarka
 * (js/centrum-wiedzy.js) tylko filtruje widoczne karty — progressive enhancement.
 * Jedno źródło danych: psod2_kb_articles(). SEO/JSON-LD w functions.php.
 *
 * @package PSOD2
 */

get_header();

$psod2_articles = psod2_kb_articles();
$psod2_cards    = array(
	'czym-jest-opieka-dlugoterminowa',
	'czym-jest-opieka-domowa',
	'czym-jest-opieka-domowa-z-zamieszkaniem',
	'opieka-formalna-i-nieformalna',
	'pomoc-niemedyczna-a-opieka-medyczna',
);
$psod2_count = count( $psod2_cards );
?>

<!-- ======================= NAGŁÓWEK ======================= -->
<div class="prio-head">
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
		<a class="kb-chip" href="<?php echo esc_url( psod2_kb_article_url( 'czym-jest-opieka-dlugoterminowa' ) ); ?>">Czym jest opieka długoterminowa?</a>
		<a class="kb-chip" href="<?php echo esc_url( psod2_kb_article_url( 'czym-jest-opieka-domowa-z-zamieszkaniem' ) ); ?>">Czym jest opieka domowa z zamieszkaniem?</a>
		<a class="kb-chip" href="<?php echo esc_url( psod2_kb_article_url( 'opieka-formalna-i-nieformalna' ) ); ?>">Opieka formalna i nieformalna</a>
		<a class="kb-chip" href="<?php echo esc_url( psod2_kb_article_url( 'pomoc-niemedyczna-a-opieka-medyczna' ) ); ?>">Pomoc niemedyczna a opieka medyczna</a>
	</div>

	<!-- ======================= KATEGORIA: PODSTAWOWE POJĘCIA ======================= -->
	<section class="kb-category" aria-labelledby="kb-cat-h">
		<div class="kb-category__head">
			<h2 id="kb-cat-h">Podstawowe pojęcia</h2>
			<p class="kb-category__desc">Najważniejsze definicje potrzebne do zrozumienia opieki długoterminowej i domowej.</p>
			<p class="kb-category__count"><?php echo esc_html( $psod2_count ); ?> odpowiedzi</p>
		</div>

		<ul class="kb-cards" id="kbCards" role="list">
			<?php
			foreach ( $psod2_cards as $psod2_s ) :
				if ( ! isset( $psod2_articles[ $psod2_s ] ) ) {
					continue;
				}
				$a       = $psod2_articles[ $psod2_s ];
				$haystack = mb_strtolower(
					trim( preg_replace( '/\s+/', ' ', preg_replace( '/\{S\d+\}/', '', $a['title'] . ' ' . $a['shortAnswer'] . ' ' . $a['excerpt'] . ' ' . implode( ' ', $a['keywords'] ) . ' ' . $a['category'] ) ) )
				);
				?>
				<li class="kb-card" data-kb-search="<?php echo esc_attr( $haystack ); ?>">
					<span class="kb-card__cat"><?php echo esc_html( $a['category'] ); ?></span>
					<h3 class="kb-card__title"><a class="kb-card__link" href="<?php echo esc_url( psod2_kb_article_url( $psod2_s ) ); ?>"><?php echo esc_html( $a['title'] ); ?></a></h3>
					<p class="kb-card__desc"><?php echo esc_html( $a['excerpt'] ); ?></p>
					<span class="kb-card__more" aria-hidden="true">Czytaj odpowiedź →</span>
				</li>
			<?php endforeach; ?>
		</ul>

		<p class="kb-noresults" id="kbNoResults" hidden>Nie znaleźliśmy odpowiedzi pasującej do tego wyszukiwania. Spróbuj użyć krótszego hasła lub zaproponuj nowe pytanie.</p>
	</section>

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
