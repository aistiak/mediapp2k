import axios from "axios"

const state = {
    hospitalDetail : {} 
}

const getters = {
    hospitalDetail(state){
         return state.hospitalDetail 
    }
}

const actions = {
    fetch_hopital_detail({commit},id) {
        return new Promise( (resolve,reject) => {
            axios.get(`api/frontend/hospital/${id}`).then( response => {
                resolve(response)
                commit(`set_hospital_detail`,response.data)
            }).catch( error => {
                reject(error)
            })
        } )
    }
}

const mutations = {
    set_hospital_detail(state,payload){
        state.hospitalDetail = { ...payload }
    }
}

export default {
    state ,
    getters ,
    mutations ,
    actions ,
}