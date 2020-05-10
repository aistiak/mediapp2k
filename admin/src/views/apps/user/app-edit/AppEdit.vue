<!-- =========================================================================================
  File Name: UserEdit.vue
  Description: User Edit Page
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->

<template>
  <div id="page-user-edit">
    <!-- {{app_data}}
    {{data_not_found}} -->
    <vs-alert color="danger" title="User Not Found" :active.sync="data_not_found">
      <span>Role record with id: {{ $route.params.id }} not found. </span>
      <span>
        <span>Check </span><router-link :to="{name:'page-hospital-list'}" class="text-inherit underline">All Hospitals</router-link>
      </span>
    </vs-alert>

    <vx-card v-if="!data_not_found">

      <div slot="no-body" class="tabs-container px-6 pt-6">

        <vs-tabs v-model="activeTab" class="tab-action-btn-fill-conatiner">
          <vs-tab label="Account" icon-pack="feather" icon="icon-user">
            <div class="tab-text">
              <app-edit-tab-account class="mt-4" :data="app_data" />
            </div>
          </vs-tab>
          <!-- <vs-tab label="Information" icon-pack="feather" icon="icon-info">
            <div class="tab-text">
              <user-edit-tab-information class="mt-4" :data="user_data" />
            </div>
          </vs-tab>
          <vs-tab label="Social" icon-pack="feather" icon="icon-share-2">
            <div class="tab-text">
              <user-edit-tab-social class="mt-4" :data="user_data" />
            </div>
          </vs-tab> -->
        </vs-tabs>

      </div>

    </vx-card>
  </div>
</template>

<script>
import AppEditTabAccount     from "./AppEditTabAccount.vue"
import UserEditTabInformation from "./UserEditTabInformation.vue"
import UserEditTabSocial      from "./UserEditTabSocial.vue"
import {mapGetters} from "vuex"
// Store Module
import moduleUserManagement from '@/store/user-management/moduleUserManagement.js'

export default {
  components: {
    AppEditTabAccount,
    UserEditTabInformation,
    UserEditTabSocial,
  },
  data() {
    return {
      data_not_found : false ,
      app_data: {} ,
      permitted_modules : [`user`,`hospital`,`role`] ,
      permitted_permission :[`view` , `viewall` , `create` , `update` , `update all` , `delete` , `delete all`],
      temp : [],
      activeTab: 0,
    }
  },
  watch: {
    activeTab() {
      this.fetch_user_data(this.$route.params.userId)
    }
  },
  computed :{
    ...mapGetters([`users`])
  },
  mounted(){
    // this.getHospitalDetail()
    this.getData()
  },
  methods: {

    getData(){
      let id = this.$route.params.id
      this.app_data = this.users.find(v => v.id == id) ||  {}  
      this.data_not_found = ! Object.keys(this.app_data).length
      if(!this.data_not_found) this.adjustRoleBools()

    },
    adjustRoleBools(){
 

      this.permitted_modules.forEach((x) => {
        // remove space form ex delete all to deleteall then iterate 
       this.permitted_permission.map(y => y.replace(/\s/g,``)).forEach((z,self) => {
         console.log(this.app_data.permission[`${x}_${z}`] )
             if(this.app_data.permission[`${x}_${z}`] == undefined )
                this.app_data.permission[`${x}_${z}`] = false 
          })
      });
    },    
    getHospitalDetail(){
        let payload = {
            'id' : this.$route.params.id 
        }
        this.$store.dispatch(`GET_HOSPITAL_LIST`,payload).then(response=>{
            this.hospital_data = response.data
        }).catch(error=>{
           this.hospital_not_found = true
        })
    },
    fetch_user_data(userId) {
      this.$store.dispatch("userManagement/fetchUser", userId)
        .then(res => { this.user_data = res.data })
        .catch(err => {
          if(err.response.status === 404) {
            this.user_not_found = true
            return
          }
          console.error(err) })
    }
  },
  created() {
    // Register Module UserManagement Module
    // if(!moduleUserManagement.isRegistered) {
    //   this.$store.registerModule('userManagement', moduleUserManagement)
    //   moduleUserManagement.isRegistered = true
    // }
    // this.fetch_user_data(this.$route.params.userId)
  }
}

</script>
