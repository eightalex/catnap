<?php

namespace App;

use Core\Controller;
use Core\Pull;

/**
 * Class TestController
 */
class TestController extends Controller
{

    /**
     *
     */
    public function mainPage()
    {
        $this->renderPage('main');
    }

    /**
     *
     */
    public function contactUs()
    {
        $this->renderPage('contact-us');
    }

    public function testRequest()
    {
        var_dump(Pull::get('router')->getParams());
        exit;
    }
}