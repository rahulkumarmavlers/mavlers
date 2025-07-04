<section class="contact-form">
    <div class="container">
        <div class="row-wrap contact-form-wrap">
            <div class="box-12 box-lg-6 content-wrap" data-aos="fade-up">
                <div class="inner-wrap">
                    <?php if( get_sub_field('contact_us_title') ) : ?>
                        <h2><?php echo get_sub_field('contact_us_title'); ?></h2>
                    <?php endif; ?>
                    <?php if ( have_rows('office_locations') ) : ?>                    
                        <?php while( have_rows('office_locations') ) : the_row(); ?>
                            <address>
                                <div class="inner">
                                    <?php if( get_sub_field('title') ) : ?><strong><?php echo get_sub_field('title'); ?></strong><?php endif; ?>
                                    <?php if( get_sub_field('address') ) : ?><p><?php echo get_sub_field('address'); ?></p><?php endif; ?>
                                    <?php if( get_sub_field('telephone') ) : $phone_number = preg_replace('/[^0-9+]/', '', get_sub_field('telephone')); ?>
                                        <p>Telephone: <a href="tel:+<?php echo esc_attr($phone_number);?>"><?php echo get_sub_field('telephone'); ?></a></p>
                                    <?php endif; ?>
                                    <?php if( get_sub_field('email') ) : ?><p><strong>Email:</strong> <?php echo get_sanitized_email_link(get_sub_field('email'));?></p><?php endif; ?>
                                </div>
                            </address>
                        <?php endwhile; ?>                    
                    <?php endif; ?>                    
                    <?php if ( get_field('social_links_title', 'option') ) : ?>
                        <div class="icon-wrap social-wrap"><?php echo do_shortcode('[sociallinks]');?></div>
					<?php endif; ?>                    
                </div>
            </div>
            <?php if( get_sub_field('form_shortcode') ) : ?>
                <div class="box-12 box-lg-6 form-wrap" data-aos="fade-up" data-aos-delay="200">
                    <div class="inner-wrap">
                        <?php echo do_shortcode(get_sub_field('form_shortcode')); ?>
                    </div>
                </div>                
            <?php endif; ?>
        </div>
    </div>
</section>