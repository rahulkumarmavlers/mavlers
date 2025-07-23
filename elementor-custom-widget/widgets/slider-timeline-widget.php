<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


class Elementor_Slider_Timeline_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'slider_timeline';
    }

    public function get_title()
    {
        return esc_html__('Slider - History');
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
        return ['slider', 'timeline', 'history'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('History'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        /* Start repeater */
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'year',
            [
                'label' => esc_html__('Year'),
                'type' => \Elementor\Controls_Manager::TEXT,
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
                'label' => esc_html__('History'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ year }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        ob_start();
        $settings = $this->get_settings_for_display();
        ?>

<div class="slider-history-section">
    <div class="swiper slider-history-swiper">
        <div class="swiper-wrapper">
            <?php foreach ($settings['list_items'] as $index => $item): ?>
            <?php if (!empty($item['content']) && !empty($item['year'])): ?>
            <div class="swiper-slide">
                <div class="slider-history-wrap">
                    <div class="slider-history-content">
                        <div class="slider-history-content-equal">
                            <?php if (!empty($item['content']) || !empty($item['year'])): ?>
                            <div class="year-caption">
                                <span><?php echo $item['year']; ?></span>
                            </div>
                            <?php
                                    echo !empty($item['content']) ? '<p>'.$item['content'].'</p>' : '';
                                    ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
     <div class="swiper-pagination"></div>
</div>

<script>
    var $ = jQuery.noConflict();
    (function($) {
            var swiper = new Swiper(".checkmark-cards-swiper", {
      pagination: {
        el: ".swiper-pagination",
        type: "progressbar",
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
         if ($('.slider-history-swiper').length > 0) {
        var swiperHistory = new Swiper('.slider-history-swiper', {
            spaceBetween: 0,
            slidesPerView: 1,
            speed: 1000,
            loop: true,
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
                    loop: true,
                },
                992: {
                    slidesPerView: 3,
                    loop: true,
                },
                1401: {
                    slidesPerView: 4,
                    loop: true,
                },
            },
        });
        }
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
