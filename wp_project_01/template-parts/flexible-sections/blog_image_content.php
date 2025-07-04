<section class="blog-inner-two-column-image-content">
    <div class="container small-container">
        <div class="row-wrap">
            <?php 
            $image = get_sub_field('image');
            if( !empty( $image ) ): ?>
                <div class="box-12 box-md-6 image-wrap" data-aos="fade-up">
                    <div class="inner-wrap">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                </div>
            <?php endif; ?>
            <?php if( get_sub_field('content') ) : ?>
                <div class="box-12 box-md-6 content-wrap" data-aos="fade-up" data-aos-delay="200">
                    <div class="inner-wrap wysiwyg-content">
                        <?php the_sub_field('content'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>