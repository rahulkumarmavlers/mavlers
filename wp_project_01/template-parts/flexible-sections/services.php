<section class="block-services has-pattern">
    <div class="container">
        
        <?php if( get_sub_field('title') ) : ?>
            <div class="row-wrap">
                <div class="box-12 section-heading text-center" data-aos="fade-up">
                    <div class="inner-wrap">
                        <h5><?php echo esc_html(get_sub_field('title')); ?></h5>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row-wrap block-services-list">
            <?php
            // Query custom post type 'service'
            $args = array(
                'post_type'      => 'service',
                'post_status'    => 'publish', // Only show published services
                'posts_per_page' => -1, // Get all services
            );

            $services = new WP_Query($args);
            if ($services->have_posts()) :
                while ($services->have_posts()) : $services->the_post();
                    // Fetch ACF fields
                    $service_icon = get_field('color_icon'); // ACF field for icon
                    $service_image = get_the_post_thumbnail_url();
                    $summary = get_field('summary');
            ?>
                    <div class="box-12 block-services-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-block-services">
                            <div class="card-image">
                                <?php if ($service_image) : ?>
                                    <img src="<?php echo esc_url($service_image); ?>" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="card-content">
                                <div class="card-title">
                                    <?php if ($service_icon) : ?>
                                        <span class="card-icon">
                                            <img src="<?php echo esc_url($service_icon['url']); ?>" alt="<?php the_title(); ?> icon">
                                        </span>
                                    <?php endif; ?>
                                    <h3><?php the_title(); ?></h3>
                                </div>
                                <?php if ($summary) : ?>
                                    <p><?php echo $summary;?></p>
                                <?php endif; ?>
                                <a href="<?php the_permalink(); ?>" class="cta-button cta-outline" title="<?php the_title(); ?>">Find out more</a>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No services found.</p>';
            endif;
            ?>
        </div>
    </div>
</section>