<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       https://www.chibuz.com
 * @since      1.0.0
 *
 * @package    Responsive_Redirect
 */

// If uninstall not called from WordPress, then exit.
if (! defined('WP_UNINSTALL_PLUGIN')) {
	wp_die(sprintf(
		__('%s should only be called when uninstalling the plugin.', 'pdev'),
		__FILE__
	));
	exit;
}

$role = get_role('administrator');

if (! empty($role)) {
	$role->remove_cap('responsive-redirect-manage');
}

if (class_exists('ResponsiveRedirect\\Includes\\BaseController')) {
	$baseController = new ResponsiveRedirect\Includes\BaseController();
	$option = get_option($baseController->plugin_option_name);

	if (isset($option)) {
		delete_option($baseController->plugin_option_name);
	}
}
