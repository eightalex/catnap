<?php

namespace App\Model\Page;

use Core\Model\Entity;

/**
 * Class Page
 * @package App\Model\Page
 */
class Page extends Entity
{

    /**
     *
     */
    const MAIN_PAGE_ID = 1;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $description;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}