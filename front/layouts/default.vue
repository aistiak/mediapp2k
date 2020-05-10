<template>
  <div>
    <Header />
    <nuxt />
    <Footer />
  </div>
</template>

<script>
  import Header from "~/components/Header";
  import Footer from "~/components/Footer";
  export default {
    components: {
      Footer,
      Header
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
