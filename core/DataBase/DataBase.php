<?php

namespace Core\DataBase;


/**
 * Class DataBase
 * @package Core\DataBase
 */
class DataBase
{

    /**
     *
     */
    const DATA_BASE = 'data.db';

    /**
     * @var \PDO $connection
     */
    private static $connection;

    /**
     * @return null|\PDO
     */
    public static function getConnection()
    {
        if (!self::$connection)
        {
            self::$connection = new \PDO('sqlite:' . self::getAbsolutePathToDatabase());
        }

        return self::$connection;
    }

    /**
     * @return string
     */
    private static function getAbsolutePathToDatabase()
    {
        return __DIR__ . '/' . self::DATA_BASE;
    }

    /**
     * DataBase constructor.
     */
    private function __construct() {}

    /**
     *
     */
    private function __clone() {}

    /**
     *
     */
    private function __wakeup() {}
}