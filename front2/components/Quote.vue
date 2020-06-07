<template>
  <section class="contact_form_area ctf_gray section_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="contact-right contact_details">
            <div class="hero-title-with-shape">
              <h4 class="heading_with_border">Get a free quote</h4>
              <h1>To request a service call, please fill out the form below</h1>
            </div>
            <p>There are many variations of passages of new lorem ipsum available, but the majority have suffered alteration in some form by injected humour, or randomised words which don't look even slightly believable.</p>
          </div><!--end .contact_right-->
        </div><!--end .col-md-6-->
        <div class="col-md-6">
          <div class="contact-right contact-right-style-2">
            <form action="#" method="post">
              <input type="text" placeholder="Your name" class="half_width input_m_right">
              <input type="EMAIL" placeholder="Email Address" class="half_width">
              <input type="tel" placeholder="Phone Number">
              <span class="select_icon">
                            <select name="select" id="select">
                                <option value="option0">Select Service</option>
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                                <option value="option4">Option 4</option>
                            </select>
                        </span>
              <button class="btn-yellow" value="SUBMIT NOW">SUBMIT NOW</button>
            </form>
          </div><!--end .contact_right-->
        </div><!--end .col-md-6-->
      </div><!--end .row-->
    </div><!--end .container-->
  </section>
</template>

<script>
    export default {
      name: "Quote"
    }
</script>

<style scoped>

</style>
