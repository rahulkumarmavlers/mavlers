<section class="full-width-half-image-content">
    <?php 
    $image = get_sub_field('image');
    if( !empty( $image ) ): ?>
        <div class="image-wrap">
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        </div>
    <?php endif; ?>
    <?php if( get_sub_field('title') || get_sub_field('content') || get_sub_field('cta_button') ) : ?>
        <div class="content-wrap" data-aos="fade-up">
            <div class="inner-wrap">
                <?php if( get_sub_field('title') ) : ?><h3><?php echo get_sub_field('title'); ?></h3><?php endif; ?>
                <?php if( get_sub_field('content') ) :?><p><?php echo get_sub_field('content');?></p><?php endif; ?>
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
</section>