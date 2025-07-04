<section class="scrollfade-image-content">
    <div class="container">
        <?php if( get_sub_field('title') || get_sub_field('content') || get_sub_field('cta_button') ) : ?>
            <div class="box-12 box-lg-6 content-wrap" data-aos="fade-up">
                <div class="inner-wrap">
                    <?php if( get_sub_field('title') ) : ?><h3><?php echo get_sub_field('title'); ?></h3><?php endif; ?>
                    <?php if( get_sub_field('content') ) : the_sub_field('content'); endif; ?>
                    <?php 
                    $link = get_sub_field('cta_button');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="cta-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <?php 
    $image = get_sub_field('image');
    if( !empty( $image ) ): ?>
        <div class="image-wrap scrollme">
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="animateme" data-when="enter" data-from="0.8" data-to="0" data-easing="easeinout" data-opacity="0" data-translatex="300"/>
        </div>
    <?php endif; ?>
</section>