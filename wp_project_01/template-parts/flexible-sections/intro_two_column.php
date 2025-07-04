<section class="intro-two-col-sec">
    <div class="container">
        <div class="intro-two-col-row c-row">
            <?php if( get_sub_field('content') ) : ?>
                <div class="intro-two-col intro-two-col-content">
                    <div class="intro-two-content" data-aos="fade-up">                    
                        <h4><?php echo get_sub_field('content'); ?></h4>                    
                    </div>
                </div>
            <?php endif; ?>

            <?php 
            $image = get_sub_field('right_image');
            if( $image ): ?>
                <div class="intro-two-col intro-two-col-img" data-aos="fade-up">
                    <div class="intro-two-img">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />                    
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>