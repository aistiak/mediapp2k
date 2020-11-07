import axios from "axios"

export const state = ()=> ({
    is_loggedin : false ,
    user : {} ,
})

export const getters = {
    is_loggedin : (state) => { return state.is_loggedin },
    user:(state) => { return state.user }
}

export const actions = {
    fetch_auth_user({commit}){
        console.log('api/auth-user has been called ')
        return new Promise( (resolve , reject) => {
            axios.post(`api/auth-user`).then( response => {
                
                commit(`set_user`,response.data)
                resolve(response)
            }).catch( error => {
                reject(error)
            })
        })
    },

    logout({commit}){
        commit('logout_user') 
    },
}

export const mutations ={

    set_login_status(state,payload){
        console.log(payload)
        state.is_loggedin = payload 
        if(!payload)
            this.$axios.defaults.headers.common["Authorization"] = `` 
    },

    set_user(state,payload){
        state.user = payload 
    },

    logout_user(state){
        this.$axios.defaults.headers.common["Authorization"] = '' 
        localStorage.setItem('token','')
        localStorage.setItem('tokenExpiryKey','')
        state.is_loggedin = false 
    }
}


// export default {
//     state,
//     getters,
//     actions,
//     mutations
// }