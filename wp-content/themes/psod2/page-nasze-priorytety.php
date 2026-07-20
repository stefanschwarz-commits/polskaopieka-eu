<?php
/**
 * Template Name: Nasze priorytety
 * Podstrona „Nasze priorytety" — slug: nasze-priorytety.
 *
 * 4 priorytety jako naprzemienne wiersze zdjęcie/tekst + CTA „Dołącz do nas".
 * Odtworzenie prototypu design_handoff_nasze_priorytety/ — treść 1:1, tokeny psod2.
 * Zdjęcia: istniejące w motywie kadry priorytetów (te same 4 priorytety co na
 * stronie głównej). Tło CTA: photo-dolacz.jpg. Opis jest identyczny dla wszystkich
 * 4 priorytetów (verbatim ze źródła).
 *
 * UWAGA: linki „Czytaj więcej" prowadzą do /artykuly/{slug}/ — te podstrony
 * artykułów jeszcze nie istnieją (do zbudowania osobno). Przycisk CTA → /kontakt/.
 *
 * @package PSOD2
 */

get_header();

$assets = get_template_directory_uri() . '/assets';

$npri_desc = 'Nasza działalność jest realizowana poprzez inicjowanie dialogu z przedstawicielami administracji publicznej, świata nauki, mediów, związkami zawodowymi a także samymi opiekunami.';

$npri_items = array(
	array( 'n' => '01', 'title' => 'Likwidacja barier w opiece transgranicznej',  'img' => 'prio-transgraniczna.png', 'href' => '/artykuly/likwidacja-barier-w-opiece-transgranicznej/' ),
	array( 'n' => '02', 'title' => 'Ustanowienie standardów w opiece domowej',    'img' => 'prio-standardy.png',      'href' => '/artykuly/ustanowienie-standardow-w-opiece-domowej/' ),
	array( 'n' => '03', 'title' => 'Ograniczenie szarej strefy w opiece domowej', 'img' => 'prio-szara-strefa.png',   'href' => '/artykuly/ograniczenie-szarej-strefy-w-opiece-domowej/' ),
	array( 'n' => '04', 'title' => 'Stworzenie ram prawnych dla opieki domowej',  'img' => 'prio-ramy-prawne.jpg',    'href' => '/artykuly/stworzenie-ram-prawnych-dla-opieki-domowej/' ),
);
?>

<!-- ======================= HERO TYTUŁOWY ======================= -->
<section class="npri-hero">
	<div class="wrap">
		<img class="npri-hero__mark" src="<?php echo esc_url( $assets . '/sygnet.svg' ); ?>" alt="" aria-hidden="true">
		<div class="npri-hero__over" data-i18n="npri.over">Polskie Stowarzyszenie Opieki Domowej</div>
		<h1 data-i18n="npri.h1">Nasze priorytety</h1>
	</div>
</section>

<!-- ======================= LISTA PRIORYTETÓW ======================= -->
<section class="npri-list">
	<div class="wrap">
		<?php foreach ( $npri_items as $i => $it ) : ?>
			<div class="npri-row<?php echo ( 1 === $i % 2 ) ? ' npri-row--rev' : ''; ?>">
				<div class="npri-media">
					<img src="<?php echo esc_url( $assets . '/' . $it['img'] ); ?>" alt="<?php echo esc_attr( $it['title'] ); ?>" loading="lazy">
				</div>
				<div class="npri-body">
					<div class="npri-num">
						<span class="npri-num__n"><?php echo esc_html( $it['n'] ); ?></span>
						<span class="npri-num__line" aria-hidden="true"></span>
						<span class="npri-num__label" data-i18n="npri.label">Priorytet</span>
					</div>
					<h2 data-i18n="npri.title.<?php echo esc_attr( $i + 1 ); ?>"><?php echo esc_html( $it['title'] ); ?></h2>
					<p data-i18n="npri.desc"><?php echo esc_html( $npri_desc ); ?></p>
					<a class="arrow-link" href="<?php echo esc_url( home_url( $it['href'] ) ); ?>"><span data-i18n="npri.readmore">Czytaj więcej</span> <span class="arw" aria-hidden="true">→</span></a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<!-- ======================= CTA „DOŁĄCZ DO NAS" ======================= -->
<section class="npri-cta">
	<div class="npri-cta__bg"><img src="<?php echo esc_url( $assets . '/photo-dolacz.jpg' ); ?>" alt="" aria-hidden="true"></div>
	<div class="npri-cta__scrim" aria-hidden="true"></div>
	<div class="npri-cta__card">
		<h2 data-i18n="npri.cta.h2">Dołącz do nas</h2>
		<p data-i18n="npri.cta.p">Dołącz do nas. Skontaktuj się z nami w sprawie członkostwa.</p>
		<a class="npri-cta__btn" href="<?php echo esc_url( home_url( '/kontakt/' ) ); ?>" data-i18n="npri.cta.btn">Więcej informacji</a>
	</div>
</section>

<?php
get_footer();
