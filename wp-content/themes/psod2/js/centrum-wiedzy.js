/* PSOD 2026 — Centrum wiedzy: wyszukiwarka + filtr kategorii jako PROGRESSIVE
   ENHANCEMENT. Wszystkie karty są w HTML (SSR), pogrupowane w kategorie. Bez JS
   wszystkie karty pozostają widoczne. Ten skrypt filtruje widoczne karty po tytule /
   krótkiej odpowiedzi / opisie / słowach kluczowych / kategorii (data-kb-search) oraz
   po kategorii (przyciski filtra, data-cat). Liczba wyników ogłaszana przez aria-live;
   przy zero wynikach pokazujemy komunikat. Aktywny filtr: aria-pressed + styl (nie sam kolor). */
(function () {
  var input = document.getElementById('kbSearchInput');
  var clearBtn = document.getElementById('kbSearchClear');
  var count = document.getElementById('kbCount');
  var noResults = document.getElementById('kbNoResults');
  var filterBtns = [].slice.call(document.querySelectorAll('.kb-filter'));
  var cards = [].slice.call(document.querySelectorAll('.kb-card'));
  var sections = [].slice.call(document.querySelectorAll('.kb-category'));
  if (!cards.length) return;

  var total = cards.length;
  var activeCat = 'all';

  function fold(s) {
    return (s || '')
      .toLowerCase()
      .replace(/ą/g, 'a').replace(/ć/g, 'c').replace(/ę/g, 'e').replace(/ł/g, 'l')
      .replace(/ń/g, 'n').replace(/ó/g, 'o').replace(/ś/g, 's').replace(/ż/g, 'z').replace(/ź/g, 'z');
  }

  cards.forEach(function (c) { c._kb = fold(c.getAttribute('data-kb-search') || ''); });

  function apply(announce) {
    var q = input ? fold(input.value.trim()) : '';
    var terms = q ? q.split(/\s+/).filter(Boolean) : [];
    if (clearBtn) clearBtn.hidden = q.length === 0;

    var visible = 0;
    cards.forEach(function (c) {
      var matchSearch = terms.every(function (t) { return c._kb.indexOf(t) !== -1; });
      var matchCat = activeCat === 'all' || c.getAttribute('data-cat') === activeCat;
      var show = matchSearch && matchCat;
      c.hidden = !show;
      if (show) visible++;
    });

    // Ukryj kategorie bez widocznych kart.
    sections.forEach(function (sec) {
      var any = sec.querySelector('.kb-card:not([hidden])');
      sec.hidden = !any;
    });

    if (noResults) noResults.hidden = visible !== 0;

    if (count && announce) {
      if (q.length === 0 && activeCat === 'all') {
        count.textContent = '';
      } else if (visible === 0) {
        count.textContent = 'Brak wyników.';
      } else {
        count.textContent = 'Liczba wyników: ' + visible + ' z ' + total + '.';
      }
    }
  }

  if (input) {
    input.addEventListener('input', function () { apply(true); });
    input.addEventListener('search', function () { apply(true); });
  }
  if (clearBtn) {
    clearBtn.addEventListener('click', function () {
      input.value = '';
      apply(true);
      input.focus();
    });
  }

  filterBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      activeCat = btn.getAttribute('data-cat') || 'all';
      filterBtns.forEach(function (b) {
        var on = b === btn;
        b.classList.toggle('is-active', on);
        b.setAttribute('aria-pressed', on ? 'true' : 'false');
      });
      apply(true);
    });
  });

  apply(false);
})();
