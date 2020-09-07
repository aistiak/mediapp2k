<template>
    <div class="mediapp-container">
        <div class="mediapp-nav">
            <!-- this is nav -->
            <div class="logo" @click="() =>  $router.push(`/mediapp`) " >
                logo  
            </div>
            <div >
                <div v-if="is_loggedin"> 
                    <div class="user" @click=" () => show_menu = !show_menu">
                        user 
                    </div>
                    <div class="user-menu" v-show="show_menu">
                        <ul>
                            <li @click="() =>  $router.push(`/mediapp`) ">Home</li>
                            <li @click="() =>  $router.push(`/user/profile`) ">profile</li>
                            <li @click="() =>  $router.push(`/user/appointment`) ">appointments</li>
                            <li @click="handel_logout">logout</li>
                        </ul>
                    </div>
                </div>
                <div  v-else @click="handel_login" style="margin-right:25px;cursor:pointer">
                     <a href="javascript:;">login</a>
                </div>
            </div>
        </div>
        <div>
            <nuxt/>
        </div>
        <div class="footer">
            this is footer section 
        </div>
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
    data(){
        return {
            show_menu : false ,
            loggedin : false ,
        }
    },
    head(){
      return {
        title: "Mediapp"
      }
    },
    mounted () {
      this.refreshAuth()
      // auth.setUpAuth() 
      this.$nextTick(() => {
        this.$nuxt.$loading.start()
        setTimeout(() => this.$nuxt.$loading.finish(), 500)
      })
    },
    computed : {
        ...mapGetters('user.module',['is_loggedin','user'])    
    } ,
    methods: {
      ...mapMutations({
          set_login_status : 'user.module/set_login_status'
      }),  
      ...mapActions({
        'refreshAuth' : 'auth_patient/refreshAuth'
      }),
      handel_login : function() {
          this.$router.push('/login')
        //   this.loggedin = true
      } ,

      handel_logout : function(){
          this.set_login_status(false)
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
    height: 45px;
    background-color: #2F3B59;
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
}
.user-menu {
position: absolute;
    background-color: rgb(136 115 115);
    text-align: center;
    width: 15vw;
    right: 1%;
    top: 102%;
    border: 1px solid grey;
    min-width: 200px;
    border-radius: 4px;
    box-shadow: 1px 1px 1px 1px #222;
}
ul > li:hover {
    cursor : pointer ;
    color : rgb(170, 216, 164) ;
}
.footer {
    width:100% ;
    height  : 100vh ;
    background-color : #2F3B59 ;
}
</style>