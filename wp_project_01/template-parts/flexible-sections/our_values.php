
<section class="values">
    <div class="container">
        <?php if( get_sub_field('title') || get_sub_field('content') ) : ?>
            <div class="row-wrap">
                <div class="box-12 section-heading text-center" data-aos="fade-up" >
                    <div class="inner-wrap">
                        <?php if( get_sub_field('title') ) : ?><h2><?php echo get_sub_field('title'); ?></h2><?php endif; ?>
                        <?php if( get_sub_field('content') ) :?><p><?php echo get_sub_field('content');?></p><?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( have_rows('our_values') ) : ?>
            <div class="row-wrap values-list">
                <?php while( have_rows('our_values') ) : the_row(); ?>        
                    <div class="box-6 box-lg-3 values-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-value">
                            <?php if( get_sub_field('title') ) : ?>
                                <div class="card-title">
                                    <h4><?php echo get_sub_field('title'); ?></h4>
                                </div>
                            <?php endif; ?>
                            <?php if( get_sub_field('content') ) : ?>
                                <p><?php echo get_sub_field('content'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>        
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <?php 
        $link = get_sub_field('cta_button');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <div class="row-wrap button-wrap text-center" data-aos="fade-up">
                <a class="cta-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            </div>
        <?php endif; ?>
    </div>
</section>