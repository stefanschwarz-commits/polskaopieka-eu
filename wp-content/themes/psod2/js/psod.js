/* PSOD 2026 — interakcje strony glownej. PSOD_ASSETS definiowane w functions.php (wp_add_inline_script). */
/* ============================================================
   PSOD — interakcje strony głównej (vanilla JS, bez zależności)
   ============================================================ */

/* --- 0. Menu główne: hamburger otwiera/zamyka wysuwany panel z prawej (+ scrim) --- */
(function(){
  var btn=document.getElementById('menuToggle');
  var nav=document.getElementById('mainNav');
  var scrim=document.getElementById('navScrim');
  var closeBtn=document.getElementById('menuClose');
  if(!btn||!nav) return;
  function close(){
    nav.classList.remove('is-open');
    btn.classList.remove('is-active');
    btn.setAttribute('aria-expanded','false');
    nav.setAttribute('aria-hidden','true');
    document.body.classList.remove('nav-open');
    if(scrim){ scrim.classList.remove('is-open'); scrim.hidden=true; }
  }
  function open(){
    nav.classList.add('is-open');
    btn.classList.add('is-active');
    btn.setAttribute('aria-expanded','true');
    nav.setAttribute('aria-hidden','false');
    document.body.classList.add('nav-open');
    if(scrim){ scrim.hidden=false; requestAnimationFrame(function(){ scrim.classList.add('is-open'); }); }
  }
  btn.addEventListener('click',function(){
    nav.classList.contains('is-open') ? close() : open();
  });
  if(closeBtn) closeBtn.addEventListener('click',close);
  if(scrim) scrim.addEventListener('click',close);
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

/* --- 1. Demografia: suwak roku urodzenia -> 4 fakty o roku 80. urodzin ---
   Dane: assets/dane-demografia-pl.json (Eurostat EUROPOP2025 + EU-SILC, zrodla
   opisane w polu _source tego pliku). Zadnej interpretacji/komentarza - tylko
   liczby wyliczone z danych, tekst zdania jest stalym szablonem. */
(function(){
  var MIN=1940, MAX=2012;
  var DATA_MIN_YEAR=2025, DATA_MAX_YEAR=2100;
  var range=document.getElementById('demoRange');
  var yearEl=document.getElementById('demoYear');
  var facts=document.getElementById('demoFacts');
  if(!range||!yearEl||!facts) return;

  var DATA=null;

  function plural(n,forms){
    // forms: [jedna, dwie-cztery, pieciu-i-wiecej]
    if(n===1) return forms[0];
    var last=n%10, lastTwo=n%100;
    if(last>=2&&last<=4&&!(lastTwo>=12&&lastTwo<=14)) return forms[1];
    return forms[2];
  }

  function fmtMillion(n,decimals){
    var mln=n/1000000;
    var rounded=decimals?Math.round(mln*10)/10:Math.round(mln);
    var text=rounded.toString().replace('.',',');
    return 'około '+text+' mln';
  }

  function fmtWorkersPerSenior(ratio){
    if(ratio<2) return 'mniej niż 2 '+plural(2,['osoba','osoby','osób']);
    var n=Math.round(ratio);
    return 'około '+n+' '+plural(n,['osoba','osoby','osób']);
  }

  function render(){
    if(!DATA) return;
    var rok=parseInt(range.value,10);
    yearEl.textContent=rok;
    var fill=((rok-MIN)/(MAX-MIN))*100;
    range.style.background='linear-gradient(to right,var(--fiolet) '+fill+'%,var(--linia) '+fill+'%)';

    var year80=rok+80;
    var lookupYear=Math.min(DATA_MAX_YEAR,Math.max(DATA_MIN_YEAR,year80));
    var row=DATA.byYear[String(lookupYear)];
    if(!row){ facts.innerHTML=''; return; }

    var pop80plus=row.pop80plus;
    var workersPerSenior=row.pop1564/row.pop65plus;
    var peopleNeedingSupport=row.pop65plus*DATA.careNeedRate65plus;

    var s1='W <strong>'+year80+'</strong> roku skończysz 80 lat.';
    var s2='W Polsce będzie wtedy <strong>'+fmtMillion(pop80plus,false)+'</strong> osób w Twoim wieku lub starszych.';
    var s3='Szacuje się, że <strong>'+fmtMillion(peopleNeedingSupport,true)+'</strong> seniorów może wymagać wsparcia w codziennym funkcjonowaniu.';
    var s4='Na jednego seniora przypadnie <strong>'+fmtWorkersPerSenior(workersPerSenior)+'</strong> w wieku produkcyjnym.';

    facts.innerHTML='<p class="demo__fact">'+s1+' '+s2+' '+s3+' '+s4+'</p>';
  }

  range.addEventListener('input',render);

  fetch(PSOD_ASSETS+'/dane-demografia-pl.json')
    .then(function(r){ return r.json(); })
    .then(function(json){ DATA=json; render(); })
    .catch(function(){ facts.innerHTML=''; });
})();

/* --- 2. Filary: zakładki (tablist) --- */
(function(){
  var FILARY=[
    {key:'wybor',name:'Wybór',icon:PSOD_ASSETS+'/filar-wybor.svg',intro:'Oznacza zapewnienie podopiecznym prawa do dokonania wyboru sposobu, w jaki żyją i otrzymują opiekę. W szczególności:',bullets:[
      'wspieranie podopiecznych w zarządzaniu własnym zdrowiem i samopoczuciem,',
      'zapewnienie podopiecznym i ich opiekunom wiedzy o prawie do uczestniczenia w opiece i dokonywania wyborów w tym zakresie,',
      'zaangażowanie do podejmowania decyzji dotyczących opieki oraz możliwości wyboru i kontroli nad usługami, z których korzystają,',
      'zlecanie usług, które zapewniają podopiecznym informacje i wsparcie w celu określenia i osiągnięcia wyników, które są dla nich ważne,',
      'uwzględnienie świadomych preferencji podopiecznych']},
    {key:'bezpieczenstwo',name:'Bezpieczeństwo',icon:PSOD_ASSETS+'/filar-bezpieczenstwo.svg',intro:'Opieka domowa musi być realizowane w sposób bezpieczny, obejmujący m.in.:',bullets:[
      'ocenę ryzyka poszczególnych czynności opiekuńczych dla zdrowia i bezpieczeństwa podopiecznego oraz podejmowanie wszelkich możliwych działań w celu zmniejszenia takiego ryzyka,',
      'zapewnienie personelu opiekuńczego o odpowiednich kwalifikacjach, kompetencjach i doświadczeniu zapewniających bezpieczeństwo opieki,',
      'zapewnienie bezpieczeństwa i zgodności z przeznaczeniem pomieszczeń i sprzętu używanego do opieki',
      'zaspokojenie potrzeb podopiecznego w obszarze żywieniowym, nawodnienia i właściwe zarządzanie lekami,',
      'ocena ryzyka, zapobiegania, wykrywania i kontroli nad rozprzestrzenianiem się zakażeń,',
      'w przypadku, gdy odpowiedzialność za opiekę domową jest dzielona, zapewnienie współpracy na każdym etapie planowania i realizacji opieki.']},
    {key:'szacunek',name:'Szacunek',icon:PSOD_ASSETS+'/filar-szacunek.svg',intro:'Zarówno osoby korzystające z usług opieki, jak i opiekunowie muszą być chronieni przed nadużyciami i traktowani z godnością oraz szacunkiem. Usługi opieki domowej nie mogą być świadczone w sposób, który:',bullets:[
      'dopuszcza dyskryminację, jest lekceważący lub poniżający,',
      'obejmuje działania ograniczające autonomię i niezależność podopiecznych, które nie są niezbędne lub są nieproporcjonalną reakcją w stosunku do ryzyka powstania szkody dla podopiecznego, personelu lub innych osób',
      'nie respektuje osobistej przestrzeni podopiecznego i opiekuna oraz prywatności i poufności dotyczącej osobistych informacji,',
      'ograniczaja wolność w celu uzyskania opieki lub leczenia – opieka i leczenie muszą być zapewnione za zgodą podopiecznych lub ich prawnych opiekunów.']},
    {key:'ciaglosc',name:'Ciągłość',icon:PSOD_ASSETS+'/filar-ciaglosc.svg',intro:'Opieka domowa wymaga:',bullets:[
      'zapewnienia podopiecznym prawa do zachowania ciągłości opieki, tj. nieprzerwanego świadczenia bez narażania ich na ryzyko przerwy w dostępie do opieki,',
      'zachowania dokładnej, pełnej i aktualnej informacji (poprzez odpowiednią dokumentację) dotyczącej każdego podopiecznego oraz decyzji podjętych w odniesieniu do zapewnionej opieki,',
      'zapewnienia możliwości spersonalizowanego długotrwałego planowania opieki']},
    {key:'indywidualne',name:'Indywidualne podejście',icon:PSOD_ASSETS+'/filar-indywidualne.svg',intro:'Opieka domowa wymaga zatrudnienia odpowiedniej liczby wykwalifikowanego i otwartego na potrzeby podopiecznych personelu, w celu:',bullets:[
      'zapewnienia zakresu opieki dostosowanego do potrzeb i preferencji podopiecznych,',
      'możliwości skupienia się na tym, co jest ważne dla podopiecznych w kontekście jakości ich życia, a nie tylko liście schorzeń lub objawów, które należy leczyć,',
      'dbania o transparentność w relacjach oraz zakresie leczenia i świadczonej opieki,',
      'zapewnienia skuteczności w rejestrowaniu, reagowaniu i rozwiązywaniu problemów zgłaszanych przez pacjentów, ich rodziny i personel.']}
  ];
  var tabs=document.getElementById('pillarTabs');
  var panel=document.getElementById('pillarPanel');
  if(!tabs||!panel) return;
  var curIdx=0;
  function pad(n){return String(n).padStart(2,'0');}
  function esc(s){return s.replace(/&/g,'&amp;').replace(/</g,'&lt;');}
  function tt(f,field,fallback){return (window.psodT?psodT('filary.'+f.key+'.'+field,fallback):fallback);}
  function buildTabs(){
    tabs.innerHTML='';
    FILARY.forEach(function(f,i){
      var b=document.createElement('button');
      b.className='ptab';b.setAttribute('role','tab');b.setAttribute('aria-selected',i===curIdx?'true':'false');
      b.innerHTML='<span class="ptab__ghost" aria-hidden="true">'+pad(i+1)+'</span>'+
        '<span class="ptab__eyebrow"><span class="ln"></span><span class="lbl">Filar '+pad(i+1)+'</span></span>'+
        '<span class="ptab__name">'+esc(tt(f,'name',f.name))+'</span>';
      b.addEventListener('click',function(){select(i);});
      tabs.appendChild(b);
    });
  }
  function select(i){
    curIdx=i;
    var f=FILARY[i];
    [].forEach.call(tabs.children,function(el,k){el.setAttribute('aria-selected',k===i?'true':'false');});
    var intro=tt(f,'intro',f.intro);
    var html='<img src="'+f.icon+'" alt=""><h3>'+esc(tt(f,'name',f.name))+'</h3><p class="intro">'+esc(intro)+'</p><div>';
    f.bullets.forEach(function(b,bi){
      var bt=(window.psodT?psodT('filary.'+f.key+'.bullets.'+bi,b):b);
      html+='<div class="bullet"><span class="dot">•</span><span>'+esc(bt)+'</span></div>';
    });
    html+='</div>';
    panel.innerHTML=html;
    panel.classList.remove('psod-fade');void panel.offsetWidth;panel.classList.add('psod-fade');
  }
  buildTabs();select(0);
  document.addEventListener('psod:langchange',function(){buildTabs();select(curIdx);});
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
  if(!dotsEl||!innerEl||!countEl||!nextEl) return;
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
    var stmt=(window.psodT?psodT('mity.'+cur+'.t',m.t):m.t);
    var html='<p class="myth__statement">„'+stmt+'"'+(revealed?'<span class="myth__strike psod-strike" aria-hidden="true"></span>':'')+'</p>';
    if(!revealed){
      html+='<div class="myth__guess"><div class="ask">Jak myślisz?</div><div class="myth__buttons">'+
        '<button class="btn btn--secondary" data-g="prawda">To prawda</button>'+
        '<button class="btn btn--secondary" data-g="mit">To mit</button></div></div>';
    }else{
      var g=seen[cur];
      var react=(g==='mit')?'Dobra intuicja — to mit.':'To jednak mit.';
      var fact=(window.psodT?psodT('mity.'+cur+'.f',m.f):m.f);
      html+='<div class="myth__reveal psod-fade"><div class="myth__react">'+react+'</div>'+
        '<div class="myth__fact"><div class="myth__factlabel"><span class="check">✓</span>Fakt</div>'+
        '<div class="myth__facttext">'+fact+'</div></div></div>';
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
  document.addEventListener('psod:langchange',function(){render(!!seen[cur]);});
})();
