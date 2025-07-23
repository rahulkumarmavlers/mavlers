<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


class Elementor_Promo_Blogs_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'promo_blog';
    }

    public function get_title()
    {
        return esc_html__('Promo Blog Card');
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
        return ['promo', 'blog', 'card'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Select Blog Card'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button',
            [
                'label' => esc_html__('Button Label'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Read Case Study',
            ]
        );


        $this->add_control(
            'select_post_type',
            [
                'type' => \Elementor\Controls_Manager::SELECT,
                'label' => esc_html__('Select Post Type'),
                'options' => [
                    'post' => esc_html__('Post'),
                    'resource' => esc_html__('Resource'),
                ],
                'default' => 'post',
            ]
        );

        // Dynamic Post selector based on post type
        $this->add_control(
            'selected_post',
            [
                'label' => esc_html__('Select Post'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_custom_posts('post'), // Initial fetch assuming 'post' is the default
                'condition' => [
                    'select_post_type' => 'post',
                ],
            ]
        );

        // Dynamic Post selector based on post type
        $this->add_control(
            'selected_resource',
            [
                'label' => esc_html__('Select Resource'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_resource(),
                'condition' => [
                    'select_post_type' => 'resource',
                ],
            ]
        );

        $this->end_controls_section();
    }


    // Function to fetch posts by post type
    private function get_custom_posts($post_type)
    {
        $posts = get_posts(['post_type' => $post_type, 'numberposts' => -1]);
        $options = [];
        foreach ($posts as $post) {
            $options[$post->ID] = $post->post_title;
        }
        return $options;
    }


    // Function to fetch posts by post type
    private function get_resource()
    {
        $options = array();
        $custom_posts = get_posts(['post_type' => 'resource', 'numberposts' => -1]);
        if (!empty($custom_posts)) {
            foreach ($custom_posts as $post) {
                $options[$post->ID] = $post->post_title;
            }
        }
        return $options;
    }

    protected function render()
    {
        ob_start();
        $settings = $this->get_settings_for_display();

        if ('post' == $settings['select_post_type']):
            $post_id = $settings['selected_post'];
            $type = 'post';
        else:
            $post_id = $settings['selected_resource'];
            $type = 'resource';
        endif;
        
        if (!empty($post_id)) {
            $postId = get_post($post_id);
            if ($postId) {
                $url = wp_get_attachment_url(get_post_thumbnail_id($postId), 'full');
                $content = get_the_content($postId);
                $word_count = str_word_count(strip_tags($content));
                $reading_time = ceil($word_count / 200);

                if ('post' == $settings['select_post_type']):
                    $categories = get_the_terms($postId, 'category');
                    if ($categories && !is_wp_error($categories)):
                        $category = array();
                        foreach ($categories as $cat) {
                            $category[] = $cat->name;
                        }
                        $category_name = join(", ", $category);
                    else:
                        $category_name = '';
                    endif;
                else:
                    $categories = get_the_terms($postId, 'content-type');
                    if ($categories && !is_wp_error($categories)):
                        $category = array();
                        foreach ($categories as $cat) {
                            $category[] = $cat->name;
                        }
                        $category_name = join(", ", $category);
                    else:
                        $category_name = '';
                    endif;
                endif;

                ?>
                <div class="case-studies-item">
                    <div class="case-studies-item-wrap">
                        <?php if (!empty($url)): ?>
                            <div class="case-studies-image">
                                <figure>
                                    <img src="<?php echo $url; ?>" alt="<?php echo get_the_title($postId); ?>">
                                </figure>
                            </div>
                        <?php endif; ?>

                        <div class="case-studies-content">
                            <div class="case-studies-content-equal">
                                <label><?php echo $category_name; ?></label>
                                <?php
                                echo !empty($settings['heading']) ? '<span>'.$settings['heading'].'</span>' : '';
                                ?>
                                <h4><?php echo get_the_title($postId); ?></h4>

                                <?php
                                if (!empty(get_the_excerpt($postId))):
                                    echo '<p>'.get_the_excerpt($postId).'</p>';
                                endif;
                                ?>
                            </div>
                            <div class="button-primary">
                                <span> <?php echo get_the_date('j M Y', $postId); ?> | <?php echo $reading_time ; ?> min read </span>
                                <a href="<?php echo get_the_permalink($postId); ?>"> <?php echo $settings['button']; ?> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        echo ob_get_clean();
    }

    protected function _content_template()
    {

    }
}
