<?php

namespace App;

use App\Model\Item\ItemRepository;
use App\Model\Page\Page;
use App\Model\Page\PageRepository;
use Core\Controller\Controller;


/**
 * Class PageController
 */
class PageController extends Controller
{

    /**
     *
     */
    public function mainPage()
    {
        $pageRepository = new PageRepository();
        $mainPage = $pageRepository->find(Page::MAIN_PAGE_ID);

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
     *
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
     * @param $itemId
     */
    public function getItem($itemId)
    {
        $pageRepository = new ItemRepository();
        $item = $pageRepository->find($itemId);

        var_dump($item);
    }

    /**
     *
     */
    public function cart()
    {
        $this->renderPage('cart');
    }
}