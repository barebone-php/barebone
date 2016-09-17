<?php
namespace Barebone;

use \Noodlehaus\Config as Loader;

class Config {

    /**
     * @var \Noodlehaus\Config
     */
    private static $instance = null;

    /**
     * Instantiate Loader
     *
     * @return \Noodlehaus\Config
     */
    public static function loaded()
    {
        if (null === self::$instance) {
            $path = APP_ROOT . DS . 'config.json';
            $loader = new Loader($path);

            self::$instance = $loader;
        }
        return self::$instance;
    }

    /**
     * Read configuration value
     *
     * @param string $key path
	 * @param mixed $default Default value if key is empty/not-found
     * @return mixed
     */
    public static function get($key = '', $default = null)
    {
		if (!self::has($key)) {
			return $default;
		}
        return self::loaded()->get($key);
    }

    /**
     * Check if key path exists
     *
     * @param string $key path
     * @return boolean
     */
    public static function has($key = '')
    {
        return self::loaded()->has($key);
    }

    /**
     * Read all configuration values
     *
     * @return mixed
     */
    public static function all()
    {
        return self::loaded()->all();
    }
			
}