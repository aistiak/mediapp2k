<template>
  <div class="clients_logo_area text-center section_padding">
    <div class="container">
      <div class="row">
        <div class="clients_logo owl-carousel">
          <div class="item">
            <img src="/assets/images/client-logo.png" alt="Clients Logos">
          </div><!--end .item-->
          <div class="item">
            <img src="/assets/images/client-logo.png" alt="Clients Logos">
          </div><!--end .item-->
          <div class="item">
            <img src="/assets/images/client-logo.png" alt="Clients Logos">
          </div><!--end .item-->
          <div class="item">
            <img src="/assets/images/client-logo.png" alt="Clients Logos">
          </div><!--end .item-->
          <div class="item">
            <img src="/assets/images/client-logo.png" alt="Clients Logos">
          </div><!--end .item-->
          <div class="item">
            <img src="/assets/images/client-logo.png" alt="Clients Logos">
          </div><!--end .item-->
          <div class="item">
            <img src="/assets/images/client-logo.png" alt="Clients Logos">
          </div><!--end .item-->
          <div class="item">
            <img src="/assets/images/client-logo.png" alt="Clients Logos">
          </div><!--end .item-->
          <div class="item">
            <img src="/assets/images/client-logo.png" alt="Clients Logos">
          </div><!--end .item-->
        </div><!--end .clients_logo-->
      </div><!--end .row-->
    </div><!--end .container-->
  </div>
</template>

<script>
    export default {
      name: "Clients",
      mounted() {
        $('.clients_logo').owlCarousel({
          autoHeight: true,
          autoplay: true,
          loop: true,
          nav: false,
          autoplayTimeout: 3000,
          dots: false,
          responsive: {
            0: {
              items: 2,
            },
            600: {
              items: 3,
            },
            1000: {
              items: 5,
            }
          }
        });
      }
    }
</script>

<style scoped>

</style>
