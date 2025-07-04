<section  class="why-choose-lorem">
    <div class="container">
        <div class="why-choose-box" data-aos="fade-up">
            <?php if(get_sub_field('title')): ?>
                <h3><?php echo get_sub_field('title'); ?></h3>
            <?php endif; ?>
            <?php if(have_rows('features')): ?>
                <ul>
                    <?php while(have_rows('features')): the_row(); ?>
                        <li><?php echo get_sub_field('feature'); ?></li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>                
        </div>
    </div>
</section>