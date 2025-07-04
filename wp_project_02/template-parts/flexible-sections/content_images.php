<section class="content-4image-section space-y">
  <div class="container">
    <div class="row align-items-center">
      <!-- Left: Text Content -->
      <div class="col-12 col-lg-6 mb-4 mb-lg-0 content-wrap">
        <div class="inner-wrap wysiwyg-content">
            <?php if( get_sub_field('subtitle') ) : ?>
                <p class="text-primary mb-2" style="font-weight:600;"><?php echo get_sub_field('subtitle'); ?></p>
            <?php endif; ?>        
            <?php if( get_sub_field('title') ) : ?>
                <h2 class="mb-3"><?php echo get_sub_field('title'); ?></h2>
            <?php endif; ?>        
            <?php if( get_sub_field('content') ) : ?>
                <div class="content"><?php the_sub_field('content'); ?></div>
            <?php endif; ?>
        </div>
      </div>

      <?php if ( have_rows('images') ) : ?>
        <div class="col-12 col-lg-6 image-wrap">
            <div class="image-grid-4">
                <?php while( have_rows('images') ) : the_row(); ?>
                    <?php 
                    $image = get_sub_field('image');
                    if( !empty( $image ) ): ?>
                        <div class="img-item img-<?php echo get_row_index(); ?>">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div> 
        </div>
      <?php endif; ?>    

      
    </div>
  </div>
</section>