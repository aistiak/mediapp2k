<!-- =========================================================================================
  File Name: UserEditTabInformation.vue
  Description: User Edit Information Tab content
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->

<template>
  <div id="user-edit-tab-info">
    <!-- {{data}} -->
    <!-- Avatar Row -->
    <div class="vx-row">
      <div class="vx-col w-full">
        <div class="flex items-start flex-col sm:flex-row">
          <!-- <img :src="data[`avatar`]" class="mr-8 rounded h-24 w-24" /> -->
          <!-- <vs-avatar :src="data.avatar" size="80px" class="mr-4" /> -->
          <div>
            <p class="text-lg font-medium mb-2 mt-4 sm:mt-0">{{ data.name }}</p>
            <!-- <input type="file" class="hidden" ref="update_avatar_input" @change="update_avatar" accept="image/*"> -->

            <!-- Toggle comment of below buttons as one for actual flow & currently shown is only for demo -->
            <!-- <vs-button class="mr-4 mb-4">Change Avatar</vs-button> -->
            <!-- <vs-button type="border" class="mr-4" @click="$refs.update_avatar_input.click()">Change Avatar</vs-button> -->

            <!-- <vs-button type="border" color="danger">Remove Avatar</vs-button> -->
          </div>
        </div>
      </div>
    </div>

    <!-- Content Row -->
    <div class="vx-row">
      <div class="vx-col md:w-1/2 w-full">
        <!-- <vs-input class="w-full mt-4" label="Username" v-model="data[`username`]" v-validate="'required|alpha_num'" name="username" />
        <span class="text-danger text-sm"  v-show="errors.has('username')">{{ errors.first('username') }}</span> -->

        <!-- <vs-input class="w-full mt-4" label="Name" v-model="data[`name`]" v-validate="'required|alpha_spaces'" name="name" />
        <span class="text-danger text-sm"  v-show="errors.has('name')">{{ errors.first('name') }}</span> -->

        <!-- <vs-input class="w-full mt-4" label="Email" v-model="data[`email`]" type="email" v-validate="'required|email'" name="email" />
        <span class="text-danger text-sm"  v-show="errors.has('email')">{{ errors.first('email') }}</span> -->
      </div>

      <!-- <div class="vx-col md:w-1/2 w-full">

        <div class="mt-4">
          <label class="vs-input--label">Status</label>
          <v-select v-model="status_local" :clearable="false" :options="statusOptions" v-validate="'required'" name="status" :dir="$vs.rtl ? 'rtl' : 'ltr'" />
          <span class="text-danger text-sm"  v-show="errors.has('status')">{{ errors.first('status') }}</span>
        </div>

        <div class="mt-4">
          <label class="vs-input--label">Role</label>
          <v-select v-model="role_local" :clearable="false" :options="roleOptions" v-validate="'required'" name="role" :dir="$vs.rtl ? 'rtl' : 'ltr'" />
          <span class="text-danger text-sm"  v-show="errors.has('role')">{{ errors.first('role') }}</span>
        </div>

        <vs-input class="w-full mt-4" label="Company" v-model="data_local.company" v-validate="'alpha_spaces'" name="company" />
        <span class="text-danger text-sm"  v-show="errors.has('company')">{{ errors.first('company') }}</span>

      </div> -->
    </div>

    <!-- Permissions -->
      <vx-card class="mt-base" no-shadow card-border>

        <div class="vx-row">
          <div class="vx-col w-full">
            <div class="flex items-end px-3">
              <feather-icon svgClasses="w-6 h-6" icon="LockIcon" class="mr-2" />
              <span class="font-medium text-lg leading-none">Permissions </span>
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
                <vs-checkbox v-model="role_data.permission[`${v}_${v2}`]"  />
              </td>
            </tr>
          </table>
        </div>
        <!-- <vs-button type="filled"  class="mt-5 block" @click="submit">Submit</vs-button> -->
      </vx-card>

    <!-- Save & Reset Button -->
    <div class="vx-row">
      <div class="vx-col w-full">
        <div class="mt-8 flex flex-wrap items-center justify-end">
          <vs-button class="ml-auto mt-2" @click="submit" :disabled="!validateForm">Save Changes</vs-button>
          <!-- <vs-button class="ml-4 mt-2" type="border" color="warning" @click="reset_data">Reset</vs-button> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import vSelect from 'vue-select'
import {mapGetters} from "vuex"
export default {
  components: {
    vSelect
  },
  props: {
    data: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      role_not_found : false ,
      role_data: {} ,
      permitted_modules : [`user`,`hospital`,`role`] ,
      permitted_permission :[`view` , `viewall` , `create` , `update` , `update all` , `delete` , `delete all`],
      temp : [],
      activeTab: 0,
      data_local: JSON.parse(JSON.stringify(this.data)),

      statusOptions: [
        { label: "Active",  value: "active" },
        { label: "Blocked",  value: "blocked" },
        { label: "Deactivated",  value: "deactivated" },
      ],
      roleOptions: [
        { label: "Admin",  value: "admin" },
        { label: "User",  value: "user" },
        { label: "Staff",  value: "staff" },
      ],
    }
  },
  computed: {
    ...mapGetters([`roles`]),
    status_local: {
      get() {
        return { label: this.capitalize(this.data_local.status),  value: this.data_local.status  }
      },
      set(obj) {
        this.data_local.status = obj.value
      }
    },
    role_local: {
      get() {
        return { label: this.capitalize(this.data_local.role),  value: this.data_local.role  }
      },
      set(obj) {
        this.data_local.role = obj.value
      }
    },
    validateForm() {
      return !this.errors.any()
    }
  },
  mounted(){
    this.getRole()
  },
  methods: {
    submit(){
      this.$vs.loading()
      let payload = {
        ...this.role_data.permission,
        id : this.role_data.id ,
        name : this.role_data.name, 
      }
      // if uppdate action then add id 
      // payload[`id`] = this.role_data.id 
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
        //  console.log(this.role_data.permission[`${x}_${z}`] )
        //      if(this.role_data.permission[`${x}_${z}`] == undefined )
        //         this.role_data.permission[`${x}_${z}`] = false 
          })
      });
    },   

    capitalize(str) {
      if (str == undefined) return ``
      return str.slice(0,1).toUpperCase() + str.slice(1,str.length)
    },
    save_changes() {
      if(!this.validateForm) return

      // Here will go your API call for updating data
      // You can get data in "this.data_local"

    },
    reset_data() {
      this.data_local = JSON.parse(JSON.stringify(this.data))
    },
    update_avatar() {
      // You can update avatar Here
      // For reference you can check dataList example
      // We haven't integrated it here, because data isn't saved in DB
    }
  },
}
</script>
