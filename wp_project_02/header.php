<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lorem_ipsum
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<section id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'loremipsum' ); ?></a>
	<?php
	if ( is_single() ){
		$header_class = 'light-theme';
	} else {
		$header_class = get_field('menu_font').'-theme';
	}
	?>
	<header id="masthead" class="site-header <?php echo $header_class;?>">
		<div class="container">
			<div class="row align-items-center justify-content-between">
				
				<?php if ( get_field('main_logo', 'option') || get_field('main_logo_white', 'option') ): ?>
					<div class="col-6 col-md-auto logo-wrap">
						<a href="<?php echo apply_filters('wpml_home_url', get_home_url()); ?>" title="<?php echo bloginfo( 'name' ); ?>">							
							<?php
							$main_logo = get_field('main_logo', 'option');
							if($main_logo): ?>
								<img class="dark-logo" src="<?php echo $main_logo['url']; ?>" alt="<?php echo $main_logo['alt']; ?>" />
							<?php endif; ?>
							<?php
							$main_logo_white = get_field('main_logo_white', 'option');
							if($main_logo_white): ?>
								<img class="light-logo" src="<?php echo $main_logo_white['url']; ?>" alt="<?php echo $main_logo_white['alt']; ?>" />
							<?php endif; ?>							
						</a>
					</div>
				<?php endif; ?>

				<div class="col-6 col-md-auto menu-wrap me-lg-auto">
					<span class="menu-trigger">
						<span></span>
						<span></span>
					</span>
					<div class="menu-wrap-inner">
						<nav id="site-navigation" class="main-navigation">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
						</nav>
						<?php if ( get_field('contact_cta', 'option') || get_field('register_cta', 'option') ) : ?>
							<div class="d-block d-lg-none action-wrap">
								<div class="d-flex flex-wrap">
									<?php 
									$link = get_field('contact_cta', 'option');
									if( $link ): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										<a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
											<span><?php echo esc_html( $link_title ); ?></span>
											<i class="fa-regular fa-arrow-right"></i>
										</a>
									<?php endif; ?>
									<?php 
									$link = get_field('register_cta', 'option');
									if( $link ): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										<a class="btn btn-secondary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
											<span><?php echo esc_html( $link_title ); ?></span>
											<i class="fa-regular fa-arrow-right"></i>
										</a>
									<?php endif; ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
					
				</div>
				<?php if ( get_field('contact_cta', 'option') || get_field('register_cta', 'option') ) : ?>
					<div class="d-none d-lg-block col-lg-4 action-wrap">
						<div class="d-flex flex-wrap justify-content-end">
							<?php 
							$link = get_field('contact_cta', 'option');
							if( $link ): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
									<span><?php echo esc_html( $link_title ); ?></span>
									<i class="fa-regular fa-arrow-right"></i>
								</a>
							<?php endif; ?>
							<?php 
							$link = get_field('register_cta', 'option');
							if( $link ): 
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
								?>
								<a class="btn btn-secondary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
									<span><?php echo esc_html( $link_title ); ?></span>
									<i class="fa-regular fa-arrow-right"></i>
								</a>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
				
			</div>
		</div>
	</header><!-- #masthead -->