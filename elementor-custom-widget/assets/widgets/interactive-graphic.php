<?php
wp_enqueue_style('swiperjs-style');
wp_enqueue_script('swiperjs-script');
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
class Eeatured_Interactive_Graphic_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'interactive_graphic';
    }

    public function get_title()
    {
        return esc_html__('Interactive Graphic');
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
        return ['checkmark', 'cards'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Header Block'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'tagline',
            [
                'label' => esc_html__('Tagline'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
            ]
        );

        $this->add_control(
            'main_heading',
            [
                'label' => esc_html__('Heading'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => esc_html__('Content'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
			'cards_section',
			[
				'label' => esc_html__( 'Cards Lists'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        /* Start repeater */
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'plan_title',
            [
                'label' => esc_html__('Plan Title'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'required' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Profile Image'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'plan_name',
            [
                'label' => esc_html__('Plan Name'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
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
                'label' => esc_html__('Cards Lists'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ plan_title }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
			'extra_section',
			[
				'label' => esc_html__( 'Side Images'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'left_first_image',
            [
                'label' => esc_html__('Left Side First Image'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'left_second_image',
            [
                'label' => esc_html__('Left Side Second Image'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        ob_start();
        //$settings = $this->get_settings_for_display();
        $settings = $this->get_settings();
        if (!empty($settings['list_items']) && is_array($settings['list_items'])) {
            ?>
            <section class="interactive-graphic-section">

                <?php if (!empty($settings['tagline']) && !empty($settings['main_heading']) && !empty($settings['content'])): ?>
                    <div class="interactive-graphic-header">
                        <?php
                        echo !empty($settings['tagline']) ? '<h5>'.$settings['tagline'].'</h5>' : '';
                        echo !empty($settings['main_heading']) ? '<h2>'.$settings['main_heading'].'</h2>' : '';
                        echo !empty($settings['content']) ? $settings['content'] : '';
                        ?>
                    </div>
                <?php endif; ?>

                
                <div class="interactive-graphic-inner">

                    <?php if (!empty($settings['left_first_image']['url'])): ?>
                        <div class="interactive-graphic-single-img">
                            <figure>
                                <img src="<?php echo $settings['left_first_image']['url']; ?>" alt="<?php echo $settings['left_first_image']['alt']; ?>">
                            </figure>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($settings['left_second_image']['url'])): ?>
                        <div class="interactive-graphic-btm-img">
                            <figure>
                                <img src="<?php echo $settings['left_second_image']['url']; ?>" alt="<?php echo $settings['left_second_image']['alt']; ?>">
                            </figure>
                        </div>
                    <?php endif; ?>
                    
                  
                    <div class="interactive-line-animation-wrap animation-box"> 
                        
                    <div class="interactive-line-animation animation line-animation"> 
                        <div class="svg-line">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="1158.1" height="440.8" version="1.1" viewBox="0 0 1158.1 440.8">
  <path class="cls-1" d="M112.6,3.5h934s108-5,110,110c0,0,2,105-111,108s-938,0-938,0c0,0-103.2.2-106,105.4,0,0-8,107.6,106,109.6s938,0,938,0"/>
</svg>
                        </div>
                    <ul>
                        <?php
                        $i = 1;
                        foreach ($settings['list_items'] as $item):
                            ?>
                            <?php if (!empty($item['plan_title']) && !empty($item['content'])): ?>
                                <li>
                                    <div class="dots">
                                        <div class="interactive-graphic-popup">
                                            <?php if (!empty($item['plan_title'])): ?>
                                                <div class="acf-module acf-module-buttons d-flex is-layout-flex">
                                                    <div class="is-style-fill">
                                                        <a href="javascript:void(0)" class="acf-element dot acf-element-button modal-trigger"
                                                            data-target="#interactive-popup<?php echo $i; ?>">
                                                            <div class="interactive-title">
                                                                <h5><?php echo $item['plan_title']; ?></h5>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            
                                        </div>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php $i++; endforeach; ?>
                    </ul>
                    </div>
                    </div>
                </div>
                
                
                        <?php
                        $i = 1;
                        foreach ($settings['list_items'] as $item):
                            ?>
                            <?php if (!empty($item['plan_title']) && !empty($item['content'])): ?>
                                
                                    
                                        <div class="interactive-graphic-popup">
                                            <?php if (!empty($item['image']) && !empty($item['content'])): ?>
                                                <div id="interactive-popup<?php echo $i; ?>" class="modal modal-closed position-fixed top-0 end-0 bottom-0 start-0" aria-hidden="true">
                                                    <div class="modal-dialog is-closed d-flex position-absolute top-0 end-0 bottom-0 start-0 justify-content-center align-content-center">
                                                        <div class="modal-overlay d-block position-absolute top-0 end-0 bottom-0 start-0"></div>
                                                        <div class="modal-content position-relative">
                                                            <div class="modal-body translate-middle-y">
                                                                <div class="interactive-graphic-content">

                                                                    <?php if (!empty($item['image']['url'])): ?>
                                                                        <figure>
                                                                            <img src="<?php echo $item['image']['url']; ?>" alt="<?php echo $item['image']['alt']; ?>">
                                                                        </figure>
                                                                    <?php endif; ?>

                                                                    <?php if (!empty($item['plan_name']) || !empty($item['content'])): ?>
                                                                        <div class="interactive-content-inner">
                                                                            <?php
                                                                            echo !empty($item['plan_name']) ? '<h2>'.$item['plan_name'].'</h2>' : '';
                                                                            echo !empty($item['content']) ? $item['content'] : '';
                                                                            ?>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <button class="modal-close d-block border-0 shadow-none p-0 position-absolute top-0 end-0 z-1" type="button" data-target="#interactive-popup1" aria-label="Close Modal"></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    
                                
                            <?php endif; ?>
                        <?php $i++; endforeach; ?>
                    
            </section>
            <?php
        }
        echo ob_get_clean();
    }

    protected function _content_template()
    {
    }
}
