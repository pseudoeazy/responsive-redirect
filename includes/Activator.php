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
	public static function activate(BaseController $baseController)
	{
		$role = get_role('administrator');

		if (!empty($role)) {
			$role->add_cap('responsive-redirect-manage');
		}

		add_option($baseController->plugin_option_name, array(
			'redirect_urls' => []
		));
	}
}
