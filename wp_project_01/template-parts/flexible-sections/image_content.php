<section class="alternate-image-content">
    <div class="container">
        <div class="alternate-image-content-item <?php if ( get_sub_field('image_position')=="right") { echo ' right-image';}?>">
            <div class="row-wrap card-alternate-image-content">                
                <?php 
                $image = get_sub_field('image');
                if( !empty( $image ) ): ?>
                    <div class="box-12 box-lg-5 card-image" data-aos="fade-up">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                <?php endif; ?>
                <?php if( get_sub_field('content') ) : ?>
                    <div class="box-12 box-lg-6 card-content wysiwyg-content" data-aos="fade-up" data-aos-delay="100">
                        <?php the_sub_field('content'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>