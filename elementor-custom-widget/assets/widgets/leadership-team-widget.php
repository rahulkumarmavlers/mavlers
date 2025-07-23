<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Elementor_Leadership_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'leadership_team';
    }

    public function get_title()
    {
        return esc_html__('Team');
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
            'popup',
			[
				'label' => esc_html__( 'Show Popup?'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show'),
				'label_off' => esc_html__( 'Hide' ),
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
                        'options' => $this->get_custom_posts_options(),
                    ],
                ]
            ]
        );
        $this->end_controls_section();
    }

    private function get_custom_posts_options()
    {
        $custom_posts = get_posts([
            'post_type' => 'team',
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
        <div class="leadership-team">
            <ul>
                <?php
                $i = 1;
                foreach ($settings['teams'] as $post):
                    $post_id = $post['team'];
                    $post = get_post($post_id);

                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomId = '';
                    $length = 4;
                    for ($i = 0; $i < $length; $i++) {
                        $randomId .= $characters[rand(0, $charactersLength - 1)];
                    }
                    ?>
                    <li>
                        <div class="acf-module acf-module-buttons d-flex is-layout-flex">
                            <div class="is-style-fill">
                                <?php if ( 'yes' === $settings['popup'] ): ?>
                                    <a href="javascript:void(0)" class="modal-trigger btn" data-target="#modal-<?php echo $randomId.$i; ?>">
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
                                                <h4><?php echo get_the_title($post_id); ?></h4>
                                                <?php echo !empty(get_field('company_title', $post_id)) ? '<p>'.get_field('company_title', $post_id).'</p>' : ''; ?>
                                            </figcaption>
                                        </figure>
                                <?php if ( 'yes' === $settings['popup'] ): ?>
                                    </a>
                                <?php endif; ?>

                                <div id="modal-<?php echo $randomId.$i; ?>" class="modal modal-closed position-fixed top-0 end-0 bottom-0 start-0" aria-hidden="true">
                                    <div class="modal-dialog is-closed d-flex p-3 position-absolute top-0 end-0 bottom-0 start-0 justify-content-center align-content-center">
                                        <div class="modal-overlay d-block position-absolute top-0 end-0 bottom-0 start-0"></div>
<!--                                        <button class="modal-close d-block border-0 shadow-none p-0 position-absolute top-0 end-0 z-1" type="button" data-target="#modal-<?//php echo $randomId.$i; ?>" aria-label="Close Modal"></button>-->
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

                                                        <?php if(!empty(get_field('linkedin', $post_id))): ?>
                                                            <figcaption>
                                                                <a href="<?php echo get_field('linkedin', $post_id); ?>" target="_blank">
                                                                    <img src="<?php echo plugin_dir_url(__FILE__) . '../assets/images/linkdin.svg'; ?>">
                                                                </a>
                                                            </figcaption>
                                                        <?php endif; ?>
                                                    </figure>

                                                    <div class="inner-content">
                                                        <h2><?php echo get_the_title($post_id); ?></h2>
                                                        <?php echo !empty(get_field('company_title', $post_id)) ? '<h3>'.get_field('company_title', $post_id).'</h3>' : ''; ?>
                                                        <?php 
                                                        //echo the_content(); 
                                                        echo apply_filters('the_content', $post->post_content);
                                                        ?>
                                                    </div>
                                                </div>
                                                <button class="modal-close d-block border-0 shadow-none p-0 position-absolute top-0 end-0 z-1" type="button" data-target="#modal-<?php echo $randomId.$i; ?>" aria-label="Close Modal"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                    $i++;
                endforeach;
                ?>
            </ul>
        </div>
        <?php
        echo ob_get_clean();
    }

    protected function _content_template()
    {

    }
}
