import Vue from "vue"
import axios from "axios"
import store from "../store/store"

const loginHelper  = function(arg) {
    try{

        alert('login helper')
        console.log(store)
        axios.defaults.headers.common["Authorization"] = `Bearer ${ arg.access_token}` 
        console.log(`axios detail `)
        console.log(axios.defaults)
        localStorage.setItem('token',arg.access_token)
        localStorage.setItem('tokenExpiryKey',arg.expires_at.date)
        // store.commit('set_login_status',true) 
        // store.commit('set_user',arg.user) 
    }catch(e){
        console.log(e)
    }
    return 

}

const setUpAuth = function(){
    if(localStorage.getItem(`token`)){ 
        // validate date 
        console.log(`tonek avaiable`)
        if( new Date(localStorage.getItem('tokenExpiryKey')) > new Date(Date.now())  ) {
            console.log(`token not expired`)
            axios.defaults.headers.common["Authorization"] = `Bearer ${localStorage.getItem(`token`)}` 
            // dispatch logged in user info        
            // store.commit('set_login_status',true)
            // store.dispatch('fetch_auth_user')
        }
        return true 
    }
    return false 
}

const clearAuth = function(){
    localStorage.clear()
    // store.commit('set_login_status',false)
    // store.commit('set_user',{})

}

export default {
    loginHelper ,
    setUpAuth ,
    clearAuth ,
}