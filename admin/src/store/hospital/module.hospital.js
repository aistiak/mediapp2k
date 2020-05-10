import axios from "axios"


const state = {
    hospitals :[] ,
}
const getters = {
    hospitals(state){
        return state.hospitals
    }
}

const actions = {
    // will also feech detail is passed an id with payload
    [`GET_HOSPITAL_LIST`]({commit},payload=undefined){
        let url = payload ? `hospital?id=${payload.id}` : `hospital`  
        console.log(url)
        return new Promise((resolve,reject)=>{
            axios.get(url).then(response=> {
                resolve(response)
                // request ffor detail wont set commit 
                if(!payload) commit(`SET_HOSPITAL_LIST`,response.data)
            }).catch(error=>{
                reject(error)
            })
        });
    },

    [`ADD_HOSPITAL`]({commit}){

    },

    [`DELETE_HOSPITAL`]({commit},id){

    },
}

const mutations = {
    [`SET_HOSPITAL_LIST`](state,payload){
        state.hospitals = payload
    }
}

export default {
    state ,
    getters , 
    actions , 
    mutations 
}