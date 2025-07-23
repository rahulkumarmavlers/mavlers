<?php
wp_enqueue_style('swiperjs-style');
wp_enqueue_script('swiperjs-script');
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
class Elementor_Home_Hero_Banner_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'home_hero_banner';
    }

    public function get_title()
    {
        return esc_html__('Home Hero Banner');
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
        return ['home', 'hero', 'banner'];
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
            'image',
            [
                'label' => esc_html__('Choose Background Image'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
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
            'url_text',
            [
                'label' => esc_html__('Button Link Text'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 1,
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link'),
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
                'label' => esc_html__('Banner Slider'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(), /* Use our repeater */
                'default' => [
                    [
                        'images' => esc_html__('Add Images'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        ob_start();
        $settings = $this->get_settings_for_display();
        ?>
        <div class="home-banner-slider-cover swiper home-banner-slider-js">
            <div class="swiper-wrapper">
                <?php foreach ($settings['list_items'] as $index => $item): ?>
                    <?php if (!empty($item['heading']) && !empty($item['content'])): ?>
                        <div class="swiper-slide">
                            <div class="home-banner-slider-item">
                                <div class="hero-home-banner" style="background-image:url('<?php echo $item['image']['url']; ?>')">
                                </div>
                                <div class="container">
                                    <div class="home-slider-content">
                                        <div class="home-slider-content-equal">
                                            <?php if (!empty($item['heading']) || !empty($item['content'])): ?>
                                                <h1><?php echo $item['heading']; ?></h1>
                                                <?php
                                                echo !empty($item['content']) ? $item['content'] : '';
                                                ?>
                                            <?php endif; ?>

                                            <?php
                                            if (!empty($item['button_link']['url']) && !empty($item['url_text'])):
                                                $ex = '1' == $item['button_link']['is_external'] ? '_blank' : '_self';
                                                echo '<a href="'.$item['button_link']['url'].'" target="'.$ex.'">'.$item['url_text'].'</a>';
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <span class="swiper-button"><span></span></span>
        </div>

        <script>
            var $ = jQuery.noConflict();
            (function ($) {
                // Swiper slider start here.
                if ($('.home-banner-slider-js').length > 0) {
                    let swiperBanner = new Swiper('.home-banner-slider-js', {
                        loop: true,
                        effect: 'fade',
                        fadeEffect: {
                            crossFade: true
                        },
                        centeredSlides: true,
                        speed: 1000,
                        autoplay: {
                            delay: 3000,
                            disableOnInteraction: false,
                        },
                        spaceBetween: 0,
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                    });

                    $('.swiper-button').on('click', function () {
                        let $bannerSliderJs = $('.home-banner-slider-js');
                        $bannerSliderJs.toggleClass('pause');
                        if ($bannerSliderJs.hasClass('pause')) {
                            swiperBanner.autoplay.stop();
                            $('.home-banner-slider-js').each((index, item) => {
                                item.swiper.autoplay.stop();
                            });
                        } else {
                            swiperBanner.autoplay.start();
                            $('.home-banner-slider-js').each((index, item) => {
                                item.swiper.autoplay.start();
                            });
                        }
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
