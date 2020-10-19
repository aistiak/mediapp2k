<template>
  <!-- <section class="blog_details_section section_padding"> -->
    <div class="container">

      <!-- <div class="row" style="margin-top:5%">
          <div class="col-md-12" align="">  
                <img v-if="hospitalDetail.avater" :src="hospitalDetail.avater.path" alt="team 1" style="width:83vw;height:61vh;">
                <img v-else src="/assets/images/team/team-1.jpg" alt="team 1">
          </div>
      </div> -->
      <div class="row" style="margin-top:5%" v-if="slider">
          <div class="col-md-12" align="">  
                <img v-if="hospitalDetail.avater" :src="slider.path" alt="team 1" style="width:83vw;height:61vh;border:2px solid lightgrey;">
                <img v-else src="/assets/images/team/team-1.jpg" alt="team 1">
          </div>
      </div>
      <div class="hospital-service-list">
        
      </div>
      <div class="row" style="margin-top:10px;">
        <div class="col">
           <h2 style="margin-left:12px;margin-bottom:20px;"> {{hospitalDetail.name}}</h2>
        </div>
      </div>
      <div class="row" style="margin-top:10px;margin-left:5px;">
        <div class="col">
           <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, totam facere. Minus, recusandae fuga nihil beatae debitis dignissimos vitae possimus vero rem pariatur odit excepturi molestiae unde accusantium molestias reiciendis. </p>
        </div>
      </div>

      <div class="row" style="margin-top:30px;">
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
            <!-- <img src="/assets/images/team/team-1.jpg" alt="team 1"> -->
            <img src="/assets/images/comment-1.jpg"  alt="Cinque Terre">
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
           counter : 1 ,
           sliders : [] ,
           slider : `` ,
        }
    },
    computed: { ...mapGetters('hospital',['hospitalDetail']) },
    mounted() {

        this.getHospitalDetail() 
        this.startSlider() 
    },
    methods :{ 
        ...mapActions({
            'fetch_hopital_detail' : 'hospital/fetch_hopital_detail' ,
        }),
        doctor_detail: function({id}){
            this.$router.push(`/doctor-detail/${id}`)
        },
        getHospitalDetail : async function () {
          let {data,errors} =  await this.fetch_hopital_detail(this.hospital_id)
          this.sliders = data.sliders 
          // console.log()
        },
        startSlider(){
          setInterval(this.intervalWork, 2000);
        },
        intervalWork(){
          this.counter = this.counter + 1 
          this.slider = this.sliders[ this.counter % this.sliders.length ]
        }
    },
}
</script>

<style scoped>

</style>