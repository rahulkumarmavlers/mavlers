<?php 
$image = get_sub_field('image');
if( !empty( $image ) ): ?>
    <section class="full-single-image" style="background-image: url(<?php echo esc_url($image['url']); ?>)" data-aos="fade-up"> </section>
<?php endif; ?>