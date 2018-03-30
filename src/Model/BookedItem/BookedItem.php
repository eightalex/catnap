<?php

namespace App\Model\BookedItem;

use Core\Model\Entity;

/**
 * Class BookedItem
 * @package App\Model\BookedItem
 */
class BookedItem extends Entity
{

    /**
     * @var int
     */
    public $order_id;

    /**
     * @var int
     */
    public $item_id;

    /**
     * @var int
     */
    public $amount;

    /**
     * @param $order_id
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * @param $item_id
     */
    public function setItemId($item_id)
    {
        $this->item_id = $item_id;
    }

    /**
     * @param $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}