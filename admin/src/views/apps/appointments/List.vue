<template>
    <div class="container">
        <!-- filter  -->
        <!-- today , approved , unapproved -->
        <!-- list  , and approve -->
        <div class="filter-container">
            <div>
                <select name="" id="">
                    <option value="today">today</option>
                    <option value="approved">Approved</option>
                    <option value="unapproved">Unapproved</option>
                </select>
            </div>
            <div>
                <label for="">start </label>
                <input type="date">
            </div>
            <div>
                <label for=""> end </label>
                <input type="date">
            </div>
            <div>
                <button>Search</button>
            </div>
        </div>
        <div>
            <label for=""> Appointmetns </label>
            <div v-for="(v,k) in appointments.data" :key="k">
                <div class="appointment-container">
                    <div> {{ v.id }} </div>
                    <div> {{ v.patient.name }} </div>
                    <div>
                        <input type="date" v-model="v.date" readonly>
                    </div>
                    <div> <input type="checkbox" v-model="v.approved" @click="() => bar(v)"> </div>
                </div>
            </div>
        </div>
        <!-- {{ appointments.data }} -->

    </div>
</template>
<script>
import axios from "axios"
export default {
    data() {
        return {
            appointments :[]
        }
    },
    mounted(){

        this.getList()
    },
    methods : {
        
        getList : async function() {
            this.$vs.loading()
            try{
                const {data} = await axios.get(`/api/appointment`) 
                this.appointments = data 
            }catch( e ){ alert(`error loading list`) }
            this.$vs.loading.close()
        },
        bar : async function({id,approved}) {
            // alert(arg)
            this.$vs.loading()
            try{
                let { data } = await axios.post(`api/appointment/approve`,{
                     appointment_id :id,approve : !approved } )
                this.$vs.notify({

                    title: 'Success',
                    text: data.data == true ? 'approved' : `unapproved`,
                    color: 'success',
                    iconPack: 'feather',
                    position: 'bottom-right',
                    icon: 'icon-check-circle'
                })

            }catch( e ){ console.log(e) }
            this.$vs.loading.close()

        }

    }
}
</script>

<style scoped>
    * {
        font-family: monospace;
    }
    .filter-container {
        display : flex ;
        width : 100%;
        /* border  : 1px solid ;  */
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .appointment-container {
        background-color: lightgray;
        padding : 20px ;
        display: flex;
        font-size: 18px;
        justify-content: space-between;
    }
</style>
