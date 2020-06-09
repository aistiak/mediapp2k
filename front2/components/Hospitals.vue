<template>
  <section class="team_member_area section_padding text-center">
          <div>
               <!-- <span>{{windowWidth}}</span> -->
               <span>
                 <a href="javascript:;" @click="prev"> prev </a>        
               </span>
               <span>&nbsp;&nbsp;</span>
               <span>
                 <a href="javascript:;" @click="next"> next  </a>
               </span>
          </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- <div class="hero-section-title text-center">
            <h1>Meet The Hospitals</h1>
          </div> -->

        </div><!--end .col-md-12-->

        <div class="col-md-3 col-sm-6" v-for="(hospital,idx) in hospital_list" :key="idx">
          <div class="team_member">
            <img src="/assets/images/team/team-1.jpg" alt="team 1">
            <div class="team_details">
              <h3>{{hospital.name}}<span class="skills"></span></h3>
              <h4>{{``}}<span class="skills"></span></h4>
              <ul class="team_socials">
                 <h4>{{hospital.address}}<span class="skills"></span></h4>
              </ul>
            </div><!--end .team_details-->
          </div><!--end .team_member-->
        </div><!--end .col-md-3-->
      </div><!--end .row-->

    </div><!--end .container-->
  </section>
</template>

<script>
    import axios from "axios"
    export default {
      name: "Team",
      data(){
        return {
          hospital_list : [1,2,3,4],
          page : 1 ,
          limit : 4 ,
          last_page : 1 ,
          windowWidth: 0 , 
          txt : ``,
        }
      },
      mounted(){
        this.getHospitals(),
        this.$nextTick(() => {
            window.addEventListener('resize', this.onResize);
        })
      },

      beforeDestroy() { 
          window.removeEventListener('resize', this.onResize); 
      },
      
      watch: {
        windowWidth(newWidth, oldWidth) {
        this.txt = `it changed to ${newWidth} from ${oldWidth}`;
        }
      },

      methods:{
        onResize() {
          this.windowWidth = window.innerWidth
          // todo 
          // responsive code hear 
          // if( this.windowWidth < 745 ){
          //   this.hospital_list = [ this.hospital_list[0] ]
          //   this.limit = 1 
          // }else{
          //   this.limit = 4 
          // }
        },
        prev(){
          this.page = this.page > 0 ? (this.page - 1 ) : this.page 
          this.getHospitals(this.page)
        },
        next(){
          this.page = this.page < this.last_page ? (this.page + 1) : this.page 
          this.getHospitals(this.page)
        },
        getHospitals(page=1){
          axios.get(`api/frontend/hospital/?page=${page}&limit=${this.limit}`).then(response=>{
             this.hospital_list = response.data?.data
             this.last_page     = response.data?.meta?.last_page 
            //  alert(this.last_page)
          }).catch(error=>{
            alert(`error`)
          })
        },
      }
    }
</script>

<style scoped>

</style>
