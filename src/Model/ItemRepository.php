<?php

namespace App\Model;

use Core\Model;

/**
 * Class Page
 * @package App\Model
 */
class ItemRepository extends Model
{

    /**
     * @return string
     */
    protected function getTableName()
    {
        return 'item';
    }
}