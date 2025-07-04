<section class="our-benefits bg-green">
    <div class="container">
        <?php if( get_sub_field('title') || get_sub_field('content') ) : ?>
            <div class="row-wrap">
                <div class="box-12 section-heading text-center" data-aos="fade-up">
                    <div class="inner-wrap">
                        <?php if( get_sub_field('title') ) : ?><h3><?php echo get_sub_field('title'); ?></h3><?php endif; ?>
                        <?php if( get_sub_field('content') ) : ?><p><?php echo get_sub_field('content'); ?></p><?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( have_rows('icon_content') ) : ?>
            <div class="row-wrap our-benefits-list">
                <?php while( have_rows('icon_content') ) : the_row(); ?>        
                    <div class="box-12 box-md-6 box-xl-3 our-benefits-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-benefits">
                            <?php 
                            $image = get_sub_field('icon');
                            if( !empty( $image ) ): ?>
                                <div class="card-image">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                </div>
                            <?php endif; ?>
                            <?php if( get_sub_field('title') || get_sub_field('content') ) : ?>
                                <div class="card-content">
                                    <?php if( get_sub_field('title') ) : ?>
                                        <h4><?php echo get_sub_field('title'); ?></h4>
                                    <?php endif; ?>
                                    <?php if( get_sub_field('content') ) : ?>
                                        <p><?php echo get_sub_field('content'); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>        
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>