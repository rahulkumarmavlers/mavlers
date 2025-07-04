<section class="peoples">
    <div class="container">
        <?php if( get_sub_field('title') ) : ?>
            <div class="row-wrap">
                <div class="box-12 section-heading text-center" data-aos="fade-up">
                    <div class="inner-wrap">
                        <h2><?php echo get_sub_field('title'); ?></h2>
                    </div>
                </div>
            </div>
        <?php endif; ?>    
        <?php
        $team_members = get_sub_field('people');
        if ($team_members): ?>
            <div class="row-wrap people-list">
                <?php foreach ($team_members as $post): 
                    setup_postdata($post);
                    $designation = get_field('designation');
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    if (!$image_url) {
                        $image_url = '';
                    }
                ?>
                    <div class="box-6 box-lg-4 people-item" data-aos="fade-up" data-aos-delay="100">
                        <a href="<?php the_permalink(); ?>">
                            <div class="card-main card-people">
                                <div class="image" style="background-image: url(<?php echo esc_url($image_url); ?>);">
                                    <div class="little-blog-description">
                                        <h4><?php the_title(); ?></h4>
                                        <p><?php echo esc_html($designation); ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); // Reset global post data ?>
            </div>
        <?php endif; ?>
    </div>
</section>