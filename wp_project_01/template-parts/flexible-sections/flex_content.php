<section class="flexs bg-gray has-pattern">
    <div class="container">
        <?php 
        $title = get_sub_field('title');
        $content = get_sub_field('content');
        ?>

        <?php if ($title || $content) : ?>
            <div class="row-wrap">
                <div class="box-12 section-heading text-center" data-aos="fade-up" >
                    <div class="inner-wrap">
                        <?php if ($title) : ?>
                            <h3><?php echo esc_html($title); ?></h3>
                        <?php endif; ?>
                        <?php if ($content) : ?>
                            <p><?php echo wp_kses_post($content); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (have_rows('icon_content')) : ?>
            <div class="row-wrap flexs-list">
                <?php while (have_rows('icon_content')) : the_row(); ?>  
                    <?php 
                    $icon = get_sub_field('icon');
                    $icon_alt = get_sub_field('icon_alt') ?: 'Icon Image'; // Fallback alt text
                    $card_title = get_sub_field('title');
                    $card_content = get_sub_field('content');
                    ?>          
                    <div class="box-12 box-md-6 box-lg-4 flexs-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="card-flex">
                            <?php if ($icon) : ?>
                                <div class="card-icon">
                                    <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($icon_alt); ?>">
                                </div>                                
                            <?php endif; ?>

                            <?php if ($card_title || $card_content) : ?>
                                <div class="card-content">
                                    <?php if ($card_title) : ?>
                                        <h4><?php echo esc_html($card_title); ?></h4>
                                    <?php endif; ?>
                                    <?php if ($card_content) : ?>
                                        <p><?php echo wp_kses_post($card_content); ?></p>
                                    <?php endif; ?>
                                </div>    
                            <?php endif; ?>
                        </div>
                    </div>            
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        
        <?php 
        $cta_title = get_sub_field('cta_text'); 
        $cta_button = get_sub_field('cta_button'); 
        ?>
        
        <?php if ($cta_title || $cta_button) : ?>
            <div class="row-wrap button-wrap text-center" data-aos="fade-up" data-aos-delay="100">
                <?php if ($cta_title) : ?>
                    <h4><?php echo esc_html($cta_title); ?></h4>
                <?php endif; ?>
                
                <?php if ($cta_button && isset($cta_button['url'], $cta_button['title'])) : ?>
                    <a href="<?php echo esc_url($cta_button['url']); ?>" class="cta-button" title="<?php echo esc_attr($cta_button['title']); ?>" target="<?php echo esc_attr($cta_button['target'] ?: '_self'); ?>">
                        <span><?php echo esc_html($cta_button['title']); ?></span>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        
    </div>
</section>