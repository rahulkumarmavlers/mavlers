<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'lorem' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<div class="row-wrap our-blogs-list">
				<?php while ( have_posts() ) : the_post(); ?>				
					<?php get_template_part( 'template-parts/flexible-sections/blog-card');?>				
				<?php endwhile;?>
			</div>

			<?php if ($wp_query->max_num_pages > 1) : ?>
				<nav class="pagination">
					<?php numeric_pagination(); ?>
				</nav>
			<?php endif; ?>

		<?php 
			else :
				get_template_part( 'template-parts/content', 'none' );
		endif;
		?>

	</div>
</section>

<?php
//get_sidebar();
get_footer();