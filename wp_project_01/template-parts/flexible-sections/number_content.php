<section class="list-detail-content">
    <div class="container small-container">
        <div class="content-wrap wysiwyg-content" data-aos="fade-up">
            <?php if( get_sub_field('title') ) : ?><h4><?php echo get_sub_field('title'); ?></h4><?php endif; ?>
            <?php if ( have_rows('number_content') ) : ?>
                <ul>
                    <?php while( have_rows('number_content') ) : the_row(); ?>        
                        <li><?php echo get_sub_field('title'); ?></li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
            <?php if( get_sub_field('content') ) : the_sub_field('content'); endif; ?>            
         </div>
    </div>
</section>