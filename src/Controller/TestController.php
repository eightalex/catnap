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
        $this->render('main/index');
    }

    /**
     *
     */
    public function contactUs()
    {
        $this->render('contact-us/index');
    }
}