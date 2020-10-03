import axios from "../../http/axios/index.js"

const state = {
    users : [] ,
    auth_user : {} ,

}

const getters = {
    users(state) {
        return state.users 
    },
    is_loggedin(state) {
        return state.auth_user.id 
    },
}

const actions = {

    [`FETCH_USERS`]({commit}){
        return new Promise((resolve,reject)=>{
            axios.get(`api/user`).then(response=>{
                resolve(response)
                commit(`SET_USERS`,response.data)
            }).catch(error=>{
                reject(error)
            })
        })
    },

    [`REFRESH_AUTH`]({commit}){
        return new Promise((resolve,reject) => {
            axios.post(`api/auth_user/refresh`).then(response => {
                commit(`COMMIT_REFRESH_AUTH`,response.data)
                resolve(response)
            }).catch(error => {
                reject(error)
            })
        })
    },

    [`ADD_USERS`]({commit},payload){

    },
    [`UPDATE_USERS`]({commit},payload){

    },
    [`DELETE_USERS`]({commit},id){

    },

}

const mutations = {
    [`SET_USERS`](state,payload){
        state.users = payload 
    },
    [`COMMIT_REFRESH_AUTH`](state,payload){
        state.auth_user = payload 
    },
    ['LOGOUT_AUTH_USER'](state){
        axios.defaults.headers.common['Authorization'] = ''
    }
}

export default {
    state ,
    getters ,
    actions ,
    mutations 
}