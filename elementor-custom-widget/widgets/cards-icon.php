<?php
wp_enqueue_style('swiperjs-style');
wp_enqueue_script('swiperjs-script');
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
class Elementor_Cards_Icon_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'cards_icon';
    }

    public function get_title()
    {
        return esc_html__('Cards with Icon');
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
        return ['cards', 'icon'];
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
			'icon',
			[
				'label' => esc_html__( 'Choose Icon'),
				'type' => \Elementor\Controls_Manager::MEDIA
			]
		);

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

        $repeater->add_control(
            'link_lable',
            [
                'label' => esc_html__('Link Text'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 1,
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external'],
                'default' => ['url' => '', 'is_external' => true],
                'label_block' => true,
            ]
        );

        /* End repeater */

        $this->add_control(
            'list_items',
            [
                'label' => esc_html__('Cards Lists'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ heading }}}',
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
            <div class="cards-icon-section">
            <div class="swiper cards-icon-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($settings['list_items'] as $item): ?>
                        <?php if (!empty($item['heading']) && !empty($item['content'])): ?>
                            <div class="swiper-slide">
                                
                                    <div class="cards-item-crad-equals">

                                        <?php
                                        if (!empty($item['link']['url'])):
                                            $ex = '1' == $item['link']['is_external'] ? '_blank' : '_self';
                                            echo '<a href="'.$item['link']['url'].'" target="'.$ex.'">';
                                        endif;
                                        ?>
                                    <div class="cards-item">

                                        <?php if (!empty($item['heading']) || !empty($item['content'])): ?>
                                        <figure>
                                            <?php
                                            if (!empty($item['icon']['url'] ) ):
                                                echo '<img src="'.$item['icon']['url'].'" alt="">';
                                            endif;
                                            ?>
                                            </figure>
                                         <div class="cards-item-crad-equal">
                                        <?php
                                            echo !empty($item['heading']) ? '<h3>'.$item['heading'].'</h3>' : '';

                                            echo !empty($item['content']) ? $item['content'] : '';


                                            if (!empty($item['link']['url']) && !empty($item['link_lable'])):
                                                echo '<span>'.$item['link_lable'].'</span>';
                                            endif;
                                            ?>
                                        </div>
                                        <?php endif; ?>

                                        </div>

                                        <?php
                                        if (!empty($item['link']['url'])):
                                            echo '</a>';
                                        endif;
                                        ?>
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
