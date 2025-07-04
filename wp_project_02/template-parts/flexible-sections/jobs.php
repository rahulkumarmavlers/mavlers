<!-- Banner Section Start -->
<section class="banner-section inner-filter-banner ">
    <?php if( get_sub_field('banner_background_image') ) : ?>
        <div class="bg-media" style="background-image: url(<?php echo get_sub_field('banner_background_image'); ?>)"></div>
    <?php endif; ?>
    <div class="container">
         <div class="banner-filter position-relative">            
            <?php include "form.php"; ?>
        </div>
    </div>
</section>
<!-- Banner Section End -->
<section class="job-filter-section space-y">
    <div class="container">
        <div class="row job-filter-wrap">
            <div class="col-12 col-lg-4 filter-sidebar">
                <div class="job-sidebar-filter">
                    <h4>Filter your search</h4>
                    <div class="filter-item">
                        <strong>Salary Range</strong>
                        <div class="filter-content">
                            <div class="mt-2 mb-2">
                                <label class="form-label mb-1">From</label>
                                <select class="form-select py-3" id="salary-min" name="salary_min">
                                    <option value="">Select minimum</option>
                                    <?php
                                    $salary_options = array(
                                        '2000' => '£2,000',
                                        '5000' => '£5,000', 
                                        '10000' => '£10,000',
                                        '15000' => '£15,000',
                                        '20000' => '£20,000',
                                        '25000' => '£25,000',
                                        '30000' => '£30,000',
                                        '35000' => '£35,000',
                                        '40000' => '£40,000',
                                        '45000' => '£45,000',
                                        '50000' => '£50,000',
                                        '55000' => '£55,000',
                                        '60000' => '£60,000',
                                        '65000' => '£65,000',
                                        '70000' => '£70,000',
                                        '75000' => '£75,000',
                                        '80000' => '£80,000',
                                        '85000' => '£85,000',
                                        '90000' => '£90,000',
                                        '95000' => '£95,000',
                                        '100000' => '£100,000',

                                    );
                                    foreach($salary_options as $value => $label) {
                                        $selected = (isset($_GET['min_salary']) && $_GET['min_salary'] == $value) ? ' selected' : '';
                                        echo '<option value="' . esc_attr($value) . '"' . $selected . '>' . esc_html($label) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-label mb-1">To</label>
                                    <select class="form-select py-3" id="salary-max" name="salary_max">
                                        <option value="">Select maximum</option>
                                        <?php
                                        $salary_options = array(
                                            '2000' => '£2,000',
                                            '5000' => '£5,000', 
                                            '10000' => '£10,000',
                                            '15000' => '£15,000',
                                            '20000' => '£20,000',
                                            '25000' => '£25,000',
                                            '30000' => '£30,000',
                                            '35000' => '£35,000',
                                            '40000' => '£40,000',
                                            '45000' => '£45,000',
                                            '50000' => '£50,000',
                                            '55000' => '£55,000',
                                            '60000' => '£60,000',
                                            '65000' => '£65,000',
                                            '70000' => '£70,000',
                                            '75000' => '£75,000',
                                            '80000' => '£80,000',
                                            '85000' => '£85,000',
                                            '90000' => '£90,000',
                                            '95000' => '£95,000',
                                            '100000' => '£100,000',
                                        );
                                        foreach($salary_options as $value => $label) {
                                            $selected = (isset($_GET['max_salary']) && $_GET['max_salary'] == $value) ? ' selected' : '';
                                            echo '<option value="' . esc_attr($value) . '"' . $selected . '>' . esc_html($label) . '</option>';
                                        }
                                        ?>
                                    </select>                
                            </div>
                        </div>
                    </div>
                    <div class="filter-item">
                        <strong>Date Posted</strong>
                        <div class="filter-content">
                            <div class="mt-2">
                                <select id="date_posted_select" class="form-select py-3" name="date_posted">
                                    <option value="">Select Date Posted</option>
                                    <?php
                                    $date_options = array(
                                        'today' => 'Today',
                                        'week' => 'Last 7 days',
                                        'month' => 'Last 30 days'
                                    );
                                    foreach($date_options as $value => $label) {
                                        $selected = (isset($_GET['date_posted']) && $_GET['date_posted'] == $value) ? ' selected' : '';
                                        echo '<option value="' . esc_attr($value) . '"' . $selected . '>' . esc_html($label) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                  
                    <?php 
                    // Get location/town taxonomy terms
                    $locations = get_terms(array(
                        'taxonomy' => 'town_categorys',
                        'hide_empty' => true,
                    ));
                    if($locations && !is_wp_error($locations)) : ?>
                    <div class="filter-item">
                        <strong>Town</strong>
                        <div class="filter-content">
                            <div class="mt-2">
                                <?php
                                // Safely decode the JSON string from $_GET
                                $selected_towns = [];
                                if (isset($_GET['town']) && !empty($_GET['town'])) {
                                    $decoded = json_decode(stripslashes($_GET['town']), true);
                                    if (is_array($decoded)) {
                                        $selected_towns = $decoded;
                                    }
                                }
                                foreach($locations as $location) { 
                                $location_slug = esc_attr($location->slug);
                                $checked = in_array($location->slug, $selected_towns) ? ' checked' : '';
                                ?>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" 
                                        type="checkbox" 
                                        name="locationtown[]" 
                                        id="<?php echo $location_slug; ?>" 
                                        value="<?php echo $location_slug; ?>"<?php echo $checked; ?>>
                                    <label class="form-check-label" for="<?php echo $location_slug; ?>">
                                        <?php echo esc_html($location->name); ?>
                                    </label>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-lg-8 filter-result">
                <div class="inner-wrap">
                    <?php if( get_sub_field('title') ) : ?>
                        <h4><?php echo get_sub_field('title'); ?></h4>
                    <?php endif; ?>
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    
                    $args = array(
                        'post_type' => 'jobs',
                        'post_status' => 'publish',
                        'posts_per_page' => 20,
                        'paged' => $paged
                    );
                    $taxonomies = array(
                        array('name' => 'Job Title', 'taxonomy' => 'jobtitle_categorys'),
                        array('name' => 'Speciality', 'taxonomy' => 'sector_categorys'), 
                        array('name' => 'Location', 'taxonomy' => 'county_categorys'),
                        array('name' => 'Employment Type', 'taxonomy' => 'employment_type')
                    );

                    foreach($taxonomies as $taxonomy) {
                        $ttname=strtolower(str_replace(' ', '', esc_attr($taxonomy['name'])));
                        if(isset($_GET[$ttname]) && $_GET[$ttname] != '-1') {
                            $args['tax_query'][] = array(
                                'taxonomy' => $taxonomy['taxonomy'],
                                'field' => 'slug',
                                'terms' => $_GET[$ttname]
                            );
                        }
                    }

                    if (isset($_GET['town']) && !empty($_GET['town'])) {                         
                        // Validate JSON format
                        $locations = json_decode(stripslashes($_GET['town']), true);
                        if (is_array($locations) && !empty($locations)) {
                            // Verify taxonomy exists
                            if (taxonomy_exists('town_categorys')) {
                                // Add to tax query
                                $args['tax_query'][] = array(
                                    'taxonomy' => 'town_categorys',
                                    'field' => 'slug',
                                    'terms' => $locations,
                                    'operator' => 'IN'
                                );
                            }
                        }
                    }

                    // Sanitize and validate salary input
                    $salary_min = isset($_GET['min_salary']) ? floatval($_GET['min_salary']) : 0;
                    $salary_max = isset($_GET['max_salary']) ? floatval($_GET['max_salary']) : 0;

                    // Only add meta_query if at least one salary value is valid
                    if ($salary_min > 0 || $salary_max > 0) {
                        $args['meta_query'] = isset($args['meta_query']) ? $args['meta_query'] : [];
                        
                        // Use 'relation' => 'AND' to combine conditions
                        $args['meta_query']['relation'] = 'AND';
                        
                        // Add min salary condition: job's min <= user's max
                        if ($salary_min > 0) {
                            $args['meta_query'][] = array(
                                'key' => 'salary_min',
                                'value' => $salary_min,
                                'type' => 'NUMERIC',
                                'compare' => '<='
                            );
                        }
                        
                        // Add max salary condition: job's max >= user's min
                        if ($salary_max > 0) {
                            $args['meta_query'][] = array(
                                'key' => 'salary_max',
                                'value' => $salary_max,
                                'type' => 'NUMERIC',
                                'compare' => '>='
                            );
                        }
                    }

                    // Check for date posted filter
                    if (isset($_GET['date_posted']) && !empty($_GET['date_posted'])) {
                        $date_posted = sanitize_text_field($_GET['date_posted']);
                        $today = current_time('Y-m-d H:i:s');
                        
                        $args['meta_query'] = isset($args['meta_query']) ? $args['meta_query'] : [];
                        $args['meta_query']['relation'] = 'AND';

                        switch($date_posted) {
                            case 'today':
                                $compare_date = date('Y-m-d H:i:s', strtotime('-1 day', strtotime($today)));
                                break;
                            case 'week':
                                $compare_date = date('Y-m-d H:i:s', strtotime('-7 days', strtotime($today)));
                                break;
                            case 'month':
                                $compare_date = date('Y-m-d H:i:s', strtotime('-30 days', strtotime($today)));
                                break;
                            default:
                                $compare_date = null;
                        }

                        if ($compare_date) {
                            $args['meta_query'][] = array(
                                'key' => 'created_at',
                                'value' => $compare_date,
                                'type' => 'DATETIME',
                                'compare' => '>='
                            );
                        }
                    }
                    //echo "<pre>";print_r($args);echo "</pre>";
                    $jobs_query = new WP_Query($args);
                    ?>
                    
                    <div class="total-jobs">
                        <?php if($jobs_query->found_posts > 0): ?>
                            Showing <?php echo esc_html($jobs_query->found_posts); ?> Jobs
                        <?php else: ?>
                            No jobs found matching your criteria
                        <?php endif; ?>
                    </div>
                    <div class="row jobs-card-list">
                        <?php 
                        if($jobs_query->have_posts()) :
                            while($jobs_query->have_posts()) : $jobs_query->the_post();?>
                            <div class="col-12 col-md-6 job-card-item"> 
                                <?php include "job_card.php"; ?>
                            </div>
                        <?php endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                    <?php if($jobs_query->found_posts > 0): ?>
                    <div class="row filter-pagination">
                        <div class="col-12 col-xl-6 left-content text-xl-start">
                            <strong>
                                <?php
                                $start = (($paged - 1) * 20) + 1;
                                $end = min($jobs_query->found_posts, $paged * 20);
                                echo "{$start} - {$end} of {$jobs_query->found_posts} jobs";
                                ?>
                            </strong>
                        </div>
                        <div class="col-12 col-xl-6 right-content text-xl-end">
                            <div class="pagination-wrap">
                                <?php
                                echo paginate_links(array(
                                    'total' => $jobs_query->max_num_pages,
                                    'current' => $paged,
                                    'prev_text' => '<i class="fa-regular fa-arrow-left"></i>',
                                    'next_text' => '<i class="fa-regular fa-arrow-right"></i>',
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Function to update hidden field with checked town values
    function updateHiddenField() {
        const checkboxes = document.querySelectorAll('input[name="locationtown[]"]:checked');
        const selected = Array.from(checkboxes).map(cb => cb.value);
        const hiddenField = document.getElementById('town');
        if (hiddenField) {
            hiddenField.value = JSON.stringify(selected);
        }
    }

    // Attach event to town checkboxes
    const checkboxes = document.querySelectorAll('input[name="locationtown[]"]');
    checkboxes.forEach(cb => cb.addEventListener('change', updateHiddenField));
    updateHiddenField(); // Initial call

    // Salary min/max selectors
    const minSelect = document.getElementById('salary-min');
    const maxSelect = document.getElementById('salary-max');

    function updateRange() {
        const minVal = minSelect.value;
        const maxVal = maxSelect.value;

        if (minVal && maxVal) {
            document.getElementById('min_salary').value = minVal;
            document.getElementById('max_salary').value = maxVal;
        }

        Array.from(maxSelect.options).forEach(option => {
            if (option.value && minVal && parseInt(option.value) < parseInt(minVal)) {
                option.disabled = true;
            } else {
                option.disabled = false;
            }
        });
    }

    if (minSelect && maxSelect) {
        minSelect.addEventListener('change', updateRange);
        maxSelect.addEventListener('change', updateRange);

        // Optional: bind to Select2 event if using Select2
        $(minSelect).on('select2:select', updateRange);
        $(maxSelect).on('select2:select', updateRange);
    }
});
document.addEventListener('DOMContentLoaded', function () {
    const dateSelect = document.querySelector('select[name="date_posted"]');
    const hiddenDate = document.getElementById('date_posted');

    function updateDateField() {
        if (dateSelect && hiddenDate) {
            hiddenDate.value = dateSelect.value;
        }
    }

    if (typeof jQuery !== 'undefined' && dateSelect) {
        // Initialize Select2 (ensure it’s applied)
        jQuery(dateSelect).select2({
            width: '100%' // optional
        });

        // Update hidden field on both native and Select2 events
        jQuery(dateSelect).on('change select2:select', updateDateField);

        // Also set it on load (after potential pre-fill)
        setTimeout(updateDateField, 100); // short delay ensures Select2 is initialized
    }
});
</script>
