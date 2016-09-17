<?php
namespace Barebone;

class Controller {

    /**
     * Expose Traits
     */
    use Core;

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
     * @param \Slim\Container $ci
     */
    public function __construct(\Slim\Container $ci) {
        $this->request = $ci->get('request');
        $this->response = $ci->get('response');
        $this->env = $ci->get('environment');
    }

    /**
     * Render a view template with optional data
     *
     * @param $template
     * @param $data (optional)
     * @return \Slim\Http\Response
     */
    protected function render($template, $data = []) {
        return $this->response->write(View::render($template, $data));
    }

    /**
     * Render data variable as application/json string
     *
     * @param array|object $data
     * @param int|null $status The redirect HTTP status code.
     * @return \Slim\Http\Response
     */
    protected function renderJSON($data = [], $status = null) {
        return $this->response->withJson($data, $status, JSON_PRETTY_PRINT);
    }


    /**
     * Redirect to URL with optional status
     *
     * @param string|UriInterface $url The redirect destination.
     * @param int|null $status The redirect HTTP status code.
     * @return \Slim\Http\Response
     */
    protected function redirect($url, $status = null) {
        return $this->response->withRedirect($url, $status);
    }
}