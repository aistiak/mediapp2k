import axios from "axios"

 const state ={
    demo : ``
}
  
const getters = {
    getDemo(state) {return state.demo}
}

const actions = {
    [`dummy_action`]({commit}){
        return new Promise((resolve,reject)=>{
            axios.get(`test`).then(response=>{
                resolve(response)
                commit(`demo_mutation`,response.data)
            }).catch(error=>{
                reject(error)
            })
        })
    }
}

const mutations = {

    [`demo_mutation`](state,payload){
        state.demo = payload
    }

}

export default {
    state ,
    getters,
    actions ,
    mutations,
}