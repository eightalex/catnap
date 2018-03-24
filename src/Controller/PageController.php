<?php

namespace App;

use App\Model\Page;
use App\Model\Test;
use App\Model\Items;
use Core\Controller;
use Core\Router;

/**
 * Class PageController
 */
class PageController extends Controller
{

    /**
     * @throws \Core\Exception\ModelException
     * @throws \Exception
     */
    public function mainPage()
    {
        $pageEntity = new Page();
        $mainPage = $pageEntity->find(Page::MAIN_PAGE_ID);

        $itemsEntity = new Items();
        $items = $itemsEntity->findAll();

        $this->renderPage('main', [
            'mainPage' => $mainPage,
            'items' => $items
        ]);
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
    public function cart()
    {
        $this->renderPage('cart');
    }

    /**
     *
     */
    public function testRequest()
    {
        var_dump($this->getContainer()->get(Router::class)->getParams());
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