<section class="how-works-sec space-y">
    <div class="container">        
        <div class="row justify-content-between">
            <div class="col-lg-6 col-md-6 col-sm-12 how-works-left-col">
                <div class="inner-how-works-col animated fadeInUp" data-class="fadeInUp">
                    <div class="how-works-img">
                        <?php if ($left_image = get_sub_field('left_image')): ?>
                            <img src="<?php echo esc_url($left_image['url']); ?>" alt="<?php echo esc_attr($left_image['alt']); ?>">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 how-works-right-col">
                <div class="inner-how-works-right-col">
                    <div class="heading-wrap">
                        <?php if ($subtitle = get_sub_field('subtitle')): ?>
                            <p class="text-primary"><strong><?php echo esc_html($subtitle); ?></strong></p>
                        <?php endif; ?>
                        <?php if ($title = get_sub_field('title')): ?>
                            <h2 class="h1"><?php echo wp_kses_post($title); ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="how-works-right-list">
                        <?php if (have_rows('steps_content')): ?>
                            <?php while (have_rows('steps_content')): the_row(); ?>
                                <div class="how-works-item animated delay-300 fadeInUp" data-class="fadeInUp">
                                    <div class="how-works-item-row c-row">
                                        <div class="how-works-item-col how-works-item-left-col">
                                            <span><?php echo str_pad(get_row_index(), 2, '0', STR_PAD_LEFT); ?></span>
                                        </div>
                                        <div class="how-works-item-col how-works-item-right-col ">
                                            <?php if( get_sub_field('title') ) : ?>
                                                <h3><?php echo get_sub_field('title'); ?></h3>
                                            <?php endif; ?>
                                            <div class="content-wrap wysiwyg-content">
                                                <?php if( get_sub_field('content') ) : ?>
                                                <?php the_sub_field('content'); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
