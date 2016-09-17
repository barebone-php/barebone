<?php
namespace Barebone;

use \Monolog\Logger as Monolog;
use \Monolog\Handler\StreamHandler;

class Log {

    /**
     * @var \Monolog\Logger
     */
    private static $instance = null;

    /**
     * Instantiate Monolog
     * @return Monolog
     */
    public static function getInstance()
    {
        if (null === self::$instance) {
            $logger = new Monolog(Config::get('app.id'));
            $path = APP_ROOT . DS . 'logs' .DS . 'app.log';
            $file_handler = new StreamHandler($path);
            $logger->pushHandler($file_handler);
    
            self::$instance = $logger;
        }
        return self::$instance;
    }

    /**
     * Log "INFO" message
     *
     * @param string $message
     * @return mixed
     */
    public static function info($message)
    {
        return self::getInstance()->addInfo($message);
    }

    /**
     * Log "WARNING" message
     *
     * @param string $message
     * @return mixed
     */
    public static function warning($message)
    {
        return self::getInstance()->addWarning($message);
    }

    /**
     * Log "ERROR" message
     *
     * @param string $message
     * @return mixed
     */
    public static function error($message)
    {
        return self::getInstance()->addError($message);
    }

}