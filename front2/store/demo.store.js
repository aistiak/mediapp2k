import axios from "axios"

export const state = () => ({
    demo : ``
})
  
export const getters = {
    getDemo(state) {return state.demo}
}

export const actions = {
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

export const mutations = {

    [`demo_mutation`](state,payload){
        state.demo = payload
    }

}

// export default {
//     state ,
//     getters,
//     actions ,
//     mutations,
// }