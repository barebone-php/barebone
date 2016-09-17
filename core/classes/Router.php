<?php
namespace Barebone;

/**
 * Router
 * 
 * @example Router::get('/dashboard', '\App\Controller\Users:dashboard');
 * @example Router::post('/login', '\App\Controller\Users:login');
 * @example public function login(\Barebone\Request $request, \Barebone\Response $response, $args) {}
 * @link http://www.slimframework.com/docs/objects/router.html Documentation
 * 
 * Route callbacks can be any PHP callable, and by default it accepts three arguments.
 *	
 * - Request
 *     The first argument is a Barebone\Request object that represents the current HTTP request.
 * - Response
 *     The second argument is a Barebone\Response object that represents the current HTTP response.
 * - Arguments
 *     The third argument is an associative array that contains values for the current route’s named placeholders.
 *
 */
class Router {
	
	/**
	 * @param \Slim\App
	 */
	private static $instance;
	
	/**
	 * Instantiate Router or return $instance
	 * @return \Slim\App
	 */
	public static function getInstance() {
        if (null === self::$instance) {
            $configuration = [
                'settings' => [
                    'displayErrorDetails' => false,
                ],
            ];
            $container = new \Slim\Container($configuration);

            $container['foundHandler'] = function ($c) {
                return new Handler;
            };

            $container['errorHandler'] = function ($c) {
                return function (\Slim\Http\Request $request, $response, $exception) use ($c) {
                    $html = View::render('app/error', ['message' => $exception ? $exception->getMessage() : 'unknown error']);
                    return $c['response']->withStatus(500)
                        ->withHeader('Content-Type', 'text/html')
                        ->write($html);
                };
            };

            $container['notFoundHandler'] = function ($c) {
                return function (\Slim\Http\Request $request, $response) use ($c) {
                    $html = View::render('app/error404', ['url' => $request->getUri()]);
                    return $c['response']->withStatus(404)
                        ->withHeader('Content-Type', 'text/html')
                        ->write($html);
                };
            };

            $container['notAllowedHandler'] = function ($c) {
                return function (\Slim\Http\Request $request, $response, $methods) use ($c) {
                    $html = View::render('app/error405', ['allowed' => $methods]);
                    return $c['response']
                        ->withStatus(405)
                        ->withHeader('Allow', implode(', ', $methods))
                        ->withHeader('Content-type', 'text/html')
                        ->write($html);
                };
            };

            self::$instance = new \Slim\App($container);
        }
		return self::$instance;
	}
	
	/**
	 * Start router and parse incoming requests
	 */
	public static function dispatch() {
		$router = self::getInstance();
		$router->run();
	}

    /**
     * We assume to receive a string with namespace prefix (starting with backslash).
     *
     * If the initial backslash is missing, we add our default \App\Controller namespace
     * to allow for shorter controller callbacks.
     *
     * @param mixed $callback
     *
     * @return mixed string
     */
	protected static function callback($callback) {
	    if (is_string($callback)) {
            if ($callback{0} !== '\\') {
                $callback = "\\App\\Controller\\{$callback}";
            }
        }
	    return $callback;
    }
	
	/**
	 * Handle GET HTTP requests
	 *
	 * @param string $path
	 * @param mixed $callback
	 */
	public static function get($path, $callback) {
		$router = self::getInstance();
		$router->get($path, self::callback($callback));
	}
	
	/**
	 * Handle POST HTTP requests
	 *
	 * @param string $path
	 * @param mixed $callback
	 */
	public static function post($path, $callback) {
		$router = self::getInstance();
		$router->post($path, self::callback($callback));
	}
	
	/**
	 * Handle PUT HTTP requests
	 *
	 * @param string $path
	 * @param mixed $callback
	 */
	public static function put($path, $callback) {
		$router = self::getInstance();
		$router->put($path, self::callback($callback));
	}
	
	/**
	 * Handle DELETE HTTP requests
	 *
	 * @param string $path
	 * @param mixed $callback
	 */
	public static function delete($path, $callback) {
		$router = self::getInstance();
		$router->delete($path, self::callback($callback));
	}
	
	/**
	 * Handle PATCH HTTP requests
	 *
	 * @param string $path
	 * @param mixed $callback
	 */
	public static function patch($path, $callback) {
		$router = self::getInstance();
		$router->patch($path, self::callback($callback));
	}
	
	/**
	 * Handle OPTIONS HTTP requests
	 *
	 * @param string $path
	 * @param mixed $callback
	 */
	public static function options($path, $callback) {
		$router = self::getInstance();
		$router->options($path, self::callback($callback));
	}
	
	/**
	 * Route that handles all HTTP request methods
	 *
	 * @param string $path
	 * @param mixed $callback
	 */
	public static function any($path, $callback) {
		$router = self::getInstance();
		$router->any($path, self::callback($callback));
	}
	
	/**
	 * Route that handles all HTTP request methods
	 *
	 * @param array $methods List of HTTP methods to support, i.e: [GET,POST,EDIT]
	 * @param string $path 
	 * @param mixed $callback
	 */
	public static function map($methods, $path, $callback) {
		$router = self::getInstance();
		$router->map($methods, $path, self::callback($callback));
	}
	
}