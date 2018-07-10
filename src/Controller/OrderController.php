<?php

namespace App;

use App\Model\Order\Order;
use App\Model\Order\OrderRepository;
use App\Model\Item\ItemRepository;
use Core\Controller\Controller;

/**
 * Class OrderController
 * @package App
 */
class OrderController extends Controller
{

    /**
     * @return array
     */
    private function getOrder()
    {
        $order = json_decode($_COOKIE['order'], true) ?: [];

        $pageRepository = new ItemRepository();

        foreach ($order as $itemId => $amount) {
            $item = $pageRepository->find($itemId);

            $order[] = [
                'title'  => $item->name,
                'amount' => $amount . " шт",
                'price'  => $item->price * $amount . " грн"
            ];

            unset($order[$itemId]);
        }

        return $order;
    }

    /**
     * @param $data array
     * @return string
     */
    private function makeOrderMessage($data)
    {
        $message = "";
        $order = $this->getOrder();

        foreach ($data as $key => $value) {
            if ($value === "") {
                continue;
            }

            $message .= $value . PHP_EOL;
        }

        foreach ($order as $item) {
            $message .= str_repeat(PHP_EOL, 2) . join(PHP_EOL, $item);
        }

        return "Нове замовлення!\n\n" . $message;
    }

    /**
     *
     */
    private function sendToTelegram()
    {
        $message = $this->makeOrderMessage($_POST);

        $query = http_build_query([
            'chat_id' => $_SERVER['TELEGREAM_CHAT_ID'],
            'text' => $message
        ]);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot{$_SERVER['TELEGREAM_TOKEN']}/sendMessage");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_exec($ch);
        curl_close($ch);
    }

    /**
     *
     */
    public function sendOrder()
    {
        $this->sendToTelegram();
    }

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