/* PSOD 2026 — silnik i18n (PL/DE/EN).
   Zasada: PL to zawsze prawda źródłowa, zbierana z DOM (data-i18n) lub przekazywana
   jako fallback przy wywołaniu psodT(klucz, tekstPL) z poziomu psod.js (dla treści
   budowanych w JS — Filary, Prawda czy mit?). DE/EN to słowniki nadpisujące — na razie
   puste (patrz PSOD_I18N na dole pliku), więc dopóki tłumacz ich nie uzupełni, wybranie
   DE/EN pokazuje polski tekst + baner „w przygotowaniu”. Wybór języka zapamiętywany
   w localStorage. */
(function(){
  var LANG_KEY='psod_lang';
  var LANGS=['pl','de','en'];
  var originals={};
  var current='pl';

  function dig(dict,key){
    if(!dict) return undefined;
    var parts=key.split('.'),cur=dict;
    for(var i=0;i<parts.length;i++){
      if(cur==null) return undefined;
      cur=cur[parts[i]];
    }
    return cur;
  }

  /* Tłumaczenie treści budowanej w JS: fallbackPl = aktualny tekst polski (źródło prawdy). */
  function t(key,fallbackPl){
    if(fallbackPl!=null) originals[key]=fallbackPl;
    if(current==='pl') return fallbackPl!=null?fallbackPl:originals[key];
    var val=dig(PSOD_I18N[current],key);
    return val!=null?val:(fallbackPl!=null?fallbackPl:originals[key]);
  }

  /* Tłumaczenie statycznej treści z DOM. [data-i18n] = zwykły tekst (textContent).
     [data-i18n-html] = zawiera zagnieżdżone znaczniki (np. <em>, <b>, .zakr) —
     tłumaczone jako innerHTML, więc słownik DE/EN musi wtedy podać ten sam znacznik. */
  function applyDom(){
    [].forEach.call(document.querySelectorAll('[data-i18n]'),function(el){
      var key=el.getAttribute('data-i18n');
      if(!(key in originals)) originals[key]=el.textContent;
      el.textContent=t(key,originals[key]);
    });
    [].forEach.call(document.querySelectorAll('[data-i18n-html]'),function(el){
      var key=el.getAttribute('data-i18n-html');
      if(!(key in originals)) originals[key]=el.innerHTML;
      el.innerHTML=t(key,originals[key]);
    });
  }

  /* Słownik gotowy = PL (zawsze) lub język z niepustym słownikiem tłumaczeń. */
  function dictReady(lang){
    if(lang==='pl') return true;
    var d=PSOD_I18N[lang];
    return !!(d&&Object.keys(d).length);
  }

  function updateChrome(){
    [].forEach.call(document.querySelectorAll('.lang-switch__btn'),function(btn){
      btn.setAttribute('aria-current',btn.getAttribute('data-lang')===current?'true':'false');
    });
    var banner=document.getElementById('i18nBanner');
    if(banner) banner.hidden=(current==='pl');
    // Nie zmieniamy <html lang> na język bez tłumaczeń — wyświetlana treść jest wtedy
    // wciąż polska, a błędny atrybut lang każe czytnikom ekranu czytać ją z obcą fonetyką.
    document.documentElement.setAttribute('lang',dictReady(current)?current:'pl');
  }

  function setLang(lang){
    if(LANGS.indexOf(lang)===-1) lang='pl';
    current=lang;
    try{ localStorage.setItem(LANG_KEY,lang); }catch(e){}
    applyDom();
    updateChrome();
    document.dispatchEvent(new CustomEvent('psod:langchange',{detail:{lang:lang}}));
  }

  document.addEventListener('DOMContentLoaded',function(){
    [].forEach.call(document.querySelectorAll('[data-i18n]'),function(el){
      originals[el.getAttribute('data-i18n')]=el.textContent;
    });
    [].forEach.call(document.querySelectorAll('[data-i18n-html]'),function(el){
      originals[el.getAttribute('data-i18n-html')]=el.innerHTML;
    });
    [].forEach.call(document.querySelectorAll('.lang-switch__btn'),function(btn){
      btn.addEventListener('click',function(){ setLang(btn.getAttribute('data-lang')); });
    });
    var saved=null;
    try{ saved=localStorage.getItem(LANG_KEY); }catch(e){}
    setLang(LANGS.indexOf(saved)!==-1?saved:'pl');
  });

  window.psodT=t;
  window.psodSetLang=setLang;
})();

/* Słowniki DE/EN — puste (treść w przygotowaniu). Tłumacz uzupełnia klucz:wartość,
   struktura kluczy zagnieżdżona zgodnie z data-i18n w HTML i kluczami przekazywanymi
   do psodT() w psod.js (np. "filary.wybor.intro", "mity.0.t"). */
var PSOD_I18N={
  de:{},
  en:{}
};
