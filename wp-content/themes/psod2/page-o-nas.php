<?php
/**
 * Podstrona „Czym jest PSOD?" (O nas) — slug: o-nas.
 *
 * Ten sam header/drawer/stopka i tokeny co strona główna (get_header/get_footer).
 * ETAP: treść statyczna (jak front-page.php) — docelowo pola ACF (patrz front-page.php).
 * Sekcje: 1) nagłówek strony  2) sekcja wstępna (lead + 2 akapity)  3) „PSOD
 * działa na rzecz" — 6 kart  4) pasek statystyk  5) CTA „Zadbajmy o to razem"
 * (wspólny z front-page.php). Treść wg wzorca o-nas.html dostarczonego przez
 * Stefana 2026-07-20 — wcześniejsza wersja (2-kolumnowa, 4 „obszary działania")
 * miała sparafrazowaną treść i zmyślone karty, bo prototyp nie był wtedy
 * dostarczony; ta wersja zastępuje ją treścią verbatim.
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

<!-- ======================= O PSOD — SEKCJA WSTĘPNA ======================= -->
<section class="opsod-intro">
	<div class="wrap">
		<p class="opsod-intro__lead" data-i18n="onas.opsod.lead">Polskie Stowarzyszenie Opieki Domowej reprezentuje polskich pracodawców świadczących profesjonalne usługi opieki domowej w Polsce i za granicą.</p>
		<p data-i18n="onas.opsod.p2">Opieka domowa jest jedną z form opieki długoterminowej. Pozwala osobom, które z powodu wieku, choroby, niepełnosprawności lub ograniczonej samodzielności potrzebują długotrwałego wsparcia, pozostać we własnym miejscu zamieszkania i możliwie długo zachować niezależność.</p>
		<p data-i18n="onas.opsod.p3">Członkowie PSOD świadczą przede wszystkim niemedyczną pomoc w codziennym funkcjonowaniu, w tym usługi organizowane w formule opieki domowej z zamieszkaniem (live-in care).</p>
	</div>
</section>

<!-- ======================= PSOD DZIAŁA NA RZECZ (6 kart) ======================= -->
<section class="opsod-goals">
	<div class="wrap wrap--wide">
		<div class="sec-head">
			<h2 data-i18n="onas.goals.h2">PSOD działa na rzecz:</h2>
		</div>
		<div class="opsod-goals__grid">
			<div class="opsod-goals__card">
				<div class="opsod-goals__num">01</div>
				<div class="opsod-goals__accent"></div>
				<p data-i18n="onas.goals.1">wysokich i przejrzystych standardów usług</p>
			</div>
			<div class="opsod-goals__card">
				<div class="opsod-goals__num">02</div>
				<div class="opsod-goals__accent"></div>
				<p data-i18n="onas.goals.2">bezpiecznych i uczciwych warunków pracy personelu opiekuńczego</p>
			</div>
			<div class="opsod-goals__card">
				<div class="opsod-goals__num">03</div>
				<div class="opsod-goals__accent"></div>
				<p data-i18n="onas.goals.3">ochrony interesów osób korzystających z opieki i ich rodzin</p>
			</div>
			<div class="opsod-goals__card">
				<div class="opsod-goals__num">04</div>
				<div class="opsod-goals__accent"></div>
				<p data-i18n="onas.goals.4">ograniczenia szarej strefy</p>
			</div>
			<div class="opsod-goals__card">
				<div class="opsod-goals__num">05</div>
				<div class="opsod-goals__accent"></div>
				<p data-i18n="onas.goals.5">rozwoju profesjonalnej opieki domowej jako istotnej części systemu opieki długoterminowej</p>
			</div>
			<div class="opsod-goals__card">
				<div class="opsod-goals__num">06</div>
				<div class="opsod-goals__accent"></div>
				<p data-i18n="onas.goals.6">usuwania barier w transgranicznym świadczeniu usług opieki domowej</p>
			</div>
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
