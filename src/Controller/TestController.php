<?php

namespace App;

use Core\Controller;

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
}