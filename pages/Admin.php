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
        register_setting(
            'responsive_redirect_options',
            'responsive_redirect_urls',
            ['sanitize_callback' => [$this, 'sanitize_inputs']]
        );

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

    public function sanitize_inputs($input)
    {
        $sanitized = [];

        // Check if the user has permission to manage options
        if (!current_user_can('manage_options')) {
            add_settings_error('responsive_redirect_urls', 'unauthorized', 'You do not have permission to update settings.');
            return []; // Stop execution if unauthorized
        }

        // Sanitize Origin URL
        if (isset($input['origin_url'])) {
            $sanitized['origin_url'] = sanitize_text_field($input['origin_url']);
        }

        // Sanitize Redirect URL
        if (isset($input['redirect_url'])) {
            $sanitized['redirect_url'] = sanitize_text_field($input['redirect_url']);
        }

        // Allowed values for the device type radio buttons
        $allowed_values = ['desktop', 'tablet', 'mobile'];

        if (isset($input['device_type']) && in_array($input['device_type'], $allowed_values, true)) {
            $sanitized['device_type'] = sanitize_text_field($input['device_type']);
        } else {
            $sanitized['device_type'] = 'desktop'; // Default value
        }

        // Sanitize checkboxes (Ensure values are 'on' or unset)
        $sanitized['redirect_device_desktop'] = isset($input['redirect_device_desktop']) ? 'on' : '';
        $sanitized['redirect_device_tablet'] = isset($input['redirect_device_tablet']) ? 'on' : '';
        $sanitized['redirect_device_mobile'] = isset($input['redirect_device_mobile']) ? 'on' : '';

        // Validate URL 
        $errors = [];

        if (!empty($sanitized['origin_url']) && !preg_match('/^[a-zA-Z0-9\/\-_]+$/', $sanitized['origin_url'])) {
            $errors[] = 'Invalid Origin URL format.';
        }

        if (!empty($sanitized['redirect_url']) && !preg_match('/^[a-zA-Z0-9\/\-_]+$/', $sanitized['redirect_url'])) {
            $errors[] = 'Invalid Redirect URL format.';
        }

        // If errors exist, display them and do not save
        if (!empty($errors)) {
            foreach ($errors as $error) {
                add_settings_error('responsive_redirect_urls', 'invalid-data', $error);
            }
            return []; // Stop execution and return an empty array
        }

        // Store the data with 'origin_url' as the key
        $key = sanitize_title($sanitized['origin_url']); // Ensure key is safe
        $this->save_rules($key, $sanitized);

        return $sanitized; // Return sanitized data
    }
}
