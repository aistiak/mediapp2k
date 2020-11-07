<template>
  <section class="service_benefits_area text-center section_border section_padding" id="benifits">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- <div class="hero-section-title">
            <h1>Our benefits</h1>
          </div> -->
          <!--end .hero-section-title-->
        </div><!--end .col-md-12-->
        <div class="col-md-3 col-sm-6">
          <div class="service_benefits_box">
            <i class="icon-big_clock"></i>
            <h3>Emergency Service</h3>
            <p>There are many passages of lorem ipsum available but the majority have alteration.</p>
          </div><!--end .service_benefits_box-->
        </div><!--end col-md-3-->
        <div class="col-md-3 col-sm-6">
          <div class="service_benefits_box">
            <i class="icon-wallet"></i>
            <h3>No Upfront Payment</h3>
            <p>There are many passages of lorem ipsum available but the majority have alteration.</p>
          </div><!--end .service_benefits_box-->
        </div><!--end col-md-3-->
        <div class="col-md-3 col-sm-6">
          <div class="service_benefits_box">
            <i class="icon-diploma"></i>
            <h3>Satisfaction Guarantee</h3>
            <p>There are many passages of lorem ipsum available but the majority have alteration.</p>
          </div><!--end .service_benefits_box-->
        </div><!--end col-md-3-->
        <div class="col-md-3 col-sm-6">
          <div class="service_benefits_box">
            <i class="icon-mechanic"></i>
            <h3>8 Years Experience</h3>
            <p>There are many passages of lorem ipsum available but the majority have alteration.</p>
          </div><!--end .service_benefits_box-->
        </div><!--end col-md-3-->
      </div><!--end .row-->
    </div><!--end .container-->
  </section>
</template>

<script>
    export default {
      name: "Benefits" ,
      props: ['observer'] ,
      data(){
        return {

        }
      },
      mounted(){

        if(this.observer)
           this.observer.observe(this.$el)
      },
      methods:{
 
      }
    }
</script>

<style scoped>
.service_benefits_box {
  background-color:  white ;
}
.service_benefits_box {
    box-shadow: 5px 5px 5px;
    border: 2px solid;
}
.service_benefits_box:hover {
  box-shadow: 10px 10px 10px ;
}
</style>
