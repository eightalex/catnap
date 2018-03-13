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
    public function testAction()
    {
        $this->render('main/index');
    }
}