/* PSOD 2026 — interakcje strony glownej. PSOD_ASSETS definiowane w functions.php (wp_add_inline_script). */
/* ============================================================
   PSOD — interakcje strony głównej (vanilla JS, bez zależności)
   ============================================================ */

/* --- 0. Menu główne: hamburger otwiera/zamyka pełnoekranową nakładkę --- */
(function(){
  var btn=document.getElementById('menuToggle');
  var nav=document.getElementById('mainNav');
  if(!btn||!nav) return;
  function close(){
    nav.classList.remove('is-open');
    btn.classList.remove('is-active');
    btn.setAttribute('aria-expanded','false');
    nav.setAttribute('aria-hidden','true');
    document.body.classList.remove('nav-open');
  }
  function open(){
    nav.classList.add('is-open');
    btn.classList.add('is-active');
    btn.setAttribute('aria-expanded','true');
    nav.setAttribute('aria-hidden','false');
    document.body.classList.add('nav-open');
  }
  btn.addEventListener('click',function(){
    nav.classList.contains('is-open') ? close() : open();
  });
  [].forEach.call(nav.querySelectorAll('a'),function(a){
    a.addEventListener('click',close);
  });
  document.addEventListener('keydown',function(e){
    if(e.key==='Escape') close();
  });
})();

/* --- 0b. Kotwice w obrębie strony: jawny scroll (nakładka menu potrafi
   ubić natywny skok przeglądarki do #id, jeśli oba dzieją się w tym samym
   kliknięciu) --- */
(function(){
  document.addEventListener('click',function(e){
    var a=e.target.closest('a[href^="#"]');
    if(!a) return;
    var id=a.getAttribute('href').slice(1);
    if(!id) return;
    var target=document.getElementById(id);
    if(!target) return;
    e.preventDefault();
    window.setTimeout(function(){
      var before=window.pageYOffset;
      target.scrollIntoView({behavior:'smooth', block:'start'});
      // Zabezpieczenie: jesli plynny scroll z jakiegos powodu sie nie ruszy
      // (np. reduced-motion, ograniczenia srodowiska), wymus natychmiastowy.
      // Uwaga: opcja {behavior:'auto'} sama w sobie nie zawsze nadpisuje CSS
      // `scroll-behavior:smooth` — trzeba tymczasowo zmienic sama wlasciwosc.
      window.setTimeout(function(){
        if(Math.abs(window.pageYOffset - before) < 2){
          var prevBehavior=document.documentElement.style.scrollBehavior;
          document.documentElement.style.scrollBehavior='auto';
          target.scrollIntoView({block:'start'});
          document.documentElement.style.scrollBehavior=prevBehavior;
        }
      }, 350);
      history.pushState(null,'','#'+id);
    }, 50);
  });
})();

/* --- 1. Demografia: suwak roku + refleksja --- */
(function(){
  var TERAZ=2026, MIN=1940, MAX=2012;
  var range=document.getElementById('demoRange');
  var year=document.getElementById('demoYear');
  var reflect=document.getElementById('demoReflect');
  function render(){
    var rok=parseInt(range.value,10);
    year.textContent=rok;
    var fill=((rok-MIN)/(MAX-MIN))*100;
    range.style.background='linear-gradient(to right,var(--fiolet) '+fill+'%,var(--linia) '+fill+'%)';
    var rok65=rok+65;
    if(rok65>TERAZ){
      reflect.innerHTML='W <em>'+rok65+'</em> roku skończysz 65 lat. Wtedy w wieku emerytalnym będzie już niemal <em>jedna trzecia</em> Polaków — a wielu z nich będzie potrzebować codziennej opieki.';
    }else{
      reflect.innerHTML='Masz już za sobą <em>65. urodziny</em>. Należysz do pokolenia, które dziś najbardziej potrzebuje dobrze zorganizowanej opieki.';
    }
  }
  range.addEventListener('input',render);
  render();
})();

/* --- 2. Filary: zakładki (tablist) --- */
(function(){
  var FILARY=[
    {name:'Wybór',icon:PSOD_ASSETS+'/filar-wybor.svg',intro:'Oznacza zapewnienie podopiecznym prawa do dokonania wyboru sposobu, w jaki żyją i otrzymują opiekę. W szczególności:',bullets:[
      'wspieranie podopiecznych w zarządzaniu własnym zdrowiem i samopoczuciem,',
      'zapewnienie podopiecznym i ich opiekunom wiedzy o prawie do uczestniczenia w opiece i dokonywania wyborów w tym zakresie,',
      'zaangażowanie do podejmowania decyzji dotyczących opieki oraz możliwości wyboru i kontroli nad usługami, z których korzystają,',
      'zlecanie usług, które zapewniają podopiecznym informacje i wsparcie w celu określenia i osiągnięcia wyników, które są dla nich ważne,',
      'uwzględnienie świadomych preferencji podopiecznych']},
    {name:'Bezpieczeństwo',icon:PSOD_ASSETS+'/filar-bezpieczenstwo.svg',intro:'Opieka domowa musi być realizowane w sposób bezpieczny, obejmujący m.in.:',bullets:[
      'ocenę ryzyka poszczególnych czynności opiekuńczych dla zdrowia i bezpieczeństwa podopiecznego oraz podejmowanie wszelkich możliwych działań w celu zmniejszenia takiego ryzyka,',
      'zapewnienie personelu opiekuńczego o odpowiednich kwalifikacjach, kompetencjach i doświadczeniu zapewniających bezpieczeństwo opieki,',
      'zapewnienie bezpieczeństwa i zgodności z przeznaczeniem pomieszczeń i sprzętu używanego do opieki',
      'zaspokojenie potrzeb podopiecznego w obszarze żywieniowym, nawodnienia i właściwe zarządzanie lekami,',
      'ocena ryzyka, zapobiegania, wykrywania i kontroli nad rozprzestrzenianiem się zakażeń,',
      'w przypadku, gdy odpowiedzialność za opiekę domową jest dzielona, zapewnienie współpracy na każdym etapie planowania i realizacji opieki.']},
    {name:'Szacunek',icon:PSOD_ASSETS+'/filar-szacunek.svg',intro:'Zarówno osoby korzystające z usług opieki, jak i opiekunowie muszą być chronieni przed nadużyciami i traktowani z godnością oraz szacunkiem. Usługi opieki domowej nie mogą być świadczone w sposób, który:',bullets:[
      'dopuszcza dyskryminację, jest lekceważący lub poniżający,',
      'obejmuje działania ograniczające autonomię i niezależność podopiecznych, które nie są niezbędne lub są nieproporcjonalną reakcją w stosunku do ryzyka powstania szkody dla podopiecznego, personelu lub innych osób',
      'nie respektuje osobistej przestrzeni podopiecznego i opiekuna oraz prywatności i poufności dotyczącej osobistych informacji,',
      'ograniczaja wolność w celu uzyskania opieki lub leczenia – opieka i leczenie muszą być zapewnione za zgodą podopiecznych lub ich prawnych opiekunów.']},
    {name:'Ciągłość',icon:PSOD_ASSETS+'/filar-ciaglosc.svg',intro:'Opieka domowa wymaga:',bullets:[
      'zapewnienia podopiecznym prawa do zachowania ciągłości opieki, tj. nieprzerwanego świadczenia bez narażania ich na ryzyko przerwy w dostępie do opieki,',
      'zachowania dokładnej, pełnej i aktualnej informacji (poprzez odpowiednią dokumentację) dotyczącej każdego podopiecznego oraz decyzji podjętych w odniesieniu do zapewnionej opieki,',
      'zapewnienia możliwości spersonalizowanego długotrwałego planowania opieki']},
    {name:'Indywidualne podejście',icon:PSOD_ASSETS+'/filar-indywidualne.svg',intro:'Opieka domowa wymaga zatrudnienia odpowiedniej liczby wykwalifikowanego i otwartego na potrzeby podopiecznych personelu, w celu:',bullets:[
      'zapewnienia zakresu opieki dostosowanego do potrzeb i preferencji podopiecznych,',
      'możliwości skupienia się na tym, co jest ważne dla podopiecznych w kontekście jakości ich życia, a nie tylko liście schorzeń lub objawów, które należy leczyć,',
      'dbania o transparentność w relacjach oraz zakresie leczenia i świadczonej opieki,',
      'zapewnienia skuteczności w rejestrowaniu, reagowaniu i rozwiązywaniu problemów zgłaszanych przez pacjentów, ich rodziny i personel.']}
  ];
  var tabs=document.getElementById('pillarTabs');
  var panel=document.getElementById('pillarPanel');
  function pad(n){return String(n).padStart(2,'0');}
  function esc(s){return s.replace(/&/g,'&amp;').replace(/</g,'&lt;');}
  FILARY.forEach(function(f,i){
    var b=document.createElement('button');
    b.className='ptab';b.setAttribute('role','tab');b.setAttribute('aria-selected',i===0?'true':'false');
    b.innerHTML='<span class="ptab__ghost" aria-hidden="true">'+pad(i+1)+'</span>'+
      '<span class="ptab__eyebrow"><span class="ln"></span><span class="lbl">Filar '+pad(i+1)+'</span></span>'+
      '<span class="ptab__name">'+f.name+'</span>';
    b.addEventListener('click',function(){select(i);});
    tabs.appendChild(b);
  });
  function select(i){
    var f=FILARY[i];
    [].forEach.call(tabs.children,function(el,k){el.setAttribute('aria-selected',k===i?'true':'false');});
    var html='<img src="'+f.icon+'" alt=""><h3>'+f.name+'</h3><p class="intro">'+esc(f.intro)+'</p><div>';
    f.bullets.forEach(function(b){html+='<div class="bullet"><span class="dot">•</span><span>'+esc(b)+'</span></div>';});
    html+='</div>';
    panel.innerHTML=html;
    panel.classList.remove('psod-fade');void panel.offsetWidth;panel.classList.add('psod-fade');
  }
  select(0);
})();

/* --- 3. O nas: czytaj więcej --- */
(function(){
  var t=document.getElementById('aboutToggle');
  var extra=document.getElementById('aboutExtra');
  t.addEventListener('click',function(){
    var open=extra.hasAttribute('hidden');
    if(open){extra.removeAttribute('hidden');}else{extra.setAttribute('hidden','');}
    t.setAttribute('aria-expanded',open?'true':'false');
    t.innerHTML=(open?'zwiń':'czytaj więcej')+' <span>→</span>';
  });
})();

/* --- 4. Mity: gra „Prawda czy mit?" --- */
(function(){
  var MITY=[
    {t:'Opiekunowie domowi pracują 24h na dobę',f:'Faktem jest, że opiekunowie domowi mają zapewnione zakwaterowanie w domu podopiecznego, więc w zasadzie przebywają w miejscu pracy 24h na dobę. Nie jest jednak prawdą, że przez cały ten czas wykonują pracę. Profesjonalna firma opiekuńcza powinna ustalić z opiekunem zakres czynności i obowiązków, który obejmuje wyłącznie czynności, których bezpośrednim beneficjentem jest osoba podopieczna. Zlecenia nie mogą zakładać pomocy choremu „non stop”.'},
    {t:'Usługi opieki domowej świadczą Agencje Pracy Tymczasowej',f:'<em>[Do uzupełnienia — oryginalna strona nie zawiera tekstu faktu dla tego mitu. Treść do dostarczenia przez PSOD.]</em>'},
    {t:'Opiekunowie domowi nie muszą mieć kompetencji',f:'Takie stwierdzenie jest krzywdzące dla opiekunów i może być niebezpieczne dla podopiecznych. Nie każdy może zostać opiekunem domowym — profesjonalne firmy zwracają uwagę na szereg cech, kompetencji i predyspozycji. Kluczowe są umiejętności praktyczne obejmujące codzienną opiekę i pielęgnację, wiedza o procesie starzenia i demencji, a także empatia, cierpliwość, komunikatywność i szacunek do drugiego człowieka.'},
    {t:'Opieka nad osobą starszą to dobre zajęcie tylko dla kobiet 50+',f:'Prawdą jest, że wśród opiekunów zdecydowaną większość stanowią kobiety, często w grupie wiekowej 50+. Jednak wśród opiekunów coraz więcej jest mężczyzn (ok. 10%) i osób młodych, które przyciąga misyjność tego zawodu. Biorąc pod uwagę tempo starzenia się społeczeństwa, opiekuna osoby starszej można nazwać zawodem przyszłości.'}
  ];
  var total=MITY.length;
  var cur=0;
  var seen={};
  var dotsEl=document.getElementById('mythDots');
  var innerEl=document.getElementById('mythInner');
  var countEl=document.getElementById('mythCount');
  var nextEl=document.getElementById('mythNext');
  MITY.forEach(function(m,k){
    var d=document.createElement('button');
    d.className='myths__dot';d.setAttribute('aria-label','Twierdzenie '+(k+1));
    d.addEventListener('click',function(){cur=k;render(false);});
    dotsEl.appendChild(d);
  });
  function updateDots(){
    [].forEach.call(dotsEl.children,function(d,k){
      d.dataset.state=(k===cur)?'current':(seen[k]?'seen':'');
    });
  }
  function updateCount(){
    var n=Object.keys(seen).length;
    countEl.textContent='Odkryto '+n+' z '+total;
  }
  function render(revealed){
    var m=MITY[cur];
    var html='<p class="myth__statement">„'+m.t+'"'+(revealed?'<span class="myth__strike psod-strike" aria-hidden="true"></span>':'')+'</p>';
    if(!revealed){
      html+='<div class="myth__guess"><div class="ask">Jak myślisz?</div><div class="myth__buttons">'+
        '<button class="btn btn--secondary" data-g="prawda">To prawda</button>'+
        '<button class="btn btn--secondary" data-g="mit">To mit</button></div></div>';
    }else{
      var g=seen[cur];
      var react=(g==='mit')?'Dobra intuicja — to mit.':'To jednak mit.';
      html+='<div class="myth__reveal psod-fade"><div class="myth__react">'+react+'</div>'+
        '<div class="myth__fact"><div class="myth__factlabel"><span class="check">✓</span>Fakt</div>'+
        '<div class="myth__facttext">'+m.f+'</div></div></div>';
    }
    innerEl.innerHTML=html;
    if(!revealed){
      [].forEach.call(innerEl.querySelectorAll('[data-g]'),function(btn){
        btn.addEventListener('click',function(){
          seen[cur]=btn.dataset.g;
          render(true);updateDots();updateCount();
        });
      });
    }
    updateDots();
  }
  nextEl.addEventListener('click',function(e){e.preventDefault();cur=(cur+1)%total;render(!!seen[cur]);});
  render(false);updateCount();
})();
