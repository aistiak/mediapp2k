<template>
  <div>
    <HeaderTwo />
    <nuxt />
    <Footer />
  </div>
</template>

<script>
  import HeaderTwo from "~/components/HeaderTwo";
  import Footer from "~/components/Footer";
  export default {
    components: {
      HeaderTwo,
      Footer
    },
    head(){
      return {
        title: "Loazzne - Vue Nuxt Heating & Air Conditioning Services Template"
      }
    },
    mounted () {
      this.$nextTick(() => {
        this.$nuxt.$loading.start()
        setTimeout(() => this.$nuxt.$loading.finish(), 500)
      })
    }
  }
</script>
<style>

</style>
