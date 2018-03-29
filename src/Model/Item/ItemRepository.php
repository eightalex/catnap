<?php

namespace App\Model\Item;

use Core\Model\Repository;

/**
 * Class Page
 * @package App\Model
 */
class ItemRepository extends Repository
{

    /**
     * @return string
     */
    function getTableName()
    {
        return 'item';
    }
}