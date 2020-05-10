<template>
  <div class="main_menu_area menu_style_2">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2 col-sm-7 col-xs-12 responsive_full_width">
          <button type="button" class="navbar-toggles">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="/" class="logo">
            <img src="/assets/images/logo.png" alt="logo">
          </a>
        </div><!--end .col-md-2-->
        <div class="col-md-8 col-sm-6 collapse_responsive">
          <div class="collapse navbar-collapse remove_padding" id="myNavbar">
            <ul class="nav navbar-nav text-center main_nav_2">
              <li>
                <a href="/">Home <i class="fa fa-angle-down"></i></a> <span class="responsive_menu"><i class="fa fa-angle-down"></i></span>
                <ul class="dropdown-menu dropdown-menu-responsive">
                  <li><nuxt-link to="/">Home 01</nuxt-link></li>
                  <li><nuxt-link to="/index-2">Home 02</nuxt-link></li>
                </ul>
              </li>
              <li><nuxt-link to="/about">About</nuxt-link></li>
              <li>
                <nuxt-link to="/service">Services <i class="fa fa-angle-down"></i></nuxt-link> <span class="responsive_menu"><i class="fa fa-angle-down"></i></span>
                <ul class="dropdown-menu dropdown-menu-responsive2">
                  <li><nuxt-link to="/service">Services</nuxt-link></li>
                  <li><nuxt-link to="/service-details">Service Details</nuxt-link></li>
                </ul>
              </li>
              <li>
                <nuxt-link to="/blog">Blog <i class="fa fa-angle-down"></i></nuxt-link> <span class="responsive_menu"><i class="fa fa-angle-down"></i></span>
                <ul class="dropdown-menu dropdown-menu-responsive2">
                  <li><nuxt-link to="/blog">Blog Grid</nuxt-link></li>
                  <li><nuxt-link to="/blog-details">Blog Details</nuxt-link></li>
                </ul>
              </li>
              <li><nuxt-link to="/contact">Contact</nuxt-link></li>
            </ul>
          </div><!--end .collapse-->
        </div><!--end .col-md-8-->
        <div class="col-md-2 col-sm-5 col-xs-12 responsive_full_width">
          <div class="header_social">
            <ul class="hd_social_icons">
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
          </div><!--end .header_social-->
        </div><!--end .col-md-2-->
      </div><!--end .row-->
    </div><!--end .container-->
  </div>
</template>

<script>
    export default {
      name: "HeaderTwo",
      mounted() {
        //Fixed menu
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

        $(document).on('click', '.main_menu_area button.navbar-toggles', function () {
          $('.main_menu_area .collapse_responsive').toggleClass('collapse_active');
          $('.main_menu_area button.navbar-toggles').toggleClass('navbar_close');
        });

        $(document).on('click','.main_menu_area .navbar-nav li > span.responsive_menu:not(:only-child)', function (e) {
          $(this).siblings('.dropdown-menu').toggle();
          $('.dropdown-menu').not($(this).siblings()).hide();
          e.stopPropagation();
        });

      }
    }
</script>

<style scoped>

</style>
