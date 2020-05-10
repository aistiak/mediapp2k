import axios from "axios"

const state = {
    users : [] 
}

const getters = {
    users(state) {
        return state.users 
    }
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
    }
}

export default {
    state ,
    getters ,
    actions ,
    mutations 
}