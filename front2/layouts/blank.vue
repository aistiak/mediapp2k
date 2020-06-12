<template>
    <div>
        <nuxt/>
    </div>
</template>
<script>

  export default {
    components: {

    },
    head(){
      return {
        title: "Loazzne - Vue Nuxt Heating & Air Conditioning Services Template"
      }
    },
    mounted () {
      this.$nextTick(() => {
        this.$nuxt.$loading.start()
        setTimeout(() => this.$nuxt.$loading.finish(), 500)
      })
    }
  }
</script>