<?php
/**
 * Template Name: Register Employees  Layout Template
 */
get_header(); ?>

<section class="banner-form-section">
    <div class="banner-section narrow-banner has-overlay">
        <div class="bg-media"></div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-12 col-md-8" data-aos="fade-up" data-aos-delay="50">
                    <div class="content-wrap">
                        <h1>Start Your Journey</h1>
                        <h5>Sign up in seconds, and our friendly team will connect you with top job opportunities</h5>
                        <div class="banner-tags-wrap d-flex justify-content-center align-items-center flex-wrap gap-4 my-4">
                            <div class="banner-tag">
                                <span class="icon-check"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="12" fill="#635BFF"/><path d="M7 13.5L10.5 17L17 10.5" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                <span class="tag-text">Fast</span>
                            </div>
                            <div class="banner-tag">
                                <span class="icon-check"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="12" fill="#635BFF"/><path d="M7 13.5L10.5 17L17 10.5" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                <span class="tag-text">Easy</span>
                            </div>
                            <div class="banner-tag">
                                <span class="icon-check"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="12" fill="#635BFF"/><path d="M7 13.5L10.5 17L17 10.5" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                <span class="tag-text">Tailored just for you!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <div class="form-wrap">
        <div class="form-box" data-aos="fade-up" data-aos-delay="150">
            <div class="section-header mb-5m text-center" data-aos="fade-up">
                <div class="inner-wrap">
                    <p><strong>Get Started</strong></p>
                    <h2>Start Hiring</h2>
                </div>
            </div>
            
            
            <?php echo do_shortcode('[gravityform id="3" title="true"]');?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
