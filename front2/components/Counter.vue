<template>
  <section class="counterup_area text-center section_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="hero-section-title text-center">
            <h1>Numbers Speakers.</h1>
          </div><!--end .hero-section-title-->
        </div><!--end .col-md-12-->
        <div class="col-md-4 col-sm-6">
          <div class="counter_box">
            <img src="/assets/images/shape/about-shape.png" class="number_img_shape" alt="Shape">
            <span class="counter">8870</span>
            <p>Air Conditioning Repairs and Install</p>
          </div><!--end .counter_box-->
        </div><!--end .col-md-4-->
        <div class="col-md-4 col-sm-6">
          <div class="counter_box">
            <img src="/assets/images/shape/about-shape.png" class="number_img_shape" alt="Shape">
            <span class="counter">4760</span>
            <p>Air Conditioning Repairs and Install</p>
          </div><!--end .counter_box-->
        </div><!--end .col-md-4-->
        <div class="col-md-4 col-sm-6">
          <div class="counter_box">
            <img src="/assets/images/shape/about-shape.png" class="number_img_shape" alt="Shape">
            <span class="counter">9032</span>
            <p>Customizers are Satisfied with our Services</p>
          </div><!--end .counter_box-->
        </div><!--end .col-md-4-->
      </div><!--end .row-->
    </div><!--end .container-->
  </section>
</template>

<script>
    export default {
      name: "Counter",
      mounted() {
        $('.counter').counterUp({
          delay: 10,
          time: 3000
        });
      }
    }
</script>

<style scoped>

</style>
