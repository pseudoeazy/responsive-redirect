<?php

/**
 * @link              https://www.chibuz.com
 * @since             1.0.0
 * @package           ResponsiveRedirect
 *
 * @wordpress-plugin
 * Plugin Name:       Responsive Redirect
 * Plugin URI:        https://www.chibuz.com/projects/responsive-redirect
 * Description:       A WordPress plugin that redirects users based on their device type (mobile, tablet, or desktop). Perfect for optimizing user experience by sending visitors to the most appropriate version of your site.
 * Version:           1.0.0
 * Author:            Chibuzor Otuokwu
 * Author URI:        https://www.chibuz.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       responsive-redirect
 */

if (!defined('ABSPATH')) {
	die;
}

define('RESPONSIVE_REDIRECT_VERSION', '1.0.0');
define('RESPONSIVE_REDIRECT_PLUGIN_URL', plugin_dir_url(__FILE__));

// Load Composer autoloader if available
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
	require_once __DIR__ . '/vendor/autoload.php';
}


function responsive_redirect_activate()
{
	ResponsiveRedirect\Includes\Activator::activate();
}
register_activation_hook(__FILE__, 'responsive_redirect_activate');


function responsive_redirect_deactivate()
{
	ResponsiveRedirect\Includes\Deactivator::deactivate();
}
register_deactivation_hook(__FILE__, 'responsive_redirect_deactivate');


if (class_exists('ResponsiveRedirect\\Includes\\Loader')) {
	ResponsiveRedirect\Includes\Loader::register_services();
}
