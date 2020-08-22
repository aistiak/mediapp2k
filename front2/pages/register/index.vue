<template>
    <div>
        <!-- <div class="flex-container" v-show="type == `` "> -->
        <div class="flex-container"  >
            <div @click="() => type = 'patient'">Patient</div>
            <div @click="() => type = 'hospital'">Hospital </div>
            <div @click="() => type = `doctor` ">Doctor</div>
        </div>
        <PatientForm v-show=" type =='patient' " />
        <HospitalForm v-show=" type =='hospital' " />
    </div>
</template>
<script>
import PatientForm from "./components/PatientForm"
import HospitalForm from "./components/HospitalForm"
export default {

    components:{

        PatientForm ,
        HospitalForm  ,//: () => import('./components/HospitalForm') ,
    
    },

    layout: 'register' ,
    
    data(){
        return {
            type : `` ,
            patient_form : {
                type : `patient` ,
                name :`` ,
                email : `` ,
                password : `` ,
                password2 : `` ,
            },
        }
    },

    methods :{
        submit :async function () {
            
            try{
                let res = await this.$axios.post(`api/register`,this.patient_form) 
            }catch(e) { console.log(e)}

        } ,
    }
}
</script>

<style scoped>

 .flex-container , .patient-form {
     display: flex;
     /* border : 1px solid red ; */
     justify-content: center;
 }
 .flex-container > div {
     padding :20px ;
     background-color: rgb(89, 89, 189);
     /* border-radius: 50%; */
     margin: 20px;
     cursor: pointer ;
     
 }
 input{
     border-bottom: 1px solid grey;
 }
</style>