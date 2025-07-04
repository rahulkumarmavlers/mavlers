<section class="map-section bg-green">
    <div class="map-wrap">
        <div class="left-image" style="background-image: url(<?php echo get_sub_field('map_image_1');?>);" data-aos="fade-up" >
            <span class="pins" style="background-image: url(<?php echo get_sub_field('map_image_2');?>);"></span>
            <img id="map-708.png" src="<?php echo get_sub_field('map_image_3');?>" alt="UK Map">
        </div>

        <?php if( get_sub_field('title') || get_sub_field('content') || get_sub_field('cta_button') ) : ?>
            <div class="right-text" data-aos="fade-up" data-aos-delay="200">
                <?php if( get_sub_field('title') ) : ?><h3><?php echo get_sub_field('title'); ?></h3><?php endif; ?>
                <?php if( get_sub_field('content') ) :?><p><?php echo get_sub_field('content');?></p><?php endif; ?>
                <?php 
                $link = get_sub_field('cta_button');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="cta-button cta-outline" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>

</section>