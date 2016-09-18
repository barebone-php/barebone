<?php
namespace Barebone;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

/**
 * Database Connection
 */
class Database {
	
	/**
	 * @param \Illuminate\Database\Capsule\Manager
	 */
	private static $instance;
	
	/**
	 * Instantiate Eloquent ORM
	 */
	public static function instance() {
        if (null === self::$instance) {
			$capsule = new Capsule;
			$capsule->addConnection(self::getConfig());
			$capsule->setEventDispatcher(new Dispatcher(new Container));
			$capsule->setAsGlobal();
			
			self::$instance = $capsule;
        }
		return self::$instance;
	}

    /**
     * Return connection config
     *
     * @return array
     */
    public static function getConfig()
    {
        return array_merge([
            'driver'    => 'mysql',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ], Config::get('mysql', []));
    }

	/**
	 * Boot Eloquent
	 */
	public static function boot()
    {
        self::instance()->bootEloquent();
	}
}