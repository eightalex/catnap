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
     *
     */
    public function cart()
    {
        $order = json_decode($_COOKIE['order'], true);
        $pageRepository = new ItemRepository();

        foreach ($order as $itemId => $amount) {
            $item = $pageRepository->find($itemId);

            $order[] = [
                'id'     => $item->id,
                'title'  => $item->name,
                'img'    => $item->img,
                'price'  => $item->price,
                'amount' => $amount
            ];

            unset($order[$itemId]);
        }

        $this->renderPage('cart', ['order' => $order]);
    }
}