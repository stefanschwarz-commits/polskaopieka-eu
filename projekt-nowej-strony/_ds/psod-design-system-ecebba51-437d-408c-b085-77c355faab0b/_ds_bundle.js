/* @ds-bundle: {"format":4,"namespace":"PSODDesignSystem_ecebba","components":[{"name":"FaqItem","sourcePath":"components/cards/FaqItem.jsx"},{"name":"FilarCard","sourcePath":"components/cards/FilarCard.jsx"},{"name":"MythTile","sourcePath":"components/cards/MythTile.jsx"},{"name":"NewsCard","sourcePath":"components/cards/NewsCard.jsx"},{"name":"Placeholder","sourcePath":"components/cards/Placeholder.jsx"},{"name":"ArrowLink","sourcePath":"components/core/ArrowLink.jsx"},{"name":"Button","sourcePath":"components/core/Button.jsx"},{"name":"Highlight","sourcePath":"components/core/Highlight.jsx"},{"name":"Overline","sourcePath":"components/core/Overline.jsx"},{"name":"Stamp","sourcePath":"components/core/Stamp.jsx"},{"name":"Tag","sourcePath":"components/core/Tag.jsx"},{"name":"NewsletterForm","sourcePath":"components/forms/NewsletterForm.jsx"}],"sourceHashes":{"components/cards/FaqItem.jsx":"8ecf98ce7140","components/cards/FilarCard.jsx":"a3edbbff2efa","components/cards/MythTile.jsx":"44736241ca72","components/cards/NewsCard.jsx":"77feaf1da1c2","components/cards/Placeholder.jsx":"9cbcfce93fe6","components/core/ArrowLink.jsx":"da61a7112769","components/core/Button.jsx":"6fc9e5bba1ca","components/core/Highlight.jsx":"e53b9fe0150f","components/core/Overline.jsx":"14372b8fc9fc","components/core/Stamp.jsx":"d62db31ea3ea","components/core/Tag.jsx":"513c340e6dd6","components/forms/NewsletterForm.jsx":"1cc91379e41e","design_handoff_psod_website/ui_kit/home-a.jsx":"7baeae6c364f","design_handoff_psod_website/ui_kit/home-b.jsx":"29cb0dd2aa0f","design_handoff_psod_website/ui_kit/site-chrome.jsx":"a87efe8565ff","ui_kits/website/home-a.jsx":"7baeae6c364f","ui_kits/website/home-b.jsx":"23b6ba9e0fe6","ui_kits/website/site-chrome.jsx":"a87efe8565ff"},"inlinedExternals":[],"unexposedExports":[]} */

(() => {

const __ds_ns = (window.PSODDesignSystem_ecebba = window.PSODDesignSystem_ecebba || {});

const __ds_scope = {};

(__ds_ns.__errors = __ds_ns.__errors || []);

// components/cards/FaqItem.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * FaqItem — pozycja akordeonu (natywne details/summary). Plus/minus w fiolecie.
 * Pierwszy element zwykle otwarty (defaultOpen).
 */
function FaqItem({
  question,
  children,
  defaultOpen = false,
  ...rest
}) {
  return /*#__PURE__*/React.createElement("details", _extends({
    open: defaultOpen,
    style: {
      borderBottom: '1px solid var(--border)',
      fontFamily: 'var(--font-sans)'
    }
  }, rest), /*#__PURE__*/React.createElement("summary", {
    style: {
      cursor: 'pointer',
      padding: '20px 4px',
      fontWeight: 'var(--fw-semibold)',
      fontSize: '16.5px',
      color: 'var(--text-primary)',
      listStyle: 'none',
      position: 'relative'
    }
  }, question, /*#__PURE__*/React.createElement("span", {
    "aria-hidden": "true",
    style: {
      position: 'absolute',
      right: '6px',
      top: '50%',
      transform: 'translateY(-50%)',
      color: 'var(--color-brand)',
      fontWeight: 400,
      fontSize: '22px'
    },
    className: "psod-faq-sign"
  })), /*#__PURE__*/React.createElement("div", {
    style: {
      padding: '0 4px 22px',
      color: 'var(--text-secondary)',
      fontSize: '15px',
      lineHeight: 1.7
    }
  }, children), /*#__PURE__*/React.createElement("style", null, `.psod-faq-sign::before{content:"+"}details[open] > summary .psod-faq-sign::before{content:"–"}`));
}
Object.assign(__ds_scope, { FaqItem });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/cards/FaqItem.jsx", error: String((e && e.message) || e) }); }

// components/cards/FilarCard.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * FilarCard — filar / priorytet opieki. Koncepcja „karta-indeks":
 * wielki, zredukowany numer-widmo (Fraunces) w tle, cienka linia indeksu
 * u góry oraz fioletowy znacznik, który wypełnia się na hover.
 * Ruch subtelny (dostępność): uniesienie + miękki cień, bez efekciarstwa.
 *
 * Wariant `empty` = celowo pusty filar (jak „ram prawnych" w oryginale).
 */
function FilarCard({
  nr,
  title,
  children,
  empty = false,
  emptyLabel = 'do uzupełnienia',
  ...rest
}) {
  const [hover, setHover] = React.useState(false);
  if (empty) {
    return /*#__PURE__*/React.createElement("div", _extends({
      style: {
        position: 'relative',
        border: 'var(--border-placeholder)',
        borderRadius: 'var(--radius-lg)',
        padding: '26px 24px 30px',
        minHeight: 210,
        display: 'flex',
        alignItems: 'flex-end',
        background: 'transparent'
      }
    }, rest), nr != null && /*#__PURE__*/React.createElement("span", {
      "aria-hidden": "true",
      style: {
        position: 'absolute',
        top: 14,
        right: 20,
        fontFamily: 'var(--font-serif)',
        fontWeight: 300,
        fontSize: 64,
        lineHeight: 1,
        color: 'var(--border)',
        fontVariantNumeric: 'tabular-nums'
      }
    }, nr), /*#__PURE__*/React.createElement("span", {
      style: {
        fontFamily: 'var(--font-sans)',
        fontSize: 10.5,
        fontWeight: 'var(--fw-semibold)',
        letterSpacing: '.1em',
        textTransform: 'uppercase',
        color: 'var(--text-secondary)',
        background: 'var(--surface-muted)',
        padding: '3px 9px',
        borderRadius: 5
      }
    }, emptyLabel));
  }
  return /*#__PURE__*/React.createElement("div", _extends({
    onMouseEnter: () => setHover(true),
    onMouseLeave: () => setHover(false),
    style: {
      position: 'relative',
      background: 'var(--surface)',
      borderRadius: 'var(--radius-lg)',
      padding: '22px 24px 30px',
      minHeight: 210,
      overflow: 'hidden',
      boxShadow: hover ? 'var(--shadow-card)' : '0 0 0 1px var(--border)',
      transform: hover ? 'translateY(-3px)' : 'none',
      transition: 'transform var(--dur-med) var(--ease), box-shadow var(--dur-med) var(--ease)'
    }
  }, rest), nr != null && /*#__PURE__*/React.createElement("span", {
    "aria-hidden": "true",
    style: {
      position: 'absolute',
      top: -8,
      right: 8,
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 108,
      lineHeight: 1,
      letterSpacing: '-.02em',
      color: hover ? 'rgba(187,22,163,.10)' : 'var(--surface-muted)',
      fontVariantNumeric: 'tabular-nums',
      transition: 'color var(--dur-med) var(--ease), transform var(--dur-med) var(--ease)',
      transform: hover ? 'translateY(2px)' : 'none',
      pointerEvents: 'none',
      userSelect: 'none'
    }
  }, nr), /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'relative',
      display: 'flex',
      alignItems: 'center',
      gap: 10,
      marginBottom: 'auto'
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      width: hover ? 34 : 20,
      height: 2,
      background: 'var(--color-brand)',
      transition: 'width var(--dur-med) var(--ease)'
    }
  }), /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-sans)',
      fontSize: 10.5,
      fontWeight: 'var(--fw-semibold)',
      letterSpacing: '.16em',
      textTransform: 'uppercase',
      color: 'var(--text-muted)'
    }
  }, "Filar ", nr)), /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'relative',
      marginTop: 44
    }
  }, /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 'var(--fw-medium)',
      fontSize: 21,
      lineHeight: 1.25,
      color: 'var(--text-primary)',
      margin: '0 0 10px'
    }
  }, title), /*#__PURE__*/React.createElement("p", {
    style: {
      fontFamily: 'var(--font-sans)',
      fontSize: 14,
      lineHeight: 1.72,
      color: 'var(--text-secondary)',
      margin: 0
    }
  }, children)));
}
Object.assign(__ds_scope, { FilarCard });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/cards/FilarCard.jsx", error: String((e && e.message) || e) }); }

// components/cards/Placeholder.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Placeholder — jednolity wzór dla brakujących materiałów (zdjęcia, okładki, loga).
 * Ramka kreskowana 1.5px + etykieta uppercase. Żaden obraz nie wchodzi bez licencji.
 */
function Placeholder({
  label = 'do uzupełnienia',
  radius = 'var(--radius-md)',
  style,
  ...rest
}) {
  return /*#__PURE__*/React.createElement("div", _extends({
    style: {
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'center',
      textAlign: 'center',
      border: 'var(--border-placeholder)',
      borderRadius: radius,
      background: 'transparent',
      color: 'var(--text-secondary)',
      fontFamily: 'var(--font-sans)',
      fontSize: '10.5px',
      fontWeight: 'var(--fw-semibold)',
      letterSpacing: '.1em',
      textTransform: 'uppercase',
      padding: '8px',
      minHeight: '80px',
      ...style
    }
  }, rest), label);
}
Object.assign(__ds_scope, { Placeholder });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/cards/Placeholder.jsx", error: String((e && e.message) || e) }); }

// components/cards/NewsCard.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * NewsCard — kafel aktualności. Zdjęcie (lub placeholder) + tytuł Fraunces + data.
 * Zdjęcie domyślnie szare (grayscale), na hover przechodzi w kolor.
 * layout: 'mini' (obok siebie foto+tekst) lub 'stacked' (foto nad tekstem).
 */
function NewsCard({
  title,
  date,
  image,
  href = '#',
  layout = 'mini',
  ...rest
}) {
  const [hover, setHover] = React.useState(false);
  const foto = /*#__PURE__*/React.createElement("div", {
    style: {
      overflow: 'hidden',
      borderRadius: 'var(--radius-xl)',
      background: 'var(--surface-muted)',
      aspectRatio: layout === 'mini' ? '4/3' : '16/10'
    }
  }, image ? /*#__PURE__*/React.createElement("img", {
    src: image,
    alt: "",
    style: {
      width: '100%',
      height: '100%',
      objectFit: 'cover',
      display: 'block',
      filter: hover ? 'none' : 'grayscale(1) brightness(1.05) contrast(.93)',
      transform: hover ? 'scale(1.025)' : 'none',
      transition: 'filter var(--dur-slow) ease, transform var(--dur-slow) ease'
    }
  }) : /*#__PURE__*/React.createElement(__ds_scope.Placeholder, {
    label: "foto wpisu",
    radius: "var(--radius-xl)",
    style: {
      height: '100%',
      border: 'none',
      background: 'var(--surface-muted)'
    }
  }));
  return /*#__PURE__*/React.createElement("a", _extends({
    href: href,
    onMouseEnter: () => setHover(true),
    onMouseLeave: () => setHover(false),
    style: {
      display: 'grid',
      gridTemplateColumns: layout === 'mini' ? '180px 1fr' : '1fr',
      gap: layout === 'mini' ? '26px' : '18px',
      alignItems: 'start',
      textDecoration: 'none',
      color: 'inherit',
      fontFamily: 'var(--font-sans)'
    }
  }, rest), foto, /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 340,
      fontSize: '18.5px',
      lineHeight: 1.5,
      color: hover ? 'var(--color-brand)' : 'var(--text-primary)',
      margin: '0 0 8px',
      transition: 'color var(--dur-fast)'
    }
  }, title), /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: '12.5px',
      color: 'var(--text-secondary)',
      opacity: .85
    }
  }, date)));
}
Object.assign(__ds_scope, { NewsCard });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/cards/NewsCard.jsx", error: String((e && e.message) || e) }); }

// components/core/ArrowLink.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * ArrowLink — „czytaj więcej →" / „Zobacz wszystkie →".
 * Fioletowy link ze strzałką; hover przesuwa strzałkę.
 */
function ArrowLink({
  children,
  href = '#',
  color = 'brand',
  ...rest
}) {
  const [hover, setHover] = React.useState(false);
  const col = color === 'muted' ? 'var(--text-primary)' : 'var(--color-brand)';
  return /*#__PURE__*/React.createElement("a", _extends({
    href: href,
    onMouseEnter: () => setHover(true),
    onMouseLeave: () => setHover(false),
    style: {
      display: 'inline-flex',
      alignItems: 'center',
      gap: '10px',
      fontFamily: 'var(--font-sans)',
      fontWeight: 'var(--fw-medium)',
      fontSize: 'var(--fs-ui)',
      color: col,
      textDecoration: 'none'
    }
  }, rest), children, /*#__PURE__*/React.createElement("span", {
    style: {
      transition: 'transform var(--dur-med) var(--ease)',
      transform: hover ? 'translateX(5px)' : 'none'
    }
  }, "\u2192"));
}
Object.assign(__ds_scope, { ArrowLink });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/core/ArrowLink.jsx", error: String((e && e.message) || e) }); }

// components/core/Button.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * PSOD Button — pełne (pill) CTA. Fiolet używany oszczędnie: to akcent.
 * CTA muszą być krótkie ("Dołącz do PSOD", "Zobacz raport") — nigdy przydługie.
 */
function Button({
  children,
  variant = 'primary',
  size = 'md',
  uppercase = false,
  href,
  onClick,
  disabled = false,
  type = 'button',
  ...rest
}) {
  const pad = size === 'sm' ? '13px 26px' : size === 'lg' ? '17px 38px' : '16px 34px';
  const base = {
    display: 'inline-block',
    fontFamily: 'var(--font-sans)',
    fontWeight: 'var(--fw-medium)',
    fontSize: uppercase ? '13px' : 'var(--fs-ui)',
    letterSpacing: uppercase ? '.1em' : 'normal',
    textTransform: uppercase ? 'uppercase' : 'none',
    textDecoration: 'none',
    lineHeight: 1,
    padding: pad,
    borderRadius: 'var(--radius-pill)',
    border: '1.5px solid transparent',
    cursor: disabled ? 'not-allowed' : 'pointer',
    opacity: disabled ? 0.5 : 1,
    transition: 'background var(--dur-fast), transform var(--dur-fast), border-color var(--dur-fast), color var(--dur-fast)'
  };
  const skins = {
    primary: {
      background: 'var(--color-brand)',
      color: 'var(--text-on-brand)'
    },
    secondary: {
      background: 'transparent',
      color: 'var(--text-primary)',
      borderColor: 'var(--border)'
    }
  };
  const [hover, setHover] = React.useState(false);
  const hoverSkin = !disabled && hover ? variant === 'primary' ? {
    background: 'var(--color-brand-press)',
    transform: 'translateY(var(--hover-lift))'
  } : {
    borderColor: 'var(--color-brand)',
    color: 'var(--color-brand)'
  } : null;
  const style = {
    ...base,
    ...skins[variant],
    ...hoverSkin
  };
  const handlers = {
    onMouseEnter: () => setHover(true),
    onMouseLeave: () => setHover(false)
  };
  if (href && !disabled) {
    return /*#__PURE__*/React.createElement("a", _extends({
      href: href,
      style: style
    }, handlers, rest), children);
  }
  return /*#__PURE__*/React.createElement("button", _extends({
    type: type,
    onClick: onClick,
    disabled: disabled,
    style: style
  }, handlers, rest), children);
}
Object.assign(__ds_scope, { Button });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/core/Button.jsx", error: String((e && e.message) || e) }); }

// components/cards/MythTile.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * MythTile — karta-zabawa „Prawda czy mit?". Użytkownik najpierw zgaduje,
 * potem ODKRYWA prawdę: mit zostaje przekreślony czerwoną kreską (animacja),
 * a pod spodem odsłania się FAKT. Wciąga w obalanie mitu, edukuje.
 * Czerwień #CE2029 wyłącznie w kresce/znaczniku mitu.
 */
function MythTile({
  myth,
  fact,
  onReveal,
  ...rest
}) {
  const [revealed, setRevealed] = React.useState(false);
  const [guess, setGuess] = React.useState(null);
  function answer(g) {
    if (revealed) return;
    setGuess(g);
    setRevealed(true);
    if (onReveal) onReveal(g);
  }
  return /*#__PURE__*/React.createElement("div", _extends({
    style: {
      maxWidth: 640,
      margin: '0 auto',
      textAlign: 'center',
      fontFamily: 'var(--font-sans)'
    }
  }, rest), /*#__PURE__*/React.createElement("p", {
    style: {
      position: 'relative',
      display: 'inline-block',
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(22px,3vw,32px)',
      lineHeight: 1.4,
      color: 'var(--text-primary)',
      margin: 0
    }
  }, "\u201E", myth, "\"", revealed && /*#__PURE__*/React.createElement("span", {
    "aria-hidden": "true",
    className: "psod-strike",
    style: {
      position: 'absolute',
      left: 0,
      right: 0,
      top: '52%',
      height: 3,
      background: 'var(--color-danger)',
      borderRadius: 2
    }
  })), !revealed && /*#__PURE__*/React.createElement("div", {
    style: {
      marginTop: 34
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 12,
      letterSpacing: '.16em',
      textTransform: 'uppercase',
      color: 'var(--text-muted)',
      marginBottom: 18,
      fontWeight: 600
    }
  }, "Jak my\u015Blisz?"), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      gap: 14,
      justifyContent: 'center',
      flexWrap: 'wrap'
    }
  }, /*#__PURE__*/React.createElement(__ds_scope.Button, {
    variant: "secondary",
    onClick: () => answer('prawda')
  }, "To prawda"), /*#__PURE__*/React.createElement(__ds_scope.Button, {
    variant: "secondary",
    onClick: () => answer('mit')
  }, "To mit"))), revealed && /*#__PURE__*/React.createElement("div", {
    className: "psod-fade",
    style: {
      marginTop: 30
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 13,
      color: 'var(--color-brand)',
      fontWeight: 500,
      marginBottom: 22
    }
  }, guess === 'mit' ? 'Dobra intuicja — to mit.' : 'To jednak mit.'), /*#__PURE__*/React.createElement("div", {
    style: {
      background: 'var(--surface-muted)',
      borderRadius: 14,
      padding: '34px 36px',
      textAlign: 'left'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'inline-flex',
      alignItems: 'center',
      gap: 8,
      fontWeight: 600,
      fontSize: 12,
      letterSpacing: '.16em',
      textTransform: 'uppercase',
      color: 'var(--color-brand)',
      marginBottom: 16
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      width: 20,
      height: 20,
      borderRadius: '50%',
      background: 'var(--color-brand)',
      color: '#fff',
      display: 'inline-grid',
      placeItems: 'center',
      fontSize: 11,
      fontWeight: 700
    }
  }, "\u2713"), "Fakt"), /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 15,
      lineHeight: 1.8,
      color: 'var(--text-primary)'
    }
  }, fact))));
}
Object.assign(__ds_scope, { MythTile });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/cards/MythTile.jsx", error: String((e && e.message) || e) }); }

// components/core/Highlight.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Highlight (zakreślacz) — sygnatura PSOD. Zdanie-zobowiązanie zakreślone
 * flamastrem w fiolecie logo. Tło #BB16A3, tekst biały.
 * Rygor: maks. JEDEN zakreślacz na sekcję; w środku tylko biel.
 */
function Highlight({
  children,
  ...rest
}) {
  return /*#__PURE__*/React.createElement("span", _extends({
    className: "psod-zakr",
    style: {
      background: 'var(--color-brand)',
      color: 'var(--text-on-brand)',
      padding: '.12em .42em',
      WebkitBoxDecorationBreak: 'clone',
      boxDecorationBreak: 'clone'
    }
  }, rest), children);
}
Object.assign(__ds_scope, { Highlight });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/core/Highlight.jsx", error: String((e && e.message) || e) }); }

// components/core/Overline.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Overline (nadtytuł) — mała etykieta uppercase nad nagłówkiem sekcji.
 * Szeroka spacja liter; szary domyślnie, błękit w blokach opiekuńczych.
 */
function Overline({
  children,
  tone = 'muted',
  as = 'div',
  ...rest
}) {
  const Tag = as;
  const color = tone === 'care' ? 'var(--color-care)' : 'var(--text-secondary)';
  return /*#__PURE__*/React.createElement(Tag, _extends({
    style: {
      fontFamily: 'var(--font-sans)',
      fontSize: 'var(--fs-nadtytul)',
      fontWeight: 'var(--fw-semibold)',
      letterSpacing: 'var(--ls-nadtytul)',
      textTransform: 'uppercase',
      color
    }
  }, rest), children);
}
Object.assign(__ds_scope, { Overline });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/core/Overline.jsx", error: String((e && e.message) || e) }); }

// components/core/Stamp.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Stamp — znacznik mitu. Wersalikowe „MIT" przekreślone czerwoną linią
 * (myt zostaje obalony). Bez ramki, bez obrotu — czysto, redakcyjnie.
 * WYŁĄCZNIE dla mitów. Czerwień #CE2029 nie występuje nigdzie indziej.
 */
function Stamp({
  children = 'Mit',
  ...rest
}) {
  return /*#__PURE__*/React.createElement("span", _extends({
    style: {
      display: 'inline-block',
      fontFamily: 'var(--font-sans)',
      fontWeight: 'var(--fw-bold)',
      fontSize: '12px',
      letterSpacing: '.2em',
      textTransform: 'uppercase',
      color: 'var(--color-danger)',
      textDecoration: 'line-through',
      textDecorationThickness: '2px',
      textUnderlineOffset: '0'
    }
  }, rest), children);
}
Object.assign(__ds_scope, { Stamp });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/core/Stamp.jsx", error: String((e && e.message) || e) }); }

// components/core/Tag.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
/**
 * Tag — mała etykieta uppercase (np. „szkolenie"). Fiolet na jasnym tle.
 */
function Tag({
  children,
  ...rest
}) {
  return /*#__PURE__*/React.createElement("span", _extends({
    style: {
      display: 'inline-block',
      fontFamily: 'var(--font-sans)',
      fontSize: '10.5px',
      fontWeight: 'var(--fw-semibold)',
      letterSpacing: '.1em',
      textTransform: 'uppercase',
      color: 'var(--color-brand)'
    }
  }, rest), children);
}
Object.assign(__ds_scope, { Tag });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/core/Tag.jsx", error: String((e && e.message) || e) }); }

// components/forms/NewsletterForm.jsx
try { (() => {
function _extends() { return _extends = Object.assign ? Object.assign.bind() : function (n) { for (var e = 1; e < arguments.length; e++) { var t = arguments[e]; for (var r in t) ({}).hasOwnProperty.call(t, r) && (n[r] = t[r]); } return n; }, _extends.apply(null, arguments); }
const DEFAULT_RODO = ['Poprzez kliknięcie przycisku „Zapisz się" wyrażasz zgodę na otrzymywanie newsletterów od Polskiego Stowarzyszenia Opieki Domowej. Każda komunikacja jaką do Ciebie skierujemy będzie zawierała opcję wycofania subskrypcji. Zgodę możesz również wycofać w każdym czasie poprzez wysłanie wiadomości na adres kontakt@polskaopieka.eu', 'Administratorem Twoich danych osobowych jest Polskie Stowarzyszenie Opieki Domowej. Dane osobowe przetwarzane będą w celu wysyłania newslettera. Pełną informację o przetwarzaniu danych osobowych znajdziesz w naszej Polityce Prywatności.'];

/**
 * NewsletterForm — zapis do newslettera. Input + fioletowy przycisk + klauzule RODO.
 * Klauzule RODO podawać w pełnym brzmieniu (11.5px, szary) — nie skracać.
 */
function NewsletterForm({
  heading = 'Bądź na bieżąco',
  description = 'Otrzymuj powiadomienia o ważnych terminach i zdarzeniach.',
  placeholder = 'Twój adres e-mail',
  buttonLabel = 'Zapisz się',
  rodo = DEFAULT_RODO,
  onSubmit,
  ...rest
}) {
  const [email, setEmail] = React.useState('');
  return /*#__PURE__*/React.createElement("div", _extends({
    style: {
      maxWidth: '640px',
      margin: '0 auto',
      textAlign: 'center',
      fontFamily: 'var(--font-sans)'
    }
  }, rest), /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 'var(--fw-regular)',
      fontSize: '22px',
      color: 'var(--text-primary)',
      margin: '0 0 8px'
    }
  }, heading), /*#__PURE__*/React.createElement("p", {
    style: {
      color: 'var(--text-secondary)',
      fontSize: '15px',
      margin: 0
    }
  }, description), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      gap: '10px',
      justifyContent: 'center',
      margin: '22px 0 18px',
      flexWrap: 'wrap'
    }
  }, /*#__PURE__*/React.createElement("input", {
    type: "email",
    value: email,
    onChange: e => setEmail(e.target.value),
    placeholder: placeholder,
    style: {
      flex: 1,
      maxWidth: '340px',
      padding: '13px 16px',
      border: '1px solid var(--border)',
      borderRadius: 'var(--radius-sm)',
      fontSize: '14px',
      fontFamily: 'inherit',
      color: 'var(--text-primary)'
    }
  }), /*#__PURE__*/React.createElement("button", {
    type: "button",
    onClick: () => onSubmit && onSubmit(email),
    style: {
      padding: '13px 26px',
      background: 'var(--color-brand)',
      color: 'var(--text-on-brand)',
      border: 'none',
      borderRadius: 'var(--radius-sm)',
      fontWeight: 'var(--fw-semibold)',
      fontSize: '14px',
      cursor: 'pointer',
      fontFamily: 'inherit'
    }
  }, buttonLabel)), rodo.map((t, i) => /*#__PURE__*/React.createElement("p", {
    key: i,
    style: {
      fontSize: 'var(--fs-rodo)',
      lineHeight: 1.55,
      color: 'var(--text-secondary)',
      textAlign: 'left',
      marginTop: '10px'
    }
  }, t)));
}
Object.assign(__ds_scope, { NewsletterForm });
})(); } catch (e) { __ds_ns.__errors.push({ path: "components/forms/NewsletterForm.jsx", error: String((e && e.message) || e) }); }

// design_handoff_psod_website/ui_kit/home-a.jsx
try { (() => {
/* PSOD — sekcje górne strony głównej. Eksport do window. */
const {
  Button,
  ArrowLink,
  Overline,
  Highlight,
  NewsCard
} = window.PSODDesignSystem_ecebba;
const {
  Wrap,
  GrayFrame,
  SectionHead
} = window;
function Hero() {
  return /*#__PURE__*/React.createElement("section", {
    style: {
      position: 'relative',
      minHeight: 500,
      maxHeight: '72vh',
      display: 'grid',
      placeItems: 'center',
      overflow: 'hidden',
      textAlign: 'center',
      background: '#EDEDEF'
    }
  }, /*#__PURE__*/React.createElement("img", {
    src: "../../assets/photo-opieka-01.jpeg",
    alt: "",
    style: {
      position: 'absolute',
      inset: 0,
      width: '100%',
      height: '100%',
      objectFit: 'cover',
      objectPosition: 'center 30%',
      filter: 'grayscale(1) brightness(1.05) contrast(.93)'
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'absolute',
      inset: 0,
      background: 'linear-gradient(rgba(246,246,247,.66),rgba(246,246,247,.44) 45%,rgba(246,246,247,.78))'
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'relative',
      zIndex: 2,
      maxWidth: 880,
      padding: '72px 28px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 11.5,
      fontWeight: 600,
      letterSpacing: '.26em',
      textTransform: 'uppercase',
      color: 'var(--text-secondary)',
      marginBottom: 26,
      fontFamily: 'var(--font-sans)'
    }
  }, "O staro\u015Bci, trosce i opiece"), /*#__PURE__*/React.createElement("h1", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(30px,4.4vw,52px)',
      lineHeight: 1.35,
      color: 'var(--text-primary)',
      margin: 0
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      display: 'block'
    }
  }, "Ka\u017Cdy z nas b\u0119dzie kiedy\u015B potrzebowa\u0142 ", /*#__PURE__*/React.createElement("em", {
    style: {
      fontStyle: 'italic',
      fontWeight: 400,
      color: 'var(--color-brand)'
    }
  }, "opieki"), "."), /*#__PURE__*/React.createElement("span", {
    style: {
      display: 'block'
    }
  }, "Albo b\u0119dzie j\u0105 komu\u015B zapewnia\u0142.")), /*#__PURE__*/React.createElement("div", {
    style: {
      width: 52,
      height: 1,
      background: 'var(--text-secondary)',
      opacity: .5,
      margin: '30px auto 0'
    }
  })));
}
function odmienLat(n) {
  if (n === 1) return 'rok';
  const d = n % 10,
    s = n % 100;
  if (d >= 2 && d <= 4 && !(s >= 12 && s <= 14)) return 'lata';
  return 'lat';
}
function Demography() {
  const TERAZ = 2026,
    HMIN = 1935,
    HMAX = 2075;
  const [rok, setRok] = React.useState(1980);
  const proc = r => (r - HMIN) / (HMAX - HMIN) * 100;
  const wiekDzis = TERAZ - rok,
    wiek2030 = 2030 - rok,
    rok60 = rok + 60;
  const pUr = proc(rok),
    pDzis = proc(TERAZ),
    p60 = proc(rok60);
  const rok65 = rok + 65;
  let wynik;
  const em = {
    fontStyle: 'normal',
    color: 'var(--color-brand)'
  };
  if (rok65 > TERAZ) wynik = /*#__PURE__*/React.createElement(React.Fragment, null, "W ", /*#__PURE__*/React.createElement("em", {
    style: em
  }, rok65), " roku sko\u0144czysz 65 lat. Wtedy w wieku emerytalnym b\u0119dzie ju\u017C niemal ", /*#__PURE__*/React.createElement("em", {
    style: em
  }, "jedna trzecia"), " Polak\xF3w \u2014 a wielu z nich b\u0119dzie potrzebowa\u0107 codziennej opieki.");else wynik = /*#__PURE__*/React.createElement(React.Fragment, null, "Masz ju\u017C za sob\u0105 ", /*#__PURE__*/React.createElement("em", {
    style: em
  }, "65. urodziny"), ". Nale\u017Cysz do pokolenia, kt\xF3re dzi\u015B najbardziej potrzebuje dobrze zorganizowanej opieki.");
  const fill = (rok - 1940) / (2012 - 1940) * 100;
  return /*#__PURE__*/React.createElement("section", {
    id: "gra",
    style: {
      background: '#fff',
      padding: '96px 0',
      textAlign: 'center'
    }
  }, /*#__PURE__*/React.createElement(Wrap, {
    style: {
      maxWidth: 1040
    }
  }, /*#__PURE__*/React.createElement("p", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(21px,2.6vw,30px)',
      color: 'var(--text-primary)',
      lineHeight: 1.5,
      margin: 0
    }
  }, "W kt\xF3rym roku si\u0119 urodzi\u0142a\u015B, urodzi\u0142e\u015B?"), /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 400,
      fontSize: 'clamp(52px,7vw,84px)',
      color: 'var(--color-brand)',
      marginTop: 20,
      lineHeight: 1,
      fontVariantNumeric: 'tabular-nums'
    }
  }, rok), /*#__PURE__*/React.createElement("input", {
    type: "range",
    min: 1940,
    max: 2012,
    value: rok,
    step: 1,
    "aria-label": "Rok urodzenia",
    onChange: e => setRok(parseInt(e.target.value, 10)),
    style: {
      width: '100%',
      maxWidth: 520,
      margin: '28px auto 0',
      display: 'block',
      WebkitAppearance: 'none',
      appearance: 'none',
      height: 2,
      borderRadius: 2,
      outline: 'none',
      background: `linear-gradient(to right,var(--color-brand) ${fill}%,var(--border) ${fill}%)`
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      justifyContent: 'space-between',
      maxWidth: 520,
      margin: '12px auto 0',
      fontSize: 12,
      color: 'var(--text-muted)'
    }
  }, /*#__PURE__*/React.createElement("span", null, "1940"), /*#__PURE__*/React.createElement("span", null, "2012")), /*#__PURE__*/React.createElement("p", {
    style: {
      maxWidth: 980,
      margin: '48px auto 0',
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(21px,2.6vw,30px)',
      lineHeight: 1.5,
      color: 'var(--text-primary)',
      minHeight: '2.6em'
    }
  }, wynik), /*#__PURE__*/React.createElement("p", {
    style: {
      marginTop: 44,
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(18px,2.1vw,24px)',
      color: 'var(--text-primary)',
      lineHeight: 1.9
    }
  }, /*#__PURE__*/React.createElement(Highlight, null, "Polska nie jest gotowa na ten czas.")), /*#__PURE__*/React.createElement("div", {
    style: {
      marginTop: 22
    }
  }, /*#__PURE__*/React.createElement(ArrowLink, {
    href: "#dolacz"
  }, "Pom\xF3\u017C nam to zmieni\u0107"))));
}
function Challenges() {
  const items = [{
    t: 'Starzenie się społeczeństw',
    tone: 'cool',
    img: '../../assets/photo-opieka-02.jpeg'
  }, {
    t: 'Choroby demencyjne',
    tone: 'warm'
  }, {
    t: 'Brak personelu opiekuńczego',
    tone: 'cool'
  }, {
    t: 'Rosnące koszty opieki',
    tone: 'warm'
  }];
  return /*#__PURE__*/React.createElement("section", {
    style: {
      padding: '100px 0',
      background: 'var(--surface-muted)'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1120,
      margin: '0 auto',
      padding: '0 28px'
    }
  }, /*#__PURE__*/React.createElement(SectionHead, {
    title: "Wyzwania cywilizacyjne",
    intro: "Spo\u0142ecze\u0144stwa si\u0119 starzej\u0105. Wed\u0142ug szacunk\xF3w WHO do 2030 roku jedna na sze\u015B\u0107 os\xF3b na \u015Bwiecie b\u0119dzie mia\u0142a co najmniej 60 lat. W 2021 roku 65 lat lub wi\u0119cej mia\u0142o ju\u017C 21% ludno\u015Bci Europy."
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: 'repeat(4,1fr)',
      gap: 22,
      marginTop: 56
    }
  }, items.map(({
    t,
    tone,
    img
  }) => /*#__PURE__*/React.createElement("a", {
    key: t,
    href: "#",
    style: {
      position: 'relative',
      aspectRatio: '1/1',
      borderRadius: 14,
      overflow: 'hidden',
      display: 'flex',
      alignItems: 'flex-end',
      textDecoration: 'none',
      isolation: 'isolate'
    }
  }, img ? /*#__PURE__*/React.createElement("img", {
    src: img,
    alt: "",
    style: {
      position: 'absolute',
      inset: 0,
      width: '100%',
      height: '100%',
      objectFit: 'cover',
      filter: 'grayscale(1) brightness(1.02) contrast(.95)'
    }
  }) : /*#__PURE__*/React.createElement(GrayFrame, {
    ratio: "1/1",
    radius: 14,
    tone: tone,
    style: {
      position: 'absolute',
      inset: 0
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'absolute',
      inset: 0,
      background: 'linear-gradient(180deg,rgba(74,75,82,.15),rgba(74,75,82,.55) 55%,rgba(74,75,82,.82))'
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      padding: '26px 24px 28px',
      position: 'relative',
      zIndex: 1
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      width: 28,
      height: 2,
      background: 'var(--color-brand)',
      marginBottom: 12
    }
  }), /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-sans)',
      fontWeight: 600,
      fontSize: 18,
      lineHeight: 1.3,
      color: '#fff',
      margin: 0
    }
  }, t)))))));
}
function Appeal() {
  return /*#__PURE__*/React.createElement("section", {
    style: {
      background: 'var(--surface-care)',
      padding: '104px 0'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1120,
      margin: '0 auto',
      padding: '0 28px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: '.82fr 1.18fr',
      gap: 64,
      alignItems: 'center'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      background: '#fff',
      padding: 34,
      borderRadius: 10,
      boxShadow: 'var(--shadow-doc)'
    }
  }, /*#__PURE__*/React.createElement(GrayFrame, {
    ratio: "3/4",
    radius: 4,
    tone: "cool",
    label: "stanowisko PSOD + KIDO"
  })), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(30px,4vw,50px)',
      lineHeight: 1.15,
      color: 'var(--text-primary)',
      margin: '0 0 16px'
    }
  }, "Apel do rz\u0105du"), /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 13,
      color: 'var(--text-secondary)',
      marginBottom: 8
    }
  }, "15 czerwca 2026"), /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 400,
      fontSize: 'clamp(19px,2.2vw,25px)',
      lineHeight: 1.35,
      color: 'var(--text-primary)',
      margin: '0 0 18px'
    }
  }, "Wsp\xF3lne stanowisko PSOD oraz KIDO"), /*#__PURE__*/React.createElement("p", {
    style: {
      fontSize: 16,
      lineHeight: 1.8,
      color: 'var(--text-secondary)',
      maxWidth: 560,
      marginBottom: 34
    }
  }, "Wsp\xF3lne stanowisko Polskiego Stowarzyszenia Opieki Domowej oraz Krajowej Izby Dom\xF3w Opieki w zwi\u0105zku z zawieszeniem prac nad rozporz\u0105dzeniem w sprawie wykazu okre\u015Blaj\u0105cego grupy zawod\xF3w, w kt\xF3rych wyst\u0119puj\u0105 niedobory kadrowe."), /*#__PURE__*/React.createElement(Button, {
    href: "#"
  }, "Pobierz")))));
}
function News() {
  const mini = [['Światowy Dzień Praw Osób Starszych. Czy Polska jest gotowa na nadchodzący kryzys opieki?', '15 czerwca 2026'], ['PSOD partnerem webinaru „Efektywna współpraca z Rodziną Podopiecznego w opiece nad Seniorami”', '2 czerwca 2026'], ['Dzień Opiekuna Osób Starszych. Zawód, od którego będzie zależeć bezpieczeństwo milionów seniorów', '15 maja 2026'], ['Bon senioralny to krok w dobrą stronę — ale nie zastąpi systemu opieki', '24 kwietnia 2026']];
  return /*#__PURE__*/React.createElement("section", {
    style: {
      padding: '100px 0',
      background: 'var(--surface-muted)'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1120,
      margin: '0 auto',
      padding: '0 28px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      alignItems: 'baseline',
      justifyContent: 'space-between',
      gap: 24,
      marginBottom: 52,
      flexWrap: 'wrap'
    }
  }, /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 400,
      fontSize: 'clamp(20px,2vw,26px)',
      lineHeight: 1.2,
      color: 'var(--text-primary)',
      margin: 0
    }
  }, "Aktualno\u015Bci")), /*#__PURE__*/React.createElement("a", {
    href: "#",
    style: {
      display: 'grid',
      gridTemplateColumns: '1.15fr .85fr',
      gap: 52,
      alignItems: 'center',
      textDecoration: 'none',
      color: 'inherit'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      aspectRatio: '16/10',
      borderRadius: 18,
      overflow: 'hidden',
      boxShadow: 'var(--shadow-raise)',
      background: 'var(--surface-muted)',
      border: '1.5px dashed var(--border)',
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'center'
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      fontSize: 10.5,
      fontWeight: 600,
      letterSpacing: '.1em',
      textTransform: 'uppercase',
      color: 'var(--text-secondary)'
    }
  }, "screenshot ok\u0142adki \u201EGazety Wyborczej\u201D")), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(22px,2.6vw,32px)',
      lineHeight: 1.4,
      color: 'var(--text-primary)',
      margin: '0 0 12px'
    }
  }, "Kryzys opieki senioralnej na ok\u0142adce \u201EGazety Wyborczej\u201D. Czas na konkretne dzia\u0142ania"), /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 12.5,
      color: 'var(--text-secondary)',
      opacity: .85,
      marginBottom: 20
    }
  }, "1 lipca 2026"), /*#__PURE__*/React.createElement("p", {
    style: {
      fontSize: 15,
      lineHeight: 1.75,
      color: 'var(--text-secondary)',
      margin: 0
    }
  }, "Temat, o kt\xF3rym m\xF3wimy od lat, trafi\u0142 na pierwsz\u0105 stron\u0119 og\xF3lnopolskiego dziennika. Rynek opieki senioralnej wymaga pilnych rozwi\u0105za\u0144 systemowych \u2014 komentujemy ok\u0142adkowy materia\u0142 i wskazujemy, od czego zacz\u0105\u0107."), /*#__PURE__*/React.createElement("span", {
    style: {
      display: 'inline-block',
      marginTop: 22,
      fontSize: 13.5,
      fontWeight: 500,
      color: 'var(--text-primary)',
      borderBottom: '1px solid var(--border)',
      paddingBottom: 4
    }
  }, "Czytaj dalej"))), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: '1fr 1fr',
      gap: 52,
      marginTop: 64,
      paddingTop: 56,
      borderTop: '1px solid var(--border)'
    }
  }, mini.map(([t, d]) => /*#__PURE__*/React.createElement(NewsCard, {
    key: t,
    layout: "mini",
    title: t,
    date: d
  })))));
}
function Seal() {
  return /*#__PURE__*/React.createElement("section", {
    style: {
      background: 'var(--surface-care)',
      padding: '128px 0',
      textAlign: 'center',
      position: 'relative',
      overflow: 'hidden'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'absolute',
      top: -34,
      left: '50%',
      transform: 'translateX(-50%)',
      fontFamily: 'var(--font-serif)',
      fontSize: 340,
      lineHeight: 1,
      color: 'rgba(94,140,160,.20)',
      pointerEvents: 'none'
    }
  }, "\u201E"), /*#__PURE__*/React.createElement(Wrap, {
    style: {
      maxWidth: 1080,
      position: 'relative'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'center',
      gap: 12,
      marginBottom: 30
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      width: 44,
      height: 1,
      background: 'var(--color-care)',
      opacity: .5
    }
  }), /*#__PURE__*/React.createElement("span", {
    style: {
      width: 7,
      height: 7,
      background: 'var(--color-brand)',
      transform: 'rotate(45deg)'
    }
  }), /*#__PURE__*/React.createElement("span", {
    style: {
      width: 44,
      height: 1,
      background: 'var(--color-care)',
      opacity: .5
    }
  })), /*#__PURE__*/React.createElement("blockquote", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(27px,3.8vw,44px)',
      lineHeight: 1.35,
      color: 'var(--text-primary)',
      margin: 0,
      textWrap: 'balance'
    }
  }, "Ka\u017Cdy ma prawo do przyst\u0119pnych cenowo i\xA0dobrej jako\u015Bci us\u0142ug opieki d\u0142ugoterminowej, ", /*#__PURE__*/React.createElement("em", {
    style: {
      fontStyle: 'italic',
      color: 'var(--color-brand)'
    }
  }, "w\xA0szczeg\xF3lno\u015Bci opieki\xA0w\xA0domu"), "."), /*#__PURE__*/React.createElement("div", {
    style: {
      marginTop: 34,
      fontSize: 11.5,
      letterSpacing: '.16em',
      textTransform: 'uppercase',
      color: 'var(--color-care)',
      fontWeight: 500
    }
  }, "18. zasada Europejskiego Filaru Praw Socjalnych")));
}
Object.assign(window, {
  Hero,
  Demography,
  Challenges,
  Appeal,
  News,
  Seal
});
})(); } catch (e) { __ds_ns.__errors.push({ path: "design_handoff_psod_website/ui_kit/home-a.jsx", error: String((e && e.message) || e) }); }

// design_handoff_psod_website/ui_kit/home-b.jsx
try { (() => {
/* PSOD — sekcje dolne strony głównej. Eksport do window. */
const {
  Button,
  ArrowLink,
  Overline,
  Highlight,
  Tag,
  FilarCard,
  MythTile,
  FaqItem,
  NewsletterForm,
  Placeholder
} = window.PSODDesignSystem_ecebba;
const {
  Wrap,
  GrayFrame,
  SectionHead
} = window;
const FILARY = [{
  name: 'Wybór',
  intro: 'Oznacza zapewnienie podopiecznym prawa do dokonania wyboru sposobu, w jaki żyją i otrzymują opiekę. W szczególności:',
  bullets: ['wspieranie podopiecznych w zarządzaniu własnym zdrowiem i samopoczuciem,', 'zapewnienie podopiecznym i ich opiekunom wiedzy o prawie do uczestniczenia w opiece i dokonywania wyborów w tym zakresie,', 'zaangażowanie do podejmowania decyzji dotyczących opieki oraz możliwości wyboru i kontroli nad usługami, z których korzystają,', 'zlecanie usług, które zapewniają podopiecznym informacje i wsparcie w celu określenia i osiągnięcia wyników, które są dla nich ważne,', 'uwzględnienie świadomych preferencji podopiecznych']
}, {
  name: 'Bezpieczeństwo',
  intro: 'Opieka domowa musi być realizowane w sposób bezpieczny, obejmujący m.in.:',
  bullets: ['ocenę ryzyka poszczególnych czynności opiekuńczych dla zdrowia i bezpieczeństwa podopiecznego oraz podejmowanie wszelkich możliwych działań w celu zmniejszenia takiego ryzyka,', 'zapewnienie personelu opiekuńczego o odpowiednich kwalifikacjach, kompetencjach i doświadczeniu zapewniających bezpieczeństwo opieki,', 'zapewnienie bezpieczeństwa i zgodności z przeznaczeniem pomieszczeń i sprzętu używanego do opieki', 'zaspokojenie potrzeb podopiecznego w obszarze żywieniowym, nawodnienia i właściwe zarządzanie lekami,', 'ocena ryzyka, zapobiegania, wykrywania i kontroli nad rozprzestrzenianiem się zakażeń,', 'w przypadku, gdy odpowiedzialność za opiekę domową jest dzielona, zapewnienie współpracy na każdym etapie planowania i realizacji opieki.']
}, {
  name: 'Szacunek',
  intro: 'Zarówno osoby korzystające z usług opieki, jak i opiekunowie muszą być chronieni przed nadużyciami i traktowani z godnością oraz szacunkiem. Usługi opieki domowej nie mogą być świadczone w sposób, który:',
  bullets: ['dopuszcza dyskryminację, jest lekceważący lub poniżający,', 'obejmuje działania ograniczające autonomię i niezależność podopiecznych, które nie są niezbędne lub są nieproporcjonalną reakcją w stosunku do ryzyka powstania szkody dla podopiecznego, personelu lub innych osób', 'nie respektuje osobistej przestrzeni podopiecznego i opiekuna oraz prywatności i poufności dotyczącej osobistych informacji,', 'ograniczaja wolność w celu uzyskania opieki lub leczenia – opieka i leczenie muszą być zapewnione za zgodą podopiecznych lub ich prawnych opiekunów.']
}, {
  name: 'Ciągłość',
  intro: 'Opieka domowa wymaga:',
  bullets: ['zapewnienia podopiecznym prawa do zachowania ciągłości opieki, tj. nieprzerwanego świadczenia bez narażania ich na ryzyko przerwy w dostępie do opieki,', 'zachowania dokładnej, pełnej i aktualnej informacji (poprzez odpowiednią dokumentację) dotyczącej każdego podopiecznego oraz decyzji podjętych w odniesieniu do zapewnionej opieki,', 'zapewnienia możliwości spersonalizowanego długotrwałego planowania opieki']
}, {
  name: 'Indywidualne podejście',
  intro: 'Opieka domowa wymaga zatrudnienia odpowiedniej liczby wykwalifikowanego i otwartego na potrzeby podopiecznych personelu, w celu:',
  bullets: ['zapewnienia zakresu opieki dostosowanego do potrzeb i preferencji podopiecznych,', 'możliwości skupienia się na tym, co jest ważne dla podopiecznych w kontekście jakości ich życia, a nie tylko liście schorzeń lub objawów, które należy leczyć,', 'dbania o transparentność w relacjach oraz zakresie leczenia i świadczonej opieki,', 'zapewnienia skuteczności w rejestrowaniu, reagowaniu i rozwiązywaniu problemów zgłaszanych przez pacjentów, ich rodziny i personel.']
}];
function Pillars() {
  const [sel, setSel] = React.useState(0);
  const f = FILARY[sel];
  return /*#__PURE__*/React.createElement("section", {
    style: {
      background: 'var(--surface-muted)',
      padding: '100px 0'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1120,
      margin: '0 auto',
      padding: '0 28px'
    }
  }, /*#__PURE__*/React.createElement(SectionHead, {
    title: "Filary opieki domowej"
  }), /*#__PURE__*/React.createElement("div", {
    className: "psod-filary2",
    style: {
      marginTop: 52
    }
  }, /*#__PURE__*/React.createElement("div", {
    role: "tablist",
    "aria-label": "Filary opieki domowej",
    style: {
      display: 'flex',
      flexDirection: 'column',
      gap: 12
    }
  }, FILARY.map((p, i) => {
    const on = sel === i;
    return /*#__PURE__*/React.createElement("button", {
      key: p.name,
      role: "tab",
      "aria-selected": on,
      onClick: () => setSel(i),
      style: {
        position: 'relative',
        textAlign: 'left',
        width: '100%',
        cursor: 'pointer',
        overflow: 'hidden',
        background: on ? '#fff' : 'transparent',
        border: `1px solid ${on ? 'transparent' : 'var(--border)'}`,
        boxShadow: on ? 'var(--shadow-card)' : 'none',
        borderRadius: 14,
        padding: '18px 20px',
        transition: 'box-shadow var(--dur-med) var(--ease), background var(--dur-fast)'
      }
    }, /*#__PURE__*/React.createElement("span", {
      "aria-hidden": "true",
      style: {
        position: 'absolute',
        top: -6,
        right: 8,
        fontFamily: 'var(--font-serif)',
        fontWeight: 300,
        fontSize: 62,
        lineHeight: 1,
        color: on ? 'rgba(187,22,163,.10)' : 'var(--surface-muted)',
        pointerEvents: 'none'
      }
    }, String(i + 1).padStart(2, '0')), /*#__PURE__*/React.createElement("span", {
      style: {
        position: 'relative',
        display: 'flex',
        alignItems: 'center',
        gap: 10,
        marginBottom: 8
      }
    }, /*#__PURE__*/React.createElement("span", {
      style: {
        width: on ? 26 : 16,
        height: 2,
        background: 'var(--color-brand)',
        transition: 'width var(--dur-med) var(--ease)'
      }
    }), /*#__PURE__*/React.createElement("span", {
      style: {
        fontFamily: 'var(--font-sans)',
        fontSize: 10.5,
        fontWeight: 600,
        letterSpacing: '.16em',
        textTransform: 'uppercase',
        color: 'var(--text-muted)'
      }
    }, "Filar ", String(i + 1).padStart(2, '0'))), /*#__PURE__*/React.createElement("span", {
      style: {
        position: 'relative',
        display: 'block',
        fontFamily: 'var(--font-serif)',
        fontWeight: 500,
        fontSize: 18,
        color: on ? 'var(--color-brand)' : 'var(--text-primary)'
      }
    }, p.name));
  })), /*#__PURE__*/React.createElement("div", {
    key: sel,
    className: "psod-fade",
    role: "tabpanel",
    style: {
      background: '#fff',
      borderRadius: 18,
      boxShadow: 'var(--shadow-card)',
      padding: 'clamp(28px,4vw,44px)'
    }
  }, /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 500,
      fontSize: 'clamp(22px,2.6vw,30px)',
      color: 'var(--text-primary)',
      margin: '0 0 16px'
    }
  }, f.name), /*#__PURE__*/React.createElement("p", {
    style: {
      fontFamily: 'var(--font-sans)',
      fontSize: 16,
      lineHeight: 1.8,
      color: 'var(--text-primary)',
      margin: '0 0 22px'
    }
  }, f.intro), /*#__PURE__*/React.createElement("div", null, f.bullets.map((b, i) => /*#__PURE__*/React.createElement("div", {
    key: i,
    style: {
      display: 'flex',
      gap: 12,
      marginBottom: 12
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      color: 'var(--color-brand)',
      lineHeight: 1.75,
      flexShrink: 0
    }
  }, "\u2022"), /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-sans)',
      fontSize: 15,
      lineHeight: 1.75,
      color: 'var(--text-secondary)'
    }
  }, b))))))));
}
function About() {
  const [open, setOpen] = React.useState(false);
  return /*#__PURE__*/React.createElement("section", {
    style: {
      padding: '104px 0',
      background: '#fff',
      textAlign: 'center'
    }
  }, /*#__PURE__*/React.createElement(Wrap, {
    style: {
      maxWidth: 820
    }
  }, /*#__PURE__*/React.createElement("img", {
    src: "../../assets/mark-fiolet.png",
    alt: "",
    style: {
      width: 46,
      height: 46,
      display: 'block',
      margin: '0 auto 30px'
    }
  }), /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(28px,4vw,46px)',
      lineHeight: 1.25,
      color: 'var(--text-primary)',
      marginBottom: 26
    }
  }, "Polskie Stowarzyszenie Opieki Domowej"), /*#__PURE__*/React.createElement("p", {
    style: {
      fontSize: 17,
      lineHeight: 1.85,
      color: 'var(--text-secondary)',
      maxWidth: 680,
      margin: '0 auto'
    }
  }, /*#__PURE__*/React.createElement("b", {
    style: {
      color: 'var(--text-primary)',
      fontWeight: 500
    }
  }, "jest zwi\u0105zkiem pracodawc\xF3w"), " zrzeszaj\u0105cym polskie firmy oferuj\u0105ce us\u0142ugi d\u0142ugoterminowej opieki domowej dla os\xF3b niesamodzielnych. PSOD wspiera zrzeszonych pracodawc\xF3w poprzez dzia\u0142ania na rzecz przejrzystej legislacji tworz\u0105cej warunki sprzyjaj\u0105ce uczciwej konkurencji z uwzgl\u0119dnieniem interes\xF3w personelu i pacjent\xF3w oraz dbanie o dobre imi\u0119 bran\u017Cy opieku\u0144czej poprzez upowszechnianie rzetelnej wiedzy na jej temat."), open && /*#__PURE__*/React.createElement("p", {
    style: {
      fontSize: 17,
      lineHeight: 1.85,
      color: 'var(--text-secondary)',
      maxWidth: 680,
      margin: '14px auto 0'
    }
  }, /*#__PURE__*/React.createElement("b", {
    style: {
      color: 'var(--text-primary)',
      fontWeight: 500
    }
  }, "Kim s\u0105 Cz\u0142onkowie PSOD?"), " Nasi cz\u0142onkowie to przede wszystkim ma\u0142e rodzinne firmy. Ich dzia\u0142alno\u015B\u0107 jest przyk\u0142adem sukcesu polskiej przedsi\u0119biorczo\u015Bci i pracowito\u015Bci. Dlatego w ramach PSOD chcemy wspiera\u0107 i promowa\u0107 polskich pracodawc\xF3w \u015Bwiadcz\u0105cych us\u0142ugi opieki w Polsce i za granic\u0105, a tak\u017Ce reprezentowa\u0107 ich interesy wobec instytucji krajowych i zagranicznych, decydent\xF3w oraz medi\xF3w."), /*#__PURE__*/React.createElement("a", {
    href: "#",
    onClick: e => {
      e.preventDefault();
      setOpen(!open);
    },
    style: {
      display: 'inline-flex',
      alignItems: 'center',
      gap: 10,
      marginTop: 36,
      fontSize: 14,
      fontWeight: 500,
      color: 'var(--color-brand)',
      textDecoration: 'none'
    }
  }, open ? 'zwiń' : 'czytaj więcej', " ", /*#__PURE__*/React.createElement("span", null, "\u2192"))));
}
function Priorities() {
  const prio = [['Likwidacja barier w opiece transgranicznej', 'cool'], ['Ustanowienie standardów w opiece domowej', 'warm'], ['Ograniczenie szarej strefy', 'warm'], ['Likwidacja barier prawnych i administracyjnych', 'cool']];
  return /*#__PURE__*/React.createElement("section", {
    style: {
      background: 'var(--surface-muted)',
      padding: '100px 0'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1120,
      margin: '0 auto',
      padding: '0 28px'
    }
  }, /*#__PURE__*/React.createElement(SectionHead, {
    title: "Nasze priorytety",
    intro: "Przysz\u0142o\u015B\u0107 opieki domowej zaczyna si\u0119 dzi\u015B. Oto kluczowe obszary dzia\u0142a\u0144 Polskiego Stowarzyszenia Opieki Domowej."
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: 'repeat(4,1fr)',
      gap: 18,
      maxWidth: 1160,
      margin: '56px auto 0'
    }
  }, prio.map(([t, tone]) => /*#__PURE__*/React.createElement("a", {
    key: t,
    href: "#",
    style: {
      position: 'relative',
      aspectRatio: '4/5',
      borderRadius: 14,
      overflow: 'hidden',
      display: 'flex',
      alignItems: 'flex-end',
      textDecoration: 'none',
      isolation: 'isolate'
    }
  }, /*#__PURE__*/React.createElement(GrayFrame, {
    ratio: "4/5",
    radius: 14,
    tone: tone,
    style: {
      position: 'absolute',
      inset: 0
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'absolute',
      inset: 0,
      background: 'linear-gradient(180deg,rgba(187,22,163,0) 30%,rgba(187,22,163,.35) 52%,rgba(187,22,163,.86))'
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      padding: '26px 24px 28px',
      position: 'relative',
      zIndex: 1
    }
  }, /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-sans)',
      fontWeight: 600,
      fontSize: 17,
      lineHeight: 1.3,
      color: '#fff',
      margin: 0
    }
  }, t))))), /*#__PURE__*/React.createElement("div", {
    style: {
      textAlign: 'center',
      marginTop: 52
    }
  }, /*#__PURE__*/React.createElement(Button, {
    uppercase: true,
    href: "#"
  }, "Wi\u0119cej"))));
}
function ActTile({
  title,
  children
}) {
  const [h, setH] = React.useState(false);
  return /*#__PURE__*/React.createElement("a", {
    href: "#",
    onMouseEnter: () => setH(true),
    onMouseLeave: () => setH(false),
    style: {
      display: 'flex',
      flexDirection: 'column',
      alignItems: 'center',
      justifyContent: 'center',
      gap: 18,
      minHeight: 180,
      background: '#fff',
      textDecoration: 'none',
      border: `1px solid ${h ? 'var(--color-brand)' : 'var(--border)'}`,
      borderRadius: 14,
      boxShadow: h ? 'var(--shadow-card)' : 'none',
      transform: h ? 'translateY(-2px)' : 'none',
      transition: 'border-color var(--dur-fast), box-shadow var(--dur-med) var(--ease), transform var(--dur-med) var(--ease)'
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      color: 'var(--color-brand)',
      height: 48,
      display: 'grid',
      placeItems: 'center'
    }
  }, children), /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-sans)',
      fontWeight: 600,
      fontSize: 18,
      color: 'var(--color-brand)'
    }
  }, title));
}
const IcoEdukacja = /*#__PURE__*/React.createElement("svg", {
  width: "46",
  height: "46",
  viewBox: "0 0 24 24",
  fill: "none",
  stroke: "currentColor",
  strokeWidth: 1.7,
  strokeLinecap: "round",
  strokeLinejoin: "round"
}, /*#__PURE__*/React.createElement("path", {
  d: "M22 10v6M2 10l10-5 10 5-10 5z"
}), /*#__PURE__*/React.createElement("path", {
  d: "M6 12v5c3 3 9 3 12 0v-5"
}));
const IcoReprezentowanie = /*#__PURE__*/React.createElement("svg", {
  width: "46",
  height: "46",
  viewBox: "0 0 24 24",
  fill: "none",
  stroke: "currentColor",
  strokeWidth: 1.7,
  strokeLinecap: "round",
  strokeLinejoin: "round"
}, /*#__PURE__*/React.createElement("line", {
  x1: "3",
  x2: "21",
  y1: "22",
  y2: "22"
}), /*#__PURE__*/React.createElement("line", {
  x1: "6",
  x2: "6",
  y1: "18",
  y2: "11"
}), /*#__PURE__*/React.createElement("line", {
  x1: "10",
  x2: "10",
  y1: "18",
  y2: "11"
}), /*#__PURE__*/React.createElement("line", {
  x1: "14",
  x2: "14",
  y1: "18",
  y2: "11"
}), /*#__PURE__*/React.createElement("line", {
  x1: "18",
  x2: "18",
  y1: "18",
  y2: "11"
}), /*#__PURE__*/React.createElement("polygon", {
  points: "12 2 20 7 4 7"
}));
function Activity() {
  return /*#__PURE__*/React.createElement("section", {
    style: {
      padding: '110px 0',
      background: '#fff'
    }
  }, /*#__PURE__*/React.createElement(Wrap, null, /*#__PURE__*/React.createElement(SectionHead, {
    title: "Nasza dzia\u0142alno\u015B\u0107",
    intro: "Polskie Stowarzyszenie Opieki Domowej dzia\u0142a na styku wielu dziedzin w celu zapewnienia maksymalnych korzy\u015Bci swoim cz\u0142onkom. Przede wszystkim chcemy wp\u0142ywa\u0107 na ukszta\u0142towanie przyjaznego \u015Brodowiska politycznego, spo\u0142ecznego i prawnego, kt\xF3re b\u0119dzie wspiera\u0142o legalne i efektywne \u015Bwiadczenie us\u0142ug opieki domowej."
  }), /*#__PURE__*/React.createElement("p", {
    style: {
      textAlign: 'center',
      color: 'var(--text-secondary)',
      fontSize: 15,
      margin: '12px auto 44px'
    }
  }, "W tym celu podejmujemy nast\u0119puj\u0105ce dzia\u0142ania:"), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: 'repeat(auto-fit,minmax(200px,1fr))',
      gap: 22,
      maxWidth: 820,
      margin: '0 auto'
    }
  }, /*#__PURE__*/React.createElement(ActTile, {
    title: "Edukacja"
  }, IcoEdukacja), /*#__PURE__*/React.createElement(ActTile, {
    title: "Doradztwo"
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontSize: 48,
      fontWeight: 400,
      lineHeight: 1
    }
  }, "\xA7")), /*#__PURE__*/React.createElement(ActTile, {
    title: "Reprezentowanie"
  }, IcoReprezentowanie))));
}
const MITY = [{
  t: 'Opiekunowie domowi pracują 24h na dobę',
  f: [/*#__PURE__*/React.createElement("p", {
    key: "1"
  }, "Faktem jest, \u017Ce opiekunowie domowi maj\u0105 zapewnione zakwaterowanie w domu podopiecznego, wi\u0119c w zasadzie przebywaj\u0105 w miejscu pracy 24h na dob\u0119. Nie jest jednak prawd\u0105, \u017Ce przez ca\u0142y ten czas wykonuj\u0105 prac\u0119. Profesjonalna firma opieku\u0144cza powinna ustali\u0107 z opiekunem zakres czynno\u015Bci i obowi\u0105zk\xF3w, kt\xF3ry obejmuje wy\u0142\u0105cznie czynno\u015Bci, kt\xF3rych bezpo\u015Brednim beneficjentem jest osoba podopieczna. Zlecenia nie mog\u0105 zak\u0142ada\u0107 pomocy choremu \u201Enon stop\u201D.")]
}, {
  t: 'Usługi opieki domowej świadczą Agencje Pracy Tymczasowej',
  f: [/*#__PURE__*/React.createElement("p", {
    key: "1"
  }, /*#__PURE__*/React.createElement("em", {
    style: {
      fontStyle: 'italic'
    }
  }, "[Do uzupe\u0142nienia \u2014 oryginalna strona nie zawiera tekstu faktu dla tego mitu. Tre\u015B\u0107 do dostarczenia przez PSOD.]"))]
}, {
  t: 'Opiekunowie domowi nie muszą mieć kompetencji',
  f: [/*#__PURE__*/React.createElement("p", {
    key: "1"
  }, "Takie stwierdzenie jest krzywdz\u0105ce dla opiekun\xF3w i mo\u017Ce by\u0107 niebezpieczne dla podopiecznych. Nie ka\u017Cdy mo\u017Ce zosta\u0107 opiekunem domowym \u2014 profesjonalne firmy zwracaj\u0105 uwag\u0119 na szereg cech, kompetencji i predyspozycji. Kluczowe s\u0105 umiej\u0119tno\u015Bci praktyczne obejmuj\u0105ce codzienn\u0105 opiek\u0119 i piel\u0119gnacj\u0119, wiedza o procesie starzenia i demencji, a tak\u017Ce empatia, cierpliwo\u015B\u0107, komunikatywno\u015B\u0107 i szacunek do drugiego cz\u0142owieka.")]
}, {
  t: 'Opieka nad osobą starszą to dobre zajęcie tylko dla kobiet 50+',
  f: [/*#__PURE__*/React.createElement("p", {
    key: "1"
  }, "Prawd\u0105 jest, \u017Ce w\u015Br\xF3d opiekun\xF3w zdecydowan\u0105 wi\u0119kszo\u015B\u0107 stanowi\u0105 kobiety, cz\u0119sto w grupie wiekowej 50+. Jednak w\u015Br\xF3d opiekun\xF3w coraz wi\u0119cej jest m\u0119\u017Cczyzn (ok. 10%) i os\xF3b m\u0142odych, kt\xF3re przyci\u0105ga misyjno\u015B\u0107 tego zawodu. Bior\u0105c pod uwag\u0119 tempo starzenia si\u0119 spo\u0142ecze\u0144stwa, opiekuna osoby starszej mo\u017Cna nazwa\u0107 zawodem przysz\u0142o\u015Bci.")]
}];
function Myths() {
  const [i, setI] = React.useState(0);
  const [seen, setSeen] = React.useState(() => new Set());
  const total = MITY.length;
  const next = () => setI((i + 1) % total);
  return /*#__PURE__*/React.createElement("section", {
    style: {
      background: 'var(--surface-care)',
      padding: '104px 0'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 820,
      margin: '0 auto',
      padding: '0 28px',
      textAlign: 'center'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      marginBottom: 14
    }
  }, /*#__PURE__*/React.createElement(Overline, {
    tone: "care"
  }, "Sprawd\u017A si\u0119 \u2014 zabawa edukacyjna")), /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(28px,3.6vw,44px)',
      lineHeight: 1.2,
      color: 'var(--text-primary)',
      margin: 0
    }
  }, "Prawda czy mit?"), /*#__PURE__*/React.createElement("p", {
    style: {
      color: 'var(--text-secondary)',
      fontSize: 16,
      lineHeight: 1.8,
      maxWidth: 620,
      margin: '18px auto 0'
    }
  }, "Wok\xF3\u0142 opieki domowej naros\u0142o wiele stereotyp\xF3w. Przeczytaj twierdzenie, zaufaj intuicji \u2014 a potem odkryj, czy to prawda, czy mit."), /*#__PURE__*/React.createElement("div", {
    style: {
      marginTop: 44,
      background: '#fff',
      borderRadius: 20,
      boxShadow: 'var(--shadow-raise)',
      padding: '48px 44px 40px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'center',
      gap: 10,
      marginBottom: 40
    }
  }, MITY.map((m, k) => /*#__PURE__*/React.createElement("button", {
    key: k,
    "aria-label": `Twierdzenie ${k + 1}`,
    onClick: () => setI(k),
    style: {
      width: seen.has(k) ? 22 : 9,
      height: 9,
      borderRadius: 999,
      border: 'none',
      padding: 0,
      cursor: 'pointer',
      background: k === i ? 'var(--color-brand)' : seen.has(k) ? 'rgba(187,22,163,.35)' : 'var(--border)',
      transition: 'all var(--dur-med) var(--ease)'
    }
  }))), /*#__PURE__*/React.createElement(MythTile, {
    key: i,
    myth: MITY[i].t,
    fact: MITY[i].f,
    onReveal: () => setSeen(s => new Set(s).add(i))
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      marginTop: 40,
      paddingTop: 28,
      borderTop: '1px solid var(--border)',
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'space-between',
      gap: 22,
      flexWrap: 'wrap'
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      fontSize: 12.5,
      color: 'var(--text-muted)'
    }
  }, "Odkryto ", seen.size, " z ", total), /*#__PURE__*/React.createElement(ArrowLink, {
    href: "#",
    color: "muted",
    onClick: e => {
      e.preventDefault();
      next();
    }
  }, "Nast\u0119pne twierdzenie")))));
}
function Providers() {
  const loga = ['ATERIMA MED', 'Bonumo', 'Bravecare', '[logo]', 'Egida', 'HCS', 'Interjob', '[logo]', 'Prohuman', 'Professional Care 24', 'SECAWO', 'SOS4U'];
  return /*#__PURE__*/React.createElement("section", {
    style: {
      padding: '110px 0',
      background: '#fff'
    }
  }, /*#__PURE__*/React.createElement(Wrap, null, /*#__PURE__*/React.createElement(SectionHead, {
    title: "Rekomendowani us\u0142ugodawcy"
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: 'repeat(4,1fr)',
      gap: 18,
      maxWidth: 920,
      margin: '52px auto 0'
    }
  }, loga.map((l, i) => /*#__PURE__*/React.createElement(Placeholder, {
    key: i,
    label: l,
    radius: 10
  }))), /*#__PURE__*/React.createElement("p", {
    style: {
      textAlign: 'center',
      color: 'var(--text-secondary)',
      fontSize: 12.5,
      marginTop: 26
    }
  }, "Loga do wpi\u0119cia z oryginalnej strony \u2014 placeholdery zgodnie z decyzj\u0105 o materia\u0142ach graficznych.")));
}
function Publications() {
  return /*#__PURE__*/React.createElement("section", {
    style: {
      background: 'var(--surface-muted)',
      padding: '100px 0'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1120,
      margin: '0 auto',
      padding: '0 28px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: '300px 1fr',
      gap: 56,
      alignItems: 'start'
    }
  }, /*#__PURE__*/React.createElement(Placeholder, {
    label: "ok\u0142adka do wpi\u0119cia",
    radius: 10,
    style: {
      aspectRatio: '3/4',
      position: 'sticky',
      top: 100
    }
  }), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 12.5,
      fontWeight: 500,
      color: 'var(--text-secondary)',
      opacity: .85,
      marginBottom: 12
    }
  }, "Polskie Stowarzyszenie Opieki Domowej \xB7 13 marca 2024"), /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 400,
      fontSize: 'clamp(21px,2.4vw,29px)',
      lineHeight: 1.35,
      color: 'var(--text-primary)',
      marginBottom: 22
    }
  }, "Raport \u201EWyzwania bran\u017Cy opieki domowej 2024\u201D"), /*#__PURE__*/React.createElement("p", {
    style: {
      fontSize: 15.5,
      lineHeight: 1.85,
      color: 'var(--text-secondary)',
      marginBottom: 16
    }
  }, "W niniejszym opracowaniu przygl\u0105damy si\u0119 us\u0142ugom opieki d\u0142ugoterminowej, \u015Bwiadczonym przez cudzoziemc\xF3w w prywatnych gospodarstwach domowych. Zgodnie z definicj\u0105 \u015Awiatowej Organizacji Zdrowia, opieka d\u0142ugoterminowa obejmuje zar\xF3wno wsparcie o charakterze spo\u0142ecznym (pomoc w codziennych czynno\u015Bciach, towarzyszenie), jak i us\u0142ugi medyczne dedykowane osobom, kt\xF3re przez d\u0142u\u017Cszy okres s\u0105 zale\u017Cne od innych. Opieka ta mo\u017Ce by\u0107 realizowana w plac\xF3wkach stacjonarnych, takich jak domy opieki, ale tak\u017Ce w prywatnych mieszkaniach i domach podopiecznych, co stanowi esencj\u0119 opieki domowej."), /*#__PURE__*/React.createElement("p", {
    style: {
      fontSize: 15.5,
      lineHeight: 1.85,
      color: 'var(--text-secondary)',
      marginBottom: 16
    }
  }, "Raport koncentruje si\u0119 na opiece domowej nad osobami starszymi (60+), z naciskiem na rol\u0119 pracownik\xF3w cudzoziemskich. Sektor opieki nad seniorami b\u0119dzie odgrywa\u0142 coraz wi\u0119ksz\u0105 rol\u0119 w nadchodz\u0105cych latach, a zapotrzebowanie na zagranicznych opiekun\xF3w b\u0119dzie ros\u0142o. Mimo zmieniaj\u0105cej si\u0119 dynamiki na rynku pracy w Europie, przewiduje si\u0119, \u017Ce migracje opieku\u0144cze pozostan\u0105 istotnym zjawiskiem. Chocia\u017C sytuacja w Polsce ulega poprawie, a r\xF3\u017Cnice w zarobkach si\u0119 zmniejszaj\u0105, nie nale\u017Cy spodziewa\u0107 si\u0119 gwa\u0142townego zahamowania trendu zatrudniania cudzoziemc\xF3w do opieki nad osobami starszymi."), /*#__PURE__*/React.createElement("p", {
    style: {
      fontSize: 15.5,
      lineHeight: 1.85,
      color: 'var(--text-secondary)',
      marginBottom: 32
    }
  }, "Jednocze\u015Bnie, z biegiem czasu mo\u017Cemy obserwowa\u0107 zmiany w kierunkach migracji opieku\u0144czych. Na przyk\u0142ad, malej\u0105ce zainteresowanie migracj\u0105 z Polski do Niemiec jest efektem poprawiaj\u0105cej si\u0119 sytuacji gospodarczej w Polsce. Zmniejszaj\u0105ca si\u0119 r\xF3\u017Cnica w zarobkach sprawia, \u017Ce cz\u0119\u015B\u0107 personelu opieku\u0144czego mo\u017Ce uzna\u0107, \u017Ce strategia mobilno\u015Bci staje si\u0119 mniej atrakcyjna finansowo."), /*#__PURE__*/React.createElement(Button, {
    href: "#"
  }, "Zobacz raport")))));
}
function Training() {
  return /*#__PURE__*/React.createElement("section", {
    style: {
      padding: '110px 0',
      background: 'var(--surface-muted)'
    }
  }, /*#__PURE__*/React.createElement(Wrap, null, /*#__PURE__*/React.createElement(SectionHead, {
    title: "Oferta szkoleniowa",
    intro: "Oferta szkole\u0144 i warsztat\xF3w na temat bran\u017Cy opieki domowej."
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: '1fr 1fr',
      gap: 22,
      maxWidth: 860,
      margin: '44px auto 64px'
    }
  }, [['Europejski Kongres Mobilności Pracy 2023'], ['Szkolenie i wsparcie opiekunek i opiekunów oraz standaryzacja jakości usług opieki domowej']].map(([t], i) => /*#__PURE__*/React.createElement("a", {
    key: i,
    href: "#",
    style: {
      display: 'block',
      background: '#fff',
      border: '1px solid var(--border)',
      borderRadius: 12,
      padding: 26,
      textDecoration: 'none',
      color: 'var(--text-primary)'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      marginBottom: 10
    }
  }, /*#__PURE__*/React.createElement(Tag, null, "szkolenie")), /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-sans)',
      fontSize: 17,
      lineHeight: 1.45,
      margin: 0,
      fontWeight: 600
    }
  }, t))))));
}
function Newsletter() {
  return /*#__PURE__*/React.createElement("section", {
    style: {
      padding: '96px 0',
      background: '#fff'
    }
  }, /*#__PURE__*/React.createElement(Wrap, null, /*#__PURE__*/React.createElement(NewsletterForm, null)));
}
function Faq() {
  const qa = [['Czym jest PSOD?', 'PSOD jest związkiem pracodawców zrzeszającym polskie firmy oferujące usługi opieki domowej dla seniorów.'], ['Z jakich źródeł finansowana jest działalność PSOD?', 'Nasza działalność finansowana jest ze składek członkowskich oraz darowizn.'], ['Kim są nasi Członkowie?', 'Organizacja reprezentuje obecnie 16 usługodawców zatrudniających w sumie 6500 opiekunów. Członkiem mogą zostać firmy i stowarzyszenia działające na obszarze RP, zatrudniające co najmniej jedną osobę, których zakres działalności obejmuje opiekę domową nad osobami starszymi.'], ['Dlaczego warto być naszym Członkiem?', 'Chcemy wspierać i promować polskich pracodawców świadczących usługi opieki w Polsce i za granicą oraz reprezentować ich interesy wobec instytucji krajowych i zagranicznych, decydentów oraz mediów. Głównym postulatem jest wprowadzenie w Polsce obligatoryjnego rejestru usługodawców w obszarze opieki domowej.'], ['Jakie są rodzaje i koszt członkostwa?', 'Statut PSOD przewiduje jeden rodzaj członkostwa. Składka członkowska wynosi 1045,00 zł miesięcznie.'], ['Jak zostać Członkiem PSOD?', 'Wystarczy wypełnić deklarację członkowską. O przyjęciu w poczet Członków Stowarzyszenia formalnie decyduje Zarząd w formie uchwały.']];
  return /*#__PURE__*/React.createElement("section", {
    style: {
      padding: '110px 0',
      background: '#fff'
    }
  }, /*#__PURE__*/React.createElement(Wrap, null, /*#__PURE__*/React.createElement("div", {
    style: {
      textAlign: 'center',
      marginBottom: 48
    }
  }, /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(28px,3.6vw,44px)',
      lineHeight: 1.2,
      color: 'var(--text-primary)',
      margin: 0
    }
  }, "Pytania i odpowiedzi")), /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 760,
      margin: '0 auto'
    }
  }, qa.map(([q, a], i) => /*#__PURE__*/React.createElement(FaqItem, {
    key: i,
    question: q,
    defaultOpen: i === 0
  }, a)))));
}
function JoinCta() {
  return /*#__PURE__*/React.createElement("section", {
    id: "dolacz",
    style: {
      position: 'relative',
      overflow: 'hidden',
      display: 'grid',
      placeItems: 'center',
      padding: '110px 28px'
    }
  }, /*#__PURE__*/React.createElement("img", {
    src: "../../assets/photo-opieka-01.jpeg",
    alt: "",
    style: {
      position: 'absolute',
      inset: 0,
      width: '100%',
      height: '100%',
      objectFit: 'cover',
      filter: 'grayscale(1) brightness(1.02) contrast(.95)'
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'absolute',
      inset: 0,
      background: 'rgba(74,75,82,.28)'
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'relative',
      background: 'var(--color-brand)',
      color: '#fff',
      maxWidth: 780,
      width: '100%',
      textAlign: 'center',
      padding: 'clamp(40px,6vw,72px) clamp(28px,5vw,64px)'
    }
  }, /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(30px,4vw,50px)',
      lineHeight: 1.25,
      margin: 0
    }
  }, "Zadbajmy o to razem."), /*#__PURE__*/React.createElement("p", {
    style: {
      margin: '24px auto 36px',
      color: 'rgba(255,255,255,.9)',
      fontSize: 16.5,
      lineHeight: 1.8,
      maxWidth: 560
    }
  }, "PSOD zrzesza firmy opieki domowej, by wsp\xF3lnie reprezentowa\u0107 bran\u017C\u0119 wobec decydent\xF3w i medi\xF3w \u2014 w Polsce i w Unii Europejskiej. Im wi\u0119cej pracodawc\xF3w z nami dzia\u0142a, tym skuteczniej chronimy interesy opiekun\xF3w i senior\xF3w oraz budujemy standardy godnej opieki."), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      gap: 14,
      justifyContent: 'center',
      flexWrap: 'wrap'
    }
  }, /*#__PURE__*/React.createElement("a", {
    href: "#",
    style: {
      display: 'inline-block',
      background: '#fff',
      color: 'var(--color-brand)',
      fontFamily: 'var(--font-sans)',
      fontWeight: 600,
      fontSize: 15,
      textDecoration: 'none',
      padding: '16px 34px',
      borderRadius: 'var(--radius-pill)'
    }
  }, "Do\u0142\u0105cz do PSOD"), /*#__PURE__*/React.createElement("a", {
    href: "#",
    style: {
      display: 'inline-block',
      background: 'transparent',
      color: '#fff',
      fontFamily: 'var(--font-sans)',
      fontWeight: 500,
      fontSize: 15,
      textDecoration: 'none',
      padding: '16px 34px',
      borderRadius: 'var(--radius-pill)',
      border: '1.5px solid rgba(255,255,255,.7)'
    }
  }, "Wesprzyj nasze dzia\u0142ania"))));
}
Object.assign(window, {
  Pillars,
  About,
  Priorities,
  Activity,
  Myths,
  Providers,
  Publications,
  Training,
  Newsletter,
  Faq,
  JoinCta
});
})(); } catch (e) { __ds_ns.__errors.push({ path: "design_handoff_psod_website/ui_kit/home-b.jsx", error: String((e && e.message) || e) }); }

// design_handoff_psod_website/ui_kit/site-chrome.jsx
try { (() => {
/* PSOD — chrome strony + pomocnicze. Eksport do window. */
const {
  Button,
  ArrowLink,
  Overline
} = window.PSODDesignSystem_ecebba;

/* Wspólny kontener treści */
function Wrap({
  children,
  style
}) {
  return /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1140,
      margin: '0 auto',
      padding: '0 32px',
      ...style
    }
  }, children);
}

/* Ramka „zdjęcia" — grayscale tonalny placeholder (żaden stock bez licencji).
   Oddaje brandowe traktowanie kadrów: chłodna szarość, miękkie narożniki. */
function GrayFrame({
  ratio = '3/2',
  radius = 18,
  label,
  tone = 'cool',
  style
}) {
  const grads = {
    cool: 'linear-gradient(135deg,#EDEDEF 0%,#DDDEE2 55%,#CFD3D8 100%)',
    warm: 'linear-gradient(135deg,#EFEDEC 0%,#E2DFDD 60%,#D4D0CD 100%)',
    care: 'linear-gradient(135deg,#EEF3F5 0%,#DCE7EC 100%)'
  };
  return /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'relative',
      aspectRatio: ratio,
      borderRadius: radius,
      overflow: 'hidden',
      background: grads[tone],
      ...style
    }
  }, label && /*#__PURE__*/React.createElement("span", {
    style: {
      position: 'absolute',
      left: 14,
      bottom: 12,
      fontFamily: 'var(--font-sans)',
      fontSize: 10.5,
      fontWeight: 600,
      letterSpacing: '.1em',
      textTransform: 'uppercase',
      color: '#A8A9B0'
    }
  }, label));
}

/* Nagłówek sekcji: opcjonalny nadtytuł + tytuł Fraunces + opcjonalny intro */
function SectionHead({
  overline,
  overlineTone,
  title,
  intro,
  align = 'center',
  titleSize = 'var(--fs-display-2)'
}) {
  return /*#__PURE__*/React.createElement("div", {
    style: {
      textAlign: align,
      maxWidth: align === 'center' ? 720 : 'none',
      margin: align === 'center' ? '0 auto' : 0
    }
  }, overline && /*#__PURE__*/React.createElement("div", {
    style: {
      marginBottom: 14
    }
  }, /*#__PURE__*/React.createElement(Overline, {
    tone: overlineTone
  }, overline)), /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: titleSize,
      lineHeight: 1.2,
      color: 'var(--text-primary)',
      margin: 0
    }
  }, title), intro && /*#__PURE__*/React.createElement("p", {
    style: {
      color: 'var(--text-secondary)',
      fontSize: 16,
      lineHeight: 1.8,
      maxWidth: 720,
      margin: '18px auto 0'
    }
  }, intro));
}
function Header() {
  return /*#__PURE__*/React.createElement("header", {
    style: {
      background: 'rgba(255,255,255,.92)',
      backdropFilter: 'blur(10px)',
      borderBottom: '1px solid var(--border)',
      position: 'sticky',
      top: 0,
      zIndex: 100
    }
  }, /*#__PURE__*/React.createElement(Wrap, {
    style: {
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'space-between',
      paddingTop: 18,
      paddingBottom: 18
    }
  }, /*#__PURE__*/React.createElement("a", {
    href: "#",
    style: {
      display: 'flex',
      alignItems: 'center',
      gap: 14,
      textDecoration: 'none'
    }
  }, /*#__PURE__*/React.createElement("img", {
    src: "../../assets/psod-mark.jpg",
    alt: "PSOD",
    style: {
      width: 48,
      height: 48,
      borderRadius: 10,
      display: 'block'
    }
  }), /*#__PURE__*/React.createElement("span", {
    style: {
      color: 'var(--color-brand)',
      fontWeight: 600,
      fontSize: 13.5,
      lineHeight: 1.35,
      letterSpacing: '.04em',
      textTransform: 'uppercase',
      fontFamily: 'var(--font-sans)'
    }
  }, "Polskie Stowarzyszenie", /*#__PURE__*/React.createElement("br", null), "Opieki Domowej")), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      alignItems: 'center',
      gap: 28
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      fontSize: 14,
      fontWeight: 500,
      color: 'var(--text-secondary)',
      fontFamily: 'var(--font-sans)'
    }
  }, /*#__PURE__*/React.createElement("b", {
    style: {
      color: 'var(--color-brand)',
      fontWeight: 600
    }
  }, "PL"), " | DE | EN"), /*#__PURE__*/React.createElement("div", {
    style: {
      width: 30,
      display: 'flex',
      flexDirection: 'column',
      gap: 6,
      cursor: 'pointer',
      padding: '4px 0'
    }
  }, /*#__PURE__*/React.createElement("i", {
    style: {
      height: 2,
      background: 'var(--text-primary)',
      borderRadius: 2
    }
  }), /*#__PURE__*/React.createElement("i", {
    style: {
      height: 2,
      width: '65%',
      background: 'var(--text-primary)',
      borderRadius: 2
    }
  }), /*#__PURE__*/React.createElement("i", {
    style: {
      height: 2,
      background: 'var(--text-primary)',
      borderRadius: 2
    }
  })))));
}
function Footer() {
  const linkStyle = {
    color: 'var(--psod-stopka-tekst)',
    textDecoration: 'none',
    display: 'block',
    marginBottom: 10
  };
  const h4 = {
    fontFamily: 'var(--font-sans)',
    fontWeight: 600,
    fontSize: 11.5,
    letterSpacing: '.18em',
    textTransform: 'uppercase',
    color: 'var(--psod-stopka-tekst-2)',
    marginBottom: 16
  };
  return /*#__PURE__*/React.createElement("footer", {
    style: {
      background: 'var(--surface-dark)',
      color: 'var(--psod-stopka-tekst)',
      padding: '64px 0 40px',
      fontSize: 13.5,
      fontFamily: 'var(--font-sans)'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1120,
      margin: '0 auto',
      padding: '0 28px',
      display: 'grid',
      gridTemplateColumns: '1.2fr 1fr 1fr',
      gap: 48
    }
  }, /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 400,
      fontSize: 19,
      color: '#fff',
      marginBottom: 14
    }
  }, "Polskie Stowarzyszenie Opieki Domowej"), /*#__PURE__*/React.createElement("p", {
    style: {
      lineHeight: 1.8,
      margin: 0
    }
  }, "Nowy \u015Awiat 54/56", /*#__PURE__*/React.createElement("br", null), "00-363 Warszawa", /*#__PURE__*/React.createElement("br", null), "www.polskaopieka.eu")), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("h4", {
    style: h4
  }, "Na skr\xF3ty"), ['Wyzwania cywilizacyjne', 'Nasze priorytety', 'Nasza działalność', 'Apel do rządu', 'Publikacje', 'Szkolenia', 'Q&A', 'Aktualności'].map(t => /*#__PURE__*/React.createElement("a", {
    key: t,
    href: "#",
    style: linkStyle
  }, t))), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("h4", {
    style: h4
  }, "Kontakt"), /*#__PURE__*/React.createElement("a", {
    href: "mailto:kontakt@polskaopieka.eu",
    style: linkStyle
  }, "kontakt@polskaopieka.eu"), /*#__PURE__*/React.createElement("a", {
    href: "tel:+48602194708",
    style: linkStyle
  }, "Ada Zaorska \xB7 +48 602 194 708"), /*#__PURE__*/React.createElement("a", {
    href: "tel:+48795586620",
    style: linkStyle
  }, "Anna Grodecka \xB7 +48 795 586 620"), /*#__PURE__*/React.createElement("a", {
    href: "#",
    style: linkStyle
  }, "LinkedIn"))), /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1120,
      margin: '52px auto 0',
      padding: '26px 28px 0',
      borderTop: '1px solid rgba(255,255,255,.12)',
      display: 'flex',
      justifyContent: 'space-between',
      gap: 16,
      flexWrap: 'wrap',
      fontSize: 12,
      color: 'var(--psod-stopka-tekst-2)'
    }
  }, /*#__PURE__*/React.createElement("span", null, "\xA9 2026 Polskie Stowarzyszenie Opieki Domowej"), /*#__PURE__*/React.createElement("span", null, "KRS 0000992066 \xB7 NIP 5252926975 \xB7 REGON 523338263")));
}
Object.assign(window, {
  Wrap,
  GrayFrame,
  SectionHead,
  Header,
  Footer
});
})(); } catch (e) { __ds_ns.__errors.push({ path: "design_handoff_psod_website/ui_kit/site-chrome.jsx", error: String((e && e.message) || e) }); }

// ui_kits/website/home-a.jsx
try { (() => {
/* PSOD — sekcje górne strony głównej. Eksport do window. */
const {
  Button,
  ArrowLink,
  Overline,
  Highlight,
  NewsCard
} = window.PSODDesignSystem_ecebba;
const {
  Wrap,
  GrayFrame,
  SectionHead
} = window;
function Hero() {
  return /*#__PURE__*/React.createElement("section", {
    style: {
      position: 'relative',
      minHeight: 500,
      maxHeight: '72vh',
      display: 'grid',
      placeItems: 'center',
      overflow: 'hidden',
      textAlign: 'center',
      background: '#EDEDEF'
    }
  }, /*#__PURE__*/React.createElement("img", {
    src: "../../assets/photo-opieka-01.jpeg",
    alt: "",
    style: {
      position: 'absolute',
      inset: 0,
      width: '100%',
      height: '100%',
      objectFit: 'cover',
      objectPosition: 'center 30%',
      filter: 'grayscale(1) brightness(1.05) contrast(.93)'
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'absolute',
      inset: 0,
      background: 'linear-gradient(rgba(246,246,247,.66),rgba(246,246,247,.44) 45%,rgba(246,246,247,.78))'
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'relative',
      zIndex: 2,
      maxWidth: 880,
      padding: '72px 28px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 11.5,
      fontWeight: 600,
      letterSpacing: '.26em',
      textTransform: 'uppercase',
      color: 'var(--text-secondary)',
      marginBottom: 26,
      fontFamily: 'var(--font-sans)'
    }
  }, "O staro\u015Bci, trosce i opiece"), /*#__PURE__*/React.createElement("h1", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(30px,4.4vw,52px)',
      lineHeight: 1.35,
      color: 'var(--text-primary)',
      margin: 0
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      display: 'block'
    }
  }, "Ka\u017Cdy z nas b\u0119dzie kiedy\u015B potrzebowa\u0142 ", /*#__PURE__*/React.createElement("em", {
    style: {
      fontStyle: 'italic',
      fontWeight: 400,
      color: 'var(--color-brand)'
    }
  }, "opieki"), "."), /*#__PURE__*/React.createElement("span", {
    style: {
      display: 'block'
    }
  }, "Albo b\u0119dzie j\u0105 komu\u015B zapewnia\u0142.")), /*#__PURE__*/React.createElement("div", {
    style: {
      width: 52,
      height: 1,
      background: 'var(--text-secondary)',
      opacity: .5,
      margin: '30px auto 0'
    }
  })));
}
function odmienLat(n) {
  if (n === 1) return 'rok';
  const d = n % 10,
    s = n % 100;
  if (d >= 2 && d <= 4 && !(s >= 12 && s <= 14)) return 'lata';
  return 'lat';
}
function Demography() {
  const TERAZ = 2026,
    HMIN = 1935,
    HMAX = 2075;
  const [rok, setRok] = React.useState(1980);
  const proc = r => (r - HMIN) / (HMAX - HMIN) * 100;
  const wiekDzis = TERAZ - rok,
    wiek2030 = 2030 - rok,
    rok60 = rok + 60;
  const pUr = proc(rok),
    pDzis = proc(TERAZ),
    p60 = proc(rok60);
  const rok65 = rok + 65;
  let wynik;
  const em = {
    fontStyle: 'normal',
    color: 'var(--color-brand)'
  };
  if (rok65 > TERAZ) wynik = /*#__PURE__*/React.createElement(React.Fragment, null, "W ", /*#__PURE__*/React.createElement("em", {
    style: em
  }, rok65), " roku sko\u0144czysz 65 lat. Wtedy w wieku emerytalnym b\u0119dzie ju\u017C niemal ", /*#__PURE__*/React.createElement("em", {
    style: em
  }, "jedna trzecia"), " Polak\xF3w \u2014 a wielu z nich b\u0119dzie potrzebowa\u0107 codziennej opieki.");else wynik = /*#__PURE__*/React.createElement(React.Fragment, null, "Masz ju\u017C za sob\u0105 ", /*#__PURE__*/React.createElement("em", {
    style: em
  }, "65. urodziny"), ". Nale\u017Cysz do pokolenia, kt\xF3re dzi\u015B najbardziej potrzebuje dobrze zorganizowanej opieki.");
  const fill = (rok - 1940) / (2012 - 1940) * 100;
  return /*#__PURE__*/React.createElement("section", {
    id: "gra",
    style: {
      background: '#fff',
      padding: '96px 0',
      textAlign: 'center'
    }
  }, /*#__PURE__*/React.createElement(Wrap, {
    style: {
      maxWidth: 1040
    }
  }, /*#__PURE__*/React.createElement("p", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(21px,2.6vw,30px)',
      color: 'var(--text-primary)',
      lineHeight: 1.5,
      margin: 0
    }
  }, "W kt\xF3rym roku si\u0119 urodzi\u0142a\u015B, urodzi\u0142e\u015B?"), /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 400,
      fontSize: 'clamp(52px,7vw,84px)',
      color: 'var(--color-brand)',
      marginTop: 20,
      lineHeight: 1,
      fontVariantNumeric: 'tabular-nums'
    }
  }, rok), /*#__PURE__*/React.createElement("input", {
    type: "range",
    min: 1940,
    max: 2012,
    value: rok,
    step: 1,
    "aria-label": "Rok urodzenia",
    onChange: e => setRok(parseInt(e.target.value, 10)),
    style: {
      width: '100%',
      maxWidth: 520,
      margin: '28px auto 0',
      display: 'block',
      WebkitAppearance: 'none',
      appearance: 'none',
      height: 2,
      borderRadius: 2,
      outline: 'none',
      background: `linear-gradient(to right,var(--color-brand) ${fill}%,var(--border) ${fill}%)`
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      justifyContent: 'space-between',
      maxWidth: 520,
      margin: '12px auto 0',
      fontSize: 12,
      color: 'var(--text-muted)'
    }
  }, /*#__PURE__*/React.createElement("span", null, "1940"), /*#__PURE__*/React.createElement("span", null, "2012")), /*#__PURE__*/React.createElement("p", {
    style: {
      maxWidth: 980,
      margin: '48px auto 0',
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(21px,2.6vw,30px)',
      lineHeight: 1.5,
      color: 'var(--text-primary)',
      minHeight: '2.6em'
    }
  }, wynik), /*#__PURE__*/React.createElement("p", {
    style: {
      marginTop: 44,
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(18px,2.1vw,24px)',
      color: 'var(--text-primary)',
      lineHeight: 1.9
    }
  }, /*#__PURE__*/React.createElement(Highlight, null, "Polska nie jest gotowa na ten czas.")), /*#__PURE__*/React.createElement("div", {
    style: {
      marginTop: 22
    }
  }, /*#__PURE__*/React.createElement(ArrowLink, {
    href: "#dolacz"
  }, "Pom\xF3\u017C nam to zmieni\u0107"))));
}
function Challenges() {
  const items = [{
    t: 'Starzenie się społeczeństw',
    tone: 'cool',
    img: '../../assets/photo-opieka-02.jpeg'
  }, {
    t: 'Choroby demencyjne',
    tone: 'warm'
  }, {
    t: 'Brak personelu opiekuńczego',
    tone: 'cool'
  }, {
    t: 'Rosnące koszty opieki',
    tone: 'warm'
  }];
  return /*#__PURE__*/React.createElement("section", {
    style: {
      padding: '100px 0',
      background: 'var(--surface-muted)'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1120,
      margin: '0 auto',
      padding: '0 28px'
    }
  }, /*#__PURE__*/React.createElement(SectionHead, {
    title: "Wyzwania cywilizacyjne",
    intro: "Spo\u0142ecze\u0144stwa si\u0119 starzej\u0105. Wed\u0142ug szacunk\xF3w WHO do 2030 roku jedna na sze\u015B\u0107 os\xF3b na \u015Bwiecie b\u0119dzie mia\u0142a co najmniej 60 lat. W 2021 roku 65 lat lub wi\u0119cej mia\u0142o ju\u017C 21% ludno\u015Bci Europy."
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: 'repeat(4,1fr)',
      gap: 22,
      marginTop: 56
    }
  }, items.map(({
    t,
    tone,
    img
  }) => /*#__PURE__*/React.createElement("a", {
    key: t,
    href: "#",
    style: {
      position: 'relative',
      aspectRatio: '1/1',
      borderRadius: 14,
      overflow: 'hidden',
      display: 'flex',
      alignItems: 'flex-end',
      textDecoration: 'none',
      isolation: 'isolate'
    }
  }, img ? /*#__PURE__*/React.createElement("img", {
    src: img,
    alt: "",
    style: {
      position: 'absolute',
      inset: 0,
      width: '100%',
      height: '100%',
      objectFit: 'cover',
      filter: 'grayscale(1) brightness(1.02) contrast(.95)'
    }
  }) : /*#__PURE__*/React.createElement(GrayFrame, {
    ratio: "1/1",
    radius: 14,
    tone: tone,
    style: {
      position: 'absolute',
      inset: 0
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'absolute',
      inset: 0,
      background: 'linear-gradient(180deg,rgba(74,75,82,.15),rgba(74,75,82,.55) 55%,rgba(74,75,82,.82))'
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      padding: '26px 24px 28px',
      position: 'relative',
      zIndex: 1
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      width: 28,
      height: 2,
      background: 'var(--color-brand)',
      marginBottom: 12
    }
  }), /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-sans)',
      fontWeight: 600,
      fontSize: 18,
      lineHeight: 1.3,
      color: '#fff',
      margin: 0
    }
  }, t)))))));
}
function Appeal() {
  return /*#__PURE__*/React.createElement("section", {
    style: {
      background: 'var(--surface-care)',
      padding: '104px 0'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1120,
      margin: '0 auto',
      padding: '0 28px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: '.82fr 1.18fr',
      gap: 64,
      alignItems: 'center'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      background: '#fff',
      padding: 34,
      borderRadius: 10,
      boxShadow: 'var(--shadow-doc)'
    }
  }, /*#__PURE__*/React.createElement(GrayFrame, {
    ratio: "3/4",
    radius: 4,
    tone: "cool",
    label: "stanowisko PSOD + KIDO"
  })), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(30px,4vw,50px)',
      lineHeight: 1.15,
      color: 'var(--text-primary)',
      margin: '0 0 16px'
    }
  }, "Apel do rz\u0105du"), /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 13,
      color: 'var(--text-secondary)',
      marginBottom: 8
    }
  }, "15 czerwca 2026"), /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 400,
      fontSize: 'clamp(19px,2.2vw,25px)',
      lineHeight: 1.35,
      color: 'var(--text-primary)',
      margin: '0 0 18px'
    }
  }, "Wsp\xF3lne stanowisko PSOD oraz KIDO"), /*#__PURE__*/React.createElement("p", {
    style: {
      fontSize: 16,
      lineHeight: 1.8,
      color: 'var(--text-secondary)',
      maxWidth: 560,
      marginBottom: 34
    }
  }, "Wsp\xF3lne stanowisko Polskiego Stowarzyszenia Opieki Domowej oraz Krajowej Izby Dom\xF3w Opieki w zwi\u0105zku z zawieszeniem prac nad rozporz\u0105dzeniem w sprawie wykazu okre\u015Blaj\u0105cego grupy zawod\xF3w, w kt\xF3rych wyst\u0119puj\u0105 niedobory kadrowe."), /*#__PURE__*/React.createElement(Button, {
    href: "#"
  }, "Pobierz")))));
}
function News() {
  const mini = [['Światowy Dzień Praw Osób Starszych. Czy Polska jest gotowa na nadchodzący kryzys opieki?', '15 czerwca 2026'], ['PSOD partnerem webinaru „Efektywna współpraca z Rodziną Podopiecznego w opiece nad Seniorami”', '2 czerwca 2026'], ['Dzień Opiekuna Osób Starszych. Zawód, od którego będzie zależeć bezpieczeństwo milionów seniorów', '15 maja 2026'], ['Bon senioralny to krok w dobrą stronę — ale nie zastąpi systemu opieki', '24 kwietnia 2026']];
  return /*#__PURE__*/React.createElement("section", {
    style: {
      padding: '100px 0',
      background: 'var(--surface-muted)'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1120,
      margin: '0 auto',
      padding: '0 28px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      alignItems: 'baseline',
      justifyContent: 'space-between',
      gap: 24,
      marginBottom: 52,
      flexWrap: 'wrap'
    }
  }, /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 400,
      fontSize: 'clamp(20px,2vw,26px)',
      lineHeight: 1.2,
      color: 'var(--text-primary)',
      margin: 0
    }
  }, "Aktualno\u015Bci")), /*#__PURE__*/React.createElement("a", {
    href: "#",
    style: {
      display: 'grid',
      gridTemplateColumns: '1.15fr .85fr',
      gap: 52,
      alignItems: 'center',
      textDecoration: 'none',
      color: 'inherit'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      aspectRatio: '16/10',
      borderRadius: 18,
      overflow: 'hidden',
      boxShadow: 'var(--shadow-raise)',
      background: 'var(--surface-muted)',
      border: '1.5px dashed var(--border)',
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'center'
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      fontSize: 10.5,
      fontWeight: 600,
      letterSpacing: '.1em',
      textTransform: 'uppercase',
      color: 'var(--text-secondary)'
    }
  }, "screenshot ok\u0142adki \u201EGazety Wyborczej\u201D")), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(22px,2.6vw,32px)',
      lineHeight: 1.4,
      color: 'var(--text-primary)',
      margin: '0 0 12px'
    }
  }, "Kryzys opieki senioralnej na ok\u0142adce \u201EGazety Wyborczej\u201D. Czas na konkretne dzia\u0142ania"), /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 12.5,
      color: 'var(--text-secondary)',
      opacity: .85,
      marginBottom: 20
    }
  }, "1 lipca 2026"), /*#__PURE__*/React.createElement("p", {
    style: {
      fontSize: 15,
      lineHeight: 1.75,
      color: 'var(--text-secondary)',
      margin: 0
    }
  }, "Temat, o kt\xF3rym m\xF3wimy od lat, trafi\u0142 na pierwsz\u0105 stron\u0119 og\xF3lnopolskiego dziennika. Rynek opieki senioralnej wymaga pilnych rozwi\u0105za\u0144 systemowych \u2014 komentujemy ok\u0142adkowy materia\u0142 i wskazujemy, od czego zacz\u0105\u0107."), /*#__PURE__*/React.createElement("span", {
    style: {
      display: 'inline-block',
      marginTop: 22,
      fontSize: 13.5,
      fontWeight: 500,
      color: 'var(--text-primary)',
      borderBottom: '1px solid var(--border)',
      paddingBottom: 4
    }
  }, "Czytaj dalej"))), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: '1fr 1fr',
      gap: 52,
      marginTop: 64,
      paddingTop: 56,
      borderTop: '1px solid var(--border)'
    }
  }, mini.map(([t, d]) => /*#__PURE__*/React.createElement(NewsCard, {
    key: t,
    layout: "mini",
    title: t,
    date: d
  })))));
}
function Seal() {
  return /*#__PURE__*/React.createElement("section", {
    style: {
      background: 'var(--surface-care)',
      padding: '128px 0',
      textAlign: 'center',
      position: 'relative',
      overflow: 'hidden'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'absolute',
      top: -34,
      left: '50%',
      transform: 'translateX(-50%)',
      fontFamily: 'var(--font-serif)',
      fontSize: 340,
      lineHeight: 1,
      color: 'rgba(94,140,160,.20)',
      pointerEvents: 'none'
    }
  }, "\u201E"), /*#__PURE__*/React.createElement(Wrap, {
    style: {
      maxWidth: 1080,
      position: 'relative'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'center',
      gap: 12,
      marginBottom: 30
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      width: 44,
      height: 1,
      background: 'var(--color-care)',
      opacity: .5
    }
  }), /*#__PURE__*/React.createElement("span", {
    style: {
      width: 7,
      height: 7,
      background: 'var(--color-brand)',
      transform: 'rotate(45deg)'
    }
  }), /*#__PURE__*/React.createElement("span", {
    style: {
      width: 44,
      height: 1,
      background: 'var(--color-care)',
      opacity: .5
    }
  })), /*#__PURE__*/React.createElement("blockquote", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(27px,3.8vw,44px)',
      lineHeight: 1.35,
      color: 'var(--text-primary)',
      margin: 0,
      textWrap: 'balance'
    }
  }, "Ka\u017Cdy ma prawo do przyst\u0119pnych cenowo i\xA0dobrej jako\u015Bci us\u0142ug opieki d\u0142ugoterminowej, ", /*#__PURE__*/React.createElement("em", {
    style: {
      fontStyle: 'italic',
      color: 'var(--color-brand)'
    }
  }, "w\xA0szczeg\xF3lno\u015Bci opieki\xA0w\xA0domu"), "."), /*#__PURE__*/React.createElement("div", {
    style: {
      marginTop: 34,
      fontSize: 11.5,
      letterSpacing: '.16em',
      textTransform: 'uppercase',
      color: 'var(--color-care)',
      fontWeight: 500
    }
  }, "18. zasada Europejskiego Filaru Praw Socjalnych")));
}
Object.assign(window, {
  Hero,
  Demography,
  Challenges,
  Appeal,
  News,
  Seal
});
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/website/home-a.jsx", error: String((e && e.message) || e) }); }

// ui_kits/website/home-b.jsx
try { (() => {
/* PSOD — sekcje dolne strony głównej. Eksport do window. */
const {
  Button,
  ArrowLink,
  Overline,
  Highlight,
  Tag,
  FilarCard,
  MythTile,
  FaqItem,
  NewsletterForm,
  Placeholder
} = window.PSODDesignSystem_ecebba;
const {
  Wrap,
  GrayFrame,
  SectionHead
} = window;
const FILARY = [{
  name: 'Wybór',
  intro: 'Oznacza zapewnienie podopiecznym prawa do dokonania wyboru sposobu, w jaki żyją i otrzymują opiekę. W szczególności:',
  bullets: ['wspieranie podopiecznych w zarządzaniu własnym zdrowiem i samopoczuciem,', 'zapewnienie podopiecznym i ich opiekunom wiedzy o prawie do uczestniczenia w opiece i dokonywania wyborów w tym zakresie,', 'zaangażowanie do podejmowania decyzji dotyczących opieki oraz możliwości wyboru i kontroli nad usługami, z których korzystają,', 'zlecanie usług, które zapewniają podopiecznym informacje i wsparcie w celu określenia i osiągnięcia wyników, które są dla nich ważne,', 'uwzględnienie świadomych preferencji podopiecznych']
}, {
  name: 'Bezpieczeństwo',
  intro: 'Opieka domowa musi być realizowane w sposób bezpieczny, obejmujący m.in.:',
  bullets: ['ocenę ryzyka poszczególnych czynności opiekuńczych dla zdrowia i bezpieczeństwa podopiecznego oraz podejmowanie wszelkich możliwych działań w celu zmniejszenia takiego ryzyka,', 'zapewnienie personelu opiekuńczego o odpowiednich kwalifikacjach, kompetencjach i doświadczeniu zapewniających bezpieczeństwo opieki,', 'zapewnienie bezpieczeństwa i zgodności z przeznaczeniem pomieszczeń i sprzętu używanego do opieki', 'zaspokojenie potrzeb podopiecznego w obszarze żywieniowym, nawodnienia i właściwe zarządzanie lekami,', 'ocena ryzyka, zapobiegania, wykrywania i kontroli nad rozprzestrzenianiem się zakażeń,', 'w przypadku, gdy odpowiedzialność za opiekę domową jest dzielona, zapewnienie współpracy na każdym etapie planowania i realizacji opieki.']
}, {
  name: 'Szacunek',
  intro: 'Zarówno osoby korzystające z usług opieki, jak i opiekunowie muszą być chronieni przed nadużyciami i traktowani z godnością oraz szacunkiem. Usługi opieki domowej nie mogą być świadczone w sposób, który:',
  bullets: ['dopuszcza dyskryminację, jest lekceważący lub poniżający,', 'obejmuje działania ograniczające autonomię i niezależność podopiecznych, które nie są niezbędne lub są nieproporcjonalną reakcją w stosunku do ryzyka powstania szkody dla podopiecznego, personelu lub innych osób', 'nie respektuje osobistej przestrzeni podopiecznego i opiekuna oraz prywatności i poufności dotyczącej osobistych informacji,', 'ograniczaja wolność w celu uzyskania opieki lub leczenia – opieka i leczenie muszą być zapewnione za zgodą podopiecznych lub ich prawnych opiekunów.']
}, {
  name: 'Ciągłość',
  intro: 'Opieka domowa wymaga:',
  bullets: ['zapewnienia podopiecznym prawa do zachowania ciągłości opieki, tj. nieprzerwanego świadczenia bez narażania ich na ryzyko przerwy w dostępie do opieki,', 'zachowania dokładnej, pełnej i aktualnej informacji (poprzez odpowiednią dokumentację) dotyczącej każdego podopiecznego oraz decyzji podjętych w odniesieniu do zapewnionej opieki,', 'zapewnienia możliwości spersonalizowanego długotrwałego planowania opieki']
}, {
  name: 'Indywidualne podejście',
  intro: 'Opieka domowa wymaga zatrudnienia odpowiedniej liczby wykwalifikowanego i otwartego na potrzeby podopiecznych personelu, w celu:',
  bullets: ['zapewnienia zakresu opieki dostosowanego do potrzeb i preferencji podopiecznych,', 'możliwości skupienia się na tym, co jest ważne dla podopiecznych w kontekście jakości ich życia, a nie tylko liście schorzeń lub objawów, które należy leczyć,', 'dbania o transparentność w relacjach oraz zakresie leczenia i świadczonej opieki,', 'zapewnienia skuteczności w rejestrowaniu, reagowaniu i rozwiązywaniu problemów zgłaszanych przez pacjentów, ich rodziny i personel.']
}];
function Pillars() {
  const [sel, setSel] = React.useState(0);
  const f = FILARY[sel];
  return /*#__PURE__*/React.createElement("section", {
    style: {
      background: 'var(--surface-muted)',
      padding: '100px 0'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1120,
      margin: '0 auto',
      padding: '0 28px'
    }
  }, /*#__PURE__*/React.createElement(SectionHead, {
    title: "Filary opieki domowej"
  }), /*#__PURE__*/React.createElement("div", {
    className: "psod-filary2",
    style: {
      marginTop: 52
    }
  }, /*#__PURE__*/React.createElement("div", {
    role: "tablist",
    "aria-label": "Filary opieki domowej",
    style: {
      display: 'flex',
      flexDirection: 'column',
      gap: 12
    }
  }, FILARY.map((p, i) => {
    const on = sel === i;
    return /*#__PURE__*/React.createElement("button", {
      key: p.name,
      role: "tab",
      "aria-selected": on,
      onClick: () => setSel(i),
      style: {
        position: 'relative',
        textAlign: 'left',
        width: '100%',
        cursor: 'pointer',
        overflow: 'hidden',
        background: on ? '#fff' : 'transparent',
        border: `1px solid ${on ? 'transparent' : 'var(--border)'}`,
        boxShadow: on ? 'var(--shadow-card)' : 'none',
        borderRadius: 14,
        padding: '18px 20px',
        transition: 'box-shadow var(--dur-med) var(--ease), background var(--dur-fast)'
      }
    }, /*#__PURE__*/React.createElement("span", {
      "aria-hidden": "true",
      style: {
        position: 'absolute',
        top: -6,
        right: 8,
        fontFamily: 'var(--font-serif)',
        fontWeight: 300,
        fontSize: 62,
        lineHeight: 1,
        color: on ? 'rgba(187,22,163,.10)' : 'var(--surface-muted)',
        pointerEvents: 'none'
      }
    }, String(i + 1).padStart(2, '0')), /*#__PURE__*/React.createElement("span", {
      style: {
        position: 'relative',
        display: 'flex',
        alignItems: 'center',
        gap: 10,
        marginBottom: 8
      }
    }, /*#__PURE__*/React.createElement("span", {
      style: {
        width: on ? 26 : 16,
        height: 2,
        background: 'var(--color-brand)',
        transition: 'width var(--dur-med) var(--ease)'
      }
    }), /*#__PURE__*/React.createElement("span", {
      style: {
        fontFamily: 'var(--font-sans)',
        fontSize: 10.5,
        fontWeight: 600,
        letterSpacing: '.16em',
        textTransform: 'uppercase',
        color: 'var(--text-muted)'
      }
    }, "Filar ", String(i + 1).padStart(2, '0'))), /*#__PURE__*/React.createElement("span", {
      style: {
        position: 'relative',
        display: 'block',
        fontFamily: 'var(--font-serif)',
        fontWeight: 500,
        fontSize: 18,
        color: on ? 'var(--color-brand)' : 'var(--text-primary)'
      }
    }, p.name));
  })), /*#__PURE__*/React.createElement("div", {
    key: sel,
    className: "psod-fade",
    role: "tabpanel",
    style: {
      background: '#fff',
      borderRadius: 18,
      boxShadow: 'var(--shadow-card)',
      padding: 'clamp(28px,4vw,44px)'
    }
  }, /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 500,
      fontSize: 'clamp(22px,2.6vw,30px)',
      color: 'var(--text-primary)',
      margin: '0 0 16px'
    }
  }, f.name), /*#__PURE__*/React.createElement("p", {
    style: {
      fontFamily: 'var(--font-sans)',
      fontSize: 16,
      lineHeight: 1.8,
      color: 'var(--text-primary)',
      margin: '0 0 22px'
    }
  }, f.intro), /*#__PURE__*/React.createElement("div", null, f.bullets.map((b, i) => /*#__PURE__*/React.createElement("div", {
    key: i,
    style: {
      display: 'flex',
      gap: 12,
      marginBottom: 12
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      color: 'var(--color-brand)',
      lineHeight: 1.75,
      flexShrink: 0
    }
  }, "\u2022"), /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-sans)',
      fontSize: 15,
      lineHeight: 1.75,
      color: 'var(--text-secondary)'
    }
  }, b))))))));
}
function About() {
  const [open, setOpen] = React.useState(false);
  return /*#__PURE__*/React.createElement("section", {
    style: {
      padding: '104px 0',
      background: '#fff',
      textAlign: 'center'
    }
  }, /*#__PURE__*/React.createElement(Wrap, {
    style: {
      maxWidth: 820
    }
  }, /*#__PURE__*/React.createElement("img", {
    src: "../../assets/mark-fiolet.png",
    alt: "",
    style: {
      width: 46,
      height: 46,
      display: 'block',
      margin: '0 auto 30px'
    }
  }), /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(28px,4vw,46px)',
      lineHeight: 1.25,
      color: 'var(--text-primary)',
      marginBottom: 26
    }
  }, "Polskie Stowarzyszenie Opieki Domowej"), /*#__PURE__*/React.createElement("p", {
    style: {
      fontSize: 17,
      lineHeight: 1.85,
      color: 'var(--text-secondary)',
      maxWidth: 680,
      margin: '0 auto'
    }
  }, /*#__PURE__*/React.createElement("b", {
    style: {
      color: 'var(--text-primary)',
      fontWeight: 500
    }
  }, "jest zwi\u0105zkiem pracodawc\xF3w"), " zrzeszaj\u0105cym polskie firmy oferuj\u0105ce us\u0142ugi d\u0142ugoterminowej opieki domowej dla os\xF3b niesamodzielnych. PSOD wspiera zrzeszonych pracodawc\xF3w poprzez dzia\u0142ania na rzecz przejrzystej legislacji tworz\u0105cej warunki sprzyjaj\u0105ce uczciwej konkurencji z uwzgl\u0119dnieniem interes\xF3w personelu i pacjent\xF3w oraz dbanie o dobre imi\u0119 bran\u017Cy opieku\u0144czej poprzez upowszechnianie rzetelnej wiedzy na jej temat."), open && /*#__PURE__*/React.createElement("p", {
    style: {
      fontSize: 17,
      lineHeight: 1.85,
      color: 'var(--text-secondary)',
      maxWidth: 680,
      margin: '14px auto 0'
    }
  }, /*#__PURE__*/React.createElement("b", {
    style: {
      color: 'var(--text-primary)',
      fontWeight: 500
    }
  }, "Kim s\u0105 Cz\u0142onkowie PSOD?"), " Nasi cz\u0142onkowie to przede wszystkim ma\u0142e rodzinne firmy. Ich dzia\u0142alno\u015B\u0107 jest przyk\u0142adem sukcesu polskiej przedsi\u0119biorczo\u015Bci i pracowito\u015Bci. Dlatego w ramach PSOD chcemy wspiera\u0107 i promowa\u0107 polskich pracodawc\xF3w \u015Bwiadcz\u0105cych us\u0142ugi opieki w Polsce i za granic\u0105, a tak\u017Ce reprezentowa\u0107 ich interesy wobec instytucji krajowych i zagranicznych, decydent\xF3w oraz medi\xF3w."), /*#__PURE__*/React.createElement("a", {
    href: "#",
    onClick: e => {
      e.preventDefault();
      setOpen(!open);
    },
    style: {
      display: 'inline-flex',
      alignItems: 'center',
      gap: 10,
      marginTop: 36,
      fontSize: 14,
      fontWeight: 500,
      color: 'var(--color-brand)',
      textDecoration: 'none'
    }
  }, open ? 'zwiń' : 'czytaj więcej', " ", /*#__PURE__*/React.createElement("span", null, "\u2192"))));
}
function Priorities() {
  const prio = [['Likwidacja barier w opiece transgranicznej', 'cool'], ['Ustanowienie standardów w opiece domowej', 'warm'], ['Ograniczenie szarej strefy', 'warm'], ['Likwidacja barier prawnych i administracyjnych', 'cool']];
  return /*#__PURE__*/React.createElement("section", {
    style: {
      background: 'var(--surface-muted)',
      padding: '100px 0'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1120,
      margin: '0 auto',
      padding: '0 28px'
    }
  }, /*#__PURE__*/React.createElement(SectionHead, {
    title: "Nasze priorytety",
    intro: "Przysz\u0142o\u015B\u0107 opieki domowej zaczyna si\u0119 dzi\u015B. Oto kluczowe obszary dzia\u0142a\u0144 Polskiego Stowarzyszenia Opieki Domowej."
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: 'repeat(4,1fr)',
      gap: 18,
      maxWidth: 1160,
      margin: '56px auto 0'
    }
  }, prio.map(([t, tone]) => /*#__PURE__*/React.createElement("a", {
    key: t,
    href: "#",
    style: {
      position: 'relative',
      aspectRatio: '4/5',
      borderRadius: 14,
      overflow: 'hidden',
      display: 'flex',
      alignItems: 'flex-end',
      textDecoration: 'none',
      isolation: 'isolate'
    }
  }, /*#__PURE__*/React.createElement(GrayFrame, {
    ratio: "4/5",
    radius: 14,
    tone: tone,
    style: {
      position: 'absolute',
      inset: 0
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'absolute',
      inset: 0,
      background: 'linear-gradient(180deg,rgba(187,22,163,0) 30%,rgba(187,22,163,.35) 52%,rgba(187,22,163,.86))'
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      padding: '26px 24px 28px',
      position: 'relative',
      zIndex: 1
    }
  }, /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-sans)',
      fontWeight: 600,
      fontSize: 17,
      lineHeight: 1.3,
      color: '#fff',
      margin: 0
    }
  }, t))))), /*#__PURE__*/React.createElement("div", {
    style: {
      textAlign: 'center',
      marginTop: 52
    }
  }, /*#__PURE__*/React.createElement(Button, {
    uppercase: true,
    href: "#"
  }, "Wi\u0119cej"))));
}
function ActTile({
  title,
  children
}) {
  const [h, setH] = React.useState(false);
  return /*#__PURE__*/React.createElement("a", {
    href: "#",
    onMouseEnter: () => setH(true),
    onMouseLeave: () => setH(false),
    style: {
      display: 'flex',
      flexDirection: 'column',
      alignItems: 'center',
      justifyContent: 'center',
      gap: 18,
      minHeight: 180,
      background: '#fff',
      textDecoration: 'none',
      border: `1px solid ${h ? 'var(--color-brand)' : 'var(--border)'}`,
      borderRadius: 14,
      boxShadow: h ? 'var(--shadow-card)' : 'none',
      transform: h ? 'translateY(-2px)' : 'none',
      transition: 'border-color var(--dur-fast), box-shadow var(--dur-med) var(--ease), transform var(--dur-med) var(--ease)'
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      color: 'var(--color-brand)',
      height: 48,
      display: 'grid',
      placeItems: 'center'
    }
  }, children), /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-sans)',
      fontWeight: 600,
      fontSize: 18,
      color: 'var(--color-brand)'
    }
  }, title));
}
const IcoEdukacja = /*#__PURE__*/React.createElement("svg", {
  width: "46",
  height: "46",
  viewBox: "0 0 24 24",
  fill: "none",
  stroke: "currentColor",
  strokeWidth: 1.7,
  strokeLinecap: "round",
  strokeLinejoin: "round"
}, /*#__PURE__*/React.createElement("path", {
  d: "M22 10v6M2 10l10-5 10 5-10 5z"
}), /*#__PURE__*/React.createElement("path", {
  d: "M6 12v5c3 3 9 3 12 0v-5"
}));
const IcoReprezentowanie = /*#__PURE__*/React.createElement("svg", {
  width: "46",
  height: "46",
  viewBox: "0 0 24 24",
  fill: "none",
  stroke: "currentColor",
  strokeWidth: 1.7,
  strokeLinecap: "round",
  strokeLinejoin: "round"
}, /*#__PURE__*/React.createElement("line", {
  x1: "3",
  x2: "21",
  y1: "22",
  y2: "22"
}), /*#__PURE__*/React.createElement("line", {
  x1: "6",
  x2: "6",
  y1: "18",
  y2: "11"
}), /*#__PURE__*/React.createElement("line", {
  x1: "10",
  x2: "10",
  y1: "18",
  y2: "11"
}), /*#__PURE__*/React.createElement("line", {
  x1: "14",
  x2: "14",
  y1: "18",
  y2: "11"
}), /*#__PURE__*/React.createElement("line", {
  x1: "18",
  x2: "18",
  y1: "18",
  y2: "11"
}), /*#__PURE__*/React.createElement("polygon", {
  points: "12 2 20 7 4 7"
}));
function Activity() {
  return /*#__PURE__*/React.createElement("section", {
    style: {
      padding: '110px 0',
      background: '#fff'
    }
  }, /*#__PURE__*/React.createElement(Wrap, null, /*#__PURE__*/React.createElement(SectionHead, {
    title: "Nasza dzia\u0142alno\u015B\u0107",
    intro: "Polskie Stowarzyszenie Opieki Domowej dzia\u0142a na styku wielu dziedzin w celu zapewnienia maksymalnych korzy\u015Bci swoim cz\u0142onkom. Przede wszystkim chcemy wp\u0142ywa\u0107 na ukszta\u0142towanie przyjaznego \u015Brodowiska politycznego, spo\u0142ecznego i prawnego, kt\xF3re b\u0119dzie wspiera\u0142o legalne i efektywne \u015Bwiadczenie us\u0142ug opieki domowej."
  }), /*#__PURE__*/React.createElement("p", {
    style: {
      textAlign: 'center',
      color: 'var(--text-secondary)',
      fontSize: 15,
      margin: '12px auto 44px'
    }
  }, "W tym celu podejmujemy nast\u0119puj\u0105ce dzia\u0142ania:"), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: 'repeat(auto-fit,minmax(200px,1fr))',
      gap: 22,
      maxWidth: 820,
      margin: '0 auto'
    }
  }, /*#__PURE__*/React.createElement(ActTile, {
    title: "Edukacja"
  }, IcoEdukacja), /*#__PURE__*/React.createElement(ActTile, {
    title: "Doradztwo"
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontSize: 48,
      fontWeight: 400,
      lineHeight: 1
    }
  }, "\xA7")), /*#__PURE__*/React.createElement(ActTile, {
    title: "Reprezentowanie"
  }, IcoReprezentowanie))));
}
const MITY = [{
  t: 'Opiekunowie domowi pracują 24h na dobę',
  f: [/*#__PURE__*/React.createElement("p", {
    key: "1"
  }, "Faktem jest, \u017Ce opiekunowie domowi maj\u0105 zapewnione zakwaterowanie w domu podopiecznego, wi\u0119c w zasadzie przebywaj\u0105 w miejscu pracy 24h na dob\u0119. Nie jest jednak prawd\u0105, \u017Ce przez ca\u0142y ten czas wykonuj\u0105 prac\u0119. Profesjonalna firma opieku\u0144cza powinna ustali\u0107 z opiekunem zakres czynno\u015Bci i obowi\u0105zk\xF3w, kt\xF3ry obejmuje wy\u0142\u0105cznie czynno\u015Bci, kt\xF3rych bezpo\u015Brednim beneficjentem jest osoba podopieczna. Zlecenia nie mog\u0105 zak\u0142ada\u0107 pomocy choremu \u201Enon stop\u201D.")]
}, {
  t: 'Usługi opieki domowej świadczą Agencje Pracy Tymczasowej',
  f: [/*#__PURE__*/React.createElement("p", {
    key: "1"
  }, /*#__PURE__*/React.createElement("em", {
    style: {
      fontStyle: 'italic'
    }
  }, "[Do uzupe\u0142nienia \u2014 oryginalna strona nie zawiera tekstu faktu dla tego mitu. Tre\u015B\u0107 do dostarczenia przez PSOD.]"))]
}, {
  t: 'Opiekunowie domowi nie muszą mieć kompetencji',
  f: [/*#__PURE__*/React.createElement("p", {
    key: "1"
  }, "Takie stwierdzenie jest krzywdz\u0105ce dla opiekun\xF3w i mo\u017Ce by\u0107 niebezpieczne dla podopiecznych. Nie ka\u017Cdy mo\u017Ce zosta\u0107 opiekunem domowym \u2014 profesjonalne firmy zwracaj\u0105 uwag\u0119 na szereg cech, kompetencji i predyspozycji. Kluczowe s\u0105 umiej\u0119tno\u015Bci praktyczne obejmuj\u0105ce codzienn\u0105 opiek\u0119 i piel\u0119gnacj\u0119, wiedza o procesie starzenia i demencji, a tak\u017Ce empatia, cierpliwo\u015B\u0107, komunikatywno\u015B\u0107 i szacunek do drugiego cz\u0142owieka.")]
}, {
  t: 'Opieka nad osobą starszą to dobre zajęcie tylko dla kobiet 50+',
  f: [/*#__PURE__*/React.createElement("p", {
    key: "1"
  }, "Prawd\u0105 jest, \u017Ce w\u015Br\xF3d opiekun\xF3w zdecydowan\u0105 wi\u0119kszo\u015B\u0107 stanowi\u0105 kobiety, cz\u0119sto w grupie wiekowej 50+. Jednak w\u015Br\xF3d opiekun\xF3w coraz wi\u0119cej jest m\u0119\u017Cczyzn (ok. 10%) i os\xF3b m\u0142odych, kt\xF3re przyci\u0105ga misyjno\u015B\u0107 tego zawodu. Bior\u0105c pod uwag\u0119 tempo starzenia si\u0119 spo\u0142ecze\u0144stwa, opiekuna osoby starszej mo\u017Cna nazwa\u0107 zawodem przysz\u0142o\u015Bci.")]
}];
function Myths() {
  const [i, setI] = React.useState(0);
  const [seen, setSeen] = React.useState(() => new Set());
  const total = MITY.length;
  const next = () => setI((i + 1) % total);
  return /*#__PURE__*/React.createElement("section", {
    style: {
      background: 'var(--surface-care)',
      padding: '104px 0'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 820,
      margin: '0 auto',
      padding: '0 28px',
      textAlign: 'center'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      marginBottom: 14
    }
  }, /*#__PURE__*/React.createElement(Overline, {
    tone: "care"
  }, "Sprawd\u017A si\u0119 \u2014 zabawa edukacyjna")), /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(28px,3.6vw,44px)',
      lineHeight: 1.2,
      color: 'var(--text-primary)',
      margin: 0
    }
  }, "Prawda czy mit?"), /*#__PURE__*/React.createElement("p", {
    style: {
      color: 'var(--text-secondary)',
      fontSize: 16,
      lineHeight: 1.8,
      maxWidth: 620,
      margin: '18px auto 0'
    }
  }, "Wok\xF3\u0142 opieki domowej naros\u0142o wiele stereotyp\xF3w. Przeczytaj twierdzenie, zaufaj intuicji \u2014 a potem odkryj, czy to prawda, czy mit."), /*#__PURE__*/React.createElement("div", {
    style: {
      marginTop: 44,
      background: '#fff',
      borderRadius: 20,
      boxShadow: 'var(--shadow-raise)',
      padding: '48px 44px 40px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'center',
      gap: 10,
      marginBottom: 40
    }
  }, MITY.map((m, k) => /*#__PURE__*/React.createElement("button", {
    key: k,
    "aria-label": `Twierdzenie ${k + 1}`,
    onClick: () => setI(k),
    style: {
      width: seen.has(k) ? 22 : 9,
      height: 9,
      borderRadius: 999,
      border: 'none',
      padding: 0,
      cursor: 'pointer',
      background: k === i ? 'var(--color-brand)' : seen.has(k) ? 'rgba(187,22,163,.35)' : 'var(--border)',
      transition: 'all var(--dur-med) var(--ease)'
    }
  }))), /*#__PURE__*/React.createElement(MythTile, {
    key: i,
    myth: MITY[i].t,
    fact: MITY[i].f,
    onReveal: () => setSeen(s => new Set(s).add(i))
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      marginTop: 40,
      paddingTop: 28,
      borderTop: '1px solid var(--border)',
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'space-between',
      gap: 22,
      flexWrap: 'wrap'
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      fontSize: 12.5,
      color: 'var(--text-muted)'
    }
  }, "Odkryto ", seen.size, " z ", total), /*#__PURE__*/React.createElement(ArrowLink, {
    href: "#",
    color: "muted",
    onClick: e => {
      e.preventDefault();
      next();
    }
  }, "Nast\u0119pne twierdzenie")))));
}
function Providers() {
  const loga = ['ATERIMA MED', 'Bonumo', 'Bravecare', '[logo]', 'Egida', 'HCS', 'Interjob', '[logo]', 'Prohuman', 'Professional Care 24', 'SECAWO', 'SOS4U'];
  return /*#__PURE__*/React.createElement("section", {
    style: {
      padding: '110px 0',
      background: '#fff'
    }
  }, /*#__PURE__*/React.createElement(Wrap, null, /*#__PURE__*/React.createElement(SectionHead, {
    title: "Rekomendowani us\u0142ugodawcy"
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: 'repeat(4,1fr)',
      gap: 18,
      maxWidth: 920,
      margin: '52px auto 0'
    }
  }, loga.map((l, i) => /*#__PURE__*/React.createElement(Placeholder, {
    key: i,
    label: l,
    radius: 10
  }))), /*#__PURE__*/React.createElement("p", {
    style: {
      textAlign: 'center',
      color: 'var(--text-secondary)',
      fontSize: 12.5,
      marginTop: 26
    }
  }, "Loga do wpi\u0119cia z oryginalnej strony \u2014 placeholdery zgodnie z decyzj\u0105 o materia\u0142ach graficznych.")));
}
function Publications() {
  return /*#__PURE__*/React.createElement("section", {
    style: {
      background: 'var(--surface-muted)',
      padding: '100px 0'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1120,
      margin: '0 auto',
      padding: '0 28px'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: '300px 1fr',
      gap: 56,
      alignItems: 'start'
    }
  }, /*#__PURE__*/React.createElement(Placeholder, {
    label: "ok\u0142adka do wpi\u0119cia",
    radius: 10,
    style: {
      aspectRatio: '3/4',
      position: 'sticky',
      top: 100
    }
  }), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    style: {
      fontSize: 12.5,
      fontWeight: 500,
      color: 'var(--text-secondary)',
      opacity: .85,
      marginBottom: 12
    }
  }, "Polskie Stowarzyszenie Opieki Domowej \xB7 13 marca 2024"), /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 400,
      fontSize: 'clamp(21px,2.4vw,29px)',
      lineHeight: 1.35,
      color: 'var(--text-primary)',
      marginBottom: 22
    }
  }, "Raport \u201EWyzwania bran\u017Cy opieki domowej 2024\u201D"), /*#__PURE__*/React.createElement("p", {
    style: {
      fontSize: 15.5,
      lineHeight: 1.85,
      color: 'var(--text-secondary)',
      marginBottom: 16
    }
  }, "W niniejszym opracowaniu przygl\u0105damy si\u0119 us\u0142ugom opieki d\u0142ugoterminowej, \u015Bwiadczonym przez cudzoziemc\xF3w w prywatnych gospodarstwach domowych. Zgodnie z definicj\u0105 \u015Awiatowej Organizacji Zdrowia, opieka d\u0142ugoterminowa obejmuje zar\xF3wno wsparcie o charakterze spo\u0142ecznym (pomoc w codziennych czynno\u015Bciach, towarzyszenie), jak i us\u0142ugi medyczne dedykowane osobom, kt\xF3re przez d\u0142u\u017Cszy okres s\u0105 zale\u017Cne od innych. Opieka ta mo\u017Ce by\u0107 realizowana w plac\xF3wkach stacjonarnych, takich jak domy opieki, ale tak\u017Ce w prywatnych mieszkaniach i domach podopiecznych, co stanowi esencj\u0119 opieki domowej."), /*#__PURE__*/React.createElement("p", {
    style: {
      fontSize: 15.5,
      lineHeight: 1.85,
      color: 'var(--text-secondary)',
      marginBottom: 16
    }
  }, "Raport koncentruje si\u0119 na opiece domowej nad osobami starszymi (60+), z naciskiem na rol\u0119 pracownik\xF3w cudzoziemskich. Sektor opieki nad seniorami b\u0119dzie odgrywa\u0142 coraz wi\u0119ksz\u0105 rol\u0119 w nadchodz\u0105cych latach, a zapotrzebowanie na zagranicznych opiekun\xF3w b\u0119dzie ros\u0142o. Mimo zmieniaj\u0105cej si\u0119 dynamiki na rynku pracy w Europie, przewiduje si\u0119, \u017Ce migracje opieku\u0144cze pozostan\u0105 istotnym zjawiskiem. Chocia\u017C sytuacja w Polsce ulega poprawie, a r\xF3\u017Cnice w zarobkach si\u0119 zmniejszaj\u0105, nie nale\u017Cy spodziewa\u0107 si\u0119 gwa\u0142townego zahamowania trendu zatrudniania cudzoziemc\xF3w do opieki nad osobami starszymi."), /*#__PURE__*/React.createElement("p", {
    style: {
      fontSize: 15.5,
      lineHeight: 1.85,
      color: 'var(--text-secondary)',
      marginBottom: 32
    }
  }, "Jednocze\u015Bnie, z biegiem czasu mo\u017Cemy obserwowa\u0107 zmiany w kierunkach migracji opieku\u0144czych. Na przyk\u0142ad, malej\u0105ce zainteresowanie migracj\u0105 z Polski do Niemiec jest efektem poprawiaj\u0105cej si\u0119 sytuacji gospodarczej w Polsce. Zmniejszaj\u0105ca si\u0119 r\xF3\u017Cnica w zarobkach sprawia, \u017Ce cz\u0119\u015B\u0107 personelu opieku\u0144czego mo\u017Ce uzna\u0107, \u017Ce strategia mobilno\u015Bci staje si\u0119 mniej atrakcyjna finansowo."), /*#__PURE__*/React.createElement(Button, {
    href: "#"
  }, "Zobacz raport")))));
}
function Training() {
  return /*#__PURE__*/React.createElement("section", {
    style: {
      padding: '110px 0',
      background: 'var(--surface-muted)'
    }
  }, /*#__PURE__*/React.createElement(Wrap, null, /*#__PURE__*/React.createElement(SectionHead, {
    title: "Oferta szkoleniowa",
    intro: "Oferta szkole\u0144 i warsztat\xF3w na temat bran\u017Cy opieki domowej."
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'grid',
      gridTemplateColumns: '1fr 1fr',
      gap: 22,
      maxWidth: 860,
      margin: '44px auto 64px'
    }
  }, [['Europejski Kongres Mobilności Pracy 2023'], ['Szkolenie i wsparcie opiekunek i opiekunów oraz standaryzacja jakości usług opieki domowej']].map(([t], i) => /*#__PURE__*/React.createElement("a", {
    key: i,
    href: "#",
    style: {
      display: 'block',
      background: '#fff',
      border: '1px solid var(--border)',
      borderRadius: 12,
      padding: 26,
      textDecoration: 'none',
      color: 'var(--text-primary)'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      marginBottom: 10
    }
  }, /*#__PURE__*/React.createElement(Tag, null, "szkolenie")), /*#__PURE__*/React.createElement("h3", {
    style: {
      fontFamily: 'var(--font-sans)',
      fontSize: 17,
      lineHeight: 1.45,
      margin: 0,
      fontWeight: 600
    }
  }, t))))));
}
function Newsletter() {
  return /*#__PURE__*/React.createElement("section", {
    style: {
      padding: '96px 0',
      background: '#fff'
    }
  }, /*#__PURE__*/React.createElement(Wrap, null, /*#__PURE__*/React.createElement(NewsletterForm, null)));
}
function Faq() {
  const qa = [['Czym jest PSOD?', 'PSOD jest związkiem pracodawców zrzeszającym polskie firmy oferujące usługi opieki domowej dla seniorów.'], ['Z jakich źródeł finansowana jest działalność PSOD?', 'Nasza działalność finansowana jest ze składek członkowskich oraz darowizn.'], ['Kim są nasi Członkowie?', 'Organizacja reprezentuje obecnie 16 usługodawców zatrudniających w sumie 6500 opiekunów. Członkiem mogą zostać firmy i stowarzyszenia działające na obszarze RP, zatrudniające co najmniej jedną osobę, których zakres działalności obejmuje opiekę domową nad osobami starszymi.'], ['Dlaczego warto być naszym Członkiem?', 'Chcemy wspierać i promować polskich pracodawców świadczących usługi opieki w Polsce i za granicą oraz reprezentować ich interesy wobec instytucji krajowych i zagranicznych, decydentów oraz mediów. Głównym postulatem jest wprowadzenie w Polsce obligatoryjnego rejestru usługodawców w obszarze opieki domowej.'], ['Jakie są rodzaje i koszt członkostwa?', 'Statut PSOD przewiduje jeden rodzaj członkostwa. Składka członkowska wynosi 1045,00 zł miesięcznie.'], ['Jak zostać Członkiem PSOD?', 'Wystarczy wypełnić deklarację członkowską. O przyjęciu w poczet Członków Stowarzyszenia formalnie decyduje Zarząd w formie uchwały.']];
  return /*#__PURE__*/React.createElement("section", {
    style: {
      padding: '110px 0',
      background: '#fff'
    }
  }, /*#__PURE__*/React.createElement(Wrap, null, /*#__PURE__*/React.createElement("div", {
    style: {
      textAlign: 'center',
      marginBottom: 48
    }
  }, /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(28px,3.6vw,44px)',
      lineHeight: 1.2,
      color: 'var(--text-primary)',
      margin: 0
    }
  }, "Pytania i odpowiedzi")), /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 760,
      margin: '0 auto'
    }
  }, qa.map(([q, a], i) => /*#__PURE__*/React.createElement(FaqItem, {
    key: i,
    question: q,
    defaultOpen: i === 0
  }, a)))));
}
function JoinCta() {
  return /*#__PURE__*/React.createElement("section", {
    id: "dolacz",
    style: {
      position: 'relative',
      overflow: 'hidden',
      display: 'grid',
      placeItems: 'center',
      padding: '110px 28px'
    }
  }, /*#__PURE__*/React.createElement("img", {
    src: "../../assets/photo-opieka-03.jpeg",
    alt: "",
    style: {
      position: 'absolute',
      inset: 0,
      width: '100%',
      height: '100%',
      objectFit: 'cover',
      filter: 'grayscale(1) brightness(1.02) contrast(.95)'
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'absolute',
      inset: 0,
      background: 'rgba(74,75,82,.28)'
    }
  }), /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'relative',
      background: 'var(--color-brand)',
      color: '#fff',
      maxWidth: 780,
      width: '100%',
      textAlign: 'center',
      padding: 'clamp(40px,6vw,72px) clamp(28px,5vw,64px)'
    }
  }, /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: 'clamp(30px,4vw,50px)',
      lineHeight: 1.25,
      margin: 0
    }
  }, "Zadbajmy o to razem."), /*#__PURE__*/React.createElement("p", {
    style: {
      margin: '24px auto 36px',
      color: 'rgba(255,255,255,.9)',
      fontSize: 16.5,
      lineHeight: 1.8,
      maxWidth: 560
    }
  }, "PSOD zrzesza firmy opieki domowej, by wsp\xF3lnie reprezentowa\u0107 bran\u017C\u0119 wobec decydent\xF3w i medi\xF3w \u2014 w Polsce i w Unii Europejskiej. Im wi\u0119cej pracodawc\xF3w z nami dzia\u0142a, tym skuteczniej chronimy interesy opiekun\xF3w i senior\xF3w oraz budujemy standardy godnej opieki."), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      gap: 14,
      justifyContent: 'center',
      flexWrap: 'wrap'
    }
  }, /*#__PURE__*/React.createElement("a", {
    href: "#",
    style: {
      display: 'inline-block',
      background: '#fff',
      color: 'var(--color-brand)',
      fontFamily: 'var(--font-sans)',
      fontWeight: 600,
      fontSize: 15,
      textDecoration: 'none',
      padding: '16px 34px',
      borderRadius: 'var(--radius-pill)'
    }
  }, "Do\u0142\u0105cz do PSOD"), /*#__PURE__*/React.createElement("a", {
    href: "#",
    style: {
      display: 'inline-block',
      background: 'transparent',
      color: '#fff',
      fontFamily: 'var(--font-sans)',
      fontWeight: 500,
      fontSize: 15,
      textDecoration: 'none',
      padding: '16px 34px',
      borderRadius: 'var(--radius-pill)',
      border: '1.5px solid rgba(255,255,255,.7)'
    }
  }, "Wesprzyj nasze dzia\u0142ania"))));
}
Object.assign(window, {
  Pillars,
  About,
  Priorities,
  Activity,
  Myths,
  Providers,
  Publications,
  Training,
  Newsletter,
  Faq,
  JoinCta
});
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/website/home-b.jsx", error: String((e && e.message) || e) }); }

// ui_kits/website/site-chrome.jsx
try { (() => {
/* PSOD — chrome strony + pomocnicze. Eksport do window. */
const {
  Button,
  ArrowLink,
  Overline
} = window.PSODDesignSystem_ecebba;

/* Wspólny kontener treści */
function Wrap({
  children,
  style
}) {
  return /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1140,
      margin: '0 auto',
      padding: '0 32px',
      ...style
    }
  }, children);
}

/* Ramka „zdjęcia" — grayscale tonalny placeholder (żaden stock bez licencji).
   Oddaje brandowe traktowanie kadrów: chłodna szarość, miękkie narożniki. */
function GrayFrame({
  ratio = '3/2',
  radius = 18,
  label,
  tone = 'cool',
  style
}) {
  const grads = {
    cool: 'linear-gradient(135deg,#EDEDEF 0%,#DDDEE2 55%,#CFD3D8 100%)',
    warm: 'linear-gradient(135deg,#EFEDEC 0%,#E2DFDD 60%,#D4D0CD 100%)',
    care: 'linear-gradient(135deg,#EEF3F5 0%,#DCE7EC 100%)'
  };
  return /*#__PURE__*/React.createElement("div", {
    style: {
      position: 'relative',
      aspectRatio: ratio,
      borderRadius: radius,
      overflow: 'hidden',
      background: grads[tone],
      ...style
    }
  }, label && /*#__PURE__*/React.createElement("span", {
    style: {
      position: 'absolute',
      left: 14,
      bottom: 12,
      fontFamily: 'var(--font-sans)',
      fontSize: 10.5,
      fontWeight: 600,
      letterSpacing: '.1em',
      textTransform: 'uppercase',
      color: '#A8A9B0'
    }
  }, label));
}

/* Nagłówek sekcji: opcjonalny nadtytuł + tytuł Fraunces + opcjonalny intro */
function SectionHead({
  overline,
  overlineTone,
  title,
  intro,
  align = 'center',
  titleSize = 'var(--fs-display-2)'
}) {
  return /*#__PURE__*/React.createElement("div", {
    style: {
      textAlign: align,
      maxWidth: align === 'center' ? 720 : 'none',
      margin: align === 'center' ? '0 auto' : 0
    }
  }, overline && /*#__PURE__*/React.createElement("div", {
    style: {
      marginBottom: 14
    }
  }, /*#__PURE__*/React.createElement(Overline, {
    tone: overlineTone
  }, overline)), /*#__PURE__*/React.createElement("h2", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 300,
      fontSize: titleSize,
      lineHeight: 1.2,
      color: 'var(--text-primary)',
      margin: 0
    }
  }, title), intro && /*#__PURE__*/React.createElement("p", {
    style: {
      color: 'var(--text-secondary)',
      fontSize: 16,
      lineHeight: 1.8,
      maxWidth: 720,
      margin: '18px auto 0'
    }
  }, intro));
}
function Header() {
  return /*#__PURE__*/React.createElement("header", {
    style: {
      background: 'rgba(255,255,255,.92)',
      backdropFilter: 'blur(10px)',
      borderBottom: '1px solid var(--border)',
      position: 'sticky',
      top: 0,
      zIndex: 100
    }
  }, /*#__PURE__*/React.createElement(Wrap, {
    style: {
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'space-between',
      paddingTop: 18,
      paddingBottom: 18
    }
  }, /*#__PURE__*/React.createElement("a", {
    href: "#",
    style: {
      display: 'flex',
      alignItems: 'center',
      gap: 14,
      textDecoration: 'none'
    }
  }, /*#__PURE__*/React.createElement("img", {
    src: "../../assets/psod-mark.jpg",
    alt: "PSOD",
    style: {
      width: 48,
      height: 48,
      borderRadius: 10,
      display: 'block'
    }
  }), /*#__PURE__*/React.createElement("span", {
    style: {
      color: 'var(--color-brand)',
      fontWeight: 600,
      fontSize: 13.5,
      lineHeight: 1.35,
      letterSpacing: '.04em',
      textTransform: 'uppercase',
      fontFamily: 'var(--font-sans)'
    }
  }, "Polskie Stowarzyszenie", /*#__PURE__*/React.createElement("br", null), "Opieki Domowej")), /*#__PURE__*/React.createElement("div", {
    style: {
      display: 'flex',
      alignItems: 'center',
      gap: 28
    }
  }, /*#__PURE__*/React.createElement("span", {
    style: {
      fontSize: 14,
      fontWeight: 500,
      color: 'var(--text-secondary)',
      fontFamily: 'var(--font-sans)'
    }
  }, /*#__PURE__*/React.createElement("b", {
    style: {
      color: 'var(--color-brand)',
      fontWeight: 600
    }
  }, "PL"), " | DE | EN"), /*#__PURE__*/React.createElement("div", {
    style: {
      width: 30,
      display: 'flex',
      flexDirection: 'column',
      gap: 6,
      cursor: 'pointer',
      padding: '4px 0'
    }
  }, /*#__PURE__*/React.createElement("i", {
    style: {
      height: 2,
      background: 'var(--text-primary)',
      borderRadius: 2
    }
  }), /*#__PURE__*/React.createElement("i", {
    style: {
      height: 2,
      width: '65%',
      background: 'var(--text-primary)',
      borderRadius: 2
    }
  }), /*#__PURE__*/React.createElement("i", {
    style: {
      height: 2,
      background: 'var(--text-primary)',
      borderRadius: 2
    }
  })))));
}
function Footer() {
  const linkStyle = {
    color: 'var(--psod-stopka-tekst)',
    textDecoration: 'none',
    display: 'block',
    marginBottom: 10
  };
  const h4 = {
    fontFamily: 'var(--font-sans)',
    fontWeight: 600,
    fontSize: 11.5,
    letterSpacing: '.18em',
    textTransform: 'uppercase',
    color: 'var(--psod-stopka-tekst-2)',
    marginBottom: 16
  };
  return /*#__PURE__*/React.createElement("footer", {
    style: {
      background: 'var(--surface-dark)',
      color: 'var(--psod-stopka-tekst)',
      padding: '64px 0 40px',
      fontSize: 13.5,
      fontFamily: 'var(--font-sans)'
    }
  }, /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1120,
      margin: '0 auto',
      padding: '0 28px',
      display: 'grid',
      gridTemplateColumns: '1.2fr 1fr 1fr',
      gap: 48
    }
  }, /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
    style: {
      fontFamily: 'var(--font-serif)',
      fontWeight: 400,
      fontSize: 19,
      color: '#fff',
      marginBottom: 14
    }
  }, "Polskie Stowarzyszenie Opieki Domowej"), /*#__PURE__*/React.createElement("p", {
    style: {
      lineHeight: 1.8,
      margin: 0
    }
  }, "Nowy \u015Awiat 54/56", /*#__PURE__*/React.createElement("br", null), "00-363 Warszawa", /*#__PURE__*/React.createElement("br", null), "www.polskaopieka.eu")), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("h4", {
    style: h4
  }, "Na skr\xF3ty"), ['Wyzwania cywilizacyjne', 'Nasze priorytety', 'Nasza działalność', 'Apel do rządu', 'Publikacje', 'Szkolenia', 'Q&A', 'Aktualności'].map(t => /*#__PURE__*/React.createElement("a", {
    key: t,
    href: "#",
    style: linkStyle
  }, t))), /*#__PURE__*/React.createElement("div", null, /*#__PURE__*/React.createElement("h4", {
    style: h4
  }, "Kontakt"), /*#__PURE__*/React.createElement("a", {
    href: "mailto:kontakt@polskaopieka.eu",
    style: linkStyle
  }, "kontakt@polskaopieka.eu"), /*#__PURE__*/React.createElement("a", {
    href: "tel:+48602194708",
    style: linkStyle
  }, "Ada Zaorska \xB7 +48 602 194 708"), /*#__PURE__*/React.createElement("a", {
    href: "tel:+48795586620",
    style: linkStyle
  }, "Anna Grodecka \xB7 +48 795 586 620"), /*#__PURE__*/React.createElement("a", {
    href: "#",
    style: linkStyle
  }, "LinkedIn"))), /*#__PURE__*/React.createElement("div", {
    style: {
      maxWidth: 1120,
      margin: '52px auto 0',
      padding: '26px 28px 0',
      borderTop: '1px solid rgba(255,255,255,.12)',
      display: 'flex',
      justifyContent: 'space-between',
      gap: 16,
      flexWrap: 'wrap',
      fontSize: 12,
      color: 'var(--psod-stopka-tekst-2)'
    }
  }, /*#__PURE__*/React.createElement("span", null, "\xA9 2026 Polskie Stowarzyszenie Opieki Domowej"), /*#__PURE__*/React.createElement("span", null, "KRS 0000992066 \xB7 NIP 5252926975 \xB7 REGON 523338263")));
}
Object.assign(window, {
  Wrap,
  GrayFrame,
  SectionHead,
  Header,
  Footer
});
})(); } catch (e) { __ds_ns.__errors.push({ path: "ui_kits/website/site-chrome.jsx", error: String((e && e.message) || e) }); }

__ds_ns.FaqItem = __ds_scope.FaqItem;

__ds_ns.FilarCard = __ds_scope.FilarCard;

__ds_ns.MythTile = __ds_scope.MythTile;

__ds_ns.NewsCard = __ds_scope.NewsCard;

__ds_ns.Placeholder = __ds_scope.Placeholder;

__ds_ns.ArrowLink = __ds_scope.ArrowLink;

__ds_ns.Button = __ds_scope.Button;

__ds_ns.Highlight = __ds_scope.Highlight;

__ds_ns.Overline = __ds_scope.Overline;

__ds_ns.Stamp = __ds_scope.Stamp;

__ds_ns.Tag = __ds_scope.Tag;

__ds_ns.NewsletterForm = __ds_scope.NewsletterForm;

})();
