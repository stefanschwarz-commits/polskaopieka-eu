# polskaopieka.eu

Projekt strony WordPress. Grafika/layout przygotowywane w Claude (makiety/screenshoty),
kod (motyw WordPress) budowany tutaj na tej podstawie.

## Workflow

1. Stefan przygotowuje makiety/screenshoty w Claude.
2. Wspólnie budujemy motyw WordPress w tym repo na ich podstawie.
3. Każda porcja kodu przechodzi przegląd bezpieczeństwa (m.in. esc_html/esc_attr/esc_url,
   nonce przy formularzach, sanitizacja inputów, brak wstrzykiwania w SQL, bezpieczne
   nagłówki) i optymalizacji (rozmiar/format obrazów, minifikacja CSS/JS, lazy-loading,
   cache, liczba requestów).

## Struktura

- `.gitignore` — wyklucza wp-config.php, backupy, sekrety (wzorem innych projektów ELMI).
- Docelowo: folder motywu (np. `polskaopieka_theme/`) zostanie dodany po ustaleniu nazwy.
