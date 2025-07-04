<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package lorem_ipsum
 */

get_header();
?>
	<main id="primary" class="site-main">
		<section class="error-404 not-found">
			<div class="container">
				<div class="error-404-content">
					<?php if( get_field('404_page_title', 'option') ) : ?>
						<div class="big-text"><?php echo esc_html_e(get_field('404_page_title','option')); ?></div>
					<?php endif; ?>
					<?php if ( get_field('404_content', 'option') ) : ?>
						<h1 class="page-title"><?php echo get_field('404_content', 'option'); ?></h1>
			 		<?php endif;?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary" title=""><span>Go to Home</span> <i class="fa-regular fa-arrow-right"></i></a>
				</div><!-- .page-header -->
			</div>
		</section><!-- .error-404 -->
	</main><!-- #main -->
<?php
get_footer();