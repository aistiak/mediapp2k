<template>
  <div>
    <Header />
 
    <!-- <SearchBar/> -->
    <nuxt />
    <Footer />
  </div>
</template>

<script>
  import SearchBar from "~/components/SearchBar";
  import Header from "~/components/Header";
  import Footer from "~/components/Footer";
  import auth from  "../auth/auth"
  import axios from "axios"
  export default {
    components: {
      Footer,
      Header,
      SearchBar
    },
    head(){
      return {
        title: "Mediapp"
      }
    },
    mounted () {
      auth.setUpAuth() 
      this.$nextTick(() => {
        this.$nuxt.$loading.start()
        setTimeout(() => this.$nuxt.$loading.finish(), 500)
      })
    },
    
  }
</script>
<style>

</style>
