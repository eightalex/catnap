<?php

namespace Core;


/**
 * Class ServiceInjection
 * @package Core
 */
class ServiceInjection
{

    /**
     * @var Service $service
     */
    private static $service;

    /**
     * @return Service
     */
    public static function getService()
    {
        return self::$service;
    }

    /**
     * @param Service $service
     */
    public static function setService(Service $service)
    {
        self::$service = $service;
    }
}