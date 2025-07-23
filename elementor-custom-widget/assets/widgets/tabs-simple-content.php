<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


class Elementor_Tabs_Simple_Content_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'tabs_simple_content';
    }

    public function get_title()
    {
        return esc_html__('Tabs - Simple Content');
    }

    public function get_icon()
    {
        return 'eicon-slider-video';
    }

    public function get_categories()
    {
        return ['general'];
    }

    public function get_keywords()
    {
        return ['tabs', 'simple', 'content'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Tabs Content'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Title'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tab_heading',
            [
                'label' => __('Tab Heading'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('New Section'),
                'label_block' => true,
                'rows' => 2,
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => __('Description'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'placeholder' => __('Type your description here')
            ]
        );

        $this->add_control(
            'items',
            [
                'label' => __('Items'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ tab_heading }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        ob_start();
        $settings = $this->get_settings_for_display();
        ?>
        <div class="tabs-simple-content">
            <div id="verticalTab-simple-content">
            <div class="verticalTab-simple-content-inner">
                <?php
                if (!empty($settings['heading'])):
                    ?>
                    <div class="tabs-header">
                        <?php
                        echo $settings['heading'];
                        ?>
                    </div>
                    <?php
                endif;
                ?>
                <?php
                if (!empty($settings['items'])) {
                    ?>
                    <ul class="resp-tabs-list">
                        <?php foreach ($settings['items'] as $item) { ?>
                            <li> <span><?php echo esc_html($item['tab_heading']); ?></span> </li>
                        <?php } ?>
                    </ul>
            </div>
                    <div class="resp-tabs-container">
                        <?php foreach ($settings['items'] as $item) { ?>
                            <div class="tabs-simple-content-inner animated-slow">
                                <?php
                                echo '<span>'.esc_html($item['tab_heading']).'</span>';

                                echo $item['description'];
                                ?>
                            </div>
                        <?php } ?>
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
