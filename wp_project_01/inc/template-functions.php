<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package lorem
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function lorem_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'lorem_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function lorem_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'lorem_pingback_header' );

/*Project Code*/
function options($args)
{
	return get_field($args, 'options');
}

/*================================================================
* 			Add Admin page logo
* ================================================================*/
function my_login_logo() { 
	$logo = options('admin_logo');
	$logo_width = options('admin_logo_width').'px'; 
	$logo_height = options('admin_logo_height').'px'; 
	$bg_color = options('admin_background_color');
	$btn_color = options('admin_login_button_color');
	$label_color = options('admin_label_color');
	$btn_style = options('admin_button_style');
		
	// Background Color
	if($bg_color != '')
	{$bg_color = $bg_color ;}
	else
	{ $bg_color = '#fff'; } 
	
	// Button Color
	if($btn_color != '')
	{$btn_color = $btn_color ;}
	else
	{ $btn_color = '#cf202f'; } 
	
	// Label Color
	if($label_color != '')
	{$label_color = $label_color ;}
	else
	{ $label_color = '#000000'; } 
	

?>
<style type="text/css">
	#login h1 a, .login h1 a {
	background-image: url(<?php echo $logo['url']; ?>);
	height:<?php echo $logo_height; ?>;
	width:<?php echo $logo_width; ?>;
	background-size:<?php echo $logo_width .' '. $logo_height; ?>;
	background-repeat: no-repeat;
	padding-bottom: 0px;
	}
	body.login, #loginform label{
	  background: #fff none repeat scroll 0 0 !important;
	  color: <?php echo $label_color; ?>;
	  font-size: 18px;
	}
	<?php if($btn_style == 'round'):?>
	.login .button.button-primary.button-large {
	  background: <?php echo $btn_color; ?> none repeat scroll 0 0;
	  border: 1px solid <?php echo $btn_color; ?>;
	  border-radius: 100%;
	  height: 65px !important;
	  width: 65px !important;
	  color:#fff;
	  padding:0 !important;
	  font-size: 15px;
	  box-shadow:none;
	  text-shadow:none;
	}
	.login .forgetmenot > label {
	  padding-top: 40px;
	}
	<?php else : ?>
	
	.login .button.button-primary.button-large {
	  background: <?php echo $btn_color; ?> none repeat scroll 0 0;
	  border: 1px solid <?php echo $btn_color; ?>;
	  border-radius: 5px;
	  color:#fff;
	  font-size: 15px;
	  box-shadow:none;
	  text-shadow:none;
	}
		
	<?php endif;?>
			
	.login .button.button-primary.button-large:hover{
		background-color: transparent;
		border: 1px solid <?php echo $btn_color; ?>;
		color: <?php echo $btn_color; ?>;
		font-size: 15px;
	}
	.login.login-action-login {
		background: <?php echo $bg_color;?> !important;
	}
	.login #backtoblog a, .login #nav a{
		color:#000000!important;
	}
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function custom_loginlogo_url($url) {
    return site_url();
}

function my_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter('login_headerurl', 'custom_loginlogo_url');
add_filter('login_headertext', 'my_login_logo_url_title');

function _remove_script_version($src) {
    $parts = explode('?ver', $src);
    return $parts[0];
}   
add_filter('script_loader_src', '_remove_script_version', 15, 1);
add_filter('style_loader_src', '_remove_script_version', 15, 1);

/**
 * FlexLayout Shortcode
 */
add_shortcode( 'flexlayout','flexLayout' );
function flexLayout($attr){
	$fields = get_field_objects();
	$flex_field=$attr['name'];
    $fid=$fields[$flex_field]['ID'];
	if ( isset($fid) )
	{
		$sections = array();
		$newdata=$fields[$flex_field]['layouts'];
		foreach($newdata as $l){
			array_push($sections,$l['name']);
		}
	    
		if ( have_rows( $flex_field ) ) : 
			while ( have_rows( $flex_field ) ) : the_row(); 
				if ( in_array(get_row_layout(),$sections) ) : 
					$filename = get_template_directory()."/template-parts/flexible-sections/".get_row_layout().".php";
					if(!file_exists($filename)):
					    $myfile = fopen( get_template_directory()."/template-parts/flexible-sections/".get_row_layout().".php", "w") or die("Unable to open file!");
				        $txt = '<section id="sec-'.str_replace("_", "-", get_row_layout()).'" class="sec-'.str_replace("_", "-", get_row_layout()).'">Add HTML code Here</section>';
				        fwrite($myfile, $txt);
				        fclose($myfile);
					endif;								
					get_template_part("/template-parts/flexible-sections/".get_row_layout());
				endif;
			endwhile;
		else: 
			get_template_part( 'content', 'page' );
		endif;
	}else{
	    //echo "in else";
		get_template_part( 'content', 'page' );
	}	
}

// Social Links - Shortcode 
function social_links_shortcode() {
    ob_start();
		if (have_rows('social_links', 'option')): ?>
			<ul>
				<?php
				while (have_rows('social_links', 'option')): the_row();
					$social_media_link = esc_url(get_sub_field('profilepage_link'));
					$icon_class        = esc_attr(get_sub_field('social_media_icon'));
					if (!empty($social_media_link)): ?>
						<li>
							<a href="<?php echo $social_media_link; ?>" target="_blank" aria-label="<?php echo $icon_class; ?>">
								<i class="<?php echo $icon_class; ?>" aria-hidden="true"></i>
							</a>
						</li>
					<?php endif;
				endwhile; ?>
			</ul>
		<?php endif;
    return ob_get_clean();
}
add_shortcode('sociallinks', 'social_links_shortcode');

function get_sanitized_email_link($email) {
    if ($email) {
        $email = trim($email);
        return '<a href="mailto:' . esc_attr($email) . '" title="mail us" class="contact-email">' . esc_html($email) . '</a>';
    }
    return '';
}

function get_sanitized_phone_link($phone_number) {
	$orphome=$phone_number;
    if ($phone_number) {
		$orphome=$phone_number;
        $phone_number = preg_replace('/[^0-9+]/', '', $phone_number); 
        return '<a href="tel:' . esc_attr($phone_number) . '" title="call us" class="contact-phone">' . esc_html($orphome) . '</a>';
    }
    return '';
}

function numeric_pagination() {
    global $wp_query;
    
    $big = 999999999; // Unique number for replacing in paginate_links()

    $pages = paginate_links([
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'prev_text' => __('Prev', 'textdomain'),
        'next_text' => __('Next', 'textdomain'),
        'type'      => 'array'
    ]);

    if (is_array($pages)) {
        echo '<ul class="page-numbers">';
        foreach ($pages as $page) {
            echo "<li>$page</li>";
        }
        echo '</ul>';
    }
}

function disable_page_cpt_search($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_search()) {
        $query->set('post_type', ['post']); // Only include 'post'
    }
}
add_action('pre_get_posts', 'disable_page_cpt_search');

/*For Blog Permalink*/
function add_blog_to_post_permalinks($post_link, $post) {
    if ($post->post_type === 'post') {
        return home_url('/blog/' . $post->post_name . '/');
    }
    return $post_link;
}
add_filter('post_link', 'add_blog_to_post_permalinks', 10, 2);
function add_blog_rewrite_rules($rules) {
    $new_rules = array(
        'blog/([^/]+)/?$' => 'index.php?name=$matches[1]&post_type=post',
    );
    return $new_rules + $rules;
}
add_filter('rewrite_rules_array', 'add_blog_rewrite_rules');
function redirect_old_post_urls() {
    if (is_singular('post')) {
        $correct_url = home_url('/blog/' . get_post_field('post_name', get_queried_object_id()) . '/');
        if (untrailingslashit($correct_url) !== untrailingslashit(get_permalink())) {
            wp_redirect($correct_url, 301);
            exit;
        }
    }
}
add_action('template_redirect', 'redirect_old_post_urls');
/*For Blog Permalink End*/

function display_app_logos() {
    ob_start(); // Start output buffering
    
    if (have_rows('app_logos', 'option')) : ?>
        <div class="app-logo-wrap">
            <?php while (have_rows('app_logos', 'option')) : the_row(); 
                $logo_image = get_sub_field('app_logo_image'); 
                $logo_link = get_sub_field('app_logo_link'); 
                if ($logo_image): ?>
                    <a href="<?php echo esc_url($logo_link); ?>" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo esc_url($logo_image['url']); ?>" alt="<?php echo esc_attr($logo_image['alt']); ?>">
                    </a>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    <?php endif;

    return ob_get_clean(); // Return the buffered content
}
add_shortcode('app_logos', 'display_app_logos');
add_filter('wp_img_tag_add_auto_sizes', '__return_false');

function clean_empty_p_tags_on_save($content) {
    // Remove empty paragraphs and paragraphs with only &nbsp;
    return preg_replace('/<p>(\s|&nbsp;)*<\/p>/i', '', $content);
}
add_filter('content_save_pre', 'clean_empty_p_tags_on_save');
