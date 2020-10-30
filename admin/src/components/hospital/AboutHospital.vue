<template>
    <div>
        <tinymce id="d1" v-model="data" ref="tm"></tinymce>
    </div>
</template>
<script>
import tinymce from 'vue-tinymce-editor'
export default {
    name : 'AboutHospital' ,
    props : ['parent'] ,
    // props : {
    //     about : {
    //         type : String ,
    //         default : '' ,
    //     }
    // },
    components : {
        tinymce ,
    } ,   
    data(){
        return {
           
        }
    },
    mounted(){

        // this.parent.temprarySoln()
    },
    computed :{
        data : {
            get(){
                return this.parent.form_data.about
            } ,
            set(arg){
                this.parent.form_data.about = arg 
            }
        }
    },
    methods : {

    }
}
</script>