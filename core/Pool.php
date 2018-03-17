<?php

namespace Core;

/**
 * Class Pull
 * @package Core
 */
abstract class Pool
{

    /**
     * @var array
     */
    private static $pull = [];

    /**
     * @param $key
     * @param $object
     */
    public static function set($key, $object)
    {
        self::$pull[$key] = $object;
    }

    /**
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        return self::$pull[$key];
    }
}