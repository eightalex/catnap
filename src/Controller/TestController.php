<?php

namespace App;

use App\Model\Test;
use Core\Controller;
use Core\Pool;

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

    /**
     *
     */
    public function item()
    {
        $this->renderPage('item');
    }

    /**
     *
     */
    public function testRequest()
    {
        var_dump(Pool::get('router')->getParams());
        exit;
    }

    /**
     * @throws \Exception
     */
    public function testEntity()
    {
        $testEntity = new Test();
        $tests = $testEntity->findAll();

        $this->renderPage('test-entity', [
            'tests' => $tests
        ]);
    }
}