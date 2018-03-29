<?php

namespace Core\Service;


/**
 * Class ServiceInjection
 * @package Core
 */
class ContainerInjector
{

    /**
     * @var Service $container
     */
    private static $container;

    /**
     * @return Service $container
     */
    public static function getContainer()
    {
        return self::$container;
    }

    /**
     * @param Service $service
     */
    public static function setContainer(Service $service)
    {
        self::$container = $service;
    }
}