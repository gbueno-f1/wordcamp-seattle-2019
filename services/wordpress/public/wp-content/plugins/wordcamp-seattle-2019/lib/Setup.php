<?php
/**
 * Hello Dolly Setup
 *
 * Initializes plugin.
 */

namespace ForumOne\WordPress\Plugins\WordCamp\SamplePlugin;


use ForumOne\WordPress\Plugins\WordCamp\SamplePlugin\Controllers\HelloDollyController;

/**
 * Class Setup
 *
 * Provides activation and deactivation callbacks and provides an entry point to run plugin code.
 *
 * @since 1.0.0
 *
 * @package ForumOne\WordPress\Plugins\WordCamp\SamplePlugin
 */
class Setup
{
    /**
     * Setup constructor
     *
     * @since 1.0.0
     */
    public function __construct() {

    }

    /**
     * Run main plugin functionality
     *
     * init() is analogous to the main() function of many programs. Use this method to run other parts of the plugin code.
     *
     * @since 1.0.0
     */
    public static function init() {
        HelloDollyController::init();
    }

    /**
     * Callback for activation hook
     *
     * activate() runs any functions that need to be triggered upon activating the plugin. This method is a callback
     * for the register_activation_hook.
     *
     * @since 1.0.0
     */
    public static function activate() {

    }

    /**
     * Callback for deactivation hook
     *
     * deactivate() runs any functions that need to be triggered upon deactivating the plugin. This method is a callback
     * for the register_deactivation_hook.
     *
     * @since 1.0.0
     */
    public static function deactivate() {

    }

}