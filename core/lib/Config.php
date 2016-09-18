<?php
namespace Barebone;

use \Noodlehaus\Config as ConfigLoader;

class Config extends ConfigLoader
{
    /**
     * @return array
     * @codeCoverageIgnore
     */
    protected function getDefaults()
    {
        return [
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
    }

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
            self::$instance = new static( $path );
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
    public static function read($key = '', $default = null)
    {
        if (empty($key)) {
            return self::instance()->all();
        }
        if (!self::exists($key)) {
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
    public static function exists($key = '')
    {
        return self::instance()->has($key);
    }

}