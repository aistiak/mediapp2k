<template>
  <div>
    <SearchBar/> 
    <Header /> 
    <nuxt />
    <Footer />
  </div>
</template>

<script>
  import SearchBar from "~/components/SearchBar";
  import Header from "~/components/Header";
  import Footer from "~/components/Footer";
  
  export default {
    components: {
      Footer,
      Header,
      SearchBar
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

      // axios.get(`http://127.0.0.1:8000/test`).then( response =>{
      //   alert(response.data)
      // }).catch(error=>{
      //   alert(`error`)
      // })  
    }
  }
</script>
<style>

</style>
