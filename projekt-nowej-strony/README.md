# Projekt nowej strony — polskaopieka.eu

Deliverable z **Claude Design**: kompletny prototyp nowej strony głównej PSOD,
gotowy do przełożenia na motyw WordPress.

## Pliki
- **`psod-strona-glowna.html`** — samodzielna strona główna (cały CSS w `<style>`,
  JS w `<script>`, obrazy linkowane do `assets/`). Jedyna zależność zewnętrzna:
  Google Fonts (Fraunces + Poppins).
- **`HANDOFF.md`** — pełna dokumentacja: design tokens (kolory/typografia/odstępy),
  struktura 16 sekcji, lista obrazów, opis interakcji, wskazówki wdrożeniowe WP.
- **`DESIGN-NOTES.md`** — notatki z Claude Design (oryginalny CLAUDE.md z eksportu).
- **`_ds/`** — design system PSOD (tokeny CSS, manifest, bundle).
- **`assets/`** — obrazy i ikony używane przez stronę.

## Zmiany względem eksportu
- **Hero (`assets/photo-opieka-01.jpeg`)** — zoptymalizowany z 6610×4407 / 10 MB do
  1920×1280 / 231 KB (web). Oryginalny master licencjonowany, nie trzymamy pełnej
  rozdzielczości w publicznym repo.
- Pominięto z eksportu: surowe grafiki `assets/psod/` (część ze znakami wodnymi Adobe
  Stock — wg HANDOFF „nie nadają się do produkcji") oraz duplikaty pełnowymiarowych zdjęć.

## Status
To jest **projekt/prototyp wyglądu**, jeszcze NIE motyw. Kolejny krok: przełożenie na
nowy motyw WordPress (szablony + SCSS + pola ACF), budowany równolegle — stara strona
`polskaopieka.eu` pozostaje nietknięta do kontrolowanego przełączenia.
