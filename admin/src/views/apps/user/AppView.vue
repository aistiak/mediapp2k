<!-- =========================================================================================
  File Name: UserView.vue
  Description: User View page
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->

<template>
  <div id="page-user-view">
    
    {{app_data}}
    <vs-alert color="danger" title="User Not Found" :active.sync="data_not_found">
      <span>Hospital record with id: {{ $route.params.id }} not found. </span>
      <span>
        <span>Check </span><router-link :to="{name:'page-user-list'}" class="text-inherit underline">All Users</router-link>
      </span>
    </vs-alert>

    <div id="user-data" v-if="!data_not_found">
        
      <vx-card  class="mb-base">
          <h2> {{app_data.name}} </h2>
          <br>
        <!-- Avatar -->
        <div class="vx-row">
          <!-- Avatar Col -->
          <div class="vx-col" id="avatar-col">
            <div class="img-container mb-4">
              <img src="@/assets/images/portrait/small/avatar-s-1.jpg" class="rounded w-full" />
            </div>
          </div>

          <!-- Information - Col 1 -->
          <div class="vx-col flex-1" id="account-info-col-1">
            <table>
              <tr>
                <td class="font-semibold">Username</td>
                <td>{{ app_data[`username`] }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Name</td>
                <td>{{ app_data.name }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Email</td>
                <td>{{ app_data.email }}</td>
              </tr>
            </table>
          </div>
          <!-- /Information - Col 1 -->

          <!-- Information - Col 2 -->
          <div class="vx-col flex-1" id="account-info-col-2">
            <table>
              <tr>
                <td class="font-semibold">Status</td>
                <td>{{ app_data[`status`] }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Role</td>
                <td>{{app_data.role_name }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Company</td>
                <td>{{ app_data[`company`] }}</td>
              </tr>
            </table>
          </div>
          <!-- /Information - Col 2 -->
          <div class="vx-col w-full flex" id="account-manage-buttons">
            <vs-button icon-pack="feather" icon="icon-edit" class="mr-4" :to="{name: 'app-user-edit', params: { id: $route.params.id }}">Edit</vs-button>
            <vs-button type="border" color="danger" icon-pack="feather" icon="icon-trash" @click="confirmDeleteRecord">Delete</vs-button>
          </div>

        </div>

      </vx-card>      


      <!-- Permissions -->
 
    </div>
  </div>
</template>

<script>
import axios from "axios"
import moduleUserManagement from '@/store/user-management/moduleUserManagement.js'
import {mapGetters} from "vuex"
export default {
  data() {
    return {
      user_data: null,
      user_not_found: false,
      hospital_not_found: false,
      data_not_found : false ,
      hospital_data : {} ,
      app_data: {} ,
      permitted_modules : [`user`,`hospital`,`role`] ,
      permitted_permission :[`view` , `viewall` , `create` , `update` , `update all` , `delete` , `delete all`],
      temp : [],
    }
  },
  computed: {
    ...mapGetters(['users']),
    userAddress() {
      let str = ""
      for(var field in this.user_data.location) {
        str += field + " "
      }
      return str
    }
  },
  mounted(){
      this.getHospitalDetail()
    // console.log()
      this.getData()
  },
  methods: {
    submit(){
      this.$vs.loading()
      let payload = {
        ...this.app_data.permission
      }
      // if uppdate action then add id 
      payload[`id`] = this.app_data.id 
      this.$store.dispatch(`UPDATE_ROLE`,payload).then(response=>{
          this.$vs.loading.close()
          this.$vs.notify({
              title: 'Success',
              text: 'role updated',
              color: 'success',
              iconPack: 'feather',
              position: 'bottom-right',
              icon: 'icon-check-circle'
          })
        }).catch(error=>{
          this.$vs.loading.close()
      })
    },
    getData(){
      let id = this.$route.params.id
      this.app_data = this.users.find(v => v.id == id) ||  {}  
      this.data_not_found = ! Object.keys(this.app_data).length
      // if(!this.data_not_found) this.adjustRoleBools()

    },
    // adjustRoleBools(){
 

    //   this.permitted_modules.forEach((x) => {
    //     // remove space form ex delete all to deleteall then iterate 
    //    this.permitted_permission.map(y => y.replace(/\s/g,``)).forEach((z,self) => {
    //      console.log(this.app_data.permission[`${x}_${z}`] )
    //          if(this.app_data.permission[`${x}_${z}`] == undefined )
    //             this.app_data.permission[`${x}_${z}`] = false 
    //       })
    //   });
    // },
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
    confirmDeleteRecord() {
      this.$vs.dialog({
        type: 'confirm',
        color: 'danger',
        title: `Confirm Delete`,
        text: `You are about to delete "${this.app_data.name}"`,
        accept: this.deleteRecord,
        acceptText: "Delete"
      })
    },
    deleteRecord() {
      this.$vs.loading()
      /* Below two lines are just for demo purpose */
      this.$store.dispatch(`DELETE_ROLE`,this.$route.params.id).then(response=>{
        this.$vs.loading.close()
        this.showDeleteSuccess()

        // this.$router.push('/apps/permission/permission-list');
      }).catch(error=>{
        this.$vs.loading.close()
      })

      /* UnComment below lines for enabling true flow if deleting user */
      // this.$store.dispatch("userManagement/removeRecord", this.user_data.id)
      //   .then(()   => { this.$router.push({name:'app-user-list'}); this.showDeleteSuccess() })
      //   .catch(err => { console.error(err)       })
    },
    showDeleteSuccess() {
      this.$vs.notify({
        color: 'success',
        title: 'User Deleted',
        text: 'The selected user was successfully deleted'
      })
        this.$router.push(`/apps/role/role-list`).catch(() => {})
    }
  },
  created() {
    // Register Module UserManagement Module
    // if(!moduleUserManagement.isRegistered) {
    //   this.$store.registerModule('userManagement', moduleUserManagement)
    //   moduleUserManagement.isRegistered = true
    // }

    // const userId = this.$route.params.userId
    // this.$store.dispatch("userManagement/fetchUser", userId)
    //   .then(res => { this.user_data = res.data })
    //   .catch(err => {
    //     if(err.response.status === 404) {
    //       this.user_not_found = true
    //       return
    //     }
    //     console.error(err) })
  }
}

</script>

<style lang="scss">
#avatar-col {
  width: 10rem;
}

#page-user-view {
  table {
    td {
      vertical-align: top;
      min-width: 140px;
      padding-bottom: .8rem;
      word-break: break-all;
    }

    &:not(.permissions-table) {
      td {
        @media screen and (max-width:370px) {
          display: block;
        }
      }
    }
  }
}

// #account-info-col-1 {
//   // flex-grow: 1;
//   width: 30rem !important;
//   @media screen and (min-width:1200px) {
//     & {
//       flex-grow: unset !important;
//     }
//   }
// }


@media screen and (min-width:1201px) and (max-width:1211px),
only screen and (min-width:636px) and (max-width:991px) {
  #account-info-col-1 {
    width: calc(100% - 12rem) !important;
  }

  // #account-manage-buttons {
  //   width: 12rem !important;
  //   flex-direction: column;

  //   > button {
  //     margin-right: 0 !important;
  //     margin-bottom: 1rem;
  //   }
  // }

}

</style>
