<?php
/**
 * @package   rootstrap_framework
 * @author    Devin Price <devin@wptheming.com>
 * @license   GPL-2.0+
 * @link      http://wptheming.com
 * @copyright 2013 WP Theming
 */

class rootstrap_framework {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since 1.7.0
	 * @type string
	 */
	const VERSION = '1.7.2';

	/**
	 * Initialize the plugin.
	 *
	 * @since 1.7.0
	 */
	public function init() {

		// Needs to run every time in case theme has been changed
		add_action( 'admin_init', array( $this, 'set_theme_option' ) );

	}

	/**
	 * Sets option defaults
	 *
	 * @since 1.7.0
	 */
	function set_theme_option() {

		// Load settings
        $rootstrap_settings = get_option( 'rootstrap' );

        // Updates the unique option id in the database if it has changed
        if ( function_exists( 'rootstrap_option_name' ) ) {
			rootstrap_option_name();
        }
        elseif ( has_action( 'rootstrap_option_name' ) ) {
			do_action( 'rootstrap_option_name' );
        }
        // If the developer hasn't explicitly set an option id, we'll use a default
        else {
            $default_themename = get_option( 'stylesheet' );
            $default_themename = preg_replace( "/\W/", "_", strtolower($default_themename ) );
            $default_themename = 'rootstrap_' . $default_themename;
            if ( isset( $rootstrap_settings['id'] ) ) {
				if ( $rootstrap_settings['id'] == $default_themename ) {
					// All good, using default theme id
				} else {
					$rootstrap_settings['id'] = $default_themename;
					update_option( 'rootstrap', $rootstrap_settings );
				}
            }
            else {
				$rootstrap_settings['id'] = $default_themename;
				update_option( 'rootstrap', $rootstrap_settings );
            }
        }

	}

	/**
	 * Wrapper for rootstrap_options()
	 *
	 * Allows for manipulating or setting options via 'rootstrap_options' filter
	 * For example:
	 *
	 * <code>
	 * add_filter( 'rootstrap_options', function( $options ) {
	 *     $options[] = array(
	 *         'name' => 'Input Text Mini',
	 *         'desc' => 'A mini text input field.',
	 *         'id' => 'example_text_mini',
	 *         'std' => 'Default',
	 *         'class' => 'mini',
	 *         'type' => 'text'
	 *     );
	 *
	 *     return $options;
	 * });
	 * </code>
	 *
	 * Also allows for setting options via a return statement in the
	 * options.php file.  For example (in options.php):
	 *
	 * <code>
	 * return array(...);
	 * </code>
	 *
	 * @return array (by reference)
	 */
	static function &_rootstrap_options() {
		static $options = null;

		if ( !$options ) {
	        // Load options from options.php file (if it exists)
	        $location = apply_filters( 'rootstrap_framework_location', array('options.php') );
	        if ( $optionsfile = locate_template( $location ) ) {
	            $maybe_options = require_once $optionsfile;
	            if ( is_array( $maybe_options ) ) {
					$options = $maybe_options;
	            } else if ( function_exists( 'rootstrap_options' ) ) {
					$options = rootstrap_options();
				}
	        }

	        // Allow setting/manipulating options via filters
	        $options = apply_filters( 'rootstrap_options', $options );
		}

		return $options;
	}

}