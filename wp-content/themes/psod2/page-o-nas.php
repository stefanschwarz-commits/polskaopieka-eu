<?php
/**
 * Podstrona „Czym jest PSOD?" (O nas) — slug: o-nas.
 *
 * Ten sam header/drawer/stopka i tokeny co strona główna (get_header/get_footer).
 * ETAP: treść statyczna (jak front-page.php) — docelowo pola ACF (patrz front-page.php).
 * Sekcje: 1) nagłówek strony  2) trzy akapity wstępne  3) lista „PSOD działa na rzecz"
 * 4) pasek statystyk  5) CTA „Zadbajmy o to razem" (wspólny z front-page.php).
 *
 * @package PSOD2
 */

get_header();

$assets = get_template_directory_uri() . '/assets';
?>

<!-- ======================= NAGŁÓWEK PODSTRONY ======================= -->
<section class="page-hero">
	<div class="wrap">
		<a class="page-hero__back" href="<?php echo esc_url( home_url( '/' ) ); ?>">← <span data-i18n="onas.back">Strona główna</span></a>
		<img class="page-hero__mark" src="<?php echo esc_url( $assets . '/sygnet.svg' ); ?>" alt="">
		<div class="overline" data-i18n="onas.overline">O NAS</div>
		<h1 data-i18n="onas.h1">Czym jest PSOD?</h1>
	</div>
</section>

<!-- ======================= TRZY AKAPITY WSTĘPNE ======================= -->
<section class="onas-intro">
	<div class="wrap">
		<p class="onas-intro__lead" data-i18n-html="onas.p1"><b>Polskie Stowarzyszenie Opieki Domowej</b> jest organizacją pracodawców zrzeszającą polskie firmy świadczące profesjonalne usługi opieki domowej.</p>
		<p data-i18n="onas.p2">Usługi te wspierają osoby, które z powodu wieku, choroby, niepełnosprawności lub ograniczonej samodzielności potrzebują pomocy w codziennym funkcjonowaniu.</p>
		<p data-i18n="onas.p3">Opieka domowa jest jedną z form szerszego systemu opieki długoterminowej. Działalność członków PSOD koncentruje się przede wszystkim na profesjonalnym, niemedycznym wsparciu świadczonym w miejscu zamieszkania, w tym na opiece domowej z zamieszkaniem (live-in care).</p>
	</div>
</section>

<!-- ======================= PSOD DZIAŁA NA RZECZ ======================= -->
<section class="onas-list">
	<div class="wrap">
		<div class="sec-head">
			<h2 data-i18n="onas.list.h2">PSOD działa na rzecz:</h2>
		</div>
		<div class="onas-list__grid">
			<div class="onas-list__item"><span class="arw" aria-hidden="true">→</span><span data-i18n="onas.list.1">przejrzystych regulacji dotyczących opieki domowej</span></div>
			<div class="onas-list__item"><span class="arw" aria-hidden="true">→</span><span data-i18n="onas.list.2">wysokich standardów świadczonych usług</span></div>
			<div class="onas-list__item"><span class="arw" aria-hidden="true">→</span><span data-i18n="onas.list.3">uczciwej konkurencji na rynku opieki</span></div>
			<div class="onas-list__item"><span class="arw" aria-hidden="true">→</span><span data-i18n="onas.list.4">ograniczenia szarej strefy w zatrudnianiu opiekunów</span></div>
			<div class="onas-list__item"><span class="arw" aria-hidden="true">→</span><span data-i18n="onas.list.5">likwidacji barier w opiece transgranicznej</span></div>
			<div class="onas-list__item"><span class="arw" aria-hidden="true">→</span><span data-i18n="onas.list.6">poszanowania interesów podopiecznych, ich rodzin i personelu opiekuńczego</span></div>
		</div>
	</div>
</section>

<!-- ======================= PASEK STATYSTYK ======================= -->
<section class="onas-stats">
	<div class="wrap">
		<div class="onas-stats__row">
			<span class="onas-stats__item"><strong class="onas-stats__num">16</strong> <span class="onas-stats__label" data-i18n="onas.stats.1">usługodawców</span></span>
			<span class="onas-stats__sep" aria-hidden="true">·</span>
			<span class="onas-stats__item"><strong class="onas-stats__num">6500</strong> <span class="onas-stats__label" data-i18n="onas.stats.2">opiekunów</span></span>
		</div>
	</div>
</section>

<!-- ======================= DOŁĄCZ (wspólne z front-page.php) ======================= -->
<section class="join" id="dolacz">
	<img class="join__img" src="<?php echo esc_url( $assets . '/photo-dolacz.jpg' ); ?>" alt="">
	<div class="join__veil"></div>
	<div class="join__box">
		<h2 data-i18n="join.h2">Zadbajmy o to razem.</h2>
		<p data-i18n="join.p">PSOD zrzesza firmy opieki domowej, by wspólnie reprezentować branżę wobec decydentów i mediów — w Polsce i w Unii Europejskiej. Im więcej pracodawców z nami działa, tym skuteczniej chronimy interesy opiekunów i seniorów oraz budujemy standardy godnej opieki.</p>
		<div class="join__cta">
			<a class="fill" href="<?php echo esc_url( home_url( '/#dolacz' ) ); ?>" data-i18n="join.cta1">Dołącz do PSOD</a>
		</div>
	</div>
</section>

<?php
get_footer();
