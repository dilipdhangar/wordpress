<?php
if (session_id() == '') {
    session_start();
}
//require_once get_template_directory() . '/templates/config.php';
//\Stripe\Stripe::setVerifySslCerts(false);
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */
// This theme requires WordPress 5.3 or later.
if (version_compare($GLOBALS['wp_version'], '5.3', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}
if (!function_exists('twenty_twenty_one_setup')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since 1.0.0
     *
     * @return void
     */
    function twenty_twenty_one_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Twenty Twenty-One, use a find and replace
         * to change 'twentytwentyone' to the name of your theme in all the template files.
        */
        load_theme_textdomain('twentytwentyone', get_template_directory() . '/languages');
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        /*
         * Let WordPress manage the document title.
         * This theme does not use a hard-coded <title> tag in the document head,
         * WordPress will provide it for us.
        */
        add_theme_support('title-tag');
        /**
         * Add post-formats support.
         */
        add_theme_support('post-formats', array('link', 'aside', 'gallery', 'image', 'quote', 'status', 'video', 'audio', 'chat',));
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1568, 9999);
        register_nav_menus(array('primary' => esc_html__('Primary menu', 'twentytwentyone'), 'footer' => __('Secondary menu', 'twentytwentyone'),));
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
        */
        add_theme_support('html5', array('comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets',));
        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        $logo_width = 300;
        $logo_height = 100;
        add_theme_support('custom-logo', array('height' => $logo_height, 'width' => $logo_width, 'flex-width' => true, 'flex-height' => true, 'unlink-homepage-logo' => true,));
        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
        // Add support for Block Styles.
        add_theme_support('wp-block-styles');
        // Add support for full and wide align images.
        add_theme_support('align-wide');
        // Add support for editor styles.
        add_theme_support('editor-styles');
        $background_color = get_theme_mod('background_color', 'D1E4DD');
        if (127 > Twenty_Twenty_One_Custom_Colors::get_relative_luminance_from_hex($background_color)) {
            add_theme_support('dark-editor-style');
        }
        $editor_stylesheet_path = './assets/css/style-editor.css';
        // Note, the is_IE global variable is defined by WordPress and is used
        // to detect if the current browser is internet explorer.
        global $is_IE;
        if ($is_IE) {
            $editor_stylesheet_path = './assets/css/ie-editor.css';
        }
        // Enqueue editor styles.
        add_editor_style($editor_stylesheet_path);
        // Add custom editor font sizes.
        add_theme_support('editor-font-sizes', array(array('name' => esc_html__('Extra small', 'twentytwentyone'), 'shortName' => esc_html_x('XS', 'Font size', 'twentytwentyone'), 'size' => 16, 'slug' => 'extra-small',), array('name' => esc_html__('Small', 'twentytwentyone'), 'shortName' => esc_html_x('S', 'Font size', 'twentytwentyone'), 'size' => 18, 'slug' => 'small',), array('name' => esc_html__('Normal', 'twentytwentyone'), 'shortName' => esc_html_x('M', 'Font size', 'twentytwentyone'), 'size' => 20, 'slug' => 'normal',), array('name' => esc_html__('Large', 'twentytwentyone'), 'shortName' => esc_html_x('L', 'Font size', 'twentytwentyone'), 'size' => 24, 'slug' => 'large',), array('name' => esc_html__('Extra large', 'twentytwentyone'), 'shortName' => esc_html_x('XL', 'Font size', 'twentytwentyone'), 'size' => 40, 'slug' => 'extra-large',), array('name' => esc_html__('Huge', 'twentytwentyone'), 'shortName' => esc_html_x('XXL', 'Font size', 'twentytwentyone'), 'size' => 96, 'slug' => 'huge',), array('name' => esc_html__('Gigantic', 'twentytwentyone'), 'shortName' => esc_html_x('XXXL', 'Font size', 'twentytwentyone'), 'size' => 144, 'slug' => 'gigantic',),));
        // Custom background color.
        add_theme_support('custom-background', array('default-color' => 'd1e4dd',));
        // Editor color palette.
        $black = '#000000';
        $dark_gray = '#28303D';
        $gray = '#39414D';
        $green = '#D1E4DD';
        $blue = '#D1DFE4';
        $purple = '#D1D1E4';
        $red = '#E4D1D1';
        $orange = '#E4DAD1';
        $yellow = '#EEEADD';
        $white = '#FFFFFF';
        add_theme_support('editor-color-palette', array(array('name' => esc_html__('Black', 'twentytwentyone'), 'slug' => 'black', 'color' => $black,), array('name' => esc_html__('Dark gray', 'twentytwentyone'), 'slug' => 'dark-gray', 'color' => $dark_gray,), array('name' => esc_html__('Gray', 'twentytwentyone'), 'slug' => 'gray', 'color' => $gray,), array('name' => esc_html__('Green', 'twentytwentyone'), 'slug' => 'green', 'color' => $green,), array('name' => esc_html__('Blue', 'twentytwentyone'), 'slug' => 'blue', 'color' => $blue,), array('name' => esc_html__('Purple', 'twentytwentyone'), 'slug' => 'purple', 'color' => $purple,), array('name' => esc_html__('Red', 'twentytwentyone'), 'slug' => 'red', 'color' => $red,), array('name' => esc_html__('Orange', 'twentytwentyone'), 'slug' => 'orange', 'color' => $orange,), array('name' => esc_html__('Yellow', 'twentytwentyone'), 'slug' => 'yellow', 'color' => $yellow,), array('name' => esc_html__('White', 'twentytwentyone'), 'slug' => 'white', 'color' => $white,),));
        add_theme_support('editor-gradient-presets', array(array('name' => esc_html__('Purple to yellow', 'twentytwentyone'), 'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)', 'slug' => 'purple-to-yellow',), array('name' => esc_html__('Yellow to purple', 'twentytwentyone'), 'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)', 'slug' => 'yellow-to-purple',), array('name' => esc_html__('Green to yellow', 'twentytwentyone'), 'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)', 'slug' => 'green-to-yellow',), array('name' => esc_html__('Yellow to green', 'twentytwentyone'), 'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)', 'slug' => 'yellow-to-green',), array('name' => esc_html__('Red to yellow', 'twentytwentyone'), 'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)', 'slug' => 'red-to-yellow',), array('name' => esc_html__('Yellow to red', 'twentytwentyone'), 'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)', 'slug' => 'yellow-to-red',), array('name' => esc_html__('Purple to red', 'twentytwentyone'), 'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)', 'slug' => 'purple-to-red',), array('name' => esc_html__('Red to purple', 'twentytwentyone'), 'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)', 'slug' => 'red-to-purple',),));
        /*
         * Adds starter content to highlight the theme on fresh sites.
         * This is done conditionally to avoid loading the starter content on every
         * page load, as it is a one-off operation only needed once in the customizer.
        */
        if (is_customize_preview()) {
            require get_template_directory() . '/inc/starter-content.php';
            add_theme_support('starter-content', twenty_twenty_one_get_starter_content());
        }
        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');
        // Add support for custom line height controls.
        add_theme_support('custom-line-height');
        // Add support for experimental link color control.
        add_theme_support('experimental-link-color');
        // Add support for experimental cover block spacing.
        add_theme_support('custom-spacing');
        // Add support for custom units.
        // This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
        add_theme_support('custom-units');
    }
}
add_action('after_setup_theme', 'twenty_twenty_one_setup');
/**
 * Register widget area.
 *
 * @since 1.0.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function twenty_twenty_one_widgets_init() {
    register_sidebar(array('name' => esc_html__('Footer', 'twentytwentyone'), 'id' => 'sidebar-1', 'description' => esc_html__('Add widgets here to appear in your footer.', 'twentytwentyone'), 'before_widget' => '<section id="%1$s" class="widget %2$s">', 'after_widget' => '</section>', 'before_title' => '<h2 class="widget-title">', 'after_title' => '</h2>',));
    register_sidebar(array('name' => esc_html__('Head footer button', 'twentytwentyone'), 'id' => 'top_footer_button', 'description' => esc_html__('Add widgets here to appear in your Head footer button .', 'twentytwentyone'), 'before_widget' => '<section >', 'after_widget' => '</section>', 'before_title' => '<b class="widget-title">', 'after_title' => '</b>',));
    register_sidebar(array('name' => esc_html__('footer_1st section', 'twentytwentyone'), 'id' => 'footer_first_section', 'description' => esc_html__('Add widgets here to appear in your footer first section .', 'twentytwentyone'), 'before_widget' => '<section >', 'after_widget' => '</section>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>',));
    register_sidebar(array('name' => esc_html__('footer social icon', 'twentytwentyone'), 'id' => 'footer_social_icon', 'description' => esc_html__('Add widgets here to appear in your footer social icon.', 'twentytwentyone'), 'before_widget' => '<section >', 'after_widget' => '</section>', 'before_title' => '<h3 class="">', 'after_title' => '</h3>',));
    register_sidebar(array('name' => esc_html__('Copyrights', 'twentytwentyone'), 'id' => 'fooyter_conpy_right', 'description' => esc_html__('Add widgets here to appear in your fooyter last section.', 'twentytwentyone'), 'before_widget' => '<nav class="copy-right">', 'after_widget' => '</nav>', 'before_title' => '<h2 class="">', 'after_title' => '</h2>',));
    register_sidebar(array('name' => esc_html__('footer DOWNLOAD OUR APP', 'twentytwentyone'), 'id' => 'download_app', 'description' => esc_html__('Add widgets here to appear in your footer DOWNLOAD OUR APP.', 'twentytwentyone'), 'before_widget' => '<li  class="img-fluid">', 'after_widget' => '</li>', 'before_title' => '<h3 class="">', 'after_title' => '</h3>',));
    register_sidebar(array('name' => esc_html__('footer logo', 'twentytwentyone'), 'id' => 'footer_logo', 'description' => esc_html__('Add widgets here to appear in your footer logo.', 'twentytwentyone'), 'before_widget' => '<section >', 'after_widget' => '</section>', 'before_title' => '<h3 class="">', 'after_title' => '</h3>',));
}
add_action('widgets_init', 'twenty_twenty_one_widgets_init');
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since 1.0.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function twenty_twenty_one_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('twenty_twenty_one_content_width', 750);
}
add_action('after_setup_theme', 'twenty_twenty_one_content_width', 0);
/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 *
 * @return void
 */
function twenty_twenty_one_scripts() {
    // Note, the is_IE global variable is defined by WordPress and is used
    // to detect if the current browser is internet explorer.
    global $is_IE;
    if ($is_IE) {
        // If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
        wp_enqueue_style('twenty-twenty-one-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get('Version'));
    } else {
        // If not IE, use the standard stylesheet.
        wp_enqueue_style('twenty-twenty-one-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));
    }
    // RTL styles.
    wp_style_add_data('twenty-twenty-one-style', 'rtl', 'replace');
    // Threaded comment reply styles.
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    // Main navigation scripts.
    if (has_nav_menu('primary')) {
        wp_enqueue_script('twenty-twenty-one-primary-navigation-script', get_template_directory_uri() . '/assets/js/primary-navigation.js', array('twenty-twenty-one-ie11-polyfills'), wp_get_theme()->get('Version'), true);
    }
    // Responsive embeds script.
    wp_enqueue_script('twenty-twenty-one-responsive-embeds-script', get_template_directory_uri() . '/assets/js/responsive-embeds.js', array('twenty-twenty-one-ie11-polyfills'), wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'twenty_twenty_one_scripts');
/**
 * Enqueue block editor script.
 *
 * @since 1.0.0
 *
 * @return void
 */
function twentytwentyone_block_editor_script() {
    wp_enqueue_script('twentytwentyone-editor', get_theme_file_uri('/assets/js/editor.js'), array('wp-blocks', 'wp-dom'), wp_get_theme()->get('Version'), true);
}
add_action('enqueue_block_editor_assets', 'twentytwentyone_block_editor_script');
/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function twenty_twenty_one_skip_link_focus_fix() {
    // If SCRIPT_DEBUG is defined and true, print the unminified file.
    if (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) {
        echo '<script>';
        include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
        echo '</script>';
    }
    // The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
    
?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
	</script>
	<?php
}
add_action('wp_print_footer_scripts', 'twenty_twenty_one_skip_link_focus_fix');
/** Enqueue non-latin language styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function twenty_twenty_one_non_latin_languages() {
    $custom_css = twenty_twenty_one_get_non_latin_css('front-end');
    if ($custom_css) {
        wp_add_inline_style('twenty-twenty-one-style', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'twenty_twenty_one_non_latin_languages');
// SVG Icons class.
require get_template_directory() . '/classes/class-twenty-twenty-one-svg-icons.php';
// Custom color classes.
require get_template_directory() . '/classes/class-twenty-twenty-one-custom-colors.php';
new Twenty_Twenty_One_Custom_Colors();
// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';
// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';
// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';
// Customizer additions.
require get_template_directory() . '/classes/class-twenty-twenty-one-customize.php';
new Twenty_Twenty_One_Customize();
// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';
// Block Styles.
require get_template_directory() . '/inc/block-styles.php';
// Dark Mode.
require_once get_template_directory() . '/classes/class-twenty-twenty-one-dark-mode.php';
new Twenty_Twenty_One_Dark_Mode();
/**
 * Enqueue scripts for the customizer preview.
 *
 * @since 1.0.0
 *
 * @return void
 */
function twentytwentyone_customize_preview_init() {
    wp_enqueue_script('twentytwentyone-customize-helpers', get_theme_file_uri('/assets/js/customize-helpers.js'), array(), wp_get_theme()->get('Version'), true);
    wp_enqueue_script('twentytwentyone-customize-preview', get_theme_file_uri('/assets/js/customize-preview.js'), array('customize-preview', 'customize-selective-refresh', 'jquery', 'twentytwentyone-customize-helpers'), wp_get_theme()->get('Version'), true);
}
add_action('customize_preview_init', 'twentytwentyone_customize_preview_init');
/**
 * Enqueue scripts for the customizer.
 *
 * @since 1.0.0
 *
 * @return void
 */
function twentytwentyone_customize_controls_enqueue_scripts() {
    wp_enqueue_script('twentytwentyone-customize-helpers', get_theme_file_uri('/assets/js/customize-helpers.js'), array(), wp_get_theme()->get('Version'), true);
}
add_action('customize_controls_enqueue_scripts', 'twentytwentyone_customize_controls_enqueue_scripts');
/**
 * Calculate classes for the main <html> element.
 *
 * @since 1.0.0
 *
 * @return void
 */
function twentytwentyone_the_html_classes() {
    $classes = apply_filters('twentytwentyone_html_classes', '');
    if (!$classes) {
        return;
    }
    echo 'class="' . esc_attr($classes) . '"';
}
/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since 1.0.0
 *
 * @return void
 */
function twentytwentyone_add_ie_class() {
?>
	<script>
	if ( -1 !== navigator.userAgent.indexOf( 'MSIE' ) || -1 !== navigator.appVersion.indexOf( 'Trident/' ) ) {
		document.body.classList.add( 'is-IE' );
	}
	</script>
	<?php
}
add_action('wp_footer', 'twentytwentyone_add_ie_class');
/* use case , usecase spacification, activity, sequence, functional none functional requrement */
function disable_message_load_field($field) {
    $field['disabled'] = 1;
    return $field;
}
add_filter('acf/load_field/name=message_box_message_content', 'disable_message_load_field');
//------------- for personal detailec -----------//
//create order frountend
add_action('wp_ajax_create_new_order', 'create_new_order');
add_action('wp_ajax_nopriv_create_new_order', 'create_new_order');
function create_new_order() {
    if (isset($_POST['billing_first_name'])) {
	
        $trimmed_array = array_map('trim', $_POST);
		
        extract($trimmed_array);
		
        if (empty($billing_first_name)) {
            echo 'Please enter first name';
            die();
        }
        if (empty($billing_last_name)) {
            echo 'Please enter last name';
            die();
        }
        if (empty($billing_address)) {
            echo 'Please enter billing address';
            die();
        }
        if (empty($location)) {
            echo 'Please enter location';
            die();
        }
       
        if ($service_type == "red") {
			if(empty($qtity))
			{
			    echo 'Please enter how many gallons';
                die();
			  
			}else{
			    $qtity2 = $qtity;
			}
            if (empty($start_date)) {
                echo 'Please enter date';
                die();
            }
            if (empty($start_time)) {
                echo 'Please enter time';
                die();
            }
			/* ckack gas type regular/medium/premium */
			if($gas_type == "regular"){ 
				$pid =280;
	            $service_type = 'regular gas';
			}
			elseif($gas_type == "medium"){ 
				$pid =443;
				$service_type = 'medium Gas';
			}
			elseif($gas_type == "premium"){ 
				$pid =444;
				$service_type = 'premium Gas';				
			}
			/* ckack gas type regular/medium/premium */
        }
		else
		{
			if ($service_type == "green")
			{
				$qtity2 = 1;
				if (empty($description_service)) {
					echo 'Please enter description service';
					die();
				}
				else{
					$service_type = "Tire";
					$pid=281;
					$type = "typeservice";
				}
			} 
			elseif ($service_type == "black")
			{
					$qtity2 = 1;
				if (empty($description_detailing)) {
					echo 'Please enter description detailing';
					die();
				}
				else{
					$service_type = 'Tire';
					$pid=281;
					$type = "typedetaling";
				}
			}
		}
		
		 if($type == "typeservice")
		{
			if( ($type == "typeservice" ) && isset($_FILES['car_image_service']) && ! empty($_FILES['car_image_service']) ) {
				$upload       = wp_upload_bits( $_FILES['car_image_service']['name'], null, file_get_contents( $_FILES['car_image_service']['tmp_name'] ) );
				$filetype     = wp_check_filetype( basename( $upload['file'] ), null );
				$upload_dir   = wp_upload_dir();
				$upl_base_url = is_ssl() ? str_replace('http://', 'https://', $upload_dir['baseurl']) : $upload_dir['baseurl'];
				$base_name    = basename( $upload['file'] ); 
				$neworder_meta['car_image_service'] = array(
					'guid'      => $upl_base_url .'/'. _wp_relative_upload_path( $upload['file'] ), // Url
					'file_type' => $filetype['type'], // File type
					'file_name' => $base_name, // File name
					'title'     => ucfirst( preg_replace('/\.[^.]+$/', '', $base_name ) ), // Title
				);
				 
			}else{
				echo ' Please upload car image service ';
				die();
			}
		}
		elseif($type == "typedetaling")
		{
			if( isset($_FILES['car_image_detailing']) && ! empty($_FILES['car_image_detailing']) ) {
					$upload       = wp_upload_bits( $_FILES['car_image_detailing']['name'], null, file_get_contents( $_FILES['car_image_detailing']['tmp_name'] ) );
					$filetype     = wp_check_filetype( basename( $upload['file'] ), null );
					$upload_dir   = wp_upload_dir();
					$upl_base_url = is_ssl() ? str_replace('http://', 'https://', $upload_dir['baseurl']) : $upload_dir['baseurl'];
					$base_name    = basename( $upload['file'] ); 
					$neworder_meta['car_image_detailing'] = array(
						'guid'      => $upl_base_url .'/'. _wp_relative_upload_path( $upload['file'] ), // Url
						'file_type' => $filetype['type'], // File type
						'file_name' => $base_name, // File name
						'title'     => ucfirst( preg_replace('/\.[^.]+$/', '', $base_name ) ), // Title
					);
					 
			}else{
				echo ' Please upload car image detailing ';
				die();
			}
		}
		
		if( isset($_FILES['car_image']) && ! empty($_FILES['car_image']) ) {
				$upload       = wp_upload_bits( $_FILES['car_image']['name'], null, file_get_contents( $_FILES['car_image']['tmp_name'] ) );
				$filetype     = wp_check_filetype( basename( $upload['file'] ), null );
				$upload_dir   = wp_upload_dir();
				$upl_base_url = is_ssl() ? str_replace('http://', 'https://', $upload_dir['baseurl']) : $upload_dir['baseurl'];
				$base_name    = basename( $upload['file'] ); 
				$neworder_meta['car_image'] = array(
					'guid'      => $upl_base_url .'/'. _wp_relative_upload_path( $upload['file'] ), // Url
					'file_type' => $filetype['type'], // File type
					'file_name' => $base_name, // File name
					'title'     => ucfirst( preg_replace('/\.[^.]+$/', '', $base_name ) ), // Title
				);
				 
			}else{
				echo ' Please upload car image service ';
				die();
			}
		
		if( isset($_FILES['license_plate']) && ! empty($_FILES['license_plate']) ) {
				$upload       = wp_upload_bits( $_FILES['license_plate']['name'], null, file_get_contents( $_FILES['license_plate']['tmp_name'] ) );
				$filetype     = wp_check_filetype( basename( $upload['file'] ), null );
				$upload_dir   = wp_upload_dir();
				$upl_base_url = is_ssl() ? str_replace('http://', 'https://', $upload_dir['baseurl']) : $upload_dir['baseurl'];
				$base_name    = basename( $upload['file'] ); 
				$neworder_meta['license_plate'] = array(
					'guid'      => $upl_base_url .'/'. _wp_relative_upload_path( $upload['file'] ), // Url
					'file_type' => $filetype['type'], // File type
					'file_name' => $base_name, // File name
					'title'     => ucfirst( preg_replace('/\.[^.]+$/', '', $base_name ) ), // Title
				);
				 
		}else{
			echo ' Please upload license plate image ';
			die();
		}
		
	
		
		
		
        $neworder_meta['start_date'] = $start_date;
        $neworder_meta['start_time'] = $start_time;
        $neworder_meta['billing_first_name'] = $billing_first_name;
        $neworder_meta['billing_last_name'] = $billing_last_name;
        $neworder_meta['billing_address'] = $billing_address;
        $neworder_meta['service_type'] = $service_type;
        $neworder_meta['location'] = $location;
        $neworder_meta['description'] = $description;
        //create cart data
        global $woocommerce;
		$woocommerce->cart->empty_cart(); 
        $woocommerce->cart->add_to_cart($pid, $qtity2, NULL, NULL, array('extra_data' => $neworder_meta));
		echo 1;
    }
    exit();
}
add_action('woocommerce_checkout_create_order_line_item', 'save_cart_item_custom_meta_as_order_item_meta', 10, 4);
function save_cart_item_custom_meta_as_order_item_meta($item, $cart_item_key, $values, $order) {
    //$meta_key = 'PR CODE';
    if ($values) {
        foreach ($values['extra_data'] as $key => $vals) {
            if ($key != 'file_upload') {
                $item->update_meta_data($key, $vals);
            }
        }
    }
    if (isset($values['extra_data']['car_image'])) {
       $item->update_meta_data('_img_file', $values['extra_data']['car_image']);
    }
       if (isset($values['extra_data']['license_plate'])) {
       $item->update_meta_data('_img_file_plate', $values['extra_data']['license_plate']);
    }
	if (isset($values['extra_data']['tire_image'])) {
         $item->update_meta_data('_img_file_tire_image', $values['extra_data']['tire_image']);
    }
	if (isset($values['extra_data']['car_image_detailing'])) {
         $item->update_meta_data('_img_file_tire_image', $values['extra_data']['car_image_detailing']);
    }
	if (isset($values['extra_data']['car_image_service'])) {
         $item->update_meta_data('_img_file_tire_image', $values['extra_data']['car_image_service']);
    }
    
}


add_action( 'woocommerce_after_order_itemmeta', 'backend_image_link_after_order_itemmeta', 10, 3 );
function backend_image_link_after_order_itemmeta( $item_id, $item, $product ) {
    // Only in backend for order line items (avoiding errors)
    if( is_admin() && $item->is_type('line_item') && $file_data = $item->get_meta( '_img_file' ) ){
        echo '<p><a href="'.$file_data['guid'].'" target="_blank" class="button">'.__("Open Image") . '</a></p>'; // Optional
        echo '<p><code>'.$file_data['guid'].'</code></p>'; // Optional
    }
	if( is_admin() && $item->is_type('line_item') && $file_data = $item->get_meta( '_img_file_plate' ) ){
        echo '<p><a href="'.$file_data['guid'].'" target="_blank" class="button">'.__("Open Image") . '</a></p>'; // Optional
        echo '<p><code>'.$file_data['guid'].'</code></p>'; // Optional
    }
		if( is_admin() && $item->is_type('line_item') && $file_data = $item->get_meta( '_img_file_tire_image' ) ){
        echo '<p><a href="'.$file_data['guid'].'" target="_blank" class="button">'.__("Open Image") . '</a></p>'; // Optional
        echo '<p><code>'.$file_data['guid'].'</code></p>'; // Optional
    }
}
//*------------user regstration ------------------*//
add_action('wp_ajax_logout_code', 'logout_code');
add_action('wp_ajax_nopriv_logout_code', 'logout_code');
function logout_code() {
    wp_logout();
    exit();
}
add_action('wp_ajax_registerd_user', 'registerd_user');
add_action('wp_ajax_nopriv_registerd_user', 'registerd_user');
function registerd_user() {
    if (isset($_POST['fname'])) {
		
		$rand=time().rand().'Membership';
		
 
        
		
	 
		
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $user_login = trim($_POST['email']);
        $userpass = trim($_POST['password']);
        if (empty($fname) || empty($lname) || empty($user_login) || empty($userpass)) {
            echo 'Please fill all the feilds';
            exit();
        }
        if (email_exists($user_login)) {
            echo "This email already exists !";
            exit();
        }
		
		if(!is_email($user_login)){
			echo "Invalid email address !"; 
            exit();
		}
		
        $_SESSION['registerdata'] = array_map('trim', $_POST);
         
        echo 1;
        exit();
    }
    if (isset($_POST['stripeToken'])) {
        if (!empty($_POST['stripeToken']) && isset($_SESSION['registerdata'])) {
            $Amount = 2000;
            $Currency = 'usd';
            $Token = $_POST['stripeToken'];
            $stripeEmail = $_POST['stripeEmail'];
            $Description = "payment for membership";
            try {
                $stripe_response = \Stripe\Charge::create(array("amount" => $Amount, "currency" => "$Currency", "description" => "$stripeEmail", "source" => $Token));
                if ($stripe_response->status == "succeeded" && !empty($_SESSION['registerdata'])) {
                    extract($_SESSION['registerdata']);
                    $userdata = array('user_login' => $email, 'user_pass' => $password, 'user_email' => $email, 'display_name' => $fname . ' ' . $lname, 'first_name' => $fname, 'last_name' => $lname,);
                    $user_id = wp_insert_user($userdata);
                    if ($user_id) {
                        update_user_meta($user_id, 'payment_info', maybe_serialize($stripe_response));
                        update_user_meta($user_id, 'login_status', 1);
                        /****************login code****************/
                        $userdata = get_user_by('login', $email);
                        $result = wp_check_password($password, $userdata->data->user_pass, $userdata->data->ID);
                        if ($result) {
                            auto_login($userdata);
                            unset($_SESSION['registerdata']);
                            wp_redirect(site_url() . '/');
                            $stripe_responses = array();
                            $stripe_responses['txnid'] = $stripe_response->balance_transaction;
                            $stripe_responses['receipt_url'] = $stripe_response->receipt_url;
                            $stripe_responses['amount'] = $stripe_response->amount;
                            $_SESSION['reg_success'] = $stripe_responses;
                        } else {
                            unset($_SESSION['registerdata']);
                            $_SESSION['reg_error'] = "Translation Failed";
                            wp_redirect(site_url());
                        }
                        /****************logedin code****************/
                    }
                } else {
                    unset($_SESSION['registerdata']);
                    $_SESSION['reg_error'] = "Translation Failed";
                    wp_redirect(site_url());
                }
            }
            catch(Stripe_CardError $e) {
                $body = $e->getJsonBody();
                //print_r($body['error']['code']);
                $_SESSION['reg_error'] = $body['error']['message'];
                wp_redirect(site_url());
            }
            catch(Stripe_InvalidRequestError $e) {
                $body = $e->getJsonBody();
                $_SESSION['reg_error'] = $body['error']['message'];
                wp_redirect(site_url());
            }
            catch(Stripe_AuthenticationError $e) {
                $body = $e->getJsonBody();
                $_SESSION['reg_error'] = $body['error']['message'];
                wp_redirect(site_url());
            }
            catch(Stripe_ApiConnectionError $e) {
                $body = $e->getJsonBody();
                $_SESSION['reg_error'] = $body['error']['message'];
                wp_redirect(site_url());
            }
            catch(Stripe_Error $e) {
                $body = $e->getJsonBody();
                $_SESSION['reg_error'] = $body['error']['message'];
                wp_redirect(site_url());
            }
            catch(Exception $e) {
                $body = $e->getJsonBody();
                $_SESSION['reg_error'] = $body['error']['message'];
                wp_redirect(site_url());
            }
        } else {
            $_SESSION['reg_error'] = 'Token Error';
            wp_redirect(site_url());
        }
    }
    exit();
}
//----------------------------------Email id duplicate or not chacking
//*--------------------------costome login user----------------*//
add_action('wp_ajax_Ajax_custom_login', 'Ajax_custom_login');
add_action('wp_ajax_nopriv_Ajax_custom_login', 'Ajax_custom_login');
function Ajax_custom_login() {
    $creds = array();
    $creds['user_login'] = $_POST['email'];
    $creds['user_password'] = $_POST['password'];
    $creds['remember'] = true;
    $userdata = get_user_by('login', $creds['user_login']); 	
    $result = wp_check_password($creds['user_password'], $userdata->data->user_pass, $userdata->data->ID);
    if ($result) {
        auto_login($userdata);
        echo 1;
    } else {
        echo 'Wrong username or password';
    }
    die();
}

function cehckmembership(){
	
	 if(get_current_user_id()){
			$pending='pending';
			$subscriptions         = pms_get_member_subscriptions( array( 'user_id' => get_current_user_id() ) );
			if($subscriptions){
				
				 
				$subscription_statuses = pms_get_member_subscription_statuses();
				$pending=$subscriptions[0]->status;
				if($pending=='active'){		
                     //date_default_timezone_set("Asia/Calcutta");				
					 $today=date('Y-m-d H:i:s');	
                   if($subscriptions[0]->expiration_date){					
						if($subscriptions[0]->expiration_date<$today){
							  $pending='pending'; 
						}				
				   }else{
					   $pending='pending';
				   }					
				} 
				
			} 	 
			if($pending!='active'){
			
				wp_redirect(site_url().'/join-membership');
				?>
				<script>window.location.href = "<?php echo site_url(); ?>/join-membership";</script>
				<?php
				
			}
	 }
	
}


function auto_login($user) {
    if (!is_user_logged_in()) {
        $user_id = $user->data->ID;
        $user_login = $user->data->user_login;
        wp_set_current_user($user_id, $user_login);
        wp_set_auth_cookie($user_id);
    }
}
//*--------------------------costome login user----------------*//
/*------------ woocomerce use theme  ------------*/
function mytheme_add_woocommerce_support() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');
/*------------ woocomerce use theme  ------------*/
if (!function_exists('redirect_404_to_homepage')) {
    add_action('template_redirect', 'redirect_404_to_homepage');
    function redirect_404_to_homepage() {
        if (is_404()):
            wp_safe_redirect(home_url('/'));
            exit;
        endif;
    }
}
//--------------------- 08 feb ----------------------//











 