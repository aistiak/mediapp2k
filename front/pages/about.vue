<template>
  <div>
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
      head(){
        return {
          title: "Loazzne | About"
        }
      }
    }
</script>

<style scoped>

</style>
