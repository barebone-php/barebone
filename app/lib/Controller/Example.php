<?php
namespace App\Controller;

use \Barebone\Session;

class Example extends AppController {

    /**
     * Render a static template
     */
    public function index()
    {
        return $this->render('examples/index');
    }

    /**
     * Pass variables to a template
     */
    public function hello($name)
    {
        $vars = ['name' => $name];

        return $this->render('examples/hello', $vars);
    }

    /**
     * Render object as "application/json"
     */
    public function json($name)
    {
        return $this->renderJSON(compact('name'));
    }

    /**
     * Redirect the user to a different url
     */
    public function google()
    {
        return $this->redirect('https://google.com');
    }

    /**
     * Write and read to a session
     */
    public function session()
    {
        Session::set('time', time());

        $session_time = Session::get('time');

        return $this->renderJSON(compact('session_time'));
    }



    /**
     * Write and read to a session
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