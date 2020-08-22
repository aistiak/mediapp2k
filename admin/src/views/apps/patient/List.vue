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