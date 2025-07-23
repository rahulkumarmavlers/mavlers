<?php
wp_enqueue_style('swiperjs-style');
wp_enqueue_script('swiperjs-script');
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
class Elementor_Checkmark_Cards_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'checkmark_cards';
    }

    public function get_title()
    {
        return esc_html__('Checkmark Cards');
    }

    public function get_icon()
    {
        return 'eicon-code';
    }

    public function get_categories()
    {
        return ['general'];
    }

    public function get_keywords()
    {
        return ['checkmark', 'cards'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content Block'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        /* Start repeater */
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'heading',
            [
                'label' => esc_html__('Heading'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'required' => true,
            ]
        );

        $repeater->add_control(
            'content',
            [
                'label' => esc_html__('Content'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );

        /* End repeater */

        $this->add_control(
            'list_items',
            [
                'label' => esc_html__('Cards Lists'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        ob_start();
        //$settings = $this->get_settings_for_display();
        $settings = $this->get_settings();
        if (!empty($settings['list_items']) && is_array($settings['list_items'])) {
            ?>
            <div class="checkmark-cards-section">
            <div class="swiper checkmark-cards-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($settings['list_items'] as $item): ?>
                        <?php if (!empty($item['heading']) && !empty($item['content'])): ?>
                            <div class="swiper-slide">
                                <div class="container">
                                    <div class="checkmark-cardst-equal">
                                        <?php if (!empty($item['heading']) || !empty($item['content'])): ?>
                                            <?php
                                            echo !empty($item['heading']) ? '<h3>'.$item['heading'].'</h3>' : '';

                                            echo !empty($item['content']) ? $item['content'] : '';
                                            ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
                <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
            </div>
            <?php
        }
        echo ob_get_clean();
    }

    protected function _content_template()
    {
    }
}
