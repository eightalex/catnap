<?php

namespace App\Model\Order;

use Core\Model\Entity;

/**
 * Class Order
 * @package App\Model\Order
 */
class Order extends Entity
{

    /**
     * @var string
     */
    public $order;

    /**
     * @return string
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param string $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }
}