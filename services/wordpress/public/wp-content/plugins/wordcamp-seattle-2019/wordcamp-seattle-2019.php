<?php
/**
 * WordCamp Seattle 2019 Sample Plugin
 *
 * @package wordcamp-seattle-2019-sample-plugin
 * @author Greg Bueno
 * @copyright 2019 Forum One Communications
 * @license MIT
 *
 * @wordpress-plugin
 * Plugin Name: WordCamp Seattle 2019 Sample Plugin
 * Description: This custom plugin demonstrates how to write code documentation for custom plugins.
 * Version: 1.0
 * Author: Forum One Communications
 * Author URI: http://forumone.com
 * License: MIT
 */

namespace ForumOne\WordPress\Plugins\WordCamp\SamplePlugin;

/**
 * Plugin directory path.
 */
define( 'MY_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Create an autoloader for classes.
if (!function_exists( __NAMESPACE__ . '\\autoload' )) {
    /**
     * Registers auto loader
     *
     * Callback for spl_autoload_register.
     *
     * @param $class_name
     */
    function autoload($class_name )
    {
        $class_name = ltrim($class_name, '\\');
        if ( strpos( $class_name, __NAMESPACE__ ) !== 0 ) {
            return;
        }

        $class_name = str_replace( __NAMESPACE__, '', $class_name );

        $path = plugin_dir_path(__FILE__) . '/lib' . str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';

        require_once( $path );
    }
}

try {
    spl_autoload_register ( __NAMESPACE__ . '\\autoload' );
} catch (\Exception $exception ) {
    error_log( $exception->getMessage() );
}

// Run any activation hooks.
register_activation_hook( __FILE__, array( 'ForumOne\WordPress\Plugins\WordCamp\SamplePlugin\Setup', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'ForumOne\WordPress\Plugins\WordCamp\SamplePlugin\Setup', 'deactivate' ) );

// Run any setup needed for the plugin.
Setup::init();
