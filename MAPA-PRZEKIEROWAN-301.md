# Mapa przekierowan 301 — polskaopieka.eu (psod -> psod2)

Wygenerowano 2026-07-21. 22 reguly przekierowan.

**Aktualizacja 2026-07-22:** 4 URL-e priorytetow `/artykuly/…/` (transgraniczna, szara strefa,
ramy prawne, standardy) NIE sa juz przekierowaniami — to teraz pelnoprawne podstrony (CPT
`priorytet` routowalny pod `artykuly/<slug>`, szablon `single-priorytet.php`), zwracaja 200 i sa
kanoniczne. Ich 4 reguly `RewriteRule … /nasze-priorytety/` usunieto z `.htaccess`
(backup `.htaccess.bak_prio_20260722`). Pozostale 4 reguly `/artykuly/…` (wyzwania) zostaja.

| Stary URL | -> | Nowy cel | Uwaga |
|---|---|---|---|
| `/artykuly/starzenie-sie-spoleczenstw/` | -> | `/#wyzwania` | wyzwanie: starzenie |
| `/artykuly/choroby-demencyjne/` | -> | `/#wyzwania` | wyzwanie: demencja |
| `/artykuly/brak-personelu-opiekunczeg/` | -> | `/#wyzwania` | wyzwanie: personel |
| `/artykuly/rosnace-koszty-opieki/` | -> | `/#wyzwania` | wyzwanie: koszty |
| `/doradztwo/` | -> | `/#dzialalnosc` | dzialalnosc: doradztwo |
| `/edukacja/` | -> | `/#dzialalnosc` | dzialalnosc: edukacja |
| `/reprezentowanie/` | -> | `/#dzialalnosc` | dzialalnosc: reprezentowanie |
| `/wyzwania-cywilizacyjne/` | -> | `/#wyzwania` | stara strona wyzwan |
| `/mity/` | -> | `/` | gra 'Prawda czy mit?' jest na stronie glownej |
| `/publikacje/` | -> | `/#publikacje` | stara strona publikacji |
| `/rekomendowani-uslugodawcy/` | -> | `/` | sekcja usunieta (brak odpowiednika) |
| `/publikacje/nasze-stanowisko/` | -> | `/stanowisko/` | stanowisko PSOD-KIDO |
| `/publikacje/nasze-stanowisko-2/` | -> | `/stanowisko/` | stanowisko PSOD-KIDO (duplikat) |
| `/publikacje/wspolne-stanowisko-polskiego-stowarzyszenia-opieki-domowej-oraz-krajowej-izby-domow-opieki/` | -> | `/stanowisko/` | wspolne stanowisko PSOD-KIDO |
| `/publikacje/raport-na-temat-opieki-domowej-2023/` | -> | `/#publikacje` | raport -> sekcja Publikacje |
| `/szkolenia/europejski-kongres-mobilnosci-pracy-2023/` | -> | `/` | szkolenia usuniete |
| `/szkolenia/szkolenie-i-wsparcie-opiekunek-i-opiekunow-oraz-standaryzacja-jakosci-uslug-opieki-domowej/` | -> | `/` | szkolenia usuniete |
| `/swiatowy-dzien-walki-z-handlem-ludzmi-w-tvp-info-z-udzialem-naszych-ekspertow/` | -> | `/aktualnosci/` | temat pokrewny -> aktualnosci |
| `/swiatowy-dzien-walki-z-handlem-ludzmi-w-tvp-info-z-udzialem-naszych-ekspertow-2/` | -> | `/aktualnosci/` | temat pokrewny -> aktualnosci |
| `/12/` | -> | `/` | post-smiec (numeryczny slug) |
| `/to-jest-testowy-wpis-i-jest-fajny/` | -> | `/` | post testowy |
| `/what-is-lorem-ipsum/` | -> | `/` | post demo (lorem ipsum) |

**Bez regul (dzialaja same):** 59 aktualnosci (`/aktualnosci/<slug>/`, slugi zgodne); 5 starych postow z tym samym slugiem co aktualnosc (WP canonical 301).

---

## Implementacja

Przekierowania sa realizowane przez `RewriteRule` w `.htaccess` produkcji (`public_html/polskaopieka.eu/.htaccess`), w bloku `PSOD-REDIRECTS-301` wstawionym PRZED blokiem `# BEGIN WordPress` (zeby zadzialaly przed routingiem WP). `.htaccess` nie jest wersjonowany w repo — ponizej kopia bloku dla odtwarzalnosci.

Zweryfikowane 2026-07-21: wszystkie 95 starych adresow zwracaja 200 (aktualnosci) lub 301 (reszta) — zero 404. Backup .htaccess przed zmiana: `.htaccess.bak_20260721_redirects` na serwerze.

```apache
# BEGIN PSOD-REDIRECTS-301
# Mapa przekierowan 301 ze starych URL-i (motyw psod) na nowe (psod2), 2026-07-21.
# Aktualnosci (/aktualnosci/<slug>/, 59 szt.) NIE wymagaja regul - slugi sie zgadzaja.
# Stare posty pokrywajace sie slugiem z aktualnosciami WP przekierowuje sam (canonical).
<IfModule mod_rewrite.c>
RewriteEngine On
    # wyzwanie: starzenie
    RewriteRule ^artykuly/starzenie-sie-spoleczenstw/?$ /#wyzwania [R=301,NE,L]
    # wyzwanie: demencja
    RewriteRule ^artykuly/choroby-demencyjne/?$ /#wyzwania [R=301,NE,L]
    # wyzwanie: personel
    RewriteRule ^artykuly/brak-personelu-opiekunczeg/?$ /#wyzwania [R=301,NE,L]
    # wyzwanie: koszty
    RewriteRule ^artykuly/rosnace-koszty-opieki/?$ /#wyzwania [R=301,NE,L]
    # (4 reguly priorytetow /artykuly/… usuniete 2026-07-22 — to teraz pelnoprawne podstrony 200)
    # dzialalnosc: doradztwo
    RewriteRule ^doradztwo/?$ /#dzialalnosc [R=301,NE,L]
    # dzialalnosc: edukacja
    RewriteRule ^edukacja/?$ /#dzialalnosc [R=301,NE,L]
    # dzialalnosc: reprezentowanie
    RewriteRule ^reprezentowanie/?$ /#dzialalnosc [R=301,NE,L]
    # stara strona wyzwan
    RewriteRule ^wyzwania-cywilizacyjne/?$ /#wyzwania [R=301,NE,L]
    # gra 'Prawda czy mit?' jest na stronie glownej
    RewriteRule ^mity/?$ / [R=301,NE,L]
    # stara strona publikacji
    RewriteRule ^publikacje/?$ /#publikacje [R=301,NE,L]
    # sekcja usunieta (brak odpowiednika)
    RewriteRule ^rekomendowani-uslugodawcy/?$ / [R=301,NE,L]
    # stanowisko PSOD-KIDO
    RewriteRule ^publikacje/nasze-stanowisko/?$ /stanowisko/ [R=301,NE,L]
    # stanowisko PSOD-KIDO (duplikat)
    RewriteRule ^publikacje/nasze-stanowisko-2/?$ /stanowisko/ [R=301,NE,L]
    # wspolne stanowisko PSOD-KIDO
    RewriteRule ^publikacje/wspolne-stanowisko-polskiego-stowarzyszenia-opieki-domowej-oraz-krajowej-izby-domow-opieki/?$ /stanowisko/ [R=301,NE,L]
    # raport -> sekcja Publikacje
    RewriteRule ^publikacje/raport-na-temat-opieki-domowej-2023/?$ /#publikacje [R=301,NE,L]
    # szkolenia usuniete
    RewriteRule ^szkolenia/europejski-kongres-mobilnosci-pracy-2023/?$ / [R=301,NE,L]
    # szkolenia usuniete
    RewriteRule ^szkolenia/szkolenie-i-wsparcie-opiekunek-i-opiekunow-oraz-standaryzacja-jakosci-uslug-opieki-domowej/?$ / [R=301,NE,L]
    # temat pokrewny -> aktualnosci
    RewriteRule ^swiatowy-dzien-walki-z-handlem-ludzmi-w-tvp-info-z-udzialem-naszych-ekspertow/?$ /aktualnosci/ [R=301,NE,L]
    # temat pokrewny -> aktualnosci
    RewriteRule ^swiatowy-dzien-walki-z-handlem-ludzmi-w-tvp-info-z-udzialem-naszych-ekspertow-2/?$ /aktualnosci/ [R=301,NE,L]
    # post-smiec (numeryczny slug)
    RewriteRule ^12/?$ / [R=301,NE,L]
    # post testowy
    RewriteRule ^to-jest-testowy-wpis-i-jest-fajny/?$ / [R=301,NE,L]
    # post demo (lorem ipsum)
    RewriteRule ^what-is-lorem-ipsum/?$ / [R=301,NE,L]
</IfModule>
# END PSOD-REDIRECTS-301
```
