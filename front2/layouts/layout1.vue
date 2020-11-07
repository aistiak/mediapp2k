<template>
    <div class="mediapp-container">
        <div class="mediapp-nav">
            <!-- this is nav -->
            <div class="logo" @click="() =>  $router.push(`/`) " >
                <img src="/assets/logos/cover-logo-01.png" alt="" style="height:30px;width:30px;">
            </div>
            <div >
                <div v-if="auth_user.id"> 
                    <div class="user" @click=" () => show_menu = !show_menu">
                        <!-- user  -->
                        <img v-if="auth_user.media"  :src="auth_user.media.path" alt="" class="auth-user" >
                        <span v-else> user </span>
                    </div>
                    <div class="user-menu" v-show="show_menu">
                        <ul @click="() => show_menu = false ">
                            <li @click="mobile_map_search">Search</li>
                            <li @click="() =>  $router.push(`/`) ">Home</li>
                            <li @click="() =>  $router.push(`/user/profile`) ">profile</li>
                            <li @click="() =>  $router.push(`/user/appointment`) ">appointments</li>
                            <li @click="handel_logout">logout</li>
                        </ul>
                    </div>
                </div>

                <div  v-else @click="handel_login" class="login_register" >

                    <a href="javascript:;" 
                        class="login" >
                        login
                    </a>

                     <span>
                         <span> | </span>
                        <a href="javascript:;" 
                           class="register">
                           Register
                        </a>
                     </span>

                </div>
                <div class="mobile_login_register">

                    <i v-show="!auth_user.id" 
                       @click="() => show_menu=!show_menu"
                       class="fa fa-bars">
                    </i>

                    <ul v-show="show_menu && !auth_user.id"  
                        @click="handel_login">
                        <li class="login"> 
                            Login 
                        </li>
                        <li class="register"> 
                            Register 
                        </li>
                        <!-- <li @click="mobile_map_search">  -->
                        <li > 
                            <a href="#app-seatch-bar"></a>
                            Search 
                            <!-- <nuxt-link :to="{path: '/', hash: 'app-seatch-bar'}" 
                                       v-scroll-to="{el: '#app-seatch-bar'}">
                                       link
                            </nuxt-link> -->
                        </li>
                    </ul>

                </div>

            </div>
        </div>
        <div class="floating_search" v-show="show_floating_search" >
            <input type="Search" >
             <i class="fa fa-close" @click="() => show_floating_search = false"></i>
        </div>
        <div>
            <nuxt/>
        </div>
        <notifications group="foo" position="bottom right" />
        <Footer/>
        <!-- <div class="footer">
            this is footer section 
        </div> -->
    </div>
</template>
<script>
import SearchBar from "~/components/SearchBar";
import Header from "~/components/Header";
import Footer from "~/components/Footer";
import auth from  "../auth/auth"
import axios from "axios"
import {mapActions, mapGetters , mapMutations } from "vuex"
export default {
    name : 'Layout1',
    components:{
        Footer : () => import("~/components/FooterMediapp") ,
    },
    data(){
        return {
            show_menu : false ,
            loggedin : false ,
            show_floating_search : false ,
        }
    },
    head(){
      return {
        title: "H24CARE"
      }
    },
    mounted () {
      this.fetchAuthUser()  
     // auth.setUpAuth() 
      this.$nextTick(() => {
        this.$nuxt.$loading.start()
        setTimeout(() => this.$nuxt.$loading.finish(), 500)
      })
    },
    computed : {
        ...mapGetters('user.module',['is_loggedin','user']),    
        ...mapGetters('auth_patient',['auth_user']),    
    } ,
    methods: {
      ...mapMutations({
          set_login_status : 'user.module/set_login_status',
          commit_auth_user : 'auth_patient/commit_auth_user',
      }),  
      ...mapActions({
        'refreshAuth' : 'auth_patient/refreshAuth',
        'getAuthUser' : 'auth_patient/getAuthUser' ,
        'logout'      : 'user.module/logout' ,
      }),
      fetchAuthUser() {
          this.refreshAuth()
          this.getAuthUser()
      } ,
      handel_login : function(event) {
          if(event.target.className) 
            this.$router.push(`/${event.target.className}`)
      } ,

      handel_logout : function(){
          this.set_login_status(false)
          // clear auth user 
          this.commit_auth_user({})

          this.logout() 

          this.$router.push('/')
      },
      mobile_map_search : function() {
          this.$router.push(`/`) 
          var elmnt = document.getElementById("app-seatch-bar");
          elmnt.scrollIntoView();
        //   this.show_floating_search = true 
        //   this.show_menu = false 
      },
    }    
}
</script>
<style scoped>
body{
    overflow:hidden ;
}
.mediapp-container {
    
}
.mediapp-nav{
    position: sticky;
    top : 0 ;
    z-index: 100;
    display: flex;
    justify-content: space-between;
    align-items: baseline;
    height: 50px;
    background-color: #2F3B59;
    box-shadow: 5px 5px 5px  ;
}
.mediapp-nav > div {
  color : white ;
}
.mediapp-nav .logo {
    margin-left: 25px;
}
.logo {
    cursor : pointer ;
}
.mediapp-nav .user{
    cursor: pointer ;
    margin-right: 25px;
    background-color: cadetblue;
    padding : 7px;
    border-radius: 50%;
}
.user {
    height :40px;
    width  :40px;
    box-shadow: 5px 5px 5px #222;
    border: 2px solid black;
    height: 50px;
    width: 50px;
}
.user-menu {
    position: absolute;
    background-color: rgb(47 59 89) ;
    text-align: center;
    width: 15vw;
    right: 1%;
    top: 102%;
    border: 1px solid grey;
    min-width: 200px;
    border-radius: 4px;
    box-shadow: 5px 5px 5px #222;
    border: 2px solid #222;
}
ul > li:hover {
    cursor : pointer ;
    color : rgb(170, 216, 164) ;
}
.footer {
    width:100% ;
    height  : 80vh ;
    background-color : #2F3B59 ;
}
.login_register{
    margin-right:25px;
    cursor:pointer;
}
.mobile_login_register {
    display: none;
}
.floating_search{
    display:none ;
}
@media only screen and (max-width: 780px) {
    .login_register {
        display:none;
    }
    .mobile_login_register {
        display: block;
        margin-right: 20px ;
    }
    .mobile_login_register > ul{
        position : absolute ;
        z-index: 100;
        right: 2%;
        background-color: rgb(85, 80, 80);
        padding :20px ;
        border-radius: 3px;
    }
    .floating_search{
        display: block;
        position: absolute;
        width: 100%;
        z-index: 90;
        margin: 10px;
        top: 8%;
        width: 88%;
        left: 6%;
        /* border-bottom: 2px solid grey; */
    }
     .floating_search > input{
         width : 90% ;
         height : 5vh ;
     }
    .floating_search > i{
            position: absolute;
            top: 6%;
            right: 4%;
            font-size: 23px;

    }
    /* #map-wrap {
        margin-top : 0% ;
        height: 85vh;
    } */
}

.auth-user {
    height: 45PX;
    width: 45px;
    border-radius: 50%;
    POSITION: RELATIVE;
    left: -6px;
    top: -5px;
}
</style>
<style >
html{
    overflow: auto;
}
</style>