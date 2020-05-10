<template>
  <div>
    <PageHeader title="Blog Details" />
    <BlogDetails />
  </div>
</template>
<script>
  import PageHeader from "~/components/PageHeader";
  import BlogDetails from "~/components/BlogDetails";
  export default {
    components: {
      BlogDetails,
      PageHeader
    },
    head(){
      return {
        title: "Loazzne | Blog Details"
      }
    }
  }
</script>
