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
    el.addEventListener('input',clearError);
  });

  form.addEventListener('submit',function(e){
    e.preventDefault();
    var name=form.name.value.trim();
    var email=form.email.value.trim();
    var message=form.message.value.trim();
    var consent=form.querySelector('#kf-consent').checked;

    if(!name||!email||!message){
      showError('Uzupełnij imię, adres e-mail i treść wiadomości.');
      return;
    }
    if(!consent){
      showError('Zaznacz zgodę na przetwarzanie danych osobowych.');
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
