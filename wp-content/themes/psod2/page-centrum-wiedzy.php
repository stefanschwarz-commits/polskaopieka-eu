<?php
/**
 * Podstrona „Centrum wiedzy o opiece domowej" — slug: centrum-wiedzy.
 *
 * Przeszukiwalne, kategoryzowane FAQ (47 pytań / 8 kategorii) wg handoffu
 * dostarczonego przez Stefana 2026-07-20 (design_handoff_centrum_wiedzy/).
 *
 * UWAGA: treść merytoryczna (pytania, odpowiedzi, źródła) to PROPOZYCJA
 * wymagająca weryfikacji PSOD — patrz pole `_source` w pliku danych i
 * README.md z oryginalnego pakietu handoff. Nie są to zweryfikowane fakty.
 *
 * Ten sam header/drawer/stopka i tokeny co reszta motywu (get_header/get_footer).
 * Statyczny szkielet PHP (hero + wyszukiwarka + sekcja dolna) — trzy widoki
 * (strona główna kategorii / widok kategorii / wyniki wyszukiwania) renderuje
 * js/centrum-wiedzy.js na podstawie assets/dane-centrum-wiedzy.json.
 *
 * @package PSOD2
 */

get_header();

$assets = get_template_directory_uri() . '/assets';
?>

<!-- ======================= HERO / WYSZUKIWARKA ======================= -->
<section class="kb-hero">
	<div class="wrap kb-hero__wrap">
		<div class="overline" data-i18n="kb.overline">Centrum wiedzy</div>
		<h1 data-i18n="kb.h1">Centrum wiedzy o opiece domowej</h1>
		<p class="kb-hero__lead" data-i18n="kb.lead">Znajdź odpowiedzi na najważniejsze pytania dotyczące opieki długoterminowej, bezpieczeństwa, praw osób korzystających z opieki, finansowania i organizacji usług.</p>

		<div class="kb-search">
			<span class="kb-search__icon" aria-hidden="true"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"><circle cx="11" cy="11" r="7"></circle><path d="M21 21l-4.3-4.3"></path></svg></span>
			<input type="search" id="kbSearchInput" class="kb-search__input" placeholder="Wpisz pytanie lub szukane zagadnienie" aria-label="Wpisz pytanie lub szukane zagadnienie">
			<button type="button" id="kbSearchClear" class="kb-search__clear" hidden aria-label="Wyczyść wyszukiwanie">×</button>
		</div>

		<div class="kb-popular" id="kbPopular">
			<span class="kb-popular__label" data-i18n="kb.popular">Popularne:</span>
			<button type="button" class="kb-chip" data-q="opieka długoterminowa">Opieka długoterminowa</button>
			<button type="button" class="kb-chip" data-q="wybrać bezpiecznego usługodawcę">Bezpieczny usługodawca</button>
			<button type="button" class="kb-chip" data-q="ile kosztuje opieka">Ile kosztuje opieka</button>
			<button type="button" class="kb-chip" data-q="prawa osoba korzystająca opieki">Prawa osoby korzystającej</button>
		</div>
	</div>
</section>

<div id="kbRegion"></div>

<!-- ======================= DYNAMICZNY WIDOK (JS: js/centrum-wiedzy.js) ======================= -->
<div id="kbMain" data-assets="<?php echo esc_url( $assets ); ?>" data-data-url="<?php echo esc_url( $assets . '/dane-centrum-wiedzy.json' ); ?>"></div>

<!-- ======================= RAPORTY + KONTAKT (statyczne, zawsze na dole) ======================= -->
<section class="kb-bottom">
	<div class="wrap wrap--wide">
		<div class="kb-bottom__grid">
			<div class="kb-bottom__card">
				<div class="overline" data-i18n="kb.reports.overline">Raporty, dane i opracowania</div>
				<h3 data-i18n="kb.reports.h3">Zobacz źródła, na których opieramy publikowane informacje</h3>
				<p data-i18n="kb.reports.p">Zbieramy raporty i dane krajowe oraz międzynarodowe wraz z linkami i datami aktualizacji.</p>
				<a class="btn btn--secondary" href="#dane" id="kbGoDane" data-i18n="kb.reports.cta">Przejdź do źródeł</a>
			</div>
			<div class="kb-bottom__card kb-bottom__card--care">
				<div class="overline" style="color:var(--opieka)" data-i18n="kb.contact.overline">Nie znalazłeś odpowiedzi?</div>
				<h3 data-i18n="kb.contact.h3">Napisz do nas lub zaproponuj pytanie do Centrum wiedzy</h3>
				<p data-i18n="kb.contact.p">Nie znalazłeś informacji, której szukasz? Chętnie uzupełnimy Centrum wiedzy o brakujące zagadnienia.</p>
				<a class="btn btn--primary" href="mailto:kontakt@polskaopieka.eu" data-i18n="kb.contact.cta">Skontaktuj się z PSOD</a>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
