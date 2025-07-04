<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lorem_ipsum
 */

get_header();
?>
<section class="blog-intro space-y">
    <div class="container">
        <div class="section-header text-left" data-aos="fade-up">
            <div class="inner-wrap">
                <?php if (function_exists('custom_breadcrumb')) { custom_breadcrumb(); } ?>
                <?php 
                // Get the ID of the posts page
                $blog_page_id = get_option('page_for_posts');                
                if ( get_field('title', $blog_page_id) ) : ?>
                    <h1><?php echo get_field('title', $blog_page_id); ?></h1>
                <?php endif; ?>
                <?php if ( get_field('content', $blog_page_id) ) : ?>
                    <p><?php echo get_field('content', $blog_page_id); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php
        $latest = new WP_Query([
            'posts_per_page' => 1,
            'post_status' => 'publish'
        ]);
        if ( $latest->have_posts() ) :
            while ( $latest->have_posts() ) : $latest->the_post();
                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                if ( !$image_url ) {
                    $image_url = 'DEFAULT_IMAGE_URL';
                }
        ?>
        <div class="card-blog has-overlay" data-aos="fade-up" style="background-image: url(<?php echo esc_url($image_url); ?>);">
            <div class="card-content">
                <div class="tag"><i class="fa-solid fa-star"></i> Latest News</div>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="card-category">
								<?php
								$category = get_the_category();
								if ( ! empty( $category ) ) {
									echo esc_html( $category[0]->name );
								}
								?>
							</div>
                <p><?php echo get_the_excerpt(); ?></p>
            </div>
        </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</section>

<?php 
// Modify the main query to exclude the latest post
$latest_post = get_posts(array(
    'posts_per_page' => 1,
    'post_status' => 'publish'
));
$latest_id = !empty($latest_post) ? $latest_post[0]->ID : 0;

$args = array(
    'post__not_in' => array($latest_id),
    'post_status' => 'publish',
    'posts_per_page' => get_option('posts_per_page'),
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
    // Add orderby/order if needed from $_GET
);

if (isset($_GET['orderby'])) {
    $args['orderby'] = $_GET['orderby'];
    $args['order'] = ($_GET['orderby'] === 'title') ? 'ASC' : 'DESC';
}

$query = new WP_Query($args);
if ($query->have_posts()) : ?>
	<section class="blogs-list space-y">
    <div class="container">
        <div class="sort-by-dropdown d-flex justify-content-end" data-aos="fade-up" data-aos-delay="100">
            <select class="form-select w-auto" id="sort-by">
                <option value="" selected>Sort By</option>
                <option value="title" <?php echo (isset($_GET['orderby']) && $_GET['orderby'] == 'title') ? 'selected' : ''; ?>>Title</option>
                <option value="date" <?php echo (isset($_GET['orderby']) && $_GET['orderby'] == 'date') ? 'selected' : ''; ?>>Date</option>
            </select>
        </div>
        <script>
        jQuery(document).ready(function($) {
            $('#sort-by').on('change', function() {
                var sortBy = $(this).val();
                if(sortBy) {
                    var currentUrl = new URL(window.location.href);
                    currentUrl.searchParams.set('orderby', sortBy);
                    currentUrl.searchParams.set('order', 'ASC'); // Add ascending order parameter
                    window.location.href = currentUrl.toString();
                }
            });
        });
        </script>
		<div class="row blog-list-wrap">
			<?php while ($query->have_posts()) : $query->the_post(); ?>
				<div class="col-12 col-md-6 col-lg-4 blog-item" data-aos="fade-up">
					<div class="card-blog">
						<div class="card-media">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
							<?php else : ?>
								<img src="DEFAULT_IMAGE_URL" alt="Blog Image">
							<?php endif; ?>
						</div>
						<div class="card-body">
							<div class="card-category">
								<?php
								$category = get_the_category();
								if ( ! empty( $category ) ) {
									echo esc_html( $category[0]->name );
								}
								?>
							</div>
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<p class="card-text"><?php echo get_the_excerpt(); ?></p>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<div class="row filter-pagination" data-aos="fade-up">
			<div class="col-12 col-md-6 right-content">
				<div class="pagination-wrap">
					<?php
					echo paginate_links(array(
						'prev_text' => '<i class="fa-regular fa-arrow-left"></i>',
						'next_text' => '<i class="fa-regular fa-arrow-right"></i>'
					));
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
wp_reset_postdata();
endif; ?>

<?php
 $bg = get_field('ctatwobox_background_image','option');
 $subtitle = get_field('ctatwobox_subtitle','option');
 $title = get_field('ctatwobox_title','option');
 ?>
<section class="recruiters-section space-y"<?php if($bg): ?> style="background-image: url('<?php echo esc_url($bg); ?>')"<?php endif; ?>>
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <div class="inner-wrap">
                <?php if($subtitle): ?>
                    <p class="text-white"><strong><?php echo $subtitle; ?></strong></p>
                <?php endif; ?>
                <?php if($title): ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <?php 
            $delay = 100;
            if( have_rows('ctatwobox_boxes','option') ): 
                while(have_rows('ctatwobox_boxes','option')): the_row();
            ?>
                <div class="col-12 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                    <div class="card-recruiters text-center">
                        <div class="profile-image mx-auto mb-4">
                            <?php if($img = get_sub_field('image')): ?>
                                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" class="rounded-circle">
                            <?php endif; ?>
                        </div>
                        <?php if($box_title = get_sub_field('title')): ?>
                            <h3><?php echo esc_html($box_title); ?></h3>
                        <?php endif; ?>
                        <?php if($desc = get_sub_field('content')): ?>
                            <p class="mb-4"><?php echo esc_html($desc); ?></p>
                        <?php endif; ?>
                        <div class="d-flex gap-3 justify-content-center">
                            <?php
                                $button1 = get_sub_field('cta_button_1');
                                if($button1):
                                    $button1_url = $button1['url'];
                                    $button1_title = $button1['title'] ? $button1['title'] : '';
                                    $button1_target = $button1['target'] ? $button1['target'] : '_self';
                            ?>
                            <a href="<?php echo esc_url($button1_url); ?>" class="btn btn-primary" target="<?php echo esc_attr($button1_target); ?>">
                                <span><?php echo esc_html($button1_title); ?></span> <i class="fa-regular fa-arrow-right"></i>
                            </a>
                            <?php endif; ?>

                            <?php 
                            $button2 = get_sub_field('cta_button_2');
                            if($button2):
                                $button2_url = $button2['url'];
                                $button2_title = $button2['title'] ? $button2['title'] : '';
                                $button2_target = $button2['target'] ? $button2['target'] : '_self';
                            ?>
                            <a href="<?php echo esc_url($button2_url); ?>" class="btn btn-primary" target="<?php echo esc_attr($button2_target); ?>">
                                <span><?php echo esc_html($button2_title); ?></span> <i class="fa-regular fa-arrow-right"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php $delay += 100; ?>
            <?php 
                endwhile; 
            endif; 
            ?>
        </div>
    </div>
</section>	
<?php
get_footer();