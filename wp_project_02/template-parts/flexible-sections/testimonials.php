<section class="testimonials-section space-y">
    <div class="bg-media" style="background-image: url(<?php echo get_sub_field('background_image') ? get_sub_field('background_image') : ''; ?>);"></div>
    <div class="container">
        <div class="row align-items-center">            
            <div class="col-12 col-lg-6 ms-auto" data-aos="fade-left">
                <div class="testimonial-box">
                    <div class="testimonials-slider">
                        <?php if(have_rows('testimonials')): ?>
                            <?php while(have_rows('testimonials')): the_row(); ?>
                                <div class="testimonial-slide">
                                    <div class="card-testimonial">
                                        <div class="stars-wrap">
                                            <?php for($i = 0; $i < get_sub_field('rating'); $i++): ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star-icon.svg" alt="">
                                            <?php endfor; ?>
                                        </div>
                                        <div class="testimonial-text">
                                            <h4><?php echo get_sub_field('content'); ?></h4>
                                        </div>
                                        <?php if( get_sub_field('author_name') || get_sub_field('designation') ) : ?>
                                            <div class="author-info">
                                                <?php if( get_sub_field('author_name') ) : ?>
                                                    <p class="testimonial-author"><strong><?php echo get_sub_field('author_name'); ?></strong></p>
                                                <?php endif; ?>
                                                <?php if( get_sub_field('designation') ) : ?>
                                                    <p class="testimonial-title"><?php echo get_sub_field('designation'); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <?php if( have_rows('testimonials') ) : ?>
                        <div class="slider-controls justify-content-between align-items-center">
                            <div class="slider-nav d-flex gap-3">
                                <button class="testimonial-prev btn btn-primary"><i class="fa-solid fa-arrow-left"></i></button>
                                <button class="testimonial-next btn btn-primary"><i class="fa-solid fa-arrow-right"></i></button>
                            </div>
                            <div class="slider-counter">
                                <span class="current-slide">1</span> / <span class="total-slides"></span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>