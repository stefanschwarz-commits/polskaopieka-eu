<?php
/**
 * page-filary-opieki-domowej.php — podstrona „Pięć filarów dobrej opieki domowej".
 *
 * WordPress używa tego szablonu automatycznie dla strony o slugu
 * „filary-opieki-domowej" (hierarchia szablonów: page-{slug}.php).
 *
 * Cała treść pochodzi z JEDNEGO modelu danych psod2_filary_data() (functions.php),
 * renderowanego po stronie serwera (treść w HTML, dostępna bez JavaScriptu). Ten sam
 * model zasila karty na stronie głównej. Ikony to dekoracja — nie zaszywamy w nich treści.
 *
 * Meta title/description/canonical + BreadcrumbList + WebPage: functions.php
 * (psod2_seo_context / pre_get_document_title / psod2_jsonld).
 *
 * @package PSOD2
 */

get_header();

$psod2_filary = psod2_filary_data();
?>

<article class="filary">

	<!-- ======================= NAGŁÓWEK ======================= -->
	<div class="prio-head">
		<div class="wrap">
			<nav class="breadcrumb" aria-label="Ścieżka nawigacyjna">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Strona główna</a>
				<span class="breadcrumb__sep" aria-hidden="true">/</span>
				<span aria-current="page">Filary opieki domowej</span>
			</nav>

			<div class="prio-eyebrow">
				<span class="prio-badge">Zasady jakości PSOD</span>
			</div>

			<h1>Pięć filarów dobrej opieki domowej</h1>

			<p class="filary-lead">Dobra opieka domowa powinna pomagać człowiekowi żyć możliwie samodzielnie, bezpiecznie i zgodnie z własnymi preferencjami. Wymaga również odpowiedzialnej organizacji usługi oraz poszanowania praw personelu opiekuńczego.</p>
		</div>
	</div>

	<div class="filary-wrap">

		<!-- ======================= WYRÓŻNIONA INFORMACJA ======================= -->
		<div class="filary-note" role="note">
			<p>Poniższe filary opisują zasady jakości postulowane przez PSOD. Stanowią punkt wyjścia do pracy nad szczegółowymi standardami profesjonalnej opieki domowej, a nie opis obowiązującego obecnie w Polsce jednolitego standardu prawnego.</p>
		</div>

		<!-- ======================= NAWIGACJA PO FILARACH ======================= -->
		<nav class="filary-nav" aria-label="Filary opieki domowej">
			<ul role="list">
				<?php foreach ( $psod2_filary as $psod2_f ) : ?>
					<li><a href="#<?php echo esc_attr( $psod2_f['slug'] ); ?>"><span class="filary-nav__num" aria-hidden="true"><?php echo esc_html( $psod2_f['num'] ); ?></span><?php echo esc_html( $psod2_f['title'] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<!-- ======================= PIĘĆ FILARÓW ======================= -->
		<?php foreach ( $psod2_filary as $psod2_f ) : ?>
			<section class="filar" id="<?php echo esc_attr( $psod2_f['slug'] ); ?>" aria-labelledby="<?php echo esc_attr( $psod2_f['slug'] ); ?>-h">
				<div class="filar__eyebrow">
					<span class="prio-num"><span class="prio-num__line" aria-hidden="true"></span>Filar <?php echo esc_html( $psod2_f['num'] ); ?></span>
				</div>
				<h2 class="filar__title" id="<?php echo esc_attr( $psod2_f['slug'] ); ?>-h"><?php echo esc_html( $psod2_f['title'] ); ?></h2>
				<p class="filar__intro"><?php echo esc_html( $psod2_f['intro'] ); ?></p>
				<ul class="filar__zasady">
					<?php foreach ( $psod2_f['zasady'] as $psod2_z ) : ?>
						<li><?php echo esc_html( $psod2_z ); ?></li>
					<?php endforeach; ?>
				</ul>
				<?php if ( '' !== $psod2_f['after'] ) : ?>
					<p class="filar__after"><?php echo esc_html( $psod2_f['after'] ); ?></p>
				<?php endif; ?>
				<?php if ( '' !== $psod2_f['highlight'] ) : ?>
					<div class="filary-callout" role="note">
						<p><?php echo esc_html( $psod2_f['highlight'] ); ?></p>
					</div>
				<?php endif; ?>
			</section>
		<?php endforeach; ?>

		<!-- ======================= JAK FILARY PRZEKŁADAJĄ SIĘ NA USŁUGĘ ======================= -->
		<section class="filary-apply">
			<h2>Jak filary przekładają się na organizację usługi</h2>
			<p>Filary nie powinny pozostawać wyłącznie deklaracją. Profesjonalny usługodawca powinien uwzględniać je na każdym etapie organizowania opieki.</p>
			<ul class="filar__zasady">
				<li>podczas oceny potrzeb;</li>
				<li>w umowie i opisie zakresu usług;</li>
				<li>w indywidualnym planie opieki;</li>
				<li>przy doborze i przygotowaniu personelu;</li>
				<li>w procedurach bezpieczeństwa;</li>
				<li>podczas organizowania harmonogramów i zastępstw;</li>
				<li>w sposobie dokumentowania usługi;</li>
				<li>w systemie przyjmowania skarg, zgłoszeń i informacji zwrotnych;</li>
				<li>przy okresowej ocenie jakości.</li>
			</ul>
		</section>

		<!-- ======================= CTA: STANDARDY ======================= -->
		<div class="prio-cta__card filary-cta">
			<h2>Od zasad do wspólnego standardu</h2>
			<p>Jednym z priorytetów PSOD jest opracowanie przejrzystych i możliwych do zweryfikowania standardów profesjonalnej opieki domowej.</p>
			<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/artykuly/ustanowienie-standardow-w-opiece-domowej/' ) ); ?>">Poznaj postulat ustanowienia standardów opieki domowej</a>
		</div>

	</div>
</article>

<?php
get_footer();
