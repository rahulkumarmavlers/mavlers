<section class="popular-jobs space-y">
    <div class="container">
        <div class="section-header mb-5m text-center" data-aos="fade-up">
            <div class="inner-wrap">
                <?php if( get_sub_field('subtitle') ) : ?>
                    <p><strong><?php echo get_sub_field('subtitle'); ?></strong></p>
                <?php endif; ?>
                <?php if( get_sub_field('title') ) : ?>
                    <h2><?php echo get_sub_field('title'); ?></h2>
                <?php endif; ?>
                <?php if( get_sub_field('content') ) : ?>
                    <p><?php the_sub_field('content'); ?></p>
                <?php endif; ?>
                <?php 
                $link = get_sub_field('cta_button');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="cta-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                        <span><?php echo esc_html( $link_title ); ?> </span> <i class="fa-light fa-arrow-right-long"></i>
                    </a>
                <?php endif; ?>
                <?php if ( have_rows('sectors') ) : ?>
                    <div class="slider-nav d-flex gap-4">
                        <button class="popular-jobs-prev" aria-label="Previous"><i class="fa-regular fa-arrow-left"></i></button>
                        <button class="popular-jobs-next" aria-label="Next"><i class="fa-regular fa-arrow-right"></i></button>
                    </div>                
                <?php endif; ?>
            </div>
        </div>
        <?php if ( have_rows('sectors') ) : ?>
            <div class="popular-jobs-slider" data-aos="fade-up" data-aos-delay="100">
                <?php while( have_rows('sectors') ) : the_row(); ?>        
                    <div class="popular-jobs-item">
                        <div class="card-popular-job">
                            <div class="card-bg" style="background-image: url('<?php echo get_sub_field('image');?>');"></div>
                            <div class="card-content">
                                <?php if( get_sub_field('title') ) : ?>
                                    <h3><?php echo get_sub_field('title'); ?></h3>
                                <?php endif; ?>
                                <?php if ( have_rows('popular_roles') ) : ?>
                                    <ul>
                                        <?php while( have_rows('popular_roles') ) : the_row(); ?>
                                            <?php if( get_sub_field('popular_role') ) : ?>
                                                <li><?php echo get_sub_field('popular_role'); ?></li>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                                <?php 
                                $link = get_sub_field('cta_button');
                                if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>        
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>