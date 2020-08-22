<template>
  <section class="blog_details_section section_padding">
    <div class="container">
      <div  class="row">
          <div class="col-sm-12">
              <h1> {{hospitalDetail.name}} </h1>
          </div> 
      </div>  
      <div class="row">
        <div class="col-md-8">
          <div class="blog_details_left">
            <div class="blog_left_box">
              <div class="bl_share_img">
            
              </div><!--end .bl_share_img-->

            </div><!--end blog-left-box-->



          </div><!--end blog-details-left-->
        </div>
        <div class="col-md-4">
        </div>
              
      </div>
      <br>
      <div class="row">
          <div class="col-sm-12"> 
              <h2>Doctors </h2>
          </div>
      </div>  
      <div class="row">
        <div class="col-md-12">
          <div class="hero-section-title text-center">
            <!-- <h4>Total {{total}} results found </h4> -->
          </div>

        </div><!--end .col-md-12-->

        <div class="col-md-3 col-sm-6" v-for="(item,idx) in hospitalDetail.doctors" :key="idx" @click="doctor_detail(item)">
          <div class="team_member">
            <img src="/assets/images/team/team-1.jpg" alt="team 1">
            <div class="team_details">
              <h3>{{item.name}}<span class="skills"></span></h3>
              <h4>{{``}}<span class="skills"></span></h4>   
              <ul class="team_socials">
                 <h4>{{  }}<span class="skills"></span></h4>
              </ul>
            </div><!--end .team_details-->
          </div><!--end .team_member-->
        </div><!--end .col-md-3-->
      </div><!--end .row-->
    </div>
  </section>
</template>

<script>
import { mapGetters , mapActions } from "vuex"
export default {
    props: ['hospital_id'],
    head(){
      return {
        title: "Hospital Detail "
      }
    },
    data(){
        return {
           detail : {} ,
        }
    },
    computed: { ...mapGetters('hospital',['hospitalDetail']) },
    mounted() {

        this.getHospitalDetail() 
    },
    methods :{ 
        ...mapActions({
            'fetch_hopital_detail' : 'hospital/fetch_hopital_detail' ,
        }),
        doctor_detail: function({id}){
            this.$router.push(`/doctor-detail/${id}`)
        },
        getHospitalDetail : function () {
          this.fetch_hopital_detail(this.hospital_id)
        },
    },
}
</script>

<style scoped>
 .bl_share_img {
     
     
 }
</style>