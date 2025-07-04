<section class="compliance-resources space-y">
    <div class="container">        
        <?php if ( get_sub_field('title') ): ?>
            <div class="section-header text-left" data-aos="fade-up">
                <div class="inner-wrap">
                    <h2><?php echo get_sub_field('title'); ?></h2>
                </div>
            </div>
        <?php endif; ?>
        <?php if( have_rows('accordian_content') ): ?>
        <div class="row">
            <div class="col-12">
                <div class="list-group">
                    <?php
                        $delay = 100;
                        while( have_rows('accordian_content') ) : the_row();
                            $title = get_sub_field('title');
                            $file = get_sub_field('download_file');
                    ?>
                            <?php if (!empty($file)): ?>
                            <a  href="<?php echo esc_url($file['url']); ?>"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                data-aos="fade-up"
                                data-aos-delay="<?php echo $delay; ?>"
                                target="_blank"
                            >
                                <?php echo esc_html($title); ?>                            
                                <img class="svg-convert" src="<?php echo get_template_directory_uri(); ?>/assets/images/download-icon-black.svg" alt="Download">                               
                            </a>
                            <?php else: ?>
                                <span
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                data-aos="fade-up"
                                data-aos-delay="<?php echo $delay; ?>"
                                >
                                <?php echo esc_html($title); ?>                            
                           
                            </span>
                            <?php endif; ?>
                    <?php
                        $delay += 50;
                    endwhile;?>                  
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>