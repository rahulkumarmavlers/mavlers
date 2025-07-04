<section class="core-goals-section space-y">
    <div class="container">
        <div class="section-header mb-5m text-center" data-aos="fade-up">
            <div class="inner-wrap">
                <?php if( get_sub_field('subtitle') ) : ?>
                    <p><strong><?php echo get_sub_field('subtitle'); ?></strong></p>
                <?php endif; ?>
                <?php 
                $section_title = get_sub_field('title');
                if ( !empty($section_title) ): ?>
                    <h2><?php echo $section_title; ?></h2>
                <?php endif; ?>
                <?php if( get_sub_field('content') ) : ?>
                    <p><?php echo get_sub_field('content'); ?></p>
                <?php endif; ?>
                
                <?php if( have_rows('goals') ): ?>
                <div class="slider-nav d-flex gap-4">
                    <button class="goal-prev" aria-label="Previous">
                        <i class="fa-regular fa-arrow-left"></i>
                    </button>
                    <button class="goal-next" aria-label="Next">
                        <i class="fa-regular fa-arrow-right"></i>
                    </button>
                </div>
                <?php endif; ?>
            </div>
        </div>
    
        <?php if( have_rows('goals') ): ?>
            <div class="core-goals-wrap" data-aos="fade-up" data-aos-delay="50">
                <?php while( have_rows('goals') ): the_row(); ?>
                    <div class="goals-item">
                        <div class="card-core-goals">
                            <div class="card-image">
                                <?php 
                                $image = get_sub_field('icon');
                                if( !empty($image) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="card-content">
                                <?php $number = sprintf("%02d", get_row_index()); ?>
                                <div class="number"><?php echo esc_html($number); ?></div>

                                <?php $title = get_sub_field('title'); ?>
                                <?php if ( !empty($title) ): ?>
                                    <h3><?php echo esc_html($title); ?></h3>
                                <?php endif; ?>

                                <?php $desc = get_sub_field('content'); ?>
                                <?php if ( !empty($desc) ): ?>
                                    <p><?php echo esc_html($desc); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>