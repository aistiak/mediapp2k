<template>
    <div>
        <div class="container">
            <!-- monthly mweely sitting time ( morning evening allowted slot ) , action button -->
            
            <div class="flex-container">
                <div>
                    <label for="">Monthly <input type="checkbox" v-model="is_month" > </label>
                    <div class="month-container">
                        <div v-for="i in 31" :key="i">
                            <span @click=" () => manage_date(i) " :class="{'picked' : selected_dates.indexOf(i) !=-1 }">
                                <a href="javascript:;">{{i}}  </a>  
                            </span>
                        </div>
                    </div>
                </div>
                <!-- {{ selected_dates }} -->
                <div>
                    <label for="">Weekly <input type="checkbox" v-model="is_week"> </label>
                    <div class="week-container">
                        <div v-for="(day,key) in days" :key="key"  > 
                            <span @click=" () => manage_days(day) " :class="{'picked' : selected_days.indexOf(day) !=-1 }" >
                                <a href="javascript:;"> {{ day }} </a>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- {{ selected_days }} -->
                
                <div>
                    <!-- {{ detail.data }} -->
                </div>

            </div>

            <label for="">Sitting Time</label>
            <div class="sitting-time-container">   
                <div class="morning">
                    <label for="">morning  <input type="checkbox" v-model="is_morning"> </label>  
                    <div>
                       from <input type="time" v-model="morning_start_time"> &nbsp;&nbsp; to <input type="time" v-model="morning_end_time" />
                    </div>
                    <label for="">Slots</label>
                    <input type="number" v-model="morning_slot">
                </div>
                <div class="evening">
                   <label for="">evening  <input type="checkbox" v-model="is_evening"> </label>  
                    <div>
                       from <input type="time" v-model="evening_start_time"> &nbsp;&nbsp; to <input type="time" v-model="evening_end_time" />
                    </div>
                    <label for="">Slots</label>
                    <input type="number" v-model="evening_slot">
                </div>
            </div>

            <div>
                <button @click="submit"> SAVE </button>
            </div>
    
        </div>
        
    </div>
</template>
<script>
import axios from "axios"
export default {
    name: `AppointmentSetting`,
    data(){
        return {
            detail : `` ,
            id : `` ,
            days : ['Sat' , 'Sun' , 'Mon' , 'Tue' , 'Wed' , 'Thu' , 'Fri' ] ,
            is_month : false ,
            selected_dates : [] ,
            is_week : false ,
            selected_days : [] ,
            is_morning : false ,
            morning_start_time : `` ,
            morning_end_time : `` ,
            is_evening : false ,
            evening_start_time : `` ,
            evening_end_time : `` ,
            morning_slot : 0 ,
            evening_slot : 0 ,

        }
    },
    mounted() {
        this.foo()
    },
    methods: {
        foo : async function() {
            // alert(`foo`)
            this.$vs.loading()
            try{
                this.detail = await axios.get(`api/appointment_setting/`)
                let data  = this.detail.data
                this.is_month = data.is_monthly
                this.is_week  = data.is_weekly
                this.is_morning = data.is_morning
                this.is_evening = data.is_evening 
                this.selected_dates = data.monthly  || []
                this.selected_days = data.weekly   || []
                this.morning_start_time = data.morning.start
                this.morning_end_time = data.morning.end
                this.evening_start_time = data.evening.start
                this.evening_end_time = data.evening.end
                this.morning_slot = data.morning.slots ||  0 
                this.evening_slot = data.evening.slots ||  0 

            }catch(e){
                this.detail = "error"
            }
            this.$vs.loading.close()
        },
        manage_date : function(arg) {
            // alert(arg)
            this.selected_dates = this.selected_dates.indexOf(arg) != -1 ? 
                this.selected_dates.filter( v => v!=arg) : [...this.selected_dates ,arg ]
        } ,
        manage_days : function(arg){
            this.selected_days = this.selected_days.indexOf(arg) != -1 ?
                this.selected_days.filter( v => v!=arg) : [...this.selected_days,arg]
        },
        submit : async function() {
            // alert(1)
            this.$vs.loading()
            let payload = {

                'is_monthly'    : this.is_month  ,
                'is_weekly'     : this.is_week  ,
                'is_morning'    : this.is_morning  ,
                'is_evening'    : this.is_evening ,
                'monthly'       : this.selected_dates ,
                'weekly'        : this.selected_days  ,
                'morning'       : { start : this.morning_start_time , end : this.morning_start_time , slots : this.morning_slot }  ,
                'evening'       : { start : this.evening_start_time , end : this.evening_end_time  , slots : this.evening_slot } ,
            }
            try{
                await axios.post(`api/appointment_setting/`,payload);
                // alert(`ok`)
                
            }catch( e ){alert(`error`)}
            this.$vs.loading.close()
        }
    }
}
</script>

<style scoped>
* {
    font-family: monospace;
}
 .container{
     background-color: white;
 }
 label{
     font-size: 18px;
     font-weight: bold;
     font-family: monospace;
 }
 .month-container {
     display: flex ;
     flex-wrap: wrap;

 }
 .month-container > div{
     background-color: aqua;
     padding: 10px;
     margin:2px;

 }
 .picked {
     background-color: yellowgreen;
     padding: 10px;   
 }
 .week-container {
     display : flex ;
 }
 .week-container > div {
     background-color: aqua;
     padding: 10px;
     margin:2px; 

 }
 .flex-container {
     display: flex; 
     flex-direction: column ;
     justify-content: space-around; 
 }
 .sitting-time-container {
     display: flex;
     width: 100%;
     justify-content: space-between;
 }
.sitting-time-container > div {
     width: 100%;
     border : 2px solid lightgray ;
     padding: 10px;

 }
 button{
     width: 11vw;
     /* min-width: vw; */
     height : 6vh ;
     /* min-height: 4vh; */
     margin-top:10px;
     font-family: monospace;
     font-weight: bold;
     font-size: 18px;
     background-color: seagreen;
     border-radius: 5px;
     box-shadow: 5px 5px lightgray;
 }
</style>