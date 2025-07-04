<div class="box-12 box-lg-4 our-blog-item" data-aos="fade-up" data-aos-delay="100">
    <a href="<?php echo esc_url(get_permalink()); ?>">
        <div class="card-main">
            <?php 
                $thumbnail_url = get_the_post_thumbnail_url() ?: get_template_directory_uri() . '/assets/default-thumbnail.jpg';
            ?>
            <div class="image" style="background-image: url('<?php echo esc_url($thumbnail_url); ?>');">
                <div class="little-blog-description">
                    <span><?php echo esc_html(get_the_title()); ?></span>
                </div>
            </div>
        </div>
    </a>
</div>