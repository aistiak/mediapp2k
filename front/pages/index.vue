<template>
  <div>
    <Slider />
    <Features />
    <About />
    <Services />
    <CallToAction />
    <Counter />
    <Gallery />
    <Testimonial />
    <Clients />
    <CallToActionTwo />
    <BlogHome />
    <ContactHome />
  </div>

</template>
<script>
  import Slider from "~/components/Slider";
  import Features from "~/components/Features";
  import About from "~/components/About";
  import Services from "~/components/Services";
  import CallToAction from "~/components/CallToAction";
  import Counter from "~/components/Counter";
  import Gallery from "~/components/Gallery";
  import Testimonial from "~/components/Testimonial";
  import Clients from "~/components/Clients";
  import CallToActionTwo from "~/components/CallToActionTwo";
  import BlogHome from "~/components/BlogHome";
  import ContactHome from "~/components/ContactHome";

  export default {
    components: {
      Slider,
      Features,
      About,
      Services,
      CallToAction,
      Counter,
      Gallery,
      Testimonial,
      Clients,
      CallToActionTwo,
      BlogHome,
      ContactHome,

    }
  }
</script>
