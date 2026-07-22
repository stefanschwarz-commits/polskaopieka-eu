/* PSOD 2026 — Centrum wiedzy: wyszukiwarka/filtr jako PROGRESSIVE ENHANCEMENT.
   Wszystkie karty są w HTML (SSR). Ten skrypt tylko filtruje widoczne karty po
   tytule / krótkiej odpowiedzi / opisie / słowach kluczowych / kategorii (dane w
   atrybucie data-kb-search). Bez JS karty pozostają widoczne. Liczba wyników jest
   ogłaszana przez aria-live; przy zero wynikach pokazujemy komunikat. */
(function () {
  var input = document.getElementById('kbSearchInput');
  var clearBtn = document.getElementById('kbSearchClear');
  var list = document.getElementById('kbCards');
  var noResults = document.getElementById('kbNoResults');
  var count = document.getElementById('kbCount');
  if (!input || !list) return;

  var cards = [].slice.call(list.querySelectorAll('.kb-card'));
  var total = cards.length;

  // Zdejmowanie polskich znaków diakrytycznych — „opieka dlugoterminowa" znajdzie
  // „opieka długoterminowa" i odwrotnie.
  function fold(s) {
    return (s || '')
      .toLowerCase()
      .replace(/ą/g, 'a').replace(/ć/g, 'c').replace(/ę/g, 'e').replace(/ł/g, 'l')
      .replace(/ń/g, 'n').replace(/ó/g, 'o').replace(/ś/g, 's').replace(/ż/g, 'z').replace(/ź/g, 'z');
  }

  cards.forEach(function (c) {
    c._kb = fold(c.getAttribute('data-kb-search') || '');
  });

  function apply() {
    var q = fold(input.value.trim());
    if (clearBtn) clearBtn.hidden = q.length === 0;

    if (q.length === 0) {
      cards.forEach(function (c) { c.hidden = false; });
      if (noResults) noResults.hidden = true;
      if (count) count.textContent = '';
      return;
    }

    var terms = q.split(/\s+/).filter(Boolean);
    var visible = 0;
    cards.forEach(function (c) {
      var match = terms.every(function (t) { return c._kb.indexOf(t) !== -1; });
      c.hidden = !match;
      if (match) visible++;
    });

    if (noResults) noResults.hidden = visible !== 0;
    if (count) {
      count.textContent = visible === 0
        ? 'Brak wyników dla „' + input.value.trim() + '”.'
        : 'Liczba wyników: ' + visible + ' z ' + total + '.';
    }
  }

  input.addEventListener('input', apply);
  input.addEventListener('search', apply);
  if (clearBtn) {
    clearBtn.addEventListener('click', function () {
      input.value = '';
      apply();
      input.focus();
    });
  }

  apply();
})();
