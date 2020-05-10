<template>
  <section class="contact_form_area">
    <div class="contact_form_width">
      <h1 class="contact_map_title text-center">We're not putting on airs - our work is guaranteed to satisfy.</h1>
      <div id="map"></div>
    </div><!--end .contact_form_width-->
    <div class="contact_form_width contact-right">
      <div class="hero-title-with-shape">
        <h4 class="heading_with_border">Get a free quote</h4>
        <h1>To request a service call, please fill out the form below</h1>
      </div><!--end .hero-title-width-shape-->
      <form action="#" method="post">
        <input class="half_width input_m_right" type="text" name="fname" placeholder="Your name">
        <input class="half_width" type="EMAIL" name="email" placeholder="Email address">
        <input type="tel" name="tell" placeholder="Phone number">
        <span class="select_icon">
                <select name="select" id="select">
                    <option value="option0">Select Service</option>
                    <option value="option1">Service 1</option>
                    <option value="option2">Service 2</option>
                    <option value="option3">Service 3</option>
                    <option value="option4">Service 4</option>
                </select>
            </span>
        <button class="btn-yellow" value="SUBMIT NOW">SUBMIT NOW</button>
      </form>
    </div><!--end .contact_form_width-->
  </section>
</template>

<script>
    export default {
      name: "ContactHome"
    }
</script>

<style scoped>

</style>
