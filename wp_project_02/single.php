<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lorem_ipsum
 */

get_header();
	while ( have_posts() ) : the_post();?>

		<!-- Banner Section Start -->
		<section class="banner-section narrow-banner has-overlay">
			<div class="bg-media" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-8 col-lg-6" data-aos="fade-up" data-aos-delay="50">
						<div class="content-wrap">
							<?php if(function_exists('custom_breadcrumb')): ?>
								<?php custom_breadcrumb(); ?>
							<?php endif; ?>
							<h1><?php echo get_the_title(); ?></h1>							
							<?php if(get_the_excerpt()): ?>
								<h5><?php echo get_the_excerpt(); ?></h5>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-12">
						<div class="share-icons-wrap">
							<div class="share-ic">
								<img src="<?php echo get_template_directory_uri();?>/assets/images/share-icon.svg" alt="icon">
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
			</div>
		</section>
		<!-- Banner Section End -->


		<section class="single-content">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-3 col-lg-2">
						<div class="single-content-left">
							<?php
							$author_id = get_the_author_meta('ID');
							$author_avatar = get_avatar_url($author_id, array('size' => 96));
							?>
							<img src="<?php echo esc_url($author_avatar); ?>" alt="<?php echo esc_attr(get_the_author()); ?>">
							<h6><?php the_author(); ?></h6>
							<p><?php echo get_the_date('d M Y'); ?></p>
						</div>
					</div>
					<div class="col-12 col-md-9 col-lg-10">
						<div class="single-content-right wysiwyg-content">
							<?php if(get_the_content()): ?>
								<?php the_content(); ?>
							<?php endif; ?>							
							<?php
							$post_tags = get_the_tags();
							if($post_tags): ?>
								<div class="content-tag">
									<ul>
										<?php foreach($post_tags as $tag): ?>
											<li><?php echo $tag->name; ?></li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- blogs-sections start -->
		<section class="blogs-section space-y">
			<div class="container">
				<div class="section-header mb-5m text-center" data-aos="fade-up">
					<div class="inner-wrap">
						<h2>More News</h2>
						<a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="cta-link"><span>View All News</span> <i class="fa-light fa-arrow-right-long"></i></a>
						<div class="slider-nav d-flex gap-4">
							<button class="blog-prev" aria-label="Previous">
								<i class="fa-regular fa-arrow-left"></i>
							</button>
							<button class="blog-next" aria-label="Next">
								<i class="fa-regular fa-arrow-right"></i>
							</button>
						</div>
					</div>
				</div>
				<div class="blogs-slider" data-aos="fade-up" data-aos-delay="100">
					<?php
					$categories = get_the_category();
					$cat_ids = [];
					foreach($categories as $cat) {
						$cat_ids[] = $cat->term_id;
					}
					$args = array(
						'category__in' => $cat_ids,
						'post__not_in' => array(get_the_ID()),
						'posts_per_page' => 4,
					);
					$related = new WP_Query($args);
					if($related->have_posts()):
						while($related->have_posts()): $related->the_post(); ?>
							<div class="blog-item">
								<div class="card-blog">
									<div class="card-media">
										<a href="<?php the_permalink(); ?>">
											<?php if(has_post_thumbnail()): ?>
												<?php the_post_thumbnail('medium'); ?>
											<?php endif; ?>
										</a>
									</div>
									<div class="card-body">
										<div class="card-category">
											<?php
											$post_cats = get_the_category();
											if(!empty($post_cats)) echo esc_html($post_cats[0]->name);
											?>
										</div>
										<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										<p class="card-text"><?php echo get_the_excerpt(); ?></p>
									</div>
								</div>
							</div>
						<?php endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>				
			</div>
		</section>
		<!-- blogs-sections end -->

		<?php 
		$marquee_icon = get_field('blog_single_cta_icon','option');
		$marquee_content = get_field('blog_single_cta','option');
		if( $marquee_icon || $marquee_content ) : ?>
		<section class="marquee-section get-in-touch">
			<div class="marquee-main" data-aos="fade-up">
				<?php for ($i = 0; $i < 5; $i++): ?>
				<div class="marquee">
					<div class="marquee-item">
						<?php 
						$link = $marquee_content;
						if( $link ): 
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
							<span class="marquee-text">
								<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							</span>
						<?php endif; ?>
						<img src="<?php echo $marquee_icon['url']; ?>" alt="<?php echo $marquee_icon['alt']; ?>">
					</div>
				</div>
				<?php endfor; ?>
			</div>
		</section>
		<?php endif; ?>

		<?php endwhile; ?>	
<?php
get_footer();
