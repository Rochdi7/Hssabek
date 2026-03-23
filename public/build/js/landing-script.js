/**
 * Landing Page Script
 * Initializes AOS animations, Owl Carousel, CounterUp, cursor effects, etc.
 */
(function ($) {
    "use strict";

    // AOS Animation Init
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 1000,
            once: true,
            easing: 'ease-in-out'
        });
    }

    // Counter Up
    if ($.fn.counterUp) {
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
    }

    // Owl Carousel - Invoice Template Slider
    if ($.fn.owlCarousel) {
        $('.invoive-temp-slider').owlCarousel({
            loop: true,
            margin: 24,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: { items: 1 },
                576: { items: 2 },
                768: { items: 3 },
                1024: { items: 4 },
                1200: { items: 5 }
            }
        });
        // Accessibility: add aria-labels to owl-dot buttons
        $('.invoive-temp-slider .owl-dot').each(function (i) {
            $(this).attr('aria-label', 'Diapositive ' + (i + 1));
        });
    }

    // Feather Icons
    if (typeof feather !== 'undefined') {
        feather.replace();
    }

    // Sticky Header
    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 100) {
            $('.header').addClass('fixed');
        } else {
            $('.header').removeClass('fixed');
        }
    });

    // Mobile Menu
    $(document).on('click', '#mobile_btn', function (e) {
        e.preventDefault();
        $('main-wrapper').toggleClass('slide-nav');
        $('.main-menu-wrapper').toggleClass('show');
        $('body').toggleClass('menu-opened');
    });

    $(document).on('click', '#menu_close', function (e) {
        e.preventDefault();
        $('main-wrapper').removeClass('slide-nav');
        $('.main-menu-wrapper').removeClass('show');
        $('body').removeClass('menu-opened');
    });

    // Back to Top
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });

    $(document).on('click', '.back-to-top', function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });

    // Custom Mouse Cursor
    function initCursor() {
        var cursorOuter = document.querySelector('.cursor-outer');
        var cursorInner = document.querySelector('.cursor-inner');

        if (!cursorOuter || !cursorInner) return;

        var mouseX = 0, mouseY = 0;
        var outerX = 0, outerY = 0;

        document.addEventListener('mousemove', function (e) {
            mouseX = e.clientX;
            mouseY = e.clientY;
            cursorInner.style.left = mouseX + 'px';
            cursorInner.style.top = mouseY + 'px';
        });

        function animateOuter() {
            outerX += (mouseX - outerX) * 0.15;
            outerY += (mouseY - outerY) * 0.15;
            cursorOuter.style.left = outerX + 'px';
            cursorOuter.style.top = outerY + 'px';
            requestAnimationFrame(animateOuter);
        }
        animateOuter();

        // Hover effects on links and buttons
        $('a, button, .btn').on('mouseenter', function () {
            cursorInner.classList.add('cursor-hover');
            cursorOuter.classList.add('cursor-hover');
        }).on('mouseleave', function () {
            cursorInner.classList.remove('cursor-hover');
            cursorOuter.classList.remove('cursor-hover');
        });
    }

    // Smooth Scroll for anchor links
    $('a[href^="#"]').on('click', function (e) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            e.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 80
            }, 600);
        }
    });

    // Initialize on document ready
    $(document).ready(function () {
        initCursor();
    });

})(jQuery);
