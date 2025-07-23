<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


class Elementor_Tabs_Case_Studies_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'tabs_case_studies';
    }

    public function get_title()
    {
        return esc_html__('Tabs - Case Studies');
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
        return ['tabs', 'case', 'studies'];
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tab_heading',
            [
                'label' => __('Tab Heading'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('New Section'),
                'label_block' => true,
                'rows' => 1,
            ]
        );

        $this->add_control(
            'custom_posts',
            [
                'label' => 'Select Featured Case Studies',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'heading',
                        'label' => __('Tab Heading'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __('Heading'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'post',
                        'label' => 'Select Case Study',
                        'type' => \Elementor\Controls_Manager::SELECT2,
                        'options' => $this->get_custom_posts_options(),
                    ],
                ],
                'default' => [
                    ['post' => '1'],
                ],
            ]
        );
        $this->end_controls_section();
    }


    private function get_custom_posts_options()
    {
        $custom_posts = get_posts([
            'post_type' => 'case-study',
            'posts_per_page' => -1,
        ]);

        $options = [];
        foreach ($custom_posts as $post) {
            $options[$post->ID] = $post->post_title;
        }
        return $options;
    }

    protected function render()
    {
        ob_start();
        //$settings = $this->get_settings_for_display();
        $settings = $this->get_settings();
        ?>
        <div class="tabs-case-studies-section">
            <div id="horizontalTab-case-studies">
                <ul class="resp-tabs-list">
                    <?php
                    foreach ($settings['custom_posts'] as $post):
                        echo !empty($post['heading']) ? '<li>'.$post['heading'].'</li>' : '';
                    endforeach;
                    ?>
                </ul>

                <div class="resp-tabs-container">
                    <?php
                    foreach ($settings['custom_posts'] as $post):
                        $post_id = $post['post'];
                        $tabs_content = get_field('tabs_content', $post_id);
                        ?>
                        <div class="custom-widget-tabs-content">
                            <div class="inner-content-wrap">

                                <?php if (!empty($tabs_content['image'])): ?>
                                    <div class="case-study-media-wrap">
                                    <figure> <?php echo '<img src="'.$tabs_content['image']['url'].'" alt="">'; ?>
                                        </figure>
                                    </div>
                                <?php endif; ?>

                                <div class="custom-widget-tabs-desc">
                                    <h2><?php echo get_the_title($post_id); ?></h2>
                                    <?php
                                    if (!empty($tabs_content['content'])):
                                        echo $tabs_content['content'];
                                    endif;


                                    if (!empty($tabs_content['results']) || !empty($tabs_content['results_text'])):
                                        ?>
                                        <div class="case-study-result">
                                            <?php
                                            echo !empty($tabs_content['results']) ? '<span>'.$tabs_content['results'].'</span>' : '';

                                            echo !empty($tabs_content['results_text']) ? '<p>'.$tabs_content['results_text'].'</p>' : '';
                                            ?>
                                        </div>
                                        <?php
                                    endif;

                                    if (!empty($tabs_content['result'])):
                                        ?>
                                        <div class="case-study-result-wrap">
                                            <?php
                                            foreach($tabs_content['result'] as $results):
                                                echo '<div class="case-study-result-item">';
                                                echo !empty($results['result_number']) ? '<span>'.$results['result_number'].'</span>' : '';
                                                echo !empty($results['results_text']) ? '<p>'.$results['results_text'].'</p>' : '';
                                                echo '</div>';
                                            endforeach;
                                            ?>
                                        </div>
                                        <?php
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
        <?php
        echo ob_get_clean();
    }

    protected function _content_template()
    {

    }
}
