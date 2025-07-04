<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lorem
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
<section id="page" class="site-wrapper">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'lorem' ); ?></a>
	<!-- site-header section start -->
	<header class="site-header">
		<div class="container">
			<div class="row-wrap">
				<?php $mainlogo=get_field('main_logo', 'option'); if ($mainlogo) : ?>
					<div class="box-12 box-md-6 box-lg-3 header-logo-wrap">
						<div class="inner-wrap">
							<a href="<?php echo site_url(); ?>" title="<?php echo $mainlogo['title'] ?>" class="header-logo">
								<img src="<?php echo $mainlogo['url']; ?>" alt="<?php echo $mainlogo['alt']; ?>" />
							</a>
						</div>
					</div>
				<?php endif; ?>
				<div class="box-12 box-md-6 box-lg-9 header-menu-wrap">
					<nav class="header-nav">
                        <div class="enumenu_ul">
                            <div class="inner-wrap">
								<nav id="site-navigation" class="navigation">							
										<?php
										wp_nav_menu(
											array(
												'theme_location' => 'menu-1',
												'menu_id'        => 'primary-menu',
											)
										);
										?>
								</nav><!-- #site-navigation -->			
                            </div>
                        </div>
                    </nav>
				</div>
			</div>
		</div>
	</header>
	<!-- site-header section end -->