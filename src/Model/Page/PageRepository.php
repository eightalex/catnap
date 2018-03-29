<?php

namespace App\Model\Page;

use Core\Model\Repository;

/**
 * Class PageRepository
 * @package App\Model\Page
 */
class PageRepository extends Repository
{

    /**
     * @return string
     */
    function getTableName()
    {
        return 'page';
    }
}