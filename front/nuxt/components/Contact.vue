<template>
  <section class="contact_form_area contact_us section_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="contact-right contact_details">
            <div class="hero-title-with-shape">
              <h4 class="heading_with_border">Contact with us</h4>
              <h1>We offer 24/7 emergency service to all of our customers</h1>
            </div><!--end .hero-title-with-shape-->
            <p>There are many variations of passages of new lorem ipsum available, but the majority have suffered.</p>
            <div class="contact_location_box">
              <div class="contact_location_map">
                <span class="icon-location"></span>
                <p>66 broklyn street, <br>new york</p>
              </div><!--end .contact_location_map-->
              <div class="contact_location_map contact_location_call">
                <span class="icon-contact_call"></span>
                <p>help@loazzne.com <br>666 888 000</p>
              </div><!--end .contact_location_map .contact_location_call-->
            </div><!--end .contact_location_box-->
          </div><!--end .contact-right .contact_details-->
        </div><!--end .col-md-6-->
        <div class="col-md-6">
          <div class="contact-right contact-right-style-2 responsive_mt">
            <form action="#" method="post">
              <input class="half_width input_m_right" type="text" name="name" placeholder="Your name">
              <input class="half_width" type="EMAIL" name="email" placeholder="Email address">
              <input type="tel" name="tel" placeholder="Phone number">
              <textarea name="content" id="content" cols="20" rows="5" placeholder="Write message"></textarea>
              <button class="btn-yellow" value="SUBMIT NOW">SUBMIT NOW</button>
            </form>
          </div><!--end .contact-right .contact-right-style-2-->
        </div><!--end .col-md-6-->
      </div><!--end .row-->
    </div><!--end .container-->
  </section>
</template>

<script>
    export default {
      name: "Contact"
    }
</script>

<style scoped>

</style>
