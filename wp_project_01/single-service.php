<?php 
get_header();
 while ( have_posts() ) : the_post();		
	 echo do_shortcode( '[flexlayout name=flexible_sections]' );		
 endwhile; // End of the loop.
get_footer();