<template>
    <div>
        <div class="search-filter">
            <select name="" id="">
                <option value="">all</option>
                <option value="">requested</option>
                <option value="">disabled</option>
            </select>
        </div>
        <div class="pateint-list">
            <div v-for="(v,k) in pateint_list.data" :key="k" >
                {{v.name}}
                <div v-show="!v.is_active">
                    <button @click="() => approve(v) ">approve</button>
                </div>
                <div v-show="v.is_active && !v.is_enable">
                    <button @click="() => toggleEnable(v.id) ">enable</button>
                </div>
                <div v-show="v.is_active && v.is_enable">
                    <button @click="() => toggleEnable(v.id) ">disable</button>
                </div>
            </div>
        </div>
        <div class="pagination">    
            hear
                <pagination :data="pateint_list.meta" @pagination-change-page="getList"></pagination>
        </div>
        this is patients list 
        <button @click="getList" >test</button>
    </div>
</template>

<script>
import axios from "axios"
export default {
    data(){
        return {
            pateint_list : {
                meta:{} ,
            } ,
        }
    },
    mounted(){
        this.getList()
    },
    methods: { 
        async toggleEnable(id){
            await axios.post(`api/toggle-enable`,{
                model : `patient` ,
                id 
            })
            await this.getList()
        },
        async approve(arg){
           let response = await axios.post(`api/approval`,{
               model : 'patient' ,
               id    : arg.id    , 
           })
           // update state hear 
        //    this.pateint_list.data = this.pateint_list.data.map( v => v.id !=arg.id || response )
            // console.log(this.pateint_list.data.map( v => v.id !=arg.id? v : response.data ))
           await this.getList() 
        },
        getList : async function(page=1){
            try{
              let res = await axios.get(`api/patient?page=${page}`)
              this.pateint_list = res.data 
            }catch(e){console.log(e)}
            //  axios.get(`api/patient?page=${page}`).then( res =>{
            //      console.log(res.data)
            //      this.pateint_list = res.data ;
            //  })

        }
    }
}
</script>

<style scoped >

    .search-filter {
        display: flex; 
    }
    .pateint-list {
        display: flex ;
        flex-direction: column;
        justify-content: flex-start;
    }
    .pateint-list > div {
        background-color: lightgray;
        padding: 20px;
        margin: 20px;
    }

</style>