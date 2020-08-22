<template>
  <section class="breadcrumb_section text-center section_padding">
    <ul class="breadcrumb">
      <li><nuxt-link to="/">Home</nuxt-link></li>

      <li> {{ title }}</li>
    </ul>
    <h1>{{ title }}</h1>
  </section>
</template>

<script>
    export default {
      name: "PageHeader",
      props: {
        title: {
          type: String
        }
      }
    }
</script>

<style scoped>

</style>
