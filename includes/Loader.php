<?php

namespace ResponsiveRedirect\Includes;

use ResponsiveRedirect\Pages\Admin;

/**
 * The loader that's responsible for maintaining and registering all hooks that powers
 * the plugin.
 *
 * @since    1.0.0
 *  
 */
final class Loader
{
    /**
     * Get the list of service classes to register.
     *
     * @return array List of class names.
     */
    public static function get_services()
    {
        return [
            ResponsiveRedirect::class,
            Admin::class
        ];
    }

    /**
     * Register all the services by calling their register method if it exists.
     * Run the loader to execute all of the hooks with WordPress.
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);

            if ($service && method_exists($service, 'register')) {
                add_action('init', [$service, 'register']); // Lazy load on 'init' hook
            }
        }
    }

    /**
     * Instantiate the class if it exists.
     *
     * @param string $class The class name to instantiate.
     * @return object|null The instance of the class, or null if it doesn't exist.
     */
    public static function instantiate($class)
    {
        if (class_exists($class)) {
            $service = new $class();
            return $service;
        }

        return null;
    }
}
