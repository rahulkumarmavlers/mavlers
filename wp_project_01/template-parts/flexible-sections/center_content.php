<section class="center-content <?php if ( get_sub_field('has_background_pattern') ) { echo ' has-pattern';}?>">
    <div class="container">
        <div class="content-wrap wysiwyg-content" data-aos="fade-up">
            <?php if( get_sub_field('title') ) : ?><h2><?php echo get_sub_field('title'); ?></h2><?php endif; ?>
            <?php if( get_sub_field('content') ) : the_sub_field('content'); endif; ?>
            <?php 
            $image = get_sub_field('image_after_content');
            if( !empty( $image ) ): ?>
                <figure><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></figure>
            <?php endif; ?>
        </div>
        <?php 
        $link = get_sub_field('cta_button');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <div class="row-wrap button-wrap text-center">
                <a class="cta-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            </div>
        <?php endif; ?>
    </div>
</section>