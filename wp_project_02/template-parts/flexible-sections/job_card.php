<?php
    $town  = get_field('town');
    $county = get_field('county');
    $country = get_field('country');
    $location = '';
    if (!empty($town)) {
        $location .= $town;
    }
    if (!empty($county)) {
        $location .= !empty($location) ? ', ' . $county : $county;
    }
    if (!empty($country)) {
        $location .= !empty($location) ? ', ' . $country : $country;
    }
    $sectors = get_the_terms(get_the_ID(), 'sector_categorys');
    $sectors_list = '';
    if ($sectors && !is_wp_error($sectors)) {
        $sector_names = wp_list_pluck($sectors, 'name');
        $sectors_list = implode(', ', $sector_names);
    }
    $type      = get_field('employment_type');
    $schedule  = get_field('job_schedule');
    $time      = get_field('job_time');    
?>
<div class="card-jobs">
    <?php
    $created_date = get_field('created_at');
    if ($created_date) {
        $date = new DateTime($created_date);
        $now = new DateTime();
        $interval = $now->diff($date);
        if ($interval->m < 1) {
            echo '<div class="card-badge">New</div>';
        }
    }
    ?>
    <h3 class="job-title"><?php the_title(); ?></h3>
    <ul class="job-info">
        <?php if ($location): ?>
            <li>
                <img src="<?php echo site_url();?>/wp-content/uploads/2025/05/job-location-icon.svg" alt="icon">
                <span><strong>Location:</strong> <?php echo esc_html($location); ?></span>
            </li>
        <?php endif; ?>
        <?php if ($sectors_list): ?>
            <li>
                <img src="<?php echo site_url();?>/wp-content/uploads/2025/05/job-Specialty-icon.svg" alt="icon">
                <span><strong>Specialty:</strong> <?php echo esc_html($sectors_list); ?></span>
            </li>
        <?php endif; ?>
        <?php if ($type): ?>
            <li>
                <img src="<?php echo site_url();?>/wp-content/uploads/2025/05/job-type-icon.svg" alt="icon">
                <span><strong>Type:</strong> <?php echo esc_html($type); ?></span>
            </li>
        <?php endif; ?>
        <?php if ($schedule): ?>
            <li>
                <img src="<?php echo site_url();?>/wp-content/uploads/2025/05/job-Schedule-icon.svg" alt="icon">
                <span><strong>Schedule:</strong> <?php echo esc_html($schedule); ?></span>
            </li>
        <?php endif; ?>
        <?php if ($time): ?>
            <li>
                <img src="<?php echo site_url();?>/wp-content/uploads/2025/05/job-time-icon.svg" alt="icon">
                <span><strong>Time:</strong> <?php echo esc_html($time); ?></span>
            </li>
        <?php endif; ?>
    </ul>
    <div class="card-actions">
        <a href="<?php the_permalink(); ?>" class="btn btn-primary"><span>Read More</span> <i class="fa-regular fa-arrow-right"></i></a>
        <a href="<?php echo site_url(); ?>/register-employees" class="btn btn-secondary"><span>Apply Now</span> <i class="fa-regular fa-arrow-right"></i></a>
        <!-- <button type="button" class="btn-share"><i class="fa-light fa-share-nodes"></i></button>    -->
        <div class="share-icons-wrap btn-share">
            <div class="share-ic">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/share-icon.svg" alt="icon">
            </div>
            <div class="share-list social-icons">
                <ul>
                    <li><a href="https://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="Share on Facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="Share on Twitter"><i class="fa-brands fa-x-twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="Share on LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>    
    </div>
</div>