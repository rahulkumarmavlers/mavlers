<?php
$section_title=get_sub_field('title');
$stories = get_sub_field('select_works');
?>
<section class="stories bg-<?php echo get_sub_field('background_color');?> <?php if ( get_sub_field('has_pattern') ) { echo ' has-pattern';}?>">
    <div class="container">
        <?php if( $section_title ) : ?>
            <div class="row-wrap">
                <div class="box-12 section-heading text-center" data-aos="fade-up">
                    <div class="inner-wrap">
                        <h3><?php echo $section_title;?></h3>
                    </div>
                </div>
            </div>        
        <?php endif; ?>

        <?php if ( $stories ): ?>
            <div class="stories-slider js-stories-slider">
                <?php foreach ( $stories as $story ) : setup_postdata( $story ); ?>
                    <?php 
                        $image_url = get_the_post_thumbnail_url( $story->ID, 'full' ); 
                        if (!$image_url) {
                            $image_url = site_url() . '/wp-content/uploads/default-placeholder.jpg'; // Fallback Image
                        }
                        $retailer = get_field('retailer', $story->ID);
                    ?>
                    <div class="storie-item" >
                        <div class="card-main" data-aos="fade-up" data-aos-delay="100">
                            <div class="image" style="background-image: url(<?php echo esc_url($image_url); ?>);">
                                <?php if ($retailer): ?>
                                    <span class="tag"><?php echo esc_html($retailer); ?></span>
                                <?php endif; ?>
                                <div class="little-blog-description">
                                    <a href="<?php the_permalink($story->ID); ?>" title="<?php echo get_the_title($story->ID); ?>">
                                        <?php echo get_the_title($story->ID); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>
        <?php 
        $link = get_sub_field('cta_button');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <div class="row-wrap button-wrap text-center" data-aos="fade-up" >
                <a class="cta-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            </div>            
        <?php endif; ?>
    </div>
</section>