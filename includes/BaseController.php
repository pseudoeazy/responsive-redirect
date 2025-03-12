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

    /**
     * The name used to uniquely identify the plugin rule within the wp_options table.
     *
     * @since     1.0.0
     * @return    string    The name of the plugin option rule.
     */
    public function get_option_key()
    {
        return $this->get_plugin_name() . '_';
    }

    /**
     * Saves a redirect rule in the WordPress options table.
     *
     * @param string $key The unique identifier for the redirect rule.
     * @param array $responsive_rules The array containing redirect rule details.
     */
    public function save_rules(string $key, array $responsive_rules)
    {
        // Check if the current user has the required permission to modify options.
        if (current_user_can('manage_options')) {
            // Generate the option key by appending a sanitized version of the key.
            $option_key = $this->get_option_key() . sanitize_title($key);

            // Store the redirect rule in the WordPress options table.
            update_option($option_key, $responsive_rules);
        }
    }

    /**
     * Deletes a specific redirect rule from the WordPress options table.
     *
     * @param string $key The unique identifier for the redirect rule.
     * @return bool Returns true if the rule was successfully deleted, false otherwise.
     */
    public function delete_redirect_rule($key)
    {
        $is_deleted = false;

        // Check if the current user has the required permission to modify options.
        if (current_user_can('manage_options')) {
            // Generate the option key by appending a sanitized version of the key.
            $option_key = $this->get_option_key() . sanitize_title($key);

            // Delete the redirect rule from the WordPress options table.
            $is_deleted = delete_option($option_key);
        }

        return $is_deleted;
    }

    /**
     * Retrieves a specific redirect rule from the WordPress options table.
     *
     * @param string $key The unique identifier for the redirect rule.
     * @return mixed The stored redirect rule data or false if not found.
     */
    public function get_rule(string $key)
    {
        // Generate the option key by appending a sanitized version of the key.
        $option_key = $this->get_option_key() . sanitize_title($key);

        // Retrieve the redirect rule from the WordPress options table.
        return get_option($option_key);
    }

    /**
     * Retrieves all redirect rules stored in the WordPress options table.
     *
     * @return array An associative array of all stored redirect rules.
     */
    public function get_rules()
    {
        global $wpdb;

        // Define the prefix to match option names associated with redirect rules.
        $prefix = $this->get_option_key() . "%";

        // SQL query to fetch all matching options.
        $sql = "SELECT option_name, option_value 
            FROM {$wpdb->options} 
            WHERE option_name LIKE %s";

        // Prepare and execute the SQL query with the prefix as a wildcard search.
        $query = $wpdb->prepare($sql, $prefix);
        $results = $wpdb->get_results($query);

        // Initialize an array to store retrieved redirect rules.
        $responsive_rules = [];

        // Loop through the results and extract relevant data.
        foreach ($results as $row) {
            // Extract the rule key by removing the option key prefix.
            $key = str_replace($this->get_option_key(), '', $row->option_name);

            // Deserialize the option value (if applicable) and store it in the array.
            $responsive_rules[$key] = maybe_unserialize($row->option_value);
        }

        // Return the associative array of redirect rules.
        return $responsive_rules;
    }
}
