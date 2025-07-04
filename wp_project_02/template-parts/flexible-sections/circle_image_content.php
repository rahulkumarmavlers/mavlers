<section class="reviews-section space-y">
    <div class="container">
        <div class="reviews-wrap position-relative">
            <div class="floating-reviews">
                <?php if( have_rows('people_images') ): 
                    $pos = 1;
                    while( have_rows('people_images') ): the_row(); 
                        $avatar = get_sub_field('people_image');
                        if( $avatar ): ?>
                            <div class="review-avatar review-pos-<?php echo $pos; ?>" data-aos="fade-right" data-aos-delay="100">
                                <img src="<?php echo esc_url($avatar['url']); ?>" alt="<?php echo esc_attr($avatar['alt']); ?>">
                            </div>
                        <?php 
                        $pos++;
                        endif;
                    endwhile; 
                endif; ?>
            </div>            
            <div class="reviews-content text-center" data-aos="fade-up">
                <?php if( get_sub_field('subtitle') ) : ?>
                    <p class="text-primary"><strong><?php echo get_sub_field('subtitle'); ?></strong></p>
                <?php endif; ?>                
                <?php if( get_sub_field('title') ) : ?>
                    <h2 class="mb-4"><?php echo get_sub_field('title'); ?></h2>
                <?php endif; ?>                
                <?php if( get_sub_field('review_image') ) : ?>
                    <div class="google-rating d-inline-flex align-items-center gap-2 mb-0">
                        <?php $review_image = get_sub_field('review_image');?>
                        <img src="<?php echo esc_url($review_image['url']); ?>" alt="<?php echo esc_attr($review_image['alt']); ?>" width="20">                        
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>