import axios from "axios"

export const state = () => ({
    hospitalDetail : {} ,
    hospitalList :[]
})

export const getters = {
    hospitalDetail(state){
         return state.hospitalDetail 
    },
    hospitalList(state){
        return state.hospitalList 
    }
}

export const actions = {
    fetch_hopital_detail({commit},id) {
        return new Promise( (resolve,reject) => {
            this.$axios.get(`api/frontend/hospital/${id}`).then( response => {
                resolve(response)
                commit(`set_hospital_detail`,response.data)
            }).catch( error => {
                reject(error)
            })
        } )
    }
}

export const mutations = {
    set_hospital_detail(state,payload){
        state.hospitalDetail = { ...payload }
    },
    set_hospital_list(state,payload){
        state.hospitalList = payload
    }
}

// export default {
//     state ,
//     getters ,
//     mutations ,
//     actions ,
// }