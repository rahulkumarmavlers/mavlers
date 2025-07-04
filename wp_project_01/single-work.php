<?php
get_header();
 while ( have_posts() ) : the_post();?>

    <?php if ( get_field('retailer') || get_field('banner_image') ) : ?>
        <section class="work-single-banner">
            <div class="container">
                <div class="row-wrap">
                    <div class="box-12 text-center">
                        <div class="inner-wrap">
                            <?php if ( get_field('retailer') ) : ?>
                                <h1><?php echo get_field('retailer'); ?></h1>
                            <?php endif; ?>
                            <?php 
                            $image = get_field('banner_image');
                            if( !empty( $image ) ): ?>
                                <div class="image-wrap">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

	 <?php echo do_shortcode( '[flexlayout name=flexible_sections]' );
 endwhile; // End of the loop.
get_footer();
?>