/*------------------------------------------------------------------
    Template Name:  Loazzne
    Version: 1.0
    Author: Layerdrops
    Author Email: layerdrops@gmail.com

    [Table of Content]

    01: Navbar Fixed
    02: PreLoader
    03: Responsive menu
    04: responsive toggle menu
    05: Book Online radio button
    06: Header Slider
    07: Home v2 Header Slider
    08: Custom Owl-carousel
    09: Clients Logo
    10: Service Slider
    11: Video Promotion
*/

(function ($) {
    'use strict';

    /*** =====================================
     * Navbar fixed
     * =====================================***/
    const menu_fixed = document.querySelector('.main_menu_area');
    const topOfNav = menu_fixed.offsetTop;

    function fixed_nav() {
        if (window.scrollY >= topOfNav || window.scrollY === topOfNav) {
            document.body.classList.add('fixed-scroll-nav');
        } else {
            document.body.classList.remove('fixed-scroll-nav');
        }
    }
    window.addEventListener('scroll', fixed_nav);

    /*** =====================================
     * PreLoader
     * =====================================***/
    $(window).on('load', function(){
        $('.preloader').delay('500').fadeOut(2000);
    });


    $(document).on('ready', function () {
        /*** =====================================
         * Toogle Nav Menu
         * =====================================***/
        $(document).on('click', '.main_menu_area button.navbar-toggles', function () {
            $('.main_menu_area .collapse_responsive').toggleClass('collapse_active');
            $('.main_menu_area button.navbar-toggles').toggleClass('navbar_close');
        });

        $(document).on('click','.main_menu_area .navbar-nav li > span.responsive_menu:not(:only-child)', function (e) {
            $(this).siblings('.dropdown-menu').toggle();
            $('.dropdown-menu').not($(this).siblings()).hide();
            e.stopPropagation();
        });


        /*** =====================================
         * Service Single tabs
         * =====================================***/
         $(document).on('click', '.service_class_remove .nav-tabs li', function () {
             $(".service_cool_head .nav-tabs li").removeClass('active');
         });
        $(document).on('click', '.service_cool_head .nav-tabs li', function () {
            $(".service_class_remove .nav-tabs li").removeClass('active');
        });


        /*** =====================================
         * CounterUP
         * =====================================***/
        $('.counter').counterUp({
            delay: 10,
            time: 3000
        });


        /*** =====================================
         * Home v1 Header Slider
         * =====================================***/
        $('.header_slider_area').owlCarousel({
            items: 1,
            autoHeight: true,
            autoplay: true,
            loop: true,
            nav: false,
            dots: true,
            slideSpeed: 300,
            animateIn: 'slideInLeft',
            animateOut: 'fadeOutRight',
            autoplayTimeout: 7000,
        });

        /*** =====================================
         * Testimonial Slider
         * =====================================***/
        $('.testimonial_slider').owlCarousel({
            items: 1,
            autoHeight: true,
            autoplay: true,
            loop: true,
            nav: true,
            navText: ["<i class='fa fa-angle-left'>", "<i class='fa fa-angle-right'>"],
            dots: true,
            thumbs: true,
            thumbsPrerendered: true,
            animateOut: 'slideOutDown',
            animateIn: 'slideInDown'
        });

        /*** =====================================
         * Clients Logos Slider
         * =====================================***/
        $('.clients_logo').owlCarousel({
            autoHeight: true,
            autoplay: true,
            loop: true,
            nav: false,
            autoplayTimeout: 3000,
            dots: false,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 5,
                }
            }
        });


        /*** =====================================
         * Video Promotion
         =====================================***/
        $("#videolink").magnificPopup({
            type: 'inline',
            midClick: true
        });

        $('.mfp-close-btn-in').on('click', function () {
            $('#videostore').hide();
        });

    });


})(jQuery);