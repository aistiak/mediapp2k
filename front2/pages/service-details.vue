<template>
  <div>
    <PageHeader title="Service Details" />
    <ServiceDetails />
    <Quote />
  </div>
</template>
<script>
  import PageHeader from "~/components/PageHeader";
  import ServiceDetails from "~/components/ServiceDetails";
  import Quote from "~/components/Quote";
  export default {
    components: {
      PageHeader,
      ServiceDetails,
      Quote
    },
    head(){
      return {
        title: "Loazzne | Service Details"
      }
    }
  }
</script>
