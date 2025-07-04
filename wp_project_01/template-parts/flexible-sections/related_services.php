<?php $posts = get_sub_field('related_services'); ?>
<?php if ( $posts ): ?>
    <section class="related-services bg-gray">
        <div class="container">
            <div class="row-wrap">
                <div class="box-12 section-heading text-center" data-aos="fade-up" >
                    <div class="inner-wrap">
                        <h3>Related Services</h3>
                    </div>
                </div>
            </div>
            <div class="row-wrap related-services-list">
                <?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
                    <div class="box-12 box-md-6 box-lg-4 related-services-item" data-aos="fade-up" data-aos-delay="100">
                        <a href="<?php the_permalink(); ?>" class="card-related-service">
                            <?php if( $coloricon=get_field('color_icon',get_the_ID()) ) : ?>
                                <div class="card-icon">
                                    <img src="<?php echo $coloricon['url'];?>" alt="<?php echo get_the_title();?>">
                                </div>    
                            <?php endif; ?>
                            <h5><?php the_title(); ?></h5>
                        </a>
                    </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>