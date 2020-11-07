<template>
    <div>
       <vue-content-loading :width="300" :height="800">
        <rect x="0" y="0" rx="4" ry="4" width="90" height="100" />
        <rect x="110" y="0" rx="4" ry="4" width="90" height="100" />
        <rect x="210" y="0" rx="4" ry="4" width="90" height="100" />

        <rect x="0" y="110" rx="4" ry="4" width="90" height="100" />
        <rect x="110" y="110" rx="4" ry="4" width="90" height="100" />
        <rect x="210" y="110" rx="4" ry="4" width="90" height="100" />

        <rect x="0" y="220" rx="4" ry="4" width="90" height="100" />
        <rect x="110" y="220" rx="4" ry="4" width="90" height="100" />
        <rect x="210" y="220" rx="4" ry="4" width="90" height="100" />
      </vue-content-loading>       
    </div>
</template>
<script>
import VueContentLoading from "vue-content-loading"; 
export default {
    data(){
        return {

        }
    }
}
</script>