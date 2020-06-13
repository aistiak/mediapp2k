import axios from "axios"

const state = {
    doctorDetail : {} ,
    doctorList :[]
}

const getters = {
    doctorDetail(state){
         return state.doctorDetail 
    },
    doctorList(state){
        return state.doctorList 
    }
}

const actions = {
    fetch_doctor_detail({commit},id) {
        return new Promise( (resolve,reject) => {
            axios.get(`api/frontend/hospital/${id}?type=doctor`).then( response => {
                resolve(response)
                commit(`set_doctor_detail`,response.data)
            }).catch( error => {
                reject(error)
            })
        } )
    }
}

const mutations = {
    set_doctor_detail(state,payload){
        state.doctorDetail = { ...payload }
    },
    set_doctor_list(state,payload){
        state.doctorList = payload
    }
}

export default {
    state ,
    getters ,
    mutations ,
    actions ,
}