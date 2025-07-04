<?php if ( have_rows('testimonials') ) : ?>
    <section class="full-testimonials bg-green">
        <div class="container">
            <div class="full-testimonials-slider js-full-testimonials-slider">
                <?php while( have_rows('testimonials') ) : the_row(); ?>
                    <div class="full-testimonials-item">
                        <div class="card-full-testimonial" data-aos="fade-up">
                            <i class="fa-solid fa-quote-left">
                                <svg width="49" height="42" viewBox="0 0 49 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.97998 37.4907V25.4907C0.97998 18.9282 2.47998 13.4907 5.47998 9.17822C8.60498 4.74072 13.1675 1.70947 19.1675 0.0844727C19.855 -0.103027 20.4956 0.0219727 21.0894 0.459473C21.6831 0.896973 21.98 1.49072 21.98 2.24072V5.42822C21.98 5.86572 21.8394 6.2876 21.5581 6.69385C21.2769 7.1001 20.9175 7.36572 20.48 7.49072C13.98 9.86572 10.73 14.3657 10.73 20.9907H17.48C18.73 20.9907 19.7925 21.4282 20.6675 22.3032C21.5425 23.1782 21.98 24.2407 21.98 25.4907V37.4907C21.98 38.7407 21.5425 39.8032 20.6675 40.6782C19.7925 41.5532 18.73 41.9907 17.48 41.9907H5.47998C4.22998 41.9907 3.16748 41.5532 2.29248 40.6782C1.41748 39.8032 0.97998 38.7407 0.97998 37.4907ZM32.48 41.9907H44.48C45.73 41.9907 46.7925 41.5532 47.6675 40.6782C48.5425 39.8032 48.98 38.7407 48.98 37.4907V25.4907C48.98 24.2407 48.5425 23.1782 47.6675 22.3032C46.7925 21.4282 45.73 20.9907 44.48 20.9907H37.73C37.73 14.3657 40.98 9.86572 47.48 7.49072C47.9175 7.36572 48.2769 7.1001 48.5581 6.69385C48.8394 6.2876 48.98 5.86572 48.98 5.42822V2.24072C48.98 1.49072 48.6831 0.896973 48.0894 0.459473C47.4956 0.0219727 46.855 -0.103027 46.1675 0.0844727C40.1675 1.70947 35.605 4.74072 32.48 9.17822C29.48 13.4907 27.98 18.9282 27.98 25.4907V37.4907C27.98 38.7407 28.4175 39.8032 29.2925 40.6782C30.1675 41.5532 31.23 41.9907 32.48 41.9907Z" fill="white"/>
                                </svg>
                            </i>
                            <?php if( get_sub_field('content') ) : ?>
                                <blockquote>
                                    <p><?php echo get_sub_field('content'); ?></p>
                                </blockquote>
                            <?php endif; ?>
                            <?php if( get_sub_field('author') ) : ?>
                                <div class="auther"><?php echo get_sub_field('author'); ?></div>
                            <?php endif; ?>
                            <?php
                            $featured_post = get_sub_field('case_study');
                            if( $featured_post ): ?>
                                <a href="<?php echo esc_url( get_permalink( $featured_post ) ); ?>" class="cta-button cta-outline" title="View case study">View case study</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>