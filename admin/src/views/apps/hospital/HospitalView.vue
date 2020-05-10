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
      <!-- {{hospital_not_found}}
      {{hospital_data}} -->
    <vs-alert color="danger" title="User Not Found" :active.sync="hospital_not_found">
      <span>Hospital record with id: {{ $route.params.id }} not found. </span>
      <span>
        <span>Check </span><router-link :to="{name:'page-user-list'}" class="text-inherit underline">All Users</router-link>
      </span>
    </vs-alert>

    <div id="user-data" v-if="hospital_data && !hospital_not_found">
        
      <vx-card title="Account" class="mb-base">

        <!-- Avatar -->
        <div class="vx-row">

          <!-- Avatar Col -->
          <div class="vx-col" id="avatar-col">
            <div class="img-container mb-4">
              <img :src="hospital_data[`avatar`]" class="rounded w-full" />
            </div>
          </div>

          <!-- Information - Col 1 -->
          <div class="vx-col flex-1" id="account-info-col-1">
            <table>
              <tr>
                <td class="font-semibold">Username</td>
                <td>{{ hospital_data[`username`] }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Name</td>
                <td>{{ hospital_data.name }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Email</td>
                <td>{{ hospital_data.email }}</td>
              </tr>
            </table>
          </div>
          <!-- /Information - Col 1 -->

          <!-- Information - Col 2 -->
          <div class="vx-col flex-1" id="account-info-col-2">
            <table>
              <tr>
                <td class="font-semibold">Status</td>
                <td>{{ hospital_data[`status`] }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Role</td>
                <td>{{ hospital_data[`role`] }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Company</td>
                <td>{{ hospital_data[`company`] }}</td>
              </tr>
            </table>
          </div>
          <!-- /Information - Col 2 -->
          <div class="vx-col w-full flex" id="account-manage-buttons">
            <vs-button icon-pack="feather" icon="icon-edit" class="mr-4" :to="{name: 'app-hospital-edit', params: { id: $route.params.id }}">Edit</vs-button>
            <vs-button type="border" color="danger" icon-pack="feather" icon="icon-trash" @click="confirmDeleteRecord">Delete</vs-button>
          </div>

        </div>

      </vx-card>

      <div class="vx-row">
        <div class="vx-col lg:w-1/2 w-full">
          <vx-card title="Information" class="mb-base">
            <table>
              <tr>
                <td class="font-semibold">Birth Date</td>
                <td>{{ hospital_data[`dob`] }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Mobile</td>
                <td>{{ hospital_data[`mobile`] }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Website</td>
                <td>{{ hospital_data[`website`] }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Languages</td>
                <!-- <td>{{ hospital_data[`languages_known`].join(", ") }}</td> -->
              </tr>
              <tr>
                <td class="font-semibold">Gender</td>
                <td>{{ hospital_data[`gender`] }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Contact</td>
                <!-- <td>{{ hospital_data[`contact_options`].join(", ") }}</td> -->
              </tr>
            </table>
          </vx-card>
        </div>

        <div class="vx-col lg:w-1/2 w-full">
          <vx-card title="Social Links" class="mb-base">
            <table>
              <tr>
                <td class="font-semibold">Twitter</td>
                <td>{{ hospital_data['social_links'] }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Facebook</td>
                <td>{{ hospital_data['social_links'] }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Instagram</td>
                <td>{{ hospital_data['social_links'] }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Github</td>
                <td>{{ hospital_data['social_links'] }}</td>
              </tr>
              <tr>
                <td class="font-semibold">CodePen</td>
                <td>{{ hospital_data['social_links'] }}</td>
              </tr>
              <tr>
                <td class="font-semibold">Slack</td>
                <td>{{ hospital_data['social_links'] }}</td>
              </tr>
            </table>
          </vx-card>
        </div>
      </div>

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
              <th class="font-semibold text-base text-left px-3 py-2" v-for="heading in ['Module', 'Read', 'Write', 'Create', 'Delete']" :key="heading">{{ heading }}</th>
            </tr>
<!-- 
            <tr v-for="(val, name) in user_data.permissions" :key="name">
              <td class="px-3 py-2">{{ name }}</td>
              <td v-for="(permission, name) in val" class="px-3 py-2" :key="name+permission">
                <vs-checkbox v-model="val[name]" class="pointer-events-none" />
              </td>
            </tr> -->
          </table>
        </div>

      </vx-card>
    </div>
  </div>
</template>

<script>
import axios from "axios"
import moduleUserManagement from '@/store/user-management/moduleUserManagement.js'

export default {
  data() {
    return {
      user_data: null,
      user_not_found: false,
      hospital_not_found: false,
      hospital_data : {} ,
    }
  },
  computed: {
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
    confirmDeleteRecord() {
      this.$vs.dialog({
        type: 'confirm',
        color: 'danger',
        title: `Confirm Delete`,
        text: `You are about to delete "${this.hospital_data.name}"`,
        accept: this.deleteRecord,
        acceptText: "Delete"
      })
    },
    deleteRecord() {
      /* Below two lines are just for demo purpose */
      this.$router.push({name:'app-permission-list'});
      this.showDeleteSuccess()

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
