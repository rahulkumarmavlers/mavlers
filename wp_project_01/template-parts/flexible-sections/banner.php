<section class="two-column-content-media">
    <div class="container">
        <div class="row-wrap">
            <div class="box-12 box-lg-6 content-wrap" data-aos="fade-up">
                <div class="inner-wrap">
                    <?php if( get_sub_field('title') ) : ?><h1><?php echo get_sub_field('title'); ?></h1><?php endif; ?>
                    <?php if( get_sub_field('content') ) : ?><p><?php echo get_sub_field('content'); ?></p><?php endif; ?>
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
            <?php if( get_sub_field('right_side_image') || get_sub_field('right_side_video') ) : ?>
                <div class="box-12 box-lg-6 media-wrap" data-aos="fade-up" data-aos-delay="200">
                    <div class="inner-wrap">
                        <?php if( get_sub_field('right_side_media') == 'image' ) { ?>
                            <?php 
                            $image = get_sub_field('right_side_image');
                            if( !empty( $image ) ): ?>
                                <figure>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            </figure>
                            <?php endif; ?>
                        <?php } else { ?>
                            <?php if( get_sub_field('right_side_video') ) : ?>
                                <video class="banner-toplayer" src="<?php echo get_sub_field('right_side_video'); ?>" preload="auto" muted="" autoplay="" loop="" ></video>                                
                            <?php endif; ?>
                        <?php } ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>