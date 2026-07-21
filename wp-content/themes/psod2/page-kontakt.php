<?php
/**
 * Podstrona „Kontakt" — slug: kontakt.
 *
 * Odtworzenie prototypu design_handoff_kontakt/ (treść PL 1:1, klauzula RODO
 * verbatim). Formularz wysyła realną wiadomość e-mail przez WordPress AJAX
 * (wp_mail) — na stagingu nie ma żadnej wtyczki formularzy/SMTP, więc obsługa
 * jest natywna (patrz functions.php: psod2_kontakt_send + enqueue w
 * psod2_assets warunkowane is_page_template). Walidacja też po stronie
 * serwera — JS w js/kontakt.js tylko odzwierciedla komunikaty z prototypu.
 *
 * @package PSOD2
 */

get_header();

$assets = get_template_directory_uri() . '/assets';
?>

<!-- ======================= HERO ======================= -->
<section class="kontakt-hero">
	<div class="wrap">
		<div class="overline" data-i18n="kontakt.overline">Kontakt</div>
		<h1 data-i18n-html="kontakt.h1">Porozmawiajmy. Jesteśmy po to, żeby <em>słuchać</em>.</h1>
		<p data-i18n="kontakt.lead">Masz pytanie o opiekę domową, chcesz dołączyć do Stowarzyszenia albo piszesz w imieniu redakcji? Napisz do nas — odpowiemy najszybciej, jak potrafimy.</p>
	</div>
</section>

<!-- ======================= FORMULARZ + PANEL BOCZNY ======================= -->
<section class="kontakt-main">
	<div class="wrap">
		<div class="kontakt-grid">

			<div class="kontakt-form-col">
				<form id="kontaktForm" class="kontakt-form" novalidate>
					<h2 data-i18n="kontakt.form.h2">Napisz do nas</h2>

					<div class="kontakt-form__row">
						<div class="kontakt-field">
							<label for="kf-name" data-i18n="kontakt.form.name">Imię i nazwisko *</label>
							<input type="text" id="kf-name" name="name" placeholder="Jak się do Ciebie zwracać?" autocomplete="name">
						</div>
						<div class="kontakt-field">
							<label for="kf-phone" data-i18n="kontakt.form.phone">Telefon</label>
							<input type="tel" id="kf-phone" name="phone" placeholder="Opcjonalnie" autocomplete="tel">
						</div>
					</div>

					<div class="kontakt-field">
						<label for="kf-email" data-i18n="kontakt.form.email">Adres e-mail *</label>
						<input type="email" id="kf-email" name="email" placeholder="Na ten adres odpiszemy" autocomplete="email">
					</div>

					<div class="kontakt-field">
						<label for="kf-message" data-i18n="kontakt.form.message">Treść wiadomości *</label>
						<textarea id="kf-message" name="message" rows="6" placeholder="W czym możemy pomóc?"></textarea>
					</div>

					<label class="kontakt-consent">
						<input type="checkbox" id="kf-consent" name="consent">
						<span data-i18n="kontakt.form.consent">Wyrażam zgodę na przetwarzanie moich danych osobowych w celu udzielenia odpowiedzi na przesłaną wiadomość. *</span>
					</label>

					<!-- honeypot — pole niewidoczne dla ludzi, przynęta na boty -->
					<div class="kontakt-hp" aria-hidden="true">
						<label for="kf-website">Strona internetowa</label>
						<input type="text" id="kf-website" name="website" tabindex="-1" autocomplete="off">
					</div>

					<p class="kontakt-error" id="kontaktError" hidden></p>

					<button type="submit" class="btn btn--primary" id="kontaktSubmit" data-i18n="kontakt.form.submit">Wyślij wiadomość</button>

					<p class="kontakt-rodo" data-i18n="kontakt.form.rodo">Administratorem Twoich danych osobowych jest Polskie Stowarzyszenie Opieki Domowej z siedzibą przy ul. Nowy Świat 54/56 w Warszawie. Dane osobowe przetwarzane będą wyłącznie w celu udzielenia odpowiedzi na Twoją wiadomość. Podanie danych jest dobrowolne, a zgodę możesz wycofać w każdym czasie, pisząc na adres kontakt@polskaopieka.eu. Pełną informację o przetwarzaniu danych osobowych znajdziesz w naszej Polityce Prywatności.</p>
				</form>

				<div class="kontakt-thanks" id="kontaktThanks" hidden>
					<div class="kontakt-thanks__over" data-i18n="kontakt.thanks.over">Dziękujemy</div>
					<h2 data-i18n="kontakt.thanks.h2">Wiadomość została wysłana.</h2>
					<p data-i18n="kontakt.thanks.p">Odezwiemy się do Ciebie najszybciej, jak potrafimy — zwykle w ciągu kilku dni roboczych. Dziękujemy, że jesteś z nami.</p>
					<button type="button" class="arrow-link" id="kontaktReset"><span data-i18n="kontakt.thanks.reset">Napisz kolejną wiadomość</span> <span class="arw" aria-hidden="true">→</span></button>
				</div>
			</div>

			<aside class="kontakt-side">
				<div class="kontakt-side__block">
					<div class="kontakt-side__label" data-i18n="kontakt.side.where">Gdzie nas znajdziesz</div>
					<p>Nowy Świat 54/56<br>00-363 Warszawa</p>
				</div>
				<div class="kontakt-side__block">
					<div class="kontakt-side__label" data-i18n="kontakt.side.write">Napisz wprost</div>
					<p><a href="mailto:kontakt@polskaopieka.eu">kontakt@polskaopieka.eu</a></p>
				</div>
				<div class="kontakt-side__sep" aria-hidden="true"></div>
				<p class="kontakt-side__note" data-i18n="kontakt.side.note">Odpowiadamy najszybciej, jak potrafimy — zwykle w ciągu kilku dni roboczych.</p>
			</aside>

		</div>
	</div>
</section>

<!-- ======================= DLA MEDIÓW ======================= -->
<section class="kontakt-press">
	<div class="wrap">
		<div class="kontakt-press__intro">
			<div class="overline" data-i18n="kontakt.press.overline">Dla mediów</div>
			<h2 data-i18n="kontakt.press.h2">Piszesz w imieniu redakcji?</h2>
			<p data-i18n="kontakt.press.p">Chętnie udzielimy komentarza, przekażemy dane o sektorze opieki domowej albo umówimy rozmowę z ekspertem. W sprawach prasowych skontaktuj się bezpośrednio:</p>
		</div>
		<div class="kontakt-press__card">
			<h3>Joanna Robaszkiewicz</h3>
			<p class="kontakt-press__role" data-i18n="kontakt.press.role">Kontakt z mediami</p>
			<a href="tel:+48795586620">+48 795 586 620</a>
			<a href="mailto:kontakt@polskaopieka.eu">kontakt@polskaopieka.eu</a>
		</div>
	</div>
</section>

<!-- ======================= DANE REJESTROWE ======================= -->
<section class="kontakt-reg">
	<div class="wrap kontakt-reg__box">
		<div>
			<div class="kontakt-side__label" data-i18n="kontakt.reg.overline">Dane rejestrowe</div>
			<p class="kontakt-reg__name">Polskie Stowarzyszenie Opieki Domowej</p>
			<p class="kontakt-reg__addr">Nowy Świat 54/56, 00-363 Warszawa · www.polskaopieka.eu</p>
		</div>
		<div class="kontakt-reg__ids">KRS 0000992066<br>NIP 5252926975<br>REGON 523338263</div>
	</div>
</section>

<?php
get_footer();
