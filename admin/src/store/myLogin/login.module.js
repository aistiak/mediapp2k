import axios from "axios"
// import axios from "@/axios.js"
// import { LOGIN_USER } from "./actions.type"
// import { SET_LOGIN_NOTIFIACTION ,SET_USER_PERMISSION} from "./mutations.type"
import Vue from 'vue'
import Auth from '../../packages/Auth'
import router from '@/router'
import { reject } from "core-js/fn/promise"
// import router from '../router'
Vue.use(Auth)
let auth = new Vue()
const state = {
    loginNotification: '',
    isUserLoggedin: false,
    role: '',
}

const getters = {
    loginNotification(state) {
        return state.loginNotification
    },
    isLoggedin(state) {
        return state.isUserLoggedin
        //   return auth.$auth.isAuthenticated()  
    },

    user_role(state) {
        return state.role
    },

}

const actions = {


    [`REFRESH_AUTH_USER`] ({commit}) {
        // alert(1) 
        return new Promise( (resolve,reject) => {
            axios.post('api/auth-user').then( response => {
                console.log(response.data);
                commit('REFRESH_USER_ROLE',response.data.role.slug)
            }).catch( error => {

            }) 
        } )
    } ,

    [`LOGIN_USER`]({ commit }, data) {
        return new Promise((resolve, reject) => {
            axios.post("api/login", data)
                .then(response => {
                    auth.$auth.setToken(response.data.access_token, Date.parse(response.data.expires_at.date))
                    axios.defaults.headers.common["Authorization"] = 'Bearer ' + response.data.access_token
                    // this.isUserLoggedin = true 
                    commit(`SET_LOGIN_STATUS`, true)
                    commit(`SET_USER_ROLE`, response)
                    // alert('ok logged in :' + this.isUserLoggedin)
                    console.log(router.currentRoute.query.to)
                    // router.push({ name: 'dashboard-analytics' })
                    // router.push(router.currentRoute.query.to || '/')
                    resolve(response)
                })
                .catch(error => {
                    commit(`SET_LOGIN_NOTIFIACTION`, error.response.data)
                    reject(error)
                });
        });
    },

    ['LOGOUT_USER']({ commit }) {
        // this.isUserLoggedin = false 
        commit(`SET_LOGIN_STATUS`, false)
        auth.$auth.logout()
        auth.$auth.destroyToken()
    },
    ['MANAGE_LOGIN_STATUS']({ commit }, payload) {
        commit(`SET_LOGIN_STATUS`, payload)
    }

}

const mutations = {
    ['REFRESH_USER_ROLE'](state,payload) {
        state.role = payload 
    } ,
    ['SET_USER_ROLE'](state, payload) {
        state.role = payload.data.role
    },
    [`SET_LOGIN_NOTIFIACTION`](state, payload) {
        state.loginNotification = payload
    },
    [`SET_LOGIN_STATUS`](state, payload) {
        let localStorageKey = "loggedIn"
        if (payload) {
            state.isUserLoggedin = payload

            localStorage.setItem(localStorageKey, 'true');
        } else {
            auth.$auth.logout()
            auth.$auth.destroyToken()
            state.isUserLoggedin = payload
            localStorage.setItem(localStorageKey, 'false');

        }
    }

}
export default {
    state,
    actions,
    mutations,
    getters
};