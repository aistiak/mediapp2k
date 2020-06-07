<template>
  <div>
    <PageHeader title="Services" />
    <ServicesThree />
    <Services />
    <Benefits />
    <Clients />
  </div>
</template>
<script>
  import PageHeader from "~/components/PageHeader";
  import ServicesThree from "~/components/ServicesThree";
  import Services from "~/components/Services";
  import Benefits from "~/components/Benefits";
  import Clients from "~/components/Clients";
  export default {
    components: {
      PageHeader,
      ServicesThree,
      Services,
      Benefits,
      Clients
    },
    head(){
      return {
        title: "Loazzne | Services"
      }
    }
  }
</script>
