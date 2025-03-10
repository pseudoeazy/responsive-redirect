<?php

namespace ResponsiveRedirect\Pages;

use ResponsiveRedirect\Includes\BaseController;

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.chibuz.com
 * @since      1.0.0
 *
 *  @namespace ResponsiveRedirect\Pages
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 *  @namespace ResponsiveRedirect\Pages
 * @author     Chibuzor Otuokwu <easy4sng@gmail.com>
 */

class Admin extends BaseController
{



    /**
     * Register the settings page for the admin area.
     * Register the stylesheets for the admin area.
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function register()
    {
        add_action('admin_menu', [$this, 'create_submenu']);
        wp_enqueue_style($this->plugin_name, RESPONSIVE_REDIRECT_PLUGIN_URL . 'assets/dist/css/responsive-redirect.css', array(), $this->version, 'all');
        wp_enqueue_script($this->plugin_name, RESPONSIVE_REDIRECT_PLUGIN_URL . 'assets/dist/js/responsive-redirect.js', array('jquery'), $this->version, true);
    }

    public function create_submenu()
    {
        add_options_page('Responsive Redirect Settings', 'Responsive Redirect', 'manage_options', 'responsive-redirect-options', [$this, 'settings_page']);
    }

    public function settings_page()
    {
        require_once __DIR__ . '/../templates/admin-settings-page.php';
    }
}
