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
 * @package lorem
 */

get_header();
?>
<section class="our-blogs bg-gray">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="row-wrap">
				<div class="box-12 section-heading">
					<div class="inner-wrap">

						<div class="field-wrap">
							<h5>Search</h5>
							<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
								<input type="search" name="s" id="search-input" placeholder="Search..." value="<?php echo get_search_query(); ?>">
							</form>
						</div>


						<div class="field-wrap select-wrap js-chosen-select">
						    <h5>Archive</h5>
						    <script>
							    function redirectToArchive(selectObj) {
							        var selectedValue = selectObj.value;
							        if (selectedValue) {
							            window.location.href = selectedValue;
							        }
							    }
							</script>
						    <select name="archive-dropdown" id="archive-dropdown" onchange="redirectToArchive(this);">
						        <option value="<?php echo get_permalink( get_option('page_for_posts') ); ?>"><?php echo esc_attr__('Select a month', 'textdomain'); ?></option>
						        <?php wp_get_archives([
						            'type' => 'monthly',
						            'format' => 'option',
						            'show_post_count' => false
						        ]); ?>
						    </select>
						</div>


					</div>
				</div>
			</div>

			<div class="row-wrap our-blogs-list">
				<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/flexible-sections/blog-card' );
					//the_title();
				endwhile;?>
			</div>
			<?php if ($wp_query->max_num_pages > 1) : ?>
				<nav class="pagination">
					<?php numeric_pagination(); ?>
				</nav>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();