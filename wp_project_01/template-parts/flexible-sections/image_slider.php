<?php if ( have_rows('images') ) : ?>
    <section class="work-detail-slider">
        <div class="container small-container">
            <div class="work-detail-full-slider js-work-detail-full-slider">
                <?php while( have_rows('images') ) : the_row(); ?>
                    <?php 
                    $image = get_sub_field('image');
                    if( !empty( $image ) ): ?>
                        <div class="image-item">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" data-aos="fade-up" data-aos-delay="100"/>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>