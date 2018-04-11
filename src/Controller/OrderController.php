<?php

namespace App;

use App\Model\Order\Order;
use App\Model\Order\OrderRepository;
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
        $order = new Order();
        $order->setOrder();

        $orderRepository = new OrderRepository();
        $orderRepository->flush($order);
    }
}