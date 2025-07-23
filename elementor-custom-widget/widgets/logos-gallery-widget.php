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
class Elementor_Logos_Gallery_Widget extends \Elementor\Widget_Base
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
    return 'logos_gallery';
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
    return esc_html__('Logos Gallery', 'elementor-logos-gallery');
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
    return ['logos', 'gallery'];
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
        'label' => __('Header', 'elementor-logos-gallery'),
      ]
    );

    $this->add_control(
      'heading',
      [
        'label' => esc_html__('Title', 'elementor-logos-gallery'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
      ]
    );

    $this->end_controls_section();


    $this->start_controls_section(
      'content_section',
      [
        'label' => esc_html__('Images Gallery', 'elementor-logos-gallery'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Images', 'elementor-logos-gallery' ),
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

    echo !empty($settings['heading']) ? '<div class="logo-gallery-title"><h5>'.$settings['heading'].'</h5></div>' : '';
    ?>
    <div class="logo-gallery-section">
      <div class="logo-gallery-slider">



        <?php foreach ( $settings['gallery'] as $image ): ?>
          <div class="image-gallery-items">
            <div class="image-gallery-items-wrap">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            </div>
          </div>
        <?php endforeach; ?>


      </div>

      <div class="buttons"><button class="pause" id='toggle'>play</button></div>
    </div>

    <?php
    if (is_admin()) {
      ?>
      <style>
        .logo-gallery-slider {
          display: flex;
        }

        .image-gallery-items {
          width: 20%;
          padding: 0 !important;
        }
      </style>
      <?php
    }
    echo ob_get_clean();
  }

  protected function content_template()
  {

  }
}