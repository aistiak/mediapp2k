<template>
    <div>
        <nuxt/>
    </div>
</template>
<script>
  import auth from "../auth/auth"
  export default {
    components: {

    },
    head(){
      return {
        title: "Loazzne - Vue Nuxt Heating & Air Conditioning Services Template"
      }
    },
    mounted () {
      auth.setUpAuth()
      
      this.$nextTick(() => {
        this.$nuxt.$loading.start()
        setTimeout(() => this.$nuxt.$loading.finish(), 500)
      })
    }
  }
</script>