<template>
  <section class="header_slider_area owl-carousel">
    <div class="header_slider_bg">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p><span class="subtitle_number">01</span> Reliable Air Conditioning</p>
            <h1>Installation Services &amp; Repair</h1>
            <div class="slide_button">
              <a href="#" class="btn-yellow">GET A FREE QUOTE</a>
            </div><!--end .slide_button-->
          </div><!--end .col-md-6-->
        </div><!--end .row-->
      </div><!--end .container-->
    </div><!--end .header_slider_bg-->
    <div class="header_slider_bg slider_bg2">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p><span class="subtitle_number">02</span> Choos the Best Company</p>
            <h1>Heating and Air Conditioning Specialist</h1>
            <div class="slide_button">
              <a href="#" class="btn-yellow">GET A FREE QUOTE</a>
            </div><!--end .slide_button-->
          </div><!--end .col-md-6-->
        </div><!--end .row-->
      </div><!--end .container-->
    </div><!--end .header_slider_bg-->
    <div class="header_slider_bg slider_bg3">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p><span class="subtitle_number">03</span> Quality that is Guaranteed</p>
            <h1>Expert Repair Ac and Heating Services</h1>
            <div class="slide_button">
              <a href="#" class="btn-yellow">GET A FREE QUOTE</a>
            </div><!--end .slide_button-->
          </div><!--end .col-md-6-->
        </div><!--end .row-->
      </div><!--end .container-->
    </div><!--end .header_slider_bg-->
  </section>
</template>

<script>
    export default {
      name: "Slider",
      mounted() {
        $('.header_slider_area').owlCarousel({
          items: 1,
          autoHeight: true,
          autoplay: true,
          loop: true,
          nav: false,
          dots: true,
          slideSpeed: 300,
          animateIn: 'slideInLeft',
          animateOut: 'fadeOutRight',
          autoplayTimeout: 7000,
        });
      }
    }
</script>

<style scoped>

</style>
