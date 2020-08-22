
import axios from "axios"
export const store= () => ({
    asdfg : `istiak` ,
})

export const getters = {
    
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

    }
}
export const mutations = {

    setup_login(state,arg){
        // alert(1)
        // return 
        console.log(arg)

        this.$axios.defaults.headers.common["Authorization"] = `Bearer ${ arg.access_token}` 
        localStorage.setItem('token',arg.access_token)
        localStorage.setItem('tokenExpiryKey',arg.expires_at.date)
        // alert(this.$axios.defaults.headers.common["Authorization"] )
    }
}