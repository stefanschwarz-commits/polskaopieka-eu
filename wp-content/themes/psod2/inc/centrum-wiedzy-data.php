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
	);
}

/** Kategorie Centrum wiedzy (architektura skalowalna; wyświetlamy tylko niepuste). */
function psod2_kb_categories() {
	return array(
		'podstawowe-pojecia' => array(
			'name' => 'Podstawowe pojęcia',
			'desc' => 'Najważniejsze definicje potrzebne do zrozumienia opieki długoterminowej i domowej.',
		),
	);
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
