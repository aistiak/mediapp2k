<template>
    <!-- <section class="blog_details_section section_padding"> -->
    <div class="container">
        <div class="row has-border" >
            <div class="col-md-3" align="">  
                 <img src="/assets/images/comment-1.jpg"  alt="Cinque Terre"> 
                <!-- picture -->
            </div>
            <!-- {{doctorDetail}} -->
            <div class="col-md-9 " > 
                <div style="margin-top:20px">
                    <h3> {{doctorDetail.name}}</h3>
                    <h4> {{doctorDetail.hospital_name}}</h4>
                </div>
            </div>
        </div>
        <div @click="test">
            <!-- test  -->
        </div>
        <div class="row has-border" style="margin-top:50px">
            <div class="col-md-6" align=""> 
                appointment <br>
                <no-ssr>
                    <appointment-book v-if="doctorDetail.appointment_setting" :settings="doctorDetail.appointment_setting" />
                </no-ssr>
            </div>
            <div class="col-md-6" align=""> 
                <!-- others  -->
            </div>
        </div>
        
    </div>
    </section>
</template>
<script>
import axios from "axios"
import { mapGetters , mapActions } from "vuex"
// import Datepicker from 'vuejs-datepicker';
export default {
    props: ['doctor_id'],
    components :{
        // Datepicker ,
        'appointment-book' : () => import("./DateSelector") ,
    },
    head(){
      return {
        title: "Doctor Detail "
      }
    },
    data(){
        return {
           detail : {} ,
        }
    },
    computed: { ...mapGetters('doctor',['doctorDetail']) },
    mounted() {

        this.getDoctorDetail() 
    },
    methods :{ 
        ...mapActions({
            'fetch_doctor_detail' : 'doctor/fetch_doctor_detail' ,
        }),

        test : async function(){
            // alert(`test`)
            

        },
        doctor_detail: function({id}){
            this.$router.push(`/doctor-detail/${id}`)
        },
        getDoctorDetail : function () {
            this.fetch_doctor_detail(this.doctor_id)

        },
    },
}
</script>



<style scoped>
img {
  /* border-radius: 50%; */
  width: 200px;
}
.has-border  {
    border : 1px solid lightgray ;
    padding : 12px ;
    margin:10px ;
}
.container {
    margin-top: 2%;
    margin-bottom: 10%;
}

</style>