<section class="banner-form-section">
    <div class="banner-section narrow-banner has-overlay">
        <?php 
        $bg_image = get_sub_field('background_image');
        if ($bg_image): ?>
            <div class="bg-media" style="background-image: url(<?php echo esc_url($bg_image); ?>)"></div>
        <?php endif; ?>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-12 col-md-8" data-aos="fade-up" data-aos-delay="50">
                    <div class="content-wrap">
                        <?php if ($title = get_sub_field('title')): ?>
                            <h1><?php echo esc_html($title); ?></h1>
                        <?php endif; ?>
                        <?php if ($subtitle = get_sub_field('content')): ?>
                            <h5><?php echo esc_html($subtitle); ?></h5>
                        <?php endif; ?>
                        <?php if (have_rows('features')): ?>
                            <div class="banner-tags-wrap d-flex justify-content-center align-items-center flex-wrap gap-4 my-4">
                                <?php while (have_rows('features')): the_row(); 
                                    $tag_text = get_sub_field('feature');
                                    if ($tag_text): ?>
                                        <div class="banner-tag">
                                            <span class="icon-check"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="12" fill="#635BFF"/><path d="M7 13.5L10.5 17L17 10.5" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                            <span class="tag-text"><?php echo esc_html($tag_text); ?></span>
                                        </div>
                                    <?php endif;
                                endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-wrap">
        <div class="form-box" data-aos="fade-up" data-aos-delay="150">
            <div class="section-header mb-5m text-center" data-aos="fade-up">
                <div class="inner-wrap">
                    <?php if ($form_subtitle = get_sub_field('form_subtitle')): ?>
                        <p><strong><?php echo esc_html($form_subtitle); ?></strong></p>
                    <?php endif; ?>
                    <?php if ($form_title = get_sub_field('form_title')): ?>
                        <h2><?php echo esc_html($form_title); ?></h2>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ($shortcode = get_sub_field('form_shortcode')) { echo do_shortcode($shortcode); } ?>
        </div>
    </div>
</section>