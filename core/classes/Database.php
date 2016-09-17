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
	public static function getInstance() {
        if (null === self::$instance) {
			$connection = array_merge([
			    'driver'    => 'mysql',
			    'charset'   => 'utf8',
			    'collation' => 'utf8_unicode_ci',
			    'prefix'    => '',
			], Config::get('mysql', []));

			$capsule = new Capsule;
			$capsule->addConnection($connection);
			$capsule->setEventDispatcher(new Dispatcher(new Container));
			$capsule->setAsGlobal();
			
			self::$instance = $capsule;
        }
		return self::$instance;
	}
	
	/**
	 * Boot Eloquent
	 */
	public static function boot() {
		$capsule = self::getInstance();
		$capsule->bootEloquent();
	}
}