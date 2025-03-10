<?php

namespace ResponsiveRedirect\Pages;

use ResponsiveRedirect\Includes\BaseController;


class Admin extends BaseController
{

    protected $page_url =  'responsive-redirect-options';
    /**
     * Register the settings page for the admin area.
     * Register the stylesheets for the admin area.
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function register()
    {
        add_action('admin_menu', [$this, 'register_settings']);
        add_action('admin_init', [$this, 'settings_init']);
        wp_enqueue_style($this->plugin_name, RESPONSIVE_REDIRECT_PLUGIN_URL . 'assets/dist/css/responsive-redirect.css', array(), $this->version, 'all');
        wp_enqueue_script($this->plugin_name, RESPONSIVE_REDIRECT_PLUGIN_URL . 'assets/dist/js/responsive-redirect.js', array('jquery'), $this->version, true);
    }

    public function register_settings()
    {
        add_options_page(
            'Responsive Redirect Settings',
            'Responsive Redirect',
            'manage_options',
            $this->page_url,
            [$this, 'render_settings_page']
        );
    }


    public function settings_init()
    {
        register_setting('responsive_redirect_options', 'responsive_redirect_urls');

        add_settings_section(
            'responsive_redirect_section',
            '',
            '__return_false',
            $this->page_url
        );

        add_settings_field(
            'responsive_redirect_field',
            'Redirect Rules',
            [$this, 'render_fields'],
            $this->page_url,
            'responsive_redirect_section'
        );
    }

    public function render_settings_page()
    {
        require_once __DIR__ . '/../templates/settings-page.php';
    }

    public function render_fields()
    {
        require_once __DIR__ . '/../templates/settings-field.php';
    }
}
