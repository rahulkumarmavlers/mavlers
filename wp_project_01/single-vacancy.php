<?php
get_header();
while ( have_posts() ) : the_post();?>

    <section class="banner-section inner-banner">
        <div class="container">
            <div class="content-wrap">
                <h1><span><?php echo get_the_title();?></span></h1>
            </div>
        </div>
    </section>
    <section class="job-description">
        <div class="container">

            <div class="row-wrap job-description-wrap">
                <div class="box-12 box-md-7 content-wrap">
                    <div class="inner-wrap wysiwyg-content">
                        <div class="heading-wrap">
                            <h3><?php echo get_the_title();?></h3>
                            <?php if ( get_field('rate') ) : ?>
                                <h4><?php echo get_field('rate'); ?></h4>
                            <?php endif; ?>                            
                        </div>
                        <?php the_content();?>             
                        <div class="button-wrap">
                            <?php $backurl = site_url('/flexible-jobs');?>
                            <a href="<?php echo esc_url($backurl); ?>" class="cta-button cta-outline">Back to jobs page</a>
                        </div>
                    </div>
                </div>
                <div class="box-12 box-md-5 content-wrap">
                    <div class="inner-wrap">
                        <div class="apply-box">
                            <h3>Apply for this role</h3>
                            <?php $apply_now_url = site_url('/apply-now');?>
                            <a href="<?php echo esc_url($apply_now_url); ?>" class="cta-button">Apply now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; // End of the loop.
get_footer();
?>