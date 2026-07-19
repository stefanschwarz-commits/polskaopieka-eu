# PSOD — Strona główna · pakiet dla dewelopera

Samodzielny prototyp strony głównej Polskiego Stowarzyszenia Opieki Domowej (polskaopieka.eu), gotowy do przełożenia na motyw WordPress.

## Pliki
- **`psod-strona-glowna.html`** — kompletna strona w jednym pliku. Cały CSS w jednym `<style>` w `<head>`, cała logika w jednym `<script>` na dole. Otwiera się w przeglądarce bez builda. Jedyna zależność zewnętrzna: fonty z Google Fonts (link w `<head>`).
- **`assets/`** — obrazy i ikony (patrz „Lista obrazów").
- Treść jest **1:1** z polskaopieka.eu (verbatim). Design zmienia formę, nie treść. Placeholdery „do uzupełnienia" odzwierciedlają luki w oryginale — nie wypełniać zmyśloną treścią (np. fakt do mitu o Agencjach Pracy Tymczasowej).

## Zasady twarde (nie łamać)
1. **Zero czerni `#000`.** Najciemniejszy ton: `#4A4B52` (tekst, tło stopki).
2. **Fiolet wyłącznie `#BB16A3`** — jedyny wariant `#9C118A` tylko na `:hover/:active` fioletowego CTA. Używać oszczędnie.
3. **Czerwień `#CE2029`** — wyłącznie przekreślenie mitu. Nie kolor błędu/linku.
4. **Błękit `#5E8CA0`** (+ tło `#E7F0F4`) — jedyny kolor uzupełniający (bloki „opiekuńcze": Apel, Cytat, Mity).
5. **Zakreślacz** (marker fioletowy, biały tekst) — maks. jeden na sekcję.
6. Brak emoji. Dostępność (seniorzy): tekst bieżący ≥15–16px, respektuj `prefers-reduced-motion`.

---

## DESIGN TOKENS

### Kolory (hex)
| Rola | Hex |
|---|---|
| Fiolet marki (logo, CTA, akcenty, zakreślacz) | `#BB16A3` |
| Fiolet — hover/active CTA | `#9C118A` |
| Biel | `#FFFFFF` |
| Tekst podstawowy (najciemniejszy dozwolony) | `#4A4B52` |
| Tekst drugorzędny | `#7B7C84` |
| Tekst pomocniczy / etykiety / źródła | `#A8A9B0` |
| Tło sekcji „mgła" | `#F1F1F3` |
| Linie / obramowania / separatory | `#E6E6E9` |
| Błękit opiekuńczy | `#5E8CA0` |
| Tło bloków opiekuńczych | `#E7F0F4` |
| Czerwień — tylko przekreślenie mitu | `#CE2029` |
| Stopka — tło | `#4A4B52` |
| Stopka — tekst / tekst drugorzędny | `#C9CBD1` / `#8E9096` |

Wszystkie jako CSS custom properties w `:root` (`--fiolet`, `--tekst`, `--mgla` itd.).

### Typografia
Fonty z Google Fonts:
- **Fraunces** (serif) — gdy tekst ma *poruszyć*: nagłówki, cytaty, blockquote. Wagi **300** (light) i **400**, plus italic (300/400) w akcentach fioletowych.
- **Poppins** (sans) — gdy ma *poinformować* lub być *klikalny*: nawigacja, przyciski, kafle, tekst UI, stopka. Wagi **400 / 500 / 600 / 700**.

Skala rozmiarów (px; nagłówki responsywne przez `clamp()`):

| Element | Rozmiar | Font / waga |
|---|---|---|
| Hero H1 | `clamp(30 → 52)` | Fraunces 300 |
| Tytuł sekcji (H2) | `clamp(28 → 44/50)` | Fraunces 300 |
| Rok w suwaku | `clamp(52 → 84)` | Fraunces 400 |
| Blockquote / cytat | `clamp(27 → 44)` | Fraunces 300 |
| Tytuł publikacji / apelu (H3) | `clamp(19 → 29)` | Fraunces 400 |
| Nazwa filaru / tytuł panelu | `18` / `clamp(22 → 30)` | Fraunces 500 |
| Tytuł kafla (wyzwania/priorytety) | `17–18` | Poppins 600 |
| Akapit wiodący (lead) | `17` | Poppins 400 |
| Tekst bieżący | `16` | Poppins 400 |
| Tekst w komponentach | `15–15.5` | Poppins 400 |
| Nawigacja / przyciski (UI) | `14` | Poppins 500 |
| Data / etykieta | `12.5` | Poppins 400/500 |
| Nadtytuł (overline, uppercase) | `11.5` | Poppins 600 |

Interlinia: nagłówki `1.2–1.35`, tekst `1.7–1.85`.
Spacja liter: nadtytuł `.26em`, etykiety uppercase `.16–.18em`.

### Skala odstępów (px)
`4 · 8 · 12 · 16 · 22 · 28 · 34 · 48 · 64 · 88 · 104 · 120`
Rytm pionowy sekcji: **88–128px** góra/dół (na mobile skracany do 72px).
Kontener treści: max **1140px** (sekcje szerokie **1120px**), padding boczny **32px** (mobile 20–28px).

### Zaokrąglenia rogów
`8px` pola formularza · `10px` dokumenty/okładki · `14px` karty i kafle · `18px` duże kadry/panele · `999px` przyciski CTA (pill).

### Cienie (chłodne, bazują na `#4A4B52`, nigdy na czerni)
- karta: `0 14px 34px -18px rgba(74,75,82,.35)`
- uniesienie: `0 24px 56px -28px rgba(74,75,82,.4)`
- dokument/okładka: `0 30px 64px -28px rgba(74,75,82,.45), 0 4px 12px rgba(74,75,82,.12)`

### Obramowania / ruch
- Obramowanie: `1px solid #E6E6E9`. Placeholder: `1.5px dashed #E6E6E9`.
- Easing globalny: `cubic-bezier(.25,.8,.3,1)`; czasy `.2 / .25 / .45s`.
- Hover CTA: ciemniejszy fiolet + `translateY(-1px)`. Hover kafla-zdjęcia: grayscale→kolor + `scale(1.03)`. Hover linku-strzałki: strzałka +5px.

---

## STRUKTURA SEKCJI (kolejność od góry)
1. **Header** (sticky) — logo, przełącznik PL | DE | EN, hamburger. Tło `rgba(255,255,255,.92)` + `blur(10px)`.
2. **Hero** — zdjęcie grayscale + welon bieli; nadtytuł, H1 (słowo „opieki" w fiolecie), kreska.
3. **Demografia** — gra: pytanie, duży rok, suwak 1940–2012, dynamiczna refleksja, zakreślacz, link.
4. **Wyzwania cywilizacyjne** — 4 kafle 1:1 (zdjęcie + gradient + fioletowa kreska).
5. **Apel do rządu** — blok błękitny: dokument (karta) + tekst + CTA „Pobierz".
6. **Aktualności** — wpis wyróżniony (placeholder) + 4 mini-karty (placeholdery zdjęć).
7. **Cytat-pieczęć** — blok błękitny, blockquote (18. zasada EFPS).
8. **Filary opieki domowej** — zakładki: indeks 5 filarów + panel z opisem 1:1.
9. **O nas** — sygnet, H2, akapit, „czytaj więcej".
10. **Nasze priorytety** — 4 kafle 4:5 (zdjęcie + gradient fioletowy) + CTA „Więcej".
11. **Nasza działalność** — 3 karty (Edukacja / Doradztwo / Reprezentowanie).
12. **Mity** — gra „Prawda czy mit?" (blok błękitny).
13. **Publikacje** — okładka (sticky) + opis raportu 2024 + CTA „Zobacz raport".
14. **Q&A** — akordeon (natywne `<details>`), pierwszy otwarty.
15. **Dołącz** — zdjęcie grayscale + fioletowy blok, 2 CTA.
16. **Footer** — 3 kolumny + pasek z danymi rejestrowymi.

> Ukryte na życzenie klienta (są w systemie, nie na tej stronie): Rekomendowani usługodawcy, Oferta szkoleniowa, Newsletter.

---

## LISTA OBRAZÓW (która grafika, w której sekcji)
Wszystkie w `assets/`.

| Plik | Sekcja / użycie |
|---|---|
| `logo-psod.svg` | Header — logo poziome |
| `footer-logo.svg` | Footer — logo |
| `sygnet.svg` | O nas — sygnet marki |
| `photo-opieka-01.jpeg` | Hero — zdjęcie tła (grayscale + welon) |
| `wyzwanie-starzenie.jpg` | Wyzwania — „Starzenie się społeczeństw" |
| `wyzwanie-demencja.jpg` | Wyzwania — „Choroby demencyjne" |
| `wyzwanie-personel.jpg` | Wyzwania — „Brak personelu opiekuńczego" |
| `wyzwanie-koszty.jpg` | Wyzwania — „Rosnące koszty opieki" |
| `stanowisko-psod-kido.jpg` | Apel do rządu — dokument stanowiska |
| `filar-wybor.svg` … `filar-indywidualne.svg` (5) | Filary — ikona panelu każdego filaru |
| `ico-edukacja.svg`, `ico-doradztwo.svg`, `ico-reprezentowanie.svg` | Działalność — ikony 3 kart |
| `prio-transgraniczna.png` | Priorytety — „Bariery transgraniczne" |
| `prio-standardy.png` | Priorytety — „Standardy w opiece domowej" |
| `prio-szara-strefa.png` | Priorytety — „Ograniczenie szarej strefy" |
| `prio-ramy-prawne.jpg` | Priorytety — „Bariery prawne i administracyjne" |
| `report-cover.jpg` | Publikacje — okładka raportu 2024 |
| `photo-dolacz.jpg` | Dołącz — zdjęcie tła (grayscale) |

**Placeholdery (bez pliku, ramka kreskowana):** wpis wyróżniony i 4 mini-karty w „Aktualnościach" — do wpięcia realnych zdjęć/screenów po dostarczeniu.

**Znaki tekstowe zamiast ikon** (Unicode, font Poppins): `→` w linkach, `+/–` w akordeonie FAQ, `✓` w plakietce „Fakt", `„` jako ornament w cytacie.

**Uwaga o źródłach obrazów:** w `assets/psod/` leżą też surowe grafiki pobrane z motywu live (`box_1-4.png`, `hero.png` itd.) — część ma wtopione znaki wodne Adobe Stock i **nie nadaje się do produkcji**. Strona używa przygotowanych, opisanych wersji z `assets/`. Font logotypu (Aktiv Grotesk Ex XBold) jest komercyjny — logo dostarczone jako SVG.

---

## INTERAKCJE (vanilla JS, sekcja `<script>` na dole pliku)

1. **Suwak demograficzny** — `input[type=range]` 1940–2012. `input` przelicza: wypełnienie tracka (`linear-gradient` wg %) oraz refleksję. Jeśli `rok+65 > 2026` → „W {rok+65} roku skończysz 65 lat…"; w przeciwnym razie → wariant „Masz już za sobą 65. urodziny…". Liczby w refleksji wyróżnione fioletem.

2. **Filary — zakładki (tablist)** — 5 przycisków-indeksów po lewej; klik podmienia panel po prawej (ikona, nazwa, wprowadzenie, lista punktów). Aktywna zakładka: biała karta z cieniem, rosnąca fioletowa kreska, nazwa w fiolecie. Panel wjeżdża animacją `psodFade` (.28s). `role="tablist"/"tab"/"tabpanel"`.

3. **O nas — „czytaj więcej"** — przycisk rozwija/zwija dodatkowy akapit („Kim są Członkowie PSOD?"); etykieta zmienia się „czytaj więcej ↔ zwiń", `aria-expanded` aktualizowane.

4. **Mity — gra „Prawda czy mit?"** — 4 twierdzenia. Kropki postępu u góry (aktywna = fiolet, odkryta = wydłużona jasnofioletowa). Użytkownik klika „To prawda" / „To mit" → animowane czerwone przekreślenie twierdzenia (`psodStrike`, scaleX .5s) + reakcja + panel „Fakt" (plakietka ✓ + treść). „Następne twierdzenie →" przechodzi cyklicznie; licznik „Odkryto X z 4". Mit #2 ma celowy placeholder faktu (brak w oryginale).

5. **Q&A** — natywny akordeon `<details>/<summary>`; znak `+`/`–` w fiolecie przez `::after`; pierwszy element otwarty (`open`).

Hover/stany są w CSS (`:hover`, `[aria-selected]`, `details[open]`). Wszystkie animacje wyłączane przez `@media (prefers-reduced-motion: reduce)`.

---

## Wskazówki wdrożeniowe (WordPress)
- Mapować sekcje na bloki/partiale motywu; tokeny `:root` → zmienne motywu (lub `theme.json`).
- Treści zmienne (aktualności, publikacje, filary, mity, FAQ) → pola/CMS; formularze (kontakt) → backend.
- Zachować semantykę i atrybuty ARIA (tablist, details, aria-expanded).
- Fonty: rozważyć self-hosting Fraunces + Poppins zamiast Google Fonts (RODO/wydajność).
