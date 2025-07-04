<section class="current-vacancies">
    <div class="container">
        <?php if( get_sub_field('title') || get_sub_field('content') ) : ?>
            <div class="row-wrap">
                <div class="box-12 section-heading text-center" data-aos="fade-up" >
                    <div class="inner-wrap">
                        <?php if( get_sub_field('title') ) : ?><h2><?php echo get_sub_field('title'); ?></h2><?php endif; ?>
                        <?php if( get_sub_field('content') ) : ?><p><?php echo get_sub_field('content'); ?></p><?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>        
        <?php
        $apply_now_url = site_url('/apply-now');
        $args = array(
            'post_type'      => 'vacancy', // Your CPT name
            'posts_per_page' => -1, // Get all posts
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
        );
        $vacancies_query = new WP_Query($args);
        if ($vacancies_query->have_posts()) : ?>
            <div class="row-wrap current-vacancies-list">
                <?php while ($vacancies_query->have_posts()) : $vacancies_query->the_post(); ?>
                    <div class="box-12 current-vacancies-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-vacancies">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <div class="buttons">
                                <a href="<?php the_permalink(); ?>" class="cta-button cta-outline">Learn more</a>
                                <a href="<?php echo esc_url($apply_now_url); ?>" class="cta-button">Apply now</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); // Reset post data ?>
        <?php else : ?>
            <p>No vacancies available at the moment.</p>
        <?php endif; ?>
    </div>
</section>