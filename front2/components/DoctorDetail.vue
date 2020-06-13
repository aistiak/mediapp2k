<template>
    <section class="blog_details_section section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3" align="">  
                 <img src="/assets/images/comment-1.jpg"  alt="Cinque Terre"> 
                <!-- picture -->
            </div>
            <div class="col-md-9 " > 
                <h3> {{doctorDetail.name}}</h3>
                <h4> {{doctorDetail.hospital_name}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" align=""> 
                appointment
            </div>
            <div class="col-md-6" align=""> 
                others 
            </div>
        </div>
        
    </div>
    </section>
</template>
<script>
import { mapGetters } from "vuex"
export default {
    props: ['doctor_id'],
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
    computed: { ...mapGetters(['doctorDetail']) },
    mounted() {

        this.getDoctorDetail() 
    },
    methods :{ 
        doctor_detail: function({id}){
            this.$router.push(`/doctor-detail/${id}`)
        },
        getDoctorDetail : function () {
            this.$store.dispatch(`fetch_doctor_detail`,this.doctor_id).then( response => {
                    
            }).catch( error => {
                
            })
        },
    },
}
</script>



<style scoped>
img {
  /* border-radius: 50%; */
  width: 200px;
}
</style>