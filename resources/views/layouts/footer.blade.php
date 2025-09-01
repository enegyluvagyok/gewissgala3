<footer id="footer">
    <div class="copyright">
        <div class="container">
            <div class="row">
                <!-- Copyrights -->
                <div class="col-xs-10 col-sm-6 col-md-6"> &copy; 2025 <a href="https://gewissguard.com">gewissguard.com</a>. Gewiss GUARD.
                    <br />
                    <!-- Terms Link -->
                    <a href="#">Minden jog fenntartva</a>
                </div>
                <div class="col-xs-2  col-sm-6 col-md-6 text-right page-scroll gray-bg icons-circle i-3x">
                    <!-- Goto Top -->
                    <a href="#page">
                        <i class="glyphicon glyphicon-arrow-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer -->
</div>
<!-- page -->
<!-- Scripts -->
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Menu jQuery plugin -->

<script type="text/javascript" src="{{ asset('js/hover-dropdown-menu.js') }}"></script>
<!-- Menu jQuery Bootstrap Addon -->
<script type="text/javascript" src="{{ asset('js/jquery.hover-dropdown-menu-addon.js') }}"></script>
<!-- Scroll Top Menu -->

<script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<!-- Sticky Menu -->
<script type="text/javascript" src="{{ asset('js/jquery.sticky.js') }}"></script>
<!-- Bootstrap Validation -->

<script type="text/javascript" src="{{ asset('js/bootstrapValidator.min.js') }}"></script>
<!-- Revolution Slider -->

<script type="text/javascript" src="{{ asset('rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution-custom.js') }}"></script>
<!-- Portfolio Filter -->

<script type="text/javascript" src="{{ asset('js/jquery.mixitup.min.js') }}"></script>
<!-- Animations -->

<script type="text/javascript" src="{{ asset('js/jquery.appear.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/effect.js') }}"></script>
<!-- Owl Carousel Slider -->

<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<!-- Pretty Photo Popup -->

<script type="text/javascript" src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
<!-- Parallax BG -->

<script type="text/javascript" src="{{ asset('js/jquery.parallax-1.1.3.js') }}"></script>
<!-- Fun Factor / Counter -->

<script type="text/javascript" src="{{ asset('js/jquery.countTo.js') }}"></script>
<!-- Twitter Feed -->

<script type="text/javascript" src="{{ asset('js/tweet/carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/tweet/scripts.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/tweet/tweetie.min.js') }}"></script>
<!-- Background Video -->

<script type="text/javascript" src="{{ asset('js/jquery.mb.YTPlayer.js') }}"></script>
<!-- Custom Js Code -->

<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        function toggleHeroVisibility() {
            if (window.innerWidth < 1024) {
                $('#hero-desktop').hide();
            } else {
                $('#hero-desktop').show();
            }
        }
        toggleHeroVisibility();
        $(window).resize(toggleHeroVisibility);
    });

    $(document).ready(function() {
        function toggleMenuItemVisibility() {
            if (window.innerWidth < 768) {
                $('#desktop-menu-item').hide();
                $('#mobile-menu-item').show();
                console.log("Mobile view: showing mobile menu, hiding desktop menu.");
            } else {
                $('#mobile-menu-item').hide();
                $('#desktop-menu-item').show();
                console.log("Desktop view: showing desktop menu, hiding mobile menu.");
            }
        }

        // Run on page load
        toggleMenuItemVisibility();

        // Run on window resize
        $(window).resize(toggleMenuItemVisibility);
    });

</script>

<script>
    function openModal() {
        document.getElementById("videoModal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("videoModal").style.display = "none";
        document.getElementById("videoPlayer").pause();
    }

</script>

<script>
(function(){
  let items = Array.from(document.querySelectorAll('#gallery .gallery-item'));
  if (!items.length) return;

  const box = document.getElementById('glightbox');
  const img = box.querySelector('.glb-image');
  const cap = box.querySelector('.glb-caption');
  const btnClose = box.querySelector('.glb-close');
  const btnPrev  = box.querySelector('.glb-prev');
  const btnNext  = box.querySelector('.glb-next');
  let index = 0;

  function openAt(i){
    index = ((i % items.length) + items.length) % items.length;
    const a = items[index];
    img.src = a.dataset.full || a.href;
    img.alt = a.querySelector('img')?.alt || 'image';
    cap.textContent = a.dataset.caption || '';
    box.classList.add('active');
    document.body.style.overflow = 'hidden';
  }
  function close(){
    box.classList.remove('active');
    img.src = '';
    document.body.style.overflow = '';
  }
  function prev(){ openAt(index - 1); }
  function next(){ openAt(index + 1); }

  // Kattintás a képekre
  items.forEach((a, i) => {
    a.addEventListener('click', (e) => {
      e.preventDefault();
      openAt(i);
    });
  });

  // Gombok
  btnClose.addEventListener('click', close);
  btnPrev.addEventListener('click', prev);
  btnNext.addEventListener('click', next);

  // Backdrop zárás
  box.querySelector('.glb-backdrop').addEventListener('click', close);

  // Billentyűk
  document.addEventListener('keydown', (e) => {
    if (!box.classList.contains('active')) return;
    if (e.key === 'Escape') close();
    if (e.key === 'ArrowLeft') prev();
    if (e.key === 'ArrowRight') next();
  });

  // Swipe mobilon (egyszerű)
  let sx = 0;
  img.addEventListener('touchstart', (e)=> sx = e.touches[0].clientX);
  img.addEventListener('touchend', (e)=>{
    const dx = e.changedTouches[0].clientX - sx;
    if (dx > 40) prev();
    if (dx < -40) next();
  });
})();
</script>

<script>
    (function() {
        // --- aliasok és nyelv normalizálás ---
        const ALIASES = {
            'en': 'en'
            , 'eng': 'en'
            , 'ent': 'en'
            , 'en-us': 'en'
            , 'en_gb': 'en'
            , 'en-uk': 'en'
            , 'hu': 'hu'
            , 'hun': 'hu'
            , 'hu-hu': 'hu'
        };

        function normalizeLang(raw) {
            if (!raw) return 'hu';
            raw = String(raw).toLowerCase();
            return ALIASES[raw] || ALIASES[raw.slice(0, 2)] || 'hu';
        }

        function getInitialLang() {
            const qp = new URLSearchParams(location.search);
            return normalizeLang(qp.get('lang') || localStorage.getItem('site_lang') || document.documentElement.lang || 'hu');
        }

        // --- szótár (kulcsok: mindig lowercased) ---
        const DICT = {
            hu: {
                'hétfő': 'HÉTFŐ'
                , 'kedd': 'KEDD'
                , 'szerda': 'SZERDA'
                , 'csütörtök': 'CSÜTÖRTÖK'
                , 'péntek': 'PÉNTEK'
                , 'órarend': 'ÓRAREND'
                , 'box': 'BOX'
                , 'kezdő muay thai': 'KEZDŐ MUAY THAI'
                , 'gyerek muay thai': 'GYEREK MUAY THAI'
                , 'haladó muay thai': 'HALADÓ MUAY THAI'
                , 'muay thai sparring': 'MUAY THAI SPARRING'
                , '(kezdő és haladó)': '(KEZDŐ ÉS HALADÓ)'
            }
            , en: {
                'hétfő': 'MONDAY'
                , 'kedd': 'TUESDAY'
                , 'szerda': 'WEDNESDAY'
                , 'csütörtök': 'THURSDAY'
                , 'péntek': 'FRIDAY'
                , 'órarend': 'SCHEDULE'
                , 'box': 'BOXING'
                , 'kezdő muay thai': 'BEGINNER MUAY THAI'
                , 'gyerek muay thai': 'KIDS MUAY THAI'
                , 'haladó muay thai': 'ADVANCED MUAY THAI'
                , 'muay thai sparring': 'MUAY THAI SPARRING'
                , '(kezdő és haladó)': '(BEGINNER & ADVANCED)'
            }
        };

        let currentLang = getInitialLang();

        // case-insensitive fordító
        const t = (key) => {
            if (!key) return key;
            const norm = String(key).trim().toLowerCase();
            return (DICT[currentLang] && DICT[currentLang][norm]) ? DICT[currentLang][norm] : key;
        };

        // teljes újrafordítás
        function translateAll() {
            document.querySelectorAll('[data-i18n]').forEach((el) => {
                const keyAttr = el.getAttribute('data-i18n') || '';
                const out = t(keyAttr);
                // csak az első szöveg node-ot cseréljük, hogy a <br><small> megmaradjon
                const txt = Array.from(el.childNodes).find(n => n.nodeType === Node.TEXT_NODE);
                if (txt) txt.nodeValue = out + (/\s$/.test(txt.nodeValue) ? '' : ' ');
                else el.textContent = out;
            });

            // flag aktív állapot
            document.querySelectorAll('.lang-btn').forEach(btn => {
                btn.classList.toggle('active', btn.getAttribute('data-lang') === currentLang);
            });
        }

        // URL frissítés (reload nélkül), localStorage mentés
        function applyLang(lang) {
            currentLang = normalizeLang(lang);
            localStorage.setItem('site_lang', currentLang);

            const url = new URL(location.href);
            url.searchParams.set('lang', currentLang);
            history.replaceState(null, '', url.toString());

            translateAll();
        }

        // init + eseménykezelők
        document.addEventListener('DOMContentLoaded', () => {
            // kattintás a zászlókra
            document.body.addEventListener('click', (e) => {
                const btn = e.target.closest('.lang-btn');
                if (btn && btn.dataset.lang) {
                    e.preventDefault();
                    applyLang(btn.dataset.lang);
                }
            });

            // első betöltés
            applyLang(currentLang);
        });
    })();

</script>

<script>
(function () {
  // ugyanazt a langot használjuk, mint az i18n-ben
  const currentLang = (localStorage.getItem('site_lang') || (new URLSearchParams(location.search)).get('lang') || document.documentElement.lang || 'hu').toLowerCase();

  // 1) Belső linkekre automatikusan ragasszuk rá a ?lang= paramot (ha nincs)
  function isInternalLink(a) {
    try {
      const u = new URL(a.href, location.href);
      return u.origin === location.origin;
    } catch { return false; }
  }

  function ensureLangOnLink(a) {
    const u = new URL(a.href, location.href);
    // ha csak hash link (#about), akkor hagyjuk – a smooth scroll kezeli
    if (u.pathname === location.pathname && (u.hash || a.getAttribute('href').startsWith('#'))) return;
    // egyébként írjuk be a langot, ha hiányzik
    if (!u.searchParams.get('lang')) {
      u.searchParams.set('lang', currentLang);
      a.href = u.toString();
    }
  }

  document.querySelectorAll('a[href]').forEach(a => {
    if (isInternalLink(a)) ensureLangOnLink(a);
  });

  // 2) Smooth scroll #ankorokra, reload nélkül, és megtartjuk az aktuális ?lang-et
  const OFFSET = document.querySelector('nav.navbar, .navbar, header')?.offsetHeight || 80; // fix fejléchez
  function smoothScrollToId(id) {
    const el = document.getElementById(id);
    if (!el) return;
    const y = el.getBoundingClientRect().top + window.pageYOffset - OFFSET;
    window.scrollTo({ top: y, behavior: 'smooth' });

    // hash beállítása reload nélkül (nyelvi query megtartásával)
    const url = new URL(location.href);
    url.hash = '#' + id;
    history.pushState(null, '', url.toString());
  }

  // kattintáskezelő csak ugyanerre az oldalra mutató hash linkekre
  document.addEventListener('click', function (e) {
    const a = e.target.closest('a[href]');
    if (!a) return;

    // #id, vagy ugyanazon path + hash
    const href = a.getAttribute('href');
    const isPureHash = href && href.startsWith('#');
    const linkUrl = new URL(a.href, location.href);

    const samePageHash =
      linkUrl.origin === location.origin &&
      linkUrl.pathname.replace(/\/+$/, '') === location.pathname.replace(/\/+$/, '') &&
      linkUrl.hash;

    if (isPureHash || samePageHash) {
      e.preventDefault();
      const hash = isPureHash ? href : linkUrl.hash;
      const id = hash.replace(/^#/, '');
      if (id) smoothScrollToId(id);
    }
  });

  // 3) Ha hash-sel érkeztünk, első betöltéskor is igazítsuk az offsetet
  window.addEventListener('load', () => {
    if (location.hash) {
      const id = location.hash.replace('#', '');
      setTimeout(() => smoothScrollToId(id), 0);
    }
  });
})();
</script>

<script>
  $(function(){
    $('.fights-carousel').owlCarousel({
      items: 1,
      margin: 16,
      nav: true,
      dots: true,
      loop: false,
      autoplay: false,
      autoplayHoverPause: true,
      navText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
      responsive: {
        0:   { items: 1 },
        768: { items: 1 },
        1200:{ items: 1 }
      }
    });
  });
</script>

<script>
  // Másolás gomb az adószámhoz
  (function(){
    document.addEventListener('click', function(e){
      const btn = e.target.closest('[data-copy]');
      if(!btn) return;
      const sel = btn.getAttribute('data-copy');
      const el  = document.querySelector(sel);
      if(!el) return;

      const text = (el.innerText || el.textContent || '').trim();
      if(!text) return;

      navigator.clipboard?.writeText(text).then(()=>{
        btn.innerHTML = '<i class="fa fa-check"></i> Másolva';
        setTimeout(()=> btn.innerHTML = '<i class="fa fa-copy"></i> Másolás', 1500);
      }).catch(()=>{
        // fallback
        const ta = document.createElement('textarea');
        ta.value = text; document.body.appendChild(ta); ta.select();
        try { document.execCommand('copy'); btn.innerHTML = '<i class="fa fa-check"></i> Másolva'; }
        catch(e){}
        document.body.removeChild(ta);
        setTimeout(()=> btn.innerHTML = '<i class="fa fa-copy"></i> Másolás', 1500);
      });
    });
  })();
</script>

<script>
(function($){
  let lastFocus = null;

  function openPopup(sel){
    const $pop = $(sel);
    if(!$pop.length) return;
    lastFocus = document.activeElement;
    $pop.addClass('is-open').attr('aria-hidden','false');
    $('body').css('overflow','hidden'); // scroll lock
    // fókusz a címre
    const title = $pop.find('.popup__title')[0];
    title && title.focus ? title.focus() : $pop.find('.popup__close').focus();
  }

  function closePopup($pop){
    $pop.removeClass('is-open').attr('aria-hidden','true');
    $('body').css('overflow',''); // scroll unlock
    // fókusz vissza
    lastFocus && lastFocus.focus && lastFocus.focus();
  }

  // megnyitás
  $(document).on('click', '.js-open-popup', function(e){
    e.preventDefault();
    const sel = $(this).data('popup');
    openPopup(sel);
  });

  // bezárás: X, overlay
  $(document).on('click', '.js-close-popup', function(e){
    e.preventDefault();
    closePopup($(this).closest('.popup'));
  });

  // ESC
  $(document).on('keydown', function(e){
    if(e.key === 'Escape'){
      const $open = $('.popup.is-open');
      $open.length && closePopup($open);
    }
  });

  // ne záródjon le, ha a boxon belül kattintunk
  $(document).on('click', '.popup__box', function(e){ e.stopPropagation(); });
})(jQuery);
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
(function () {
  const SEEN_KEY   = 'sponsor_popup_seen_v2';
  const EXPIRE_MS  = 1000*60*60*24*7; // 7 nap után újra mutatható
  const SCROLL_PX  = 200;   // ennyi görgetés után aktiválódik
  const SHOW_DELAY = 900;   // ms – ne legyen hivalkodó

  const last = localStorage.getItem(SEEN_KEY);
  if (last && (Date.now() - parseInt(last,10) < EXPIRE_MS)) return;

  let armed = false, shown = false;

  function armOnce() {
    if (armed) return;
    armed = true;
    setTimeout(showModal, SHOW_DELAY);
  }

  function showModal() {
    if (shown) return;
    shown = true;

    Swal.fire({
      title: 'Szponzoráció',
      html: '<p>Szeretnéd szponzorálni az egyesületet?</p>',
      icon: 'info',
      confirmButtonText: 'Igen, szeretném!',
      cancelButtonText: 'Most nem',
      showCancelButton: true,
      focusConfirm: true,
      background: '#0f1a1f',
      color: '#e7e7e7',
      confirmButtonColor: '#c0974a',
      cancelButtonColor: '#444',
      backdrop: 'rgba(0,0,0,0.5)',
      width: 480,
      allowOutsideClick: true,
      showClass: { popup: 'swal2-show' },
      hideClass: { popup: 'swal2-hide' },
    }).then((res) => {
      // tároljuk, hogy már látta
      localStorage.setItem(SEEN_KEY, Date.now().toString());

      if (res.isConfirmed) {
        // átirányítás a donate fülre
        window.location.href = '/donate?lang=hu';
      }
    });
  }

  function onScrollTrigger() {
    if (window.pageYOffset > SCROLL_PX) {
      window.removeEventListener('scroll', onScrollTrigger);
      window.removeEventListener('wheel', onScrollTrigger, { passive:true });
      window.removeEventListener('touchmove', onScrollTrigger, { passive:true });
      armOnce();
    }
  }

  window.addEventListener('scroll', onScrollTrigger, { passive:true });
  window.addEventListener('wheel', onScrollTrigger, { passive:true });
  window.addEventListener('touchmove', onScrollTrigger, { passive:true });
})();
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>
  const swiper = new Swiper('.schedule-board.swiper', {
  loop: false,
  slidesPerView: 1.05,
  centeredSlides: true,     // mobilon jó
  spaceBetween: 18,
  grabCursor: true,
  pagination: { el: '.swiper-pagination', clickable: true },
  navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
  breakpoints: {
    576:  { slidesPerView: 2,  centeredSlides: false, spaceBetween: 18 },
    768:  { slidesPerView: 3,  centeredSlides: false, spaceBetween: 20 },
    1200: { slidesPerView: 5,  centeredSlides: false, spaceBetween: 22 } // desktop
  }
});
</script>

</body>

</html>
