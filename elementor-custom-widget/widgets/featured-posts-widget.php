<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Eeatured_Featured_Posts_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'featured-posts';
    }

    public function get_title()
    {
        return 'Featured Post';
    }

    public function get_icon()
    {
        return 'fa fa-code';
    }

    public function get_categories()
    {
        return ['general'];
    }

    public function get_keywords()
    {
        return ['featured', 'post'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => 'Custom Widget Content',
            ]
        );

        $this->add_control(
            'select_type',
            [
                'type' => \Elementor\Controls_Manager::SELECT,
                'label' => esc_html__('Select Post'),
                'options' => [
                    'post' => esc_html__('Post'),
                    'news' => esc_html__('News'),
                    'event' => esc_html__('Event'),
                ],
                'default' => 'post',
            ]
        );

        $this->add_control(
            'selected_post',
            [
                'label' => __('Select Post'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => $this->get_posts(),
                'label_block' => true,
                'condition' => [
                    'select_type' => 'post',
                ],
            ]
        );

        $this->add_control(
            'selected_event',
            [
                'label' => __('Select Event'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => $this->get_event(),
                'label_block' => true,
                'condition' => [
                    'select_type' => 'event',
                ],
            ]
        );

        $this->add_control(
            'selected_news',
            [
                'label' => __('Select News'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => $this->get_news(),
                'label_block' => true,
                'condition' => [
                    'select_type' => 'news',
                ],
            ]
        );

        $this->end_controls_section();
    }

    private function get_posts()
    {
        $args = [
            'post_type' => 'post',
            'posts_per_page' => -1,
        ];
        $query = new \WP_Query($args);

        $posts = [];
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $posts[get_the_ID()] = get_the_title();
            }
            wp_reset_postdata();
        }
        return $posts;
    }

    private function get_news()
    {
        $args = [
            'post_type' => 'news',
            'posts_per_page' => -1,
        ];
        $query = new \WP_Query($args);

        $posts = [];
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $posts[get_the_ID()] = get_the_title();
            }
            wp_reset_postdata();
        }
        return $posts;
    }

    private function get_event()
    {
        $args = [
            'post_type' => 'event',
            'posts_per_page' => -1,
        ];
        $query = new \WP_Query($args);

        $posts = [];
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $posts[get_the_ID()] = get_the_title();
            }
            wp_reset_postdata();
        }
        return $posts;
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        if ("post" == $settings['select_type']):
            $post_id = $settings['selected_post'];
            $post = get_post($post_id);
        elseif ("event" == $settings['select_type']):
            $post_id = $settings['selected_event'];
            $post = get_post($post_id);
        else:
            $post_id = $settings['selected_news'];
            $post = get_post($post_id);
        endif;

        $content = get_the_content($post);
        $word_count = str_word_count(strip_tags($content));
        $reading_time = ceil($word_count / 200);
        ?>

        <?php if ($post): ?>
            <div class="featured-blog-column">
                <?php if ("post" == $settings['select_type']): ?>
					<a href="<?php echo get_the_permalink($post); ?>" title="<?php echo esc_html(get_the_title($post)); ?>">
                    <div class="featured-blog-thumb">
                        <figure>
                            <?php
                            if (has_post_thumbnail($post)):
                                echo get_the_post_thumbnail($post, 'medium_large', array('class' => 'w-100 h-100 object-cover'));
                            else:
                                echo wp_get_attachment_image(get_field('placeholder', 'option'), 'medium_large', false, ['class' => 'w-100 h-100 object-cover']);
                            endif;
                            ?>
                        </figure>
                    </div>

                    <h5>FEATURED</h5>
                    <h4><?php echo esc_html(get_the_title($post)); ?></h4>
                    <?php
                    if (!empty(get_the_excerpt($post))):
                        //echo '<p>'.get_the_excerpt($post).'</p>';
                    endif;
                    ?>
                    <div class="button-primary">
                        <span> <?php echo get_the_date('j M Y', $post); ?> | <?php echo $reading_time; ?> min read</span>
                        <span class="text-link">Read »</span>
                    </div>
					</a>
                    <?php
                else:
                    if ("event" == $settings['select_type']):
                        $start_date = get_field("start_date", $post);
                        $end_date = get_field("end_date", $post);
                        $start_unixtimestamp = strtotime($start_date);
                        $end_unixtimestamp = strtotime($end_date);
                        $start_event_date = date_i18n("F d", $start_unixtimestamp);
                        $end_event_date = date_i18n("d, Y", $end_unixtimestamp);
                        $date = $start_event_date.' - '.$end_event_date;
                    else:
                        $date = get_the_date('F d, Y', $post);
                    endif;
                    ?>
                    <div class="featured-card-column">
						<a href="<?php echo get_the_permalink($post); ?>" title="<?php echo esc_html(get_the_title($post)); ?>">
                        <h5>FEATURED</h5>
                        <span><?php echo $date; ?></span>
                        <h4><?php echo esc_html(get_the_title($post)); ?></h4>
                        <div class="featured-card-col-thumb">
                            <figure>
                                <?php
                                if (has_post_thumbnail($post)):
                                    echo get_the_post_thumbnail($post, 'medium_large', array('class' => 'w-100 h-100 object-cover'));
                                else:
                                    echo wp_get_attachment_image(get_field('placeholder', 'option'), 'medium_large', false, ['class' => 'w-100 h-100 object-cover']);
                                endif;
                                ?>
                            </figure>
                        </div>

                        <div class="button-primary">
							<span class="text-link"><?php echo $settings['select_type'] == "event"  ? 'View Event »' : 'Read »'; ?></span>
                        </div>
						</a>
                    </div>
                <?php endif; ?>
            </div>
            <?php
        endif;
    }
}
