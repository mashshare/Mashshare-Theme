<?php
/**
 * functions and definitions
 *
 * @package rootstrap
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1170; /* pixels */
}

if ( ! function_exists( 'rootstrap_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rootstrap_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change 'rootstrap' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'rootstrap', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );



	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'rootstrap' ),
		'seconday' => __( 'Secondary Menu', 'rootstrap' ),
		'footer-links' => __( 'Footer Links', 'rootstrap' ) // secondary nav in footer
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rootstrap_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // rootstrap_setup
add_action( 'after_setup_theme', 'rootstrap_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function rootstrap_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'rootstrap' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar(array(
    	'id' => 'home-widget-1',
    	'name' => __( 'Homepage Widget 1', 'rootstrap' ),
    	'description' => __( 'Displays on the Home Page', 'rootstrap' ),
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h3 class="widgettitle">',
    	'after_title' => '</h3>',
    ));

    register_sidebar(array(
      'id' => 'home-widget-2',
      'name' =>  __( 'Homepage Widget 2', 'rootstrap' ),
      'description' => __( 'Displays on the Home Page', 'rootstrap' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
    ));

    register_sidebar(array(
      'id' => 'home-widget-3',
      'name' =>  __( 'Homepage Widget 3', 'rootstrap' ),
      'description' =>  __( 'Displays on the Home Page', 'rootstrap' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
    ));	
    
    register_sidebar(array(
    	'id' => 'footer-widget-1',
    	'name' =>  __( 'Footer Widget 1', 'rootstrap' ),
    	'description' =>  __( 'Used for footer widget area', 'rootstrap' ),
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h3 class="widgettitle">',
    	'after_title' => '</h3>',
    ));

    register_sidebar(array(
      'id' => 'footer-widget-2',
      'name' =>  __( 'Footer Widget 2', 'rootstrap' ),
      'description' =>  __( 'Used for footer widget area', 'rootstrap' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
    ));

    register_sidebar(array(
      'id' => 'footer-widget-3',
      'name' =>  __( 'Footer Widget 3', 'rootstrap' ),
      'description' =>  __( 'Used for footer widget area', 'rootstrap' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
    ));	


    register_widget( 'rootstrap_popular_posts_widget' );
}
add_action( 'widgets_init', 'rootstrap_widgets_init' );

include(get_template_directory() . "/inc/popular-posts-widget.php");

/**
 * adding the rootstrap search form (created in extra.php)
 */

add_filter( 'get_search_form', 'rootstrap_wpsearch' );


/**
 * Enqueue scripts and styles. 
 */
function rootstrap_scripts() {

  wp_enqueue_style( 'rootstrap-bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css' );

  wp_enqueue_style( 'rootstrap-icons', get_template_directory_uri().'/inc/css/font-awesome.min.css' );

  if( ( is_home() || is_front_page() ) && rootstrap_get_option('rootstrap_slider_checkbox') == 1 ) {
		wp_enqueue_style( 'slider-css', get_template_directory_uri().'/inc/css/slider.css' );
  }

	wp_enqueue_style( 'rootstrap-style', get_stylesheet_uri() );

	wp_enqueue_script('rootstrap-bootstrapjs', get_template_directory_uri().'/inc/js/bootstrap.min.js', array('jquery') );
	wp_enqueue_script( 'stickymenu', get_template_directory_uri() . '/inc/js/jquery.sticky.js', array('jquery') );
	wp_enqueue_script( 'rootstrap-bootstrapwp', get_template_directory_uri() . '/inc/js/functions.min.js', array('jquery') );
	wp_enqueue_script( 'layerslider', get_template_directory_uri() . '/inc/js/jquery.cslider.js', array('jquery'), true );	
	if( ( is_home() || is_front_page() ) && rootstrap_get_option('rootstrap_slider_checkbox') == 1 ) {		
		wp_enqueue_script( 'mordernizer', get_template_directory_uri() . '/inc/js/modernizr.custom.28468.js', array('jquery'), true );
	}	
	
	

	wp_enqueue_script( 'rootstrap-skip-link-focus-fix', get_template_directory_uri() . '/inc/js/skip-link-focus-fix.js', array(), '20140222', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rootstrap_scripts' );


/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define('rootstrap_framework_URL', get_template_directory() . '/inc/admin/');
define('rootstrap_framework_DIRECTORY', get_template_directory_uri() . '/inc/admin/');
require_once (rootstrap_framework_URL . 'rootstrap-options.php');



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom nav walker
 */

require get_template_directory() . '/inc/navwalker.php';

/* Load Sidebar Generator
 *
 */

include_once('libs/sidebar-generator.php');

function mashsb_edd_download_supports( $supports ) {
	// add page-attributes
	$add_support = array( 'page-attributes' );
	// merge it back with the original array
	return array_merge( $add_support, $supports );
}
add_filter( 'edd_download_supports', 'mashsb_edd_download_supports' );

/* Change bbPress breadcrumbs from Forum to Support
*/
add_filter('bbp_get_forum_archive_title', 'mashsb_forum_title');
function mashsb_forum_title() {
return 'Support';
}

/*
 * Plugin Name: Easy Digital Downloads - Disable Quantity Field on Download
 * Description: Disables the quantity field on the purchase button added in EDD v2.2
 * Author: Pippin Williamson
 * Version: 1.0
 */
remove_action( 'edd_purchase_link_top', 'edd_download_purchase_form_quantity_field', 10 );

/* Plugin Name: edd_vat 
   Description: Make field State not required 
   Author: René Hermenau
*/
function mashshare_edd_purchase_form_required_fields( $required_fields ) {

	$required_fields['card_address'] = array( 'error_id' => 'invalid_card_address', 'error_message' => __( 'Please enter your Address, e.g. Street and Number.', 'edd' ) ); 
	unset( $required_fields['card_state'] );
	
	return $required_fields;
}
add_filter( 'edd_purchase_form_required_fields', 'mashshare_edd_purchase_form_required_fields' );

/* Get EDD Download Version Shortcode
 * 
 */
function edd_version_shortcode() {
  $version = get_post_meta( get_the_ID(), '_edd_sl_version', TRUE );
  return $version;
}
add_shortcode( 'edd_version', 'edd_version_shortcode' );

/* Includes some custom widgets 
 */
require get_stylesheet_directory() . '/inc/class-widget.php';
require get_stylesheet_directory() . '/inc/class-widget-item-stats.php';

/**
 * Registers our download widget area.
 *
 * @since mashshare-theme 1.0
 */
function mashsb_edd_widgets_init() {
	if ( class_exists( 'Easy_Digital_Downloads' ) ) {
		register_widget( 'TwentyTwelve_EDD_Widget_Stats' );
	}
	
	register_sidebar( array(
		'name' => __( 'Download Widget Area', 'twentytwelve-edd' ),
		'id' => 'sidebar-4',
		'description' => __( 'Appears above the download description.', 'twentytwelve-edd' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'mashsb_edd_widgets_init' );

