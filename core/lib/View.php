<?php
namespace Barebone;

use \Philo\Blade\Blade;

class View
{
    /**
     * @var Blade;
     */
    private static $instance = null;

    /**
     * Instantiate Blade Renderer
     *
     * @return Blade
     */
    public static function instance()
    {
        if (null === self::$instance) {
            self::$instance = new Blade(
                APP_ROOT . 'views',
                PROJECT_ROOT . 'tmp' . DS . 'cache'
            );
        }
        return self::$instance;
    }

    /**
     * Render template
     *
     * @param string $templateName
     * @param array $data
     *
     * @return string
     */
    public static function render($templateName, $data = [])
    {
        return self::instance()->view()->make($templateName, $data)->render();
    }

    /**
     * @param array $data
     * @param integer $flags json_encode options, default is pretty_print
     *
     * @return string A pretty json string
     */
    public static function renderJSON($data = [], $flags = JSON_PRETTY_PRINT)
    {
        return json_encode($data, $flags);
    }
}