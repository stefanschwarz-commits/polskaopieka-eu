<?php
/**
 * Podstrona „Czym jest PSOD?" (O nas) — slug: o-nas.
 *
 * Ten sam header/drawer/stopka i tokeny co strona główna (get_header/get_footer).
 * ETAP: treść statyczna (jak front-page.php) — docelowo pola ACF (patrz front-page.php).
 * Sekcje: 1) nagłówek strony  2) O PSOD, dwukolumnowo — lead+4 akapity+4 obszary
 * działania (przeniesione tu ze strony głównej na prośbę Stefana, patrz git log)
 * 3) pasek statystyk  4) CTA „Zadbajmy o to razem" (wspólny z front-page.php).
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

<!-- ======================= O PSOD (przeniesione ze strony głównej) ======================= -->
<section class="opsod">
	<div class="wrap wrap--wide">
		<div class="opsod__grid">
			<div class="opsod__col">
				<h2 data-i18n="onas.opsod.lead">Reprezentujemy polskie firmy świadczące profesjonalne usługi opieki domowej.</h2>
				<p data-i18n="onas.opsod.p1">Polskie Stowarzyszenie Opieki Domowej jest związkiem pracodawców zrzeszającym polskie przedsiębiorstwa świadczące profesjonalne usługi opieki domowej.</p>
				<p data-i18n="onas.opsod.p2">Członkowie PSOD wspierają osoby, które z powodu wieku, choroby, niepełnosprawności lub ograniczonej samodzielności potrzebują pomocy w codziennym funkcjonowaniu. Ich działalność koncentruje się przede wszystkim na niemedycznym wsparciu świadczonym w miejscu zamieszkania, w tym na opiece domowej z zamieszkaniem (live-in care).</p>
				<p data-i18n="onas.opsod.p3">Opieka domowa jest jedną z form szerszego systemu opieki długoterminowej. Nie zastępuje opieki medycznej, pielęgniarskiej ani wsparcia rodziny, lecz powinna być z nimi odpowiednio skoordynowana.</p>
				<p data-i18n="onas.opsod.p4">PSOD działa na rzecz wysokich standardów usług, przejrzystych regulacji, uczciwej konkurencji oraz poszanowania interesów osób korzystających z opieki, ich rodzin i personelu opiekuńczego.</p>
			</div>
			<div class="opsod__areas">
				<div class="opsod__area">
					<div class="opsod__area-accent"></div>
					<h3 data-i18n="onas.opsod.area1.h">Wysokie standardy usług</h3>
					<p data-i18n="onas.opsod.area1.p">Rozwijamy zasady jakości i odpowiedzialnej organizacji opieki.</p>
				</div>
				<div class="opsod__area">
					<div class="opsod__area-accent"></div>
					<h3 data-i18n="onas.opsod.area2.h">Bezpieczeństwo opieki</h3>
					<p data-i18n="onas.opsod.area2.p">Chronimy interesy osób korzystających z opieki, ich rodzin i personelu.</p>
				</div>
				<div class="opsod__area">
					<div class="opsod__area-accent"></div>
					<h3 data-i18n="onas.opsod.area3.h">Przejrzyste regulacje</h3>
					<p data-i18n="onas.opsod.area3.p">Działamy na rzecz jasnych, stabilnych i możliwych do stosowania przepisów.</p>
				</div>
				<div class="opsod__area">
					<div class="opsod__area-accent"></div>
					<h3 data-i18n="onas.opsod.area4.h">Uczciwa konkurencja</h3>
					<p data-i18n="onas.opsod.area4.p">Wspieramy profesjonalny rynek oparty na równych zasadach.</p>
				</div>
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
