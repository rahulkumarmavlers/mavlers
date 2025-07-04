<section class="banner-section narrow-banner has-overlay">
    <?php
    $bg_image = get_sub_field('background_image');
    if ($bg_image):
    ?>
    <div class="bg-media" style="background-image: url(<?php echo esc_url($bg_image); ?>)"></div>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 " data-aos="fade-up" data-aos-delay="50">
                <div class="content-wrap">
                    <?php if (function_exists('custom_breadcrumb')) { custom_breadcrumb(); } ?>
                    <?php if ($title = get_sub_field('title')): ?>
                        <h1><?php echo $title; ?></h1>
                    <?php endif; ?>
                    <?php if ($intro = get_sub_field('content')): ?>
                        <h5><?php echo $intro; ?></h5>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12">
                <div class="share-icons-wrap">
                    <div class="share-ic">
                        <img class="svg-convert" src="<?php echo get_template_directory_uri(); ?>/assets/images/share-icon.svg" alt="icon">
                    </div>
                    <div class="share-list social-icons">
                        <ul>
                            <li><a href="https://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="Share on Facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="Share on Twitter"><i class="fa-brands fa-x-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="Share on LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>