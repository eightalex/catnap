<?php

namespace App\Model\BookedItem;

use Core\Model\Repository;

/**
 * Class BookedItemRepository
 * @package App\Model
 */
class BookedItemRepository extends Repository
{

    /**
     * @return string
     */
    function getTableName()
    {
        return 'bookeditem';
    }
}