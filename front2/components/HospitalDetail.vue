<template>
  <!-- <section class="blog_details_section section_padding"> -->
    <div class="container">
      <div class="row" style="margin-top:10px;">
        <div class="col">
           <h2 style="margin-left:12px;margin-bottom:20px;"> {{hospitalDetail.name}}</h2>
        </div>
      </div>
      <!-- <div class="row" style="margin-top:5%">
          <div class="col-md-12" align="">  
                <img v-if="hospitalDetail.avater" :src="hospitalDetail.avater.path" alt="team 1" style="width:83vw;height:61vh;">
                <img v-else src="/assets/images/team/team-1.jpg" alt="team 1">
          </div>
      </div> -->
      <!-- vue-easy-slider start  -->
      <div style="border:2px solid ">
        <v-carousel v-model="model" :height="350">
          <v-carousel-item
            v-for="(slide, i) in sliders"
            :src="slide.path"
            :key="i">
          </v-carousel-item>
        </v-carousel>
      </div>
      <!-- vutify slider end  -->
      <!-- <div class="row" style="margin-top:5% ; margin-bottom : 5% ; border:1px solid ; box-shadow: 5px 5px 5px ;">
        <slider animation="fade">
          <slider-item
            v-for="(v, index) in sliders"
            :key="index"
            @click="() => {}"
          >
            <img :src="v.path" alt="" style="width:83vw;height:61vh;border:2px solid lightgrey;" >
            <p style="line-height: 280px; font-size: 5rem; text-align: center;">Page{{ index + 1 }}</p>
          </slider-item>
        </slider>
      </div> -->

      <!-- vue-easy-slider end  -->

      <!-- slider start  -->
      <!-- <div class="row" style="margin-top:5%" v-if="slider">
          <div class="col-md-12" align="">  
                <img v-if="hospitalDetail.avater" :src="slider.path" alt="team 1" style="width:83vw;height:61vh;border:2px solid lightgrey;">
                <img v-else src="/assets/images/team/team-1.jpg" alt="team 1">
          </div>
      </div> -->
      <!-- slider end  -->
      <div class="hospital-service-list">
        
      </div>

      <div class="row" style="margin-top:10px;margin-left:5px;">
        <div class="col">
          <span v-html="hospitalDetail.about" class="modification"></span>
           <!-- <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, totam facere. Minus, recusandae fuga nihil beatae debitis dignissimos vitae possimus vero rem pariatur odit excepturi molestiae unde accusantium molestias reiciendis. </p> -->
        </div>
      </div>

      <div class="row" style="margin-top:30px;">
          <div class="col-sm-12"> 
              <h2>
                Doctors 
                <i class="fa fa-arrow-down" v-if="showDoctors == false" @click="showDoctors=true" ></i>
                <i class="fa fa-arrow-up" v-else @click="showDoctors=false"></i>
              </h2>

          </div>
      </div>  
      <div class="row">
        <div class="col-md-12">
          <div class="hero-section-title text-center">
            <!-- <h4>Total {{total}} results found </h4> -->
          </div>

        </div><!--end .col-md-12-->
         <div v-show="showDoctors">
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
          </div> 
      </div><!--end .row-->
    </div>
  <!-- </section> -->
</template>

<script>
import { mapGetters , mapActions } from "vuex"
import { Slider, SliderItem } from 'vue-easy-slider'
export default {
    name : 'HospitalDetailPage' ,
    props: ['hospital_id'],
    components : {
      Slider ,
      SliderItem ,
    },
    head(){
      return {
        title: "Hospital Detail "
      }
    },
    data(){
        return {
           model : '' ,
           detail : {} ,
           counter : 1 ,
           sliders : [] ,
           slider : `` ,
           showDoctors : true ,   
           list: [
              { backgroundColor: '#3f51b5', width: '100%', height: '100%' },
              { backgroundColor: '#eee', width: '100%', height: '100%' },
              { backgroundColor: '#f44336', width: '100%', height: '100%' },
           ]
        }
    },
    computed: { ...mapGetters('hospital',['hospitalDetail']) },
    mounted() {

        this.getHospitalDetail() 
        // this.startSlider() 
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

<style >
.modification {
  all: initial ;
  font-family : inherit ;
}
</style>