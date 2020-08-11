<template>
  <div>
    {{data}}
    <PageHeader title="About" />
    <AboutThree />
    <Promotion />
    <ServicesTwo />
    <Testimonial />
    <Team />
    <div class="section_border"></div>
    <Clients />
  </div>

</template>

<script>
    import PageHeader from "~/components/PageHeader";
    import AboutThree from "~/components/AboutThree";
    import ServicesTwo from "~/components/ServicesTwo";
    import Testimonial from "~/components/Testimonial";
    import Team from "~/components/Team";
    import Clients from "~/components/Clients";
    import Promotion from "~/components/Promotion";
    import axios from "axios"
    export default {
      components: {
        PageHeader,
        AboutThree,
        ServicesTwo,
        Testimonial,
        Team,
        Clients,
        Promotion
      },
      data() {
        return {
          data : `hello` 
        }
      },
      head(){
        return {
          title: "Loazzne | About"
        }
      },
      mounted(){
          this.$axios.get(`api/frontend/hospital/`).then(response => {
            this.data = response.data
          }).catch( error => {
            alert(`error in about`)
          })
      },
    }
</script>

<style scoped>

</style>
