<?php
/**
 * Template Name: Centrum wiedzy — źródła i metodologia
 *
 * /centrum-wiedzy/zrodla/ — rejestr źródeł S1–S4 (z psod2_kb_sources()) + metodologia.
 * SSR, dostępne bez JS. SEO/JSON-LD w functions.php.
 *
 * @package PSOD2
 */

get_header();

$psod2_sources = psod2_kb_sources();
$psod2_checked = psod2_kb_fmt_date( psod2_kb_sources_checked() );
?>

<article class="kb-sources-page">

	<div class="prio-head">
		<div class="wrap">
			<nav class="breadcrumb" aria-label="Ścieżka nawigacyjna">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Strona główna</a>
				<span class="breadcrumb__sep" aria-hidden="true">/</span>
				<a href="<?php echo esc_url( home_url( '/centrum-wiedzy/' ) ); ?>">Centrum wiedzy</a>
				<span class="breadcrumb__sep" aria-hidden="true">/</span>
				<span aria-current="page">Źródła i metodologia</span>
			</nav>
			<div class="prio-eyebrow"><span class="prio-badge">Centrum wiedzy</span></div>
			<h1>Źródła i metodologia Centrum wiedzy</h1>
			<p class="filary-lead">Publikowane odpowiedzi opieramy przede wszystkim na oficjalnych dokumentach, danych źródłowych i materiałach instytucji publicznych. Przy każdej treści wskazujemy wykorzystane źródła i datę ostatniej aktualizacji.</p>
		</div>
	</div>

	<div class="filary-wrap kb-prose">

		<h2>Jak przygotowujemy odpowiedzi</h2>
		<ul class="kb-list">
			<li>w pierwszej kolejności korzystamy z aktów prawnych, dokumentów instytucji publicznych i materiałów organizacji międzynarodowych;</li>
			<li>odróżniamy definicje międzynarodowe od pojęć używanych w polskich przepisach i systemach świadczeń;</li>
			<li>przy danych liczbowych wskazujemy rok, populację, definicję wskaźnika i grupę porównawczą;</li>
			<li>nie przedstawiamy postulatów PSOD jako neutralnych faktów;</li>
			<li>stanowiska PSOD oznaczamy oddzielnie;</li>
			<li>unikamy generalizowania na podstawie pojedynczego badania lub materiału prasowego;</li>
			<li>przy treściach zależnych od przepisów podajemy datę aktualizacji;</li>
			<li>poprawiamy treści, gdy źródło zostało zmienione, uchylone albo zastąpione.</li>
		</ul>

		<h2>Hierarchia źródeł</h2>
		<ol class="kb-hierarchy">
			<li>
				<h3><span class="kb-hierarchy__num" aria-hidden="true">1</span> Akty prawne i oficjalne dokumenty</h3>
				<p>Przepisy, dokumenty UE, strategie, oficjalne zalecenia i materiały administracji publicznej.</p>
			</li>
			<li>
				<h3><span class="kb-hierarchy__num" aria-hidden="true">2</span> Dane i raporty źródłowe</h3>
				<p>Publikacje GUS, Eurostatu, OECD, WHO, Komisji Europejskiej, ministerstw i innych instytucji publicznych.</p>
			</li>
			<li>
				<h3><span class="kb-hierarchy__num" aria-hidden="true">3</span> Badania naukowe i ekspertyzy</h3>
				<p>Badania recenzowane, raporty o jasno opisanej metodologii i ekspertyzy uznanych instytucji.</p>
			</li>
			<li>
				<h3><span class="kb-hierarchy__num" aria-hidden="true">4</span> Stanowiska i materiały PSOD</h3>
				<p>Dokumenty przedstawiające ocenę, postulaty lub rekomendacje Stowarzyszenia, zawsze wyraźnie oznaczone jako stanowisko PSOD.</p>
			</li>
		</ol>

		<h2>Źródła wykorzystane w pierwszych odpowiedziach</h2>
		<ul class="kb-srcreg" role="list">
			<?php
			foreach ( $psod2_sources as $sid => $s ) :
				$meta = $s['type'];
				if ( ! empty( $s['date'] ) ) {
					$meta .= ' · ' . psod2_kb_fmt_date( $s['date'] );
				}
				$meta .= ' · ' . $s['lang'];
				?>
				<li class="kb-srcreg__item">
					<span class="kb-srcreg__id" aria-hidden="true"><?php echo esc_html( $sid ); ?></span>
					<div class="kb-srcreg__body">
						<span class="kb-srcreg__inst"><?php echo esc_html( $s['institution'] ); ?></span>
						<span class="kb-srcreg__title"><?php echo esc_html( $s['title'] ); ?></span>
						<span class="kb-srcreg__meta"><?php echo esc_html( $meta ); ?></span>
						<p class="kb-srcreg__use"><?php echo esc_html( $s['usage'] ); ?></p>
						<div class="kb-srcreg__foot">
							<a class="kb-srcreg__link" href="<?php echo esc_url( $s['url'] ); ?>">Otwórz źródło</a>
							<span class="kb-srcreg__checked">Sprawdzono: <?php echo esc_html( $psod2_checked ); ?></span>
						</div>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>

		<h2>Jak czytać dane publikowane przez PSOD</h2>
		<p>Ta sama nazwa wskaźnika może odnosić się do różnych lat, grup wieku, zawodów, miejsc świadczenia opieki lub sposobów przeliczania zatrudnienia. Dlatego każda publikowana liczba powinna mieć metryczkę pozwalającą zrozumieć, czego dokładnie dotyczy.</p>
		<div class="kb-metric" role="group" aria-label="Przykładowa metryczka danych">
			<p class="kb-metric__label">Przykładowa metryczka danych (wzór — bez rzeczywistych liczb):</p>
			<dl class="kb-metric__grid">
				<dt>Wartość</dt><dd>—</dd>
				<dt>Rok</dt><dd>—</dd>
				<dt>Obszar geograficzny</dt><dd>—</dd>
				<dt>Badana populacja</dt><dd>—</dd>
				<dt>Definicja wskaźnika</dt><dd>—</dd>
				<dt>Źródło</dt><dd>—</dd>
				<dt>Data aktualizacji</dt><dd>—</dd>
			</dl>
		</div>

		<h2>Zgłoś błąd lub nieaktualne źródło</h2>
		<p>Jeżeli zauważysz błąd, niedziałający link albo nowsze źródło, napisz do PSOD. Przy zgłoszeniu podaj adres strony i fragment wymagający sprawdzenia.</p>
		<p><a class="btn btn--primary" href="<?php echo esc_url( home_url( '/kontakt/' ) ); ?>">Zgłoś uwagę</a></p>

		<p class="kb-back"><a href="<?php echo esc_url( home_url( '/centrum-wiedzy/' ) ); ?>"><span aria-hidden="true">←</span> Wróć do Centrum wiedzy</a></p>

	</div>
</article>

<?php
get_footer();
