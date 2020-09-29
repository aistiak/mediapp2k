<template>
    <div>
        <div class="patient-form">
            <div>
                <!-- {{ type }} -->
                <input type="text" placeholder="name" v-model="patient_form.name" />
                <input type="text" placeholder="email"  v-model="patient_form.email" />
                <input type="password" placeholder="password" v-model="patient_form.password" />
                <input type="password" placeholder="type again" v-model="patient_form.password2" />
                <input type="submit"  @click="submit">
            </div>
            
        </div>
        <div class="alert alert-success" role="alert" v-show="success_alert">
            <span>
                account has been created  
                <nuxt-link to="/login">
                    login
                </nuxt-link>
            </span>
        </div>
        <div v-show="failure_alert">
            <div v-for="(error,key) in errors" :key="key">
                <div class="alert alert-danger" role="alert">
                    {{ error }}
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    layout: 'register' ,
    data(){
        return {
            type : `` ,
            success_alert : false ,
            failure_alert : false ,
            errors: [] ,
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
            this.success_alert = false 
            this.failure_alert = false 
            try{
                let res = await this.$axios.post(`api/register`,this.patient_form) 
                console.log(res)
                this.clearData()
                this.success_alert = true 
            }catch(e) { 
                this.errors = []
                let keys = Object.keys(e.response.data.errors)
                for(const key of keys){
                    this.errors = [...this.errors, ...e.response.data.errors[key] ]
                }
                this.failure_alert = true 
            }

        } ,
        clearData : function(){
            
            this.success_alert = false 
            this.failure_alert = false 
            this.errors= [] 
            this.patient_form = {
                type : `patient` ,
                name :`` ,
                email : `` ,
                password : `` ,
                password2 : `` ,
            }        
        },
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