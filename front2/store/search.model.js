import axios from "axios"

const state = {
  search_info : {} 
}

const getters = {
    search_info(state){ return state.search_info }
}

const actions  = {
    [`pass_search_info`]({commit},payload){
        commit(`set_search_info`,payload)
    }
}
const mutations = {
    [`set_search_info`](state,payload){
        state.search_info = payload 
    }
}

export default {
    state ,
    getters ,
    actions ,
    mutations ,
}