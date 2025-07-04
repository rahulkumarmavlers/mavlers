<section class="our-works bg-gray has-pattern">
    <div class="container">
        <div class="row-wrap">
            <div class="box-12 section-heading text-center" data-aos="fade-up">
                <div class="inner-wrap">
                    <?php if( get_sub_field('title') ) : ?>
                        <h4><?php echo get_sub_field('title'); ?></h4>
                    <?php endif; ?>
                    <div class="select-wrap js-chosen-select">
                        <select name="sector_filter" id="sector_filter">
                            <option value="">Select a sector</option>
                            <?php
                            $sectors = get_telorem(['taxonomy' => 'sector', 'hide_empty' => true]);
                            foreach ($sectors as $sector) {
                                echo '<option value="' . esc_attr($sector->slug) . '">' . esc_html($sector->name) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-wrap our-works-list" id="our-works-container">
            <?php
            $args = [
                'post_type'      => 'work',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC'
            ];
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    include get_template_directory()."/template-parts/flexible-sections/work-card.php";
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>


<script>
jQuery(document).ready(function ($) {
    $('#sector_filter').on('change', function () {
        var selectedSector = $(this).val();

        $('.our-works-item').each(function () {
            var itemSectors = $(this).data('sector');

            if (selectedSector === "" || itemSectors.includes(selectedSector)) {
                $(this).fadeIn();
            } else {
                $(this).fadeOut();
            }
        });
    });
});
</script>