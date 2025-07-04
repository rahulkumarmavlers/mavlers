<section class="service-list-row-sec">
    <div class="container">
        <div class="service-list-main">
            <?php if( have_rows('image_content') ): ?>
                <?php while( have_rows('image_content') ): the_row(); ?>
                    <div class="service-list-item">
                        <div class="service-list-row c-row">
                            <?php if( get_sub_field('content') ): ?>
                                <div class="service-list-col service-list-content-col c-col">
                                    <div class="service-list-content" data-aos="fade-up">
                                        <?php the_sub_field('content'); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if( $image = get_sub_field('image') ): ?>
                                <div class="service-list-col service-list-img-col c-col">
                                    <div class="service-list-img" data-aos="fade-up">
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>