<template>
    <div>
        <div>
            <div>
                <select name="" id="" v-model="filter_type" @change="getList">
                    <option value="none"> all </option>
                    <option value="active"> active </option>
                    <option value="deactive"> deactive </option>
                    <option value="requested"> requested </option>
                </select>
            </div>
            <div class="hospital-list">
        
                <div v-for="(v,k) in hospitals.data" :key="k">
                    <div>
                        <div style="display:flex;align-items:baseline">
                            <span>
                             {{ v.name }}
                            </span>
    
                            <span  @click="() => toggle_status(v.id)" >
                                <!-- {{v.is_active }} -->
                                <!-- <input type="checkbox" 
                                       :checked="v.is_active == 1" 
                                       @change="() => toggle_status(v.id)"> -->
                               <vs-button  v-if="v.is_active == 1" icon-pack="feather" icon="icon-check-circle" type="flat" ></vs-button>
                               <vs-button v-else icon-pack="feather" icon="icon-circle" type="flat" ></vs-button>
                            </span>

                         </div>
                        <div> {{ v.cell }} </div>
                        <div> {{ v.email }} </div>
                        <div>
                            <button v-show="v.is_enable !=1" @click="() => approve_request(v)"> Approve </button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <pagination  :data="hospitals.meta" @pagination-change-page="getList" />
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios" 
import pagination from "laravel-vue-pagination"
export default {
    components : {
        pagination ,
    } ,
    data () {
        return {
            filter_type : `none` ,
            hospitals : {
                data : [] ,
                meta : {}
            } ,
        }
    },

    mounted() {
        this.getList()
    },

    methods :{
        getList : async function(page=1) {
            this.$vs.loading()
            let res = await axios.get(`hospital?page=${page}&filter_type=${this.filter_type}`) 
            this.hospitals = res.data  
            console.log(res)   
            this.$vs.loading.close()
        },
        toggle_status : async function(id) {
            this.$vs.loading()
            await axios.post(`hospital/status/${id}`) 
            await this.getList()

        },

        approve_request : async function({id}){
            this.$vs.loading()
            await axios.put(`hospital/approve/${id}`) 
            await this.getList() // get list will close the loadder 
        },
    }

}
</script>
<style  scoped>
.hospital-list {
    display: flex;
    flex-direction: column;
    
}

.hospital-list > div {
    background-color: rgb(184, 228, 230);
    padding : 20px ;
    margin:10px ;
    border : 2px solid lightgray ;

}
</style>