<?php
/**
 * Podstrona „Aktualnosci" (lista wpisow) — slug: aktualnosci.
 *
 * Wg handoffu design_handoff_aktualnosci/ dostarczonego przez Stefana 2026-07-20
 * (Aktualnosci.dc.html + README.md). Ten sam header/drawer/stopka i tokeny co
 * reszta motywu (get_header/get_footer).
 *
 * Tresc statyczna, 9 wpisow, "Wczytaj wiecej" (start 6, +3/klik) — obsluzone
 * client-side w js/psod.js (proste pokazywanie/ukrywanie juz wyrenderowanych
 * kart, bez fetch — w odroznieniu od Centrum wiedzy tu tylko 9 pozycji znanych
 * z gory, nie trzeba wynosic do JSON).
 *
 * Wyrozniony wpis linkuje do realnego artykulu-podstrony
 * /aktualnosci/rynek-opieki-na-granicy-zalamania/ (page-rynek-opieki-na-granicy-zalamania.php).
 *
 * UWAGA: nie zmieniono linku „Aktualnosci" w menu/stopce (wciaz wskazuje na
 * sekcje #aktualnosci na stronie glownej) — do decyzji Stefana, czy przekierowac
 * go na te nowa podstrone.
 *
 * @package PSOD2
 */

get_header();

$assets = get_template_directory_uri() . '/assets';

// Wszystkie 9 wpisow (tresc verbatim z handoffu). idx 1-6 widoczne od razu,
// 7-9 ukryte do "Wczytaj wiecej".
$aktual_items = array(
	array( 'title' => 'Stanowisko PSOD do projektu ustawy o bonie senioralnym', 'date' => '24 czerwca 2026', 'category' => 'Stanowisko', 'image' => 'stanowisko-psod-kido.jpg' ),
	array( 'title' => 'Raport: rynek opieki domowej w Polsce 2026 — dane i rekomendacje', 'date' => '12 czerwca 2026', 'category' => 'Publikacja', 'image' => 'report-cover.jpg' ),
	array( 'title' => 'Starzejące się społeczeństwo. Dlaczego czas działać już teraz', 'date' => '30 maja 2026', 'category' => 'Analiza', 'image' => 'wyzwanie-starzenie.jpg' ),
	array( 'title' => 'Szkolenie dla opiekunów — nowe terminy i program na jesień', 'date' => '18 maja 2026', 'category' => 'Szkolenie', 'image' => null ),
	array( 'title' => 'Opieka domowa oczami rodziny. Rozmowa o codzienności', 'date' => '6 maja 2026', 'category' => 'Media', 'image' => 'photo-opieka-01.jpeg' ),
	array( 'title' => 'Apel do rządu w sprawie ram prawnych opieki transgranicznej', 'date' => '22 kwietnia 2026', 'category' => 'Stanowisko', 'image' => null ),
	array( 'title' => 'Standardy jakości opieki — konsultacje z członkami PSOD', 'date' => '9 kwietnia 2026', 'category' => 'Wydarzenie', 'image' => 'photo-opieka-02.jpeg' ),
	array( 'title' => 'Szara strefa w opiece. Co tracą seniorzy i budżet państwa', 'date' => '27 marca 2026', 'category' => 'Analiza', 'image' => null ),
	array( 'title' => 'PSOD na posiedzeniu komisji zdrowia. Relacja i wnioski', 'date' => '14 marca 2026', 'category' => 'Media', 'image' => null ),
);
$aktual_total = count( $aktual_items );
$aktual_visible = 6;
?>

<!-- ======================= WSTEP SEKCJI ======================= -->
<section class="aktual-hero">
	<div class="wrap">
		<nav class="aktual-crumb" aria-label="<?php esc_attr_e( 'Okruszki', 'psod2' ); ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" data-i18n="aktual.crumb.home">Strona główna</a>
			<span aria-hidden="true">→</span>
			<span class="cur" data-i18n="aktual.crumb.cur">Aktualności</span>
		</nav>
		<div class="aktual-hero__inner">
			<div class="overline" data-i18n="aktual.overline">Aktualności</div>
			<h1 data-i18n="aktual.h1">Co u nas słychać</h1>
			<p data-i18n="aktual.lead">Stanowiska, komentarze i wydarzenia z życia branży opieki domowej. Śledzimy to, co dotyczy seniorów i opiekunów — i mówimy o tym otwarcie.</p>
		</div>
	</div>
</section>

<!-- ======================= WYROZNIONY WPIS ======================= -->
<section class="aktual-featured">
	<div class="wrap">
		<a class="aktual-featured__grid" href="<?php echo esc_url( home_url( '/aktualnosci/rynek-opieki-na-granicy-zalamania/' ) ); ?>">
			<div class="aktual-featured__img">
				<span class="aktual-featured__label" data-i18n="aktual.featured.label">foto wpisu · Polityka</span>
			</div>
			<div>
				<span class="tag" data-i18n="aktual.featured.tag">Wyróżnione · Stanowisko</span>
				<h2 data-i18n="aktual.featured.title">40 opiekunek potrzebnych, zgodę dostały trzy. Kto zajmie się naszymi rodzicami?</h2>
				<div class="aktual-card__date"><?php echo esc_html__( '20 lipca 2026', 'psod2' ); ?></div>
				<div class="aktual-featured__link">
					<span class="arrow-link"><span data-i18n="aktual.featured.cta">Czytaj dalej</span> <span class="arw" aria-hidden="true">→</span></span>
				</div>
			</div>
		</a>
	</div>
</section>

<!-- ======================= WSZYSTKIE WPISY ======================= -->
<section class="aktual-grid-section">
	<div class="wrap">
		<div class="aktual-grid-head">
			<h2 data-i18n="aktual.grid.h2">Wszystkie wpisy</h2>
			<span class="aktual-grid-head__counter" id="aktualCounter"><?php echo esc_html( $aktual_visible . ' z ' . $aktual_total . ' wpisów' ); ?></span>
		</div>

		<div class="aktual-grid" id="aktualGrid">
			<?php foreach ( $aktual_items as $i => $item ) : ?>
				<a class="aktual-card" href="#" data-idx="<?php echo esc_attr( $i + 1 ); ?>"<?php echo ( $i + 1 > $aktual_visible ) ? ' hidden' : ''; ?>>
					<div class="aktual-card__img">
						<?php if ( $item['image'] ) : ?>
							<img src="<?php echo esc_url( $assets . '/' . $item['image'] ); ?>" alt="">
						<?php else : ?>
							<span class="aktual-card__noimg" data-i18n="aktual.card.noimg">foto wpisu</span>
						<?php endif; ?>
					</div>
					<span class="tag"><?php echo esc_html( $item['category'] ); ?></span>
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<div class="aktual-card__date"><?php echo esc_html( $item['date'] ); ?></div>
				</a>
			<?php endforeach; ?>
		</div>

		<div class="aktual-more" id="aktualMoreWrap">
			<button type="button" class="btn btn--secondary" id="aktualMoreBtn" data-i18n="aktual.more">Wczytaj więcej</button>
		</div>
	</div>
</section>

<!-- ======================= NEWSLETTER ======================= -->
<section class="aktual-newsletter">
	<div class="wrap aktual-newsletter__grid">
		<div>
			<div class="overline" style="color:var(--opieka)" data-i18n="aktual.newsletter.overline">Newsletter</div>
			<h2 data-i18n="aktual.newsletter.h2">Bądźmy w kontakcie. Nowe stanowiska i wydarzenia — prosto do Ciebie.</h2>
		</div>
		<div class="aktual-newsletter__cta">
			<a class="btn btn--primary" href="#" data-i18n="aktual.newsletter.cta">Zapisz się</a>
		</div>
	</div>
</section>

<?php
get_footer();
