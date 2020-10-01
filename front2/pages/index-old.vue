<template>
  <div>
    <!-- <Slider /> -->
    <!-- <Features /> -->
    <!-- <Map /> -->
    <br>
    <br>
    <br>
    <br>
    <SearchBar/>
    <Hospitals/>
    
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
  import SearchBar from "~/components/SearchBar";
  import Map from "~/components/Map";
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
  import Hospitals from "~/components/Hospitals";
  import auth from "../auth/auth"
  import axios from "axios";
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
      SearchBar,
      Map,
      Hospitals ,

    },
    mounted(){
      // axios.get(`test`).then(response=>{
      //   alert( JSON.stringify(response.data))
      // })
      // alert(123)
      
    }
  }
</script>
