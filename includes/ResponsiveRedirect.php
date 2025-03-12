<?php

namespace ResponsiveRedirect\Includes;

use Detection\MobileDetect;
use Detection\Exception\MobileDetectException;

/**
 * The file that defines the core plugin class
 *
 * 
 * @link       https://www.chibuz.com
 * @since      1.0.0
 * @author     Chibuzor Otuokwu
 * @namespace ResponsiveRedirect\Includes
 */

class ResponsiveRedirect extends BaseController
{
    /**
     * Registers the plugin's redirection functionality with WordPress.
     */
    public function register()
    {
        // Hooks into 'template_redirect' to handle page redirection before WordPress outputs the template.
        add_action('template_redirect', [$this, 'handle_redirect']);
    }

    /**
     * Retrieves the current request path from the URL.
     *
     * @return string The request path without the domain.
     */
    public function get_request_page_path()
    {
        global $wp;

        // Get the full URL of the current page.
        $current_url = home_url(add_query_arg(array(), $wp->request));

        // Extracts the path component of the URL and removes leading slashes.
        $path = ltrim(wp_parse_url($current_url, PHP_URL_PATH), "/");

        return $path;
    }

    /**
     * Handles the redirection logic based on device type.
     */
    public function handle_redirect()
    {
        // Prevents execution in the WordPress admin dashboard.
        if (is_admin()) {
            return;
        }

        try {
            // Retrieves redirection rules from the plugin's settings or configuration.
            $rules = $this->get_rules();

            // Gets the current request path.
            $url_path = $this->get_request_page_path();

            // Checks if the current URL path exists in the redirection rules.
            if (array_key_exists($url_path, $rules)) {
                $rule = $rules[$url_path];

                // Initializes the MobileDetect library to determine the device type.
                $detect = new MobileDetect();

                // Redirects mobile users if the rule specifies a different target device.
                if ($detect->isMobile() && $rule['device_type'] != 'mobile') {
                    if ($rule['redirect_device_mobile'] == 'on') {
                        wp_safe_redirect($rule['redirect_url'], 302);
                        exit;
                    }
                }

                // Redirects tablet users if the rule specifies a different target device.
                if ($detect->isTablet() && $rule['device_type'] != 'tablet') {
                    if ($rule['redirect_device_tablet'] == 'on') {
                        wp_safe_redirect($rule['redirect_url'], 302);
                        exit;
                    }
                }

                // Redirects desktop users if the rule specifies a different target device.
                if (!$detect->isMobile() && !$detect->isTablet() && $rule['device_type'] != 'desktop') {
                    if ($rule['redirect_device_desktop'] == 'on') {
                        wp_safe_redirect($rule['redirect_url'], 302);
                        exit;
                    }
                }
            }
        } catch (MobileDetectException $e) {
            // Handles any exceptions thrown by the MobileDetect library.
            error_log($e->getMessage());
        }
    }
}
