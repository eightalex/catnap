<?php

namespace App;

use App\Model\Order\Order;
use App\Model\Order\OrderRepository;
use Core\Controller\Controller;
use Core\lib\Router;

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
        $text = $this->getContainer()->get(Router::class)->getParams();
        $order = new Order();
        $order->setOrder($text[0]);

        $orderRepository = new OrderRepository();
        $orderRepository->flush($order);
    }
}