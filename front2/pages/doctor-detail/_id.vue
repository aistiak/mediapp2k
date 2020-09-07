<template>
  <div>
    <!-- <PageHeader title="Doctor Details" /> -->
    <!-- <no-ssr>
      <DoctorDetail :doctor_id="this.$route.params.id" />
    </no-ssr> -->
      <DoctorDetail :doctor_id="this.$route.params.id" />

  </div>
</template>
<script>
  import PageHeader from "~/components/PageHeader";
  import DoctorDetail from "~/components/DoctorDetail";
  export default {
    layout : 'layout1' ,
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
