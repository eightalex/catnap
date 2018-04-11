<?php

namespace App;

use App\Model\Item\ItemRepository;
use Core\Controller\Controller;

/**
 * Class ItemController
 */
class ItemController extends Controller
{

    /**
     * @param $itemId
     */
    public function getItem($itemId)
    {
        $pageRepository = new ItemRepository();
        $item = $pageRepository->find($itemId);

        var_dump($item);
    }
}