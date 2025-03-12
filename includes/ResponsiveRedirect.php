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

    public function register()
    {
        add_action('template_redirect', [$this, 'get_request_page_path']);
    }

    public function get_request_page_path()
    {
        global $wp;
        $current_url = home_url(add_query_arg(array(), $wp->request));
        $path = ltrim(wp_parse_url($current_url, PHP_URL_PATH), "/");
        return $path;
    }

    public function handle_redirect()
    {
        if (is_admin()) {
            return;
        }

        try {
            $rules = $this->get_rules();
            $url_path = $this->get_request_page_path();

            if (array_key_exists($url_path, $rules)) {

                $rule = $rules[$url_path];
                $detect = new MobileDetect();


                if ($detect->isMobile() && $rule['device_type'] != 'mobile') {
                    if ($rules['redirect_device_mobile'] == 'on') {
                        wp_safe_redirect($rules['redirect_url'], 302);
                        exit;
                    }
                }

                if ($detect->isTablet() && $rule['device_type'] != 'tablet') {
                    if ($rules['redirect_device_tablet'] == 'on') {
                        wp_safe_redirect($rules['redirect_url'], 302);
                        exit;
                    }
                }

                if (!$detect->isMobile() && !$detect->isTablet() && $rule['device_type'] != 'desktop') {
                    if ($rules['redirect_device_mobile'] == 'on') {
                        wp_safe_redirect($rules['redirect_url'], 302);
                        exit;
                    }
                }
            }
        } catch (MobileDetectException $e) {
            print_r($e);
        }
    }
}
