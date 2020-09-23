<template>
    <div>
        <Admin    v-show="user_role == `super_admin`"/>
        <Hospital  v-show="user_role == `hospital`" />
        <!-- <Hospital   /> -->
        <Doctor   v-show="user_role == `doctor`"/>
    </div>
</template>
<script>
import { mapGetters } from "vuex"
export default {
    name : 'ProfileSettings' ,
    components:{
        Admin    : () => import("./Admin") ,
        Hospital : () => import("./Hospital") ,
        Doctor   : () => import("./Doctor") ,
    },
    data(){
        return {

        }
    },
    mounted() {
        /// fetch current user and match 
    },
    computed:{
        ...mapGetters(['user_role']),
    },
    methods :{

    }
}
</script>
<style scoped>

</style>