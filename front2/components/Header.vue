<template>
  <div>
    <header class="header_area">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="header_social">
            <ul class="hd_social_icons">
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9 col-sm-8 col-xs-12">
          <div class="header_contact text-right">
            <ul class="hd_contact">
              <li><i class="icon-placeholder"></i> Address<a href=""> 66 Broklyn Street, New York</a></li>
              <li><i class="icon-phone-call"></i> Call Now<a href=""> 666 888 000</a></li>
              <li v-if="is_loggedin" ><i class="icon-clock"></i>  <a href="javascript:;" @click="logout"> logout </a></li>
              <li v-else  ><i class="icon-clock"></i> <a href="javascript:;" @click="$router.push('/login')"> login  </a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
 
 </header>


    <div class="main_menu_area">
      <div class="container">
        <div class="row">
          <div class="col-md-2 col-sm-12">
            <button type="button" class="navbar-toggles">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="javascript:;" class="logo" @click="$router.push('/')" >
              <img src="/assets/images/logo.png" alt="Logo">
            </a>
          </div>
          <div class="col-md-10 col-sm-9 collapse_responsive">
            <div class="collapse navbar-collapse remove_padding" id="myNavbar">
              <ul class="nav navbar-nav text-center">
                <li>
                  <a href="/">Home <i class="fa fa-angle-down"></i></a> <span class="responsive_menu"><i class="fa fa-angle-down"></i></span>
                  <ul class="dropdown-menu dropdown-menu-responsive">
                    <li><nuxt-link to="user/profile">profile</nuxt-link></li>
                    <li><nuxt-link to="user/appointment">appointments</nuxt-link></li>
                    <li><nuxt-link to="register">register</nuxt-link></li>
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
                <li class="header_right_btn" v-if="is_loggedin">
                  <a class="btn-yellow" href="#">{{user.name}}</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  
    import {mapGetters} from "vuex"
    import auth from "../auth/auth"
    export default {
      name: "Header",
      data() {
        return {

          // is_loggedin : false ,
        }
      } ,
      computed:{
        ...mapGetters('user.module',['is_loggedin','user'])
      },
      methods:{
        logout : function(){
          auth.clearAuth()
        },
      },
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
