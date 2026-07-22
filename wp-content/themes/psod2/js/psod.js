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
  // Regiony wyłączane (inert) na czas otwartego, modalnego menu — pułapka fokusu:
  // Tab nie ucieka poza panel, bo reszta strony jest nieinteraktywna.
  var pageRegions=[document.querySelector('.site-header'),document.getElementById('main'),document.querySelector('.site-footer')];
  function setInert(el,on){ if(!el)return; if(on){el.setAttribute('inert','');}else{el.removeAttribute('inert');} }
  // Stan początkowy: menu zamknięte i niefokusowalne (WCAG 4.1.2 — brak fokusowalnej treści aria-hidden).
  nav.setAttribute('inert','');
  function close(){
    nav.classList.remove('is-open');
    btn.classList.remove('is-active');
    btn.setAttribute('aria-expanded','false');
    nav.setAttribute('aria-hidden','true');
    nav.setAttribute('inert','');
    pageRegions.forEach(function(el){ setInert(el,false); });
    document.body.classList.remove('nav-open');
    if(scrim){ scrim.classList.remove('is-open'); scrim.hidden=true; }
    if(document.activeElement===document.body||nav.contains(document.activeElement)){ try{ btn.focus(); }catch(e){} }
    else { try{ btn.focus(); }catch(e){} }
  }
  function open(){
    nav.classList.add('is-open');
    btn.classList.add('is-active');
    btn.setAttribute('aria-expanded','true');
    nav.setAttribute('aria-hidden','false');
    nav.removeAttribute('inert');
    pageRegions.forEach(function(el){ setInert(el,true); });
    document.body.classList.add('nav-open');
    if(scrim){ scrim.hidden=false; requestAnimationFrame(function(){ scrim.classList.add('is-open'); }); }
    if(closeBtn){ requestAnimationFrame(function(){ try{ closeBtn.focus(); }catch(e){} }); }
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
    if(e.key==='Escape'&&nav.classList.contains('is-open')) close();
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
  var FILARY=window.PSOD_FILARY||[];
  var tabs=document.getElementById('pillarTabs');
  var panel=document.getElementById('pillarPanel');
  if(!tabs||!panel) return;
  if(!FILARY.length) return;
  var curIdx=0;
  function pad(n){return String(n).padStart(2,'0');}
  function esc(s){return s.replace(/&/g,'&amp;').replace(/</g,'&lt;');}
  function tt(f,field,fallback){return (window.psodT?psodT('filary.'+f.key+'.'+field,fallback):fallback);}
  function buildTabs(){
    tabs.innerHTML='';
    FILARY.forEach(function(f,i){
      var b=document.createElement('button');
      b.className='ptab';b.setAttribute('role','tab');b.setAttribute('aria-selected',i===curIdx?'true':'false');
      b.innerHTML='<span class="ptab__icon" aria-hidden="true"><img src="'+f.icon+'" alt=""></span>'+
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
    var html='<h3>'+esc(tt(f,'name',f.name))+'</h3><p class="intro">'+esc(intro)+'</p><div>';
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
  var MITY=window.PSOD_MITY||[];
  var total=MITY.length;
  var cur=0;
  var seen={};
  var dotsEl=document.getElementById('mythDots');
  var innerEl=document.getElementById('mythInner');
  var countEl=document.getElementById('mythCount');
  var nextEl=document.getElementById('mythNext');
  if(!dotsEl||!innerEl||!countEl||!nextEl) return;
  if(!MITY.length) return;
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
    var stmtEsc=String(stmt).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
    var html='<p class="myth__statement">„'+stmtEsc+'"'+(revealed?'<span class="myth__strike psod-strike" aria-hidden="true"></span>':'')+'</p>';
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

/* --- 5. Podstrona Aktualności: "Wczytaj więcej" (start 6, +3/klik) --- */
(function(){
  var grid=document.getElementById('aktualGrid');
  var moreBtn=document.getElementById('aktualMoreBtn');
  var moreWrap=document.getElementById('aktualMoreWrap');
  var counter=document.getElementById('aktualCounter');
  if(!grid||!moreBtn||!moreWrap||!counter) return;
  var cards=[].slice.call(grid.querySelectorAll('.aktual-card'));
  var total=cards.length;
  var step=parseInt(grid.getAttribute('data-step'),10)||3;
  var visible=cards.filter(function(c){return !c.hidden;}).length;
  function update(){
    counter.textContent=visible+' z '+total+' wpisów';
    if(visible>=total) moreWrap.style.display='none';
  }
  moreBtn.addEventListener('click',function(){
    var toShow=cards.filter(function(c){return c.hidden;}).slice(0,step);
    toShow.forEach(function(c){c.hidden=false;});
    visible=Math.min(visible+step,total);
    update();
  });
})();

/* --- 6. Artykul (wariant 1B): przycisk „Kopiuj link" --- */
(function(){
  var btns=document.querySelectorAll('.js-copy-link');
  if(!btns.length) return;
  [].forEach.call(btns,function(btn){
    var orig=btn.textContent;
    btn.addEventListener('click',function(){
      var url=btn.getAttribute('data-url')||window.location.href;
      var done=function(){ btn.textContent='Skopiowano'; window.setTimeout(function(){ btn.textContent=orig; },1800); };
      if(navigator.clipboard&&navigator.clipboard.writeText){
        navigator.clipboard.writeText(url).then(done,function(){ done(); });
      }else{
        var ta=document.createElement('textarea');ta.value=url;document.body.appendChild(ta);ta.select();
        try{document.execCommand('copy');}catch(e){}
        document.body.removeChild(ta);done();
      }
    });
  });
})();
