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

    // [`FETCH_DOCTORS`]({commit}){
    //     return new Promise((resolve,reject)=>{
    //         axios.get(`doctor`).then(response=>{
    //             resolve(response)
    //             commit(`SET_DOCTORS`,response.data)
    //         }).catch(error=>{
    //             reject(error)
    //         })
    //     })
    // },

    [`FETCH_DOCTORS`]({commit},payload=undefined){
        let url = payload ? `doctor?id=${payload.id}` : `doctor`  
        console.log(url)
        return new Promise((resolve,reject)=>{
            axios.get(url).then(response=> {
                resolve(response)
                // request ffor detail wont set commit 
                if(!payload) commit(`SET_DOCTORS`,response.data)
            }).catch(error=>{
                reject(error)
            })
        });
    },
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