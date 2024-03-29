<?php


namespace ForumOne\WordPress\Plugins\WordCamp\SamplePlugin\Models;


use ForumOne\WordPress\Plugins\WordCamp\SamplePlugin\Controllers\EventController;

class Events
{
    /**
     * Query Salsa Engage API for events.
     *
     * query() connects to the Salsa Engage API and returns a list of events.
     *
     * @param array $options
     * @return array|mixed|object
     *
     * @see https://developer.wordpress.org/plugins/http-api/
     *
     * @since 1.0.1
     *
     * @used-by EventController::get()
     *
     * @uses wp_remote_get()
     * @uses wp_remote_retrieve_body()
     */
    public static function query($options = array() ) {

    }
}