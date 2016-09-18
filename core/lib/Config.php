<?php
namespace Barebone;

use \Noodlehaus\Config as Loader;

class Config
{
    private static $defaults = [
        "app"   => [
            "id"          => "my-app",
            "name"        => "My Application",
            "environment" => "development",
            "debug"       => true
        ],
        "mysql" => [
            "host"      => "localhost",
            "database"  => "test",
            "username"  => "mysql_user",
            "password"  => "mysql_pass",
            "port"      => "3306",
            "charset"   => "utf8",
            "collation" => "utf8_unicode_ci"
        ]
    ];

    /**
     * @var \Noodlehaus\Config
     */
    private static $instance = null;

    /**
     * Instantiate Loader
     *
     * @return \Noodlehaus\Config
     */
    public static function instance()
    {
        if (null === self::$instance) {
            if (!defined('APP_ROOT')) {
                $path = __DIR__ . '/../../app/config.json';
            } else {
                $path = APP_ROOT . 'config.json';
            }

            if (!file_exists($path)) {
                file_put_contents($path, json_encode(self::$defaults, JSON_PRETTY_PRINT));
            }

            $loader = new Loader($path);

            self::$instance = $loader;
        }
        return self::$instance;
    }

    /**
     * Read configuration value
     *
     * @param string $key     path
     * @param mixed  $default Default value if key is empty/not-found
     *
     * @return mixed
     */
    public static function get($key = '', $default = null)
    {
        if (!self::has($key)) {
            return $default;
        }
        return self::instance()->get($key);
    }

    /**
     * Check if key path exists
     *
     * @param string $key path
     *
     * @return boolean
     */
    public static function has($key = '')
    {
        return self::instance()->has($key);
    }

    /**
     * Read all configuration values
     *
     * @return mixed
     */
    public static function all()
    {
        return self::instance()->all();
    }

}