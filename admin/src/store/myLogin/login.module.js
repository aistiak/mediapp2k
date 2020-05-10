import axios from "axios"
// import axios from "@/axios.js"
// import { LOGIN_USER } from "./actions.type"
// import { SET_LOGIN_NOTIFIACTION ,SET_USER_PERMISSION} from "./mutations.type"
import Vue from 'vue'
import Auth from '../../packages/Auth'
// import router from '../router'
Vue.use(Auth)
let auth = new Vue()
const state = {
    loginNotification:'',
    isUserLoggedin:false,
}

const getters = {
    loginNotification(state){
        return state.loginNotification
    },
    isLoggedin(state){
        return state.isUserLoggedin
        //   return auth.$auth.isAuthenticated()  
    },
 
}

const actions = {
    [`LOGIN_USER`]({commit},data) {
        return new Promise((resolve, reject) => {
            axios.post("api/login",data)
            .then(response => { 
                auth.$auth.setToken(response.data.access_token, Date.parse(response.data.expires_at.date))
                axios.defaults.headers.common["Authorization"] = 'Bearer '+ response.data.access_token
                // this.isUserLoggedin = true 
                commit(`SET_LOGIN_STATUS`,true)
                // alert('ok logged in :' + this.isUserLoggedin)
                resolve(response)
            })
            .catch(error => {
                commit(`SET_LOGIN_NOTIFIACTION`,error.response.data)
                reject(error)
            });
        });
    },
    ['LOGOUT_USER']({commit}){
        // this.isUserLoggedin = false 
        commit(`SET_LOGIN_STATUS`,false)
        auth.$auth.logout()
        auth.$auth.destroyToken()
    },
    ['MANAGE_LOGIN_STATUS']({commit},payload){
        commit(`SET_LOGIN_STATUS`,payload)
    }
    
}

const mutations = {
    [`SET_LOGIN_NOTIFIACTION`](state,payload){
        state.loginNotification = payload
    } ,
    [`SET_LOGIN_STATUS`](state,payload){
        if(payload){
            state.isUserLoggedin = payload
        }else{
            auth.$auth.logout()
            auth.$auth.destroyToken()
            state.isUserLoggedin = payload
        }
    }

}
export default {
    state,
    actions,
    mutations,
    getters
};