<?php

namespace App\Model\Order;


use Core\Model\Repository;

class OrderRepository extends Repository
{

    /**
     * @return string
     */
    function getTableName()
    {
        return 'order';
    }
}