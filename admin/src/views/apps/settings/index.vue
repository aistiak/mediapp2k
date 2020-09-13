<template>
    <div>
        <AppointmentSetting/>
    </div>
</template>
<script>
import AppointmentSetting from "./components/appointment.vue"
export default {
    components : {
        
       AppointmentSetting ,
        
    }, 
    data(){
        return {

        }
    }
}
</script>
<style scoped>
label{
    font-weight: bold;
    font-size: 18px;
    padding : 10px ;
}
.setting-1 {
    width : 50%;
    background-color: white;
    min-height : 30vh;
    border: 2px solid lightgrey;
}
.flex-container-1 {
    display : flex ;
    flex-direction: column; 
}
.flex-container-2{
   
    display : flex ;
    flex-direction: row;
    /* border: 1px solid red ; */
    justify-content: space-between;
    padding: 20px;    
}
.flex-container-2 select {
    width : 10vw ;
}
.save-btn{
    border : 2px solid lightgrey ;
    width : 10vw ;
    height : 5vh ;
    font-size : 2vh;
    padding : 10px ;
    justify-self: flex-end;
    background-color :  #6f9e6f ;
}
</style>