<?php
namespace App\Controller;

class Example extends AppController {

    /**
     * @return string|\Slim\Http\Response
     */
    public function index()
    {
        return $this->render('examples/index');
    }

    /**
     * @return string|\Slim\Http\Response
     */
    public function hello($name)
    {
        return $this->render('examples/hello', compact('name'));
    }

    /**
     * @return string|\Slim\Http\Response
     */
    public function json($name)
    {
        return $this->renderJSON(compact('name'));
    }

    /**
     * @return string|\Slim\Http\Response
     */
    public function google()
    {
        return $this->redirect('https://google.com');
    }

}