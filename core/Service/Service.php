<?php

namespace Core\Service;


/**
 * Class Service
 * @package Core
 */
class Service
{

    /**
     * @var array $services
     */
    private $services = [];

    /**
     * @var array $instantiated_services
     */
    private $instantiated_services = [];

    /**
     * @param string $class
     *
     * @return object
     */
    public function get($class)
    {
        if (isset($this->instantiated_services[$class])) {
            return $this->instantiated_services[$class];
        }

        $args = $this->services[$class];
        switch (count($args)) {
            case 0:
                $object = new $class();
                break;
            case 1:
                $object = new $class($args[0]);
                break;
            case 2:
                $object = new $class($args[0], $args[1]);
                break;
            case 3:
                $object = new $class($args[0], $args[1], $args[1]);
                break;
            default:
                throw new \OutOfRangeException('Count of arguments more than 3');
        }

        $this->instantiated_services[$class] = $object;

        return $object;
    }

    /**
     * @param string $class
     * @param array $params
     */
    public function add($class, array $params = [])
    {
        $this->services[$class] = $params;
    }
}