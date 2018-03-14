<?php

namespace App;

use App\core\Controller;

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
        echo $this->render('main/index');
    }

    /**
     *
     */
    public function contactUs()
    {
        echo $this->render('contact-us/index');
    }
}