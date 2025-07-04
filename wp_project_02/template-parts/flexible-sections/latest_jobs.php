<!-- jobs-sections start -->
<section class="jobs-sections space-y">
    <div class="container">
        <div class="section-header mb-5m text-center" data-aos="fade-up">
            <div class="inner-wrap">
                <?php if ($subtitle = get_sub_field('subtitle')): ?>
                    <p><strong><?php echo esc_html($subtitle); ?></strong></p>
                <?php endif; ?>
                 <?php if (get_sub_field('title')): ?>
                    <h2><?php echo get_sub_field('title'); ?></h2>
                <?php endif; ?>
                <div class="slider-nav d-flex gap-4">
                    <button class="jobs-prev" aria-label="Previous">
                        <i class="fa-regular fa-arrow-left"></i>
                    </button>
                    <button class="jobs-next" aria-label="Next">
                        <i class="fa-regular fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    
        <div class="jobs-slider" data-aos="fade-up" data-aos-delay="100">
            <?php
            $jobs_query = new WP_Query([
                'post_type'      => 'jobs',
                'posts_per_page' => 6,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC',
            ]);
            if ($jobs_query->have_posts()):
                while ($jobs_query->have_posts()): $jobs_query->the_post();                   
            ?>
                <div class="carousel-cell">
                    <?php include 'job_card.php'; ?>
                </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
        
        <div class="button-wrap">
            <?php if ($cta_button = get_sub_field('cta_button')): ?>
                <a href="<?php echo esc_url($cta_button['url']); ?>" class="btn btn-primary"<?php echo $cta_button['target'] ? ' target="' . esc_attr($cta_button['target']) . '"' : ''; ?>><span><?php echo esc_html($cta_button['title']); ?></span> <i class="fa-regular fa-arrow-right"></i></a>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- jobs-sections end -->

