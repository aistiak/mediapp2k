import axios from "axios"

const state ={
    doctors : [],
}
const getters = {
    doctors(state){
        return state.doctors
    }
}
const actions = {
    [`FETCH_DOCTORS`]({commit}){
        return new Promise((resolve,reject)=>{
            axios.get(`doctor`).then(response=>{
                resolve(response)
                commit(`SET_DOCTORS`,response.data)
            }).catch(error=>{
                reject(error)
            })
        })
    }
}

const mutations = {
    [`SET_DOCTORS`](state,payload){
        state.doctors = payload
    }
}

export default {
    state,
    getters,
    actions,
    mutations,
}