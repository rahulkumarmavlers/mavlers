<!-- blogs-sections start -->
<section class="blogs-section space-y">
    <div class="container">
        <div class="section-header mb-5m text-center" data-aos="fade-up">
            <div class="inner-wrap">
                <?php
                // Title as ACF sub field (e.g., inside a repeater or flexible content)
                if (get_sub_field('title')): ?>
                    <h2><?php echo get_sub_field('title'); ?></h2>
                <?php endif; ?>
                <?php
                // CTA as ACF link field (sub field)
                $cta = get_sub_field('cta_button');
                if (!empty($cta) && isset($cta['url'], $cta['title'])):
                    $cta_url = $cta['url'];
                    $cta_title = $cta['title'];
                    $cta_target = $cta['target'] ? $cta['target'] : '_self';
                ?>
                    <a href="<?php echo esc_url($cta_url); ?>" class="cta-link" target="<?php echo esc_attr($cta_target); ?>">
                        <span><?php echo esc_html($cta_title); ?></span>
                        <i class="fa-light fa-arrow-right-long"></i>
                    </a>
                <?php endif; ?>

                <div class="slider-nav d-flex gap-4">
                    <button class="blog-prev" aria-label="Previous">
                        <i class="fa-regular fa-arrow-left"></i>
                    </button>
                    <button class="blog-next" aria-label="Next">
                        <i class="fa-regular fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="blogs-slider" data-aos="fade-up" data-aos-delay="100">
            <?php
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 6,
                'post_status'    => 'publish',
            );
            $blog_query = new WP_Query($args);
            if ($blog_query->have_posts()):
                while ($blog_query->have_posts()): $blog_query->the_post();
                    include "blog_card.php";
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>
<!-- blogs-sections end -->