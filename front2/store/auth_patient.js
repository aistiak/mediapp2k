
import axios from "axios"
export const state = () => ({
    asdfg : `istiak` ,
    auth_user : {} ,
})

export const getters = {
      
      auth_user(state){
          return state.auth_user 
      }  
}
export const actions = {

    login({commit},payload){    
         
        commit('setup_login',payload)
    },
    refreshAuth({commit}) {
        

        let payload = {
            access_token : localStorage.getItem('token') ,
            expires_at : {
                date : localStorage.getItem('tokenExpiryKey') ,
            }    
        } 
        commit('setup_login',payload)

    },
    getAuthUser({commit}) {
        return new Promise( (resolve,reject) => {
            this.$axios.post(`api/auth_user/refresh`).then( response => {
                commit(`commit_auth_user`,response.data)
                resolve(response)
            }).catch(error => {
                reject(error)
            })
        })
    },
}
export const mutations = {
    commit_auth_user(state,arg) {
        state.auth_user = arg
    },  
    setup_login(state,arg){
        // alert(1)
        // return 
        console.log(arg)

        this.$axios.defaults.headers.common["Authorization"] = `Bearer ${ arg.access_token}` 
        localStorage.setItem('token',arg.access_token)
        localStorage.setItem('tokenExpiryKey',arg.expires_at.date)
        // alert(this.$axios.defaults.headers.common["Authorization"] )
    },

}