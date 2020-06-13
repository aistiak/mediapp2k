<template>
    <div>

        this is hospital {{hospital_id}} detail page 
        {{hospitalDetail}}
    </div>
</template>
<script>
import { mapGetters } from "vuex"
export default {
    props: ['hospital_id'],
    data(){
        return {
           detail : {} ,
        }
    },
    computed: { ...mapGetters(['hospitalDetail']) },
    mounted() {

        this.getHospitalDetail() 
    },
    methods :{ 
        getHospitalDetail : function () {
            this.$store.dispatch(`fetch_hopital_detail`,this.hospital_id).then( response => {
                alert(`success`)
            }).catch( error => {
                alert(`error`)
            })
        },
    },
}
</script>