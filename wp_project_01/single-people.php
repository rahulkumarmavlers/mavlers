<?php
get_header();
while ( have_posts() ) : the_post();
?>

<section class="people-detail">
    <div class="container">

        <div class="row-wrap">
            <div class="box-12 section-heading text-center">
                <div class="inner-wrap">
                    <h2><?php echo get_the_title();?></h2>
                    <?php if ( get_field('designation') ) : ?>
                        <h3><?php echo get_field('designation'); ?></h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row-wrap people-detail-wrap">
            <div class="box-12 box-lg-5 image-wrap">
                <div class="inner-wrap">
                    <?php 
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    if ($image_url) { ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
                    <?php } ?>

                    <?php 
                    $email = get_field('email');
                    $linkedin = get_field('linkedin_profile_url');
                    if ($linkedin || $email ) : ?>
                        <div class="people-social-wrap">
                            <?php if ($linkedin) : ?>
                                <a href="<?php echo esc_url($linkedin); ?>" class="people-social-item" target="_blank">
                                    <span class="social-icon">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </span>
                                    <?php
                                    $title = get_the_title();
                                    $words = explode(' ', trim($title));
                                    ?>
                                    <span>Connect with <?php echo $words[0]; ?></span>
                                </a>
                            <?php endif; ?>
                            <?php if ($email) : ?>
                                <a href="mailto:<?php echo esc_attr($email); ?>" class="people-social-item">
                                    <span class="social-icon">
                                        <i class="fa-light fa-envelope"></i>
                                    </span>
                                    <span><?php echo esc_html($email); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php 
            $content = get_the_content(); // Get post content
            if (!empty(trim($content))) : // Check if content exists
            ?>
                <div class="box-12 box-lg-7 content-wrap">
                    <div class="inner-wrap wysiwyg-content">
                        <?php the_content(); // Full post content ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php
endwhile;
get_footer();