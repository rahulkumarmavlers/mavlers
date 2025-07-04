<?php 
$image = get_sub_field('image');
if( !empty( $image ) ): 
    $imgclass=" has-image";
else:
    $imgclass="";
endif;
?>
<section class="single-detail-testimonial <?php echo $imgclass;?> <?php echo get_sub_field('background_color');?>">
    <div class="container small-container">
        <div class="card-full-testimonial">      
            <?php
            if( !empty( $image ) ): ?>
                <div class="card-image" data-aos="fade-up">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endif; ?>        
            <div class="card-content" data-aos="fade-up" data-aos-delay="200">                
                    <?php if( get_sub_field('hide_blockquote_sign') ) : ?>
                    <?php else: ?>
                        <i class="fa-solid fa-quote-left"></i>                    
                    <?php endif; ?>
                    <?php if( get_sub_field('content') ) : ?>
                        <blockquote>
                            <?php the_sub_field('content'); ?>
                        </blockquote>                    
                    <?php endif; ?>
                <?php if( get_sub_field('author') ) : ?>
                    <div class="auther"><?php echo get_sub_field('author'); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>