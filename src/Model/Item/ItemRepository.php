<?php

namespace App\Model\Item;

use Core\Model\Repository;

/**
 * Class ItemRepository
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