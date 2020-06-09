<template>
  <section class="team_member_area section_padding text-center">
          <div>
               <!-- <span>{{windowWidth}}</span> -->
               <h4> {{total}} Hospitals available  </h4>
               <span>
                 <a href="javascript:;" @click="prev" v-show="page > 1"> prev </a>        
               </span>
               <span>&nbsp;&nbsp;</span>
               <span>
                 <a href="javascript:;" @click="next" v-show="page < last_page"> next  </a>
               </span>
          </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="hero-section-title text-center">
            <!-- <h4>Total {{total}} results found </h4> -->
          </div>

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
    import {mapGetters} from "vuex"
    export default {
      name: "Team",
      data(){
        return {
          hospital_list : [],
          page : 1 ,
          limit : 4 ,
          last_page : 1 ,
          current_page : 1 ,
          total : 0 ,
          windowWidth: 0 , 
          txt : ``,
          division_id : `` ,
          district_id : `` ,
          upazila_id  : `` ,
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
      computed:{
        ...mapGetters(['search_info'])
      },
      watch: {
        windowWidth(newWidth, oldWidth) {
        this.txt = `it changed to ${newWidth} from ${oldWidth}`;
        },
        search_info(val){
          this.respondToSearchFilterChange()
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
          axios.get(`api/frontend/hospital/?page=${page}&limit=${this.limit}`,{
            params : {
              'division_id' : this.division_id ,
              'district_id' : this.district_id ,
              'upazila_id'  : this.upazila_id  ,
            }
          }).then(response=>{
             this.hospital_list = response.data?.data
             this.total     = response.data?.meta?.total 
             this.last_page     = response.data?.meta?.last_page 
             this.current_page     = response.data?.meta?.current_page 
             this.page  = this.current_page
            //  alert(this.last_page)
          }).catch(error=>{
            alert(`error`)
          })
        },
        respondToSearchFilterChange(){
          this.division_id = this.search_info.selected_division
          this.district_id = this.search_info.selected_district
          this.upazila_id = this.search_info.selected_upazila
          this.getHospitals()
        //  let  payload = {
        //     "division_id" : this.search_info.selected_division ,
        //     "district_id" : this.search_info.selected_district ,
        //     "upazila_id" :  this.search_info.selected_upazila  ,
        //   } 
        //   axios.get(`api/frontend/hospital/?&page=${this.page}&limit=${this.limit}`,{
        //     params : {
        //       ...payload
        //     }
        //   }).then( response =>{
        //      this.hospital_list = response.data?.data
        //      this.last_page     = response.data?.meta?.last_page             
        //   }).catch( error => {
        //      alert(`error`)
        //   })
        }
      }
    }
</script>

<style scoped>

</style>
