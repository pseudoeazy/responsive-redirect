<?php

namespace ResponsiveRedirect\Includes;

/**
 * Handles plugin activation.
 *
 * This class runs during the plugin's activation, setting up necessary configurations.
 * It is loaded automatically via Composer's PSR-4 autoloader.
 *
 * @since 1.0.0
 * @namespace ResponsiveRedirect\Includes
 * @author Chibuzor Otuokwu
 * @link       https://www.chibuz.com 
 */
class Activator
{



	/**
	 * Short Description. (use period)
	 *
	 * @since    1.0.0
	 */
	public static function activate()
	{
		if (!current_user_can('install_plugins')) {
			wp_die('You do not have sufficient privileges to install plugins.');
		}
	}
}
