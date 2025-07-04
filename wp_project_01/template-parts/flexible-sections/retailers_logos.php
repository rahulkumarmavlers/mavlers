<section class="retailers">
    <div class="container">
        <?php if( get_sub_field('title') ) : ?>
            <div class="box-12 section-heading text-center">
                <div class="inner-wrap">
                    <h4><?php echo get_sub_field('title'); ?></h4>
                </div>
            </div>            
        <?php endif; ?>        
        <?php if ( have_rows('logos') ) : ?>
            <div class="retailers-slider js-retailers-slider">        
                <?php while( have_rows('logos') ) : the_row(); ?>            
                    <div class="retailers-item">
                        <div class="logo-wrap" data-aos="fade-up" data-aos-delay="100">
                            <?php 
                            $image = get_sub_field('logo');
                            if( !empty( $image ) ): ?>
                                <?php if ( get_sub_field('logo_link') ) { ?>
                                    <a href="<?php echo get_sub_field('logo_link');?>"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
                                <?php } else { ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php } ?>
                            <?php endif; ?>                        
                        </div>
                    </div>            
                <?php endwhile; ?>
            </div>        
        <?php endif; ?>
    </div>
</section>