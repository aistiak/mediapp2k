<template>
    <div class="container">
        list of appointments
        {{ appointments.data }}
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
            try{

                const {data} = await axios.get(`/api/appointment`) 
                this.appointments = data 
            }catch( e ){ alert(`error loading list`) }
        },

    }
}
</script>

<style scoped>

</style>
