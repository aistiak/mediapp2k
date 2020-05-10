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
    <!-- {{hospital_not_found}}
    {{hospital_data}} -->
    <vs-alert color="danger" title="User Not Found" :active.sync="hospital_not_found">
      <span>Hospital record with id: {{ $route.params.id }} not found. </span>
      <span>
        <span>Check </span><router-link :to="{name:'page-hospital-list'}" class="text-inherit underline">All Hospitals</router-link>
      </span>
    </vs-alert>

    <vx-card v-if="hospital_data && !hospital_not_found">

      <div slot="no-body" class="tabs-container px-6 pt-6">

        <vs-tabs v-model="activeTab" class="tab-action-btn-fill-conatiner">
          <vs-tab label="Account" icon-pack="feather" icon="icon-user">
            <div class="tab-text">
              <hospital-edit-tab-account class="mt-4" :data="hospital_data" />
            </div>
          </vs-tab>
          <vs-tab label="Information" icon-pack="feather" icon="icon-info">
            <div class="tab-text">
              <!-- <user-edit-tab-information class="mt-4" :data="user_data" /> -->
            </div>
          </vs-tab>
          <vs-tab label="Social" icon-pack="feather" icon="icon-share-2">
            <div class="tab-text">
              <!-- <user-edit-tab-social class="mt-4" :data="user_data" /> -->
            </div>
          </vs-tab>
        </vs-tabs>

      </div>

    </vx-card>
  </div>
</template>

<script>
import HospitalEditTabAccount     from "./HospitalEditTabAccount.vue"
import UserEditTabInformation from "./UserEditTabInformation.vue"
import UserEditTabSocial      from "./UserEditTabSocial.vue"

// Store Module
import moduleUserManagement from '@/store/user-management/moduleUserManagement.js'

export default {
  components: {
    HospitalEditTabAccount,
    UserEditTabInformation,
    UserEditTabSocial,
  },
  data() {
    return {
      user_data: null,
      user_not_found: false,
      hospital_data: {},
      hospital_not_found: false,

      /*
        This property is created for fetching latest data from API when tab is changed

        Please check it's watcher
      */
      activeTab: 0,
    }
  },
  watch: {
    activeTab() {
      this.fetch_user_data(this.$route.params.userId)
    }
  },
  mounted(){
    this.getHospitalDetail()
  },
  methods: {
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
