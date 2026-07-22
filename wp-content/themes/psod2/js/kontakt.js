/* Podstrona Kontakt — walidacja formularza (odzwierciedla komunikaty z prototypu)
   + wyslanie przez WordPress AJAX (admin-ajax.php, akcja psod2_kontakt_send).
   Prawdziwa walidacja jest po stronie serwera (functions.php) — to tylko UX. */
(function(){
  var form=document.getElementById('kontaktForm');
  var thanks=document.getElementById('kontaktThanks');
  var errEl=document.getElementById('kontaktError');
  var submitBtn=document.getElementById('kontaktSubmit');
  var resetBtn=document.getElementById('kontaktReset');
  if(!form||!thanks||!errEl||!submitBtn||!resetBtn) return;
  if(typeof PSOD_KONTAKT==='undefined') return;

  function showError(msg){
    errEl.textContent=msg;
    errEl.hidden=false;
  }
  function clearError(){
    errEl.hidden=true;
    errEl.textContent='';
  }
  [].forEach.call(form.querySelectorAll('input,textarea'),function(el){
    el.addEventListener('input',function(){ el.removeAttribute('aria-invalid'); clearError(); });
    el.addEventListener('change',function(){ el.removeAttribute('aria-invalid'); clearError(); });
  });

  form.addEventListener('submit',function(e){
    e.preventDefault();
    var nameEl=form.querySelector('#kf-name'),emailEl=form.querySelector('#kf-email'),msgEl=form.querySelector('#kf-message'),consentEl=form.querySelector('#kf-consent');
    [nameEl,emailEl,msgEl,consentEl].forEach(function(el){ el&&el.removeAttribute('aria-invalid'); });
    var name=nameEl.value.trim();
    var email=emailEl.value.trim();
    var message=msgEl.value.trim();
    var consent=consentEl.checked;

    if(!name||!email||!message){
      [nameEl,emailEl,msgEl].forEach(function(el){ if(!el.value.trim()) el.setAttribute('aria-invalid','true'); });
      showError('Uzupełnij imię, adres e-mail i treść wiadomości.');
      (!name?nameEl:(!email?emailEl:msgEl)).focus();
      return;
    }
    if(!consent){
      consentEl.setAttribute('aria-invalid','true');
      showError('Zaznacz zgodę na przetwarzanie danych osobowych.');
      consentEl.focus();
      return;
    }

    clearError();
    submitBtn.disabled=true;

    var fd=new FormData();
    fd.append('action','psod2_kontakt_send');
    fd.append('nonce',PSOD_KONTAKT.nonce);
    fd.append('name',name);
    fd.append('email',email);
    fd.append('phone',form.phone.value.trim());
    fd.append('message',message);
    fd.append('consent',consent?'1':'0');
    fd.append('website',form.querySelector('#kf-website').value); // honeypot

    fetch(PSOD_KONTAKT.ajaxUrl,{method:'POST',credentials:'same-origin',body:fd})
      .then(function(r){return r.json();})
      .then(function(res){
        submitBtn.disabled=false;
        if(res&&res.success){
          form.hidden=true;
          thanks.hidden=false;
          thanks.scrollIntoView({behavior:'smooth',block:'start'});
        }else{
          showError((res&&res.data&&res.data.message)||'Nie udało się wysłać wiadomości. Spróbuj ponownie później.');
        }
      })
      .catch(function(){
        submitBtn.disabled=false;
        showError('Nie udało się wysłać wiadomości — sprawdź połączenie i spróbuj ponownie.');
      });
  });

  resetBtn.addEventListener('click',function(){
    form.reset();
    clearError();
    thanks.hidden=true;
    form.hidden=false;
    form.scrollIntoView({behavior:'smooth',block:'start'});
  });
})();
