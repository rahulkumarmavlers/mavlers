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
class Elementor_Image_Gallery_Widget extends \Elementor\Widget_Base
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
    return 'image_gallery';
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
    return esc_html__('Image Gallery', 'elementor-image-gallery');
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
    return ['image', 'gallery'];
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
      'heading',
      [
        'label' => esc_html__('Title', 'elementor-image-gallery'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
      ]
    );

    $this->end_controls_section();


    $this->start_controls_section(
      'content_section',
      [
        'label' => esc_html__('Images Gallery', 'elementor-image-gallery'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );



    /* Start repeater */

    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
      'image',
      [
        'label' => esc_html__('Choose Image', 'elementor-image-gallery'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );
    $repeater->add_control(
      'url',
      [
        'label' => esc_html__('URL to embed', 'elementor-image-gallery'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'input_type' => 'url',
        'placeholder' => esc_html__('https://your-link.com', 'elementor-image-gallery'),
      ]
    );

    /* End repeater */

    $this->add_control(
      'list_items',
      [
        'label' => esc_html__('Images', 'elementor-image-gallery'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(), /* Use our repeater */
        'default' => [
          [
            'images' => esc_html__('Add Images', 'elementor-image-gallery'),
          ],
        ],
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
    if (empty($settings['list_items'])):
      return '';
    endif;

    echo !empty($settings['heading']) ? '<div class="logo-gallery-title"><h5>'.$settings['heading'].'</h5></div>' : '';
    ?>
    <div class="logo-gallery-section">
      <div class="logo-gallery-slider">
        <?php foreach ($settings['list_items'] as $index => $item): ?>
          <div class="image-gallery-items">

            <?php echo !empty($item['url']) ? '<a href="'.$item['url'].'" target="_blank">' : ''; ?>
            <div class="image-gallery-items-wrap">
              <?php if (!empty($item['image']['url'])): ?>
                <img src="<?php echo $item['image']['url']; ?>" alt="<?php echo $item['image']['alt']; ?>">
              <?php endif; ?>
            </div>
            <?php echo !empty($item['url']) ? '</a>' : ''; ?>

          </div>
        <?php endforeach; ?>
      </div>
      <div class="buttons">
        <button class="pause" id='toggle'>play</button></div>
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

    ?>

    <?php
    echo ob_get_clean();
  }

  protected function content_template()
  {

  }
}