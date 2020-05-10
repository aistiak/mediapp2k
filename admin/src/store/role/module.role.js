import axios from "axios"

const state = {
    roles : [],
    role : {} ,
}

const getters = {
    roles(state){return state.roles},
    role(state){return state.role}
}

const actions = {
    [`FETCH_ROLES`]({commit}){
        return new Promise(((resolve,reject)=>{
            axios.get(`api/role`).then(response=>{
                resolve(response)
                commit(`SET_ROLES`,response.data)
            }).catch(error=>{
                reject(error)
            })
        }))
    },
    [`FETCH_ROLE`]({commit},id){
        commit(`SET_ROLE`,id)
    },
    [`ADD_ROLE`]({commit},payload){
        return new Promise((resolve,reject)=>{
            axios.post(`api/role`,payload).then(response=>{
                resolve(response)
                commit(`SET_ROLE`,response.data)
            }).then(error=>{
                reject(error)
            })
        })
        // if has an id then update 

    },
    [`UPDATE_ROLE`]({commit},payload){
        
        return new Promise((resolve,reject)=>{
            axios.put(`api/role`,payload).then(response=>{
                
                resolve(response)
            }).then(error=>{
                reject(error)
            })
        })
        // if has an id then update 

    },
    [`DELETE_ROLE`]({commit},id){
        return new Promise((resolve,reject)=>{
            axios.delete(`api/role/${id}`).then(response=>{
                resolve(response)
            }).catch(error=>{
                reject(error)
            })
        })
    },
}


const mutations = {
    [`SET_ROLES`](state,payload){
        state.roles = payload 
    },
    [`SET_ROLE`](state,payload){
        state.roles.push(payload) 
    },
    // [`SET_ROLE`](state,id){
    //     if(length(state.roles)){
    //         state.role = (state,id) => {
    //             for (let i = 0 ; i< length(state.roles) ; i+=1) {
    //                 if (state.roles[i][`id`] == id) return state.roles[i] 
    //             }
    //             return {}
    //         }
    //     }
    // }
}


export default {
    state ,
    getters ,
    actions ,
    mutations ,
}