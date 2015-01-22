<?php
/**
 * Options Framework
 *
 * @package   Options Framework
 * @author    Devin Price <devin@wptheming.com>
 * @license   GPL-2.0+
 * @link      http://wptheming.com
 * @copyright 2013 WP Theming
 *
 * @wordpress-plugin
 * Plugin Name: Options Framework
 * Plugin URI:  http://wptheming.com
 * Description: A framework for building theme options.
 * Version:     1.7.2
 * Author:      Devin Price
 * Author URI:  http://wptheming.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: rootstrap
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Don't load if rootstrap_init is already defined
if (is_admin() && ! function_exists( 'rootstrap_init' ) ) :

function rootstrap_init() {

	//  If user can't edit theme options, exit
	if ( ! current_user_can( 'edit_theme_options' ) )
		return;

	// Loads the required Options Framework classes.
	require plugin_dir_path( __FILE__ ) . 'includes/class-rootstrap-options.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-rootstrap-options-admin.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-options-interface.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-options-media-uploader.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-options-sanitization.php';

	// Instantiate the main plugin class.
	$rootstrap_framework = new rootstrap_framework;
	$rootstrap_framework->init();

	// Instantiate the options page.
	$rootstrap_framework_admin = new rootstrap_framework_Admin;
	$rootstrap_framework_admin->init();

	// Instantiate the media uploader class
	$rootstrap_framework_media_uploader = new rootstrap_framework_Media_Uploader;
	$rootstrap_framework_media_uploader->init();

}

add_action( 'init', 'rootstrap_init', 20 );

endif;


/**
 * Helper function to return the theme option value.
 * If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * Not in a class to support backwards compatibility in themes.
 */

if ( ! function_exists( 'rootstrap_get_option' ) ) :

function rootstrap_get_option( $name, $default = false ) {
	$config = get_option( 'rootstrap' );

	if ( ! isset( $config['id'] ) ) {
		return $default;
	}

	$options = get_option( $config['id'] );

	if ( isset( $options[$name] ) ) {
		return $options[$name];
	}

	return $default;
}

endif;
