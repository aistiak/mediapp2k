import Vue from "vue"
import axios from "axios"
import store from "../store/store"

const loginHelper  = function(arg) {

    axios.defaults.headers.common["Authorization"] = `Bearer ${ arg.access_token}` 
    localStorage.setItem('token',arg.access_token)
    localStorage.setItem('tokenExpiryKey',arg.expires_at.date)
    store.commit('set_login_status',true) 

}

const setUpAuth = function(){

    if(localStorage.getItem(`token`)){ 
        // validate date 
        if( new Date(localStorage.getItem('tokenExpiry')) > new Date(Date.now())  ) {
            axios.defaults.headers.common["Authorization"] = `Bearer ${localStorage.getItem(`token`)}` 
            // dispatch logged in user info 
            
            store.commit('set_login_status',true) 
        }
    }
}

export default {
    loginHelper ,
    setUpAuth ,
}