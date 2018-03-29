<?php

namespace App\Model\Item;

use Core\Model\Entity;

/**
 * Class Item
 * @package App\Model\Item
 */
class Item extends Entity
{

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $img;

    /**
     * @var int
     */
    public $price;

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }
}