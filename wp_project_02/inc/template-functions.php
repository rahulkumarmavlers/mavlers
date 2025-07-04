<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package lorem_ipsum
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function loremipsum_body_classes( $classes ) {
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
add_filter( 'body_class', 'loremipsum_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function loremipsum_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'loremipsum_pingback_header' );

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
	{ $label_color = '#182A54'; } 
	

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
		color:<?php echo $label_color; ?>!important;
	}
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function custom_loginlogo_url() {
    return home_url();
}
function custom_loginlogo_url_title() {
    return esc_attr(get_bloginfo('name'));
}
add_filter('login_headerurl', 'custom_loginlogo_url');
add_filter('login_headertitle', 'custom_loginlogo_url_title');

function remove_script_version($src) {
    return remove_query_arg('ver', $src);
}   
add_filter('script_loader_src', 'remove_script_version', 15);
add_filter('style_loader_src', 'remove_script_version', 15);

/**
 * Copyright Shortcode for Current Year
 */
function cyear_func() {
    return date('Y');
}
add_shortcode('cyear', 'cyear_func');

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

function allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');

/**
 * Sanitize SVG files on upload
 */
function sanitize_svg_upload($file) {
    if ($file['type'] === 'image/svg+xml') {
        $file['ext'] = 'svg';
        $file['type'] = 'image/svg+xml';
    }
    return $file;
}
add_filter('wp_check_filetype_and_ext', 'sanitize_svg_upload', 10, 4);

function custom_breadcrumb() {
    echo '<div class="breadcrumb"><ul>';
    
    // Home link
    echo '<li><a href="' . home_url() . '">Home</a></li>';
    
    if (is_singular()) { 
        $post_type = get_post_type();
        $post_type_object = get_post_type_object($post_type);

        // If it's a custom post type, show its archive link
        if ($post_type != 'post' && $post_type_object->has_archive) {
            echo '<li><a href="' . get_post_type_archive_link($post_type) . '">' . esc_html($post_type_object->labels->name) . '</a></li>';
        }

        // Show post title
        echo '<li>' . get_the_title() . '</li>';
    } elseif (is_category() || is_tax()) {
        $term = get_queried_object();
        echo '<li>' . esc_html($term->name) . '</li>';
    } elseif (is_archive()) {
        echo '<li>' . get_the_archive_title() . '</li>';
    } elseif (is_search()) {
        echo '<li>Search results for "' . get_search_query() . '"</li>';
    } elseif (is_404()) {
        echo '<li>Page not found</li>';
    }

    echo '</ul></div>';
}

// Redirect category, tag, and author archives to 404
add_action('template_redirect', function () {
    if (is_category() || is_tag() || is_author() || is_archive() ) {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
        nocache_headers();
        include get_query_template('404');
        exit;
    }
});

function redirect_search_to_home() {
    if (is_search() && !is_admin()) {
        wp_redirect(home_url(), 301);
        exit;
    }
}
add_action('template_redirect', 'redirect_search_to_home');


add_filter( 'gform_confirmation_anchor', '__return_false' );

function gform_smooth_scroll_to_confirmation() {
    ?>
    <script type="text/javascript">
		(function($) {
			$(document).on('gform_confirmation_loaded', function(event, formId) {
				setTimeout(function() {
					var $confirmation = $('#gform_confirmation_wrapper_' + formId);
					var target = $('.gform_confirmation_message'); // Your custom anchor class

					if (target.length) {
						$('html, body').animate({
							scrollTop: target.offset().top - 300// Adjust offset as needed
						}, 1000);
					} else if ($confirmation.length) {
						$('html, body').animate({
							scrollTop: $confirmation.offset().top - 300
						}, 1000);
					}
				}, 1000); // Optional delay before scroll
			});
		})(jQuery);
	</script>
    <?php
}
add_action('wp_footer', 'gform_smooth_scroll_to_confirmation');