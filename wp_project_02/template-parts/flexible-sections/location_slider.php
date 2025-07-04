<?php if ( have_rows('location_slider') ) : ?>
    <section class="marquee-section" >
        <div class="marquee-main" data-aos="fade-up">
            <div class="marquee">
                <?php while( have_rows('location_slider') ) : the_row(); ?>
                    <div class="marquee-item">
                        <span class="marquee-text"><?php the_sub_field('location'); ?></span>
                        <img src="<?php echo site_url(); ?>/wp-content/uploads/2025/05/orange-location.svg" alt="">
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="marquee">
                <?php while( have_rows('location_slider') ) : the_row(); ?>
                    <div class="marquee-item">
                        <span class="marquee-text"><?php the_sub_field('location'); ?></span>
                        <img src="<?php echo site_url(); ?>/wp-content/uploads/2025/05/orange-location.svg" alt="">
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>