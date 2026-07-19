# PSOD — projekt strony głównej (handoff dla developera)

Ten folder zawiera gotowy, wysokowierny prototyp strony głównej **Polskiego Stowarzyszenia Opieki Domowej** (polskaopieka.eu) do przełożenia na **motyw WordPress**.

## Od czego zacząć
1. Przeczytaj **`HANDOFF.md`** — pełne design tokens (kolory hex, typografia, odstępy, promienie, cienie), lista obrazów per sekcja, opis interakcji, wskazówki WP.
2. Otwórz **`psod-strona-glowna.html`** — kompletna strona w jednym pliku (cały CSS w `<style>`, interakcje w `<script>`, bez builda). To wzorzec docelowego wyglądu i zachowania.
3. Zasoby w **`assets/`**. Pismo (papier firmowy) jako osobny dokument: **`pismo-stanowisko.html`** + **`Stanowisko-PSOD-KIDO.pdf`**.

## Zadanie
Zbuduj motyw WordPress `psod`, odtwarzając prototyp pixel-perfect. Rekomendacja: motyw blokowy + `theme.json` na tokenach, albo klasyczny motyw z CSS variables. Sekcje (16, kolejność w HANDOFF.md) jako partiale/bloki. Treści zmienne (aktualności, publikacje, filary, mity, FAQ) → CPT/ACF. Formularz kontaktu → backend. Fonty (Fraunces + Poppins) self-hostowane.

## Zasady twarde marki (NIE łamać)
- Zero czerni `#000` — najciemniejszy ton `#4A4B52`.
- Fiolet wyłącznie `#BB16A3` (hover CTA `#9C118A`). Używać oszczędnie.
- Czerwień `#CE2029` tylko przy przekreśleniu mitu. Błękit `#5E8CA0` w blokach opiekuńczych.
- Typografia: **Fraunces** (serif) gdy tekst ma poruszyć; **Poppins** (sans) gdy informuje/jest klikalny.
- **Treść 1:1** — teksty verbatim, bez skracania/parafraz. Placeholdery odzwierciedlają luki w oryginale — nie wypełniać zmyśloną treścią.
- Brak emoji. Dostępność: tekst ≥16px, respektuj `prefers-reduced-motion`, obsługa klawiatury (tablist, details, aria-expanded).

## Interakcje do odtworzenia
Suwak demograficzny, zakładki filarów, gra „Prawda czy mit?", „czytaj więcej" (O nas), akordeon Q&A. Szczegóły w HANDOFF.md.

## Uwaga o zasobach
W `assets/psod/` są surowe grafiki z motywu live — część ma znaki wodne Adobe Stock i nie nadaje się do produkcji. Używaj przygotowanych plików z `assets/`. Zdjęcia w „Aktualnościach" to placeholdery (jak w oryginale) — do wpięcia realnych materiałów.
