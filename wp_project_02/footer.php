<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lorem_ipsum
 */

?>

	<footer class="site-footer text-white space-y">
		<div class="container">
			<div class="row top-row">
				<!-- Logo and Social Media -->
				<div class="col-lg-3 mb-4">
					<?php if($footer_logo = get_field('footer_logo', 'option')): ?>
						<div class="footer-logo mb-4">
							<img src="<?php echo esc_url($footer_logo['url']); ?>" alt="<?php echo esc_attr($footer_logo['alt']); ?>" class="img-fluid">
						</div>
					<?php endif; ?>	
					<?php if(have_rows('social_links', 'option')): ?>
						<div class="social-links">
							<?php while(have_rows('social_links', 'option')): the_row(); ?>
								<a href="<?php echo esc_url(get_sub_field('profilepage_link')); ?>" class="social-link">
									<i class="<?php echo esc_attr(get_sub_field('social_media_icon')); ?>"></i>
								</a>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
				<?php
				// Array of footer menu fields to loop through
				$footer_menus = ['footer_menu_1', 'footer_menu_2', 'footer_menu_3'];				
				foreach($footer_menus as $footer_menu):
					if(get_field($footer_menu, 'option')):
						$menu_id = get_field($footer_menu, 'option');
						if($menu = wp_get_nav_menu_object($menu_id)): ?>
							<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
								<h3 class="footer-title"><?php echo esc_html($menu->name); ?></h3>
								<nav class="footer-nav">
									<ul class="footer-links">
										<?php
										wp_nav_menu([
											'menu' => $menu_id,
											'container' => false,
											'items_wrap' => '%3$s',
											'depth' => 1
										]);
										?>
									</ul>
								</nav>
							</div>
						<?php endif;
					endif;
				endforeach; ?>
			</div>

			<!-- Newsletter and Office Info -->
			<div class="row middle-row">
				<div class="col-md-8 col-lg-6 mb-4">
					<div class="newsletter-form">
						<?php if($newsletter_shortcode = get_field('newsletter_form_shortcode', 'option')): ?>
							<?php echo do_shortcode($newsletter_shortcode); ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-md-4 col-lg-3 mb-4">
					<div class="office-info">
						<?php if($office_title = get_field('office_address_title', 'option')): ?>
							<h3 class="footer-title"><?php echo esc_html($office_title); ?></h3>
						<?php endif; ?>
						<?php if($office_address = get_field('office_address', 'option')): ?>
							<p><?php echo $office_address; ?></p>
						<?php endif; ?>
					</div>
				</div>				
				<?php if(have_rows('awards_images', 'option')): ?>
					<div class="col-lg-3">
						<div class="awards">
							<?php while(have_rows('awards_images', 'option')): the_row(); ?>
								<?php if($award_image = get_sub_field('award_image')): ?>
									<img src="<?php echo esc_url($award_image['url']); ?>" alt="<?php echo esc_attr($award_image['alt']); ?>" class="award-img">
								<?php endif; ?>
							<?php endwhile; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>

			<!-- Awards and Copyright -->
			<div class="row bottom-row">
				<div class="col-md-6 ">
					<div class="footer-bottom-left">
						<?php if($copyright_text = get_field('footer_copyright_text', 'option')): ?>
							<p class="copyright"><?php echo do_shortcode($copyright_text); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-md-6 text-lg-end">
					<div class="footer-bottom-right">
						<?php if($privacy_menu = get_field('privacy_menu', 'option')): ?>
							<?php wp_nav_menu(array(
								'menu' => $privacy_menu,
								'container' => false,
								'menu_class' => 'menu'
							)); ?>
						<?php endif; ?>
					</div>
				</div>				
			</div>
		</div>
	</footer>

</section><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
