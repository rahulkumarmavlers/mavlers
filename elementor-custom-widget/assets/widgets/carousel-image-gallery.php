<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor Image Gallery Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Carousel_Image_Gallery extends \Elementor\Widget_Base
{

  /**
   * Get widget name.
   *
   * Retrieve Image Gallery widget name.
   *
   * @since 1.0.0
   * @access public
   * @return string Widget name.
   */
  public function get_name()
  {
    return 'carousel_image_gallery';
  }

  /**
   * Get widget title.
   *
   * Retrieve Image Gallery widget title.
   *
   * @since 1.0.0
   * @access public
   * @return string Widget title.
   */
  public function get_title()
  {
    return esc_html__('Carousel Image Gallery');
  }

  /**
   * Get widget icon.
   *
   * Retrieve Image Gallery widget icon.
   *
   * @since 1.0.0
   * @access public
   * @return string Widget icon.
   */
  public function get_icon()
  {
    return 'eicon-code';
  }

  /**
   * Get custom help URL.
   *
   * Retrieve a URL where the user can get more information about the widget.
   *
   * @since 1.0.0
   * @access public
   * @return string Widget help URL.
   */
  public function get_custom_help_url()
  {
    return 'https://developers.elementor.com/docs/widgets/';
  }

  /**
   * Get widget categories.
   *
   * Retrieve the list of categories the Image Gallery widget belongs to.
   *
   * @since 1.0.0
   * @access public
   * @return array Widget categories.
   */
  public function get_categories()
  {
    return ['general'];
  }

  /**
   * Get widget keywords.
   *
   * Retrieve the list of keywords the Image Gallery widget belongs to.
   *
   * @since 1.0.0
   * @access public
   * @return array Widget keywords.
   */
  public function get_keywords()
  {
    return ['carousel', 'image', 'gallery'];
  }

  /**
   * Register Image Gallery widget controls.
   *
   * Add input fields to allow the user to customize the widget settings.
   *
   * @since 1.0.0
   * @access protected
   */
  protected function register_controls()
  {

    $this->start_controls_section(
      'section_content',
      [
        'label' => __('Header', 'elementor-image-gallery'),
      ]
    );

    $this->add_control(
      'gallery',
      [
        'label' => esc_html__('Add Images', 'elementor-image-gallery'),
        'type' => \Elementor\Controls_Manager::GALLERY,
        'show_label' => false,
        'default' => [],
      ]
    );
    $this->end_controls_section();
  }

  /**
   * Render Image Gallery widget output on the frontend.
   *
   * Written in PHP and used to generate the final HTML.
   *
   * @since 1.0.0
   * @access protected
   */
  protected function render()
  {
    ob_start();
    $settings = $this->get_settings_for_display();
    if (empty($settings['gallery'])):
      return '';
    endif;

    ?>
    <div class="image-gallery-slider-section">
            <div class="swiper image-gallery-slider-swiper">
                <div class="swiper-wrapper">
        <?php foreach ($settings['gallery'] as $image): ?>
          <div class="swiper-slide">
            <div class="image-gallery-slider-wrap">
              <?php if (!empty($image['url'])): ?>
                <img src="<?php echo $image['url']; ?>" alt="">
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
        <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
    </div>
    <script>
            var $ = jQuery.noConflict();
            (function ($) {
                if ($('.slider-history-swiper').length > 0) {
                    var swiperHistory = new Swiper('.slider-history-swiper', {
                        spaceBetween: 0,
                        slidesPerView: 1,
                        speed: 1000,
                        loop: false,
                        loopedSlidesLimit: false,
                        pagination: {
                            el: ".swiper-pagination",
                            type: "progressbar",
                        },
                        navigation: {
                            nextEl: '.slider-history-section .swiper-button-next',
                            prevEl: '.slider-history-section .swiper-button-prev',
                        },
                        breakpoints: {
                            576: {
                                slidesPerView: 2,
                                loop: false,
                            },
                            992: {
                                slidesPerView: 3,
                                loop: false,
                            },
                            1401: {
                                slidesPerView: 4,
                                loop: false,
                            },
                        },
                    });
                }
            })(jQuery);

        </script>
    <?php
    if (is_admin()) {
      ?>
      <style>
            
      </style>
      <?php
    }

    ?>

    <?php
    echo ob_get_clean();
  }

  protected function content_template()
  {

  }
}