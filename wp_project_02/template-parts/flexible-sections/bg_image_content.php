<section class="center-over-content space-y">
    <?php 
    $bg_image = get_sub_field('background_image');
    $container_style = '';
    if (!empty($bg_image)) {
        $container_style = 'style="background-image: url(' . esc_url($bg_image['url']) . ')"';
    }
    ?>
    <div class="bg-media" <?php echo $container_style; ?>></div>
    <div class="container">
        <div class="content-box" data-aos="fade-up">
            <div class="inner-wrap">
                <?php $icon = get_sub_field('icon'); ?>
                <?php if (!empty($icon)): ?>
                    <div class="icon">
                        <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
                    </div>
                <?php endif; ?>
                <?php $title = get_sub_field('title'); ?>
                <?php if (!empty($title)): ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php $content = get_sub_field('content'); ?>
                <?php if (!empty($content)): ?>
                    <p><?php echo esc_html($content); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>