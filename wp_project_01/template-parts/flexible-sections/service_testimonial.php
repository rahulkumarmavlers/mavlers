<section class="service-testimonial-sec">
    <div class="container">
        <div class="service-testimonial-row c-cow">
            <div class="service-testimonial-img-col service-testimonial-col c-col">
                <div class="service-testimonial-img" data-aos="fade-up">
                    <?php 
                    $image = get_sub_field('author_image');
                    if($image): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <div class="service-testimonial-content-col service-testimonial-col c-col">
                <div class="service-testimonial-content" data-aos="fade-up">
                    <?php if(get_sub_field('testimonial_content')): ?>
                        <blockquote>“<?php echo get_sub_field('testimonial_content'); ?>”</blockquote>
                    <?php endif; ?>
                    <?php if(get_sub_field('author_name')): ?>
                        <span class="service-testimonial-name"><?php echo get_sub_field('author_name'); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>