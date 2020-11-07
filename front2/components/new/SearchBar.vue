<template>
    <div id="app-seatch-bar">

        <div class="flex-container">
            <div style="border:1px solid" >
                <select class="custom-select" id="inputGroupSelect01" v-model="selected_type">
                    <option selected >Choose...</option>
                    <option value="hospital">Hospital</option>
                    <option value="doctor">Doctor</option>
                    <!-- <option value="3">Three</option> -->
                </select>
            </div>
            <div style="border:1px solid">
                <select  v-model="selected_division" >
                    <option selected>Divsion...</option>
                    <option v-for="(v,idx) in divisions" :key="idx" :value="v.id" >{{v.division_name_eng}}</option>
                </select>
            </div>
            <div style="border:1px solid" >
                <select class="custom-select" id="inputGroupSelect01" v-model="selected_district">
                    <option selected>District...</option>
                    <option v-for="(v,idx) in districts" :key="idx" :value="v.id" >{{v.district_name_eng}}</option>
                </select> 
            </div>
            <div style="border:1px solid">
                <select class="custom-select" id="inputGroupSelect01" v-model="selected_upazila" >
                    <option selected>Subdistrict...</option>
                    <option v-for="(v,idx) in upazilas" :key="idx" :value="v.id" >{{v.upazila_name_eng}}</option>
                </select>  
            </div>
            <div style="border:1px solid" >
                <span class="search" @click="search">
                    <a href="javascript:;"> Searh </a>  
                </span>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios"
import {mapGetters , mapActions} from "vuex"
export default {
   name: 'SearchBar',
   data(){
       return {
           selected_type : 'Choose...',
           divisions : [] ,
           selected_division : 'Divsion...' ,
           districts : [] ,
           selected_district : 'District...' ,
           upazilas : [] ,
           selected_upazila : 'Subdistrict...' ,
       }
   },
   mounted(){
        this.getDivisions()
   },
   computed: { ...mapGetters([`getDemo`]) },
   watch:{
      selected_division(val){
           this.selected_district = 'District...' ,
           this.getDistricts() 
      },
      selected_district(val){
          this.selected_upazila = 'Subdistrict...' ,
          this.getUpazilas()
      }
   },
   methods : {
       ...mapActions({
           'pass_search_info' : 'search/pass_search_info' 
       }),
        getDivisions(){
            this.$axios.get(`api/frontend/location/`).then( response => {
                this.divisions = response.data?.data?.divisions
                // this.selected_division = this.divisions[0]
            }).catch( error => {
                alert(`error in division`)
            })
        },
        getDistricts(){

            this.$axios.get(`api/frontend/location/?division_id=${this.selected_division}`).then( response => {
                this.districts = response.data?.data?.districts
                // this.selected_division = this.divisions[0]
            }).catch( error => {
                alert(`error is district`)
            })
        },
        getUpazilas(){

            this.$axios.get(`api/frontend/location/?district_id=${this.selected_district}`).then( response => {
                this.upazilas = response.data?.data?.upazilas
                // this.selected_division = this.divisions[0]
            }).catch( error => {
                alert(`error in upazila`)
            })
        },
        search(){
            // console.log(this.$axios.defaults)
            // console.log(process.env.API_URL)
            // return 
            let payload = {
                'selected_type'     : this.selected_type     == 'Choose...'     ? '' : this.selected_type     ,
                'selected_division' : this.selected_division == 'Divsion...'    ? '' : this.selected_division ,
                'selected_district' : this.selected_district == 'District...'   ? '' : this.selected_district ,
                'selected_upazila'  : this.selected_upazila  == 'Subdistrict...'? '' : this.selected_upazila  ,
            }
            // this.$store.dispatch(`pass_search_info`,payload)
            this.pass_search_info(payload)
        },
   },
}
</script>

<style scoped>

.flex-container{
    display:flex ;
    flex-wrap: wrap;
    justify-content: space-around;
    box-shadow: 5px 5px 5px ;
}
.flex-container>div {
    flex-grow: 1;
    margin: 1px solid grey ;
}
.search {
    cursor : pointer ;
    color : #3EAAFD;
}
@media only screen and (max-width : 780px){

   .flex-container{
      display:flex ;
      flex-direction: column;
      flex-wrap: wrap;
      justify-content: space-around;
    }
    
}
</style>
<style >
    #app-seatch-bar {
        padding-right: 4%;
        text-align: center;
    }
    @media only screen and (max-width : 780px){

        #app-seatch-bar{
            margin-right:6% ;
            
        }  
    }

    @media only screen and (max-width : 375px ){

        #app-seatch-bar{
            margin-right:6% ;
            margin-top:100px;
        }  
    }
</style>