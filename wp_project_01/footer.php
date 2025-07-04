<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lorem
 */

?>
	<!-- site-footer section start -->
	<footer class="site-footer">
		<div class="container">
			<div class="row-wrap">
				<div class="box-12 box-lg-4 footer-contact">
					<div class="inner-wrap">
						<?php if ( get_field('contact_title', 'option') ) : ?>
							<h6><?php echo get_field('contact_title', 'option'); ?></h6>
						<?php endif; ?>
						<?php if ( have_rows('contact_address', 'option') ) : ?>						
							<?php while( have_rows('contact_address', 'option') ) : the_row(); ?>						
								<address>
									<?php if( get_sub_field('title') ) : ?>
										<div class="h5"><?php echo get_sub_field('title'); ?></div>
									<?php endif; ?>
									<?php if( get_sub_field('location') ) : ?>
										<?php echo get_sub_field('location'); ?>
									<?php endif; ?>
									<?php if( get_sub_field('phone') ) : ?>
										<div class="phone-email">
											<span>t:</span>
											<?php echo get_sanitized_phone_link(get_sub_field('phone')); ?>
										</div>
									<?php endif; ?>
									<?php if( get_sub_field('email') ) : ?>
										<div class="phone-email">
											<span>e:</span>
											<?php if ( get_sub_field('email') ) : echo get_sanitized_email_link(get_sub_field('email')); endif; ?>
										</div>
									<?php endif; ?>
								</address>
							<?php endwhile; ?>						
						<?php endif; ?>
					</div>
				</div>
				<div class="box-12 box-lg-4 footer-links">
					<div class="inner-wrap">
						<?php
						$menu_id = get_field('footer_column_2_menu', 'option');
						$menu = wp_get_nav_menu_object($menu_id);
						if ($menu) {
							$menu_title = $menu->name;
							echo '<h6>' . esc_html($menu_title) . '</h6>'; // Display the menu title
						}
						?>
						<div class="foo-nav">
							<ul>
								<?php
								wp_nav_menu(array(
									'menu' => $menu_id,
									'container' => false,
									'items_wrap' => '%3$s',
									'depth' => 1,
									'echo' => true,
								));
								?>
							</ul>
						</div>

						<?php 
						$image = get_field('column_2_bottom_logo','option');
						if( !empty( $image ) ): ?>
							<div class="bottom-image">
								<?php if ( get_field('column_2_bottom_logo_link', 'option') ) : ?>
									<a href="<?php echo get_field('column_2_bottom_logo_link', 'option'); ?>"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
								<?php else: ?>								
									<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="box-12 box-lg-4 footer-socials">
					<div class="inner-wrap">

						<div class="icon-wrap social-wrap">
							<?php if ( get_field('social_links_title', 'option') ) : ?>
								<h6><?php echo get_field('social_links_title', 'option'); ?></h6>
								<?php echo do_shortcode('[sociallinks]');?>
							<?php endif; ?>			
						</div>

						<?php 
						$awards_title = get_field('accreditations_awards_title', 'option');
						$awards = have_rows('accreditations_awards', 'option');
						$awards_link = get_field('awards_link', 'option');		
						if ($awards_title || $awards) : ?>
							<div class="icon-wrap awards-wrap">
								<?php if ($awards_title) : ?>
									<h6><?php echo esc_html($awards_title); ?></h6>
								<?php endif; ?>
								<?php if ($awards) : ?>
									<div class="award-wrap">
										<?php while (have_rows('accreditations_awards', 'option')) : the_row(); 
											$image = get_sub_field('logo');
											if (!empty($image)) : ?>
												<div class="award-item">
													 <?php if ( $awards_link ) { ?>
													 	<a href="<?php echo $awards_link;?>"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: 'Award logo'); ?>" /></a>
													 <?php  } else { ?>
														<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: 'Award logo'); ?>" />
													<?php } ?>
												</div>
											<?php endif; 
										endwhile; ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						

						<?php if ( get_field('privacy_menu_link', 'option') || get_field('web_design_by', 'option') ) : ?>
							<div class="copy-right">
								<?php
								$menu_id = get_field('privacy_menu_link', 'option');
								if ($menu_id) {
									wp_nav_menu(array('menu' => $menu_id));
								}
								?>

								<?php 
								$link = get_field('web_design_by', 'option');
								if( $link ): 
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
									?>
									<div class="design-by"><a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></div>
								<?php endif; ?>

							</div>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- site-footer section end -->

</section><!-- site-wraper end -->

<?php wp_footer(); ?>

</body>
</html>
