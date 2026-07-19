# PSOD Design System

System wizualny **Polskiego Stowarzyszenia Opieki Domowej** (PSOD) — związku pracodawców branży opieki domowej. Marka pojawia się na stronie internetowej, w pismach i dokumentach, prezentacjach oraz w mediach społecznościowych.

> **Zasady poniżej są wiążące** — wynikają z tożsamości organizacji i decyzji lidera projektu, nie z preferencji estetycznych. Warstwę wizualną można rozwijać i uszlachetniać, ale w ramach tych reguł.

---

## O organizacji

PSOD to **związek pracodawców** zrzeszający polskie firmy oferujące usługi długoterminowej opieki domowej dla osób niesamodzielnych. Reprezentuje sektor, publikuje stanowiska legislacyjne, standardy jakości i materiały edukacyjne, chroniąc interesy seniorów i opiekunów. Członkowie to przede wszystkim małe firmy rodzinne (obecnie 16 usługodawców, ~6500 opiekunów).

**Odbiorca:** każdy, kto ma starzejących się rodziców, sam jest seniorem lub kiedyś będzie. Decydenci i media są odbiorcą pośrednim.

**Wersje językowe:** strona i materiały będą prowadzone w **trzech wersjach: PL, DE, EN** (przełącznik w nagłówku). Logotyp ma wariant PL (polskaopieka.eu) i EN (Polish Association of Homecare Providers / polishcare.eu) — zob. `assets/logo-poziom-en-*.pdf`; wersja DE do dostarczenia.

**Wzorzec estetyczny:** homeinstead.com — ton subtelny, refleksyjny, poruszający.

- Dane rejestrowe: KRS 0000992066 · NIP 5252926975 · REGON 523338263
- Adres: Nowy Świat 54/56, 00-363 Warszawa · www.polskaopieka.eu · kontakt@polskaopieka.eu
- Obecna strona (do wymiany): https://polskaopieka.eu/

## Źródła (materiały wejściowe)

Dostarczone przez lidera projektu, przechowywane w `uploads/`:
- `psod-home-v23_2.html` — makieta strony głównej (v23), pełny CSS + treść verbatim. **Główne źródło rekonstrukcji.**
- `psod-design-system.md` — wiążący brief systemu (kolory, typografia, komponenty, zasady treści).
- `psod_logo_opis.pdf` — księga znaku (opis logo, pole ochronne, kolory, typografia logotypu). Kopia: `assets/logo-ksiega-znaku.pdf`.
- Pliki logo (wektor): `psod_rgb/cmyk` (poziom PL), `psodpion_rgb/cmyk` (pion PL), `psod_rgb_eng/cmyk_eng` (EN). Skopiowane do `assets/logo-*.pdf`.
- `[szablon] Papier firmowy PSOD.pdf` — szablon papieru firmowego.

---

## CONTENT FUNDAMENTALS — zasady treści

**Ton:** subtelny, refleksyjny, poruszający. Zero języka marketingowego, zero korporacyjnych sloganów, zero superlatywów.

**Głos — inkluzywny, włączający czytelnika.** Deklaracje w formach „my razem z Tobą", nigdy organizacyjne „pracujemy nad tym":
- „Zadbajmy o to razem." · „Przygotujmy Polskę na ten czas." · „tworzymy ją razem z Wami"

**Zwrot do czytelnika:** bezpośredni, osobisty, w drugiej osobie — z uwzględnieniem obu rodzajów gramatycznych: „W którym roku się urodziłaś, urodziłeś?".

**Nagłówki refleksyjne, nie sprzedażowe.** Przykład hero: „Każdy z nas będzie kiedyś potrzebował *opieki*. Albo będzie ją komuś dawał."

**CTA krótkie i konkretne:** „Dołącz do PSOD", „Zobacz raport", „Zobacz stanowisko". Przydługie CTA („Dowiedz się więcej o naszej wyjątkowej ofercie…") są **zakazane**.

**Casing:** nagłówki i zdania — normalna wielkość liter (sentence case). WERSALIKI wyłącznie w nadtytułach sekcji, drobnych etykietach źródeł i logotypie. Nazwa organizacji zapisywana pełnym brzmieniem: „Polskie Stowarzyszenie Opieki Domowej".

**Emoji:** nie są używane. Nigdzie.

**Nienaruszalne zasady treści:**
1. **Treść 1:1** — teksty pochodzą verbatim z polskaopieka.eu. Design zmienia formę, **nigdy treść** (nie skracać, nie parafrazować, nie „poprawiać stylistycznie").
2. Placeholdery „do uzupełnienia" odzwierciedlają luki **w oryginale** — nie wypełniać wymyśloną treścią (np. mit o Agencjach Pracy Tymczasowej nie ma tekstu faktu; 4. priorytet „ram prawnych" jest pusty).
3. Klauzule RODO przy newsletterze — pełne brzmienie, bez skracania.
4. Liczby i źródła zawsze z atrybucją (GUS, WHO, EFPS, ELA/EURES).

---

## VISUAL FOUNDATIONS — fundamenty wizualne

### Kolor
- **Fiolet `#BB16A3`** (Pantone 247 C, CMYK 40 95 0 0) — kolor wiodący i logotypu. Nawiązuje do fioletowej wstążki (symbol Alzheimera) i litery „Q" (jakość). **Jeden odcień, bez pochodnych.** Używany oszczędnie: akcenty, CTA, wyróżnienia, zakreślacz. Jedyny wariant to `#9C118A` — wyłącznie na stan `:hover`/`:active` fioletowego CTA.
- **ZERO czerni (`#000`)** gdziekolwiek — czerń kojarzy się ze śmiercią, co w kontekście opieki nad seniorami jest niedopuszczalne. Najciemniejszy dozwolony ton: `#4A4B52` (tekst, tło stopki).
- **Baza:** biel + szarości (`#F6F6F7` mgła, `#E6E6E9` linia, `#A8A9B0`/`#7B7C84`/`#4A4B52` teksty).
- **Błękit opiekuńczy `#5E8CA0`** (+ tło `#F0F5F7`) — jedyny kolor uzupełniający, dla bloków „opiekuńczych" (apel, pieczęć-cytat).
- **Czerwień `#CE2029`** — WYŁĄCZNIE stempel „MIT". Nie jest kolorem błędu/alertu/linka.

### Typografia
- **Fraunces (serif)** — jeśli tekst ma *poruszyć*: nagłówki, cytaty hero, blockquote, sentencje. Wagi lekkie (300) i regular (400), często italic w akcentach fioletowych. Nadaje ludzki, redakcyjny charakter.
- **Poppins (sans)** — jeśli tekst ma *poinformować* lub być *klikalny*: nawigacja, przyciski, kafle, formularze, tekst UI, stopka. Wagi 400/500/600.
- Minimalny rozmiar tekstu bieżącego 15–16px (dostępność: seniorzy); RODO 11.5px to dolna granica.
- Logotyp: **Aktiv Grotesk Ex XBold** — wyłącznie w plikach logo, nie w treści.

### Tło i obrazy
- Dominują białe i mglisto-szare (`#F6F6F7`) tła sekcji, naprzemiennie. Bloki opiekuńcze na `#F0F5F7`. Stopka na `#4A4B52` (jedyne ciemne tło).
- Hero: zdjęcie z chłodnym, rozjaśnionym welonem (gradient bieli 44–78%) — nastrojowe, nie efekciarskie. Delikatny „oddech kadru" (scale 1 → 1.07 przez 60 s).
- **Zdjęcia:** czarno-białe / grayscale z chłodnym tonem (`grayscale(1) brightness(1.05) contrast(.93)`), koloryzują się na hover w kafelkach aktualności. **Żaden obraz nie wchodzi bez licencji** — do tego czasu placeholdery (patrz niżej). W UI kicie stosujemy tonalne szarości (`GrayFrame`), nie stock.
- Brak dekoracyjnych galerii zdjęć, brak agresywnych gradientów tła.

### Sygnatura: efekt zakreślacza
Deklaracje zaangażowania wyróżniane efektem markera: **tło `#BB16A3`, tekst biały**, `box-decoration-break: clone` (zawija się jak pociągnięcie flamastrem). **Limit: maks. jeden zakreślacz na sekcję.** To akcent, nie system nagłówków.

### Narożniki, obramowania, cienie
- Promienie: 8px pola formularza · 10px dokumenty/okładki · 14px karty i kafle · 18px duże kadry · 999px CTA (pill).
- Obramowania: `1px solid #E6E6E9`. Placeholder: `1.5px dashed #E6E6E9`.
- Karty: białe, promień 14px, bez obramowania na `#F6F6F7`; cień pojawia się miękko na hover (`0 14px 34px -18px rgba(74,75,82,.35)`). Cienie zawsze chłodne, oparte na `#4A4B52` — nigdy na czerni.

### Ruch i stany
- Subtelny: hover translate 2–5px, transition ≤ .25s. Bez ruchu, który dezorientuje (respekt `prefers-reduced-motion`).
- Easing: `cubic-bezier(.25,.8,.3,1)`.
- Hover CTA: ciemniejszy fiolet `#9C118A` + `translateY(-1px)`. Hover linku: strzałka przesuwa się w prawo; podkreślenie w fiolecie. Hover kafla: cień + delikatne uniesienie.
- Focus-visible: podwójny pierścień `0 0 0 3px #fff, 0 0 0 6px #BB16A3`.
- Transparentność/blur: nagłówek strony `rgba(255,255,255,.92)` + `backdrop-filter: blur(10px)`; welon hero na bieli. Poza tym oszczędnie.

### Layout
- Kontener treści: max `1140px` (sekcje szerokie `1120px`), padding boczny 28–32px.
- Rytm pionowy sekcji: `88–110px` padding góra/dół.
- Nagłówek sticky. Siatki kafli: 4–5 kolumn (wyzwania/priorytety/filary), zwężane responsywnie.

---

## ICONOGRAPHY — ikonografia

Marka jest **celowo minimalna ikonograficznie**. Nie istnieje własny zestaw ikon ani font ikon.

- **Sygnet marki** (litera „Q" / wstążka) pełni funkcję jedynego stałego znaku graficznego — używany w nagłówku i jako akcent otwierający sekcję „O nas". Pliki: `assets/mark-fiolet.png` (fiolet na jasnym tle), `assets/mark-white.png` (biały na fiolecie), `assets/psod-mark.jpg` (kafelek — header/favicon).
- **Znaki tekstowe zamiast ikon:** strzałka `→` w linkach („czytaj więcej →"), `↓` w hero, `+/–` w akordeonie FAQ, `✓` w plakietce „Fakt". To znaki Unicode ustawiane krojem UI (Poppins) — nie pliki graficzne.
- **Stempel „MIT"** — jedyny „ozdobny" element graficzny (obrócona pieczęć w czerwieni), realizowany typografią, nie ikoną.
- **Brak emoji.** Brak kolorowych piktogramów. Brak ilustracji.
- **Loga usługodawców** — wpinane z zewnątrz; do czasu licencji: placeholder (ramka kreskowana + `[logo]`).

Gdyby w przyszłości potrzebny był zestaw ikon liniowych, rekomendacja: **Lucide** (cienka kreska, spójna z lekkim charakterem marki) — należy to jednak uzgodnić; obecnie żaden zestaw nie jest częścią systemu.

---

## Tokeny

CSS custom properties, wejście przez `styles.css` (tylko `@import`):
- `tokens/colors.css` — marka, neutralne, błękit, sygnał, stopka + aliasy semantyczne.
- `tokens/typography.css` — rodziny, wagi, skala rozmiarów, interlinia, spacja liter.
- `tokens/spacing.css` — odstępy, promienie, obramowania, cienie, ruch.
- `tokens/fonts.css` — Fraunces + Poppins z Google Fonts.

## Komponenty (`components/`)

Reużywalne prymitywy odwzorowane z makiety v23. Namespace runtime: `window.PSODDesignSystem_ecebba`.

**core/** — `Button`, `ArrowLink`, `Overline`, `Highlight` (zakreślacz), `Stamp` (stempel „MIT"), `Tag`.
**cards/** — `FilarCard`, `MythTile`, `FaqItem`, `NewsCard`, `Placeholder`.
**forms/** — `NewsletterForm` (z pełnymi klauzulami RODO).

Każdy komponent: `Name.jsx` + `Name.d.ts` + `Name.prompt.md`; jedna karta `@dsCard` na katalog.

## UI Kit (`ui_kits/`)

**`ui_kits/website/`** — wysokowierna rekonstrukcja strony głównej (`index.html` + `site-chrome.jsx`, `home-a.jsx`, `home-b.jsx`). Odtwarza wszystkie 17 sekcji, treść 1:1, oraz interakcje: suwak demograficzny, kafle-zakładki mitów, akordeon FAQ, „czytaj więcej". Zob. `ui_kits/website/README.md`.

## Karty specyfikacji (zakładka Design System)

`guidelines/` — karty foundation: Colors (4), Type (4), Spacing (3), Brand (4). Plus karty komponentów w `components/*/`.

## Zasoby (`assets/`)

- `mark-fiolet.png`, `mark-white.png`, `psod-mark.jpg` — sygnet (PNG/JPG, z makiety).
- `logo-*.pdf` — oryginalne logotypy wektorowe (poziom/pion, PL/EN, RGB/CMYK) + `logo-ksiega-znaku.pdf`.

---

## ⚠️ Podstawienia i luki (do potwierdzenia przez PSOD)

- **Fonty webowe = Google Fonts** (Fraunces, Poppins) — zgodne z makietą v23. **Aktiv Grotesk Ex XBold** (font logotypu) jest komercyjny i **nie jest dołączony**; występuje wyłącznie w plikach PDF logo. Web-lockup składa nazwę w Poppins 600 — jeśli potrzebny jest wierny lockup z Aktiv Grotesk, prosimy o dostarczenie pliku fontu lub gotowego SVG.
- **Renderowanie PDF logo → PNG** nie powiodło się w tym środowisku; sygnet pochodzi z rastrowej wersji z makiety, a warianty (biały/fiolet na przezroczystym) wyprowadzono przez key-out koloru. Pełne, wektorowe logotypy poziome/pionowe/EN pozostają w PDF-ach w `assets/`.
- **Zdjęcia:** brak licencjonowanych materiałów — UI kit używa tonalnych szarości zamiast stocku. Do wpięcia po dostarczeniu licencji.

## Index / manifest katalogu głównego

- `styles.css` — punkt wejścia CSS (tylko `@import`).
- `thumbnail.html` — kafelek systemu.
- `readme.md` — ten plik.
- `SKILL.md` — opakowanie Agent Skill.
- `tokens/`, `components/`, `ui_kits/`, `guidelines/`, `assets/` — jak wyżej.
