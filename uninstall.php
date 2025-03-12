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




function responsive_redirect_uninstall()
{

	if (class_exists('ResponsiveRedirect\\Includes\\BaseController')) {
		// Deregister settings group and delete all options
		unregister_setting('responsive_redirect_options', 'responsive_redirect_urls');

		$baseController = new ResponsiveRedirect\Includes\BaseController();
		$responsive_rules = $baseController->get_rules();

		// Delete all responsive rules
		foreach ($responsive_rules as $rule) {

			if (isset($rule['origin_url'])) {
				$baseController->delete_redirect_rule($rule['origin_url']);
			}
		}
	}
}
responsive_redirect_uninstall();
