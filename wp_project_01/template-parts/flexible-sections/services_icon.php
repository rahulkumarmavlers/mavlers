<section class="our-services">
    <div class="container">

        <?php if( get_sub_field('title') || get_sub_field('content') ) : ?>            
            <div class="row-wrap">
                <div class="box-12 section-heading text-center" data-aos="fade-up" >
                    <div class="inner-wrap">
                        <?php if( get_sub_field('title') ) : ?><h3><?php echo get_sub_field('title'); ?></h3><?php endif; ?>
                        <?php if( get_sub_field('content') ) : ?><p><?php echo get_sub_field('content'); ?></p><?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <?php
        $args = array(
            'post_type'      => 'service',
            'posts_per_page' => -1, // Fetch all services
            'post_status'    => 'publish', // Correct status
        );
        $services = new WP_Query($args);
        if ($services->have_posts()) : ?>
            <div class="row-wrap services-list">
                <?php while ($services->have_posts()) : $services->the_post();
                    $icon = get_field('color_icon'); // Fetch ACF icon field
                    $content = get_field('home_content'); // Fetch ACF content field
                ?>
                    <div class="box-12 box-md-6 box-lg-4 box-xl-3 service-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-service">
                            <div class="card-icon">
                                <?php if ($icon) : ?>
                                    <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                            </div>

                            <h6><?php the_title(); ?></h6>

                            <?php if ($content) : ?>
                                <p><?php echo esc_html($content); ?></p>
                            <?php endif; ?>

                            <a href="<?php the_permalink(); ?>">
                                Learn More
                                <i class="fa-regular fa-arrow-right-long"></i>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

        <?php 
        $link = get_sub_field('cta_button');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <div class="row-wrap button-wrap text-center" data-aos="fade-up" >
                <a class="cta-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            </div>
        <?php endif; ?>

    </div>
</section>