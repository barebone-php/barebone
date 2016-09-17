<?php
namespace Barebone;

use Philo\Blade\Blade;

class View
{
    /**
     * @var \Twig_Environment
     */
    private static $instance = null;

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
        if (null === self::$instance) {
            self::$instance = new Blade(
                APP_ROOT . 'views',
                PROJECT_ROOT . 'tmp' . DS . 'cache'
            );
        }
        return self::$instance->view()->make($templateName, $data)->render();
    }

    public static function renderJSON($data = [])
    {
        return json_encode($data, JSON_PRETTY_PRINT);
    }
}