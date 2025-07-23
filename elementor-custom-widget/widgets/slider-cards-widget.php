<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


class Elementor_Slider_Cards_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'slider_cards';
    }

    public function get_title()
    {
        return esc_html__('Slider - Cards');
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
        return ['slider', 'cards'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Cards'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        /* Start repeater */
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Card Image'),
                'type' => \Elementor\Controls_Manager::MEDIA,
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

        /* End repeater */

        $this->add_control(
            'list_items',
            [
                'label' => esc_html__('Card'),
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
        $settings = $this->get_settings_for_display();
        ?>
        <div class="what-we-are-about-section">
            <div class="swiper what-we-are-about-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($settings['list_items'] as $index => $item): ?>
                        <?php if (!empty($item['heading']) && !empty($item['content'])): ?>
                            <div class="swiper-slide">
                                <div class="what-we-are-about-wrap">
                                    
                                        
                                            <?php if (!empty($item['content']) || !empty($item['heading'])): ?>
                                                <?php
                                                if (!empty($item['image']['url'])) {
                                                    echo '<figure><img src="'.$item['image']['url'].'"></figure>';
                                                }
                                                ?>
                                                <div class="what-about-content-equal">
                                                    <div class="what-we-are-about-content">
                                                    <h3><?php echo $item['heading']; ?></h3>
                                                
                                                <?php
                                                echo !empty($item['content']) ? '<p>'.$item['content'].'</p>' : '';
                                                ?>
                                                    </div></div>
                                            <?php endif; ?>
                                        
                                    
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <script>
            var $ = jQuery.noConflict();
            (function ($) {
//                var swiper = new Swiper(".checkmark-cards-swiper", {
//                    pagination: {
//                        el: ".swiper-pagination",
//                        clickable: true,
//                    },
//                    navigation: {
//                        nextEl: ".swiper-button-next",
//                        prevEl: ".swiper-button-prev",
//                    },
//                });
                if ($('.what-we-are-about-swiper').length > 0) {
                    var swiperHistory = new Swiper('.what-we-are-about-swiper', {
                        spaceBetween: 0,
                        slidesPerView: 1,
                        speed: 1000,
                        loop: true,
                        loopedSlidesLimit: false,
                        pagination: {
                            el: ".what-we-are-about-section .swiper-pagination",
                            clickable: true,
                        },
                        navigation: {
                            nextEl: '.what-we-are-about-section .swiper-button-next',
                            prevEl: '.what-we-are-about-section .swiper-button-prev',
                        },
                        breakpoints: {
                            576: {
                                slidesPerView: 2,
                                loop: true,
                            },
                            992: {
                                slidesPerView: 3,
                                loop: true,
                            },
                            1401: {
                                slidesPerView: 3,
                                loop: true,
                            },
                        },
                    });
                }
            })(jQuery);

        </script>
        <?php
        echo ob_get_clean();
    }

    protected function _content_template()
    {

    }
}
