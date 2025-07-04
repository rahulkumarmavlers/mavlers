<section class="contact-section space-y">
  <div class="container">
    <div class="row">
      <!-- Left: Contact Info -->
      <div class="col-12 col-lg-4 contact-info mb-4 mb-md-0">
        <?php if ($title = get_sub_field('title')): ?>
          <h1><?php echo esc_html($title); ?></h1>
        <?php endif; ?>
        <div class="office-details mb-4">
          <?php if ($address_title = get_sub_field('address_title')): ?>
            <strong><?php echo esc_html($address_title); ?></strong><br>
          <?php endif; ?>
          <?php if ($address = get_sub_field('address')): ?>
            <div class="address"><?php echo $address; ?></div>
          <?php endif; ?>
        </div>
        <h5 class="contact-links">
          <?php if ($email = get_sub_field('email')): ?>
            <a href="mailto:<?php echo antispambot($email); ?>" class="email"><?php echo antispambot($email); ?></a><br>
          <?php endif; ?>
          <?php if ($phone = get_sub_field('contact_number')): ?>
            <a href="tel:<?php echo esc_attr($phone); ?>" class="phone"><?php echo esc_html($phone); ?></a>
          <?php endif; ?>
        </h5>
      </div>
      <!-- Right: Form -->
      <div class="col-12 col-lg-8 form-wrapper">
        <div class="form-intro-content">
          <?php if ($content = get_sub_field('content')): ?>
            <p><?php echo esc_html($content); ?></p>
          <?php endif; ?>
        </div>        
        <?php if( get_sub_field('form_shortcode') ) : ?>
          <div class="contact-from-wrap">
              <?php echo do_shortcode(get_sub_field('form_shortcode')); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>