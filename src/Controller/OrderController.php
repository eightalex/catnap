<?php

namespace App;

use App\Model\Order\Order;
use App\Model\Order\OrderRepository;
use App\Model\BookedItem\BookedItem;
use App\Model\BookedItem\BookedItemRepository;
use Core\Controller\Controller;

/**
 * Class OrderController
 * @package App
 */
class OrderController extends Controller
{

    /**
     *
     */
    public function setOrder()
    {
        // TODO: если order уже есть, не записывать новый
        $order = new Order();
        $order->setOrder();

        $orderRepository = new OrderRepository();
        $orderRepository->flush($order);

        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON);

        $order_id = \R::getInsertID();
        $item_id = $input->itemId;

        // TODO: если такой товар уже есть, увеличить только его amount
        $bookedItem = new BookedItem();
        $bookedItem->setOrderId($order_id);
        $bookedItem->setItemId($item_id);
        $bookedItem->setAmount(1);

        $bookedItemRepository = new BookedItemRepository();
        $bookedItemRepository->flush($bookedItem);
    }
}