<?php
/**
 * functions and definitions
 *
 * @package rootstrap
 */
 
 
 //Making jQuery to load from Google Library
function mashtheme_replace_jquery() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, '1.11.3');
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'mashtheme_replace_jquery');
 
 /* Add title-tag support
 */

add_action( 'after_setup_theme', 'theme_slug_setup' );

function theme_slug_setup() {

	add_theme_support( 'title-tag' );
}

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

  //wp_enqueue_style( 'rootstrap-icons', get_template_directory_uri().'/inc/css/font-awesome.min.css' );

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
/*function mashsb_edd_widgets_init() {
	if ( class_exists( 'Easy_Digital_Downloads' ) ) {
		register_widget( 'Mashshare_EDD_Widget_Stats' );
	}
	
	register_sidebar( array(
		'name' => __( 'Download Widget Area', 'mashshare-edd' ),
		'id' => 'sidebar-4',
		'description' => __( 'Appears above the download description.', 'mashshare-edd' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'mashsb_edd_widgets_init' );*/

/* Add excerpts to pages
 */

add_action( 'init', 'mashshare_add_excerpts_to_pages' );
function mashshare_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}


/* remove jetpack open graph */
remove_action( 'wp_head', 'jetpack_og_tags' );

/* Login function incl. purchase history redirect */

// Add Shortcode
function mash_purchase_history() {
    if (is_user_logged_in()){
     echo '<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Purchases</a></li>
      <li><a href="#download" data-toggle="tab">Download</a></li>
      <li><a href="#profile" data-toggle="tab">Profile</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
        <form id="tab">'.
        do_shortcode('[purchase_history]').
        '</form>
      </div>
      <div class="tab-pane fade" id="download">
    	<form id="tab2">'.
        do_shortcode('[download_history]').	
    	'</form>
      </div>
      <div class="tab-pane fade" id="profile">
    	<form id="tab3">'.
        do_shortcode('[edd_profile_editor]').	
    	'</form>
      </div>
  </div>';
        
        
    } else {
        echo do_shortcode('[edd_login redirect="' . get_permalink(69) . '"]');
        echo '<a href="https://www.mashshare.net/register-support/">Register an account</a>';

    }
}
add_shortcode( 'mashshare_purchase_history', 'mash_purchase_history' );

/* Get taxonomy title */

function mash_get_tax_title(){
$taxonomy = 'kbe_taxonomy';
$queried_term = get_query_var($taxonomy);
$terms = get_terms($taxonomy, 'slug='.$queried_term);
if ($terms) {
  foreach($terms as $term) {
    return $term->name;
  }
}
}

/* A special widget which is not shown when its content is empty
Useful when widgets should be only visible for non logged in user
*/

function mashDiscreetText() {
class mashDiscreetTextWidget extends WP_Widget
{
	public function __construct() {
		$widget_ops = array('classname' => 'discreet_text_widget', 'description' => __('Arbitrary text or HTML, only shown if not empty'));
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('discrete_text', __('Discreet Text'), $widget_ops, $control_ops);
   
	}

	public function widget( $args, $instance ) {
		extract($args, EXTR_SKIP);
		$text = apply_filters( 'widget_text', $instance['text'] );
		if (empty($text)) return;
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?>
			<div class="textwidget"><?php echo $instance['filter'] ? wpautop($text) : $text; ?></div>
		<?php
		echo $after_widget;
	}
        	/**
	 * @param array $instance
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$text = esc_textarea($instance['text']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Content:' ); ?></label>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea></p>

		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs'); ?></label></p>
<?php
	}

}
return register_widget("mashDiscreetTextWidget");
}
add_action('widgets_init', 'mashDiscreetText');

/* Prevent tinyMce from removing span tags */

function override_mce_options($initArray) {
$opts = '*[*]';
$initArray['valid_elements'] = $opts;
$initArray['extended_valid_elements'] = $opts;
return $initArray;} 
add_filter('tiny_mce_before_init', 'override_mce_options');

// DISABLE default WordPress change password notifications
if (!function_exists('wp_password_change_notification')) {
    function wp_password_change_notification($user) {
    return;
    }
}
// Disable comments on attachements
function mashsb_filter_media_comment_status( $open, $post_id ) {
	$post = get_post( $post_id );
	if( $post->post_type == 'attachment' ) {
		return false;
	}
	return $open;
}
add_filter( 'comments_open', 'mashsb_filter_media_comment_status', 10 , 2 );

/*
Hide discount code field
*/
remove_action( 'edd_checkout_form_top', 'edd_discount_field', -1 );



