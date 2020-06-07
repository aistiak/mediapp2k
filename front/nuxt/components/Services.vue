<template>
  <section class="service_area section_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="hero-section-title text-center">
            <h1>Our services</h1>
          </div><!--end .hero-section-title-->
        </div><!--end .col-md-12-->
        <div class="col-md-4 col-sm-6">
          <div class="service_box">
            <div class="service_img">
              <img src="/assets/images/services/service-1.jpg" alt="service 1">
              <div class="icon-box">
                <i class="icon-snow"></i>
              </div><!-- /.icon-box -->
            </div><!--end .service_img-->
            <div class="service_details">
              <nuxt-link to="/service-details"><h2>Cooling Services</h2></nuxt-link>
              <p>
                There are many variations passages of lorem ipsum available but the majority have suffered alteration.
              </p>
              <nuxt-link to="/service-details" class="btn-yellow">LEARN MORE</nuxt-link>
            </div><!--end .service_details-->
          </div><!--end .service_box-->
        </div><!--end .col-md-4-->
        <div class="col-md-4 col-sm-6">
          <div class="service_box">
            <div class="service_img">
              <img src="/assets/images/services/service-2.jpg" alt="service 2">
              <div class="icon-box">
                <i class="icon-fire"></i>
              </div><!-- /.icon-box -->
            </div><!--end .service_img-->
            <div class="service_details">
              <nuxt-link to="/service-details"><h2>Heating Services</h2></nuxt-link>
              <p>
                There are many variations passages of lorem ipsum available but the majority have suffered alteration.
              </p>
              <nuxt-link to="/service-details" class="btn-yellow">LEARN MORE</nuxt-link>
            </div><!--end .service_details-->
          </div><!--end .service_box-->
        </div><!--end .col-md-4-->
        <div class="col-md-4 col-sm-6">
          <div class="service_box">
            <div class="service_img">
              <img src="/assets/images/services/service-3.jpg" alt="service 3">
              <div class="icon-box">
                <i class="icon-ac"></i>
              </div><!-- /.icon-box -->
            </div><!--end .service_img-->
            <div class="service_details">
              <nuxt-link to="/service-details"><h2>Other Services</h2></nuxt-link>
              <p>
                There are many variations passages of lorem ipsum available but the majority have suffered alteration.
              </p>
              <nuxt-link to="/service-details" class="btn-yellow">LEARN MORE</nuxt-link>
            </div><!--end .service_details-->
          </div><!--end .service_box-->
        </div><!--end .col-md-4-->
      </div><!--end .row-->
    </div><!--end .container-->
  </section>
</template>

<script>
    export default {
      name: "Services"
    }
</script>

<style scoped>

</style>
