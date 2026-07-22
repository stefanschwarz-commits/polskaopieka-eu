<?php
/**
 * Centrum wiedzy — JEDEN model danych (SSR) dla odpowiedzi + rejestr źródeł + silnik
 * cytowań i renderowania. Wczytywany z functions.php (require_once).
 *
 * Zasady:
 *  - Treść jest po stronie serwera (obecna w HTML bez JS).
 *  - Jedno źródło danych: karty na indeksie, wyszukiwarka, podstrony, powiązane
 *    pytania i strona źródeł czytają z psod2_kb_articles() / psod2_kb_sources().
 *  - Cytowania {Sx} w treści zamieniane są na klikalne, dostępne odwołania liczbowe,
 *    numerowane per-strona wg kolejności pierwszego użycia.
 *  - Data ostatniego sprawdzenia linków źródeł: 2026-07-22 (stała, nie generowana).
 *
 * @package PSOD2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Data ostatniego sprawdzenia linków źródeł (stała — nie generowana przy wyświetlaniu). */
function psod2_kb_sources_checked() {
	return '2026-07-22';
}

/** Rejestr źródeł (S1–S4). Klucz = stabilne ID. */
function psod2_kb_sources() {
	return array(
		'S1' => array(
			'institution' => 'Rada Unii Europejskiej',
			'inst_short'  => 'Rada Unii Europejskiej',
			'title'       => 'Zalecenie Rady z dnia 8 grudnia 2022 r. w sprawie dostępu do przystępnej cenowo i wysokiej jakości opieki długoterminowej (2022/C 476/01)',
			'date'        => '2022-12-08',
			'url'         => 'https://eur-lex.europa.eu/legal-content/PL/TXT/?uri=CELEX%3A32022H1215%2801%29',
			'type'        => 'Akt prawa UE — zalecenie',
			'lang'        => 'PL',
			'usage'       => 'Definicje opieki długoterminowej, formalnej, domowej, środowiskowej, instytucjonalnej, nieformalnej i modelu z zamieszkaniem; zasady jakości i warunków pracy.',
		),
		'S2' => array(
			'institution' => 'Światowa Organizacja Zdrowia — Biuro Regionalne WHO dla Europy',
			'inst_short'  => 'Światowa Organizacja Zdrowia (WHO)',
			'title'       => 'Long-term care',
			'date'        => '2022-12-01',
			'url'         => 'https://www.who.int/europe/news-room/questions-and-answers/item/long-term-care',
			'type'        => 'Opracowanie instytucjonalne',
			'lang'        => 'EN',
			'usage'       => 'Zakres opieki długoterminowej, jej cele, grupy osób mogących jej potrzebować oraz rozróżnienie opieki formalnej i nieformalnej.',
		),
		'S3' => array(
			'institution' => 'Ministerstwo Rodziny, Pracy i Polityki Społecznej',
			'inst_short'  => 'Ministerstwo Rodziny, Pracy i Polityki Społecznej',
			'title'       => 'Usługi opiekuńcze i specjalistyczne usługi opiekuńcze oraz usługi sąsiedzkie',
			'date'        => '',
			'url'         => 'https://www.gov.pl/web/rodzina/uslugi-opiekuncze-i-specjalistyczne-uslugi-opiekuncze',
			'type'        => 'Oficjalna informacja administracji publicznej',
			'lang'        => 'PL',
			'usage'       => 'Zakres usług opiekuńczych i specjalistycznych usług opiekuńczych w systemie pomocy społecznej.',
		),
		'S4' => array(
			'institution' => 'Ministerstwo Zdrowia / Pacjent.gov.pl',
			'inst_short'  => 'Ministerstwo Zdrowia / Pacjent.gov.pl',
			'title'       => 'Pielęgniarska domowa opieka długoterminowa',
			'date'        => '',
			'url'         => 'https://pacjent.gov.pl/artykul/pielegniarska-domowa-opieka-dlugoterminowa',
			'type'        => 'Oficjalna informacja dla pacjentów',
			'lang'        => 'PL',
			'usage'       => 'Zakres pielęgniarskiej domowej opieki długoterminowej i przykłady czynności wykonywanych przez pielęgniarkę.',
		),
		'S5' => array(
			'institution' => 'Komisja Europejska',
			'inst_short'  => 'Komisja Europejska',
			'title'       => 'Europejska strategia w dziedzinie opieki — COM(2022) 440 final',
			'date'        => '2022-09-07',
			'url'         => 'https://eur-lex.europa.eu/legal-content/PL/TXT/?uri=CELEX%3A52022DC0440',
			'type'        => 'Oficjalny komunikat Komisji Europejskiej',
			'lang'        => 'PL',
			'usage'       => 'Jakość, dostępność i ciągłość opieki, prawa osób korzystających z opieki oraz znaczenie warunków pracy personelu.',
		),
		'S6' => array(
			'institution' => 'Organizacja Narodów Zjednoczonych — Biuro Wysokiego Komisarza ONZ ds. Praw Człowieka',
			'inst_short'  => 'ONZ — Biuro Wysokiego Komisarza ds. Praw Człowieka',
			'title'       => 'Konwencja o prawach osób niepełnosprawnych',
			'date'        => '2006-12-13',
			'url'         => 'https://www.ohchr.org/en/instruments-mechanisms/instruments/convention-rights-persons-disabilities',
			'type'        => 'Konwencja międzynarodowa',
			'lang'        => 'EN',
			'usage'       => 'Godność, autonomia, ochrona przed przemocą, prawo do życia w społeczności, prywatność oraz udział w podejmowaniu decyzji.',
		),
		'S7' => array(
			'institution' => 'Ministerstwo Rozwoju i Technologii / Biznes.gov.pl',
			'inst_short'  => 'Biznes.gov.pl',
			'title'       => 'Wyszukiwarka firm — CEIDG i KRS',
			'date'        => '',
			'url'         => 'https://www.biznes.gov.pl/pl/wyszukiwarka-firm/',
			'type'        => 'Oficjalny rejestr publiczny',
			'lang'        => 'PL',
			'usage'       => 'Weryfikowanie danych rejestrowych przedsiębiorcy lub organizacji świadczącej usługi.',
		),
		'S8' => array(
			'institution' => 'Ministerstwo Zdrowia',
			'inst_short'  => 'Ministerstwo Zdrowia',
			'title'       => 'Rejestr podmiotów wykonujących działalność leczniczą',
			'date'        => '',
			'url'         => 'https://www.gov.pl/web/zdrowie/rejestr-podmiotow-wykonujacych-dzialalnosc-lecznicza',
			'type'        => 'Oficjalny rejestr publiczny',
			'lang'        => 'PL',
			'usage'       => 'Weryfikowanie podmiotów deklarujących udzielanie świadczeń zdrowotnych.',
		),
		'S9' => array(
			'institution' => 'Urząd Ochrony Konkurencji i Konsumentów',
			'inst_short'  => 'UOKiK',
			'title'       => 'Prawa konsumenta',
			'date'        => '',
			'url'         => 'https://prawakonsumenta.uokik.gov.pl/',
			'type'        => 'Oficjalny portal informacyjny',
			'lang'        => 'PL',
			'usage'       => 'Ogólne informacje o ochronie konsumentów, pomocy w sporach z przedsiębiorcą i instytucjach udzielających wsparcia.',
		),
		'S10' => array(
			'institution' => 'Międzynarodowa Organizacja Pracy',
			'inst_short'  => 'Międzynarodowa Organizacja Pracy (MOP)',
			'title'       => 'Domestic workers and working time',
			'date'        => '',
			'url'         => 'https://www.ilo.org/topics-and-sectors/domestic-workers/domestic-workers-and-working-time',
			'type'        => 'Opracowanie instytucjonalne',
			'lang'        => 'EN',
			'usage'       => 'Ryzyko nadmiernie długiego i nieprzewidywalnego czasu pracy personelu pracującego w gospodarstwach domowych.',
		),
		'S11' => array(
			'institution' => 'Międzynarodowa Organizacja Pracy',
			'inst_short'  => 'Międzynarodowa Organizacja Pracy (MOP)',
			'title'       => 'Konwencja MOP nr 189 dotycząca godnej pracy dla pracowników domowych',
			'date'        => '2011-06-16',
			'url'         => 'https://normlex.ilo.org/dyn/nrmlx_en/f?p=NORMLEXPUB%3A12100%3A0%3A%3ANO%3A%3AP12100_ILO_CODE%3AC189',
			'type'        => 'Międzynarodowy standard pracy',
			'lang'        => 'EN',
			'usage'       => 'Przejrzyste warunki wykonywania pracy, opis obowiązków, czas pracy, odpoczynek, warunki zamieszkania, prywatność i ochrona przed nadużyciami.',
			'note'        => 'Konwencja jest wykorzystywana jako międzynarodowy punkt odniesienia. Nie jest przedstawiana jako bezpośrednio obowiązujące w Polsce źródło prawa.',
		),
		'S12' => array(
			'institution' => 'Międzynarodowa Organizacja Pracy — NORMLEX',
			'inst_short'  => 'MOP — NORMLEX',
			'title'       => 'Wykaz ratyfikacji Konwencji MOP nr 189',
			'date'        => '',
			'url'         => 'https://normlex.ilo.org/dyn/nrmlx_en/f?p=1000%3A11300%3A0%3A%3ANO%3A11300%3AP11300_INSTRUMENT_ID%3A2551460',
			'type'        => 'Oficjalny rejestr ratyfikacji',
			'lang'        => 'EN',
			'usage'       => 'Weryfikacja statusu ratyfikacji Konwencji nr 189.',
			'note'        => 'Rejestr sprawdzony 22 lipca 2026 r.',
		),
		'S13' => array(
			'institution' => 'Europejska Agencja Bezpieczeństwa i Zdrowia w Pracy — EU-OSHA',
			'inst_short'  => 'EU-OSHA',
			'title'       => 'Home care workers — a comprehensive overview of occupational safety and health risks',
			'date'        => '2025-11-27',
			'url'         => 'https://osha.europa.eu/en/publications/home-care-workers-comprehensive-overview-occupational-safety-and-health-risks',
			'type'        => 'Raport instytucjonalny',
			'lang'        => 'EN',
			'usage'       => 'Zagrożenia zawodowe w opiece domowej: obciążenia układu mięśniowo-szkieletowego, praca w odosobnieniu, przemoc, ryzyka psychospołeczne i niebezpieczne warunki domowe.',
		),
		'S14' => array(
			'institution' => 'Światowa Organizacja Zdrowia',
			'inst_short'  => 'Światowa Organizacja Zdrowia (WHO)',
			'title'       => 'Integrated care for older people: guidance for person-centred assessment and pathways in primary care, 2nd edition',
			'date'        => '2025-09-22',
			'url'         => 'https://www.who.int/publications/i/item/9789240103726',
			'type'        => 'Podręcznik WHO',
			'lang'        => 'EN',
			'usage'       => 'Ocena potrzeb, opracowanie spersonalizowanego planu opieki, wdrażanie planu oraz jego monitorowanie.',
			'note'        => 'Dokument dotyczy zintegrowanej opieki nad osobami starszymi i nie powinien być automatycznie uogólniany na każdą grupę wieku.',
		),
		'S15' => array(
			'institution' => 'Rzecznik Praw Pacjenta',
			'inst_short'  => 'Rzecznik Praw Pacjenta',
			'title'       => 'Prawa pacjenta',
			'date'        => '',
			'url'         => 'https://www.gov.pl/web/rpp/prawa-pacjenta',
			'type'        => 'Oficjalna informacja administracji publicznej',
			'lang'        => 'PL',
			'usage'       => 'Prawa przysługujące osobie korzystającej ze świadczeń zdrowotnych: prawo do informacji, zgody, tajemnicy, dokumentacji, godności i intymności.',
			'note'        => 'Źródło dotyczy świadczeń zdrowotnych i praw pacjenta, a nie automatycznie każdej niemedycznej usługi opieki domowej.',
		),
	);
}

/** Kategorie Centrum wiedzy (kolejność wyświetlania; wyświetlamy tylko niepuste). */
function psod2_kb_categories() {
	return array(
		'podstawowe-pojecia'          => array(
			'name' => 'Podstawowe pojęcia',
			'desc' => 'Najważniejsze definicje potrzebne do zrozumienia opieki długoterminowej i domowej.',
		),
		'organizacja-i-bezpieczenstwo' => array(
			'name' => 'Organizacja i bezpieczeństwo',
			'desc' => 'Jak zorganizowana jest bezpieczna opieka domowa — zakres czynności, wybór usługodawcy oraz ciągłość i zastępstwo.',
		),
		'prawa-i-warunki-opieki'      => array(
			'name' => 'Prawa i warunki opieki',
			'desc' => 'Prawa osoby korzystającej z opieki oraz prawa i warunki pracy personelu opiekuńczego.',
		),
	);
}

/** Slug kategorii dla danej odpowiedzi (z jej nazwy kategorii). */
function psod2_kb_cat_key( $article ) {
	$map = array(
		'Podstawowe pojęcia'          => 'podstawowe-pojecia',
		'Organizacja i bezpieczeństwo' => 'organizacja-i-bezpieczenstwo',
		'Prawa i warunki opieki'      => 'prawa-i-warunki-opieki',
	);
	$name = isset( $article['category'] ) ? $article['category'] : '';
	return isset( $map[ $name ] ) ? $map[ $name ] : 'inne';
}

/**
 * Kolejność wyświetlania odpowiedzi (indeks, grupowanie w kategoriach). Slug = klucz
 * w psod2_kb_articles(). Nowe odpowiedzi dopisuj tutaj w wybranej pozycji.
 */
function psod2_kb_display_order() {
	return array(
		// Podstawowe pojęcia (definicja ciągłości na końcu tej grupy)
		'czym-jest-opieka-dlugoterminowa',
		'czym-jest-opieka-domowa',
		'czym-jest-opieka-domowa-z-zamieszkaniem',
		'opieka-formalna-i-nieformalna',
		'pomoc-niemedyczna-a-opieka-medyczna',
		'czym-jest-ciaglosc-opieki-domowej',
		// Organizacja i bezpieczeństwo
		'jakich-czynnosci-moze-podejmowac-opiekun-domowy',
		'jak-wybrac-bezpiecznego-uslugodawce',
		'ciaglosc-opieki-i-zastepstwo',
		// Prawa i warunki opieki
		'prawa-osoby-korzystajacej-z-opieki',
		'prawa-i-warunki-pracy-personelu-opiekunczego',
	);
}

/**
 * Odpowiedzi pogrupowane po kategoriach, w kolejności psod2_kb_categories() i wewnątrz
 * w kolejności psod2_kb_display_order(). Zwraca [ catSlug => [ slug => article, ... ], ... ]
 * — tylko niepuste kategorie. Liczniki = count() na tej strukturze (dane, nie ręcznie).
 */
function psod2_kb_articles_by_category() {
	$articles = psod2_kb_articles();
	$order    = psod2_kb_display_order();
	$out      = array();
	foreach ( psod2_kb_categories() as $cat_slug => $cat ) {
		$group = array();
		foreach ( $order as $slug ) {
			if ( isset( $articles[ $slug ] ) && psod2_kb_cat_key( $articles[ $slug ] ) === $cat_slug ) {
				$group[ $slug ] = $articles[ $slug ];
			}
		}
		if ( ! empty( $group ) ) {
			$out[ $cat_slug ] = $group;
		}
	}
	return $out;
}

/** Slugi odpowiedzi, w których wykorzystano dane źródło (z pól sourceIds) — do strony źródeł. */
function psod2_kb_articles_using_source( $sid ) {
	$out = array();
	foreach ( psod2_kb_display_order() as $slug ) {
		$a = psod2_kb_get_article( $slug );
		if ( $a && ! empty( $a['sourceIds'] ) && in_array( $sid, $a['sourceIds'], true ) ) {
			$out[ $slug ] = $a['title'];
		}
	}
	return $out;
}

/**
 * Odpowiedzi Centrum wiedzy — jeden model. Klucz = slug (= ostatni segment URL
 * /centrum-wiedzy/<slug>/). Body to lista bloków renderowanych przez psod2_kb_render_body().
 * Znaczniki {Sx} w polach shortAnswer / p / def.text są zamieniane na odwołania do źródeł.
 */
function psod2_kb_articles() {
	$cat = 'Podstawowe pojęcia';
	return array(

		'czym-jest-opieka-dlugoterminowa' => array(
			'id'             => 'kb-opieka-dlugoterminowa',
			'title'          => 'Czym jest opieka długoterminowa?',
			'eyebrow'        => 'Informacja ekspercka',
			'category'       => $cat,
			'excerpt'        => 'To cały system usług i wsparcia dla osób, które przez dłuższy czas potrzebują pomocy w codziennym funkcjonowaniu albo opieki pielęgniarskiej.',
			'shortAnswer'    => 'Opieka długoterminowa to cały system usług i wsparcia dla osób, które z powodu osłabienia sprawności, choroby lub niepełnosprawności przez dłuższy czas potrzebują pomocy w codziennym funkcjonowaniu albo stałej opieki pielęgniarskiej. Może być świadczona w domu, w społeczności lokalnej lub w placówce, przez profesjonalny personel albo opiekunów nieformalnych. {S1} {S2}',
			'keywords'       => array( 'opieka długoterminowa', 'definicja opieki długoterminowej', 'czynności życia codziennego', 'ADL', 'IADL', 'opieka nad osobą niesamodzielną', 'opieka formalna', 'opieka nieformalna' ),
			'sourceIds'      => array( 'S1', 'S2' ),
			'related'        => array(
				array( 'kb' => 'czym-jest-opieka-domowa' ),
				array( 'kb' => 'opieka-formalna-i-nieformalna' ),
				array( 'kb' => 'pomoc-niemedyczna-a-opieka-medyczna' ),
			),
			'seoTitle'       => 'Czym jest opieka długoterminowa? Definicja | PSOD',
			'seoDescription' => 'Wyjaśniamy, czym jest opieka długoterminowa, komu służy, jakie potrzeby obejmuje i czym różni się od opieki domowej oraz medycznej.',
			'dateAdded'      => '2026-07-22',
			'dateModified'   => '2026-07-22',
			'contentStatus'  => 'expert-information',
			'disclaimerType' => 'general-info',
			'body'           => array(
				array( 'h2' => 'To cały system, a nie jedna usługa' ),
				array( 'p'  => 'Opieka długoterminowa nie oznacza jednego świadczenia, zawodu ani miejsca. Obejmuje różne rodzaje pomocy potrzebne osobie, która przez dłuższy czas nie jest w stanie samodzielnie wykonywać części codziennych czynności albo potrzebuje regularnej opieki pielęgniarskiej. {S1}' ),
				array( 'p'  => 'Zakres wsparcia może zmieniać się wraz ze stanem zdrowia, sprawnością, sytuacją rodzinną i warunkami mieszkaniowymi. Jedna osoba może potrzebować głównie pomocy przy zakupach i przygotowaniu posiłków, a inna również wsparcia przy przemieszczaniu się, higienie lub czynnościach pielęgnacyjnych.' ),
				array( 'h2' => 'Jakich czynności może dotyczyć wsparcie?' ),
				array( 'p'  => 'W opiece długoterminowej rozróżnia się podstawowe oraz złożone czynności życia codziennego. {S1}' ),
				array( 'h3' => 'Podstawowe czynności życia codziennego' ),
				array( 'ul' => array( 'jedzenie i picie;', 'ubieranie się;', 'mycie i dbanie o higienę;', 'korzystanie z toalety;', 'wstawanie z łóżka lub krzesła;', 'przemieszczanie się;', 'kontrolowanie potrzeb fizjologicznych.' ) ),
				array( 'h3' => 'Złożone czynności życia codziennego' ),
				array( 'ul' => array( 'przygotowywanie posiłków;', 'robienie zakupów;', 'prowadzenie gospodarstwa domowego;', 'korzystanie z telefonu i innych narzędzi komunikacji;', 'organizowanie codziennych spraw;', 'bezpieczne poruszanie się poza domem;', 'gospodarowanie pieniędzmi.' ) ),
				array( 'p'  => 'Potrzeba pomocy przy jednej czynności nie oznacza automatycznie całkowitej niesamodzielności. Celem dobrej opieki jest wspieranie osoby w tych obszarach, w których rzeczywiście tego potrzebuje, przy jednoczesnym zachowaniu możliwie największej samodzielności.' ),
				array( 'h2' => 'Kto może potrzebować opieki długoterminowej?' ),
				array( 'p'  => 'Opieka długoterminowa nie jest przeznaczona wyłącznie dla seniorów. Potrzeby opiekuńcze mogą pojawić się w każdym wieku w następstwie choroby przewlekłej, niepełnosprawności, urazu, zaburzeń poznawczych lub trwałego osłabienia sprawności. Osoby starsze stanowią jednak dużą część osób korzystających z takiego wsparcia, ponieważ ryzyko ograniczenia sprawności rośnie wraz z wiekiem. {S2}' ),
				array( 'ul' => array( 'osoba z ograniczoną sprawnością ruchową;', 'osoba żyjąca z otępieniem;', 'osoba po udarze lub poważnym urazie;', 'osoba z niepełnosprawnością wymagająca stałego wsparcia;', 'osoba przewlekle chora;', 'osoba, której sprawność stopniowo się pogarsza;', 'osoba wymagająca regularnej opieki pielęgniarskiej.' ) ),
				array( 'h2' => 'Gdzie może być świadczona?' ),
				array( 'p'  => 'Formalna opieka długoterminowa może być świadczona w domu, w ramach usług środowiskowych albo w placówce stacjonarnej. Opieka domowa jest więc jedną z form całego systemu, a nie jego synonimem. {S1}' ),
				array( 'def' => array( 'term' => 'Opieka domowa', 'text' => 'Profesjonalne wsparcie świadczone w prywatnym miejscu zamieszkania osoby korzystającej z opieki.' ) ),
				array( 'def' => array( 'term' => 'Opieka środowiskowa', 'text' => 'Usługi organizowane w społeczności lokalnej, takie jak opieka dzienna lub wsparcie wytchnieniowe.' ) ),
				array( 'def' => array( 'term' => 'Opieka stacjonarna', 'text' => 'Opieka zapewniana osobom mieszkającym w placówce opieki długoterminowej.' ) ),
				array( 'h2' => 'Kto może zapewniać opiekę?' ),
				array( 'p'  => 'Opieka może być formalna, gdy świadczy ją profesjonalny personel, albo nieformalna, gdy zapewnia ją osoba z otoczenia, na przykład partner, dziecko, rodzic, inny członek rodziny, sąsiad lub przyjaciel, który nie został zatrudniony jako zawodowy pracownik opieki. {S1} {S2}' ),
				array( 'p'  => 'W praktyce oba rodzaje wsparcia często się uzupełniają. Zaangażowanie rodziny nie eliminuje potrzeby profesjonalnej usługi, a korzystanie z profesjonalnego usługodawcy nie musi wyłączać udziału bliskich.' ),
				array( 'h2' => 'Jaki jest cel opieki długoterminowej?' ),
				array( 'p'  => 'Celem nie jest wyłącznie wykonanie czynności za osobę wymagającą wsparcia. Dobra opieka powinna pomagać jej zachować funkcjonalność, możliwie niezależne życie, relacje społeczne, bezpieczeństwo, jakość życia i godność. Powinna również przeciwdziałać możliwemu do uniknięcia pogarszaniu się sprawności. {S1} {S2}' ),
				array( 'h2' => 'Najczęstsze nieporozumienia' ),
				array( 'ul' => array( 'opieka długoterminowa nie dotyczy wyłącznie osób starszych;', 'nie jest synonimem opieki medycznej;', 'nie jest synonimem opieki domowej;', 'nie musi oznaczać zamieszkania opiekuna w domu;', 'nie oznacza automatycznie całkowitej niesamodzielności;', 'nie oznacza pracy jednej osoby przez całą dobę.' ) ),
				array( 'callout' => 'Najprościej: opieka długoterminowa to cały system. Opieka domowa jest jednym z miejsc i sposobów świadczenia wsparcia.' ),
			),
		),

		'czym-jest-opieka-domowa' => array(
			'id'             => 'kb-opieka-domowa',
			'title'          => 'Czym jest opieka domowa?',
			'eyebrow'        => 'Informacja ekspercka',
			'category'       => $cat,
			'excerpt'        => 'Opieka domowa jest jedną z form formalnej opieki długoterminowej, świadczoną w miejscu zamieszkania osoby korzystającej z opieki.',
			'shortAnswer'    => 'Opieka domowa jest formą formalnej opieki długoterminowej świadczoną w prywatnym miejscu zamieszkania osoby korzystającej z opieki przez jednego lub kilku profesjonalnych pracowników. Nie jest tym samym co cały system opieki długoterminowej ani tym samym co pielęgniarska opieka domowa. {S1}',
			'keywords'       => array( 'opieka domowa', 'profesjonalna opieka domowa', 'pomoc w domu', 'usługi opiekuńcze', 'opiekun domowy', 'opieka długoterminowa w domu', 'opieka nad seniorem w domu' ),
			'sourceIds'      => array( 'S1', 'S3', 'S4' ),
			'related'        => array(
				array( 'kb' => 'czym-jest-opieka-dlugoterminowa' ),
				array( 'kb' => 'czym-jest-opieka-domowa-z-zamieszkaniem' ),
				array( 'kb' => 'pomoc-niemedyczna-a-opieka-medyczna' ),
				array( 'kb' => 'jakich-czynnosci-moze-podejmowac-opiekun-domowy' ),
				array( 'kb' => 'jak-wybrac-bezpiecznego-uslugodawce' ),
			),
			'seoTitle'       => 'Czym jest opieka domowa? Definicja i zakres | PSOD',
			'seoDescription' => 'Sprawdź, czym jest profesjonalna opieka domowa, jakie formy może przyjmować i czym różni się od opieki medycznej oraz pielęgniarskiej.',
			'dateAdded'      => '2026-07-22',
			'dateModified'   => '2026-07-22',
			'contentStatus'  => 'expert-information',
			'disclaimerType' => 'general-info',
			'body'           => array(
				array( 'h2' => 'Co decyduje o tym, że opieka jest domowa?' ),
				array( 'p'  => 'Podstawową cechą opieki domowej jest miejsce świadczenia usługi: własny dom lub mieszkanie osoby wymagającej wsparcia. Dzięki temu może ona pozostać w znanym otoczeniu, zachować codzienne zwyczaje i utrzymywać relacje ze swoją społecznością.' ),
				array( 'p'  => 'Zgodnie z definicją przyjętą przez Radę UE opieka domowa jest formalną opieką długoterminową zapewnianą w prywatnym miejscu zamieszkania przez co najmniej jednego profesjonalnego pracownika opieki. {S1}' ),
				array( 'h2' => 'Jak może być organizowana opieka domowa?' ),
				array( 'p'  => 'Opieka domowa nie jest jednym sztywnym modelem. Sposób jej organizacji powinien wynikać z oceny potrzeb konkretnej osoby.' ),
				array( 'ul' => array( 'regularne wizyty trwające określoną liczbę godzin;', 'pomoc kilka razy w tygodniu;', 'codzienne bloki wsparcia;', 'czasowe wsparcie po chorobie lub hospitalizacji;', 'opieka domowa z zamieszkaniem;', 'model łączący pomoc rodziny, profesjonalnego personelu, usług społecznych i świadczeń zdrowotnych.' ) ),
				array( 'h2' => 'Co może obejmować?' ),
				array( 'p'  => 'Zakres zależy od potrzeb osoby, umowy, kompetencji personelu i rodzaju usługi.' ),
				array( 'ul' => array( 'pomoc w przygotowaniu i spożywaniu posiłków;', 'wsparcie przy ubieraniu i higienie;', 'pomoc w bezpiecznym przemieszczaniu się;', 'zakupy i organizowanie codziennych spraw;', 'lekkie prace domowe związane z potrzebami osoby korzystającej z opieki;', 'towarzyszenie i podtrzymywanie kontaktów społecznych;', 'wspieranie codziennej aktywności;', 'obserwowanie zmian w funkcjonowaniu i przekazywanie uzgodnionych informacji;', 'koordynowanie wsparcia z rodziną i innymi usługami.' ) ),
				array( 'p'  => 'Profesjonalny usługodawca powinien jasno określić, które czynności wchodzą w zakres usługi, które wymagają dodatkowych kwalifikacji, a które muszą zostać wykonane przez personel medyczny lub pielęgniarski.' ),
				array( 'h2' => 'Opieka domowa nie jest tym samym co opieka pielęgniarska' ),
				array( 'p'  => 'W tym samym domu mogą być świadczone różne rodzaje pomocy. Opiekun domowy może wspierać codzienne funkcjonowanie, a pielęgniarka wykonywać świadczenia zdrowotne. Samo miejsce świadczenia usługi nie przesądza o jej medycznym albo niemedycznym charakterze. {S3} {S4}' ),
				array( 'callout' => 'Opiekun domowy nie zastępuje lekarza ani pielęgniarki. Osoba może jednocześnie korzystać z niemedycznej opieki domowej i odrębnych świadczeń zdrowotnych.' ),
				array( 'h2' => 'Opieka domowa w Polsce może być organizowana w różnych systemach' ),
				array( 'p'  => 'Pomoc świadczona w domu może mieć różną podstawę organizacyjną i finansową. Może być przyznawana jako usługa pomocy społecznej, realizowana jako świadczenie zdrowotne finansowane przez NFZ albo zamawiana prywatnie. {S3} {S4}' ),
				array( 'p'  => 'Usługi opiekuńcze w systemie pomocy społecznej mogą obejmować pomoc w zaspokajaniu codziennych potrzeb, opiekę higieniczną, zaleconą pielęgnację oraz — w miarę możliwości — zapewnienie kontaktów z otoczeniem. Specjalistyczne usługi są dostosowane do potrzeb wynikających z choroby lub niepełnosprawności i są świadczone przez osoby ze specjalistycznym przygotowaniem. {S3}' ),
				array( 'p'  => 'Pielęgniarska domowa opieka długoterminowa jest natomiast świadczeniem zdrowotnym skierowanym do osób potrzebujących systematycznej i intensywnej opieki pielęgniarskiej w warunkach domowych. {S4}' ),
				array( 'h2' => 'Jak powinna być zorganizowana profesjonalna usługa?' ),
				array( 'ul' => array( 'rozpoczęcie od oceny potrzeb i ryzyk;', 'uzgodnienie zakresu czynności;', 'dopasowanie kompetencji personelu;', 'przygotowanie indywidualnego planu opieki;', 'określenie harmonogramu i zasad kontaktu;', 'ustalenie sposobu reagowania w sytuacji nagłej;', 'zapewnienie dokumentacji i bezpiecznego przepływu informacji;', 'określenie zasad zastępstwa;', 'zapewnienie możliwości zgłoszenia uwag lub skargi;', 'regularna aktualizacja planu.' ) ),
				array( 'callout' => 'Najprościej: opieka domowa opisuje miejsce i sposób świadczenia profesjonalnego wsparcia. Nie określa automatycznie jego intensywności ani medycznego charakteru.' ),
			),
		),

		'czym-jest-opieka-domowa-z-zamieszkaniem' => array(
			'id'             => 'kb-opieka-z-zamieszkaniem',
			'title'          => 'Czym jest opieka domowa z zamieszkaniem?',
			'eyebrow'        => 'Informacja ekspercka',
			'category'       => $cat,
			'excerpt'        => 'To model, w którym opiekun mieszka przez uzgodniony okres w domu osoby wymagającej wsparcia. Nie oznacza to pracy przez całą dobę.',
			'shortAnswer'    => 'Opieka domowa z zamieszkaniem to model, w którym opiekun mieszka przez uzgodniony okres w domu osoby wymagającej wsparcia i wykonuje ustalony zakres czynności. Zamieszkanie w domu nie oznacza pracy przez całą dobę ani stałej gotowości jednej osoby. {S1}',
			'keywords'       => array( 'opieka domowa z zamieszkaniem', 'live-in care', 'opiekun z zamieszkaniem', 'opiekunka z zamieszkaniem', 'opieka w domu', 'opieka 24h', 'czas pracy opiekuna' ),
			'sourceIds'      => array( 'S1' ),
			'related'        => array(
				array( 'kb' => 'czym-jest-opieka-domowa' ),
				array( 'kb' => 'pomoc-niemedyczna-a-opieka-medyczna' ),
				array( 'kb' => 'prawa-i-warunki-pracy-personelu-opiekunczego' ),
				array( 'kb' => 'ciaglosc-opieki-i-zastepstwo' ),
				array( 'url' => '/filary-opieki-domowej/', 'label' => 'Pięć filarów dobrej opieki domowej' ),
			),
			'seoTitle'       => 'Opieka domowa z zamieszkaniem — czym jest? | PSOD',
			'seoDescription' => 'Wyjaśniamy, czym jest opieka domowa z zamieszkaniem, jak powinna być organizowana i dlaczego nie oznacza pracy jednej osoby przez całą dobę.',
			'dateAdded'      => '2026-07-22',
			'dateModified'   => '2026-07-22',
			'contentStatus'  => 'expert-information',
			'disclaimerType' => 'general-info',
			'body'           => array(
				array( 'h2' => 'Na czym polega ten model?' ),
				array( 'p'  => 'Model z zamieszkaniem pozwala połączyć regularne wsparcie w ciągu dnia z pozostaniem osoby wymagającej opieki we własnym domu. Opiekun korzysta z miejsca zamieszkania osoby otrzymującej wsparcie, ale jednocześnie wykonuje pracę w określonych ramach.' ),
				array( 'p'  => 'Rada UE definiuje pracownika opieki z zamieszkaniem jako domowego pracownika opieki długoterminowej, który mieszka z osobą korzystającą z opieki i zapewnia jej wsparcie. {S1}' ),
				array( 'h2' => 'Jakiego terminu używa PSOD?' ),
				array( 'p'  => 'PSOD używa określenia „opieka domowa z zamieszkaniem” jako polskiego odpowiednika modelu określanego po angielsku jako live-in care. Termin opisuje sposób organizacji usługi, a nie odrębny zawód ani jednolicie uregulowane w Polsce świadczenie. Jest to termin redakcyjny stosowany przez PSOD, a nie nazwa ustawowa.' ),
				array( 'note_list' => array( 'intro' => 'Nie są to synonimy modelu opieki domowej z zamieszkaniem:', 'items' => array( 'opieka całodobowa;', 'opiekunka 24h;', 'praca 24 godziny na dobę;', 'całodobowa gotowość opiekuna.' ) ) ),
				array( 'h2' => 'Co może obejmować usługa?' ),
				array( 'ul' => array( 'pomoc przy codziennych czynnościach;', 'przygotowywanie posiłków;', 'wsparcie przy ubieraniu i higienie;', 'pomoc przy bezpiecznym przemieszczaniu się;', 'organizowanie codziennego rytmu;', 'zakupy i drobne sprawy domowe;', 'towarzyszenie;', 'wspieranie aktywności i kontaktów społecznych;', 'obserwowanie zmian w codziennym funkcjonowaniu;', 'współpracę z rodziną i innymi osobami zaangażowanymi w opiekę.' ) ),
				array( 'p'  => 'Dokładny zakres powinien być ustalony przed rozpoczęciem usługi i dostosowany do kompetencji konkretnej osoby. Czynności medyczne lub pielęgniarskie wymagają odrębnej oceny i odpowiednio uprawnionego personelu.' ),
				array( 'h2' => 'Czego nie oznacza zamieszkanie opiekuna?' ),
				array( 'ul' => array( 'pracy bez ustalonego czasu;', 'pozostawania w gotowości przez całą dobę;', 'rezygnacji z odpoczynku;', 'obowiązku wykonywania każdej czynności, o którą poprosi rodzina;', 'automatycznego wykonywania świadczeń medycznych;', 'braku prywatności;', 'zastępowania całego systemu opieki przez jedną osobę.' ) ),
				array( 'callout' => 'Jedna osoba nie może tworzyć całodobowego systemu opieki. Zamieszkanie w tym samym domu nie znosi prawa personelu do odpoczynku, prywatności i bezpiecznych warunków pracy.' ),
				array( 'h2' => 'Kiedy model może być odpowiedni?' ),
				array( 'p'  => 'Opieka domowa z zamieszkaniem może być rozważana, gdy osoba chce pozostać we własnym domu i potrzebuje powtarzalnego wsparcia w różnych porach dnia, ale jej potrzeby mogą zostać bezpiecznie zaspokojone przy zachowaniu określonego czasu pracy i odpoczynku personelu.' ),
				array( 'ul' => array( 'przeprowadzono rzetelną ocenę potrzeb;', 'znany jest zakres pomocy potrzebnej w dzień i w nocy;', 'warunki mieszkaniowe umożliwiają bezpieczne świadczenie usługi;', 'opiekun ma zapewnione warunki do odpoczynku i prywatności;', 'zakres obowiązków jest jasno opisany;', 'istnieją zasady kontaktu z usługodawcą;', 'przewidziano zastępstwo;', 'określono sposób reagowania na sytuacje nagłe;', 'potrzeby medyczne są zabezpieczone przez właściwe osoby lub usługi.' ) ),
				array( 'h2' => 'Jak traktować potrzeby występujące w nocy?' ),
				array( 'p'  => 'Sporadyczna potrzeba pomocy w nocy nie jest tym samym co regularna praca nocna lub stały nadzór. Częste interwencje, wielokrotne wstawanie, konieczność ciągłego czuwania albo wysokie ryzyko zdarzeń nocnych powinny prowadzić do ponownej oceny organizacji usługi.' ),
				array( 'p'  => 'Jeżeli rzeczywiste potrzeby wykraczają poza możliwość bezpiecznego zapewnienia ich przez jedną osobę z zachowaniem odpoczynku, potrzebne może być zaangażowanie dodatkowego personelu, rodziny, świadczeń pielęgniarskich albo innego modelu opieki.' ),
				array( 'h2' => 'Co należy uzgodnić przed rozpoczęciem usługi?' ),
				array( 'ul' => array( 'potrzeby i cele osoby korzystającej z opieki;', 'dokładny zakres czynności;', 'czas wykonywania obowiązków;', 'zasady odpoczynku i przerw;', 'sposób postępowania w nocy;', 'warunki zamieszkania i prywatności;', 'czynności wyłączone z zakresu usługi;', 'sposób kontaktu z rodziną i usługodawcą;', 'zasady zastępstwa;', 'procedury w sytuacji nagłej;', 'zakres odpowiedzialności poszczególnych osób;', 'koszt oraz zasady zmiany zakresu usługi.' ) ),
				array( 'h2' => 'Najważniejsza zasada' ),
				array( 'p'  => 'Model powinien być dopasowany zarówno do potrzeb osoby korzystającej z opieki, jak i do możliwości bezpiecznego zorganizowania pracy. Nie można budować bezpieczeństwa jednej osoby kosztem zdrowia, odpoczynku i praw drugiej.' ),
			),
		),

		'opieka-formalna-i-nieformalna' => array(
			'id'             => 'kb-formalna-nieformalna',
			'title'          => 'Czym różni się opieka formalna od nieformalnej?',
			'eyebrow'        => 'Informacja ekspercka',
			'category'       => $cat,
			'excerpt'        => 'Opiekę formalną świadczy profesjonalny personel. Opiekę nieformalną zapewniają najczęściej bliscy lub inne osoby z otoczenia.',
			'shortAnswer'    => 'Opiekę formalną świadczą profesjonalni pracownicy opieki. Opieka nieformalna jest zapewniana przez osobę z otoczenia osoby wymagającej wsparcia, na przykład partnera, dziecko, rodzica, sąsiada lub przyjaciela, który nie został zatrudniony jako zawodowy pracownik opieki. {S1} {S2}',
			'keywords'       => array( 'opieka formalna', 'opieka nieformalna', 'opiekun nieformalny', 'opiekun rodzinny', 'opieka rodzinna', 'profesjonalna opieka', 'szara strefa w opiece' ),
			'sourceIds'      => array( 'S1', 'S2' ),
			'related'        => array(
				array( 'kb' => 'czym-jest-opieka-dlugoterminowa' ),
				array( 'kb' => 'czym-jest-opieka-domowa' ),
				array( 'kb' => 'czym-jest-opieka-domowa-z-zamieszkaniem' ),
				array( 'kb' => 'jak-wybrac-bezpiecznego-uslugodawce' ),
			),
			'seoTitle'       => 'Opieka formalna i nieformalna — różnice | PSOD',
			'seoDescription' => 'Wyjaśniamy różnicę między profesjonalną opieką formalną a opieką zapewnianą przez rodzinę i inne osoby z otoczenia.',
			'dateAdded'      => '2026-07-22',
			'dateModified'   => '2026-07-22',
			'contentStatus'  => 'expert-information',
			'disclaimerType' => 'general-info',
			'body'           => array(
				array( 'h2' => 'Czym jest opieka formalna?' ),
				array( 'p'  => 'Formalna opieka długoterminowa jest zapewniana przez profesjonalny personel. Może być świadczona w domu, w ramach usług środowiskowych albo w placówce stacjonarnej. {S1}' ),
				array( 'p'  => 'Profesjonalna usługa powinna mieć określony zakres, zasady odpowiedzialności, sposób organizowania zastępstwa i możliwość zweryfikowania podmiotu lub osoby, która ją świadczy.' ),
				array( 'ul' => array( 'usługa opieki domowej świadczona przez profesjonalnego usługodawcę;', 'gminne usługi opiekuńcze;', 'pielęgniarska domowa opieka długoterminowa;', 'opieka dzienna;', 'opieka wytchnieniowa realizowana przez profesjonalny podmiot;', 'opieka świadczona w placówce.' ) ),
				array( 'h2' => 'Czym jest opieka nieformalna?' ),
				array( 'p'  => 'Opieka nieformalna jest zapewniana przez osobę należącą do otoczenia osoby potrzebującej wsparcia, która nie została zatrudniona jako zawodowy pracownik opieki. Najczęściej jest to członek rodziny, partner, przyjaciel, sąsiad lub inna bliska osoba. {S1} {S2}' ),
				array( 'ul' => array( 'pomoc w zakupach i przygotowywaniu posiłków;', 'towarzyszenie podczas wizyt;', 'pomoc przy higienie i ubieraniu;', 'organizowanie kontaktów z lekarzami i instytucjami;', 'nadzorowanie codziennych spraw;', 'wsparcie emocjonalne;', 'koordynowanie różnych rodzajów pomocy.' ) ),
				array( 'h2' => 'Porównanie' ),
				array( 'table' => array(
					'caption' => 'Porównanie opieki formalnej i nieformalnej',
					'head'    => array( 'Cecha', 'Opieka formalna', 'Opieka nieformalna' ),
					'rows'    => array(
						array( 'Kto ją zapewnia?', 'Profesjonalny personel lub usługodawca.', 'Rodzina, partner, przyjaciel, sąsiad lub inna osoba z otoczenia.' ),
						array( 'Podstawa relacji', 'Umowa, zatrudnienie, decyzja administracyjna albo inna formalna podstawa świadczenia usługi.', 'Relacja osobista i dobrowolne zaangażowanie osoby z otoczenia.' ),
						array( 'Organizacja zastępstwa', 'Powinna wynikać z organizacji usługi.', 'Często zależy od możliwości rodziny i sieci wsparcia.' ),
						array( 'Przygotowanie', 'Powinno być dopasowane do powierzonych czynności.', 'Może wymagać instruktażu, edukacji i wsparcia profesjonalistów.' ),
						array( 'Odpowiedzialność', 'Powinna być jasno określona.', 'Często pozostaje rozproszona lub nie jest formalnie opisana.' ),
					),
				) ),
				array( 'h2' => '„Nieformalna” nie oznacza „nielegalna”' ),
				array( 'p'  => 'Określenie „opieka nieformalna” nie jest synonimem szarej strefy. Opisuje przede wszystkim wsparcie udzielane przez osoby z otoczenia, które nie zostały zatrudnione jako zawodowi pracownicy opieki. {S1}' ),
				array( 'p'  => 'Szara strefa dotyczy natomiast odpłatnej pracy lub usług wykonywanych z pominięciem wymaganych obowiązków prawnych, podatkowych, ubezpieczeniowych albo rejestracyjnych. Są to dwa odrębne pojęcia.' ),
				array( 'callout' => 'Opieka rodzinna może być nieformalna i całkowicie zgodna z prawem. Odpłatna, niezarejestrowana praca nie staje się opieką rodzinną tylko dlatego, że jest wykonywana w prywatnym domu.' ),
				array( 'h2' => 'Czy opieka formalna i nieformalna mogą się uzupełniać?' ),
				array( 'p'  => 'Tak. W wielu sytuacjach najlepszy efekt daje połączenie zaangażowania bliskich z profesjonalnymi usługami. Rodzina może podtrzymywać relacje, znać preferencje osoby i uczestniczyć w podejmowaniu decyzji, a profesjonalny personel zapewniać określone kompetencje, regularność, dokumentację i zastępstwo.' ),
				array( 'p'  => 'Zakres odpowiedzialności powinien być jednak uzgodniony. Brak jasnego podziału może prowadzić do pominięcia ważnych czynności, podwójnego wykonywania zadań albo przerzucania odpowiedzialności na jedną osobę.' ),
				array( 'h2' => 'Dlaczego opiekunowie nieformalni również potrzebują wsparcia?' ),
				array( 'p'  => 'Długotrwałe i intensywne sprawowanie opieki może obciążać zdrowie, życie rodzinne i aktywność zawodową opiekuna nieformalnego. WHO i Rada UE wskazują na potrzebę zapewniania opiekunom dostępu do informacji, szkoleń, poradnictwa, wsparcia psychologicznego i opieki wytchnieniowej. {S1} {S2}' ),
				array( 'ul' => array( 'jasne informacje o stanie i potrzebach osoby;', 'instruktaż bezpiecznego wykonywania czynności;', 'możliwość konsultacji z profesjonalistą;', 'czas na odpoczynek;', 'zastępstwo;', 'wsparcie psychologiczne;', 'pomoc w godzeniu opieki z pracą i życiem rodzinnym.' ) ),
			),
		),

		'pomoc-niemedyczna-a-opieka-medyczna' => array(
			'id'             => 'kb-niemedyczna-medyczna',
			'title'          => 'Czym różni się pomoc niemedyczna od opieki medycznej i pielęgniarskiej?',
			'eyebrow'        => 'Informacja ekspercka',
			'category'       => $cat,
			'excerpt'        => 'Pomoc niemedyczna wspiera codzienne funkcjonowanie. Świadczenia zdrowotne wymagają odpowiednich kwalifikacji i uprawnień.',
			'shortAnswer'    => 'Niemedyczna pomoc wspiera osobę w codziennym funkcjonowaniu. Opieka medyczna i pielęgniarska obejmuje świadczenia związane ze stanem zdrowia, leczeniem i profesjonalną pielęgnacją, które wymagają odpowiednich kwalifikacji oraz uprawnień. Oba rodzaje wsparcia mogą być świadczone w tym samym domu, ale ich zakres powinien być jasno rozdzielony. {S3} {S4}',
			'keywords'       => array( 'pomoc niemedyczna', 'opieka medyczna', 'opieka pielęgniarska', 'opiekun a pielęgniarka', 'czynności opiekuna', 'leki w opiece domowej', 'pielęgniarska opieka domowa', 'świadczenia zdrowotne w domu' ),
			'sourceIds'      => array( 'S3', 'S4' ),
			'related'        => array(
				array( 'kb' => 'czym-jest-opieka-domowa' ),
				array( 'kb' => 'czym-jest-opieka-dlugoterminowa' ),
				array( 'kb' => 'jakich-czynnosci-moze-podejmowac-opiekun-domowy' ),
				array( 'url' => '/filary-opieki-domowej/#bezpieczenstwo', 'label' => 'Bezpieczeństwo — jeden z filarów dobrej opieki domowej' ),
			),
			'seoTitle'       => 'Pomoc niemedyczna a opieka medyczna | PSOD',
			'seoDescription' => 'Sprawdź, czym niemedyczna pomoc w codziennym funkcjonowaniu różni się od świadczeń medycznych i pielęgniarskich w domu.',
			'dateAdded'      => '2026-07-22',
			'dateModified'   => '2026-07-22',
			'contentStatus'  => 'expert-information',
			'disclaimerType' => 'general-info',
			'body'           => array(
				array( 'h2' => 'Na czym polega pomoc niemedyczna?' ),
				array( 'p'  => 'Pomoc niemedyczna koncentruje się na codziennym funkcjonowaniu, bezpieczeństwie, samodzielności i jakości życia osoby wymagającej wsparcia.' ),
				array( 'p'  => 'W zależności od potrzeb, umowy i kompetencji personelu może obejmować:' ),
				array( 'ul' => array( 'przygotowywanie posiłków;', 'robienie zakupów;', 'pomoc przy ubieraniu;', 'wsparcie podczas mycia i innych codziennych czynności higienicznych;', 'pomoc przy wstawaniu i przemieszczaniu się;', 'lekkie prace domowe związane z potrzebami osoby;', 'towarzyszenie;', 'organizowanie codziennego rytmu;', 'wspieranie aktywności;', 'przypominanie o uzgodnionych czynnościach;', 'pomoc w kontaktach z rodziną i usługami;', 'obserwowanie zmian w codziennym funkcjonowaniu i przekazywanie informacji zgodnie z ustalonym sposobem.' ) ),
				array( 'p'  => 'To, że czynność odbywa się przy osobie chorej, nie oznacza automatycznie, że jest świadczeniem medycznym. Jednocześnie zwykła czynność może stać się ryzykowna, jeżeli stan osoby jest niestabilny albo wymaga specjalistycznej wiedzy.' ),
				array( 'h2' => 'Na czym polega opieka medyczna i pielęgniarska?' ),
				array( 'p'  => 'Świadczenia medyczne i pielęgniarskie dotyczą ochrony zdrowia, oceny stanu klinicznego, leczenia, profesjonalnej pielęgnacji lub wykonywania procedur wymagających odpowiednich kwalifikacji.' ),
				array( 'p'  => 'W oficjalnej informacji dotyczącej pielęgniarskiej domowej opieki długoterminowej jako przykłady zadań pielęgniarki wskazano między innymi leczenie ran i odleżyn, zmianę opatrunków, wymianę cewników, podawanie leków, podłączanie kroplówek i wykonywanie zastrzyków. {S4}' ),
				array( 'p'  => 'Przykłady czynności wymagających zaangażowania właściwego personelu medycznego lub pielęgniarskiego:' ),
				array( 'ul' => array( 'ocena medyczna i diagnozowanie;', 'ustalanie albo zmiana leczenia;', 'leczenie ran i odleżyn;', 'wykonywanie zastrzyków;', 'podłączanie kroplówek;', 'wymiana cewników;', 'wykonywanie procedur medycznych;', 'podejmowanie decyzji o dawce, rodzaju lub sposobie stosowania leku;', 'specjalistyczna ocena pogorszenia stanu zdrowia.' ) ),
				array( 'p'  => 'Powyższa lista nie jest kompletnym katalogiem prawnym — pokazuje jedynie przykłady czynności wymagających odpowiednich uprawnień.' ),
				array( 'h2' => 'Dlaczego granica nie zawsze jest oczywista?' ),
				array( 'p'  => 'Niektóre obszary codziennej opieki znajdują się blisko świadczeń zdrowotnych. Dotyczy to między innymi pomocy przy lekach, żywieniu, transferze, higienie osoby obłożnie chorej oraz obsłudze sprzętu.' ),
				array( 'p'  => 'O tym, czy dana czynność może zostać bezpiecznie wykonana przez opiekuna, nie powinna decydować wyłącznie jej potoczna nazwa. Znaczenie mają stan osoby, poziom ryzyka, sposób wykonania, kwalifikacje personelu, zalecenia profesjonalistów i obowiązujące przepisy.' ),
				array( 'callout' => 'Opiekun domowy nie powinien samodzielnie diagnozować, zmieniać leczenia, dobierać leków ani wykonywać czynności wykraczających poza jego kwalifikacje, uprawnienia lub uzgodniony zakres usługi.' ),
				array( 'h2' => 'Pomoc przy lekach' ),
				array( 'p'  => 'Pomoc przy lekach wymaga szczególnej ostrożności. Inne ryzyko wiąże się z przypomnieniem o porze przyjęcia leku, a inne z wyborem preparatu, zmianą dawki, podaniem zastrzyku albo reakcją na działania niepożądane.' ),
				array( 'ul' => array( 'zakres pomocy powinien być ustalony przed rozpoczęciem usługi;', 'opiekun nie może samodzielnie zmieniać leku, dawki ani pory jego przyjmowania;', 'wątpliwości należy przekazać osobie uprawnionej do podejmowania decyzji medycznych;', 'leki powinny być przechowywane i przygotowywane zgodnie z ustalonym sposobem;', 'błąd lub podejrzenie nieprawidłowości należy niezwłocznie zgłosić według procedury usługodawcy.' ) ),
				array( 'h2' => 'Jak wygląda to w polskich usługach publicznych?' ),
				array( 'p'  => 'Usługi opiekuńcze w systemie pomocy społecznej obejmują między innymi pomoc w codziennych potrzebach, opiekę higieniczną, zaleconą przez lekarza pielęgnację oraz — w miarę możliwości — zapewnienie kontaktów z otoczeniem. Specjalistyczne usługi są świadczone przez osoby ze specjalistycznym przygotowaniem. {S3}' ),
				array( 'p'  => 'Pielęgniarska domowa opieka długoterminowa jest odrębnym świadczeniem skierowanym do osób przewlekle chorych, które potrzebują systematycznej i intensywnej opieki pielęgniarskiej w domu. {S4}' ),
				array( 'p'  => 'Sformułowanie „opieka w domu” nie określa więc samo w sobie rodzaju świadczenia. W domu mogą być równolegle realizowane usługi społeczne, prywatna pomoc niemedyczna i świadczenia zdrowotne.' ),
				array( 'h2' => 'Jak profesjonalny usługodawca powinien wyznaczać granice?' ),
				array( 'ul' => array( 'przeprowadzić ocenę potrzeb i ryzyk;', 'opisać zakres czynności w umowie lub planie opieki;', 'sprawdzić kompetencje personelu;', 'jasno wskazać czynności wyłączone;', 'określić sposób współpracy z rodziną i personelem medycznym;', 'zapewnić procedurę zgłaszania zmian stanu zdrowia;', 'nie powierzać opiekunowi czynności wymagających innych kwalifikacji;', 'aktualizować plan po zmianie stanu osoby;', 'zapewnić kontakt z koordynatorem usługi.' ) ),
				array( 'h2' => 'Najważniejsza zasada' ),
				array( 'p'  => 'Dobra opieka nie polega na wykonywaniu przez jedną osobę wszystkich możliwych czynności. Polega na właściwym rozpoznaniu potrzeb i zaangażowaniu osób o odpowiednich kompetencjach.' ),
			),
		),

		'czym-jest-ciaglosc-opieki-domowej' => array(
			'id'             => 'kb-ciaglosc',
			'title'          => 'Czym jest ciągłość opieki domowej?',
			'eyebrow'        => 'Informacja ekspercka',
			'category'       => $cat,
			'excerpt'        => 'To nieprzerwana realizacja uzgodnionej opieki mimo absencji, zmiany lub odejścia opiekuna — dzięki planowaniu, dokumentacji, zastępstwom i bezpiecznemu przekazywaniu obowiązków.',
			'shortAnswer'    => 'Ciągłość opieki domowej oznacza zdolność usługodawcy do zapewnienia osobie korzystającej z opieki nieprzerwanej realizacji uzgodnionego zakresu opieki, bez nieplanowanej luki, niezależnie od absencji, zmiany lub odejścia konkretnego opiekuna. Każda zmiana osoby sprawującej opiekę musi odbywać się poprzez bezpieczne przejęcie obowiązków, informacji i odpowiedzialności. {S1}',
			'keywords'       => array( 'ciągłość opieki', 'ciągłość opieki domowej', 'zastępstwo opiekuna', 'przekazanie opieki', 'plan opieki', 'organizacja opieki domowej', 'zmiana opiekuna' ),
			'sourceIds'      => array( 'S1' ),
			'related'        => array(
				array( 'kb' => 'czym-jest-opieka-domowa' ),
				array( 'kb' => 'czym-jest-opieka-domowa-z-zamieszkaniem' ),
				array( 'url' => '/filary-opieki-domowej/#ciaglosc', 'label' => 'Ciągłość — jeden z filarów dobrej opieki domowej' ),
			),
			'seoTitle'       => 'Czym jest ciągłość opieki domowej? | PSOD',
			'seoDescription' => 'Wyjaśniamy, czym jest ciągłość opieki domowej: nieprzerwana realizacja uzgodnionej opieki mimo zmian personelu, dzięki organizacji, dokumentacji i zastępstwom.',
			'dateAdded'      => '2026-07-22',
			'dateModified'   => '2026-07-22',
			'contentStatus'  => 'expert-information',
			'disclaimerType' => 'general-info',
			'body'           => array(
				array( 'h2' => 'Co oznacza ciągłość opieki?' ),
				array( 'p'  => 'Ciągłość jest jedną z zasad jakości opieki długoterminowej: osoba korzystająca z opieki nie powinna być narażona na nieplanowaną przerwę w dostępie do uzgodnionego wsparcia. {S1}' ),
				array( 'p'  => 'W praktyce oznacza to, że usługa jest tak zorganizowana, aby absencja, urlop, choroba, zmiana albo odejście konkretnego opiekuna nie przerywały realizacji planu opieki.' ),
				array( 'h2' => 'Wymiary ciągłości opieki' ),
				array( 'p'  => 'Ciągłość opieki domowej ma kilka wymiarów. Dobra usługa dba o wszystkie, a nie tylko o samą obecność opiekuna.' ),
				array( 'table' => array(
					'caption' => 'Wymiary ciągłości opieki domowej',
					'head'    => array( 'Wymiar', 'Co oznacza w praktyce' ),
					'rows'    => array(
						array( 'Ciągłość świadczenia — brak luki opiekuńczej', 'Osoba korzystająca z opieki nie pozostaje bez wsparcia w czasie, w którym — zgodnie z oceną potrzeb i planem — wymaga obecności lub pomocy opiekuna. Absencja, choroba, rezygnacja, opóźnienie podróży czy problem formalnoprawny nie powinny automatycznie przerywać usługi.' ),
						array( 'Ciągłość personalna i relacyjna', 'Opiekę zapewnia w miarę możliwości ta sama osoba albo mały, stały zespół. Ogranicza się liczbę nieznanych opiekunów oraz nieuzasadnione zmiany.' ),
						array( 'Ciągłość informacyjna', 'Każdy kolejny opiekun otrzymuje pełną, aktualną i zrozumiałą wiedzę o osobie korzystającej z opieki: jej potrzebach, sprawności, zwyczajach, preferencjach, rytmie dnia, sposobie komunikacji, ryzykach i wcześniejszych zdarzeniach.' ),
						array( 'Ciągłość planu i sposobu opieki', 'Zmiana opiekuna nie powoduje przypadkowej zmiany ustalonych zasad, godzin, rutyn ani celów opieki. Obowiązuje jeden aktualny, spersonalizowany plan.' ),
						array( 'Ciągłość przejęcia odpowiedzialności', 'Dotychczasowy opiekun nie kończy opieki, dopóki obowiązki nie zostaną skutecznie przejęte przez następcę albo inne bezpieczne rozwiązanie. Samo wskazanie nazwiska zastępcy nie wystarcza.' ),
						array( 'Ciągłość awaryjna i organizacyjna', 'Usługodawca ma przygotowany plan na nieobecność opiekuna, nagłe pogorszenie sytuacji, przerwanie transportu, odejście pracownika, konflikt, zdarzenie losowe lub zakończenie umowy.' ),
					),
				) ),
				array( 'h2' => 'Gdy wymiary ciągłości są w napięciu' ),
				array( 'p'  => 'Nie zawsze da się jednocześnie w pełni spełnić wszystkie wymiary. W praktyce pierwszeństwo ma bezpieczeństwo osoby korzystającej z opieki, w kolejności:' ),
				array( 'ul' => array( 'osoba korzystająca z opieki nie może pozostać bez zabezpieczonej opieki;', 'osoba przejmująca opiekę musi otrzymać pełną informację;', 'należy zachować dotychczasowy plan, zwyczaje i sposób postępowania;', 'w miarę możliwości należy utrzymać tego samego opiekuna lub mały zespół.' ) ),
				array( 'p'  => 'Oznacza to, że zastępstwo osoby znającej dokumentację i sytuację jest bezpieczniejsze niż oczekiwanie na preferowanego opiekuna przy jednoczesnym pozostawieniu osoby korzystającej z opieki bez pomocy.' ),
				array( 'h2' => 'Ciągłość to cecha organizacji usługi, nie jednej osoby' ),
				array( 'p'  => 'Ciągłości nie zapewnia stała obecność jednej osoby, lecz właściwa organizacja usługi: harmonogramy, dokumentacja, zastępstwa oraz jasny podział odpowiedzialności.' ),
				array( 'callout' => 'Ciągłość nie oznacza, że jedna osoba pozostaje w gotowości przez całą dobę. Zapewnia ją organizacja usługi — planowanie, zastępstwa i bezpieczne przekazywanie obowiązków.' ),
				array( 'h2' => 'Bezpieczne przekazanie opieki przy zmianie opiekuna' ),
				array( 'p'  => 'Każda zmiana osoby sprawującej opiekę powinna odbywać się przez bezpieczne przejęcie obowiązków, informacji i odpowiedzialności, tak aby nowy członek personelu znał potrzeby, plan i wcześniejsze ustalenia.' ),
				array( 'ul' => array( 'aktualny plan opieki i uzgodniony zakres czynności;', 'istotne informacje o potrzebach, preferencjach i ryzykach;', 'ustalenia dotyczące pomocy przy lekach oraz kontaktów w sytuacji nagłej;', 'dokumentację dotychczasowego przebiegu opieki;', 'wskazanie osoby lub koordynatora odpowiedzialnego za usługę.' ) ),
				array( 'h2' => 'Co składa się na ciągłość opieki?' ),
				array( 'p'  => 'Zasady jakości opieki długoterminowej wskazują na potrzebę zapewnienia ciągłości oraz właściwego przepływu informacji między osobami zaangażowanymi w opiekę. {S1}' ),
				array( 'ul' => array( 'ustalenie zakresu usługi i planu opieki przed jej rozpoczęciem;', 'aktualna, kompletna i odpowiednio chroniona dokumentacja;', 'zasady organizowania zastępstwa podczas absencji, urlopu lub rezygnacji;', 'przekazywanie obowiązków i niezbędnych informacji między osobami realizującymi opiekę;', 'określenie kontaktów oraz sposobu reagowania w sytuacjach nagłych;', 'aktualizacja planu po zmianie stanu zdrowia, sprawności lub sytuacji;', 'plan postępowania na wypadek czasowego lub trwałego zakończenia usługi.' ) ),
				array( 'h2' => 'Dlaczego ciągłość jest ważna?' ),
				array( 'p'  => 'Osoba zależna od pomocy innych może zostać narażona na poważne ryzyko, jeżeli opieka zostanie nagle przerwana albo jeśli ważne informacje nie zostaną przekazane. Ciągłość ogranicza to ryzyko i pozwala utrzymać jakość oraz bezpieczeństwo wsparcia.' ),
				array( 'h2' => 'Najczęstsze nieporozumienia' ),
				array( 'ul' => array( 'ciągłość nie oznacza pracy jednej osoby przez całą dobę;', 'nie wyklucza zmiany opiekuna, jeśli odbywa się ona bezpiecznie;', 'nie polega wyłącznie na obecności, lecz na organizacji usługi i przepływie informacji;', 'nie jest tym samym co brak jakiegokolwiek kontaktu z przerwami — chodzi o brak nieplanowanych luk w uzgodnionej opiece.' ) ),
			),
		),

		'jakich-czynnosci-moze-podejmowac-opiekun-domowy' => array(
			'id'             => 'kb-czynnosci-opiekuna',
			'title'          => 'Jakich czynności może podejmować opiekun domowy?',
			'eyebrow'        => 'Informacja ekspercka',
			'category'       => 'Organizacja i bezpieczeństwo',
			'excerpt'        => 'Opiekun domowy wspiera codzienne funkcjonowanie — posiłki, higienę, przemieszczanie się, sprawy dnia. Zakres zależy od potrzeb, ryzyka, umowy i kompetencji; nie obejmuje świadczeń medycznych.',
			'shortAnswer'    => 'Opiekun domowy może wspierać osobę w codziennym funkcjonowaniu, między innymi przy posiłkach, higienie, ubieraniu, przemieszczaniu się, zakupach, organizowaniu dnia i kontaktach społecznych. Dokładny zakres zależy jednak od potrzeb osoby, poziomu ryzyka, umowy, kompetencji opiekuna oraz podstawy prawnej usługi. Opiekun nie powinien wykonywać świadczeń medycznych lub pielęgniarskich, do których nie ma wymaganych kwalifikacji i uprawnień. {S1} {S3} {S4}',
			'keywords'       => array( 'obowiązki opiekuna domowego', 'czynności opiekuna', 'zakres opieki domowej', 'czego nie może robić opiekun', 'pomoc przy higienie', 'pomoc przy lekach', 'opiekun a pielęgniarka', 'opieka nad seniorem w domu' ),
			'sourceIds'      => array( 'S1', 'S3', 'S4' ),
			'related'        => array(
				array( 'kb' => 'czym-jest-opieka-domowa' ),
				array( 'kb' => 'pomoc-niemedyczna-a-opieka-medyczna' ),
				array( 'kb' => 'jak-wybrac-bezpiecznego-uslugodawce' ),
				array( 'kb' => 'ciaglosc-opieki-i-zastepstwo' ),
			),
			'seoTitle'       => 'Zakres obowiązków opiekuna domowego | PSOD',
			'seoDescription' => 'Sprawdź, jakie czynności może wykonywać opiekun domowy, które wymagają oceny ryzyka i które powinny być powierzane personelowi medycznemu.',
			'dateAdded'      => '2026-07-22',
			'dateModified'   => '2026-07-22',
			'contentStatus'  => 'expert-information',
			'disclaimerType' => 'general-info',
			'body'           => array(
				array( 'h2' => 'Nie istnieje jeden zamknięty katalog czynności' ),
				array( 'p'  => 'Zakres pracy opiekuna domowego nie powinien wynikać wyłącznie z nazwy stanowiska albo ogólnego hasła „opieka nad seniorem”. Ta sama czynność może mieć różny poziom trudności i ryzyka w zależności od stanu konkretnej osoby.' ),
				array( 'p'  => 'Pomoc przy wstawaniu osobie zachowującej znaczną sprawność jest czymś innym niż wykonywanie transferu osoby całkowicie zależnej, z wykorzystaniem specjalistycznego sprzętu. Podobnie przypomnienie o przygotowanym leku różni się od decydowania o jego dawce lub wykonywania zastrzyku.' ),
				array( 'callout' => 'O możliwości wykonania czynności decydują łącznie: potrzeba osoby, ryzyko, kompetencje opiekuna, uzgodniony zakres usługi oraz obowiązujące przepisy.' ),
				array( 'h2' => 'Typowe obszary niemedycznej pomocy' ),
				array( 'h3' => 'Pomoc w podstawowych czynnościach życia codziennego' ),
				array( 'ul' => array( 'przygotowanie miejsca i pomoc podczas jedzenia i picia;', 'pomoc przy ubieraniu i rozbieraniu;', 'wsparcie podczas mycia i innych codziennych czynności higienicznych;', 'pomoc przy korzystaniu z toalety;', 'pomoc przy wstawaniu, siadaniu i zmianie pozycji;', 'asekuracja podczas przemieszczania się;', 'przygotowanie bezpiecznego otoczenia do wykonywania codziennych czynności.' ) ),
				array( 'p'  => 'Zakres bezpośredniej pomocy powinien być dostosowany do możliwości osoby. Opiekun nie powinien automatycznie wykonywać za nią czynności, które może ona bezpiecznie wykonać samodzielnie.' ),
				array( 'h3' => 'Pomoc w prowadzeniu codziennego życia' ),
				array( 'ul' => array( 'przygotowywanie zwykłych posiłków;', 'robienie zakupów;', 'pranie i lekkie prace domowe związane z potrzebami osoby korzystającej z opieki;', 'organizowanie codziennych spraw;', 'pomoc w umawianiu wizyt i kontaktowaniu się z usługami;', 'towarzyszenie podczas spaceru lub wyjścia;', 'pomoc w korzystaniu z telefonu i innych narzędzi komunikacji;', 'pomoc w porządkowaniu dokumentów i rachunków bez samodzielnego dysponowania pieniędzmi osoby bez jej wyraźnej zgody i odpowiedniej podstawy.' ) ),
				array( 'h3' => 'Wsparcie społeczne i organizacja dnia' ),
				array( 'ul' => array( 'towarzyszenie i rozmowa;', 'wspieranie kontaktów z rodziną i znajomymi;', 'zachęcanie do bezpiecznej aktywności;', 'wspieranie utrzymania codziennego rytmu;', 'przypominanie o uzgodnionych czynnościach;', 'pomoc w orientowaniu się w planie dnia;', 'obserwowanie zmian w codziennym funkcjonowaniu;', 'przekazywanie uzgodnionych informacji rodzinie, koordynatorowi lub właściwemu profesjonaliście.' ) ),
				array( 'p'  => 'Opiekun może obserwować i zgłaszać zmianę, ale nie powinien samodzielnie stawiać diagnozy ani zmieniać sposobu leczenia.' ),
				array( 'h2' => 'Czynności wymagające indywidualnej oceny ryzyka' ),
				array( 'p'  => 'Niektóre czynności mogą mieścić się w pomocy domowej, ale ich bezpieczne wykonywanie wymaga wcześniejszej oceny sytuacji, instruktażu, odpowiedniego sprzętu albo dodatkowych kompetencji.' ),
				array( 'ul' => array( 'transfer osoby z łóżka na krzesło lub wózek;', 'pomoc osobie, która często upada;', 'pomoc przy jedzeniu osobie mającej trudności z połykaniem;', 'intensywna pomoc przy higienie osoby obłożnie chorej;', 'obsługa podnośnika, łóżka specjalistycznego lub innego sprzętu;', 'pomoc przy lekach;', 'opieka nad osobą z zaawansowanymi zaburzeniami poznawczymi;', 'reagowanie na zachowania agresywne lub silne pobudzenie;', 'częste interwencje w nocy;', 'pomoc osobie, której stan zdrowia jest niestabilny.' ) ),
				array( 'callout' => 'Jeżeli czynność może zagrozić osobie korzystającej z opieki albo opiekunowi, nie należy wykonywać jej wyłącznie na podstawie ustnej prośby rodziny. Trzeba ponownie ocenić potrzeby, ryzyko i właściwy sposób organizacji wsparcia.' ),
				array( 'h2' => 'Czego opiekun bez odpowiednich kwalifikacji nie powinien robić?' ),
				array( 'p'  => 'Opiekun domowy świadczący niemedyczną pomoc nie zastępuje lekarza, pielęgniarki, ratownika medycznego ani innego uprawnionego przedstawiciela zawodu medycznego. {S4}' ),
				array( 'ul' => array( 'diagnozowanie chorób;', 'podejmowanie decyzji o rozpoczęciu lub zmianie leczenia;', 'samodzielna zmiana dawki lub rodzaju leku;', 'wykonywanie zastrzyków;', 'podłączanie kroplówek;', 'wymiana cewników;', 'leczenie ran i odleżyn;', 'wykonywanie procedur medycznych;', 'podejmowanie specjalistycznej oceny stanu klinicznego;', 'stosowanie przymusu lub środków ograniczających swobodę bez właściwej podstawy.' ) ),
				array( 'p'  => 'Lista ma charakter przykładowy i nie stanowi kompletnego katalogu prawnego.' ),
				array( 'link' => array( 'url' => '/centrum-wiedzy/pomoc-niemedyczna-a-opieka-medyczna/', 'label' => 'Czym różni się pomoc niemedyczna od opieki medycznej i pielęgniarskiej?' ) ),
				array( 'h2' => 'Co powinien zawierać opis zakresu usługi?' ),
				array( 'ul' => array( 'nazwę czynności;', 'cel pomocy;', 'sposób wykonywania;', 'częstotliwość lub porę;', 'osobę odpowiedzialną;', 'wymagane kompetencje;', 'znane ryzyka;', 'potrzebny sprzęt;', 'sytuacje, w których należy przerwać czynność;', 'sposób zgłoszenia problemu;', 'czynności wyraźnie wyłączone z usługi.' ) ),
				array( 'example_metric' => array( 'title' => 'Przykładowa metryczka czynności (wzór — bez danych konkretnej osoby)', 'fields' => array( 'Czynność', 'Zakres pomocy', 'Kiedy jest wykonywana', 'Kto może ją wykonać', 'Znane ryzyka', 'Kiedy należy skontaktować się z koordynatorem', 'Czego nie obejmuje' ) ) ),
				array( 'h2' => 'Co zrobić, gdy potrzeby się zmieniają?' ),
				array( 'p'  => 'Zakres usługi powinien zostać ponownie oceniony po istotnej zmianie stanu zdrowia, sprawności, zachowania, warunków mieszkaniowych lub częstotliwości potrzebnej pomocy.' ),
				array( 'p'  => 'Sygnały wymagające ponownej oceny:' ),
				array( 'ul' => array( 'nowe lub częstsze upadki;', 'nagłe pogorszenie sprawności;', 'problemy z połykaniem;', 'powtarzające się błędy przy lekach;', 'częste wezwania opiekuna w nocy;', 'pojawienie się ran lub odleżyn;', 'nasilone zaburzenia zachowania;', 'utrata możliwości bezpiecznego pozostawania bez nadzoru;', 'konieczność wykonywania czynności spoza uzgodnionego zakresu;', 'przeciążenie fizyczne lub psychiczne opiekuna.' ) ),
				array( 'callout' => 'Zmiana potrzeb osoby powinna prowadzić do zmiany planu opieki, a nie do nieformalnego dokładania kolejnych obowiązków opiekunowi.' ),
			),
		),

		'jak-wybrac-bezpiecznego-uslugodawce' => array(
			'id'             => 'kb-wybor-uslugodawcy',
			'title'          => 'Jak wybrać bezpiecznego usługodawcę opieki domowej?',
			'eyebrow'        => 'Informacja ekspercka',
			'category'       => 'Organizacja i bezpieczeństwo',
			'excerpt'        => 'Zanim wybierzesz firmę opieki domowej, sprawdź dane rejestrowe, umowę, zakres usługi, personel, zastępstwo, koszty i procedury bezpieczeństwa — nie tylko cenę.',
			'shortAnswer'    => 'Przed wyborem usługodawcy sprawdź jego dane rejestrowe, zakres odpowiedzialności, sposób oceny potrzeb, kwalifikacje personelu, organizację zastępstw, procedury bezpieczeństwa, warunki umowy i możliwość składania skarg. Nie wybieraj wyłącznie na podstawie ceny, reklamy albo obietnicy „opieki 24 godziny na dobę” świadczonej przez jedną osobę. {S1} {S7}',
			'keywords'       => array( 'jak wybrać firmę opiekuńczą', 'bezpieczna opieka domowa', 'firma opieki domowej', 'umowa na opiekę', 'sprawdzenie opiekunki', 'CEIDG opieka domowa', 'RPWDL', 'checklista opieki domowej' ),
			'sourceIds'      => array( 'S1', 'S7', 'S8', 'S9' ),
			'related'        => array(
				array( 'kb' => 'jakich-czynnosci-moze-podejmowac-opiekun-domowy' ),
				array( 'kb' => 'ciaglosc-opieki-i-zastepstwo' ),
				array( 'kb' => 'prawa-osoby-korzystajacej-z-opieki' ),
				array( 'kb' => 'czym-jest-opieka-domowa-z-zamieszkaniem' ),
			),
			'seoTitle'       => 'Jak wybrać firmę opieki domowej? Checklista | PSOD',
			'seoDescription' => 'Sprawdź, jak zweryfikować firmę opieki domowej, umowę, zakres usługi, personel, zastępstwo, koszty i procedury bezpieczeństwa.',
			'dateAdded'      => '2026-07-22',
			'dateModified'   => '2026-07-22',
			'contentStatus'  => 'expert-information',
			'disclaimerType' => 'general-info',
			'body'           => array(
				array( 'h2' => '1. Sprawdź, z kim zawierasz umowę' ),
				array( 'p'  => 'Usługodawca powinien jednoznacznie podać pełną nazwę, formę prawną, adres, NIP, dane kontaktowe oraz osobę odpowiedzialną za realizację usługi.' ),
				array( 'ul' => array( 'sprawdź dane przedsiębiorcy w wyszukiwarce CEIDG lub KRS;', 'porównaj dane z rejestru z danymi na umowie i fakturze;', 'sprawdź, czy działalność nie jest zawieszona albo wykreślona;', 'upewnij się, kto faktycznie będzie stroną umowy;', 'ustal, kto odpowiada za personel i prawidłową realizację usługi.' ) ),
				array( 'link' => array( 'url' => 'https://www.biznes.gov.pl/pl/wyszukiwarka-firm/', 'label' => 'Sprawdź firmę w CEIDG lub KRS', 'ext' => true ) ),
				array( 'h2' => '2. Sprawdź charakter oferowanej usługi' ),
				array( 'p'  => 'Samo użycie w nazwie słów „opieka”, „medyczna”, „pielęgnacyjna” lub „zdrowotna” nie przesądza o rzeczywistym zakresie uprawnień usługodawcy.' ),
				array( 'p'  => 'Jeżeli podmiot deklaruje udzielanie świadczeń zdrowotnych, jego dane i zakres działalności należy zweryfikować w Rejestrze Podmiotów Wykonujących Działalność Leczniczą. {S8}' ),
				array( 'link' => array( 'url' => 'https://www.gov.pl/web/zdrowie/rejestr-podmiotow-wykonujacych-dzialalnosc-lecznicza', 'label' => 'Sprawdź podmiot w RPWDL', 'ext' => true ) ),
				array( 'callout' => 'Podmiot świadczący wyłącznie niemedyczną pomoc domową nie musi być wpisany do RPWDL tylko dlatego, że świadczy usługi opiekuńcze. Rejestr jest właściwy dla podmiotów wykonujących działalność leczniczą.' ),
				array( 'h2' => '3. Oczekuj oceny potrzeb przed rozpoczęciem usługi' ),
				array( 'p'  => 'Rzetelny usługodawca powinien przedstawić sposób oceny potrzeb, ryzyk i warunków domowych. Sama rozmowa o liczbie godzin i cenie nie wystarcza do bezpiecznego zorganizowania opieki.' ),
				array( 'p'  => 'Ocena powinna obejmować między innymi:' ),
				array( 'ul' => array( 'codzienną sprawność osoby;', 'potrzebną pomoc w dzień i w nocy;', 'mobilność i ryzyko upadków;', 'sposób odżywiania i ewentualne trudności z połykaniem;', 'potrzeby związane z higieną;', 'stan poznawczy i zachowanie;', 'stosowany sprzęt;', 'potrzeby medyczne i pielęgniarskie;', 'warunki mieszkaniowe;', 'dostępne wsparcie rodziny;', 'sytuacje nagłe;', 'oczekiwania i preferencje osoby korzystającej z opieki.' ) ),
				array( 'callout' => 'Firma, która obiecuje odpowiednią opiekę bez poznania potrzeb osoby, nie ma podstaw do rzetelnego określenia zakresu usługi ani wymaganego personelu.' ),
				array( 'h2' => '4. Przeczytaj umowę i załączniki' ),
				array( 'p'  => 'Umowa powinna określać:' ),
				array( 'ul' => array( 'strony umowy;', 'miejsce świadczenia usługi;', 'datę rozpoczęcia;', 'zakres czynności;', 'czynności wyłączone;', 'harmonogram;', 'sposób organizacji potrzeb nocnych;', 'zasady zastępstwa;', 'dane koordynatora;', 'sposób reagowania na sytuacje nagłe;', 'zasady dokumentowania usługi;', 'cenę i wszystkie możliwe opłaty dodatkowe;', 'terminy i sposób płatności;', 'zasady zmiany zakresu;', 'zasady wypowiedzenia;', 'procedurę składania skarg;', 'zakres odpowiedzialności;', 'sposób przetwarzania danych;', 'zasady przekazywania kluczy, dokumentów i dostępu do mieszkania.' ) ),
				array( 'p'  => 'Nie podpisuj dokumentu zawierającego puste pola, ogólne sformułowania pozwalające dowolnie zmieniać cenę albo zobowiązanie opiekuna do wykonywania wszystkich poleceń rodziny.' ),
				array( 'h2' => '5. Zapytaj, jak dobierany i wspierany jest personel' ),
				array( 'ul' => array( 'Jak weryfikowana jest tożsamość osoby?', 'Jak sprawdzane są doświadczenie i przedstawione kwalifikacje?', 'Jak firma ocenia znajomość języka i zdolność komunikacji?', 'Jak dobiera osobę do konkretnych potrzeb?', 'Jak przygotowuje personel do rozpoczęcia usługi?', 'Kto udziela wsparcia podczas realizacji opieki?', 'Jak często aktualizowany jest plan?', 'Co dzieje się, gdy opiekun nie radzi sobie z powierzonymi czynnościami?', 'Jak firma reaguje na zgłoszenie przemocy lub naruszenia granic?', 'Jak organizuje zastępstwo?' ) ),
				array( 'p'  => 'Usługodawca powinien wyjaśnić sposób weryfikacji personelu, ale nie powinien udostępniać rodzinie poufnych danych pracownika ani dokumentów, których przekazywanie nie ma odpowiedniej podstawy.' ),
				array( 'h2' => '6. Sprawdź zasady ciągłości i zastępstwa' ),
				array( 'p'  => 'Bezpieczna usługa nie może zależeć wyłącznie od dyspozycyjności jednej osoby. Usługodawca powinien wyjaśnić, co stanie się podczas choroby, urlopu, nagłej rezygnacji, opóźnienia w podróży albo konfliktu między stronami.' ),
				array( 'ul' => array( 'kto przyjmuje zgłoszenie nieobecności;', 'w jakim czasie rodzina otrzyma informację;', 'kto wyszukuje zastępstwo;', 'jak sprawdzane są kompetencje zastępcy;', 'jak przekazywane są niezbędne informacje;', 'co dzieje się, jeżeli natychmiastowe zastępstwo jest niemożliwe;', 'kto odpowiada za rozwiązanie sytuacji.' ) ),
				array( 'h2' => '7. Oceń organizację opieki domowej z zamieszkaniem' ),
				array( 'p'  => 'W modelu z zamieszkaniem trzeba oddzielić obecność opiekuna w domu od czasu wykonywania obowiązków.' ),
				array( 'ul' => array( 'zakres i czas pracy;', 'przerwy oraz odpoczynek;', 'sposób reagowania w nocy;', 'częstotliwość nocnych interwencji;', 'warunki zakwaterowania;', 'dostęp do prywatnej przestrzeni;', 'zasady korzystania z kuchni i łazienki;', 'zasady opuszczania domu w czasie wolnym;', 'zastępstwo;', 'czynności, których opiekun nie wykonuje.' ) ),
				array( 'callout' => 'Obietnica, że jedna osoba będzie przez całą dobę pracować, czuwać i pozostawać w stałej gotowości, jest poważnym sygnałem ostrzegawczym.' ),
				array( 'h2' => '8. Sprawdź sposób zgłaszania uwag i zdarzeń' ),
				array( 'p'  => 'Usługodawca powinien wskazać:' ),
				array( 'ul' => array( 'dane koordynatora;', 'kanał do pilnego kontaktu;', 'sposób zgłaszania zwykłych uwag;', 'sposób zgłaszania skarg;', 'procedurę reagowania na przemoc, zaniedbanie lub nadużycie;', 'sposób dokumentowania zdarzeń;', 'termin odpowiedzi;', 'sposób eskalacji nierozwiązanej sprawy.' ) ),
				array( 'h2' => '9. Zapytaj o odpowiedzialność i ubezpieczenie' ),
				array( 'p'  => 'Zapytaj, czy usługodawca posiada ubezpieczenie odpowiedzialności cywilnej, jaki jest jego zakres i jakie zdarzenia obejmuje. Samo posiadanie polisy nie zastępuje prawidłowej organizacji usługi, ale brak jasnej odpowiedzi powinien skłonić do dalszej weryfikacji.' ),
				array( 'h2' => '10. Sprawdź pełną cenę' ),
				array( 'p'  => 'Cena powinna wskazywać:' ),
				array( 'ul' => array( 'podstawową stawkę;', 'podatki;', 'koszty podróży;', 'opłaty za święta lub szczególne terminy;', 'koszty zastępstwa;', 'koszty zmiany zakresu;', 'ewentualne koszty rozwiązania umowy;', 'zasady rozliczenia niepełnego okresu;', 'sposób dokumentowania płatności.' ) ),
				array( 'p'  => 'Niska cena nie jest dowodem niskiej jakości, a wysoka cena nie gwarantuje bezpieczeństwa. Ważne jest to, co dokładnie obejmuje usługa i kto ponosi odpowiedzialność.' ),
				array( 'h2' => 'Sygnały ostrzegawcze' ),
				array( 'ul' => array( 'brak pełnych danych podmiotu;', 'niezgodność danych umowy z rejestrem;', 'wyłącznie gotówkowe rozliczenia bez potwierdzenia;', 'presja na natychmiastowe podpisanie umowy;', 'żądanie dużej przedpłaty bez jasnych zasad;', 'brak oceny potrzeb;', 'brak pisemnego zakresu czynności;', 'obietnica stałej opieki jednej osoby bez odpoczynku i zastępstwa;', 'powierzanie czynności medycznych osobie bez potwierdzonych uprawnień;', 'brak koordynatora;', 'brak procedury zastępstwa;', 'brak możliwości złożenia skargi;', 'odmowa wskazania, kto odpowiada za personel;', 'niejasne koszty dodatkowe;', 'żądanie przekazania dokumentów tożsamości lub danych wykraczających poza uzasadnioną potrzebę;', 'bagatelizowanie przemocy, przeciążenia albo naruszenia prywatności.' ) ),
				array( 'h2' => 'Czy członkostwo w PSOD jest gwarancją?' ),
				array( 'p'  => 'Członkostwo w PSOD może być dodatkową informacją o zaangażowaniu podmiotu w działalność branżową, ale nie jest państwową licencją, certyfikatem jakości ani gwarancją prawidłowej realizacji każdej usługi.' ),
				array( 'p'  => 'Członkostwo nie zastępuje sprawdzenia danych firmy, umowy, zakresu odpowiedzialności, kwalifikacji personelu, organizacji zastępstwa i rzeczywistych warunków świadczenia opieki.' ),
				array( 'h2' => 'Gdzie szukać pomocy w sporze?' ),
				array( 'p'  => 'W pierwszej kolejności złóż udokumentowane zgłoszenie do usługodawcy zgodnie z umową. Zachowaj korespondencję, umowę, rachunki oraz opis zdarzeń.' ),
				array( 'p'  => 'Jeżeli umowa została zawarta przez konsumenta z przedsiębiorcą, informacje o dostępnych formach pomocy i instytucjach zajmujących się ochroną konsumentów można znaleźć na portalu UOKiK. {S9}' ),
				array( 'link' => array( 'url' => 'https://prawakonsumenta.uokik.gov.pl/', 'label' => 'Znajdź pomoc konsumencką', 'ext' => true ) ),
				array( 'callout' => 'Jeżeli występuje bezpośrednie zagrożenie życia lub zdrowia, nie czekaj na rozpatrzenie reklamacji. Skontaktuj się z numerem alarmowym 112.' ),
				array( 'checklist' => array( 'id' => 'kb-checklist-uslugodawca', 'title' => 'Checklista wyboru usługodawcy', 'print' => 'Drukuj checklistę', 'items' => array( 'Sprawdziłem dane w CEIDG lub KRS.', 'Wiem, z kim zawieram umowę.', 'Wiem, kto odpowiada za personel.', 'Przeprowadzono ocenę potrzeb.', 'Otrzymałem pisemny zakres usługi.', 'Wiem, których czynności usługa nie obejmuje.', 'Znam pełną cenę.', 'Znam zasady zastępstwa.', 'Mam dane koordynatora.', 'Znam procedurę sytuacji nagłych.', 'Znam procedurę skarg.', 'Sprawdziłem charakter ewentualnych świadczeń zdrowotnych.', 'Uzgodniłem warunki pracy i odpoczynku w modelu z zamieszkaniem.', 'Przeczytałem zasady wypowiedzenia.', 'Nie pozostawiono pustych pól w umowie.' ) ) ),
			),
		),

		'prawa-osoby-korzystajacej-z-opieki' => array(
			'id'             => 'kb-prawa-osoby',
			'title'          => 'Jakie prawa ma osoba korzystająca z opieki domowej?',
			'eyebrow'        => 'Informacja ekspercka',
			'category'       => 'Prawa i warunki opieki',
			'excerpt'        => 'Godność, autonomia, prywatność, bezpieczeństwo, zrozumiała informacja i udział w planowaniu wsparcia — podstawowe zasady, które powinna respektować dobra opieka domowa.',
			'shortAnswer'    => 'Nie istnieje jeden identyczny katalog praw dla wszystkich form opieki domowej. Zakres praw zależy między innymi od rodzaju usługi, przepisów, umowy i tego, czy udzielane są świadczenia zdrowotne. Niezależnie od modelu dobra opieka powinna respektować godność, autonomię, prywatność, bezpieczeństwo, zakaz dyskryminacji, ochronę przed przemocą, prawo do zrozumiałej informacji, udziału w planowaniu wsparcia i ciągłości opieki. {S1} {S5} {S6}',
			'keywords'       => array( 'prawa osoby korzystającej z opieki', 'prawa seniora', 'prawa w opiece domowej', 'godność w opiece', 'autonomia seniora', 'skarga na firmę opiekuńczą', 'przemoc w opiece', 'prywatność w opiece domowej' ),
			'sourceIds'      => array( 'S1', 'S5', 'S6', 'S9', 'S15' ),
			'related'        => array(
				array( 'kb' => 'jak-wybrac-bezpiecznego-uslugodawce' ),
				array( 'kb' => 'ciaglosc-opieki-i-zastepstwo' ),
				array( 'kb' => 'opieka-formalna-i-nieformalna' ),
				array( 'url' => '/filary-opieki-domowej/', 'label' => 'Pięć filarów dobrej opieki domowej' ),
			),
			'seoTitle'       => 'Prawa osoby korzystającej z opieki domowej | PSOD',
			'seoDescription' => 'Poznaj podstawowe zasady ochrony godności, autonomii, prywatności, bezpieczeństwa i prawa do informacji w opiece domowej.',
			'dateAdded'      => '2026-07-22',
			'dateModified'   => '2026-07-22',
			'contentStatus'  => 'expert-information',
			'disclaimerType' => 'general-info',
			'body'           => array(
				array( 'h2' => 'Prawa, przepisy i zasady jakości to nie to samo' ),
				array( 'p'  => 'Część uprawnień wynika z praw podstawowych i obowiązujących przepisów. Część wynika z umowy zawartej z usługodawcą. Pozostałe są zasadami dobrej jakości rekomendowanymi przez instytucje europejskie i międzynarodowe.' ),
				array( 'p'  => 'Dlatego nie należy przedstawiać poniższej listy jako jednego kompletnego katalogu roszczeń prawnych obowiązujących w każdej sytuacji. Jest to zestaw podstawowych zasad, które powinny być widoczne w profesjonalnej opiece domowej.' ),
				array( 'h2' => 'Prawo do godności i szacunku' ),
				array( 'p'  => 'Osoba korzystająca z opieki powinna być:' ),
				array( 'ul' => array( 'traktowana jak osoba dorosła;', 'wysłuchiwana;', 'chroniona przed poniżaniem;', 'traktowana bez dyskryminacji;', 'chroniona przed uprzedmiotowieniem;', 'wspierana bez niepotrzebnego odbierania samodzielności;', 'nazywana w sposób, który akceptuje.' ) ),
				array( 'p'  => 'Wiek, choroba, niepełnosprawność lub zależność od pomocy innych osób nie odbierają człowiekowi godności ani prawa do wpływu na własne życie. {S1} {S6}' ),
				array( 'h2' => 'Prawo do autonomii i udziału w decyzjach' ),
				array( 'ul' => array( 'udział w ocenie potrzeb;', 'udział w ustalaniu celów opieki;', 'wpływ na codzienny rytm;', 'możliwość wyrażania preferencji;', 'zrozumiała informacja o dostępnych możliwościach;', 'możliwość zgłoszenia, że dana osoba lub sposób wykonywania czynności nie odpowiada potrzebom;', 'uzyskiwanie zgody przed podejmowaniem czynności dotyczących ciała, prywatności i mienia;', 'wspieranie samodzielności zamiast automatycznego wykonywania wszystkiego za osobę.' ) ),
				array( 'callout' => 'Osoba korzystająca z opieki powinna pozostawać w centrum planowania usługi, nawet wtedy, gdy rodzina finansuje opiekę lub uczestniczy w organizowaniu wsparcia.' ),
				array( 'h2' => 'Prawo do zrozumiałej informacji' ),
				array( 'p'  => 'Osoba powinna otrzymać informacje o:' ),
				array( 'ul' => array( 'podmiocie świadczącym usługę;', 'osobach realizujących wsparcie;', 'zakresie czynności;', 'czynnościach wyłączonych;', 'kosztach;', 'harmonogramie;', 'zasadach zastępstwa;', 'sposobie reagowania w sytuacji nagłej;', 'sposobie składania uwag i skarg;', 'przetwarzaniu danych;', 'możliwości zmiany albo zakończenia usługi.' ) ),
				array( 'p'  => 'Informacje powinny być przekazane prostym językiem, w formie dostosowanej do możliwości osoby, bez nieuzasadnionej presji, z możliwością zadania pytań i z odpowiednim czasem na podjęcie decyzji.' ),
				array( 'h2' => 'Prawo do prywatności i intymności' ),
				array( 'ul' => array( 'zamykanie drzwi podczas czynności osobistych, jeżeli jest to bezpieczne;', 'osłanianie ciała w zakresie, w jakim nie jest potrzebne jego odsłonięcie;', 'pytanie o zgodę przed wejściem do prywatnej przestrzeni;', 'respektowanie własności i rzeczy osobistych;', 'nieprzeglądanie korespondencji, dokumentów i telefonu bez zgody;', 'nieujawnianie informacji osobom nieuprawnionym;', 'niewykonywanie zdjęć i nagrań bez odpowiedniej zgody i podstawy;', 'ograniczenie dostępu do danych wyłącznie do osób, które rzeczywiście ich potrzebują.' ) ),
				array( 'p'  => 'Dom pozostaje prywatną przestrzenią osoby korzystającej z opieki, nawet gdy jest jednocześnie miejscem wykonywania usługi.' ),
				array( 'h2' => 'Prawo do bezpieczeństwa i ochrony przed nadużyciami' ),
				array( 'p'  => 'Osoba powinna być chroniona przed:' ),
				array( 'ul' => array( 'przemocą fizyczną;', 'przemocą psychiczną;', 'przemocą seksualną;', 'przemocą ekonomiczną;', 'zaniedbaniem;', 'poniżaniem;', 'groźbami;', 'dyskryminacją;', 'nieuzasadnionym ograniczaniem swobody;', 'wykorzystywaniem zależności;', 'nieuprawnionym dysponowaniem pieniędzmi lub mieniem;', 'wykonywaniem ryzykownych czynności przez osoby bez odpowiednich kompetencji.' ) ),
				array( 'callout' => 'Żadna trudność organizacyjna, konflikt rodzinny ani choroba osoby nie usprawiedliwia przemocy, poniżania lub nadużywania zależności.' ),
				array( 'h2' => 'Prawo do indywidualnego planu wsparcia' ),
				array( 'p'  => 'Zakres opieki powinien wynikać z rzeczywistych potrzeb, możliwości, preferencji i celów konkretnej osoby, a nie wyłącznie z jej wieku, rozpoznania medycznego lub gotowego pakietu usług.' ),
				array( 'p'  => 'Plan powinien wskazywać:' ),
				array( 'ul' => array( 'potrzeby;', 'cele;', 'zakres czynności;', 'preferowany sposób wykonywania;', 'znane ryzyka;', 'osoby odpowiedzialne;', 'częstotliwość wsparcia;', 'zasady kontaktu;', 'sytuacje wymagające ponownej oceny.' ) ),
				array( 'h2' => 'Prawo do ciągłości i bezpiecznej zmiany' ),
				array( 'p'  => 'Osoba zależna od pomocy nie powinna pozostawać bez niezbędnego wsparcia wyłącznie dlatego, że konkretny opiekun zachorował, zrezygnował albo zakończył zmianę.' ),
				array( 'p'  => 'Ciągłość nie oznacza prawa do stałej obecności jednej wybranej osoby. Oznacza odpowiednią organizację harmonogramu, zastępstwa, dokumentacji i przekazywania informacji. {S1}' ),
				array( 'h2' => 'Prawo do zgłaszania uwag i skarg' ),
				array( 'p'  => 'Osoba powinna móc:' ),
				array( 'ul' => array( 'zgłosić problem bez obawy przed odwetem;', 'otrzymać informację, do kogo kierować zgłoszenie;', 'uzyskać potwierdzenie przyjęcia;', 'otrzymać odpowiedź w określonym terminie;', 'poprosić o udział zaufanej osoby;', 'zgłosić podejrzenie przemocy lub zaniedbania;', 'zakwestionować sposób realizacji usługi;', 'otrzymać informację o dostępnej dalszej drodze postępowania.' ) ),
				array( 'h2' => 'Co w sytuacji trudności z podejmowaniem decyzji?' ),
				array( 'p'  => 'Trudności poznawcze, komunikacyjne albo niepełnosprawność nie powinny automatycznie prowadzić do wyłączenia osoby z rozmowy o jej własnej opiece.' ),
				array( 'p'  => 'Należy:' ),
				array( 'ul' => array( 'dostosować język i sposób komunikacji;', 'zapewnić więcej czasu;', 'używać prostych pytań;', 'sprawdzać, czy informacja została zrozumiana;', 'uwzględniać wcześniej wyrażone preferencje;', 'angażować osobę uprawnioną do reprezentacji, gdy jest to konieczne;', 'nadal zwracać się bezpośrednio do osoby korzystającej z opieki;', 'stosować rozwiązania możliwie najmniej ograniczające autonomię.' ) ),
				array( 'p'  => 'Jeżeli nie jest jasne, kto może podejmować formalne decyzje w imieniu osoby, należy uzyskać indywidualną poradę prawną. Personel opiekuńczy nie powinien samodzielnie rozstrzygać kwestii reprezentacji prawnej.' ),
				array( 'h2' => 'Prawa pacjenta dotyczą świadczeń zdrowotnych' ),
				array( 'p'  => 'Jeżeli w domu udzielane są świadczenia zdrowotne, osoba korzystająca z nich jest pacjentem i przysługują jej prawa pacjenta, między innymi prawo do informacji, zgody, tajemnicy, dokumentacji oraz poszanowania intymności i godności. {S15}' ),
				array( 'p'  => 'Nie należy jednak automatycznie stosować całego katalogu praw pacjenta do każdej prywatnej, niemedycznej usługi opiekuńczej. Trzeba najpierw ustalić charakter świadczenia.' ),
				array( 'link' => array( 'url' => 'https://www.gov.pl/web/rpp/prawa-pacjenta', 'label' => 'Sprawdź oficjalny katalog praw pacjenta', 'ext' => true ) ),
				array( 'h2' => 'Co zrobić w przypadku naruszenia?' ),
				array( 'ul' => array( 'Jeżeli jest to bezpieczne, przerwij niepożądaną czynność.', 'Zapisz datę, miejsce, osoby i przebieg zdarzenia.', 'Zachowaj wiadomości, dokumenty i inne materiały.', 'Zgłoś sprawę koordynatorowi lub usługodawcy.', 'Skorzystaj z procedury skarg.', 'Jeżeli sprawa dotyczy świadczenia zdrowotnego, sprawdź możliwość zwrócenia się do Rzecznika Praw Pacjenta.', 'Jeżeli sprawa dotyczy umowy konsumenckiej, sprawdź pomoc konsumencką UOKiK.', 'W przypadku bezpośredniego zagrożenia życia lub zdrowia skontaktuj się z numerem alarmowym 112.' ) ),
			),
		),

		'prawa-i-warunki-pracy-personelu-opiekunczego' => array(
			'id'             => 'kb-prawa-personelu',
			'title'          => 'Jakie prawa i warunki pracy powinien mieć personel opiekuńczy?',
			'eyebrow'        => 'Informacja ekspercka',
			'category'       => 'Prawa i warunki opieki',
			'excerpt'        => 'Jasny zakres obowiązków, wynagrodzenie, czas pracy i odpoczynek, bezpieczne warunki, prywatność i ochrona przed nadużyciami — warunki, które są też częścią jakości opieki.',
			'shortAnswer'    => 'Personel opiekuńczy powinien znać zakres obowiązków, zasady wynagradzania, czas wykonywania pracy, sposób organizacji odpoczynku oraz osobę odpowiedzialną za wsparcie. Powinien pracować w bezpiecznych warunkach, mieć dostęp do odpowiedniego przygotowania, być chroniony przed przemocą i mieć zapewnioną prywatność. Dokładne uprawnienia prawne zależą od podstawy zatrudnienia, rodzaju umowy, miejsca wykonywania pracy i właściwego prawa. {S1} {S13}',
			'keywords'       => array( 'prawa opiekuna', 'warunki pracy opiekunki', 'czas pracy opiekuna', 'opiekun z zamieszkaniem', 'odpoczynek opiekuna', 'bezpieczeństwo personelu', 'praca w opiece domowej', 'Konwencja MOP 189' ),
			'sourceIds'      => array( 'S1', 'S10', 'S11', 'S12', 'S13' ),
			'related'        => array(
				array( 'kb' => 'czym-jest-opieka-domowa-z-zamieszkaniem' ),
				array( 'kb' => 'jakich-czynnosci-moze-podejmowac-opiekun-domowy' ),
				array( 'kb' => 'ciaglosc-opieki-i-zastepstwo' ),
				array( 'url' => '/filary-opieki-domowej/#szacunek-i-godnosc', 'label' => 'Szacunek i godność — filar dobrej opieki domowej' ),
			),
			'seoTitle'       => 'Prawa i warunki pracy personelu opiekuńczego | PSOD',
			'seoDescription' => 'Sprawdź, jakie zasady powinny chronić personel opiekuńczy: jasny zakres obowiązków, odpoczynek, bezpieczeństwo, prywatność i wsparcie.',
			'dateAdded'      => '2026-07-22',
			'dateModified'   => '2026-07-22',
			'contentStatus'  => 'expert-information',
			'disclaimerType' => 'general-info',
			'body'           => array(
				array( 'h2' => 'Dobre warunki pracy są częścią jakości opieki' ),
				array( 'p'  => 'Bezpieczeństwa osoby korzystającej z opieki nie można budować na przeciążeniu, niewyspaniu, braku przygotowania lub stałej dyspozycyjności personelu.' ),
				array( 'p'  => 'Rada UE wskazuje, że wysokiej jakości opieka powinna być świadczona przez kompetentnych pracowników mających godne wynagrodzenie, uczciwe warunki pracy, ochronę przed przemocą i dostęp do ciągłego uczenia się. {S1}' ),
				array( 'callout' => 'Dobre warunki pracy personelu nie są przeciwieństwem dobra osoby korzystającej z opieki. Są jednym z warunków bezpiecznej i stabilnej usługi.' ),
				array( 'h2' => 'Prawo a standard jakości' ),
				array( 'p'  => 'Nie można określić jednego katalogu praw właściwego dla każdej osoby pracującej w opiece. Znaczenie mają między innymi: umowa o pracę lub inna podstawa współpracy, państwo wykonywania pracy, delegowanie, samozatrudnienie, układ zbiorowy i charakter faktycznie wykonywanych obowiązków.' ),
				array( 'p'  => 'Poniższa odpowiedź opisuje podstawowe zasady bezpiecznej organizacji pracy. Nie rozstrzyga, jaki stosunek prawny występuje w konkretnym przypadku.' ),
				array( 'h2' => 'Jasne i zrozumiałe warunki' ),
				array( 'p'  => 'Personel powinien znać:' ),
				array( 'ul' => array( 'podmiot odpowiedzialny za organizację pracy;', 'miejsce świadczenia usługi;', 'datę rozpoczęcia i przewidywany okres;', 'zakres obowiązków;', 'czynności wyłączone;', 'harmonogram;', 'zasady pracy w nocy;', 'zasady przerw i odpoczynku;', 'wysokość i sposób obliczania wynagrodzenia;', 'terminy płatności;', 'zasady pokrywania kosztów;', 'warunki zakwaterowania i wyżywienia, jeśli są zapewniane;', 'zasady zastępstwa;', 'dane koordynatora;', 'sposób zgłaszania problemów;', 'zasady zakończenia współpracy.' ) ),
				array( 'p'  => 'Warunki nie powinny być przekazywane wyłącznie ustnie albo zmieniane dopiero po przyjeździe do miejsca świadczenia usługi.' ),
				array( 'h2' => 'Określony zakres obowiązków' ),
				array( 'p'  => 'Personel nie powinien być zobowiązywany do wykonywania dowolnych poleceń rodziny. Zakres pracy powinien wynikać z oceny potrzeb, umowy i planu opieki.' ),
				array( 'p'  => 'Personel nie powinien być nakłaniany do:' ),
				array( 'ul' => array( 'czynności przekraczających kwalifikacje;', 'świadczeń medycznych bez wymaganych uprawnień;', 'niebezpiecznego podnoszenia bez sprzętu lub pomocy;', 'wykonywania pracy w warunkach bezpośredniego zagrożenia;', 'nieuzgodnionej opieki nad kolejnymi osobami;', 'prac domowych niezwiązanych z potrzebami osoby korzystającej z opieki;', 'stałego pozostawania w gotowości bez odpoczynku;', 'rezygnacji z prywatności;', 'udostępniania osobistych dokumentów rodzinie bez podstawy;', 'tolerowania przemocy, molestowania lub poniżania.' ) ),
				array( 'h2' => 'Czas pracy i odpoczynek' ),
				array( 'p'  => 'Zamieszkanie w domu osoby korzystającej z opieki nie oznacza, że cały czas pobytu jest automatycznie czasem pracy. Jednocześnie sama nazwa „czas wolny” nie rozstrzyga sprawy, jeżeli opiekun musi pozostawać w gotowości i regularnie reagować na potrzeby.' ),
				array( 'p'  => 'Dokładne zasady czasu pracy i odpoczynku zależą od właściwego prawa oraz podstawy wykonywania pracy. Strona PSOD nie powinna publikować jednej uniwersalnej liczby godzin jako właściwej dla wszystkich modeli. {S10}' ),
				array( 'p'  => 'Organizacja usługi powinna określać:' ),
				array( 'ul' => array( 'czas wykonywania zwykłych obowiązków;', 'przerwy;', 'odpoczynek dobowy i tygodniowy zgodny z właściwymi przepisami;', 'sposób ewidencjonowania pracy, jeżeli jest wymagany;', 'zasady gotowości;', 'sposób rozliczania dodatkowej pracy;', 'sposób reagowania w nocy;', 'moment uruchomienia dodatkowego personelu;', 'zastępstwo podczas odpoczynku i nieobecności.' ) ),
				array( 'callout' => 'Regularne nocne interwencje i brak nieprzerwanego odpoczynku mogą oznaczać, że usługi nie da się bezpiecznie zapewnić przez jedną osobę.' ),
				array( 'h2' => 'Bezpieczne środowisko pracy' ),
				array( 'p'  => 'Dom osoby korzystającej z opieki jest jednocześnie miejscem życia i miejscem wykonywania pracy. Może zawierać zagrożenia trudniejsze do kontrolowania niż w placówce. {S13}' ),
				array( 'p'  => 'Ocena bezpieczeństwa powinna obejmować:' ),
				array( 'ul' => array( 'ryzyko upadku i poślizgnięcia;', 'schody i wąskie przejścia;', 'sposób transferu osoby;', 'dostępność potrzebnego sprzętu;', 'stan łóżka, wózka, podnośnika i innych urządzeń;', 'kontakt z materiałem biologicznym;', 'środki chemiczne;', 'dym tytoniowy;', 'zwierzęta;', 'temperaturę i wentylację;', 'ryzyko agresji;', 'pracę w odosobnieniu;', 'możliwość wezwania pomocy;', 'przeciążenie fizyczne;', 'przeciążenie psychiczne.' ) ),
				array( 'p'  => 'Personel powinien otrzymać instruktaż i sprzęt odpowiedni do realnych zadań. Samo doświadczenie nie eliminuje ryzyka.' ),
				array( 'h2' => 'Ochrona przed przemocą i nadużyciami' ),
				array( 'p'  => 'Personel powinien być chroniony przed:' ),
				array( 'ul' => array( 'przemocą fizyczną;', 'groźbami;', 'wyzwiskami;', 'molestowaniem;', 'dyskryminacją;', 'przemocą seksualną;', 'nieuprawnionym nagrywaniem;', 'bezpodstawnym przeszukiwaniem rzeczy;', 'zatrzymywaniem dokumentów;', 'ograniczaniem możliwości opuszczenia miejsca pracy w czasie wolnym;', 'odwetem za zgłoszenie zagrożenia.' ) ),
				array( 'p'  => 'Usługodawca powinien wskazać: komu zgłosić problem, jak uzyskać pilne wsparcie, kiedy przerwać wykonywanie czynności, jak dokumentować zdarzenie, jak organizowana jest zmiana miejsca lub zastępstwo oraz jak chroniona jest osoba zgłaszająca.' ),
				array( 'h2' => 'Prywatność w opiece domowej z zamieszkaniem' ),
				array( 'p'  => 'W modelu z zamieszkaniem należy ustalić:' ),
				array( 'ul' => array( 'prywatne miejsce do spania;', 'możliwość zamknięcia lub bezpiecznego przechowywania rzeczy;', 'dostęp do łazienki;', 'warunki przygotowywania lub otrzymywania posiłków;', 'dostęp do prania;', 'zasady korzystania z internetu;', 'możliwość kontaktu z bliskimi;', 'czas wolny poza domem;', 'zasady wchodzenia do przestrzeni opiekuna;', 'zakaz instalowania urządzeń nagrywających w prywatnej przestrzeni;', 'sposób rozwiązania problemu nieodpowiednich warunków.' ) ),
				array( 'callout' => 'Zapewnienie noclegu nie jest formą wynagrodzenia za stałą dostępność. Opiekun mieszkający w domu nadal ma prawo do prywatności i odpoczynku.' ),
				array( 'h2' => 'Przygotowanie, szkolenie i wsparcie' ),
				array( 'p'  => 'Personel powinien mieć dostęp do:' ),
				array( 'ul' => array( 'informacji o potrzebach osoby;', 'instruktażu dotyczącego powierzonych czynności;', 'zasad reagowania na sytuacje nagłe;', 'szkolenia z bezpieczeństwa;', 'zasad ochrony danych i poufności;', 'sposobu zgłaszania zmiany stanu osoby;', 'konsultacji z koordynatorem;', 'aktualizacji wiedzy;', 'wsparcia po trudnym zdarzeniu;', 'możliwości poinformowania, że potrzeby przekroczyły jego kompetencje.' ) ),
				array( 'h2' => 'Międzynarodowy standard MOP' ),
				array( 'p'  => 'Konwencja MOP nr 189 opisuje międzynarodowe standardy dotyczące pracowników domowych, między innymi przejrzystych warunków, czasu pracy, odpoczynku, wynagrodzenia, zakwaterowania, bezpieczeństwa i ochrony przed nadużyciami. {S11}' ),
				array( 'callout' => 'Konwencja MOP nr 189 jest na tej stronie wykorzystywana jako międzynarodowy punkt odniesienia. Według oficjalnego rejestru NORMLEX sprawdzonego 22 lipca 2026 r. Polska nie figuruje wśród państw, które ją ratyfikowały. Nie należy przedstawiać jej jako bezpośrednio obowiązującego w Polsce źródła prawa.' ),
				array( 'p'  => 'Status ratyfikacji można sprawdzić w oficjalnym wykazie MOP. {S12}' ),
				array( 'h2' => 'Personel ma również obowiązki' ),
				array( 'p'  => 'Ochrona personelu nie znosi jego odpowiedzialności za właściwe wykonywanie uzgodnionych czynności.' ),
				array( 'p'  => 'Personel powinien:' ),
				array( 'ul' => array( 'szanować godność i autonomię osoby;', 'chronić prywatność;', 'zachowywać poufność;', 'wykonywać wyłącznie uzgodnione czynności;', 'nie przekraczać kompetencji;', 'zgłaszać istotne zmiany;', 'dokumentować usługę zgodnie z zasadami;', 'nie wykorzystywać zależności osoby;', 'nie przyjmować nieuzgodnionych korzyści;', 'przestrzegać zasad bezpieczeństwa;', 'informować, gdy nie może bezpiecznie wykonać zadania.' ) ),
			),
		),

		'ciaglosc-opieki-i-zastepstwo' => array(
			'id'             => 'kb-ciaglosc-zastepstwo',
			'title'          => 'Jak zapewnić ciągłość opieki i zastępstwo?',
			'eyebrow'        => 'Informacja ekspercka',
			'category'       => 'Organizacja i bezpieczeństwo',
			'excerpt'        => 'Ciągłość wymaga planu, a nie obecności jednej osoby: koordynator, dokumentacja, przekazywanie informacji, zastępstwo i procedury na wypadek nagłej zmiany.',
			'shortAnswer'    => 'Ciągłość opieki wymaga planu, a nie wyłącznie obecności jednej osoby. Należy określić potrzeby, harmonogram, osobę koordynującą, zasady dokumentowania, sposób przekazywania informacji, plan zastępstwa i procedury na wypadek nagłej zmiany. Zmiana opiekuna nie musi oznaczać utraty ciągłości, jeżeli usługa została właściwie zorganizowana. {S1} {S5}',
			'keywords'       => array( 'ciągłość opieki', 'zastępstwo opiekuna', 'plan opieki', 'zmiana opiekunki', 'koordynator opieki', 'dokumentacja opieki', 'plan awaryjny', 'organizacja opieki domowej' ),
			'sourceIds'      => array( 'S1', 'S5', 'S14' ),
			'related'        => array(
				array( 'kb' => 'jak-wybrac-bezpiecznego-uslugodawce' ),
				array( 'kb' => 'jakich-czynnosci-moze-podejmowac-opiekun-domowy' ),
				array( 'kb' => 'czym-jest-opieka-domowa-z-zamieszkaniem' ),
				array( 'url' => '/filary-opieki-domowej/#ciaglosc', 'label' => 'Ciągłość — filar dobrej opieki domowej' ),
			),
			'seoTitle'       => 'Ciągłość opieki i zastępstwo — jak je zaplanować? | PSOD',
			'seoDescription' => 'Sprawdź, jak zaplanować ciągłość opieki, zastępstwo, dokumentację, przekazanie obowiązków i bezpieczną zmianę opiekuna.',
			'dateAdded'      => '2026-07-22',
			'dateModified'   => '2026-07-22',
			'contentStatus'  => 'expert-information',
			'disclaimerType' => 'general-info',
			'body'           => array(
				array( 'h2' => 'Czym jest ciągłość opieki?' ),
				array( 'p'  => 'Ciągłość oznacza, że osoba może otrzymywać potrzebne wsparcie w odpowiednim czasie i przez potrzebny okres, również podczas zmian personelu, przejścia między usługami albo nagłej nieobecności. {S1}' ),
				array( 'p'  => 'Nie oznacza ona, że jedna osoba ma pozostawać bez przerwy w domu albo wykonywać pracę przez całą dobę.' ),
				array( 'callout' => 'Ciągłość dotyczy usługi i zaspokojenia potrzeb. Nie oznacza stałej dyspozycyjności jednego opiekuna.' ),
				array( 'h2' => 'Podstawą jest aktualna ocena potrzeb' ),
				array( 'p'  => 'Plan ciągłości powinien wynikać z informacji o:' ),
				array( 'ul' => array( 'codziennej sprawności;', 'potrzebnej pomocy;', 'rytmie dnia;', 'potrzebach nocnych;', 'sposobie komunikacji;', 'mobilności;', 'ryzyku upadków;', 'potrzebach związanych z żywieniem;', 'stanie poznawczym;', 'potrzebach medycznych i pielęgniarskich;', 'stosowanym sprzęcie;', 'sytuacjach nagłych;', 'osobach wspierających;', 'preferencjach osoby.' ) ),
				array( 'p'  => 'WHO wskazuje ocenę potrzeb, opracowanie spersonalizowanego planu, jego wdrażanie i monitorowanie jako kolejne elementy opieki skoncentrowanej na osobie starszej. {S14}' ),
				array( 'h2' => 'Co powinien zawierać plan ciągłości?' ),
				array( 'ul' => array( 'nazwę usługodawcy;', 'dane koordynatora;', 'zakres usługi;', 'harmonogram;', 'priorytetowe potrzeby;', 'czynności, których nie można pominąć;', 'preferowany sposób wykonywania;', 'znane ryzyka;', 'aktualne kontakty awaryjne;', 'sposób kontaktu z rodziną;', 'zasady współpracy z usługami medycznymi;', 'miejsce przechowywania dokumentacji;', 'zasady przekazywania informacji;', 'plan zastępstwa;', 'sposób postępowania podczas przerwy w usłudze;', 'zasady aktualizacji planu;', 'plan zakończenia lub zmiany usługi.' ) ),
				array( 'h2' => 'Jak przygotować zastępstwo?' ),
				array( 'p'  => 'Usługodawca powinien określić:' ),
				array( 'ul' => array( 'kto przyjmuje zgłoszenie nieobecności;', 'kto podejmuje decyzję o zastępstwie;', 'jak szybko informowana jest osoba i rodzina;', 'jakie kompetencje musi mieć zastępca;', 'jak przekazywane są informacje;', 'kto potwierdza gotowość zastępcy;', 'co dzieje się, gdy nie można zapewnić identycznego zakresu;', 'jak zabezpieczane są najważniejsze potrzeby;', 'jak wygląda powrót poprzedniego opiekuna;', 'kto ocenia jakość zastępstwa.' ) ),
				array( 'p'  => 'Zastępstwo nie powinno polegać wyłącznie na wysłaniu dowolnej dostępnej osoby. Kompetencje i możliwość komunikacji muszą odpowiadać rzeczywistym potrzebom.' ),
				array( 'h2' => 'Bezpieczne przekazanie obowiązków' ),
				array( 'p'  => 'Przekazanie powinno obejmować wyłącznie informacje niezbędne do bezpiecznej realizacji usługi, w szczególności:' ),
				array( 'ul' => array( 'preferowany sposób zwracania się do osoby;', 'codzienny rytm;', 'zakres potrzebnej pomocy;', 'sposób bezpiecznego przemieszczania;', 'zasady korzystania ze sprzętu;', 'potrzeby żywieniowe;', 'sposób komunikacji;', 'istotne ryzyka;', 'procedury nagłe;', 'dane koordynatora;', 'niedawne zmiany;', 'czynności wymagające zaangażowania personelu medycznego;', 'kwestie, których opiekun nie powinien wykonywać.' ) ),
				array( 'callout' => 'Przekazanie obowiązków nie uzasadnia udostępniania całej dokumentacji każdej osobie. Należy przekazywać informacje potrzebne do realizacji usługi i chronić prywatność osoby korzystającej z opieki.' ),
				array( 'h2' => 'Dokumentacja' ),
				array( 'p'  => 'Dokumentacja powinna umożliwiać:' ),
				array( 'ul' => array( 'ustalenie aktualnego planu;', 'sprawdzenie wykonanych czynności;', 'zapisanie istotnej zmiany;', 'zgłoszenie zdarzenia;', 'przekazanie informacji kolejnej osobie;', 'sprawdzenie, kto podjął decyzję;', 'aktualizację zakresu;', 'zachowanie ciągłości podczas nieobecności koordynatora.' ) ),
				array( 'p'  => 'Nie należy wymuszać gromadzenia danych medycznych, które nie są potrzebne do realizacji niemedycznej usługi.' ),
				array( 'h2' => 'Weekend, noc i święta' ),
				array( 'p'  => 'Plan powinien uwzględniać okresy, w których zwykły kontakt z biurem, rodziną lub usługami jest utrudniony.' ),
				array( 'p'  => 'Należy ustalić:' ),
				array( 'ul' => array( 'kto przyjmuje pilne zgłoszenia;', 'kiedy kontaktować się z numerem alarmowym;', 'kto zastępuje koordynatora;', 'jakie potrzeby mogą wystąpić w nocy;', 'jaki poziom nocnych potrzeb przekracza możliwości jednej osoby;', 'jak zapewniany jest odpoczynek;', 'jakie usługi są dostępne w weekend i święta;', 'co zrobić, gdy nie można zrealizować zaplanowanej wizyty.' ) ),
				array( 'h2' => 'Zmiana opiekuna' ),
				array( 'p'  => 'Zmiana osoby może być trudna, szczególnie dla człowieka z zaburzeniami poznawczymi, trudnościami komunikacyjnymi lub silnym przywiązaniem do codziennego rytmu.' ),
				array( 'p'  => 'Dobra zmiana powinna obejmować:' ),
				array( 'ul' => array( 'wcześniejszą informację, gdy jest to możliwe;', 'wyjaśnienie przyczyny w zakresie, który nie narusza prywatności personelu;', 'przedstawienie nowej osoby;', 'przekazanie preferencji;', 'możliwość zgłoszenia istotnych zastrzeżeń;', 'okresowe sprawdzenie, czy dopasowanie jest właściwe;', 'aktualizację planu;', 'możliwość korekty organizacji.' ) ),
				array( 'p'  => 'Rodzina nie ma bezwzględnego prawa do poznania prywatnych przyczyn nieobecności pracownika.' ),
				array( 'h2' => 'Hospitalizacja i powrót do domu' ),
				array( 'p'  => 'Pobyt w szpitalu albo nagłe pogorszenie stanu może istotnie zmienić potrzeby. Powrót do poprzedniego planu bez ponownej oceny może być niebezpieczny.' ),
				array( 'p'  => 'Przed wznowieniem usługi należy ustalić:' ),
				array( 'ul' => array( 'aktualną sprawność;', 'nowe zalecenia;', 'zmienione potrzeby;', 'potrzebny sprzęt;', 'możliwość bezpiecznego transferu;', 'zakres świadczeń pielęgniarskich;', 'nowe ryzyka;', 'dostępność personelu o odpowiednich kompetencjach;', 'konieczność zmiany harmonogramu.' ) ),
				array( 'h2' => 'Zmiana usługodawcy albo zakończenie usługi' ),
				array( 'p'  => 'Plan zakończenia powinien uwzględniać:' ),
				array( 'ul' => array( 'termin;', 'zakres wsparcia do ostatniego dnia;', 'przekazanie potrzebnych informacji za zgodą i na właściwej podstawie;', 'zwrot kluczy;', 'zwrot dokumentów i sprzętu;', 'rozliczenie;', 'zamknięcie dostępów do systemów;', 'poinformowanie właściwych osób;', 'ograniczenie ryzyka nagłej przerwy;', 'sposób zgłoszenia ostatnich uwag.' ) ),
				array( 'p'  => 'Nie należy obiecywać, że usługodawca ma w każdej sytuacji prawny obowiązek bezterminowego kontynuowania usługi. Zasady zakończenia wynikają z umowy i przepisów. Profesjonalna organizacja powinna jednak ograniczać możliwe do przewidzenia zagrożenia wynikające z nagłego przerwania pomocy.' ),
				array( 'h2' => 'Sygnały, że plan jest niewystarczający' ),
				array( 'ul' => array( 'brak wyznaczonego koordynatora;', 'brak aktualnego planu;', 'brak zastępstwa;', 'wiedza dostępna wyłącznie w pamięci jednej osoby;', 'nieaktualne numery kontaktowe;', 'niejasne zasady reagowania w nocy;', 'regularne wykonywanie czynności spoza umowy;', 'częste upadki lub pogorszenie stanu bez aktualizacji planu;', 'brak sposobu bezpiecznego przekazywania informacji;', 'rodzina musi samodzielnie szukać zastępcy w każdej sytuacji;', 'nikt nie monitoruje realizacji usługi;', 'ciągłość zależy od rezygnacji opiekuna z odpoczynku.' ) ),
				array( 'plan' => array( 'id' => 'kb-plan-ciaglosci', 'title' => 'Minimalny plan ciągłości opieki', 'print' => 'Drukuj plan', 'fields' => array( 'Osoba koordynująca', 'Dane kontaktowe', 'Najważniejsze potrzeby', 'Czynności, których nie można pominąć', 'Główne ryzyka', 'Harmonogram', 'Plan potrzeb nocnych', 'Osoba lub zespół zastępujący', 'Sposób przekazania obowiązków', 'Kontakt awaryjny', 'Sposób zgłoszenia zmiany', 'Data ostatniej aktualizacji', 'Data kolejnego przeglądu' ) ) ),
			),
		),
	);
}

/** Pobierz jedną odpowiedź po slugu (lub null). */
function psod2_kb_get_article( $slug ) {
	$all = psod2_kb_articles();
	return isset( $all[ $slug ] ) ? $all[ $slug ] : null;
}

/**
 * Kolejność cytowań na stronie (wg pierwszego użycia) + mapa Sx→numer.
 * Zwraca array( 'order' => array('S1',...), 'map' => array('S1'=>1,...) ).
 */
function psod2_kb_citation_map( $article ) {
	$texts = array();
	if ( ! empty( $article['shortAnswer'] ) ) {
		$texts[] = $article['shortAnswer'];
	}
	if ( ! empty( $article['body'] ) ) {
		foreach ( $article['body'] as $b ) {
			if ( isset( $b['p'] ) ) {
				$texts[] = $b['p'];
			} elseif ( isset( $b['def']['text'] ) ) {
				$texts[] = $b['def']['text'];
			}
		}
	}
	$order = array();
	foreach ( $texts as $t ) {
		if ( preg_match_all( '/\{S(\d+)\}/', $t, $m ) ) {
			foreach ( $m[1] as $num ) {
				$sid = 'S' . $num;
				if ( ! in_array( $sid, $order, true ) ) {
					$order[] = $sid;
				}
			}
		}
	}
	$map = array();
	$i   = 1;
	foreach ( $order as $sid ) {
		$map[ $sid ] = $i++;
	}
	return array( 'order' => $order, 'map' => $map );
}

/**
 * Zamiana znaczników {Sx} na dostępne odwołania liczbowe. $first_seen (przez referencję)
 * śledzi, który numer dostał już id="cyt-N" (kotwica dla linku powrotnego ze źródeł).
 * $text musi być już bezpieczny (po esc_html) — {Sx} przechodzą przez esc_html bez zmian.
 */
function psod2_kb_cite( $text, $map, $sources, &$first_seen ) {
	return preg_replace_callback(
		'/\{S(\d+)\}/',
		function ( $mm ) use ( $map, $sources, &$first_seen ) {
			$sid = 'S' . $mm[1];
			if ( ! isset( $map[ $sid ] ) ) {
				return '';
			}
			$n    = $map[ $sid ];
			$inst = isset( $sources[ $sid ]['inst_short'] ) ? $sources[ $sid ]['inst_short'] : $sid;
			$idat = '';
			if ( empty( $first_seen[ $n ] ) ) {
				$idat            = ' id="cyt-' . $n . '"';
				$first_seen[ $n ] = true;
			}
			return '<sup class="kb-cite"><a href="#zrodlo-' . $n . '"' . $idat . ' aria-label="' . esc_attr( 'Źródło ' . $n . ': ' . $inst ) . '">[' . $n . ']</a></sup>';
		},
		$text
	);
}

/** Render pojedynczego akapitu z cytowaniami (bezpieczny). */
function psod2_kb_p( $text, $map, $sources, &$first_seen ) {
	return '<p>' . psod2_kb_cite( esc_html( $text ), $map, $sources, $first_seen ) . '</p>';
}

/**
 * Render treści odpowiedzi (bloki body). Echo bezpośrednio.
 * $first_seen przekazywane przez referencję — WSPÓLNE ze „short answer”, aby numeracja
 * i kotwice cyt-N były spójne w obrębie strony (short answer renderujemy PRZED body).
 */
function psod2_kb_render_body( $article, $map, $sources, &$first_seen ) {
	foreach ( $article['body'] as $b ) {
		if ( isset( $b['h2'] ) ) {
			echo '<h2>' . esc_html( $b['h2'] ) . '</h2>';
		} elseif ( isset( $b['h3'] ) ) {
			echo '<h3>' . esc_html( $b['h3'] ) . '</h3>';
		} elseif ( isset( $b['p'] ) ) {
			echo psod2_kb_p( $b['p'], $map, $sources, $first_seen ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped w psod2_kb_p
		} elseif ( isset( $b['ul'] ) ) {
			echo '<ul class="kb-list">';
			foreach ( $b['ul'] as $li ) {
				echo '<li>' . esc_html( $li ) . '</li>';
			}
			echo '</ul>';
		} elseif ( isset( $b['def'] ) ) {
			echo '<h3 class="kb-def__term">' . esc_html( $b['def']['term'] ) . '</h3>';
			echo psod2_kb_p( $b['def']['text'], $map, $sources, $first_seen ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} elseif ( isset( $b['note_list'] ) ) {
			echo '<div class="kb-notelist"><p class="kb-notelist__intro">' . esc_html( $b['note_list']['intro'] ) . '</p><ul class="kb-list">';
			foreach ( $b['note_list']['items'] as $li ) {
				echo '<li>' . esc_html( $li ) . '</li>';
			}
			echo '</ul></div>';
		} elseif ( isset( $b['callout'] ) ) {
			echo '<div class="kb-callout" role="note"><p>' . esc_html( $b['callout'] ) . '</p></div>';
		} elseif ( isset( $b['table'] ) ) {
			$t = $b['table'];
			echo '<div class="kb-tablewrap" role="region" aria-label="' . esc_attr( $t['caption'] ) . '" tabindex="0">';
			echo '<table class="kb-table"><caption class="kb-table__caption">' . esc_html( $t['caption'] ) . '</caption><thead><tr>';
			foreach ( $t['head'] as $th ) {
				echo '<th scope="col">' . esc_html( $th ) . '</th>';
			}
			echo '</tr></thead><tbody>';
			foreach ( $t['rows'] as $row ) {
				echo '<tr>';
				foreach ( $row as $ci => $cell ) {
					if ( 0 === $ci ) {
						echo '<th scope="row">' . esc_html( $cell ) . '</th>';
					} else {
						echo '<td>' . esc_html( $cell ) . '</td>';
					}
				}
				echo '</tr>';
			}
			echo '</tbody></table></div>';
		} elseif ( isset( $b['link'] ) ) {
			$href = ! empty( $b['link']['ext'] ) ? $b['link']['url'] : home_url( $b['link']['url'] );
			echo '<p class="kb-inlink"><a href="' . esc_url( $href ) . '">' . esc_html( $b['link']['label'] ) . ' <span aria-hidden="true">&rarr;</span></a></p>';
		} elseif ( isset( $b['checklist'] ) ) {
			$cl = $b['checklist'];
			echo '<section class="kb-checklist" aria-labelledby="' . esc_attr( $cl['id'] ) . '-h">';
			echo '<h2 id="' . esc_attr( $cl['id'] ) . '-h">' . esc_html( $cl['title'] ) . '</h2>';
			echo '<ul class="kb-checklist__list">';
			foreach ( $cl['items'] as $it ) {
				echo '<li><label><input type="checkbox"> <span>' . esc_html( $it ) . '</span></label></li>';
			}
			echo '</ul>';
			echo '<button type="button" class="kb-print btn btn--secondary">' . esc_html( $cl['print'] ) . '</button>';
			echo '</section>';
		} elseif ( isset( $b['plan'] ) ) {
			$pl = $b['plan'];
			echo '<section class="kb-plan" aria-labelledby="' . esc_attr( $pl['id'] ) . '-h">';
			echo '<h2 id="' . esc_attr( $pl['id'] ) . '-h">' . esc_html( $pl['title'] ) . '</h2>';
			echo '<dl class="kb-plan__grid">';
			foreach ( $pl['fields'] as $f ) {
				echo '<div class="kb-plan__row"><dt>' . esc_html( $f ) . '</dt><dd class="kb-plan__fill"></dd></div>';
			}
			echo '</dl>';
			echo '<button type="button" class="kb-print btn btn--secondary">' . esc_html( $pl['print'] ) . '</button>';
			echo '</section>';
		} elseif ( isset( $b['example_metric'] ) ) {
			$em = $b['example_metric'];
			echo '<div class="kb-metric" role="group" aria-label="' . esc_attr( $em['title'] ) . '">';
			echo '<p class="kb-metric__label">' . esc_html( $em['title'] ) . '</p><dl class="kb-metric__grid">';
			foreach ( $em['fields'] as $f ) {
				echo '<dt>' . esc_html( $f ) . '</dt><dd>—</dd>';
			}
			echo '</dl></div>';
		}
	}
}

/**
 * Render sekcji „Źródła" dla odpowiedzi (wg kolejności cytowań na stronie).
 * $order = lista Sx w kolejności pierwszego użycia; numer = pozycja.
 */
function psod2_kb_render_sources_section( $order, $sources ) {
	if ( empty( $order ) ) {
		return;
	}
	$checked = psod2_kb_sources_checked();
	echo '<section class="kb-sources" aria-labelledby="kb-sources-h">';
	echo '<h2 id="kb-sources-h">Źródła</h2>';
	echo '<ol class="kb-sources__list">';
	$n = 1;
	foreach ( $order as $sid ) {
		if ( ! isset( $sources[ $sid ] ) ) {
			continue;
		}
		$s   = $sources[ $sid ];
		$meta = $s['type'];
		if ( ! empty( $s['date'] ) ) {
			$meta .= ' · ' . esc_html( psod2_kb_fmt_date( $s['date'] ) );
		}
		echo '<li id="zrodlo-' . (int) $n . '" class="kb-src">';
		echo '<span class="kb-src__num" aria-hidden="true">[' . (int) $n . ']</span>';
		echo '<div class="kb-src__body">';
		echo '<span class="kb-src__inst">' . esc_html( $s['institution'] ) . '</span> ';
		echo '<a class="kb-src__title" href="' . esc_url( $s['url'] ) . '">' . esc_html( $s['title'] ) . '</a>';
		echo '<span class="kb-src__meta">' . esc_html( $meta ) . '</span>';
		echo '<span class="kb-src__checked">Sprawdzono: ' . esc_html( psod2_kb_fmt_date( $checked ) ) . '</span>';
		echo '<a class="kb-src__back" href="#cyt-' . (int) $n . '" aria-label="' . esc_attr( 'Wróć do miejsca cytowania źródła ' . $n ) . '">↩ Wróć do treści</a>';
		echo '</div></li>';
		$n++;
	}
	echo '</ol></section>';
}

/** Format daty ISO (YYYY-MM-DD) → „D miesiąca YYYY" po polsku. Bez bieżącej daty. */
function psod2_kb_fmt_date( $iso ) {
	$parts = explode( '-', $iso );
	if ( count( $parts ) !== 3 ) {
		return $iso;
	}
	$mies = array( 1 => 'stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca', 'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia' );
	$d    = (int) $parts[2];
	$m    = (int) $parts[1];
	$y    = (int) $parts[0];
	if ( ! isset( $mies[ $m ] ) ) {
		return $iso;
	}
	return $d . ' ' . $mies[ $m ] . ' ' . $y;
}

/** URL odpowiedzi (podstrona pod /centrum-wiedzy/). */
function psod2_kb_article_url( $slug ) {
	return home_url( '/centrum-wiedzy/' . $slug . '/' );
}
