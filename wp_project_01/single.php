<?php
get_header();
	while ( have_posts() ) : the_post();?>
   
		<section class="blog-inner-banner">
			<div class="container">
				<div class="content-wrap text-center">
					<h1><?php the_title(); ?></h1>
					<p> Posted in | <?php echo get_the_date('jS F Y'); ?> | By <?php the_author(); ?> </p>
					<?php 
					$image = get_field('banner_image');
					if( !empty( $image ) ): ?>
						<figure>
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						</figure>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<?php if( get_the_content() ) : ?>
			<section class="work-detail-content">
				<div class="container small-container">
					<div class="content-wrap wysiwyg-content">
						<?php echo wpautop( htmlspecialchars_decode( get_the_content() ) ); ?>
					</div>
				</div>
			</section>
		<?php else:
			echo do_shortcode( '[flexlayout name=flexible_sections]' );
		endif; ?>

		
		
		<section class="social-share">
			<div class="container small-container">
				<div class="icon-wrap social-wrap">
					<p>Share</p>
					<ul class="social-share">
						<li>
							<a href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>&url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="nofollow noopener noreferrer">
								<i class="fa-brands fa-x-twitter"></i>
							</a>
						</li>
						<li>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="nofollow noopener noreferrer">
								<i class="fa-brands fa-facebook-f"></i>
							</a>
						</li>
						<li>
							<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="nofollow noopener noreferrer">
								<i class="fa-brands fa-linkedin-in"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</section>

		<?php
		$featured_posts = get_field('related_blogs');
		if( $featured_posts ): ?>
			<section class="related-blogs">
				<div class="container small-container">
					<div class="heading"><p>Read related articles</p></div>
	 				<div class="row-wrap our-blogs-list">
						<?php foreach( $featured_posts as $post ): setup_postdata($post); ?>
							<?php get_template_part( 'template-parts/flexible-sections/blog-card' );?>
						<?php endforeach; ?>
					</div>
					<?php wp_reset_postdata(); ?>
				</div>		
			</section>
		<?php endif; ?>


	<?php endwhile; // End of the loop.
get_footer();
?>