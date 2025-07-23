<?php
/**
 * Plugin Name: Elementor All in One Widget
 * Description: Auto embed any embbedable content from external URLs into Elementor.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-oembed-widget
 *
 * Elementor tested up to: 3.7.0
 * Elementor Pro tested up to: 3.7.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Register All in One Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_all_in_one_widget($widgets_manager)
{
    require_once(__DIR__.'/widgets/home-hero-banner.php');
    require_once(__DIR__.'/widgets/simple-content-cards-slider.php');
    require_once(__DIR__.'/widgets/image-gallery-widget.php');
    require_once(__DIR__.'/widgets/logos-gallery-widget.php');
    require_once(__DIR__.'/widgets/slider-simple-cards-widget.php');
    require_once(__DIR__.'/widgets/tabs-video-gallery-test.php'); 
    require_once(__DIR__.'/widgets/checkmark-cards.php');
    require_once(__DIR__.'/widgets/cards-icon.php');
    require_once(__DIR__.'/widgets/promo-blog-widget.php');
    require_once(__DIR__.'/widgets/tabs-with-cards.php');
    require_once(__DIR__.'/widgets/tabs-simple-content.php');
    require_once(__DIR__.'/widgets/slider-timeline-widget.php');
    require_once(__DIR__.'/widgets/slider-cards-widget.php');
    require_once(__DIR__.'/widgets/slider-team-widget.php');
    require_once(__DIR__.'/widgets/carousel-image-gallery.php');
    require_once(__DIR__.'/widgets/tabs-case-studies.php');
    require_once(__DIR__.'/widgets/leadership-team-widget.php');
    require_once(__DIR__.'/widgets/featured-posts-widget.php');
    require_once(__DIR__.'/widgets/interactive-graphic.php');
    
    $widgets_manager->register(new \Elementor_Home_Hero_Banner_Widget());
    $widgets_manager->register(new \Elementor_Content_Cards_Slider());
    $widgets_manager->register(new \Elementor_Image_Gallery_Widget());
    $widgets_manager->register(new \Elementor_Logos_Gallery_Widget());
    $widgets_manager->register(new \Elementor_Slider_Simple_Cards_Widget());
    $widgets_manager->register(new \Elementor_Tabs_Video_Gallery_Test_Widget());
    $widgets_manager->register(new \Elementor_Checkmark_Cards_Widget());
    $widgets_manager->register(new \Elementor_Cards_Icon_Widget());
    $widgets_manager->register(new \Elementor_Promo_Blogs_Widget());
    $widgets_manager->register(new \Elementor_Tabs_Cards_Widget());
    $widgets_manager->register(new \Elementor_Tabs_Simple_Content_Widget());
    $widgets_manager->register(new \Elementor_Slider_Timeline_Widget());
    $widgets_manager->register(new \Elementor_Slider_Cards_Widget());
    $widgets_manager->register(new \Elementor_Slider_Team_Widget());
    $widgets_manager->register(new \Elementor_Carousel_Image_Gallery());
    $widgets_manager->register(new \Elementor_Tabs_Case_Studies_Widget());
    $widgets_manager->register(new \Elementor_Leadership_Widget());
    $widgets_manager->register(new \Eeatured_Featured_Posts_Widget());
    $widgets_manager->register(new \Eeatured_Interactive_Graphic_Widget());
}

add_action('elementor/widgets/register', 'register_all_in_one_widget');

function custom_slider_widget_scripts()
{
    wp_enqueue_style('widget-style', plugin_dir_url(__FILE__).'/assets/css/widget-style.css');
    wp_enqueue_style('custom-slider-style', plugin_dir_url(__FILE__).'/assets/css/sliderstyle.css');
    wp_enqueue_script('custom-slider-script', plugin_dir_url(__FILE__).'assets/js/sliderscript.js', array('jquery'), '1.0', true);
    //wp_enqueue_script('custom-new-script', plugin_dir_url(__FILE__).'assets/js/custom.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'custom_slider_widget_scripts');