jQuery(document).ready(function ($) {
  $(".hamburger").on("click", function () {
    $(".hamburger").toggleClass("is-active");
    $(".site-nav-container").toggleClass("open");
    $("body").toggleClass("menu-open");
  });

  const body = document.querySelector("body");

  window.addEventListener("scroll", (e) => {
    if (scrollY > 1) {
      body.classList.add("sticky");
    } else {
      body.classList.remove("sticky");
    }
  });

  if (scrollY > 1) {
    body.classList.add("sticky");
  } else {
    body.classList.remove("sticky");
  }

  // custom accordition

  // pobieramy wszystkie elementy, na które możemy kliknąć
  const clickableElements = document.querySelectorAll(
    '#site-navigation a[href^="/#"]'
  );

  // dodajemy do każdego elementu nasłuchiwanie na kliknięcie
  clickableElements.forEach((element) => {
    element.addEventListener("click", () => {
      // zamykamy menu (tu zakładamy, że menu ma klasę "menu" - zmień to, jeśli trzeba)
      $(".hamburger").removeClass("is-active");
      $(".site-nav-container").toggleClass("open");
      $("body").toggleClass("menu-open");
    });
  });
});
