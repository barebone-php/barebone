<?php
namespace App\Controller;

use \Barebone\Controller;

class Site extends Controller {

    /**
     * @return string|\Slim\Http\Response
     */
    public function index()
    {
        return $this->render('site/index');
    }

    /**
     * @return string|\Slim\Http\Response
     */
    public function hello($name)
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