import axios from "axios"

const state = {
    is_loggedin : false ,
    user : {} ,
}

const getters = {
    is_loggedin(state) { return state.is_loggedin },
    user(state) { return state.user }
}

const actions = {
    [`fetch_auth_user`]({commit}){
        return new Promise( (resolve , reject) => {
            axios.post(`api/auth-user`).then( response => {
                commit(`set_user`,response.data)
                resolve(response)
            }).catch( error => {
                reject(error)
            })
        })
    },
}

const mutations ={

    ['set_login_status'](state,payload){
        console.log(payload)
        state.is_loggedin = payload 
    },

    [`set_user`](state,payload){
        state.user = payload 
    }
}


export default {
    state,
    getters,
    actions,
    mutations
}