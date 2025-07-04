<section class="faq-section space-y">
  <div class="container">
    <div class="row align-items-start">
      <!-- Left: Heading -->
        <div class="col-12 col-lg-4 mb-4 mb-lg-0">
            <?php if( get_sub_field('subtitle') ) : ?>
                <p class="faq-label text-primary mb-2" style="font-weight:600;"><?php echo get_sub_field('subtitle'); ?></p>
            <?php endif; ?>
            <?php if( get_sub_field('title') ) : ?>
                <h2 class="faq-title mb-0"><?php echo get_sub_field('title'); ?></h2>
            <?php endif; ?>
        </div>
      <?php if ( have_rows('faqs') ) : ?>
        <div class="col-12 col-lg-8">
            <div class="faq-accordion">
                <?php while( have_rows('faqs') ) : the_row(); ?>
                    <div class="faq-item">
                        <div class="faq-question" role="button" tabindex="0">
                            <?php the_sub_field('question'); ?>
                            <span class="faq-icon"></span>
                        </div>
                        <div class="faq-answer">
                            <p><?php echo get_sub_field('answer'); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>