<template>
  <section class="testimonial_area text-center section_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="testimonial_slider owl-carousel">
            <div class="testimonial_details">
              <p>This is due to their excellent service, competitive pricing and customer support . It's throughly refresing to get such a personal touch.</p>
              <h4>Jim Doe</h4>
              <span>Director</span>
            </div><!--end .testimonial_details-->
            <div class="testimonial_details">
              <p>This is due to their excellent service, competitive pricing and customer support . It's throughly refresing to get such a personal touch.</p>
              <h4>Mark Doe</h4>
              <span>Developer</span>
            </div><!--end .testimonial_details-->
            <div class="testimonial_details">
              <p>This is due to their excellent service, competitive pricing and customer support . It's throughly refresing to get such a personal touch.</p>
              <h4>Shirley Smith</h4>
              <span>Director</span>
            </div><!--end .testimonial_details-->
          </div><!--end .testimonial_slider-->
        </div><!--end .col-md-8-->
      </div><!--end .row-->
    </div><!--end .container-->
    <h1 class="testimonial_heading_shape">Testimonials</h1>
  </section>
</template>

<script>
    export default {
      name: "Testimonial",
      mounted() {
        $('.testimonial_slider').owlCarousel({
          items: 1,
          autoHeight: true,
          autoplay: true,
          loop: true,
          nav: true,
          navText: ["<i class='fa fa-angle-left'>", "<i class='fa fa-angle-right'>"],
          dots: true,
          thumbs: true,
          thumbsPrerendered: true,
          animateOut: 'slideOutDown',
          animateIn: 'slideInDown'
        });
      }
    }
</script>

<style scoped>

</style>
