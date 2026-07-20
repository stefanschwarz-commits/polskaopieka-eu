<?php
/**
 * Template Name: Pismo — stanowisko A4
 *
 * Samodzielny dokument (papier firmowy PSOD + KIDO) — czytelna, dostępna wersja
 * wspólnego stanowiska z 15 czerwca 2026, jako arkusze A4 do druku/PDF.
 * Odtworzenie prototypu design_handoff_psod/pismo-stanowisko.html — treść 1:1.
 *
 * Świadomie NIE używa get_header()/get_footer() — to dokument, nie strona serwisu
 * (bez sticky-nawigacji). Motywowe style/skrypty są wyłączane dla tego szablonu
 * w functions.php (psod2_stanowisko_assets), zostają tylko fonty (Poppins).
 * Na ekranie: responsywne arkusze; przy druku: wierne A4 (@page).
 *
 * @package PSOD2
 */

$psod2_assets = get_template_directory_uri() . '/assets';
$psod2_pdf    = $psod2_assets . '/stanowisko-PSOD-KIDO.pdf';

// Wspólny nagłówek (loga) i stopka (dane rejestrowe) każdego arkusza.
$psod2_doc_head = '<div class="doc-head">'
	. '<img class="psod" src="' . esc_url( $psod2_assets . '/logo-psod-lockup.jpg' ) . '" alt="' . esc_attr__( 'Polskie Stowarzyszenie Opieki Domowej — polskaopieka.eu', 'psod2' ) . '">'
	. '<img class="kido" src="' . esc_url( $psod2_assets . '/logo-kido.png' ) . '" alt="' . esc_attr__( 'Krajowa Izba Domów Opieki', 'psod2' ) . '">'
	. '</div>';

$psod2_doc_foot = '<div class="doc-foot">'
	. '<div><strong>Polskie Stowarzyszenie Opieki Domowej · PSOD</strong>www.polskaopieka.eu<br>Nowy Świat 54/56 · 00-363 Warszawa</div>'
	. '<div style="text-align:right"><strong>Krajowa Izba Domów Opieki · KIDO</strong>www.kido.org.pl<br>ul. Młynarska 3 · 56-400 Oleśnica</div>'
	. '</div>';

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo esc_html__( 'Wspólne stanowisko PSOD i KIDO — 15 czerwca 2026', 'psod2' ); ?></title>
	<?php wp_head(); ?>
	<style>
		:root{ --fiolet:#BB16A3; --tekst:#4A4B52; --tekst-2:#7B7C84; --linia:#E6E6E9; }
		body.pismo-doc{ margin:0; padding:0; background:#ece8dd; font-family:'Poppins',system-ui,sans-serif; color:var(--tekst); -webkit-font-smoothing:antialiased; }
		body.pismo-doc *{ box-sizing:border-box; }

		/* Pasek narzędzi (nie drukowany) */
		.pismo-bar{ position:sticky; top:0; z-index:10; display:flex; align-items:center; justify-content:space-between; gap:16px; flex-wrap:wrap; background:rgba(255,255,255,.92); backdrop-filter:blur(10px); border-bottom:1px solid var(--linia); padding:12px 24px; }
		.pismo-bar a{ font-size:14px; font-weight:500; text-decoration:none; color:var(--tekst); display:inline-flex; align-items:center; gap:8px; }
		.pismo-bar a:hover{ color:var(--fiolet); }
		.pismo-bar .pdf{ background:var(--fiolet); color:#fff; padding:10px 22px; border-radius:999px; }
		.pismo-bar .pdf:hover{ background:#9C118A; color:#fff; }

		/* Blat + kolumna arkuszy */
		.desk{ display:flex; flex-direction:column; align-items:center; gap:28px; padding:40px 20px 64px; }

		/* Arkusz A4 */
		.pismo-page{ width:210mm; max-width:100%; min-height:297mm; background:#fff; box-shadow:0 2px 14px rgba(20,20,19,.12); border-radius:2px; padding:17mm 19mm; display:flex; flex-direction:column; overflow:hidden; }
		.pismo-page__body{ flex:1 1 auto; min-height:0; }

		.doc-head{ display:flex; align-items:center; justify-content:space-between; gap:24px; padding-bottom:10px; }
		.doc-head img.psod{ height:60px; display:block; }
		.doc-head img.kido{ height:70px; display:block; }

		.doc-foot{ display:flex; justify-content:space-between; gap:32px; border-top:1px solid var(--linia); padding-top:8px; margin-top:14px; font-size:7.6pt; line-height:1.5; color:var(--tekst-2); }
		.doc-foot strong{ display:block; color:var(--fiolet); font-weight:600; font-size:8pt; letter-spacing:.02em; margin-bottom:2px; }

		.pismo{ font-size:11pt; line-height:1.62; color:var(--tekst); }
		.pismo .date{ text-align:center; font-size:9pt; font-weight:600; letter-spacing:.14em; color:var(--tekst-2); margin:14px 0 26px; }
		.pismo h1{ text-align:center; font-weight:700; font-size:14.5pt; line-height:1.3; text-transform:uppercase; color:var(--tekst); margin:0 0 8px; letter-spacing:.005em; }
		.pismo .subtitle{ text-align:center; font-weight:600; font-size:9.5pt; line-height:1.45; text-transform:uppercase; color:var(--tekst-2); letter-spacing:.02em; max-width:80%; margin:0 auto 30px; }
		.pismo p{ margin:0 0 12px; text-align:justify; text-wrap:pretty; }
		.pismo .lead{ color:var(--fiolet); font-weight:500; font-size:11.5pt; line-height:1.6; margin-bottom:20px; }
		.pismo .intro-apel{ font-weight:600; margin-top:4px; }
		.pismo ol{ margin:0 0 14px; padding-left:26px; }
		.pismo ol li{ margin-bottom:9px; text-align:justify; padding-left:4px; }
		.pismo b, .pismo strong{ font-weight:600; color:var(--tekst); }

		.sign{ display:flex; gap:48px; margin-top:40px; break-inside:avoid; }
		.sign__col{ flex:1; text-align:center; }
		.sign__img{ height:60px; display:block; margin:0 auto 6px; }
		.sign__role{ font-size:9.5pt; line-height:1.4; color:var(--tekst-2); }
		.sign__name{ font-weight:600; font-size:10.5pt; color:var(--tekst); margin-top:4px; }

		/* Ekran wąski: arkusze płynne i czytelne (bez sztywnego A4, min. 16px) */
		@media(max-width:800px){
			.desk{ padding:20px 12px 48px; gap:18px; }
			.pismo-page{ width:100%; min-height:0; padding:28px 22px; }
			.doc-head img.psod{ height:44px; } .doc-head img.kido{ height:52px; }
			.pismo{ font-size:16px; line-height:1.7; }
			.pismo h1{ font-size:21px; } .pismo .subtitle{ font-size:14px; max-width:100%; }
			.pismo .lead{ font-size:16.5px; }
			.doc-foot{ font-size:11px; flex-wrap:wrap; }
			.doc-foot strong{ font-size:11.5px; }
			.sign{ gap:24px; }
		}

		/* Druk: wierne A4 */
		@page{ size:A4; margin:0; }
		@media print{
			.pismo-bar{ display:none; }
			body.pismo-doc{ background:none; }
			.desk{ gap:0; padding:0; }
			.pismo-page{ width:210mm; min-height:297mm; padding:17mm 19mm; box-shadow:none; border-radius:0; break-after:page; }
			.pismo-page:last-child{ break-after:auto; }
			.pismo{ font-size:11pt; line-height:1.62; }
			.pismo h1{ font-size:14.5pt; } .pismo .subtitle{ font-size:9.5pt; max-width:80%; }
			.pismo .lead{ font-size:11.5pt; }
			.doc-foot{ font-size:7.6pt; } .doc-foot strong{ font-size:8pt; }
		}
		@media(prefers-reduced-motion:reduce){ *{ transition:none!important; } }
	</style>
</head>

<body <?php body_class( 'pismo-doc' ); ?>>

<div class="pismo-bar">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span aria-hidden="true">←</span> <?php esc_html_e( 'Wróć do strony', 'psod2' ); ?></a>
	<a class="pdf" href="<?php echo esc_url( $psod2_pdf ); ?>" download><?php esc_html_e( 'Pobierz PDF (5 stron)', 'psod2' ); ?></a>
</div>

<div class="desk">

	<!-- ============ STRONA 1 ============ -->
	<div class="pismo-page">
		<?php echo $psod2_doc_head; // phpcs:ignore WordPress.Security.EscapeOutput ?>
		<div class="pismo-page__body">
			<div class="pismo">
				<div class="date">15 CZERWCA 2026</div>
				<h1>Wspólne stanowisko Polskiego Stowarzyszenia Opieki Domowej oraz Krajowej Izby Domów Opieki</h1>
				<div class="subtitle">dotyczące zawieszenia prac nad projektem rozporządzenia w sprawie wykazu określającego grupy zawodów, w których występują niedobory kadrowe</div>

				<p class="lead">W imieniu naszego środowiska wyrażamy głębokie zaniepokojenie zawieszeniem prac nad projektem rozporządzenia w sprawie wykazu określającego grupy zawodów, w których występują niedobory kadrowe.</p>

				<p>Decyzja o wstrzymaniu prac nad tym aktem wykonawczym jest dla naszego środowiska niezrozumiała. Projekt miał stworzyć bardziej racjonalny, przewidywalny i odpowiedzialny mechanizm legalnego zatrudniania w zawodach trwale deficytowych. Zawieszenie prac nad projektem pozbawia przedsiębiorców, administrację publiczną i osoby wymagające opieki narzędzia, które miało odpowiadać na realny i narastający problem kadrowy.</p>

				<p>Ponad 300 zawodów ujętych w wykazie miało zostać objętych priorytetowym trybem uzyskiwania zezwoleń na pracę dla osób spoza UE — posiadających kluczowe dla naszego społeczeństwa kompetencje zawodowe, takie jak opiekunowie osób starszych, pielęgniarze czy lekarze. Projekt rozporządzenia nie miał na celu zmiany ogólnych zasad dostępu cudzoziemców do polskiego rynku pracy. Jego istotą było rozróżnienie trybu rozpatrywania spraw w zależności od rzeczywistych potrzeb kadrowych poszczególnych zawodów. Priorytetem miały zostać objęte te zawody, w których brak pracowników ma charakter trwały, strukturalny i potwierdzony praktyką rynku pracy.</p>
			</div>
		</div>
		<?php echo $psod2_doc_foot; // phpcs:ignore WordPress.Security.EscapeOutput ?>
	</div>

	<!-- ============ STRONA 2 ============ -->
	<div class="pismo-page">
		<?php echo $psod2_doc_head; // phpcs:ignore WordPress.Security.EscapeOutput ?>
		<div class="pismo-page__body">
			<div class="pismo">
				<p>Trudno zrozumieć, co wydarzyło się między publikacją projektu a decyzją o zawieszeniu prac. Problem niedoborów kadrowych w opiece nie zniknął. Potrzeby osób starszych, chorych i niesamodzielnych nie zmalały. Braki kadrowe w zawodach opiekuńczych nie zostały nagle uzupełnione. Zawieszono natomiast prace nad aktem wykonawczym, który miał być fundamentem rozwiązań odpowiadających na realne potrzeby pracodawców świadczących opiekę domową i instytucjonalną — w sektorze o nieustannie rosnącym zapotrzebowaniu na wykwalifikowaną kadrę.</p>

				<p>Wydanie rozporządzenia nie było opcjonalne — było fundamentalne dla branży opieki domowej i instytucjonalnej, która od lat zmaga się z niedoborem doświadczonych opiekunów. Jego celem było uporządkowanie i przyspieszenie legalnego zatrudniania osób spoza UE w zawodach opiekuńczych oraz zwiększenie liczby osób wykonujących pracę kluczową dla bezpieczeństwa społecznego — opiekę nad osobami niesamodzielnymi.</p>

				<p>Wykaz miał wskazywać obszary, w których brak pracowników jest rzeczywisty, trwały i potwierdzany danymi z rynku pracy. W przypadku opieki domowej i instytucjonalnej deficyt opiekunów jest dokładnie takim brakiem — trwałym, rosnącym i od lat sygnalizowanym przez pracodawców. Dlatego zawieszenie prac odbieramy jako utratę instrumentu, który mógł wspierać zarówno przedsiębiorców z sektora opieki, jak i administrację publiczną we wspólnym wyrównywaniu jednego z najgłębszych i najtrwalszych niedoborów kadrowych na polskim rynku pracy.</p>

				<p>W opublikowanym projekcie znalazły się wszystkie kluczowe zawody opiekuńcze: opiekun osoby starszej, opiekun w domu pomocy społecznej, opiekunka środowiskowa, opiekun medyczny, opiekunka domowa oraz pozostali pracownicy domowej opieki osobistej. Był to ważny sygnał, że kryzys kadrowy w opiece został wreszcie formalnie dostrzeżony. Wskutek zawieszenia prac zawody te nie zostały jednak uznane za deficytowe.</p>
			</div>
		</div>
		<?php echo $psod2_doc_foot; // phpcs:ignore WordPress.Security.EscapeOutput ?>
	</div>

	<!-- ============ STRONA 3 ============ -->
	<div class="pismo-page">
		<?php echo $psod2_doc_head; // phpcs:ignore WordPress.Security.EscapeOutput ?>
		<div class="pismo-page__body">
			<div class="pismo">
				<p>Bezprecedensowe zawieszenie prac nad rozporządzeniem jest krokiem, którego konsekwencje odczują przede wszystkim podopieczni i pacjenci wymagający opieki. Powstaje pytanie, dlaczego — zamiast adresować rozpoznany i wielokrotnie potwierdzany problem niedoborów kadrowych w opiece domowej i instytucjonalnej — Ministerstwo Rodziny, Pracy i Polityki Społecznej marginalizuje go, argumentując rosnącym bezrobociem.</p>

				<p>Argument o rosnącym bezrobociu jest nieadekwatny wobec bezrobocia strukturalnego, z którym mamy do czynienia w zawodach opiekuńczych. Głównym problemem jest tu niedopasowanie kwalifikacji, doświadczenia, predyspozycji i gotowości pracowników do faktycznych potrzeb branży. Sama liczba osób pozostających bez pracy nie przekłada się na dostępność opiekunów osób starszych, opiekunów medycznych czy pielęgniarek — to zawody wymagające specjalistycznych kompetencji, odpowiednich predyspozycji, a często uprawnień i doświadczenia w ochronie zdrowia. Wzrost ogólnego bezrobocia nie tworzy z dnia na dzień tysięcy opiekunów gotowych do pracy z osobami starszymi, chorymi i niesamodzielnymi. Właśnie dlatego potrzebny jest wykaz zawodów deficytowych — by odróżnić ogólną sytuację na rynku pracy od konkretnego, trwałego braku opiekunów.</p>

				<p>Odpowiedzialna polityka rynku pracy powinna uwzględniać nie tylko liczbę osób bezrobotnych, lecz także strukturę kwalifikacji, realną gotowość do pracy w określonych zawodach oraz potrzeby sektorów, w których brak pracowników zagraża ciągłości usług — i to nie tylko w skali krajowej, ale i europejskiej. Potwierdza to Europejski Urząd ds. Pracy (ELA) w raporcie EURES 2025 (Report on labour shortages and surpluses 2025), zgodnie z którym niedobory w sektorze opieki mają charakter trwały i strukturalny — wynikają m.in. z niedopasowania kwalifikacji, zmian demograficznych, trudnych warunków pracy oraz ograniczonej mobilności pracowników. Polska jest jednym z 12 państw członkowskich, które zgłosiły niedobór pracowników opieki domowej. W tych okolicznościach wzrost ogólnego bezrobocia nie jest racjonalnym argumentem za wstrzymaniem prac nad rozporządzeniem — osoby pozostające bez pracy nie stają się automatycznie opiekunami osób starszych ani pracownikami opieki domowej.</p>
			</div>
		</div>
		<?php echo $psod2_doc_foot; // phpcs:ignore WordPress.Security.EscapeOutput ?>
	</div>

	<!-- ============ STRONA 4 ============ -->
	<div class="pismo-page">
		<?php echo $psod2_doc_head; // phpcs:ignore WordPress.Security.EscapeOutput ?>
		<div class="pismo-page__body">
			<div class="pismo">
				<p>Opieka długoterminowa wymaga stałego i stabilnego dostępu do pracowników. Opieka domowa i instytucjonalna pełnią w Polsce ważną rolę społeczną i gospodarczą: zapewniają osobom niesamodzielnym, chorym i starszym godne życie, bezpieczeństwo i dobrostan, a ich rodzinom pozwalają utrzymać aktywność zawodową i równowagę między obowiązkami opiekuńczymi a pracą.</p>

				<p>W naszym wspólnym stanowisku z 29 listopada 2024 r. wskazywaliśmy, że w Polsce brakuje około 20 tysięcy opiekunów, a co najmniej pół miliona osób wymaga świadczeń opieki długoterminowej. Realizacja usług opiekuńczych będzie wymagać zatrudnienia 47,3 tys. osób w 2026 r., a do 2035 r. — około 100 tys. osób. Dane te pozostają aktualne. Branża działa na granicy wydolności: rodziny coraz częściej nie są w stanie zapewnić bliskim osobistej opieki, a domy opieki i podmioty świadczące opiekę domową mierzą się z rosnącym zapotrzebowaniem, rotacją personelu i brakiem dostępnych kandydatów do pracy.</p>

				<p>Praca opiekuna wymaga przygotowania, odporności i odpowiedzialności. Wykonywana jest blisko człowieka, często w jego domu, w sytuacjach choroby, niepełnosprawności, starości i utraty samodzielności. Rynek od lat pokazuje, że liczba osób gotowych do tej pracy jest niewystarczająca, a zapotrzebowanie wciąż rośnie.</p>

				<p class="intro-apel">W związku z powyższym apelujemy i wnosimy o:</p>
				<ol>
					<li>pilne przedstawienie powodów zawieszenia prac nad projektem rozporządzenia oraz wskazanie terminu powrotu do prac legislacyjnych;</li>
					<li>utrzymanie zawodów opiekuńczych w wykazie zawodów deficytowych oraz traktowanie opieki długoterminowej jako obszaru o szczególnym znaczeniu społecznym;</li>
					<li>wznowienie prac nad rozporządzeniem;</li>
					<li>podjęcie dalszych kroków zmierzających do uproszczenia procedur legalizacji pracy, zwiększenia przewidywalności decyzji administracyjnych oraz stworzenia stabilnych warunków zatrudniania opiekunów, także spoza UE.</li>
				</ol>
			</div>
		</div>
		<?php echo $psod2_doc_foot; // phpcs:ignore WordPress.Security.EscapeOutput ?>
	</div>

	<!-- ============ STRONA 5 ============ -->
	<div class="pismo-page">
		<?php echo $psod2_doc_head; // phpcs:ignore WordPress.Security.EscapeOutput ?>
		<div class="pismo-page__body">
			<div class="pismo">
				<p>Mechanizmy wsparcia branży opieki domowej i instytucjonalnej powinny uwzględniać rzeczywiste potrzeby rynku pracy, sytuację demograficzną, zapotrzebowanie na usługi opiekuńcze oraz doświadczenia pracodawców, którzy każdego dnia mierzą się z brakiem kandydatów do pracy.</p>

				<p>Opieka nad osobami starszymi, chorymi i niesamodzielnymi jest elementem bezpieczeństwa społecznego państwa, a jej niewydolność dotyka podopiecznych, ich rodziny zmuszone do ograniczania aktywności zawodowej oraz legalnie działające podmioty, które dążą do zapewnienia opieki nawet w warunkach narastającego deficytu pracowników.</p>

				<p>Państwo, które dostrzega kryzys kadrowy, powinno tworzyć narzędzia jego ograniczania. Projekt rozporządzenia był takim narzędziem. Jego zawieszenie bez planu dalszych działań pogłębia niepewność, osłabia zaufanie do procesu legislacyjnego i pozostawia bez odpowiedzi pytanie, jak Ministerstwo zamierza rozwiązać problem, który niedawno samo uznało za wymagający interwencji.</p>

				<p>Stawką jest bezpieczeństwo osób wymagających opieki, dalsze funkcjonowanie legalnie działających przedsiębiorców, ograniczenie szarej strefy oraz zdolność państwa do reagowania na realne potrzeby społeczne i gospodarcze.</p>

				<div class="sign">
					<div class="sign__col">
						<img class="sign__img" src="<?php echo esc_url( $psod2_assets . '/podpis-zaorska.png' ); ?>" alt="<?php esc_attr_e( 'Podpis — Ada Zaorska', 'psod2' ); ?>">
						<div class="sign__role">Przewodnicząca<br>Polskiego Stowarzyszenia Opieki Domowej</div>
						<div class="sign__name">Ada Zaorska</div>
					</div>
					<div class="sign__col">
						<img class="sign__img" src="<?php echo esc_url( $psod2_assets . '/podpis-lejczak.png' ); ?>" alt="<?php esc_attr_e( 'Podpis — dr Andrzej Lejczak', 'psod2' ); ?>">
						<div class="sign__role">Prezes<br>Krajowej Izby Domów Opieki KIDO</div>
						<div class="sign__name">dr Andrzej Lejczak</div>
					</div>
				</div>
			</div>
		</div>
		<?php echo $psod2_doc_foot; // phpcs:ignore WordPress.Security.EscapeOutput ?>
	</div>

</div>

<?php wp_footer(); ?>
</body>
</html>
