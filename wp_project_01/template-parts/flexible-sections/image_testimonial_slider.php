<?php if ( have_rows('testimonials') ) : ?>
    <section class="two-column-testimonials">
        <div class="testimonials-slider js-testimonials-slider">
            <?php while( have_rows('testimonials') ) : the_row(); ?>
                <div class="testimonials-item">
                    <div class="card-testimonials">
                        <?php 
                        $image = get_sub_field('image');
                        if( $image ) : ?>
                            <div class="testimonials-image" style="background-image: url('<?php echo esc_url($image); ?>'); background-position: center; background-size: cover; background-repeat: no-repeat;"> </div>                          
                        <?php endif; ?>                        
                        <div class="testimonials-text-wrap">
                            <div class="testimonials-text" data-aos="fade-up">
                                <?php 
                                $content = get_sub_field('content');
                                $author = get_sub_field('author');

                                if( $content ) : ?>
                                    <p class="testimonials-quote"><?php echo esc_html($content); ?></p>
                                <?php endif; ?>

                                <?php if( $author ) : ?>
                                    <p class="testimonials-author"><?php echo esc_html($author); ?></p>
                                <?php endif; ?>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>