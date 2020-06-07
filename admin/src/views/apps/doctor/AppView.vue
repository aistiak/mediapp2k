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
    
 
    <vs-alert color="danger" title="User Not Found" :active.sync="role_not_found">
      <span>Hospital record with id: {{ $route.params.id }} not found. </span>
      <span>
        <span>Check </span><router-link :to="{name:'page-user-list'}" class="text-inherit underline">All Users</router-link>
      </span>
    </vs-alert>

    <div id="user-data" v-if="!role_not_found">
        
      <vx-card  class="mb-base">
          <h2> {{role_data.name}} </h2>
          <br>
        <!-- Avatar -->
        <div class="vx-row">
          <!-- Avatar Col -->
          <!-- <div class="vx-col" id="avatar-col">
            <div class="img-container mb-4">
              <img :src="role_data[`avatar`]" class="rounded w-full" />
            </div>
          </div> -->

          <!-- Information - Col 1 -->
          <!-- <div class="vx-col flex-1" id="account-info-col-1">
            <table>
              <tr>
                <td class="font-semibold">Username</td>
                <td>{{ role_data[`username`] }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Name</td>
                <td>{{ role_data.name }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Email</td>
                <td>{{ role_data.email }}</td>
              </tr>
            </table>
          </div> -->
          <!-- /Information - Col 1 -->

          <!-- Information - Col 2 -->
          <!-- <div class="vx-col flex-1" id="account-info-col-2">
            <table>
              <tr>
                <td class="font-semibold">Status</td>
                <td>{{ role_data[`status`] }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Role</td>
                <td>{{ role_data[`role`] }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Company</td>
                <td>{{ role_data[`company`] }}</td>
              </tr>
            </table>
          </div> -->
          <!-- /Information - Col 2 -->
          <div class="vx-col w-full flex" id="account-manage-buttons">
            <vs-button icon-pack="feather" icon="icon-edit" class="mr-4" :to="{name: 'app-role-edit', params: { id: $route.params.id }}">Edit</vs-button>
            <vs-button type="border" color="danger" icon-pack="feather" icon="icon-trash" @click="confirmDeleteRecord">Delete</vs-button>
          </div>

        </div>

      </vx-card>      


      <!-- Permissions -->
      <vx-card>

        <div class="vx-row">
          <div class="vx-col w-full">
            <div class="flex items-end px-3">
              <feather-icon svgClasses="w-6 h-6" icon="LockIcon" class="mr-2" />
              <span class="font-medium text-lg leading-none">Permissions</span>
            </div>
            <vs-divider />
          </div>
        </div>

        <div class="block overflow-x-auto">
          <table class="w-full permissions-table">
            <tr>
              <!--
                You can also use `Object.keys(Object.values(data_local.permissions)[0])` this logic if you consider,
                our data structure. You just have to loop over above variable to get table headers.
                Below we made it simple. So, everyone can understand.
               -->
              <th class="font-semibold text-base text-left px-3 py-2" >module</th>
              <th class="font-semibold text-base text-left px-3 py-2" v-for="heading in permitted_permission" :key="heading">{{ heading }}</th>
              <!-- <th class="font-semibold text-base text-left px-3 py-2" v-for="heading in ['Module', 'Read', 'Write', 'Create', 'Delete']" :key="heading">{{ heading }}</th> -->
            </tr>

  
            <tr v-for="(v,k) in permitted_modules" :key="k">
              <td class="px-3 py-2">{{ v }}</td>
              <td v-for="(v2, k2) in permitted_permission.map(v=>v.replace(/\s/g,''))" class="px-3 py-2" :key="k2">
                <!-- {{`${v}_${v2}`}} -->
                <!-- {{role_data.permission[`${v}_${v2}`]}} -->
                <vs-checkbox v-model="role_data.permission[`${v}_${v2}`]"  class="pointer-events-none"/>
              </td>
            </tr>
          </table>
        </div>
        <!-- <vs-button type="filled"  class="mt-5 block" @click="submit">Submit</vs-button> -->
      </vx-card>
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
      role_not_found : false ,
      hospital_data : {} ,
      role_data: {} ,
      permitted_modules : [`user`,`hospital`,`role`] ,
      permitted_permission :[`view` , `viewall` , `create` , `update` , `update all` , `delete` , `delete all`],
      temp : [],
    }
  },
  computed: {
    ...mapGetters(['roles']),
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
      this.getRole()
  },
  methods: {
    submit(){
      this.$vs.loading()
      let payload = {
        ...this.role_data.permission
      }
      // if uppdate action then add id 
      payload[`id`] = this.role_data.id 
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
    getRole(){
      let id = this.$route.params.id
      this.role_data = this.roles.find(v => v.id == id) ||  {}  
      this.role_not_found = ! Object.keys(this.role_data).length
      if(!this.role_not_found) this.adjustRoleBools()

    },
    adjustRoleBools(){
 

      this.permitted_modules.forEach((x) => {
        // remove space form ex delete all to deleteall then iterate 
       this.permitted_permission.map(y => y.replace(/\s/g,``)).forEach((z,self) => {
         console.log(this.role_data.permission[`${x}_${z}`] )
             if(this.role_data.permission[`${x}_${z}`] == undefined )
                this.role_data.permission[`${x}_${z}`] = false 
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
    confirmDeleteRecord() {
      this.$vs.dialog({
        type: 'confirm',
        color: 'danger',
        title: `Confirm Delete`,
        text: `You are about to delete "${this.role_data.name}"`,
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
