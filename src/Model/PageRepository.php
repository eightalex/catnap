<?php

namespace App\Model;

use Core\Model;

/**
 * Class Page
 * @package App\Model
 */
class PageRepository extends Model
{

    /**
     *
     */
    const MAIN_PAGE_ID = 1;

    /**
     * @return string
     */
    protected function getTableName()
    {
        return 'page';
    }
}