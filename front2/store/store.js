import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)


export const state = {
    
}
  

const getters = {


}

const actions = {
    // dummy_action({commit}){
    //     return new Promise((resolve,rejct)=>{
    //         axios.get(`/test`).then(response=>{
    //             resolve(response)
    //         }).catch(error=>{
    //             reject(error)
    //         })
    //     })
    // }
}

const mutations = {} 

import demo from "./demo.store"
import hospital from "./hospital.module"
export default new  Vuex.Store ({

    state ,
    getters ,
    actions , 
    mutations ,

    modules : {
        demo : demo ,
        hospital : hospital ,
    }

})