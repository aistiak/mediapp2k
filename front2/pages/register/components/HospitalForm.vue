<template>
    <div class="doctor-form">
        <div>
            <label for="">Accout User Information</label>
            <input v-model="hospital_form.name" type="text" placeholder="username">
            <input v-model="hospital_form.email" type="text" placeholder="email">
            <input v-model="hospital_form.password" type="text" placeholder="password">
            <input type="text" placeholder="type again">
        </div>
        <div>
            <label for="">Hospital Information</label>
            <input v-model="hospital_form.hospital_name" type="text" placeholder="hospital name " name="" id="">
            <input v-model="hospital_form.hospital_address" type="text" placeholder="hospital address " name="" id="">

        </div>
        <button @click="submit" >Submit</button>
    </div>
</template>
<script>
export default {
    name: 'HospialForm' ,
    data(){
        return {
            hospital_form : {
                type : 'hospital' ,
                name : '' , // user name 
                email : '' , 
                password : '' , 
                hospital_name : '' ,
                hospital_address : '' ,

            }
        }
    },
    methods :{
        submit : async function() {
            try{
                await this.$axios.post(`api/register`,this.hospital_form)
            }catch(e){}
        }
    },
}
</script>
<style scoped>
.doctor-form {
    display: flex ;
    flex-direction: column;
    justify-content: space-around;
    align-content: space-around;
}
button{
    padding : 5px ;
    width: 100% ;
    border : 1px solid lightgray ,

}
button:hover {
    background-color: lightgreen;
    transition-delay: 200ms;
    transition-duration: 500ms;
}
input[type="text"]{
    border-bottom: 1px solid lightgray;
}
input[type="text"]:focus{
    border-bottom: 2px solid lightgray;
    transition-delay: 200ms;
    transition-duration: 500ms;
}
label{
    width : 100% ;
    text-align: center; 
    
}
</style>