<?php
/**
 * Pojedynczy wpis aktualności — „40 opiekunek potrzebnych, zgodę dostały
 * trzy. Kto zajmie się naszymi rodzicami?" — slug: rynek-opieki-na-granicy-
 * -zalamania, podstrona podrzędna wobec /aktualnosci/.
 *
 * Wg handoffu design_handoff_aktualnosc/ (2026-07-20): wariant 1A „Klasyczny
 * redakcyjny" (README poleca 1A dla dłuższych tekstów — ten artykuł ma 4
 * sekcje H2 + blok „Stanowisko PSOD", więc kwalifikuje się jako dłuższy;
 * wariant 1B z panelem bocznym/TOC świadomie pominięty). Treść artykułu
 * przepisana verbatim z ArtykulTresc.dc.html — nie skracać, nie parafrazować.
 *
 * Kadr zdjęcia to placeholder (gradient) — brak licencjonowanej fotografii,
 * zgodnie z jawną instrukcją w README ("żaden obraz bez licencji").
 *
 * @package PSOD2
 */

get_header();

$assets = get_template_directory_uri() . '/assets';
?>

<article class="artykul">

	<!-- ======================= PASEK POWROTU ======================= -->
	<div class="wrap">
		<a class="artykul-back" href="<?php echo esc_url( home_url( '/aktualnosci/' ) ); ?>"><span class="ar" aria-hidden="true">←</span> <span data-i18n="artykul.back">Wróć do aktualności</span></a>
	</div>

	<!-- ======================= NAGŁÓWEK ARTYKUŁU ======================= -->
	<header class="artykul-head">
		<div class="wrap">
			<div class="artykul-meta">
				<span class="artykul-meta__cat" data-i18n="artykul.cat">Aktualności</span>
				<span class="artykul-meta__dot" aria-hidden="true"></span>
				<span class="artykul-meta__date">20 lipca 2026</span>
			</div>
			<h1>40 opiekunek potrzebnych, zgodę dostały trzy. Kto zajmie się naszymi rodzicami?</h1>
		</div>
	</header>

	<!-- ======================= KADR ZDJĘCIA (placeholder) ======================= -->
	<div class="wrap">
		<div class="artykul-hero">
			<span class="artykul-hero__label" data-i18n="artykul.herolabel">Foto — do wpięcia po uzyskaniu licencji</span>
		</div>
	</div>

	<!-- ======================= TREŚĆ ARTYKUŁU ======================= -->
	<div class="artykul-body">

		<p class="artykul-lead">Polska starzeje się, a liczba osób gotowych podjąć ciężką i odpowiedzialną pracę w opiece nie nadąża za rosnącymi potrzebami. Mimo to państwo ogranicza dostęp do pracowników z zagranicy. Skutki tej polityki odczują przede wszystkim seniorzy i ich rodziny.</p>

		<p>Tygodnik „Polityka" opisuje przypadek firmy opiekuńczej, która złożyła dokumenty dotyczące zatrudnienia 40 opiekunek. Pozytywnie rozpatrzono sprawy zaledwie trzech z nich. Dla pozostałych 37 osób nie uda się szybko znaleźć zastępstwa na polskim rynku pracy.</p>

		<p>To nie jest jednostkowa trudność przedsiębiorcy. To sygnał problemu, który dotyczy całego systemu opieki.</p>

		<h2 id="s1">Potrzeby rosną, pracowników już dzisiaj brakuje</h2>

		<p>Polskie społeczeństwo szybko się starzeje. Coraz więcej osób potrzebuje pomocy w podstawowych czynnościach życia codziennego: przygotowaniu posiłków, higienie, poruszaniu się, prowadzeniu gospodarstwa domowego czy bezpiecznym przyjmowaniu leków.</p>

		<div class="artykul-highlight">
			<p>Jednocześnie Polska ma jeden z najniższych w Unii Europejskiej poziomów zatrudnienia w opiece długoterminowej. W 2024 roku na każde 100 osób w wieku co najmniej 65 lat przypadało w Polsce zaledwie <strong>0,4</strong> pracownika opieki długoterminowej. Średnia unijna wynosiła <strong>3,3</strong>.</p>
		</div>

		<p>Luki kadrowej nie da się uzupełnić samymi apelami o aktywizację zawodową. Praca opiekuńcza jest wymagająca fizycznie i emocjonalnie. Wymaga odpowiedzialności, odporności psychicznej, odpowiednich predyspozycji, a często także doświadczenia w pracy z osobami z ograniczoną samodzielnością lub otępieniem.</p>

		<p>Polskie firmy opiekuńcze chcą zatrudniać pracowników krajowych. Problem polega na tym, że dostępna liczba kandydatów jest niewystarczająca wobec skali potrzeb.</p>

		<h2 id="s2">To nie tylko problem wiz</h2>

		<p>W debacie publicznej wszystkie bariery związane z zatrudnianiem cudzoziemców często określa się wspólnie jako „blokadę wizową". W rzeczywistości procedura składa się z kilku odrębnych etapów.</p>

		<p>Pracodawca może potrzebować między innymi wpisu oświadczenia o powierzeniu pracy cudzoziemcowi albo zezwolenia na pracę. Osoba przyjeżdżająca do Polski musi następnie posiadać odpowiedni tytuł pobytowy, którym w określonych przypadkach jest wiza.</p>

		<p>Procedura oświadczeniowa może obecnie obejmować obywateli Armenii, Białorusi, Mołdawii i Ukrainy. Sam wpis oświadczenia nie jest jednak wizą — jest dokumentem dotyczącym możliwości wykonywania pracy w Polsce.</p>

		<p>Dlatego problem należy nazywać precyzyjnie: <strong>państwo ogranicza dostęp do zagranicznego personelu opiekuńczego zarówno poprzez decyzje dotyczące zatrudnienia, jak i poprzez procedury umożliwiające przyjazd do Polski.</strong></p>

		<p>Dla osoby starszej oczekującej na pomoc nie ma jednak znaczenia, na którym etapie administracyjnym sprawa została zablokowana. Efekt jest ten sam: opiekunka nie rozpoczyna pracy.</p>

		<h2 id="s3">Kontrolowana migracja nie oznacza zamknięcia rynku pracy</h2>

		<p>Polska ma prawo kontrolować, kto przyjeżdża do naszego kraju i na jakich zasadach podejmuje zatrudnienie. Konieczne jest przeciwdziałanie fikcyjnym ofertom pracy, handlowi dokumentami, wyzyskowi pracowników oraz wykorzystywaniu procedur migracyjnych niezgodnie z ich przeznaczeniem.</p>

		<p>Kontrola nie powinna jednak oznaczać automatycznego blokowania zatrudnienia w sektorach, w których braki kadrowe są rzeczywiste i bezpośrednio wpływają na bezpieczeństwo obywateli.</p>

		<p>Potrzebujemy procedur, które potrafią odróżnić uczciwego, działającego od lat przedsiębiorcę opiekuńczego od podmiotu tworzącego pozorne miejsca pracy. Odpowiedzią na nadużycia powinna być skuteczna weryfikacja, a nie faktyczne zamknięcie dostępu do pracowników.</p>

		<h2 id="s4">Migracja nie zastąpi reformy opieki</h2>

		<p>Zatrudnianie cudzoziemców nie rozwiąże wszystkich problemów polskiego systemu opieki długoterminowej.</p>

		<p>Potrzebujemy również:</p>

		<ul class="artykul-list">
			<li>profesjonalizacji i podnoszenia prestiżu pracy opiekuńczej;</li>
			<li>jasnych standardów jakości i bezpieczeństwa;</li>
			<li>lepszych warunków pracy i wynagrodzeń;</li>
			<li>rozwoju usług opieki domowej;</li>
			<li>realnego wsparcia opiekunów rodzinnych;</li>
			<li>stabilnych źródeł finansowania opieki długoterminowej.</li>
		</ul>

		<p>Efekty takich reform będą jednak widoczne dopiero po latach. Osoby starsze potrzebują wsparcia już dzisiaj.</p>

		<p><strong>Migracja zarobkowa nie może zastępować reformy systemu opieki. Bez odpowiedzialnego wykorzystania pracy cudzoziemców system może jednak nie przetrwać do czasu, kiedy reforma zacznie przynosić rezultaty.</strong></p>

		<div class="artykul-position" id="s5">
			<div class="artykul-position__label" data-i18n="artykul.position.label">Stanowisko PSOD</div>
			<h2>Przejrzysta ścieżka zatrudniania opiekunów</h2>
			<p>Polskie Stowarzyszenie Opieki Domowej apeluje o stworzenie przejrzystej i przewidywalnej ścieżki zatrudniania cudzoziemców w zawodach opiekuńczych.</p>
			<p>System powinien:</p>
			<ol class="artykul-position__list">
				<li>uwzględniać rzeczywiste niedobory personelu w opiece;</li>
				<li>umożliwiać szybką weryfikację wiarygodnych pracodawców;</li>
				<li>chronić cudzoziemców przed nieuczciwymi pośrednikami;</li>
				<li>zapewniać kontrolę legalności zatrudnienia i warunków pracy;</li>
				<li>gwarantować ciągłość usług świadczonych osobom wymagającym wsparcia.</li>
			</ol>
			<p>Polityka migracyjna powinna być bezpieczna, kontrolowana i oparta na danych. Nie może jednak ignorować demografii ani prowadzić do sytuacji, w której rodziny pozostają same z odpowiedzialnością za niesamodzielnych bliskich.</p>
		</div>

		<p class="artykul-closing">Pytanie nie brzmi już, czy Polska będzie potrzebowała pracowników z zagranicy. Pytanie brzmi: <mark class="artykul-mark">kto zajmie się naszymi rodzicami</mark>, jeżeli nie pozwolimy im pracować?</p>

		<p class="artykul-source">Artykuł powstał w nawiązaniu do publikacji Katarzyny Kaczorowskiej „Rynek opieki na granicy załamania. Nie chcemy wydawać wiz Ukrainkom. Kto je zastąpi?", opublikowanej w tygodniku „Polityka" 15 lipca 2026 roku.</p>

	</div>

	<!-- ======================= CTA DOLNE ======================= -->
	<div class="wrap artykul-cta">
		<a class="btn btn--secondary" href="<?php echo esc_url( home_url( '/aktualnosci/' ) ); ?>"><span aria-hidden="true">←</span> <span data-i18n="artykul.ctaall">Wszystkie aktualności</span></a>
	</div>

</article>

<?php
get_footer();
