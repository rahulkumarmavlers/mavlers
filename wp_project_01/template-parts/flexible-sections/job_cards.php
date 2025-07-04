<?php if ( have_rows('job_type') ) : ?>
    <section class="jobs">
        <div class="container">
            <div class="row-wrap jobs-list">
                <?php while( have_rows('job_type') ) : the_row(); ?>

                        <div class="box-12 box-lg-6 jobs-item" data-aos="fade-up" data-aos-delay="100">
                            <a href="<?php echo esc_url(get_sub_field('link')); ?>">
                                <div class="card-main">
                                    <div class="image" style="background-image: url(<?php echo esc_url(get_sub_field('card_image'));?>);">
                                        <div class="little-blog-description">
                                            <h3><?php echo esc_html(get_sub_field('title')); ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>