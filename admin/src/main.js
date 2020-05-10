/*=========================================================================================
  File Name: main.js
  Description: main vue(js) file
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


import Vue from 'vue'
import App from './App.vue'
import Auth from './packages/Auth'

// Vuesax Component Framework
import Vuesax from 'vuesax'
import 'material-icons/iconfont/material-icons.css' //Material Icons
import 'vuesax/dist/vuesax.css'; // Vuesax

Vue.use(Vuesax)


// axios
import axios from "axios"
Vue.prototype.$http = axios
axios.defaults.baseURL = "http://127.0.0.1:8000/"
axios.defaults.headers.common["Authorization"] = `Bearer ${localStorage.getItem(`token`)}` 
// my auth 
Vue.use(Auth)


// API Calls
import "./http/requests"

// mock
import "./fake-db/index.js"

// Theme Configurations
import '../themeConfig.js'


// Firebase
import '@/firebase/firebaseConfig'


// Auth0 Plugin
// import AuthPlugin from "./plugins/auth";
// Vue.use(AuthPlugin);


// ACL
import acl from './acl/acl'


// Globally Registered Components
import './globalComponents.js'


// Styles: SCSS
import './assets/scss/main.scss'


// Tailwind
import '@/assets/css/main.css'


// Vue Router
import router from './router'


// Vuex Store
import store from './store/store'


// i18n
import i18n from './i18n/i18n'


// Vuexy Admin Filters
import './filters/filters'


// Clipboard
import VueClipboard from 'vue-clipboard2'
Vue.use(VueClipboard);


// Tour
import VueTour from 'vue-tour'
Vue.use(VueTour)
require('vue-tour/dist/vue-tour.css')


// VeeValidate
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);


// Google Maps
import * as VueGoogleMaps from 'vue2-google-maps'
Vue.use(VueGoogleMaps, {
    load: {
        // Add your API key here
        key: 'YOUR_API_KEY',
        libraries: 'places', // This is required if you use the Auto complete plug-in
    },
})

// Vuejs - Vue wrapper for hammerjs
import { VueHammer } from 'vue2-hammer'
Vue.use(VueHammer)


// PrismJS
import 'prismjs'
import 'prismjs/themes/prism-tomorrow.css'


// Feather font icon
require('./assets/css/iconfont.css')


// Vue select css
// Note: In latest version you have to add it separately
// import 'vue-select/dist/vue-select.css';

// auth check 

Vue.config.productionTip = false
router.beforeEach(
    (to,from,next) => {
      if(to.matched.some(record => record.meta.forVisitors)){
        if(!Vue.auth.isAuthenticated()){
        //   alert(`not logged in`)    
          next({
            path: '/dashboard/analytics'
            // path: '/pages/login'
          })
        }
        else{
            // alert(Vue.auth.isAuthenticated())
            next()
        }
      }
        
      else if(to.matched.some(record => record.meta.forAuth)){
        if(!Vue.auth.isAuthenticated()){
            alert(`NOT logged in`)    
            next({
            path: '/pages/login'
            })
        }
        else
        {
          next()
        }
      }
        
      else{
          // alert(Vue.auth.isAuthenticated())
          console.log(to.matched.some(record => record.meta.forVisitors))
          next()  
      }
    }
  )
  
new Vue({
    router,
    store,
    i18n,
    acl,
    render: h => h(App)
}).$mount('#app')
