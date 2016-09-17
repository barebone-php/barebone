<?php
namespace Barebone;

use \Noodlehaus\Config as Loader;

class Config {

    /**
     * @var \Noodlehaus\Config
     */
    private static $config = null;

    /**
     * Read configuration value
     *
     * @param string $key Configuration key path
	 * @param mixed $default Default value if key is empty/not-found
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        if (null === self::$config) {
            self::$config = new Loader(APP_ROOT . DS . 'config.json');
        }
		if (!self::$config->has($key)) {
			return $default;
		}
        return self::$config->get($key);
    }

    /**
     * Read all configuration values
     *
     * @return mixed
     */
    public static function all()
    {
        if (null === self::$config) {
            self::$config = new Loader(APP_ROOT . DS . 'config.json');
        }
        return self::$config->all();
    }
			
}