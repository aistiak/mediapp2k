<template>
  <div>
    <!-- <PageHeader title="Hospital Details" /> -->
    
    <HospitalDetail :hospital_id="this.$route.params.id" />
  </div>
</template>
<script>
  import PageHeader from "~/components/PageHeader";
  import HospitalDetail from "~/components/HospitalDetail";
  export default {
    layout : 'layout1' ,
    components: {
      HospitalDetail,
      PageHeader
    },
    head(){
      return {
        title: "Loazzne | Blog Details"
      }
    }
  }
</script>
