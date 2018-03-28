<?php

namespace App;

use App\Model\ItemRepository;
use App\Model\PageRepository;
use Core\Controller;

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
        $pageRepository = new PageRepository();
        $mainPage = $pageRepository->find(PageRepository::MAIN_PAGE_ID);

        $itemRepository = new ItemRepository();
        $items = $itemRepository->findAll();

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
     * @throws \Core\Exception\ModelException
     */
    public function item()
    {

        $uri = $_SERVER['REQUEST_URI'];
        $uri_arr = explode('/', $uri);
        $itemId = end($uri_arr);

        $itemRepository = new ItemRepository();
        $item = $itemRepository->find($itemId);

        $this->renderPage('item', ['item' => $item]);
    }

    /**
     *
     */
    public function cart()
    {
        $this->renderPage('cart');
    }
}