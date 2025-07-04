 <div class="looking-filter">
    <div class="filter-header d-flex justify-content-between align-items-center">
        <?php if ( get_field('job_filter_title', 'option') ) : ?>
            <h4 class="mb-0"><?php echo get_field('job_filter_title', 'option'); ?></h4>
        <?php endif; ?>
        <?php 
        $link = get_field('job_filter_cta','option');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <div class="recruiting-link">
                <p class="mb-0"><?php if ( get_field('job_filter_cta_title', 'option') ) : echo get_field('job_filter_cta_title', 'option'); endif;?>
                    <a class="text-primary text-decoration-none" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                </p>
            </div>
        <?php endif; ?>
    </div>
    <form class="filter-form" action="<?php echo home_url('jobs-listing'); ?>" method="GET">
        <div class="row">
            <div class="col-12 col-lg-10">
                <div class="row g-3">
                    <?php
                    $taxonomies = array(
                        array('name' => 'Job Title', 'taxonomy' => 'jobtitle_categorys'),
                        array('name' => 'Speciality', 'taxonomy' => 'sector_categorys'), 
                        array('name' => 'Location', 'taxonomy' => 'county_categorys'),
                        array('name' => 'Employment Type', 'taxonomy' => 'employment_type')
                    );
                    foreach ($taxonomies as $taxonomy) {
                        if (taxonomy_exists($taxonomy['taxonomy'])) {
                            $terms = get_terms(array(
                                'taxonomy' => $taxonomy['taxonomy'],
                                'hide_empty' => true,
                                'orderby' => 'name',
                                'order' => 'ASC'
                            ));
                            if (!empty($terms) && !is_wp_error($terms)) { 
                                $ttname=strtolower(str_replace(' ', '', esc_attr($taxonomy['name'])));
                            ?>
                                <div class="col-12 col-md-6 col-lg-3">
                                    <select name="<?php echo $ttname; ?>" class="form-select py-3" aria-label="<?php echo $ttname; ?>">
                                        <option value="-1"><?php echo esc_html($taxonomy['name']); ?></option>
                                        <?php foreach ($terms as $term) {
                                            $current_value = isset($_GET[$ttname]) ? sanitize_text_field($_GET[$ttname]) : '';
                                            $selected = selected($current_value, $term->slug, false);
                                            echo sprintf(
                                                '<option value="%s" %s>%s</option>',
                                                esc_attr($term->slug),
                                                esc_attr($selected),
                                                esc_html($term->name)
                                            );
                                        } ?>
                                    </select>
                                </div>
                            <?php 
                            } else { 
                                echo '<div class="no-terms">No job titles available</div>';
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <input type="hidden" name="town" id="town" value="">
            <input type="hidden" name="min_salary" id="min_salary" value="">
            <input type="hidden" name="max_salary" id="max_salary" value="">
            <input type="hidden" name="date_posted" id="date_posted" value="">
            <div class="col-12 col-lg-2">
                <button id="search-btn" type="submit" class="btn btn-primary w-100 py-3 d-flex align-items-center justify-content-center gap-2">
                    Search
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </button>
            </div>
        </div>
    </form>
</div>

