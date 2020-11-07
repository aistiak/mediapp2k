<template>
  <section class="team_member_area section_padding text-center search-result" >
    <!-- <VclBulletList v-if="isLoading"/> -->
    <div style="margin-top:-6%" >
      <div>
        <!-- <span>{{windowWidth}}</span> -->
        <h4 v-if="!isLoading">
          {{ total }}
          {{
            type.toLowerCase() == "hospital" ? `Hospitals` : `Doctor`
          }}
          available
        </h4>
        <h4 v-else> Loading </h4>
        <!-- <span>
          <a href="javascript:;" @click="prev" v-show="page > 1"> prev </a>
        </span>
        <span>&nbsp;&nbsp;</span>
        <span>
          <a href="javascript:;" @click="next" v-show="page < last_page">
            next
          </a>
        </span> -->
      </div>
      <!-- <div class="container"> -->

      <div class="search-result-box" >
        <div class="row" style="margin-top: 5%">
          <!-- <div class="col-md-12">
            <div class="hero-section-title text-center">
            </div>

          </div> -->
          <div v-if="type == `hospital`">
            <!-- <div   class="col-md-4" v-for="(item,idx) in item_list" :key="idx" @click="gotoDetail(item)">
              <HospitalCard :hospital="item" />
            </div>   -->

            <div
              class="col-md-4 col-sm-6"
              v-for="(item, idx) in item_list"
              :key="idx"
              @click="gotoDetail(item)"
            >
              <div class="team_member">
                <img
                  v-if="item.avatar"
                  :src="item.avatar.path"
                  alt="team 1"
                  class="avatar"
                />
                <img v-else src="/assets/images/team/team-1.jpg" alt="team 1" />
                <div class="team_details">
                  <h3>{{ item.name }}<span class="skills"></span></h3>
                  <h4>{{ `` }}<span class="skills"></span></h4>
                  <p>{{ item.address }}</p>
                  <!-- <ul class="team_socials">
                    <h4> {{ item.address }} </h4>
                  </ul> -->
                </div>
              </div>
            </div>
          </div>
          <div v-else>
            <div
              class="col-md-4 col-sm-6"
              v-for="(item, idx) in item_list"
              :key="idx"
              @click="gotoDetail(item)"
            >
              <div class="team_member">
                <img v-if="item.avatar" :src="item.avatar.path" alt="team 1" />
                <img v-else src="/assets/images/team/team-1.jpg" alt="team 1" />

                <!-- <img  src="/assets/images/team/team-1.jpg" alt="team 1"> -->
                <div class="team_details">
                  <h3>{{ item.name }}<span class="skills"></span></h3>
                  <h2>{{ `` }}<span class="skills"></span></h2>
                  <p>{{ item.title }}</p>
                  <!-- <ul class="team_socials">
                    <h4> {{ item.hospital_name }} </h4>
                  </ul> -->
                </div>
                <!--end .team_details-->
              </div>
              <!--end .team_member-->
            </div>
            <!--end .col-md-3-->
          </div>
        </div>
        <!--end .row-->
       
      </div>
      <!--end .container-->

    </div>
    <div v-if="isLoading">
      <vue-content-loading :width="300" :height="800">
        <rect x="0" y="0" rx="4" ry="4" width="90" height="100" />
        <rect x="110" y="0" rx="4" ry="4" width="90" height="100" />
        <rect x="210" y="0" rx="4" ry="4" width="90" height="100" />

        <rect x="0" y="110" rx="4" ry="4" width="90" height="100" />
        <rect x="110" y="110" rx="4" ry="4" width="90" height="100" />
        <rect x="210" y="110" rx="4" ry="4" width="90" height="100" />

        <rect x="0" y="220" rx="4" ry="4" width="90" height="100" />
        <rect x="110" y="220" rx="4" ry="4" width="90" height="100" />
        <rect x="210" y="220" rx="4" ry="4" width="90" height="100" />
      </vue-content-loading>
    </div> 
    <div class="load-more">
      <span>
        <h1 @click="next" v-show="page < last_page" style="display:block">
          load more 
        </h1>
      </span>
    </div>        
  </section>
</template>

<script>
// import { VclFacebook, VclInstagram ,VclBulletList } from 'vue-content-loading';
import VueContentLoading from "vue-content-loading";
import axios from "axios";
import { mapGetters } from "vuex";
export default {
  name: "Team",
  components: {
    // VclFacebook,
    // VclInstagram,
    // VclBulletList ,
    VueContentLoading,
    HospitalCard: () => import("./new/HospitalCard"),
    NewDoctorCard: () => import("./new/DoctorCard"),
  },
  data() {
    return {
      type: "Hospital",
      item_list: [],
      page: 1,
      limit: 10,
      last_page: 1,
      current_page: 1,
      total: 0,
      windowWidth: 0,
      txt: ``,
      division_id: ``,
      district_id: ``,
      upazila_id: ``,
      isLoading: false,
    };
  },
  mounted() {
    //
    this.getItems(),
      this.$nextTick(() => {
        window.addEventListener("resize", this.onResize);
      });
  },

  beforeDestroy() {
    window.removeEventListener("resize", this.onResize);
  },
  computed: {
    ...mapGetters("search", ["search_info"]),
  },
  watch: {
    windowWidth(newWidth, oldWidth) {
      this.txt = `it changed to ${newWidth} from ${oldWidth}`;
    },
    search_info(val) {
      this.respondToSearchFilterChange();
    },
  },

  methods: {
    gotoDetail({ id }) {
      if (this.type == "doctor") {
        this.$router.push(`/doctor-detail/${id}`);
      } else {
        // hospital
        this.$router.push(`/hospital-detail/${id}`);
      }
    },
    onResize() {
      this.windowWidth = window.innerWidth;
      // todo
      // responsive code hear
      // if( this.windowWidth < 745 ){
      //   this.item_list = [ this.item_list[0] ]
      //   this.limit = 1
      // }else{
      //   this.limit = 4
      // }
    },
    prev() {
      this.page = this.page > 0 ? this.page - 1 : this.page;
      this.getItems(this.page);
    },
    next() {
      // this.page = this.page < this.last_page ? this.page + 1 : this.page;
      this.page += 1 
      this.getItems(this.page);
    },

    getItems(page = 1) {
      this.isLoading = true;
      this.$axios
        .get(
          `api/frontend/hospital/?page=${page}&limit=${this.limit}&type=${this.type}`,
          {
            params: {
              division_id: this.division_id,
              district_id: this.district_id,
              upazila_id: this.upazila_id,
            },
          }
        )
        .then((response) => {
          let temp = response.data?.data 
          if(  Array.isArray(temp)) {
            this.item_list = [...this.item_list, ...temp] 
          }
          // this.item_list = response.data?.data;
          this.total = response.data?.meta?.total;
          this.last_page = response.data?.meta?.last_page;
          this.current_page = response.data?.meta?.current_page;
          this.page = this.current_page;
          this.isLoading = false;
          //  alert(this.last_page)
        })
        .catch((error) => {
          this.isLoading = false;
          alert(`error in hospial`);
        });
    },
    respondToSearchFilterChange() {
      this.item_list = [] 
      this.type = this.search_info.selected_type;
      this.division_id = this.search_info.selected_division;
      this.district_id = this.search_info.selected_district;
      this.upazila_id = this.search_info.selected_upazila;
      this.getItems();
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
      //      this.item_list = response.data?.data
      //      this.last_page     = response.data?.meta?.last_page
      //   }).catch( error => {
      //      alert(`error`)
      //   })
    },
    
  },
};
</script>


<style scoped>
.search-result {
  padding-right: 6%;
}
</style>
<style >
.team_member {
  border: 1px solid black;
  box-shadow: 5px 5px 5px;
  margin: 5px;
  /* padding : 5px ; */
}
.team_member:hover {
  box-shadow: 5px 5px 10px;
  border: 2px solid black;
}
/* .team_member > .avatar {
  height : 250px; 
  width :  282px;
} */
.search-result-box {
    /* overflow-y: scroll;
    overflow-x: hidden;
    direction: rtl;
    padding-left: 20px; */
}

</style>
<style >
.load-more h1 {
  /* all : initial ; */
  display: block;
}
</style>