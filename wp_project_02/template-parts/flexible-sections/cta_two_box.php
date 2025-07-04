<?php if( get_sub_field('content_type') == 'custom' ) : 
    $bg = get_sub_field('background_image');
    $subtitle = get_sub_field('subtitle');
    $title = get_sub_field('title');
 else:
    $bg = get_field('ctatwobox_background_image','option');
    $subtitle = get_field('ctatwobox_subtitle','option');
    $title = get_field('ctatwobox_title','option');
endif; ?>
<section class="recruiters-section space-y"<?php if($bg): ?> style="background-image: url('<?php echo esc_url($bg); ?>')"<?php endif; ?>>
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <div class="inner-wrap">
                <?php if($subtitle): ?>
                    <p class="text-white"><strong><?php echo $subtitle; ?></strong></p>
                <?php endif; ?>
                <?php if($title): ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>
            </div>
        </div>
        <?php if ( get_sub_field('content_type') == 'custom' ) :?>
            <div class="row">
                <?php 
                $delay = 100;
                if( have_rows('boxes') ): 
                    while(have_rows('boxes')): the_row();
                ?>
                    <div class="col-12 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <div class="card-recruiters text-center">
                            <div class="profile-image mx-auto mb-4">
                                <?php if($img = get_sub_field('image')): ?>
                                    <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" class="rounded-circle">
                                <?php endif; ?>
                            </div>
                            <?php if($box_title = get_sub_field('title')): ?>
                                <h3><?php echo esc_html($box_title); ?></h3>
                            <?php endif; ?>
                            <?php if($desc = get_sub_field('content')): ?>
                                <p class="mb-4"><?php echo esc_html($desc); ?></p>
                            <?php endif; ?>
                            <div class="d-flex gap-3 justify-content-center">
                                <?php
                                    $button1 = get_sub_field('cta_button_1');
                                    if($button1):
                                        $button1_url = $button1['url'];
                                        $button1_title = $button1['title'] ? $button1['title'] : '';
                                        $button1_target = $button1['target'] ? $button1['target'] : '_self';
                                ?>
                                <a href="<?php echo esc_url($button1_url); ?>" class="btn btn-primary" target="<?php echo esc_attr($button1_target); ?>">
                                    <span><?php echo esc_html($button1_title); ?></span> <i class="fa-regular fa-arrow-right"></i>
                                </a>
                                <?php endif; ?>

                                <?php 
                                $button2 = get_sub_field('cta_button_2');
                                if($button2):
                                    $button2_url = $button2['url'];
                                    $button2_title = $button2['title'] ? $button2['title'] : '';
                                    $button2_target = $button2['target'] ? $button2['target'] : '_self';
                                ?>
                                <a href="<?php echo esc_url($button2_url); ?>" class="btn btn-primary" target="<?php echo esc_attr($button2_target); ?>">
                                    <span><?php echo esc_html($button2_title); ?></span> <i class="fa-regular fa-arrow-right"></i>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php $delay += 100; ?>
                <?php 
                    endwhile; 
                endif; 
                ?>
            </div>
        <?php else: ?>
            <div class="row">
                <?php 
                $delay = 100;
                if( have_rows('ctatwobox_boxes','option') ): 
                    while(have_rows('ctatwobox_boxes','option')): the_row();
                ?>
                    <div class="col-12 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <div class="card-recruiters text-center">
                            <div class="profile-image mx-auto mb-4">
                                <?php if($img = get_sub_field('image')): ?>
                                    <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" class="rounded-circle">
                                <?php endif; ?>
                            </div>
                            <?php if($box_title = get_sub_field('title')): ?>
                                <h3><?php echo esc_html($box_title); ?></h3>
                            <?php endif; ?>
                            <?php if($desc = get_sub_field('content')): ?>
                                <p class="mb-4"><?php echo esc_html($desc); ?></p>
                            <?php endif; ?>
                            <div class="d-flex gap-3 justify-content-center">
                                <?php
                                    $button1 = get_sub_field('cta_button_1');
                                    if($button1):
                                        $button1_url = $button1['url'];
                                        $button1_title = $button1['title'] ? $button1['title'] : '';
                                        $button1_target = $button1['target'] ? $button1['target'] : '_self';
                                ?>
                                <a href="<?php echo esc_url($button1_url); ?>" class="btn btn-primary" target="<?php echo esc_attr($button1_target); ?>">
                                    <span><?php echo esc_html($button1_title); ?></span> <i class="fa-regular fa-arrow-right"></i>
                                </a>
                                <?php endif; ?>

                                <?php 
                                $button2 = get_sub_field('cta_button_2');
                                if($button2):
                                    $button2_url = $button2['url'];
                                    $button2_title = $button2['title'] ? $button2['title'] : '';
                                    $button2_target = $button2['target'] ? $button2['target'] : '_self';
                                ?>
                                <a href="<?php echo esc_url($button2_url); ?>" class="btn btn-primary" target="<?php echo esc_attr($button2_target); ?>">
                                    <span><?php echo esc_html($button2_title); ?></span> <i class="fa-regular fa-arrow-right"></i>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php $delay += 100; ?>
                <?php 
                    endwhile; 
                endif; 
                ?>
            </div>
        <?php endif; ?>        
    </div>
</section>