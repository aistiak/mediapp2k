<template>
    <div class="container-fluid">
        <div class="row"> 
              <div class="col-md-2" style="border:solid 1px">
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">Hospital</option>
                        <option value="2">Doctor</option>
                        <!-- <option value="3">Three</option> -->
                    </select>
              </div>  
              <div class="col-md-3" style="border:solid 1px" >
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Divsion...</option>
                        <option value="1">Dhaka</option>
                        <option value="2">Tanail</option>
                    </select>
              </div>  
              <div class="col-md-3" style="border:solid 1px" >
                     <select class="custom-select" id="inputGroupSelect01">
                        <option selected>District...</option>
                        <option value="1">Dhaka</option>
                        <option value="2">Tanail</option>
                    </select>                 
              </div>  
              <div class="col-md-3" style="border:solid 1px">
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Subdistrict...</option>
                        <option value="1">Dhaka</option>
                        <option value="2">Tanail</option>
                    </select>              
              </div>  
              <div class="col-md-1" style="border:solid 1px">
                  <span class="pull-right">
                    <i class="fas fa-search"></i>
                  </span>
              </div>  
        </div>    
    </div>
</template>

<script>
export default {
   name: 'SearchBar'
}
</script>
<style scoped>
   .container {
       ;
   }
</style>