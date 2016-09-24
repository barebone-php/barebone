<?php
namespace App\Controller;

use Barebone\Request;
use Barebone\Response;

/**
 * Class ExampleController
 *
 * This file demonstrates some of the response and rendering features.
 * You are free to delete this file or create your own version.
 *
 * @author  Kjell Bublitz <kjbbtz@gmail.com>
 * @package App\Controller
 */
class ExampleController extends AppController
{
    /**
     * Add any code that will run before any action is called.
     */
    public function initController()
    {
        $this->addBefore(function(Request $request, Response $response, callable $next = null) {
            // code to run before your action
            //    $response->getBody()->write('hello');
            return $next($request, $response);
        });

        $this->addAfter(function(Request $request, Response $response, callable $next = null) {
            // code to run after your action
            //    $response->getBody()->write('goodbye');
            return $next($request, $response);
        });
    }

    /**
     * Action: index
     * Render a static template
     */
    public function index()
    {
        return $this->render('examples/index');
    }

    /**
     * Action: hello
     * Pass variables to a template
     */
    public function hello($name)
    {
        $vars = ['name' => $name];

        return $this->render('examples/hello', $vars);
    }

    /**
     * Action: json
     * Render object as "application/json"
     */
    public function print_json($name)
    {
        return $this->renderJSON(compact('name'));
    }

    /**
     * Action: google
     * Redirect the user to a different url
     */
    public function redirect_to_google()
    {
        return $this->redirect('https://google.com');
    }

    /**
     * Action: session
     * Write and read to a session
     */
    public function test_session()
    {
        $this->session->set('time', time());

        $session_time = $this->session->get('time');

        return $this->renderJSON(compact('session_time'));
    }

    /**
     * Write to log
     */
    public function logger()
    {
        $this->log('example log from /logger');

        return $this->renderJSON([
            'time' => time(),
            'logged' => 'look in ./tmp/logs/app.log'
        ]);
    }
}