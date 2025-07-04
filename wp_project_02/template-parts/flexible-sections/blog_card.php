<div class="blog-item">
    <div class="card-blog">
        <div class="card-media">
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('medium_large', ['alt' => get_the_title()]); ?>
                <?php else: ?>
                    <img src="https://via.placeholder.com/400x250?text=No+Image" alt="<?php the_title(); ?>">
                <?php endif; ?>
            </a>
        </div>
        <div class="card-body">
            <?php
            $category = get_the_category();
            if ($category) {
                echo '<div class="card-category">' . esc_html($category[0]->name) . '</div>';
            }
            ?>
            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <p class="card-text"><?php echo get_the_excerpt(); ?></p>
        </div>
    </div>
</div>