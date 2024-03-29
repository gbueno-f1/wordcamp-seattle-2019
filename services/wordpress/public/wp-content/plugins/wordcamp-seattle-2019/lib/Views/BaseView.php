<?php


namespace ForumOne\WordPress\Plugins\WordCamp\SamplePlugin\Views;


use ForumOne\WordPress\Plugins\WordCamp\SamplePlugin\Controllers\EventController;

class BaseView
{

    /**
     * BaseView constructor.
     */
    public function __construct()
    {
    }

    /**
     * render
     *
     * render() displays a view template with an associate array of data. Keys of the $data
     * array become variable names in the template.
     *
     * Specify an alternate template directory with $template_dir. The default is the Views directory itself.
     * $template_path should include subdirectories if templates are organized in such a manner.
     *
     * @since 1.0.0
     *
     * @used-by EventController::shortcode()
     *
     * @param $template_path
     * @param null $data
     * @param null $template_dir
     */
    public static function render($template_path, $data = null, $template_dir = null ) {

        if ( !empty( $data ) ) {
            extract( $data );
        }

        if ( empty( $template_dir ) ) {
            $template_dir = plugin_dir_path( __FILE__ );
        }

        include_once $template_dir . $template_path;
    }
}