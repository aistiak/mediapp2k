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
    </div>
</template>
<script>
export default {
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