<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Elementor_Tabs_Cards_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'tabs_with_cards';
    }

    public function get_title()
    {
        return esc_html__('Tabs with Cards');
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
        return ['tabs', 'cards'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Tabs Cards'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $outer_repeater = new \Elementor\Repeater();

        $outer_repeater->add_control(
            'section_heading',
            [
                'label' => __('Section Heading'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('New Section'),
                'label_block' => true,
            ]
        );

        $inner_repeater = new \Elementor\Repeater();

        $inner_repeater->add_control(
            'image',
            [
                'label' => __('Choose Image'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $inner_repeater->add_control(
            'card_heading',
            [
                'label' => __('Card Heading'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'label_block' => true,
            ]
        );

        $inner_repeater->add_control(
            'description',
            [
                'label' => __('Description'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'placeholder' => __('Type your description here'),
            ]
        );

        $inner_repeater->add_control(
            'url_text',
            [
                'label' => esc_html__('Link Text'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Learn More »'),
            ]
        );

        $inner_repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external'],
                'default' => ['url' => '', 'is_external' => true],
                'label_block' => true,
            ]
        );

        $outer_repeater->add_control(
            'items',
            [
                'label' => __('Card Items'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $inner_repeater->get_controls(),
                'title_field' => '{{{ card_heading }}}',
            ]
        );

        $this->add_control(
            'sections',
            [
                'label' => __('Sections'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $outer_repeater->get_controls(),
                'title_field' => '{{{ section_heading }}}',
            ]
        );


        $this->end_controls_section();
    }

    protected function render()
    {
        ob_start();
        $settings = $this->get_settings_for_display();
        ?>
        <div class="tabs-with-cards-section">
            <div id="horizontalTab">
                <?php
                if (!empty($settings['sections'])) {
                    ?>
                    <ul class="resp-tabs-list">
                        <?php
                        foreach ($settings['sections'] as $section) {
                            echo '<li><span>'.esc_html($section['section_heading']).'</span></li>';
                        }
                        ?>
                    </ul>


                    <div class="resp-tabs-container">
                        <?php
                        foreach ($settings['sections'] as $section) {
                            ?>
                            <div class="tabs-with-cards-column">
                                <div class="tabs-with-cards-column-inner">
                                    <?php
                                    if (!empty($section['items'])) {
                                        foreach ($section['items'] as $item) {
                                            if (!empty($item['card_heading']) || !empty($item['description'])):
                                                ?>
                                                <div class="tabs-item">
                                                    <?php
                                                    if (!empty($item['link']['url'])):
                                                        $ex = '1' == $item['link']['is_external'] ? '_blank' : '_self';
                                                        echo '<a href="'.$item['link']['url'].'" target="'.$ex.'">';
                                                    endif;
                                                    ?>
                                                    <div class="tabs-item-inner">
                                                        <div class="tabs-with-cards-equal">
                                                            <?php
                                                            if (!empty($item['image']['url'])):
                                                                echo '<figure>';
                                                                echo '<img src="'.esc_url($item['image']['url']).'" alt="">';
                                                                echo '</figure>';
                                                            endif;

                                                            echo '<h3>'.esc_html($item['card_heading']).'</h3>';

                                                            echo '<p>'.esc_html($item['description']).'</p>';
                                                            ?>
                                                        </div>
                                                        <?php
                                                        if (!empty($item['link']['url']) && !empty($item['url_text'])):
                                                            echo '<span>'.$item['url_text'].'</span>';
                                                        endif;
                                                        ?>
                                                    </div>
                                                    <?php
                                                    if (!empty($item['link']['url'])):
                                                        echo '</a>';
                                                    endif;
                                                    ?>
                                                </div>
                                                <?php
                                            endif;
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <?php
        echo ob_get_clean();
    }

    protected function _content_template()
    {

    }
}