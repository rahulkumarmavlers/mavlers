<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package lorem
 */

 get_header();
 ?>
	 <main id="primary" class="site-main">
		 <section class="error-404 not-found">
			 <header class="page-header">
				 <?php if( get_field('404_page_title', 'option') ) : ?>
					 <h1><?php echo esc_html_e(get_field('404_page_title','option')); ?></h1>
				 <?php endif; ?>
			 </header><!-- .page-header -->
			 <?php if ( get_field('404_content', 'option') ) : ?>
				 <div class="page-content">
					 <?php the_field('404_content', 'option'); ?>
					 <a class="cta-button" href="<?php echo get_site_url(); ?>">Back To Home</a>
				 </div>
			 <?php endif;?>			
		 </section><!-- .error-404 -->
	 </main><!-- #main -->
 <?php
 get_footer();