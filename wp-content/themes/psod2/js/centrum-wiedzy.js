/* PSOD 2026 — Centrum wiedzy (przeszukiwalne FAQ).
   Dane: assets/dane-centrum-wiedzy.json (47 pytan / 8 kategorii). Trzy widoki
   (strona glowna kategorii / widok kategorii / wyniki wyszukiwania) sterowane
   stanem {query, activeCat, openIds}, renderowane w calosci do #kbMain przy
   kazdej zmianie stanu (prosty wzorzec re-render, spojny z reszta motywu —
   patrz sekcje Filary/Mity w psod.js). */
(function(){
  var main=document.getElementById('kbMain');
  if(!main) return;

  var searchInput=document.getElementById('kbSearchInput');
  var searchClear=document.getElementById('kbSearchClear');
  var popular=document.getElementById('kbPopular');
  var region=document.getElementById('kbRegion');
  var goDane=document.getElementById('kbGoDane');

  var DATA=null;
  var state={ query:'', activeCat:null, openIds:[] };
  var pendingScrollId=null;
  var scrollToRegion=false;

  var ICONS={
    pojecia:'<path d="M4 5.5A1.5 1.5 0 0 1 5.5 4H11v15.5H5.5A1.5 1.5 0 0 1 4 18z"></path><path d="M20 5.5A1.5 1.5 0 0 0 18.5 4H13v15.5h5.5A1.5 1.5 0 0 0 20 18z"></path>',
    rodzina:'<circle cx="8.5" cy="8" r="3"></circle><circle cx="16.5" cy="9.5" r="2.3"></circle><path d="M3.5 19c0-2.8 2.2-5 5-5s5 2.2 5 5"></path><path d="M14.5 19c0-2 .7-3.5 2-4.3 1.6.1 4 1.3 4 4.3"></path>',
    jakosc:'<path d="M12 3l7 3v5.5c0 4.3-2.9 7.4-7 8.5-4.1-1.1-7-4.2-7-8.5V6z"></path><path d="M9 12l2 2 4-4"></path>',
    system:'<path d="M4 20h16"></path><path d="M5 20V9l7-4 7 4v11"></path><path d="M9 20v-6h6v6"></path>',
    pracownicy:'<circle cx="12" cy="7.5" r="3.2"></circle><path d="M5.5 20c0-3.6 2.9-6.5 6.5-6.5s6.5 2.9 6.5 6.5"></path><path d="M12 13.5v3"></path>',
    otepienie:'<path d="M9 18v-1.8c-2-1-3.3-3-3.3-5.4A5.7 5.7 0 0 1 15.5 6.4a4.3 4.3 0 0 1 1.8 8v.6a2 2 0 0 1-2 2z"></path><path d="M9 21h6"></path>',
    finansowanie:'<ellipse cx="12" cy="6.5" rx="7" ry="2.8"></ellipse><path d="M5 6.5v5c0 1.5 3.1 2.8 7 2.8s7-1.3 7-2.8v-5"></path><path d="M5 11.5v5c0 1.5 3.1 2.8 7 2.8s7-1.3 7-2.8v-5"></path>',
    dane:'<path d="M4 20V4"></path><path d="M4 20h16"></path><rect x="7" y="12" width="3" height="5"></rect><rect x="12.5" y="8" width="3" height="9"></rect><rect x="18" y="5" width="3" height="12"></rect>'
  };

  function esc(s){
    return String(s==null?'':s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
  }

  function byId(id){ return DATA.byId[id]; }
  function catName(cid){ var c=DATA.catById[cid]; return c?c.name:''; }
  function catCount(cid){ return DATA.questions.filter(function(q){return q.c===cid;}).length; }

  function tokensOf(q){
    return q.toLowerCase().split(/[^0-9a-ząćęłńóśźż]+/i).filter(function(t){ return t.length>=3; });
  }

  function highlightHTML(text, tokens){
    if(!tokens.length) return esc(text);
    var pattern=tokens.slice().sort(function(a,b){return b.length-a.length;})
      .map(function(t){ return t.replace(/[.*+?^${}()|[\]\\]/g,'\\$&'); });
    var re=new RegExp('('+pattern.join('|')+')','ig');
    var out='', last=0, m;
    while((m=re.exec(text))){
      if(m.index>last) out+=esc(text.slice(last,m.index));
      out+='<mark>'+esc(m[0])+'</mark>';
      last=m.index+m[0].length;
      if(re.lastIndex===m.index) re.lastIndex++;
    }
    if(last<text.length) out+=esc(text.slice(last));
    return out;
  }

  function scrollToEl(el, offset){
    if(!el) return;
    var y=window.pageYOffset+el.getBoundingClientRect().top-offset;
    var target=Math.max(0,y);
    window.scrollTo({top:target, behavior:'smooth'});
    window.setTimeout(function(){
      if(Math.abs(window.pageYOffset-target)>4){
        var prev=document.documentElement.style.scrollBehavior;
        document.documentElement.style.scrollBehavior='auto';
        window.scrollTo(0,target);
        document.documentElement.style.scrollBehavior=prev;
      }
    },400);
  }

  /* ---------- akcje ---------- */
  function setQuery(v){ state.query=v; state.activeCat=null; render(); }
  function clearSearch(){ state.query=''; if(searchInput) searchInput.value=''; render(); }
  function openCategory(id){ scrollToRegion=true; state.activeCat=id; state.query=''; if(searchInput) searchInput.value=''; render(); }
  function backToAll(){ state.activeCat=null; state.query=''; if(searchInput) searchInput.value=''; render(); }
  function toggleQuestion(id){
    var i=state.openIds.indexOf(id);
    if(i===-1) state.openIds.push(id); else state.openIds.splice(i,1);
    render();
  }
  function openQuestion(id){
    var q=byId(id);
    if(!q) return;
    if(state.openIds.indexOf(id)===-1) state.openIds.push(id);
    state.activeCat=q.c;
    state.query='';
    if(searchInput) searchInput.value='';
    pendingScrollId=id;
    render();
  }

  /* ---------- render: strona glowna ---------- */
  function renderHome(){
    var cards=DATA.categories.map(function(c){
      return '<button type="button" class="kb-cat-card" data-cat="'+esc(c.id)+'">'+
        '<span class="kb-cat-card__icon" aria-hidden="true"><svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">'+ICONS[c.id]+'</svg></span>'+
        '<span class="kb-cat-card__title">'+esc(c.name)+'</span>'+
        '<span class="kb-cat-card__desc">'+esc(c.desc)+'</span>'+
        '<span class="kb-cat-card__foot"><span>'+catCount(c.id)+' pytań</span><span>Zobacz →</span></span>'+
      '</button>';
    }).join('');

    var mostRead=DATA.mostReadIds.map(function(id){
      var q=byId(id); if(!q) return '';
      return '<button type="button" class="kb-mostread__card" data-qid="'+esc(id)+'">'+
        '<span class="kb-mostread__cat">'+esc(catName(q.c))+'</span>'+
        '<span class="kb-mostread__q">'+esc(q.q)+'</span>'+
      '</button>';
    }).join('');

    return (
      '<section class="kb-section">'+
        '<div class="kb-section__head"><div class="overline">Przeglądaj tematy</div><h2>Wybierz obszar, który Cię interesuje</h2></div>'+
        '<div class="kb-cats__grid">'+cards+'</div>'+
      '</section>'+
      '<section class="kb-mostread"><div class="wrap">'+
        '<div class="kb-section__head" style="margin-bottom:0"><div class="overline">Najczęściej czytane</div><h2>Od tych pytań zwykle się zaczyna</h2></div>'+
        '<div class="kb-mostread__grid">'+mostRead+'</div>'+
      '</div></section>'
    );
  }

  /* ---------- render: widok kategorii ---------- */
  function renderCategory(){
    var cat=DATA.catById[state.activeCat] || DATA.categories[0];
    var questions=DATA.questions.filter(function(q){ return q.c===cat.id; });

    var menu=DATA.categories.map(function(c){
      var active=c.id===cat.id;
      return '<button type="button" class="kb-catmenu__item" data-cat="'+esc(c.id)+'" aria-current="'+(active?'true':'false')+'">'+
        '<span class="lbl-full">'+esc(c.name)+'</span><span class="lbl-short">'+esc(c.short)+'</span>'+
        '<span class="cnt">'+catCount(c.id)+'</span>'+
      '</button>';
    }).join('');

    var qHtml=questions.map(function(q){
      var isOpen=state.openIds.indexOf(q.id)!==-1;
      var detail='';
      if(isOpen){
        var position='';
        if(q.position){
          position='<div class="kb-position">'+
            '<div class="kb-position__label">Stanowisko Polskiego Stowarzyszenia Opieki Domowej</div>'+
            '<p class="kb-position__text">'+esc(q.position)+'</p>'+
            '<a class="kb-position__link" href="#agenda">Zobacz Agendę PSOD <span aria-hidden="true">→</span></a>'+
          '</div>';
        }
        var sources=(q.sources||[]).map(function(s){
          return '<li class="kb-sources__item"><span class="dot" aria-hidden="true">◆</span>'+
            '<span class="inst">'+esc(s.inst)+'</span>'+
            '<span class="yr">· '+esc(s.year)+'</span>'+
            '<a href="'+esc(s.url)+'" target="_blank" rel="noopener">źródło →</a></li>';
        }).join('');
        var related=(q.related||[]).map(function(rid){
          var rq=byId(rid); if(!rq) return '';
          return '<a href="#" data-qid="'+esc(rid)+'"><span class="arw" aria-hidden="true">→</span>'+esc(rq.q)+'</a>';
        }).join('');
        detail='<div class="kb-q__detail">'+
          '<div class="kb-q__eyebrow">Rozwinięcie</div>'+
          '<p class="kb-q__long">'+esc(q.long)+'</p>'+
          position+
          '<div class="kb-sources"><div class="kb-q__eyebrow">Źródła i metodologia</div>'+
            '<ul class="kb-sources__list">'+sources+'</ul>'+
            '<p class="kb-sources__updated">Ostatnia aktualizacja: '+esc(q.updated)+'</p>'+
          '</div>'+
          (related?('<div class="kb-relq"><div class="kb-q__eyebrow">Powiązane pytania</div><div class="kb-relq__list">'+related+'</div></div>'):'')+
        '</div>';
      }
      return '<article class="kb-q" data-qid="'+esc(q.id)+'">'+
        '<h2 class="kb-q__q">'+esc(q.q)+'</h2>'+
        '<p class="kb-q__short">'+esc(q.short)+'</p>'+
        '<button type="button" class="kb-q__toggle" data-qid="'+esc(q.id)+'" aria-expanded="'+(isOpen?'true':'false')+'">'+
          '<span class="sign" aria-hidden="true">'+(isOpen?'–':'+')+'</span><span>'+(isOpen?'Zwiń odpowiedź':'Czytaj więcej')+'</span>'+
        '</button>'+
        detail+
      '</article>';
    }).join('');

    // panel "Powiazane tematy": unikalne related spoza biezacej kategorii
    var seen={}; var panelIds=[];
    questions.forEach(function(q){
      (q.related||[]).forEach(function(rid){
        var t=byId(rid);
        if(t && t.c!==cat.id && !seen[rid]){ seen[rid]=1; panelIds.push(rid); }
      });
    });
    panelIds=panelIds.slice(0,5);
    if(panelIds.length<4){
      DATA.mostReadIds.forEach(function(id){
        var t=byId(id);
        if(t && t.c!==cat.id && !seen[id] && panelIds.length<5){ seen[id]=1; panelIds.push(id); }
      });
    }
    var panelLinks=panelIds.map(function(id){
      var q=byId(id);
      return '<a href="#" data-qid="'+esc(id)+'">'+esc(q.q)+'</a>';
    }).join('');

    return (
      '<section class="wrap wrap--wide" style="padding-top:44px;padding-bottom:80px">'+
        '<div class="kb-crumb"><button type="button" data-back>Centrum wiedzy</button><span class="sep" aria-hidden="true">/</span><span class="cur">'+esc(cat.name)+'</span></div>'+
        '<div class="kb-catlayout">'+
          '<aside class="kb-catmenu" aria-label="Kategorie">'+menu+'</aside>'+
          '<div class="kb-catcontent">'+
            '<h1>'+esc(cat.name)+'</h1>'+
            '<p class="kb-catcontent__desc">'+esc(cat.desc)+'</p>'+
            '<p class="kb-catcontent__count">'+questions.length+' pytań w tej kategorii</p>'+
            '<div>'+qHtml+'<div style="border-top:1px solid var(--linia)"></div></div>'+
          '</div>'+
          '<aside class="kb-panel" aria-label="Powiązane tematy">'+
            '<div class="kb-panel-card"><div class="kb-q__eyebrow">Powiązane tematy</div><div class="kb-panel-card__list">'+panelLinks+'</div></div>'+
            '<div class="kb-panel-card kb-panel-card--care"><div class="kb-title">Nie znalazłeś odpowiedzi?</div>'+
              '<p>Napisz do nas lub zaproponuj pytanie do Centrum wiedzy.</p>'+
              '<a class="cta" href="mailto:kontakt@polskaopieka.eu">Skontaktuj się <span aria-hidden="true">→</span></a>'+
            '</div>'+
          '</aside>'+
        '</div>'+
      '</section>'
    );
  }

  /* ---------- render: wyniki wyszukiwania ---------- */
  function renderSearch(tokens){
    var results=DATA.questions.filter(function(q){
      var hay=(q.q+' '+q.short+' '+q.long).toLowerCase();
      return tokens.every(function(t){ return hay.indexOf(t)!==-1; });
    });
    var n=results.length;
    var plural = n===1?'wynik':((n%10>=2&&n%10<=4)&&!(n%100>=12&&n%100<=14)?'wyniki':'wyników');
    var summary = n>0 ? ('Znaleziono '+n+' '+plural+' dla „'+state.query.trim()+'"') : ('Brak wyników dla „'+state.query.trim()+'"');

    var body;
    if(n>0){
      var items=results.map(function(q){
        return '<a class="kb-result" href="#" data-qid="'+esc(q.id)+'">'+
          '<span class="kb-result__cat">'+esc(catName(q.c))+'</span>'+
          '<span class="kb-result__q">'+highlightHTML(q.q,tokens)+'</span>'+
          '<span class="kb-result__short">'+esc(q.short)+'</span>'+
        '</a>';
      }).join('');
      body='<div>'+items+'<div style="border-top:1px solid var(--linia)"></div></div>';
    } else {
      body='<div class="kb-noresults">'+
        '<p>Brak dopasowanych pytań</p>'+
        '<p>Spróbuj innego sformułowania lub przejrzyj kategorie. Możesz też zaproponować pytanie do Centrum wiedzy.</p>'+
        '<button type="button" class="btn btn--primary" data-clear>Przeglądaj kategorie</button>'+
      '</div>';
    }

    return '<section class="kb-searchview">'+
      '<div class="kb-searchview__head"><h1>Wyniki wyszukiwania</h1><button type="button" data-clear>Wyczyść wyszukiwanie</button></div>'+
      '<p class="kb-searchview__summary">'+esc(summary)+'</p>'+
      body+
    '</section>';
  }

  /* ---------- render glowny ---------- */
  function render(){
    if(!DATA) return;
    var q=(state.query||'').trim();
    var tokens=tokensOf(q);
    var searching=tokens.length>0;

    if(searchClear) searchClear.hidden=!searching;

    var html;
    if(searching){ html=renderSearch(tokens); }
    else if(state.activeCat){ html=renderCategory(); }
    else { html=renderHome(); }

    main.innerHTML=html;

    if(scrollToRegion){ scrollToRegion=false; scrollToEl(region,70); }
    if(pendingScrollId){
      var id=pendingScrollId; pendingScrollId=null;
      window.requestAnimationFrame(function(){
        var el=main.querySelector('[data-qid="'+id+'"].kb-q');
        scrollToEl(el,90);
      });
    }
  }

  /* ---------- delegacja zdarzen w #kbMain ---------- */
  main.addEventListener('click', function(e){
    var t;
    if((t=e.target.closest('.kb-cat-card[data-cat]'))){ openCategory(t.getAttribute('data-cat')); return; }
    if((t=e.target.closest('.kb-mostread__card[data-qid]'))){ openQuestion(t.getAttribute('data-qid')); return; }
    if((t=e.target.closest('.kb-q__toggle[data-qid]'))){ toggleQuestion(t.getAttribute('data-qid')); return; }
    if((t=e.target.closest('.kb-relq__list a[data-qid]'))){ e.preventDefault(); openQuestion(t.getAttribute('data-qid')); return; }
    if((t=e.target.closest('.kb-panel-card__list a[data-qid]'))){ e.preventDefault(); openQuestion(t.getAttribute('data-qid')); return; }
    if((t=e.target.closest('.kb-catmenu__item[data-cat]'))){ openCategory(t.getAttribute('data-cat')); return; }
    if((t=e.target.closest('.kb-crumb button[data-back]'))){ backToAll(); return; }
    if((t=e.target.closest('.kb-result[data-qid]'))){ e.preventDefault(); openQuestion(t.getAttribute('data-qid')); return; }
    if((t=e.target.closest('button[data-clear]'))){ clearSearch(); return; }
  });

  /* ---------- pole wyszukiwania / chipy / "Przejdz do zrodel" ---------- */
  if(searchInput){
    searchInput.addEventListener('input', function(){ state.query=searchInput.value; state.activeCat=null; render(); });
  }
  if(searchClear){
    searchClear.addEventListener('click', clearSearch);
  }
  if(popular){
    popular.addEventListener('click', function(e){
      var t=e.target.closest('.kb-chip[data-q]');
      if(!t) return;
      setQuery(t.getAttribute('data-q'));
      if(searchInput) searchInput.value=t.getAttribute('data-q');
    });
  }
  if(goDane){
    goDane.addEventListener('click', function(e){ e.preventDefault(); openCategory('dane'); });
  }

  /* ---------- start ---------- */
  var dataUrl=main.getAttribute('data-data-url');
  fetch(dataUrl).then(function(r){ return r.json(); }).then(function(json){
    DATA=json;
    DATA.byId={}; DATA.catById={};
    DATA.questions.forEach(function(q){ DATA.byId[q.id]=q; });
    DATA.categories.forEach(function(c){ DATA.catById[c.id]=c; });
    render();
  }).catch(function(){
    main.innerHTML='<p class="wrap" style="padding:60px 32px;color:var(--tekst-2)">Nie udało się wczytać Centrum wiedzy. Spróbuj odświeżyć stronę.</p>';
  });
})();
