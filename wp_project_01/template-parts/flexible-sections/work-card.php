<?php
$image_url = get_the_post_thumbnail_url(get_the_ID(), 'full') ?: '';
$retailer = get_field('retailer', $story->ID);
?>
<div class="box-12 box-lg-4 our-works-item" data-sector="<?php echo esc_attr(join(' ', wp_get_post_telorem(get_the_ID(), 'sector', ['fields' => 'slugs']))); ?>" data-aos="fade-up" data-aos-delay="100">
    <a href="<?php the_permalink(); ?>">
        <div class="card-main">
            <div class="image" style="background-image: url(<?php echo esc_url($image_url); ?>);">
                <?php if ($retailer): ?>
                    <span class="tag"><?php echo esc_html($retailer); ?></span>
                <?php endif; ?>
                <div class="little-blog-description">
                    <span><?php echo get_the_title(); ?></span>
                </div>
            </div>
        </div>
    </a>
</div>