<?php

/**
 * theme's main functions and globally usable variables, contants etc
 * added: v1.0
 * textdomain: blo, class: BLO, var: $blo_, constants: BLO_, function: blo_
 */

// shorthand contants
// ------------------------------------------------------------------------
define('BLO_THEME', 'BLO  Industrial WordPress Theme');
define('BLO_VERSION', '3.4.1');
define('BLO_MINWP_VERSION', '4.3');


// shorthand contants for theme assets url
// ------------------------------------------------------------------------
define('BLO_THEME_URI', get_template_directory_uri());
define('BLO_IMG', BLO_THEME_URI . '/assets/images');
define('BLO_CSS', BLO_THEME_URI . '/assets/css');
define('BLO_JS', BLO_THEME_URI . '/assets/js');



// shorthand contants for theme assets directory path
// ----------------------------------------------------------------------------------------
define('BLO_THEME_DIR', get_template_directory());
define('BLO_IMG_DIR', BLO_THEME_DIR . '/assets/images');
define('BLO_CSS_DIR', BLO_THEME_DIR . '/assets/css');
define('BLO_JS_DIR', BLO_THEME_DIR . '/assets/js');

define('BLO_CORE', BLO_THEME_DIR . '/core');
define('BLO_COMPONENTS', BLO_THEME_DIR . '/components');
define('BLO_EDITOR', BLO_COMPONENTS . '/editor');
define('BLO_EDITOR_ELEMENTOR', BLO_EDITOR . '/elementor');
define('BLO_EDITOR_GUTENBERG', BLO_EDITOR . '/gutenberg');
define('BLO_SHORTCODE_DIR_STYLE', BLO_EDITOR_ELEMENTOR . '/widgets/style');
define('BLO_INSTALLATION', BLO_CORE . '/installation-fragments');
define('BLO_REMOTE_CONTENT', esc_url('http://wp.xpeedstudio.com/demo-content/blo'));
define('BLO_GLOBAL_UNYSON', esc_url('https://demo.xpeedstudio.com/global-plugin'));

// set up the content width value based on the theme's design
// ----------------------------------------------------------------------------------------
if (!isset($content_width)) {
    $content_width = 800;
}

// set up theme default and register various supported features.
// ----------------------------------------------------------------------------------------

function blo_setup() {

    // make the theme available for translation
    $lang_dir = BLO_THEME_DIR . '/languages';
    load_theme_textdomain('blo', $lang_dir);

    // add support for post formats
    add_theme_support('post-formats', [
        'standard', 'image', 'video', 'audio','gallery'
    ]);

    // add support for automatic feed links
    add_theme_support('automatic-feed-links');

    // let WordPress manage the document title
    add_theme_support('title-tag');

    // add support for post thumbnails
    add_theme_support('post-thumbnails');

    // //add custom header
    add_theme_support('custom-header');

    // //add custom background 
    add_theme_support('custom-background');


    // hard crop center center
    set_post_thumbnail_size(750, 465, ['center', 'center']);
    add_image_size( 'blo-small', 350, 250, ['center', 'center'] );
    add_image_size( 'blo-case-study-box', 320, 200, ['center', 'center'] );

   

    // register navigation menus
    register_nav_menus(
        [
            'primary' => esc_html__('Primary Menu', 'blo'),
            'footermenu' => esc_html__('Footer Menu', 'blo'),
            'submenu' => esc_html__('Sub Header Menu', 'blo'),
        ]
    );

    // HTML5 markup support for search form, comment form, and comments
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));
    /*
     * Enable support for wide alignment class for Gutenberg blocks.
     */
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );

    add_theme_support('woocommerce');

}
add_action('after_setup_theme', 'blo_setup');


add_action('enqueue_block_editor_assets', 'blo_action_enqueue_block_editor_assets' );
function blo_action_enqueue_block_editor_assets() {
    wp_enqueue_style( 'blo-fonts', blo_google_fonts_url(['Merriweather:300,300i,400,400i,700,700i,900,900i', 'Rubik:300,300i,400,400i,500,500i,700,700i,900,900i']), null, BLO_VERSION );
    wp_enqueue_style( 'blo-gutenberg-editor-font-awesome-styles', BLO_CSS . '/font-awesome.css', null, BLO_VERSION );
    wp_enqueue_style( 'blo-gutenberg-editor-customizer-styles', BLO_CSS . '/gutenberg-editor-custom.css', null, BLO_VERSION );
    wp_enqueue_style( 'blo-gutenberg-editor-styles', BLO_CSS . '/gutenberg-custom.css', null, BLO_VERSION );
    wp_enqueue_style( 'blo-gutenberg-blog-styles', BLO_CSS . '/blog.css', null, BLO_VERSION );
}

// hooks for unyson framework
// ----------------------------------------------------------------------------------------
function blo_framework_customizations_path($rel_path) {
    return '/components';
}
add_filter('fw_framework_customizations_dir_rel_path', 'blo_framework_customizations_path');

function blo_remove_fw_settings() {
    remove_submenu_page( 'themes.php', 'fw-settings' );
}
add_action( 'admin_menu', 'blo_remove_fw_settings', 999 );

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}


// include the init.php
// ----------------------------------------------------------------------------------------
require_once( BLO_CORE . '/init.php');
require_once( BLO_COMPONENTS . '/editor/elementor/elementor.php');


// Optimization work
add_action('wp_enqueue_scripts', 'blo_remove_unused_css_files', 9999);
function blo_remove_unused_css_files()
{
    $fontawesome = blo_option('fontawesome_off', 'no');
    $blocklibrary = blo_option('wp_block_library_off', 'no');
    $dashicons = blo_option('dashicons_off', 'no');
    $elementoricons = blo_option('elementor_icons_off', 'no');
    $woocommerce_css = blo_option('woocommerce_css', 'no');

    if ($dashicons == 'yes') {
        // Don't remove it in the backend
        if (is_admin() || current_user_can('manage_options')) {
            return;
        }
        wp_dequeue_style('dashicons');
    }

    // dequeue fontawesome icons file
    if ($fontawesome == 'yes') {
        wp_dequeue_style('font-awesome');
        wp_deregister_style('font-awesome');
        wp_dequeue_style('font-awesome-5-all');
        wp_deregister_style('font-awesome-5-all');
        wp_dequeue_style('font-awesome-4-shim');
        wp_deregister_style('font-awesome-4-shim');
        wp_dequeue_style('fontawesome-five-css');
        wp_dequeue_script('font-awesome-4-shim');
    }

    // woocommerce css
    if($woocommerce_css == 'yes' ){
        if( is_front_page()){
            wp_dequeue_style('woocommerce-layout');
            wp_deregister_style('woocommerce-layout');
            wp_dequeue_style('woocommerce-smallscreen');
            wp_deregister_style('woocommerce-smallscreen');
            wp_dequeue_style('woocommerce-general');
            wp_deregister_style('woocommerce-general');
            wp_dequeue_style('woocommerce-inline-inline');
            wp_deregister_style('woocommerce-inline-inline');
            wp_dequeue_style('wc-blocks-vendors-style');
            wp_deregister_style('wc-blocks-vendors-style');
            wp_dequeue_style('wc-blocks-style');
            wp_deregister_style('wc-blocks-style');
        }
    }

    // dequeue block-library file
    if ($blocklibrary == 'yes') {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_script('jquery-blockui');
        wp_deregister_script('jquery-blockui');
    }

    if ($elementoricons == 'yes') {
        // Don't remove it in the backend
        if (is_admin() || current_user_can('manage_options')) {
            return;
        }
        wp_dequeue_style('elementor-animations');
        wp_dequeue_style('elementor-icons');
        wp_deregister_style('elementor-icons');
    }
}

/* disable option for font awesome icons from elementor editor */
add_action('elementor/frontend/after_register_styles', function () {
    $fontawesome = 'yes';
    if ($fontawesome == 'yes') {
        foreach (['solid', 'regular', 'brands'] as $style) {
            wp_deregister_style('elementor-icons-fa-' . $style);
        }
    }

}, 20);

/* disable option for font awesome icons from elementor editor */
add_filter('elementor/icons_manager/native', function ($icons) {
    $fontawesome = true;
    if ($fontawesome == true) {
        unset($icons['fa-regular']);
        unset($icons['fa-solid']);
        unset($icons['fa-brands']);
    }

    return $icons;
});

//meta description
function blo_meta_description()
{
    global $post;
    if (is_singular()) {
        $des_post = $post->post_title;
        echo '<meta name="description" content="' . $des_post . '" />' . "\n";
    }
    if (is_home()) {
        echo '<meta name="description" content="' . get_bloginfo("description") . '" />' . "\n";
    }
    if (is_archive()) {
        echo '<meta name="description" content="' . get_bloginfo("description") . '" />' . "\n";
    }
}
add_action('wp_head', 'blo_meta_description');
//Defer js
function defer_js_render($url)
{
    if (is_user_logged_in()) {
        return $url;
    }

    if (false === strpos($url, '.js')) {
        return $url;
    }

    if (strpos($url, 'jquery.min.js')) {
        return $url;
    }

    return str_replace('src', 'defer src', $url);
}
add_filter('script_loader_tag', 'defer_js_render', 10);