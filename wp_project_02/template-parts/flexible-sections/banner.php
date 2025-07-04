<section class="banner-section position-relative filter-banner has-overlay">
    <div class="bg-media" style="background-image: url(https://staging.project-progress.net/projects/loremipsum/wp-content/uploads/2025/05/getty-images-_-zbpTrVZTo-unsplash.webp)"></div>
    <div class="container">
        <div class="col-12">
            
            <?php if( get_sub_field('title') || get_sub_field('content') ) : ?>
                <div class="content-wrap text-center" data-aos="fade-up">
                    <?php if( get_sub_field('title') ) : ?><h1><?php echo get_sub_field('title'); ?></h1><?php endif; ?>
                    <?php if( get_sub_field('content') ) : ?><h5><?php echo get_sub_field('content'); ?></h5><?php endif; ?>
                </div>    
            <?php endif; ?>

            <div class="banner-filter position-relative" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-center banner-filter-header">
                    <div class="col-12 col-lg-6 banner-filter-content">
                        <p><strong>500+ amazing reviews</strong> and counting</p>
                    </div>
                    <div class="col-12 col-lg-6 banner-filter-images">
                        <div>
                            <a href="#">
                                <img src="https://staging.project-progress.net/projects/loremipsum/wp-content/uploads/2025/05/vivan-review.png" alt="">
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <img src="https://staging.project-progress.net/projects/loremipsum/wp-content/uploads/2025/05/google-review-1.png" alt="">
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <img src="https://staging.project-progress.net/projects/loremipsum/wp-content/uploads/2025/05/indeed-review.png" alt="">
                            </a>
                        </div>
                        <div>
                            <a href="#">
                                <img src="https://staging.project-progress.net/projects/loremipsum/wp-content/uploads/2025/05/winner-2024.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
               <?php include "form.php";?>
            </div>
        </div>
    </div>
</section>