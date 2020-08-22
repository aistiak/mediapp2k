import axios from "axios"

export const state = () => ({
    doctorDetail : {} ,
    doctorList :[]
})

export const getters = {
    doctorDetail : (state) => state.doctorDetail ,
    doctorList : (state) => {
        return state.doctorList 
    }
}

export const actions = {
    fetch_doctor_detail({commit},id) {
        return new Promise( (resolve,reject) => {
            this.$axios.get(`api/frontend/hospital/${id}?type=doctor`).then( response => {
                resolve(response)
                commit(`set_doctor_detail`,response.data)
            }).catch( error => {
                reject(error)
            })
        } )
    }
}

export const mutations = {
    set_doctor_detail(state,payload){
        state.doctorDetail = { ...payload }
    },
    set_doctor_list(state,payload){
        state.doctorList = payload
    }
}

// export default {
//     state ,
//     getters ,
//     mutations ,
//     actions ,
// }