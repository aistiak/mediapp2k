<template>
  <div>
    <SliderTwo />
    <AboutTwo />
    <Clients />
    <Services />
    <Team />
    <Testimonial />
    <ServicesTwo />
    <Promotion />
    <BlogHome />
    <Quote />
    <CallToAction />

  </div>
</template>
<script>
  import SliderTwo from "~/components/SliderTwo";
  import AboutTwo from "~/components/AboutTwo";
  import Clients from "~/components/Clients";
  import Services from "~/components/Services";
  import Team from "~/components/Team";
  import Testimonial from "~/components/Testimonial";
  import ServicesTwo from "~/components/ServicesTwo";
  import BlogHome from "~/components/BlogHome";
  import Quote from "~/components/Quote";
  import CallToAction from "~/components/CallToAction";
  import Promotion from "~/components/Promotion";
  export default {
    components: {
      SliderTwo,
      AboutTwo,
      Clients,
      Services,
      Team,
      Testimonial,
      ServicesTwo,
      Promotion,
      BlogHome,
      Quote,
      CallToAction,

    },

    //Layout for Home 2
    layout: 'home2',
    head(){
      return {
        title: "Loazzne | Home 2"
      }
    }
  }
</script>
