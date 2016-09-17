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
     * @return Segment
     */
    public static function getInstance()
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
     * @param string $key Configuration key path
	 * @param mixed $default Default value if key is empty/not-found
     * @return mixed
     */
    public static function get($key = '', $default = null)
    {
		if (!self::getInstance()->has($key)) {
			return $default;
		}
        return self::getInstance()->get($key);
    }

    /**
     * Read all configuration values
     *
     * @return mixed
     */
    public static function all()
    {
        return self::getInstance()->all();
    }
			
}