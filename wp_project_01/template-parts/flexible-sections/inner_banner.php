<?php 
// Check if background is set to "gradient"
$grclass = (get_sub_field('background') == "gradient") ? " has-gradient" : "";
?>
<section class="banner-section inner-banner<?php echo esc_attr($grclass); ?>">
    <div class="container">
        <div class="content-wrap" data-aos="fade-up">
            <h1>
                <?php 
                // Display icon before title if available
                $icon = get_sub_field('icon_before_title');
                if( $icon ): ?>
                    <img src="<?php echo esc_url($icon); ?>" alt="icon">
                <?php endif; ?>

                <?php 
                // Display custom title if 'title_type' is 'custom', otherwise default to 'Our Services'
                $custom_title = get_sub_field('custom_title');
                if( get_sub_field('title_type') == "custom" ): ?>
                    <?php if ($custom_title) {?>
                    <span><?php echo esc_html($custom_title); ?></span>
                    <?php } ?>
                <?php else: ?>
                    <span><?php echo get_the_title();?></span>
                <?php endif; ?>
            </h1>
        </div>
    </div>
</section>