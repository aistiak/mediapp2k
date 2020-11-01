<template>
    <div class="date-container">
         Select Date : 
         <div class="date-select">
            <Datepicker v-model="appointment_form.date" placeholder="select-date" :disabled-dates="disabledDates"/>
         </div>
        <div>
            <label>Sitting Time</label>
            <select v-model="appointment_form.type">
                <option value="" >Select</option>
                <option value="morning" >Morning</option>
                <option value="evening" >Evening</option>
            </select>
        </div>
        <div>
            <button @click="submit">Request Appointment</button>
        </div>
    </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker';

export default {
    name : 'DateSelector' ,
    props:[
        'settings'
    ],
    components:{
        Datepicker
    },
    data(){
        return {
            appointment_form : {
                date : `` ,
                type : `` ,
                doctor_id : this.settings.doctor_id ,
            },
            disabledDates: {
                to: new Date(), // Disable all dates up to specific date
                from: this.future() , // Disable all dates after specific date
                days: [], // Disable Saturday's and Sunday's
                daysOfMonth: [], // Disable 29th, 30th and 31   st of each month
                dates: [ // Disable an array of dates
        
                    // new Date(2016, 9, 17),
                    // new Date(2016, 9, 18)
                ],
                ranges: [

                    // { // Disable dates in given ranges (exclusive).
                    //     from: new Date(2016, 11, 25),
                    //     to: new Date(2016, 11, 30)
                    // },

                    // {
                    //     from: new Date(2017, 1, 12),
                    //     to: new Date(2017, 2, 25)
                    // }
                ],
                // a custom function that returns true if the date is disabled
                // this can be used for wiring you own logic to disable a date if none
                // of the above conditions serve your purpose
                // this function should accept a date and return true if is disabled
                     customPredictor: function(date) {
                // disables the date if it is a multiple of 5
                    // if(date.getDate() % 5 == 0){
                    //     return true
                    // }
                }
            }
        }
    },
    mounted(){
        this.manageDates()
    },
    methods :{
        submit : async function(){
            try{
               let res = await this.$axios.post(`api/appointment`,this.appointment_form)
               this.notify('appointment booked','success') 
            }catch(e){
                console.log(e.response.data.errors)
                let errors = Object.values( e.response.data.errors ).map( v => v[0])
                console.log(errors)
                errors.forEach((v) => this.notify(v,'warning')) 
            }            
        },
        notify(msg,status){
            this.$notify({
                group: 'foo',
                type : status,
                title: '',
                text: `<h3> ${msg} </h3>  `
            });
        },
        future : function(arg=30) {
            let date = new Date();
            date.setDate(date.getDate() + arg);
            return date 
        }, 
        manageDates : function(){
            let arr = []  
            for (let i = 0 ;i<32 ; i++){
                let date = new Date();    
                date.setDate(date.getDate()+i)
                arr.push(date)
            }
            let ctx = this
            arr = arr.filter(function(v){
                let t  = v.toString().split(' ')
                // ex : "Wed Dec 22 2021 09:26:51 GMT+0600 (Bangladesh Standard Time
                return ctx.settings.monthly.indexOf(t[2]*1) == -1 && ctx.settings.weekly.indexOf(t[0]) == -1 
            })
            this.disabledDates.dates = arr 
            return arr ;
        },
    }
}
</script>
<style scoped>
.date-container {
    /* border : 1px solid grey ; */
}
.date-select {
    border : 2px solid lightgrey ; 
}
select {
    border : 2px solid lightgrey ; 
}
button {
    border : 1px solid grey ;
    padding: 5px ;
    /* width: 12vw; */
    background-color: lightgreen;
    margin-top:10px;
}
</style>