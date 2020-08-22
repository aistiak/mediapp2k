<template>
    <div>
        <nuxt/>
    </div>
</template>
<script>
  import auth from "../auth/auth"
  import {mapActions} from "vuex" 
  export default {
    components: {

    },
    head(){
      return {
        title: "Media App "
      }
    },
    mounted () {
      this.refreshAuth()
      // auth.setUpAuth()
      this.$nextTick(() => {
        this.$nuxt.$loading.start()
        setTimeout(() => this.$nuxt.$loading.finish(), 500)
      })
    },
    methods:{
      ...mapActions({
        'refreshAuth' : 'auth_patient/refreshAuth' ,
      }),
      setup: function() {
        this.refreshAuth()
        // this.login({
        //        access_token : localStorage.getItem(`token`)  ,
        //         expires_at : {
        //             date : localStorage.getItem('tokenExpiryKey') ,
        //         }          
        // });

      }
    }
  }
</script>