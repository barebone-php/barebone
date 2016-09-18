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
     * @var \Monolog\Logger
     */
    public static $filepath = null;

    /**
     * Instantiate Monolog
     * @return Monolog
     */
    public static function instance()
    {
        if (null === self::$instance) {
            $logger = new Monolog(Config::read('app.id'));
            $file_handler = new StreamHandler(self::getFilepath());
            $logger->pushHandler($file_handler);
    
            self::$instance = $logger;
        }
        return self::$instance;
    }

    /**
     * @return string full path to log file
     */
    public static function getFilepath()
    {
        return PROJECT_ROOT . 'tmp' . DS . 'logs' .DS . 'app.log';
    }

    /**
     * Log "INFO" message
     *
     * @param string $message
     * @return Boolean Whether the record has been processed
     */
    public static function info($message)
    {
        return self::instance()->addInfo($message);
    }

    /**
     * Log "WARNING" message
     *
     * @param string $message
     * @return Boolean Whether the record has been processed
     */
    public static function warning($message)
    {
        return self::instance()->addWarning($message);
    }

    /**
     * Log "ERROR" message
     *
     * @param string $message
     * @return Boolean Whether the record has been processed
     */
    public static function error($message)
    {
        return self::instance()->addError($message);
    }

}