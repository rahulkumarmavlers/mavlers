<?php 
$images = get_sub_field('images'); 
$image_count = is_array($images) ? count($images) : 0;
$column_class = 'column-' . min($image_count, 3);
?>
<?php if ( have_rows('images') ) : ?>
    <section class="image-grid-detail <?php echo esc_attr($column_class); ?>">
        <div class="container small-container">
            <div class="image-grid-detail-wrap">
                <?php while( have_rows('images') ) : the_row(); ?>                
                    <?php 
                    $image = get_sub_field('image');
                    if( !empty( $image ) ): ?>
                        <div class="image-wrap" data-aos="fade-up" data-aos-delay="100">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                    <?php endif; ?>                
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>