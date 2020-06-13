<template>
  <div>
    <!-- <PageHeader title="Doctor Details" /> -->
    this is dotor detail page 
    <DoctorDetail :Doctor_id="this.$route.params.id" />
  </div>
</template>
<script>
  import PageHeader from "~/components/PageHeader";
  import DoctorDetail from "~/components/DoctorDetail";
  export default {
    components: {
      DoctorDetail,
      PageHeader
    },
    head(){
      return {
        title: "Mediapp | Doctor Details",
        
      }
    },
    mounted(){
      // this.getDoctroDetail()
    },

    methods :{
      // getDoctroDetail(){
      //   this.$store.dispatch(`fetch_doctor_detail`,this.$route.params.id).then( response => {
      //     alert(`success`)
      //   }).catch( error => {
      //     alert(`error`)
      //   })
      // }
    }
  }
</script>
