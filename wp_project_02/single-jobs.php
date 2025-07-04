<?php
get_header();
while ( have_posts() ) : the_post();?>

    <!-- Banner Section Start -->
    <section class="banner-section narrow-banner has-overlay">
        <div class="bg-media" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-6" data-aos="fade-up" data-aos-delay="50">
                    <div class="content-wrap">
                        <?php if(function_exists('custom_breadcrumb')): ?>
                            <?php custom_breadcrumb(); ?>
                        <?php endif; ?>
                        <h1><?php echo get_the_title(); ?></h1>							
                    </div>
                </div>
                <div class="col-12">
                    <div class="share-icons-wrap">
                        <div class="share-ic">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/share-icon.svg" alt="icon">
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
    <!-- Banner Section End -->


    <section class="single-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single-content-right wysiwyg-content">
                        <?php if(get_the_content()): ?>
                            <?php the_content(); ?>
                        <?php endif; ?>							
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php endwhile; ?>	
<?php
get_footer();
