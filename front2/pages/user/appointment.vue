<template>
    <div>
      
        <div class="appointment-container">
            <label>Appointment Filter </label>
            <div class="appointment-filter" >
                <!-- <div>
                    filter
                </div> -->
                <select name="" id="">
                    <option value=""> all </option>
                    <option value=""> approved </option>
                    <option value=""> pending </option>
                    <option value=""> old </option>
                </select>
            </div>
            <div class="appointment-list" v-if="appointmentList.length">
                <!-- list  -->
                <!-- {{ appointmentList }} -->
                <label> Appointment List  </label>
                <div v-for="(v,k) in appointmentList" :key="k"  >
                    <div class="appointment-row" :class="{ 'green':v.approved }">
                        <span> {{k + 1}}</span>
                        <span> {{ v.date }} </span>
                        <span> {{ v.type }}</span>
                        <span> {{ v.doctor_name }}</span>
                        <span> {{ v.approved }}</span>
                        <span>
                            <!-- if appointment has met the date  -->
                            <i class="fa fa-check"></i> 
                        </span>
                    </div>
                </div>
            </div>
            <div v-else>
                No Appointments to show 
            </div>
            
        </div>
    </div>
</template>

<script>
export default {
    layout : 'layout1' ,
    data() {
        return {
            appointmentList : [

            ] ,
        }
    },
    mounted(){
        // this.getAppointmentList()
    },
    methods :{
        getAppointmentList : async function(){
            let res = await this.$axios.get(`api/frontend/appointment`) ; 
            console.log(res.data)
            this.appointmentList = res.data ; 
        }
    }
}
</script>
<style scoped>
.appointment-container {
    min-height: 100vh;
    margin:20px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}
.appointment-container > div {
   
}
.appointment-list {
    display: flex ;
    flex-direction: column;
    justify-content: stretch;
}
.appointment-row {
    display: flex;
    justify-content: space-between;
    background-color: rgb(230, 106, 106);
    margin: 10px;
    padding : 10px ;

}
.green {
    background-color: greenyellow;
}
select {
    text-align: center;
    border : 2px solid lightgray ;
}
.appointment-filter {
    display: flex; 
    justify-content: space-around;

}
select {
    margin:10px;
}
</style>