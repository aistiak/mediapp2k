import axios from "axios"

export const state = () => ({
  search_info : {} 
})

export const getters = {
    search_info : (state) =>  state.search_info ,
}

export const actions  = {
    [`pass_search_info`]({commit},payload){
        console.log(`passing search info`)
        commit(`set_search_info`,payload)
    }
}
export const mutations = {
    [`set_search_info`](state,payload){
        state.search_info = payload 
    }
}

// export default {
//     state ,
//     getters ,
//     actions ,
//     mutations ,
// }