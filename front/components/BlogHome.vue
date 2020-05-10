<template>
  <section class="blog_share_area section_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="hero-section-title text-center">
            <h1>Our latest news</h1>
          </div><!--end .hero-section-title-->
        </div><!--end .col-md-12-->
        <div class="col-md-4 col-sm-6">
          <div class="blog_share_box">
            <div class="bl_share_img">
              <img src="/assets/images/blog/blog-1.jpg" alt="blog 1">
              <span class="blog_date">07 Nov</span>
            </div><!--end .bl_share_img-->
            <div class="blog_share_details">
              <span class="comment_author">by <a href="#">admin</a> - <a href="#">3 Comments</a></span>
              <h1><nuxt-link to="/blog-details">How does a ductless heat pump work?</nuxt-link></h1>
              <p>There are many variations passages of lorem ipsum available but the majority have suffered alteration.</p>
            </div><!--end .blog_share_details-->
          </div><!--end .blog_share_box-->
        </div><!--end .col-md-4-->
        <div class="col-md-4 col-sm-6">
          <div class="blog_share_box">
            <div class="bl_share_img">
              <img src="/assets/images/blog/blog-2.jpg" alt="blog 2">
              <span class="blog_date">26 Oct</span>
            </div><!--end .bl_share_img-->
            <div class="blog_share_details">
              <span class="comment_author">by <a href="#">admin</a> - <a href="#">3 Comments</a></span>
              <h1><nuxt-link to="/blog-details">Simple hack to improve A/C efficiency</nuxt-link></h1>
              <p>There are many variations passages of lorem ipsum available but the majority have suffered alteration.</p>
            </div><!--end .blog_share_details-->
          </div><!--end .blog_share_box-->
        </div><!--end .col-md-4-->
        <div class="col-md-4 col-sm-6">
          <div class="blog_share_box">
            <div class="bl_share_img">
              <img src="/assets/images/blog/blog-3.jpg" alt="blog 3">
              <span class="blog_date">20 Oct</span>
            </div><!--end .bl_share_img-->
            <div class="blog_share_details">
              <span class="comment_author">by <a href="#">admin</a> - <a href="#">3 Comments</a></span>
              <h1><nuxt-link to="/blog-details">Preparing your home before vacation</nuxt-link></h1>
              <p>There are many variations passages of lorem ipsum available but the majority have suffered alteration.</p>
            </div><!--end .blog_share_details-->
          </div><!--end .blog_share_box-->
        </div><!--end .col-md-4-->
      </div><!--end .row-->
    </div><!--end .container-->
  </section>
</template>

<script>
    export default {
      name: "BlogHome"
    }
</script>

<style scoped>

</style>
