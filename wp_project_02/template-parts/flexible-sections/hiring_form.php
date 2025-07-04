<section class="form-section space-y">
    <?php $background_image = get_sub_field('background_image'); ?>
    <?php if (!empty($background_image)): ?>
        <div class="bg-media" style="background-image: url('<?php echo esc_url($background_image); ?>')"></div>
    <?php endif; ?>
    <div class="container">
        <div class="row form-wrap">
            <div class="col-12">
                <div class="form-box" data-aos="fade-up">
                    <div class="section-header mb-5m text-center" >
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
                    <?php if (get_sub_field('form_shortcode')) { echo do_shortcode(get_sub_field('form_shortcode')); } ?>
                </div>
            </div>
        </div>
    </div>
</section>