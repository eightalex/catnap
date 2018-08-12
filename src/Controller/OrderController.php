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
                'amount' => $amount,
                'price'  => $item->price * $amount
            ];

            unset($order[$itemId]);
        }

        return $order;
    }

    /**
     * @return string
     */
    private function makeOrderList()
    {
        $items = $this->getOrder();
        $orderList = '';

        foreach ($items as $key => $item) {
            $item['amount'] .= ' шт';
            $item['price'] .= ' грн';

            $orderList .= join(', ', $item) . PHP_EOL;
        }

        return $orderList;
    }

    /**
     * @return string
     */
    private function makeTelegramMessage()
    {
        $message = "Нове замовлення!\n\n";

        foreach ($_POST as $key => $value) {
            if ($value === '') {
                continue;
            }

            $message .= $value . PHP_EOL;
        }

        $message .= PHP_EOL . $this->makeOrderList();

        return $message;
    }

    /**
     * @return string
     */
    private function makeEmailMessage() {
        $message = $this->makeOrderList();
        $message .= PHP_EOL . 'Мы скоро свяжемся с Вами для подтверждения заказа';

        return $message;
    }

    /**
     *
     */
    private function sendToTelegram()
    {
        $message = $this->makeTelegramMessage();

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
     * @param $address string
     */
    private function sendToEmail($address)
    {
        if (!$address) {
            return;
        }

        $subject = "{$_SERVER['SITE_NAME']}: Ваш заказ";
        $headers = "From: order@{$_SERVER['SITE_NAME']}.com\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        mail($address, $subject, $this->makeEmailMessage(), $headers);
    }

    /**
     *
     */
    public function sendOrder()
    {
        $this->sendToEmail($_POST['user-email']);
        $this->sendToEmail($_SERVER['ORDER_EMAIL_ADDRESS']);
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