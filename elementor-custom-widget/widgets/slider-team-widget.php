<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Elementor_Slider_Team_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'slider_team';
    }

    public function get_title()
    {
        return esc_html__('Slider - Team');
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
        return ['team'];
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
            'select_post',
            [
                'type' => \Elementor\Controls_Manager::SELECT,
                'label' => esc_html__('Select Type'),
                'options' => [
                    'team' => esc_html__('Team'),
                    'subject-expert' => esc_html__('Subject Matter Experts'),
                ],
                'default' => 'team',
            ]
        );

        $this->add_control(
            'popup',
            [
                'label' => esc_html__('Show Popup?'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show'),
                'label_off' => esc_html__('Hide'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'teams',
            [
                'label' => 'Team Members',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'team',
                        'label' => 'Select Team Member',
                        'type' => \Elementor\Controls_Manager::SELECT2,
                        'options' => $this->get_custom_posts_options('team'),
                    ],
                ],
                'condition' => [
                    'select_post' => 'team',
                ],
            ]
        );

        $this->add_control(
            'experts',
            [
                'label' => 'Subject Matter Experts',
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'expert',
                        'label' => 'Select Experts Member',
                        'type' => \Elementor\Controls_Manager::SELECT2,
                        'options' => $this->get_custom_posts_options('subject-expert'),
                    ],
                ],
                'condition' => [
                    'select_post' => 'subject-expert',
                ],
            ]
        );


        $this->end_controls_section();
    }


    private function get_custom_posts_options($post_type)
    {
        $custom_posts = get_posts([
            'post_type' => $post_type,
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

        $settings = $this->get_settings_for_display();
        $selected_post_type = $settings['select_post'];
        $items = $selected_post_type === 'team' ? $settings['teams'] : $settings['experts'];
        ?>

        <div class="subject-matter-experts-team">
            <div class="swiper subject-matter-experts-swiper">
                <div class="swiper-wrapper">
                    <?php
                    $i = 1;
                    foreach ($items as $item):
                        $post_id = $selected_post_type === 'team' ? $item['team'] : $item['expert'];
                        $post = get_post($post_id);
                        ?>
                        <div class="swiper-slide">
                            <div class="acf-module acf-module-buttons">
                                <div class="is-style-fill">
                                    <?php if ('yes' === $settings['popup']): ?>
                                        <a href="javascript:void(0)" class="modal-trigger btn" data-target="#modal-<?php echo $post_id.$i; ?>">
                                    <?php endif; ?>
                                        <figure>
                                            <div class="img-zoom">
                                                <?php
                                                if (has_post_thumbnail($post_id)):
                                                    echo get_the_post_thumbnail($post_id, 'medium_large', array('class' => 'w-100 h-100 object-cover'));
                                                else:
                                                    echo wp_get_attachment_image(get_field('placeholder', 'option'), 'medium_large', false, ['class' => 'w-100 h-100 object-cover']);
                                                endif;
                                                ?>
                                            </div>
                                            <figcaption>
                                                <div class="subject-matter-experts-equal">
                                                <h4><?php echo get_the_title($post_id); ?></h4>
                                                <?php
                                                if("team" == $settings['select_post']):
                                                    echo !empty(get_field('company_title', $post_id)) ? '<p>'.get_field('company_title', $post_id).'</p>' : '';
                                                else:
                                                    echo !empty(get_field('role', $post_id)) ? '<p>'.get_field('role', $post_id).'</p>' : '';
                                                endif;
                                                ?>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    <?php if ('yes' === $settings['popup']): ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                    endforeach;
                    ?>
                </div>


                <div class="">
                    <?php
                    $j = 1;
                    foreach ($items as $item):
                        $post_id = $selected_post_type === 'team' ? $item['team'] : $item['expert'];
                        $post = get_post($post_id);
                        ?>
                        <div id="modal-<?php echo $post_id.$j; ?>" class="modal modal-closed position-fixed top-0 end-0 bottom-0 start-0" aria-hidden="true">
                            <div class="modal-dialog is-closed d-flex p-3 position-absolute top-0 end-0 bottom-0 start-0 justify-content-center align-content-center">
                                <div class="modal-overlay d-block position-absolute top-0 end-0 bottom-0 start-0"></div>
                                <div class="modal-content position-relative">
                                    <div class="modal-body translate-middle-y">
                                        <div class="modal-popup-content">
                                            <figure>
                                                <?php
                                                if (has_post_thumbnail($post_id)):
                                                    echo get_the_post_thumbnail($post_id, 'full', array('class' => 'w-100 h-100 object-cover'));
                                                else:
                                                    echo wp_get_attachment_image(get_field('placeholder', 'option'), 'medium_large', false, ['class' => 'w-100 h-100 object-cover']);
                                                endif;
                                                ?>

                                                <?php if (!empty(get_field('linkedin', $post_id))): ?>
                                                    <figcaption>
                                                        <a href="<?php echo get_field('linkedin', $post_id); ?>" target="_blank">
                                                            <img src="<?php echo plugin_dir_url(__FILE__).'../assets/images/linkdin.svg'; ?>">
                                                        </a>
                                                    </figcaption>
                                                <?php endif; ?>

                                            </figure>

                                            <div class="inner-content">
                                                <h2><?php echo get_the_title($post_id); ?></h2>
                                                <?php echo !empty(get_field('company_title', $post_id)) ? '<h3>'.get_field('company_title', $post_id).'</h3>' : ''; ?>
                                                <?php echo apply_filters('the_content', $post->post_content); ?>
                                            </div>
                                        </div>
                                        <button class="modal-close d-block border-0 shadow-none p-0 position-absolute top-0 end-0 z-1" type="button" data-target="#modal-<?php echo $post_id.$i; ?>" aria-label="Close Modal"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        $j++;
                    endforeach;
                    ?>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <?php
        echo ob_get_clean();
    }

    protected function _content_template()
    {

    }
}
