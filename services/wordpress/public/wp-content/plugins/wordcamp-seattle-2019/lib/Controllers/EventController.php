<?php


namespace ForumOne\WordPress\Plugins\WordCamp\SamplePlugin\Controllers;


use ForumOne\WordPress\Plugins\WordCamp\SamplePlugin\Models\Events;

class EventController
{
    /**
     * Events constructor
     */
    public function __construct() {

    }

    /**
     * Run main plugin functionality==
     *
     * init() is analogous to the main() function of many programs. Call this method to set up state for the plugin
     * and to add action or filter hooks to WordPress.
     *
     * @since 1.0.0
     */
    public static function init() {
        add_action( 'wp_ajax_salsa_engage_events', array( __CLASS__, 'get' ) );
        add_action( 'wp_ajax_nopriv_salsa_engage_events', array( __CLASS__, 'get' ) );
        add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_scripts' ) );
        add_shortcode( 'afj_salsa_engage_events', array( __CLASS__, 'shortcode' ) );
    }

    /**
     * Enqueue front end scripts
     *
     * enqueue_scripts() is the callback method for wp_enqueue_scripts.
     *
     * @since 1.0.0
     *
     * @todo Move assets from theme to plugin.
     */
    public static function enqueue_scripts() {

    }

    /**
     * Display events with a shortcode
     *
     * shortcode() is the callback method for the shortcode "afj_salsa_engage_events".
     *
     * Insert the shortcode into a post or page content to display the same list of events as the sidebar widget.
     *
     * This shortcode accepts no attributes.
     *
     * @see https://codex.wordpress.org/Shortcode_API
     * 
     * @since 1.0.0
     *
     * @uses \ForumOne\WordPress\Plugins\WordCamp\SamplePlugin\Controllers\EventController::get()
     *
     * @return string|null
     */
    public static function shortcode() {
        $results = self::get( true );

        $dump = print_r( $results, true );

        $output = <<< OUTPUT
<pre>
$dump;
</pre>
OUTPUT;

        echo $output;
    }

    /**
     * Retrieve events from Salsa
     *
     * get() connects to the Salsa Engage API and returns a list of events in the form of JSON.
     *
     * @since 1.0.0
     *
     * @uses \ForumOne\WordPress\Plugins\WordCamp\SamplePlugin\Models\Events::query()
     *
     * @param bool $returnString Flag to return JSON as an object instead of an HTTP response.
     * @return string|bool JSON string of events or false on failure.
     */
    public static function get( $returnString = false ) {
        $results = Events::query();

        if ( $returnString === true ) {
            return wp_json_encode( $results );
        } else {
            return wp_send_json( $results );
        }
    }
}