<template>
    <div class="register-container">
        <div class="bread-crum">
            <span>
                <i class="fa fa-home"></i>
            </span>
            <span v-for="(item,key) in crum_list" :key="key">
                <span @click="crum_handel" 
                      :class="['crum_item',item]">  
                      {{ `${item}` }}
                </span>
                <span>
                    {{` / `}}
                </span>
            </span>
        </div>
        <div>
            <TypeSelection v-show=" type == `` "/>
            <PatientForm   v-show=" type =='user'"  />
            <HospitalForm  v-show=" type =='hospital'" />
            <div v-show=" type =='doctor'">
                doctor form 
            </div>
        </div>
    </div>
</template>
<script>
import TypeSelection from "./components/TypeSelection"
import PatientForm from "./components/PatientForm"
import HospitalForm from "./components/HospitalForm"
export default {

    components:{
        TypeSelection ,    
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
            crum_list : ['Home', 'Type-Select'] , 
        }
    },

    methods :{
        crum_handel : function(event) {


            let name = event.target.classList[1] 

            switch(name){
                case 'Home' :
                    this.$router.push('/mediapp')
                case 'Type-Select' :
                    this.type = ''
                    this.crum_list = ['Home', 'Type-Select']
                default :
                    return      
            }

        } ,


        submit :async function () {
            
            try{
                let res = await this.$axios.post(`api/register`,this.patient_form) 
            }catch(e) { console.log(e)}
        } ,

    }
}
</script>

<style scoped>

 /* .flex-container , .patient-form {
     display: flex;
     justify-content: center;
 }
 .flex-container > div {
     padding :20px ;
     background-color: rgb(89, 89, 189);
     margin: 20px;
     cursor: pointer ;
     
 } */
 input{
     border-bottom: 1px solid grey;
 }
 .crum_item {
     cursor : pointer ;
 }
 .crum_item:hover {
     background-color: limegreen; 
     border-radius: 5px;
     -moz-transition-delay: 300ms;
     transition-duration: 500ms;
 }
 .register-container {
    /* border: 2px solid lightgrey; */
    margin: 10%;
    margin-top : 5% ;
    /* height: 75vh; */
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-content: center;
    align-items: center;
 }
</style>