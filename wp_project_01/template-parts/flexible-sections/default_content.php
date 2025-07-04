<?php if( get_sub_field('content') ) : ?>
    <section class="work-detail-content">
        <div class="container small-container">
            <div class="content-wrap wysiwyg-content">
                <?php the_sub_field('content'); ?>
            </div>
        </div>
    </section>
<?php endif; ?>