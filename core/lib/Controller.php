<?php
namespace Barebone;

use Slim\Container as ContainerInterface;

/**
 * Class Controller
 *
 * @package Barebone
 * @property \Aura\Session\Segment $session
 * @property \Noodlehaus\Config $config
 */
class Controller
{
    use LogTrait;

    /**
     * @var \Slim\Http\Environment
     */
    protected $env;

    /**
     * @var \Slim\Http\Request
     */
    protected $request;

    /**
     * @var \Slim\Http\Response
     */
    protected $response;

    /**
     * Controller constructor.
     *
     * @param ContainerInterface $ci
     */
    public function __construct(ContainerInterface $ci)
    {
        $this->request = $ci->get('request');
        $this->response = $ci->get('response');
        $this->env = $ci->get('environment');
    }

    /**
     * Render a view template with optional data
     *
     * @param $template
     * @param $data (optional)
     *
     * @return \Slim\Http\Response
     */
    protected function render($template, $data = [])
    {
        return $this->getResponse()->write(View::render($template, $data));
    }

    /**
     * Render data variable as application/json string
     *
     * @param array|object $data
     * @param int|null     $status The redirect HTTP status code.
     *
     * @return \Slim\Http\Response
     */
    protected function renderJSON($data = [], $status = null)
    {
        return $this->getResponse()->withJson($data, $status, JSON_PRETTY_PRINT);
    }


    /**
     * Redirect to URL with optional status
     *
     * @param string|UriInterface $url    The redirect destination.
     * @param int|null            $status The redirect HTTP status code.
     *
     * @return \Slim\Http\Response
     */
    protected function redirect($url, $status = null)
    {
        return $this->getResponse()->withRedirect($url, $status);
    }

    /**
     * Catch certain undefined properties and deliver something useful.
     *
     * @param $name
     * @return mixed
     */
    function __get($name)
    {
        if ($name === 'session') {
            return Session::instance();
        }

        if ($name === 'config') {
            return Config::instance();
        }

        return null;
    }

    /**
     * @return \Slim\Http\Environment
     */
    public function getEnvironment()
    {
        return $this->env;
    }

    /**
     * @return \Slim\Http\Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return \Slim\Http\Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}