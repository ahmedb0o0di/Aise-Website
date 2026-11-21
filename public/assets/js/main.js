/**
 * Minton / Astra - Main Interactive Application Script
 * Modular Architecture with clean lifecycle management
 */

(function ($) {
  'use strict';

  const App = {
    /**
     * Configuration options & state
     */
    config: {
      themeStorageKey: 'minton_theme',
      defaultTheme: 'light',
      pricing: {
        mo: { p1: '299', p2: '699' },
        yr: { p1: '239', p2: '559' }
      }
    },

    state: {
      yearlyBilling: false,
      countersTriggered: false,
      progressBarsTriggered: false
    },

    /**
     * Initialize all modules
     */
    init: function () {
      this.initPreloader();
      this.initAOS();
      this.initCustomCursor();
      this.initNavbar();
      this.initScrollTop();
      this.initSmoothScroll();
      this.initThemeToggle();
      this.initPricingToggle();
      this.initPortfolioFilter();
      this.initModals();
      this.initSwiper();
      this.initMagnificPopup();
      this.initContactForm();
    },

    /**
     * 1. Preloader Animation & Cleanup
     */
    initPreloader: function () {
      const self = this;
      setTimeout(function () {
        $('#loader').addClass('gone');
        setTimeout(function () {
          $('#loader').remove();
          // Trigger counters once page is visible if already at top
          if ($(window).scrollTop() < 300) {
            self.runCounters();
          }
        }, 700);
      }, 1500);
    },

    /**
     * 2. Animate On Scroll (AOS)
     */
    initAOS: function () {
      if (typeof AOS !== 'undefined') {
        AOS.init({
          duration: 800,
          easing: 'cubic-bezier(.23, 1, .32, 1)',
          once: true,
          offset: 80
        });
      }
    },

    /**
     * 3. Interactive Custom Cursor Tracking
     */
    initCustomCursor: function () {
      const $dot = $('#cDot');
      const $ring = $('#cRing');

      if (!$dot.length || !$ring.length) return;

      let mx = 0, my = 0;
      let rx = 0, ry = 0;

      $(document).on('mousemove', function (e) {
        mx = e.clientX;
        my = e.clientY;
        $dot.css({ left: mx + 'px', top: my + 'px' });
      });

      function renderRing() {
        rx += (mx - rx) * 0.14;
        ry += (my - ry) * 0.14;
        $ring.css({ left: rx + 'px', top: ry + 'px' });
        requestAnimationFrame(renderRing);
      }
      renderRing();

      // Expand ring when hovering interactive elements
      $('a, button, .svc-card, .pf-item, .tm-card, .news-card, .ft-card, .faq-item')
        .on('mouseenter', function () {
          $ring.addClass('big');
        })
        .on('mouseleave', function () {
          $ring.removeClass('big');
        });
    },

    /**
     * 4. Sticky Navbar, Scrollspy & Parallax
     */
    initNavbar: function () {
      const self = this;
      const $navbar = $('#navbar');
      const $scrtop = $('#scrtop');
      const $heroPBG = $('#heroPBG');
      const $about = $('#about');

      $(window).on('scroll', function () {
        const st = $(this).scrollTop();
        const winH = $(window).height();

        // Sticky Navbar
        if (st > 50) {
          $navbar.addClass('scrolled');
        } else {
          $navbar.removeClass('scrolled');
        }

        // Scroll to Top visibility
        if (st > 300) {
          $scrtop.addClass('show');
        } else {
          $scrtop.removeClass('show');
        }

        // Hero Parallax Background
        if ($heroPBG.length && st < winH) {
          $heroPBG.css('transform', 'translateY(' + (st * 0.35) + 'px)');
        }

        // Active Section ScrollSpy
        $('section[id]').each(function () {
          const $sec = $(this);
          const offset = $sec.offset();
          if (!offset) return;
          const top = offset.top - 130;
          const bottom = top + $sec.outerHeight();
          const id = $sec.attr('id');

          if (st >= top && st < bottom) {
            $('.nav-link').removeClass('active');
            $('.nav-link[href="#' + id + '"]').addClass('active');
          }
        });

        // Trigger about counters on scroll
        if (!self.state.countersTriggered && $about.length) {
          if (st + winH > $about.offset().top + 100) {
            self.state.countersTriggered = true;
            self.runCounters();
          }
        }

        // Trigger about progress bars
        if (!self.state.progressBarsTriggered && $about.length) {
          if (st + winH > $about.offset().top + 180) {
            self.state.progressBarsTriggered = true;
            self.animateProgressBars();
          }
        }
      });
    },

    /**
     * 5. Back to Top Button
     */
    initScrollTop: function () {
      $('#scrtop').on('click', function (e) {
        e.preventDefault();
        $('html, body').stop().animate({ scrollTop: 0 }, 600);
      });
    },

    /**
     * 6. Smooth Scroll for Anchor Links
     */
    initSmoothScroll: function () {
      $('a[href^="#"]').not('[data-bs-toggle], [data-bs-target], [href="#"]').on('click', function (e) {
        const targetId = $(this).attr('href');
        if (!targetId || targetId === '#' || targetId.length <= 1) return;
        
        try {
          const $target = $(targetId);
          if ($target.length) {
            e.preventDefault();
            $('html, body').stop().animate({
              scrollTop: $target.offset().top - 76
            }, 650);

            // Auto-collapse mobile navbar
            const $navMenu = $('#navMenu');
            if ($navMenu.hasClass('show')) {
              $navMenu.collapse('hide');
            }
          }
        } catch (err) {
          // Ignore invalid selector
        }
      });
    },

    /**
     * 7. Dark / Light Theme Toggle with LocalStorage
     */
    initThemeToggle: function () {
      const self = this;
      const savedTheme = localStorage.getItem(self.config.themeStorageKey) || self.config.defaultTheme;
      self.applyTheme(savedTheme);

      $('#themeBtn').on('click', function () {
        const currentTheme = $('html').attr('data-theme') || 'light';
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        self.applyTheme(newTheme);
      });
    },

    applyTheme: function (theme) {
      $('html').attr('data-theme', theme);
      localStorage.setItem(this.config.themeStorageKey, theme);

      const $thIco = $('#thIco');
      const $thLbl = $('#thLbl');

      if (theme === 'dark') {
        $thIco.removeClass('fa-sun').addClass('fa-moon');
        $thLbl.text('Dark Mode');
      } else {
        $thIco.removeClass('fa-moon').addClass('fa-sun');
        $thLbl.text('Light Mode');
      }
    },

    /**
     * 8. Animated Counters
     */
    runCounters: function () {
      $('.counter').each(function () {
        const $el = $(this);
        if ($el.data('animated')) return;
        $el.data('animated', true);

        const target = parseInt($el.data('count'), 10) || 0;
        $({ count: 0 }).animate({ count: target }, {
          duration: 1800,
          easing: 'swing',
          step: function () {
            $el.text(Math.floor(this.count));
          },
          complete: function () {
            $el.text(target);
          }
        });
      });
    },

    /**
     * 9. Progress Bars Fill
     */
    animateProgressBars: function () {
      $('#about .prog-fill').each(function () {
        const w = $(this).data('width');
        $(this).css('width', w + '%');
      });
    },

    /**
     * 10. Pricing Monthly / Yearly Switcher
     */
    initPricingToggle: function () {
      const self = this;
      const $switch = $('#prSw');
      if (!$switch.length) return;

      $switch.on('click', function () {
        self.state.yearlyBilling = !self.state.yearlyBilling;
        const isYearly = self.state.yearlyBilling;

        $(this).toggleClass('on', isYearly);
        $('#prMoLbl').toggleClass('on', !isYearly);
        $('#prYrLbl').toggleClass('on', isYearly);

        const prices = isYearly ? self.config.pricing.yr : self.config.pricing.mo;
        self.swapPriceText('#pr1', prices.p1);
        self.swapPriceText('#pr2', prices.p2);

        if (isYearly) {
          $('#pr3').text('Custom');
        } else {
          $('#pr3').text('Custom');
        }
      });
    },

    swapPriceText: function (selector, newPrice) {
      const $elem = $(selector);
      if (!$elem.length) return;
      $elem.animate({ opacity: 0 }, 140, function () {
        $elem.text(newPrice).animate({ opacity: 1 }, 140);
      });
    },

    /**
     * 11. Portfolio Category Filtering
     */
    initPortfolioFilter: function () {
      $('.ftab').on('click', function () {
        const filter = $(this).data('filter');
        $('.ftab').removeClass('active');
        $(this).addClass('active');

        $('.pf-cat').each(function () {
          const itemCat = $(this).data('cat');
          if (filter === 'all' || itemCat === filter) {
            $(this).stop().fadeIn(320);
          } else {
            $(this).stop().fadeOut(200);
          }
        });
      });
    },

    /**
     * 12. Modal Enhancements
     */
    initModals: function () {
      // Animate skill bars inside Team Modals upon showing
      $(document).on('shown.bs.modal', function (e) {
        $(e.target).find('.prog-fill').each(function () {
          const w = $(this).data('width');
          const $bar = $(this);
          setTimeout(function () {
            $bar.css('width', w + '%');
          }, 150);
        });
      });
    },

    /**
     * 13. Testimonials Swiper Carousel
     */
    initSwiper: function () {
      if (typeof Swiper !== 'undefined' && $('.tstSwiper').length) {
        new Swiper('.tstSwiper', {
          slidesPerView: 1,
          spaceBetween: 24,
          loop: true,
          autoplay: {
            delay: 5000,
            disableOnInteraction: false
          },
          pagination: {
            el: '.swiper-pagination',
            clickable: true
          },
          breakpoints: {
            768: {
              slidesPerView: 2
            },
            1024: {
              slidesPerView: 3
            }
          }
        });
      }
    },

    /**
     * 14. Magnific Popup for Video Showreel
     */
    initMagnificPopup: function () {
      if ($.fn.magnificPopup && $('.magnific_popup').length) {
        $('.magnific_popup').magnificPopup({
          disableOn: 300,
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: false,
          fixedContentPos: false
        });
      }
    },

    /**
     * 15. Interactive Contact Form with Validation & Feedback
     */
    initContactForm: function () {
      $('#cfSubmit').on('click', function (e) {
        e.preventDefault();
        const $btn = $(this);
        const originalHtml = $btn.html();

        // Simple validation check
        const name = $('#cfName').val();
        const email = $('#cfEmail').val();
        const msg = $('#cfMsg').val();

        if (!name || !email || !msg) {
          alert('Please fill in all required fields (Name, Email, and Message).');
          return;
        }

        // Simulated sending state
        $btn.html('<i class="fas fa-spinner fa-spin me-2"></i> Sending...').prop('disabled', true);

        setTimeout(function () {
          $btn.html('<i class="fas fa-check me-2"></i> Message Sent! We\'ll be in touch.').css('background', '#22c55e');

          // Reset inputs
          $('#cfName').val('');
          $('#cfEmail').val('');
          $('#cfPhone').val('');
          $('#cfMsg').val('');

          setTimeout(function () {
            $btn.html(originalHtml).css('background', '').prop('disabled', false);
          }, 4000);
        }, 1800);
      });
    }
  };

  // Launch on DOM Ready
  $(document).ready(function () {
    App.init();
  });

})(jQuery);
