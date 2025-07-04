<section class="defualt-detail space-y">
    <div class="container">
        <?php if(get_sub_field('title')): ?>
         <div class="section-heading text-center">
            <div class="inner-wrap">                
                <h1><strong><?php the_sub_field('title'); ?></strong></h1>                
            </div>
        </div>
        <?php endif; ?>
        <?php if( get_sub_field('content') ) : ?>
            <div class="defualt-detail-inner wysiwyg-content">
                <?php the_sub_field('content'); ?>
            </div>
        <?php endif; ?>
    </div>
</section>