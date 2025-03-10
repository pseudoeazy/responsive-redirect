<?php

namespace ResponsiveRedirect\Includes;

/**
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 * 
 * @link       https://www.chibuz.com
 * @since      1.0.0
 * @author     Chibuzor Otuokwu
 * @namespace ResponsiveRedirect\Includes
 */

class BaseController
{
    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $plugin_name    The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * The unique identifier of this plugin in the options table.
     *
     * @since    1.0.0
     * @access   public
     * @var      string    $plugin_option_name    The string used to uniquely identify this plugin in the options table.
     */
    public $plugin_option_name;


    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $version    The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     *
     * @since    1.0.0
     */
    public function __construct()
    {
        if (defined('RESPONSIVE_REDIRECT_VERSION')) {
            $this->version = RESPONSIVE_REDIRECT_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'responsive-redirect';
        $this->plugin_option_name = 'responsive_redirect';
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     1.0.0
     * @return    string    The name of the plugin.
     */
    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     1.0.0
     * @return    string    The version number of the plugin.
     */
    public function get_version()
    {
        return $this->version;
    }
}
