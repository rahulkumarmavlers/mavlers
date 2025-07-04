<section class="user-reviews space-y text-center">
    <div class="container">        
        <div class="section-header text-center" data-aos="fade-up">
            <div class="inner-wrap">
                <?php $subtitle = get_sub_field('subtitle'); ?>
                <?php if (!empty($subtitle)): ?>
                    <p><strong><?php echo esc_html($subtitle); ?></strong></p>
                <?php endif; ?>
                <?php $title = get_sub_field('title'); ?>
                <?php if (!empty($title)): ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>
            </div>
        </div>
        <?php if (have_rows('reviews')): ?>
        <div class="row justify-content-center" data-aos="fade-up">
            <?php while (have_rows('reviews')): the_row(); ?>
                <?php $image = get_sub_field('image'); ?>
                <?php if (!empty($image)): ?>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="review-card">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="review-logo mb-3">
                    </div>
                </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</section>