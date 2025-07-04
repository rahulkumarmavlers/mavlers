<section class="perks-section space-y">
    <div class="container">        
        <div class="section-header text-center" data-aos="fade-up">
            <div class="inner-wrap col-12 col-md-6 mx-auto">
                <?php if ($subtitle = get_sub_field('subtitle')): ?><p class="text-primary"><strong><?php echo esc_html($subtitle); ?></strong></p><?php endif; ?>
                <?php if ($title = get_sub_field('title')): ?><h2 class="mb-2"><?php echo esc_html($title); ?></h2><?php endif; ?>
                <?php if ($content = get_sub_field('content')): ?><h5><?php echo esc_html($content); ?></h5><?php endif; ?>
            </div>
        </div>
        <?php if (have_rows('icon_content')): ?>
            <div class="perks-grid-wrap">
                <div class="row g-4">
                    <?php while (have_rows('icon_content')): the_row(); ?>
                        <?php
                        $icon = get_sub_field('icon');
                        $icon_title = get_sub_field('title');
                        $icon_desc = get_sub_field('content');
                        ?>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up">
                            <div class="perk-card text-center">
                                <?php if ($icon): ?>
                                    <div class="perk-icon"><img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" class="svg-convert"></div>
                                <?php endif; ?>
                                <div class="perk-content">
                                    <?php if ($icon_title): ?><h4><?php echo esc_html($icon_title); ?></h4><?php endif; ?>
                                    <?php if ($icon_desc): ?><p><?php echo esc_html($icon_desc); ?></p><?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>