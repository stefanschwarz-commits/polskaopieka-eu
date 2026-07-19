<?php
/**
 * Strona główna (front page) — PSOD 2026.
 *
 * ETAP: treść statyczna (1:1 z obecnej strony, wg projektu Claude Design).
 * KOLEJNY KROK: zamiana tekstów/obrazów na pola ACF, aby były edytowalne w panelu.
 *
 * Sekcje ukryte na życzenie PSOD (do włączenia w przyszłości): Rekomendowani
 * usługodawcy, Oferta szkoleniowa, Newsletter — nie ma ich tutaj celowo.
 *
 * @package PSOD2
 */

get_header();

$assets = get_template_directory_uri() . '/assets';
// Dokument stanowiska (na razie plik w motywie; docelowo pole ACF „plik”).
$stanowisko_pdf = $assets . '/stanowisko-PSOD-KIDO.pdf';
?>

<!-- ======================= HERO ======================= -->
<section class="hero">
	<img class="hero__img" src="<?php echo esc_url( $assets . '/photo-opieka-01.jpeg' ); ?>" alt="">
	<div class="hero__veil"></div>
	<div class="hero__inner">
		<div class="hero__over">O starości, trosce i opiece</div>
		<h1>
			<span>Każdy z nas będzie kiedyś potrzebował <em>opieki</em>.</span>
			<span>Albo będzie ją komuś zapewniał.</span>
		</h1>
		<div class="hero__rule"></div>
	</div>
</section>

<!-- ======================= DEMOGRAFIA (gra suwak) ======================= -->
<section class="demo" id="gra">
	<div class="wrap">
		<p class="demo__q">W którym roku się urodziłaś, urodziłeś?</p>
		<div class="demo__year" id="demoYear">1980</div>
		<input class="demo__range" id="demoRange" type="range" min="1940" max="2012" step="1" value="1980" aria-label="Rok urodzenia">
		<div class="demo__ends"><span>1940</span><span>2012</span></div>
		<p class="demo__reflect" id="demoReflect"></p>
		<p class="demo__commit"><span class="zakr">Polska nie jest gotowa na ten czas.</span></p>
		<div class="demo__cta"><a class="arrow-link" href="#dolacz">Pomóż nam to zmienić <span class="arw">→</span></a></div>
	</div>
</section>

<!-- ======================= WYZWANIA CYWILIZACYJNE ======================= -->
<section class="challenges">
	<div class="wrap wrap--wide">
		<div class="sec-head">
			<h2>Wyzwania cywilizacyjne</h2>
			<p>Społeczeństwa się starzeją. Według szacunków WHO do 2030 roku jedna na sześć osób na świecie będzie miała co najmniej 60 lat. W 2021 roku 65 lat lub więcej miało już 21% ludności Europy.</p>
		</div>
		<div class="grid">
			<a class="tile" href="#"><img class="tile__img" src="<?php echo esc_url( $assets . '/wyz-starzenie.png' ); ?>" alt=""><div class="tile__veil"></div><div class="tile__body"><div class="tile__accent"></div><h3>Starzenie się społeczeństw</h3></div></a>
			<a class="tile" href="#"><img class="tile__img" src="<?php echo esc_url( $assets . '/wyz-demencja.png' ); ?>" alt=""><div class="tile__veil"></div><div class="tile__body"><div class="tile__accent"></div><h3>Choroby demencyjne</h3></div></a>
			<a class="tile" href="#"><img class="tile__img" src="<?php echo esc_url( $assets . '/wyz-personel.png' ); ?>" alt=""><div class="tile__veil"></div><div class="tile__body"><div class="tile__accent"></div><h3>Brak personelu opiekuńczego</h3></div></a>
			<a class="tile" href="#"><img class="tile__img" src="<?php echo esc_url( $assets . '/wyz-koszty.png' ); ?>" alt=""><div class="tile__veil"></div><div class="tile__body"><div class="tile__accent"></div><h3>Rosnące koszty opieki</h3></div></a>
		</div>
	</div>
</section>

<!-- ======================= APEL DO RZĄDU ======================= -->
<section class="appeal">
	<div class="wrap wrap--wide">
		<div class="grid">
			<a class="appeal__doc" href="<?php echo esc_url( $stanowisko_pdf ); ?>" target="_blank" rel="noopener" style="display:block">
				<img src="<?php echo esc_url( $assets . '/stanowisko-crisp.png' ); ?>" alt="Stanowisko PSOD i KIDO — 15 czerwca 2026">
			</a>
			<div>
				<h2>Apel do rządu</h2>
				<div class="appeal__date">15 czerwca 2026</div>
				<h3>Wspólne stanowisko PSOD oraz KIDO</h3>
				<p>PSOD i KIDO wyrażają głębokie zaniepokojenie zawieszeniem prac nad projektem rozporządzenia w sprawie wykazu zawodów deficytowych. Argument o rosnącym bezrobociu jest nieadekwatny wobec bezrobocia strukturalnego w zawodach opiekuńczych — a raport ELA (EURES 2025) potwierdza, że niedobory w opiece mają charakter trwały. Do 2035 r. branża będzie potrzebować około 100 tys. opiekunów. Apelujemy o wznowienie prac i utrzymanie zawodów opiekuńczych w wykazie.</p>
				<a class="btn btn--primary" href="<?php echo esc_url( $stanowisko_pdf ); ?>" target="_blank" rel="noopener">Zobacz stanowisko</a>
			</div>
		</div>
	</div>
</section>

<!-- ======================= AKTUALNOŚCI ======================= -->
<?php
// TODO: zastąpić pętlą WP_Query po typie „aktualnosci”. Zdjęcia wpisów: placeholdery
// (do dobrania później — decyzja Stefana).
?>
<section class="news">
	<div class="wrap wrap--wide">
		<div class="news__head"><h2>Aktualności</h2></div>
		<a class="news__feat" href="#">
			<div class="news__featimg"><span>screenshot okładki „Gazety Wyborczej”</span></div>
			<div>
				<h3>Kryzys opieki senioralnej na okładce „Gazety Wyborczej”. Czas na konkretne działania</h3>
				<div class="date">1 lipca 2026</div>
				<p>Temat, o którym mówimy od lat, trafił na pierwszą stronę ogólnopolskiego dziennika. Rynek opieki senioralnej wymaga pilnych rozwiązań systemowych — komentujemy okładkowy materiał i wskazujemy, od czego zacząć.</p>
				<span class="news__more">Czytaj dalej</span>
			</div>
		</a>
		<div class="news__grid">
			<a class="newscard" href="#"><div class="newscard__foto"><span>foto wpisu</span></div><div><h3>Światowy Dzień Praw Osób Starszych. Czy Polska jest gotowa na nadchodzący kryzys opieki?</h3><div class="date">15 czerwca 2026</div></div></a>
			<a class="newscard" href="#"><div class="newscard__foto"><span>foto wpisu</span></div><div><h3>PSOD partnerem webinaru „Efektywna współpraca z Rodziną Podopiecznego w opiece nad Seniorami”</h3><div class="date">2 czerwca 2026</div></div></a>
			<a class="newscard" href="#"><div class="newscard__foto"><span>foto wpisu</span></div><div><h3>Dzień Opiekuna Osób Starszych. Zawód, od którego będzie zależeć bezpieczeństwo milionów seniorów</h3><div class="date">15 maja 2026</div></div></a>
			<a class="newscard" href="#"><div class="newscard__foto"><span>foto wpisu</span></div><div><h3>Bon senioralny to krok w dobrą stronę — ale nie zastąpi systemu opieki</h3><div class="date">24 kwietnia 2026</div></div></a>
		</div>
	</div>
</section>

<!-- ======================= CYTAT-PIECZĘĆ ======================= -->
<section class="seal">
	<div class="seal__mark" aria-hidden="true">„</div>
	<div class="wrap">
		<div class="seal__orn" aria-hidden="true"><span class="ln"></span><span class="dia"></span><span class="ln"></span></div>
		<blockquote>Każdy ma prawo do przystępnych cenowo i&nbsp;dobrej jakości usług opieki długoterminowej, <em>w&nbsp;szczególności opieki&nbsp;w&nbsp;domu</em>.</blockquote>
		<div class="seal__src">18. zasada Europejskiego Filaru Praw Socjalnych</div>
	</div>
</section>

<!-- ======================= FILARY (zakładki) ======================= -->
<?php // Zawartość filarów budowana w JS (js/psod.js). Docelowo: dane z pól ACF. ?>
<section class="pillars">
	<div class="wrap wrap--wide">
		<div class="sec-head"><h2>Filary opieki domowej</h2></div>
		<div class="pillars__cols">
			<div class="pillars__tabs" role="tablist" aria-label="Filary opieki domowej" id="pillarTabs"></div>
			<div class="pillars__panel" role="tabpanel" id="pillarPanel"></div>
		</div>
	</div>
</section>

<!-- ======================= O NAS ======================= -->
<section class="about">
	<div class="wrap">
		<img class="about__mark" src="<?php echo esc_url( $assets . '/sygnet.svg' ); ?>" alt="">
		<h2>Polskie Stowarzyszenie Opieki Domowej</h2>
		<p><b>jest związkiem pracodawców</b> zrzeszającym polskie firmy oferujące usługi długoterminowej opieki domowej dla osób niesamodzielnych. PSOD wspiera zrzeszonych pracodawców poprzez działania na rzecz przejrzystej legislacji tworzącej warunki sprzyjające uczciwej konkurencji z uwzględnieniem interesów personelu i pacjentów oraz dbanie o dobre imię branży opiekuńczej poprzez upowszechnianie rzetelnej wiedzy na jej temat.</p>
		<p class="about__extra" id="aboutExtra" hidden><b>Kim są Członkowie PSOD?</b> Nasi członkowie to przede wszystkim małe rodzinne firmy. Ich działalność jest przykładem sukcesu polskiej przedsiębiorczości i pracowitości. Dlatego w ramach PSOD chcemy wspierać i promować polskich pracodawców świadczących usługi opieki w Polsce i za granicą, a także reprezentować ich interesy wobec instytucji krajowych i zagranicznych, decydentów oraz mediów.</p>
		<button class="about__toggle" id="aboutToggle" aria-expanded="false">czytaj więcej <span>→</span></button>
	</div>
</section>

<!-- ======================= PRIORYTETY ======================= -->
<section class="priorities">
	<div class="wrap wrap--wide">
		<div class="sec-head">
			<h2>Nasze priorytety</h2>
			<p>Przyszłość opieki domowej zaczyna się dziś. Oto kluczowe obszary działań Polskiego Stowarzyszenia Opieki Domowej.</p>
		</div>
		<div class="grid">
			<a class="tile" href="#"><img class="tile__img" src="<?php echo esc_url( $assets . '/prio-transgraniczna.png' ); ?>" alt=""><div class="tile__veil"></div><div class="tile__body"><h3>Likwidacja barier w opiece transgranicznej</h3></div></a>
			<a class="tile" href="#"><img class="tile__img" src="<?php echo esc_url( $assets . '/prio-standardy.png' ); ?>" alt=""><div class="tile__veil"></div><div class="tile__body"><h3>Ustanowienie standardów w opiece domowej</h3></div></a>
			<a class="tile" href="#"><img class="tile__img" src="<?php echo esc_url( $assets . '/prio-szara-strefa.png' ); ?>" alt=""><div class="tile__veil"></div><div class="tile__body"><h3>Ograniczenie szarej strefy</h3></div></a>
			<a class="tile" href="#"><img class="tile__img" src="<?php echo esc_url( $assets . '/prio-ramy-prawne.jpg' ); ?>" alt=""><div class="tile__veil"></div><div class="tile__body"><h3>Likwidacja barier prawnych i administracyjnych</h3></div></a>
		</div>
		<div class="priorities__cta"><a class="btn btn--primary btn--uppercase" href="#">Więcej</a></div>
	</div>
</section>

<!-- ======================= DZIAŁALNOŚĆ ======================= -->
<section class="activity">
	<div class="wrap">
		<div class="sec-head">
			<h2>Nasza działalność</h2>
			<p>Polskie Stowarzyszenie Opieki Domowej działa na styku wielu dziedzin w celu zapewnienia maksymalnych korzyści swoim członkom. Przede wszystkim chcemy wpływać na ukształtowanie przyjaznego środowiska politycznego, społecznego i prawnego, które będzie wspierało legalne i efektywne świadczenie usług opieki domowej.</p>
		</div>
		<p class="lead2">W tym celu podejmujemy następujące działania:</p>
		<div class="grid">
			<a class="acttile" href="#"><span class="ico"><img src="<?php echo esc_url( $assets . '/ico-edukacja.svg' ); ?>" alt=""></span><span>Edukacja</span></a>
			<a class="acttile" href="#"><span class="ico"><img src="<?php echo esc_url( $assets . '/ico-doradztwo.svg' ); ?>" alt=""></span><span>Doradztwo</span></a>
			<a class="acttile" href="#"><span class="ico"><img src="<?php echo esc_url( $assets . '/ico-reprezentowanie.svg' ); ?>" alt=""></span><span>Reprezentowanie</span></a>
		</div>
	</div>
</section>

<!-- ======================= MITY (gra) ======================= -->
<?php // Twierdzenia i fakty budowane w JS (js/psod.js). Mit #2 ma celowy placeholder faktu. ?>
<section class="myths">
	<div class="wrap">
		<div class="overline overline--care">Sprawdź się — zabawa edukacyjna</div>
		<h2>Prawda czy mit?</h2>
		<p class="myths__intro">Wokół opieki domowej narosło wiele stereotypów. Przeczytaj twierdzenie, zaufaj intuicji — a potem odkryj, czy to prawda, czy mit.</p>
		<div class="myths__card">
			<div class="myths__dots" id="mythDots"></div>
			<div class="myth__inner" id="mythInner"></div>
			<div class="myths__foot">
				<span class="count" id="mythCount"></span>
				<a class="arrow-link arrow-link--muted" href="#" id="mythNext">Następne twierdzenie <span class="arw">→</span></a>
			</div>
		</div>
	</div>
</section>

<!-- ======================= PUBLIKACJE ======================= -->
<section class="pubs">
	<div class="wrap wrap--wide">
		<div class="grid">
			<div class="pubs__cover"><img src="<?php echo esc_url( $assets . '/report-cover.jpg' ); ?>" alt="Okładka raportu „Wyzwania branży opieki domowej 2024”"></div>
			<div>
				<div class="pubs__meta">Polskie Stowarzyszenie Opieki Domowej · 13 marca 2024</div>
				<h3>Raport „Wyzwania branży opieki domowej 2024”</h3>
				<p>W niniejszym opracowaniu przyglądamy się usługom opieki długoterminowej, świadczonym przez cudzoziemców w prywatnych gospodarstwach domowych. Zgodnie z definicją Światowej Organizacji Zdrowia, opieka długoterminowa obejmuje zarówno wsparcie o charakterze społecznym (pomoc w codziennych czynnościach, towarzyszenie), jak i usługi medyczne dedykowane osobom, które przez dłuższy okres są zależne od innych. Opieka ta może być realizowana w placówkach stacjonarnych, takich jak domy opieki, ale także w prywatnych mieszkaniach i domach podopiecznych, co stanowi esencję opieki domowej.</p>
				<p>Raport koncentruje się na opiece domowej nad osobami starszymi (60+), z naciskiem na rolę pracowników cudzoziemskich. Sektor opieki nad seniorami będzie odgrywał coraz większą rolę w nadchodzących latach, a zapotrzebowanie na zagranicznych opiekunów będzie rosło. Mimo zmieniającej się dynamiki na rynku pracy w Europie, przewiduje się, że migracje opiekuńcze pozostaną istotnym zjawiskiem. Chociaż sytuacja w Polsce ulega poprawie, a różnice w zarobkach się zmniejszają, nie należy spodziewać się gwałtownego zahamowania trendu zatrudniania cudzoziemców do opieki nad osobami starszymi.</p>
				<p>Jednocześnie, z biegiem czasu możemy obserwować zmiany w kierunkach migracji opiekuńczych. Na przykład, malejące zainteresowanie migracją z Polski do Niemiec jest efektem poprawiającej się sytuacji gospodarczej w Polsce. Zmniejszająca się różnica w zarobkach sprawia, że część personelu opiekuńczego może uznać, że strategia mobilności staje się mniej atrakcyjna finansowo.</p>
				<a class="btn btn--primary" href="#">Zobacz raport</a>
			</div>
		</div>
	</div>
</section>

<!-- ======================= Q&A ======================= -->
<section class="faq">
	<div class="wrap">
		<div class="faq__head"><h2>Pytania i odpowiedzi</h2></div>
		<div class="faq__list">
			<details open><summary>Czym jest PSOD?</summary><div>PSOD jest związkiem pracodawców zrzeszającym polskie firmy oferujące usługi opieki domowej dla seniorów.</div></details>
			<details><summary>Z jakich źródeł finansowana jest działalność PSOD?</summary><div>Nasza działalność finansowana jest ze składek członkowskich oraz darowizn.</div></details>
			<details><summary>Kim są nasi Członkowie?</summary><div>Organizacja reprezentuje obecnie 16 usługodawców zatrudniających w sumie 6500 opiekunów. Członkiem mogą zostać firmy i stowarzyszenia działające na obszarze RP, zatrudniające co najmniej jedną osobę, których zakres działalności obejmuje opiekę domową nad osobami starszymi.</div></details>
			<details><summary>Dlaczego warto być naszym Członkiem?</summary><div>Chcemy wspierać i promować polskich pracodawców świadczących usługi opieki w Polsce i za granicą oraz reprezentować ich interesy wobec instytucji krajowych i zagranicznych, decydentów oraz mediów. Głównym postulatem jest wprowadzenie w Polsce obligatoryjnego rejestru usługodawców w obszarze opieki domowej.</div></details>
			<details><summary>Jakie są rodzaje i koszt członkostwa?</summary><div>Statut PSOD przewiduje jeden rodzaj członkostwa. Składka członkowska wynosi 1045,00 zł miesięcznie.</div></details>
			<details><summary>Jak zostać Członkiem PSOD?</summary><div>Wystarczy wypełnić deklarację członkowską. O przyjęciu w poczet Członków Stowarzyszenia formalnie decyduje Zarząd w formie uchwały.</div></details>
		</div>
	</div>
</section>

<!-- ======================= DOŁĄCZ ======================= -->
<section class="join" id="dolacz">
	<img class="join__img" src="<?php echo esc_url( $assets . '/photo-dolacz.jpg' ); ?>" alt="">
	<div class="join__veil"></div>
	<div class="join__box">
		<h2>Zadbajmy o to razem.</h2>
		<p>PSOD zrzesza firmy opieki domowej, by wspólnie reprezentować branżę wobec decydentów i mediów — w Polsce i w Unii Europejskiej. Im więcej pracodawców z nami działa, tym skuteczniej chronimy interesy opiekunów i seniorów oraz budujemy standardy godnej opieki.</p>
		<div class="join__cta">
			<a class="fill" href="#">Dołącz do PSOD</a>
			<a class="ghost" href="#">Wesprzyj nasze działania</a>
		</div>
	</div>
</section>

<?php
get_footer();
