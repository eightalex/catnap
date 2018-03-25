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
}