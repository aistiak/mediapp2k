<template>
  <div>
    <PageHeader title="Contact" />
    <Contact />
    <Map />
  </div>
</template>
<script>
  import PageHeader from "~/components/PageHeader";
  import Contact from "~/components/Contact";
  import Map from "~/components/Map";
  export default {
    components: {
      PageHeader,
      Contact,
      Map,
    },
    head(){
      return {
        title: "Loazzne | Contact"
      }
    }
  }
</script>
