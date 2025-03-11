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
        $existing_options = get_option('responsive_redirect_urls', []); // Fetch saved options

        // Sanitize Origin URL
        if (isset($input['origin_url'])) {
            $sanitized['origin_url'] = sanitize_text_field($input['origin_url']);
        } else {
            return $existing_options;
        }

        // Sanitize Redirect URL
        if (isset($input['redirect_url'])) {
            $sanitized['redirect_url'] = sanitize_text_field($input['redirect_url']);
        } else {
            return $existing_options;
        }

        // Sanitize checkboxes (Ensure values are 'on' or unset)
        $sanitized['device_desktop'] = isset($input['device_desktop']) ? 'on' : '';
        $sanitized['device_tablet'] = isset($input['device_tablet']) ? 'on' : '';
        $sanitized['device_mobile'] = isset($input['device_mobile']) ? 'on' : '';

        $sanitized['redirect_device_desktop'] = isset($input['redirect_device_desktop']) ? 'on' : '';
        $sanitized['redirect_device_tablet'] = isset($input['redirect_device_tablet']) ? 'on' : '';
        $sanitized['redirect_device_mobile'] = isset($input['redirect_device_mobile']) ? 'on' : '';

        // Validate URL format (Optional)
        if (!empty($sanitized['origin_url']) && !preg_match('/^[a-zA-Z0-9\/\-_]+$/', $sanitized['origin_url'])) {
            add_settings_error('responsive_redirect_urls', 'invalid-origin-url', 'Invalid Origin URL format.');
            return $existing_options;
        }

        if (!empty($sanitized['redirect_url']) && !preg_match('/^[a-zA-Z0-9\/\-_]+$/', $sanitized['redirect_url'])) {
            add_settings_error('responsive_redirect_urls', 'invalid-redirect-url', 'Invalid Redirect URL format.');
            return $existing_options;
        }

        return $sanitized;
    }
}
