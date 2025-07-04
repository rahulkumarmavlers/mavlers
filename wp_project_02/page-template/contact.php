<?php
/**
 * Template Name: Contact Layout Template
 */
get_header(); ?>

<section class="contact-section space-y">
  <div class="container">
    <div class="row">
      <!-- Left: Contact Info -->
      <div class="col-12 col-md-4 contact-info mb-4 mb-md-0">
        <h1>Contact</h1>
        <div class="office-details mb-4">
          <strong>Main office</strong><br>
          <a target="_blank" href="https://www.google.co.in/maps/place/Lorem+Ipsum+Corp/@51.5215257,-0.1446669,17z/data=!3m2!4b1!5s0x487ac7c89d9c873f:0x5ce56fbb6266449c!4m6!3m5!1s0x48761ad63dfdab65:0x816ac5f19ffaca39!8m2!3d51.5215224!4d-0.142092!16s%2Fg%2F11g9jnhq3d?entry=ttu&g_ep=EgoyMDI1MDUyMS4wIKXMDSoJLDEwMjExNDUzSAFQAw%3D%3D">
            10 Lorem Ipsum, London,<br>
            United Kingdom, WC1N 3NB
          </a>
        </div>
        <h5 class="contact-links">
          <a href="mailto:contact@loremipsum.com" class="email">contact@loremipsum.com</a><br>
          <a href="tel:+441234567890" class="phone">+44 (0) 123 456 7890</a>
        </h5>
      </div>
      <!-- Right: Form -->
      <div class="col-12 col-md-8 form-wrapper">
        <div class="form-intro-content">
          <p>Lorem ipsum dolor sit amet, consectetur sit amet adipiscing elit, Lorem ipsum dolor sit amet, consectetur adipiscing dolor sit amet, consectetur sit amet adipiscing. Lorem ipsum dolor sit amet, consectetur sit amet adipiscing elit.</p>
        </div>
        
        <div class="contact-from-wrap">
          <?php echo do_shortcode('[gravityform id="4" title="true"]');?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>