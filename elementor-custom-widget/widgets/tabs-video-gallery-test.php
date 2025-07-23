<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


class Elementor_Tabs_Video_Gallery_Test_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'tabs_video_gallery_test';
    }

    public function get_title()
    {
        return esc_html__('Tabs with Video Gallery');
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
        return ['tabs', 'video', 'gallery'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Tabs with Video Gallery'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'section_heading',
            [
                'label' => __('Section Heading'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('New Section'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'section_sub_heading',
            [
                'label' => __('Section Sub Heading'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Sub Heading'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'section_description',
            [
                'label' => __('Description'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '',
                'label_block' => true,
            ]
        );

        $video_repeater = new \Elementor\Repeater();

        $video_repeater->add_control(
            'video_type',
            [
                'label' => __('Video Type'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'youtube' => __('YouTube'),
                    'wistia' => __('Wistia'),
                ],
                'default' => 'youtube',
            ]
        );

        $video_repeater->add_control(
            'video_id',
            [
                'label' => __('Video ID'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'label_block' => true,
            ]
        );

        $video_repeater->add_control(
            'video_image',
            [
                'label' => __('Video Image', 'text-domain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'videos',
            [
                'label' => __('Videos'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $video_repeater->get_controls(),
                'title_field' => '{{{ video_id }}}',
            ]
        );

        $this->add_control(
            'sections',
            [
                'label' => __('Sections'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
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
        <div class="tabs-with-video-gallery">
            <div id="verticalTab">
                <?php
                if (!empty($settings['sections'])) {
                    ?>

                    <ul class="resp-tabs-list">
                        <?php foreach ($settings['sections'] as $item) { ?>
                            <li><?php echo esc_html($item['section_heading']); ?></li>
                        <?php } ?>
                    </ul>

                    <div class="resp-tabs-container">
                        <?php
                        foreach ($settings['sections'] as $section) {
                            ?>
                            <div class="tabs-video-gallery-inner">
                                <?php
                                echo '<h3>'.esc_html($section['section_sub_heading']).'</h3>';
                                echo '<p>'.esc_html($section['section_description']).'</p>';
                                ?>
                                <div class="tabs-video-gallery-main">
                                    <?php
                                    if (!empty($section['videos'])) {
                                        ?>
                                        <div class="slider tabs-video-gallery-slider-for">
                                            <?php
                                            foreach ($section['videos'] as $video) {
                                                ?>
                                                <div class="item">
                                                    <div class="tabs-video-gallery-item">
                                                        <figure>
                                                            <?php
                                                            if ('youtube' === $video['video_type']) {
                                                                echo '<iframe src="https://www.youtube.com/embed/'.esc_attr($video['video_id']).'"></iframe>';
                                                            } elseif ('wistia' === $video['video_type']) {
                                                                echo '<iframe src="https://fast.wistia.net/embed/iframe/'.esc_attr($video['video_id']).'"></iframe>';
                                                            }
                                                            ?>
                                                        </figure>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>

                                        <div class="slider tabs-video-gallery-slider-nav">
                                            <?php
                                            foreach ($section['videos'] as $video) {
                                                if (!empty($video['video_image']['url'])) {
                                                    ?>
                                                    <div class="nav-gallery">
                                                        <figure>
                                                            <img src="<?php echo esc_url($video['video_image']['url']); ?>">
                                                        </figure>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <?php
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

        <script src="//fast.wistia.com/assets/external/E-v1.js" async></script>
        <script>
            var $ = jQuery.noConflict();
            (function ($) {
                $(document).ready(function () {
                    $('#verticalTab').easyResponsiveTabs({
                        type: 'vertical',
                        width: 'auto',
                        css3animation: 'animated fadeIn',
                        fit: true
                    });
                    $('.tabs-video-gallery-slider-for').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        fade: true,
                        asNavFor: '.tabs-video-gallery-slider-nav'
                    });
                    $('.tabs-video-gallery-slider-nav').slick({
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        asNavFor: '.tabs-video-gallery-slider-for',
                        dots: false,
                        focusOnSelect: true,
                        responsive: [
                            {
                                breakpoint: 991,
                                settings: {
                                    slidesToShow: 2
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1
                                }
                            },
                          ],
                    });

                });
            })(jQuery);

        </script>
    <?php
    if (is_admin()) {
      ?>
      <style>
            
      </style>
      <?php
    }

    ?>
        <?php
        echo ob_get_clean();
    }

    protected function _content_template()
    {

    }
}
