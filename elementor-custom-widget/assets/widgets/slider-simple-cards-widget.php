<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Elementor_Slider_Simple_Cards_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'slider_simple_cards';
    }

    public function get_title()
    {
        return esc_html__('Slider - Simple Cards');
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
        return ['slider', 'simple', 'cards'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Simple Cards'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'cards_row',
            [
                'label' => esc_html__('Cards per Row'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'three-col',
                'options' => [
                    'two-col' => esc_html__('2'),
                    'three-col' => esc_html__('3'),
                    'four-col' => esc_html__('4'),
                ],
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
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 3,
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                ],
                'label_block' => true,
            ]
        );
        /* End repeater */

        $this->add_control(
            'list_items',
            [
                'label' => esc_html__('Cards'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(), /* Use our repeater */
                'title_field' => '{{{ heading }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        ob_start();
        $settings = $this->get_settings_for_display();


        $cards_row = $settings['cards_row'];
        
        // Convert the cards_row value to a number
        switch ($cards_row) {
            case 'two-col':
                $cards_row_value = 2;
                break;
            case 'three-col':
                $cards_row_value = 3;
                break;
            case 'four-col':
                $cards_row_value = 4;
                break;
            default:
                $cards_row_value = 3; // Default value
        }
        ?>
        <div class="content_slider <?php echo $settings['cards_row']; ?>">
            <?php foreach ($settings['list_items'] as $index => $item): ?>

                <?php if (!empty($item['heading'])): ?>
                    <div class="content-slider-wrapper">
                        <?php
                        if (!empty($item['link']['url'])):
                            $ex = '1' == $item['link']['is_external'] ? '_blank' : '_self';
                            echo '<a href="' . $item['link']['url'] . '" target="' . $ex . '">';
                        endif;
                        ?>

                        <div class="content-slider-cards">
                            <div class="content_slider_equal">
                                <h4><?php echo $item['heading']; ?></h4>
                            
                            <?php
                            if (!empty($item['description'])):
                                echo '<p>' . $item['description'] . '</p>';
                            endif;
                            ?>
                                </div>
                        </div>

                        <?php
                        if (!empty($item['link']['url'])):
                            echo '</a>';
                        endif;
                        ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <script>
            var $ = jQuery.noConflict();
            (function ($) {
                $(document).ready(function () {
                    $(".content_slider").not(".slick-initialized").slick({
                        slidesToShow: <?php echo $cards_row_value; ?>,
                        slidesToScroll: 1,
                        arrows: true,
                        dots: false,
                        infinite: false,
                        adaptiveHeight: false,
                        autoplay: false,
                        centerMode: false,
                        variableWidth: false,
                        responsive: [
                            {
                                breakpoint: 992,
                                settings: {
                                    slidesToShow: 3,
                                    variableWidth: false,
                                },
                            },
                            {
                                breakpoint: 991,
                                settings: {
                                    slidesToShow: 2,
                                    variableWidth: false,
                                },
                            },
                            {
                                breakpoint: 767,
                                settings: {
                                    slidesToShow: 1,
                                    variableWidth: false,
                                },
                            },
                        ],
                    });
                });
            })(jQuery);
        </script>
        <?php
        echo ob_get_clean();
    }

    protected function _content_template()
    {

    }
}