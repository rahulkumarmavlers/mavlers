<section class="banner-section inner-banner <?php if ( get_sub_field('has_overlay') ) : ?>has-overlay<?php endif; ?>">
    <?php if ( get_sub_field('background_image') ) : ?>
        <div class="bg-media" style="background-image: url(<?php echo get_sub_field('background_image'); ?>)"></div>
    <?php endif; ?>
    <div class="container">
        <div class="col-12 col-md-8 col-lg-6" data-aos="fade-up" data-aos-delay="50">
            <div class="content-wrap">
                <?php if (function_exists('custom_breadcrumb')) { custom_breadcrumb(); } ?>
                <?php if ( get_sub_field('title') ) : ?>
                    <h1><?php the_sub_field('title'); ?></h1>
                <?php endif; ?>
                <?php if ( get_sub_field('content') ) : ?>
                    <p><?php the_sub_field('content'); ?></p>
                <?php endif; ?>
                <span class="trigger-next"><i class="fa-regular fa-arrow-down"></i> <i class="fa-regular fa-arrow-down"></i></span>
            </div>
        </div>
    </div>
</section>