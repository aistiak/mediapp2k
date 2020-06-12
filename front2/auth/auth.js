import Vue from "vue"
import axios from "axios"
import store from "../store/store"

const loginHelper  = function(arg) {

    axios.defaults.headers.common["Authorization"] = `Bearer ${ arg.access_token}` 
    localStorage.setItem('token',arg.access_token)
    localStorage.setItem('tokenExpiryKey',arg.expires_at.date)
    store.commit('set_login_status',true) 
    store.commit('set_user',arg.user) 

}

const setUpAuth = function(){
    if(localStorage.getItem(`token`)){ 
        // alert(`set up auth `)
        // validate date 
        if( new Date(localStorage.getItem('tokenExpiry')) > new Date(Date.now())  ) {
            axios.defaults.headers.common["Authorization"] = `Bearer ${localStorage.getItem(`token`)}` 
            // dispatch logged in user info        
            store.commit('set_login_status',true)
            store.dispatch('fetch_auth_user').then(response => {
                console.log(response)
            }).catch( error => {
                console.log(error)
            })

        }
    }
}

export default {
    loginHelper ,
    setUpAuth ,
}