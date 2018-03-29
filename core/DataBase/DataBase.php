<?php

namespace Core\DataBase;


/**
 * Class DataBase
 * @package Core\DataBase
 */
final class DataBase
{

    /**
     *
     */
    const DATA_BASE = 'data.db';

    /**
     * @return string
     */
    public static function getAbsolutePathToDatabase()
    {
        return __DIR__ . '/' . self::DATA_BASE;
    }
}