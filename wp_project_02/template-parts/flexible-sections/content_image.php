<section class="image-content-section space-y">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 order-md-last image-wrap">
                <div class="inner-wrap">
                    <?php if ($image = get_sub_field('right_image')): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-md-6 content-wrap">
                <div class="inner-wrap wysiwyg-content">
                    <?php if ( get_sub_field('subtitle') ): ?>
                        <div class="top-heading text-primary mb-4">
                            <strong><?php echo get_sub_field('subtitle'); ?></strong>
                        </div>
                    <?php endif; ?>
                    <?php if ( get_sub_field('title') ): ?>
                        <h2><?php echo get_sub_field('title'); ?></h2>
                    <?php endif; ?>
                    <?php if ( get_sub_field('content') ): ?>
                        <div class="content-wrap">
                            <?php the_sub_field('content'); ?>
                        </div>
                    <?php endif; ?>                        
                </div>
            </div>
            
        </div>
    </div>
</section>